<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_juragan_pegawai extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function ambil_data_pegawai($where) {
        $this->db->select(array('u.id_user', 'u.username', 'u.nama', 'u.alamat', 'u.status_aktif', 'u.telephone', 'u.mulai_kerja', 'u.akhir_kerja',
            'sa.keterangan_aktif as aktif'));
        $this->db->from('`user` u JOIN statusaktif sa ON (u.status_aktif = sa.id_aktif) ');
        $this->db->where($where);

        return $this->db->get();
    }
    
   // fungsi ini untuk merubah status pegawai dari aktif ke non-aktif ataupun sebaliknya
    function update_status_pegawai($table, $data, $where) {
        return $this->db->update($table, $data, $where);
    }
    
    // fungsi untuk memasukkan data pegawai baru
    function tambah_pegawai($table ='', $data=''){
    	return $this->db->insert($table, $data);
    }
    
    // fungsi ini digunakan untuk mengupdate tanggal mulai kerja menjadi now()
    function update_akhir_kerja($id){
        $query = $this->db->query("UPDATE `user` SET akhir_kerja = now() where id_user ='$id'");
        return $query;
    }
    
    // fungsi ini digunakan untuk memeriksa username di database
    function cek_username($username){
        $this->db->from("user");
        $this->db->where("username = '$username'");
        return $this->db->get()->num_rows();
    }

//    function ambil_data(){
//        $query = $this->db->query("SELECT u.id_user, u.username, u.nama, u.alamat, u.status_aktif, u.telephone, sa.keterangan_aktif as aktif "
//                . "FROM `user` u JOIN statusaktif sa on u.status_aktif = sa.id_aktif "
//                . "WHERE u.status_aktif = 1 and u.level_akses = 2");
//        return $query->result_array();
//    }
}
