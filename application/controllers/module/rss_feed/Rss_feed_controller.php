<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rss_feed_controller extends Application
{
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->isLoggedIn()) { redirect($this->redirectToLogin()); }
		
		$this->load->model('rss_feed_subscription_model','rss');
	}
	
	public function index()
	{
		$response = array();
				
		# Check if user is logged in
		$userId=''; $email= $this->session->userdata('email');
		if($this->session->userdata('id')){ $userId = $this->session->userdata('id'); }
		else
		{
			# Since session is not set, now lets check if we have some user with the email provided
			
			$this->load->model('user');
			$result = $this->user->getByEmail($email); 
			
			if(!empty($result)) {$userId = $result->{User::_ID};}
		} 
			
		
		
		$lastId = $this->rss->create_rss_feed_subscription($userId, $this->input->post('item-id'), $this->input->post('item-type'), $email);
		
		if($lastId) $this->message->setFlashMessage(Message::RSS_SUBSCRIPTION_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::RSS_SUBSCRIPTION_FAILURE);
		
		if($this->input->post('referrer'))
		{
			$redirectURL = strstr($this->input->post('referrer'), '/satan');
			# Remove base directory and index.php
			$redirectURL = str_replace('/satan/', '', $redirectURL);
			redirect(base_url($redirectURL));
		}
		
		redirect('home');
		
	}
	
	public function unsubscribe_rss_feed_list()
	{
		$flag = $this->rss->unsubscribe_rss_feed_list($this->session->userdata('id'), $this->input->post('id'));
		
		if($flag) $this->message->setFlashMessage(Message::RSS_UNSUBSCRIPTION_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::RSS_UNSUBSCRIPTION_FAILURE);
		
		redirect('profile');
	}
}
