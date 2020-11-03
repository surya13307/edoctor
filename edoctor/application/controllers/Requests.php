<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Requests extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($this->session->userdata['edoctor_auth'])) {
            redirect('login');
        }
        $this->load->model('requestData');
    }

    public function index() {
        $sessionDetails = $this->session->userdata['edoctor_auth'];
        $userid = $sessionDetails['uid'];
      

        $doctorData= $this->requestData->getDoctorID($userid);

        $doctorId=$doctorData[0]['id'];
        //request data select * from requestdata where doctor = $doctor id
        $requests=$this->requestData->getDoctorData($doctorId);
        $data = [];
        $data['requests'] = $requests;
 
        $this->load->view('home/requests', $data);
    }

public function acceptRequest(){

    $id = $this->input->get('id');
    $data = [];
    $data['status'] = "ACCEPTED";
    $update = $this->requestData->updateRequest($id, $data);
    redirect('/requests');





}
public function rejectRequest(){

    $id = $this->input->get('id');
    $data = [];
    $data['status'] = "REJECTED";
    $update = $this->requestData->updateRequest($id, $data);
    redirect('/requests');

}


}

