<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kk_per_bulan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('chart_model');
    }

    function index()
    {
        $data['title'] = 'Grafik Kartu Keluarga Per Bulan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['hasil_kk'] = $this->chart_model->Kk_per_bulan();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('chart/v_kk_per_bulan', $data);
        $this->load->view('template/footer');
    }
}
