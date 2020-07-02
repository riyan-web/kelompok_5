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
        $data['title'] = 'Kartu Tanda Penduduk';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('data_warga/ktp', $data);
        $this->load->view('template/footer');
    }

    public function detail_ktp($nik)
    {
        $where = array('nik' => $nik);
        $data['tb_ktp'] = $this->ktp_model->edit_ktp($where, 'tb_ktp')->row_array();
        $data['title'] = 'Detail KTP';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('data_warga/detail_ktp', $data);
        $this->load->view('template/footer');
    }

    public function tambah_ktp()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|integer|min_length[16]|max_length[16]
        |is_unique[tb_ktp.nik]', ['is_unique' => 'NIK telah di daftarkan sebelumnya!']);
        $this->form_validation->set_rules('no_kk', 'Nomor Kartu Keluarga', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('gol_darah', 'Golongan Darah', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required|trim');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required|trim');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
        $this->form_validation->set_rules('sta_perkawinan', 'Status Perkawinan', 'required|trim');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
        $this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'required|trim');
        $this->form_validation->set_rules('berlaku', 'Berlaku Hingga', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah KTP';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('data_warga/tambah_ktp', $data);
            $this->load->view('template/footer');
        } else {

            $config['upload_path']          = './assets/img/ktp';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = 'ktp-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
            $config['max_size']             = 2048; // 1MB
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;
            $this->load->library('upload', $config);

            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {
                    $post['image'] = $this->upload->data('file_name');
                    $this->ktp_model->input_ktp($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">
                        Data Berhasil Ditambahkan!</div>');
                        redirect('data_warga/ktp');
                    }
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Error! Cek Kembali File Upload</div>', $error);
                    redirect('data_warga/tambah_ktp');
                }
            } else {
                $post['image'] = 'default_ktp.jpg';
                $this->ktp_model->input_ktp($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">
                    Data Berhasil Ditambahkan!</div>');
                    redirect('data_warga/ktp');
                }
            }
        }
    }
    function hapus_ktp($nik)
    {
        $where = array('nik' => $nik);
        $this->ktp_model->hapus_ktp($where, 'tb_ktp');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Data Kartu Tanda Penduduk Berhasil Dihapus</div>'
        );
        redirect('data_warga/ktp');
    }
    public function edit_ktp($nik)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('gol_darah', 'Golongan Darah', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required|trim');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required|trim');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
        $this->form_validation->set_rules('sta_perkawinan', 'Status Perkawinan', 'required|trim');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
        $this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'required|trim');
        $this->form_validation->set_rules('berlaku', 'Berlaku Hingga', 'required|trim');

        $where = array('nik' => $nik);
        $query = $this->ktp_model->edit_ktp($where, 'tb_ktp');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Kartu Tanda Penduduk';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

            if ($query->num_rows() > 0) {
                $data['ktp'] = $query->row();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('data_warga/edit_ktp', $data);
                $this->load->view('template/footer');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Data Tidak Ditemukan!</div>');
                redirect('data_warga/ktp');
            }
        } else {
            $data['ktp_image'] = $query->row_array();
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path']     = './assets/img/ktp';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['ktp_image']['gambar_ktp'];
                    if ($old_image != 'default_ktp.jpg') {
                        unlink(FCPATH . 'assets/img/ktp/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar_ktp', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $post = $this->input->post(null, TRUE);
            $params['nama'] = $post['nama'];
            $params['tempatLahir'] = $post['tmp_lahir'];
            $params['tanggalLahir'] = $post['tgl_lahir'];
            $params['jenisKelamin'] = $post['jk'];
            $params['golDarah'] = $post['gol_darah'];
            $params['alamat'] = $post['alamat'];
            $params['kodeRt'] = $post['kode_rt'];
            $params['kelurahan'] = $post['kelurahan'];
            $params['kecamatan'] = $post['kecamatan'];
            $params['agama'] = $post['agama'];
            $params['statusPerkawinan'] = $post['sta_perkawinan'];
            $params['pekerjaan'] = $post['pekerjaan'];
            $params['kewarganegaraan'] = $post['kewarganegaraan'];
            $params['berlakuHingga'] = $post['berlaku'];


            $this->db->where('nik', $post['nik']);
            $this->db->update('tb_ktp', $params);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Kartu Tanda Penduduk berhasil diubah!</div>');
            }
            redirect('data_warga/ktp');
        }
    }

    public function kartu_keluarga()
    {
        $data['title'] = 'Kartu Keluarga';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['title'] = 'Kartu Keluarga';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('data_warga/kartu_keluarga', $data);
        $this->load->view('template/footer');
    }

    public function detail_kk($noKk)
    {
        $where = array('noKk' => $noKk);
        $data['tb_kk'] = $this->kk_model->edit_kk($where, 'tb_kk')->row_array();
        $data['title'] = 'Detail Kartu Keluarga';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('data_warga/detail_kk', $data);
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
            $data['title'] = 'tambah KK';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();
            $data['title'] = 'Form Registrasi';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('data_warga/tambah_kk', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'noKk'              => htmlspecialchars($this->input->post('no_kk', true)),
                'namaKk'            => htmlspecialchars($this->input->post('nama_kk', true)),
                'alamat'            => htmlspecialchars($this->input->post('alamat', true)),
                'kelurahan'         => htmlspecialchars($this->input->post('kelurahan', true)),
                'kecamatan'         => htmlspecialchars($this->input->post('kecamatan', true)),
                'kabupaten'         => htmlspecialchars($this->input->post('kabupaten', true)),
                'kodepos'           => htmlspecialchars($this->input->post('kode_pos', true)),
                'provinsi'          => htmlspecialchars($this->input->post('provinsi', true)),
                'dikeluarkanTanggal' => htmlspecialchars($this->input->post('tgl_dikeluarkan', true)),
                'kodeRt'            => htmlspecialchars($this->input->post('kode_rt', true)),
                'created'           => date("Y-m-d")
            ];

            $this->db->insert('tb_kk', $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data anda ditambahkan</div>'
            );
            redirect('data_warga/kartu_keluarga');
        }
    }
    public function hapus_kk($noKk)
    {
        $where = array('noKk' => $noKk);
        $this->kk_model->hapus_kk($where, 'tb_kk');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Data Kartu keluarga Berhasil Dihapus</div>'
        );
        redirect('data_warga/kartu_keluarga');
    }
    public function edit_kk($noKk)
    {
        $this->form_validation->set_rules('nama_kk', 'Nama Kepala Keluarga', 'required|trim');
        $this->form_validation->set_rules('alamat_kk', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('tgl_dikeluarkan', 'Tanggal Dikeluarkan', 'required|trim');
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required|trim');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required|trim');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');
        $this->form_validation->set_rules('kode_pos', 'Kode POS', 'required|trim');

        if ($this->form_validation->run() == false) {
            $where = array('noKk' => $noKk);
            $query = $this->kk_model->edit_kk($where, 'tb_kk');
            $data['title'] = 'Edit Kartu Keluarga';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();


            if ($query->num_rows() > 0) {
                $data['kk'] = $query->row();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('data_warga/edit_kk', $data);
                $this->load->view('template/footer');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Data Tidak Ditemukan!</div>');
                redirect('data_warga/kartu_keluarga');
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->kk_model->update_kk($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Kartu Keluarga berhasil diubah!</div>');
            }
            redirect('data_warga/kartu_keluarga');
        }
    }
}
