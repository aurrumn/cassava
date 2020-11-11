<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_pegawai_rak extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('model_pegawai/m_pegawai_rak');
        $this->load->helper('url');
    }

    function index() {
        if ($this->cekLogin() == FALSE) {
            redirect(base_url());
        } else {
            $data['data_rak'] = $this->m_pegawai_rak->ambilDataRak();
            $this->template->pegawaiview('pegawai/pegawai_rak', $data);
        }
    }

    // fungsi pengecekan login agar user tidak bisa loncat ke halaman ini tanpa login terlebih dahulu
    function cekLogin() {
        if ($this->session->userdata('login') == FALSE) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    // fungsi untuk me-non-aktifkan status rak
    function non_AktifkanRak($id) {
        $data = array(
            'status_aktif' => 2
        );
        if ($this->m_pegawai_rak->update_status_rak("rakjamur", $data, "id_rak = '$id'")) {
            redirect('controller_pegawai/c_pegawai_rak');
        } else {
            $this->session->set_flashdata('message', 'Proses Gagal');
            redirect('controller_pegawai/c_pegawai_rak');
        }
    }

    // fungsi untuk mengaktifkan status rak
    function aktifkanRak($id) {
        $data = array(
            'status_aktif' => 1
        );
        if ($this->m_pegawai_rak->update_status_rak("rakjamur", $data, "id_rak = '$id'")) {
            redirect('controller_pegawai/c_pegawai_rak');
        } else {
            $this->session->set_flashdata('message', 'Proses Gagal');
            redirect('controller_pegawai/c_pegawai_rak');
        }
    }

    // fungisi ini untuk mengedit data rak
    function edit_data_rak() {
        // memanggil validasi form, ini dari framework CI otomatis
        $this->load->library('form_validation');

        // membuat aturan untuk validasi form
        // aturan penulisan format validasi form : nama input, Nama Error yang mau dimunculkan sebagai pesan, aturan
        // min_length = panjang minima
        //max_length = panjang maximal
        // regex = kesesuaian isi dari inputan 
        // numeric = inputan harus berupa angka
        $this->form_validation->set_rules('lokasi', 'Lokasi', "min_length[5]|max_length[100]|regex_match[/^[a-z A-Z . 0-9']+$/]");
        $this->form_validation->set_rules('tgl_rak', 'Tanggal', 'trim|min_length[11]|max_length[13]|numeric');

        // menjalankan validasi form
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'lokasi' => $this->input->post('lokasi'),
                'tanggal' => $this->input->post('tgl_rak')
            );
            $id_rak = $this->input->post('id_rak');
            if ($this->m_pegawai_rak->update_data_rak("rakjamur", $data, "id_rak = '$id_rak'")) {
                redirect('controller_pegawai/c_pegawai_rak');
            } else {
                $this->session->set_flashdata('message', 'Proses Gagal');
                redirect('controller_pegawai/c_pegawai_rak');
            }
        }else{
            $this->index();
        }
    }

    // fungsi ini untuk mengambil data rak agar bisa di edit
    function ajax_get_data_rak($id) {
        $data = $this->m_pegawai_rak->get_data_rak_for_edit("rakjamur", $id);
        echo json_encode($data);
    }

}

?>