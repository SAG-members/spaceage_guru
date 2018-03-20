<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_password_controller extends Base 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('reset_password_model','resetPassword');
	}	
					
	public function index()
	{
		
		$hash = $this->uri->segment(2);
				
		$result = $this->resetPassword->reset_password($hash);
		
		if(empty($result))
		{
			$this->message->setFlashMessage(Message::PASSWORD_CHANGE_ERROR);
			redirect('login');
		}
		elseif ($result->{Reset_password_model::_STATUS})
		{
			$this->message->setFlashMessage(Message::PASSWORD_CHANGE_LINK_FAILURE);
			redirect('login');
		}
		else 
		{
			$data = array();
						
			$data['userId'] = $result->{Reset_password_model::_USER_ID};
			# Present user with a view For Resetting Password
			$this->template->render('auth/reset_password', $data);
		}
		
	}
	
	public function update_password()
	{
		$this->load->model('user','u');
	
		# Get User Id and Password from post
	
		$userId = $this->input->post('user-id');
		$password = $this->input->post('password');
		$cpassword = $this->input->post('cpassword');
		$hash = $this->input->post('redirect-url');
	
		$hash = explode('/', $hash);
		$hash = end($hash);

		$redirectURL = strstr($this->input->post('redirect-url'), '/satan');
		# Remove base directory and index.php
		$redirectURL = str_replace('/satan/', '', $redirectURL);

		if($password != $cpassword)
		{
			$this->message->setFlashMessage(Message::PASSWORD_CONFIRM_PASSWORD_MATCH_FAILURE);
			redirect($redirectURL);
		}

		$flag = $this->u->update_user_password($userId, $password); 
		if($flag)
		{
			$this->resetPassword->update_hash_status($hash);
			$this->message->setFlashMessage(Message::PASSWORD_CHANGE_SUCCESS, array('id'=>1));
		}
		else $this->message->setFlashMessage(Message::PASSWORD_CHANGE_FAILURE);

		redirect('login');
	}
	
}
