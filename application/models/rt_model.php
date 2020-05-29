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
}
