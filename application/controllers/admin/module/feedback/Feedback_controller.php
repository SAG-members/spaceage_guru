<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_controller extends Application {
	
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->isLoggedIn()) { $this->redirectToLogin();}
		
		# Load Blog Post Model
		$this->load->model('admin/feedback_model','feedback');
	}
	
	public function index()
	{				
		$data = array();
		$this->template->title('Manage Feedbacks');
		
		$data['feedbacks'] = $this->feedback->get_feedbacks('', '', '', '');
		$data['count'] = $this->feedback->get_feedback_count();
		
		$this->template->render('feedback/manage_feedback', $data);
		
	}
			
	public function publish_feedback()
	{
		$postIds = $this->input->post('post-ids');
				
		$result = $this->blog->publishPost($postIds);
		
		if($result)$this->message->setFlashMessage(Message::BLOG_POST_PUBLISHED_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::BLOG_POST_PUBLISHED_FAILURE);
		
		redirect('blogs');
	}
	
	public function unpublish_feedback()
	{
		$postIds = $this->input->post('post-ids'); 
				
		$result = $this->blog->unPublishPost($postIds);
		
		if($result)$this->message->setFlashMessage(Message::BLOG_POST_UNPUBLISHED_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::BLOG_POST_UNPUBLISHED_FAILURE);
		
		redirect('blogs');
	}
		
}
