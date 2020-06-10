<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use PhpParser\Node\Expr\PostDec;
use Restserver\Libraries\REST_Controller;

class User extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get()
    {
        $id = $this->get('id_user');
        if ($id == '') {
            $kontak = $this->db->get('user')->result();
        } else {
            $this->db->where('id_user', $id);
            $kontak = $this->db->get('user')->result();
        }
        $this->response($kontak, 200);
    }

    function index_post()
    {
        $data = array(
            'id_user'       => '',
            'nama'          => $this->post('nama'),
            'email'         => $this->post('email'),
            'image'         => 'default.png',
            'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id'       => 2,
            'is_active'     => 1,
            'date_created'  => time()

        );
        $insert = $this->db->insert('user', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put()
    {
        $id = $this->put('id_user');
        $data = array(
            'id_user'       => $this->put('id_user'),
            'nama'          => $this->put('nama'),
            'email'    => $this->put('email')
        );
        $this->db->where('id_user', $id);
        $update = $this->db->update('user', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete()
    {
        $id = $this->delete('id_user');
        $this->db->where('id_user', $id);
        $delete = $this->db->delete('user');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
