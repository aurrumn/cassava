<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_login');
    }

    function index() {
        $datauser = array(
            'login' => NULL
        );
        $this->session->set_userdata($datauser);
        $this->load->view('v_login');
    }

    function masuksistem() {
        // menghapus pesan peringatan
        $this->hapusPesanPeringatan();

        // mengambil nilai inputan
        $username = $this->input->post('username');
        $pass = $this->input->post('password');

        //pengecekan jika inputan kosong
        if ($username == "" || $pass == "") {
            $this->session->set_flashdata('message', 'Gagal LOGIN, Username atau Pasword KOSONG');
            redirect(base_url() . 'c_login');
        } else {
            // jika form login tidak kosong maka ini yang akan terjadi:
            // mendeteksi apakah user terdaftar dan aktif di database
            $deteksiUser = $this->m_login->cekExistensiUsername('user', "username ='$username' and password ='$pass' and status_aktif = 1");
            if ($deteksiUser->num_rows() > 0) {
                // mengambil nilai password dari database berdasarkan username yang diinputkan
                $passDB = $this->m_login->getPass($username);
                // melakukn pengecekan apakah password yang diinputkan sama dengan password yang ada pada database
                if ($this->cekPass($pass, $passDB) == TRUE) {
                    // mengambil data user yang aktif dari database
                    $data = $deteksiUser->row();

                    // membuat session user data
                    $datauser = array(
                        'id_user' => $data->id_user,
                        'nama_user' => $data->nama,
                        'login' => TRUE
                    );
                    $this->session->set_userdata($datauser);
                    // mengecek level akses user yang login
                    if ($this->m_login->deteksiLevelAkses($username, $pass) == 1) {
                        // jika yang login itu BOS
                        redirect(base_url() . 'controller_juragan/c_juragan_petani');

                    } else {
                        // jika yang login pegawai
                        redirect(base_url() . 'controller_pegawai/c_pegawai_data_diri');
                    }
                }
            } else {
                // jika username atau password salah, menampilkan pesan notifikasi
                $this->session->set_flashdata('message', 'Username atau Password Salah');
                redirect(base_url() . 'c_login');
            }
        }
    }

    // fungsi ini digunakan untuk mengecek password dari database dengan data yang diinputkan pada form login
    public function cekPass($passForm, $passDB) {
        if ($passDB == $passForm) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // fungsi ini digunakan untuk menghapus pesan peringatan
    function hapusPesanPeringatan() {
        $this->session->set_flashdata('message_daftar', null);
        $this->session->set_flashdata('message', null);
    }

}

?>