<?php

class Domisili_model extends CI_model
{

    public function getDomisili()
    {
        $this->db->select('*', 'tb_ktp.nama', 'tb_kk.namaKk');
        $this->db->from('domisili');
        $this->db->join('tb_ktp', 'tb_ktp.nik = domisili.nik');
        $this->db->join('tb_kk', 'tb_kk.noKk = domisili.noKk');
        return $this->db->get();
    }

    function input_domisili($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function hapus_domisili($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function edit_domisili($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_domisili($post)
    {
        $params['id_domisili'] = $post['id_domisili'];
        $params['nik'] = $post['nik'];
        $params['alamat_asal'] = $post['alamat_asal'];
        $params['pindah_ke'] = $post['pindah_ke'];
        $params['alasan_pindah'] = $post['alasan_pindah'];
        $params['tgl_surat_dibuat'] = $post['tgl_dibuat'];
        $params['tgl_surat_masuk'] = $post['tgl_masuk'];
        $params['keterangan'] = $post['keterangan'];


        $this->db->where('id_domisili', $post['id_domisili']);
        $this->db->update('domisili', $params);
    }
}
