<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_juragan_petani extends CI_Model {

    function __construct() {
        parent::__construct();
    }

// fungsi ini digunakan untuk mengambil data petani yang nantinya ditampilkan pada view bos_petani
    function ambilDataPetani() {
        $query = $this->db->query("SELECT p.id_petani, p.nama_petani, p.alamat, p.telepon, p.status_aktif as aksi,
            g.keterangan as gender, 
            sa.keterangan_aktif as status FROM petani p
        JOIN gender g on p.jenis_kelamin = g.id_gender
        JOIN statusaktif sa on p.status_aktif = sa.id_aktif
        ORDER BY p.nama_petani");
        return $query->result_array();
    }

    // fungsi ini untuk merubah status petani dari aktif ke non-aktif ataupun sebaliknya
    function update_status_petani($table, $data, $where) {
        return $this->db->update($table, $data, $where);
    }

    // fungi ini untuk mengambil data petani yang mau di edit, diambil dari database
    function get_data_petani_for_edit($table, $where_id) {
        $this->db->from($table);
        $this->db->where('id_petani', $where_id);
        $query = $this->db->get();
        return $query->row();
    }

    // fungsi ini digunakan untuk menyimpan perubahan data petani
    function update_data_petani($table, $data, $where) {
        // Kode ini digunakan untuk merubah record yang sudah ada dalam sebuah tabel
        $res = $this->db->update($table, $data, $where);
        return $res;
    }

}
