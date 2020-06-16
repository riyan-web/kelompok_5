<?php

class Ktp_model extends CI_model
{

    public function getKtp()
    {
        return $this->db->get('tb_ktp');
    }

    function input_ktp($data, $table)
    {
        $this->db->insert($table, $data);
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

    function update_ktp($nik)
    {
        $no_kk = $this->input->post('no_kk');
        $nama = $this->input->post('nama');
        $tmp_lahir = $this->input->post('tmp_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $jk = $this->input->post('jk');
        $gol_darah = $this->input->post('gol_darah');
        $alamat = $this->input->post('alamat');
        $kode_rt = $this->input->post('kode_rt');
        $kelurahan = $this->input->post('kelurahan');
        $kecamatan = $this->input->post('kecamatan');
        $agama = $this->input->post('agama');
        $sta_perkawinan = $this->input->post('sta_perkawinan');
        $pekerjaan = $this->input->post('pekerjaan');
        $kewarganegaraan = $this->input->post('kewarganegaraan');
        $berlaku = $this->input->post('berlaku');
        $upload_image = $_FILES['image']['name'];

        // if ($upload_image) {
        //     $config['allowed_types'] = 'gif|jpg|png';
        //     $config['max_size']      = '2048';
        //     $config['upload_path']     = './assets/img/ktp';

        //     $this->load->library('upload', $config);

        //     if ($this->upload->do_upload('image')) {
        //         $old_image = $data['tb_ktp']['gambar_ktp'];
        //         if ($old_image != 'default.jpg') {
        //             unlink(FCPATH . 'assets/img/profile/' . $old_image);
        //         }

        //         $new_image = $this->upload->data('file_name');
        //         $this->db->set('gambar_ktp', $new_image);
        //     } else {
        //         echo $this->upload->display_errors();
        //     }
        // }

        $this->db->set(
            'noKk',
            $no_kk,
            'nama',
            $nama,
            'tempatLahir',
            $tmp_lahir,
            'tanggalLahir',
            $tgl_lahir,
            'jenisKelamin',
            $jk,
            'golDarah',
            $gol_darah,
            'alamat',
            $alamat,
            'kodeRt',
            $kode_rt,
            'kelurahan',
            $kelurahan,
            'kecamatan',
            $kecamatan,
            'agama',
            $agama,
            'statusPerkawinan',
            $sta_perkawinan,
            'pekerjaan',
            $pekerjaan,
            'kewarganegaraan',
            $kewarganegaraan,
            'berlakuHingga',
            $berlaku
        );
        $this->db->where('nik', $nik);
        $this->db->update('tb_ktp');

    }
}
