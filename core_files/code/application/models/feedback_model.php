<?php

class Feedback_Model extends CI_Model 
{

	public function create($userid, $email, $name, $title, $message) 
	{
		$this->db->insert("feedback", array(
			"userid" => $userid,
			"email" => $email,
			"name" => $name, 
			"title" => $title,
			"message" => $message,
			"timestamp" => time()
			)
		);
	}

}