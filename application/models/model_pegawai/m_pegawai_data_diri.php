<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_pegawai_data_diri extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function ambil_data_pegawai($table, $where) {
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get();
    }
    function getPass($id_user) {
        $result = $this->db->query("SELECT password from user where id_user = '$id_user'");
        foreach ($result->result_array() AS $rowt) {
            $pass = $rowt['password'];
            return $pass;
        }
    }
    
    function updateDataDiri($table = null, $data = null, $where = null) {
        return $this->db->update($table, $data, $where);
    }

}
