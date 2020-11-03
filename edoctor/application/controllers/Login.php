<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->load->library('session');
    }

    public function index() {
        $credentials = $this->input->get('credentials');
        $data['credential'] = $credentials;
        $this->load->view('content_blocks/login', $data);
    }

    public function authenticate() {

        if ($this->input->post('loginbtn')) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $checkData = $this->user->checkLogin($username, $password);
            if ($checkData['status'] == true) {
                
                $data = $checkData['data'][0];
                $rnd = chr(mt_rand(97, 122)) . substr(md5(time()), 1);
                //Add session data
                $session_data = array(
                    'uid' => $data['id'],
                    'name' => $data['name'],
                    'username' => $data['username'],
                    'role' => $data['role'],
                    'session_key' => $rnd
                );
                $this->session->set_userdata('edoctor_auth', $session_data);
                redirect();
            } else {
                redirect('login?credentials=false');
            }
        }
    }

    public function register() {
        $this->load->view('content_blocks/register');
    }

    public function registersave() {
        $name = $this->input->post('name');
        $contact = $this->input->post('contact');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $data = [];
        $data['name'] = $name;
        $data['contact'] = $contact;
        $data['username'] = $username;
        $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        $saveUser = $this->user->registerUser($data);
        redirect('login');
    }

    public function logout() {
        $this->session->unset_userdata('dct_auth');
        redirect('login');
    }

}
