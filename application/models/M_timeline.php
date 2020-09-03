<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_timeline extends CI_Model
{
    public function timeline()
    {
        return $this->db->get('timeline')->result_array();
    }
    function update_timeline($isi, $id)
    {
        $hasil = $this->db->where('id', $id);
        $hasil = $this->db->update('timeline', $isi);
        return $hasil;
    }
}
