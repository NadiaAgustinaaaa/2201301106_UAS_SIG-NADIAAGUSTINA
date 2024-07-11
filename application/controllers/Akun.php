<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('login');
    }

    public function index()
    {
        $data['data'] = $this->AkunModel->getdata()->result();
        $this->load->view('t_admin/header');
        $this->load->view('t_admin/nav');
        $this->load->view('akun', $data);
        $this->load->view('t_admin/footer');
    }

    public function tambah()
    {
        $this->load->view('t_admin/header');
        $this->load->view('t_admin/nav');
        $this->load->view('tambah_akun');
        $this->load->view('t_admin/footer');
    }

    public function proses_tambah_akun()
    {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level'];

        $data = array(
            'id' => $id,
            'username' => $username,
            'password' => $password,
            'level' => $level,
        );

        $this->AkunModel->tambah($data);
        redirect('akun');
    }

    public function edit($id)
    {
        $data['data'] = $this->AkunModel->getdataid($id)->row();
        $this->load->view('t_admin/header');
        $this->load->view('t_admin/nav');
        $this->load->view('edit_akun', $data);
        $this->load->view('t_admin/footer');
    }

    public function proses_edit_akun()
    {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $level = $_POST['level'];

        $data = array(
            'id' => $id,
            'username' => $username,
            'password' => $password,
            'level' => $level,
        );

        $this->AkunModel->edit($data, $id);
        redirect('akun');
    }

    public function hapus($id)
    {
        $this->AkunModel->hapus($id);
        redirect('akun');
    }
}
