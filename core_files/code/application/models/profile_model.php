<?php

class profile_model extends CI_Model 
{

	public function get_user($username) 
	{
		return $this->db->where("username", $username)
		->select("users.ID, users.username, users.name, user_groups.access_level, 
			user_groups.name as groupname, users.avatar, users.profile_text, 
			users.profile_comments")
		->join("user_groups", "user_groups.ID = users.groupid")
		->get("users");
	}

	public function get_user_comments($userid, $page) 
	{
		return $this->db->where("user_comments.profileid", $userid)
		->select("users.ID as userid, users.username, users.name, users.avatar, 
			user_comments.comment, user_comments.timestamp, user_comments.ID, 
			user_comments.profileid")
		->join("users", "users.ID = user_comments.userid")
		->order_by("user_comments.ID", "DESC")
		->limit(5, $page)
		->get("user_comments");
	}

	public function get_comment($id) 
	{
		return $this->db->where("user_comments.ID", $id)
			->select("users.username, user_comments.profileid, user_comments.userid")
			->join("users", "users.ID = user_comments.profileid")
			->get("user_comments");
	}

	public function delete_comment($id) 
	{
		$this->db->where("ID", $id)->delete("user_comments");
	}

	public function get_user_by_id($id) 
	{
		return $this->db->where("ID", $id)->get("users");
	}

	public function add_comment($id, $userid, $comment) 
	{
		$this->db->insert("user_comments", 
			array(
				"profileid" => $id, 
				"userid" => $userid, 
				"comment" => $comment, 
				"timestamp" => time()
				)
			);
	}

	public function get_total_user_comments($id) 
	{
		$s = $this->db->select("COUNT(*) as num")->where("profileid", $id)
		->get("user_comments");
		$r = $s->row();
		if(isset($r->num)) return $r->num;
		return 0;
	}

}

?>