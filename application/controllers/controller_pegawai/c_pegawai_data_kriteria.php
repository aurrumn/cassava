<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_pegawai_data_kriteria extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('model_pegawai/m_pegawai_data_kriteria');
    }

    function index() {
        if ($this->cekLogin() == FALSE) {
            redirect(base_url());
        } else {
            $data['data_kriteria'] = $this->m_pegawai_data_kriteria->ambil_data_kriteria();
            $this->template->pegawaiview('pegawai/pegawai_data_kriteria', $data);
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
}