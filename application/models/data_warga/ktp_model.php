<?php

class Ktp_model extends CI_model
{

    public function getKtp()
    {
        $this->db->select('*');
        $this->db->from('tb_ktp');
        $this->db->join('tb_rt_rw', 'tb_rt_rw.kodeRt = tb_ktp.kodeRt');
        return $this->db->get();
    }

    function input_ktp($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function getAllKtp()
    {
        return $this->db->get('tb_ktp');
    }

    function hapus_ktp($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function edit_ktp($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_ktp($post)
    {
        $params['noKk'] = $post['no_kk'];
        $params['nama'] = $post['nama'];
        $params['tempatLahir'] = $post['tmp_lahir'];
        $params['tanggalLahir'] = $post['tgl_lahir'];
        $params['jenisKelamin'] = $post['jk'];
        $params['golDarah'] = $post['gol_darah'];
        $params['alamat'] = $post['alamat'];
        $params['kodeRt'] = $post['kode_rt'];
        $params['kelurahan'] = $post['kelurahan'];
        $params['kecamatan'] = $post['kecamatan'];
        $params['agama'] = $post['agama'];
        $params['statusPerkawinan'] = $post['sta_perkawinan'];
        $params['pekerjaan'] = $post['pekerjaan'];
        $params['kewarganegaraan'] = $post['kewarganegaraan'];
        $params['berlakuHingga'] = $post['berlaku'];

        $this->db->where('nik', $post['nik']);
        $this->db->update('tb_ktp', $params);
    }
}
