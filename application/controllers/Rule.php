<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rule extends CI_Controller
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

    public function index()
    {
        $data['rule'] = $this->rule_model->get_rule();
        $data['penyakit'] = $this->penyakit_model->get_penyakit();
        $data['gejala'] = $this->gejala_model->get_gejala();
        $this->load->view('parts/header');
        $this->load->view('rule', $data);
        $this->load->view('parts/footer');
    }

    public function tambah()
    {
        $id_penyakit = $this->input->post('id_penyakit');
        $id_gejala = $this->input->post('id_gejala');

        foreach ($id_gejala as $item) {
            $existingData = $this->rule_model->getDataByPenyakitGejala($id_penyakit, $item);
            if (!$existingData) {
                $data = [
                    'id_penyakit' => $id_penyakit,
                    'id_gejala' => $item,
                ];

                $this->rule_model->tambah($data);
            } else {
                $this->session->set_flashdata('gagal', 'Data Sudah Ada !');
                return redirect('rule');
            }
        }

        $this->session->set_flashdata('sukses', 'Berhasil menambah rule !');
        redirect('rule');
    }

    public function edit()
    {
        $id_rule        = $this->input->post('id_rule');
        $id_penyakit    = $this->input->post('id_penyakit');
        $id_gejala      = $this->input->post('id_gejala');
        // $nilai_cf       = $this->input->post('nilai_cf');

        $existingData = $this->rule_model->getDataByPenyakitGejala($id_penyakit, $id_gejala);
        if (!$existingData) {
            $data = [
                'id_penyakit' => $id_penyakit,
                'id_gejala' => $id_gejala,
            ];

            // Simpan data ke database
            $this->rule_model->edit($data, $id_rule);

            // Tampilkan pesan sukses atau redirect ke halaman lain
            $this->session->set_flashdata('sukses', 'Berhasil mengubah rule !');
            redirect('rule');
        } else {
            // Tampilkan pesan error atau redirect ke halaman lain
            $this->session->set_flashdata('gagal', 'Data Sudah Ada !');
            redirect('rule');
        }
    }

    public function hapus($id_rule)
    {
        $this->rule_model->hapus($id_rule);
    }
}
