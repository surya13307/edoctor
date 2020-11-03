<?php

class User extends CI_Model {

    public function registerUser($data) {
         if ($this->db->insert('user', $data)) {
            $lastInsertedId=$this->db->insert_id();
            return $lastInsertedId;
        }
        return FALSE;
    }

    public function checkLogin($username, $passwordEntered) {
        $query = $this->db->get_where('user', array('username' => $username));
        if ($this->db->affected_rows() > 0) {
            $password = $query->row('password');
            /**
             * Check Password Hash 
             */
            if (password_verify($passwordEntered, $password) === TRUE) {

                return [
                    'status' => TRUE,
                    'data' => $query->result_array(),
                    'msg' => 'user exist'
                ];
            } else {
                return ['status' => FALSE, 'data' => FALSE, 'msg' => 'incorrect password'];
            }
        } else {
            return ['status' => FALSE, 'data' => FALSE, 'msg' => 'user doesnt exist'];
        }
    }

    /** ========= END SELECT STATEMENTS ======== * */
}
