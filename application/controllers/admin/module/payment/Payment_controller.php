<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_controller extends Application
{
	public function __construct()
	{
		parent::__construct(); 
		
		$redirectURL = $this->input->post('redirect-url');
		if(!$this->isLoggedIn()) { redirect($this->redirectToLogin($redirectURL)); }
		
	}
	
	public function index()
	{
		$data = array();
		
		$this->template->title('Paypal Settings');
		$this->template->render('payment/paypal_setting', $data);
	}
	
}
