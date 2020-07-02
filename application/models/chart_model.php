<?php

class Chart_model extends CI_model
{

    public function Ktp_per_rt()
    {
        $this->db->group_by('kodeRt');
        $this->db->select('kodeRt');
        $this->db->select("count(*) as banyak_ktp");
        return $this->db->from('tb_ktp')
            ->get()
            ->result();
    }

    public function ktp_per_bulan()
    {
        $query_ktp = "SELECT CONCAT(MONTH(created),'/',YEAR(created)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM tb_ktp GROUP BY MONTH(created),YEAR(created)";
        return $this->db->query($query_ktp)->result();
    }

    public function Kk_per_bulan()
    {
        $query_kk = "SELECT CONCAT(MONTH(created),'/',YEAR(created)) AS tahun_bulan_kk, COUNT(*) AS jumlah_bulanan_kk FROM tb_kk GROUP BY MONTH(created),YEAR(created)";
        return $this->db->query($query_kk)->result();
    }

    public function Domisili_per_bulan()
    {
        $query_domisili = "SELECT CONCAT(MONTH(created),'/',YEAR(created)) AS tahun_bulan_domisili, COUNT(*) AS jumlah_bulanan_domisili FROM domisili GROUP BY MONTH(created),YEAR(created)";
        return $this->db->query($query_domisili)->result();
    }
}
