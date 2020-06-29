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
        $this->form_validation->set_rules(
            'nik',
            'Nomor Induk Kependudukan',
            'required|trim|is_unique[domisili.nik]',
            ['is_unique' => 'Nomor NIK Telah di Gunakan!']
        );
        $this->form_validation->set_rules('alamat_asal', 'Alamat Asal', 'required|trim');
        $this->form_validation->set_rules('pindah_ke', 'Pindah Ke', 'required|trim');
        $this->form_validation->set_rules('alasan_pindah', 'Alasan Pindah', 'required|trim');
        $this->form_validation->set_rules('tgl_dibuat', 'Tanggal Surat Dibuat', 'required|trim');
        $this->form_validation->set_rules('tgl_masuk', 'Tanggal Surat Masuk', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Data Domisili';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('data_warga/tambah_data_domisili', $data);
            $this->load->view('template/footer');
        } else {
            $config['upload_path']          = './assets/img/domisili';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = 'domisili-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
            $config['max_size']             = 2048; // 2MB
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
            $this->load->library('upload', $config);

            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {
                    $post['image'] = $this->upload->data('file_name');
                    $this->domisili_model->input_domisili($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-success" role="alert">Data Domisili Ditambahkan.</div>'
                        );
                        redirect('domisili/data_domisili');
                    }
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', 'error', $error);
                    redirect('domisili/tambah_data_domisili');
                }
            } else {
                $post['image'] = 'default_domisili.jpg';
                $this->domisili_model->input_domisili($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success" role="alert">Data Domisili Ditambahkan.</div>'
                    );
                    redirect('domisili/data_domisili');
                }
            }
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

        $this->form_validation->set_rules('nik', 'Nomor Induk Kependudukan', 'required|trim');
        $this->form_validation->set_rules('alamat_asal', 'Alamat Asal', 'required|trim');
        $this->form_validation->set_rules('pindah_ke', 'Pindah Ke', 'required|trim');
        $this->form_validation->set_rules('alasan_pindah', 'Alasan Pindah', 'required|trim');
        $this->form_validation->set_rules('tgl_dibuat', 'Tanggal Surat Dibuat', 'required|trim');
        $this->form_validation->set_rules('tgl_masuk', 'Tanggal Surat Masuk', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $where = array('id_domisili' => $id_domisili);
            $query = $this->domisili_model->edit_domisili($where, 'domisili');
            $data['title'] = 'Edit Data Domisili';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            if ($query->num_rows() > 0) {
                $data['domisili'] = $query->row();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('data_warga/edit_domisili', $data);
                $this->load->view('template/footer');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Data Tidak Ditemukan!</div>');
                redirect('domisili/data_domisili');
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->domisili_model->update_domisili($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Domisili berhasil diubah!</div>');
            }
            redirect('domisili/data_domisili');
        }
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
