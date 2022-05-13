<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_login', 'login');
       
    }

    public function index()
    {
        show_404();
    }

    public function cekSesi()
    {
        $cookie = $this->input->cookie(('authuser'));
        if (!isset($cookie)) {       
            redirect('admin/login','refresh');
        }else{
            $this->set_session($cookie);
        }
    }

    public function login()
    {
        if ($this->session->userdata('id_user') != '') {
            $this->cekSesi();
            $this->set_session($this->input->id_user);
            redirect(base_url('admin/dashboard'));
        }
        $data = array(
            // 'script' => 'login',
        );
        $this->load->view('admin/v_login', $data);
        
    }

    public function set_session($id_user)
    {
        if ($id_user != '') {
            $userData = $this->login->cekDataById($this->req->id($id_user));
        }else{
            $userData = $this->login->getData();
        }
    
        set_cookie('authuser', $this->req->acak($userData->id), time() + (86400 * 30));
        
        $session = array(
            'id_user'   => $userData->id,
            'username'  => $userData->username,
            'level'     => $userData->level,
            'nama_user' => $userData->nama_user,
            'logged_in' => true,
        );
        $this->session->set_userdata($session);
        $this->logged_in($userData->id);
        $this->login();
    }

    function aksi()
    {
        $this->load->helper('cookie');
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        $where = array(
            'username' => $user,
            'password' => $this->req->acak($pass)
        );

        if ($this->login->cek($where) == true) {
            $userData = $this->login->getData();
            if ($userData->status == 1) {
                
                $this->set_session("");
                // $this->logged_in($this->req->acak($this->session->id_user));
                // var_dump($_COOKIE);
                // var_dump($_SESSION);
                // redirect('admin/dashboard', 'refresh');
            } else {
                
                // $this->req->print($_POST);
                $this->session->set_flashdata('warning', "Akun anda tidak aktif");
                redirect('admin/login', 'refresh');
            }
        } else {

            $this->session->set_flashdata('warning', "Username atau Password Salah");
            redirect('admin/login', 'refresh');
        }
    }

    public function logout()
    {
        $token = $this->uri->segment('4');
        if ($this->session->userdata('token') == $token) {
            $this->session->sess_destroy();
            unset($_SESSION['id_user']);
            unset($_COOKIE['id_user']);
            unset($_COOKIE['authuser']);
            redirect(base_url());
        } else {
            show_404();
        }
    }

    function logged_in($id_user) {
        $id = $id_user;
        if(!isset($_SESSION['id_user']) && isset($_COOKIE['authuser'])) {
            $_SESSION['id_user'] = $_COOKIE['authuser'];
        }
        return isset($_SESSION['id_user']);
    }

}
