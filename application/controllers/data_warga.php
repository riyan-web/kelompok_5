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
        $data['title'] = 'Edit KTP';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

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
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('data_warga/edit_ktp', $data);
            $this->load->view('template/footer');
        }
    }

    public function update_ktp($nik)
    {
        $where = array('nik' => $nik);
        $data['tb_ktp'] = $this->ktp_model->edit_ktp($where, 'tb_ktp')->result();
        $data['title'] = 'Edit KTP';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $nik = $this->input->post('nik');
        $no_kk = $this->input->post('no_kk');
        $nama = $this->input->post('nama');
        $tmp_lahir = $this->input->post('tmp_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $jk = $this->input->post('jk');
        $gol_darah = $this->input->post('gol_darah');
        $alamat = $this->input->post('alamat');
        $kode_rt = $this->input->post('kode_rt');
        $kelurahan = $this->input->post('kelurahan');
        $kecamatan = $this->input->post('kecamatan');
        $agama = $this->input->post('agama');
        $sta_perkawinan = $this->input->post('sta_perkawinan');
        $pekerjaan = $this->input->post('pekerjaan');
        $kewarganegaraan = $this->input->post('kewarganegaraan');
        $berlaku = $this->input->post('berlaku');


        //cek jika ada gambar yang diupload
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path']     = './assets/img/ktp';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['tb_ktp']['gambar_ktp'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar_ktp', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        // $edit_ktp = array(
        //     'noKk'              => $no_kk,
        //     'nama'              => $nama,
        //     'tempatLahir'       => $tmp_lahir,
        //     'tanggalLahir'      => $tgl_lahir,
        //     'jenisKelamin'      => $jk,
        //     'golDarah'          => $gol_darah,
        //     'alamat'            => $alamat,
        //     'kodeRt'            => $kode_rt,
        //     'kelurahan'         => $kelurahan,
        //     'kecamatan'         => $kecamatan,
        //     'agama'             => $agama,
        //     'statusPerkawinan'  => $sta_perkawinan,
        //     'pekerjaan'         => $pekerjaan,
        //     'kewarganegaraan'   => $kewarganegaraan,
        //     'berlakuHingga'     => $berlaku
        // );
        $this->db->set(
            'noKk',
            $no_kk,
            'nama',
            $nama,
            'tempatLahir',
            $tmp_lahir,
            'tanggalLahir',
            $tgl_lahir,
            'jenisKelamin',
            $jk,
            'golDarah',
            $gol_darah,
            'alamat',
            $alamat,
            'kodeRt',
            $kode_rt,
            'kelurahan',
            $kelurahan,
            'kecamatan',
            $kecamatan,
            'agama',
            $agama,
            'statusPerkawinan',
            $sta_perkawinan,
            'pekerjaan',
            $pekerjaan,
            'kewarganegaraan',
            $kewarganegaraan,
            'berlakuHingga',
            $berlaku
        );
        $this->db->where('nik', $nik);
        $this->db->update('tb_ktp');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Profile anda telah diubah</div>'
        );
        redirect('data_warga/ktp');
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
    public function hapus_kk($noKk)
    {
        $where = array('noKk' => $noKk);
        $this->kk_model->hapus_kk($where, 'tb_kk');
        redirect('data_warga/kartu_keluarga');
    }
    public function edit_kk($noKk)
    {
        $where = array('noKk' => $noKk);
        $data['tb_kk'] = $this->kk_model->edit_kk($where, 'tb_kk')->result();
        $data['title'] = 'Edit Kartu Keluarga';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

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
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('data_warga/edit_kk', $data);
            $this->load->view('template/footer');
        } else {
            redirect('data_warga/update_kk');
        }
    }

    public function update_kk()
    {
        $no_kk = $this->input->post('no_kk', true);
        $nama_kk = $this->input->post('nama_kk', true);
        $alamat = $this->input->post('alamat', true);
        $kelurahan = $this->input->post('kelurahan', true);
        $kecamatan = $this->input->post('kecamatan', true);
        $kabupaten = $this->input->post('kabupaten', true);
        $kodepos = $this->input->post('kode_pos', true);
        $provinsi = $this->input->post('provinsi', true);
        $tgl_dikeluarkan = $this->input->post('tgl_dikeluarkan', true);
        $kode_rt = $this->input->post('kode_rt', true);


        $this->db->set(
            'nama_kk',
            $nama_kk,
            'alamat',
            $alamat,
            'kelurahan',
            $kelurahan,
            'kecamatan',
            $kecamatan,
            'kabupaten',
            $kabupaten,
            'kodepos',
            $kodepos,
            'provinsi',
            $provinsi,
            'dikeluarkanTanggal',
            $tgl_dikeluarkan,
            'kodeRt',
            $kode_rt
        );
        $this->db->where('noKk', $no_kk);
        $this->db->update('tb_kk');


        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Data anda ditambahkan</div>'
        );
        redirect('data_warga/tambah_kk');
    }
}
