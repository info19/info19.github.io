<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		$this->load->model("admin_model");
		if (!$this->user->loggedin) {
			$this->template->error(
				lang("error_1")
			);
		}
		if ($this->user->info->access_level <=0) {
			$this->template->error(lang("error_56"));
		}
		$this->template->loadSidebar("admin/sidebar.php");
	}

	public function index()
	{
		$this->template->loadContent("admin/index.php", 
			array(
			)
		);
	}

	public function add_theme() 
	{
		$this->common->checkAccess($this->user->info->access_level, 2);
		$this->template->loadContent("admin/add_theme.php", 
			array(
			)
		);
	}

	public function edit_theme() 
	{
		$this->common->checkAccess($this->user->info->access_level, 2);
		$themes = $this->admin_model->get_themes();
		$this->template->loadContent("admin/edit_theme.php", 
			array(
				"themes" => $themes
			)
		);
	}

	public function delete_theme($id, $hash) 
	{
		$this->common->checkAccess($this->user->info->access_level, 2);
		if ($hash != $this->security->get_csrf_hash()) {
			$this->template->error(lang("error_14"));
		}
		$id = intval($id);

		$theme = $this->admin_model->get_theme($id);
		if ($theme->num_rows() == 0) $this->template->error(lang("error_57"));

		if ($id == $this->settings->info->themeid) {
			$this->template->error(lang("error_58"));
		}

		// Delete
		$this->admin_model->delete_theme($id);
		$this->session->set_flashdata("globalmsg", lang("success_17"));
		redirect(base_url("admin/edit_theme"));
	}

	public function edit_theme_pro($id) 
	{
		$this->common->checkAccess($this->user->info->access_level, 2);
		$id = intval($id);

		$theme = $this->admin_model->get_theme($id);
		if ($theme->num_rows() == 0) $this->template->error(lang("error_57"));

		$this->template->loadContent("admin/edit_theme_pro.php", 
			array(
				"theme" => $theme->row()
			)
		);
	}

	public function edit_theme_pro_pro($id) 
	{
		$this->common->checkAccess($this->user->info->access_level, 2);
		$id = intval($id);

		$theme = $this->admin_model->get_theme($id);
		if ($theme->num_rows() == 0) $this->template->error(lang("error_57"));

		$name = $this->common->nohtml($this->input->post("name"));
		$cssfile = $this->common->nohtml($this->input->post("css_file"));
		$css_extra_files = 
			$this->common->nohtml($this->input->post("css_extra_files"));
		if (empty($name)) $this->template->error(lang("error_59"));

		$this->admin_model
		->update_theme($name, $cssfile, $css_extra_files, $id);
		$this->session->set_flashdata("globalmsg", lang("success_18"));
		redirect(base_url("admin/edit_theme"));
	}

	public function add_theme_pro() 
	{
		$this->common->checkAccess($this->user->info->access_level, 2);
		$name = $this->common->nohtml($this->input->post("name"));
		$cssfile = $this->common->nohtml($this->input->post("css_file"));
		$css_extra_files = 
			$this->common->nohtml($this->input->post("css_extra_files"));
		if (empty($name)) $this->template->error(lang("error_59"));

		$this->admin_model->add_theme($name, $cssfile, $css_extra_files);
		$this->session->set_flashdata("globalmsg", lang("success_19"));
		redirect(base_url("admin"));
	}

	public function search_user() 
	{
		$this->common->checkAccess($this->user->info->access_level, 2);
		$this->template->loadContent("admin/search_user.php", 
			array(
			)
		);
	}

	public function search_user_pro() 
	{
		$this->common->checkAccess($this->user->info->access_level, 2);
		$search = $this->common->nohtml($this->input->post("search"));
		$type = intval($this->input->post("type"));

		if (strlen($search) < 3) $this->template->error(lang("error_60"));

		if ($type == 0) {
			// Email
			$users = $this->admin_model->get_users_search("email", $search);
		} elseif ($type == 1) {
			// Name
			$users = $this->admin_model->get_users_search("name", $search);
		} elseif ($type == 2) {
			// IP
			$users = $this->admin_model->get_users_search("IP", $search);
		}

		if ($users->num_rows() == 0) $this->template->error(lang("error_61"));
		$this->template->loadContent("admin/edit_user.php", 
			array(
				"users" => $users,
				"search" => 1
			)
		);
	}

	public function add_user_group()
	{
		$this->common->checkAccess($this->user->info->access_level, 2);
		$this->template->loadContent("admin/add_user_group.php", 
			array(
			)
		);
	}

	public function add_user_group_pro() 
	{
		$this->common->checkAccess($this->user->info->access_level, 2);
		$name = $this->common->nohtml($this->input->post("name"));
		$access_level = intval($this->input->post("access_level"));

		if (empty($name)) $this->template->error(lang("error_62"));

		$this->admin_model->add_user_group($name, $access_level);
		$this->session->set_flashdata("globalmsg", lang("success_20"));
		redirect(base_url("admin/edit_user_group"));
	}

	public function edit_user_group() 
	{
		$this->common->checkAccess($this->user->info->access_level, 2);
		$groups = $this->admin_model->get_user_groups();
		$this->template->loadContent("admin/edit_user_group.php", 
			array(
				"groups" => $groups
			)
		);
	}

	public function edit_user_group_pro($id) 
	{
		$this->common->checkAccess($this->user->info->access_level, 2);
		$id = intval($id);
		$group = $this->admin_model->get_user_group($id);
		if ($group->num_rows() == 0) $this->template->error(lang("error_63"));
		$group = $group->row();
		if ($group->locked) $this->template->error(lang("error_64"));

		$this->template->loadContent("admin/edit_user_group_pro.php", 
			array(
				"group" => $group
			)
		);
	}

	public function edit_user_group_pro_pro($id) 
	{
		$this->common->checkAccess($this->user->info->access_level, 2);
		$id = intval($id);
		$group = $this->admin_model->get_user_group($id);
		if ($group->num_rows() == 0) $this->template->error(lang("error_63"));
		$group = $group->row();
		if ($group->locked) $this->template->error(lang("error_64"));

		$name = $this->common->nohtml($this->input->post("name"));
		$access_level = intval($this->input->post("access_level"));

		if (empty($name)) $this->template->error(lang("error_62"));

		$this->admin_model->update_user_group($id, $name, $access_level);
		$this->session->set_flashdata("globalmsg", lang("success_21"));
		redirect(base_url("admin/edit_user_group"));
	}

	public function delete_user_group($id, $hash) 
	{
		$this->common->checkAccess($this->user->info->access_level, 2);
		if ($hash != $this->security->get_csrf_hash()) {
			$this->template->error(lang("error_14"));
		}
		$id = intval($id);
		$group = $this->admin_model->get_user_group($id);
		if ($group->num_rows() == 0) $this->template->error(lang("error_63"));
		$group = $group->row();
		if ($group->locked) $this->template->error(lang("error_64"));

		$this->admin_model->delete_user_group($id);
		$this->session->set_flashdata("globalmsg", lang("success_22"));
		redirect(base_url("admin/edit_user_group"));
	}

	public function add_user() 
	{
		$this->common->checkAccess($this->user->info->access_level, 3);
		$groups = $this->admin_model->get_user_groups();
		$this->template->loadContent("admin/add_user.php", 
			array(
				"groups" => $groups
			)
		);
	}

	public function add_user_pro() 
	{
		$this->common->checkAccess($this->user->info->access_level, 3);
		$this->load->helper('email');
		$this->load->model("register_model");
		$email = $this->input->post("email", true);
		$name = $this->common->nohtml(
			$this->input->post("name", true));
		$pass = $this->common->nohtml(
			$this->input->post("password", true));
		$pass2 = $this->common->nohtml(
			$this->input->post("password2", true));
		$year = intval($this->input->post("year", true));
		$month = intval($this->input->post("month", true));
		$day = intval($this->input->post("day", true));
		$groupid = intval($this->input->post("groupid"));
		$username = $this->common->nohtml(
				$this->input->post("username", true));

		$fail="";

		if(strlen($username) < 3) $fail = lang("ctn_113");

		if(!preg_match("/^[a-z0-9_]+$/i", $username)) $fail = lang("ctn_114");

		if(!$this->register_model->check_username_is_free($username)) $fail = lang("ctn_115");

		if ($pass != $pass2) $fail = lang("error_65");

		if ($year < date("Y") - 100) $fail = lang("error_66");
		if ($month <= 0 || $month > 12) $fail = lang("error_67");
		if ($day <= 0 || $day > 31) $fail = lang("error_68");

		if (strlen($pass) < 5) {
			$fail = lang("error_69");
		}

		if (strlen($name) > 255) {
			$fail = lang("error_70");
		}

		if (empty($email)) {
			$fail = lang("error_71");
		}

		if (!valid_email($email)) {
			$fail = lang("error_72");
		}

		if (!$this->register_model->checkEmailIsFree($email)) {
			$fail = lang("error_73");
		}

		if (strlen($month) === 1) {
			$month = "0" . $month;
		}

		if (strlen($day) === 1) {
			$day = "0" . $day;
		}
		$dob = $year . "/" . $month . "/" . $day;

		if (!empty($fail)) $this->template->error($fail);

		$pass = $this->common->encrypt($pass);
		$this->register_model->registerUser(
			$username, $email, $name, $pass, $dob, $groupid
		);
		$this->session->set_flashdata("globalmsg", lang("success_23"));
		redirect(base_url("admin/edit_user"));
	}

	public function edit_user($page=0) 
	{
		$this->common->checkAccess($this->user->info->access_level, 2);
		$page = intval($page);
		$users = $this->admin_model->get_users($page);
		$this->load->library('pagination');

		$config['base_url'] = base_url("admin/edit_user/");
		$config['total_rows'] = $this->admin_model->get_user_count();
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;

		include (APPPATH . "/config/page_config.php");

		$this->pagination->initialize($config);
		$this->template->loadContent("admin/edit_user.php", 
			array(
				"users" => $users,
				"search" => 0
			)
		);
	}

	public function edit_user_pro($id) 
	{
		$this->common->checkAccess($this->user->info->access_level, 2);
		$id = intval($id);
		$user = $this->admin_model->get_user($id);
		if ($user->num_rows() == 0) $this->template->error(lang("error_74"));

		$groups = $this->admin_model->get_user_groups();
		$this->template->loadContent("admin/edit_user_pro.php", 
			array(
				"groups" => $groups,
				"user" => $user->row()
			)
		);
	}

	public function edit_user_pro_pro($id) 
	{
		$this->common->checkAccess($this->user->info->access_level, 3);
		$id = intval($id);
		$user = $this->admin_model->get_user($id);
		if ($user->num_rows() == 0) $this->template->error(lang("error_74"));
		$user = $user->row();

		$this->load->helper('email');
		$this->load->model("register_model");
		$email = $this->input->post("email", true);
		$name = $this->common->nohtml(
			$this->input->post("name", true));
		$pass = $this->common->nohtml(
			$this->input->post("password", true));
		$year = intval($this->input->post("year", true));
		$month = intval($this->input->post("month", true));
		$day = intval($this->input->post("day", true));
		$groupid = intval($this->input->post("groupid"));
		$username = $this->common->nohtml(
				$this->input->post("username", true));

		$fail="";

		if ($year < date("Y") - 100) $fail = lang("error_66");
		if ($month <= 0 || $month > 12) $fail = lang("error_67");
		if ($day <= 0 || $day > 31) $fail = lang("error_68");

		if (!empty($pass)) {
			if (strlen($pass) < 5) {
				$fail = lang("error_69");
			}
			$pass = $this->common->encrypt($pass);
		} else {
			$pass = $user->password;
		}

		if (strlen($name) > 255) {
			$fail = lang("error_70");
		}

		if (!$user->oauth_provider) {
			if (empty($email)) {
				$fail = lang("error_71");
			}
		}

		if($username != $user->username) {
			if(strlen($username) < 3) $fail = lang("ctn_113");

			if(!preg_match("/^[a-z0-9_]+$/i", $username)) $fail = lang("ctn_114");

			if(!$this->register_model->check_username_is_free($username)) $fail = lang("ctn_115");
		}

		if (!empty($email)) {
			if (!valid_email($email)) {
				$fail = lang("error_72");
			}

			if ($email != $user->email) {
				if (!$this->register_model->checkEmailIsFree($email)) {
					$fail = lang("error_73");
				}
			}
		}

		if (strlen($month) === 1) {
			$month = "0" . $month;
		}

		if (strlen($day) === 1) {
			$day = "0" . $day;
		}
		$dob = $year . "/" . $month . "/" . $day;

		if (!empty($fail)) $this->template->error($fail);

		$this->admin_model
		->update_user($id, $email, $name, $pass, $dob, $groupid, $username);
		$this->session->set_flashdata("globalmsg", lang("success_24"));
		redirect(base_url("admin/edit_user"));

	}

	public function delete_user($id, $hash) 
	{
		$this->common->checkAccess($this->user->info->access_level, 3);
		if ($hash != $this->security->get_csrf_hash()) {
			$this->template->error(lang("error_14"));
		}
		$id = intval($id);
		$user = $this->admin_model->get_user($id);
		if ($user->num_rows() == 0) $this->template->error(lang("error_74"));

		$this->admin_model->delete_user($id);
		$this->session->set_flashdata("globalmsg", lang("success_25"));
		redirect(base_url("admin/edit_user"));
	}

	public function feedback($page=0) 
	{
		$this->common->checkAccess($this->user->info->access_level, 2);
		$page = intval($page);
		$feedback = $this->admin_model->get_feedback($page);
		$this->load->library('pagination');

		$config['base_url'] = base_url("admin/feedback/");
		$config['total_rows'] = $this->admin_model->get_feedback_count();
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;

		include (APPPATH . "/config/page_config.php");

		$this->pagination->initialize($config);
		$this->template->loadContent("admin/feedback.php", 
			array(
				"feedback" => $feedback
			)
		);
	}

	public function feedback_reply($id) 
	{
		$this->common->checkAccess($this->user->info->access_level, 2);
		$id = intval($id);
		$feedback = $this->admin_model->get_feedback_by_id($id);
		if ($feedback->num_rows() == 0) {
			$this->template->error(lang("error_75"));
		}

		$this->template->loadContent("admin/feedback_reply.php", 
			array(
				"r" => $feedback->row()
			)
		);
	}

	public function feedback_reply_pro($id) 
	{
		$this->common->checkAccess($this->user->info->access_level, 2);
		$id = intval($id);
		$feedback = $this->admin_model->get_feedback_by_id($id);
		if ($feedback->num_rows() == 0) {
			$this->template->error(lang("error_75"));
		}
		$feedback = $feedback->row();

		$title = $this->common->nohtml($this->input->post("title"));
		$message = $this->lib_filter->go($this->input->post("message"));

		$this->load->library('email');

		$this->email->from($this->settings->info->support_email,
		 $this->settings->info->site_name);
		$this->email->to($feedback->femail);

		$this->email->subject($title);
		$this->email->message($message);
		$this->email->send();

		$this->session->set_flashdata("globalmsg", lang("success_26"));
		redirect(base_url("admin/feedback"));
	}

	public function feedback_delete($id,$hash) 
	{
		$this->common->checkAccess($this->user->info->access_level, 2);
		if ($hash != $this->security->get_csrf_hash()) {
			$this->template->error(lang("error_14"));
		}
		$id = intval($id);
		$feedback = $this->admin_model->get_feedback_by_id($id);
		if ($feedback->num_rows() == 0) {
			$this->template->error(lang("error_75"));
		}

		$this->admin_model->delete_feedback($id);
		$this->session->set_flashdata("globalmsg", lang("success_27"));
		redirect(base_url("admin/feedback"));
	}

	public function add_page_cat()
	{
		$this->common->checkAccess($this->user->info->access_level, 1);
		$this->template->loadContent("admin/add_page_cat.php", 
			array(
			)
		);
	}

	public function add_page_cat_pro() 
	{
		$this->common->checkAccess($this->user->info->access_level, 1);
		$name = $this->common->nohtml($this->input->post("name"));
		$desc = $this->common->nohtml($this->input->post("desc"));
		if (empty($name)) $this->template->error(lang("error_76"));

		$this->admin_model->add_page_category($name, $desc);
		$this->session->set_flashdata("globalmsg", lang("success_28"));
		redirect(base_url("admin/edit_page_cat"));
	}

	public function edit_page_cat() 
	{
		$this->common->checkAccess($this->user->info->access_level, 1);
		$categories = $this->admin_model->get_page_categories();
		$this->template->loadContent("admin/edit_page_cat.php", 
			array(
				"categories" => $categories
			)
		);
	}

	public function delete_page_cat($id, $hash) 
	{
		$this->common->checkAccess($this->user->info->access_level, 1);
		if ($hash != $this->security->get_csrf_hash()) {
			$this->template->error(lang("error_14"));
		}
		$id = intval($id);
		$cat = $this->admin_model->get_page_category($id);
		if ($cat->num_rows() == 0) $this->template->error(lang("error_77"));

		$this->admin_model->delete_page_cat($id);
		$this->session->set_flashdata("globalmsg", lang("success_29"));
		redirect(base_url("admin/edit_page_cat"));
	}

	public function edit_page_cat_pro($id) 
	{
		$this->common->checkAccess($this->user->info->access_level, 1);
		$id = intval($id);
		$cat = $this->admin_model->get_page_category($id);
		if ($cat->num_rows() == 0) $this->template->error(lang("error_77"));
		$this->template->loadContent("admin/edit_page_cat_pro.php", 
			array(
				"cat" => $cat->row()
			)
		);
	}

	public function edit_page_cat_pro_pro($id) 
	{
		$this->common->checkAccess($this->user->info->access_level, 1);
		$id = intval($id);
		$cat = $this->admin_model->get_page_category($id);
		if ($cat->num_rows() == 0) $this->template->error(lang("error_77"));

		$name = $this->common->nohtml($this->input->post("name"));
		if (empty($name)) $this->template->error(lang("error_76"));
		$desc = $this->common->nohtml($this->input->post("desc"));

		$this->admin_model->update_page_cat($id,$name, $desc);
		$this->session->set_flashdata("globalmsg", lang("success_30"));
		redirect(base_url("admin/edit_page_cat"));
	}

	public function add_page() 
	{
		$this->common->checkAccess($this->user->info->access_level, 1);
		$this->template->loadExternal(
			"<script src='".base_url()
			."scripts/tinymce/tinymce.min.js'></script>
			<script src='".base_url()."scripts/tinymce/config.js'></script>");
		$categories = $this->admin_model->get_page_categories();
		$groups = $this->admin_model->get_user_groups();
		$this->template->loadContent("admin/add_page.php", 
			array(
				"categories" => $categories,
				"groups" => $groups
			)
		);
	}

	public function add_page_pro() 
	{
		$this->common->checkAccess($this->user->info->access_level, 1);
		$title = $this->common->nohtml($this->input->post("title"));
		$body = $this->lib_filter->go($this->input->post("body"));
		$catid = intval($this->input->post("catid"));
		$locked = intval($this->input->post("locked"));
		$groupid = intval($this->input->post("groupid"));

		if (empty($title) || empty($body)) {
			$this->template->error(lang("error_78"));
		}

		$this->admin_model->add_page($title, $body, $catid, $locked, $groupid);
		$this->admin_model->increase_page_cat($catid);
		$this->session->set_flashdata("globalmsg", lang("success_31"));
		redirect(base_url("admin/edit_page"));
	}

	public function edit_page($page=0) 
	{
		$this->common->checkAccess($this->user->info->access_level, 1);

		$pages = $this->admin_model->get_pages($page);
		$this->load->library('pagination');

		$config['base_url'] = base_url("admin/edit_page/");
		$config['total_rows'] = $this->admin_model->get_page_count();
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;

		include (APPPATH . "/config/page_config.php");

		$this->pagination->initialize($config);
		$this->template->loadContent("admin/edit_page.php", 
			array(
				"pages" => $pages
			)
		);
	}

	public function delete_page($id, $hash) 
	{
		$this->common->checkAccess($this->user->info->access_level, 1);
		if ($hash != $this->security->get_csrf_hash()) {
			$this->template->error(lang("error_14"));
		}
		$id = intval($id);
		$page = $this->admin_model->get_page($id);
		if ($page->num_rows() == 0) $this->template->error(lang("error_79"));
		$page = $page->row();

		$this->admin_model->delete_page($id);
		$this->admin_model->decrease_page_cat($page->catid);
		$this->session->set_flashdata("globalmsg", lang("success_32"));
		redirect(base_url("admin/edit_page"));
	}

	public function edit_page_pro($id) 
	{
		$this->common->checkAccess($this->user->info->access_level, 1);
		$this->template->loadExternal(
			"<script src='".base_url()
			."scripts/tinymce/tinymce.min.js'></script>
			<script src='".base_url()."scripts/tinymce/config.js'></script>");
		$categories = $this->admin_model->get_page_categories();
		$groups = $this->admin_model->get_user_groups();
		$id = intval($id);
		$page = $this->admin_model->get_page($id);
		if ($page->num_rows() == 0) $this->template->error(lang("error_79"));

		$this->template->loadContent("admin/edit_page_pro.php", 
			array(
				"page" => $page->row(),
				"categories" => $categories,
				"groups" => $groups
			)
		);
	}

	public function edit_page_pro_pro($id) 
	{
		$this->common->checkAccess($this->user->info->access_level, 1);
		$id = intval($id);
		$page = $this->admin_model->get_page($id);
		if ($page->num_rows() == 0) $this->template->error(lang("error_79"));

		$page = $page->row();

		$title = $this->common->nohtml($this->input->post("title"));
		$body = $this->lib_filter->go($this->input->post("body"));
		$catid = intval($this->input->post("catid"));
		$locked = intval($this->input->post("locked"));
		$groupid = intval($this->input->post("groupid"));

		if (empty($title) || empty($body)) {
			$this->template->error(lang("error_78"));
		}

		if ($catid != $page->catid) {
			$this->admin_model->decrease_page_cat($page->catid);
			$this->admin_model->increase_page_cat($catid);
		}

		$this->admin_model->update_page(
			$id, $title, $body, $catid, $locked, $groupid);
		$this->session->set_flashdata("globalmsg", lang("success_33"));
		redirect(base_url("admin/edit_page"));
	}

	public function add_news_cat()
	{
		$this->common->checkAccess($this->user->info->access_level, 1);
		$this->template->loadContent("admin/add_news_cat.php", 
			array(
			)
		);
	}

	public function add_news_cat_pro() 
	{
		$this->common->checkAccess($this->user->info->access_level, 1);
		$name = $this->common->nohtml($this->input->post("name"));
		if (empty($name)) $this->template->error(lang("error_76"));

		$this->admin_model->add_news_category($name);
		$this->session->set_flashdata("globalmsg", lang("success_34"));
		redirect(base_url("admin/edit_news_cat"));
	}

	public function edit_news_cat() 
	{
		$this->common->checkAccess($this->user->info->access_level, 1);
		$categories = $this->admin_model->get_news_categories();
		$this->template->loadContent("admin/edit_news_cat.php", 
			array(
				"categories" => $categories
			)
		);
	}

	public function delete_news_cat($id, $hash) 
	{
		$this->common->checkAccess($this->user->info->access_level, 1);
		if ($hash != $this->security->get_csrf_hash()) {
			$this->template->error(lang("error_14"));
		}
		$id = intval($id);
		$cat = $this->admin_model->get_news_category($id);
		if ($cat->num_rows() == 0) $this->template->error(lang("error_77"));

		$this->admin_model->delete_news_cat($id);
		$this->session->set_flashdata("globalmsg", lang("success_35"));
		redirect(base_url("admin/edit_news_cat"));
	}

	public function edit_news_cat_pro($id) 
	{
		$this->common->checkAccess($this->user->info->access_level, 1);
		$id = intval($id);
		$cat = $this->admin_model->get_news_category($id);
		if ($cat->num_rows() == 0) $this->template->error(lang("error_77"));
		$this->template->loadContent("admin/edit_news_cat_pro.php", 
			array(
				"cat" => $cat->row()
			)
		);
	}

	public function edit_news_cat_pro_pro($id) 
	{
		$this->common->checkAccess($this->user->info->access_level, 1);
		$id = intval($id);
		$cat = $this->admin_model->get_news_category($id);
		if ($cat->num_rows() == 0) $this->template->error(lang("error_77"));

		$name = $this->common->nohtml($this->input->post("name"));
		if (empty($name)) $this->template->error(lang("error_76"));

		$this->admin_model->update_news_cat($id,$name);
		$this->session->set_flashdata("globalmsg", lang("success_36"));
		redirect(base_url("admin/edit_news_cat"));
	}


	public function add_news() 
	{
		$this->common->checkAccess($this->user->info->access_level, 1);
		$this->template->loadExternal(
			"<script src='".base_url()
			."scripts/tinymce/tinymce.min.js'></script>
			<script src='".base_url()."scripts/tinymce/config.js'></script>");

		$categories = $this->admin_model->get_news_categories();
		$this->template->loadContent("admin/add_news.php", 
			array(
				"categories" => $categories
			)
		);
	}

	public function add_news_pro() 
	{
		$this->common->checkAccess($this->user->info->access_level, 1);
		$subject = $this->common->nohtml($this->input->post("subject"));
		$catid = intval($this->input->post("catid"));
		$disable_comments = intval($this->input->post("disable_comments"));
		$news_content = 
			$this->lib_filter->go($this->input->post("news_content"));

		$this->load->library('upload');

		if (empty($subject)) {
			$this->template->error(lang("error_80"));
		}

		if ($_FILES['thumbnail']['size'] > 0) {
			$this->upload->initialize(array( 
		       "upload_path" => $this->settings->info->upload_path,
		       "overwrite" => FALSE,
		       "file_name" => "thumbnail_" . time() . "_" . rand(1,1000),
		       "max_filename" => 300,
		       "remove_spaces" => TRUE,
		       "allowed_types" => "gif|jpg|png|jpeg|",
		       "max_size" => 300,
		       "xss_clean" => TRUE
		    ));

		    if (!$this->upload->do_upload("thumbnail")) {
		    	$this->template->error("Upload Error: "
		    	.$this->upload->display_errors());
		    }

		    $data = $this->upload->data();

		    $thumbnail_image = $data['file_name'];
		} else {
			$thumbnail_image = "news_default_thumb.png";
		}

		if ($_FILES['big_image']['size'] > 0) {
			$this->upload->initialize(array( 
		       "upload_path" => $this->settings->info->upload_path,
		       "overwrite" => FALSE,
		       "file_name" => "bigimage_" . time() . "_" . rand(1,1000),
		       "max_filename" => 300,
		       "remove_spaces" => TRUE,
		       "allowed_types" => "gif|jpg|png|jpeg|",
		       "max_size" => 800,
		       "xss_clean" => TRUE
		    ));

		    if (!$this->upload->do_upload("big_image")) {
		    	$this->template->error("Upload Error: "
		    	.$this->upload->display_errors());
		    }

		    $data = $this->upload->data();

		    $big_image = $data['file_name'];
		} else {
			$big_image = "news_default_big.png";
		}

		$this->admin_model->add_news($this->user->info->ID,$subject,$catid,
			$disable_comments,$news_content,$thumbnail_image,$big_image);

		$this->session->set_flashdata("globalmsg", lang("success_37"));
		redirect(base_url("admin/edit_news"));

	}

	public function edit_news($page=0) 
	{
		$this->common->checkAccess($this->user->info->access_level, 1);
		$page = intval($page);

		$news = $this->admin_model->get_news($page);
		$this->load->library('pagination');

		$config['base_url'] = base_url("admin/edit_news/");
		$config['total_rows'] = $this->admin_model->get_news_count();
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;

		include (APPPATH . "/config/page_config.php");

		$this->pagination->initialize($config);

		$this->template->loadContent("admin/edit_news.php", 
			array(
				"news" => $news
			)
		);
	}

	public function edit_news_pro($id) 
	{
		$this->common->checkAccess($this->user->info->access_level, 1);
		$id = intval($id);
		$news = $this->admin_model->get_news_by_id($id);
		if ($news->num_rows() == 0) {
			$this->template->error(lang("error_81"));
		}

		$this->template->loadExternal(
			"<script src='".base_url()
			."scripts/tinymce/tinymce.min.js'></script>
			<script src='".base_url()."scripts/tinymce/config.js'></script>");

		$categories = $this->admin_model->get_news_categories();

		$this->template->loadContent("admin/edit_news_pro.php", 
			array(
				"news" => $news->row(),
				"categories" => $categories
			)
		);

	}

	public function edit_news_pro_pro($id) 
	{
		$this->common->checkAccess($this->user->info->access_level, 1);
		$id = intval($id);
		$news = $this->admin_model->get_news_by_id($id);
		if ($news->num_rows() == 0) {
			$this->template->error(lang("error_81"));
		}
		$news = $news->row();

		$subject = $this->common->nohtml($this->input->post("subject"));
		$catid = intval($this->input->post("catid"));
		$disable_comments = intval($this->input->post("disable_comments"));
		$news_content = $this->lib_filter->go($this->input->post("news_content"));

		$this->load->library('upload');

		if (empty($subject)) {
			$this->template->error(lang("error_80"));
		}

		if ($_FILES['thumbnail']['size'] > 0) {
			$this->upload->initialize(array( 
		       "upload_path" => $this->settings->info->upload_path,
		       "overwrite" => FALSE,
		       "file_name" => "thumbnail_" . time() . "_" . rand(1,1000),
		       "max_filename" => 300,
		       "remove_spaces" => TRUE,
		       "allowed_types" => "gif|jpg|png|jpeg|",
		       "max_size" => 300,
		       "xss_clean" => TRUE
		    ));

		    if (!$this->upload->do_upload("thumbnail")) {
		    	$this->template->error("Upload Error: "
		    	.$this->upload->display_errors());
		    }

		    $data = $this->upload->data();

		    $thumbnail_image = $data['file_name'];
		} else {
			$thumbnail_image = $news->image;
		}

		if ($_FILES['big_image']['size'] > 0) {
			$this->upload->initialize(array( 
		       "upload_path" => $this->settings->info->upload_path,
		       "overwrite" => FALSE,
		       "file_name" => "bigimage_" . time() . "_" . rand(1,1000),
		       "max_filename" => 300,
		       "remove_spaces" => TRUE,
		       "allowed_types" => "gif|jpg|png|jpeg|",
		       "max_size" => 800,
		       "xss_clean" => TRUE
		    ));

		    if (!$this->upload->do_upload("big_image")) {
		    	$this->template->error("Upload Error: "
		    	.$this->upload->display_errors());
		    }

		    $data = $this->upload->data();

		    $big_image = $data['file_name'];
		} else {
			$big_image = $news->big_image;
		}

		$this->admin_model->update_news($id, $this->user->info->ID,$subject,
			$catid,$disable_comments,$news_content,$thumbnail_image,$big_image);

		$this->session->set_flashdata("globalmsg", lang("success_38"));
		redirect(base_url("admin/edit_news"));

	}

	public function delete_news($id, $token) 
	{
		$this->common->checkAccess($this->user->info->access_level, 1);
		if ($token != $this->security->get_csrf_hash()) {
			$this->template->error("Invalid Token");
		}
		$id = intval($id);
		$news = $this->admin_model->get_news_by_id($id);
		if ($news->num_rows() == 0) {
			$this->template->error(lang("error_81"));
		}

		// Delete
		$this->admin_model->delete_news($id);
		$this->session->set_flashdata("globalmsg", lang("success_39"));
		redirect(base_url("admin/edit_news"));
	}



	public function widgets() 
	{
		$this->common->checkAccess($this->user->info->access_level, 3);
		$this->template->loadContent("admin/widgets.php", 
			array(
			)
		);
	}

	public function widget_pro() 
	{
		$this->common->checkAccess($this->user->info->access_level, 3);
		$twitter_widget_global = 
			intval($this->input->post("twitter_widget_global"));
		$twitter_widget_disable = 
			intval($this->input->post("twitter_widget_disable"));
		$news_display_limit = intval($this->input->post("news_display_limit"));
		$news_widget_global = intval($this->input->post("news_widget_global"));
		$news_widget_disable = 
			intval($this->input->post("news_widget_disable"));
		$advert_code = $this->input->post("advert_code");
		$advert_widget_global = 
			intval($this->input->post("advert_widget_global"));
		$advert_widget_disable = 
			intval($this->input->post("advert_widget_disable"));

		$this->admin_model->updateSettings(
			array(
				"twitter_widget_global" => $twitter_widget_global, 
				"twitter_widget_disable" => $twitter_widget_disable,
				"news_display_limit" => $news_display_limit, 
				"news_widget_global"=> $news_widget_global,  
				"news_widget_disable" => $news_widget_disable,
				"advert_code" => $advert_code,
				"advert_widget_global" => $advert_widget_global,
				"advert_widget_disable" => $advert_widget_disable
			)
		);
		$this->session->set_flashdata("globalmsg", lang("success_40"));
		redirect(base_url("admin/widgets"));
	}


	public function socialmedia() 
	{
		$this->common->checkAccess($this->user->info->access_level, 3);
		$this->template->loadContent("admin/socialmedia.php", 
			array(
			)
		);
	}

	public function socialmedia_pro() 
	{
		$this->common->checkAccess($this->user->info->access_level, 3);
		$twitter_name = 
			$this->common->nohtml($this->input->post("twitter_name"));
		$twitter_limit = intval($this->input->post("twitter_display_limit"));
		$update_tweets = intval($this->input->post("update_tweets"));
		$twitter_consumer_key = 
			$this->common->nohtml($this->input->post("twitter_consumer_key"));
		$twitter_consumer_secret = 
			$this->common->nohtml($this->input->post("twitter_consumer_secret"));
		$twitter_access_token = 
			$this->common->nohtml($this->input->post("twitter_access_token"));
		$twitter_access_secret = 
			$this->common->nohtml($this->input->post("twitter_access_secret"));
		$skype_name = 
			$this->common->nohtml($this->input->post("skype_name"));
		$facebook_name = 
			$this->common->nohtml($this->input->post("facebook_name"));
		$google_name = 
			$this->common->nohtml($this->input->post("google_name"));
		$wordpress_name = 
			$this->common->nohtml($this->input->post("wordpress_name"));
		$facebook_app_id = 
			$this->common->nohtml($this->input->post("facebook_app_id"));
		$facebook_app_secret = 
			$this->common->nohtml($this->input->post("facebook_app_secret"));
		$google_client_id = 
			$this->common->nohtml($this->input->post("google_client_id"));
		$google_client_secret = 
			$this->common->nohtml($this->input->post("google_client_secret"));

		$this->admin_model->updateSettings(
			array(
				"twitter_name" => $twitter_name, 
				"twitter_display_limit" => $twitter_limit,
				"twitter_consumer_key" => $twitter_consumer_key, 
				"twitter_consumer_secret"=> $twitter_consumer_secret,  
				"twitter_access_token" => $twitter_access_token,
				"twitter_access_secret" => $twitter_access_secret,
				"skype_name" => $skype_name,
				"facebook_name" => $facebook_name,
				"google_name" => $google_name,
				"wordpress_name" => $wordpress_name,
				"facebook_app_id" => $facebook_app_id,
				"facebook_app_secret" => $facebook_app_secret,
				"google_client_id" => $google_client_id,
				"google_client_secret" => $google_client_secret,
				"update_tweets" => $update_tweets
			)
		);
		$this->session->set_flashdata("globalmsg", lang("success_40"));
		redirect(base_url("admin/socialmedia"));
	}

	public function settings() 
	{
		$this->common->checkAccess($this->user->info->access_level, 3);
		$themes = $this->admin_model->get_themes();
		$this->template->loadContent("admin/settings.php", 
			array(
				"themes" => $themes
			)
		);
	}

	public function settings_pro() 
	{
		$this->common->checkAccess($this->user->info->access_level, 3);
		$site_name = $this->common->nohtml($this->input->post("site_name"));
		$site_email = $this->common->nohtml($this->input->post("site_email"));
		$upload_path = $this->common->nohtml($this->input->post("upload_path"));
		$upload_path_rel = 
			$this->common->nohtml($this->input->post("upload_path_relative"));
		$page_voting = intval($this->input->post("page_voting"));
		$registration = intval($this->input->post("registration"));
		$news_comments = intval($this->input->post("news_comments"));
		$guest_feedback = intval($this->input->post("guest_feedback"));
		$guest_profile = intval($this->input->post("guest_profile"));
		$profile_comments = intval($this->input->post("profile_comments"));
		$mailbox = intval($this->input->post("mailbox"));
		$avatar_upload = intval($this->input->post("avatar_upload"));
		$themeid = intval($this->input->post("themeid"));
		$disable_social_login = 
			intval($this->input->post("disable_social_login"));
		$fp_social = intval($this->input->post("fp_social"));


		// Validate
		if (empty($site_name) || empty($site_email)) {
			$this->template->error(lang("error_82"));
		}
		$this->load->library("upload");

		if ($_FILES['userfile']['size'] > 0) {
			$this->upload->initialize(array( 
		       "upload_path" => $this->settings->info->upload_path,
		       "overwrite" => FALSE,
		       "max_filename" => 300,
		       "encrypt_name" => TRUE,
		       "remove_spaces" => TRUE,
		       "allowed_types" => "gif|jpg|png|jpeg|",
		       "max_size" => 300,
		       "xss_clean" => TRUE
		    ));

		    if (!$this->upload->do_upload()) {
		    	$this->template->error("Upload Error: " 
		    	.$this->upload->display_errors());
		    }

		    $data = $this->upload->data();

		    $image = $data['file_name'];
		} else {
			$image= $this->settings->info->site_logo;
		}

		$this->admin_model->updateSettings(
			array(
				"site_name" => $site_name, 
				"upload_path" => $upload_path,
				"upload_path_relative" => $upload_path_rel, 
				"site_logo"=> $image,  
				"support_email" => $site_email,
				"page_voting" => $page_voting,
				"registration" => $registration,
				"news_comments" => $news_comments,
				"guest_feedback" => $guest_feedback,
				"mailbox" => $mailbox,
				"avatar_upload" => $avatar_upload,
				"themeid" => $themeid,
				"disable_social_login" => $disable_social_login,
				"fp_social" => $fp_social,
				"guest_profile" => $guest_profile,
				"profile_comments" => $profile_comments
			)
		);
		$this->session->set_flashdata("globalmsg", lang("success_40"));
		redirect(base_url("admin/settings"));
	}

	public function delete_ip($id,$hash) 
	{
		$this->common->checkAccess($this->user->info->access_level, 3);
		if ($hash != $this->security->get_csrf_hash()) { 
			$this->template->error(lang("error_14"));
		}
		$id = intval($id);
		$this->admin_model->delete_IP($id);
		$this->session->set_flashdata("globalmsg", lang("success_41"));
		redirect(base_url("admin/ip_blocking"));
	}

	public function ip_blocking($page=0) 
	{
		$this->common->checkAccess($this->user->info->access_level, 3);
		$ip = $this->admin_model->get_IPs($page);

		$this->load->library('pagination');

		$config['base_url'] = base_url("admin/ip_blocking/");
		$config['total_rows'] = $this->admin_model->get_IP_Count();
		$config['per_page'] = 20;

		$this->pagination->initialize($config); 

		$this->template->loadContent("admin/edit_ip.php", 
			array("ips" => $ip));
	}

	public function block_ip() 
	{
		$this->common->checkAccess($this->user->info->access_level, 3);
		$ip = $this->common->nohtml($this->input->post("ip", true));
		$reason = $this->common->nohtml(
			$this->input->post("reason", true));
		if (empty($ip)) {
			$this->template->error(lang("error_83"));
		}

		$this->admin_model->block_IP($ip, $reason);
		$this->session->set_flashdata("globalmsg", lang("success_42"));
		redirect(base_url("admin/ip_blocking"));
	}

}

?>