<?php

class Mail_Model extends CI_Model 
{

	public function create($title, $body, $userid, $toid) 
	{
		$this->db->insert("mail", array(
			"userid" => $userid,
			"toid" => $toid,
			"title" => $title,
			"timestamp" => time(),
			"last_reply_timestamp" => time(),
			"unread_toid" => 1
			)
		);
		$mailid = $this->db->insert_id();
		$this->create_reply($mailid, $userid, $body);
	}

	public function create_reply($mailid, $userid, $body) 
	{
		$this->db->insert("mail_replies", array(
			"mailid" => $mailid,
			"userid" => $userid,
			"body" => $body,
			"timestamp" => time()
			)
		);
	}

	public function get_user_mail($userid) 
	{
		return $this->db->where("((mail.delete_userid = 0 AND mail.userid = $userid) OR 
			(mail.delete_toid = 0 AND mail.toid = $userid)) AND (mail.userid = $userid OR mail.toid = $userid)")
		->select("users.username, users2.username as username2, mail.title, mail.userid,
			mail.timestamp, mail.ID, mail.replies, mail.unread_userid,
			 mail.unread_toid")
		->join("users", "users.ID = mail.userid")
		->join("users as users2", "users2.ID = mail.toid")
		->order_by("mail.last_reply_timestamp", "DESC")
		->get("mail");
	}

	public function get_user_mail_single($id, $userid) 
	{
		return $this->db->where("(mail.userid = $userid or mail.toid = $userid)")
		->where("mail.ID", $id)
		->select("users.username, users2.username as username2, mail.title, mail.userid,
			mail.timestamp, mail.ID, mail.delete_userid, mail.delete_toid,
			mail.toid, mail.replies,  mail.unread_userid,
			 mail.unread_toid")
		->join("users", "users.ID = mail.userid")
		->join("users as users2", "users2.ID = mail.toid")
		->get("mail");
	}

	public function delete_userid($id) 
	{
		$this->db->where("ID", $id)
		->update("mail", array("delete_userid" => 1));
	}

	public function delete_toid($id) 
	{
		$this->db->where("ID", $id)
		->update("mail", array("delete_toid" => 1));
	}

	public function delete($id) 
	{
		$this->db->where("ID", $id)->delete("mail");
	}

	public function get_mail_replies($id, $limit) 
	{
		return $this->db->where("mail_replies.mailid", $id)
		->select("users.username, users.ID, users.avatar, users.name,
			mail_replies.body,
			mail_replies.ID as replyid, mail_replies.timestamp")
		->join("users", "users.ID = mail_replies.userid")
		->limit(10,$limit)
		->order_by("mail_replies.ID")
		->get("mail_replies");
	}

	public function get_total_replies($id) 
	{
		$s = $this->db->select("COUNT(*) as num")->where("mailid",$id)
		->get("mail_replies");
		$s = $s->row();
		return $s->num;
	}

	public function update_replies($id,$col) 
	{
		if($col) {
			$this->db->where("ID", $id)->set("replies", "replies+1", FALSE)
			->update("mail", array("last_reply_timestamp" => time(),
				"unread_userid" => 1));
		} else {
			$this->db->where("ID", $id)->set("replies", "replies+1", FALSE)
			->update("mail", array("last_reply_timestamp" => time(),
				"unread_toid" => 1));
		}
	}

	public function read_mail($id,$col) 
	{
		if($col) {
			$this->db->where("ID", $id)->update("mail", array(
				"unread_userid" => 0));
		} else {
			$this->db->where("ID", $id)->update("mail", array(
				"unread_toid" => 0));
		}
	}

	public function get_user_blocks($userid) 
	{
		return $this->db->where("user_blocks.userid", $userid)
		->select("users.username, users.name, users.ID as blockid, user_blocks.ID")
		->join("users", "users.ID = user_blocks.blockid")
		->get("user_blocks");
	}

	public function get_user_block($id, $userid) 
	{
		return $this->db->where("user_blocks.ID", $id)
		->where("user_blocks.userid", $userid)
		->select("users.username, users.name, users.ID as blockid, user_blocks.ID")
		->join("users", "users.ID = user_blocks.blockid")
		->get("user_blocks");
	}

	public function delete_block($id) 
	{
		$this->db->where("ID", $id)->delete("user_blocks");
	}

	public function block_user($userid, $blockid) 
	{
		$this->db->insert("user_blocks", array("userid" => $userid,
			"blockid" => $blockid));
	}

	public function is_blocked($blockid, $userid) 
	{
		$s = $this->db->where("blockid", $blockid)->where("userid", $userid)
		->get("user_blocks");
		if($s->num_rows() > 0) return true;
		return false;
	}
}

?>