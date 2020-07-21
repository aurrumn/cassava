<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_juragan_petani extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('model_juragan/m_juragan_petani');
        $this->load->helper('url');
    }

    function index() {
        if ($this->cekLogin() == FALSE) {
            redirect(base_url());
        } else {
            $data['data_petani'] = $this->m_juragan_petani->ambilDataPetani();
            $this->template->juraganview('juragan/juragan_petani', $data);
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

?>