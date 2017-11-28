<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Recover_password extends Base 
{
	public function __construct()
	{
		parent::__construct();
	}	
					
	public function index()
	{
		$email = $this->input->post('email');
		
		# Get user based on email
		
		$this->load->model('user');
		$this->user->getByEmail($email);
				
		
		$this->template->title("Welcome Home");
		
		$this->template->render('auth/home');
		
	}
	
}
