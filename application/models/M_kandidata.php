<?php

// Untuk koneksi data Kandidat Akhwat
class M_kandidata extends CI_Model
{
    function kandidat()
    {
        $hasil = $this->db->get('kandidata')->result_array();
        return $hasil;
    }

    function one_kandidat($id)
    {
        $query = " SELECT *
                   FROM `kandidata` 
                   WHERE `id` = '$id'
        ";
        return $this->db->query($query)->row_array();
    }

    function update_kandidat($isi, $id)
    {
        $hasil = $this->db->where('id', $id);
        $hasil = $this->db->update('kandidata', $isi);
        return $hasil;
    }

    function vote_kandidat($id)
    {
        $query = " SELECT `vote` FROM `kandidata` WHERE `id` = '$id' ";
        $isi = $this->db->query($query)->row_array();
        $isi['vote'] = $isi['vote'] + 1;
        $this->db->where('id', $id);
        return $this->db->update('kandidata', $isi);
    }
    function kurang_total($idkelas)
    {
        $query = " SELECT `total` FROM `kelas` WHERE `idkelas` = '$idkelas' ";
        $isi = $this->db->query($query)->row_array();
        $isi['total'] = $isi['total'] - 1;
        $hasil = $this->db->where('idkelas', $idkelas);
        return $hasil = $this->db->update('kelas', $isi);
    }

    function tambah_aktif($idkelas)
    {
        $query = " SELECT `aktif` FROM `kelas` WHERE `idkelas` = '$idkelas' ";
        $isi = $this->db->query($query)->row_array();
        $isi['aktif'] = $isi['aktif'] + 1;
        $hasil = $this->db->where('idkelas', $idkelas);
        return $hasil = $this->db->update('kelas', $isi);
    }
    function tambah_done($idkelas)
    {
        $query = " SELECT `done` FROM `kelas` WHERE `idkelas` = '$idkelas' ";
        $isi = $this->db->query($query)->row_array();
        $isi['done'] = $isi['done'] + 1;
        $hasil = $this->db->where('idkelas', $idkelas);
        return $hasil = $this->db->update('kelas', $isi);
    }
}
