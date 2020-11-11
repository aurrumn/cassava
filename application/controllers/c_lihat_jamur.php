<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_lihat_jamur extends CI_Controller {

    function __construct() {
        parent::__construct();
        // load template dan form validation
        $this->load->library(array('template', 'form_validation'));
        $this->load->helper(array('form', 'url'));
        
        // load model nama modelnya = m_pendaftaran_rak
        $this->load->model('m_lihat_jamur');
    }

    function index() {
        // ini memanggil tampilan, nama tampilannya = v_pendaftaran_rak
        $data['jamur'] = $this->m_lihat_jamur->ambil_data_jamur();
        $this->load->view('v_lihat_jamur', $data);
    }
}