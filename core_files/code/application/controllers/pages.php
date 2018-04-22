<?php

class Pages extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model("page_model");
		$this->template->loadData("pageActive",true);
	}

	public function index() 
	{
		$newest = $this->page_model->get_newest_page();
		$categories = $this->page_model->get_categories();
		$this->template->loadContent("pages/index.php", 
			array(
				"page" => $newest,
				"categories" => $categories
			)
		);
	}

	public function category($catid, $page=0) 
	{
		$catid = intval($catid);
		$page = intval($page);
		$category = $this->page_model->get_category($catid);
		if ($category->num_rows() == 0) {
			$this->template->error(lang("error_36"));
		}

		$category = $category->row();

		// Get pages
		$pages = $this->page_model->get_pages_by_catid($catid,$page);
		if ($pages->num_rows() == 0) {
			$this->template->error(lang("error_37"));
		}

		$this->load->library('pagination');

		$config['base_url'] = base_url("pages/category/" . $catid);
		$config['total_rows'] = $category->total;
		$config['per_page'] = 10;
		$config['uri_segment'] = 4;

		include (APPPATH . "/config/page_config.php");

		$this->pagination->initialize($config); 

		$this->template->loadContent("pages/category.php", 
			array(
				"pages" => $pages,
				"category" => $category
			)
		);

	}

	public function view($id) 
	{
		$id = intval($id);

		$page = $this->page_model->get_page($id);
		if ($page->num_rows() == 0) {
			$this->template->error(lang("error_38"));
		}

		$this->template->loadExternal(
			'<script type="text/javascript" src="'
			.base_url().'scripts/page.js" /></script>'
		);

		$page = $page->row();

		if ($page->locked) {
			if (!$this->user->loggedin) {
				$this->template->error(
					lang("error_1")
				);
			}
		}

		if ($page->groupid > 0) {
			if ($this->user->info->access_level <=1) {
				if ($page->groupid != $this->user->info->groupid) {
					$this->template->error(
						lang("error_39")
					);
				}
			}
		}

		$this->template->loadContent("pages/page.php", 
			array(
				"page" => $page
			)
		);
	}

	public function search() {
		$search = $this->common->nohtml($this->input->post("search"));
		
		if(empty($search)) $this->template->error(lang("error_86"));
		// Get pages
		$pages = $this->page_model->get_pages_by_search($search);
		if ($pages->num_rows() == 0) {
			$this->template->error(lang("error_85"));
		}

		$this->template->loadContent("pages/search.php", 
			array(
				"pages" => $pages
			)
		);
	}

	public function vote() 
	{
		if (!$this->user->loggedin) {
			$this->template->errori(lang("error_40"));
		}
		$id = intval($this->input->get("pageid"));
		$vote = intval($this->input->get("vote"));
		$tok = ($this->input->get("tok"));

		if ($tok != $this->security->get_csrf_hash()) {
			$this->template->errori(lang("error_14"));
		}

		// Get page
		$page = $this->page_model->get_page($id);
		if ($page->num_rows() == 0) {
			$this->template->errori(lang("error_38"));
		}

		if ($this->settings->info->page_voting) {
			$this->template->errori(lang("error_41"));
		}

		// CHeck user hasn't already voted
		if ($this->page_model->check_vote($id, $this->user->info->ID)) {
			$this->template->errori(lang("error_42"));
		}

		// Vote
		$this->page_model->vote_page($id, $vote);
		$this->page_model->add_user_vote($id, $this->user->info->ID);

		$page = $page->row();
		if ($vote) {
			$page->useful_votes++;
			$page->total_votes++;
		} else {
			$page->total_votes++;
		}

		// Display results
		$this->template->loadAjax("pages/vote.php", 
			array(
				"useful_votes" => $page->useful_votes,
				"total_votes" => $page->total_votes
			)
		);

	}


}

?>