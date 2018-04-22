<?php

class User_Model extends CI_Model 
{

	public function update($userid, $name, $email, $avatar, $profile, 
		$profile_comments) 
	{
		$this->db->where("ID", $userid)
		->update("users", 
			array(
				"name" => $name,
				"email" => $email, 
				"avatar" => $avatar, 
				"profile_text" => $profile,
				"profile_comments" => $profile_comments
				)
			);
	}

	public function getPassword($userid) 
	{
		$s= $this->db->where("ID", $userid)->select("password")->get("users");
		$s= $s->row();
		return $s->password;
	}

	public function updatePassword($userid, $password) 
	{
		$this->db->where("ID", $userid)->update("users", 
			array("password" => $password));
	}

	public function get_user($email) 
	{
		return $this->db->where("email", $email)->get("users");
	}

	public function get_user_by_username($username) {
		return $this->db->where("username", $username)->get("users");
	}
}

?>