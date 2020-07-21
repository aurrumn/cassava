<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_juragan_data_kriteria extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function ambil_data_kriteria(){
        $this->db->select(array('k.id_kriteria', 'k.kriteria', 'sk.sub_kriteria', 'sk.bobot'));
        $this->db->from('kriteria k join sub_kriteria sk ON (k.id_kriteria = sk.id_kriteria)');
        $this->db->order_by('k.id_kriteria');

        return $this->db->get();
    }
}