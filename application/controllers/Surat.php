<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Domisili extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        require_once APPPATH . 'third_party/dompdf/dompdf_config.inc.php';
    }
}
