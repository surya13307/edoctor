<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('patient');
        $this->load->model('doctor');
    }

    public function index() {
        $this->load->view('register/registerselect');
    }

    public function patientform() {
        $this->load->view('register/patientform');
    }

    public function doctorform() {
        $this->load->view('register/doctorform');
    }

    public function patientsave() {
        if ($this->input->post('patientbtn')) {
            $data = [];
            $data['name'] = $this->input->post('name');
            $data['age'] = $this->input->post('age');
            $data['gender'] = $this->input->post('gender');
            $data['mobile'] = $this->input->post('mobile');
            $data['email'] = $this->input->post('email');
            $userData = [];
            $userData['name'] = $this->input->post('name');
            $userData['username'] = $this->input->post('email');
            $userData['role'] = "PATIENT";
            $password = $this->input->post('password');
            $repeatpassword = $this->input->post('repeat-password');
            if ($password == $repeatpassword) {
                $userData['password'] = password_hash($password, PASSWORD_DEFAULT);
                $lastInsertedId = $this->user->registerUser($userData);
                $data['user_id'] = $lastInsertedId;
                $this->patient->savePatient($data);
                redirect('login');
            }
        }
    }

    public function doctorsave() {


        if ($this->input->post('doctorbtn')) {
            $data = [];
            $data['name'] = $this->input->post('name');
            $data['specialisation'] = $this->input->post('specialisation');
            $data['address'] = $this->input->post('address');
            $data['mobile'] = $this->input->post('mobile');
            $data['email'] = $this->input->post('email');
            $userData = [];
            $userData['name'] = $this->input->post('name');
            $userData['username'] = $this->input->post('email');
            $userData['role'] = "DOCTOR";
            $password = $this->input->post('password');
            $repeatpassword = $this->input->post('repeat-password');
            if ($password == $repeatpassword) {
                $userData['password'] = password_hash($password, PASSWORD_DEFAULT);
                $lastInsertedId = $this->user->registerUser($userData);

                $data['user_id'] = $lastInsertedId;
                $this->doctor->saveDoctor($data);
                redirect('login');
            }
        }
    }

}
