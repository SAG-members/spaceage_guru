<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_controller extends Application 
{
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->isLoggedIn()) { redirect($this->redirectToLogin()); }
		
		# Load Model Membership
		$this->load->model('membership_model','membership');
		$this->load->model('user');
	}
	
	public function index()
	{	
		$this->template->title("Shop");
		
		# Load user model
		$this->load->model('user');
		
		$result = $this->user->getUserProfile($this->session->userdata('id')); 
				
		$data['shop'] = $this->membership->get_shop_products($result->{User::_USER_MEMBERSHIP_LEVEL});
		
		$this->template->render('services/shop', $data);
	}
	
	
}
