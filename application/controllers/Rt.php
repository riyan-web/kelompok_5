<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rt extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->model('data_warga/data_rt_model');
        $this->load->model('rt_model');
    }

    public function data_rt()
    {
        $data['title'] = 'Admin - Data RT RW';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['all_rt'] = $this->rt_model->getAllRt()->result();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('rt/data_rt', $data);
        $this->load->view('template/footer');
    }

    public function data_ketua_rt()
    {

        $data['title'] = 'Admin - Data Ketua RT';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['ketua_rt'] = $this->data_rt_model->getRt()->result();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('rt/data_ketua_rt', $data);
        $this->load->view('template/footer');
    }
}
