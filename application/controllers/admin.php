<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	public function index()
	{
		$data['user']= $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('dashboard', $data);
		$this->load->view('template/footer');
	}
}
