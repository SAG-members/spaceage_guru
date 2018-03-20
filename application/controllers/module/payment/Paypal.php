<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Paypal extends Application
{
	public function __construct()
	{
		parent::__construct(); 
		
		$redirectURL = $this->input->post('redirect-url');
		if(!$this->isLoggedIn()) { redirect($this->redirectToLogin($redirectURL)); }
		
		$this->load->library('paypal/paypal_lib');
	}
	
	public function success()
	{		
		# First step is to get custom value, this will let us now whether it is PSSS or membership
		
	    pre($this->input->post());
	    /*
		$paypalInfo = $this->input->post();
		
		$data['item_number']	= $paypalInfo["item_number"];
		$data['txn_id'] = $paypalInfo['txn_id'];
		$data['payment_gross'] = $paypalInfo["payment_gross"];
		$data['item_name'] = $paypalInfo["item_name"];
		$data['mc_gross'] = $paypalInfo["mc_gross"];
		$data['currency_code'] = $paypalInfo["mc_currency"];
		$data['category'] = $paypalInfo['custom'];
		$data['payer_email'] = $paypalInfo["payer_email"];
		
		if($paypalInfo['custom'] == 1 || $paypalInfo['custom'] == 2 || $paypalInfo['custom'] == 8 || $paypalInfo['custom'] == 5)
		{
			# PSSS Block
			
			# Load PSSS purchase history modal
			
			$this->load->model('psss_purchase_history','psss');
			
			$this->psss->create_purchase_history($data['txn_id'], $this->session->userdata('id'), $data['item_number'], $data['item_name'], $data['category'], $data['mc_gross'], $data['currency_code'], $data['payer_email']);
// 			echo $this->db->last_query(); die;
			$this->message->setFlashMessage(Message::PAYMENT_SUCCESS, array('id'=>'1'));
			
			redirect('home');
				
		}
		else 
		{							
			$data['subscription_type'] = $paypalInfo["option_name1"];
			
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
			
			
			$this->subscription->create_subscription($data['txn_id'], $this->session->userdata('id'), $data['item_number'], $data['item_name'], $data['category'], $data['mc_gross'], $data['currency_code'], $data['payer_email'], $date, $expiry);
			$this->message->setFlashMessage(Message::PAYMENT_SUCCESS, array('id'=>'1'));

			redirect('home');
		}
		*/
						
	}
	
	public function cancel()
	{
		$this->message->setFlashMessage(Message::PAYMENT_FAILURE);
		redirect('home');
	}
	
	public function ipn_transaction()
	{
		
	}
}
