<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	public function login()
	{
		$credential = $this->input->post('credential');
		$password = $this->input->post('password');

		$this->db->where('admin.nama', $credential)->or_where('admin.username', $credential);
		$admin = $this->db->get('admin')->row();

		if (!$admin) return FALSE;
		if ($password != $admin->password) return FALSE;

		$this->session->set_userdata(['id_admin' => $admin->id_admin]);
		$this->session->set_userdata(['status' => 'login']);

		if ($this->session->has_userdata('id_admin')) return TRUE;
	}

	public function logout()
	{
		$this->session->sess_destroy();
	}

	public function update_pass($data, $email)
	{
		if ($this->db->update('admin', $data, ['email' => $email])) {
			$this->session->set_flashdata('sukses', 'Berhasil mengubah Password !');
			redirect('auth');
		} else {
			$this->session->set_flashdata('gagal', 'Gagal mengubah Password !');
			redirect('auth');
		}
	}

	public function isEmailExist($email)
	{
		$query = $this->db->get_where('admin', array('email' => $email));
		return ($query->num_rows() > 0);
	}

	public function checkValueExist($value)
	{
		$query = $this->db->get_where('admin', array('email' => $value));
		return $query->num_rows() > 0;
	}


	// public function register()
	// {
	// 	$kd_supplier = $this->supplier_model->kd_supplier_auto();
	// 	$name = $this->input->post('name');
	// 	$nama = $this->input->post('nama');
	// 	$username = $this->input->post('username');
	// 	$password = md5($this->input->post('password1'));
	// 	// $avatar = 'default_avatar.jpg';

	// 	$supplier = [
	// 		'kd_supplier' => $kd_supplier,
	// 		'nama_miniplant' => $name,
	// 		'no_telp' => $nama,
	// 		'username' => $username,
	// 		// 'avatar' => $avatar
	// 	];

	// 	if (!$this->db->insert('suppliers', $supplier)) return FALSE;

	// 	$user = [
	// 		'name' => $name,
	// 		'nama' => $nama,
	// 		'username' => $username,
	// 		'password' => $password,
	// 		'kd_supplier' => $kd_supplier,
	// 		'is_active' => 0
	// 	];

	// 	$notifikasi = [
	// 		'kd_supplier' => $kd_supplier,
	// 		'type' => 'registrasi',
	// 		'pesan' => 'Supplier baru telah mendaftar, aktivasi sekarang?'
	// 	];

	// 	if (!$this->db->insert('notifikasi', $notifikasi)) return FALSE;

	// 	if ($this->db->insert('admin', $user)) return TRUE;
	// }
}
