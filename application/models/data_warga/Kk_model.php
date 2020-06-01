<?php

class Kk_model extends CI_model
{

    public function getKk($data)
    {
        $id_user = $data['user_id'];
        var_dump($id_user);
        die;
        $query_rt = "SELECT *
        FROM  `tb_Kk` JOIN `tb_ketuart` ON  `tb_ketuart`.`noKk` = `tb_Kk`.`noKk`
        WHERE`tb_ketuart`.`user_id` = $id_user
        ";

        $rt = $this->db->query($query_rt)->result();
        return $this->db->get('tb_ktp');
    }

    function input_kk($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function hapus_kk($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function edit_kk($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_ktp($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
