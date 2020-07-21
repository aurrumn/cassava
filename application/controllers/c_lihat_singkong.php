<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_lihat_singkong extends CI_Controller {

    function __construct() {
        parent::__construct();
        // load template dan form validation
        $this->load->library(array('template', 'form_validation'));
        $this->load->helper(array('form', 'url'));
        
        // load model nama modelnya = m_pendaftaran_petani
        $this->load->model('m_lihat_singkong');
    }

    function index() {
        // ini memanggil tampilan, nama tampilannya = v_pendaftaran_petani
        $data['singkong'] = $this->m_lihat_singkong->ambil_data_singkong();
        $this->load->view('v_lihat_singkong', $data);
    }
}