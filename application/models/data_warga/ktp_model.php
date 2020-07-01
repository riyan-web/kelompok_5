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

    function input_ktp($post)
    {
        $data = [
            'nik' => htmlspecialchars($this->input->post('nik', true)),
            'noKk' => htmlspecialchars($this->input->post('no_kk', true)),
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'tempatLahir' => htmlspecialchars($this->input->post('tmp_lahir', true)),
            'tanggalLahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'jenisKelamin' => htmlspecialchars($this->input->post('jk', true)),
            'golDarah' => htmlspecialchars($this->input->post('gol_darah', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'kodeRt' => htmlspecialchars($this->input->post('kode_rt', true)),
            'kelurahan' => htmlspecialchars($this->input->post('kelurahan', true)),
            'kecamatan' => htmlspecialchars($this->input->post('kecamatan', true)),
            'kabupaten' => htmlspecialchars($this->input->post('kabupaten', true)),
            'provinsi' => htmlspecialchars($this->input->post('provinsi', true)),
            'agama' => htmlspecialchars($this->input->post('agama', true)),
            'statusPerkawinan' => htmlspecialchars($this->input->post('sta_perkawinan', true)),
            'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan', true)),
            'kewarganegaraan' => htmlspecialchars($this->input->post('kewarganegaraan', true)),
            'berlakuHingga' => htmlspecialchars($this->input->post('berlaku', true)),
            'gambar_ktp' => $post['image'],
            'created'     =>  date("Y-m-d")
        ];
        $this->db->insert('tb_ktp', $data);
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
        $params['nama'] = $post['nama'];
        $params['tempatLahir'] = $post['tmp_lahir'];
        $params['tanggalLahir'] = $post['tgl_lahir'];
        $params['jenisKelamin'] = $post['jk'];
        $params['golDarah'] = $post['gol_darah'];
        $params['alamat'] = $post['alamat'];
        $params['kodeRt'] = $post['kode_rt'];
        $params['kelurahan'] = $post['kelurahan'];
        $params['kecamatan'] = $post['kecamatan'];
        $params['kabupaten'] = $post['kabupaten'];
        $params['provinsi'] = $post['provinsi'];
        $params['agama'] = $post['agama'];
        $params['statusPerkawinan'] = $post['sta_perkawinan'];
        $params['pekerjaan'] = $post['pekerjaan'];
        $params['kewarganegaraan'] = $post['kewarganegaraan'];
        $params['berlakuHingga'] = $post['berlaku'];

        $this->db->where('nik', $post['nik']);
        $this->db->update('tb_ktp', $params);
    }
}
