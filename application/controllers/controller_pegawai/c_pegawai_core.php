<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_pegawai_core extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('model_pegawai/m_pegawai_core');
        $this->load->model('model_pegawai/m_pegawai_singkong');
    }

    function index() {
        if ($this->cekLogin() == FALSE) {
            redirect(base_url());
        } else {
            $this->emptying_message();
            $id_loged_user = $this->session->userdata('id_user');
            $data['promethee'] = $this->m_pegawai_core->ambil_data_promethee();
            $this->template->pegawaiview('pegawai/pegawai_singkong_core', $data);
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
        if ($this->m_pegawai_core->system_core($id_loged_user) == TRUE) {
            $this->session->set_flashdata('message', 'PENGHITUNGAN PROMETHEE BERHASIL');
            $data['promethee'] = $this->m_pegawai_core->ambil_data_promethee();
            $this->template->pegawaiview('pegawai/pegawai_singkong_core', $data);
        } else {
            $this->session->set_flashdata('message_gagal', 'GAGAL | Data Singkong Tidak Memenuhi Minimal Kuota Penghitungan');
            $this->template->pegawaiview('pegawai/pegawai_singkong_core', $data);
        }
    }

    // fungsi ini digunakan untuk mengkosongkan pesan
    function emptying_message() {
        $this->session->set_flashdata('message', NULL);
        $this->session->set_flashdata('message_gagal', NULL);
    }

    // fungsi ini digunakan untuk menampilkan detail dari penghitungan Promethee
    function lihat_detail_promethee($id_promethee) {
        // ambil id singkongnya
        $t_singkong_promethee = "singkong s JOIN promethee p ON (s.id_singkong = p.id_singkong)";
        $identitas_singkong = $this->m_pegawai_singkong->select_where(array('s.id_singkong'), $t_singkong_promethee, "id_promethee = '$id_promethee'");

        foreach ($identitas_singkong->result() as $key) {
            $data['id_singkong'] = $key->id_singkong;
        }

        $id_singkong = $data['id_singkong'];

        // mengambil data detail singkongnya
        $select_detail = "s.id_singkong, s.tanggal_masuk, s.berat, "
                . "ss.keterangan as status, "
                . "pt.nama_petani as petani, pt.alamat as alamat_petani, pt.telepon as telepon_petani, "
                . "u.nama as petugas, u.alamat as alamat_petugas, u.telephone as telepon_petugas, "
                . "ps.tanggal as tanggal_periksa, ";

        $tabel_detail = "singkong s "
                . "JOIN status_singkong ss ON (s.status_singkong = ss.id_status) "
                . "JOIN petani pt ON (s.id_petani = pt.id_petani) "
                . "JOIN user u ON (s.id_petugas = u.id_user) "
                . "JOIN periksa ps ON (s.id_singkong = ps.id_singkong) ";

        $where_detail = "s.id_singkong ='$id_singkong'";

        $data_detail = $this->m_pegawai_singkong->select_where($select_detail, $tabel_detail, $where_detail);

        foreach ($data_detail->result() as $key) {
            $data['tanggal_masuk'] = $key->tanggal_masuk;
            $data['berat'] = $key->berat;
            $data['status'] = $key->status;

            $data['petani'] = $key->petani;
            $data['alamat_petani'] = $key->alamat_petani;
            $data['telepon_petani'] = $key->telepon_petani;

            $data['petugas'] = $key->petugas;
            $data['alamat_petugas'] = $key->alamat_petugas;
            $data['telepon_petugas'] = $key->telepon_petugas;

            $data['tanggal_periksa'] = $key->tanggal_periksa;
        }
        
        // mengambil data penilaian
        $tabel_penilaian = "periksa p JOIN detail_periksa dp ON (p.id_periksa = dp.id_periksa) "
                . "JOIN sub_kriteria sk ON (dp.id_subkriteria = sk.id_sub_kriteria)";
        $data['detail_penilaian'] = $this->m_pegawai_singkong->get_where($tabel_penilaian, "p.id_singkong = '$id_singkong'");

        $periksa = $this->m_pegawai_singkong->select_where(array('id_periksa'), "periksa", "id_singkong = '$id_singkong'");
        foreach ($periksa->result() as $key) {
            $data['id_periksa'] = $key->id_periksa;
        }
        // mengambil nama kriteria
        $data['nama_kriteria'] = $this->m_pegawai_singkong->select_all("kriteria");

        
        // mengambil detail penilaian promethee
        $select_promethee = "pro.leaving_flow, pro.entering_flow, pro.net_flow as nilai_promethee, pro.tanggal_penghitungan as tanggal_promethee, "
                . "u.nama as petugas_promethee, u.alamat as alamat_petugas_promethee, u.telephone as telepon_petugas_promethee ";
        $tabel_promethee = "promethee pro JOIN user u ON (pro.petugas = u.id_user)";
        $where_promethee = "pro.id_promethee = '$id_promethee'";
        $detail_promethee = $this->m_pegawai_singkong->select_where($select_promethee, $tabel_promethee, $where_promethee);

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
        $this->template->pegawaiview('pegawai/pegawai_singkong_core_detail', $data);
    }

}
