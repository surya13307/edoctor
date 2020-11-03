<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PatientRequest extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('doctor');
        $this->load->model('requestData');
    }

    public function index() {


        $this->load->view('home/patientRequest');
    }

    public function requestsave() {
        if ($this->input->post('requestbtn')) {
            $data = [];


            $data['person'] = $this->input->post('person');
            $data['specialisation'] = $this->input->post('specialisation');
            $data['doctor'] = $this->input->post('doctor');
            $data['importance'] = $this->input->post('importance');
            $data['description'] = $this->input->post('description');
            $date = new DateTime("now", new DateTimeZone('Asia/dubai'));
            $data['requested_date'] = $date->format('Y-m-d H:i:s');
            $data['status'] = 'PENDING';
            $sessionDetails = $this->session->userdata['edoctor_auth'];
            $data['user_id'] = $sessionDetails['uid'];
            $this->requestData->saveRequest($data);
            redirect('');
        }
    }

    public function getDoctors() {
        $spec = $this->input->get('specialisation');
        $doctors = $this->doctor->getDoctorBySpec($spec);
        $response = json_encode($doctors);
        echo $response;
    }

}
