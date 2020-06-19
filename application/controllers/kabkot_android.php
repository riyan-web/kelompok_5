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
        $kabkot = $this->db->get('kabkot')->result();
        $this->response(array("result"=>$kabkot, 200));
    }
}
?>
