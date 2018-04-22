<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class User 
{

	var $info=array();
	var $loggedin=false;
	var $u=null;
	var $p=null;
	var $oauth_provider = null;
	var $oauth_id = null;
	var $oauth_token = null;
	var $oauth_secret = null;

	public function __construct() 
	{
		 $CI =& get_instance();
		 $user = null;

		 $this->u = $CI->input->cookie("uzyun", TRUE);
		 $this->p = $CI->input->cookie("uzytkn", TRUE);
		 $this->oauth_provider = $CI->input->cookie("uzyprovider", TRUE);
		 $this->oauth_id = $CI->input->cookie("uzyoauthid", TRUE);
		 $this->oauth_token = $CI->input->cookie("uzyoauthtoken", TRUE);
		 $this->oauth_secret = $CI->input->cookie("uzyoauthsecret", TRUE);

		 // Twitter
		if($this->oauth_provider === "twitter") {
			if($this->oauth_provider && $this->oauth_id &&
			  $this->oauth_token && $this->oauth_secret) {
			 	$user = $CI->db->select(
				 	" users.`ID`, users.`name`, users.username, users.`email`, 
				 	users.`avatar`, users.`oauth_provider`, users.profile_text,
				 	users.`groupid`, users.`profile_comments`,
				 	 user_groups.`access_level`, user_groups.`name` as `group`
				 	"
				 )
				 ->where("oauth_provider", $this->oauth_provider)
				 ->where("oauth_id", $this->oauth_id)
				 ->where("oauth_token", $this->oauth_token)
				 ->where("oauth_secret", $this->oauth_secret)
				 ->join("user_groups", "user_groups.ID = users.groupid")
				 ->get("users"); 
			}
		}

		if($this->oauth_provider === "google") {
		 // Facebook
			 if($this->oauth_provider && $this->oauth_id && $this->p) {
			 	$user = $CI->db->select(
				 	" users.`ID`, users.`name`, users.username, users.`email`,
				 	 users.`avatar`, users.profile_text, users.`profile_comments`,
				 	users.`oauth_provider`,
				 	users.`groupid`,
				 	 user_groups.`access_level`, user_groups.`name` as `group`
				 	"
				 )
				 ->where("oauth_provider", $this->oauth_provider)
				 ->where("oauth_id", $this->oauth_id)
				 ->where("token", $this->p)
				 ->join("user_groups", "user_groups.ID = users.groupid")
				 ->get("users"); 
			 }
		}

		if($this->oauth_provider === "facebook") {
		 // Facebook
			 if($this->oauth_provider && $this->oauth_id && $this->p) {
			 	$user = $CI->db->select(
				 	" users.`ID`, users.`name`, users.`email`,  users.username,
				 	 users.`avatar`, users.`oauth_provider`, users.profile_text,
				 	users.`groupid`, users.`profile_comments`,
				 	 user_groups.`access_level`, user_groups.`name` as `group`
				 	"
				 )
				 ->where("oauth_provider", $this->oauth_provider)
				 ->where("oauth_id", $this->oauth_id)
				 ->where("token", $this->p)
				 ->join("user_groups", "user_groups.ID = users.groupid")
				 ->get("users"); 
			 }
		}

		 // Normal
		 if ($this->u && $this->p && empty($this->oauth_provider)) {
			 $user = $CI->db->select(
			 	" users.`ID`, users.`name`,  users.username, users.`email`,
			 	 users.`avatar`, users.`oauth_provider`, users.profile_text,
			 	users.`groupid`, users.`profile_comments`,
			 	 user_groups.`access_level`, user_groups.`name` as `group`
			 	"
			 )
			 ->where("email", $this->u)->where("token", $this->p)
			 ->join("user_groups", "user_groups.ID = users.groupid")
			 ->get("users");
		}

		if($user !== null) {
			if ($user->num_rows() == 0) {
			 	$this->loggedin=false;
			} else {
			 	$this->loggedin=true;
			 	$this->info = $user->row();
			 	if ($this->info->access_level == -1) {
			 		$CI->load->helper("cookie");
			 		$this->loggedin = false;
			 		$CI->session->set_flashdata("globalmsg",
			 		"This account has been BANNED and can no longer be used.");
			 		delete_cookie("uzyun");
					delete_cookie("uzytkn");
					redirect(base_url());
			 	}
			}
		}
	}

	public function getPassword() 
	{
		$CI =& get_instance();
		$user = $CI->db->select("users.`password`")
		->where("ID", $this->info->ID)->get("users");
		$user = $user->row();
		return $user->password;
	}

}

?>
