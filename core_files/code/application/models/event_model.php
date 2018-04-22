<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_Model extends CI_Model 
{

	public function new_mail($userid) 
	{
		$this->db->insert("user_event", array(
				"userid" => $userid,
				"count" => 1,
				"type" => 1
				)
			);
	}

	public function new_comment($userid) 
	{
			$this->db->insert("user_event", array(
				"userid" => $userid,
				"count" => 1,
				"type" => 2
				)
			);
	}

	public function get_event($userid) 
	{
		return $this->db->where("userid", $userid)
		->get("user_event");
	}

	public function get_event_by_id($userid, $id) 
	{
		return $this->db->where("userid", $userid)
		->where("ID", $id)
		->get("user_event");
	}

	public function delete($id) 
	{
		$this->db->where("ID", $id)->delete("user_event");
	}

	public function get_tweets($amount) {
		return $this->db->get("tweets");
	}

	public function delete_tweets() {
		$this->db->empty_table("tweets");
		$this->db->where("ID", 1)->update("site_settings", array("twitter_update" => time()));
	}

	public function add_tweet($name, $username, $tweet, $timestamp) {
		$this->db->insert("tweets", array("name" => $name, "username" => $username, "tweet" => $tweet, "timestamp" => $timestamp));
	}

}

?>