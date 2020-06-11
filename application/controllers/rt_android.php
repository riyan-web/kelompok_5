<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class rt_android extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    //Menampilkan data kontak
    function index_get()
    {
        $kontak = $this->db->get('tb_rt_rw')->result();
        $this->response(array("result"=>$kontak, 200));
    }
    function index_post(){
        $data = array(
            'kodeRt'      => $this->post('kode_rt'),
            'rt'          => $this->post('rt'),
            'rw'          => $this->post('rw')
        );
        $insert = $this->db->insert('tb_rt_rw', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_put(){
        $id = $this->put('kodeRt');
        $data = array(
            'kodeRt'       => $this->put('kodeRt'),
            'rt'          => $this->put('rt'),
            'rw'        => $this->put('rw')
        );
        $this->db->where('kodeRt', $id);
        $update = $this->db->update('tb_rt_rw', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_delete()
    {
        $id = $this->delete('kodeRt');
        $this->db->where('kodeRt', $id);
        $delete = $this->db->delete('tb_rt_rw');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
