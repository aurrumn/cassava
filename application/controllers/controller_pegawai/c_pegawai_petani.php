<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_pegawai_petani extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('model_pegawai/m_pegawai_petani');
        $this->load->helper('url');
    }

    function index() {
        if ($this->cekLogin() == FALSE) {
            redirect(base_url());
        } else {
            $data['data_petani'] = $this->m_pegawai_petani->ambilDataPetani();
            $this->template->pegawaiview('pegawai/pegawai_petani', $data);
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

    // fungsi untuk me-non-aktifkan status petani
    function non_AktifkanPetani($id) {
        $data = array(
            'status_aktif' => 2
        );
        if ($this->m_pegawai_petani->update_status_petani("petani", $data, "id_petani = '$id'")) {
            redirect('controller_pegawai/c_pegawai_petani');
        } else {
            $this->session->set_flashdata('message', 'Proses Gagal');
            redirect('controller_pegawai/c_pegawai_petani');
        }
    }

    // fungsi untuk mengaktifkan status petani
    function aktifkanPetani($id) {
        $data = array(
            'status_aktif' => 1
        );
        if ($this->m_pegawai_petani->update_status_petani("petani", $data, "id_petani = '$id'")) {
            redirect('controller_pegawai/c_pegawai_petani');
        } else {
            $this->session->set_flashdata('message', 'Proses Gagal');
            redirect('controller_pegawai/c_pegawai_petani');
        }
    }

    // fungisi ini untuk mengedit data petani
    function edit_data_petani() {
        // memanggil validasi form, ini dari framework CI otomatis
        $this->load->library('form_validation');

        // membuat aturan untuk validasi form
        // aturan penulisan format validasi form : nama input, Nama Error yang mau dimunculkan sebagai pesan, aturan
        // min_length = panjang minima
        //max_length = panjang maximal
        // regex = kesesuaian isi dari inputan 
        // numeric = inputan harus berupa angka
        $this->form_validation->set_rules('alamat', 'Alamat', "min_length[5]|max_length[100]|regex_match[/^[a-z A-Z . 0-9']+$/]");
        $this->form_validation->set_rules('telepon-kontak', 'Telepon', 'trim|min_length[11]|max_length[13]|numeric');

        // menjalankan validasi form
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'alamat' => $this->input->post('alamat'),
                'telepon' => $this->input->post('telepon-kontak')
            );
            $id_petani = $this->input->post('id_petani');
            if ($this->m_pegawai_petani->update_data_petani("petani", $data, "id_petani = '$id_petani'")) {
                redirect('controller_pegawai/c_pegawai_petani');
            } else {
                $this->session->set_flashdata('message', 'Proses Gagal');
                redirect('controller_pegawai/c_pegawai_petani');
            }
        }else{
            $this->index();
        }
    }

    // fungsi ini untuk mengambil data petani agar bisa di edit
    function ajax_get_data_petani($id) {
        $data = $this->m_pegawai_petani->get_data_petani_for_edit("petani", $id);
        echo json_encode($data);
    }

}

?>