<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Template
{

	var $cssincludes;
	var $sidebar;
	var $data = array();

	public function loadContent($view,$data=array(),$die=0)
	{
		$CI =& get_instance();
		$site = array();
		$site['cssincludes'] = $this->cssincludes;
		foreach($this->data as $k=>$v) {
			$site[$k] = $v;
		}
		$site['content'] = $CI->load->view($view,$data,true);
		if($this->sidebar) {
			$site['sidebar'] = $CI->load->view($this->sidebar,$data,true);
		}
		$CI->load->view("layout/layout.php", $site);
		if($die) die($CI->output->get_output());
	}

	public function loadAjax($view,$data=array(),$die=0) 
	{
		$CI =& get_instance();
		$site = array();
		$site['cssincludes'] = $this->cssincludes;
		$CI->load->view($view,$data);
		if($die) die($CI->output->get_output());
	}

	public function loadSidebar($view) 
	{
		$this->sidebar = $view;
	}

	public function loadData($key, $data) 
	{
		$this->data[$key] = $data;
	}

	public function loadExternal($code) 
	{
		$this->cssincludes = $code;
	}

	public function error($message) 
	{
		$this->loadContent("error/error.php",array("message" => $message),1);
	}

	public function errori($msg) 
	{
		echo "ERROR: " . $msg;
		exit();
	}

}

?>
