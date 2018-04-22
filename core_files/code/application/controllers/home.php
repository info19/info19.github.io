<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller 
{

	public function index()
	{
		$this->template->loadData("homeActive",true);
		$this->template->loadContent("home/index.php", array());
	}

	public function delete_event() 
	{
		$id = intval($this->input->get("id"));
		$event = $this->event_model->get_event_by_id($this->user->info->ID, $id);
		if ($event->num_rows() == 0) $this->template->error(lang("error_5"));

		// Delete
		$this->event_model->delete($id);
		echo lang("success_2");
		exit();
	}

	public function get_tweets() 
	{
		$tweets = array();
		if (!empty($this->settings->info->twitter_name)) {
			if($this->settings->info->twitter_update > time()-$this->settings->info->update_tweets) {
				// Get cached
				$tweets = $this->event_model->get_tweets($this->settings->info->twitter_display_limit);
				if($tweets->num_rows() == 0) {
					$tweets = $this->get_static_tweets();
				} else {
					$ntweets=array();
					foreach($tweets->result() as $r) {
						$ntweets[] = $r;
					}
					$tweets = $ntweets;
				}
			} else {
				$tweets = $this->get_static_tweets();
			}
		}
		$this->template->loadAjax("home/tweets.php", 
			array("tweets" => $tweets));
	}

	private function get_static_tweets() {
		require_once APPPATH . 'third_party/codebird.php';
		try {
			Codebird::setConsumerKey(
				$this->settings->info->twitter_consumer_key, 
				$this->settings->info->twitter_consumer_secret);
			$cb = Codebird::getInstance();
			$cb->setToken($this->settings->info->twitter_access_token, 
				$this->settings->info->twitter_access_secret);
			$tweets = $cb->statuses_userTimeline(
			 'screen_name=' . $this->settings->info->twitter_name 
			 . '&count=' . $this->settings->info->twitter_display_limit 
			 . '&exclude_replies=true&include_rts=1' );
		} catch (Exception $e) {
			$this->template->errori(
				"Exception: " . $e);
		}

		// Store tweets in database
		$this->event_model->delete_tweets();
		$new_tweets = array();
		$t=null;
		foreach($tweets as $tweet) {
			if(is_object($tweet)) {
				$t = new stdClass();
				$t->username = $tweet->user->name;
				$t->name = $tweet->user->screen_name;
				$t->tweet = $tweet->text;
				$t->timestamp = $tweet->created_at;
				$new_tweets[] = $t;
				$this->event_model->add_tweet($tweet->user->name, $tweet->user->screen_name, $tweet->text, $tweet->created_at);
			}
		}
		return $new_tweets;
	}

	public function add_username() {
		$this->load->model("register_model");
		if (!$this->user->loggedin) {
			$this->template->error(
				lang("error_1")
			);
		}

		if(!empty($this->user->info->username)) {
			$this->template->error("You already have a username!");
		}

		$username = $this->common->nohtml(
				$this->input->post("username", true));
		if(strlen($username) < 3) $fail = "Username must be at least 3 characters long";

		if(!preg_match("/^[a-z0-9_]+$/i", $username)) $fail = "The username must only contain numbers, letters and underscores!";

		if(!$this->register_model->check_username_is_free($username)) $fail = "This username is already in use!";

		if(!empty($fail)) $this->template->error($fail);

		// Add username
		$this->register_model->add_username($this->user->info->ID, $username);
		redirect(base_url());
	}

	public function check_username() {
		$this->load->model("register_model");
		$username = $this->common->nohtml(
				$this->input->get("username", true));
		if(strlen($username) < 3) $fail = lang("ctn_113");

		if(!preg_match("/^[a-z0-9_]+$/i", $username) && !$fail) $fail = lang("ctn_114");

		if(!$this->register_model->check_username_is_free($username)) $fail = lang("ctn_115");
		if(empty($fail)) {
			echo"<span style='color:#4ea117'>".lang("ctn_112")."</span>";
		} else {
			echo $fail;
		}
		exit();
	}
}
