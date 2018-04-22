<?php

class Register_Model extends CI_Model 
{

	public function registerUser($username, $email, $name, $password, $dob,
	$groupid=1
	) {
		$this->db->insert("users", 
			array(
				"email" => $email,
				"username" => $username,
				"name" => $name, 
				"password" => $password, 
				"dob" => $dob, 
				"groupid" => $groupid, 
				"IP" => $_SERVER['REMOTE_ADDR'], 
			)
		);
	}

	public function checkEmailIsFree($email) 
	{
		$s=$this->db->where("email", $email)->get("users");
		if ($s->num_rows() > 0) {
			return false;
		} else {
			return true;
		}
	}

	public function check_username_is_free($username) {
		$s=$this->db->where("username", $username)->get("users");
		if($s->num_rows() > 0) {
			return false;
		} else {
			return true;
		}
	}

	public function add_username($userid, $username) {
		$this->db->where("ID", $userid)->update("users", array("username" => $username));
	}

}

?>
