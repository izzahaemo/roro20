<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_login();
        $this->load->model('m_user');
        $this->load->model('m_kelas');
    }

    public function index()
    {
        $data['titlemenu'] = 'Admin';
        $data['title'] = 'Dashboard';
        $data['user'] = $this->m_user->userone();
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view("admin/index", $data);
        $this->load->view("templates/footer", $data);
    }
    public function role()
    {
        $data['titlemenu'] = 'Admin';
        $data['title'] = 'Role';
        $data['user'] = $this->m_user->userone();
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view("admin/role", $data);
        $this->load->view("templates/footer", $data);
    }
    public function addrole()
    {
        $namerole = $this->input->post('role');
        $lastid = $this->input->post('lastid');

        $isi = [
            'id' => $lastid,
            'role' => $namerole
        ];
        $this->m_user->addrole($isi);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Access Changed! </div>');
        redirect('admin/role');
    }
    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['titlemenu'] = 'Admin';
        $data['user'] = $this->m_user->userone();
        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view("admin/role-access", $data);
        $this->load->view("templates/footer", $data);
    }
    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Access Changed! </div>');
    }
    public function account()
    {
        $data['titlemenu'] = 'Admin';
        $data['title'] = 'Account';
        $data['user'] = $this->m_user->userone();
        $data['kelas'] =$this->m_kelas->kelas();
        $data['all'] = $this->m_kelas->allkelas();
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view("admin/account", $data);
        $this->load->view("templates/footer", $data);
    }
    public function kelas($idkelas)
    {
        $data['titlemenu'] = 'Admin';
        $data['title'] = 'Account';
        $data['kelas'] = $this->m_kelas->one_kelas($idkelas);
        $data['user'] = $this->m_user->userone();
        $data['account'] =$this->m_user->user_kelas($idkelas);
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view("admin/kelas", $data);
        $this->load->view("templates/footer", $data);
    }
    public function edit_user()
    {
        $idkelas = $this->input->post('idkelas');
        $iduser = $this->input->post('iduser');
        //$edit_role = $this->input->post('edit_role');
        $edit_email = $this->input->post('email');
        $edit_active = $this->input->post('edit_active');
        $edit_role = $this->input->post('edit_role');
        $this->m_user->edit_user($iduser, $edit_role, $edit_active, $edit_email);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun berhasil di ubah! </div>');
        redirect('admin/kelas/'.$idkelas);
    }
    public function aktif()
    {
        $idkelas = $this->input->post('idkelas');
        $iduser = $this->input->post('iduser');
        $this->m_user->aktif_user($iduser);
        $this->m_kelas->tambah_aktif($idkelas);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun berhasil diaktifkan! </div>');
        $data=$this->m_user->select_user($iduser);
        
        //kirim email
        $a = date("H");
        if (($a >= 6) && ($a <= 11)) {
            $b = "Selamat Pagi";
        } else if (($a >= 11) && ($a <= 15)) {
            $b = "Selamat Siang";
        } elseif (($a > 15) && ($a <= 18)) {
            $b = "Selamat Sore";
        } else {
            $b = "Selamat Malam";
        }
        $s = 0;

        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'sisuka.no.reply@gmail.com',  // Email gmail
            'smtp_pass'   => '12j3lkSLK7sad12',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->from('sisuka.no.reply@gmail.com', 'SISUKA');
        $this->email->to($data['email']);
        $name=$data['name'];
        $this->email->subject('Aktifasi Akun REORONLINE');
        $this->email->message("Assalamu'alaikum<br>$b $name<br>Akun Anda sudah di Aktifkan </br><br><br> Klik <strong><a href='localhost/reoronline' target='_blank' rel='noopener'>disini</a></strong> Untuk masuk Ke Aplikasi<br><br>Terima kasih");
        $this->email->send();

        redirect('admin/kelas/'.$idkelas);
    }
    public function delete()
    {
        $idkelas = $this->input->post('idkelas');
        $iduser = $this->input->post('iduser');
        $this->m_user->delete_user($iduser);
        $this->m_kelas->kurang_total($idkelas);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun berhasil dihapus! </div>');
        redirect('admin/kelas/'.$idkelas);
    }
}
