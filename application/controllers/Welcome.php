<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Base 
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
	    
	    # Load User model
	    $this->load->model('user');
	    
	        
		$this->load->model('cms');
		
		$result = $this->cms->getCMSPageById(1);

		$data['pageTitle'] = $result->{Cms::_TITLE};
		$data['pageDescription'] = $result->{Cms::_CONTENT};

		$this->template->title('Sparring humankind to space age');
		$this->template->render('cms/single.php', $data);
	}
	
	public function update_user_questionnaire_ios()
	{
	    $flag = false;
	    
	    $registrationInfo = json_decode($this->input->post('registration-info'), true);
	    $userId = $this->input->post('user-id');
	    
	    $this->load->model('user');
	    $this->load->model('user_questionnaire','u');
	    
	    $this->user->update_user_country($userId, $registrationInfo[0]['country']);
	    
	    
	    # Check current user membership level
	    $userProfileInfo = $this->user->getUserProfile($userId);
	    
	    if($userProfileInfo->{User::_USER_MEMBERSHIP_LEVEL} == 1)
	    {
	        # This Means the user is signed in user and since the PPQ is done, now lets update the user membership level
	        $this->user->update_user_membership($userId, User::VISIBILITY_REGISTERED_USER);
	        
	        # Update user membership level in session
	        $this->session->set_userdata('membershipLevel', User::VISIBILITY_REGISTERED_USER);
	        
	        # Set userdata to ensure that we show a message which says that user level is now registerd
	        $this->session->set_flashdata('member_upgrade_message', 'Welcome, You are registered user now');
	        
	    }
	    
	    $flag = $this->u->update_user_questionnaire($userId, $registrationInfo[0]);
	    
	    # Load user questionnaire
	    
	    $this->load->model('user_questionnaire','ques');
	    
	    $q1 = $this->ques->check_ppq_rpq_wpq_status($userId, User_questionnaire::QUESTION_GROUP_PPQ);
	    $q2 = $this->ques->check_ppq_rpq_wpq_status($userId, User_questionnaire::QUESTION_GROUP_RPQ);
	    $q3 = $this->ques->check_ppq_rpq_wpq_status($userId, User_questionnaire::QUESTION_GROUP_WPQ);
	    
	    if($q1 && $q2 && $q3 && $userProfileInfo->{User::_USER_MEMBERSHIP_LEVEL} < 3){
	        
	        # This Means the user is has done all level of ppq/rpq and wpq
	        $this->user->update_user_membership($userId, User::VISIBILITY_UPGRADED_USER);
	        
	        # Update user membership level in session
	        $this->session->set_userdata('membershipLevel', User::VISIBILITY_UPGRADED_USER);
	        
	        # Set userdata to ensure that we show a message which says that user level is now registerd
	        $this->session->set_flashdata('member_upgrade_message', 'Welcome, You are upgraded user now');
	    }
	    
	    
	    if($flag) $this->message->setFlashMessage(Message::QUESTIONNAIRE_UPDATE_SUCCESS, array('id'=>1));
	    else $this->message->setFlashMessage(Message::QUESTIONNAIRE_UPDATE_FAILURE);
	    
	    redirect(base_url('public/api_down/ppq-ios?user-id='.$userId));
	}
	
	public function update_user_rpq_ios()
	{
	    $flag = false;
	    
	    $registrationInfo = json_decode($this->input->post('registration-info'), true);
	    $userId = $this->input->post('user-id');
	    
	    $this->load->model('user');
	    $this->load->model('user_questionnaire','u');
	    
	    # Check current user membership level
	    $userProfileInfo = $this->user->getUserProfile($userId);
	    
	    if($userProfileInfo->{User::_USER_MEMBERSHIP_LEVEL} == 1)
	    {
	        # This Means the user is signed in user and since the PPQ is done, now lets update the user membership level
	        $this->user->update_user_membership($userId, User::VISIBILITY_REGISTERED_USER);
	        
	        # Update user membership level in session
	        $this->session->set_userdata('membershipLevel', User::VISIBILITY_REGISTERED_USER);
	        
	        # Set userdata to ensure that we show a message which says that user level is now registerd
	        $this->session->set_flashdata('member_upgrade_message', 'Welcome, You are registered user now');
	        
	    }
	    
	    $flag = $this->u->update_user_rpq($userId, $registrationInfo[0]);
	    
	    
	    # Load user questionnaire
	    
	    $this->load->model('user_questionnaire','ques');
	    
	    $q1 = $this->ques->check_ppq_rpq_wpq_status($userId, User_questionnaire::QUESTION_GROUP_PPQ);
	    $q2 = $this->ques->check_ppq_rpq_wpq_status($userId, User_questionnaire::QUESTION_GROUP_RPQ);
	    $q3 = $this->ques->check_ppq_rpq_wpq_status($userId, User_questionnaire::QUESTION_GROUP_WPQ);
	    
	    if($q1 && $q2 && $q3 && $userProfileInfo->{User::_USER_MEMBERSHIP_LEVEL} < 3){
	        
	        # This Means the user is has done all level of ppq/rpq and wpq
	        $this->user->update_user_membership($userId, User::VISIBILITY_UPGRADED_USER);
	        
	        # Update user membership level in session
	        $this->session->set_userdata('membershipLevel', User::VISIBILITY_UPGRADED_USER);
	        
	        # Set userdata to ensure that we show a message which says that user level is now registerd
	        $this->session->set_flashdata('member_upgrade_message', 'Welcome, You are upgraded user now');
	    }
	    
	    if($flag) $this->message->setFlashMessage(Message::RPQ_UPDATE_SUCCESS, array('id'=>1));
	    else $this->message->setFlashMessage(Message::RPQ_UPDATE_FAILURE);
	    
	    redirect(base_url('public/api_down/rpq-ios?user-id='.$userId));
	}
	
	public function update_user_wpq_ios()
	{
	    $flag = false;
	    
	    $registrationInfo = json_decode($this->input->post('registration-info'), true);
	    $userId = $this->input->post('user-id');
	    // 		echo "<pre>"; print_r($registrationInfo); echo "</pre>"; die;
	    $this->load->model('user');
	    $this->load->model('user_questionnaire','u');
	    
	    # Check current user membership level
	    $userProfileInfo = $this->user->getUserProfile($userId);
	    
	    if($userProfileInfo->{User::_USER_MEMBERSHIP_LEVEL} == 1)
	    {
	        # This Means the user is signed in user and since the PPQ is done, now lets update the user membership level
	        $this->user->update_user_membership($userId, User::VISIBILITY_REGISTERED_USER);
	        
	        # Update user membership level in session
	        $this->session->set_userdata('membershipLevel', User::VISIBILITY_REGISTERED_USER);
	        
	        # Set userdata to ensure that we show a message which says that user level is now registerd
	        $this->session->set_flashdata('member_upgrade_message', 'Welcome, You are registered user now');
	        
	    }
	    
	    $flag = $this->u->update_user_wpq($userId, $registrationInfo[0]);
	    
	    
	    # Load user questionnaire
	    
	    $this->load->model('user_questionnaire','ques');
	    
	    $q1 = $this->ques->check_ppq_rpq_wpq_status($userId, User_questionnaire::QUESTION_GROUP_PPQ);
	    $q2 = $this->ques->check_ppq_rpq_wpq_status($userId, User_questionnaire::QUESTION_GROUP_RPQ);
	    $q3 = $this->ques->check_ppq_rpq_wpq_status($userId, User_questionnaire::QUESTION_GROUP_WPQ);
	    
	    if($q1 && $q2 && $q3 && $userProfileInfo->{User::_USER_MEMBERSHIP_LEVEL} < 3){
	        
	        # This Means the user is has done all level of ppq/rpq and wpq
	        $this->user->update_user_membership($userId, User::VISIBILITY_UPGRADED_USER);
	        
	        # Update user membership level in session
	        $this->session->set_userdata('membershipLevel', User::VISIBILITY_UPGRADED_USER);
	        
	        # Set userdata to ensure that we show a message which says that user level is now registerd
	        $this->session->set_flashdata('member_upgrade_message', 'Welcome, You are upgraded user now');
	    }
	    
	    if($flag) $this->message->setFlashMessage(Message::WPQ_UPDATE_SUCCESS, array('id'=>1));
	    else $this->message->setFlashMessage(Message::WPQ_UPDATE_FAILURE);
	    
	    redirect(base_url('public/api_down/wpq-ios?user-id='.$userId));
	}
	
	
	public function updateWalletBalance()
	{
	    # Get all users from user subscription
	    # Load subscription model
	    $this->load->model('user_subscription', 'subscription');
	    
	    $subscriptions = $this->subscription->get_subscriptions();
	    
	    # Loop through subscriptions
	    
	    if(!empty($subscriptions))
	    {
	        $queryArray = array();
	        
	        foreach ($subscriptions as $sub)
	        {
	            # Get user Id
	            $userId = $sub->user_id;
	            
	            # Get Item Id
	            $itemId = $sub->item_id;
	                        
	            # Load membership model
	            $this->load->model('membership_model', 'membership');
	            
	            # Get credit points based on item id
	            $result = $this->membership->get_membership_by_id($itemId);
	            
	            # credit points 
	            $creditPoints = $result->{Membership_model::_CREDIT_POINT};
	            
	            # Load user model
	            $this->load->model('user');
	            
	            $userProfile = $this->user->getUserProfile($userId);
	            
	            # Get wallet balance
	            
	            $walletPoints = $userProfile->{User::_PCT_WALLET_AMOUNT};
	            	            
	            $amount = $walletPoints == 0 ? $creditPoints : ($creditPoints + $walletPoints);
	            
	            # Update wallet amount
	            $this->user->update_pct_wallet_amount($userId, $amount);
	            
	            array_push($queryArray, $this->db->last_query());
	            
	        }
	        
	        pre($queryArray);
	        
	    }
	    
	}
	
	
	
}
