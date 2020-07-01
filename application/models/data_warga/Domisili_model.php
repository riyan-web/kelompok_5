<?php

class Domisili_model extends CI_model
{

    public function getDomisili()
    {
        $this->db->select('*', 'tb_ktp.nama', 'tb_ktp.kodeRt', 'tb_rt_rw.kodeRt', 'tb_rt_rw.rt', 'tb_rt_rw.rw');
        $this->db->from('domisili');
        $this->db->join('tb_ktp', 'tb_ktp.nik = domisili.nik');
        $this->db->join('tb_rt_rw', 'tb_ktp.kodeRt = tb_rt_rw.kodeRt');
        return $this->db->get();
    }

    function cetak_domisili($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function input_domisili($post)
    {
        $data = [
            'nik' => htmlspecialchars($this->input->post('nik', true)),
            'alamat_asal' => htmlspecialchars($this->input->post('alamat_asal', true)),
            'pindah_ke' => htmlspecialchars($this->input->post('pindah_ke', true)),
            'alasan_pindah' => htmlspecialchars($this->input->post('alasan_pindah', true)),
            'tgl_surat_dibuat' => htmlspecialchars($this->input->post('tgl_dibuat', true)),
            'tgl_surat_masuk' => htmlspecialchars($this->input->post('tgl_masuk', true)),
            'keterangan' => htmlspecialchars($this->input->post('keterangan', true)),
            'surat_domisili' => $post['image'],
            'created'     =>  date("Y-m-d")
        ];

        $this->db->insert('domisili', $data);
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

        if ($post['image'] != null) {
            $params['surat_domisili'] = $post['image'];
        }


        $this->db->where('id_domisili', $post['id_domisili']);
        $this->db->update('domisili', $params);
    }
}
