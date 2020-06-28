<?php

class Kk_model extends CI_model
{

    public function getKk()
    {
        $this->db->select('*');
        $this->db->from('tb_kk');
        $this->db->join('tb_rt_rw', 'tb_rt_rw.kodeRt = tb_kk.kodeRt');
        return $this->db->get();
    }

    function input_kk($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function hapus_kk($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function edit_kk($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_kk($post)
    {
        $params['namaKk'] = $post['nama_kk'];
        $params['alamat'] = $post['alamat_kk'];
        $params['kelurahan'] = $post['kelurahan'];
        $params['kecamatan'] = $post['kecamatan'];
        $params['kabupaten'] = $post['kabupaten'];
        $params['kodepos'] = $post['kode_pos'];
        $params['provinsi'] = $post['provinsi'];
        $params['dikeluarkanTanggal'] = $post['tgl_dikeluarkan'];
        $params['kodeRt'] = $post['kode_rt'];


        $this->db->where('noKk', $post['no_kk']);
        $this->db->update('tb_kk', $params);
    }
}
