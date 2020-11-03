<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Doctorprofile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['edoctor_auth'])) {
            redirect('login');
        }
        $this->load->model('requestData');
    }

    public function index()
    {
        // $sessionDetails = $this->session->userdata['edoctor_auth'];
        // $userid = $sessionDetails['uid'];

        // $myRequest = $this->requestData->updateDoctor($userid);
        // $data = [];
        // $data['myrequest'] = $myRequest;

        // $this->load->view('content_blocks/header', $data);
    }

    public function editDoctor()
    {




        $edit = $this->input->get('id');
        $editDoctor = $this->requestData->editDoctor($edit);
        $data_doctor = [];
        $data_doctor['editDoctor'] = $editDoctor[0];

        $this->load->view('register/updatedoctor', $data_doctor);
    }
    public function updateRequest()
    {
        $data = [];
        $id = $this->input->post('id');
        $data['name'] = $this->input->post('name');
        $data['specialisation'] = $this->input->post('specialisation');
        $data['mobile'] = $this->input->post('mobile');
        $data['email'] = $this->input->post('email');
        $update = $this->requestData->updatedoctor($id, $data);
        $response = ['status' => 'success', 'message' => "updated"];
        echo json_encode($response);
    }
    public function editPatient()
    {
        $edit = $this->input->get('id');
        $editPatient = $this->requestData->editPatient($edit);
        $data = [];
        $data['editPatient'] = $editPatient[0];
        $this->load->view('register/updatepatient', $data);
    }
    public function updatePatient()
    {
        $data = [];
        $id = $this->input->post('id');
        $data['name'] = $this->input->post('name');
        $data['age'] = $this->input->post('age');
        $data['mobile'] = $this->input->post('mobile');
        $data['gender'] = $this->input->post('gender');
        $data['email'] = $this->input->post('email');
        $update = $this->requestData->updatepatient($id, $data);
        $response = ['status' => 'success', 'message' => "updated"];
        echo json_encode($response);
    }

    public function doctors()
    {
        $doctors = $this->requestData->doctordList();
        $data = [];
        $data['doctor'] = $doctors;

        $this->load->view('home/mydoctor', $data);
    }
    function requestDoctor()
    {
        $data = [];
        $data['doctor_id'] = $this->input->get('id');
      
        $this->load->view('home/requestdoctor', $data);
    }
    public function requestsave()
    {
        if ($this->input->post('requestbtn')) {
            $doctorid = $this->input->post('doctor');
      
        $doctor = $this->requestData->getDoctor($doctorid);


            $data = [];


            $data['person'] = $this->input->post('person');
            $data['specialisation'] = $doctor[0]['specialisation'];
            $data['doctor'] = $doctor[0]['id'];
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
}
