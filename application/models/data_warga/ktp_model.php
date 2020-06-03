<?php

class Ktp_model extends CI_model
{

    public function getKtp()
    {
        $data = $this->db->query("SELECT * FROM tb_ktp");
        return $data->row_array();
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

    function update_ktp($where, $edit_ktp, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $edit_ktp);
    }
}
