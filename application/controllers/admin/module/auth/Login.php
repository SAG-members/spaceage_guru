<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		
		$this->template->setSiteLayout(Template::_ADMIN_TEMPLATE_DIR, Template::_ADMIN_LAYOUT_DIR, Template::_ADMIN_MODULE_DIR);
		
		# Set Template
		$this->template->setTemplate('public_default_template');
	}
	
	public function index()
	{
		if($this->input->post('username') && $this->input->post('password'))
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
				
			$this->load->model('admin/user','user');
			$userId = $this->user->sign_in($username, $password);
			
			if(!empty($userId))
			{
				# Get user profile details
				$userProfile = $this->user->getUserProfile($userId);
				
				if($userProfile['user-group'] != User::USER_GROUP_LEVEL_ADMINISTRATOR)
				{
					$this->message->setFlashMessage(Message::NO_ACCESS_ERROR);
				}
				else 
				{
					$sessionData = array(
							'id'=>$userProfile['id'],
							'email'=>$userProfile['email'],
// 					        'profileImage'=>$userProfile['avatar_image'],
							'userName'=>$userProfile['name'] .' ' . $userProfile['lname'],
							'userGroup'=>$userProfile['user-group'],
							'adminLoggedIn'=>true
					);
					$this->session->set_userdata($sessionData);
					redirect(base_url('/admin/users'));
				}	
			}
			else 
			{
				$this->message->setFlashMessage(Message::LOGIN_FAILURE);
			}
			
						
		}
				
		$this->template->title('Satan Administrator');
		
		$data = array();
		$data['loginURL'] = 'admin/login'; 
		
		$this->template->render('/auth/login', $data);
				
	}
}
