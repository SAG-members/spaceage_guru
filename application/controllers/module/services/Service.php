<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends Application 
{
	public function __construct()
	{
		parent::__construct();
		if(!$this->isLoggedIn()) { redirect($this->redirectToLogin()); }
		
		# Load Page module
		$this->load->model('page');
		$this->load->model('country');
	}
	
	public function new_service()
	{
		if($this->input->post('visibility') && $this->input->post('title') && $this->input->post('content'))
		{
			$userId = $this->session->userdata('id');
			$visibility = $this->input->post('visibility');
			$title = $this->input->post('title');
			$description = $this->input->post('content');
			$anonymous = $this->input->post('anonymous') ? 1 : 0;
			$countryAvailableIn = $this->input->post('hidden-country-ids');
						
			$lastId = $this->page->create_new_page(Page::_CATEGORY_SERVICE, $title, $description, $visibility, $userId, $anonymous, $countryAvailableIn);
			
			if($lastId) $this->message->setFlashMessage(Message::SERVICE_CREATE_SUCCESS, array('id'=>'1'));
			else $this->message->setFlashMessage(Message::SERVICE_CREATE_FAILURE);

			redirect(base_url('home'));
		}
		
		$this->template->title("Add New Service"); 
				
		$additionalScripts = array('plugin/summernote/summernote.js','summernote.js');
		$additionalStyles = array('summernote/summernote.css');
		
		$this->template->setAdditionalScript($additionalScripts);
		$this->template->setAdditionalStyle($additionalStyles);
		
		$data = array();
		$data['url'] = base_url('service/add');
		$data['countries'] = $this->country->getCountries();
		
		$this->template->render('single', $data);
	}
	
	public function timeline()
	{
	    $data = array();
	    $this->template->title("Timeline");
	    $this->template->render('services/timeline', $data);
	}
		
}
