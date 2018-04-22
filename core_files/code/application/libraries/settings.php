<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Settings 
{

	var $info=array();

	var $version = "2.1";

	public function __construct() 
	{
		$CI =& get_instance();
		$site = $CI->db->select("s.ID, s.site_name, s.support_email, 
			s.upload_path, s.upload_path_relative, s.page_voting, s.registration,
			s.news_comments,s.guest_feedback, s.mailbox, s.site_logo, 
			s.twitter_name,s.twitter_display_limit, s.twitter_consumer_key,
			s.twitter_consumer_secret,s.twitter_access_token, 
			s.twitter_access_secret, s.skype_name, s.facebook_name, 
			s.google_name, s.wordpress_name, s.twitter_widget_global,
			s.twitter_widget_disable, s.news_display_limit, s.news_widget_global,
			s.news_widget_disable, s.advert_code, s.advert_widget_global, 
			s.advert_widget_disable, s.avatar_upload, s.themeid,
			s.facebook_app_id, s.facebook_app_secret, s.google_client_id,
			s.google_client_secret, s.disable_social_login, s.fp_social,
			s.update_tweets, s.twitter_update, s.guest_profile,
			s.profile_comments, 
			site_themes.css_file, site_themes.css_extra_files")
		->where("s.ID", 1)
		->join("site_themes", "site_themes.ID = s.themeid")
		->get("site_settings as s");
		
		if($site->num_rows() == 0) {
			$CI->template->error(
				"You are missing the site settings database row."
			);
		} else {
			$this->info = $site->row();
		}
	}

}

?>
