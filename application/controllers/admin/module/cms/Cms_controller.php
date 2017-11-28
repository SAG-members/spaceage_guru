<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cms_controller extends Application 
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('admin/country_model','country');
		$this->load->model('admin/cms_model','cms');
	}

	public function index()
	{
		$data['pages'] = $this->cms->get_pages();
		
		$this->template->title('Manage Pages');
		$this->template->render('cms/manage_cms_pages', $data);
	}
	
	public function new_page()
	{
		if($this->input->post('title') && $this->input->post('description'))
		{
			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$metaTitle = $this->input->post('meta-title');
			$metaDescription = $this->input->post('meta-description');
			$metaKeyword = $this->input->post('meta-keywords');
			
			$lastId = $this->cms->create_new_page($title, $description, $metaTitle, $metaKeyword, $metaDescription);
			
			if($lastId)$this->message->setFlashMessage(Message::CMS_PAGE_CREATE_SUCCESS, array('id'=>'1'));
			else $this->message->setFlashMessage(Message::CMS_PAGE_CREATE_FAILURE);
					
			redirect(base_url('admin/cms'));
		}
		
		$this->template->title('Add New Page');
		$this->template->render('cms/single');
	}
	
	public function edit_page()
	{
		$slug = $this->uri->segment(5);
		
		# Get CMS Page based on slug
		$data['page'] = $this->cms->get_page_by_slug($slug);

		if($this->input->post('page-id') && $this->input->post('title') && $this->input->post('description'))
		{
			$pageId = $this->input->post('page-id');
			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$metaTitle = $this->input->post('meta-title');
			$metaDescription = $this->input->post('meta-description');
			$metaKeyword = $this->input->post('meta-keywords');
			
			$flag = $this->cms->update_page($pageId, $title, $description, $metaTitle, $metaKeyword, $metaDescription);
			
			if($flag)$this->message->setFlashMessage(Message::CMS_PAGE_UPDATE_SUCCESS, array('id'=>'1'));
			else $this->message->setFlashMessage(Message::CMS_PAGE_UPDATE_FAILURE);
			
			redirect(base_url('admin/cms'));
		}
				
		$this->template->title('Edit Page');
		$this->template->render('cms/single', $data);
		
	}
	
	public function publish_page()
	{
		$pageId = $this->input->post('page-ids');
		
		if($this->cms->publish_page($pageId))$this->message->setFlashMessage(Message::CMS_PAGE_PUBLISH_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::CMS_PAGE_PUBLISH_FAILURE);
		
		redirect(base_url('admin/cms'));
	}
	
	public function unpublish_page()
	{
		$pageId = $this->input->post('page-ids');
		
		if($this->cms->unpublish_page($pageId))$this->message->setFlashMessage(Message::CMS_PAGE_UNPUBLISH_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::CMS_PAGE_UNPUBLISH_FAILURE);
		
		redirect(base_url('admin/cms'));
		
	}
	

}
