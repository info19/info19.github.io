<?php

class Install_Model extends CI_Model 
{

	public function createAdmin($email, $password) 
	{
		$this->db->insert("users", 
			array(
				"email" => $email,
				"name" => "Admin", 
				"password" => $password, 
				"groupid" => 3, 
				"IP" => $_SERVER['REMOTE_ADDR']
			)
		);
	}

	public function updateSite($name, $email, $dir) 
	{
		$this->db->update("site_settings", 
			array(
				"site_name" => $name, 
				"support_email" => $email, 
				"upload_path" => $dir . "uploads",
				"upload_path_relative" => "uploads"
			)
		);
	}

	public function checkAdmin() 
	{
		$s = $this->db->where("groupid", 3)->get("users");
		if ($s->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}

?>
