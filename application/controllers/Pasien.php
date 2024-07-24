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
}
