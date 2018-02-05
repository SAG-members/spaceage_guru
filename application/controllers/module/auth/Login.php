<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Base 
{
	public function __construct()
	{
		parent::__construct();
							
	}	
	
	public function index()
	{ 
		if($this->input->post('username') && $this->input->post('password'))
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$this->load->model('user');
			$userId = $this->user->sign_in($username, $password);
			
			if($userId)
			{
				# Get user profile details
				$userProfile = $this->user->getUserProfile($userId);
// 				print_r($userProfile); die;	
				$sessionData = array(
						'id'=>$userProfile->{User::_ID},
						'email'=>$userProfile->{User::_EMAIL},
						'userLevel'=>$userProfile->{User::_USER_GROUP},
						'membershipLevel'=>$userProfile->{User::_USER_MEMBERSHIP_LEVEL},
						'gender'=>$userProfile->{User::_GENDER},
						'isLoggedIn'=>true
				);
				
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
				
								
				# Generate User Id;
				
				$message = 'Welcome '. generate_user_id($userId) .' <br/>You are safely logged in and free to access the material above<br/><br/> Your current membership level is '. $this->user->get_user_membership($userProfile->{User::_USER_MEMBERSHIP_LEVEL});
				$this->session->set_flashdata('welcome-message', $message);

				$this->message->setFlashMessage(Message::LOGIN_SUCCESS, array('id'=>'1'));
				$this->session->set_userdata($sessionData);

				
				if($this->input->post('referrer'))
				{
					if($this->session->has_userdata('referrer')){$this->session->unset_userdata('referrer');}
					$redirectURL = strstr($this->input->post('referrer'), '/satan');
					# Remove base directory and index.php
					$redirectURL = str_replace('/satan/', '', $redirectURL); 
					redirect(base_url($redirectURL));
				}
				else redirect(base_url('user/data/introduction-to-spageage-guru'));
			}
			else
			{
				$this->message->setFlashMessage(Message::LOGIN_FAILURE);
				redirect(base_url('login'));
			}
			
			
		} 
		
		$this->template->title('Login in Spaceage Guru');
		$this->template->render('auth/login');
				
	}
}
