<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_pegawai_rak extends CI_Model {

    function __construct() {
        parent::__construct();
    }

// fungsi ini digunakan untuk mengambil data rak yang nantinya ditampilkan pada view bos_rak
    function ambilDataRak() {
        $query = $this->db->query("SELECT r.id_rak, r.nama_rak, r.lokasi, r.tgl_rak, r.status_aktif as aksi,

            sa.keterangan_aktif as status FROM rakjamur r

        JOIN statusaktif sa on r.status_aktif = sa.id_aktif
        ORDER BY r.nama_rak");
        return $query->result_array();
    }

    // fungsi ini untuk merubah status rak dari aktif ke non-aktif ataupun sebaliknya
    function update_status_rak($table, $data, $where) {
        return $this->db->update($table, $data, $where);
    }

    // fungi ini untuk mengambil data rak yang mau di edit, diambil dari database
    function get_data_rak_for_edit($table, $where_id) {
        $this->db->from($table);
        $this->db->where('id_rak', $where_id);
        $query = $this->db->get();
        return $query->row();
    }

    // fungsi ini digunakan untuk menyimpan perubahan data rak
    function update_data_rak($table, $data, $where) {
        // Kode ini digunakan untuk merubah record yang sudah ada dalam sebuah tabel
        $res = $this->db->update($table, $data, $where);
        return $res;
    }

}
