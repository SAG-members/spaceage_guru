<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_public extends Application 
{
	public function __construct()
	{
		parent::__construct();
		if(!$this->isLoggedIn()) { redirect($this->redirectToLogin()); }
		
		# Load Page Model
		$this->load->model('page');
		$this->load->model('country');
	}
			
	public function show_product()
	{
		$slug = $this->uri->segment(2); 
		
		
		$response['page'] = $this->page->get_by_slug($slug);
				
		if($response['page']->{Page::_VISIBILITY} == Page::VISIBILITY_PUBLIC)
		{
			$this->template->title($response['page']->{Page::_PAGE_TITLE});
			$this->template->render('page', $response);
		}
		else 
		{
			redirect(base_url('product/private/'.$slug));
		}
		
	}
	
		
}
