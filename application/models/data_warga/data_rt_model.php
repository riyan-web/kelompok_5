<?php

class Data_rt_model extends CI_model
{

    public function getRt()
    {
        $this->db->select('*', 'tb_ktp.nama', 'tb_ktp.kodeRt', 'user.email', 'user.password', 'tb_rt_rw.kodeRt', 'tb_rt_rw.rt', 'tb_rt_rw.rw');
        $this->db->from('tb_ketuart');
        $this->db->join('tb_ktp', 'tb_ktp.nik = tb_ketuart.nik');
        $this->db->join('user', 'user.id_user = tb_ketuart.user_id');
        $this->db->join('tb_rt_rw', 'tb_rt_rw.kodeRt = tb_ktp.kodeRt');
        return $this->db->get();
    }

    function input_rt($data, $table)
    {
        $this->db->insert($table, $data);
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

    function update_rt()
    {
    }
}
