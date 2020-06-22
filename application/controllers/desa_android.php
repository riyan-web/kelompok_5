<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class desa_android extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    function index_get()
    {
        $id = $this->get('district_id');
        if ($id == '') {
            $kontak = $this->db->get('villages')->result();
        } else {
            $this->db->where('district_id', $id);
            $kontak = $this->db->get('villages')->result();
        }
        $this->response($kontak, 200);
    }
}
?>