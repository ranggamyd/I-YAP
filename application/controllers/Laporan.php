<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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
        $data['hasil'] = $this->laporan_model->get_hasil();
        $this->load->view('parts/header');
        $this->load->view('laporan', $data);
        $this->load->view('parts/footer');
    }

    public function detail($id_hasil)
    {
        $hasil = $this->laporan_model->getHasilById($id_hasil);
        $pasien = $this->laporan_model->getPasienById($id_hasil);

        $arbobot = array('0', '1', '0.8', '0.6', '0.4', '-0.2', '-0.4', '-0.6', '-0.8', '-1');
        $argejala = unserialize($hasil['gejala']);
        $arpenyakit = unserialize($hasil['penyakit']);

        $np1 = 0;
        foreach ($arpenyakit as $key1 => $value1) {
            $np1++;
            $idpkt1[$np1] = $key1;
            $vlpkt1[$np1] = $value1;
        }

        $data = array(
            'arbobot' => $arbobot,
            'argejala' => $argejala,
            'arpenyakit' => $arpenyakit,
            'idpkt1' => $idpkt1,
            'vlpkt1' => $vlpkt1
        );

        $data['id'] = $id_hasil;
        $data['pasien'] = $pasien;
        $data['arkondisitext'] = $this->laporan_model->getKondisiText();
        $data['arpkt'] = $this->laporan_model->getPenyakit();
        $data['arspkt'] = $this->laporan_model->getPenyakit2();
        $this->load->view('parts/header');
        $this->load->view('laporan_detail', $data);
        $this->load->view('parts/footer');
    }

    public function hapus($id_hasil)
    {
        $this->laporan_model->hapus($id_hasil);
    }

    // Cetak Detail
    public function cetak_detail($id)
    {
        $hasil = $this->laporan_model->getHasilById($id);
        $pasien = $this->laporan_model->getPasienById($id);

        $arbobot = array('0', '1', '0.8', '0.6', '0.4', '-0.2', '-0.4', '-0.6', '-0.8', '-1');
        $argejala = unserialize($hasil['gejala']);
        $arpenyakit = unserialize($hasil['penyakit']);

        $np1 = 0;
        foreach ($arpenyakit as $key1 => $value1) {
            $np1++;
            $idpkt1[$np1] = $key1;
            $vlpkt1[$np1] = $value1;
        }

        $data = array(
            'arbobot' => $arbobot,
            'argejala' => $argejala,
            'arpenyakit' => $arpenyakit,
            'idpkt1' => $idpkt1,
            'vlpkt1' => $vlpkt1
        );

        $data['pasien'] = $pasien;
        $data['arkondisitext'] = $this->laporan_model->getKondisiText();
        $data['arpkt'] = $this->laporan_model->getPenyakit();
        $data['arspkt'] = $this->laporan_model->getPenyakit2();
        $this->load->view('parts/header_print');
        $this->load->view('laporan_detail_cetak', $data);
    }
}
