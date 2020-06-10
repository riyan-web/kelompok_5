<?php
defined('BASEPATH') or exit('NO direct script access aloowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/Format.php';

class Rest_login extends REST_Controller
{
    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('m_logintest');
    }
    function index_post()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        // $cek=$this->m_login->cek_login_biasa($username,$password)->num_rows();
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

                    if ($data['role_id'] == 2) {
                        $data['id_user'] = $user['id_user'];
                        $data['nama'] = $user['nama'];
                        $data['email'] = $email;
                        $data['image'] = $user['image'];
                        $data['password'] = $password;
                        $data['role_id'] = $user['role_id'];
                        $data['is_active'] = $user['is_active'];
                        $data['date_created'] = $user['date_created'];
                        $this->response($data, 200);
                    }
                } else {
                    $this->response(array('status' => 'fail', 502));
                }
            } else {
                $this->response(array('status' => 'fail', 502));
            }
        }
    }
}
