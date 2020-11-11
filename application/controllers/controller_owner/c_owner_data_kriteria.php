<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_owner_data_kriteria extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('model_owner/m_owner_data_kriteria');
    }

    function index() {
 
           $data['data_kriteria'] = $this->m_owner_data_kriteria->ambil_data_kriteria();
           $this->template->ownerview('owner/owner_data_kriteria', $data);

   }

}