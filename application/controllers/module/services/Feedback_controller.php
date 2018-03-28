<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_controller extends Base 
{
	public function __construct()
	{
		parent::__construct();
// 		if(!$this->isLoggedIn()) { redirect($this->redirectToLogin()); }
		
		$this->load->model('feedback');
	}
		
	public function index()
	{	
		if($this->input->post('email') && $this->input->post('comment'))
		{
			$email = $this->input->post('email');
			$website = $this->input->post('website');
			$comment = $this->input->post('comment');
			$response = $this->input->post('response') ? 1 : 0;
			$lastId = $this->feedback->create_feedback($email, $website, $response, $comment);
			
			if($lastId) $this->message->setFlashMessage(Message::FEEDBACK_CREATE_SUCCESS, array('id'=>'1'));
			else $this->message->setFlashMessage(Message::FEEDBACK_CREATE_FAILURE); 
		}		
		
		$this->template->title("Feedback");
		$this->template->render('services/feedback'); 
	}
		
	
	public function timeline()
	{
	    $data = array();
	    
	    if($this->session->userdata('id'))
	    {
	        $userId = $this->session->userdata('id');
	        
	        # Load page model
	        $this->load->model('page');
	        
	        # Load user event model
	        $this->load->model('user_event_model', 'uem');
	        
	        # Load user event status model
	        $this->load->model('user_event_status_model', 'uesm');
	        
	        # Get Created offers
	        $data['createdOffer'] = $this->uem->get_by_user($userId);
	        
	        # Get Incomplete Offers
	        $data['incompleteOffers'] = $this->uem->get_incomplete_offers($userId);
	        
	        # Get Declined Offers
	        $data['declinedOffers'] = $this->uesm->get_by_user_and_status($userId, User_event_status_model::STATUS_DECLINE);
	        
	        # Get offers recommended to friends
	        
	        
	        # Get Smart contract offers
	        
	        # Get completed offers
	        $data['completedOffers'] = $this->uem->get_completed_offers($userId);
	    }
	    	    
	    $this->template->title("Timeline");
	    $this->template->render('services/timeline', $data);
	}
	
	
}
