<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_juragan_pegawai extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('model_juragan/m_juragan_pegawai');
    }

    function index() {
        if ($this->cekLogin() == FALSE) {
            redirect(base_url());
        } else {
            $data['data_pegawai'] = $this->m_juragan_pegawai->ambil_data_pegawai("u.level_akses = 2");
            $this->template->juraganview('juragan/juragan_pegawai', $data);
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

    function non_Aktifkan_Pegawai($id_user) {
        $data = array(
            'status_aktif' => 2
        );
        $this->db->set('akhir_kerja', 'NOW()', FALSE);
        if ($this->m_juragan_pegawai->update_status_pegawai("user", $data, "id_user = '$id_user'")) {
            redirect('controller_juragan/c_juragan_pegawai');
        } else {
            $this->session->set_flashdata('message', 'Proses Gagal');
            redirect('controller_juragan/c_juragan_pegawai');
        }
    }

    function aktifkan_Pegawai($id_user) {
        $data = array(
            'status_aktif' => 1,
            'akhir_kerja' => null
        );
        $this->db->set('mulai_kerja', 'NOW()', FALSE);
        if ($this->m_juragan_pegawai->update_status_pegawai("user", $data, "id_user = '$id_user'")) {
            redirect('controller_juragan/c_juragan_pegawai');
        } else {
            $this->session->set_flashdata('message', 'Proses Gagal');
            redirect('controller_juragan/c_juragan_pegawai');
        }
    }

}
