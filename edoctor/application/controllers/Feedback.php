<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($this->session->userdata['edoctor_auth'])) {
            redirect('login');
        }
        $this->load->model('requestData');
    }

    public function index() {
        $id = $this->input->get('id');
        $data['request_id'] = $id;
        $this->load->view('home/feedback', $data);
    }

    public function saveFeedback() {
        $feedbackId = $this->input->post('feedback_id');
        if ($feedbackId) {
            $data['review'] = $this->input->post('feedback');
            $data['rating'] = $this->input->post('rate');
            $update = $this->requestData->updateFeedback($data, $feedbackId);
            redirect('feedback/patientreviews');
        } else {
            $sessionDetails = $this->session->userdata['edoctor_auth'];
            $data['user_id'] = $sessionDetails['uid'];
            $data['request_id'] = $this->input->post('request_id');
            $data['review'] = $this->input->post('feedback');
            $data['rating'] = $this->input->post('rate');
            $request_data = $this->requestData->getRequestDataDetails($this->input->post('request_id'));
            $data['doctor_id'] = $request_data[0]['doctor'];
            $save = $this->requestData->saveReview($data);

            $updateData['reviewed'] = true;
            $update = $this->requestData->updateRequest($this->input->post('request_id'), $updateData);
            redirect('myrequests');
        }
    }

    public function patientreviews() {
        $sessionDetails = $this->session->userdata['edoctor_auth'];
        $user_id = $sessionDetails['uid'];
        $feedbacks = $this->requestData->getFeedbacks($user_id);
        $data['feedbacks'] = $feedbacks;
        $this->load->view('home/feedbackList', $data);
    }

    public function editfeedback() {
        $feedbackId = $this->input->get('id');
        $feedbackDetail = $this->requestData->getFeedbackDetail($feedbackId);
        $data['feedback_details'] = $feedbackDetail[0];
        $this->load->view('home/editfeedback', $data);
    }

}
