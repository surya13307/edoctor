<?php

class Patient extends CI_Model {

    public function savePatient($data) {
        if ($this->db->insert('patient', $data)) {
            $lastInsertedId = $this->db->insert_id();
            return $lastInsertedId;
        }
        return FALSE;
    }

    public function getPatientDetails($user_id) {
            $this->db->select('*');
            $this->db->from('patient');
            $this->db->where('user_id', $user_id);
            $query = $this->db->get();
            $row = $query->result_array();
            return $row;
        }


}
