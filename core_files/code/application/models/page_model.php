<?php

class Page_Model extends CI_Model 
{

	public function get_newest_page() 
	{
		return $this->db->order_by("ID", "DESC")->get("pages");
	}

	public function get_categories() 
	{
		return $this->db->select("ID, name, description, total")
		->get("page_categories");
	}

	public function get_category($id) 
	{
		return $this->db->where("ID", $id)
		->select("ID, name, description, total")
		->get("page_categories");
	}

	public function get_pages_by_catid($catid, $page) 
	{
		return $this->db->where("catid", $catid)
		->select("pages.title,pages.body,pages.timestamp,pages.catid,
			pages.ID,pages.locked,pages.groupid,user_groups.name as `group`")
		->join("user_groups", "user_groups.ID = pages.groupid", "LEFT OUTER")
		->limit(10,$page)
		->get("pages");
	}

	public function get_pages_by_search($search) 
	{
		return $this->db->like("pages.body", $search)
		->select("pages.title,pages.body,pages.timestamp,pages.catid,
			pages.ID,pages.locked,pages.groupid,user_groups.name as `group`")
		->join("user_groups", "user_groups.ID = pages.groupid", "LEFT OUTER")
		->limit(30)
		->get("pages");
	}

	public function get_page($id) 
	{
		return $this->db->where("pages.ID", $id)
		->select("pages.title,pages.body,pages.timestamp,pages.catid,pages.ID,
			pages.total_votes,pages.useful_votes,pages.locked,pages.groupid,
			user_groups.name as `group`")
		->join("user_groups", "user_groups.ID = pages.groupid", "LEFT OUTER")
		->get("pages");
	}

	public function check_vote($id, $userid) 
	{
		$s = $this->db->where("pageid", $id)->where("userid", $userid)
		->get("user_votes");
		if($s->num_rows() > 0) return true;
		return false;
	}

	public function vote_page($id, $vote) 
	{
		$this->db->where("ID", $id);
		if($vote) {
			$this->db->set("useful_votes", "useful_votes+1", FALSE);
			$this->db->set("total_votes", "total_votes+1", FALSE);
		} else {
			$this->db->set("total_votes", "total_votes+1", FALSE);
		}
		$this->db->update("pages");
	}

	public function add_user_vote($id, $userid) 
	{
		$this->db->insert("user_votes", array("pageid" => $id,
			"userid" => $userid));
	}
}

?>