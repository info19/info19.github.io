<?php

class Profile extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model("profile_model");
	}

	public function index($username="", $page=0) 
	{
		if(!$this->settings->info->guest_profile) {
			if (!$this->user->loggedin) {
			$this->template->error(
					lang("error_1")
				);
			}
		}
		$page = intval($page);
		$username = $this->common->nohtml($username);
		$user = $this->profile_model->get_user($username);
		if($user->num_rows() == 0) $this->template->error(lang("error_87"));
		$user = $user->row();

		$comments = $this->profile_model->get_user_comments($user->ID, $page);

		$this->load->library('pagination');

		$config['base_url'] = base_url("profile/" . $username);
		$config['total_rows'] = $this->profile_model
			->get_total_user_comments($user->ID);
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;

		include (APPPATH . "/config/page_config.php");

		$this->pagination->initialize($config); 

		$this->template->loadContent("profile/index.php", 
			array(
				"user" => $user,
				"comments" => $comments
			)
		);
	}

	public function delete_comment($id, $hash) 
	{
		if (!$this->user->loggedin) {
			$this->template->error(
					lang("error_1")
				);
		}
		if ($hash != $this->security->get_csrf_hash()) {
			$this->template->error(lang("error_14"));
		}
		$id = intval($id);

		$comment = $this->profile_model->get_comment($id);
		if ($comment->num_rows() == 0) $this->template->error(lang("error_88"));
		$comment = $comment->row();
		if ($this->user->info->access_level <2) {
			if ($comment->userid != $this->user->info->ID) {
				if ($comment->profileid != $this->user->info->ID) {
					$this->template->error(lang("error_89"));
				}
			}
		}

		$this->profile_model->delete_comment($id);
		$this->session->set_flashdata("globalmsg", lang("success_43"));
		redirect(base_url("profile/" . $comment->username));
	}

	public function comment($id) 
	{
		if (!$this->user->loggedin) {
			$this->template->error(
					lang("error_1")
				);
		}
		if ($this->settings->info->profile_comments) {
			$this->template->error(lang("error_90"));
		}
		$id = intval($id);
		$user = $this->profile_model->get_user_by_id($id);
		if ($user->num_rows() == 0) $this->template->error(lang("error_91"));
		$user = $user->row();
		if ($user->profile_comments) $this->template->error(lang("error_92"));

		$comment = $this->common->nohtml($this->input->post("comment"));
		if (empty($comment)) $this->template->error(lang("error_93"));

		$this->profile_model->add_comment($id, $this->user->info->ID, $comment);
		$this->event_model->new_comment($id);
		$this->session->set_flashdata("globalmsg", lang("success_44"));
		redirect(base_url("profile/" . $user->username));
	}

}

?>