<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class ubah_password extends REST_Controller
{
    function index_put(){
        $id = $this->put('n');
        $data = array(
            'noKk'              => $this->put('noKk'),
            'namaKk'            => $this->put('namaKk'),
            'alamat'            => $this->put('alamat'),
            'kelurahan'         => $this->put('kelurahan'),
            'kecamatan'         => $this->put('kecamatan'),
            'kabupaten'         => $this->put('kabupaten'),
            'kodePos'           => $this->put('kodePos'),
            'provinsi'          => $this->put('provinsi'),
            'dikeluarkanTanggal'=> $this->put('dikeluarkanTanggal'),
            'kodeRt'            => $this->put('kodeRt')
        );
        $this->db->where('noKk', $id);
        $update = $this->db->update('tb_kk', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}