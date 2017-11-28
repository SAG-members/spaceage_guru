<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends Base 
{
	public function __construct()
	{
		parent::__construct();
	}	
	
	public function index()
	{
		if ($this->session->userdata('isLoggedIn'))
		{
			# Before unsetting any of this, let's remove the cookie and also remove the entry from the database
			# Now we have the user id
			
		    $userId = $this->session->userdata('id');
		    
		    # Load user model
		    $this->load->model('user');
		    $success = $this->user->remove_cookie_hash($userId);
		     	    
		    if($success){
		        # If success remove cookies
		        if (isset($_COOKIE['bakeme'])) {
		            setcookie('bakeme','', time()-60*60*24*30, '/');
		            unset($_COOKIE['bakeme']);
		        }
		    }
		    
		    # Once logging out we should also consider changing the logedin status to logged out
		    
		    $this->user->update_login_status($userId);
		    		    
		    $this->session->unset_userdata('isLoggedIn','redirect-url', 'welcome-message', 'id', 'email', 'userLevel', 'membershipLevel');
			$this->session->sess_destroy();

			$this->message->setFlashMessage(Message::LOGOUT_SUCCESS, array('id'=>'1'));
			redirect(base_url('login'));
		}
		
		redirect(base_url('login'));
	}
	
}
