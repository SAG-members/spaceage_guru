<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password_controller extends Application 
{

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		if($this->input->post('password') && $this->input->post('cpassword'))
		{
			$flag = false;
			
			$password = $this->input->post('password');
			$cpassword = $this->input->post('cpassword');

			if($password != $cpassword)
			{
				$this->message->setFlashMessage(Message::PASSWORD_CONFIRM_PASSWORD_MATCH_FAILURE);
				redirect('admin/change-password');
			}
			
			# Load user module to change the password
			
			$this->load->model('admin/user','user');
			
			$flag = $this->user->update_password($this->session->userdata('id'), $password);
			
			if($flag)$this->message->setFlashMessage(Message::PASSWORD_UPDATE_SUCCESS, array('id'=>1));
			else $this->message->setFlashMessage(Message::PASSWORD_UPDATE_FAILURE);
			
			redirect('admin/change-password');
		}
			
		
		$this->template->title('Change Password');
		$this->template->render('/auth/change_password');
	}
}
