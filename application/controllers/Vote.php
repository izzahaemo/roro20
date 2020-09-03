<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vote extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
        $this->load->model('m_user');
        $this->load->model('m_kelas');
        $this->load->model('m_kandidati');
        $this->load->model('m_kandidata');
    }
    public function index()
    {
        $data['title'] = 'Vote Ikhwat';
        $data['user'] = $this->m_user->userone();
        $data['kandidat'] = $this->m_kandidati->kandidat();
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view("vote/index", $data);
        $this->load->view("templates/footer", $data);
    }
    public function ikhwan()
    {
        $data['title'] = 'Vote Ikhwan';
        $data['user'] = $this->m_user->userone();
        $data['kandidat'] = $this->m_kandidati->kandidat();
        $data['timeline'] = $this->m_user->timeline();
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view("vote/ikhwan", $data);
        $this->load->view("templates/footer", $data);
    }
    public function akhwat()
    {
        $data['title'] = 'Vote Akhwat';
        $data['user'] = $this->m_user->userone();
        $data['kandidat'] = $this->m_kandidata->kandidat();
        $data['timeline'] = $this->m_user->timeline();
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view("vote/akhwat", $data);
        $this->load->view("templates/footer", $data);
    }
    function vote()
    {
        $data['user'] = $this->m_user->userone();
        $id = $this->input->post('id');
        $jenis = $this->input->post('jenis');
        if ($jenis == 'i') {
            $this->m_kandidati->vote_kandidat($id);
            $this->m_user->vote_one($data['user']['id'], 1);
            $j = 'ikhwan';
        } else if ($jenis == 'a') {
            $this->m_kandidata->vote_kandidat($id);
            $this->m_user->vote_one($data['user']['id'], 2);
            $j = 'akhwat';
        }
        $check = $this->m_user->check($data['user']['id']);
        if ($check['votei'] == 1 && $check['votea'] == 1) {
            $this->m_user->vote_all($data['user']['id']);
            $this->m_kelas->tambah_done($data['user']['class']);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Anda Berhasil Memilih</div>');
        redirect('vote/' . $j);
    }

    public function pengumuman()
    {
        $data['titlemenu'] = 'Vote';
        $data['title'] = 'Pengumuman Vote';
        $data['user'] = $this->m_user->userone();
        $data['all'] = $this->m_kelas->allkelas();
        $data['ikhwan'] = $this->m_kandidati->kandidat();
        $data['akhwat'] = $this->m_kandidata->kandidat();
        $data['timeline'] = $this->m_user->timeline();
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view("vote/pengumuman", $data);
        $this->load->view("templates/footer", $data);
    }
}
