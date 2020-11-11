<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_pendaftaran_rak extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // query input ke database
    function tambahDataRak($table ='', $data=''){
    	return $this->db->insert($table, $data);
    }
}