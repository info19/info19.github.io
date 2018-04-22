<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		$this->load->model("mail_model");
		$this->load->model("user_model");
		if (!$this->user->loggedin) {
			$this->template->error(
				lang("error_1")
			);
		}
		if ($this->settings->info->mailbox) {
			$this->template->error(lang("error_21"));
		}
		if (!$this->user->info->email) $this->template->error(lang("error_22"));
		$this->template->loadData("mailActive",true);
	}

	public function index() 
	{
		$mail = $this->mail_model->get_user_mail($this->user->info->ID);
		$this->template->loadContent("mail/index.php", 
			array(
				"mail" => $mail
			)
		);
	}

	public function create($username="") 
	{
		$username = $this->common->nohtml($username);
		$this->template->loadContent("mail/create.php", 
			array(
				"username" => $username
			)
		);
	}

	public function create_pro() 
	{
		$username = $this->input->post("username");

		$title = $this->common->nohtml($this->input->post("title"));
		$body = $this->common->nohtml($this->input->post("body"));

		if (empty($title) || empty($body)) {
			$this->template->error(lang("error_23"));
		}

		if(empty($username)) {
			$this->template->error(lang("error_84"));
		}

		// Check user exists
		$user = $this->user_model->get_user_by_username($username);
		if ($user->num_rows() == 0) {
			$this->template->error(lang("error_24"));
		}
		$user = $user->row();

		// Block
		if ($this->mail_model->is_blocked($this->user->info->ID, $user->ID)) {
			$this->template->error(lang("error_25"));
		}

		if ($user->ID == $this->user->info->ID) {
			$this->template->error(lang("error_26"));
		}

		// Create
		$this->mail_model
		->create($title, $body, $this->user->info->ID, $user->ID);
		$this->event_model->new_mail($user->ID);
		$this->session->set_flashdata("globalmsg", 
			lang("success_8"));
		redirect(base_url("mail"));
	}

	public function delete($hash, $id) 
	{
		if ($hash != $this->security->get_csrf_hash()) {
			$this->template->error(lang("error_14"));
		}

		$id = intval($id);
		$mail = $this->mail_model
		->get_user_mail_single($id, $this->user->info->ID);
		if ($mail->num_rows() == 0) $this->template->error(lang("error_27"));
		$mail = $mail->row();

		if ($this->user->info->ID == $mail->userid) {
			$this->mail_model->delete_userid($id);
		} else {
			$this->mail_model->delete_toid($id);
		}

		if ($mail->delete_userid || $mail->delete_toid) {
			$this->mail_model->delete($id);
		}
		$this->session->set_flashdata("globalmsg", lang("success_9"));
		redirect(base_url("mail"));
	}

	public function message($id,$page=0) 
	{
		$id = intval($id);
		$page = intval($page);
		$mail = $this->mail_model
		->get_user_mail_single($id, $this->user->info->ID);
		if ($mail->num_rows() == 0) $this->template->error(lang("error_27"));
		$mail = $mail->row();

		if ($this->user->info->ID == $mail->userid) {
			$unread = $mail->unread_userid;
			$col = 1;
		} else {
			$unread = $mail->unread_toid;
			$col = 0;
		}

		if ($unread) {
			$this->mail_model->read_mail($id, $col);
		}

		$replies = $this->mail_model->get_mail_replies($id,$page);

		$this->load->library('pagination');


		$config['base_url'] = base_url("mail/message/" . $id);
		$config['total_rows'] = $mail->replies;
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

		$this->template->loadContent("mail/view.php", 
			array(
				"cap" => $cap,
				"mail" => $mail,
				"replies" => $replies,
				"page" => $page
			)
		);
	}

	public function reply($id) 
	{
		$id = intval($id);
		$mail = $this->mail_model
		->get_user_mail_single($id, $this->user->info->ID);
		if ($mail->num_rows() == 0) $this->template->error(lang("error_27"));
		$mail = $mail->row();

		$captcha = $this->input->post("captcha", true);
		if ($captcha != $_SESSION['sc']) {
			$this->template->error("Invalid Captcha");
		}

		$reply = $this->common->nohtml($this->input->post("reply", true));
		if (empty($reply)) $this->template->error(lang("error_28"));

		if ($mail->delete_userid || $mail->delete_toid) {
			$this->template->error(lang("error_29"));
		}
		if ($this->user->info->ID == $mail->userid) {
			$userid = $mail->toid;
			$col = 0;
		} else {
			$userid = $mail->userid;
			$col = 1;
		}

		if ($this->mail_model->is_blocked($this->user->info->ID, $userid)) {
			$this->template->error(lang("error_25"));
		}

		$this->mail_model->create_reply($id, $this->user->info->ID, $reply);
		$this->mail_model->update_replies($id, $col);

		$page = floor( ($mail->replies)/10) *10;
		$this->event_model->new_mail($userid);
		$this->session->set_flashdata("globalmsg", 
			lang("success_8"));
		redirect(base_url("mail/message/" . $id . "/" . $page));
	}

	public function block() 
	{
		$blocks = $this->mail_model->get_user_blocks($this->user->info->ID);
		$this->template->loadContent("mail/block.php", 
			array(
				"blocks" => $blocks
			)
		);
	}

	public function delete_block($id, $hash) 
	{
		$id = intval($id);
		if ($hash != $this->security->get_csrf_hash()) {
			$this->template->error(lang("error_14"));
		}

		$block = $this->mail_model->get_user_block($id, $this->user->info->ID);
		if ($block->num_rows() == 0) {
			$this->template->error(lang("error_30"));
		}

		$this->mail_model->delete_block($id);
		$this->session->set_flashdata("globalmsg", lang("success_10"));
		redirect(base_url("mail/block"));
	}

	public function block_user() 
	{
		$username = $this->input->post("username");

		if(empty($username)) {
			$this->template->error(lang("error_84"));
		}

		// Check user exists
		$user = $this->user_model->get_user_by_username($username);
		if ($user->num_rows() == 0) {
			$this->template->error(lang("error_24"));
		}
		$user = $user->row();

		$this->mail_model->block_user($this->user->info->ID, $user->ID);
		$this->session->set_flashdata("globalmsg", lang("success_11"));
		redirect(base_url("mail/block"));
	}

}

?>