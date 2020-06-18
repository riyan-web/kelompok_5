<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Domisili extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->model('data_warga/domisili_model');
    }

    public function data_domisili()
    {
        $data['title'] = 'Data Domisili';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['domisili'] = $this->domisili_model->getDomisili()->result();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('data_warga/data_domisili', $data);
        $this->load->view('template/footer');
    }

    public function surat_domisili()
    {
        $data['title'] = 'Surat Domisili';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'Kartu Keluarga';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('data_warga/surat_domisili', $data);
        $this->load->view('template/footer');
    }
}
