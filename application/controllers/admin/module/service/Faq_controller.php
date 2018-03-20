<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq_controller extends Application {
	
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->isLoggedIn()) { $this->redirectToLogin();}
		
		$this->load->model('admin/user');
		# Load user modal
		$this->load->model('admin/faq');
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
			
			redirect('admin/faqs');
		}	
			
		$data = array();
		$this->template->title('Manage Faqs');
		
		$data['faqs'] = $this->faq->getFaqs('', '', 0);
		$data['count'] = $this->faq->getFaqCount();
		
		$this->template->render('service/manage_faq', $data);
		
	}
	
	public function update_faq()
	{
	    if($this->input->post('faq-question'))
		{
			$faqId = $this->input->post('faq-id');
			$question = $this->input->post('faq-question');
			$anonymous = $this->input->post('anonymous') ? 1:0;
					
			$lastInsertId = $this->faq->updateFaq($faqId, $question, $anonymous);
		
			if($lastInsertId) $this->message->setFlashMessage(Message::FAQ_UPDATE_SUCCESS, array('id'=>'1'));
			else $this->message->setFlashMessage(Message::FAQ_UPDATE_FAILURE);
		
		}
		redirect('admin/faqs');
	}
	
	public function edit_faq()
	{
	    $data = array();
	    
	    $faqId = $this->uri->segment(3);
	    
	    $data['faqs'] = $this->faq->getFaqById($faqId);
	    
	    # Load faq answer model
	    $this->load->model('faq_answer');
	    $data['faqsAnswers'] = $this->faq_answer->get_faq_answers_by_id($faqId);
	     
	    
	    $this->template->title('Edit Faqs');
	    $this->template->render('service/edit_faq', $data);
	}	
	
	public function delete_faq()
	{
		$faqId = $this->uri->segment(3);
	
		$result = $this->faq->deleteFaqById($faqId);
	
		if($result)$this->message->setFlashMessage(Message::FAQ_DELETE_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::FAQ_DELETE_FAILURE);
	
		redirect('admin/faqs'); 
	}
	
	public function publish_faq()
	{
		$faqIds = $this->input->post('faq-ids');
		
		$result = $this->faq->publishFaq($faqIds);
		
		if($result)$this->message->setFlashMessage(Message::FAQ_PUBLISH_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::FAQ_PUBLISH_FAILURE);
		
		redirect('admin/faqs');
	}
	
	public function unpublish_faq()
	{
		$faqIds = $this->input->post('faq-ids');
		
		$result = $this->faq->unPublishFaq($faqIds);
		
		if($result)$this->message->setFlashMessage(Message::FAQ_UNPUBLISH_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::FAQ_UNPUBLISH_FAILURE);
		
		redirect('admin/faqs');
	}
	
	public function process_faq()
	{
	    if($this->uri->segment(4))
	    {
	        # Load Faq answer model class
	                
	        $id = $this->uri->segment(4);
	        $question = $this->input->post('faq_question');
	        $anonymous = $this->input->post('anonymous');
	        
	        if($this->input->post('faq_update'))
	        {
	            $result = $this->faq->updateFaq($id, $question, $anonymous);
	            if($result)$this->message->setFlashMessage(Message::FAQ_UPDATE_SUCCESS, array('id'=>1));
	            else $this->message->setFlashMessage(Message::FAQ_UPDATE_FAILURE);
	        }
	        elseif($this->input->post('faq_delete'))
	        {
	            $result = $this->faq->deleteFaqById($id);
	            if($result)$this->message->setFlashMessage(Message::FAQ_DELETE_SUCCESS, array('id'=>1));
	            else $this->message->setFlashMessage(Message::FAQ_DELETE_FAILURE);
	            
	            redirect(base_url('admin/faqs'));
	        }
	    }
	    else
	    {
	        $this->message->setFlashMessage(Message::USER_SUBSCRIPTION_FAILURE);
	    }
	    echo $this->db->last_query();
	    redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function process_faq_answer()
	{
	    if($this->uri->segment(4))
	    {
	        # Load Faq answer model class
	        $this->load->model('faq_answer');
	        
	        $id = $this->uri->segment(4);
	        $answer = $this->input->post('faq-question-answer');
	        $anonymous = $this->input->post('anonymous');
	        
	        if($this->input->post('faq_answer_update'))
	        {
	            $result = $this->faq_answer->updateFaqAnswer($id, $answer, $anonymous);
	            if($result)$this->message->setFlashMessage(Message::FAQ_ANSWER_UPDATE_SUCCESS, array('id'=>1));
	            else $this->message->setFlashMessage(Message::FAQ_ANSWER_UPDATE_FAILURE);
	        }
	        elseif($this->input->post('faq_answer_delete')) 
	        {
	            $result = $this->faq_answer->deleteFaqAnswer($id);
	            if($result)$this->message->setFlashMessage(Message::FAQ_ANSWER_DELETE_SUCCESS, array('id'=>1));
	            else $this->message->setFlashMessage(Message::FAQ_ANSWER_DELETE_FAILURE);
	        }	           
	    }
	    else
	    {
	        $this->message->setFlashMessage(Message::USER_SUBSCRIPTION_FAILURE);
	    }
	    
	    redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function add_faq_answer()
	{
	    if($this->input->post('faq-answer') || $this->input->post('anonymous') || $this->input->post('faq-question-id'))
	    {	        
            $answer = $this->input->post('faq-answer');
            $questionId = $this->input->post('faq-question-id');
            $anonymous = $this->input->post('anonymous') ? 1 : 0;
            
            $this->load->model('faq_answer','fa');
            $lastInsertId = $this->fa->createFaqAnswer($questionId, $answer, $anonymous, $this->session->userdata('id'));
            
            if($lastInsertId) $this->message->setFlashMessage(Message::ANSWER_POSTED_SUCCESS, array('id'=>'1'));
            else $this->message->setFlashMessage(Message::ANSWER_POSTED_FAILURE);
            
            redirect(base_url('admin/faqs'));
	        
	    }
	}
	
	
}
