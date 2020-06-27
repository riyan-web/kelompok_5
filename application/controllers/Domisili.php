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

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('data_warga/data_domisili', $data);
        $this->load->view('template/footer');
    }

    public function tambah_data_domisili()
    {
        $this->form_validation->set_rules('nik', 'Nomor Induk Kependudukan', 'required|trim');
        $this->form_validation->set_rules('alamat_asal', 'Alamat Asal', 'required|trim');
        $this->form_validation->set_rules('pindah_ke', 'Pindah Ke', 'required|trim');
        $this->form_validation->set_rules('alasan_pindah', 'Alasan Pindah', 'required|trim');
        $this->form_validation->set_rules('tgl_dibuat', 'Tanggal Surat Dibuat', 'required|trim');
        $this->form_validation->set_rules('tgl_masuk', 'Tanggal Surat Masuk', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Domisili';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('data_warga/tambah_data_domisili', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'alamat_asal' => htmlspecialchars($this->input->post('alamat_asal', true)),
                'pindah_ke' => htmlspecialchars($this->input->post('pindah_ke', true)),
                'alasan_pindah' => htmlspecialchars($this->input->post('alasan_pindah', true)),
                'tgl_surat_dibuat' => htmlspecialchars($this->input->post('tgl_dibuat', true)),
                'tgl_surat_masuk' => htmlspecialchars($this->input->post('tgl_masuk', true)),
                'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            ];

            $this->db->insert('domisili', $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data anda ditambahkan.</div>'
            );
            redirect('domisili/data_domisili');
        }
    }
    function hapus_domisili($id_domisili)
    {
        $where = array('id_domisili' => $id_domisili);
        $this->domisili_model->hapus_domisili($where, 'domisili');
        redirect('domisili/data_domisili');
    }
    public function edit_domisili($id_domisili)
    {
        $where = array('id_domisili' => $id_domisili);
        $data['domisili'] = $this->domisili_model->edit_domisili($where, 'domisili')->row_array();
        $data['title'] = 'Edit Data Domisili';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('data_warga/edit_domisili', $data);
        $this->load->view('template/footer');
    }

    public function update_domisili()
    {
        $this->domisili_model->update_domisili();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data Domisili Telah Diubah!</div>');
        redirect('domisili/data_domisili');
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

    public function cetak_domisili()
    {
        $this->load->view('');
        $html = $this->output->get_output();
        $this->load->library('dompdf_gen');
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array('Attachment' => 0));
    }

}
