<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Public_ajax_controller extends CI_Controller 
{
	/* General Service */
	
	const AJAX_VALIDATE_AVATAR_OR_COUPON = 100;
	const AJAX_VALIDATE_AVATAR_NAME = 101;
	
	
	
	
	
	const AJAX_POPULATE_COUNTRIES = 10002;
	const AJAX_GET_TERMS_AND_CONDITIONS = 10003;
	
	
	const AJAX_SIGN_UP_USER = 10004;
	const AJAX_SIGN_IN_USER = 10005;
	const AJAX_FORGOT_PASSWORD = 10006;
	const AJAX_GET_QUESTIONS = 10007;
	const AJAX_GET_WIKI_SEARCH_RESULT = 10008;
	
	const AJAX_REQUEST_ADMIN_PASSWORD = 10009;
	const AJAX_REQUEST_USER_PASSWORD = 10010;
	const AJAX_VALIDATE_COUPON_CODE = 10011;
	const AJAX_INVITE_NEW_USER_TO_JOIN = 10012;
	
	const AJAX_GET_USER_PROFILE = 1;
	const AJAX_UPDATE_USER_PROFILE = 1;
	const AJAX_CHANGE_USER_PASSWORD = 1;
		
	const AJAX_GET_BLOGS = 1;
	const AJAX_GET_BLOG_DETAIL = 1;
	const AJAX_CREATE_NEW_BLOG = 1;
	
	const AJAX_GET_PRODUCTS = 1;
	const AJAX_GET_PRODUCT_DETAIL = 1;
	const AJAX_CREATE_NEW_PRODUCT = 1;
	
	const AJAX_GET_SERVICES = 1;
	const AJAX_GET_SERVICE_DETAIL = 1;
	const AJAX_CREATE_NEW_SERVICE = 1;
	
	const AJAX_GET_SENSATIONS = 1;
	const AJAX_GET_SENSATION_DETAIL = 1;
	const AJAX_CREATE_NEW_SENSATION = 1;
	
	const AJAX_GET_SYMPTOMS = 1;
	const AJAX_GET_SYMPTOM_DETAIL = 1;
	const AJAX_CREATE_NEW_SYMPTOM = 1;
	
	
	/*
	
	const AJAX_VIEW_PROFILE = 10013;
	
	const AJAX_BLOG_CREATE = 10014;
	const AJAX_ADD_PRODUCT = 10015;
	const AJAX_ADD_SERVICES = 10016;
	const AJAX_GET_PRODUCT = 10017;
	const AJAX_GET_SERVICES = 10018;
	const AJAX_GET_SENSATION = 10019;
	const AJAX_GET_SYMPTOM = 10020;
		
	const AJAX_GET_PRODUCT_DETAILS = 10021;
	const AJAX_GET_SERVICE_DETAILS = 10022;
	const AJAX_GET_SYMPTOM_DETAILS = 10023;
	const AJAX_GET_BLOG_DETAILS = 10024;
	const AJAX_GET_SENSATION_DETAILS = 10025;
	
	const AJAX_GET_BLOGS = 10026;
	const AJAX_GET_SUBMODILITY_LIST = 10027;
	*/
	
	const AJAX_CHECK_IF_EMAIL_AVAILABLE = 9999;
	
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
			case self::AJAX_VALIDATE_AVATAR_OR_COUPON : $response = $this->validateAvatarName($payload);
			case self::AJAX_VALIDATE_AVATAR_NAME : $response = $this->validateAvatarName($payload); break;
			
			
// 			case self::AJAX_GENERATE_EMAIL_ID : $response = $this->generateAutoEmail(); break;
			case self::AJAX_POPULATE_COUNTRIES : $response = $this->getCountries(); break;
			case self::AJAX_GET_TERMS_AND_CONDITIONS : $response = $this->getTermsAndCondition(); break;
			case self::AJAX_SIGN_UP_USER : $response = $this->signup(); break;
			case self::AJAX_SIGN_IN_USER : $response = $this->signin(); break;
			case self::AJAX_FORGOT_PASSWORD : $response = $this->forgotPassword(); break;
			case self::AJAX_GET_QUESTIONS : $response =  $this->getQuestions(); break;
			case self::AJAX_GET_WIKI_SEARCH_RESULT : $response = $this->getWikiSearchResult($payload); break;
			
			case self::AJAX_REQUEST_ADMIN_PASSWORD : $response = $this->requestAdminPassword($payload); break;
			case self::AJAX_REQUEST_USER_PASSWORD : $response = $this->requestUserPassword($payload); break;
			case self::AJAX_VALIDATE_COUPON_CODE : $response = $this->validateCouponCode($payload); break;
			case self::AJAX_INVITE_NEW_USER_TO_JOIN : 	$response = $this->inviteNewUserToJoin($payload); break;
			
			case self::AJAX_GET_USER_PROFILE : $response = $this->inviteNewUserToJoin($payload); break;
			case self::AJAX_UPDATE_USER_PROFILE : $response = $this->inviteNewUserToJoin($payload); break;
			case self::AJAX_CHANGE_USER_PASSWORD : $response = $this->inviteNewUserToJoin($payload); break;
			
			case self::AJAX_GET_BLOGS : $response = $this->inviteNewUserToJoin($payload); break;
			case self::AJAX_GET_BLOG_DETAIL : $response = $this->inviteNewUserToJoin($payload); break;
			case self::AJAX_CREATE_NEW_BLOG : $response = $this->inviteNewUserToJoin($payload); break;
			
			case self::AJAX_GET_PRODUCTS : $response = $this->inviteNewUserToJoin($payload); break;
			case self::AJAX_GET_PRODUCT_DETAIL : $response = $this->inviteNewUserToJoin($payload); break;
			case self::AJAX_CREATE_NEW_PRODUCT : $response = $this->inviteNewUserToJoin($payload); break;
			
			case self::AJAX_GET_SERVICES : $response = $this->inviteNewUserToJoin($payload); break;
			case self::AJAX_GET_SERVICE_DETAIL : $response = $this->inviteNewUserToJoin($payload); break;
			case self::AJAX_CREATE_NEW_SERVICE : $response = $this->inviteNewUserToJoin($payload); break;
			
			case self::AJAX_GET_SENSATIONS : $response = $this->inviteNewUserToJoin($payload); break;
			case self::AJAX_GET_SENSATION_DETAIL : $response = $this->inviteNewUserToJoin($payload); break;
			case self::AJAX_CREATE_NEW_SENSATION : $response = $this->inviteNewUserToJoin($payload); break;
			
			case self::AJAX_GET_SYMPTOMS : $response = $this->inviteNewUserToJoin($payload); break;
			case self::AJAX_GET_SYMPTOM_DETAIL : $response = $this->inviteNewUserToJoin($payload); break;
			case self::AJAX_CREATE_NEW_SYMPTOM : $response = $this->inviteNewUserToJoin($payload); break;
			
			
			
			
			
			
			
			/*
			case self::AJAX_VIEW_PROFILE : $response = $this->viewprofile($payload); break;
			case self::AJAX_BLOG_CREATE : $response = $this->blogcreation($payload); break;
			case self::AJAX_ADD_PRODUCT : $response = $this->addproduct($payload); break;
			case self::AJAX_ADD_SERVICES : $response = $this->addservices($payload); break;
			case self::AJAX_GET_PRODUCT : $response = $this->getproduct($payload); break;
			case self::AJAX_GET_SERVICES : $response = $this->getservices($payload); break;
			case self::AJAX_GET_SENSATION : $response = $this->getsensation($payload); break;
			case self::AJAX_GET_SYMPTOM : $response = $this->getsymptom($payload); break;
						
			case self::AJAX_GET_PRODUCT_DETAILS :$response=$this->productDetails($payload); break;
			case self::AJAX_GET_SERVICE_DETAILS :$response=$this->serviceDetails($payload); break;
			case self::AJAX_GET_SYMPTOM_DETAILS :$response=$this->symptomDetails($payload); break;
			case self::AJAX_GET_BLOG_DETAILS 	:$response=$this->blogDetails($payload); break;
			case self::AJAX_GET_SENSATION_DETAILS :$response=$this->sensationDetails($payload); break;
			
			case self::AJAX_GET_BLOGS : $response = $this->getBlogs($payload); break; 
			case static::AJAX_GET_SUBMODILITY_LIST : $response = $this->getSubmodility($payload); break;
			*/
			case self::AJAX_CHECK_IF_EMAIL_AVAILABLE : $response = $this->isEmailAvailable(); break;
		}
		
		echo json_encode($response);
	}
	
	private function validateAvatarNameOrCoupon($payload)
	{
		
	}
	
	private function validateAvatarName($payload)
	{
		$response = array();
		
		if($payload['avatar_name'])
		{
			# Validate the avatar name, load model user
					
			$this->load->model('user');
			
			$result = $this->user->isAvatarNameAvailable($payload['avatar_name']);
			
			if($result)
			{
				$response = array('flag'=>0, 'message' => 'This avatar name is already used, please try something else');
				return $response;
			}
			
			$response = array('flag'=>1, 'This avatar is available');
		}
		
		return $response;
	}
	
	
	
	
	public function generateAutoEmail()
	{
		$this->load->model('user');
		
		$response = array();
		
		$lastId = $this->user->getLastCreatedUser();
		if(!empty($lastId))
		{
			$lastId++;
			$response['flag']=1;
			$response['email'] = generate_email($lastId);
			 
		}
		else 
		{
			$response['flag']=0;
			$response['message'] = 'Some Error : Please try again'; 
		}
				
		return $response;
		
	}
	
	public function getCountries()
	{
		$this->load->model('country');
		
		$response = array(); 
		
		$result = $this->country->getCountries();

		if(!empty($result))
		{
			$response['flag']=1;
			$response['countries'] = $result;
		}
		else 
		{
			$response['flag']=0;
			$response['message'] = 'Some Error : Please try again';
		}
		
		return $response;
	}
	
	public function getTermsAndCondition()
	{
		$this->load->model('setting');
		
		$response = array();
		
		$result = $this->setting->getSettings();
		
		if(!empty($result))
		{
			$response['flag']=1;
			$response['tc'] = $result;
		}
		else
		{
			$response['flag']=0;
			$response['message'] = 'Some Error : Please try again';
		}
		
		return $response;
	}
	
	public function signup()
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
				$response['message'] = generate_user_id($userId);
			}
			else 
			{
				$response['flag']=0;
				$response['message'] = 'Some Error : Please try again';
			}
		}

		return $response;
		
	}
	
	public function signin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$response = array();
		
		if(!empty($username) && !empty($password))
		{
			
			$this->load->model('user');
			$result = $this->user->sign_in($username, $password);
			
			if($result)
			{
				$response['flag']=1; 
				$response['message'] = 'Logged in successfully';
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
			$response['message'] = 'Some Error : Please try again';
		}
		
		return $response;
	}
	
	public function forgotPassword()
	{
		
	}
	
	public function getQuestions()
	{
		$this->load->model('questionnaire');
		
		$response = array();
		
		$result = $this->questionnaire->getQuestions();
		
		if(!empty($result))
		{
			$response['flag']=1;
			$response['questions'] = $result;
		}
		else
		{
			$response['flag']=0;
			$response['message'] = 'Some Error : Please try again';
		}
		
		return $response;
	}
	
	
	
	
	public function isEmailAvailable()
	{
		$this->load->model('user');
		
		$email = $this->input->post('email');
		
		if($this->user->isEmailAvailable($email)){
			return "Available";
		}
		else{ return  "Not Available";}
		
	}
	
	public function getWikiSearchResult($payload)
	{
		$response = array();
		
		$search = $payload['search'];
		
		# Load Results From Products Based On Search
		$this->load->model('page');
		$response['products'] = $this->page->product_search($search);
		
		# Load Results From Symptoms Based On Search
		$this->load->model('symptom_model','symptom');
		$response['symptoms'] = $this->symptom->symptom_search($search);
		
		# Load Results From Services Based On Search
		$response['services'] = $this->page->service_search($search);
		
		return $response;
	}
	
	
	public function requestAdminPassword($payload)
	{
		$response = array();
		$email = $payload['email'];
		
		# Get user based on email
		
		$this->load->model('user');
		$result = $this->user->getByEmail($email);
		
		if(count($result) == 0) $response = array('flag'=>0,'message'=>'No email matching our records, please check and try again');
		else
		{
			# Check if Email provided is admin email
			if($result->{User::_USER_GROUP} != User::GROUP_ADMINISTRATOR)
			{
				$response = array('flag'=>0,'message'=>'Email provided is not a valid administrator email, please check and try again');
			}
			
			
			# Generate a new password hash, and Update password reset table for user
				
			$this->load->model('reset_password_model','resetPassword');

			$response = $this->resetPassword->create_password_hash($result->{User::_ID});
				
			if($response)
			{
				$data['name'] = $result->{User::_F_NAME} == " " ? $result->{User::_EMAIL} :  $result->{User::_EMAIL};
				$data['passwordHash'] = $response['passwordHash'];
				
				# Load View
				
				$body = $this->load->view('email_templates/reset_admin_password', $data, TRUE);
				
				# Send Email and display message
				$response = $this->email_engine->reset_password($payload['email'], $body) ? array('flag'=>1,'message'=>'New password sent to '.$email.', please check your mailbox.') : array('flag'=>0,'message'=>'Not able to send email, please try again later');

			}		   
		}
		
		return $response;
	}
	
	public function requestUserPassword($payload)
	{
		$response = array();
		$email = $payload['email'];
		
		# Get user based on email
		
		$this->load->model('user');
		$result = $this->user->getByEmail($email);
		
		if(count($result) == 0) $response = array('flag'=>0,'message'=>'No email matching our records, please check and try again');
		else
		{
			# Check if Email provided is admin email
			if($result->{User::_USER_GROUP} === User::GROUP_ADMINISTRATOR)
			{
				$response = array('flag'=>0,'message'=>'Email provided is administrator email, please check and try again');
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

	
	public function validateCouponCode($payload)
	{
		$response = array();
		
		# Load Coupon Model
		$this->load->model('admin/coupon_model','coupon');
		
		$count = $this->coupon->validate_coupon_code($payload['coupon']);
		
		if($count > 0) $response = array('flag'=>1,'message'=>"Coupon Applied Successfully");
		else $response = array('flag'=>0,'message'=>'Invalid Coupon Code');
		
		return $response;
	}
	
	public function inviteNewUserToJoin($payload)
	{
		$flag = false;
		
		$response = array();
		
		# First step is to validate the coupon and check if invited user is already registered
		
// 		if($payload['coupon'] != "")
// 		{
// 			# Load Coupon Model
// 			$this->load->model('admin/coupon_model','coupon');
			
// 			$count = $this->coupon->validate_coupon_code($payload['coupon']);
			
// 			if($count > 0) $response = array('flag'=>1,'message'=>"Coupon Applied Successfully");
// 			else $response = array('flag'=>0,'message'=>'Invalid Coupon Code');
			
// 			return $response;
// 		}
		
		# Validate the user
		$this->load->model('user');
		
		if($this->user->getByEmail($payload['email']))
		{
			$response = array('flag'=>0,'message'=>"Unable to send invitation as user is already registered");
			
			return $response;
		}
				
		# Next step is to insert data in user invite table and generate a invitation link
		
		$this->load->model('user_invite','invite');
		
		$lastId = $this->invite->create_new_user_invite($this->session->userdata('id'), $payload['email'], $payload['coupon'], 2);;
		
		# Get invitation hash by last id
		
		$data['email'] = $payload['email'];
		$data['invitationHash'] = $this->invite->get_hash_by_id($lastId); 
		$data['couponCode'] = $payload['coupon'];
		
		# Load View
		
		$body = $this->load->view('email_templates/invite_new_user', $data, TRUE);
		
		# Next is to send an email to the user
		
		$flag = $this->email_engine->send_invitation_to_join($payload['email'], $body);
		
		if($flag) $response = array('flag'=>1,'message'=>"Invitation sent successfully");
		else $response = array('flag'=>0,'message'=>'Unable to send invitation, Please try again later');
		
		return $response;
	}
	
	# Prince : 
	
	
	public function viewprofile($payload)
	{
		$response =  array();
		$this->load->model('user');  
		$result=$this->user->getUserProfile($payload['userId']);
		
		if($result)
		{
			$response = array('flag'=>1, 'message'=>$result);
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'No Such User Id');
		}
	
		return $response;
	}
	
	public function blogcreation($payload)
	{
		$response =  array();
		
		$userId=$payload['userId'];
		$title=$payload['title'];
		$content=$payload['content'];
		$anonymous=$payload['anonymous'];
		
		$this->load->model('blog_post','blogpost');
		$result=$this->blogpost->createNewPost($userId, $title, $content, $anonymous);
		
		if($result)
		{
			$response = array('flag'=>1, 'message'=>"Insert successfully");
		}
		else
		{
			$response = array('flag'=>0, 'message'=>"Insertion Failed!");
		}
	
		return $response;
	}
	
	public function addproduct($payload)
	{
		$response =  array();
	
		$category=$payload['categoryId'];
		$userId=$payload['userId'];
		$visibility=$payload['visibility'];
		$title=$payload['title'];
		$description=$payload['description'];
		$anonymous=$payload['anonymous'];
		$countriesAvailableIn=$payload['countriesAvailableIn'];
		$price=$payload['price'];
		$this->load->model('page');
	
		$result=$this->page->create_page($category, $userId, $visibility, $title, $description, $anonymous, $countriesAvailableIn, $price);
		if($result)
		{
			$response = array('flag'=>1, 'message'=>"Insert successfully");
		}
		else
		{
			$response = array('flag'=>0, 'message'=>"Insertion Failed!");
		}
	
		return $response;
	}
	public function addservices($payload)
	{
		$response =  array();
	
		$category=$payload['categoryId'];
		$userId=$payload['userId'];
		$visibility=$payload['visibility'];
		$title=$payload['title'];
		$description=$payload['description'];
		$anonymous=$payload['anonymous'];
		$countriesAvailableIn=$payload['countriesAvailableIn'];
		$price=$payload['price'];
		$this->load->model('page');
	
		$result=$this->page->create_page($category, $userId, $visibility, $title, $description, $anonymous, $countriesAvailableIn, $price);
		if($result)
		{
			$response = array('flag'=>1, 'message'=>"Insert successfully");
		}
		else
		{
			$response = array('flag'=>0, 'message'=>"Insertion Failed!");
		}
	
		return $response;
	
	}
	
	public function getproduct($payload)
	{
		$response =  array();
		$this->load->model('page');
		$result=$this->page->get_by_category($payload['category_id']);
		if ($result) {
			$response = array('flag'=>1, 'message'=>$result);
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'No Such category Id');
		}
	
		return $response;
	}
	
	public function getservices($payload)
	{
		$response =  array();
		$this->load->model('page');
		$result=$this->page->get_by_category($payload['category_id']);
		if ($result) {
			$response = array('flag'=>1, 'message'=>$result);
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'No Such category Id');
		}
	
		return $response;
	
	
	}
	
	public function getsensation($payload)
	{
		$response =  array();
		$this->load->model('page');
		$result=$this->page->get_by_category($payload['category_id']);
		if ($result) {
			$response = array('flag'=>1, 'message'=>$result);
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'No Such category Id');
		}
	
		return $response;
	
	}
	
	public function getsymptom($payload)
	{
		$response =  array();
		$this->load->model('symptom_model','symptom');
		$result=$this->symptom->getAllSymptoms();
		if ($result) {
			$response = array('flag'=>1, 'message'=>$result);
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'No Records');
		}
	
		return $response;
	
	}
	
	public function changePassword($payload)
	{
		$response = array();
		$this->load->model('user');
		if($this->user->getUserProfile($payload['userId']))
		{
			$hashedPass =  md5($payload['password']);
			$result=$this->user->update_user_password($payload['userId'],$hashedPass);
			if ($result) {
				$response = array('flag' =>1 ,'message'=>"Password update successfully." );
			}
		}
		else
		{
			$response = array('flag' =>0 ,'message'=>"Sorry !! .There is no such User Id" );
		}
		return $response;
	}
	
	public function productDetails($payload)
	{
		$rsponse= array();
		$this->load->model('page');
		$result= $this->page->get_by_id($payload['id']);
		if($result)
		{
			$rsponse=array('flag'=>1, 'message'=>$result);
		}
		else
		{
			$rsponse=array('flag'=>0, 'message'=>'Sorry, No Records Founds');
		}
		return $rsponse;
	
	}
	public function serviceDetails($payload)
	{
	
		$rsponse= array();
		$this->load->model('page');
		$result= $this->page->get_by_id($payload['id']);
		if($result)
		{
			$rsponse=array('flag'=>1, 'message'=>$result);
		}
		else
		{
			$rsponse=array('flag'=>0, 'message'=>'Sorry, No Records Founds');
		}
		return $rsponse;
	
	}
	public function symptomDetails($payload)
	{
		$rsponse= array();
		
		$this->load->model('symptom_model','symptom');
		$result= $this->symptom->getSymptomById($payload['symptomId']);
		
		if($result)
		{
			$rsponse=array('flag'=>1, 'message'=>$result);
		}
		else
		{
			$rsponse=array('flag'=>0, 'message'=>'Sorry, No Records Founds');
		}
		return $rsponse;
	
	}
	public function blogDetails($payload)
	{
		$rsponse= array();
		
		$this->load->model('blog_post', 'blog');
		$result= $this->blog->getPostById($payload['blogId']);
		
		if($result)
		{
			$rsponse=array('flag'=>1, 'message'=>$result);
		}
		else
		{
			$rsponse=array('flag'=>0, 'message'=>'Sorry, No Records Founds');
		}
		return $rsponse;
	
	}
	public function sensationDetails($payload)
	{
		$rsponse= array();
		$this->load->model('page');
		$result= $this->page->get_by_id($payload['id']);
		if($result)
		{
			$rsponse=array('flag'=>1, 'message'=>$result);
		}
		else
		{
			$rsponse=array('flag'=>0, 'message'=>'Sorry, No Records Founds');
		}
		return $rsponse;
	
	}
	
	public function getBlogs($payload)
	{
		$rsponse= array();
		$this->load->model('blog_post', 'blog');
		
		$result= $this->blog->getPosts('', '');
		if($result)
		{
			$rsponse=array('flag'=>1, 'message'=>$result);
		}
		else
		{
			$rsponse=array('flag'=>0, 'message'=>'Sorry, No Records Founds');
		}
		return $rsponse;
	}
	
	public function getSubmodility($payload)
	{
		$response = array();
	
		$this->load->model('admin/page','page');
	
		$response = $this->page->get_submodility($payload['pageId']);
	
		return $response;
	}
	
}
