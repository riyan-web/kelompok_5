<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Rest_domisili extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
    }

    //Menampilkan data kontak
    function index_get()
    {
        $domisili = $this->db->get('domisili')->result();
        $this->response(array("result" => $domisili, 200));
    }

    function index_post()
    {
        $data = array(
            'nik'               => $this->post('nik'),
            'alamat_asal'              => $this->post('alamat_asal'),
            'pindah_ke'              => $this->post('pindah_ke'),
            'alasan_pindah'       => $this->post('alasan_pindah'),
            'tgl_surat_dibuat'      => $this->post('tgl_surat_dibuat'),
            'tgl_surat_masuk'      => $this->post('tgl_surat_masuk'),
            'keterangan'          => $this->post('keterangan'),
            'surat_domisili'            => $this->post('surat_domisili'),
            'created'            => $this->post('created')
        );
        $insert = $this->db->insert('domisili', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    function index_put()
    {
        $id = $this->put('id_domisili');
        $data = array(
            'nik'               => $this->put('nik'),
            'alamat_asal'              => $this->put('alamat_asal'),
            'pindah_ke'              => $this->put('pindah_ke'),
            'alasan_pindah'       => $this->put('alasan_pindah'),
            'tgl_surat_dibuat'      => $this->put('tgl_surat_dibuat'),
            'tgl_surat_masuk'      => $this->put('tgl_surat_masuk'),
            'keterangan'          => $this->put('keterangan'),
            'surat_domisili'            => $this->put('surat_domisili'),
            'created'            => $this->put('created')
        );
        $this->db->where('id_domisili', $id);
        $update = $this->db->update('domisili', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete()
    {
        $id = $this->delete('id_domisili');
        $this->db->where('id_domisili', $id);
        $delete = $this->db->delete('domisili');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
