<?php

class UserModel extends CI_Model {
    
    public function get_user($email, $senha){
        $result = $this->db->select('*')->from('users');
		$result->where('email', $email);
		$result->where('senha', $senha);
		return $result->get()->row();
    }
}