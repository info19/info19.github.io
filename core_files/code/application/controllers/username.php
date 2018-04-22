<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Username extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		if (!$this->user->loggedin) {
			$this->template->error(
				lang("error_1")
			);
		}
	}

	public function index()
	{
		$this->template->loadContent("username/index.php", 
			array(
			)
		);
	}
}

?>