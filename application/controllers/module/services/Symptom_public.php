<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Symptom_public extends Application 
{
	public function __construct()
	{
		parent::__construct();
		if(!$this->isLoggedIn()) { redirect($this->redirectToLogin()); }
	}
	
	# Show Symptom
	public function show_symptom()
	{
		$slug = $this->uri->segment(2);
	
		# Load Page Model
		$this->load->model('symptom_model','symptom');
		$response['symptom'] = $this->symptom->get_symptom_by_slug($slug);
		
		# Load Symptom Answer Model
		$this->load->model('symptom_answer','s');
		$response['answers'] = $this->s->getSymptomAnswerById($response['symptom']->{Symptom_model::_ID});
				
		$this->template->title($response['symptom']->{Symptom_model::_SYMPTOM});
		$this->template->render('services/show_symptom', $response);
		
	}
	
	public function get_by_symptom()
	{
		$id = $this->uri->segment(2);
		
		# Load Page Model
		$this->load->model('symptom_model','symptom');
		$response = $this->symptom->getSymptomById($id);
	
		# Load Symptom Answer Model
		$this->load->model('symptom_answer','s');
		$response['answers'] = $this->s->getSymptomAnswerById($id);
	
		$this->template->title("Symptom | " .$response['symptom']);
		$this->template->render('services/show_symptom', $response);
		
	}
	
	
}
