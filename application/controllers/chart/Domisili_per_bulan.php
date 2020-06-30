<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Domisili_per_bulan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('chart_model');
    }

    function index()
    {
        $data['title'] = 'Grafik Data Non Domisili Per Bulan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['hasil_domisili'] = $this->chart_model->Domisili_per_bulan();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('chart/v_domisili_per_bulan', $data);
        $this->load->view('template/footer');
    }
}
