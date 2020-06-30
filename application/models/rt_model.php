<?php

class Rt_model extends CI_model
{

    public function ketua_rt()
    {
        $this->db->select('*');
        $this->db->from('tb_rt');
        $this->db->join('tb_rw', 'tb_rw.kodeRw=tb_rt.kodeRw');
        $this->db->join('tb_ktp', 'tb_ktp.kodeRt=tb_rt.kodeRt');
        $query = $this->db->get();
        return $query->result();
    }

    function getAllRt()
    {
        return $this->db->get('tb_rt_rw');
    }

    public function input_rt()
    {
        $data = [
            'rt' => htmlspecialchars($this->input->post('rt', true)),
            'rw' => htmlspecialchars($this->input->post('rw', true)),
        ];

        $this->db->insert('tb_rt_rw', $data);
    }
    function hapus_rt($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    function edit_rt($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_rt($post)
    {
        $params['rt'] = $post['rt'];
        $params['rw'] = $post['rw'];

        $this->db->where('kodeRt', $post['kode_rt']);
        $this->db->update('tb_rt_rw', $params);
    }
}
