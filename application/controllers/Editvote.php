<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Editvote extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
        $this->load->model('m_user');
        $this->load->model('m_kelas');
        $this->load->model('m_timeline');
        $this->load->model('m_kandidati');
        $this->load->model('m_kandidata');
    }
    public function index()
    {
        $data['titlemenu'] = 'Edit Vote';
        $data['title'] = 'Dashboard ';
        $data['user'] = $this->m_user->userone();
        $data['all'] = $this->m_kelas->allkelas();
        $data['ikhwan'] = $this->m_kandidati->kandidat();
        $data['akhwat'] = $this->m_kandidata->kandidat();
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view("editvote/index", $data);
        $this->load->view("templates/footer", $data);
    }
    public function timeline()
    {
        $data['titlemenu'] = 'Edit Vote';
        $data['title'] = 'Edit Timeline';
        $data['user'] = $this->m_user->userone();
        $data['timeline'] = $this->m_user->timeline();
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view("editvote/timeline", $data);
        $this->load->view("templates/footer", $data);
    }

    public function edittime()
    {
        $id = $this->input->post('id');
        $isi = [
            'name' => $this->input->post('name'),
            'tgl' => $this->input->post('tgl')
        ];
        $this->m_user->update_timeline($isi, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Berhasil di Ubah</div>');
        redirect('editvote/timeline');
    }


    public function kandidat()
    {
        $data['titlemenu'] = 'Edit Vote';
        $data['title'] = 'Edit Kandidat';
        $data['user'] = $this->m_user->userone();
        $data['ikhwan'] = $this->m_kandidati->kandidat();
        $data['akhwat'] = $this->m_kandidata->kandidat();
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view("editvote/kandidat", $data);
        $this->load->view("templates/footer", $data);
    }

    public function ekandidat($j, $id)
    {
        $data['titlemenu'] = 'Edit Vote';
        $data['title'] = 'Edit Kandidat';
        $data['user'] = $this->m_user->userone();
        if ($j == 'i') {
            $data['kandidat'] = $this->m_kandidati->one_kandidat($id);
            $data['jenis'] = 'i';
        } else if ($j == 'a') {
            $data['kandidat'] = $this->m_kandidata->one_kandidat($id);
            $data['jenis'] = 'a';
        }
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view("editvote/ekandidat", $data);
        $this->load->view("templates/footer", $data);
    }
    public function editk()
    {
        $id = $this->input->post('id');
        $jenis = $this->input->post('jenis');
        if ($jenis == 'i') {
            $data['kandidat'] = $this->m_kandidati->one_kandidat($id);
        } else if ($jenis == 'a') {
            $data['kandidat'] = $this->m_kandidata->one_kandidat($id);
        }
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['upload_path'] =  './assets/img/kandidat/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                //menghapus gambar lama
                $old_image = $data['kandidat']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/kandidat/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect('editvote/ekandidat/' . $jenis . '/' . $id);
            }
            // Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
            $this->upload->initialize($config);
        } else {
            $new_image = $data['kandidat']['image'];
        }
        $isi = [
            'name' => $this->input->post('name'),
            'kelas' => $this->input->post('kelas'),
            'visi' => $this->input->post('visi'),
            'misi' => $this->input->post('misi'),
            'url' => $this->input->post('url'),
            'image' => $new_image
        ];
        if ($jenis == 'i') {
            $this->m_kandidati->update_kandidat($isi, $id);
        } else if ($jenis == 'a') {
            $this->m_kandidata->update_kandidat($isi, $id);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Berhasil di Ubah</div>');
        redirect('editvote/ekandidat/' . $jenis . '/' . $id);
    }
}
