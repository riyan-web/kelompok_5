<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_warga extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_akses();
        $this->load->model('data_warga/ktp_model');
        $this->load->model('data_warga/kk_model');
    }

    public function ktp()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('data_warga/ktp', $data);
        $this->load->view('template/footer');
    }
    public function tambah_ktp()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|integer|min_length[16]|max_length[16]
        |is_unique[tb_ktp.nik]', ['is_unique' => 'Email telah di daftarkan sebelumnya!']);
        $this->form_validation->set_rules('no_kk', 'Nomor Kartu Keluarga', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('gol_darah', 'Golongan Darah', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required|trim');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim');
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
        $this->form_validation->set_rules('sta_perkawinan', 'Status Perkawinan', 'required|trim');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
        $this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'required|trim');
        $this->form_validation->set_rules('berlaku', 'Berlaku Hingga', 'required|trim');
        // $this->form_validation->set_rules('gambar_ktp', 'Gambar KTP', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();
            $data['judul'] = 'Form Registrasi';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('data_warga/tambah_ktp', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'noKk' => htmlspecialchars($this->input->post('no_kk', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'tempatLahir' => htmlspecialchars($this->input->post('tmp_lahir', true)),
                'tanggalLahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
                'jenisKelamin' => htmlspecialchars($this->input->post('jk', true)),
                'golDarah' => htmlspecialchars($this->input->post('gol_darah', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'kodeRt' => htmlspecialchars($this->input->post('kode_rt', true)),
                'kelurahan' => htmlspecialchars($this->input->post('kelurahan', true)),
                'kecamatan' => htmlspecialchars($this->input->post('kecamatan', true)),
                'agama' => htmlspecialchars($this->input->post('agama', true)),
                'statusPerkawinan' => htmlspecialchars($this->input->post('sta_perkawinan', true)),
                'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan', true)),
                'kewarganegaraan' => htmlspecialchars($this->input->post('kewarganegaraan', true)),
                'berlakuHingga' => htmlspecialchars($this->input->post('berlaku', true)),
                'gambar_ktp' => 'default.jpg'
            ];

            $this->db->insert('tb_ktp', $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data anda ditambahkan.</div>'
            );
            redirect('data_warga/tambah_ktp');
        }
    }
    function hapus_ktp($nik)
    {
        $where = array('nik' => $nik);
        $this->ktp_model->hapus_ktp($where, 'tb_ktp');
        redirect('data_warga/ktp');
    }
    public function edit_ktp($nik)
    {
        $where = array('nik' => $nik);
        $data['tb_ktp'] = $this->ktp_model->edit_ktp($where, 'tb_ktp')->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Edit KTP';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('data_warga/edit_ktp', $data);
        $this->load->view('template/footer');
    }

    public function kartu_keluarga()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // $data['tb_ktp'] = $this->ktp_model->getKtp()->result();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('data_warga/kartu_keluarga', $data);
        $this->load->view('template/footer');
    }
    public function tambah_kk()
    {
        $this->form_validation->set_rules('no_kk', 'Nomor Kartu Keluarga', 'required|trim|integer|min_length[16]|max_length[16]
        |is_unique[tb_kk.noKk]', ['is_unique' => 'Nomor Kartu Keluarga di tambahkan sebelumnya!']);
        $this->form_validation->set_rules('nama_kk', 'Nama Kepala Keluarga', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('tgl_dikeluarkan', 'Tanggal Dikeluarkan', 'required|trim');
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required|trim');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required|trim');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');
        $this->form_validation->set_rules('kode_pos', 'Kode POS', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();
            $data['judul'] = 'Form Registrasi';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('data_warga/tambah_kk', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'noKk' => htmlspecialchars($this->input->post('no_kk', true)),
                'namaKk' => htmlspecialchars($this->input->post('nama_kk', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'kelurahan' => htmlspecialchars($this->input->post('kelurahan', true)),
                'kecamatan' => htmlspecialchars($this->input->post('kecamatan', true)),
                'kabupaten' => htmlspecialchars($this->input->post('kabupaten', true)),
                'kodepos' => htmlspecialchars($this->input->post('kode_pos', true)),
                'provinsi' => htmlspecialchars($this->input->post('provinsi', true)),
                'dikeluarkanTanggal' => htmlspecialchars($this->input->post('tgl_dikeluarkan', true)),
                'kodeRt' => htmlspecialchars($this->input->post('kode_rt', true))
            ];

            $this->db->insert('tb_kk', $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data anda ditambahkan</div>'
            );
            redirect('data_warga/tambah_kk');
        }
    }
    function hapus_kk($noKk)
    {
        $where = array('noKk' => $noKk);
        $this->kk_model->hapus_kk($where, 'tb_kk');
        redirect('data_warga/kartu_keluarga');
    }
}
