<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_pegawai_data_diri extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('model_pegawai/m_pegawai_data_diri');
    }

    function index() {
        if ($this->cekLogin() == FALSE) {
            redirect(base_url());
        } else {
            $id_loged_user = $this->session->userdata('id_user');
            $data['data_diri'] = $this->m_pegawai_data_diri->ambil_data_pegawai("user", "id_user = '$id_loged_user'");
            $this->template->pegawaiview('pegawai/pegawai_data_diri', $data);
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

    // fungsi edit data diri pegawai
    function edit_data_diri($id) {
        $pass = $this->input->post('old_password');
        $passDB = $this->m_pegawai_data_diri->getPass($id);

        // pengecekan kesesuaian password
        if ($this->cekPass($pass, $passDB) == TRUE) {
            // memanggil validasi form, ini dari framework CI otomatis
            $this->load->library('form_validation');

            // membuat aturan untuk validasi form
            // aturan penulisan format validasi form : nama input, Nama Error yang mau dimunculkan sebagai pesan, aturan
            // min_length = panjang minima
            //max_length = panjang maximal
            // regex = kesesuaian isi dari inputan 
            // numeric = inputan harus berupa angka
            $this->form_validation->set_rules('username', 'Username', "min_length[5]|max_length[10]|regex_match[/^[a-z A-Z . 0-9']+$/]");
            $this->form_validation->set_rules('alamat', 'Alamat', "min_length[5]|max_length[30]|regex_match[/^[a-z A-Z . 0-9']+$/]");
            $this->form_validation->set_rules('telephone', 'Telepon', 'trim|min_length[11]|max_length[13]|numeric');
            $this->form_validation->set_rules('new_password', 'Password Baru', "min_length[5]|max_length[10]|required");
            $this->form_validation->set_rules('re_type', 'Password Baru', "min_length[5]|max_length[10]|required");
            // menjalankan validasi form
            if ($this->form_validation->run() == TRUE) {
                $new_pass = $this->input->post('new_password');
                $re_type = $this->input->post('re_type');
                if ($new_pass == $re_type) {
                    $data = array(
                        'username' => $this->input->post('username'),
                        'alamat' => $this->input->post('alamat'),
                        'telephone' => $this->input->post('telephone'),
                        'password' => $new_pass
                    );
                    if ($this->m_pegawai_data_diri->updateDataDiri("user", $data, "id_user = '$id'")) {
                        $this->session->set_flashdata('message', null);
                        $this->session->set_flashdata('message_yey', 'DATA BERHASIL DIRUBAH');
                        redirect(base_url() . 'controller_pegawai/c_pegawai_data_diri');
                    } else {
                        $this->session->set_flashdata('message', 'Error, data tidak berhasil diinputkan');
                        redirect(base_url() . 'controller_pegawai/c_pegawai_data_diri');
                    }
                } else {
                    $this->session->set_flashdata('message', 'Error, kesalahan dalam pengetikan ulang password baru');
                    redirect(base_url() . 'controller_pegawai/c_pegawai_data_diri');
                }
            } else {
                $id_loged_user = $this->session->userdata('id_user');
                $data['data_diri'] = $this->m_pegawai_data_diri->ambil_data_pegawai("user", "id_user = '$id_loged_user'");
                $this->template->pegawaiview('pegawai/pegawai_data_diri', $data);
            }
        } else {
            $this->session->set_flashdata('message', 'User tidak terverivikasi');
            redirect(base_url() . 'controller_pegawai/c_pegawai_data_diri');
        }
    }

    // fungsi ini melakukan pengecekan apakah password lama yang diinputkan sama dengan password yang tersimpan dalam database
    public function cekPass($passForm, $passDB) {
        if ($passDB == $passForm) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
