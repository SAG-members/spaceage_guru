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
				
		
		if($this->session->userdata('id'))
		{
		    # Load page model
		    
		    $this->load->model('page');
		    $pageTitle = $this->page->get_by_id($this->input->post('item-id'), Page::_PAGE_TITLE);
		    		    
		    $userId = $this->session->userdata('id');
		    
		    # Go to cometchat_chatrooms table and get chatroom id based on the name of group
		    		    
		    $this->db->select('id, invitedusers');
		    $this->db->from('cometchat_chatrooms');
		    $this->db->like('name', $pageTitle);
		    $query = $this->db->get()->row();
		     
		    $this->db->last_query();
		    $chatRoomId = $query->id;
		    
		    # Now Set the current user in cometchat_chatrooms_user table
		    # Load cometchat_engine
		    
		    $userArr = json_encode(array($userId));
		    
		    $this->load->library('cometchat_engine');
		    $this->cometchat_engine->add_user_to_group($chatRoomId, $userArr);
		    
		    $users = $query->invitedusers;
		    
		    if(empty($users))
		    {
		        $users = $this->session->userdata('id');
		    }
		    else
		    {
		        $users = $users+","+$this->session->userdata('item-id');
		    }
		    		    
		    # Fix the invited users column
		    
		    $data = array('invitedusers'=>$users);
		    
		    $this->db->where('id', $chatRoomId);
		    $this->db->update('cometchat_chatrooms', $data);
		    
		    
		}
				
		if($lastId) $this->message->setFlashMessage(Message::RSS_SUBSCRIPTION_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::RSS_SUBSCRIPTION_FAILURE);
		
		redirect('profile');
		
		
// 		if($this->input->post('referrer'))
// 		{
// 			$redirectURL = strstr($this->input->post('referrer'), '/satan');
// 			# Remove base directory and index.php
// 			$redirectURL = str_replace('/satan/', '', $redirectURL);
// 			redirect(base_url($redirectURL));
// 		}
		
// 		redirect('home');
		
	}
	
	public function unsubscribe_rss_feed_list()
	{
		$flag = $this->rss->unsubscribe_rss_feed_list($this->session->userdata('id'), $this->input->post('id'));
		
		if($flag) $this->message->setFlashMessage(Message::RSS_UNSUBSCRIPTION_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::RSS_UNSUBSCRIPTION_FAILURE);
		
		redirect('profile');
	}
}
