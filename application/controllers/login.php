<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->library('form_validation');   
    }

    public function index()
    {   
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        if( $this->form_validation->run() == false){
            $data['judul']= 'Form Login';
            $this->load->view('v_login', $data);
            $this->load->view('template/footer');
        }else{
            //validasinya sukses
            $this->_masuk();
        }  
    }

    private function _masuk()
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->db->get_where('user', ['email' =>$email])->row_array();
          
             //jika usernya ada
             if( $user){
                 //jika usernya aktif
                if( $user['is_active'] == 1){
                    //cek password
                    if(password_verify($password, $user['password'])){
                        $data = [
                            'email' => $user['email'],
                            'role_id' => $user['role_id']
                        ];
                        $this->session->set_userdata($data);

                        if($user['role_id'] == 1){
                        redirect('admin');
                        }else{
                            redirect('profile');
                        }
                    }else{
                        $this->session->set_flashdata('message', 
                        '<div class="alert alert-danger" role="alert">Password anda salah</div>');
                        redirect('login');
                    }
                    
                }else{
                    $this->session->set_flashdata('message', 
                    '<div class="alert alert-danger" role="alert">Akun anda belum diaktifkan!</div>');
                    redirect('login');
                }
                

            }else{
                $this->session->set_flashdata('message', 
                '<div class="alert alert-danger" role="alert">Akun anda tidak ditemukan!</div>');
                redirect('login');
            }
        }
    

    public function registrasi()
    {
        $this->form_validation->set_rules('nama','Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
            'is_unique' => 'Email telah di daftarkan sebelumnya!'
        ]);
        $this->form_validation->set_rules('password1','Password', 'required|trim|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2','Password', 'required|trim|matches[password1]');


        if( $this->form_validation->run() == false){
            $data['judul']= 'Form Registrasi';
            $this->load->view('v_registrasi', $data);
            $this->load->view('template/footer');
        }else{
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email',true)),
                'image' =>'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', 
            '<div class="alert alert-success" role="alert">Data anda ditambahkan. Silahkan Login</div>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', 
        '<div class="alert alert-success" role="alert">Anda telah Logout</div>');
        redirect('login');
        
    }

    public function blocked()
    {
        echo 'anda di bloked';
    }

}
