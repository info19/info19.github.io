<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		$this->load->model("feedback_model");
		if (!$this->settings->info->guest_feedback) {
			if (!$this->user->loggedin) {
				$this->template->error(
					lang("error_1")
				);
			}
		}
		$this->template->loadData("contactActive",true);
	}

	public function index()
	{
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
		if (!$this->settings->info->guest_feedback) {
			$email = $this->user->info->email;
			$name = $this->user->info->name;
		} else {
			$email = "";
			$name = "";
		}
		$this->template->loadContent("feedback/index.php", 
			array(
				"cap" => $cap,
				"email" => $email,
				"name" => $name
			)
		);
	}

	public function go() 
	{
		$this->load->helper('email');
		$email = $this->input->post("email");
		$name = $this->common->nohtml($this->input->post("name"));
		$title = $this->common->nohtml($this->input->post("title"));
		$message = $this->common->nohtml($this->input->post("message"));
		$captcha = $this->input->post("captcha", true);

		if ($captcha != $_SESSION['sc']) {
			$this->template->error(lang("error_2"));
		}

		if (empty($email) || empty($name) || empty($title) || empty($message)) {
			$this->template->error(lang("error_3"));
		}

		if (!valid_email($email)) {
			$this->template->error(lang("error_4"));
		}

		if (!$this->settings->info->guest_feedback) {
			$userid = $this->user->info->ID;
		} else {
			$userid = 0;
		}
		$this->feedback_model
		->create($userid, $email, $name, $title, $message);

		$this->session->set_flashdata("globalmsg", 
			lang("success_1"));
		redirect(base_url("feedback"));
	}

}

?>
