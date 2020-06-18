<?php

class Domisili_model extends CI_model
{

    public function getDomisili()
    {
        return $this->db->get('domisili');
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

    function update_domisili($id_domisili)
    {
    }
}
