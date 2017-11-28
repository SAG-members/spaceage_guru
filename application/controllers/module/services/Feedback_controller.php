<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_controller extends Application 
{
	public function __construct()
	{
		parent::__construct();
		if(!$this->isLoggedIn()) { redirect($this->redirectToLogin()); }
		
		$this->load->model('feedback');
	}
		
	public function index()
	{	
		if($this->input->post('email') && $this->input->post('comment'))
		{
			$email = $this->input->post('email');
			$website = $this->input->post('website');
			$comment = $this->input->post('comment');
			$response = $this->input->post('response') ? 1 : 0;
			$lastId = $this->feedback->create_feedback($email, $website, $response, $comment);
			
			if($lastId) $this->message->setFlashMessage(Message::FEEDBACK_CREATE_SUCCESS, array('id'=>'1'));
			else $this->message->setFlashMessage(Message::FEEDBACK_CREATE_FAILURE); 
		}		
		
		$this->template->title("Feedback");
		$this->template->render('services/feedback'); 
	}
	
	
	
}
