<?php

class News_Model extends CI_Model 
{

	public function get_news($catid, $page) 
	{
		if($catid > 0) {
			$this->db->where("news_articles.categoryid", $catid);
		}
		return $this->db->select("news_articles.title, news_articles.body, 
		news_articles.image, news_articles.timestamp, news_articles.big_image,
		news_articles.comments, news_categories.name as cat_name, 
		news_categories.ID as catid, users.ID as userid, users.name,
		users.username,
		news_articles.ID")
		->join("news_categories",
		 "news_categories.ID = news_articles.categoryid")
		->join("users", "users.ID = news_articles.userid")
		->limit(5, $page)
		->order_by("news_articles.ID", "DESC")
		->get("news_articles");
	}

	public function get_news_article($id) 
	{
		return $this->db->where("news_articles.ID", $id)
		->select("news_articles.title, news_articles.body, 
		news_articles.image, news_articles.timestamp, news_articles.big_image,
		news_articles.comments, news_articles.disable_comments, 
		news_categories.name as cat_name, news_categories.ID as catid,
		users.ID as userid, users.name, users.username, news_articles.ID")
		->join("news_categories",
		 "news_categories.ID = news_articles.categoryid")
		->join("users", "users.ID = news_articles.userid")
		->get("news_articles");
	}

	public function get_recent_news($count) 
	{
		if($count == 0) $count = 4;
		return $this->db
		->select("news_articles.title, news_articles.ID, 
			news_articles.timestamp, news_articles.body, news_articles.image")
		->limit($count)
		->order_by("news_articles.ID", "DESC")
		->get("news_articles");
	}

	public function get_comments($id, $page) 
	{
		return $this->db->where("news_comments.newsid", $id)
		->select("users.ID as userid, users.username, users.avatar,
			news_comments.comment, news_comments.timestamp, news_comments.ID")
		->join("users", "users.ID = news_comments.userid")
		->limit(10, $page)
		->get("news_comments");
	}

	public function get_comment($id) 
	{
		return $this->db->where("ID", $id)->get("news_comments");
	}

	public function delete_comment($id) 
	{
		$this->db->where("ID", $id)->delete("news_comments");
	}

	public function post_comment($id, $userid, $comment) 
	{
		$this->db->insert("news_comments", array(
			"newsid" => $id,
			"userid" => $userid,
			"comment" => $comment,
			"timestamp" => time()
			)
		);
	}

	public function update_comments($id) 
	{
		$this->db->where("ID", $id)->set("comments", "comments+1", FALSE)
		->update("news_articles");
	}

	public function decrease_comments($id) 
	{
		$this->db->where("ID", $id)->set("comments", "comments-1", FALSE)
		->update("news_articles");
	}

	public function get_total_news_posts($catid) 
	{
		if($catid > 0) {
			$this->db->where("news_articles.categoryid", $catid);
		}
		$s= $this->db->select("COUNT(*) as num")->get("news_articles");
		$r= $s->row();
		if (!isset($r->num)) {
			return 0;
		}
		return $r->num;
	}

	public function get_categories() 
	{
		return $this->db->select("ID,name")->get("news_categories");
	}
}

?>