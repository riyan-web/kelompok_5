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

    function update_domisili()
    {
        $id_domisili = $this->input->post('id_domisili');
        $nik = $this->input->post('nik');
        $alamat_asal = $this->input->post('alamat_asal');
        $pindah_ke = $this->input->post('pindah_ke');
        $alasan_pindah = $this->input->post('alasan_pindah');
        $tgl_dibuat = $this->input->post('tgl_dibuat');
        $tgl_masuk = $this->input->post('tgl_masuk');
        $keterangan = $this->input->post('keterangan');

        $this->db->set(
            'id_domisili',
            $id_domisili,
            'nik',
            $nik,
            'alamat_asal',
            $alamat_asal,
            'pindah_ke',
            $pindah_ke,
            'alasan_pindah',
            $alasan_pindah,
            'tgl_surat_dibuat',
            $tgl_dibuat,
            'tgl_surat_masuk',
            $tgl_masuk,
            'keterangan',
            $keterangan
        );
        $this->db->where('id_domisili', $id_domisili);
        $this->db->update('domisili');
    }
}
