<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Symptom_controller extends Application {
	
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->isLoggedIn()) { $this->redirectToLogin();}
		
		# Load user modal
		$this->load->model('admin/symptom');
	}
	
	public function index()
	{
		if($this->input->post('symptom-title') && $this->input->post('symptom-description'))
		{
			$symptom = $this->input->post('symptom-title');
			$description = $this->input->post('symptom-description');
			$anonymous = $this->input->post('anonymous') ? 1:0;
			$userId = $this->session->userdata('id');
						
			$lastInsertId = $this->symptom->createNewSymptom($userId, $symptom, $description, $anonymous);
				
			if($lastInsertId) $this->message->setFlashMessage(Message::SYMPTOM_CREATE_SUCCESS, array('id'=>'1'));
			else $this->message->setFlashMessage(Message::SYMPTOM_CREATE_FAILURE);
			
			redirect('admin/symptoms');
						
		} 	
					
		$data = array();
		$this->template->title('Manage Symptoms');
		
		$data['symptoms'] = $this->symptom->getSymptoms('', '', 0);
		$data['count'] = $this->symptom->getSymptomCount();
		
		$this->template->render('service/manage_symptom', $data);
		
	}
	
	public function update_symptom()
	{
		if($this->input->post('symptom-title') && $this->input->post('symptom-description'))
		{
			$symptomId = $this->input->post('symptom-id');
			$symptom = $this->input->post('symptom-title');
			$description = $this->input->post('symptom-description');
			$anonymous = $this->input->post('anonymous') ? 1:0;  
					
			$lastInsertId = $this->symptom->updateSymptom($symptomId, $symptom, $description, $anonymous);
		
			if($lastInsertId) $this->message->setFlashMessage(Message::SYMPTOM_UPDATE_SUCCESS, array('id'=>'1'));
			else $this->message->setFlashMessage(Message::SYMPTOM_UPDATE_FAILURE);
			
			redirect('admin/symptoms');
		}
		redirect('admin/symptoms');
	}
	
	public function delete_symptom()
	{
		$id = $this->uri->segment(3);
	
		$result = $this->symptom->deleteSymptomById($id);
	
		if($result)$this->message->setFlashMessage(Message::SYMPTOM_DELETE_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::SYMPTOM_DELETE_FAILURE);
	
		redirect('admin/symptoms');  
	}
	
	public function publish_symptom()
	{
		$symptomIds = $this->input->post('symptom-ids');
		
		$result = $this->symptom->publishSymptom($symptomIds);
		
		if($result)$this->message->setFlashMessage(Message::SYMPTOM_PUBLISH_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::SYMPTOM_PUBLISH_FAILURE);
		
		redirect('admin/symptoms');
	}
	
	public function unpublish_symptom()
	{
		$symptomIds = $this->input->post('symptom-ids');
		
		$result = $this->symptom->unPublishSymptom($symptomIds);
		
		if($result)$this->message->setFlashMessage(Message::SYMPTOM_UNPUBLISH_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::SYMPTOM_UNPUBLISH_FAILURE);
		
		redirect('admin/symptoms');
	}
		
}
