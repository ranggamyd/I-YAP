<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Matriks extends CI_Controller
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
        $data['nilai'] = $this->matriks_model->get_nilai();
        $data['gejala'] = $this->gejala_model->get_gejala();
        $data['penyakit'] = $this->penyakit_model->get_penyakit();
        $this->load->view('parts/header');
        $this->load->view('matriks', $data);
        $this->load->view('parts/footer');
    }

    public function perbandingan($id_penyakit)
    {
        $data['penyakit'] = $this->penyakit_model->get_penyakit_where($id_penyakit);
        $data['rule'] = $this->rule_model->get_rule();
        $this->load->view('parts/header');
        $this->load->view('matriks_perbandingan', $data);
        $this->load->view('parts/footer');
    }

    public function tabel_analisis_kriteria()
    {
        $data['tabel'] = $this->matriks_model->get_data();
        $this->load->view('parts/header');
        $this->load->view('tabel_analisis_kriteria', $data);
        $this->load->view('parts/footer');
    }

    public function analisa()
    {
        $id_penyakit = $this->input->post('id_penyakit');
        $cleT = $this->matriks_model->clearTB($id_penyakit);
        $crit = $_POST['C'];
        $opt = $_POST['W'];
        $crib = $_POST['X'];
        foreach ($crit as $key => $vl) {
            $data = array(
                'id_penyakit' => $id_penyakit,
                'kriteria_x' => $vl,
                'nilai_krit' => $opt[$key],
                'kriteria_y' => $crib[$key]
            );
            $insert = $this->matriks_model->insertArray($data);
        }
        $data['penyakit'] = $this->penyakit_model->get_penyakit_where($id_penyakit);
        $data['tabel'] = $this->matriks_model->get_data();
        $this->load->view('parts/header');
        $this->load->view('tabel_analisa', $data);
        $this->load->view('parts/footer');
    }

    public function updateNiKr($id_penyakit)
    {
        $id_penyakit = $this->input->post('id_penyakit');
        $idkr = $_POST['id_gejala'];
        $nakr = $_POST['hasil'];
        foreach ($idkr as $ide => $al) {
            $data = array(
                'cf_pakar' => $nakr[$ide],
            );

            $where = array(
                'id_gejala' => $al,
                'id_penyakit' => $id_penyakit
            );

            $this->matriks_model->updateRule($where, $data);
            $this->session->set_flashdata('sukses', 'Berhasil Melakukan Perbandingan !');
        }
        $data['tabel'] = $this->matriks_model->get_data();
        $data['penyakit'] = $this->penyakit_model->get_penyakit_where($id_penyakit);
        $data['rule'] = $this->rule_model->get_rule();
        $this->load->view('parts/header');
        $this->load->view('matriks_perbandingan', $data);
        $this->load->view('parts/footer');
    }


    // public function get_rule2()
    // {
    //     // Tangkap data yang dikirim melalui Ajax
    //     if ($this->input->post('selectedValue')) {
    //         $selectedValue = $this->input->post('selectedValue');

    //         // Lakukan pemrosesan atau perubahan data sesuai kebutuhan Anda
    //         // Misalnya, simpan data yang dipilih ke dalam database atau lakukan operasi lainnya

    //         // Contoh: Simpan data yang dipilih ke dalam variabel $data
    //         $data = $selectedValue;

    //         // var_dump($data);

    //         // Kirim respon kembali ke halaman JavaScript
    //         echo "Data berhasil diperbarui menjadi: " . $data;
    //     }
    // }

    // public function id_gejala()
    // {
    //     $id_penyakit = $_GET['id_penyakit'];
    //     $data_penyakit = $this->rule_model->get_rule_where($id_penyakit);
    //     foreach ($data_penyakit as $dp) {
    //         $id_gejala = $dp['id_gejala'];
    //     }
    //     echo number_format($id_gejala);
    // }
}
