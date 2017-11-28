<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends Application {
	
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->isLoggedIn()) { $this->redirectToLogin();}
		
		# Load user modal
		$this->load->model('admin/user','user');
		$this->load->model('country');
		$this->load->model('user_questionnaire','ques');
		$this->load->model('rss_feed_subscription_model','rss');
		$this->load->model('user_subscription','purchase');
		$this->load->model('page');
		$this->load->model('membership_model', 'membership');
		$this->load->model('Psss_purchase_history', 'psss');
	}
	
	public function index()
	{				
		$data = array();
		$this->template->title('Manage Users');
		
		$data['users'] = $this->user->getUsers($this->session->userdata('id'), '', '', 0);
		$data['count'] = $this->user->getUserCount($this->session->userdata('id'));
		
		$this->template->render('user/manage_users', $data);
		
	}
	
	public function edit_user()
	{
		$userId = $this->uri->segment(3);
	
		$data['user'] = $this->user->getUserById($userId);
		$data['countries'] = $this->country->getCountries();

		# Get User subscriptions
		
		$data['rssSubscriptions'] = $this->rss->get_rss_feed_subscription_by_user_id($userId);
		$data['subscriptions'] = $this->purchase->get_subscription_by_user_id($userId);
		$data['purchases'] = $this->psss->get_psss_by_user_id($userId);
		
		# Load membership model
		$this->load->model('membership');
		$data['shopProducts'] = $this->membership->get_memberships('', '', '', '');
		
		
		$this->template->title("Edit User");
		$this->template->render('user/edit_user', $data);
	}
	
	public function show_ppqs()
	{
		$userId = $this->uri->segment(5);
		
		$data['user'] = $this->user->getUserById($userId);
		$data['countries'] = $this->country->getCountries();
		$data['questionnaire'] = $this->ques->get_user_questionnaire($userId);
		
		$this->template->title("User PPQ's");
		$this->template->render('user/user_ppqs', $data);
	}
	
	public function delete_user()
	{
		$userId = $this->uri->segment(2);
	
		$result = $this->user->deleteUserById($userId);
	
		if($result)$this->message->setFlashMessage(Message::USER_DELETE_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::USER_DELETE_FAILUTE);
	
		redirect('admin/users');
	}
	
	public function activate_user()
	{
		$userIds = $this->input->post('user-ids');
		
		$result = $this->user->activate_user($userIds);
		
		if($result)$this->message->setFlashMessage(Message::USER_ACTIVATION_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::USER_ACTIVATION_FAILURE);
		
		redirect('admin/users');
	}
	
	
	public function deactivate_user()
	{
		$userIds = $this->input->post('user-ids');
		
		$result = $this->user->deactivate_user($userIds);
		
		if($result)$this->message->setFlashMessage(Message::USER_DEACTIVATION_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::USER_DEACTIVATION_FAILURE);
		
		redirect('admin/users');
	}
	
	
	public function updgrade_user_membership()
	{
	    # First step is to get the user id 
	    
	    $userId = $this->input->post('user-id');
	    	    
	    # Next step is to check the user current membership level
	    $result = $this->user->getUserById($userId);
	    $membershipLevel = $result->membership_level;
	    
	    $membershipProduct = $this->input->post('transaction_product');
	    
	    $transId = $this->input->post('transaction_number');
	    $transAmount = $this->input->post('transaction_amount');
	    $transCurrency = $this->input->post('transaction_currency');
	    $transMode = $this->input->post('transaction_mode');
	    $transSubs = $this->input->post('transaction_subscription');
	    $transEmail = $this->input->post('transaction_email');
	    
	    # Now since we have the membership product, get membership type from product 
	    
	    $this->load->model('membership_model');
	    
	    $result = $this->membership_model->get_membership_by_id($membershipProduct);
	  
	    if($membershipLevel == $result->{Membership_model::_MEMBERSHIP_TYPE})
	    {
	        $this->message->setFlashMessage(Message::USER_MEMBERSHIP_ALREADY_SUBSCRIBED);	        
	    }
	    
	    if($membershipLevel > $result->{Membership_model::_MEMBERSHIP_TYPE})
	    {
	        $this->message->setFlashMessage(Message::USER_MEMBERSHIP_HIGHER_SUBSCRIBED);
	    }
	    
	    # Check if membership Level Provided by User is 7 [Remainder Service]
	    # This will means that we will have to just do a remainder service purchase for user
	    
	    $date = new DateTime();
	    $date = $date->format('Y-m-d H:i:s');
	     
	    $expiry = new DateTime();

	    
	    switch ($transSubs)
	    {
	    	case 1: $expiry->add(new DateInterval('P1M')); $expiry = $expiry->format('Y-m-d H:i:s'); break;
	    	case 2: $expiry->add(new DateInterval('P1Y')); $expiry = $expiry->format('Y-m-d H:i:s'); break;
	    }
	    
	    
	    if($result->{Membership_model::_MEMBERSHIP_TYPE} == 7)
	    {
	        $expiry = $expiry->add(new DateInterval('P1Y')); 
	        $expiry = $expiry->format('Y-m-d H:i:s');
	    }
        
	    if($result->{Membership_model::_MEMBERSHIP_TYPE} != 7)
	    {
	        # Update user membership also
	        $this->user->update_user_membership($userId, $result->{Membership_model::_MEMBERSHIP_TYPE});
	    }
	    
	    
	    
	    
	    $this->load->model('user_subscription','subscription');	    
	    
	    $result = $this->subscription->create_subscription($transId, $userId, $membershipProduct, $result->{Membership_model::_MEMBERSHIP_TITLE}, $result->{Membership_model::_CATEGORY_ID}, $transAmount, $transCurrency, $transEmail, $date, $expiry, 1);
	    
	    if($result)$this->message->setFlashMessage(Message::USER_SUBSCRIPTION_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::USER_SUBSCRIPTION_FAILURE);
	    	    	    
	    redirect(base_url('admin/edit-user/'.$userId));
	    
	    
	    #pre($this->input->post()); die;
	    
	    
	}
	
	
		
}
