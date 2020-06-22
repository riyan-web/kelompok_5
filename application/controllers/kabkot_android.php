<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class kabkot_android extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    function index_get()
    {
        $id = $this->get('name');
        $id2= $this->get('province_id');
        $id3= $this->get('id');
        if ($id == '') {
            $kontak = $this->db->get('regencies')->result();
        } else {
            $this->db->where('name', $id);
            $kontak = $this->db->get('regencies')->result();
        }
        $this->response($kontak, 200);
    }
}
?>
