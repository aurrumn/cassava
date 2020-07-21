<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insert($table = '', $data = '') {
        return $this->db->insert($table, $data);
    }

    function get_all($table) {
        $this->db->from($table);

        return $this->db->get();
    }

    function get_where($table, $where) {
        $this->db->from($table);
        $this->db->where($where);

        return $this->db->get();
    }

    function update($table = null, $data = null, $where = null) {
        return $this->db->update($table, $data, $where);
    }

    function delete($table = null, $where = null) {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function getPass($username) {
        $result = $this->db->query("SELECT password from t_users where username = '$username' || email = '$username'");
        foreach ($result->result_array() AS $rowt) {
            $pass = $rowt['password'];
            return $pass;
        }
    }
    
    public function cekAdmin($username, $password){
        $query = $this->db->query("SELECT level_akses from t_users u WHERE u.username = '$username' and u.password = '$password'");
        foreach ($query->result_array() AS $rowt) {
            $akses = $rowt['level_akses'];
            return $akses;
        }
    }

}
