<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_login extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // mengecek apakah user terdaftar dalam database
    function cekExistensiUsername($table, $where) {
        $this->db->from($table);
        $this->db->where($where);

        return $this->db->get();
    }

    // mengambil nilai password dari database berdasarkan username yang diinputkan
    function getPass($username) {
        $result = $this->db->query("SELECT password from user where username = '$username'");
        foreach ($result->result_array() AS $rowt) {
            $pass = $rowt['password'];
            return $pass;
        }
    }

    // mendeteksi level akses
    function deteksiLevelAkses($username, $password) {
        $query = $this->db->query("SELECT level_akses from user u WHERE u.username = '$username' and u.password = '$password'");
        foreach ($query->result_array() AS $rowt) {
            $akses = $rowt['level_akses'];
            return $akses;
        }
    }

}
