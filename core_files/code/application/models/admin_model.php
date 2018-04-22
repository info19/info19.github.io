<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Model extends CI_Model 
{

	public function updateSettings($data) 
	{
		$this->db->where("ID", 1)->update("site_settings", $data);
	}

	public function get_news_categories() 
	{
		return $this->db->get("news_categories");
	}

	public function add_news($userid,$subject,$catid,
			$disable_comments,$news_content,$thumbnail_image,$big_image) 
	{
		$this->db->insert("news_articles", array(
			"title" => $subject,
			"userid" => $userid,
			"body" => $news_content,
			"timestamp" => time(),
			"image" => $thumbnail_image,
			"categoryid" => $catid,
			"disable_comments" => $disable_comments,
			"big_image" => $big_image
			));
	}

	public function delete_news($id) {
		$this->db->where("ID", $id)->delete("news_articles");
	}


	public function get_news($page) 
	{
		return $this->db->select("ID, title, userid, body, timestamp, image")
		->limit(10,$page)
		->order_by("ID", "DESC")
		->get("news_articles");
	}

	public function get_news_count() 
	{
		$s = $this->db->select("COUNT(*) as num")
		->get("news_articles");
		$s = $s->row();
		if (!isset($r->num)) {
			return 0;
		}
		return $r->num;
	}

	public function get_news_by_id($id) 
	{
		return $this->db->where("ID", $id)
		->select("ID, title, userid, body, timestamp, image, big_image, 
			categoryid, disable_comments")
		->order_by("ID", "DESC")
		->get("news_articles");
	}

	public function update_news($id,$userid,$subject,$catid,$disable_comments,
		$news_content,$thumbnail_image,$big_image) 
	{
		$this->db->where("ID", $id)->update("news_articles", array(
			"title" => $subject,
			"userid" => $userid,
			"body" => $news_content,
			"timestamp" => time(),
			"image" => $thumbnail_image,
			"categoryid" => $catid,
			"disable_comments" => $disable_comments,
			"big_image" => $big_image
			)
		);
	}

	public function add_news_category($name) 
	{
		$this->db->insert("news_categories", array("name" => $name));
	}

	public function delete_news_cat($id) 
	{
		$this->db->where("ID", $id)->delete("news_categories");
	}

	public function get_news_category($id) 
	{
		return $this->db->where("ID", $id)->get("news_categories");
	}

	public function update_news_cat($id,$name)
	{
		$this->db->where("ID", $id)->update("news_categories", array(
			"name" => $name
			)
		);
	}

	public function add_page_category($name, $desc) 
	{
		$this->db->insert("page_categories", array("name" => $name,
			"description" => $desc));
	}

	public function delete_page_cat($id) 
	{
		$this->db->where("ID", $id)->delete("page_categories");
	}

	public function get_page_category($id) 
	{
		return $this->db->where("ID", $id)->get("page_categories");
	}

	public function update_page_cat($id,$name,$desc) 
	{
		$this->db->where("ID", $id)->update("page_categories", array(
			"name" => $name,
			"description" => $desc
			)
		);
	}

	public function add_page($title, $body, $catid, $locked, $groupid) 
	{
		$this->db->insert("pages", array(
			"title" => $title,
			"body" => $body,
			"catid" => $catid,
			"locked" => $locked,
			"timestamp" => time(),
			"groupid" => $groupid
			)
		);
	}

	public function get_page($id) 
	{
		return $this->db->where("ID", $id)->get("pages");
	}

	public function delete_page($id) 
	{
		$this->db->where("ID", $id)->delete("pages");
	}

	public function get_pages($lim) 
	{
		return $this->db
		->select("pages.ID, pages.title, pages.body, pages.catid,
		 page_categories.name as catname")
		->join("page_categories", "page_categories.ID = pages.catid")
		->limit(10,$lim)
		->order_by("ID", "DESC")
		->get("pages");
	}

	public function get_page_count() 
	{
		$s = $this->db->select("COUNT(*) as num")
		->get("pages");
		$s = $s->row();
		if (!isset($r->num)) {
			return 0;
		}
		return $r->num;
	}

	public function update_page($id, $title, $body, $catid, $locked, $groupid) 
	{
		$this->db->where("ID", $id)->update("pages", array(
			"title" => $title,
			 "body" => $body,
			 "catid" => $catid,
			 "locked" => $locked,
			 "timestamp" => time(),
			 "groupid" => $groupid
			)
		);
	}

	public function get_page_categories() 
	{
		return $this->db->get("page_categories");
	}

	public function increase_page_cat($catid) 
	{
		$this->db->where("ID", $catid)->set("total", "total+1", FALSE)
		->update("page_categories");
	}

	public function decrease_page_cat($catid) 
	{
		$this->db->where("ID", $catid)->set("total", "total-1", FALSE)
		->update("page_categories");
	}

	public function get_feedback($page) 
	{
		return $this->db->select("users.ID as userid, users.name, users.email,
		 feedback.ID, feedback.email as femail, feedback.name as fname, 
		 feedback.title, feedback.message, feedback.timestamp")
		->join("users", "users.ID = feedback.userid", "LEFT OUTER")
		->limit(10, $page)
		->order_by("feedback.ID", "DESC")
		->get("feedback");
	}

	public function get_feedback_count() 
	{
		return $this->db->count_all("feedback");
	}

	public function get_feedback_by_id($id) 
	{
		return $this->db->select("users.ID as userid, users.name, feedback.ID,
		 feedback.email as femail, feedback.name as fname, feedback.title, 
		 feedback.message, feedback.timestamp")
		->join("users", "users.ID = feedback.userid", "LEFT OUTER")
		->where("feedback.ID", $id)
		->order_by("feedback.ID", "DESC")
		->get("feedback");
	}

	public function delete_feedback($id) 
	{
		$this->db->where("ID", $id)->delete("feedback");
	}

	public function get_user_groups() 
	{
		return $this->db->select("ID,name,access_level")->get("user_groups");
	}

	public function get_users($page) 
	{
		return $this->db->select("users.`email`, users.username, users.`name`,
		 users.`ID`, users.`groupid`, users.`oauth_provider`,
			 user_groups.`name` as `group`")
		->join("user_groups", "user_groups.ID = users.groupid")
		->limit(20, $page)
		->get("users");
	}

	public function get_users_search($col,$value) 
	{
		return $this->db->select("users.`email`, users.`name`, users.`ID`, 
			users.username, users.`groupid`, users.`oauth_provider`,
			 user_groups.`name` as `group`")
		->like("users.".$col,$value)
		->join("user_groups", "user_groups.ID = users.groupid")
		->get("users");
	}

	public function get_user_count() 
	{
		return $this->db->count_all("users");
	}

	public function get_user($id) 
	{
		return $this->db->where("ID", $id)->get("users");
	}

	public function delete_user($id) 
	{
		$this->db->where("ID", $id)->delete("users");
	}

	public function update_user($id, $email, $name, $pass, $dob, $groupid, $username) 
	{
		$this->db->where("ID", $id)->update("users", array(
			"email" => $email,
			"name" => $name,
			"password" => $pass,
			"dob" => $dob,
			"groupid" => $groupid,
			"username" => $username
			)
		);
	}

	public function add_user_group($name, $level) 
	{
		$this->db->insert("user_groups", array(
			"name" => $name,
			"access_level" => $level
			)
		);
	}

	public function delete_user_group($id) 
	{
		$this->db->where("ID", $id)->delete("user_groups");
	}

	public function update_user_group($id, $name, $level) 
	{
		$this->db->where("ID", $id)->update("user_groups", array(
			"name" => $name,
			"access_level" => $level
			)
		);
	}

	public function get_user_group($id) 
	{
		return $this->db->where("ID", $id)->get("user_groups");
	}

	public function get_IPs($page) 
	{
		return $this->db->select("ID,IP,reason,timestamp")
		->limit(20, $page)
		->order_by("ID", "DESC")
		->get("ip_block");
	}

	public function get_IP_Count() 
	{
		$s = $this->db->select("COUNT(*) as num")->get("ip_block");
		$r = $s->row();
		if (!isset($r->num)) {
			return 0;
		}
		return $r->num;
	}

	public function block_IP($ip, $reason) 
	{
		$this->db->insert("ip_block", 
			array(
				"IP" => $ip,
				"reason" => $reason,
				"timestamp" => time()
			)
		);
	}

	public function delete_IP($id) 
	{
		$this->db->where("ID", $id)->delete("ip_block");
	}

	public function get_themes() 
	{
		return $this->db->get("site_themes");
	}

	public function add_theme($name, $css, $css_extra_file) 
	{
		$this->db->insert("site_themes", array(
			"name" => $name,
			"css_file" => $css,
			"css_extra_files" => $css_extra_file
			)
		);
	}

	public function get_theme($id) 
	{
		return $this->db->where("ID", $id)->get("site_themes");
	}

	public function delete_theme($id) 
	{
		$this->db->where("ID", $id)->delete("site_themes");
	}

	public function update_theme($name, $css, $css_extra_file, $id) 
	{
		$this->db->where("ID", $id)->update("site_themes", array(
			"name" => $name,
			"css_file" => $css,
			"css_extra_files" => $css_extra_file
			)
		);
	}


}

?>