<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Rest_kec extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get()
    {
        $id = $this->get('id_kec');
        if ($id == '') {
            $kontak = $this->db->get('kec')->result();
        } else {
            $this->db->where('id_kec', $id);
            $kontak = $this->db->get('kec')->result();
        }
        $this->response($kontak, 200);
    }
}
