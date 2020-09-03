<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_kelas');
        $this->load->model('m_user');
    }

    public function index()
    {
        $this->goToDefaultPage();
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $isi['title'] = 'REORONLINE';
            $data['timeline'] = $this->m_user->timeline();
            $this->load->view('templates/auth_header', $isi);
            $this->load->view('auth/login', $data);
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            //user aktif
            if ($user['is_active'] == 1) {
                //cekpassword
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    redirect('user');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password Salah </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Akun belum Aktif, silahkan hubungi Admin!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email belum Terdaftar </div>');
            redirect('auth');
        }
    }



    public function registration()
    {
        $this->goToDefaultPage();
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        //
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama',
            'min_length' => 'Password terlalu Pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $isi['title'] = 'Registrasi';
            $data['kelas'] = $this->m_kelas->kelas();
            $this->load->view('templates/auth_header', $isi);
            $this->load->view('auth/registration', $data);
            $this->load->view('templates/auth_footer');
        } else {
            $noabsen = $this->input->post('no_absen');
            if ($noabsen == 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Silahkan Pilih Kelas </div>');
                redirect('auth/registration');
            } else {
                $idkelas = $this->input->post('class');
                $data = [
                    'name' => htmlspecialchars($this->input->post('name', true)),
                    'email' => $this->input->post('email', true),
                    'image' => 'default.jpg',
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'role_id' => 2,
                    'is_active' => 0,
                    'class' => $this->input->post('class'),
                    'no_absen' => $this->input->post('no_absen')
                ];
                //htmlspecialchars($this->input->post('name',true));
                $this->db->insert('user', $data);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Akun Berhasil Dibuat, Silahkan Hubungi Admin untuk Aktvasi </div>');
                $this->m_kelas->tambah_total($idkelas);
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success   " role="alert">Anda berhasil Logout </div>');
        redirect('auth');
    }


    public function blocked()
    {
        $isi['title'] = 'Acces Denied';
        $this->load->view('templates/auth_header', $isi);
        $this->load->view('auth/blocked');
        $this->load->view('templates/auth_footer');
    }
    public function blocked1()
    {
        $isi['title'] = 'Acces Denied';
        $this->load->view('templates/auth_header', $isi);
        $this->load->view('auth/blocked1');
        $this->load->view('templates/auth_footer');
    }

    public function about()
    {
        $isi['title'] = 'About Us';
        $this->load->view('templates/auth_header', $isi);
        $this->load->view('auth/about');
        $this->load->view('templates/auth_footer');
    }

    public function manualbook()
    {
        $isi['title'] = 'About Us';
        $this->load->view('templates/auth_header', $isi);
        $this->load->view('auth/manualbook');
        $this->load->view('templates/auth_footer');
    }

    public function goToDefaultPage()
    {
        if ($this->session->userdata('role_id') == 1) {
            redirect('admin');
        } else if ($this->session->userdata('role_id') == 2) {
            redirect('user');
        } else {
            // jika ada role_id yg lain maka tambahkan disini
        }
    }
}
