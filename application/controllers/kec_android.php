<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class kec_android extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    function index_get()
    {
        $id = $this->get('district_id');
        $id2 = $this->get('id');
        $id3 = $this->get('name');
        if ($id == '') {
            $kontak = $this->db->get('districts')->result();
        } else {
            $this->db->where('district_id', $id);
            $kontak = $this->db->get('districts')->result();
        }
        $this->response(array("result"=>$kontak, 200));

        //$kec = $this->db->get('districts')->result();
        //$this->response(array("result"=>$kec, 200));
    }
}
?>