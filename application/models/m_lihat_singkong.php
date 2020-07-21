<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_lihat_singkong extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function ambil_data_singkong(){
        $this->db->select(array('s.id_singkong','s.id_petani', 'p.nama_petani', 'p.alamat', 
            's.id_petugas', 'u.nama', 's.tanggal_masuk', 's.berat','status_singkong', 'ss.keterangan'));
        $this->db->from("`singkong` s "
                . "JOIN petani p on (s.id_petani = p.id_petani) "
                . "JOIN user u on (s.id_petugas = u.id_user) "
                . "JOIN status_singkong ss on (s.status_singkong = ss.id_status)");
        $this->db->order_by("s.status_singkong DESC");
        return $this->db->get();
    }
}