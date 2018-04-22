<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		$this->load->model("news_model");
		$this->template->loadExternal(
		'<script src="'. base_url() . 'scripts/social_media.js"></script>');
		$this->template->loadData("newsActive",true);
	}

	public function index($catid=0,$page=0)
	{
		$catid = intval($catid);
		$page = intval($page);
		$news = $this->news_model->get_news($catid,$page);
		if ($news->num_rows() == 0) $this->template->error(lang("error_31")); 
		$row = $news->result();
		$catname = $row[0]->cat_name;

		$this->load->library('pagination');

		$config['base_url'] = base_url("news/index/" . $catid);
		$config['total_rows'] = $this->news_model->get_total_news_posts($catid);
		$config['per_page'] = 5;
		$config['uri_segment'] = 4;

		include (APPPATH . "/config/page_config.php");

		$this->pagination->initialize($config); 

		$this->template->loadContent("news/index.php", 
			array(
				"news" => $news,
				"catid" => $catid,
				"catname" => $catname
			)
		);
	}

	public function view($id, $page=0) 
	{
		$id = intval($id);
		$page = intval($page);

		$news = $this->news_model->get_news_article($id);
		if ($news->num_rows() == 0) {
			$this->template->error(lang("error_32"));
		}

		$news = $news->row();

		$comments = $this->news_model->get_comments($id, $page);

		$this->load->library('pagination');

		$config['base_url'] = base_url("news/view/" . $id);
		$config['total_rows'] = $news->comments;
		$config['per_page'] = 10;
		$config['uri_segment'] = 4;

		include (APPPATH . "/config/page_config.php");

		$this->pagination->initialize($config); 

		$this->load->helper("captcha");
		$rand = rand(4000,100000);
		$_SESSION['sc'] = $rand;
		$vals = array(
		    'word' => $rand,
		    'img_path' => './images/captcha/',
    		'img_url' => base_url() . 'images/captcha/',
		    'img_width' => 150,
		    'img_height' => 30,
		    'expiration' => 7200
		    );

		$cap = create_captcha($vals);

		$this->template->loadContent("news/view.php", 
			array(
				"news" => $news,
				"comments" => $comments,
				"cap" => $cap
			)
		);
	}

	public function comment($id) 
	{
		if (!$this->user->loggedin) {
			$this->template->error(
				lang("error_1")
			);
		}
		
		$captcha = $this->input->post("captcha", true);
		if ($captcha != $_SESSION['sc']) {
			$this->template->error("Invalid Captcha");
		}

		$id = intval($id);
		$news = $this->news_model->get_news_article($id);
		if ($news->num_rows() == 0) {
			$this->template->error(lang("error_32"));
		}

		$news = $news->row();

		if ($news->disable_comments) {
			$this->template->error(lang("error_33"));
		}
		if ($this->settings->info->news_comments) {
			$this->template->error(lang("error_33"));
		}

		$comment = $this->common->nohtml($this->input->post("comment"));

		if (empty($comment)) {
			$this->template->error(lang("error_34"));
		}

		$this->news_model->post_comment($id, $this->user->info->ID, $comment);
		$this->news_model->update_comments($id);
		$this->session->set_flashdata("globalmsg", 
			lang("success_12"));
		redirect(base_url("news/view/" . $id));
	}

	public function delete_comment($id,$newsid) 
	{
		$id = intval($id);
		$newsid = intval($newsid);
		$news = $this->news_model->get_news_article($newsid);
		if ($news->num_rows() == 0) {
			$this->template->error(lang("error_32"));
		}

		$this->common->checkAccess($this->user->info->access_level, 1);
		$comment = $this->news_model->get_comment($id);
		if ($comment->num_rows() == 0) $this->template->error(lang("error_35"));

		$this->news_model->delete_comment($id);
		$this->news_model->decrease_comments($newsid);
		$this->session->set_flashdata("globalmsg", lang("success_13"));
		redirect(base_url("news/view/" . $newsid));
	}

	public function categories() 
	{
		$categories = $this->news_model->get_categories();
		$this->template->loadContent("news/categories.php", 
			array(
				"categories" => $categories
			)
		);
	}


}

?>
