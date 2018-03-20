<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller 
{
	public $data = array();
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('cookie');
		
		# Check if admin & then set values
				
		if($this->uri->segment(1) === 'admin')
		{
			$this->template->setSiteLayout(Template::_ADMIN_TEMPLATE_DIR, Template::_ADMIN_LAYOUT_DIR, Template::_ADMIN_MODULE_DIR);
		
			# Load user model
			$this->load->model('admin/user', 'user');
			
			# Set Template
						
			$this->template->setTemplate('logged_in_template');
			$this->template->setHeader('header', '');
			$this->template->setLeftSideBar('sidebar',$this->data);
			$this->template->setFooter('footer','');
		}
		else 
		{
		    # First step is to get the ip address of the user
		    $ipAddress = get_ip_address();
// 		    echo $ipAddress;
		    # Now once we have the Ip we will check for the IP in database
		    $this->db->select('ip_address');
		    $this->db->from('virgin_users');
		    $this->db->where('ip_address', $ipAddress);
		    $result = $this->db->get()->row();
// 		    echo $this->db->last_query();
		    
		    if(empty($result))
		    {
		        $this->data['playVideo'] = true;
		        
		        # Now once we have set the video to play, let's input the ip address to database
		        $data = array('ip_address'=>$ipAddress);
		        $this->db->insert('virgin_users', $data);
		    }
		    
		   
		    		    
		    
			# Initialize template and set values for header/footer/left side bar and right side bar
			
			$this->template->setSiteLayout(Template::_PUBLIC_TEMPLATE_DIR, Template::_PUBLIC_LAYOUT_DIR, Template::_PUBLIC_MODULE_DIR);
			
			$this->template->setTemplate('public_master_template.php');
			$this->template->setHeader('header', '');
			$this->template->setNavigation('main_menu','');
			
			$this->load->model('user');
						
			$country = '';
			# Get county from logged in user profile
			
			$isLoggedIn = false;
			$membershipLevel = 1;
			if($this->session->userdata('id'))
			{
				$userObj = $this->user->getUserProfile($this->session->userdata('id'));
				$membershipLevel = $userObj->{User::_USER_MEMBERSHIP_LEVEL};
				$isLoggedIn = true;
			} 
			
			# Load Page model and get all products limit by 10
			$this->load->model('page');
			$this->load->model('library_event_comment_model', 'ulec');
			
			# Get list of user with less then or equals to the membership level of the logged in user
			$this->data['friends'] = $this->user->get_chat_friend_lists($membershipLevel, $this->session->userdata('id'));
			
			# Load Membership Data
			$this->load->model('membership_model','membership');
			$this->load->model('User_library_event_escrow_model','escrow');
			
			# Set Additional Script
			$additionalScripts = array('plugin/jquery_toastmessage/jquery.toastmessage.js');
			$additionalStyles = array('jquery_toastmessage/jquery.toastmessage.css');
			
			$this->template->setAdditionalScript($additionalScripts);
			$this->template->setAdditionalStyle($additionalStyles);
			
			# Load page model and get all data
			$this->data['datas'] = $this->page->get_data(20, 'desc', $membershipLevel);
			$this->template->setLeftSideBar('left_sidebar',$this->data);
			
			# Load country model
			$this->load->model('country');
						
			$this->load->model('tasks_goals');
			$this->data['tasks'] = $this->tasks_goals->get_task_by_user($this->session->userdata('id'));
			$this->data['goals'] = $this->tasks_goals->get_goals_by_user($this->session->userdata('id'));
			$this->data['communication'] = $this->ulec->get_communication_data($this->session->userdata('id'));
			
			
			$this->template->setRightSideBar('right_sidebar', $this->data);
			
			if(isset($_COOKIE['bakeme']))
			{
			    $cookie = $_COOKIE['bakeme'];
			    list ($user, $token, $mac) = explode(':', $cookie);
			    if (!hash_equals(hash_hmac('sha256', $user . ':' . $token,'kailash'), $mac)) {
			        return false;
			    }
			    
			    $usertokenQ = $this->user->validate_with_cookie($token);
			    
			    if(!empty($usertokenQ))
			    {
			        if (hash_equals($usertokenQ->{User::_LOGGED_COOKIE}, $token))
			        {
			            # Get user profile details
			            $userProfile = $this->user->getUserProfile($usertokenQ->{User::_ID});
			            
			            $sessionData = array(
			                    'id'=>$userProfile->{User::_ID},
			                    'email'=>$userProfile->{User::_EMAIL},
			                    'userLevel'=>$userProfile->{User::_USER_GROUP},
			                    'membershipLevel'=>$userProfile->{User::_USER_MEMBERSHIP_LEVEL},
			                    'gender'=>$userProfile->{User::_GENDER},
			                    'isLoggedIn'=>true
			            );
			            
			            $this->session->set_userdata($sessionData);
			            
			        }
			    }
			}
			
		    if(!$this->session->userdata('id'))
		    {
		        $this->template->setLeftSideBar('pre_login_left_sidebar',$this->data);
		        $this->template->setRightSideBar('pre_login_right_sidebar', $this->data);
		    }
			
		}				
	}	
}
