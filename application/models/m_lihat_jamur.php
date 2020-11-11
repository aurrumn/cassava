<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_lihat_jamur extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function ambil_data_jamur(){
        $this->db->select(array('j.id_jamur','j.id_rak', 'r.nama_rak', 'r.lokasi', 
            's.id_petugas', 'u.nama', 'j.tanggal_masuk', 'j.berat','status_jamur', 'sj.keterangan'));
        $this->db->from("`jamur` j "
                . "JOIN rak r on (j.id_rak = r.id_rak) "
                . "JOIN user u on (j.id_petugas = u.id_user) "
                . "JOIN status_jamur sj on (j.status_jamur = sj.id_status)");
        $this->db->order_by("j.status_jamur DESC");
        return $this->db->get();
    }
}