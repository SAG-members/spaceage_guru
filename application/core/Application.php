<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Application extends Base
{
	protected $isLoggedIn = false;

	public function __construct()
	{
		parent::__construct();
		
		# Check to ensure that only admin can access admin area
		
		// 		if($this->uri->segment(1) === 'admin' && $this->session->userdata('adminLoggedIn'))
// 		{
// 			$this->load->model('user');
// 			if($this->session->userdata('userGroup') != User::USER_GROUP_LEVEL_ADMINISTRATOR)
// 			{
// 				$this->session->unset_userdata('isLoggedIn','redirect-url', 'welcome-message', 'id', 'email', 'userLevel', 'membershipLevel');
// 				$this->session->sess_destroy();
				
// 				redirect(base_url('admin/login'));
// 			}
// 		}
	}
	
	public function isLoggedIn()
	{
		if($this->uri->segment(1) == 'admin')
		{
			if ($this->session->has_userdata('adminLoggedIn')) $this->isLoggedIn = true;
		}
		elseif ($this->session->has_userdata('isLoggedIn')) $this->isLoggedIn = true;
		
		return $this->isLoggedIn; 
	} 
	
	public function redirectToLogin($url = NULL) 
	{
		if(!empty($url)) $this->session->set_userdata('referrer',$url);
		else $this->session->set_userdata('referrer',$_SERVER['REQUEST_URI']);
		
		$this->message->setFlashMessage(Message::LOGIN_REQUIRED);
		redirect(base_url('login'));
	}
	
}
