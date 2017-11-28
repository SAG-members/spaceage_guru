<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_page_controller extends Base 
{
	public function __construct()
	{
		parent::__construct();
		
		# Load user modal
		$this->load->model('page');
		$this->load->model('country');
	}
			
	public function view()
	{
		$data = array();
		$page = $this->uri->segment(1);
		$slug = $this->uri->segment(2);
		
		$title = ''; $view = ''; $category = ''; $messageSuccess = ''; $messageFailure = ''; $redirectView = '';
		
		switch ($page)
		{
			case 'products' :
				$title = 'Edit Product'; $view = 'service/new_product'; $redirectView = 'admin/products';
				$category = Page::_CATEGORY_PRODUCT;
				$messageSuccess = Message::PRODUCT_UPDATE_SUCCESS;
				$messageFailure = Message::PRODUCT_UPDATE_FAILURE;
				break;
			case 'services' :
				$title = 'Edit Service'; $view = 'service/new_service'; $redirectView = 'admin/services';
				$category = Page::_CATEGORY_SERVICE;
				$messageSuccess = Message::SERVICE_UPDATE_SUCCESS;
				$messageFailure =  Message::SERVICE_UPDATE_FAILURE;
				break;
			case 'sensations' :
				$title = 'Edit Sensation'; $view = 'service/new_sensation'; $redirectView = 'admin/sensations';
				$category = Page::_CATEGORY_SENSES;
				$messageSuccess = Message::SENSATION_UPDATE_SUCCESS;
				$messageFailure =  Message::SENSATION_UPDATE_FAILURE;
				break;
		}
			
		$response['page'] = $this->page->get_by_slug($slug);
		
		# Check if visiblity is public
		if($response['page']->{Page::_VISIBILITY} == Page::VISIBILITY_PUBLIC)
		{
			$this->template->title($response['page']->{Page::_PAGE_TITLE});
			$this->template->render('page', $response);
		}
		else
		{
			redirect(base_url('product/upgraded/'.$slug));
		}
		
	}
	
	
				
}
