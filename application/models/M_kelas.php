<?php

// Untuk koneksi data kelas
class M_kelas extends CI_Model
{
    function kelas()
    {
        $hasil = $this->db->get('kelas')->result_array();
        return $hasil;
    }

    function one_kelas($idkelas)
    {
        $query = " SELECT *
                   FROM `kelas` 
                   WHERE `idkelas` = '$idkelas'
        ";
        return $this->db->query($query)->row_array();
    }

    function allkelas()
    {
        $query = "SELECT SUM(`total`) AS`total`FROM `kelas`";
        $total = $this->db->query($query)->row_array();
        $query = "SELECT SUM(`aktif`) AS`aktif`FROM `kelas`";
        $aktif = $this->db->query($query)->row_array();
        $query = "SELECT SUM(`done`) AS`done`FROM `kelas`";
        $done = $this->db->query($query)->row_array();
        $hasil = [
            'total' => $total,
            'aktif' => $aktif,
            'done' => $done
        ];
        return $hasil;
    }

    function tambah_total($idkelas)
    {
        $query = " SELECT `total` FROM `kelas` WHERE `idkelas` = '$idkelas' ";
        $isi = $this->db->query($query)->row_array();
        $isi['total'] = $isi['total'] + 1;
        $hasil = $this->db->where('idkelas', $idkelas);
        return $hasil = $this->db->update('kelas', $isi);
    }
    function kurang_total($idkelas)
    {
        $query = " SELECT `total` FROM `kelas` WHERE `idkelas` = '$idkelas' ";
        $isi = $this->db->query($query)->row_array();
        $isi['total'] = $isi['total'] - 1;
        $hasil = $this->db->where('idkelas', $idkelas);
        return $hasil = $this->db->update('kelas', $isi);
    }

    function kurang_aktif($idkelas)
    {
        $query = " SELECT `aktif` FROM `kelas` WHERE `idkelas` = '$idkelas' ";
        $isi = $this->db->query($query)->row_array();
        $isi['aktif'] = $isi['aktif'] - 1;
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
