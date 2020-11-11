<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_owner_pegawai extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('model_owner/m_owner_pegawai');
    }

    function index() {

            $data['data_pegawai'] = $this->m_owner_pegawai->ambil_data_pegawai("u.level_akses = 2");
            $this->template->ownerview('owner/owner_pegawai', $data);
    }

    function non_Aktifkan_Pegawai($id_user) {
        $data = array(
            'status_aktif' => 2
        );
        $this->db->set('akhir_kerja', 'NOW()', FALSE);
        if ($this->m_owner_pegawai->update_status_pegawai("user", $data, "id_user = '$id_user'")) {
            redirect('controller_owner/c_owner_pegawai');
        } else {
            $this->session->set_flashdata('message', 'Proses Gagal');
            redirect('controller_owner/c_owner_pegawai');
        }
    }

    function aktifkan_Pegawai($id_user) {
        $data = array(
            'status_aktif' => 1,
            'akhir_kerja' => null
        );
        $this->db->set('mulai_kerja', 'NOW()', FALSE);
        if ($this->m_owner_pegawai->update_status_pegawai("user", $data, "id_user = '$id_user'")) {
            redirect('controller_owner/c_owner_pegawai');
        } else {
            $this->session->set_flashdata('message', 'Proses Gagal');
            redirect('controller_owner/c_owner_pegawai');
        }
    }

}
