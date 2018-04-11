<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Application 
{
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->isLoggedIn()) { redirect($this->redirectToLogin()); }
		
		# Get Profile Information
		$this->load->model('user');
		$this->load->model('country');
		$this->load->model('symptom_model','symptom');
		$this->load->model('user_questionnaire','ques');
		$this->load->model('rss_feed_subscription_model','rss');
		$this->load->model('cms');
	}	
					
	public function index()
	{
	    $response = array();
	    
		if($this->input->post('user-id'))
		{
			if($this->input->post('user-id') != $this->session->userdata('id')){ 
			    $this->message->setFlashMessage(Message::PROFILE_UPDATE_FAILURE); 
			    redirect(base_url('profile'));
			}
			else 
			{
			    
			    if(isset($_FILES))
			    {
    				# Get Image and Create Thumb and upload
    				$imageName = '';
    				$file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
    				$upload_exts = explode(".", $_FILES["file"]["name"]);
    				$upload_exts = end($upload_exts);
    					
    				if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 2000000) && in_array($upload_exts, $file_exts))
    				{
    					if ($_FILES["file"]["error"] > 0) { echo "Return Code: " . $_FILES["file"]["error"] . "<br>"; }
    					else
    					{
    					   # Generate Timestamp name for image name and upload
    						$imageName = md5($_FILES["file"]["name"].microtime()).'.png';
    							
    						move_uploaded_file($_FILES["file"]["tmp_name"], Template::_PUBLIC_AVTAR_DIR . $imageName);
    // 						create_thumb($_FILES["file"]["name"], Template::_PUBLIC_AVTAR_DIR, 100);
    							
    					}
    				}
			    }	
			     
				$secretQuestion = $this->input->post('secret-question');
				$secretAnswer = $this->input->post('secret-question-answer');
				$whatAreYou = $this->input->post('what_are_you');
				$whatYouWantToBecome = $this->input->post('what_you_want_to_become');
				$problemPreventing = $this->input->post('problem_preventing');
				$gender = $this->input->post('user_gender');
				
				# Update user membership level in session
				$this->session->set_userdata('gender', $gender);
				
				
				$flag = $this->user->update_profile($this->input->post('user-id'), $this->input->post('firstname'), $this->input->post('lastname'), $this->input->post('secondary-email'), $this->input->post('number'), $this->input->post('country'), $this->input->post('avtarname'), $imageName, $gender, $secretQuestion, $secretAnswer, $whatAreYou, $whatYouWantToBecome, $problemPreventing);
				$this->user->update_currency($this->input->post('user-id'), $this->input->post('currency'));
				
				$homeAddress = $this->input->post('home-address');
				$homeLat = $this->input->post('home-lat');
				$homeLng = $this->input->post('home-lng');
				$workAddress = $this->input->post('work-address');
				$workLat = $this->input->post('work-lat');
				$workLng = $this->input->post('work-lng');
				
				$this->user->update_user_address($this->input->post('user-id'), $homeAddress, $homeLat, $homeLng, $workAddress, $workLat, $workLng);
				
				$preferredLocation = $this->input->post('preferred-event-location');
				if($this->input->post('preferred-event-location') == 0) $preferredLocation = "";
				
				$this->user->set_event_default_address($this->input->post('user-id'), $preferredLocation);
				
				# Set what do you need
				$this->user->set_what_do_you_need($this->input->post('user-id'), $this->input->post('what_do_you_need'));				
				
				$offerInRadius = $this->input->post('kms-range') ? $this->input->post('kms-range') : "";
								
				$this->user->set_offer_in_radius($this->input->post('user-id'), $offerInRadius);
								
				if($flag) $this->message->setFlashMessage(Message::PROFILE_UPDATE_SUCCESS, array('id'=>1));
				else $this->message->setFlashMessage(Message::PROFILE_UPDATE_FAILURE);
				
				redirect(base_url('profile'));
				
			}		
		}
		
		# Invite friend
		
		$response['invite_friend'] = "";
		if($this->input->post('input'))
		{
		    $response['invite_friend'] = $this->input->post('input');
		}
						
		$this->template->title("User Profile");

		$response['profile'] = $this->user->getUserProfile($this->session->userdata('id'));
		
		$response['tandc'] = $this->cms->get_by_slug('user-tous')->{Cms::_CONTENT};
		if($response['profile']->{User::_USER_MEMBERSHIP_LEVEL} > 3) $response['tandc'] = $this->cms->get_by_slug('member-tous')->{Cms::_CONTENT};
				
		$response['countries'] = $this->country->getCountries();
		$response['questionnaire'] = $this->ques->get_user_questionnaire($this->session->userdata('id'));
		$response['rpq'] = $this->ques->get_user_rpq($this->session->userdata('id'));
		$response['wpq'] = $this->ques->get_user_wpq($this->session->userdata('id'));
		
		# Load pct setting
		$this->load->model('pct_setting', 'pct');
		$response['currencyRates'] = $this->pct->get_rates();
		
	    #Load currency model
	    $this->load->model('currency');
	    $response['curriencies'] = $this->currency->getCurrencies();
		
		
		$response['subscriptions'] = $this->rss->get_rss_feed_subscription_by_user_id($this->session->userdata('id')); 
				
		# Set Additional Script
		$additionalScripts = array('plugin/jquery_toastmessage/jquery.toastmessage.js');
		$additionalStyles = array('jquery_toastmessage/jquery.toastmessage.css');
		
		$this->template->setAdditionalScript($additionalScripts);
		$this->template->setAdditionalStyle($additionalStyles);
				
		$this->template->render('auth/profile', $response);
		
	}
	
	public function update_user_password()
	{
		
		if($this->input->post('cpassword') && $this->input->post('npassword') && $this->input->post('rpassword') && $this->input->post('user-id'))
		{
			if($this->input->post('rpassword') != $this->input->post('npassword')){$this->message->setFlashMessage(Message::PASSWORD_UPDATE_FAILURE);}
			else if($this->input->post('user-id') != $this->session->userdata('id')){$this->message->setFlashMessage(Message::PASSWORD_UPDATE_FAILURE);}
			
			# Get User password by user id
			$response = $this->user->getUserProfile($this->session->userdata('id')); 
			$hashedPass =  md5($this->input->post('cpassword'));
			if($response->{User::_PASSWORD} != $hashedPass){$this->message->setFlashMessage(Message::PASSWORD_UPDATE_FAILURE);}
			else 
			{
				$flag = $this->user->update_user_password($this->input->post('user-id'), $hashedPass);
				if($flag) $this->message->setFlashMessage(Message::PASSWORD_UPDATE_SUCCESS, array('id'=>1));
				else $this->message->setFlashMessage(Message::PASSWORD_UPDATE_FAILURE);
			}
				
		}
		else $this->message->setFlashMessage(Message::PASSWORD_UPDATE_FAILURE);
		
		redirect('profile');
	}
	
	
	public function update_user_questionnaire()
	{
		$flag = false;
		
		$registrationInfo = json_decode($this->input->post('registration-info'), true);

		$this->load->model('user');
		$this->load->model('user_questionnaire','u');
			
		$this->user->update_user_country($this->session->userdata('id'), $registrationInfo[0]['country']);
		
		
		# Check current user membership level
		$userProfileInfo = $this->user->getUserProfile($this->session->userdata('id'));
		
		if($userProfileInfo->{User::_USER_MEMBERSHIP_LEVEL} == 1)
		{
			# This Means the user is signed in user and since the PPQ is done, now lets update the user membership level
			$this->user->update_user_membership($this->session->userdata('id'), User::VISIBILITY_REGISTERED_USER);
			
			# Update user membership level in session
			$this->session->set_userdata('membershipLevel', User::VISIBILITY_REGISTERED_USER);
			
			# Set userdata to ensure that we show a message which says that user level is now registerd
			$this->session->set_flashdata('member_upgrade_message', 'Welcome, You are registered user now');
						
		}
		
		$flag = $this->u->update_user_questionnaire($this->session->userdata('id'), $registrationInfo[0]);
		
		# Load user questionnaire
		
		$this->load->model('user_questionnaire','ques');
		
		$q1 = $this->ques->check_ppq_rpq_wpq_status($this->session->userdata('id'), User_questionnaire::QUESTION_GROUP_PPQ);
		$q2 = $this->ques->check_ppq_rpq_wpq_status($this->session->userdata('id'), User_questionnaire::QUESTION_GROUP_RPQ);
		$q3 = $this->ques->check_ppq_rpq_wpq_status($this->session->userdata('id'), User_questionnaire::QUESTION_GROUP_WPQ);
		
		if($q1 && $q2 && $q3 && $userProfileInfo->{User::_USER_MEMBERSHIP_LEVEL} < 3){
		    
		    # This Means the user is has done all level of ppq/rpq and wpq
		    $this->user->update_user_membership($this->session->userdata('id'), User::VISIBILITY_UPGRADED_USER);
		    	
		    # Update user membership level in session
		    $this->session->set_userdata('membershipLevel', User::VISIBILITY_UPGRADED_USER);
		    	
		    # Set userdata to ensure that we show a message which says that user level is now registerd
		    $this->session->set_flashdata('member_upgrade_message', 'Welcome, You are upgraded user now');
		}
			
				
		if($flag) $this->message->setFlashMessage(Message::QUESTIONNAIRE_UPDATE_SUCCESS, array('id'=>1));
		else $this->message->setFlashMessage(Message::QUESTIONNAIRE_UPDATE_FAILURE);
		
		redirect('profile');
	}
	
	
	
	
	
	
	
	
	
	public function update_user_rpq()
	{
		$flag = false;
		
		$registrationInfo = json_decode($this->input->post('registration-info'), true);
		
		$this->load->model('user');
		$this->load->model('user_questionnaire','u');
			
		# Check current user membership level
		$userProfileInfo = $this->user->getUserProfile($this->session->userdata('id'));
		
		if($userProfileInfo->{User::_USER_MEMBERSHIP_LEVEL} == 1)
		{
			# This Means the user is signed in user and since the PPQ is done, now lets update the user membership level
			$this->user->update_user_membership($this->session->userdata('id'), User::VISIBILITY_REGISTERED_USER);
			
			# Update user membership level in session
			$this->session->set_userdata('membershipLevel', User::VISIBILITY_REGISTERED_USER);
			
			# Set userdata to ensure that we show a message which says that user level is now registerd
			$this->session->set_flashdata('member_upgrade_message', 'Welcome, You are registered user now');
			
		}
		
		$flag = $this->u->update_user_rpq($this->session->userdata('id'), $registrationInfo[0]);
		

		# Load user questionnaire
		
		$this->load->model('user_questionnaire','ques');
		
		$q1 = $this->ques->check_ppq_rpq_wpq_status($this->session->userdata('id'), User_questionnaire::QUESTION_GROUP_PPQ);
		$q2 = $this->ques->check_ppq_rpq_wpq_status($this->session->userdata('id'), User_questionnaire::QUESTION_GROUP_RPQ);
		$q3 = $this->ques->check_ppq_rpq_wpq_status($this->session->userdata('id'), User_questionnaire::QUESTION_GROUP_WPQ);
		
		if($q1 && $q2 && $q3 && $userProfileInfo->{User::_USER_MEMBERSHIP_LEVEL} < 3){
		
		    # This Means the user is has done all level of ppq/rpq and wpq
		    $this->user->update_user_membership($this->session->userdata('id'), User::VISIBILITY_UPGRADED_USER);
		     
		    # Update user membership level in session
		    $this->session->set_userdata('membershipLevel', User::VISIBILITY_UPGRADED_USER);
		     
		    # Set userdata to ensure that we show a message which says that user level is now registerd
		    $this->session->set_flashdata('member_upgrade_message', 'Welcome, You are upgraded user now');
		}
		
		if($flag) $this->message->setFlashMessage(Message::RPQ_UPDATE_SUCCESS, array('id'=>1));
		else $this->message->setFlashMessage(Message::RPQ_UPDATE_FAILURE);
		
		redirect('profile');
	}
	
	public function update_user_wpq()
	{
		$flag = false;
		
		$registrationInfo = json_decode($this->input->post('registration-info'), true);
// 		echo "<pre>"; print_r($registrationInfo); echo "</pre>"; die;
		$this->load->model('user');
		$this->load->model('user_questionnaire','u');
		
		# Check current user membership level
		$userProfileInfo = $this->user->getUserProfile($this->session->userdata('id'));
		
		if($userProfileInfo->{User::_USER_MEMBERSHIP_LEVEL} == 1)
		{
			# This Means the user is signed in user and since the PPQ is done, now lets update the user membership level
			$this->user->update_user_membership($this->session->userdata('id'), User::VISIBILITY_REGISTERED_USER);
			
			# Update user membership level in session
			$this->session->set_userdata('membershipLevel', User::VISIBILITY_REGISTERED_USER);
			
			# Set userdata to ensure that we show a message which says that user level is now registerd
			$this->session->set_flashdata('member_upgrade_message', 'Welcome, You are registered user now');
			
		}
		
		$flag = $this->u->update_user_wpq($this->session->userdata('id'), $registrationInfo[0]);
		

		# Load user questionnaire
		
		$this->load->model('user_questionnaire','ques');
		
		$q1 = $this->ques->check_ppq_rpq_wpq_status($this->session->userdata('id'), User_questionnaire::QUESTION_GROUP_PPQ);
		$q2 = $this->ques->check_ppq_rpq_wpq_status($this->session->userdata('id'), User_questionnaire::QUESTION_GROUP_RPQ);
		$q3 = $this->ques->check_ppq_rpq_wpq_status($this->session->userdata('id'), User_questionnaire::QUESTION_GROUP_WPQ);
		
		if($q1 && $q2 && $q3 && $userProfileInfo->{User::_USER_MEMBERSHIP_LEVEL} < 3){
		
		    # This Means the user is has done all level of ppq/rpq and wpq
		    $this->user->update_user_membership($this->session->userdata('id'), User::VISIBILITY_UPGRADED_USER);
		     
		    # Update user membership level in session
		    $this->session->set_userdata('membershipLevel', User::VISIBILITY_UPGRADED_USER);
		     
		    # Set userdata to ensure that we show a message which says that user level is now registerd
		    $this->session->set_flashdata('member_upgrade_message', 'Welcome, You are upgraded user now');
		}
		
		if($flag) $this->message->setFlashMessage(Message::WPQ_UPDATE_SUCCESS, array('id'=>1));
		else $this->message->setFlashMessage(Message::WPQ_UPDATE_FAILURE);
		
		redirect('profile');
	}
	
	public function update_ewallet_address()
	{
	   
	    if(empty($this->input->post('e_wallet_address')))
	    {
	        $this->message->setFlashMessage(Message::WALLET_ADDRESS_CREATE_ERROR);
	        redirect('profile');
	    }
	    
	    $userId = $this->session->userdata('id');
	    $address = $this->input->post('e_wallet_address');
	    
	    if($this->user->update_ewallet_address($userId, $address)) $this->message->setFlashMessage(Message::WALLET_ADDRESS_CREATE_SUCCESS, array('id'=>1));
	    else $this->message->setFlashMessage(Message::WALLET_ADDRESS_CREATE_FAILURE);
	    
	    redirect('profile');
	}
	
}
