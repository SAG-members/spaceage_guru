<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon_controller extends Application 
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('admin/coupon_model','coupon');
		$this->load->model('admin/page','page');
	}

	public function index()
	{
		$data['coupons'] = $this->coupon->get_coupons();
		
		$this->template->title('Manage Coupons');
		$this->template->render('coupon/manage_coupon', $data);
	}
	
	public function create_new_coupon()
	{ 
		# Get List of Coupons From Database First
		$userId = $this->session->userdata('id');
		$couponCode = $this->input->post('coupon-code');
		$couponType = $this->input->post('coupon-type');
		$membershipType = $this->input->post('membership-type');
		$time = intval($this->input->post('validity'));
		$clubCredit = $this->input->post('club-credits');
		
		$lastId = $this->coupon->create_new_coupon($userId, $couponCode, $couponType, $membershipType, $time, $clubCredit);
		
		if($lastId)$this->message->setFlashMessage(Message::COUPON_CREATE_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::COUPON_CREATE_FAILURE);
		
		redirect(base_url('admin/coupons'));
	}
	
	public function update_coupon_code()
	{
		# Get List of Coupons From Database First
		$couponId = $this->input->post('coupon-id');
		$couponCode = $this->input->post('coupon-code');
		$couponType = $this->input->post('coupon-type');
		$membershipType = $this->input->post('membership-type');
		$time = intval($this->input->post('validity'));
		$clubCredit = $this->input->post('club-credits');
		
		$lastId = $this->coupon->update_coupon($couponId, $couponCode, $couponType, $membershipType, $time, $clubCredit);
		
		if($lastId)$this->message->setFlashMessage(Message::COUPON_UPDATE_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::COUPON_UPDATE_FAILURE);
		
		redirect(base_url('admin/coupons'));
	}
	
// 	public function publish_coupon()
// 	{
// 		$postIds = $this->input->post('country-ids');
		
// 		$result = $this->country->publish_contries($postIds);
		
// 		if($result)$this->message->setFlashMessage(Message::COUNTRY_PUBLISH_SUCCESS, array('id'=>'1'));
// 		else $this->message->setFlashMessage(Message::COUNTRY_PUBLISH_FAILURE);
		
// 		redirect('admin/countries');
// 	}
	
// 	public function unpublish_counpon()
// 	{
// 		$postIds = $this->input->post('country-ids'); 
				
// 		$result = $this->country->unpublish_countries($postIds);
		
// 		if($result)$this->message->setFlashMessage(Message::COUNTRY_UNPUBLISH_SUCCESS, array('id'=>'1'));
// 		else $this->message->setFlashMessage(Message::COUNTRY_UNPUBLISH_FAILURE);
		
// 		redirect('admin/countries');
// 	}
	
	public function delete_coupon_code()
	{
	    $couponId = $this->uri->segment(4);
	    
	    if(!empty($couponId))
	    {
	        $result = $this->coupon->delete_coupon($couponId);
	        
	        if($result)$this->message->setFlashMessage(Message::COUPON_DELETE_SUCCESS, array('id'=>'1'));
	        else $this->message->setFlashMessage(Message::COUPON_DELETE_FAILURE);
	    }
	    else 
	    {
	        $this->message->setFlashMessage(Message::USER_SUBSCRIPTION_FAILURE, array('id'=>'1'));
	    }
	    
	    redirect(base_url('admin/coupons'));
	}
		
}
