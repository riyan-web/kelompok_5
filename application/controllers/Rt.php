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
        $this->load->model('data_warga/ktp_model');
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

    public function tambah_data_rt()
    {
        $this->form_validation->set_rules('rt', 'RT', 'required|trim|integer');
        $this->form_validation->set_rules('rw', 'RW', 'required|trim|integer');

        $data['title'] = 'Admin - Tambah Data RT RW';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('rt/tambah_data_rt', $data);
            $this->load->view('template/footer');
        } else {
            $this->rt_model->input_rt();
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert">Data anda ditambahkan</div>'
                );
                redirect('rt/data_rt');
            }
        }
    }

    public function hapus_data_rt($kodeRt)
    {
        $where = array('kodeRt' => $kodeRt);
        $this->rt_model->hapus_rt($where, 'tb_rt_rw');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Data RT RW Berhasil Dihapus</div>'
        );
        redirect('rt/data_rt');
    }

    public function edit_data_rt($kodeRt)
    {
        $this->form_validation->set_rules('rt', 'RT', 'required|trim');
        $this->form_validation->set_rules('rw', 'RW', 'required|trim');

        if ($this->form_validation->run() == false) {
            $where = array('kodeRt' => $kodeRt);
            $query = $this->rt_model->edit_rt($where, 'tb_rt_rw');
            $data['title'] = 'Admin - Edit Data RT RW';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();


            if ($query->num_rows() > 0) {
                $data['rt_rw'] = $query->row();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('rt/edit_data_rt', $data);
                $this->load->view('template/footer');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Data Tidak Ditemukan!</div>');
                redirect('rt/data_rt');
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->rt_model->update_rt($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data RT RW berhasil diubah!</div>');
            }
            redirect('rt/data_rt');
        }
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
    public function tambah_data_ketuart()
    {
        $this->form_validation->set_rules('id_user', 'User', 'required|trim|is_unique[tb_ketuart.user_id]', ['is_unique' => 'User Telah Digunakan!']);
        $this->form_validation->set_rules('nik', 'KTP', 'required|trim|is_unique[tb_ketuart.nik]', ['is_unique' => 'NIK Telah di Gunakan!']);

        $data['title'] = 'Admin - Tambah Data Ketua RT';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == false) {
            $data['tb_ktp'] = $this->ktp_model->getAllKtp()->result();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('rt/tambah_data_ketuart', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'user_id' => htmlspecialchars($this->input->post('id_user', true)),
                'nik' => htmlspecialchars($this->input->post('nik', true))
            ];
            $this->db->insert('tb_ketuart', $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">User Ketua RT Baru Telah Ditambahkan</div>'
            );
            redirect('Rt/data_ketua_rt');
        }
    }
    public function hapus_ketua_rt($id_ketua_rt)
    {
        $where = array('id_ketua_rt' => $id_ketua_rt);
        $this->rt_model->hapus_ketua_rt($where, 'tb_ketuart');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Data Ketua RT Berhasil Dihapus</div>'
        );
        redirect('rt/data_ketua_rt');
    }

    public function registrasi()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email telah di daftarkan sebelumnya!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Registrasi';
            $this->load->view('login/v_registrasi', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);

            // $this->_sendEmail();

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data anda ditambahkan. Silahkan Login</div>'
            );
            redirect('Rt/tambah_data_ketuart');
        }
    }


    public function tambah_ktp_ketua()
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
            $data['title'] = 'Tambah KTP Ketua RT';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('rt/tambah_ktp_ketua', $data);
            $this->load->view('template/footer');
        } else {
            $rt = $this->input->post('no_kk');
            $query_kodert = "SELECT `tb_kk`.`noKk`, `tb_kk`.`kodeRt`
                             FROM `tb_kk` WHERE `tb_kk`.`noKk` = $rt";
            $kode_rt = $this->db->query($query_kodert)->row_array();
            $data = [
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'noKk' => htmlspecialchars($this->input->post('no_kk', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'tempatLahir' => htmlspecialchars($this->input->post('tmp_lahir', true)),
                'tanggalLahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
                'jenisKelamin' => htmlspecialchars($this->input->post('jk', true)),
                'golDarah' => htmlspecialchars($this->input->post('gol_darah', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'kodeRt' => $kode_rt['kodeRt'],
                'kelurahan' => htmlspecialchars($this->input->post('kelurahan', true)),
                'kecamatan' => htmlspecialchars($this->input->post('kecamatan', true)),
                'kabupaten' => htmlspecialchars($this->input->post('kabupaten', true)),
                'provinsi' => htmlspecialchars($this->input->post('provinsi', true)),
                'agama' => htmlspecialchars($this->input->post('agama', true)),
                'statusPerkawinan' => htmlspecialchars($this->input->post('sta_perkawinan', true)),
                'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan', true)),
                'kewarganegaraan' => htmlspecialchars($this->input->post('kewarganegaraan', true)),
                'berlakuHingga' => htmlspecialchars($this->input->post('berlaku', true)),
                'gambar_ktp' => 'default.jpg',
                'created'     =>  date("Y-m-d")
            ];

            $this->db->insert('tb_ktp', $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data anda ditambahkan.</div>'
            );
            redirect('Rt/tambah_data_ketuart');
        }
    }

    public function tambah_kk_ketua()
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
        $this->form_validation->set_rules('kode_rt', 'RT', 'required|trim|is_unique[tb_kk.kodeRt]', ['is_unique' => 'Data KK Ketua Untuk RT tersebut Telah Ada']);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'tambah KK';
            $data['user'] = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();
            $data['title'] = 'Form Registrasi';
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('rt/tambah_kk_ketua', $data);
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
            redirect('Rt/tambah_ktp_ketua');
        }
    }
}
