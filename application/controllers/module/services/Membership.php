<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Membership extends Base 
{
	public function __construct()
	{
		parent::__construct();
		
	}
		
	public function user_membership_one_euro()
	{	
		$this->template->title("Membership 1 Euro");
		
		# Load Page model
		$this->load->model('page');
		$response = $this->page->getProductById(16);
		$this->template->render('services/membership_100_euro', $response);
	}
	
	public function membership_ten_euro()
	{
		$this->template->title("Membership 10 Euro");
				
		# Load Page model
		$this->load->model('page');
		$response = $this->page->getProductById(17);
		$this->template->render('services/membership_100_euro', $response);
	}
	
	public function user_membership_hundered_euro()
	{
		$this->template->title("Membership 100 Euro");
		
		# Load Page model
		$this->load->model('page');
		$response = $this->page->getProductById(5);
		$this->template->render('services/membership_100_euro', $response);
	}

	public function user_payment()
	{
		$data = array();
		
// 		$this->template->title("User Payment Method");

// 		$get_all_post = $this->input->post();
// 		//echo "<pre>";
// 		//print_r($get_all_post); die;
// 		if($this->input->post('btn-pay'))
// 		{	
// 			$data['price'] = $this->input->post('price');
// 			$data['item'] = $this->input->post('item');
			
// 			$paymethod = $this->input->post('payment-method');		
// 			if($paymethod=='1')
// 			{
// 				$this->template->render('services/paypal', $data);
// 			}			
// 		}
		
	}

	public function thanku()
	{
		$this->template->title("Payment Successfull Completed.");
		$this->template->render('services/thanku');
	}
	
}
