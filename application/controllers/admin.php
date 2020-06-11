<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_akses();
		
	}
	
	public function index()
	{
		$data['title'] = 'Admin';
		$data['user']= $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar',$data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('template/footer');
	}
}
