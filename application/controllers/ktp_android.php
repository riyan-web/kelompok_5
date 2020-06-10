<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class ktp_android extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    //Menampilkan data kontak
    function index_get()
    {
        $ktp = $this->db->get('tb_ktp')->result();
        $this->response(array("result"=>$ktp, 200));
    }
}
