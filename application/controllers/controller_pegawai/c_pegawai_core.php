<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_pegawai_core extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('model_pegawai/m_pegawai_core');
        $this->load->model('model_pegawai/m_pegawai_jamur');
    }

    function index() {
        if ($this->cekLogin() == FALSE) {
            redirect(base_url());
        } else {
            $this->emptying_message();
            $id_loged_user = $this->session->userdata('id_user');
            $data['promethee'] = $this->m_pegawai_core->ambil_data_promethee();
            $this->template->pegawaiview('pegawai/pegawai_jamur_core', $data);
        }
    }

    // fungsi pengecekan login agar user tidak bisa loncat ke halaman ini tanpa login terlebih dahulu
    function cekLogin() {
        if ($this->session->userdata('login') == FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    // fungsi CORE SYSTEM
    function core() {
        $id_loged_user = $this->session->userdata('id_user');
        $data['promethee'] = $this->m_pegawai_core->ambil_data_promethee();
        // if ($this->m_pegawai_core->system_core($id_loged_user) == TRUE) {
            if (true) {
            $this->session->set_flashdata('message', 'PENGHITUNGAN PROMETHEE BERHASIL');
            $data['promethee'] = $this->m_pegawai_core->ambil_data_promethee();
            $this->template->pegawaiview('pegawai/pegawai_jamur_core', $data);
        } else {
            $this->session->set_flashdata('message_gagal', 'GAGAL | Data jamur Tidak Memenuhi Minimal Kuota Penghitungan');
            $this->template->pegawaiview('pegawai/pegawai_jamur_core', $data);
        }
    }

    // fungsi ini digunakan untuk mengkosongkan pesan
    function emptying_message() {
        $this->session->set_flashdata('message', NULL);
        $this->session->set_flashdata('message_gagal', NULL);
    }

    // fungsi ini digunakan untuk menampilkan detail dari penghitungan Promethee
    function lihat_detail_promethee($id_promethee) {
        // ambil id jamurnya
        $t_jamur_promethee = "jamur j JOIN promethee p ON (j.id_jamur = p.id_jamur)";
        $identitas_jamur = $this->m_pegawai_jamur->select_where(array('j.id_jamur'), $t_jamur_promethee, "id_promethee = '$id_promethee'");

        foreach ($identitas_jamur->result() as $key) {
            $data['id_jamur'] = $key->id_jamur;
        }

        $id_jamur = $data['id_jamur'];

        // mengambil data detail jamurnya
        $select_detail = "j.id_jamur, j.tanggal_masuk, j.berat, "
                . "sj.keterangan as status, "
                . "rk.nama_rak as rak, rk.lokasi as lokasi, rk.tgl_rak as tanggal, "
                . "u.nama as petugas, u.alamat as alamat_petugas, u.telephone as telepon_petugas, "
                . "pj.tanggal as tanggal_periksa, ";

        $tabel_detail = "jamur j "
                . "JOIN status_jamur sj ON (j.status_jamur = sj.id_status) "
                . "JOIN rakjamur rk ON (j.id_rak = rk.id_rak) "
                . "JOIN user u ON (j.id_petugas = u.id_user) "
                . "JOIN periksa pj ON (j.id_jamur = pj.id_jamur) ";

        $where_detail = "j.id_jamur ='$id_jamur'";

        $data_detail = $this->m_pegawai_jamur->select_where($select_detail, $tabel_detail, $where_detail);

        foreach ($data_detail->result() as $key) {
            $data['tanggal_masuk'] = $key->tanggal_masuk;
            $data['berat'] = $key->berat;
            $data['status'] = $key->status;

            $data['rak'] = $key->rak;
            $data['lokasi'] = $key->lokasi;
            $data['tgl_rak'] = $key->tanggal;

            $data['petugas'] = $key->petugas;
            $data['alamat_petugas'] = $key->alamat_petugas;
            $data['telepon_petugas'] = $key->telepon_petugas;

            $data['tanggal_periksa'] = $key->tanggal_periksa;
        }
        
        // mengambil data penilaian
        $tabel_penilaian = "periksa p JOIN detail_periksa dp ON (p.id_periksa = dp.id_periksa) "
                . "JOIN sub_kriteria sk ON (dp.id_subkriteria = sk.id_subkriteria)";
        $data['detail_penilaian'] = $this->m_pegawai_jamur->get_where($tabel_penilaian, "p.id_jamur = '$id_jamur'");

        $periksa = $this->m_pegawai_jamur->select_where(array('id_periksa'), "periksa", "id_jamur = '$id_jamur'");
        foreach ($periksa->result() as $key) {
            $data['id_periksa'] = $key->id_periksa;
        }
        // mengambil nama kriteria
        $data['nama_kriteria'] = $this->m_pegawai_jamur->select_all("kriteria");

        
        // mengambil detail penilaian promethee
        $select_promethee = "pro.leaving_flow, pro.entering_flow, pro.net_flow as nilai_promethee, pro.tanggal_perhitungan as tanggal_promethee, "
                . "u.nama as petugas_promethee, u.alamat as alamat_petugas_promethee, u.telephone as telepon_petugas_promethee ";
        $tabel_promethee = "promethee pro JOIN user u ON (pro.petugas = u.id_user)";
        $where_promethee = "pro.id_promethee = '$id_promethee'";
        $detail_promethee = $this->m_pegawai_jamur->select_where($select_promethee, $tabel_promethee, $where_promethee);

        foreach ($detail_promethee->result() as $key) {
            $data['leaving_flow'] = $key->leaving_flow;
            $data['entering_flow'] = $key->entering_flow;
            $data['nilai_promethee'] = $key->nilai_promethee;
            $data['tanggal_promethee'] = $key->tanggal_promethee;
            
            $data['petugas_promethee'] = $key->petugas_promethee;
            $data['alamat_petugas_promethee'] = $key->alamat_petugas_promethee;
            $data['telepon_petugas_promethee'] = $key->telepon_petugas_promethee;
        }
        $data['id_promethee'] = $id_promethee;
        $this->template->pegawaiview('pegawai/pegawai_jamur_core_detail', $data);
    }

}
