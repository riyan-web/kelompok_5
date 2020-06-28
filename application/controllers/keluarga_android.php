<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class keluarga_android extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    //Menampilkan data kontak
    function index_get()
    {
        $ktp = $this->db->get('tb_kk')->result();
        $this->response(array("result"=>$ktp, 200));
    }
    
    function index_post()
    {
        $data = array(
            'noKk'              => $this->post('noKk'),
            'namaKk'            => $this->post('namaKk'),
            'alamat'            => $this->post('alamat'),
            'kelurahan'         => $this->post('kelurahan'),
            'kecamatan'         => $this->post('kecamatan'),
            'kabupaten'         => $this->post('kabupaten'),
            'kodePos'           => $this->post('kodePos'),
            'provinsi'          => $this->post('provinsi'),
            'dikeluarkanTanggal'=> $this->post('dikeluarkanTanggal'),
            'kodeRt'            => $this->post('kodeRt')
        );
        $insert = $this->db->insert('tb_kk', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_put(){
        $id = $this->put('nik');
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

    function index_delete(){
        $id = $this->delete('noKk');
        $this->db->where('noKk', $id);
        $delete = $this->db->delete('tb_kk');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
