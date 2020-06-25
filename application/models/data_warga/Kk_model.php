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

    function update_kk($noKk)
    {
        $nama_kk = $this->input->post('nama_kk', true);
        $alamat = $this->input->post('alamat_kk', true);
        $kelurahan = $this->input->post('kelurahan', true);
        $kecamatan = $this->input->post('kecamatan', true);
        $kabupaten = $this->input->post('kabupaten', true);
        $kodepos = $this->input->post('kode_pos', true);
        $provinsi = $this->input->post('provinsi', true);
        $tgl_dikeluarkan = $this->input->post('tgl_dikeluarkan', true);
        $kode_rt = $this->input->post('kode_rt', true);

        $this->db->set(
            'namaKk',
            $nama_kk,
            'alamat',
            $alamat,
            'kelurahan',
            $kelurahan,
            'kecamatan',
            $kecamatan,
            'kabupaten',
            $kabupaten,
            'kodepos',
            $kodepos,
            'provinsi',
            $provinsi,
            'dikeluarkanTanggal',
            $tgl_dikeluarkan,
            'kodeRt',
            $kode_rt
        );
        $this->db->where('noKk', $noKk);
        $this->db->update('tb_kk');
    }
}
