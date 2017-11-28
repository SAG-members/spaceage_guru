<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Application 
{
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->isLoggedIn()) { redirect($this->redirectToLogin()); }
	}	
					
	public function index()
	{
		$this->template->title("Welcome Home");
		
		$this->template->render('auth/home');
		
	}
	
}
