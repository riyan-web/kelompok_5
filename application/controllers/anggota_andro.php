<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class anggota_andro extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    //Menampilkan data kontak
    function index_post()
    {

        $noKk = $this->post('noKk');
        $query = $this->db->get_where('tb_ktp', array('noKk' => $noKk))->result();
        $this->response($query, 200);
        // $ktp = $this->db->get('tb_ktp')->result();
        // $this->response(array("result"=>$ktp, 200));
    }

}