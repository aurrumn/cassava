<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_pegawai_singkong extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    //fungsi ini digunakan untuk mengambil seluruh data singkong
    function ambil_data_singkong() {
        $this->db->select(array('s.id_singkong', 's.id_petani', 'p.nama_petani', 's.berat', 's.tanggal_masuk', 's.id_petugas', 'u.nama', 's.status_singkong', 'ss.keterangan'));
        $this->db->from('singkong s JOIN petani p ON (s.id_petani = p.id_petani) JOIN user u ON (s.id_petugas = u.id_user) JOIN status_singkong ss ON (s.status_singkong = ss.id_status)');
        $this->db->order_by('tanggal_masuk DESC');
        return $this->db->get();
    }

    // fungsi ini digunakan untuk menyimpan data singkon
    function tambahkan_singkong($table, $data) {
        return $this->db->insert($table, $data);
    }

    // fungsi ini digunakan untuk mengambil data singkong dari database untuk edit data
    function get_data_singkong_for_edit($where_id) {
        $this->db->select(array('s.id_singkong', 's.id_petani', 's.tanggal_masuk', 's.berat', 'p.nama_petani'));
        $this->db->from('`singkong` s JOIN petani p on (s.id_petani = p.id_petani)');
        $this->db->where('id_singkong', $where_id);
        return $this->db->get();
    }

    // fungsi ini digunakan untuk mengambil semua nama dan id petani yang aktif
    // nantinya data yang diambil dari fitur ini digunakan untuk dropdown list petani
    function get_semua_petani_aktif() {
        $this->db->select(array('id_petani', 'nama_petani'));
        $this->db->from("petani");
        $this->db->where("status_aktif = 1");
        $this->db->order_by('nama_petani ASC');
        return $this->db->get();
    }

    // fungsi ini digunakan untuk mengupdate tanggal periksa setelah edit penilaian data singkong
    function update_tanggal_periksa($id_periksa) {
        $this->db->query("UPDATE `periksa` SET tanggal = NOW() WHERE id_periksa = '$id_periksa'");
    }

    // fungsi ini digunakan untuk menyimpan perubahan data singkong setelah di edit
    function update_data($table, $data, $where) {
        $this->db->update($table, $data, $where);
    }

    // fungsi ini digunakan secra universal untuk select data tertentu
    function select_where($select, $table, $where) {
        $this->db->select($select);
        $this->db->from($table);
        $this->db->where($where);

        return $this->db->get();
    }

    // fungsi ini digunakan secara universal untuk mengambil semua daa dari tabel tertentu
    function select_all($table) {
        $this->db->from($table);
        return $this->db->get();
    }

    // fungsi ini digunakan secara universal untuk mengambil semua data kemudian di order_by
    function select_all_order_by($tabel, $order) {
        $this->db->from($tabel);
        $this->db->order_by($order);

        return $this->db->get();
    }

    // fungsi ini digunakan secara universal untuk insert data ke database
    function insert($table = '', $data = '') {
        $this->db->insert($table, $data);
    }

    // fungsi ini digunakan untuk mengambil semua data pada tabel dengan kondisi tertentu
    function get_where($table = null, $where = null) {
        $this->db->from($table);
        $this->db->where($where);

        return $this->db->get();
    }

    // fungsi ini digunakan untuk mengambil id_periksa terakhir
    function get_last_id_periksa() {
        $result = $this->db->query("SELECT id_periksa FROM periksa ORDER BY id_periksa DESC LIMIT 1");
        foreach ($result->result_array() AS $rowt) {
            $last_id = $rowt['id_periksa'];
            return $last_id;
        }
    }

    // fungsi ini digunakan secara universal untuk meng-update data 
    function update($table = null, $data = null, $where = null) {
        $this->db->update($table, $data, $where);
    }

}
