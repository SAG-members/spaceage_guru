<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		
		# Set Template
		$this->template->setTemplate('public_default_template');
	} 
	
	public function index()
	{
		if ($this->session->has_userdata('adminLoggedIn'))
		{
			# Load user model and update logged in status
			$this->load->model('admin/user');
			$this->user->sign_out($this->session->userdata('id'));
			
			$this->session->unset_userdata('adminLoggedIn','email','userName','userGroup','id');
			$this->session->sess_destroy();
			
			$this->message->setFlashMessage(Message::LOGOUT_SUCCESS, array('id'=>'1'));
			redirect(base_url('/admin/login'));
			
		}		
				
	}
}
