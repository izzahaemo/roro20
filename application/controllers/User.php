<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
        $this->load->model('m_user');
    }
    public function index()
    {
        $data['title'] = 'Home';
        $data['user'] = $this->m_user->userone();
        $data['timeline'] = $this->m_user->timeline();
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view("user/index", $data);
        $this->load->view("templates/footer", $data);
    }
    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->m_user->userone();
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view("templates/header", $data);
            $this->load->view("templates/sidebar", $data);
            $this->load->view("templates/topbar", $data);
            $this->load->view("user/edit", $data);
            $this->load->view("templates/footer", $data);
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            //cek jika ada gambar
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['upload_path'] =  './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    //menghapus gambar lama
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('user/edit');
                }
                // Alternately you can set preferences by calling the ``initialize()`` method. Useful if you auto-load the class:
                $this->upload->initialize($config);
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('message', '<div class="alert alert-success   " role="alert"> Profil anda berhasil Di Ubah! </div>');
            redirect('user');
        }
    }
    public function changepassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->m_user->userone();
        $this->form_validation->set_rules('current_password', 'Current password', 'required|trim', [
            'required' => 'Password lama harus di isi!'
        ]);
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]', [
            'required' => 'Password baru harus di isi!',
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu Pendek!'
        ]);
        $this->form_validation->set_rules('new_password2', 'Comfrim New Password', 'required|trim|min_length[3]|matches[new_password1]', [
            'required' => 'Password baru harus di isi!',
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu Pendek!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("templates/header", $data);
            $this->load->view("templates/sidebar", $data);
            $this->load->view("templates/topbar", $data);
            $this->load->view("user/changepassword", $data);
            $this->load->view("templates/footer", $data);
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password dengan yang lama berbeda!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password tidak boleh sama dengan yang lama!</div>');
                    redirect('user/changepassword');
                } else {
                    //password ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil Di Ubah!</div>');
                    redirect('user');
                }
            }
        }
    }
}
