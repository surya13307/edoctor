<?php

class Requestdata extends CI_Model {

    public function saveRequest($data) {
        if ($this->db->insert('requestdata', $data)) {
            $lastInsertedId = $this->db->insert_id();
            return $lastInsertedId;
        }
        return FALSE;
    }

    public function patientRequest($userid) {
        $this->db->select('rd.id,rd.user_id,rd.person,rd.specialisation,d.name as doctor_name,rd.importance,rd.description,rd.requested_date,rd.status,rd.prescription_entered,rd.reviewed');
        $this->db->from('requestdata rd');
        $this->db->where('rd.user_id', $userid);
        $this->db->join('doctor d', 'd.id= rd.doctor', 'left');
        $query = $this->db->get();
        $row = $query->result_array();
        return $row;
    }

    public function editrequest($edit) {
        $this->db->select('*');
        $this->db->from('requestdata');
        $this->db->where('id', $edit);
        $query = $this->db->get();
        $row = $query->result_array();
        return $row;
    }

    public function updateRequest($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('requestdata', $data);
        return true;
    }

    public function updatePrescription($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('prescription', $data);
        return true;
    }

    public function getDoctorID($userid) {
        $this->db->select('*');
        $this->db->from('doctor');
        $this->db->where('user_id', $userid);
        $query = $this->db->get();
        $row = $query->result_array();
        return $row;
    }

    public function getDoctorData($doctorId) {
        $this->db->select('*');
        $this->db->from('requestdata');
        $this->db->where('doctor', $doctorId);
        $query = $this->db->get();
        $row = $query->result_array();
        return $row;
    }

    public function updatedoctor($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('doctor', $data);
        return true;
    }

    public function updateFeedback($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('feedback', $data);
        return true;
    }

    public function editDoctor($edit) {
        $this->db->select('*');
        $this->db->from('doctor');
        $this->db->where('user_id', $edit);
        $query = $this->db->get();
        $row = $query->result_array();
        return $row;
    }

    public function editPatient($edit) {
        $this->db->select('*');
        $this->db->from('patient');
        $this->db->where('user_id', $edit);
        $query = $this->db->get();
        $row = $query->result_array();
        return $row;
    }

    public function updatepatient($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('patient', $data);
        return true;
    }

    public function doctordList() {
        $this->db->select('*');
        $this->db->from('doctor');

        $query = $this->db->get();
        $row = $query->result_array();
        return $row;
    }

    public function getDoctor($doctorid) {
        $this->db->select('*');
        $this->db->from('doctor');
        $this->db->where('id', $doctorid);
        $query = $this->db->get();
        $row = $query->result_array();
        return $row;
    }

    public function savePatientChat($data) {
        if ($this->db->insert('messages', $data)) {
            return true;
        }
        return FALSE;
    }

    public function savePrescription($data) {
        if ($this->db->insert('prescription', $data)) {
            return true;
        }
        return FALSE;
    }

    public function saveReview($data) {
        if ($this->db->insert('feedback', $data)) {
            return true;
        }
        return FALSE;
    }

    public function getPatientMessages($id) {
        $this->db->select('*');
        $this->db->from('messages');
        $this->db->where('is_deleted', false);
        $this->db->where('request_id', $id);
        $query = $this->db->get();
        $row = $query->result_array();
        return $row;
    }

    public function getPrescriptionDetails($id) {
        $this->db->select('*');
        $this->db->from('prescription');
        $this->db->where('request_id', $id);
        $query = $this->db->get();
        $row = $query->result_array();
        return $row;
    }

    public function getRequestDataDetails($id) {
        $this->db->select('*');
        $this->db->from('requestdata');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $row = $query->result_array();
        return $row;
    }

    public function getFeedbacks($userid) {
        $this->db->select('f.id,d.name as doctor_name,f.rating,f.review,f.request_id');
        $this->db->from('feedback f');
        $this->db->where('f.user_id', $userid);
        $this->db->join('doctor d', 'd.id= f.doctor_id', 'left');
        $query = $this->db->get();
        $row = $query->result_array();
        return $row;
    }

    public function getFeedbackDetail($id) {
        $this->db->select('*');
        $this->db->from('feedback');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $row = $query->result_array();
        return $row;
    }

}
