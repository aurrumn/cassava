<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class c_pegawai_jamur extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('model_pegawai/m_pegawai_jamur');
        $this->load->helper('url');
    }

    function index() {
        if ($this->cekLogin() == FALSE) {
            redirect(base_url());
        } else {
            $data['data_jamur'] = $this->m_pegawai_jamur->ambil_data_jamur();
            $this->template->pegawaiview('pegawai/pegawai_jamur', $data);
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

    // fungsi ini digunakan untuk menginputkan data jamur rak ke database
    function tambah_jamur($id_rak) {
        $this->load->library('form_validation');

        // membuat aturan untuk validasi form
        // aturan penulisan format validasi form : nama input, Nama Error yang mau dimunculkan sebagai pesan, aturan
        // min_length = panjang minima
        // max_length = panjang maximal
        // regex = kesesuaian isi dari inputan 
        // numeric = inputan harus berupa angka
        $this->form_validation->set_rules('berat_jamur', 'Berat', 'trim|min_length[1]|max_length[4]|numeric');
        if ($this->form_validation->run() == TRUE) {
            $id_petugas = $this->session->userdata('id_user');
            $data = array(
                'id_rak' => $id_rak,
                'id_petugas' => $id_petugas,
                'berat' => $this->input->post('berat_jamur'),
                'status_jamur' => 1
            );
            $this->db->set('tanggal_masuk', 'NOW()', FALSE);

            if ($this->m_pegawai_jamur->tambahkan_jamur("jamur", $data)) {
                $this->session->set_flashdata('message', 'Data Jamur BERHASIL Ditambahkan');
                redirect(base_url() . 'controller_pegawai/c_pegawai_rak');
            } else {
                $this->session->set_flashdata('message_gagal', 'Data Jamur GAGAL Ditambahkan');
                redirect(base_url() . 'controller_pegawai/c_pegawai_rak');
            }
        } else {
            $this->load->view(base_url() . 'pegawai/pegawai_rak');
        }
    }

    // fungsi ini digunakan untuk mengambil data jamur dari database untuk kepentingan edit data jamur
    function edit_data_jamur($id) {
        $data['detail_jamur'] = $this->m_pegawai_jamur->get_data_jamur_for_edit($id);
        $data['list_rak'] = $this->m_pegawai_jamur->get_semua_rak_aktif();
        $this->template->pegawaiview('pegawai/pegawai_jamur_edit', $data);
    }

    // fungsi ini digunakan untuk menyimpan perubahan data jamur
    function simpan_perubahan_data_jamur() {
        $id_jamur = $this->input->post('id_jamur');
        $this->load->library('form_validation');

        // membuat aturan untuk validasi form
        // aturan penulisan format validasi form : nama input, Nama Error yang mau dimunculkan sebagai pesan, aturan
        // min_length = panjang minima
        // max_length = panjang maximal
        // regex = kesesuaian isi dari inputan 
        // numeric = inputan harus berupa angka
        $this->form_validation->set_rules('berat', 'Berat jamur', 'trim|min_length[1]|max_length[4]|numeric');
        if ($this->form_validation->run() == TRUE) {
            //$id_rak;
            if ($this->input->post('id_rak_new') == 0) {
                $id_rak = $this->input->post('id_rak_old');
            } else {
                $id_rak = $this->input->post('id_rak_new');
            }

            $data = array(
                'id_rak' => $id_rak,
                'berat' => $this->input->post('berat')
            );
            $this->m_pegawai_jamur->update_data("jamur", $data, "id_jamur = '$id_jamur'");
            $this->session->set_flashdata('message', 'Data jamur BERHASIL DIUBAH');
            redirect(base_url() . 'controller_pegawai/c_pegawai_jamur');
        } else {
            $this->session->set_flashdata('message_gagal', 'Data GAGAL DIUBAH | berat jamur melebihi batasan');
            redirect(base_url() . 'controller_pegawai/c_pegawai_jamur/edit_data_jamur/' . $id_jamur);
        }
    }

    // -------------------------------------------------------------------------
    // 
    // fungsi ini untuk memanggil tampilan form penilaian jamur
    function penilaian_jamur($id_jamur) {
        // mengambil detail data jamur yang akan dinilai meliputi id, nama rak, tgl masu, dan berat
        $data['detail_jamur'] = $this->m_pegawai_jamur->select_where(array('id_jamur', 'r.id_rak',
            'nama_rak', 'tanggal_masuk', 'berat')
                , "jamur j JOIN rakjamur r ON(j.id_rak = r.id_rak)", "id_jamur ='$id_jamur'");

        // mengambil data nama nama kriteria yang ada di databse untuk di jadikan labe dalam form
        $data['kriteria'] = $this->m_pegawai_jamur->select_all_order_by("kriteria", "id_kriteria");
        // mengambil subkriteria dan masing-masing nilainya
        $data['sub_kriteria'] = $this->m_pegawai_jamur->select_all_order_by("sub_kriteria", "id_sub_kriteria");

        // memanggil atau menampilkan form penilaian jamur
        $this->template->pegawaiview('pegawai/pegawai_jamur_penilaian', $data);
    }

    // fungsi ini digunakan untuk menyimpan hasil dari penilaian
    function simpan_penilaian() {
        // input data ke tabel periksa
        $data_periksa = array(
            'id_jamur' => $this->input->post('id_jamur'),
            'id_petugas' => $this->session->userdata('id_user')
        );
        $this->db->set('tanggal', 'NOW()', FALSE);
        $this->m_pegawai_jamur->insert("periksa", $data_periksa);
        // ambil id_periksa terakhir
        $id_periksa = $this->m_pegawai_jamur->get_last_id_periksa();
        for ($i = 1; $i < 6; $i++) {
            // menseting string untuk identifikasi inputan dropdown
            $nk = "nilai_kriteria_" . $i;
            $data_detail_periksa = array(
                'id_periksa' => $id_periksa,
                // ambil inputan dropdown
                'id_subkriteria' => $this->input->post($nk)
            );
            $this->m_pegawai_jamur->insert("detail_periksa", $data_detail_periksa);
        }
        // baris kode ini digunakan untuk merubah data status jamur
        $id_jamur = $this->input->post('id_jamur');
        $data_update_status = array(
            'status_jamur' => 2
        );
        $this->m_pegawai_jamur->update_data("jamur", $data_update_status, "id_jamur = '$id_jamur'");

        $this->session->set_flashdata('message', "Data jamur BERHASIL DINILAI");
        redirect(base_url() . 'controller_pegawai/c_pegawai_jamur');
    }

    // fungsi ini digunakan untuk melihat detail data jamur
    function lihat_detail_jamur($id_jamur) {
        $data['id_jamur'] = $id_jamur;

        //mengambil data jamur untuk ditampilkan detailnya
        $tabel_jamur = "jamur j JOIN rakjamur r ON(j.id_rak = r.id_rak) "
                . "JOIN user u ON (s.id_petugas = u.id_user) "
                . "JOIN status_jamur sj ON (j.status_jamur = sj.id_status)";

        $select_data_jamur = "r.nama_rak as nama , r.lokasi as lokasi, r.tgl_rak as tanggal,"
                . "j.id_petugas, u.nama as petugas, u.telephone as kontak_petugas,"
                . "j.tanggal_masuk, j.berat,"
                . "sj.keterangan";
        $detail_jamur = $this->m_pegawai_jamur->select_where($select_data_jamur, $tabel_jamur, "id_jamur = '$id_jamur'");

        foreach ($detail_jamur->result() as $key) {
            $data['nama_rak'] = $key->nama_rak;
            $data['lokasi'] = $key->alamat_lokasi;
            $data['tgl_rak'] = $key->tanggal;

            $data['petugas'] = $key->petugas;
            $data['kontak_petugas'] = $key->kontak_petugas;


            $data['tgl_masuk'] = $key->tanggal_masuk;
            $data['berat'] = $key->berat;

            $data['status'] = $key->keterangan;
        }

        // mengambil data penilaian
        $tabel_penilaian = "periksa p JOIN detail_periksa dp ON (p.id_periksa = dp.id_periksa) "
                . "JOIN sub_kriteria sk ON (dp.id_subkriteria = sk.id_sub_kriteria)";
        $data['detail_penilaian'] = $this->m_pegawai_jamur->get_where($tabel_penilaian, "p.id_jamur = '$id_jamur'");

        $periksa = $this->m_pegawai_jamur->select_where(array('id_periksa','tanggal'), "periksa", "id_jamur = '$id_jamur'");
        foreach ($periksa->result() as $key) {
            $data['id_periksa'] = $key->id_periksa;
            $data['tanggal_periksa'] = $key->tanggal;
        }
        // mengambil nama kriteria
        $data['nama_kriteria'] = $this->m_pegawai_jamur->select_all("kriteria");

        $this->template->pegawaiview('pegawai/pegawai_jamur_penilaian_detail', $data);
    }

    function go_edit_penilaian($id_periksa) {
        $tabel_data_lama = "sub_kriteria sk "
                . "JOIN detail_periksa dp ON(sk.id_sub_kriteria = dp.id_subkriteria) "
                . "JOIN kriteria k ON (sk.id_kriteria = k.id_kriteria) ";
        $data['data_lama'] = $this->m_pegawai_jamur->get_where($tabel_data_lama, "id_periksa = '$id_periksa'");

        // mengambil data nama nama kriteria yang ada di databse untuk di jadikan labe dalam form
        $data['kriteria'] = $this->m_pegawai_jamur->select_all_order_by("kriteria", "id_kriteria");
        // mengambil subkriteria dan masing-masing nilainya
        $data['sub_kriteria'] = $this->m_pegawai_jamur->select_all_order_by("sub_kriteria", "id_sub_kriteria");

        $this->template->pegawaiview('pegawai/pegawai_jamur_penilaian_ubah', $data);
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
            $this->m_pegawai_jamur->update("detail_periksa", $data_detail_periksa, "id_detail_periksa = '$id_detail_periksa'");
        }
        // setting tanggal baru setelah update data penilaian 
        $this->db->set('tanggal', 'NOW()', FALSE);
        $this->m_pegawai_jamur->update_tanggal_periksa($id_periksa);
        
        // mengembalikan ke tampilan awal jamur
        $this->session->set_flashdata('message', 'Data Penilaian Jamur BERHASIL DIUBAH');
        $data['data_jamur'] = $this->m_pegawai_jamur->ambil_data_jamur();
        $this->template->pegawaiview('pegawai/pegawai_jamur', $data);
    }

}
