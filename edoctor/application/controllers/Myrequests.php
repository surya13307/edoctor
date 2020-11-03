<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Myrequests extends CI_Controller {

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
        $sessionDetails = $this->session->userdata['edoctor_auth'];
        $userid = $sessionDetails['uid'];

        $myRequest = $this->requestData->patientRequest($userid);
        $data = [];
        $data['myrequest'] = $myRequest;

        $this->load->view('home/myRequest', $data);
    }

    public function editrequest() {
        $edit = $this->input->get('id');
        $editrequest = $this->requestData->editrequest($edit);
        $data = [];
        $data['editrequest'] = $editrequest[0];
        $this->load->view('home/editrequest', $data);
    }

    public function updateRequest() {
        $data = [];
        $id = $this->input->post('id');
        $data['description'] = $this->input->post('des');
        $data['importance'] = $this->input->post('importance');
//        $data['doctor'] = $this->input->post('doctor');
//        $data['specialisation'] = $this->input->post('spec');
        $data['person'] = $this->input->post('person');
        $update = $this->requestData->updateRequest($id, $data);
        $response = ['status' => 'success', 'message' => "updated"];
        echo json_encode($response);
    }

    public function chatbox() {

        $id = $this->input->get('id');
        $data['request_id'] = $id;
        $patientMessages = $this->requestData->getPatientMessages($id);
        $data['patient_messages'] = $patientMessages;
        $this->load->view('home/chatbox', $data);
    }

    public function savePatientChat() {
        $sessionDetails = $this->session->userdata['edoctor_auth'];
        $data['user_id'] = $sessionDetails['uid'];
        $data['message'] = $this->input->post('message');
        $data['request_id'] = $this->input->post('request_id');
        $data['is_patient'] = true;
        $data['is_doctor'] = false;
        $data['is_deleted'] = false;
        $date = new DateTime("now", new DateTimeZone('Asia/dubai'));
        $data['date'] = $date->format('Y-m-d H:i:s');
        $request_id = $this->input->post('request_id');
        $saveMessage = $this->requestData->savePatientChat($data);
        redirect('myrequests/chatbox?id=' . $request_id);
    }

    public function chatboxDoctor() {

        $id = $this->input->get('id');
        $data['request_id'] = $id;
        $patientMessages = $this->requestData->getPatientMessages($id);
        $data['patient_messages'] = $patientMessages;
        $this->load->view('home/chatboxDoctor', $data);
    }

    public function saveDoctorChat() {
        $sessionDetails = $this->session->userdata['edoctor_auth'];
        $data['user_id'] = $sessionDetails['uid'];
        $data['message'] = $this->input->post('message');
        $data['request_id'] = $this->input->post('request_id');
        $data['is_patient'] = false;
        $data['is_doctor'] = true;
        $data['is_deleted'] = false;
        $date = new DateTime("now", new DateTimeZone('Asia/dubai'));
        $data['date'] = $date->format('Y-m-d H:i:s');
        $request_id = $this->input->post('request_id');
        $saveMessage = $this->requestData->savePatientChat($data);
        redirect('myrequests/chatboxDoctor?id=' . $request_id);
    }

    public function prescription() {

        $id = $this->input->get('id');
        $data['request_id'] = $id;
        $prescription = $this->requestData->getPrescriptionDetails($id);
        if ($prescription) {
            $data['prescription'] = $prescription[0];
        } else {
            $data['prescription'] = [];
        }
        $this->load->view('home/prescriptionForm', $data);
    }

    public function savePrescription() {
        $prescriptionId = $this->input->post('prescription_id');
       
        if ($prescriptionId) {
            $data['prescription'] = $this->input->post('prescription');
            $update = $this->requestData->updatePrescription($data, $prescriptionId);
        } else {
            $sessionDetails = $this->session->userdata['edoctor_auth'];
            $data['user_id'] = $sessionDetails['uid'];
            $data['request_id'] = $this->input->post('request_id');
            $date = new DateTime("now", new DateTimeZone('Asia/dubai'));
            $data['date'] = $date->format('Y-m-d H:i:s');
            $updateData['prescription_entered'] = true;
            $save = $this->requestData->savePrescription($data);

            $update = $this->requestData->updateRequest($this->input->post('request_id'), $updateData);
        }
        redirect('requests');
    }

    public function patientPrescription() {

        $id = $this->input->get('id');
        $data['request_id'] = $id;
        $request_data = $this->requestData->getRequestDataDetails($id);
        $prescription = $this->requestData->getPrescriptionDetails($id);
        $requestDetails = $request_data[0];
        if ($requestDetails['paid'] == true) {
            if ($prescription) {
                $data['prescription'] = $prescription[0];
            } else {

                $data['prescription'] = false;
            }
            $data['request_details'] = $request_data[0];
            $patientDetails = $this->patient->getPatientDetails($request_data[0]['user_id']);
            $data['patient_details'] = $patientDetails[0];
            $doctorDetails = $this->doctor->getDoctorDetails($request_data[0]['doctor']);
            $data['doctor_details'] = $doctorDetails[0];
            $this->load->view('home/prescriptionPage', $data);
        } else {
            redirect('myrequests/paymentPage?id=' . $id);
        }
    }

    public function paymentPage() {
        $id = $this->input->get('id');
        $requestDetails = $this->requestData->getRequestDataDetails($id);
        $data['request_id'] = $id;
        $data['request_details'] = $requestDetails[0];
        $this->load->view('home/paymentPage', $data);
    }

}
