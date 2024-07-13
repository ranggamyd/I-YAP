<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function index()
  {
    $data['title'] = 'Masuk';
    $this->load->view('parts/header1', $data);
    $this->load->view('login', $data);
    $this->load->view('parts/footer1', $data);
  }

  public function login()
  {
    $this->form_validation->set_rules('credential', 'Kredensial', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('gagal', 'Gagal Masuk !');
      $this->index();
    } else {
      if ($this->auth_model->login()) {
        if ($this->session->userdata('referred_from')) {
          $referred_from = $this->session->userdata('referred_from');
          $this->session->set_flashdata('sukses', 'Berhasil Masuk !');
          redirect($referred_from);
        } else {
          $this->session->set_flashdata('sukses', 'Berhasil Masuk !');
          redirect('dashboard');
        }
      } else {
        $this->session->set_flashdata('gagal', 'Pastikan Username dan Password anda sesuai !');
        $this->index();
      }
    }
  }

  public function logout()
  {
    $this->auth_model->logout();
    $this->session->set_flashdata('sukses', 'Berhasil Keluar !');
    redirect('landing_page');
  }

  // public function forgot_password()
  // {
  //   $data['title'] = 'Lupa Kata Sandi';
  //   $this->load->view('parts/header1', $data);
  //   $this->load->view('forgot_password', $data);
  //   $this->load->view('parts/footer1', $data);
  // }

  // public function update_pass()
  // {
  //   $password   = $this->input->post('password');
  //   $email      = $this->input->post('email');
  //   $data = [
  //     'password'  => $password,
  //     'email'     => $email
  //   ];

  //   $this->auth_model->update_pass($data, $email);
  // }

  // public function checkEmail()
  // {
  //   $email = $this->input->post('email');
  //   $isExist = $this->auth_model->isEmailExist($email);
  //   echo json_encode(array('exist' => $isExist));
  // }

  // public function checkInput()
  // {
  //   $email = $this->input->post('email');
  //   $isExist = $this->auth_model->checkValueExist($email);
  //   $response = array(
  //     'isExist' => $isExist
  //   );
  //   echo json_encode($response);
  // }


  // public function register()
  // {
  //   $data['title'] = 'Mendaftar';
  //   $this->loadView('register', $data);
  // }

  // public function register_account()
  // {
  //   $this->form_validation->set_rules('name', 'Nama Lengkap', 'required');
  //   $this->form_validation->set_rules('phone', 'No. Telepon', 'required|is_numeric|is_unique[suppliers.no_telp]');
  //   $this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[suppliers.email]');
  //   $this->form_validation->set_rules('password1', 'Password', 'required');
  //   $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|matches[password1]');

  //   if ($this->form_validation->run() == FALSE) {
  //     $this->session->set_flashdata('gagal', 'Gagal Mendaftarkan Akun !');
  //     $this->register();
  //   } else {
  //     if ($this->auth_model->register()) {
  //       $this->session->set_flashdata('sukses', 'Berhasil Mendaftarkan Akun !<br>Mohon menunggu konfirmasi admin sebelum melakukan login !');
  //       redirect('auth');
  //     } else {
  //       $this->session->set_flashdata('gagal', 'Gagal Mendaftarkan Akun !');
  //       $this->index();
  //     }
  //   }
  // }
}
