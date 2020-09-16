<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    public function getSiswa()
    {
        $query = $this->db->query("SELECT `keterangan` FROM `keterangan` WHERE `keterangan` = 'lulus'
        ");
        $lulus = $query->num_rows();
        return $lulus;
    }

    public function tidakLulus()
    {
        $query = $this->db->query("SELECT `keterangan` FROM `keterangan` WHERE `keterangan` = 'tidak lulus'
        ");
        $tidak_lulus = $query->num_rows();
        return $tidak_lulus;
    }


    public function SiswaTerdaftar()
    {
        $query = $this->db->query("SELECT `name` FROM `user`");
        $totalTerdaftar = $query->num_rows();
        return $totalTerdaftar;
    }
}