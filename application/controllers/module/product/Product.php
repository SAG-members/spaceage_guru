<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends Application 
{
	const VISIBILITY_PUBLIC = 1;
	const VISIBILITY_UPGRADED_USERSHIP = 2;
	const VISIBILITY_UPGRADED_MEMBERSHIP = 3;
	
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->isLoggedIn()) { redirect($this->redirectToLogin()); }
		
		# Load Page module
		$this->load->model('page');
		$this->load->model('user');
		$this->load->model('country');
	}
		
	public function new_product()
	{
		if($this->input->post('visibility') && $this->input->post('title') && $this->input->post('content'))
		{
			$userId = $this->session->userdata('id');
			$visibility = $this->input->post('visibility');
			$title = $this->input->post('title');
			$description = $this->input->post('content');
			$anonymous = $this->input->post('anonymous') ? 1 : 0;
			$countryAvailableIn = $this->input->post('hidden-country-ids');

			
			$lastId = $this->page->create_new_page(Page::_CATEGORY_PRODUCT, $title, $description, $visibility, $userId, $anonymous, $countryAvailableIn);
			
			if($lastId) $this->message->setFlashMessage(Message::PRODUCT_CREATE_SUCCESS, array('id'=>'1'));
			else $this->message->setFlashMessage(Message::PRODUCT_CREATE_FAILURE);
			
			redirect(base_url('home'));
		}
				
		$this->template->title("Add New Product");
		
		$additionalScripts = array('plugin/summernote/summernote.js','summernote.js');
		$additionalStyles = array('summernote/summernote.css');
		
		$this->template->setAdditionalScript($additionalScripts);
		$this->template->setAdditionalStyle($additionalStyles);
		
		$data = array();
		$data['url'] = base_url('product/add');
		$data['countries'] = $this->country->getCountries();
		
		$this->template->render('single', $data); 
	}
	

	public function show_product()
	{
		$slug = $this->uri->segment(3);
		 
		$response['page'] = $this->page->get_by_slug($slug);
		
		$this->template->title($response['page']->{Page::_PAGE_TITLE});
		$this->template->render('page', $response);
	}
			
}
