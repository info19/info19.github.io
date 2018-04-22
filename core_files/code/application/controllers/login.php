<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		$this->load->model("login_model");
		$this->load->model("ip_model");
	}

	public function index()
	{

		if ($this->user->loggedin) {
			$this->template->error(lang("error_6"));
		}
		$this->template->loadContent("login/index.php", array());
	}

	public function google_login() 
	{
		if ($this->settings->info->disable_social_login) {
			$this->template->error(lang("error_7"));
		}
		require_once APPPATH . 'third_party/Google_Client.php';
		require_once APPPATH . 'third_party/contrib/Google_PlusService.php';
		require_once APPPATH . 'third_party/auth/Google_OAuth2.php';

		if(empty($this->settings->info->google_client_id) || 
			empty($this->settings->info->google_client_secret)) {
			$this->template->error("Missing Google API Keys");
		}

		$client = new Google_Client();
		$client->setAccessType("online"); // default: offline
		$client->setApplicationName('Support Centre');
		$client->setClientId($this->settings->info->google_client_id);
		$client->setClientSecret($this->settings->info->google_client_secret);
		$client->setRedirectUri(base_url("login/google_login"));
		$client->setScopes("https://www.googleapis.com/auth/userinfo.profile");

		$oauth2 = new Google_OAuth2($client);
		$plus = new Google_PlusService($client);


		if (isset($_GET['code'])) {
			$client->authenticate($_GET['code']);
			$_SESSION['google_token'] = $client->getAccessToken();
			$redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
			header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
			return;
		}

		if (isset($_SESSION['google_token'])) {
			$client->setAccessToken($_SESSION['google_token']);
		}
		$provider = "google";

		if ($client->getAccessToken()) {
			$peop = $plus->people->get('me');
			$name = $peop['displayName'];
			$oauth_id = $peop['id'];
			$token = rand(1,100000) . $name;
			$token = md5(sha1($token));
		    $_SESSION['google_token'] = $client->getAccessToken();
		    if (!$oauth_id) $this->template->error(lang("error_8"));

		    $user = $this->login_model->get_oauth_user($provider, $oauth_id);
		    if ($user->num_rows() == 0) {
		    	// Create
		    	$this->login_model->register_facebook_user($provider, 
				$oauth_id, $name, $token);
		    } else {
		    	$this->login_model
		    	->update_facebook_user($provider, $oauth_id, $token);
		    }
		    $ttl = 3600*24*31;
			setcookie("uzyprovider", $provider, time()+$ttl, "/");
			setcookie("uzyoauthid", $oauth_id, time()+$ttl, "/");
			setcookie("uzytkn", $token, time()+$ttl, "/");
			session_destroy();
			$this->session->set_flashdata("globalmsg", lang("success_3"));
			redirect(base_url());
		} else {
		    $authUrl = $client->createAuthUrl();
		    redirect($authUrl);
		}
	}

	public function facebook_login() 
	{
		if ($this->settings->info->disable_social_login) {
			$this->template->error(lang("error_7"));
		}

		if ($this->user->loggedin) {
			$this->template->error(lang("error_20"));
		}

		if(empty($this->settings->info->facebook_app_id) || 
			empty($this->settings->info->facebook_app_secret)) {
			$this->template->error("Missing Facebook API Keys");
		}
		require_once APPPATH . 'third_party/facebook.php';
		$facebook = new Facebook(array(
		    'appId'  => $this->settings->info->facebook_app_id,
		    'secret' => $this->settings->info->facebook_app_secret
		));

		$user = $facebook->getUser();

		if (!empty($user)) {
			// Good
			try {
				$user_profile = $facebook->api('/me');
			} catch (FacebookApiException $e){
				error_log($e);
				$user = NULL;
			}
		}

		$loginUrl = $facebook->getLoginUrl(array(
			'next'	=> base_url(), 
		));

		$logoutUrl = $facebook->getLogoutUrl(array(
			'next'	=> base_url(), 
		));


		if (!$user) redirect($loginUrl);

		$provider = "facebook";
		$oauth_id = $this->common->nohtml($user);
		$user = $this->login_model->get_oauth_user($provider, $oauth_id);
		$name = $this->common->nohtml($user_profile['name']);
		$token = rand(1,100000) . $name;
		$token = md5(sha1($token));
		if ($user->num_rows() == 0) {
			// New user time
			$this->login_model->register_facebook_user($provider, 
				$oauth_id, $name, $token);
		} else {
			// login
			$this->login_model
			->update_facebook_user($provider, $oauth_id, $token);
		}
		$ttl = 3600*24*31;
		setcookie("uzyprovider", $provider, time()+$ttl, "/");
		setcookie("uzyoauthid", $oauth_id, time()+$ttl, "/");
		setcookie("uzytkn", $token, time()+$ttl, "/");
		$this->session->set_flashdata("globalmsg", lang("success_4"));
		redirect(base_url());

	}

	public function twitter_login() 
	{
		if ($this->settings->info->disable_social_login) {
			$this->template->error(lang("error_7"));
		}
		if ($this->user->loggedin) {
			$this->template->error(lang("error_20"));
		}
		if(empty($this->settings->info->twitter_consumer_key) || 
			empty($this->settings->info->twitter_consumer_secret)) {
			$this->template->error("Missing Facebook API Keys");
		}
		require_once APPPATH . 'third_party/twitteroauth.php';
		$twitteroauth = new TwitterOAuth(
			$this->settings->info->twitter_consumer_key,
			$this->settings->info->twitter_consumer_secret);

		$request_token =
			$twitteroauth->getRequestToken(base_url("login/twitter_login_pro"));

		if ($twitteroauth->http_code==200){
			$_SESSION['oauth_token'] = $request_token['oauth_token'];
			$_SESSION['oauth_token_secret'] =
				$request_token['oauth_token_secret'];
		    $url = $twitteroauth->
		    getAuthorizeURL($request_token['oauth_token']);
		    redirect($url);
		} else {
		    $this->template->error(lang("error_9"));
		}
	}

	public function twitter_login_pro() 
	{
		if ($this->user->loggedin) {
			$this->template->error(lang("error_20"));
		}
		if ($this->settings->info->disable_social_login) {
			$this->template->error(lang("error_7"));
		}
		if(empty($this->settings->info->twitter_consumer_key) || 
			empty($this->settings->info->twitter_consumer_secret)) {
			$this->template->error("Missing Facebook API Keys");
		}
		require_once APPPATH . 'third_party/twitteroauth.php';
		$provider = "twitter";
		if (!empty($_GET['oauth_verifier']) && !empty($_SESSION['oauth_token'])
		 && !empty($_SESSION['oauth_token_secret']))
		{
		    $twitteroauth = new TwitterOAuth(
		    	$this->settings->info->twitter_consumer_key,
				$this->settings->info->twitter_consumer_secret,
				$_SESSION['oauth_token'],
				$_SESSION['oauth_token_secret']
			);

			$access_token = 
				$twitteroauth->getAccessToken($_GET['oauth_verifier']);
			$_SESSION['access_token'] = $access_token;
			$user_info = $twitteroauth->get('account/verify_credentials');

			if (isset($user_info->errors) && $user_info->errors[0]->message) {
				$this->template->error(lang("error_10"));
			}

			$user = $this->login_model
			->get_oauth_user($provider, $this->common->nohtml($user_info->id));

			$oauth_id = $this->common->nohtml($user_info->id);
			$name = $this->common->nohtml($user_info->screen_name);
			$access_token['oauth_token'] = 
				$this->common->nohtml($access_token['oauth_token']);
			$access_token['oauth_token_secret'] = 
				$this->common->nohtml($access_token['oauth_token_secret']);

			if ($user->num_rows() == 0) {
				// Create User
				$this->login_model->register_oauth_user(
					$provider,$oauth_id,$name,
					$access_token['oauth_token'],
					$access_token['oauth_token_secret']
				);

			} else {
				// Update User
				$this->login_model->update_oauth_user(
					$access_token['oauth_token'],
					$access_token['oauth_token_secret'],
					$oauth_id,$provider);
			}

			// Set Cookies
			$ttl = 3600*24*31;

			setcookie("uzyprovider", $provider, time()+$ttl, "/");
			setcookie("uzyoauthid", $oauth_id, time()+$ttl, "/");
			setcookie("uzyoauthtoken", $access_token['oauth_token'],
			 time()+$ttl, "/");
			setcookie("uzyoauthsecret", $access_token['oauth_token_secret'],
			 time()+$ttl, "/");
			$this->session->set_flashdata("globalmsg", lang("success_5"));
			redirect(base_url());
		} else {
		    redirect(base_url("login/twitter_login"));
		}
	}

	public function pro() 
	{
		if ($this->user->loggedin) {
			$this->template->error(lang("error_20"));
		}

		// IP Block check
		if ($this->ip_model->checkIpIsBlocked($_SERVER['REMOTE_ADDR'])) {
			$this->template->error(
				lang("error_11")
			);
		}
		
		$email = $this->input->post("email", true);
		$pass = $this->common->nohtml($this->input->post("pass", true));
		$remember = $this->input->post("remember", true);

		if (empty($email) || empty($pass)) {
			$this->template->error(lang("error_12"));
		}

		$login = $this->login_model->getUserByEmail($email);
		if ($login->num_rows() == 0) {
			$this->template->error(lang("error_13"));
		}
		$r = $login->row();
		$userid = $r->ID;

		$phpass = new PasswordHash(12, false);
    	if (!$phpass->CheckPassword($pass, $r->password)) {
    		$this->template->error(lang("error_13"));
    	}

		// Generate a token
		$token = rand(1,100000) . $email;
		$token = md5(sha1($token));

		// Store it
		$this->login_model->updateUserToken($userid, $token);

		// Create Cookies
		if ($remember == 1) {
			$ttl = 3600*24*31;
		} else {
			$ttl = 3600;
		}

		// Destroy old session data
		session_destroy();
		$_SESSION['cod'] = "";
		$_SESSION['tid'] = 0;

		setcookie("uzyun", $email, time()+$ttl, "/");
		setcookie("uzytkn", $token, time()+$ttl, "/");

		redirect(base_url());
	}

	public function logout($hash) 
	{
		$this->load->helper("cookie");
		if ($hash != $this->security->get_csrf_hash() ) {
			$this->template->error(lang("error_14"));
		}
		delete_cookie("uzyun");
		delete_cookie("uzytkn");
		delete_cookie("uzyprovider");
		delete_cookie("uzyoauthid");
		delete_cookie("uzyoauthtoken");
		delete_cookie("uzyoauthsecret");
		redirect(base_url());
	}

	public function resetpw($token,$userid) 
	{
		$userid = intval($userid);
		// Check
		$user = $this->login_model->getResetUser($token, $userid);
		if ($user->num_rows() == 0) {
			$this->template->error(lang("error_15"));
		}

		$r=$user->row();
		if ($r->timestamp +3600*24*7 < time()) {
			$this->template->error(lang("error_15"));
		}

		$this->template->loadContent("login/resetpw.php", 
			array(
				"token" => $token,
				 "userid" => $userid
			)
		);

	}

	public function resetpw_pro($token, $userid) 
	{
		$userid = intval($userid);
		// Check
		$user = $this->login_model->getResetUser($token, $userid);
		if ($user->num_rows() == 0) {
			$this->template->error(lang("error_16"));
		}
		$r=$user->row();
		if ($r->timestamp +3600*24*7 < time()) {
			$this->template->error(lang(lang("error_15")));
		}

		$npassword = $this->common->nohtml(
			$this->input->post("npassword", true)
		);
		$npassword2 = $this->common->nohtml(
			$this->input->post("npassword2", true)
		);

		if ($npassword != $npassword2) {
			$this->template->error(lang("error_17"));
		}

		if (empty($npassword)) {
			$this->template->error(lang("error_18"));
		}

		$password = $this->common->encrypt($npassword);

		$this->login_model->updatePassword($userid, $password);
		$this->login_model->deleteReset($token);
		$this->session->set_flashdata("globalmsg", lang("success_6"));
		redirect(base_url("login"));
	}

	public function forgotpw() 
	{
		$this->template->loadContent("login/forgotpw.php", array());
	}

	public function forgotpw_pro() 
	{
		$email = $this->input->post("email", true);

		$log = $this->login_model->getResetLog($_SERVER['REMOTE_ADDR']);
		if ($log->num_rows() > 0) {
			$log = $log->row();
			if ($log->timestamp+ 60*15 > time()) {
				$this->template->error(
					lang("error_19")
				);
			}
		}

		$this->login_model->addToResetLog($_SERVER['REMOTE_ADDR']);

		// Check for email
		$user = $this->login_model->getUserEmail($email);
		if ($user->num_rows() == 0) {
			$this->template->error(
				lang("error_4")
			);
		}
		$user = $user->row();

		$token = rand(10000000,100000000000000000)
		. "HUFI9e9dvcwjecw8392klle@O(*388*&&£^^$$$";

		$token = sha1(md5($token));

		$this->login_model->resetPW($user->ID, $token);

		// Send Email
		$this->load->library('email');

		$this->email->from($this->settings->info->support_email,
		 $this->settings->info->site_name);
		$this->email->to($email);

		$this->email->subject(
			$this->settings->info->site_name . ' Password Reset ');
		$this->email->message(lang("email_part1") . $user->name . ',
		<br /><br /> '.lang("email_part2").'
		'.$this->settings->info->site_name.' ('.base_url().'). 
		'.lang("email_part3").'
		<a href="'.base_url("login/resetpw/" . $token . "/" . $user->ID).'">
		'.base_url("login/resetpw/" . $token . "/" . $user->ID).'</a>. 
		<br /><br /> '.lang("email_part4").'<br /><br /> '.lang("email_part5")
		.$this->settings->info->site_name);

		$this->email->send();
		$this->session->set_flashdata("globalmsg", lang("success_7"));
		redirect(base_url("login/forgotpw"));
	}


}

?>
