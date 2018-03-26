<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reminder_service extends Application 
{
	public function __construct()
	{
		parent::__construct();
		if(!$this->isLoggedIn()) { redirect($this->redirectToLogin()); }
		
		$this->load->library('paypal/paypal_lib');
	}
	
	public function index()
	{	
		$this->template->title("Reminder Service");
			
		$slug = $this->uri->segment(1);
		
		$this->load->model('membership_model','membership');
		$data['membership'] = $this->membership->get_membership_by_slug($slug);
		$this->template->title($data['membership']->{Membership_model::_MEMBERSHIP_TITLE_SLUG});
		$this->template->render('services/reminder_service', $data);
		
	}
	
	public function registered_user()
	{
		$this->template->title("Reminder Service");
			
		$slug = $this->uri->segment(2);
		
		$this->load->model('membership_model','membership');
		$data['membership'] = $this->membership->get_membership_by_slug($slug);
		$this->template->title($data['membership']->{Membership_model::_MEMBERSHIP_TITLE_SLUG});
		$this->template->render('services/reminder_service', $data);
	}
	
	public function remainder_service_payment()
	{
		$productData = json_decode($this->input->post('inputs'), true);
			
		$returnURL = base_url('remainder-service/success'); //payment success url
		$cancelURL = base_url('remainder-service/cancel'); //payment cancel url
		$notifyURL = base_url('remainder-service/ipn'); //ipn url
		
		$logo = base_url('assets/img/logo.png');
		
		$this->paypal_lib->add_field('return', $returnURL);
		$this->paypal_lib->add_field('cancel_return', $cancelURL);
		$this->paypal_lib->add_field('notify_url', $notifyURL);
		$this->paypal_lib->add_field('item_name', $productData[0]['item-name']);
		$this->paypal_lib->add_field('item_number',  $productData[0]['item']);
		$this->paypal_lib->add_field('custom',  $productData[0]['membership-type']);
		$this->paypal_lib->add_field('amount',  $productData[0]['price']);
		
		$this->paypal_lib->image($logo);
		
		$this->paypal_lib->paypal_auto_form();
	}
	
	public function remainder_service_success()
	{
		# Check If PDT Response
		if($this->input->get())
		{
			$paypalInfo = $this->input->get();
				
			$data['item_number'] = $paypalInfo['item_number'];
			$data['txn_id'] = $paypalInfo["tx"];
			$data['payment_amt'] = $paypalInfo["amt"];
			$data['currency_code'] = $paypalInfo["cc"];
			$data['membership_type'] = $paypalInfo["custom"];
			$data['status'] = $paypalInfo["st"];
		}
		
		# Check If IPN Response
		if($this->input->post())
		{
			$paypalInfo	= $this->input->post();
				
			$data['item_number']	= $paypalInfo["item_number"];
			$data['txn_id'] = $paypalInfo['txn_id'];
			$data['payment_gross'] = $paypalInfo["payment_gross"];
			$data['item_name'] = $paypalInfo["item_name"];
			$data['mc_gross'] = $paypalInfo["mc_gross"];
			$data['currency_code'] = $paypalInfo["mc_currency"];
			$data['membership_type'] = $paypalInfo["custom"];
			$data['payer_email'] = $paypalInfo["payer_email"];
								
					# Payment Verified Now Update Database
			$this->load->model('user_subscription','subscription');
			$this->load->model('page');
			$this->load->model('user');
			
			$date = new DateTime();
			$date = $date->format('Y-m-d H:i:s');
			
			$expiry = new DateTime();
			
			$expiry = $expiry->add(new DateInterval('P1Y'));
			$expiry = $expiry->format('Y-m-d H:i:s');
						
			# Update new membership for user
			if($data['membership_type'] !=0){$this->user->update_user_membership($this->session->userdata('id'), $data['membership_type']);}
	
			$response = $this->page->getProductById($data['item_number']);
			$this->subscription->create_subscription($data['txn_id'], $this->session->userdata('id'), $data['item_number'], $data['item_name'], $response['category'], $data['mc_gross'], $data['currency_code'], $data['payer_email'], $date, $expiry);
		
			$this->message->setFlashMessage(Message::PAYMENT_SUCCESS, array('id'=>'1'));
			
			redirect(base_url('home'));
	
		}
		
	}
	
	public function remainder_service_cancel()
	{
	
	}
	
	public function remainder_service_ipn()
	{
	
	}
}
