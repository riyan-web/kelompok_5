<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class ktp_android extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    //Menampilkan data kontak
    function index_get()
    {
        $ktp = $this->db->get('tb_ktp')->result();
        $this->response(array("result"=>$ktp, 200));
    }
    
    function index_post(){
        $data = array(
            'nik'               => $this->post('nik'),
            'noKk'              => $this->post('noKk'),
            'nama'              => $this->post('nama'),
            'tempatLahir'       => $this->post('tempatLahir'),
            'tanggalLahir'      => $this->post('tanggalLahir'),
            'jenisKelamin'      => $this->post('jenisKelamin'),
            'golDarah'          => $this->post('golDarah'),
            'alamat'            => $this->post('alamat'),
            'kodeRt'            => $this->post('kodeRt'),
            'kelurahan'         => $this->post('kelurahan'),
            'kecamatan'         => $this->post('kecamatan'),
            'agama'             => $this->post('agama'),
            'statusPerkawinan'  => $this->post('statusPerkawinan'),
            'pekerjaan'         => $this->post('pekerjaan'),
            'kewarganegaraan'   => $this->post('kewarganegaraan'),
            'berlakuHingga'     => $this->post('berlakuHingga'),
            'gambar_ktp'        => $this->post('gambar_ktp')
        );
        $insert = $this->db->insert('tb_ktp', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_put(){
        $id = $this->put('nik');
        $data = array(
            'nik'               => $this->put('nik'),
            'noKk'              => $this->put('noKk'),
            'nama'              => $this->put('nama'),
            'tempatLahir'       => $this->put('tempatLahir'),
            'tanggalLahir'      => $this->put('tanggalLahir'),
            'jenisKelamin'      => $this->put('jenisKelamin'),
            'golDarah'          => $this->put('golDarah'),
            'alamat'            => $this->put('alamat'),
            'kodeRt'            => $this->put('kodeRt'),
            'kelurahan'         => $this->put('kelurahan'),
            'kecamatan'         => $this->put('kecamatan'),
            'agama'             => $this->put('agama'),
            'statusPerkawinan'  => $this->put('statusPerkawinan'),
            'pekerjaan'         => $this->put('pekerjaan'),
            'kewarganegaraan'   => $this->put('kewarganegaraan'),
            'berlakuHingga'     => $this->put('berlakuHingga'),
            'gambar_ktp'        => $this->put('gambar_ktp')
        );
        $this->db->where('nik', $id);
        $update = $this->db->update('tb_ktp', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete(){
        $id = $this->delete('nik');
        $this->db->where('nik', $id);
        $delete = $this->db->delete('tb_ktp');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
