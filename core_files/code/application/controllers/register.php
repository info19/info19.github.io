<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		$this->load->model("register_model");
		$this->load->model("ip_model");
	}

	public function index()
	{
		if ($this->settings->info->registration) {
			$this->template->error(lang("error_43"));
		}

		$this->template->loadExternal(
			'<script type="text/javascript" src="'
			.base_url().'scripts/check_username.js" /></script>'
		);

		// IP Block check
		if ($this->ip_model->checkIpIsBlocked($_SERVER['REMOTE_ADDR'])) {
			$this->template->error(
				lang("error_11")
			);
		}
		if ($this->user->loggedin) {
			$this->template->error(
				lang("error_6")
			);
		}
		$this->load->helper('email');

		$email = "";
		$name = "";
		$username = "";
		$year = 2014;
		$month = 1;
		$day = 1;
		$tou = 0;
		$fail = "";

		if (isset($_POST['s'])) {
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
			$tou = intval($this->input->post("tou", true));
			$captcha = $this->input->post("captcha", true);
			$username = $this->common->nohtml(
				$this->input->post("username", true));


			if(strlen($username) < 3) $fail = lang("ctn_113");

			if(!preg_match("/^[a-z0-9_]+$/i", $username)) $fail = lang("ctn_114");

			if(!$this->register_model->check_username_is_free($username)) $fail = lang("ctn_115");

			if ($captcha != $_SESSION['sc']) {
				$fail = lang("error_2");
			}
			if ($pass != $pass2) $fail = lang("error_44");

			if ($year < date("Y") - 100) $fail = lang("error_45");
			if ($month <= 0 || $month > 12) $fail = lang("error_46");
			if ($day <= 0 || $day > 31) $fail = lang("error_47");

			if ($tou != 1) {
				$fail = lang("error_48");
			}

			if (strlen($pass) <= 5) {
				$fail = lang("error_49");
			}

			if (strlen($name) > 200) {
				$fail = lang("error_50");
			}

			if (empty($name)) $fail = lang("error_53");

			if (empty($email)) {
				$fail = lang("error_51");
			}

			if (!valid_email($email)) {
				$fail = lang("error_4");
			}

			if (!$this->register_model->checkEmailIsFree($email)) {
				$fail = lang("error_52");
			}

			if (strlen($month) === 1) {
				$month = "0" . $month;
			}

			if (strlen($day) === 1) {
				$day = "0" . $day;
			}
			$dob = $year . "/" . $month . "/" . $day;

			if (empty($fail)) {
				// Passed all checks
				$pass = $this->common->encrypt($pass);
				$this->register_model->registerUser(
					$username, $email, $name, $pass, $dob
				);
				$this->session->set_flashdata("globalmsg", lang("success_14"));
				redirect(base_url("login"));
			}

		}


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
		$this->template->loadContent("register/index.php", array(
			"cap" => $cap,
			"email" => $email,
			"name" => $name,
			"year" => $year,
			"month" => $month,
			"day" => $day,
			"tou" => $tou,
		    'fail' => $fail,
		    "username" => $username));
	}
}
