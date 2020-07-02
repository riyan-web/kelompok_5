<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_akses();
		$this->load->model('data_warga/ktp_model');
		$this->load->model('data_warga/Kk_model');
		$this->load->model('data_warga/Domisili_model');
		$this->load->model('chart_model');
	}

	public function index()
	{
		$data['title'] = 'Admin';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['hasil'] = $this->chart_model->Ktp_per_bulan();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('template/footer');
	}

	public function data_ktp_warga()
	{
		$data['title'] = 'Admin - Data Ktp';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['all_ktp'] = $this->ktp_model->getKtp()->result();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/data_ktp_warga', $data);
		$this->load->view('template/footer');
	}

	public function data_kk_warga()
	{
		$data['title'] = 'Admin - Data Kartu Keluarga';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['all_kk'] = $this->Kk_model->getKk()->result();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/data_kk_warga', $data);
		$this->load->view('template/footer');
	}




	public function data_domisili_warga()
	{
		$data['title'] = 'Admin - Data Non Domisili';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['all_domisili'] = $this->Domisili_model->getDomisili()->result();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('admin/data_domisili_warga', $data);
		$this->load->view('template/footer'); 
	}
}
