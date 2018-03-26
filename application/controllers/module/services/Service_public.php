<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Service_public extends Base 
{
	public function __construct()
	{
		parent::__construct();
	}
	
	# Show Registered User page
	
	public function show_registered_user_page()
	{
		$id = $this->uri->segment(2);
		
		# Load Page Model
		$this->load->model('page');
		$response = $this->page->getServiceById(10);
		
		$this->template->title("Registered User");
		$this->template->render('services/registered_user', $response);
	}
	
	# Show Service
	public function show_service()
	{
		$slug = $this->uri->segment(2); 

		# Load Page Model
		$this->load->model('page');
		$response['page'] = $this->page->get_by_slug($slug);
		
		$this->template->title($response['page']->{Page::_PAGE_TITLE}); 
		$this->template->render('page', $response);
	}
			
	# Show FAQ
	public function show_question()
	{
		$questionId = $this->uri->segment(3);
	
		# Load FAQ Model
		$this->load->model('ask_question','aq');
		$response = $this->aq->getQuestionById($questionId);
	
		# Load FAQ Answer Model
		$this->load->model('faq_answer','fa');
		$response['answers'] = $this->fa->getFaqAnswerById($questionId);

		$this->template->title("FAQ | " .$response['question']);
		$this->template->render('services/show_question', $response);
	}
		
}
