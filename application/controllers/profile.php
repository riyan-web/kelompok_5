<?php
defined('BASEPATH') or exit('No direct script access allowed');

class profile extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		cek_akses();
	}

	public function index()
	{
		$data['title'] = 'My Profile';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('profile/index', $data);
		$this->load->view('template/footer');
	}

	public function edit()
	{
		$data['title'] = 'Edit Profile';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama', 'Full Name', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('profile/edit', $data);
			$this->load->view('template/footer');
		} else {
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');

			//cek jika da gambar yang diupload
			$upload_image = $_FILES['image']['name'];

			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] 	 = '2048';
				$config['upload_path']	 = './assets/img/profile';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$old_image = $data['user']['image'];
					if ($old_image != 'default.png') {
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('nama', $nama);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-success" role="alert">Profile anda telah diubah</div>'
			);
			redirect('profile');
		}
	}

	public function ganti_password()
	{
		$data['title'] = 'Ganti Password';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[8]|matches[password_baru2]');
		$this->form_validation->set_rules('password_baru2', 'Konfirmasi Password', 'required|trim|min_length[8]|matches[password_baru1]');



		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('profile/ganti_password', $data);
			$this->load->view('template/footer');
		} else {
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru1');
			if (!password_verify($password_lama, $data['user']['password'])) {
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-danger" role="alert">Kesalahan Memasukkan Password Anda</div>'
				);
				redirect('profile/ganti_password');
			} else {
				if ($password_lama == $password_baru) {
					$this->session->set_flashdata(
						'message',
						'<div class="alert alert-danger" role="alert">Password baru anda tidak boleh sama dengan password lama</div>'
					);
					redirect('profile/ganti_password');
				} else {
					//Jikka Password sudah mantap
					$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata(
						'message',
						'<div class="alert alert-success" role="alert">Password anda telah diubah</div>'
					);
					redirect('profile/ganti_password');
				}
			}
		}
	}
}
