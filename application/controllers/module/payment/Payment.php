<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends Application
{
    const _SUBSCRIPTION_TYPE_PAID = 'paid';
    const _SUBSCRIPTION_TYPE_COUPON = 'coupon';
    
	public function __construct()
	{
		parent::__construct(); 
		
		$redirectURL = $this->input->post('redirect-url');
		if(!$this->isLoggedIn()) { redirect($this->redirectToLogin($redirectURL)); }
		
		$this->load->library('paypal/paypal_lib');
	}
	
	public function index()
	{
		$params = $this->input->post();
		
		switch ($params['mode'])
		{
			case "paypal" : $this->process_paypal_payment($params);
		}
	}
	
	public function process_paypal_payment($params)
	{
		# First step is to decide what are we processing
		
		# 1. Memberships # 2. PSSS # 3. Escrow 
		
		# Let's consider first that we are processing membership and then we will foucs on PSSS
		
		/* This block will process the membership payments */
	     
		$amount = $params['price'];
		$custom = $params['category_id'];
		
		if((int)$params['category_id'] == 3)
		{
			# Get Data Based on item-id from membership table
			$this->load->model('membership_model','membership');
			
			$result = $this->membership->get_membership_by_id($params['item_id']);
			
			switch ($params['subscription_type'])
			{
				case 1: $amount = $result->{Membership_model::_MEMBERSHIP_MONTHLY_PRICE}; break;
				case 2: $amount = $result->{Membership_model::_MEMBERSHIP_YEARLY_PRICE}; break;
			}
			
			$custom .= ":".$params['subscription_type'];
		}
				
		$returnURL = base_url('payment/success'); //payment success url
		$cancelURL = base_url('payment/cancel'); //payment cancel url
		$notifyURL = base_url('payment/ipn'); // ipn url

		$this->paypal_lib->add_field('return', $returnURL);
		$this->paypal_lib->add_field('cancel_return', $cancelURL);
		$this->paypal_lib->add_field('notify_url', $notifyURL);
		$this->paypal_lib->add_field('item_name', $params['item_name']);
		$this->paypal_lib->add_field('item_number',  $params['item_id']);
		$this->paypal_lib->add_field('custom',  $custom);
		$this->paypal_lib->add_field('amount',  $amount);
		$this->paypal_lib->add_field('quantity', '1');
		$this->paypal_lib->image(base_url('assets/img/logo.png'));

		$this->paypal_lib->paypal_auto_form();
		
	}
	
	public function success()
	{
	    # First step is to get custom value, this will let us now whether it is PSSS or membership
	        
	     $paypalInfo = $this->input->post();
	     
	     $data['txn_id'] = $paypalInfo['tx'];
	     $data['status'] = $paypalInfo['st'];
	     $data['payment_gross'] = $paypalInfo["amt"];
	     $data['mc_gross'] = $paypalInfo["amt"];
	     $data['currency_code'] = $paypalInfo["cc"];
	     $data['item_number']	= $paypalInfo["item_number"];
	     $data['item_name'] = $paypalInfo["item_name"];
	     $data['payer_email'] = '';
	     
	     $type = explode(':', $paypalInfo['cm']);
	     
	     $data['subscription_type'] = $type[1];
	     $data['category'] = $type[0];
	     
	     if((int)$type[0] === 3) $this->membership_purchase_process($data);
	     else $this->data_purchase_process($data);
	     
	}
	
	public function cancel()
	{
	    $this->message->setFlashMessage(Message::PAYMENT_FAILURE);
	    
	    redirect('profile');
	}
	
	public function ipn()
	{
	    
	}
	
	public function membership_purchase_process($data)
	{	        
	    # Payment Verified Now Update Database
	    
	    $this->load->model('user_subscription','subscription');
	    $this->load->model('membership_model','membership');
	    $this->load->model('page');
	    $this->load->model('user');
	    
	    # First Step is to get subscription amount and calculate subscription expiry
	    
	    $result = $this->membership->get_membership_by_id($data['item_number']);
	    
	    $date = new DateTime();
	    $date = $date->format('Y-m-d H:i:s');
	    
	    $expiry = new DateTime();
	    
	    switch ($data['subscription_type'])
	    {
	        case 1: $expiry = $expiry->add(new DateInterval('P1M')); $expiry = $expiry->format('Y-m-d H:i:s');break;
	        case 2: $expiry = $expiry->add(new DateInterval('P1Y')); $expiry = $expiry->format('Y-m-d H:i:s');break;
	    }
	    
	    if($result->{Membership_model::_MEMBERSHIP_TYPE} == 7)
	    {
	        $expiry = new DateTime();
	        
	        $expiry = $expiry->add(new DateInterval('P1Y'));
	        $expiry = $expiry->format('Y-m-d H:i:s');
	    }
	    else
	    {
	        # Update new membership for user
	        
	        $this->user->update_user_membership($this->session->userdata('id'), $result->{Membership_model::_MEMBERSHIP_TYPE});
	        
	        # Update UserGroup In Session
	        $this->session->set_userdata('membershipLevel',$result->{Membership_model::_MEMBERSHIP_TYPE});
	    }
	    	    
	    $this->subscription->create_subscription($data['txn_id'], $this->session->userdata('id'), $data['item_number'], $data['item_name'], $data['category'], $data['mc_gross'], $data['currency_code'], $data['payer_email'], $date, $expiry, 'Paypal', static::_SUBSCRIPTION_TYPE_PAID);
	    $this->message->setFlashMessage(Message::PAYMENT_SUCCESS, array('id'=>'1'));
	    
	    redirect('profile');
	}
	
	public function data_purchase_process($data)
	{
	    # PSSS Block
	    
	    # Load PSSS purchase history modal
	    
	    $this->load->model('psss_purchase_history','psss');
	    
	    $this->psss->create_purchase_history($data['txn_id'], $this->session->userdata('id'), $data['item_number'], $data['item_name'], $data['category'], $data['mc_gross'], $data['currency_code'], $data['payer_email'], 'Paypal');	    			
	    $this->message->setFlashMessage(Message::PAYMENT_SUCCESS, array('id'=>'1'));
	    
	    redirect('profile');
	}
	
}
