<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_pegawai_core extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // fungsi CORE SYSTEM
    function system_core($id_loged_user) {
        $query = $this->db->query
                ('
                    SELECT
                        s.id_singkong
                        , IFNULL(p.id_periksa, "-") AS id_periksa
                        , GROUP_CONCAT(sk.id_kriteria SEPARATOR ",") AS id_kriteria 
                        , GROUP_CONCAT(sk.bobot SEPARATOR ",") AS nilai 
                    FROM
                        singkong s
                        LEFT JOIN periksa p
                            ON s.id_singkong = p.id_singkong
                        JOIN detail_periksa d
                            ON p.id_periksa = d.id_periksa
                        JOIN (
                                SELECT * FROM sub_kriteria ORDER BY id_kriteria ASC, id_sub_kriteria ASC
                            ) sk
                            on sk.id_sub_kriteria = d.id_subkriteria
                    WHERE
                        s.status_singkong = 2
                    GROUP BY
                        p.id_periksa
                    ORDER BY
                        s.id_singkong ASC
                        , p.id_periksa ASC
                        , sk.id_kriteria ASC			
                ');

        $dataset = $query->result_array();
        if (count($dataset) > 2) {
            $sigma_hD = array();
            $sigma_hD_flow = array();
            for ($i = 0; $i < count($dataset); $i++) {
                for ($j = 0; $j < count($dataset); $j++) {
                    if ($i != $j) {
                        $data_nilai_1 = explode(',', $dataset[$i]['nilai']);
                        $data_nilai_2 = explode(',', $dataset[$j]['nilai']);
                        if (count($data_nilai_1) == count($data_nilai_2)) {
                            $tot = 0;
                            for ($k = 0; $k < count($data_nilai_1); $k++) {
                                if (($data_nilai_1[$k] - $data_nilai_2[$k]) > 0) {
                                    $tot++;
                                }
                            }
                            $sigma_hD[($dataset[$i]['id_singkong'] . ' -> ' . $dataset[$j]['id_singkong'])] = $tot;
                            $sigma_hD_flow[($dataset[$i]['id_singkong'] . ' -> ' . $dataset[$j]['id_singkong'])] = (1 / count($data_nilai_1) * $tot);
                        } else {
                            $sigma_hD[($dataset[$i]['id_singkong'] . ' -> ' . $dataset[$j]['id_singkong'])] = 0;
                            $sigma_hD_flow[($dataset[$i]['id_singkong'] . ' -> ' . $dataset[$j]['id_singkong'])] = 0;
                        }
                    }
                }
            }

            $leaving_flow = array();
            $entering_flow = array();
            $net_flow = array();
            for ($i = 0; $i < count($dataset); $i++) {
                $leaving_flow[$i] = 0;
                $entering_flow[$i] = 0;
                $net_flow[$i] = 0;
            }
            // bikinmatriks
            for ($i = 0; $i < count($dataset); $i++) {
                for ($j = 0; $j < count($dataset); $j++) {
                    if ($i != $j) {
                        $data_nilai_1 = explode(',', $dataset[$i]['nilai']);
                        $data_nilai_2 = explode(',', $dataset[$j]['nilai']);
                        if (count($data_nilai_1) == count($data_nilai_2)) {
                            $b = explode(' -> ', ($dataset[$i]['id_singkong'] . ' -> ' . $dataset[$j]['id_singkong']));
                            // echo '<br />wedhus l masuk ' . $b[1] . '-' . $dataset[$i]['id_singkong'];
                            if ($b[0] == $dataset[$i]['id_singkong']) {
                                // echo ' --> process ';
                                $leaving_flow[$i] += (1 / count($data_nilai_1) * $sigma_hD[($dataset[$i]['id_singkong'] . ' -> ' . $dataset[$j]['id_singkong'])]);
                            }
                            // echo '<br /> e masuk ' . $b[1] . '-' . $dataset[$i]['id_singkong'];
                            if ($b[1] == $dataset[$j]['id_singkong']) {
                                // echo ' --> process ';
                                $entering_flow[$j] += (1 / count($data_nilai_1) * $sigma_hD[($dataset[$i]['id_singkong'] . ' -> ' . $dataset[$j]['id_singkong'])]);
                            }
                        } else {
                            $leaving_flow[$i] += 0;
                            $entering_flow[$j] += 0;
                        }
                    }
                }
            }

            for ($i = 0; $i < count($dataset); $i++) {
                $data_nilai = explode(',', $dataset[$i]['nilai']);
                $totot = 0;
                for ($j = 1; $j < count($data_nilai) - 2; $j++) {
                    $totot += $data_nilai[$j];
                }
                $range = 0;
                if ($totot < 3) {
                    $range = 9;
                } else if ($totot >= 4 && $totot <= 6) {
                    $range = 8;
                } else if ($totot >= 7 && $totot <= 9) {
                    $range = 7;
                } else if ($totot >= 10 && $totot <= 12) {
                    $range = 6;
                } else if ($totot >= 13 && $totot <= 15) {
                    $range = 5;
                } else if ($totot >= 16 && $totot <= 18) {
                    $range = 4;
                } else if ($totot >= 19 && $totot <= 21) {
                    $range = 3;
                } else if ($totot >= 22 && $totot <= 25) {
                    $range = 2;
                } else if ($totot >= 26 && $totot <= 29) {
                    $range = 1;
                }
            }
            // echo count($dataset);
            for ($i = 0; $i < count($dataset); $i++) {
                // print_r($dataset);
                $leaving_flow[$i] = 1 / (count($dataset) - 1) * $leaving_flow[$i];
                $entering_flow[$i] = 1 / (count($dataset) - 1) * $entering_flow[$i];
                $net_flow[$i] = $leaving_flow[$i] - $entering_flow[$i];

                // hacked by why you see a ?

                $data_input = array(
                    'id_singkong' => $dataset[$i]['id_singkong'],
                    'leaving_flow' => $leaving_flow[$i],
                    'entering_flow' => $entering_flow[$i],
                    'net_flow' => $net_flow[$i],
                    'petugas'=> $id_loged_user
                );
                $this->db->set('tanggal_penghitungan', 'NOW()', FALSE);
                $this->insert("promethee", $data_input);

                $id_singkong_yang_diupdate = $dataset[$i]['id_singkong'];
                $this->update("singkong", array('status_singkong' => 3), "id_singkong = '$id_singkong_yang_diupdate'");
                // --------------------------------------------------------------------------------------------------
            }
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // fungsi ini digunakan untuk mengambil data promethee yang tersimpan dalam database
    function ambil_data_promethee() {
        $query = "SELECT pt.nama_petani as petani, s.tanggal_masuk, ps.tanggal as tanggal_penilaian, p.tanggal_penghitungan as tanggal_promethee, p.leaving_flow, p.entering_flow, p.id_promethee, p.net_flow as nilai_promethee, u.nama as petugas "
                . "FROM promethee p JOIN singkong s ON (p.id_singkong = s.id_singkong) "
                . "JOIN petani pt ON (s.id_petani = pt.id_petani) "
                . "JOIN periksa ps ON (s.id_singkong = ps.id_singkong) "
                . "JOIN user u ON (p.petugas = u.id_user) "
                . "ORDER BY p.tanggal_penghitungan, p.net_flow DESC";
        return $this->db->query($query);
    }

    function insert($table, $data) {
        $this->db->insert($table, $data);
    }

    function update($table, $data, $where) {
        $this->db->update($table, $data, $where);
    }

}
