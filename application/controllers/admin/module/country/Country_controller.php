<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Country_controller extends Application 
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('admin/country_model','country');
		$this->load->model('currency','currency');
	}

	public function index()
	{
		$data['countries'] = $this->country->get_countries();
		
		$this->template->title('Manage Countries');
		$this->template->render('country/manage_countries', $data);
	}
	
	public function get_currency()
	{
	    $data['currencies'] = $this->currency->getCurrencies();
	    
	    $this->template->title('Manage Currencies');
	    $this->template->render('country/manage_curriencies', $data);
	}
	
	public function publish_country()
	{
		$postIds = $this->input->post('country-ids');
		
		$result = $this->country->publish_contries($postIds);
		
		if($result)$this->message->setFlashMessage(Message::COUNTRY_PUBLISH_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::COUNTRY_PUBLISH_FAILURE);
		
		redirect('admin/countries');
	}
	
	public function unpublish_country()
	{
		$postIds = $this->input->post('country-ids'); 
				
		$result = $this->country->unpublish_countries($postIds);
		
		if($result)$this->message->setFlashMessage(Message::COUNTRY_UNPUBLISH_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::COUNTRY_UNPUBLISH_FAILURE);
		
		redirect('admin/countries');
	}
	
	public function create_country()
	{
	    $countryCode = $this->input->post('country-code');
		$countryName = $this->input->post('country-name');
		$imageName = '';
		
		$isGroup = 0;
		if(!empty($this->input->post('group-countries'))){ $isGroup = 1; }
		
		$highlightCountry = $this->input->post('highlight-country') ? 1 : 0;
				
		# Here we will check if hidden country is available, and if yes, we will update 
		
		if($this->input->post('country_image'))
		{
		    $data = $this->input->post('country_image');
		    list($type, $data) = explode(';', $data);
		    list(, $data)      = explode(',', $data);
		    $image = base64_decode($data);
		    $imageName = time().'.png';
		    $location = 'assets/uploads/country/'.$imageName;
		     
		    file_put_contents($location, $image);
		}
		
		$result = $this->country->create_new_country($countryCode, $countryName, $highlightCountry, $isGroup, $imageName);
		
		if(!empty($this->input->post('group-countries'))){
		    # Load country group model
		    
		    $this->load->model('country_group_model','country_group');
		    
		    $this->country_group->create_new_group($result, $this->input->post('group-countries'));		    
		}
				
		if($result)$this->message->setFlashMessage(Message::COUNTRY_CREATE_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::COUNTRY_CREATE_FAILURE);
		
		redirect('admin/countries');
	}
	
	public function update_country()
	{
	    
		$countryCode = $this->input->post('country-code');
		$countryName = $this->input->post('country-name');
		$countryId = $this->input->post('country-id');
		$imageName = '';
		
		$isGroup = 0;
		if(!empty($this->input->post('group-countries'))){ $isGroup = 1; }
		
		$highlightCountry = $this->input->post('highlight-country') ? 1 : 0;
		
		# Here we will check if hidden country is available, and if yes, we will update
		
		if($this->input->post('country-image'))
		{
		    $data = $this->input->post('country-image');
		    list($type, $data) = explode(';', $data);
		    list(, $data)      = explode(',', $data);
		    $image = base64_decode($data);
		    $imageName = time().'.png';
		    $location = 'assets/uploads/country/'.$imageName;
		     
		    file_put_contents($location, $image);
		}
		
		$result = $this->country->update_country($countryId, $countryName, $countryCode, $highlightCountry, $isGroup, $imageName);
		
		if(!empty($this->input->post('group-countries'))){
		    # Load country group model
		
		    $this->load->model('country_group_model','country_group');
		
		    $this->country_group->create_new_group($countryId, $this->input->post('group-countries'));
		}
		
		if($result)$this->message->setFlashMessage(Message::COUNTRY_UPDATE_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::COUNTRY_UPDATE_FAILURE);
		
		redirect('admin/countries');
	}
	
	public function delete_country()
	{
		$countryId = $this->input->post('country-id');
		
		$result = $this->country->delete_country_by_id($countryId);
		
		if($result)$this->message->setFlashMessage(Message::COUNTRY_DELETE_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::COUNTRY_DELETE_FAILURE);
		
		redirect('admin/countries');
	}
	
	
	
}
