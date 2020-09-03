<?php

// Untuk koneksi data Kandidat Ikhwan
class M_kandidati extends CI_Model
{
    function kandidat()
    {
        $hasil = $this->db->get('kandidati')->result_array();
        return $hasil;
    }

    function one_kandidat($id)
    {
        $query = " SELECT *
                   FROM `kandidati` 
                   WHERE `id` = '$id'
        ";
        return $this->db->query($query)->row_array();
    }

    function update_kandidat($isi, $id)
    {
        $hasil = $this->db->where('id', $id);
        $hasil = $this->db->update('kandidati', $isi);
        return $hasil;
    }

    function vote_kandidat($id)
    {
        $query = " SELECT `vote` FROM `kandidati` WHERE `id` = '$id' ";
        $isi = $this->db->query($query)->row_array();
        $isi['vote'] = $isi['vote'] + 1;
        $this->db->where('id', $id);
        return $this->db->update('kandidati', $isi);
    }
    function kurang_total($idkelas)
    {
        $query = " SELECT `total` FROM `kelas` WHERE `idkelas` = '$idkelas' ";
        $isi = $this->db->query($query)->row_array();
        $isi['total'] = $isi['total'] - 1;
        $this->db->where('idkelas', $idkelas);
        return $this->db->update('kelas', $isi);
    }

    function tambah_aktif($idkelas)
    {
        $query = " SELECT `aktif` FROM `kelas` WHERE `idkelas` = '$idkelas' ";
        $isi = $this->db->query($query)->row_array();
        $isi['aktif'] = $isi['aktif'] + 1;
        $this->db->where('idkelas', $idkelas);
        return $this->db->update('kelas', $isi);
    }
    function tambah_done($idkelas)
    {
        $query = " SELECT `done` FROM `kelas` WHERE `idkelas` = '$idkelas' ";
        $isi = $this->db->query($query)->row_array();
        $isi['done'] = $isi['done'] + 1;
        $this->db->where('idkelas', $idkelas);
        return $this->db->update('kelas', $isi);
    }
}
