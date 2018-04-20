<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Webservice_controller extends CI_Controller
{
	/* General Service */
	
	const SERVICE_POPULATE_COUNTRIES = 1;
	const SERVICE_GET_TERMS_AND_CONDITIONS = 2;
	const SERVICE_GET_WHITEPAPER_CONTENT = 3;
	const SERVICE_GET_CLUB_RULES_CONTENT = 4;
	
	/* Login Registration Services */
	
	const SERVICE_VALIDATE_AVATAR_NAME = 100;
	const SERVICE_SIGN_UP_USER = 101;
	const SERVICE_SIGN_IN_USER = 102;
	const SERVICE_RECOVER_PASSWORD_USING_EMAIL = 103;
	const SERVICE_LOGOUT_USER = 104;
	const SERVICE_RECOVER_PASSWORD_GET_SECURITY_QUESTION = 105;
	
	const SERVICE_GET_USER_PROFILE = 201;
	const SERVICE_UPDATE_USER_PROFILE = 202;
	const SERVICE_CHANGE_USER_PASSWORD = 203;
	const SERVICE_USER_PPQ_DETAIL = 204;
	const SERVICE_USER_UPDATE_PPQ_DETAIL = 205;
	const SERVICE_USER_SUBSCRIPTION_DETAIL = 206;
	const SERVICE_USER_INVITE = 207;
	const SERVICE_GET_USER_TOUS = 208;
	const SERVICE_USER_RPQ_DETAIL = 209;
	const SERVICE_USER_WPQ_DETAIL = 210;
	const SERVICE_USER_UPDATE_RPQ_DETAIL = 211;
	const SERVICE_USER_UPDATE_WPQ_DETAIL = 212;
	
	
	const SERVICE_GET_BLOGS = 301;
	const SERVICE_GET_BLOG_DETAIL = 302;
	const SERVICE_CREATE_NEW_BLOG = 303;
	const SERVICE_CREATE_BLOG_ANSWER = 304;
	
	const SERVICE_GET_PRODUCTS = 401;
	const SERVICE_GET_PRODUCT_DETAIL = 402;
	const SERVICE_CREATE_NEW_PRODUCT = 403;
	
	const SERVICE_GET_SERVICES = 501;
	const SERVICE_GET_SERVICE_DETAIL = 502;
	const SERVICE_CREATE_NEW_SERVICE = 503;
	
	const SERVICE_GET_SENSATIONS = 601;
	const SERVICE_GET_SENSATION_DETAIL = 602;
	const SERVICE_CREATE_NEW_SENSATION = 603;
	
	const SERVICE_GET_SYMPTOMS = 701;
	const SERVICE_GET_SYMPTOM_DETAIL = 702;
	const SERVICE_CREATE_NEW_SYMPTOM = 703;
	const SERVICE_CREATE_SYMPTOM_ANSWER = 704;
	
	const SERVICE_GET_FAQS = 801;
	const SERVICE_GET_FAQ_DETAIL = 802;
	const SERVICE_CREATE_NEW_FAQ = 803;
	const SERVICE_CREATE_FAQ_ANSWER = 804;
	
	const SERVICE_CREATE_NEW_FEEDBACK = 901;
	
	const SERVICE_GET_LIBRARY_CONTENTS = 1001;
	
	const SERVICE_GET_LEAN_CANVAS_CONTENT = 2001;
	
	const SERVICE_GET_REMAINDER_SERVICE_CONTENT = 3001;
	const SERVICE_PURCHASE_REMAINDER_SERVICE = 3002;
	
	const SERVICE_GET_NUMBER_GAME_CONTENT = 4001;
	
	const SERVICE_GET_SHOP_PRODUCTS = 5001;
	const SERVICE_GET_SHOP_PRODUCT_DETAIL = 5002;
	
	const SERVICE_GET_SITE_INTRO_CONTENT = 6001;
	
	const SERVICE_GET_CATEGORY_LIST = 7001;
	
	const SERVICE_CREATE_RSS_FEED_SUBSCRIPTION = 8001;
	const SERVICE_UNSUBSCRIBE_RSS_FEED_SUBSCRIPTION = 8002;
	
	const SERVICE_CREATE_NEW_TASK_GOAL = 9001;
	const SERVICE_GET_TASK_GOAL = 9002;
	const SERVICE_UPDATE_TASK_GOAL = 9003;
	const SERVICE_DELETE_TASK_GOAL = 9004;
	
	const SERVICE_CREATE_NEW_DATA = 10001;
	const SERVICE_GET_DATA = 10002;
	const SERVICE_GET_DATA_DETAIL = 10003;
	const SERVICE_CREATE_DATA_IMAGE = 10004;
	
	const SERVICE_GET_FRIEND_DATA = 11001;
	
	const SERVICE_GET_USER_DATA_LIST = 12001;
	
	const SERVICE_GET_MESSAGES = 13000;
	const SERVICE_SET_MESSAGE = 13001;
	const SERVICE_GET_MESSAGE_HISTORY = 13002;
	const SERVICE_UPDATE_DEVICE_TOKEN = 13003;
	
	const SERVICE_GET_LIBRARY_SEARCH = 14000;
	
	const SERVICE_GET_CALENDAR_DATA = 15000;
	const SERVICE_SET_CALENDAR_DATA = 15001;
	const SERVICE_UPDATE_CALENDAR_DATA = 15002;
	const SERVICE_REMOVE_CALENDAR_DATA = 15003;
	const SERVICE_SET_CALENDAR_COMMENT = 15004;
	
	
	const SERVICE_MEMBERSHIP_PURCHASE = 16000;
	const SERVICE_PSS_PURCHASE = 16001;
	
	const SERVICE_LIKE_PAGE_DATA = 17000;
	const SERVICE_UNLIKE_PAGE_DATE = 17001;
	const SERVICE_LOVE_IT_PAGE_DATE = 17002;
	const SERVICE_HATE_IT_PAGE_DATE = 17003;
	
	const SERVICE_PPQ_FOR_ISO = 'ios_ppq';
	const SERVICE_RPQ_FOR_ISO = 'ios_rpq';
	const SERVICE_WPQ_FOR_ISO = 'ios_wpq';
		
	const SERVICE_CALENDAR_FOR_MOBILE = 'mobile_calendar';
	const AJAX_PCT_WALLET_TRANSFER = 'pct_transfer';
	const AJAX_PCT_WALLET_PAYMENT = 'pct_payment';
	const AJAX_GET_TRANSACTION_HISTORY = 'transaction_history';
	const AJAX_GET_WALLET_AMOUNT = 'wallet_amount';
	
	const AJAX_ADD_EVENT = 'add_event';
	
	const AJAX_GET_COMMUNICATION_OFFERS = 'get_offers';
	const AJAX_DECLINE_OFFER = 'decline_offer';
	const AJAX_GET_MY_OFFERS = 'my_offer';
	const AJAX_YIELD_SMART_CONTRACT = 'yield_smart_contract';
	const AJAX_PROCESS_SMART_CONTRACT = 'smart_contract_payment';
	
	const AJAX_ACQUIRE_DATA = 'acquire_data';
	
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$response = '';
		
		$request = $this->input->post('acid');
		$payload = json_decode($this->input->post('payload'), true);
		
		switch ($request)
		{
			case self::SERVICE_POPULATE_COUNTRIES : $response = $this->get_country_list(); break;
			case self::SERVICE_GET_TERMS_AND_CONDITIONS : $response = $this->get_terms_condition(); break;
			case self::SERVICE_GET_WHITEPAPER_CONTENT : $response = $this->get_whitepaper_content(); break;
			case self::SERVICE_GET_CLUB_RULES_CONTENT : $response = $this->get_club_rule_content(); break;
			
			case self::SERVICE_VALIDATE_AVATAR_NAME : $response = $this->validate_avatar_name($payload); break;
			case self::SERVICE_SIGN_UP_USER : $response = $this->sign_up($payload); break;
			case self::SERVICE_SIGN_IN_USER : $response = $this->sign_in($payload); break;
			case self::SERVICE_RECOVER_PASSWORD_USING_EMAIL : $response = $this->recover_password_using_email($payload); break;
			case self::SERVICE_LOGOUT_USER : $response = $this->logout_user($payload); break;
			case self::SERVICE_RECOVER_PASSWORD_GET_SECURITY_QUESTION : $response = $this->recover_password_get_security_question($payload); break;
			
			case self::SERVICE_GET_USER_PROFILE : $response = $this->get_user_profile($payload); break;
			case self::SERVICE_UPDATE_USER_PROFILE : $response = $this->update_user_profile($payload); break;
			case self::SERVICE_CHANGE_USER_PASSWORD : $response = $this->change_user_password($payload); break;
			case self::SERVICE_USER_PPQ_DETAIL : $response = $this->user_ppq_detail($payload); break;
			case self::SERVICE_USER_UPDATE_PPQ_DETAIL : $response = $this->user_update_ppq_detail($payload); break;
			case self::SERVICE_USER_SUBSCRIPTION_DETAIL : $response = $this->user_subscription($payload); break;
			case self::SERVICE_USER_INVITE : $response = $this->user_invite($payload); break;
			case self::SERVICE_GET_USER_TOUS : $response = $this->get_user_tous($payload); break;
			case self::SERVICE_USER_RPQ_DETAIL : $response = $this->user_rpq_detail($payload); break;
			case self::SERVICE_USER_WPQ_DETAIL : $response = $this->user_wpq_detail($payload); break;
			case self::SERVICE_USER_UPDATE_RPQ_DETAIL : $response = $this->user_update_rpq_detail($payload); break;
			case self::SERVICE_USER_UPDATE_WPQ_DETAIL : $response = $this->user_update_wpq_detail($payload); break;
			
			
			case self::SERVICE_GET_BLOGS : $response = $this->get_blogs($payload); break;
			case self::SERVICE_GET_BLOG_DETAIL : $response = $this->get_blog_detail($payload); break;
			case self::SERVICE_CREATE_NEW_BLOG : $response = $this->create_new_blog($payload); break;
			case self::SERVICE_CREATE_BLOG_ANSWER : $response = $this->create_blog_answer($payload); break;
			
			case self::SERVICE_GET_PRODUCTS : $response = $this->get_products($payload); break;
			case self::SERVICE_GET_PRODUCT_DETAIL : $response = $this->get_product_detail($payload); break;
			case self::SERVICE_CREATE_NEW_PRODUCT : $response = $this->create_new_product($payload); break;
			
			case self::SERVICE_GET_SERVICES : $response = $this->get_services($payload); break;
			case self::SERVICE_GET_SERVICE_DETAIL : $response = $this->get_service_detail($payload); break;
			case self::SERVICE_CREATE_NEW_SERVICE : $response = $this->create_new_service($payload); break;
			
			case self::SERVICE_GET_SENSATIONS : $response = $this->get_sensations($payload); break;
			case self::SERVICE_GET_SENSATION_DETAIL : $response = $this->get_sensation_detail($payload); break;
			case self::SERVICE_CREATE_NEW_SENSATION : $response = $this->create_new_sensation($paylaod); break;
			
			case self::SERVICE_GET_SYMPTOMS : $response = $this->get_symptom($payload); break;
			case self::SERVICE_GET_SYMPTOM_DETAIL : $response = $this->get_symptom_detail($payload); break;
			case self::SERVICE_CREATE_NEW_SYMPTOM : $response = $this->create_new_symptom($payload); break;
			case self::SERVICE_CREATE_SYMPTOM_ANSWER : $response = $this->create_symptom_answer($payload); break;
			
			case self::SERVICE_GET_FAQS : $response = $this->get_faqs($payload); break;
			case self::SERVICE_GET_FAQ_DETAIL : $response = $this->get_faq_detail($payload); break;
			case self::SERVICE_CREATE_NEW_FAQ : $response = $this->create_new_faq($payload); break;
			case self::SERVICE_CREATE_FAQ_ANSWER : $response = $this->create_faq_answer($payload); break;
			
			
			case self::SERVICE_CREATE_NEW_FEEDBACK : $response = $this->create_new_feedback($payload); break;
			
			case self::SERVICE_GET_LIBRARY_CONTENTS : $response = $this->get_library_contents($payload); break;
			
			
			case self::SERVICE_GET_LEAN_CANVAS_CONTENT : $response = $this->get_lean_canvas_content($payload); break;
			
			case self::SERVICE_GET_REMAINDER_SERVICE_CONTENT : $response = $this->get_remainder_service_content($payload); break;
			case self::SERVICE_PURCHASE_REMAINDER_SERVICE : $response = $this->purchase_remainder_service($payload); break;
			
			case self::SERVICE_GET_NUMBER_GAME_CONTENT : $response = $this->get_number_game_content($payload); break;
			
			case self::SERVICE_GET_SHOP_PRODUCTS : $response = $this->get_shop_products($payload); break;
			case self::SERVICE_GET_SHOP_PRODUCT_DETAIL : $response = $this->get_shop_product_detail($payload); break;
			
			case self::SERVICE_GET_SITE_INTRO_CONTENT : $response =  $this->get_site_intro_content($payload); break;
			
			case self::SERVICE_GET_CATEGORY_LIST : $response = $this->get_category_list($payload); break;
			
			case self::SERVICE_CREATE_RSS_FEED_SUBSCRIPTION : $response = $this->create_rss_feed_subscription($payload); break;
			case self::SERVICE_UNSUBSCRIBE_RSS_FEED_SUBSCRIPTION : $response = $this->unsubscribe_rss_feed_subscription($payload); break;
			
			case self::SERVICE_CREATE_NEW_TASK_GOAL : $response = $this->create_new_task_goal($payload); break;
			case self::SERVICE_GET_TASK_GOAL : $response = $this->get_task_goal($payload); break;
			case self::SERVICE_UPDATE_TASK_GOAL : $response = $this->update_task_goal($payload); break;
			case self::SERVICE_DELETE_TASK_GOAL : $response = $this->delete_task_goal($payload); break;
			
			case self::SERVICE_CREATE_NEW_DATA : $response = $this->create_new_data($payload); break;
			case self::SERVICE_GET_DATA : $response = $this->get_data($payload); break;
			case self::SERVICE_GET_DATA_DETAIL : $response = $this->get_data_detail($payload); break;
			case self::SERVICE_CREATE_DATA_IMAGE : $response = $this->create_data_image($payload); break;
			
			case self::SERVICE_GET_FRIEND_DATA : $response = $this->get_friend_data($payload); break;
			
			case self::SERVICE_GET_USER_DATA_LIST : $response = $this->get_user_data_list($payload); break;
			
			case self::SERVICE_GET_MESSAGES : $response = $this->get_messages($payload); break;
			case self::SERVICE_SET_MESSAGE : $response = $this->set_message($payload); break; 
			case self::SERVICE_GET_MESSAGE_HISTORY : $response = $this->set_message($payload); break;
			case self::SERVICE_UPDATE_DEVICE_TOKEN : $response = $this->update_device_token($payload); break;
			
			case self::SERVICE_GET_LIBRARY_SEARCH : $response = $this->get_library_search($payload); break;
			
			case self::SERVICE_GET_CALENDAR_DATA : $response = $this->get_calendar_data($payload); break;
			case self::SERVICE_SET_CALENDAR_DATA : $response = $this->set_calendar_data($payload); break;
			case self::SERVICE_UPDATE_CALENDAR_DATA : $response = $this->update_calendar_data($payload); break;
			case self::SERVICE_REMOVE_CALENDAR_DATA : $response = $this->remove_calendar_data($payload); break;
			case self::SERVICE_SET_CALENDAR_COMMENT : $response = $this->set_calendar_comment($payload); break;
			
			case self::SERVICE_MEMBERSHIP_PURCHASE : $response = $this->membership_purchase($payload); break;
			case self::SERVICE_PSS_PURCHASE : $response = $this->pss_purchase($payload); break;
			
			case self::SERVICE_LIKE_PAGE_DATA : $response = $this->like_page_data($payload); break;
			case self::SERVICE_UNLIKE_PAGE_DATE : $response = $this->unlike_page_data($payload); break;
			case self::SERVICE_LOVE_IT_PAGE_DATE : $response = $this->love_it_page_data($payload); break;
			case self::SERVICE_HATE_IT_PAGE_DATE : $response = $this->hate_it_page_data($payload); break;
			
			
			case self::SERVICE_PPQ_FOR_ISO : $response = $this->ppq_for_ios($payload); break;
			case self::SERVICE_RPQ_FOR_ISO : $response = $this->rpq_for_ios($payload); break;
			case self::SERVICE_WPQ_FOR_ISO : $response = $this->wpq_for_ios($payload); break;
			
			case self::SERVICE_CALENDAR_FOR_MOBILE : $this->calendar_for_mobile($payload); break;
			
			case self::AJAX_PCT_WALLET_TRANSFER : $response = $this->processPCTWalletTransfer($payload); break;
			case self::AJAX_PCT_WALLET_PAYMENT : $response = $this->process_pct_payment($payload); break;
			case self::AJAX_GET_TRANSACTION_HISTORY : $response = $this->get_transaction_history($payload); break;
			case self::AJAX_GET_WALLET_AMOUNT : $response = $this->get_wallet_amount($payload); break;
			
			case self::AJAX_ADD_EVENT : $response = $this->add_event($payload); break;
			
			
			case self::AJAX_GET_COMMUNICATION_OFFERS : $response = $this->get_communication_offers($payload); break;
			case self::AJAX_DECLINE_OFFER : $response = $this->decline_offer($payload); break;
			case self::AJAX_GET_MY_OFFERS : $response = $this->my_offer($payload); break;
			case self::AJAX_YIELD_SMART_CONTRACT : $response = $this->yield_smart_contract($payload); break;
			case self::AJAX_PROCESS_SMART_CONTRACT : $response = $this->process_smart_contract($payload); break;
			
			case self::AJAX_ACQUIRE_DATA : $response = $this->acquire_data($payload); break;
		}
		
		echo json_encode($response);
	}
	
	private function get_country_list()
	{
		$response = array();
		
		$this->load->model('country');
		
		$result = $this->country->getCountries();
		
		$response = array('flag'=>1,'result'=>$result);
		
		return $response;
	}
	
	private function get_terms_condition()
	{
		$response = array();
		
		$this->load->model('cms');
		
		$result = $this->cms->get_by_slug('user-tous');
		
		$response = array('flag'=>1,'result'=>$result);
		
		return $response;
	}
	
	private function get_whitepaper_content()
	{
	    $response = array();
	    
	    $this->load->model('cms');
	    
	    $result = $this->cms->get_by_slug('whitepaper');
	    
	    $response = array('flag'=>1,'result'=>$result);
	    
	    return $response;
	}
	
	private function get_club_rule_content()
	{
	    $response = array();
	    
	    $this->load->model('cms');
	    
	    $result = $this->cms->get_by_slug('club-laws');
	    
	    $response = array('flag'=>1,'result'=>$result);
	    
	    return $response;
	}
	
	
	private function validate_avatar_name($payload)
	{
		$response = array();
		
		if($this->input->post('avatar_name'))
		{
			$response = array();
			
			if($this->input->post('avatar_name'))
			{
				# Validate the avatar name, load model user
				$avatarName = $this->input->post('avatar_name');
				
				$this->load->model('user');
				
				$result = $this->user->isAvatarNameAvailable($avatarName);
				
				if($result)
				{
					$response = array('flag'=>0, 'This avatar name is already used, please try something else');
					return $response;
				}
				
				$response = array('flag'=>1, 'This avatar is available');
			}
		}
		
		return $response;
	}
	
	private function sign_up($payload)
	{
		$response = array();
		
		if($this->input->post('country') && $this->input->post('avatar_name') && $this->input->post('what_are_you') && $this->input->post('what_you_want_to_become') && $this->input->post('password') && $this->input->post('cpassword') && $this->input->post('device_id') && $this->input->post('device_token'))
		{
			$recommendor = $this->input->post('recommendor') ? $this->input->post('recommendor') : '';
			$country = $this->input->post('country');
			$avatarName = $this->input->post('avatar_name');
			$gender = $this->input->post('gender');
			
			$whatAreYou = $this->input->post('what_are_you');
			$whatYouWantToBecome = $this->input->post('what_you_want_to_become');
			$problemPreventing = $this->input->post('problem_preventing');
			
			$password = $this->input->post('password');
			$cpassword = $this->input->post('cpassword');
// 			$securityQuestion = $this->input->post('secret_question');			
// 			$securityQuestionAnswer = $this->input->post('secret_question_answer');

			$securityQuestion = '';
			$securityQuestionAnswer = '';
			
			$requiredSuggestion = $this->input->post('reqd_suggestion');
			
			# Validate if both passwords are equal
			if($password != $cpassword)
			{
				$response = array('flag'=> 0,'message'=>Message::PASSWORD_CONFIRM_PASSWORD_MATCH_FAILURE);
				return $response;
			}
			
			# Check to see if avatar name is already available for not
			
			$this->load->model('user');
			
			$result = $this->user->isAvatarNameAvailable($avatarName);
			
			if($result)
			{
				$response = array('flag'=> 0,'message'=>Message::AVATAR_NAME_ERROR);
				return $response;
			}
			
			# Next step is to validate the recommendor
			
			if($recommendor)
			{
				$result = $this->user->isAvatarNameAvailable($recommendor);
				
				if($result) $recommendor = $result->{User::_USERNAME};
			}
			
			# Check if Avatar image is available then store this in folder
			
			$avatarImage = '';
			if(isset($_FILES["avatar_image"]["name"]))
			{
				# Get Image and Create Thumb and upload
				
				$file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
				$upload_exts = explode(".", $_FILES["avatar_image"]["name"]);
				$upload_exts = end($upload_exts);
				
				if ((($_FILES["avatar_image"]["type"] == "image/gif") || ($_FILES["avatar_image"]["type"] == "image/jpeg") || ($_FILES["avatar_image"]["type"] == "image/png") || ($_FILES["avatar_image"]["type"] == "image/pjpeg")) && ($_FILES["avatar_image"]["size"] < 2000000) && in_array($upload_exts, $file_exts))
				{
					if ($_FILES["avatar_image"]["error"] > 0) { echo "Return Code: " . $_FILES["avatar_image"]["error"] . "<br>"; }
					else
					{
						# Generate Timestamp name for image name and upload
						$avatarImage = md5($_FILES["avatar_image"]["name"].microtime()).'.png';
						
						move_uploaded_file($_FILES["avatar_image"]["tmp_name"], Template::_PUBLIC_AVTAR_DIR . $avatarImage);
					}
				}
				else
				{
					echo "<div class='error'>Invalid file</div>";
				}
			}
			
			$userId = $this->user->sign_up($recommendor, $country, $avatarName, $avatarImage, $gender, $whatAreYou, $whatYouWantToBecome, $problemPreventing, $password, $securityQuestion, $securityQuestionAnswer, $requiredSuggestion);
			
			# Now since we have the user registered, we will register users device too, this will help in push notification
			
			# Load user devices model
			
			$deviceId = $this->input->post('device_id');
			$deviceToken = $this->input->post('device_token');
			$deviceType = $this->input->post('device_type');
						
			$this->load->model('user_devices_model','devices');
			$this->devices->register_user_device($userId, $deviceId, $deviceToken, $deviceType);
						
			if($userId)
			{
				$this->user->update_login_status($userId, 1);
				
				$response['flag']=1;
				$response['message'] = 'User registered successfully';
				$response['result'] = $this->user->getUserProfile($userId);
				$response['result']->membership_name = $this->user->get_user_membership($response['result']->{User::_USER_MEMBERSHIP_LEVEL});
			}
			else
			{
				$response['flag']=0;
				$response['message'] = 'Some Error : Please try again';
			}
			
		}
		else
		{
			$response = array('flag'=>0, 'message'=>"Unable to register, please provide required fields");
			return $response;
		}
		
		return $response;
	}
	
	/*
	 * Commented since now we have changed the registration process, so change in service too
	 *
	 private function sign_up($payload)
	 {
	 $registrationInfo = json_decode($this->input->post('registration-info'), true);
	 
	 $response = array();
	 
	 if(empty($registrationInfo))
	 {
	 $response['flag']=0;
	 $response['message'] = 'Some Error : Please try again';
	 }
	 else
	 {
	 $this->load->model('user');
	 
	 $userId = $this->user->sign_up($registrationInfo[0]);
	 
	 if($userId)
	 {
	 $response['flag']=1;
	 $response['message'] = 'User registered successfully';
	 $response['result'] = $this->user->getUserProfile($userId);
	 }
	 else
	 {
	 $response['flag']=0;
	 $response['message'] = 'Some Error : Please try again';
	 }
	 }
	 
	 return $response;
	 }
	 */
	private function sign_in($payload)
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$response = array();
		
		if(!empty($username) && !empty($password))
		{
			
			$this->load->model('user');
			$userId = $this->user->sign_in($username, $password);
						
			if($userId)
			{
			    

			    # Now since we have the user registered, we will register users device too, this will help in push notification
			    
			    # Load user devices model
			    
			    $deviceId = $this->input->post('device_id');
			    $deviceToken = $this->input->post('device_token');
			    $deviceType = $this->input->post('device_type');
			    	
			    $this->load->model('user_devices_model','devices');
	            $this->devices->update_user_device($userId, $deviceId, $deviceToken, $deviceType);
	        
				$response['flag']=1;
				$response['message'] = 'Logged in successfully';
				$response['result'] = $this->user->getUserProfile($userId);
				$response['result']->membership_name = $this->user->get_user_membership($response['result']->{User::_USER_MEMBERSHIP_LEVEL});
// 				
			}
			else
			{
				$response['flag']=0;
				$response['message'] = 'Invalid Username or Password';
			}
			
		}
		else
		{
			$response['flag']=0;
			$response['message'] = 'Please provide username and password first';
		}
		
		return $response;
	}
	
	private function recover_password_using_email($payload)
	{
		$response = array();
		$email = $this->input->post('email');
		
		# Get user based on email
		
		$this->load->model('user');
		$result = $this->user->getByEmail($email);
		
		if(count($result) == 0) $response = array('flag'=>0,'message'=>'No email matching our records, please check and try again');
		else
		{
			# Check if Email provided is admin email
			if($result->{User::_USER_GROUP} === User::USER_GROUP_LEVEL_ADMINISTRATOR)
			{
				$response = array('flag'=>0,'message'=>'Email provided is administrator email, please check and try again');
				return $response;
			}
			
			# Generate a new password hash, and Update password reset table for user
			
			$this->load->model('reset_password_model','resetPassword');
			
			$response = $this->resetPassword->create_password_hash($result->{User::_ID});
			
			if($response)
			{
				$data['name'] = $result->{User::_F_NAME} == " " ? $result->{User::_EMAIL} :  $result->{User::_EMAIL};
				$data['passwordHash'] = $response['passwordHash'];
				
				# Load View
				
				$body = $this->load->view('email_templates/reset_password', $data, TRUE);
				
				# Send Email and display message
				$response = $this->email_engine->reset_password($payload['email'], $body) ? array('flag'=>1,'message'=>'New password sent to '.$email.', please check your mailbox.') : array('flag'=>0,'message'=>'Not able to send email, please try again later');
				
			}
		}
		
		return $response;
	}
	
	private function logout_user($payload)
	{
		
	}
	
	private function recover_password_get_security_question($payload)
	{
		
	}
	
	private function get_user_profile($payload)
	{
		$response =  array();
		
		$userId = $this->input->post('user_id');
		
		if(empty($userId))
		{
			$response = array('flag'=>0, 'message'=>'Invalid UserId');
		}
		else
		{
			$this->load->model('user');
			$this->load->model('country');
						
			$result = $this->user->getUserProfile($userId);
			$result->membership_name = $this->user->get_user_membership($result->{User::_USER_MEMBERSHIP_LEVEL});
			$result->country = $this->country->get_by_id($result->{User::_COUNTRY}, Country::_COUNTRY_NAME);
			
			if($result)
			{
				$response = array('flag'=>1, 'result'=>$result, 'imagePath'=>base_url('assets/uploads/avtar'));
			}
			else
			{
				$response = array('flag'=>0, 'message'=>'No Such User exists');
			}
		}
		
		return $response;
	}
	
	private function update_user_profile($payload)
	{
		$response =  array();
		
		$userId = $this->input->post('user_id');
		
		if(empty($userId))
		{
			$response = array('flag'=>0, 'message'=>'Invalid UserId');
		}
		else
		{
			$this->load->model('user');
			
			$flag = false;
			
			if($this->input->post('first_name') && $this->input->post('email') && $this->input->post('country'))
			{
				# First step to check if user id is valid
				
				
				
				# Get Image and Create Thumb and upload
				
				$avtarImage = '';
				
				if(isset($_FILES["avatar_image"]))
				{
					$file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
					$upload_exts = explode(".", $_FILES["avatar_image"]["name"]);
					$upload_exts = end($upload_exts);
					
					if ((($_FILES["avatar_image"]["type"] == "image/gif") || ($_FILES["avatar_image"]["type"] == "image/jpeg") || ($_FILES["avatar_image"]["type"] == "image/png") || ($_FILES["avatar_image"]["type"] == "image/pjpeg")) && ($_FILES["avatar_image"]["size"] < 2000000) && in_array($upload_exts, $file_exts))
					{
						if ($_FILES["avatar_image"]["error"] > 0) { echo "Return Code: " . $_FILES["avatar_image"]["error"] . "<br>"; }
						else
						{
							# Generate Timestamp name for image name and upload
							$avtarImage = md5($_FILES["avatar_image"]["name"].microtime()).'.jpg';
							
							move_uploaded_file($_FILES["avatar_image"]["tmp_name"], Template::_PUBLIC_AVTAR_DIR . $avtarImage);
						}
					}
				}
				
				
				$this->load->model('user');
				
				$fname = $this->input->post('first_name');
				$lname = $this->input->post('last_name');
				$gender = $this->input->post('gender');
				$email = $this->input->post('email');
				$mobile = $this->input->post('mobile');
				$country = $this->input->post('country');
				$avtarName = $this->input->post('avatar_name');
				$secretQuestion = $this->input->post('secret_question');
				$secretAnswer = $this->input->post('secret_answer');
				$whatAreYou = $this->input->post('what_are_you');
				$whatYouWantToBecome = $this->input->post('what_you_want_to_become');
				$problemPreventing =$this->input->post('problem_preventing');
				
				$flag = $this->user->update_profile($userId, $fname, $lname, $email, $mobile, $country, $avtarName, $avtarImage, $gender, $secretQuestion, $secretAnswer, $whatAreYou, $whatYouWantToBecome, $problemPreventing);
				if($flag)
				{
					$response = array('flag'=>1, 'message'=>'Profile updated successfully', 'result'=>$this->user->getUserProfile($userId));
				}
				else
				{
					$response = array('flag'=>0, 'message'=>'Unable to update, please try again later');
				}
			}
			else
			{
				$response = array('flag'=>0, 'message'=>'Unable to update, please provide first name, email & country');
			}
		}
		
		
		return $response;
	}
	
	private function change_user_password($payload)
	{
		$response = array();
		
		$flag = false;
		if($this->input->post('password') && $this->input->post('cpassword') && $this->input->post('user_id'))
		{
			$userId = $this->input->post('user_id');
			$password = $this->input->post('password');
			$cpassword = $this->input->post('cpassword');
			
			if($password != $cpassword)
			{
				$response = array('flag'=>0, 'message'=>'Password and confirm password does not match');
				
				return $response;
			}
			
			$this->load->model('user');
			
			$flag = $this->user->update_user_password($userId, $password);
			if($flag)
			{
				$response = array('flag'=>1, 'message'=>'Password changed successfully');
			}
			else
			{
				$response = array('flag'=>0, 'message'=>'Unable change password, please try again later');
			}
			
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please provide password and confirm password first');
		}
		
		return $response;
	}
	
	private function user_ppq_detail($payload)
	{
		$response= array();
		
		if($this->input->post('user_id'))
		{
			$userId = $this->input->post('user_id');
			
			$this->load->model('user_questionnaire', 'qa');
			
			$result =  $this->qa->get_user_questionnaire($userId);
			
			$result1 = array();
			if(!empty($result))
			{
				# Load Questionnaire model
				$this->load->model('questionnaire');
				
				foreach ($result as $r)
				{
					$question = $this->questionnaire->getQuestionById($r->{User_questionnaire::_QUESTION_ID});
					
					$output = array();
					
					$output['id'] = $r->{User_questionnaire::_ID};
					$output['question_id'] = $r->{User_questionnaire::_QUESTION_ID};
					$output['question'] = $question->{Questionnaire::_QUESTION};
					
					switch ($question->{Questionnaire::_ANSWER_TYPE})
					{
						case Questionnaire::TYPE_CHECKBOX : $output['answer_type'] = 'checkbox'; break;
						case Questionnaire::TYPE_TEXTAREA : $output['answer_type'] = 'text'; break;
						case Questionnaire::TYPE_RADIO : $output['answer_type'] = 'radio'; break;
					}
					
					$output['answer'] = $r->{User_questionnaire::_ANSWER};
					
					$result1[] = $output;
				}
			}
			
			
			
			$response = array('flag'=>1, 'result'=>$result1);
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please login first');
		}
		
		return $response;
	}
	
	private function user_rpq_detail($payload)
	{
		$response= array();
		
		if($this->input->post('user_id'))
		{
			$userId = $this->input->post('user_id');
			
			$this->load->model('user_questionnaire', 'qa');
			
			$result =  $this->qa->get_user_rpq($userId);
			
			$result1 = array();
			if(!empty($result))
			{
				# Load Questionnaire model
				$this->load->model('questionnaire');
				
				foreach ($result as $r)
				{
					$question = $this->questionnaire->getQuestionById($r->{User_questionnaire::_QUESTION_ID});
					
					$output = array();
					
					$output['id'] = $r->{User_questionnaire::_ID};
					$output['question_id'] = $r->{User_questionnaire::_QUESTION_ID};
					$output['question'] = $question->{Questionnaire::_QUESTION};
					
					switch ($question->{Questionnaire::_ANSWER_TYPE})
					{
						case Questionnaire::TYPE_CHECKBOX : $output['answer_type'] = 'checkbox'; break;
						case Questionnaire::TYPE_TEXTAREA : $output['answer_type'] = 'text'; break;
						case Questionnaire::TYPE_RADIO : $output['answer_type'] = 'radio'; break;
					}
					
					$output['answer'] = $r->{User_questionnaire::_ANSWER};
					
					$result1[] = $output;
				}
			}
			
			
			
			$response = array('flag'=>1, 'result'=>$result1);
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please login first');
		}
		
		return $response;
	}
	
	private function user_wpq_detail($payload)
	{
		$response= array();
		
		if($this->input->post('user_id'))
		{
			$userId = $this->input->post('user_id');
			
			$this->load->model('user_questionnaire', 'qa');
			
			$result =  $this->qa->get_user_wpq($userId);
			
			$result1 = array();
			if(!empty($result))
			{
				# Load Questionnaire model
				$this->load->model('questionnaire');
				
				foreach ($result as $r)
				{
					$question = $this->questionnaire->getQuestionById($r->{User_questionnaire::_QUESTION_ID});
					
					$output = array();
					
					$output['id'] = $r->{User_questionnaire::_ID};
					$output['question_id'] = $r->{User_questionnaire::_QUESTION_ID};
					$output['question'] = $question->{Questionnaire::_QUESTION};
					
					switch ($question->{Questionnaire::_ANSWER_TYPE})
					{
						case Questionnaire::TYPE_CHECKBOX : $output['answer_type'] = 'checkbox'; break;
						case Questionnaire::TYPE_TEXTAREA : $output['answer_type'] = 'text'; break;
						case Questionnaire::TYPE_RADIO : $output['answer_type'] = 'radio'; break;
					}
					
					$output['answer'] = $r->{User_questionnaire::_ANSWER};
					
					$result1[] = $output;
				}
			}
			
			
			
			$response = array('flag'=>1, 'result'=>$result1);
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please login first');
		}
		
		return $response;
	}
	
	private function user_update_ppq_detail($payload)
	{
		$response= array();
		
		$flag = false;
		
		if($this->input->post('user_id'))
		{
			if($this->input->post('question1') && $this->input->post('question2') && $this->input->post('question3'))
			{
				# Load user questionnaire model
				
				$this->load->model('user_questionnaire', 'questionnaire');
				
				$questionnaire = array();
				
				for($i=1; $i<=17; $i++)
				{
					$questionnaire['q'.$i] = $this->input->post('question'.$i);
				}
				
				$flag = $this->questionnaire->update_user_questionnaire($this->input->post('user_id'), $questionnaire);
				
				if($flag)
				{
					$response = array('flag'=>1, 'message'=>'User ppq updated successfully');
				}
				else
				{
					$response = array('flag'=>0, 'message'=>'Error updating user ppq');
				}
			}
			else
			{
				$response = array('flag'=>0, 'message'=>'Please provide answer to questions');
			}
			
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please Login First');
		}
		
		return $response;
	}
	
	private function user_subscription($payload)
	{
		$response= array();
		
		if($this->input->post('user_id'))
		{
			# Load RSS Feed subscription model
			$this->load->model('rss_feed_subscription_model','rss');
			$this->load->model('page');
			$result = $this->rss->get_rss_feed_subscription_by_user_id($this->input->post('user_id'));
// 			pre($result);
			# Load Page Model for PSS
			$this->load->model('page');
			
			if($result)
			{
				$results = array();
				$subscriptionType = '';
				
				foreach ($result as $r)
				{
					
					$output = array();
					$output['id'] = $r->{Rss_feed_subscription_model::_ID};
					$output['subscription_type'] = $this->page->get_category($r->category_id);
					$output['subscribed_item'] = $r->page_title ;
					$results[] = $output;
				}
				$response = array('flag'=>1, 'result'=>$results);
			}
			else $response = array('flag'=>1, 'message'=>'No active subscriptions');
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please login first');
		}
		
		return $response;
		
	}
	
	private function user_invite($payload)
	{
		$response= array();
		
		if($this->input->post('user_id'))
		{
			if($this->input->post('user_email'))
			{
				# Check if user_email is already registerd with satan clause
				
				$this->load->model('user');
				
				if($this->user->isEmailAvailable($this->input->post('user_email')))
				{
					$response = array('flag'=>0, 'message'=>'User is already registered with satan clause');
					return $response;
				}
				
				
				if($this->input->post('coupon_code') == '')
				{
					$response = array('flag'=>0, 'message'=>'Please provide a coupon code');
					return $response;
				}
				
				# Validate coupon code
				
				$this->load->model('admin/coupon_model','coupon');
				
				$coupon = $this->coupon->validate_coupon_code($this->input->post('coupon_code'));
				if(!$coupon)
				{
					$response = array('flag'=>0, 'message'=>'Invalid coupon code or coupon expired');
					return $response;
				}
				
				# Now since validation is passed, we will now send the invitation to the user
				# Next step is to insert data in user invite table and generate a invitation link
				
				$this->load->model('user_invite','invite');
				
				$lastId = $this->invite->create_new_user_invite($this->input->post('user_id'), $this->input->post('user_email'), $this->input->post('coupon_code'), $coupon->{Coupon_model::_MEMBERSHIP_TYPE});
				
				# Get invitation hash by last id
				
				$data['email'] = $this->input->post('user_email');
				$data['invitationHash'] = $this->invite->get_hash_by_id($lastId);
				$data['couponCode'] = $this->input->post('coupon_code');
				
				# Load View
				
				$body = $this->load->view('email_templates/invite_new_user', $data, TRUE);
				
				# Next is to send an email to the user
				
				$flag = $this->email_engine->send_invitation_to_join($this->input->post('user_email'), $body);
				
				if($flag) $response = array('flag'=>1,'message'=>"Invitation sent successfully");
				else $response = array('flag'=>0,'message'=>'Unable to send invitation, Please try again later');
				
			}
			else
			{
				$response = array('flag'=>0, 'message'=>'Please provide email first');
			}
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please login first');
		}
		
		return $response;
	}
	
	private function get_user_tous($payload)
	{
		$response = array();
		
		if($this->input->post('user_id'))
		{
			# Get user membership level first to check which TOUS needs to be returned
			
			$this->load->model('user');
			$result = $this->user->getUserProfile($this->input->post('user_id'));
			
			# Load CMS model
			$this->load->model('cms');
			
			if($result->{User::_USER_MEMBERSHIP_LEVEL} <=3 && $result->{User::_USER_MEMBERSHIP_LEVEL} !=1)
			{
				# Return user tous
				$response = array('flag'=>1, 'result' => $this->cms->get_by_slug('user-tous'));
			}
			else
			{
				# Return membership tous
				$response = array('flag'=>1, 'result' => $this->cms->get_by_slug('member-tous'));
			}
			
		}
		else
		{
			$response=array('flag'=>0, 'message'=>'Please login first');
		}
		
		return $response;
	}
	
	
	
	private function user_update_rpq_detail($payload)
	{
		$response= array();
		
		$flag = false;
		
		if(!$this->input->post('user_id'))
		{
			$response = array('flag'=>0, 'message'=>'Please login first');
			return $response;
		}
		
		
		# Load user questionnaire model
		
		$this->load->model('user_questionnaire', 'questionnaire');
		
		$questionnaire = array();
		
		for($i=1; $i<17; $i++)
		{
			$questionnaire['q'.$i] = $this->input->post('question'.$i);
		}
		
		$flag = $this->questionnaire->update_user_wpq($this->input->post('user_id'), $questionnaire);
		
		if($flag)
		{
			$response = array('flag'=>1, 'message'=>'User ppq updated successfully');
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Error updating user ppq');
		}
		
		return $response;
	}
	
	private function user_update_wpq_detail($payload)
	{
		$response= array();
		
		$flag = false;
		
		if(!$this->input->post('user_id'))
		{
			$response = array('flag'=>0, 'message'=>'Please login first');
			return $response;
		}
		
		
		# Load user questionnaire model
		
		$this->load->model('user_questionnaire', 'questionnaire');
		
		$questionnaire = array();
		
		for($i=1; $i<17; $i++)
		{
			$questionnaire['q'.$i] = $this->input->post('question'.$i);
		}
		
		$flag = $this->questionnaire->update_user_wpq($this->input->post('user_id'), $questionnaire);
		
		if($flag)
		{
			$response = array('flag'=>1, 'message'=>'User ppq updated successfully');
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Error updating user ppq');
		}
		
		return $response;
	}
	
	private function get_blogs($payload)
	{
		$response= array();
		$this->load->model('blog_post', 'blog');
		
		$result= $this->blog->getPosts('', '');
		
		if($result)
		{
			$response=array('flag'=>1, 'result'=>$result);
		}
		else
		{
			$response=array('flag'=>0, 'message'=>'Sorry, No Records Founds');
		}
		return $response;
	}
	
	private function get_blog_detail($payload)
	{
		$response= array();
		
		$blogId = $this->input->post('blog_id');
		
		if(!empty($blogId))
		{
			$this->load->model('blog_post', 'blog');
			
			$result = $this->blog->getPostById($blogId);
			
			if($result)
			{
				$response = array('flag'=>1,'result'=>$result);
			}
			else
			{
				$response = array('flag'=>0,'message'=>'Invalid blog id');
			}
		}
		
		return $response;
	}
	
	private function create_new_blog($payload)
	{
		$response = array();
		
		if($this->input->post('user_id') && $this->input->post('title') && $this->input->post('content') && $this->input->post('visibility'))
		{
			$this->load->model('blog_post','blog');
			
			
			$userId =  $this->input->post('user_id');
			$title=  $this->input->post('title');
			$content =  $this->input->post('content');
			$anonymous =  $this->input->post('anonymous') ? 1 : 0;
			$visibility =  $this->input->post('visibility');
			$points=  $this->input->post('points');
			
			$result = $this->blog->createNewPost($userId, $title, $content, $anonymous, $visibility, $points);
			
			if($result)
			{
				$response = array('flag'=>1, 'message'=>'Blog post created successfully');
			}
			else
			{
				$response = array('flag'=>0, 'message'=>'Error creating blog post');
			}
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please provide title, content and visibility first');
		}
		
		
		return $response;
	}
	
	private function create_blog_answer($payload)
	{
		
	}
	
	private function get_products($payload)
	{
		$response =  array();
		
		# Check user id first
		
		if($this->input->post('user_id') || $this->input->post('user') !='')
		{
			# Now since we have the user_id lets get membership level of user
			
			# Load user model
			$this->load->model('user');
			
			$result = $this->user->getUserProfile($this->input->post('user_id'));
			
			# Membership level
			
			$membershipLevel = $result->{User::_USER_MEMBERSHIP_LEVEL};
			
			
			$this->load->model('page');
			
			$result=$this->page->get_by_category(Page::_CATEGORY_PRODUCT, 5, 'desc', $membershipLevel);
			
			if ($result)
			{
				$response = array('flag'=>1, 'message'=>$result);
			}
			else
			{
				$response = array('flag'=>0, 'message'=>'Unable to process your request');
			}
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please login first');
		}
		
		return $response;
	}
	
	private function get_product_detail($payload)
	{
		$response= array();
		
		if($this->input->post('product_id'))
		{
			$this->load->model('page');
			
			$productId = $this->input->post('product_id');
			
			$result= $this->page->get_by_id($productId);
			
			if($result)
			{
				$response=array('flag'=>1, 'result'=>$result);
			}
			else
			{
				$response=array('flag'=>0, 'message'=>'Sorry, No Records Founds');
			}
		}
		else
		{
			$response = array('flag'=>1, 'message'=>'Unable to process your request');
		}
		
		return $response;
	}
	
	private function create_new_product($payload)
	{
		if($this->input->post('user_id'))
		{
			# First step is to get the membership level for the user
			
			$this->load->model('user');
			
			$userId = $this->input->post('user_id');
			
			$result = $this->user->getUserProfile($userId);
			
			if($result->{User::_USER_MEMBERSHIP_LEVEL} < 2)
			{
				$response = array('flag'=>0, 'message'=>'Unable to process your request, Only upgraded user and members can create product');
				return $response;
			}
			
			if($this->input->post('visibility') && $this->input->post('title') && $this->input->post('description'))
			{
				$this->load->model('page');
				
				$visibility = $this->input->post('visibility');
				$title = $this->input->post('title');
				$description = $this->input->post('description');
				$anonymous = $this->input->post('anonymous') ? 1 : 0;
				$countriesAvailableIn = $this->input->post('countries');
				$price = $this->input->post('price');
				$submodility = $this->input->post('submodility');
				
				$mod1 = $this->input->post('visual_images_val');
				$mod2 = $this->input->post('visual_motion');
				$mod3 = $this->input->post('visual_motion_val');
				$mod4 = $this->input->post('visual_color');
				$mod5 = $this->input->post('visual_color_val');
				$mod6 = $this->input->post('visual_bright');
				$mod7 = $this->input->post('visual_bright_val');
				$mod8 = $this->input->post('visual_focused');
				$mod9 = $this->input->post('visual_focused_val');
				$mod10 = $this->input->post('visual_bordered');
				$mod11 = $this->input->post('visual_bordered_val');
				$mod12 = $this->input->post('visual_associated');
				$mod13 = $this->input->post('visual_associated_val');
				$mod14 = $this->input->post('visual_center');
				$mod15 = $this->input->post('visual_center_val');
				$mod16 = $this->input->post('visual_size_val');
				$mod17 = $this->input->post('visual_shape_val');
				$mod18 = $this->input->post('visual_flat');
				$mod19 = $this->input->post('visual_flat_val');
				$mod20 = $this->input->post('visual_close');
				$mod21 = $this->input->post('visual_close_val');
				$mod22 = $this->input->post('visual_panormic');
				$mod23 = $this->input->post('visual_panormic_val');
				$mod24 = $this->input->post('auditory_sound_val');
				$mod25 = $this->input->post('auditory_volume_val');
				$mod26 = $this->input->post('auditory_tone_val');
				$mod27 = $this->input->post('auditory_tempo_val');
				$mod28 = $this->input->post('auditory_pitch_val');
				$mod29 = $this->input->post('auditory_pace_val');
				$mod30 = $this->input->post('auditory_timbre_val');
				$mod31 = $this->input->post('auditory_duration_val');
				$mod32 = $this->input->post('auditory_intensity_val');
				$mod33 = $this->input->post('auditory_rhythm_val');
				$mod34 = $this->input->post('auditory_direction_val');
				$mod35 = $this->input->post('auditory_harmony_val');
				$mod36 = $this->input->post('auditory_ear_val');
				$mod37 = $this->input->post('kinesthic_breating_val');
				$mod38 = $this->input->post('kinesthic_pulse_val');
				$mod39 = $this->input->post('kinesthic_skin_val');
				$mod40 = $this->input->post('kinesthic_weight_val');
				$mod41 = $this->input->post('kinesthic_pressure_val');
				$mod42 = $this->input->post('kinesthic_intensity_val');
				$mod43 = $this->input->post('kinesthic_tactile_val');
				$mod44 = $this->input->post('olafactory_sweet_val');
				$mod45 = $this->input->post('olafactory_sour_val');
				$mod46 = $this->input->post('olafactory_salt_val');
				$mod47 = $this->input->post('olafactory_bitter_val');
				$mod48 = $this->input->post('olafactory_aroma_val');
				$mod49 = $this->input->post('olafactory_fragrance_val');
				$mod50 = $this->input->post('olafactory_essence_val');
				$mod51 = $this->input->post('olafactory_pungence_val');
				$mod52 = $this->input->post('kinesthic_location_in_body_val');
				
				
				$result = $this->page->create_page(Page::_CATEGORY_PRODUCT, $userId, $visibility, $title, $description, $anonymous, $countriesAvailableIn, $price, $submodility);
				
				if($result)
				{
					# Once we have pss created lets create submodility
					
					$this->load->model('page_submodility','submodility');
					
					$this->submodility->update_page_submodility($result, $mod1, $mod2, $mod3, $mod4, $mod5, $mod6, $mod7, $mod8, $mod9, $mod10, $mod11, $mod12, $mod13, $mod14, $mod15, $mod16, $mod17, $mod18, $mod19, $mod20, $mod21, $mod22, $mod23, $mod24, $mod25, $mod26, $mod27, $mod28, $mod29, $mod30, $mod31, $mod32, $mod33, $mod34, $mod35, $mod36, $mod37, $mod38, $mod39, $mod40, $mod41, $mod42, $mod43, $mod44, $mod45, $mod46, $mod47, $mod48, $mod49, $mod50, $mod51, $mod52);
					$response = array('flag'=>1, 'message'=>'Product created successfully');
					return $response;
				}
				else
				{
					$response = array('flag'=>0, 'message'=>'Unable to create product, please check the form once');
					return $response;
				}
			}
			else
			{
				$response = array('flag'=>0, 'message'=>'Please provide title and description and product visibility');
				return $response;
			}
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Unable to process your request, Please login first');
		}
		
		return $response;
		
	}
	
	
	private function get_services($payload)
	{
		
		$response =  array();
		
		# Check user id first
		
		if($this->input->post('user_id') || $this->input->post('user') !='')
		{
			# Now since we have the user_id lets get membership level of user
			
			# Load user model
			$this->load->model('user');
			
			$result = $this->user->getUserProfile($this->input->post('user_id'));
			
			# Membership level
			
			$membershipLevel = $result->{User::_USER_MEMBERSHIP_LEVEL};
			
			
			$this->load->model('page');
			
			$result=$this->page->get_by_category(Page::_CATEGORY_SERVICE, 5, 'desc', $membershipLevel);
			
			if ($result)
			{
				$response = array('flag'=>1, 'message'=>$result);
			}
			else
			{
				$response = array('flag'=>0, 'message'=>'Unable to process your request');
			}
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please login first');
		}
		
		return $response;
		
	}
	
	private function get_service_detail($payload)
	{
		$response= array();
		
		if($this->input->post('service_id'))
		{
			$this->load->model('page');
			
			$serviceId = $this->input->post('service_id');
			
			$result= $this->page->get_by_id($serviceId);
			
			if($result)
			{
				$response=array('flag'=>1, 'result'=>$result);
			}
			else
			{
				$response=array('flag'=>0, 'message'=>'Sorry, No Records Founds');
			}
		}
		else
		{
			$response = array('flag'=>1, 'message'=>'Unable to process your request');
		}
		
		return $response;
	}
	
	private function create_new_service($payload)
	{
		if($this->input->post('user_id'))
		{
			# First step is to get the membership level for the user
			
			$this->load->model('user');
			
			$userId = $this->input->post('user_id');
			
			$result = $this->user->getUserProfile($userId);
			
			if($result->{User::_USER_MEMBERSHIP_LEVEL} < 2)
			{
				$response = array('flag'=>0, 'message'=>'Unable to process your request, Only upgraded user and members can create service');
				return $response;
			}
			
			if($this->input->post('visibility') && $this->input->post('title') && $this->input->post('description'))
			{
				$this->load->model('page');
				
				$visibility = $this->input->post('visibility');
				$title = $this->input->post('title');
				$description = $this->input->post('description');
				$anonymous = $this->input->post('anonymous') ? 1 : 0;
				$countriesAvailableIn = $this->input->post('countries');
				$price = $this->input->post('price');
				$submodility = $this->input->post('submodility');
				
				$mod1 = $this->input->post('visual_images_val');
				$mod2 = $this->input->post('visual_motion');
				$mod3 = $this->input->post('visual_motion_val');
				$mod4 = $this->input->post('visual_color');
				$mod5 = $this->input->post('visual_color_val');
				$mod6 = $this->input->post('visual_bright');
				$mod7 = $this->input->post('visual_bright_val');
				$mod8 = $this->input->post('visual_focused');
				$mod9 = $this->input->post('visual_focused_val');
				$mod10 = $this->input->post('visual_bordered');
				$mod11 = $this->input->post('visual_bordered_val');
				$mod12 = $this->input->post('visual_associated');
				$mod13 = $this->input->post('visual_associated_val');
				$mod14 = $this->input->post('visual_center');
				$mod15 = $this->input->post('visual_center_val');
				$mod16 = $this->input->post('visual_size_val');
				$mod17 = $this->input->post('visual_shape_val');
				$mod18 = $this->input->post('visual_flat');
				$mod19 = $this->input->post('visual_flat_val');
				$mod20 = $this->input->post('visual_close');
				$mod21 = $this->input->post('visual_close_val');
				$mod22 = $this->input->post('visual_panormic');
				$mod23 = $this->input->post('visual_panormic_val');
				$mod24 = $this->input->post('auditory_sound_val');
				$mod25 = $this->input->post('auditory_volume_val');
				$mod26 = $this->input->post('auditory_tone_val');
				$mod27 = $this->input->post('auditory_tempo_val');
				$mod28 = $this->input->post('auditory_pitch_val');
				$mod29 = $this->input->post('auditory_pace_val');
				$mod30 = $this->input->post('auditory_timbre_val');
				$mod31 = $this->input->post('auditory_duration_val');
				$mod32 = $this->input->post('auditory_intensity_val');
				$mod33 = $this->input->post('auditory_rhythm_val');
				$mod34 = $this->input->post('auditory_direction_val');
				$mod35 = $this->input->post('auditory_harmony_val');
				$mod36 = $this->input->post('auditory_ear_val');
				$mod37 = $this->input->post('kinesthic_breating_val');
				$mod38 = $this->input->post('kinesthic_pulse_val');
				$mod39 = $this->input->post('kinesthic_skin_val');
				$mod40 = $this->input->post('kinesthic_weight_val');
				$mod41 = $this->input->post('kinesthic_pressure_val');
				$mod42 = $this->input->post('kinesthic_intensity_val');
				$mod43 = $this->input->post('kinesthic_tactile_val');
				$mod44 = $this->input->post('olafactory_sweet_val');
				$mod45 = $this->input->post('olafactory_sour_val');
				$mod46 = $this->input->post('olafactory_salt_val');
				$mod47 = $this->input->post('olafactory_bitter_val');
				$mod48 = $this->input->post('olafactory_aroma_val');
				$mod49 = $this->input->post('olafactory_fragrance_val');
				$mod50 = $this->input->post('olafactory_essence_val');
				$mod51 = $this->input->post('olafactory_pungence_val');
				$mod52 = $this->input->post('kinesthic_location_in_body_val');
				
				
				
				$result = $this->page->create_page(Page::_CATEGORY_SERVICE, $userId, $visibility, $title, $description, $anonymous, $countriesAvailableIn, $price, $submodility);
				
				if($result)
				{
					# Once we have pss created lets create submodility
					
					$this->load->model('page_submodility','submodility');
					
					$this->submodility->update_page_submodility($result, $mod1, $mod2, $mod3, $mod4, $mod5, $mod6, $mod7, $mod8, $mod9, $mod10, $mod11, $mod12, $mod13, $mod14, $mod15, $mod16, $mod17, $mod18, $mod19, $mod20, $mod21, $mod22, $mod23, $mod24, $mod25, $mod26, $mod27, $mod28, $mod29, $mod30, $mod31, $mod32, $mod33, $mod34, $mod35, $mod36, $mod37, $mod38, $mod39, $mod40, $mod41, $mod42, $mod43, $mod44, $mod45, $mod46, $mod47, $mod48, $mod49, $mod50, $mod51, $mod52);
					
					$response = array('flag'=>1, 'message'=>'Service created successfully');
					return $response;
				}
				else
				{
					$response = array('flag'=>0, 'message'=>'Unable to create service, please check the form once');
					return $response;
				}
			}
			else
			{
				$response = array('flag'=>0, 'message'=>'Please provide title and description and product visibility');
				return $response;
			}
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Unable to process your request, Please login first');
		}
		
		return $response;
	}
	
	
	private function get_sensations($payload)
	{
		$response =  array();
		
		# Check user id first
		
		if($this->input->post('user_id') || $this->input->post('user') !='')
		{
			# Now since we have the user_id lets get membership level of user
			
			# Load user model
			$this->load->model('user');
			
			$result = $this->user->getUserProfile($this->input->post('user_id'));
			
			# Membership level
			
			$membershipLevel = $result->{User::_USER_MEMBERSHIP_LEVEL};
			
			
			$this->load->model('page');
			
			$result=$this->page->get_by_category(Page::_CATEGORY_SENSES, 5, 'desc', $membershipLevel);
			
			if ($result)
			{
				$response = array('flag'=>1, 'message'=>$result);
			}
			else
			{
				$response = array('flag'=>0, 'message'=>'Unable to process your request');
			}
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please login first');
		}
		
		return $response;
	}
	
	private function get_sensation_detail($payload)
	{
		$response= array();
		
		if($this->input->post('sensation_id'))
		{
			$this->load->model('page');
			
			$sensationId = $this->input->post('sensation_id');
			
			$result= $this->page->get_by_id($sensationId);
			
			if($result)
			{
				$response=array('flag'=>1, 'result'=>$result);
			}
			else
			{
				$response=array('flag'=>0, 'message'=>'Sorry, No Records Founds');
			}
		}
		else
		{
			$response = array('flag'=>1, 'message'=>'Unable to process your request');
		}
		
		return $response;
	}
	
	private function create_new_sensation($paylaod)
	{
		if($this->input->post('user_id'))
		{
			# First step is to get the membership level for the user
			
			$this->load->model('user');
			
			$userId = $this->input->post('user_id');
			
			$result = $this->user->getUserProfile($userId);
			
			if($result->{User::_USER_MEMBERSHIP_LEVEL} < 2)
			{
				$response = array('flag'=>0, 'message'=>'Unable to process your request, Only upgraded user and members can create service');
				return $response;
			}
			
			if($this->input->post('visibility') && $this->input->post('title') && $this->input->post('description'))
			{
				$this->load->model('page');
				
				$visibility = $this->input->post('visibility');
				$title = $this->input->post('title');
				$description = $this->input->post('description');
				$anonymous = $this->input->post('anonymous') ? 1 : 0;
				$countriesAvailableIn = $this->input->post('countries');
				$price = $this->input->post('price');
				$submodility = $this->input->post('submodility');
				
				$mod1 = $this->input->post('visual_images_val');
				$mod2 = $this->input->post('visual_motion');
				$mod3 = $this->input->post('visual_motion_val');
				$mod4 = $this->input->post('visual_color');
				$mod5 = $this->input->post('visual_color_val');
				$mod6 = $this->input->post('visual_bright');
				$mod7 = $this->input->post('visual_bright_val');
				$mod8 = $this->input->post('visual_focused');
				$mod9 = $this->input->post('visual_focused_val');
				$mod10 = $this->input->post('visual_bordered');
				$mod11 = $this->input->post('visual_bordered_val');
				$mod12 = $this->input->post('visual_associated');
				$mod13 = $this->input->post('visual_associated_val');
				$mod14 = $this->input->post('visual_center');
				$mod15 = $this->input->post('visual_center_val');
				$mod16 = $this->input->post('visual_size_val');
				$mod17 = $this->input->post('visual_shape_val');
				$mod18 = $this->input->post('visual_flat');
				$mod19 = $this->input->post('visual_flat_val');
				$mod20 = $this->input->post('visual_close');
				$mod21 = $this->input->post('visual_close_val');
				$mod22 = $this->input->post('visual_panormic');
				$mod23 = $this->input->post('visual_panormic_val');
				$mod24 = $this->input->post('auditory_sound_val');
				$mod25 = $this->input->post('auditory_volume_val');
				$mod26 = $this->input->post('auditory_tone_val');
				$mod27 = $this->input->post('auditory_tempo_val');
				$mod28 = $this->input->post('auditory_pitch_val');
				$mod29 = $this->input->post('auditory_pace_val');
				$mod30 = $this->input->post('auditory_timbre_val');
				$mod31 = $this->input->post('auditory_duration_val');
				$mod32 = $this->input->post('auditory_intensity_val');
				$mod33 = $this->input->post('auditory_rhythm_val');
				$mod34 = $this->input->post('auditory_direction_val');
				$mod35 = $this->input->post('auditory_harmony_val');
				$mod36 = $this->input->post('auditory_ear_val');
				$mod37 = $this->input->post('kinesthic_breating_val');
				$mod38 = $this->input->post('kinesthic_pulse_val');
				$mod39 = $this->input->post('kinesthic_skin_val');
				$mod40 = $this->input->post('kinesthic_weight_val');
				$mod41 = $this->input->post('kinesthic_pressure_val');
				$mod42 = $this->input->post('kinesthic_intensity_val');
				$mod43 = $this->input->post('kinesthic_tactile_val');
				$mod44 = $this->input->post('olafactory_sweet_val');
				$mod45 = $this->input->post('olafactory_sour_val');
				$mod46 = $this->input->post('olafactory_salt_val');
				$mod47 = $this->input->post('olafactory_bitter_val');
				$mod48 = $this->input->post('olafactory_aroma_val');
				$mod49 = $this->input->post('olafactory_fragrance_val');
				$mod50 = $this->input->post('olafactory_essence_val');
				$mod51 = $this->input->post('olafactory_pungence_val');
				
				$result = $this->page->create_page(Page::_CATEGORY_SENSES, $userId, $visibility, $title, $description, $anonymous, $countriesAvailableIn, $price, $submodility);
				
				if($result)
				{
					# Once we have pss created lets create submodility
					
					$this->load->model('page_submodility','submodility');
					
					$this->submodility->update_page_submodility($result, $mod1, $mod2, $mod3, $mod4, $mod5, $mod6, $mod7, $mod8, $mod9, $mod10, $mod11, $mod12, $mod13, $mod14, $mod15, $mod16, $mod17, $mod18, $mod19, $mod20, $mod21, $mod22, $mod23, $mod24, $mod25, $mod26, $mod27, $mod28, $mod29, $mod30, $mod31, $mod32, $mod33, $mod34, $mod35, $mod36, $mod37, $mod38, $mod39, $mod40, $mod41, $mod42, $mod43, $mod44, $mod45, $mod46, $mod47, $mod48, $mod49, $mod50, $mod51);
					
					$response = array('flag'=>1, 'message'=>'Sensation created successfully');
					return $response;
				}
				else
				{
					$response = array('flag'=>0, 'message'=>'Unable to create sensation, please check the form once');
					return $response;
				}
			}
			else
			{
				$response = array('flag'=>0, 'message'=>'Please provide title and description and product visibility');
				return $response;
			}
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Unable to process your request, Please login first');
		}
		
		return $response;
	}
	
	
	private function get_symptom($paylaod)
	{
		$response = array();
		
		$this->load->model('symptom_model','symptom');
		
		$result=$this->symptom->getAllSymptoms();
		
		if ($result)
		{
			$response = array('flag'=>1, 'result'=>$result);
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'No Records');
		}
		
		return $response;
	}
	
	private function get_symptom_detail($payload)
	{
		$response = array();
		
		$symptomId = $this->input->post('symptom_id');
		
		if(!empty($symptomId))
		{
			$this->load->model('symptom_model','symptom');
			
			$result= $this->symptom->getSymptomById($symptomId);
			
			if($result)
			{
				$response=array('flag'=>1, 'message'=>$result);
			}
			else
			{
				$response=array('flag'=>0, 'message'=>'Sorry, No Records Founds');
			}
		}
		else
		{
			$response=array('flag'=>0, 'message'=>'Unable to process your request');
		}
		
		return $response;
	}
	
	private function create_new_symptom($payload)
	{
		$response = array();
		
		if($this->input->post('user_id'))
		{
			if($this->input->post('title') && $this->input->post('description'))
			{
				$this->load->model('symptom_model','symptom');
				
				$userId = $this->input->post('user_id');
				$symptom = $this->input->post('title');
				$symptomDescription = $this->input->post('description');
				$anonymous = $this->input->post('anonymous') ? 1 : 0;
				
				$result = $this->symptom->createUserSymptom($userId, $symptom, $symptomDescription, $anonymous);
				
				if($result)
				{
					$response = array('flag'=>0, 'message'=>'Symptom Created Successfully');
				}
				else
				{
					$response = array('flag'=>0, 'message'=>'Unable to process your request');
				}
			}
			else
			{
				$response = array('flag'=>0, 'message'=>'Please provide symptom title and description');
			}
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please Login First');
		}
		
		return $response;
		
	}
	
	private function create_symptom_answer($payload)
	{
		$response = array();
		
		if($this->input->post('user_id'))
		{
			if($this->input->post('answer') && $this->input->post('symptom_id'))
			{
				$symptomId = $this->input->post('symptom_id');
				$answer = $this->input->post('answer');
				$anonymous = $this->input->post('anonymous') ? 1 : 0;
				
				$this->load->model('symptom_answer','answer');
				
				$result = $this->answer->createSymptomAnswer($symptomId, $answer, $anonymous);
				
				if($result)
				{
					$response = array('flag'=>1, 'message'=>'Symptom answer created successfully');
				}
				else
				{
					$response = array('flag'=>0, 'message'=>'Unable to create symptom answer');
				}
			}
			else
			{
				$response = array('flag'=>0, 'message'=>'Please enter some answer first');
			}
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please Login First');
		}
		
		return $response;
	}
	
	
	private function get_faqs($payload)
	{
		$response = array();
		
		$this->load->model('faq_model','faq');
		
		$result = $this->faq->get_all_question_with_answer();
		
		$response = array('flag'=>1, 'result'=>$result);
		
		return $response;
	}
	
	private function get_faq_detail($payload)
	{
		$response = array();
		
		if($this->input->post('faq_id'))
		{
			$this->load->model('faq_model','faq');
			
			$result = $this->faq->getQuestionById($this->input->post('faq_id'));
			
			if($result)
			{
				$response = array('flag'=>1, 'result'=>$result);
			}
			else
			{
				$response = array('flag'=>1, 'result'=>'Blog id does not exists');
			}
			
		}
		else
		{
			$response = array('flag'=>1, 'result'=>'Some error processing your request');
		}
		
		return $response;
	}
	
	private function create_new_faq($payload)
	{
		$response = array();
		
		if($this->input->post('question'))
		{
			$question = $this->input->post('question');
			$anonymous = $this->input->post('anonymous') ? 1 : 0;
			$userId = $this->input->post('user_id');
			
			$this->load->model('faq_model','faq');
			
			$result = $this->faq->new_faq($question, $anonymous, $userId);
			
			if($result) $response = array('flag'=>1,'message'=>'Faq question posted successfully');
			else $response = array('flag'=>0,'message'=>'Unable to post faq question');
		}
		else
		{
			$response = array('flag'=>0,'message'=>'Enter some question first');
		}
		
		
		return $response;
	}
	
	private function create_faq_answer($payload)
	{
		$response = array();
		
		if(!$this->input->post('user_id'))
		{
		    $response = array('flag'=>0, 'message'=>'OOPS ! Unable to process your request');
		    return $response;
		}
		
		if($this->input->post('question_id') && $this->input->post('answer'))
		{
			$questionId = $this->input->post('question_id');
			$answer = $this->input->post('answer');
			$anonymous = $this->input->post('anonymous') ? 1 : 0;
			$userId = $this->input->post('user_id');
			
			$this->load->model('faq_answer','answer');
			
			$result = $this->answer->createFaqAnswer($questionId, $answer, $anonymous, $userId);
			
			if($result) $response = array('flag'=>1,'message'=>'Answer posted successfully');
			else $response = array('flag'=>0,'message'=>'Unable to post answer');
		}
		else
		{
			$response = array('flag'=>0,'message'=>'Unable to process request');
		}
		
		return $response;
	}
	
	
	private function create_new_feedback($payload)
	{
		$response = array();
		
		if($this->input->post('email') && $this->input->post('comment'))
		{
			$this->load->model('feedback');
			
			$lastId = $this->feedback->create_feedback($this->input->post('email'), $this->input->post('website'), $this->input->post('response'), $this->input->post('comment'));
			
			if($lastId)
			{
				$response = array('flag'=>1, 'message'=>'Feedback submitted successfully');
			}
			else
			{
				$response = array('flag'=>0, 'message'=>'Unable to submit feedback');
			}
		}
		
		return $response;
	}
	
	
	private function get_library_contents($payload)
	{
		$response = array();
		
		# Library consists of Product/ Service/ Sensation and Symptoms, Lets return these in this Service
		
		$userId = $this->input->post('user_id');
		
		if(!empty($userId))
		{
			$result = array();
			
			$this->load->model('page');
			$this->load->model('symptom_model','symptom');
			
			$result['product'] = $this->page->get_by_category_n_user(Page::_CATEGORY_PRODUCT, $userId);
			$result['sensation'] = $this->page->get_by_category_n_user(Page::_CATEGORY_SENSES, $userId);
			$result['service'] = $this->page->get_by_category_n_user(Page::_CATEGORY_SERVICE, $userId);
			$result['symptom'] = $this->symptom->get_symptom_by_user($userId);
			
			$response = array('flag'=>1, 'result'=>$result);
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Unable to process your request, Please login first');
		}
		
		return $response;
	}
	
	
	private function get_lean_canvas_content($payload)
	{
		$response = array();
		
		$this->load->model('cms');
		
		$result = $this->cms->get_by_slug('lean-canvas-spaceage-guru');
		
		$response = array('flag'=>1, 'result'=>$result);
		
		return $response;
	}
	
	private function get_remainder_service_content($payload)
	{
		$response = array();
		
		$this->load->model('membership_model','membership');
		
		$result = $this->membership->get_membership_by_slug('reminder-service');
		
		$response = array('flag'=>1, 'result'=>$result);
		
		return $response;
	}
	
	private function purchase_remainder_service($payload)
	{
		$response = array();
		
		return $response;
	}
	
	private function get_number_game_content($payload)
	{
		$response = array();
		
		$this->load->model('page');
		
		$result = $this->page->get_by_slug('the-number-game');
		
		$response = array('flag'=>1, 'result'=>$result);
		
		return $response;
	}
	
	private function get_shop_products($payload)
	{
		$response = array();
		
		if($this->input->post('user_id'))
		{
			# Now since we have the user id, we will check for the membership level
			
			# Load user model and check details
			$this->load->model('user');
			$result = $this->user->getUserProfile($this->input->post('user_id'));
			
			if($result->{User::_USER_MEMBERSHIP_LEVEL} == 1)
			{
				$response = array('flag'=>0, 'message'=>'Please upgrade to registed member first');
				return $response;
			}
			
			# Since user membership level is > 1, next step is to get products from membership table based on the membership level
			
			# Load membership model
			
			$this->load->model('membership_model', 'membership');
			$response = $this->membership->get_shop_products($result->{User::_USER_MEMBERSHIP_LEVEL});
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please login first');
		}
		return $response;
	}
	
	private function get_shop_product_detail($payload)
	{
		$response = array();
		
		if($this->input->post('user_id'))
		{
			# Now since we have the user id, we will check for the membership level
			
			# Load user model and check details
			$this->load->model('user');
			$result = $this->user->getUserProfile($this->input->post('user_id'));
			
			if($result->{User::_USER_MEMBERSHIP_LEVEL} == 1)
			{
				$response = array('flag'=>0, 'message'=>'Please upgrade to registed member first');
				return $response;
			}
			
			# Since user membership level is > 1, next step is to get products from membership table based on the membership level
			
			# Check shop product id exists
			
			if(!$this->input->post('shop_product_id'))
			{
				$response = array('flag'=>0, 'message'=>'Please provide shop product id first');
				return $response;
			}
			
			# Load membership model
			
			$this->load->model('membership_model', 'membership');
			$response = $this->membership->get_membership_by_id($this->input->post('shop_product_id'));
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please login first');
		}
		
		return $response;
	}
	
	private function get_site_intro_content($payload)
	{
		$response = array();
		
		$this->load->model('cms');
		
		$result = $this->cms->get_by_slug('intro');
		
		$response = array('flag'=>1, 'result'=>$result);
		
		return $response;
	}
	
	private function get_category_list($payload)
	{
		$response = array();
		
		if($this->input->post('user_id'))
		{
			# Load Category Model
			$this->load->model('category');
			
			$result = $this->category->getCategories();
			
			$response = array('flag'=>0, 'result'=>$result);
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please login first');
		}
		
		return $response;
	}
	
	private function create_rss_feed_subscription($payload)
	{
		$response = array();
		
		if($this->input->post('user_id'))
		{
			# Load user model and get user profile details
			$this->load->model('user');
			
			$result = $this->user->getUserProfile($this->input->post('user_id'));
			$email = $result->{User::_EMAIL};
			
			# Load RSS Feed Model
			
			$this->load->model('rss_feed_subscription_model', 'rss');
			
			$lastId = $this->rss->create_rss_feed_subscription($this->input->post('user_id'), $this->input->post('item_id'), $this->input->post('category_id'), $email);
			
			if($lastId) $response = array('flag'=>1, 'message'=>'RSS Feed subscription successfull');
			else $response = array('flag'=>0, 'message'=>'Unable to process your request, please try again later');
			
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please login first');
		}
		
		return $response;
	}
	
	public function unsubscribe_rss_feed_subscription($payload)
	{
		$response = array();
		
		if($this->input->post('user_id'))
		{
			# Load user model and get user profile details
			$this->load->model('user');
			
			if(!$this->input->post('subscription_id'))
			{
				$response = array('flag'=>1, 'message'=>'Please provide subscription id');
				return $response;
			}
			
			# Load RSS Feed Model
			
			$this->load->model('rss_feed_subscription_model', 'rss');
			
			$flag = $this->rss->unsubscribe_rss_feed_list($this->input->post('user_id'), $this->input->post('subscription_id'));
			
			if($flag) $response = array('flag'=>1, 'message'=>'RSS Feed Unsubscribed successfully');
			else $response = array('flag'=>0, 'message'=>'Unable to process your request, please try again later');
			
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please login first');
		}
		
		return $response;
	}
	
	private function create_new_task_goal($payload)
	{
		$response = array();
		
		if($this->input->post('user_id'))
		{
			if(!$this->input->post('content') || !$this->input->post('type'))
			{
				$response = array('flag'=>0, 'message'=>'Please provide content and content type first');
				return $response;
			}
			
			# Load task_goal model
			$this->load->model('tasks_goals');
			
			$lastId = $this->tasks_goals->create_new_task_goals($this->input->post('user_id'), $this->input->post('content'), $this->input->post('type'));
			
			if($this->input->post('type') == 1) $message = 'Task created successfully';
			else $message = 'Goal created successfully';
			
			if($lastId) $response = array('flag'=>1, 'message'=>$message);
			else $response = array('flag'=>0, 'message'=>'Unable to process your request, please try again later');
			
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please login first');
		}
		
		return $response;
		
	}
	
	private function get_task_goal($payload)
	{
		$response = array();
		
		if($this->input->post('user_id'))
		{
			if(!$this->input->post('type'))
			{
				$response = array('flag'=>0, 'message'=>'Please provide content type first');
				return $response;
			}
			
			# Load task_goal model
			$this->load->model('tasks_goals');
			
			$result = '';
			switch ($this->input->post('type'))
			{
				case 1 : $result = $this->tasks_goals->get_task_by_user($this->input->post('user_id')); break;
				case 2 : $result = $this->tasks_goals->get_goals_by_user($this->input->post('user_id')); break;
			}
			
			if($result) $response = array('flag'=>1, 'result'=>$result);
			else $response = array('flag'=>0, 'message'=>'Unable to process your request, please try again later');
			
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please login first');
		}
		
		return $response;
	}
	
	private function update_task_goal($payload)
	{
		$response = array();
		
		if($this->input->post('user_id'))
		{
			if(!$this->input->post('content') && !$this->input->post('type') && !$this->input->post('id'))
			{
				$response = array('flag'=>0, 'message'=>'Please provide content type first');
				return $response;
			}
			
			# Load task_goal model
			$this->load->model('tasks_goals');
			
			switch ($this->input->post('type'))
			{
				case 1 : $result = $this->tasks_goals->update_task_goals($this->input->post('id'), $this->input->post('content')); $message = "Task updated successfully"; break;
				case 2 : $result = $this->tasks_goals->update_task_goals($this->input->post('id'), $this->input->post('content')); $message = "Goal updated successfully";  break;
			}
			
			if($result) $response = array('flag'=>1, 'message'=>$message);
			else $response = array('flag'=>0, 'message'=>'Unable to process your request, please try again later');
			
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please login first');
		}
		
		return $response;
	}
	
	private function delete_task_goal($payload)
	{
		$response = array();
		
		if($this->input->post('user_id'))
		{
			if(!$this->input->post('type') && !$this->input->post('id'))
			{
				$response = array('flag'=>0, 'message'=>'Please provide content type and id first');
				return $response;
			}
			
			# Load task_goal model
			$this->load->model('tasks_goals');
			
			switch ($this->input->post('type'))
			{
				case 1 : $result = $this->tasks_goals->delete_task_goal($this->input->post('id')); $message = "Task deleted successfully"; break;
				case 2 : $result = $this->tasks_goals->delete_task_goal($this->input->post('id')); $message = "Goal deleted successfully";  break;
			}
			
			if($result) $response = array('flag'=>1, 'message'=>$message);
			else $response = array('flag'=>0, 'message'=>'Unable to process your request, please try again later');
			
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please login first');
		}
		
		return $response;
	}
	
	private function create_new_data($payload)
	{
		$response = array();
		
		if($this->input->post('user_id'))
		{
			if(!$this->input->post('data_type') || $this->input->post('data_visibility') && !$this->input->post('title') && !$this->input->post('countries') && !$this->input->post('description'))
			{
				$response = array('flag'=>0, 'message'=>'Please provide mandatory data');
				return $response;
			}
			
			# Load page model
			$this->load->model('page');
									
			
			$category = $this->input->post('data_type');
			$userId = $this->input->post('user_id');
			$tag = $this->input->post('tag');
			$visibility = $this->input->post('data_visibility');
			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$anonymous = $this->input->post('anonymous'); 
			$countries = $this->input->post('countries');
			$countriesLegal = $this->input->post('country_legal_in');
			$price = $this->input->post('price');
			$priceLess = $this->input->post('priceless');
			
			
			# This create a new page into database
			$lastId = $this->page->create_page($category, $userId, $visibility, $title, $description, $anonymous, $countries, $countriesLegal, $price, $priceLess, $tag);
			
			
			# Now since we have created the page, it time to check for attached documents
			
			if($this->input->post('attached_documents'))
			{
				# Load data document model
				$this->load->model('data_document_model');
				
				# Since we have the attached documents, its time to load them into table and then
				# simultaneously make an entry into database
				
				foreach(explode(',', $this->input->post('attached_documents')) as $d)
				{
					$this->data_document_model->create_new_data_document($lastId, $d);
				}
						
			}
			
			# If visibility is 7, that mean user want to share the page with specific set of user
			
			if($visibility == 7)
			{
				# Load Page_specified_user_assignment_model model
				
				$this->load->model('Page_specified_user_assignment_model', 'mm');
				foreach (explode(',', $this->input->post('specified_user_value')) as $u)
				{
					$this->mm->assign_data_to_specified_user($lastId, $u);
				}
			}
			
			# Now if the category is not equals to 20 or 17, we should hold the submodilities too
			if($category!=20 && $category!=17)
			{
				$mod1 = $this->input->post('visual_images_val');
				$mod2 = $this->input->post('visual_motion');
				$mod3 = $this->input->post('visual_motion_val');
				$mod4 = $this->input->post('visual_color');
				$mod5 = $this->input->post('visual_color_val');
				$mod6 = $this->input->post('visual_bright');
				$mod7 = $this->input->post('visual_bright_val');
				$mod8 = $this->input->post('visual_focused');
				$mod9 = $this->input->post('visual_focused_val');
				$mod10 = $this->input->post('visual_bordered');
				$mod11 = $this->input->post('visual_bordered_val');
				$mod12 = $this->input->post('visual_associated');
				$mod13 = $this->input->post('visual_associated_val');
				$mod14 = $this->input->post('visual_center');
				$mod15 = $this->input->post('visual_center_val');
				$mod16 = $this->input->post('visual_size_val');
				$mod17 = $this->input->post('visual_shape_val');
				$mod18 = $this->input->post('visual_flat');
				$mod19 = $this->input->post('visual_flat_val');
				$mod20 = $this->input->post('visual_close');
				$mod21 = $this->input->post('visual_close_val');
				$mod22 = $this->input->post('visual_panormic');
				$mod23 = $this->input->post('visual_panormic_val');
				$mod24 = $this->input->post('auditory_sound_val');
				$mod25 = $this->input->post('auditory_volume_val');
				$mod26 = $this->input->post('auditory_tone_val');
				$mod27 = $this->input->post('auditory_tempo_val');
				$mod28 = $this->input->post('auditory_pitch_val');
				$mod29 = $this->input->post('auditory_pace_val');
				$mod30 = $this->input->post('auditory_timbre_val');
				$mod31 = $this->input->post('auditory_duration_val');
				$mod32 = $this->input->post('auditory_intensity_val');
				$mod33 = $this->input->post('auditory_rhythm_val');
				$mod34 = $this->input->post('auditory_direction_val');
				$mod35 = $this->input->post('auditory_harmony_val');
				$mod36 = $this->input->post('auditory_ear_val');
				$mod37 = $this->input->post('kinesthic_breating_val');
				$mod38 = $this->input->post('kinesthic_pulse_val');
				$mod39 = $this->input->post('kinesthic_skin_val');
				$mod40 = $this->input->post('kinesthic_weight_val');
				$mod41 = $this->input->post('kinesthic_pressure_val');
				$mod42 = $this->input->post('kinesthic_intensity_val');
				$mod43 = $this->input->post('kinesthic_tactile_val');
				$mod44 = $this->input->post('olafactory_sweet_val');
				$mod45 = $this->input->post('olafactory_sour_val');
				$mod46 = $this->input->post('olafactory_salt_val');
				$mod47 = $this->input->post('olafactory_bitter_val');
				$mod48 = $this->input->post('olafactory_aroma_val');
				$mod49 = $this->input->post('olafactory_fragrance_val');
				$mod50 = $this->input->post('olafactory_essence_val');
				$mod51 = $this->input->post('olafactory_pungence_val');
				$mod52 = $this->input->post('kinesthic_location_in_body_val');
				
				
				# Once we have data created lets create submodility
				
				$this->load->model('page_submodility','submodility');
				
				$this->submodility->update_page_submodility($lastId, $mod1, $mod2, $mod3, $mod4, $mod5, $mod6, $mod7, $mod8, $mod9, $mod10, $mod11, $mod12, $mod13, $mod14, $mod15, $mod16, $mod17, $mod18, $mod19, $mod20, $mod21, $mod22, $mod23, $mod24, $mod25, $mod26, $mod27, $mod28, $mod29, $mod30, $mod31, $mod32, $mod33, $mod34, $mod35, $mod36, $mod37, $mod38, $mod39, $mod40, $mod41, $mod42, $mod43, $mod44, $mod45, $mod46, $mod47, $mod48, $mod49, $mod50, $mod51, $mod52);
			}
			
			if($lastId) {$response = array('flag'=>1, 'message'=>'Data Created Successfully');}
			else {$response = array('flag'=>0, 'message'=>'Error creating data');}
			
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please login first');
		}
		
		return $response;
	}
	
	
	private function create_data_image($payload)
	{
	    $response = array();
	    
	    if(!$this->input->post('user_id'))
	    {
	        $response = array('flag'=>0, 'message'=>'OOPS ! Please login First');
	        return $response;
	    }
	    	    
	    # We will check for the files
	    if(isset($_FILES['file']['name']))
		{
	      $upload_exts = explode(".", $_FILES["file"]["name"]);
	    
		  # Generate Timestamp name for image name and upload
	      $imageName = md5($_FILES["file"]["name"].microtime()).'.'.end($upload_exts);
	    
	      if(move_uploaded_file($_FILES["file"]["tmp_name"], Template::_PUBLIC_DOCUMENT_DIR.$imageName))
	      {
	           $response = array('flag'=>1, 'result'=>$imageName, 'imagePath'=>base_url('assets/uploads/document/'.$imageName));
		  }
	      else
		  {
	           $response = array('flag'=>0, 'message'=>'Unable to upload');
	      }
	    	
	   }
	   else
	   {
	       $response = array('flag'=>0, 'result'=>'No file given');
	   }
	    
	   echo json_encode($response);
	}
	
	
	private function get_data($payload)
	{
		$response = array();
		
		if($this->input->post('user_id'))
		{
			# Load user model
			$this->load->model('user');
			
			$userObj = $this->user->getUserProfile($this->input->post('user_id'));
			$membershipLevel = $userObj->{User::_USER_MEMBERSHIP_LEVEL};
			
			# Load page model
			$this->load->model('page');
			$result = $this->page->get_data(20, 'desc', $membershipLevel);
			
			$response = array('flag'=>1, 'data'=>$result);
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please login first');
		}
		
		return $response;
	}
	
	
	private function get_friend_data($payload)
	{
		$response = array();
		
		if($this->input->post('user_id'))
		{
			# Load user model
			$this->load->model('user');
			
			$userObj = $this->user->getUserProfile($this->input->post('user_id'));
			$membershipLevel = $userObj->{User::_USER_MEMBERSHIP_LEVEL};
			
			# Load page model
			$this->load->model('page');
			$result = $this->user->get_chat_friend_lists($membershipLevel, $this->input->post('user_id'));
			
			$response = array('flag'=>1, 'data'=>$result, 'image_path'=>base_url('assets/uploads/avtar'));
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please login first');
		}
		
		return $response;
	}
	
	private function get_data_detail($payload)
	{
		$response = array();
		
		if($this->input->post('user_id'))
		{
			# since we have mulpile items associated with data we need to send all those back Ex data, submodilities, files and likes and dislikes
			
			$this->load->model('page');
			$this->load->model('page_submodility','submoditlity');
			$this->load->model('data_document_model','data_document');
			$this->load->model('page_like_dislike_model','pld');
			$this->load->model('country');
			
			$res = array();
			
			$dataDetails = $this->page->get_by_id($this->input->post('data_id'));
			
			if(empty($dataDetails))
			{
			    $response = array('flag'=>0, 'message'=>'Invalid Data Id');
			    return $response;
			}		
			
			/*===================================== Getting Country Available In ================================*/
			$countryAvailableInArr = array();
			
			$countryAvailableIn = explode(',',$dataDetails->country_available_in);
			
			if(count($countryAvailableIn) > 1)
			{   
			    foreach ($countryAvailableIn as $available)
			    {
			        $a = $this->country->get_by_id($available);
			        
			        array_push($countryAvailableInArr, $this->country->get_by_id($available)->{Country::_COUNTRY_NAME});
			    }
			}
			$dataDetails->country_available_in = implode(',', $countryAvailableInArr);
			/*===================================== Getting Country Available In ================================*/
			
			
			
			
			
			/*===================================== Getting Country Legal In =====================================*/
			
			$countryLegalInArr = array();
			
			$countryLegalIn = explode(',',$dataDetails->country_legal_in);
			
			if(count($countryLegalIn) > 1)
			{
			    foreach ($countryLegalIn as $available)
			    {
			        
			        $a = $this->country->get_by_id($available);
			        
			        array_push($countryLegalInArr, $this->country->get_by_id($available)->{Country::_COUNTRY_NAME});
			    }
			}
			$dataDetails->country_legal_in = implode(',', $countryLegalInArr);
			
			
			/*===================================== Getting Country Legal In =====================================*/
			
			
			/*===================================== Getting Country Allowed In =====================================*/
			
			$countryAllowedInArr = array();
			
			$countryAllowedIn = explode(',',$dataDetails->country_allowed_in);
			
			if(count($countryAllowedIn) > 1)
			{
			    foreach ($countryAllowedIn as $available)
			    {
			        $a = $this->country->get_by_id($available);
			        
			        array_push($countryAllowedInArr, $this->country->get_by_id($available)->{Country::_COUNTRY_NAME});
			    }
			}
			$dataDetails->country_allowed_in = implode(',', $countryAllowedInArr);
			
			
			/*===================================== Getting Country Allowed In =====================================*/
			
			$res['page'] = $dataDetails;
			
			$res['submodilities'] = $this->submoditlity->get_submodility_by_page_id($res['page']->{Page::_ID});
			$res['files'] = $this->data_document->get_data_document($res['page']->{Page::_ID});
			$res['like_dislike'] = $this->pld->get_count_like_dislike($res['page']->{Page::_ID});
			
			$response = array('flag'=>1, 'data'=>$res, 'document_path' => base_url('assets/uploads/data_document'));
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please login first');
		}
		
		return $response;
	}
	
	private function get_user_data_list($payload)
	{
		$response = array();
		
		if($this->input->post('user_id'))
		{
			# since we have mulpile items associated with data we need to send all those back Ex data, submodilities, files and likes and dislikes
			
			$this->load->model('page');
			$result = $this->page->get_user_data($this->input->post('user_id'));
			$response = array('flag'=>1, 'data'=>$result);
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please login first');
		}
		
		return $response;
	}
	
	private function get_messages($payload)
	{
	    
	}
	
	private function set_message($payload)
	{
	    $response = array();
        
	    #Load Chat model
	    $this->load->model('chat_model', 'chat');

	    #Load user model
	    $this->load->model('user');
	    
	    $loggedInUser = $this->input->post('message_from_user');
	    $messageToUser = $this->input->post('message_to_user');
	    $message 	= $this->input->post('message');
	    	    
	    if(empty($message) && empty($messageToUser))
	    {
	        $response = array('flag' => 0, 'message' => 'Empty fields exists');
	        
	        return $response;
	    }   
	    # First step is to save the message to database
	    	
	    $date = new DateTime();
	    $date = $date->format('Y-m-d H:i:s');
		
		$data = array(
	       Chat_model::_FROM_USER => $loggedInUser,
	       Chat_model::_TO_USER => $messageToUser,
	       Chat_model::_MESSAGE => $message,
	       Chat_model::_IS_READ => 0,
	       Chat_model::_DATE_CREATED => $date
	    );
	    	
	    $lastId = $this->chat->insert($data);
	    	
	    # Next step is to get message data and start to prepare response
	    $message = $this->chat->get_by_id($lastId);
	    	
	    $loggedInUserObj = $this->user->getUserProfile($message->{Chat_model::_FROM_USER});
	    	
	    $chat = array(
	            'chat_id'=>$message->{Chat_model::_ID},
	            'from_user'=>$message->{Chat_model::_FROM_USER},
	            'to_user'=>$message->{Chat_model::_TO_USER},
	            'avatar' 	=> $loggedInUserObj->{User::_AVATAR_IMAGE} != '' ? $loggedInUserObj->{User::_AVATAR_IMAGE} : 'no_image.png',
	            'body' => $message->{Chat_model::_MESSAGE},
	            'time' 		=> strtotime($message->{Chat_model::_DATE_CREATED}), 
	            'type'=>$message->{Chat_model::_FROM_USER} == $loggedInUser ? 'send' : 'receive',
	            'name'=>$message->{Chat_model::_FROM_USER} == $loggedInUser ? 'You' : $loggedInUserObj->{User::_F_NAME} ? $loggedInUserObj->{User::_F_NAME} : $loggedInUserObj->{User::_AVATAR_NAME} ? $loggedInUserObj->{User::_AVATAR_NAME} : $loggedInUserObj->{User::_USERNAME},
	    );
	     	
	    # Next step is to create response
        $chat = (object)$chat;
	    $this->load->library('push_notification');
	    
	    # Next step is to get device id of to user
	    
	    # Load user devices model
	    $this->load->model('user_devices_model','devices');
	    $devices = $this->devices->get_device($messageToUser);

        $registrationId = array();
	    foreach($devices as $d)
	    {
	    	$registrationId[] = $d->device_token;
	   	}	

// 	    $registrationId = array ('d71CKj2Vtsg:APA91bHYMuaRwrX4HX0UZZduUp17SuFolLernldgvKM-bFs2qZWw465tBx_MpGXJ5ynJ_n4kWQONu1-O3rbYhbi1pYY6ubbV5OCCQ4ZdooMvuOYre9v0Zp5z5oVnwx0HxlB3hKa2WG71');
        $message = array ('message'=>$chat); 
	    
	    $res = $this->push_notification->andriod_push($registrationId, $message);
	    	    
	    $response = array( 'flag' => 1, 'chats' => $chat, 'result'=>$res);
	    	    
	    return $response;
	}
	
	private function get_message_history($payload)
	{
	    $response = array();
	     
	    #Load Chat model
	    $this->load->model('chat_model', 'chat');
	     
	    #Load user model
	    $this->load->model('user');
	     
	    $loggedInUser = $this->input->post('message_from_user');
	    $messageToUser = $this->input->post('message_to_user');
	    $page = $this->input->post('counter');
	    
	    # get paginated messages
		$limit = 5;
	    $offset = $limit * $page;
	    
	    $limit 	= isset($_POST['limit']) ? $this->input->post('limit') : $limit ;
	    
	    $messages 	= array_reverse($this->chat->get_chat_history($loggedInUser, $messageToUser, $limit = 5));
	    $total 		= $this->chat->get_count($loggedInUser, $messageToUser);
	    
	    $chats = array();
	    foreach ($messages as $message)
	    {
	    $loggedInUserObj = $this->user->getUserProfile($message->{Chat_model::_FROM_USER});
	    	
	    $chat = array(
            'chat_id' 	=> $message->{Chat_model::_ID},
    	    'from_user' => $message->{Chat_model::_FROM_USER},
    	    'to_user'   => $message->{Chat_model::_TO_USER},
    	    'avatar' 	=> $loggedInUserObj->{User::_AVATAR_IMAGE} != '' ? $loggedInUserObj->{User::_AVATAR_IMAGE} : 'no_image.png',
    	    'body' 		=> $message->{Chat_model::_MESSAGE},
    	    'time' 		=> date("M j, Y, g:i a", strtotime($message->{Chat_model::_DATE_CREATED})),
    	    'type'		=> $message->{Chat_model::_FROM_USER} == $loggedInUser ? 'send' : 'receive',
    	    'name'		=> $message->{Chat_model::_FROM_USER} == $loggedInUser ? 'You' : ucwords($loggedInUserObj->{User::_F_NAME})
	    );
	    	
	    array_push($chats, $chat);
	    }
	    
	    $response = array( 'flag' => 1, 'errors'  => '', 'message' => '', 'chats'  => $chats);
	    
	    return $response;
	}
	
	private function update_device_token($payload)
	{
	    if(!$this->input->post('user_id'))
	    {
	        $response = array('flag'=>0, 'message'=>'OOPS ! Unable to process your request');
	        return $response;
	    }
	    
	    if(empty($this->input->post('device_id')) && empty($this->input->post('device_token')) && empty($this->input->post('device_type')))
	    {
	        $response = array('flag'=>0, 'message'=>'OOPS ! Unable to process your request, no device id, device token and device type found');
	        return $response;
	    }
	    
	    $userId = $this->input->post('user_id');
	    $deviceId = $this->input->post('device_id');
	    $deviceToken = $this->input->post('device_token');
	    $deviceType = $this->input->post('device_type'); 
	    
	    
	    # Load user devices model
	    $this->load->model('user_devices_model', 'devices');
	    $lastId = $this->devices->update_user_device($userId, $deviceId, $deviceToken, $deviceType); 
	    
	    if($lastId)$response = array('flag'=>0, 'message'=>'Device registered successfully');
	    else{$response = array('flag'=>0, 'message'=>'OOPS ! Unable to process your request, no device id, device token and device type found');}
	    
	    return $response;
	    
	}
	
	
	
	private function get_library_search($payload)
	{
		$response = array();
		
		$search = '';
		if($this->input->post('search'))
		{
			$search = $this->input->post('search');
		}
		
		$categories = $this->input->post('categories') ? $this->input->post('categories') : '';
		$tags = $this->input->post('tags') ? $this->input->post('tags'): '';
		
		# Load user model
		$this->load->model('user');
		$membeshipLevel = 1;
		if($this->session->userdata('id'))
		{
			$userObj = $this->user->getUserProfile($this->session->userdata('id'));
			$membeshipLevel = $userObj->{User::_USER_MEMBERSHIP_LEVEL};
		}
		
		# Load Results From Products Based On Search
		$this->load->model('page');
		$result = $this->page->search_data(trim($membeshipLevel), trim($search), trim($categories), trim($tags));
		
		if($result)$response = array('flag'=>1, 'result'=>$result);
		else $response = array('flag'=>0, 'message'=>'No Result Found');
		
		
		return $response;
	}
	
	private function get_calendar_data($payload)
	{
	    if(!$this->input->post('user_id'))
	    {
	        $response = array('flag'=>0, 'message'=>'OOPS ! Please login first');
	        return $response;
	    }
	    
	    # Load user library events modal
	    $this->load->model('library_event_model', 'library1');
		
        $userId = $this->input->post('user_id');
                	
        $result = $this->library1->getLibraryEventsByUserId($userId);
        	
        $response = array('flag'=>1, 'result'=>$result);
        
		return $response;
	}
	
	private function set_calendar_data($payload)
	{
	    $response = array();
	    
	    if(!$this->input->post('user_id'))
	    {
	       $response = array('flag'=>0, 'message'=>'OOPS ! Please login first');   
	       return $response;   
	    }
	    
	    $userId = $this->input->post('user_id');
	    $eventDataId = $this->input->post('event_data_id');
	    $eventPrice = $this->input->post('event_price');
	    $eventTitle = $this->input->post('event_title');
	    $startDate = $this->input->post('start_date');
	    $endDate = $this->input->post('end_date');
	    $fullDay = $this->input->post('full_day');
	    
	    
	    # Load user library events modal
	    $this->load->model('library_event_model', 'library1');
	        	
	    $lastId = $this->library1->createNewLibraryEvent($userId, $eventDataId, $eventPrice, $eventTitle, $startDate, $endDate, $fullDay);
	    
        if($lastId)
        {
            $result = $this->library1->getLibraryEventById($lastId);
    
            $response = array('flag'=>1, 'message'=>'Library Event Saved Successfully', 'lastId'=>$lastId, 'result'=>$result);
            return $response;
        }
	        	
	    $response = array('flag'=>0, 'message'=>'Unable to create library event');
	    	    
	    return $response;
	}
	
	private function update_calendar_data($payload)
	{
	   $response = array();
        
	   if(!$this->input->post('user_id'))
	   {
	       $response = array('flag'=>0, 'message'=>'OOPS ! Please login first');
	       return $response;
	   }
	   
	   # Load user library events modal
	   $this->load->model('library_event_model', 'library1');
	   
	   $eventId = $this->input->post('event_id');
	   $eventTitle = $this->input->post('event_title');
	   $startDate = $this->input->post('start_date');
	   $endDate = $this->input->post('end_date');
	   $fullDay = $this->input->post('full_day');
	      
	   $result = $this->library1->updateLibraryEvent($eventId, $eventTitle, $startDate, $endDate, $fullDay);
	   
	   if($result) $response = array('flag'=>1, 'message'=>'Library Event Updated Successfully');
	   else $response = array('flag'=>0, 'message'=>'Unable to save library event');
	   	   
	   return $response;
	   
	}
	
	private function remove_calendar_data($payload)
	{
	    $response = array();

	    if(!$this->input->post('user_id'))
	    {
	        $response = array('flag'=>0, 'message'=>'OOPS ! Please login first');
	        return $response;
	    }
	    
	    # Load user library events modal
	    $this->load->model('library_event_model', 'library1');
	    
	    $result = $this->library1->removeCalendarEvent($this->input->post('event_id'));
	    
	    if($result) $response = array('flag'=>1, 'message'=>'Library Event deleted Successfully');
	    else $response = array('flag'=>0, 'message'=>'Unable to delete library event');
	    
	    return $response;
	}

	private function set_calendar_comment($payload)
	{
	    $response = array();
	    
	    if(!$this->input->post('user_id'))
	    {
	        $response = array('flag'=>0, 'message'=>'OOPS ! Please login first');
	        return $response;
	    }
	    
	    # Load library event comment model
	    $this->load->model('library_event_comment_model','comment');
	    
	    $eventId = $this->input->post('event_id');
	    $comment = $this->input->post('comment');;
	    $price = $this->input->post('price');
	    $location = $this->input->post('location');
	    $address = $this->input->post('address');
	    $lat = $this->input->post('lat');
	    $lng = $this->input->post('lng');
	     
	    if(empty($eventId) || empty($comment) || empty($location) || empty($address) || empty($lat) || empty($lng) || empty($price))
	    {
	        $response = array('flag'=>0, 'message'=>'Please provide comment, location, address, lat, lng and price');
	        return $response;
	    }
	    
	    $response = $this->comment->createNewLibraryEventComment($eventId, $comment, $price, $location, $address, $lat, $lng);
	     
	    if($response) $response = array('flag'=>1, 'message'=>'New comment added to event');
	    else $response = array('flag'=>0, 'message'=>'Unable to add comment to event');
	    
	    return $response;
	    
	}
	
	private function membership_purchase($payload)
	{
	    $response = array();
	    
	    if(!$this->input->post('user_id'))
	    {
	        $response = array('flag'=>0,'message'=>'OOPS ! please login first');
	        return $response;
	    }
	    
	    # Payment Verified Now Update Database
	    	
	    $this->load->model('user_subscription','subscription');
	    $this->load->model('membership_model','membership');
	    $this->load->model('page');
	    $this->load->model('user');
	    	    
	    $date = new DateTime();
	    $date = $date->format('Y-m-d H:i:s');
        
	    $expiry = new DateTime();
	    #$expiry = $expiry->format('Y-m-d H:i:s');
	    
	    /*
	     * txnId = transaction id received from paypal
	     * userId = user id of the logged in user
	     * item number - id of the item i.e membership
	     * item name - name of the item
	     * category - 3 For Membership 7 For Remainder Service
	     * gross amount - total amount from paypal
	     * currency code - currency code from paypal
	     * payer email - email of the user paying
	     * subscription type - 2 = yearly or 1 = monthly 
	     */
	    
	    $txnId = $this->input->post('txn_id');
	    $userId = $this->input->post('user_id');
	    $itemNumber = $this->input->post('item_number');
	    $itemName = $this->input->post('item_name');
	    $category = $this->input->post('category');
	    $grossAmount = $this->input->post('gross_amount');
	    $currencyCode = $this->input->post('currency_code');
	    $payerEmail = $this->input->post('payer_email');
	    $subscriptionType = $this->input->post('subscription_type');
	    
	    # First Step is to get subscription amount and calculate subscription expiry
	    
	    $result = $this->membership->get_membership_by_id($this->input->post('item_number'));
	    
	    switch ($subscriptionType)
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
	        $this->user->update_user_membership($userId, $result->{Membership_model::_MEMBERSHIP_TYPE});
        }
	    
        $lastId = $this->subscription->create_subscription($txnId, $userId, $itemNumber, $itemName, $category, $grossAmount, $currencyCode, $payerEmail, $date, $expiry, $subscriptionType);
	    
	    if($lastId) $response = array('flag'=>1, 'message'=>'Subscription updated successfully');   
	    else $response = array('flag'=>0, 'message'=>'Unable to update subscription');
	    
	    return $response;
	}
	
	public function pss_purchase($payload)
	{
	    $response = array();
	    
	    if(!$this->input->post('user_id'))
	    {
	        $response = array('flag'=>0,'message'=>'OOPS ! please login first');
	        return $response;
	    }
	    
	    # Load PSSS purchase history modal
	    
	    $this->load->model('psss_purchase_history','psss');
	    
	    $txnId = $this->input->post('txn_id');
	    $userId = $this->input->post('user_id');
	    $itemNumber = $this->input->post('item_number');
	    $itemName = $this->input->post('item_name');
	    $category = $this->input->post('category');
	    $grossAmount = $this->input->post('gross_amount');
	    $currencyCode = $this->input->post('currency_code');
	    $payerEmail = $this->input->post('payer_email');
	    	    
	    
	    $this->psss->create_purchase_history($txnId, $userId, $itemNumber, $itemName, $category, $grossAmount, $currencyCode, $payerEmail, 'Paypal');
	    $this->message->setFlashMessage(Message::PAYMENT_SUCCESS, array('id'=>'1'));
	    	    
	    return $response;
	}
	
	
	public function like_page_data($payload)
	{
	    $response = array();
	    
	    if(!$this->input->post('user_id'))
	    {
	        $response = array('flag'=>0, 'message'=>'Please login First');
	        return $response;
	    }
	    	    
	    if($this->input->post('data_id'))
	    {
	        $pageId = $this->input->post('data_id');
	        $userId = $this->input->post('user_id');
	        
	        # Load page like unlike model
	        $this->load->model('page_like_dislike_model', 'pld');
	        
	        # First step is to check if we have already liked the page
	        $result = $this->pld->get_data($pageId, $userId);
	        
	        if($result)
	        {
	            if($result->{Page_like_dislike_model::_PAGE_LIKE}){
	                $response = array('flag'=>0, 'message'=>'You have already liked this data');
	                return $response;
	            }
	        }
	        
	        $result = $this->pld->like_data($pageId, $userId);
	        $result = $this->pld->get_count_like_dislike($pageId);
	        
	        $output = array('message'=>'You have liked this data','likecount'=>$result->likecount, 'dislikecount'=>$result->dislikecount);
	        
	        
	        if($result) $response = array('flag'=>1, 'result' => $output);
	        else $response = array('flag'=>1, 'message'=>'Error occured while liking');
	        
	    }
	    else $response = array('flag'=>1, 'message'=>'Unable to like data');
	    
	    return $response;
	}
	
	public function unlike_page_data($payload)
	{
	    $response = array();
	    
	    if(!$this->input->post('user_id'))
	    {
	        $response = array('flag'=>0, 'message'=>'Please login First');
	        return $response;
	    }
	    
	    if($this->input->post('data_id'))
	    {
	        $pageId = $this->input->post('data_id');
	        $userId = $this->input->post('user_id');
	        
	        # Load page like unlike model
	        $this->load->model('page_like_dislike_model', 'pld');
	        
	        # First step is to check if we have already liked the page
	        $result = $this->pld->get_data($pageId, $userId);
	        
	        if($result)
	        {
	            if($result->{Page_like_dislike_model::_PAGE_DISLIKE}){
	                $response = array('flag'=>0, 'message'=>'You have already disliked this data');
	                return $response;
	            }
	        }
	        
	        $result = $this->pld->dislike_data($pageId, $userId);
	        $result = $this->pld->get_count_like_dislike($pageId);
	        
	        $output = array('message'=>'You have disliked this data', 'likecount'=>$result->likecount, 'dislikecount'=>$result->dislikecount);
	        
	        if($result) $response = array('flag'=>1, 'result'=>$output);
	        else $response = array('flag'=>1, 'message'=>'Error occured while disliking');
	        
	    }
	    else
	    {
	        $response = array('flag'=>1, 'message'=>'Unable to like data');
	    }
	    
	    return $response;
	    
	}
	
	public function love_it_page_data($payload)
	{
	    $response = array();
	    
	    if(!$this->input->post('user_id'))
	    {
	        $response = array('flag'=>0, 'message'=>'Please login First');
	        return $response;
	    }
	    
	    if($this->input->post('data_id'))
	    {
	        $pageId = $this->input->post('data_id');
	        $userId = $this->input->post('user_id');
	        
	        # Load page like unlike model
	        $this->load->model('page_like_dislike_model', 'pld');
	        
	        # First step is to check if we have already liked the page
	        $result = $this->pld->get_data($pageId, $userId);
	        
	        if($result)
	        {
	            if($result->{Page_like_dislike_model::_PAGE_LOVE_IT}){
	                $response = array('flag'=>0, 'message'=>'You have already loved this data');
	                return $response;
	            }
	        }
	        
	        $result = $this->pld->love_data($pageId, $userId);
	        $result = $this->pld->get_count_like_dislike($pageId);
	        
	        $output = array('message'=>'You have loved this data', 'lovecount'=>$result->loveitcount, 'hatecount'=>$result->hateitcount);
	        
	        if($result) $response = array('flag'=>1, 'result'=> $output);
	        else $response = array('flag'=>1, 'message'=>'Error occured while loving it');
	        
	    }
	    else
	    {
	        $response = array('flag'=>1, 'message'=>'Unable to like data');
	    }
	    
	    return $response;
	    
	}
	
	public function hate_it_page_data($payload)
	{
	    $response = array();
	    
	    if(!$this->input->post('user_id'))
	    {
	        $response = array('flag'=>0, 'message'=>'Please login First');
	        return $response;
	    }
	    
	    if($this->input->post('data_id'))
	    {
	        $pageId = $this->input->post('data_id');
	        $userId = $this->input->post('user_id');
	        
	        # Load page like unlike model
	        $this->load->model('page_like_dislike_model', 'pld');
	        
	        # First step is to check if we have already liked the page
	        $result = $this->pld->get_data($pageId, $userId);
	        
	        if($result)
	        {
	            if($result->{Page_like_dislike_model::_PAGE_HATE_IT}){
	                $response = array('flag'=>0, 'message'=>'You have already hated this data');
	                return $response;
	            }
	        }
	        
	        $result = $this->pld->hate_data($pageId, $userId);
	        $result = $this->pld->get_count_like_dislike($pageId);
	        
	        // 			print_r($result);
	        
	        $output = array('message'=>'You have hated this data', 'lovecount'=>$result->loveitcount, 'hatecount'=>$result->hateitcount);
	        
	        if($result) $response = array('flag'=>1, 'result'=>$output);
	        else $response = array('flag'=>1, 'message'=>'Error occured while hating');
	        
	    }
	    else
	    {
	        $response = array('flag'=>1, 'message'=>'Unable to like data');
	    }
	    
	    return $response;
	    
	}
	
	
	
	public function ppq_for_ios()
	{
	    $response = array();
	    
	    if(!$this->input->get('user-id'))
	    {
	        $response = array('flag'=>0, 'message'=>'Please login First');
	        echo json_encode($response);
	    }
	    
	    $this->load->model('user_questionnaire','ques');
	    
	    $data = array();
	    
        $data['questionnaire'] = $this->ques->get_user_questionnaire($this->input->get('user-id'));
        $data['userId'] = $this->input->get('user-id');
        
        $this->load->view("templates/public/module/ios/ios_ppq", $data);  

	}
	
	public function rpq_for_ios()
	{
	    $response = array();
	    
	    if(!$this->input->get('user-id'))
	    {
	        $response = array('flag'=>0, 'message'=>'Please login First');
	        echo json_encode($response);
	        
	    }
	    
	    $this->load->model('user_questionnaire','ques');
	   
	    $data = array(); 
	    
	    $data['rpq'] = $this->ques->get_user_rpq($this->input->get('user-id'));	 
	    
	    $data['userId'] = $this->input->get('user-id');
	    
	    $this->load->view('templates/public/module/ios/ios_rpq', $data);
	}
	
	public function wpq_for_ios()
	{
	    $response = array();
	    
	    if(!$this->input->get('user-id'))
	    {
	        $response = array('flag'=>0, 'message'=>'Please login First');
	        echo json_encode($response);
	    }
	    	    
	    $this->load->model('user_questionnaire','ques');	    
	    
	    $data = array();
	    
	    
	    $data['wpq'] = $this->ques->get_user_wpq($this->input->get('user-id'));
	    
	    $data['userId'] = $this->input->get('user-id');
	    $this->load->view('templates/public/module/ios/ios_wpq', $data);
	}
	
	public function calendar_for_mobile()
	{
	    $response = array();
	    
	    if(!$this->input->get('user-id'))
	    {
	        $response = array('flag'=>0, 'message'=>'Please login First');
	        echo json_encode($response);
	        exit;
	    }
	    
	    $data = array();
	    
	    # Get data types
	    
	    # Load page model
	    $this->load->model('page');
	    
	    $data['categories'] = array("1"=>'Service', "2"=>'Product', "5"=>'Symptom', "8"=>'Sensation', "17"=>'Article', "18"=>'Audio Visual', "19"=>'Cures', "20"=>'Legal Note');
	    $data['data'] = $this->page->get_data_created_and_purchased_by_user($this->input->get('user-id'));
	    	    
	    $data['userId'] = $this->input->get('user-id');
	    $this->load->view('templates/public/module/ios/calendar', $data);
	}
	
	
	public function processPCTWalletTransfer($payload)
	{
	    # Validate user credentials before processing the payment
	    # Load user model
	    $this->load->model('user');
	    
	    $result = $this->user->sign_in($this->input->post('user-name'), $this->input->post('user-password'));
	    
	    if(!$result)
	    {
	        $response = array('flag'=>0, 'message'=>Message::PCT_PAYMENT_FAILED_LOGIN_ERROR);
	        return $response;
	    }
	    
	    $txnId = "PCTINT".time();
	    $fromUser = $result;
	    $toUser = $this->input->post('to-account');
	    $txnType = 'User To User Transfer';
	    $txnPoints = $this->input->post('pct-transfer-points');
	    $txnTopic = $this->input->post('pct-topic');
	    $txnMessage = $this->input->post('pct-message');
	    
	    # Now before actually making the transaction store, we need to add points to users account
	    
	    $profile = $this->user->getUserProfile($result);
	    
	    $walletAmount = $profile->{User::_PCT_WALLET_AMOUNT};
	    
	    if($txnPoints > $walletAmount){
	        $response = array('flag'=>0, 'message'=>Message::PCT_PAYMENT_TRANSFER_FAILURE_INSUFFICIENT_FUND);
	        return $response;
	    }
	    
	    $toUserProfile = $this->user->getUserProfile($toUser);
	    
	    $this->db->where(User::_ID, $toUser)->update(User::_TABLE, array(User::_PCT_WALLET_AMOUNT => $toUserProfile->{User::_PCT_WALLET_AMOUNT} + $txnPoints));
	    $this->db->where(User::_ID, $fromUser)->update(User::_TABLE, array(User::_PCT_WALLET_AMOUNT => ($walletAmount- $txnPoints)));
	    
	    
	    # Load pct-transaction model
	    $this->load->model('pct_transaction');
	    $result = $this->pct_transaction->create_transaction($fromUser, $toUser, $txnId, $txnType, $txnPoints, $txnTopic, $txnMessage);
	    
	    # Now once the payment is successfull, we should get the balance once again and pass this
	    
	    $profile = $this->user->getUserProfile($fromUser);	    
	    $walletAmount = $profile->{User::_PCT_WALLET_AMOUNT};
	    
	    
	    if($result) $response = array('flag'=>1, 'message'=>Message::PCT_PAYMENT_TRANSFER_SUCCESS, 'walletAmount'=>$walletAmount);
	    else  $response = array('flag'=>0, 'message'=>Message::PCT_PAYMENT_TRANSFER_FAILURE);
	    
	    return $response;
	}
	
	
	public function process_pct_payment($payload)
	{
	    
	    # Validate user credentials before processing the payment
	    
	    # Load user model
	    $this->load->model('user');
	    $result = $this->user->sign_in($this->input->post('username'), $this->input->post('userpassword'));
	    
	    if(!$result)
	    {
	        $response = array('flag'=>0, 'message'=>Message::PCT_PAYMENT_FAILED_LOGIN_ERROR);
	        return $response;
	    }
	    
	    $txnNum = "PCTINT".time();
	    $userId = $result;
	    $itemNumber = $this->input->post('item_id');
	    $itemName = $this->input->post('item_name');
	    $itemCategory = $this->input->post('category_id');
	    $grossAmount = $this->input->post('invoice_amount');
	    
	    
	    $profile = $this->user->getUserProfile($userId);
	    $email = $profile->{User::_EMAIL};
	    
	    
	    $this->load->model('psss_purchase_history','psss');
	    
	    $this->psss->create_purchase_history($txnNum, $userId, $itemNumber, $itemName, $itemCategory, $grossAmount, "PCT", $email, 'Internal Wallet');
// 	    $this->message->setFlashMessage(Message::PAYMENT_SUCCESS, array('id'=>'1'));
	    $response = array('flag'=>1, 'message'=>Message::PAYMENT_SUCCESS);
	    
	    # Load pct-transaction model
	    $this->load->model('pct_transaction');
	    $result = $this->pct_transaction->create_transaction($userId, 1, $txnNum, 'PSSS Purchase', $grossAmount);
	    
	    
	    # Now since the payment is done, we need to subtract gross amount
	    
	    $profile = $this->user->getUserProfile($userId);
	    $walletAmount = $profile->{user::_PCT_WALLET_AMOUNT};
	    $updatedAmount = ($walletAmount - $grossAmount);
	    
	    $this->user->update_pct_wallet_amount($userId, $updatedAmount); 
	    
	    return $response;
	}
	
	public function get_transaction_history($payload)
	{
	    $response = array();
	 
	    if(empty($this->input->post('user_id')))
	    {
	        $response = array('flag'=>0, 'message'=>'Please login first');
	        return $response;
	    }
	    
	    
	    # Load pct transaction model
	    $this->load->model('pct_transaction');
	        
	    $response = array('flag'=>0, 'result'=> $this->pct_transaction->get_transactions($this->input->post('user_id')));
	    
	    return $response;
	}
	
	public function get_wallet_amount($payload)
	{
	    $response = array();
	    
	    if(empty($this->input->post('user_id')))
	    {
	        $response = array('flag'=>0, 'message'=>'Please login first');
	        return $response;
	    }
	    
	    $this->load->model('user');
	    
	    $result = $this->user->getUserProfile($this->input->post('user_id'));
	    	    
	    if($result)
	    {
	        $response = array('flag'=>1, 'pct_wallet_amount'=>$result->{User::_PCT_WALLET_AMOUNT});
	    }
	    else
	    {
	        $response = array('flag'=>0, 'message'=>'No Such User exists');
	    }
	    	    
	    return $response;
	}
	
	
	public function add_event()
	{
	    $response = array();
	    
	    if(empty($this->input->get('user-id')))
	    {
	        $response = array('flag'=>0, 'message'=>'Please login first');
	        return $response;
	    }
	    
	    # Load Page model
	    $this->load->model('page');
	    $this->load->model('country');
	    $this->load->model('user');
	    $this->load->model('currency');
	    $this->load->model('pct_setting', 'pct');
	    
	    if($this->input->post('data_type'))
	    {
	        # Load user event model
	        $this->load->model('user_event_model', 'event');
	        
	        $userId = $this->input->post('user-id');
	        $topic = $this->input->post('data_type');
	        $itemId = $this->input->post('item_name');
	        $priceCurrency =  $this->input->post('price_currency');
	        $comment =  $this->input->post('event_comment');
	        $image =  "";
	        $pctPrice =  $this->input->post('pct_price');
	        $price =  $this->input->post('price');
	        $paymentFrom =  $this->input->post('payment_from');
	        $deliveryMethod =  $this->input->post('delivery_method');
	        $escrowReleased =  $this->input->post('payment_when');
	        $expiryDate =  $this->input->post('escrow_date_time');
	        $hasExpiry = $this->input->post('has_date_time') ? 0 : 1;
	        
	        $escrowType =  $this->input->post('escrow_type');
	        $minLimit =  $this->input->post('min_limit');
	        $maxLimit =  $this->input->post('max_limit');
	        $location =  $this->input->post('location');
	        $address =  $this->input->post('address');
	        $lat =  $this->input->post('lat');
	        $lng =  $this->input->post('lng');
	        $offerInRange = $this->input->post('kms-range') ? $this->input->post('kms-range') : 0;
	        
	        if($_FILES)
	        {
	            # Get Image and Create Thumb and upload
	            
	            $file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
	            $upload_exts = explode(".", $_FILES["file"]["name"]);
	            $upload_exts = end($upload_exts);
	            
	            if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 2000000) && in_array($upload_exts, $file_exts))
	            {
	                if ($_FILES["file"]["error"] > 0) {  }
	                else
	                {
	                    $extensionArr = explode($_FILES["file"]["type"]);
	                    $extension = $extensionArr[1];
	                    
	                    # Generate Timestamp name for image name and upload
	                    $image = md5($_FILES["file"]["name"].microtime()).$extension;
	                    move_uploaded_file($_FILES["file"]["tmp_name"], Template::_PUBLIC_DATA_DOCUMENT_DIR . $image);
	                    
	                }
	            }
	        }
	        
	        $data = array(
	            User_event_model::_USER_ID => $userId,
	            User_event_model::_TOPIC => $topic,
	            User_event_model::_ITEM_ID => $itemId,
	            User_event_model::_COMMENT => $comment,
	            User_event_model::_IMAGE => $image,
	            User_event_model::_PCT_PRICE => $pctPrice,
	            User_event_model::_PRICE => $price,
	            User_event_model::_PRICE_CURRENCY => $priceCurrency,
	            User_event_model::_PAYMENT_FROM => $paymentFrom,
	            User_event_model::_DELIVERY_METHOD => $deliveryMethod,
	            User_event_model::_ESCROW_RELEASED => $escrowReleased,
	            User_event_model::_EXPIRY_DATE => $expiryDate,
	            User_event_model::_HAS_EXPIRY => $hasExpiry,
	            User_event_model::_ESCROW_TYPE => $escrowType,
	            User_event_model::_ESCROW_MIN_LIMIT => $minLimit,
	            User_event_model::_ESCROW_MAX_LIMIT => $maxLimit,
	            User_event_model::_LOCATION => $location,
	            User_event_model::_ADDRESS => $address,
	            User_event_model::_LAT => $lat,
	            User_event_model::_LNG => $lng,
	            User_event_model::_OFFER_RANGE => $offerInRange,
	        );
	        
	        if($this->event->register_new_event($data))
	        {
	            $this->message->setFlashMessage(Message::EVENT_CREATE_SUCCESS, array('id'=>1));
	        }
	        else
	        {
	            $this->message->setFlashMessage(Message::EVENT_CREATE_FAILURE);
	        }
	        
	        if($this->input->post('device') && $this->input->post('device') == "mobile")
	        {
	            redirect(base_url('add/event?user-id='.$userId));
	        }
	        
	    }
	    
	    
	    $data = array();
	    
	    $data['datas'] = $this->page->get_data_created_and_purchased_by_user($this->input->get('user-id'));
	    
	    $data['currencyRates'] = $this->pct->get_rates();
	    $data['currencies'] = $this->currency->getCurrencies();
	    $data['profile'] = $this->user->getUserProfile($this->input->get('user-id'));
	    
	    $this->load->view('templates/public/module/ios/add-event', $data);	    
	}
	
	public function get_communication_offers($payload)
	{
	    $response = array();
	    
	    if(empty($this->input->post('user_id')))
	    {
	        $response = array('flag'=>0, 'message'=>'Please login first');
	        return $response;
	    }
	    
	    # Load user event model
	    $this->load->model('user_event_model','user_event');
	    $this->load->model('user_event_status_model','user_event_status');
	    $this->load->model('page');
	    
	    $userId = $this->input->post('user_id');
	    	    
	    $communicationData = $this->user_event->get_communication_data($userId);
	    
	    if(!empty($communicationData))
	    {
	        foreach ($communicationData as $c)
	        {
	            $output = array();
	            if($this->user_event_status->get_by_id($c->id, $userId) > 0) continue;
	            
	            $output['id'] = $c->id;
	            $output['title'] = $this->page->get_by_id($c->item_id, Page::_PAGE_TITLE);
	            $output['comment'] = $c->comment;
	            $output['address'] = $c->address;
	            $output['price'] = $c->pct_price;
	            $output['hasExpiry'] = $c->has_expiry_date;
	            $output['expiryDate'] = $c->expiry_date;
	            
	            
	            $response[] = $output;
	        }
	        
	        $response = array('flag'=>1, 'offers'=>$response);
	    }
	    
	    return $response;
	}
	
	public function decline_offer($payload)
	{
	    $response = array();
	    
	    if(empty($this->input->post('user_id')))
	    {
	        $response = array('flag'=>0, 'message'=>'Please login first');
	        return $response;
	    }
	    
        $eventId = $this->input->post('event_id');
        $userId = $this->input->post('user_id');
	        
        # Load user event status model
        $this->load->model('user_event_status_model','uesm');
	    
        $status = User_event_status_model::STATUS_DECLINE; 
	    
	    if($this->uesm->register_event_status($eventId, $userId, $status))
	       $response = array('flag'=>1, 'message'=>'Offer declined successfully');
	    else 
	        $response = array('flag'=>0,'message'=>'OOPS !!! Something went wrong, unable to decline offer');
	            
	    return $response;
	}
	
	public function my_offer($payload)
	{
	    $response = array();
	    
	    if(empty($this->input->post('user_id')))
	    {
	        $response = array('flag'=>0, 'message'=>'Please login first');
	        return $response;
	    }
	    
	    $userId = $this->input->post('user_id');
	    
	    # Load page model
	    $this->load->model('page');
	    # Load user event model
	    $this->load->model('user_event_model', 'uem');
	    # Load user event status model
	    $this->load->model('user_event_status_model', 'uesm');
	    
	    # Get Created offers
	    $response['createdOffer'] = $this->uem->get_by_user($userId);
	    # Get Incomplete Offers
	    $response['incompleteOffers'] = $this->uem->get_incomplete_offers($userId);
	    # Get Declined Offers
	    $response['declinedOffers'] = $this->uesm->get_by_user_and_status($userId, User_event_status_model::STATUS_DECLINE);
	    # Get completed offers
	    $response['completedOffers'] = $this->uem->get_completed_offers($userId);
	    
	    $response = array('flag'=>1,'response'=> $response);	    
	    
	    return $response;
	}
	
	public function yield_smart_contract($payload)
	{
	    $response = array();
	    
	    if(empty($this->input->post('user_id')))
	    {
	        $response = array('flag'=>0, 'message'=>'Please login first');
	        return $response;
	    }
	    
	    if(empty($this->input->post('event_id')))
	    {
	        $response = array('flag'=>0, 'message'=>'Please provide event id first');
	        return $response;
	    }

	    $userId = $this->input->post('user_id');
	    $eventId = $this->input->post('event_id');
	    
	    # Load user event status model
	    $this->load->model('user_event_status_model','uesm');
	    
	    # Load user event model
	    $this->load->model('user_event_model', 'uem');
	    
	    # Update event status to pending
	    $this->uem->update_status($eventId, User_event_model::EVENT_PENDING);
	    
	    # Load user model
	    $this->load->model('user');
	    
	    $status = User_event_status_model::STATUS_YIELD_SMART_CONTRACT;
	    
	    # Check if event status already exists
	    $result = $this->uesm->get_by_id($eventId, $userId);
	    if(empty($result)) $this->uesm->register_event_status($eventId, $userId, $status);
	    
	    
	    # Load pct setting model
	    $this->load->model('pct_setting');
	    
	    $response['eventData'] = $this->uem->get_by_id($eventId);
// 	    $response['accounts'] = $this->db->from('user')->get()->result();
	    $profile = $this->user->getUserProfile($userId);
	    $response['walletBalance'] = $profile->pct_wallet_amount;
	    
	    $response = array('flag'=>1, 'result'=>$response);
	    
	    
	    return $response;
	}
	
	public function process_smart_contract($payload)
	{
	    $response = array();
	    
	    # Validate user credentials before processing the payment
	    
	    # Load model user
	    $this->load->model('user');
	    
	    $result = $this->user->sign_in($this->input->post('username'), $this->input->post('userpassword'));
	    
	    if(!$result)
	    {
	        $response = array('flag'=>0, 'message'=>$this->message->setFlashMessage(Message::PCT_PAYMENT_FAILED_LOGIN_ERROR));
	        return $response;
	    }
	    
	    $txnId = "PCTINT".time();
	    $fromUser = $result;
	    $toUser = $this->input->post('to_account');
	    $txnType = 'User To User Transfer';
	    $txnPoints = $this->input->post('pct_transfer_points');
	    $txnTopic = $this->input->post('pct_topic');
	    $txnMessage = $this->input->post('pct_message');
	    
	    # Now before actually making the transaction store, we need to add points to users account
	    
	    $profile = $this->user->getUserProfile($result);
	    
	    $walletAmount = $profile->{User::_PCT_WALLET_AMOUNT};
	    
	    if($txnPoints > $walletAmount){
	        $response = array('flag'=>0, 'message'=>'Insufficient PCT Points');
	        return $response;
	    }
	    
	    $toUserProfile = $this->user->getUserProfile($toUser);
	    
	    $this->db->where(User::_ID, $toUser)->update(User::_TABLE, array(User::_PCT_WALLET_AMOUNT => $toUserProfile->{User::_PCT_WALLET_AMOUNT} + $txnPoints));
	    $this->db->where(User::_ID, $fromUser)->update(User::_TABLE, array(User::_PCT_WALLET_AMOUNT => ($walletAmount- $txnPoints)));
	   
	    
	    # Load pct-transaction model
	    $this->load->model('pct_transaction');
	    $result = $this->pct_transaction->create_transaction($fromUser, $toUser, $txnId, $txnType, $txnPoints, $txnTopic, $txnMessage);
	    
	    if($this->input->post('transfer_type') && $this->input->post('transfer_type') == "smart contract")
	    {
	        $this->pct_transaction->update_transaction('Smart Contract Transfer', $this->input->post('event-id'), $result);
	        
	        # Now we have the smart contract done for the event, so let's update event status
	        # Load user event model
	        $this->load->model('user_event_model', 'uem');
	        $this->db->where(User_event_model::_ID, $this->input->post('event_id'))->update(User_event_model::_TABLE, array(User_event_model::_STATUS => User_event_model::EVENT_COMPLETED));
	    }
	    
	    
	    if($result) $response = array('flag'=> 1, 'message'=>'PCT Payment transfer successfull');
	    else  $response = array('flag'=>0, 'message'=>'PCT Payment transfer failed');
	    
	    return $response;
	    
	}
	
	public function acquire_data($payload)
	{
	   $response = array();
	   
	   # Load Page Model
	   $this->load->model('page');
	   
	   $dataId = $this->input->post('data_id');
	   $userId = $this->input->post('user_id');
	   
	   $result = $this->page->get_by_id($dataId);
	   
	   # Check if data is already accquired
	   
	   # Load pss purchase history model
	   $this->load->model('psss_purchase_history', 'pss');
	   
	   $condition = array(Psss_purchase_history::_ITEM_ID=> $dataId, Psss_purchase_history::_USER_ID => $userId);
	   $output = $this->pss->check_if_pss_available($condition);
	   
	   if(!empty($output))
	   {
	       $response = array('flag'=>0, 'message'=>'This data is alreay accquired by you');
	       return $response;
	   }
	   
	   $this->load->model('user');
	   $userProfile = $this->user->getUserProfile($userId);
	   
	   $this->load->model('psss_purchase_history','psss');
	   
	   $result = $this->psss->create_purchase_history('PRICELESS', $userId, $dataId, $result->{Page::_PAGE_TITLE}, $result->{Page::_CATEGORY_ID}, 0, 'EUR', $userProfile->{User::_EMAIL}, 'priceless');
	   
	   if($result) $response = array('flag'=>1, 'message'=>'Priceless data accquiring successfull');
	   else $response = array('flag'=>0, 'message'=>'OOPS ! Unable to accquire priceless data');
	   
	   return $response;
	}
	
	
	
}
