<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Rest_kabkot extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get()
    {
        $id = $this->get('id_kabkot');
        if ($id == '') {
            $kontak = $this->db->get('kabkot')->result();
        } else {
            $this->db->where('id_kabkot', $id);
            $kontak = $this->db->get('kabkot')->result();
        }
        $this->response($kontak, 200);
    }
}
