<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien_model extends CI_Model
{
    public function get_id_pasien_baru()
    {
        $latest = $this->db->order_by('id_pasien', 'DESC')->get('pasien')->row();

        if ($latest) {
            return $latest->id_pasien + 1;
        } else {
            return 1;
        }
    }

    public function get_pasien()
    {
        return $this->db->get('pasien')->result_array();
    }
    public function tambah($data)
    {
        if ($this->db->insert('pasien', $data)) {
            $this->session->set_flashdata('sukses', 'Registrasi Pasien Berhasil !');
            redirect('pasien');
        } else {
            $this->session->set_flashdata('gagal', 'Registrasi Pasien Gagal !');
            redirect('pasien/registrasi');
        }
    }
    public function tambah2($data)
    {
        $this->db->insert('pasien', $data);
    }
    public function tambah1($data)
    {
        if ($this->db->insert('pasien', $data)) {
            $this->session->set_flashdata('sukses', 'Berhasil Tambah Pasien !');
            redirect('pasien');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal Tambah Pasien !');
            redirect('pasien');
        }
    }
    public function edit($data, $id_pasien)
    {
        if ($this->db->update('pasien', $data, ['id_pasien' => $id_pasien])) {
            $this->session->set_flashdata('sukses', 'Berhasil mengubah data pasien !');
            redirect('pasien');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal mengubah data pasien !');
            redirect('pasien');
        }
    }

    public function hapus($id_pasien)
    {
        if ($this->db->delete('pasien', ['id_pasien' => $id_pasien])) {
            $this->session->set_flashdata('sukses', 'Berhasil Menghapus Pasien !');
            redirect('pasien');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal Menghapus Pasien !');
            redirect('pasien');
        }
    }

    public function cariNama($nama)
    {
        // Query untuk mencari data berdasarkan nama
        $query = $this->db->get_where('pasien', array('nama' => $nama));

        // Jika data ditemukan, kembalikan hasilnya; jika tidak, kembalikan null
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    // public function tambah()
    // {
    //     $kd_supplier = $this->input->post('kd_supplier');
    //     $nama_miniplant = $this->input->post('nama_miniplant');
    //     $nama_pimpinan = $this->input->post('nama_pimpinan');
    //     $no_telp = $this->input->post('no_telp');
    //     $email = $this->input->post('email');
    //     $no_fax = $this->input->post('no_fax');
    //     $alamat = $this->input->post('alamat');

    //     $data = [
    //         'kd_supplier' => $kd_supplier,
    //         'nama_miniplant' => $nama_miniplant,
    //         'nama_pimpinan' => $nama_pimpinan,
    //         'no_telp' => $no_telp,
    //         'email' => $email,
    //         'no_fax' => $no_fax,
    //         'alamat' => $alamat,
    //     ];

    //     if (!$this->db->insert('suppliers', $data)) return FALSE;

    //     $user = [
    //         'name' => $nama_miniplant,
    //         'phone' => $no_telp,
    //         'email' => $email,
    //         'password' => md5($no_telp),
    //         'kd_supplier' => $kd_supplier,
    //         'is_active' => 0
    //     ];

    //     if ($this->db->insert('users', $user)) return TRUE;
    // }

    // public function ubah()
    // {
    //     $kd_supplier = $this->input->post('kd_supplier');
    //     $nama_miniplant = $this->input->post('nama_miniplant');
    //     $nama_pimpinan = $this->input->post('nama_pimpinan');
    //     $no_telp = $this->input->post('no_telp');
    //     $email = $this->input->post('email');
    //     $no_fax = $this->input->post('no_fax');
    //     $alamat = $this->input->post('alamat');

    //     $data = [
    //         // 'kd_supplier' => $kd_supplier,
    //         'nama_miniplant' => $nama_miniplant,
    //         'nama_pimpinan' => $nama_pimpinan,
    //         'no_telp' => $no_telp,
    //         'email' => $email,
    //         'no_fax' => $no_fax,
    //         'alamat' => $alamat,
    //     ];

    //     if (!$this->db->update('suppliers', $data, ['kd_supplier' => $kd_supplier])) return FALSE;

    //     $user = [
    //         'name' => $nama_miniplant,
    //         'phone' => $no_telp,
    //         'email' => $email,
    //         // 'password' => md5($no_telp),
    //         // 'kd_supplier' => $kd_supplier,
    //         // 'is_active' => 0
    //     ];

    //     if ($this->db->update('users', $user, ['kd_supplier' => $kd_supplier])) return TRUE;
    // }

    // public function hapus($kd_supplier)
    // {
    //     if (!$this->db->delete('suppliers', ['kd_supplier' => $kd_supplier])) return FALSE;
    //     if ($this->db->delete('users', ['kd_supplier' => $kd_supplier])) return TRUE;
    // }
}
