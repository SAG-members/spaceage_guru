<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_request_controller extends Application 
{

	const AJAX_GET_FAQ_BY_ID = 10001;
	const AJAX_GET_SYMPTOM_BY_ID = 10002;
	const AJAX_GET_COUNTRY_BY_ID = 10003;
	const AJAX_RESET_USER_PASSWORD = 10004;
	const AJAX_BLOCK_USER = 10005;
	const AJAX_UNBLOCK_USER = 10006;
	const AJAX_GENERATE_PASSWORD = 10007;
	const AJAX_SEND_INVITATION_TO_JOIN = 10008;
	const AJAX_GENERATE_COUPON_CODE = 10009;
	const AJAX_EDIT_COUPON_CODE = 10010;
	const AJAX_GET_SUBMODILITY_LIST = 10011;
	const AJAX_SET_AVATAR_IMAGE = 10012;
	const AJAX_UPDATE_PAYPAL_SETTINGS = 10013;
	const AJAX_GET_PAYPAL_SETTINGS = 10014;
	
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->isLoggedIn()) { $this->redirectToLogin();}
		
	}
	
	public function index()
	{
		$response = '';
		$request = $this->input->post('request');
		$payload = json_decode($request['payload'], true);
		
		switch ($request['acid'])
		{
			case static::AJAX_GET_FAQ_BY_ID : $response = $this->getFaqById($payload); break;
			case static::AJAX_GET_SYMPTOM_BY_ID : $response = $this->getSymptomById($payload); break; 
			case static::AJAX_GET_COUNTRY_BY_ID : $response = $this->getCountryById($payload); break;
			case static::AJAX_RESET_USER_PASSWORD : $response = $this->resetUserPassword($payload); break;
			case static::AJAX_BLOCK_USER : $response = $this->blockUser($payload); break;
			case static::AJAX_UNBLOCK_USER : $response = $this->unBlockUser($payload); break;
			case static::AJAX_GENERATE_PASSWORD : $response = $this->generatePassword($payload); break;
			case static::AJAX_SEND_INVITATION_TO_JOIN : $response = $this->sendInvitationToJoin($payload); break;
			case static::AJAX_GENERATE_COUPON_CODE : $response = $this->generateCouponCode($payload); break;
			case static::AJAX_EDIT_COUPON_CODE : $response = $this->editCouponCode($payload); break;
			case static::AJAX_GET_SUBMODILITY_LIST : $response = $this->getSubmodility($payload); break;
			case static::AJAX_SET_AVATAR_IMAGE : $response = $this->setAvatarImage($payload); break;
			case static::AJAX_UPDATE_PAYPAL_SETTINGS : $response = $this->updatePaypalSettings($payload); break;
			case static::AJAX_GET_PAYPAL_SETTINGS : $response = $this->getPaypalSettings($payload); break;
		}
		
		echo json_encode($response);
	}
	
	public function getFaqById($payload)
	{
		$response = array();
		
		# Load Modal Faq
		$this->load->model('admin/faq');
		$response = $this->faq->getFaqById($payload['id']);

		return $response;
	}
	
	public function getSymptomById($payload)
	{
		$response = array();
		
		# Load Modal Symptom
		$this->load->model('admin/symptom');
		$response = $this->symptom->getSymptomById($payload['id']);
		
		return $response;
	}
	
	public function getCountryById($payload)
	{
		$response = array();
		
		# Load Modal Symptom
		$this->load->model('admin/country_model','country');
		
		$countries = $this->country->get_country_by_id($payload['id']);
		
	    $response['id'] = $countries->{Country_model::_ID};
	    $response['country_code'] = $countries->{Country_model::_COUNTRY_CODE};
	    $response['country_name'] = $countries->{Country_model::_COUNTRY_NAME};
	    $response['color_flag'] = $countries->{Country_model::_COLOR_FLAG};
	    $response['is_group'] = $countries->{Country_model::_IS_GROUP};
	    $response['image'] = $countries->{Country_model::_COUNTRY_IMAGE};
	    $response['status'] = $countries->{Country_model::_STATUS};
	    
	    if($countries->{Country_model::_IS_GROUP} == 1){
	        # Load country group model
	        
	        $this->load->model('country_group_model', 'country_group');
	        		        
	        $response['group'] = $this->country_group->get_group_countries($countries->{Country_model::_ID}); 
	    }
	    		
		return $response;
	}
	
	public function resetUserPassword($payload)
	{
		$response = array();
				
		$this->load->model('admin/user','user');
		$result = $this->user->getUserById($payload['user-id']);
		
		if($result->{User::_STATUS} == 1)
		{
			# Send email to reset password
			$data = array();
		
			$data['name'] = $result->{User::_F_NAME} == " " ? $result->{User::_EMAIL} : $result->{User::_F_NAME} ;
			$data['password'] = $payload['password'];
			
			# Now since we have the password and user id Reset password in database
			
			$flag = $this->user->update_password($result->{User::_ID}, $data['password']); 
			
			if($flag)
			{
				$body = $this->load->view('email_templates/admin_reset_user_password', $data, TRUE);
				
				$this->email_engine->reset_user_password($result->{User::_EMAIL}, $body);
			}
			
			$response = array('flag'=>1, 'message'=>"Password Reset Successfully and user has been informed via Email");
	
		}
		else
		{
			$response = array('flag'=>0, 'message'=>"User is not activated yet");
		}

		return $response;
	}
	
	public function blockUser($payload)
	{
		$userId = $payload['user-id'];
		
		$this->load->model('admin/user','u');
		$result = $this->u->getUserById($userId);
		
		$this->load->model("user");
		
		$flag = $this->user->deactivate_user($userId);
		
		if($flag)
		{
			# Send an Email to User
			
			$data = array();
			
			$data['name'] = $result->{User::_F_NAME} == " " ?  $result->{User::_EMAIL} : $result->{User::_F_NAME};
			
			$body = $this->load->view('email_templates/admin_block_user', $data, TRUE);
			
			$flag = $this->email_engine->user_blocked($result->{User::_EMAIL}, $body);
			
			if($flag) $response = array('flag'=>1, 'message'=>"User Blocked Successfully and informed via Email");
			else $response = array('flag'=>0, 'message'=>'Unable to Block User');
		}
	}
	
	public function unBlockUser($payload)
	{
		$userId = $payload['user-id'];
		
		$this->load->model('admin/user','u');
		$result = $this->u->getUserById($userId);
		
		$this->load->model("user");
		
		$flag = $this->user->activate_user($userId);
		
		if($flag)
		{
			# Send an Email to User
				
			$data = array();
				
			$data['name'] = $result->{User::_F_NAME} == " " ?  $result->{User::_EMAIL} : $result->{User::_F_NAME};
				
			$body = $this->load->view('email_templates/admin_block_user', $data, TRUE);
				
			$flag =  $this->email_engine->user_unblocked($result->{User::_EMAIL}, $body);
			
			if($flag) $response = array('flag'=>1, 'message'=>"User UnBlocked Successfully and informed via Email");
			else $response = array('flag'=>0, 'message'=>'Unable to UnBlock User');
		}
	}
	
	public function generatePassword($payload)
	{
		$response = array();
		
		$response = array('flag'=>1, 'password'=>create_hash());
		
		return $response;
	}
	
	public function sendInvitationToJoin($payload)
	{
		$flag = false;
		
		$response = array();
				
		# Validate the user
		$this->load->model('user');
		
		$emailArr = explode(',', $payload['emails']);
		
		foreach ($emailArr as $e)
		{
			# If email is already available do nothing
			if($this->user->getByEmail($e)){}
			
			# In the other case send notification
			# Next step is to insert data in user invite table and generate a invitation link
			$this->load->model('user_invite','invite');
			
			$lastId = $this->invite->create_new_user_invite($this->session->userdata('id'), $e, $payload['coupon'], $payload['membership-type']);

			# Get invitation hash by last id
			
			$data['email'] = $e;
			$data['invitationHash'] = $this->invite->get_hash_by_id($lastId);
			$data['coupon'] = $payload['coupon'];
			
			# Load View
			$body = $this->load->view('email_templates/invite_new_user', $data, TRUE);
			
			# Next is to send an email to the user
			$flag = $this->email_engine->send_invitation_to_join($payload['email'], $body);
		}

		if($flag) $response = array('flag'=>1,'message'=>"Invitation sent successfully");
		else $response = array('flag'=>0,'message'=>'Unable to send invitation, Please try again later');
				
		return $response;
	}
	
	public function generateCouponCode($payload)
	{
		$response = array();
		# Get coupon array
	
		$this->load->model('admin/coupon_model','coupon');
		$couponArr = $this->coupon->get_coupon_array();
	
		$couponCode = generate_coupon_code($couponArr);
		
		if($couponCode) $response = array('flag'=>1, 'message'=>$couponCode);
		else $response = array('flag'=>0, 'message'=>'Error creating coupon code');
		
		return $response;
	}
	
	public function editCouponCode($payload)
	{
		$response = array();
		
		$this->load->model('admin/coupon_model','coupon');
		
		$response[] = $this->coupon->get_coupon_by_id($payload['coupon-id']);

		return $response;
	}
	
	public function getSubmodility($payload)
	{
		$response = array();
		
		$this->load->model('admin/page','page');
		
		$response = $this->page->get_submodility($payload['pageId']);
		
		return $response; 
	}
	
	public function setAvatarImage($payload)
	{
		
	}
	
	public function updatePaypalSettings($payload)
	{
		$result = array();
		if($payload['settings'])
		{
			# Load setting modal
			$this->load->modal('setting');
			
			$result = $this->setting->update_settings($payload['id'], $payload['mode'], $payload['config']);
			
			if($result) $response = array('flag'=>1, 'message'=>'Settings updated successfully');
			else $result = array('flag'=>0, 'message'=>'Error updating paypal settings');
		}
		else 
		{
			$result = array('flag'=>0, 'message'=>'Error updating paypal settings');
		}
		
		return $result;
	}
	
	public function getPaypalSettings($payload)
	{
		$response = array();
		
		# Load setting modal
		$this->load->modal('setting');
		
		$response = $this->setting->get_settings();
		
		return $response;
	}
}
