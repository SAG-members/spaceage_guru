<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_controller extends Application {
	
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->isLoggedIn()) { $this->redirectToLogin();}
		
		# Load user modal
		$this->load->model('page');
		$this->load->model('page_submodility','submoditlity');
		$this->load->model('country');
		$this->load->model('data_document_model','data_document');
		$this->load->model('page_like_dislike_model','pld');
	}
			
	public function get_data()
	{
		$data = array();
		$slug = $this->uri->segment(3);
		
		# Get User Group
		$membershipLevel = $this->session->userdata('membershipLevel');
		
		$response['page'] = $this->page->get_by_slug($slug);
		$response['submodilities'] = $this->submoditlity->get_submodility_by_page_id($response['page']->{Page::_ID});
		$response['files'] = $this->data_document->get_data_document($response['page']->{Page::_ID});
		$response['like_dislike'] = $this->pld->get_count_like_dislike($response['page']->{Page::_ID});
		
		$userId = $this->session->userdata('id');
		$postId = $response['page']->{Page::_ID};
		
		# Load page specified user assignment
		$this->load->model('page_specified_user_assignment_model', 'specific_user');
		$count = $this->specific_user->check_post_status($postId, $userId);
		
		# Check if page visibility is 7
		
		if($response['page']->{Page::_VISIBILITY} > $membershipLevel){
		  $response['error'] = true;
		}
				
		if($response['page']->{Page::_VISIBILITY} == Page::VISIBILITY_SPECIFIED_USER && $count > 0){
		    $response['error'] = false;        
		}
// 		pre($response); die;
		$response['metaTitle'] = $response['page']->{Page::_META_TITLE};
		$response['metaKeywords'] = $response['page']->{Page::_META_KEYWORD};
		$response['metaDescription'] = strip_tags($response['page']->{Page::_META_DESCRIPTION});
		
		# Set Additional Script
		$additionalScripts = array('plugin/jquery_toastmessage/jquery.toastmessage.js');
		$additionalStyles = array('jquery_toastmessage/jquery.toastmessage.css');
		
		$this->template->setAdditionalScript($additionalScripts);
		$this->template->setAdditionalStyle($additionalStyles);
		
		$this->template->title($response['page']->{Page::_PAGE_TITLE});
		$this->template->render('page', $response);
	}
	
	public function yield_offer()
	{
	    $data = array();
	    $eventCommentId = $this->input->post('id');
	    $userId = $this->session->userdata('id');
	    
	    if(empty($eventCommentId) && empty($userId))
	    {
	        $this->message->setFlashMessage(Message::LOGIN_REQUIRED);
	        redirect(base_url('login'));
	    }
	    
	    # Load user_library_event_comment_id
	    $this->load->model('library_event_comment_model', 'comment_model');
	    $eventCommentDetails = $this->comment_model->get_by_id($eventCommentId);
	    
	    $eventId = $eventCommentDetails->{Library_event_comment_model::_EVENT_ID};
	    
	    # Load user_library_event model
	    $this->load->model('library_event_model', 'event_model');
	    $eventDetails = $this->event_model->getLibraryEventById($eventId);
	    
	    $eventDataId = $eventDetails->{Library_event_model::_EVENT_DATA_ID};
	    	    
	    # Load page model
	    $this->load->model('page');
	    $dataDetails = $this->page->get_by_id($eventDataId);
	    
	    $sellerId = $dataDetails->{Page::_USER_ID};
	    $buyerId = $this->session->userdata('id'); 
	    
	    $this->load->model('user_library_event_escrow_model', 'escrow');
	    $lastId = $this->escrow->yield_offer($eventCommentId, $eventId, $eventDetails->user_id, $buyerId);

        if($lastId) {$this->message->setFlashMessage(Message::OFFER_YIELD_SUCCESS, array('id'=>'1'));}
        else {$this->message->setFlashMessage(Message::OFFER_YIELD_FAILURE);}

        # Now once the offer has been yielded, it should automatically reach the create escrow page
        # Set the data-id in session to be used in the escrow page

        $this->session->set_userdata('escrow_id', $eventCommentId);

        redirect(base_url('escrow/create/'.$lastId));		
	    

	}
	
	public function decline_offer()
	{
	    $data = array();
	    
	    /*
	    if($this->input->post('escrow_id'))
	    {
	        $this->load->model('user_library_event_escrow_model', 'escrow');
	        
	        $lastId = $this->escrow->decline_offer_by_id($this->input->post('escrow_id'));
	        echo $this->db->last_query();
	        if($lastId) {$this->message->setFlashMessage(Message::OFFER_DECLINE_SUCCESS, array('id'=>'1'));}
	        else {$this->message->setFlashMessage(Message::OFFER_DECLINE_FAILURE);}
	    }
	    else 
	    {
	        $eventCommentId = $this->input->post('id');
	        $userId = $this->session->userdata('id');
	        
	        if(empty($eventCommentId) && empty($userId))
	        {
	            $this->message->setFlashMessage(Message::LOGIN_REQUIRED);
	            redirect(base_url('login'));
	        }
	        
	        # Load event comment model to get event id
	        $this->load->model('library_event_comment_model', 'comment');
	        $commentData = $this->comment->get_by_id($eventCommentId);
	        
	        $eventId = $commentData->event_id;
	        
	        # Load event model to get event data id
	        $this->load->model('library_event_model', 'event');
	        $eventData = $this->event->getLibraryEventById($eventId);
	        
	        $eventDataId = $eventData->event_data_id;
	        
	        # Load page model to get seller id
	        $this->load->model('page');
	        $pageData = $this->page->get_by_id($eventDataId);
	        
	        $sellerId = $pageData->user_id;
	        
	        $this->load->model('user_library_event_escrow_model', 'escrow');
	        $lastId = $this->escrow->decline_offer($eventCommentId, $eventId, $sellerId, $userId);
	        
	        if($lastId) {$this->message->setFlashMessage(Message::OFFER_DECLINE_SUCCESS, array('id'=>'1'));}
	        else {$this->message->setFlashMessage(Message::OFFER_DECLINE_FAILURE);}
	    }
	    */
	    
	    # Update new logic for declining offer
	    
	    $eventId = $this->input->post('event_id');
	    
	    # Load user event model
	    $this->load->model('user_event_model', 'uem');
	    
	    # Load user event status model
	    $this->load->model('user_event_status_model', 'uesm');
	    
	    # Load user event escrow model
	    $this->load->model('user_event_escrow_model', 'ueem');
	    
	    # Get event data
	    $eventData = $this->uem->get_by_id($eventId);
	    
	    # Update status of event
	    $data = array(User_event_status_model::_STATUS => User_event_status_model::STATUS_DECLINE);
	    $criteria = array(User_event_status_model::_EVENT_ID => $eventId);
	    
	    $this->uesm->update_by_criteria($data, $criteria);
	    
	    # Get event escrow data
	    
	    $criteria = array(User_event_escrow_model::_EVENT_ID => $eventId);
	    $escrowData = $this->ueem->get_by_criteria($criteria); 
	    
	    if(!empty($escrowData))
	    {
	       $escrowId = $escrowData[0]->id;    
	       
	       # Update status of escrow
	       $data = array(User_event_escrow_model::_STATUS => User_event_escrow_model::DECLINE_OFFER);
	       $criteria = array(User_event_model::_ID => $escrowId);
	       
	       $this->ueem->update_by_criteria($data, $criteria);
	    }
	    
        redirect(base_url('e-business'));
	}
	
	public function save_offer()
	{
	    $escrow = json_decode($this->input->post('escrow'), true);
	    
	    if(empty($escrow))
	    {
	        $this->message->setFlashMessage(Message::GENERAL_ERROR);
	        redirect(base_url('profile'));
	    }
	    
	    # Load model	    
	    $this->load->model('user_library_event_escrow_model', 'escrow');	    
	    $result = $this->escrow->save_offer($escrow['escrow_id'], $escrow['escrow_notes'], $escrow['payment_from'], $escrow['delivery_method'], $escrow['payment_when'], $escrow['escrow_address'], $escrow['escrow_date_time'], $escrow['escrow_price'], $this->session->userdata('id'));
	    
	    if($result) {$this->message->setFlashMessage(Message::OFFER_SAVED_SUCCESS, array('id'=>'1'));}
	    else {$this->message->setFlashMessage(Message::OFFER_SAVED_FAILURE);}
	    
	    redirect(base_url('escrow'));
	}
	
	
	public function escrow_offer()
	{
	    $escrow = json_decode($this->input->post('escrow'), true);
	       
	    if(empty($escrow))
	    {
	        $this->message->setFlashMessage(Message::GENERAL_ERROR);
	        redirect(base_url('profile'));
	    }
	    
	    $dateTime = new DateTime($escrow['escrow_date_time']);
	    $dateTime = $dateTime->format('Y-m-d H:i:s');
	    
	    # Load model
	    $this->load->model('user_library_event_escrow_model', 'escrow');
	    $result = $this->escrow->accept_offer($escrow['escrow_id'], $escrow['escrow_notes'], $escrow['payment_from'], $escrow['delivery_method'], $escrow['payment_when'], $escrow['escrow_address'], $dateTime, $escrow['escrow_price'], $this->session->userdata('id'));
	    
	    if($result) {$this->message->setFlashMessage(Message::OFFER_ACCEPT_SUCCESS, array('id'=>'1'));}
	    else {$this->message->setFlashMessage(Message::OFFER_ACCEPT_FAILURE);}
	    
	    redirect(base_url('escrow'));
	}
	
	
	public function approve_offer()
	{
	    $escrow = json_decode($this->input->post('escrow'), true);
	    
	    if(empty($escrow))
	    {
	        $this->message->setFlashMessage(Message::GENERAL_ERROR);
	        redirect(base_url('profile'));
	    }
	    
	    # Load model
	    $this->load->model('user_library_event_escrow_model', 'escrow');
	    $result = $this->escrow->approve_offer($escrow['escrow_id']);
	    
	    if($result) {$this->message->setFlashMessage(Message::OFFER_APPROVE_SUCCESS, array('id'=>'1'));}
	    else {$this->message->setFlashMessage(Message::OFFER_APPROVE_FAILURE);}
	    
	    redirect($_SERVER['HTTP_REFERER']);
	    	    
	}
	
	
	public function create_escrow_page()
	{
	    $response = array();
	    
	    $response['escrowDetails'] = '';
	    
	    # Now we have reached the escrow page
	    # Let us check if we have the escrow_id in the session or not
	    
	    $this->load->model('user_event_status_model', 'uesm');
	    $this->load->model('user_library_event_escrow_model', 'escrow');
	    $this->load->model('user_event_model','uem');
	    $this->load->model('page');
	    	    
	    if($this->uri->segment(3))
	    {
	        $eventId = $this->uri->segment(3);
	        $userId = $this->session->userdata('id');
	        	       
	        $response['eventData'] = $this->uem->get_by_id($eventId);
	        
	        $criteria = array(User_library_event_escrow_model::_EVENT_ID => $eventId, User_library_event_escrow_model::_ESCROW_BUYER_ID => $userId);
	        $result = $this->escrow->get_by_criteria($criteria);
	        $response['escrowId'] = $result[0]->{User_library_event_escrow_model::_ID};
	    }
	    	    
	    # Set Additional Script
	    $additionalScripts = array('plugin/jquery_toastmessage/jquery.toastmessage.js');
	    $additionalStyles = array('jquery_toastmessage/jquery.toastmessage.css');
	    
	    $this->template->setAdditionalScript($additionalScripts);
	    $this->template->setAdditionalStyle($additionalStyles);
	    
	    # Unset, session escrow_id so that user can't use this session again on coming directly back to the escrow create page
	    $this->session->unset_userdata('escrow_id');
	    
	    $this->template->title('Create Escrow');
	    $this->template->render('services/escrow_create_view', $response);
	    
	}
	
	public function view_escrow_page()
	{
		$response = array();
		
		$userId = $this->session->userdata('id');
		
		# Load page view to be used
		$this->load->model('User_library_event_escrow_model', 'escrow');
		
		# Load user event status model
		$this->load->model('user_event_status_model', 'uesm');
		
		# Load Library Event Model
		$this->load->model('user_event_model','uem');
		
		# Load page model
		$this->load->model('page');
		
		# Get Saved Escrow Data
		$criteria = '('.User_library_event_escrow_model::_ESCROW_BUYER_ID.' = '.$userId. ' OR '. User_library_event_escrow_model::_ESCROW_SELLER_ID. ' = '.$userId .') AND ' .User_library_event_escrow_model::_STATUS.' = '.User_library_event_escrow_model::YIELD_OFFER;
		$response['data']['yielded_escrow'] = $this->escrow->get_by_criteria($criteria);
				
		# Get Saved Escrow Data
		$criteria = '('.User_library_event_escrow_model::_ESCROW_BUYER_ID.' = '.$userId. ' OR '. User_library_event_escrow_model::_ESCROW_SELLER_ID. ' = '.$userId .') AND ' .User_library_event_escrow_model::_STATUS.' = '.User_library_event_escrow_model::SAVE_AND_EXIT;
		$response['data']['saved_escrow'] = $this->escrow->get_by_criteria($criteria);
		
		# Get Accepted Escrow Data
		$criteria = '('.User_library_event_escrow_model::_ESCROW_BUYER_ID.' = '.$userId. ' OR '. User_library_event_escrow_model::_ESCROW_SELLER_ID. ' = '.$userId . ') AND ' .User_library_event_escrow_model::_STATUS.' = '.User_library_event_escrow_model::ACCEPT_OFFER;
		$response['data']['accepted_escrow'] = $this->escrow->get_by_criteria($criteria);
		
		$this->template->title('Escrow List');
		$this->template->render('services/escrow_view', $response);
	}
				
	
	public function delete_escrow()
	{
	    $eventId = $this->uri->segment(3);
	    $userId = $this->session->userdata('id');
	    	    
	    
	    # Load user events model
	    $this->load->model('user_event_model','uem');
	    
	    # Load user event escrow model
	    $this->load->model('user_event_escrow_model', 'ueem');
	    
	    # Load user event status model
	    $this->load->model('user_event_status_model', 'uesm');
	    
	    # First step is to remove escrow
	    $this->ueem->remove_by_criteria(array(User_event_escrow_model::_EVENT_ID => $eventId));
	    
	    # Remove escrow status
	    $this->uesm->remove_by_criteria(array(User_event_status_model::_EVENT_ID => $eventId, User_event_status_model::_USER_ID => $userId));
	    
	    /*
	    
	    $this->load->model('user_library_event_escrow_model', 'escrow');
	    $escrowDetail = $this->escrow->get_by_id($escrowId);
	    
	    # Load event comment model to get event id
	    $this->load->model('library_event_comment_model', 'comment');
	    $commentData = $this->comment->get_by_id($escrowDetail[0]->{User_library_event_escrow_model::_COMMENT_ID});
	    
	    $eventId = $commentData->event_id;
	    
	    # Load event model to get event data id
	    $this->load->model('library_event_model', 'event');
	    $eventData = $this->event->getLibraryEventById($eventId);
	    
	    $eventDataId = $eventData->event_data_id;
	    
	    # Load page model to get seller id
	    $this->load->model('page');
	    $pageData = $this->page->get_by_id($eventDataId);
	    
	    $sellerId = $pageData->user_id;
	        
	    
	    if($userId == $sellerId)
	    {
	       # Remove the Event Comment
	        $this->comment->delete_comment($escrowDetail->{User_library_event_escrow_model::_COMMENT_ID});
	        
	       # Remove the Event
	        $this->event->delete_event($eventId);
	    }
	     
	    $this->escrow->delete_escrow($escrowId);
	    */
	    redirect(base_url('e-business'));	    
	}
	
	public function escrow_success()
	{
	    $response = array();
	    
	    $this->template->title('Escrow Success');
	    $this->template->render('cryptonator-success', $response);
	}
	
	public function escrow_failure()
	{
	    $response = array();
	    
	    $this->template->title('Escrow Failure');
	    $this->template->render('cryptonator-oops', $response);
	}
	
	public function escrow_callback()
	{
	    print_r($_REQUEST);
	}
}
