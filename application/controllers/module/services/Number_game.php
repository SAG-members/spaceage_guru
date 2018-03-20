<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Number_game extends Application 
{
	public function __construct()
	{
		parent::__construct();
		if(!$this->isLoggedIn()) { redirect($this->redirectToLogin()); }
	}
	
	public function index()
	{	
		$this->template->title('Number Game');
						
		$this->template->render('services/number_game');
	}
}
