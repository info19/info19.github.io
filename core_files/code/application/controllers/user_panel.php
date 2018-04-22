<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Panel extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		$this->load->model("user_model");
		if (!$this->user->loggedin) {
			$this->template->error(
				lang("error_1")
			);
		}
	}

	public function index()
	{
		$this->template->loadContent("user_panel/index.php", 
			array(
			)
		);
	}

	public function go() 
	{
		$this->load->helper('email');
		$this->load->library("upload");
		$this->load->model("register_model");
		$email = $this->input->post("email", true);
		$name = $this->common->nohtml(
				$this->input->post("name", true));
		$profile_text = $this->common->nohtml(
				$this->input->post("profile_text", true));
		$profile_comments = intval($this->input->post("profile_comments"));

		if (!$this->user->info->oauth_provider) {
			if (empty($email)) {
				$this->template->error(lang("error_51"));
			}
		}

		if (!empty($email)) {
			$email_info = "";
			if (!valid_email($email)) {
				$this->template->error(lang("error_4"));
			}
			if ($email != $this->user->info->email) {
				if (!$this->register_model->checkEmailIsFree($email)) {
					$this->template->error(lang("error_52"));
				}
				$email_info = lang("error_54") . 
					" <a href='".base_url("login")."'>here</a>";
			}
		}

		if (empty($name)) $this->template->error(lang("error_53"));

		if (!$this->settings->info->avatar_upload) {
			if ($_FILES['userfile']['size'] > 0) {
				$this->upload->initialize(array( 
			       "upload_path" => $this->settings->info->upload_path,
			       "overwrite" => FALSE,
			       "max_filename" => 300,
			       "encrypt_name" => TRUE,
			       "remove_spaces" => TRUE,
			       "allowed_types" => "gif|jpg|png|jpeg|",
			       "max_size" => 300,
			       "xss_clean" => TRUE,
			       "max_width" => 80,
			       "max_height" => 80
			    ));

			    if (!$this->upload->do_upload()) {
			    	$this->template->error("Upload Error: "
			    	.$this->upload->display_errors());
			    }

			    $data = $this->upload->data();

			    $image = $data['file_name'];
			} else {
				$image= $this->user->info->avatar;
			}
		} else {
			$image= $this->user->info->avatar;
		}

		$this->user_model
		->update($this->user->info->ID, $name, $email, $image, $profile_text,
			 $profile_comments);
		$this->session->set_flashdata("globalmsg", 
			lang("success_15").$email_info);
		redirect(base_url("user_panel"));
	}

	public function changepw() 
	{
		$password= $this->common->nohtml(
			$this->input->post("password", true));
		$npassword = $this->common->nohtml(
			$this->input->post("npassword", true));
		$npassword2 = $this->common->nohtml(
			$this->input->post("npassword2", true));

		if ($npassword != $npassword2) {
			$this->template->error(
				lang("error_17"));
		}
		if (empty($npassword)) {
			$this->template->error(lang("error_18"));
		}

		$hash = $this->user_model->getPassword($this->user->info->ID);
		if (!empty($hash)) {
			$phpass = new PasswordHash(12, false);
	    	if (!$phpass->CheckPassword($password, $hash)) {
	    		$this->template->error(
	    			lang("error_55"));
	    	}
	    }

		$this->user_model->updatePassword(
			$this->user->info->ID, $this->common->encrypt($npassword));
		$this->session->set_flashdata("globalmsg",
		 lang("success_16"));
		redirect(base_url("user_panel"));
	}


}

?>
