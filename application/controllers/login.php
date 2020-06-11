<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('profile');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Form Login';
            $this->load->view('login/v_login', $data);
            $this->load->view('template/footer');
        } else {
            //validasinya sukses
            $this->_masuk();
        }
    }

    private function _masuk()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        //jika usernya ada
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'user_id' => $user['id_user']
                    ];
                    $this->session->set_userdata($data);

                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('profile');
                    }
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger" role="alert">Password anda salah</div>'
                    );
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">Akun anda belum diaktifkan!</div>'
                );
                redirect('login');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">Akun anda tidak ditemukan!</div>'
            );
            redirect('login');
        }
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
                'is_active' => 0,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);

            // $this->_sendEmail();

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Data anda ditambahkan. Silahkan Login</div>'
            );
            redirect('login');
        }
    }



    private function _sendEmail()
    {
        $config = [
            'protocol'    => 'smtp',
            'smtp_host'   => 'ssl://smtp.googlemail.com',
            'smtp_user'   => 'pencatatankependudukan@gmail.com',
            'smtp_pass'   => 'sipeka123',
            'smtp_port'   => 465,
            'mailtype'    => 'html',
            'charset'     => 'utf-8',
        ];

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from('pencatatankependudukan@gmail.com', 'Sistem Informasi Pencatatan Kependudukan');
        $this->email->to('yudiiriyanto7@gmail.com');
        $this->email->subject('Reset Password');
        $this->email->message('klik link untuk mereset password');


        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();

            die;
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Anda telah Logout</div>'
        );
        redirect('login');
    }

    public function blocked()
    {

        $this->load->view('template/not_found');
    }

    public function lupa_pass()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Lupa Password';
            $this->load->view('login/lupa_password', $data);
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-succes" role="alert">Silahkan cek email anda untuk reset password</div>'
                );
                redirect('login/lupa_pass');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">Email anda tidak terdaftar atau belum aktif</div>'
                );
                redirect('login/lupa_pass');
            }
        }
    }
}
