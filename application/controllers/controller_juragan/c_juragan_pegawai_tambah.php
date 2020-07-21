<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_juragan_pegawai_tambah extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('model_juragan/m_juragan_pegawai');
    }

    function index() {
        if ($this->cekLogin() == FALSE) {
            redirect(base_url());
        } else {
            $this->template->juraganview('juragan/juragan_pegawai_tambah');
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

    // fungsi ini untuk menambahkan data pegawai baru kedalam sistem
    function tambah_pegawai() {
        // memanggil validasi form, ini dari framework CI otomatis
        $this->load->library('form_validation');

        // membuat aturan untuk validasi form
        // aturan penulisan format validasi form : nama input, Nama Error yang mau dimunculkan sebagai pesan, aturan
        // min_length = panjang minima
        // max_length = panjang maximal
        // regex = kesesuaian isi dari inputan 
        // numeric = inputan harus berupa angka
        $this->form_validation->set_rules('username', 'Username', "min_length[5]|max_length[8]|regex_match[/^[a-z A-Z 0-9']+$/]");
        $this->form_validation->set_rules('nama', 'Nama Asli', "min_length[3]|max_length[30]|regex_match[/^[a-z A-Z']+$/]");
        $this->form_validation->set_rules('alamat', 'Alamat', "min_length[10]|max_length[30]|regex_match[/^[a-z A-Z . 0-9']+$/]");
        $this->form_validation->set_rules('telephone', 'Telepon', 'trim|min_length[11]|max_length[13]|numeric');

        if ($this->form_validation->run() == TRUE) {
            if ($this->m_juragan_pegawai->cek_username($this->input->post('username')) == 0) {
                // mengambil nilai dari formulir
                $data = array(
                    'username' => $this->input->post('username'),
                    'password' => '123',
                    'nama' => $this->input->post('nama'),
                    'alamat' => $this->input->post('alamat'),
                    'jenis_kelamin' => $this->input->post('gender'),
                    'telephone' => $this->input->post('telephone'),
                    'status_aktif' => 1,
                    'level_akses' => 2,
                    'akhir_kerja' => null
                );
                $this->db->set('mulai_kerja', 'NOW()', False);
                // memasukkan data ke database
                if ($this->m_juragan_pegawai->tambah_pegawai('user', $data)) {
                    // membuat update mulai bekerja
                    //membuat pesan data berhasil disimpan
                    $this->session->set_flashdata('message', 'Data Pegawai Baru Berhasil Ditambahkan');
                    // mengarahkan ke tampilan data pegawai
                    redirect(base_url() . 'controller_juragan/c_juragan_pegawai');
                } else {
                    // ini jika data tidak berhasil diinputkan
                    echo '<script type="text/javascript">alert("Penamabahan data GAGAL");</script>';
                    redirect(base_url() . 'controller_juragan/c_juragan_pegawai_tambah');
                }
            } else {
                $this->session->set_flashdata('message_error', 'Maaf, Username Telah Digunakan');
                // mengarahkan ke tampilan data pegawai
                redirect(base_url() . 'controller_juragan/c_juragan_pegawai_tambah');
            }
        } else {
            // ini jika data yang diinputkan tidak sesuai dengan validasi form
            $this->template->juraganview('juragan/juragan_pegawai_tambah');
        }
    }

}

?>