<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_invite_controller extends Base 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_invite','invite');
	}	
					
	public function index()
	{
		$hash = $this->uri->segment(2);
				
		$result = $this->invite->validate_hash($hash);
		
		if(empty($result))
		{
			$this->message->setFlashMessage(Message::INVITATION_LINK_ERROR);
			redirect(base_url('register'));
		}
		else 
		{
			$data = array();
						
			$this->session->set_userdata('inviteHash', $result->{User_invite::_INVITATION_HASH});
			
			redirect(base_url('register'));
		}
		
	}
		
}
