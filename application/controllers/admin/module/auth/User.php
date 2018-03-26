<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Application {
	
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->isLoggedIn())
		{
			redirect(base_url('admin/login'));
		}
	}
	
	public function index()
	{
		$this->template->setLayout('templates/logged_in_template');
		$this->template->title('List Users');
		
		$this->template->render('module/auth/user');
		
	}
		
}
