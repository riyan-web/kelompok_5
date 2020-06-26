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
		$this->load->model('data_warga/data_rt_model');
		$this->load->model('data_warga/Domisili_model');
		$this->load->model('chart_model');
		$this->load->model('rt_model');
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

	public function tambah_rt()
	{
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


	public function tambah_data_ketuart()
	{
		$this->form_validation->set_rules('id_user', 'User', 'required|trim|is_unique');
		$this->form_validation->set_rules('kodeRt', 'RT', 'required|trim|');
		$this->form_validation->set_rules('nik', 'KTP', 'required|trim|is_unique');

		$data['title'] = 'Admin - Tambah Data Ketua RT';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		if ($this->form_validation->run() == false) {
			$data['ketua_rt'] = $this->data_rt_model->getRt()->result();
			$data['tb_ktp'] = $this->ktp_model->getAllKtp()->result();
			$data['tb_rt_rw'] = $this->rt_model->getAllRt()->result();



			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('admin/tambah_data_ketuart', $data);
			$this->load->view('template/footer');
		}else{
			$data = [
				'id_user' => htmlspecialchars($this->input->post('nik', true)),
				'nik' => htmlspecialchars($this->input->post('nik', true))      
            ];

            $this->db->insert('tb_ketuart', $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">User Ketua RT Baru Telah Ditambahkan</div>'
            );
            redirect('admin/data_rt');
		}
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
