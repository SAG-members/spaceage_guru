<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rss_feed_controller extends Application 
{
	
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->isLoggedIn()) { $this->redirectToLogin();}
		
		# Load user modal
		$this->load->model('admin/rss_feed_subscription_model','rss');
	}
	
	public function index()
	{
		if($this->input->post('faq-question'))
		{
			$question = $this->input->post('faq-question');
			$anonymous = $this->input->post('anonymous') ? 1:0;
			$userId = $this->session->userdata('id');
						
			$lastInsertId = $this->faq->createNewFaq($userId, $question, $anonymous);
				
			if($lastInsertId) $this->message->setFlashMessage(Message::FAQ_CREATE_SUCCESS, array('id'=>'1'));
			else $this->message->setFlashMessage(Message::FAQ_CREATE_FAILURE);
						
		}	
					
		$data = array();
		$this->template->title('Manage Rss Subscription');
		
		$data['subscriptions'] = $this->rss->get_feed_list('', '', '');
		$data['count'] = $this->rss->get_feed_count();
		
		$this->template->render('rss-feed/manage_rss_feed_list', $data);
		
	}
	
// 	public function update_faq()
// 	{
// 		if($this->input->post('faq-question'))
// 		{
// 			$faqId = $this->input->post('faq-id');
// 			$question = $this->input->post('faq-question');
// 			$anonymous = $this->input->post('anonymous') ? 1:0;
					
// 			$lastInsertId = $this->faq->updateFaq($faqId, $question, $anonymous);
		
// 			if($lastInsertId) $this->message->setFlashMessage(Message::FAQ_UPDATE_SUCCESS, array('id'=>'1'));
// 			else $this->message->setFlashMessage(Message::FAQ_UPDATE_FAILURE);
		
// 		}
// 		redirect('faqs');
// 	}
	
// 	public function delete_faq()
// 	{
// 		$faqId = $this->uri->segment(2);
	
// 		$result = $this->faq->deleteFaqById($faqId);
	
// 		if($result)$this->message->setFlashMessage(Message::FAQ_DELETE_SUCCESS, array('id'=>'1'));
// 		else $this->message->setFlashMessage(Message::FAQ_DELETE_FAILURE);
	
// 		redirect('faqs'); 
// 	}
	
// 	public function publish_faq()
// 	{
// 		$faqIds = $this->input->post('faq-ids');
		
// 		$result = $this->faq->publishFaq($faqIds);
		
// 		if($result)$this->message->setFlashMessage(Message::FAQ_PUBLISH_SUCCESS, array('id'=>'1'));
// 		else $this->message->setFlashMessage(Message::FAQ_PUBLISH_FAILURE);
		
// 		redirect('faqs');
// 	}
	
// 	public function unpublish_faq()
// 	{
// 		$faqIds = $this->input->post('faq-ids');
		
// 		$result = $this->faq->unPublishFaq($faqIds);
		
// 		if($result)$this->message->setFlashMessage(Message::FAQ_UNPUBLISH_SUCCESS, array('id'=>'1'));
// 		else $this->message->setFlashMessage(Message::FAQ_UNPUBLISH_FAILURE);
		
// 		redirect('faqs');
// 	}
		
}
