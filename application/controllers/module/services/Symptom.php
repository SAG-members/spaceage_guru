<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Symptom extends Application 
{
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->isLoggedIn()) { $this->redirectToLogin();}
		
	}
	
	public function post_symptom()
	{		
		if($this->input->post('symptom-title') && $this->input->post('symptom-summary'))
		{
			$symptom = $this->input->post('symptom-title');
			$symptomDescription = $this->input->post('symptom-summary');
			$anonymous = $this->input->post('anonymous') ? 1 : 0;
			$userId = $this->session->userdata('id');
			
			$this->load->model('symptom_model','symptom');
			$lastInsertId = $this->symptom->createUserSymptom($userId, $symptom, $symptomDescription, $anonymous);
			
			if($lastInsertId) $this->message->setFlashMessage(Message::SYMPTOM_CREATE_SUCCESS, array('id'=>'1'));
			else $this->message->setFlashMessage(Message::SYMPTOM_CREATE_FAILURE);
			
			redirect(base_url('symptom/post-symptom'));
		}
		
		$this->template->title("Symptom");
		$this->template->render('services/describe_symptom');
		
	}
		
	public function post_answer()
	{
		if($this->input->post('symptom-answer'))
		{
			$answer = $this->input->post('symptom-answer');
			$symptomId = $this->input->post('symptom-id');
			$anonymous = $this->input->post('anonymous') ? 1 : 0;
			
			$this->load->model('Symptom_model','sm');
			
			$slug = $this->sm->getSymptomById($symptomId) ;
				
			$this->load->model('symptom_answer','s');  
			$lastInsertId = $this->s->createSymptomAnswer($symptomId, $answer, $anonymous);
				
			if($lastInsertId) $this->message->setFlashMessage(Message::SYMPTOM_ANSWER_CREATE_SUCCESS, array('id'=>'1'));
			else $this->message->setFlashMessage(Message::SYMPTOM_ANSWER_CREATE_FAILURE);
			redirect(base_url('symptom/'.$slug['slug']));
		}
	}
	
	
}
