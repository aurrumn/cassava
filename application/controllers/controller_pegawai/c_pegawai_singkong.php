<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_pegawai_singkong extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('model_pegawai/m_pegawai_singkong');
        $this->load->helper('url');
    }

    function index() {
        if ($this->cekLogin() == FALSE) {
            redirect(base_url());
        } else {
            $data['data_singkong'] = $this->m_pegawai_singkong->ambil_data_singkong();
            $this->template->pegawaiview('pegawai/pegawai_singkong', $data);
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

    // fungsi ini digunakan untuk menginputkan data singkong petani ke database
    function tambah_singkong($id_petani) {
        $this->load->library('form_validation');

        // membuat aturan untuk validasi form
        // aturan penulisan format validasi form : nama input, Nama Error yang mau dimunculkan sebagai pesan, aturan
        // min_length = panjang minima
        // max_length = panjang maximal
        // regex = kesesuaian isi dari inputan 
        // numeric = inputan harus berupa angka
        $this->form_validation->set_rules('berat_singkong', 'Berat', 'trim|min_length[1]|max_length[4]|numeric');
        if ($this->form_validation->run() == TRUE) {
            $id_petugas = $this->session->userdata('id_user');
            $data = array(
                'id_petani' => $id_petani,
                'id_petugas' => $id_petugas,
                'berat' => $this->input->post('berat_singkong'),
                'status_singkong' => 1
            );
            $this->db->set('tanggal_masuk', 'NOW()', FALSE);

            if ($this->m_pegawai_singkong->tambahkan_singkong("singkong", $data)) {
                $this->session->set_flashdata('message', 'Data Singkong BERHASIL Ditambahkan');
                redirect(base_url() . 'controller_pegawai/c_pegawai_petani');
            } else {
                $this->session->set_flashdata('message_gagal', 'Data Singkong GAGAL Ditambahkan');
                redirect(base_url() . 'controller_pegawai/c_pegawai_petani');
            }
        } else {
            $this->load->view(base_url() . 'pegawai/pegawai_petani');
        }
    }

    // fungsi ini digunakan untuk mengambil data singkong dari database untuk kepentingan edit data singkong
    function edit_data_singkong($id) {
        $data['detail_singkong'] = $this->m_pegawai_singkong->get_data_singkong_for_edit($id);
        $data['list_petani'] = $this->m_pegawai_singkong->get_semua_petani_aktif();
        $this->template->pegawaiview('pegawai/pegawai_singkong_edit', $data);
    }

    // fungsi ini digunakan untuk menyimpan perubahan data singkong
    function simpan_perubahan_data_singkong() {
        $id_singkong = $this->input->post('id_singkong');
        $this->load->library('form_validation');

        // membuat aturan untuk validasi form
        // aturan penulisan format validasi form : nama input, Nama Error yang mau dimunculkan sebagai pesan, aturan
        // min_length = panjang minima
        // max_length = panjang maximal
        // regex = kesesuaian isi dari inputan 
        // numeric = inputan harus berupa angka
        $this->form_validation->set_rules('berat', 'Berat Singkong', 'trim|min_length[1]|max_length[4]|numeric');
        if ($this->form_validation->run() == TRUE) {
            $id_petani;
            if ($this->input->post('id_petani_new') == 0) {
                $id_petani = $this->input->post('id_petani_old');
            } else {
                $id_petani = $this->input->post('id_petani_new');
            }

            $data = array(
                'id_petani' => $id_petani,
                'berat' => $this->input->post('berat')
            );
            $this->m_pegawai_singkong->update_data("singkong", $data, "id_singkong = '$id_singkong'");
            $this->session->set_flashdata('message', 'Data Singkong BERHASIL DIUBAH');
            redirect(base_url() . 'controller_pegawai/c_pegawai_singkong');
        } else {
            $this->session->set_flashdata('message_gagal', 'Data GAGAL DIUBAH | berat singkong melebihi batasan');
            redirect(base_url() . 'controller_pegawai/c_pegawai_singkong/edit_data_singkong/' . $id_singkong);
        }
    }

    // -------------------------------------------------------------------------
    // 
    // fungsi ini untuk memanggil tampilan form penilaian singkong
    function penilaian_singkong($id_singkong) {
        // mengambil detail data singkong yang akan dinilai meliputi id, nama petani, tgl masu, dan berat
        $data['detail_singkong'] = $this->m_pegawai_singkong->select_where(array('id_singkong', 'p.id_petani',
            'nama_petani', 'tanggal_masuk', 'berat')
                , "singkong s JOIN petani p ON(s.id_petani = p.id_petani)", "id_singkong ='$id_singkong'");

        // mengambil data nama nama kriteria yang ada di databse untuk di jadikan labe dalam form
        $data['kriteria'] = $this->m_pegawai_singkong->select_all_order_by("kriteria", "id_kriteria");
        // mengambil subkriteria dan masing-masing nilainya
        $data['sub_kriteria'] = $this->m_pegawai_singkong->select_all_order_by("sub_kriteria", "id_sub_kriteria");

        // memanggil atau menampilkan form penilaian singkong
        $this->template->pegawaiview('pegawai/pegawai_singkong_penilaian', $data);
    }

    // fungsi ini digunakan untuk menyimpan hasil dari penilaian
    function simpan_penilaian() {
        // input data ke tabel periksa
        $data_periksa = array(
            'id_singkong' => $this->input->post('id_singkong'),
            'id_petugas' => $this->session->userdata('id_user')
        );
        $this->db->set('tanggal', 'NOW()', FALSE);
        $this->m_pegawai_singkong->insert("periksa", $data_periksa);
        // ambil id_periksa terakhir
        $id_periksa = $this->m_pegawai_singkong->get_last_id_periksa();
        for ($i = 1; $i < 6; $i++) {
            // menseting string untuk identifikasi inputan dropdown
            $nk = "nilai_kriteria_" . $i;
            $data_detail_periksa = array(
                'id_periksa' => $id_periksa,
                // ambil inputan dropdown
                'id_subkriteria' => $this->input->post($nk)
            );
            $this->m_pegawai_singkong->insert("detail_periksa", $data_detail_periksa);
        }
        // baris kode ini digunakan untuk merubah data status singkong
        $id_singkong = $this->input->post('id_singkong');
        $data_update_status = array(
            'status_singkong' => 2
        );
        $this->m_pegawai_singkong->update_data("singkong", $data_update_status, "id_singkong = '$id_singkong'");

        $this->session->set_flashdata('message', "Data Singkong BERHASIL DINILAI");
        redirect(base_url() . 'controller_pegawai/c_pegawai_singkong');
    }

    // fungsi ini digunakan untuk melihat detail data singkong
    function lihat_detail_singkong($id_singkong) {
        $data['id_singkong'] = $id_singkong;

        //mengambil data singkong untuk ditampilkan detailnya
        $tabel_singkong = "singkong s JOIN petani p ON(s.id_petani = p.id_petani) "
                . "JOIN user u ON (s.id_petugas = u.id_user) "
                . "JOIN status_singkong ss ON (s.status_singkong = ss.id_status)";

        $select_data_singkong = "p.nama_petani, p.alamat as alamat_petani, p.telepon as telepon_petani,"
                . "s.id_petugas, u.nama as petugas, u.telephone as kontak_petugas,"
                . "s.tanggal_masuk, s.berat,"
                . "ss.keterangan";
        $detail_singkong = $this->m_pegawai_singkong->select_where($select_data_singkong, $tabel_singkong, "id_singkong = '$id_singkong'");

        foreach ($detail_singkong->result() as $key) {
            $data['nama_petani'] = $key->nama_petani;
            $data['alamat_petani'] = $key->alamat_petani;
            $data['telepon_petani'] = $key->telepon_petani;

            $data['petugas'] = $key->petugas;
            $data['kontak_petugas'] = $key->kontak_petugas;


            $data['tgl_masuk'] = $key->tanggal_masuk;
            $data['berat'] = $key->berat;

            $data['status'] = $key->keterangan;
        }

        // mengambil data penilaian
        $tabel_penilaian = "periksa p JOIN detail_periksa dp ON (p.id_periksa = dp.id_periksa) "
                . "JOIN sub_kriteria sk ON (dp.id_subkriteria = sk.id_sub_kriteria)";
        $data['detail_penilaian'] = $this->m_pegawai_singkong->get_where($tabel_penilaian, "p.id_singkong = '$id_singkong'");

        $periksa = $this->m_pegawai_singkong->select_where(array('id_periksa','tanggal'), "periksa", "id_singkong = '$id_singkong'");
        foreach ($periksa->result() as $key) {
            $data['id_periksa'] = $key->id_periksa;
            $data['tanggal_periksa'] = $key->tanggal;
        }
        // mengambil nama kriteria
        $data['nama_kriteria'] = $this->m_pegawai_singkong->select_all("kriteria");

        $this->template->pegawaiview('pegawai/pegawai_singkong_penilaian_detail', $data);
    }

    function go_edit_penilaian($id_periksa) {
        $tabel_data_lama = "sub_kriteria sk "
                . "JOIN detail_periksa dp ON(sk.id_sub_kriteria = dp.id_subkriteria) "
                . "JOIN kriteria k ON (sk.id_kriteria = k.id_kriteria) ";
        $data['data_lama'] = $this->m_pegawai_singkong->get_where($tabel_data_lama, "id_periksa = '$id_periksa'");

        // mengambil data nama nama kriteria yang ada di databse untuk di jadikan labe dalam form
        $data['kriteria'] = $this->m_pegawai_singkong->select_all_order_by("kriteria", "id_kriteria");
        // mengambil subkriteria dan masing-masing nilainya
        $data['sub_kriteria'] = $this->m_pegawai_singkong->select_all_order_by("sub_kriteria", "id_sub_kriteria");

        $this->template->pegawaiview('pegawai/pegawai_singkong_penilaian_ubah', $data);
    }

    function simpan_edit_penilaian() {
        $id_periksa = $this->input->post('id_periksa');
        for ($i = 1; $i < 6; $i++) {
            // setting string untuk mengampbil inputan dropdown
            $nk = "nilai_kriteria_" . $i;
            
            // setting string untuk mengambil inputan id detail periksa
            $dp = "detail_" . $i;
            
            // ambil id detail periksa dari form
            $id_detail_periksa = $this->input->post($dp);
            
            $data_detail_periksa = array(
                // ambil nilai subkriteria dari dropdown 
                'id_subkriteria' => $this->input->post($nk)
            );
            // update data detail penilaian
            $this->m_pegawai_singkong->update("detail_periksa", $data_detail_periksa, "id_detail_periksa = '$id_detail_periksa'");
        }
        // setting tanggal baru setelah update data penilaian 
        $this->db->set('tanggal', 'NOW()', FALSE);
        $this->m_pegawai_singkong->update_tanggal_periksa($id_periksa);
        
        // mengembalikan ke tampilan awal singkong
        $this->session->set_flashdata('message', 'Data Penilaian Singkong BERHASIL DIUBAH');
        $data['data_singkong'] = $this->m_pegawai_singkong->ambil_data_singkong();
        $this->template->pegawaiview('pegawai/pegawai_singkong', $data);
    }

}
