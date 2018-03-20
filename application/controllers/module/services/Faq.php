<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends Base 
{
	public function __construct()
	{
		parent::__construct();
		
// 		if(!$this->isLoggedIn()) { $this->redirectToLogin(); }

		$this->load->model('faq_model', 'faq');
		$this->load->model('admin/user', 'user');
		
	}
	
	public function index()
	{
		$data = array();
		
		$data['questions'] = $this->faq->get_all_question_with_answer();
		
		$this->template->title("FAQ");
		$this->template->render('faq', $data);
	}
	
	public function post_question()
	{		
		if($this->input->post('question-summary'))
		{
			$question = $this->input->post('question-summary');
			$anonymous = $this->input->post('anonymous') ? 1:0;
			$userId = $this->session->userdata('id') ? $this->session->userdata('id') : ''; 
			
			$lastInsertId = $this->faq->new_faq($question, $anonymous, $userId);
			
			if($lastInsertId) $this->message->setFlashMessage(Message::QUESTION_POSTED_SUCCESS, array('id'=>'1'));
			else $this->message->setFlashMessage(Message::QUESTION_POSTED_FAILURE);
			
			redirect(base_url('faq'));
		}
		
		$this->template->title("FAQ");
		
		$this->template->render('services/post_question');
	}
		
	public function post_answer()
	{
		if($this->input->post('question-answer'))
		{
			$answer = $this->input->post('question-answer');
			$questionId = $this->input->post('faq-question-id');
			$anonymous = $this->input->post('anonymous') ? 1 : 0; 
				
			$this->load->model('faq_answer','fa');
			$lastInsertId = $this->fa->createFaqAnswer($questionId, $answer, $anonymous, $this->session->userdata('id'));
				
			if($lastInsertId) $this->message->setFlashMessage(Message::ANSWER_POSTED_SUCCESS, array('id'=>'1'));
			else $this->message->setFlashMessage(Message::ANSWER_POSTED_FAILURE);
			
			redirect(base_url('faq'));
		}
	}
	
	
	
	
}
