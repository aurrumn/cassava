<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_owner_rak extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('model_owner/m_owner_rak');
        $this->load->helper('url');
    }

    function index() {
        // if ($this->cekLogin() == FALSE) {
        //     redirect(base_url());
        // } else {
            $data['data_rak'] = $this->m_owner_rak->ambilDataRak();
            $this->template->ownerview('owner/owner_rak', $data);
        // }
    }

    // fungsi pengecekan login agar user tidak bisa loncat ke halaman ini tanpa login terlebih dahulu
    // function cekLogin() {
    //     if ($this->session->userdata('login') == 0) {
    //         return FALSE;
    //     } else {
    //         return TRUE;
    //     }
    // }

}

?>