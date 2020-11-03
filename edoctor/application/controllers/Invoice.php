<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($this->session->userdata['edoctor_auth'])) {
            redirect('login');
        }
        $this->load->model('requestData');
        $this->load->model('patient');
        $this->load->model('doctor');
    }

    public function index() {
        $id = $this->input->get('id');
        $updateDetails['paid'] = true;
        $pay = $this->requestData->updateRequest($id,$updateDetails);
        $requestDetails = $this->requestData->getRequestDataDetails($id);
        $data['request_details'] = $requestDetails[0];
        $patientDetails = $this->patient->getPatientDetails($requestDetails[0]['user_id']);
        $data['patient_details'] = $patientDetails[0];
        $doctorDetails = $this->doctor->getDoctorDetails($requestDetails[0]['doctor']);
        $data['doctor_details'] = $doctorDetails[0];
        $this->load->view('home/invoice', $data);
    }

}
