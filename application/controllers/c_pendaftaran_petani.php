<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_pendaftaran_petani extends CI_Controller {

    function __construct() {
        parent::__construct();
        // load template dan form validation
        $this->load->library(array('template', 'form_validation'));
        $this->load->helper(array('form', 'url'));
        // load model nama modelnya = m_pendaftaran_petani
        $this->load->model('m_pendaftaran_petani');
    }

    function index() {
        // ini memanggil tampilan, nama tampilannya = v_pendaftaran_petani
        $this->load->view('v_pendaftaran_petani');
    }

    function daftar() {
        
        // memanggil validasi form, ini dari framework CI otomatis
        $this->load->library('form_validation');
        
        // membuat aturan untuk validasi form
        // aturan penulisan format validasi form : nama input, Nama Error yang mau dimunculkan sebagai pesan, aturan
        // min_length = panjang minima
        //max_length = panjang maximal
        // regex = kesesuaian isi dari inputan 
        // numeric = inputan harus berupa angka
        $this->form_validation->set_rules('nama-petani', 'Nama Petani', "min_length[3]|max_length[20]|regex_match[/^[a-z A-Z']+$/]");
        $this->form_validation->set_rules('alamat', 'Alamat', "min_length[5]|max_length[100]|regex_match[/^[a-z A-Z . 0-9']+$/]");
        $this->form_validation->set_rules('telepon-kontak', 'Telepon', 'trim|min_length[11]|max_length[13]|numeric');

        // menjalankan validasi form
        if ($this->form_validation->run() == TRUE) {
            
            // mengambil nilai dari formulir
            $tanggal = $this->input->post('tglLahir');
            $data = array(
                'nama_petani' => $this->input->post('nama-petani'),
                'alamat' => $this->input->post('alamat'),
                'tgl_lahir' => $this->rubah_tanggal($tanggal),
                'telepon' => $this->input->post('telepon-kontak'),
                'jenis_kelamin' => $this->input->post('gender'),
                'status_aktif' => 1
            );
//            echo $data['tgl_lahir'];
//            
            // memasukkan data ke database
            if ($this->m_pendaftaran_petani->tambahDataPetani('petani', $data)) {
                //membuat pesan data berhasil disimpan
                $this->session->set_flashdata('message_daftar', 'Data Petani Baru Berhasil Ditambahkan');
                // mengarahkan ke tampilan login
                redirect(base_url());
            } else {
                // ini jika data tidak berhasil diinputkan
                echo '<script type="text/javascript">alert("Penamabahan data GAGAL");</script>';
                redirect(base_url() . 'c_pendaftaran_petani');
            }
        } else {
            // ini jika data yang diinputkan tidak sesuai dengan validasi form
            $this->load->view('v_pendaftaran_petani');
        }
    }
    
    // merubah format tanggal sesuai dengan format tanggal database
    // explode = memecah berdasarkan (paramater, kalimat yang dipecah)
    public function rubah_tanggal($tgl) {
        $exp = explode('/', $tgl);
        if (count($exp) == 3) {
            // menyusun ulang tanggal
            $tgl = $exp[2] . '-' . $exp[0] . '-' . $exp[1];
        }
        // mengembalikan nilai tanggal yang telah disusun ulang untuk mmenuhi format databse
        return $tgl;
    }

}

?>