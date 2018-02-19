<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends Base
{
	public function __construct()
	{
		parent::__construct();
	}	
	
	public function index()
	{	
		$data = array();

		
		$this->load->model('country');
		$this->load->model('cms');
		
		$data['tandc'] = $this->cms->get_by_slug('user-tous')->{Cms::_CONTENT};
		$data['countries'] = $this->country->getCountries();
		/*
		$this->load->model('questionnaire');
		
		
		$data['questionnaire'] = $this->questionnaire->getQuestions();
		
		*/
		
		//$this->template->setAdditionalScript(array('reg-script.js'));
		$this->template->title('Sparring humankind to space age');
		$this->template->render('auth/register', $data);	
		
	}
	
	public function sign_up()
	{
		
		if($this->input->post('country') && $this->input->post('avatar_name') && $this->input->post('password') && $this->input->post('cpassword'))
		{
			$recommendor = $this->input->post('recommendor');
			$country = $this->input->post('country');
			$avatarName = $this->input->post('avatar_name');
			$gender = $this->input->post('user_gender');
			$whatAreYou = $this->input->post('what_are_you');
			$whatYouWantToBecome = $this->input->post('what_you_want_to_become');
			$whatDoYouNeed = $this->input->post('what_do_you_need');
			$problemPreventing= $this->input->post('problem_preventing');
			$password = $this->input->post('password');
			$cpassword = $this->input->post('cpassword');
			$suggestionRequired= $this->input->post('suggestion_required');
			$securityQuestion = $this->input->post('secret_question');
			$securityQuestionAnswer = $this->input->post('secret_question_answer');
			
			$couponCodeDetails = '';
			
			# Validate if both passwords are equal
			if($password != $cpassword)
			{
				$this->message->setFlashMessage(Message::PASSWORD_CONFIRM_PASSWORD_MATCH_FAILURE);
				redirect('register');
			}
				
			# Check to see if avatar name is already available or not
				
			$this->load->model('user');
				
			$result = $this->user->isAvatarNameAvailable($avatarName);
				
			if($result)
			{
				$this->message->setFlashMessage(Message::AVATAR_NAME_ERROR);
				redirect('register');
			}
			
			# Next step is to validate the recommendor
			
			if(!empty($recommendor))
			{
				$result = $this->user->isAvatarNameAvailable($recommendor);
				
				if($result) 
				{
					$recommendor = $result->{User::_USERNAME};
				} # Now if recommendor is coupon code, it is mandatory to validate the coupon code and give benefits of coupon to the user
				else 
				{
					# Load coupon model
					$this->load->model('admin/coupon_model','coupon_model');
					
					$couponCodeDetails = $this->coupon_model->get_coupon_details($recommendor);
									
				}
			}
						
			# Check if Avatar image is available then store this in folder

			if($_FILES)
			{
				# Get Image and Create Thumb and upload
				$avatarImage = '';
				$file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
				$upload_exts = explode(".", $_FILES["file"]["name"]);
				$upload_exts = end($upload_exts);
					
				if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 2000000) && in_array($upload_exts, $file_exts))
				{
					if ($_FILES["file"]["error"] > 0) { echo "Return Code: " . $_FILES["file"]["error"] . "<br>"; }
					else
					{
						# Generate Timestamp name for image name and upload
						$avatarImage = md5($_FILES["file"]["name"].microtime()).'.'.$upload_exts;
							
						move_uploaded_file($_FILES["file"]["tmp_name"], Template::_PUBLIC_AVTAR_DIR . $avatarImage);
					}
				}
				
			}
			
			$lastId = $this->user->sign_up($recommendor, $country, $avatarName, $avatarImage, $gender, $whatAreYou, $whatYouWantToBecome, $problemPreventing, $password, $securityQuestion, $securityQuestionAnswer, $suggestionRequired, $whatDoYouNeed);
			

			# Now since we have the result, we will create a new entry in user subscription table based on the details by coupon code
			# Ensure to mention the expiry date of the subscription so that the user can't use more than what he is provided with
				
			$membershipType = '';
			if($couponCodeDetails)
			{
				
				$membershipType = $couponCodeDetails->{Coupon_model::_MEMBERSHIP_TYPE};
				
				$date = new DateTime();
				$date = $date->format('Y-m-d H:i:s');
				
				$expiry = new DateTime();
				$expiry->add(new DateInterval('P'.rtrim(str_replace('days', '',$couponCodeDetails->{Coupon_model::_TIME_OF_VALIDATION}),' ').'D'));
				$expiry = $expiry->format('Y-m-d H:i:s');
				
				$this->load->model('user_subscription', 'subscription');
				$this->subscription->create_subscription($couponCodeDetails->{Coupon_model::_COUPON_CODE}, $lastId, $couponCodeDetails->{Coupon_model::_MEMBERSHIP_TYPE}, 'Membership upgrade by coupon', 3, 0, '', '', $date, $expiry, "Invitation", User_subscription::TYPE_COUPON_SUBSCRIPTION);
				
				# Now Since we have the membership from the coupon, we should update this to user profile
				$this->load->model('user');
				$this->user->update_user_membership($lastId, $membershipType);
				
				
			}
			
			
			if($lastId)
			{
				# Get user profile details
				
				$userProfile = $this->user->getUserProfile($lastId);
				
				$this->user->update_login_status($lastId, 1);
				
				$sessionData = array(
						'id'=>$userProfile->{User::_ID},
						'email'=>$userProfile->{User::_EMAIL},
						'userLevel'=>$userProfile->{User::_USER_GROUP},
						'gender'=>$userProfile->{User::_GENDER},
						'membershipLevel'=>empty($membershipType) ? $userProfile->{User::_USER_MEMBERSHIP_LEVEL} : $membershipType,
						'isLoggedIn'=>true
				);
				
				$userId = $userProfile->{User::_ID};
				
				# Let's set-up cookie to ensure user is logged in until user specifically logged out from the system
				/*=======================================================*/
				$token = create_hash();
				
				# Now store this information in database, so that we can utilize this later for auto login
				
				$this->user->store_cookie_hash($token, $userId);
				
				# Store cookie
				
				$cookie = $userId . ':' . $token;
				$mac = hash_hmac('sha256', $cookie, 'kailash');
				$cookie .= ':' . $mac;
				
				setcookie('bakeme',$cookie, time()+60*60*24*30, '/');
				
				/*=======================================================*/
						
				
				$message = 'Welcome '. generate_user_id($userId) .' <br/>You are safely logged in <br/><br/> Your current membership level is '. $this->user->get_user_membership($userProfile->{User::_USER_MEMBERSHIP_LEVEL});
// 				$message = 'Welcome '. generate_user_id($lastId) .' <br/>You are safely logged in and free to access the material above';
// 				$this->session->set_userdata('welcome-message', $message);
				
				$this->session->set_flashdata('welcome-message', $message);
				$this->session->set_userdata($sessionData);
				
				redirect(base_url('user/data/introduction-to-spageage-guru'));
			}
			else
			{
				$this->message->setFlashMessage(Message::REGISTRATION_ERROR);
				redirect('register');
			}
			
		}
		else
		{
			$this->message->setFlashMessage(Message::REGISTRATION_ERROR);
			redirect('register');
		}
		
	}

	/*
	public function sign_up()
	{
		$registrationInfo = json_decode($this->input->post('registration-info'), true); 
				
		$this->load->model('user');
			
		$userId = $this->user->sign_up($registrationInfo[0]);
				
		if(!empty($userId)) 
		{ 
			# Get user profile details
			$userProfile = $this->user->getUserProfile($userId);
				
			$sessionData = array(
					'id'=>$userProfile->{User::_ID},
					'email'=>$userProfile->{User::_EMAIL},
					'userLevel'=>$userProfile->{User::_USER_GROUP},
					'membershipLevel'=>$userProfile->{User::_USER_MEMBERSHIP_LEVEL},
					'isLoggedIn'=>true
			);
			
			# Generate User Id;
			
			$prefix = 'U';
			$user = $prefix.(10000+$userId);
			
			$message = 'Welcome '. $user .' <br/>You are safely logged in and free to access the material above';
			$this->session->set_userdata('welcome-message', $message);
				
			$this->session->set_userdata($sessionData);
			
			# Let us check if invitation hash is set
			
			if($this->session->userdata('inviteHash'))
			{
				# Validate Invite hash to ensure it is not used previously
				
				$hash = $this->session->userdata('inviteHash');
				
				$this->load->model('user_invite','invite');
				$result = $this->invite->validate_hash($hash);
				
				if(!empty($result))
				{
					# Let us update usermembership type to what is stored in invite table
					$membershipType = $result->{User_invite::_MEMBERSHIP_TYPE};
					$recommendor = $result->{User_invite::_INVITED_BY};
					$email = $result->{User_invite::_INVITED_EMAIL};
					
					$this->session->set_userdata('membershipLevel', $membershipType);
					
					$this->user->update_membership_and_recommendor($userId, $recommendor, $membershipType, $email);
					$this->invite->update_hash_status($hash);
				}
			}
							
			redirect(base_url('profile'));
			
		}
	}
	*/
}
