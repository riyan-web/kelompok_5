<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class load_rt extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    //Menampilkan data kontak
    function index_post()
    {
            $kodeRt = $this->post('kodeRt');
            $query = $this->db->get_where('tb_rt_rw', array('kodeRt' => $kodeRt))->result();
            $this->response($query, 200);
    }
}