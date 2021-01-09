<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_modal extends CI_Model {

public function login_entry($data)
{
        $this->load->database();   
	    $this->db->where('name', $data['name']);
        $this->db->where('password', $data['password']);
        $query = $this->db->get('admin_user');
		if($query->num_rows()==1){
			$this->session->set_userdata($data);
	    return true;
		}		
		else
		{
			return false;
		}
}
}
?>