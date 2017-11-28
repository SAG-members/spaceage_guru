<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Application {
	
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->isLoggedIn()) { $this->redirectToLogin();}
	}
	
	public function index()
	{				
		$this->template->title('Welcome | Satan Administrator');
		
		$this->template->render('auth/home');
		
	}
	
// 	public function profile()
// 	{
// 		$this->template->setLayout('templates/logged_in_template');
// 		$this->template->title('Welcom | Satan Administrator');
		
// 		$this->template->render('module/auth/profile');
// 	}
}
