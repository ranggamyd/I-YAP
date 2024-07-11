<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != 'login') {
            $this->session->set_userdata('referred_from', current_url());
            $this->session->set_flashdata('gagal', 'Gagal mengakses, Silahkan login kembali !');
            redirect('auth');
        }
    }

    public function registrasi()
    {
        $this->load->view('parts/header');
        $this->load->view('registrasi');
        $this->load->view('parts/footer');
    }

    public function index()
    {
        $data['pasien'] = $this->pasien_model->get_pasien();
        $this->load->view('parts/header');
        $this->load->view('pasien', $data);
        $this->load->view('parts/footer');
    }

    public function tambah()
    {
        $nama           = $this->input->post('nama');
        // $jenis_kelamin  = $this->input->post('jenis_kelamin');
        $umur           = $this->input->post('umur');
        // $tinggi_badan   = $this->input->post('tinggi_badan');
        // $berat_badan    = $this->input->post('berat_badan');
        $no_hp  = $this->input->post('no_hp');
        $alamat         = $this->input->post('alamat');

        $data = [
            'nama'          => $nama,
            // 'jenis_kelamin' => $jenis_kelamin,
            'umur'          => $umur,
            // 'tinggi_badan'  => $tinggi_badan,
            // 'berat_badan'   => $berat_badan,
            'no_hp' => $no_hp,
            'alamat'        => $alamat,
        ];

        $this->pasien_model->tambah($data);
    }

    public function tambah1()
    {
        $nama           = $this->input->post('nama');
        // $jenis_kelamin  = $this->input->post('jenis_kelamin');
        $umur           = $this->input->post('umur');
        // $tinggi_badan   = $this->input->post('tinggi_badan');
        // $berat_badan    = $this->input->post('berat_badan');
        $no_hp  = $this->input->post('no_hp');
        $alamat         = $this->input->post('alamat');

        $data = [
            'nama'          => $nama,
            // 'jenis_kelamin' => $jenis_kelamin,
            'umur'          => $umur,
            // 'tinggi_badan'  => $tinggi_badan,
            // 'berat_badan'   => $berat_badan,
            'no_hp' => $no_hp,
            'alamat'        => $alamat,
        ];

        $this->pasien_model->tambah1($data);
    }

    public function edit()
    {
        $id_pasien      = $this->input->post('id_pasien');
        $nama           = $this->input->post('nama');
        // $jenis_kelamin  = $this->input->post('jenis_kelamin');
        $umur           = $this->input->post('umur');
        // $tinggi_badan   = $this->input->post('tinggi_badan');
        // $berat_badan    = $this->input->post('berat_badan');
        $no_hp  = $this->input->post('no_hp');
        $alamat         = $this->input->post('alamat');

        $data = [
            'nama'          => $nama,
            // 'jenis_kelamin' => $jenis_kelamin,
            'umur'          => $umur,
            // 'tinggi_badan'  => $tinggi_badan,
            // 'berat_badan'   => $berat_badan,
            'no_hp' => $no_hp,
            'alamat'        => $alamat,
        ];

        $this->pasien_model->edit($data, $id_pasien);
    }

    public function hapus($id_pasien)
    {
        $this->pasien_model->hapus($id_pasien);
    }

    // public function tambah()
    // {
    //     $this->form_validation->set_rules('kd_supplier', 'Kode Supplier', 'required|is_unique[suppliers.kd_supplier]');
    //     $this->form_validation->set_rules('nama_miniplant', 'Nama Miniplant', 'required|is_unique[suppliers.nama_miniplant]');
    //     $this->form_validation->set_rules('nama_pimpinan', 'Nama Pimpinan', 'required');
    //     $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required|is_numeric|is_unique[suppliers.no_telp]');
    //     $this->form_validation->set_rules('no_fax', 'No. Faximile', 'is_unique[suppliers.no_fax]');
    //     $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[suppliers.email]');

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->session->set_flashdata('gagal', 'Gagal Menambahkan Supplier !');
    //         $this->session->set_flashdata('hasModalID', 'tambah_supplier');
    //         $this->index();
    //     } else {
    //         if ($this->supplier_model->tambah()) {
    //             $this->session->set_flashdata('sukses', 'Berhasil Menambahkan Supplier !');
    //             redirect('suppliers');
    //         } else {
    //             $this->session->set_flashdata('gagal', 'Gagal Menambahkan Supplier !');
    //             $this->index();
    //         }
    //     }
    // }

    // public function detail($kd_supplier)
    // {
    //     $data['supplier'] = $this->db->get_where('suppliers', ['kd_supplier' => $kd_supplier])->row();

    //     $this->db->join('suppliers', 'suppliers.kd_supplier = pengajuan.kd_supplier', 'left');
    //     $data['pengajuan'] = $this->db->get_where('pengajuan', ['pengajuan.kd_supplier' => $kd_supplier])->result_array();

    //     $data['title'] = 'Detail Supplier';
    //     $this->loadView('detail_supplier', $data);
    // }

    // public function ubah()
    // {
    //     $supplier = $this->db->get_where('suppliers', ['kd_supplier' => $this->input->post('kd_supplier')])->row();

    //     $this->form_validation->set_rules('kd_supplier', 'Kode Supplier', 'required');
    //     $this->form_validation->set_rules('nama_miniplant', 'Nama Miniplant', 'required');
    //     if ($this->input->post('nama_miniplant') != $supplier->nama_miniplant) $this->form_validation->set_rules('nama_miniplant', 'Nama Miniplant', 'required|is_unique[suppliers.nama_miniplant]');
    //     $this->form_validation->set_rules('nama_pimpinan', 'Nama Pimpinan', 'required');
    //     $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required|is_numeric');
    //     if ($this->input->post('no_telp') != $supplier->no_telp) $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required|is_numeric|is_unique[suppliers.no_telp]');
    //     if ($this->input->post('no_fax') != $supplier->no_fax) $this->form_validation->set_rules('no_fax', 'No. Faximile', 'is_unique[suppliers.no_fax]');
    //     $this->form_validation->set_rules('email', 'Email', 'valid_email');
    //     if ($this->input->post('email') != $supplier->email) $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[suppliers.email]');

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->session->set_flashdata('gagal', 'Gagal Mengubah Supplier !');
    //         $this->session->set_flashdata('hasModalID', 'edit_supplier-' . $supplier->kd_supplier);
    //         $this->index();
    //     } else {
    //         if ($this->supplier_model->ubah()) {
    //             $this->session->set_flashdata('sukses', 'Berhasil Mengubah Supplier !');
    //             redirect('suppliers');
    //         } else {
    //             $this->session->set_flashdata('gagal', 'Gagal Mengubah Supplier !');
    //             $this->index();
    //         }
    //     }
    // }

    // public function hapus($kd_supplier)
    // {
    //     if ($this->supplier_model->hapus($kd_supplier)) {
    //         $this->session->set_flashdata('sukses', 'Berhasil Menghapus Supplier !');
    //         redirect('suppliers');
    //     } else {
    //         $this->session->set_flashdata('gagal', 'Gagal Menghapus Supplier !');
    //         $this->index();
    //     }
    // }
}
