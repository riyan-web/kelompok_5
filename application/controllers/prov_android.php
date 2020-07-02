<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class prov_android extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    function index_get()
    {
        $id = $this->get('name');
        if ($id == '') {
            $kontak = $this->db->get('provinces')->result();
        } else {
            $this->db->where('name', $id);
            $kontak = $this->db->get('provinces')->result();
        }
        $this->response(array("result"=>$kontak, 200));
    }
}
?>