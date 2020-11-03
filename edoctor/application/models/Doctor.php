<?php

class Doctor extends CI_Model {

    public function saveDoctor($data) {

        if ($this->db->insert('doctor', $data)) {
            $lastInsertedId = $this->db->insert_id();
            return $lastInsertedId;
        }
        return FALSE;
    }

    public function getDoctorBySpec($spec) {
        $this->db->select('*');
        $this->db->from('doctor');
        $this->db->where('specialisation', $spec);
        $query = $this->db->get();
        $row = $query->result_array();
        return $row;
    }

    public function getDoctorDetails($doctorId) {
        $this->db->select('*');
        $this->db->from('doctor');
        $this->db->where('id', $doctorId);
        $query = $this->db->get();
        $row = $query->result_array();
        return $row;
    }

}
