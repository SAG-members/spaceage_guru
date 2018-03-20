<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_controller extends Application {
	
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->isLoggedIn()) { $this->redirectToLogin();}
		
		# Load user modal
		$this->load->model('admin/page');
		$this->load->model('admin/user','user');
		$this->load->model('country');
		$this->load->model('data_document_model','data_document');
		$this->load->model('page_submodility','submodility');
	}
	
	public function manage_data()
	{
		$data = array();
		
		$data['datas'] = $this->page->get_data();
		
		$this->template->title('Manage Data');
		$this->template->render('service/manage_data', $data);
	}
	
	public function create_data()
	{
		$data = array();
				
		if($this->input->post('title') && $this->input->post('description'))
		{
			$userId = $this->session->userdata('id');
			$category = $this->input->post('data_type');
			$visibility= $this->input->post('visibility');
			$title = $this->input->post('title');
			$tag = $this->input->post('tags');
			$anonymous = $this->input->post('anonymous') ? 1 : 0;
			$description = $this->input->post('description');
			$countriesAvailableIn = $this->input->post('countries');
			$countriesLegalIn = $this->input->post('legal_countries');
			$physicallyLegalIn = $this->input->post('physically_legal_countries');
			
			$price = $this->input->post('points');
			$priceType = $this->input->post('chckbox-price-per-read-article') == 2 ? 1 : 0;
			$metaTitle = $this->input->post('meta-title');
			$metaKeyword = $this->input->post('meta-keywords');
			$metaDescription = $this->input->post('meta-description');
			
			$countries = implode(',', $countriesAvailableIn);
			foreach ($countriesAvailableIn as $c)
			{
				if($c == 'Select All') { $countries = $this->country->get_country_ids(); break; }
			}
			
			$countriesLegal = implode(',', $countriesLegalIn);
			foreach ($countriesLegalIn as $c)
			{
				if($c == 'Select All') { $countriesLegal= $this->country->get_country_ids(); break; }
			}
            
			$physicallycountriesLegal = implode(',', $physicallyLegalIn);
			foreach ($physicallyLegalIn as $c)
			{
			    if($c == 'Select All') { $physicallycountriesLegal = $this->country->get_country_ids(); break; }
			}
			
			/* Get submodility list */
			
			$mod1 = $this->input->post('visual_images_val');
			$mod2 = $this->input->post('visual_motion');
			$mod3 = $this->input->post('visual_motion_val');
			$mod4 = $this->input->post('visual_color');
			$mod5 = $this->input->post('visual_color_val');
			$mod6 = $this->input->post('visual_bright');
			$mod7 = $this->input->post('visual_bright_val');
			$mod8 = $this->input->post('visual_focused');
			$mod9 = $this->input->post('visual_focused_val');
			$mod10 = $this->input->post('visual_bordered');
			$mod11 = $this->input->post('visual_bordered_val');
			$mod12 = $this->input->post('visual_associated');
			$mod13 = $this->input->post('visual_associated_val');
			$mod14 = $this->input->post('visual_center');
			$mod15 = $this->input->post('visual_center_val');
			$mod16 = $this->input->post('visual_size_val');
			$mod17 = $this->input->post('visual_shape_val');
			$mod18 = $this->input->post('visual_flat');
			$mod19 = $this->input->post('visual_flat_val');
			$mod20 = $this->input->post('visual_close');
			$mod21 = $this->input->post('visual_close_val');
			$mod22 = $this->input->post('visual_panormic');
			$mod23 = $this->input->post('visual_panormic_val');
			$mod24 = $this->input->post('auditory_sound_val');
			$mod25 = $this->input->post('auditory_volume_val');
			$mod26 = $this->input->post('auditory_tone_val');
			$mod27 = $this->input->post('auditory_tempo_val');
			$mod28 = $this->input->post('auditory_pitch_val');
			$mod29 = $this->input->post('auditory_pace_val');
			$mod30 = $this->input->post('auditory_timbre_val');
			$mod31 = $this->input->post('auditory_duration_val');
			$mod32 = $this->input->post('auditory_intensity_val');
			$mod33 = $this->input->post('auditory_rhythm_val');
			$mod34 = $this->input->post('auditory_direction_val');
			$mod35 = $this->input->post('auditory_harmony_val');
			$mod36 = $this->input->post('auditory_ear_val');
			$mod37 = $this->input->post('kinesthic_breating_val');
			$mod38 = $this->input->post('kinesthic_pulse_val');
			$mod39 = $this->input->post('kinesthic_skin_val');
			$mod40 = $this->input->post('kinesthic_weight_val');
			$mod41 = $this->input->post('kinesthic_pressure_val');
			$mod42 = $this->input->post('kinesthic_intensity_val');
			$mod43 = $this->input->post('kinesthic_tactile_val');
			$mod44 = $this->input->post('olafactory_sweet_val');
			$mod45 = $this->input->post('olafactory_sour_val');
			$mod46 = $this->input->post('olafactory_salt_val');
			$mod47 = $this->input->post('olafactory_bitter_val');
			$mod48 = $this->input->post('olafactory_aroma_val');
			$mod49 = $this->input->post('olafactory_fragrance_val');
			$mod50 = $this->input->post('olafactory_essence_val');
			$mod51 = $this->input->post('olafactory_pungence_val');
			$mod52 = $this->input->post('kinesthic_location_in_body_val');

			/* Create new page here */
			$lastId = $this->page->create_page($category, $userId, $visibility, $title, $description, $anonymous, $countries, $countriesLegal, $physicallycountriesLegal, $metaTitle, $metaKeyword, $metaDescription, $price, $priceType, $tag);

			/* Create submodility here */
			$this->submodility->update_page_submodility($lastId, $mod1, $mod2, $mod3, $mod4, $mod5, $mod6, $mod7, $mod8, $mod9, $mod10, $mod11, $mod12, $mod13, $mod14, $mod15, $mod16, $mod17, $mod18, $mod19, $mod20, $mod21, $mod22, $mod23, $mod24, $mod25, $mod26, $mod27, $mod28, $mod29, $mod30, $mod31, $mod32, $mod33, $mod34, $mod35, $mod36, $mod37, $mod38, $mod39, $mod40, $mod41, $mod42, $mod43, $mod44, $mod45, $mod46, $mod47, $mod48, $mod49, $mod50, $mod51, $mod52);

			/* Next thing is to create new entry in the files table to track all the associated files for the page*/
			if($this->input->post('hidden_documents'))
			{
				# Load data document model
				$this->load->model('data_document_model');
			
				foreach ($this->input->post('hidden_documents') as $document)
				{
					$this->data_document_model->create_new_data_document($lastId, $document);
				}
			}
			
			/* Next step is to mention the details of specific users for which the page has been created*/
			if($visibility == 7)
			{
				# Load Page_specified_user_assignment_model model
			
				$this->load->model('Page_specified_user_assignment_model', 'mm');
				foreach ($this->input->post('specified_user_value') as $u)
				{
					$this->mm->assign_data_to_specified_user($lastId, $u);
				}
			}
			
			
			/* Now since every thing is setup let's show sucess/ failure message and redirect*/
			
			if($lastId) {$this->message->setFlashMessage(Message::DATA_CREATE_SUCCESS, array('id'=>'1'));}
			else {$this->message->setFlashMessage(Message::DATA_CREATE_SUCCESS);}
		
			redirect(base_url('admin/data'));
		}
							
		$data['countries'] = $this->country->getCountries();
		$data['users'] = $this->user->getUsers($this->session->userdata('id'));
		$data['files'] = '';
		
		$this->template->title('Manage Data');
		$this->template->render('service/new_data', $data); 
	}
	
	public function edit_data()
	{
		$dataId = $this->uri->segment(4);
		
		/* If data is availble in post, then we will go for updating the data */
// 				pre($this->input->post());
		if($this->input->post('title') && $this->input->post('description'))
		{
			$userId = $this->session->userdata('id');
			$category = $this->input->post('data_type');
			$visibility= $this->input->post('visibility');
			$title = $this->input->post('title');
			$tag = $this->input->post('tags');
			$anonymous = $this->input->post('anonymous') ? 1 : 0;
			$description = $this->input->post('description');
			$countriesAvailableIn = $this->input->post('countries');
			$countriesLegalIn = $this->input->post('legal_countries');
			$physicallyLegalIn = $this->input->post('physically_legal_countries');
			
			$price = $this->input->post('points');
			$priceType = $this->input->post('chckbox-price-per-read-article') == 2 ? 1 : 0;
			$metaTitle = $this->input->post('meta-title');
			$metaKeyword = $this->input->post('meta-keywords');
			$metaDescription = $this->input->post('meta-description');
				
			$countries = implode(',', $countriesAvailableIn);
			foreach ($countriesAvailableIn as $c)
			{
				if($c == 'Select All') { $countries = $this->country->get_country_ids(); break; }
			}
			
			$countriesLegal = implode(',', $countriesLegalIn);
			foreach ($countriesLegalIn as $c)
			{
				if($c == 'Select All') { $countriesLegal = $this->country->get_country_ids(); break; }
			}
			
			$physicallycountriesLegal = implode(',', $physicallyLegalIn);
			foreach ($physicallyLegalIn as $c)
			{
			    if($c == 'Select All') { $physicallycountriesLegal = $this->country->get_country_ids(); break; }
			}
				
			/* Get submodility list */
				
			$mod1 = $this->input->post('visual_images_val');
			$mod2 = $this->input->post('visual_motion');
			$mod3 = $this->input->post('visual_motion_val');
			$mod4 = $this->input->post('visual_color');
			$mod5 = $this->input->post('visual_color_val');
			$mod6 = $this->input->post('visual_bright');
			$mod7 = $this->input->post('visual_bright_val');
			$mod8 = $this->input->post('visual_focused');
			$mod9 = $this->input->post('visual_focused_val');
			$mod10 = $this->input->post('visual_bordered');
			$mod11 = $this->input->post('visual_bordered_val');
			$mod12 = $this->input->post('visual_associated');
			$mod13 = $this->input->post('visual_associated_val');
			$mod14 = $this->input->post('visual_center');
			$mod15 = $this->input->post('visual_center_val');
			$mod16 = $this->input->post('visual_size_val');
			$mod17 = $this->input->post('visual_shape_val');
			$mod18 = $this->input->post('visual_flat');
			$mod19 = $this->input->post('visual_flat_val');
			$mod20 = $this->input->post('visual_close');
			$mod21 = $this->input->post('visual_close_val');
			$mod22 = $this->input->post('visual_panormic');
			$mod23 = $this->input->post('visual_panormic_val');
			$mod24 = $this->input->post('auditory_sound_val');
			$mod25 = $this->input->post('auditory_volume_val');
			$mod26 = $this->input->post('auditory_tone_val');
			$mod27 = $this->input->post('auditory_tempo_val');
			$mod28 = $this->input->post('auditory_pitch_val');
			$mod29 = $this->input->post('auditory_pace_val');
			$mod30 = $this->input->post('auditory_timbre_val');
			$mod31 = $this->input->post('auditory_duration_val');
			$mod32 = $this->input->post('auditory_intensity_val');
			$mod33 = $this->input->post('auditory_rhythm_val');
			$mod34 = $this->input->post('auditory_direction_val');
			$mod35 = $this->input->post('auditory_harmony_val');
			$mod36 = $this->input->post('auditory_ear_val');
			$mod37 = $this->input->post('kinesthic_breating_val');
			$mod38 = $this->input->post('kinesthic_pulse_val');
			$mod39 = $this->input->post('kinesthic_skin_val');
			$mod40 = $this->input->post('kinesthic_weight_val');
			$mod41 = $this->input->post('kinesthic_pressure_val');
			$mod42 = $this->input->post('kinesthic_intensity_val');
			$mod43 = $this->input->post('kinesthic_tactile_val');
			$mod44 = $this->input->post('olafactory_sweet_val');
			$mod45 = $this->input->post('olafactory_sour_val');
			$mod46 = $this->input->post('olafactory_salt_val');
			$mod47 = $this->input->post('olafactory_bitter_val');
			$mod48 = $this->input->post('olafactory_aroma_val');
			$mod49 = $this->input->post('olafactory_fragrance_val');
			$mod50 = $this->input->post('olafactory_essence_val');
			$mod51 = $this->input->post('olafactory_pungence_val');
			$mod52 = $this->input->post('kinesthic_location_in_body_val');
		
			/* Update page here */
			$lastId = $this->page->update_page($dataId, $userId, $category, $visibility, $title, $description, $anonymous, $countries, $countriesLegal, $physicallycountriesLegal, $metaTitle, $metaKeyword, $metaDescription, $price, $priceType, $tag);
		
			/* Create submodility here */
			$this->submodility->update_page_submodility($dataId, $mod1, $mod2, $mod3, $mod4, $mod5, $mod6, $mod7, $mod8, $mod9, $mod10, $mod11, $mod12, $mod13, $mod14, $mod15, $mod16, $mod17, $mod18, $mod19, $mod20, $mod21, $mod22, $mod23, $mod24, $mod25, $mod26, $mod27, $mod28, $mod29, $mod30, $mod31, $mod32, $mod33, $mod34, $mod35, $mod36, $mod37, $mod38, $mod39, $mod40, $mod41, $mod42, $mod43, $mod44, $mod45, $mod46, $mod47, $mod48, $mod49, $mod50, $mod51, $mod52);
		
			/* Next thing is to create new entry in the files table to track all the associated files for the page*/
			if($this->input->post('hidden_documents'))
			{
				# Load data document model
				$this->load->model('data_document_model');
		
				foreach ($this->input->post('hidden_documents') as $document)
				{
					$this->data_document_model->create_new_data_document($dataId, $document);
				}
			}
						
			/* Next step is to mention the details of specific users for which the page has been created*/
			if($visibility == 7)
			{
				# Load Page_specified_user_assignment_model model
					
				$this->load->model('Page_specified_user_assignment_model', 'mm');
				foreach ($this->input->post('specified_user_value') as $u)
				{
					$this->mm->assign_data_to_specified_user($dataId, $u);
				}
			}
							
							
			/* Now since every thing is setup let's show sucess/ failure message and redirect*/
						 	
			if($lastId) {$this->message->setFlashMessage(Message::DATA_UPDATE_SUCCESS, array('id'=>'1'));}
			else {$this->message->setFlashMessage(Message::DATA_UPDATE_FAILURE);}
            
            
			redirect(base_url('admin/data/edit/'.$dataId));
		}
				
		$data['countries'] = $this->country->getCountries();
		$data['users'] = $this->user->getUsers($this->session->userdata('id'));
		
		$data['page'] = $this->page->get_by_id($dataId);
		$data['submodilities'] = $this->submodility->get_submodility_by_page_id($dataId);
		$data['files'] = $this->data_document->get_data_document($data['page']->{Page::_ID});		
		
		$this->template->title('Edit Data');
		$this->template->render('service/new_data', $data);
	}
	
	
		
	public function publish()
	{
		if($this->input->post('ids') && $this->input->post('category'))
		{
			$serviceIds = $this->input->post('ids');
			$category = $this->input->post('category');
			
			$result = $this->page->publish_page($category, $serviceIds);
			
			
			switch ($category)
			{
				case page::_CATEGORY_PRODUCT : 
					$successMessage = Message::PRODUCT_PUBLISH_SUCCESS; 
					$failureMessage = Message::PRODUCT_PUBLISH_FAILURE;
					$redirectView = 'admin/data';
					break;
				case page::_CATEGORY_SERVICE : 
					$successMessage = Message::SERVICE_PUBLISH_SUCCESS;
					$failureMessage = Message::SERVICE_PUBLISH_FAILURE;
					$redirectView = 'admin/data';
					break;
				case page::_CATEGORY_SENSES : 
					$successMessage = Message::SENSATION_PUBLISH_SUCCESS;
					$failureMessage = Message::SENSATION_PUBLISH_FAILURE;
					$redirectView = 'admin/data';
					break;
			}
			
			if($result)$this->message->setFlashMessage($successMessage, array('id'=>'1'));
			else $this->message->setFlashMessage($failureMessage);
			
			redirect($redirectView);
		}
				
	}
	
	public function unpublish()
	{
	    if($this->input->post('ids') && $this->input->post('category'))
		{
			$serviceIds = $this->input->post('ids');
			
			$category = $this->input->post('category');
				
			$result = $this->page->unpublish_page($category, $serviceIds);
// 			echo $this->db->last_query(); die;
			switch ($category)
			{
				case page::_CATEGORY_PRODUCT :
					$successMessage = Message::PRODUCT_UNPUBLISH_SUCCESS;
					$failureMessage = Message::PRODUCT_UNPUBLISH_FAILURE;
					$redirectView = 'admin/data';
					break;
				case page::_CATEGORY_SERVICE :
					$successMessage = Message::SERVICE_UNPUBLISH_SUCCESS;
					$failureMessage = Message::SERVICE_UNPUBLISH_FAILURE;
					$redirectView = 'admin/data';
					break;
				case page::_CATEGORY_SENSES :
					$successMessage = Message::SENSATION_UNPUBLISH_SUCCESS;
					$failureMessage = Message::SENSATION_UNPUBLISH_FAILURE;
					$redirectView = 'admin/data';
					break;
			}
			
			if($result)$this->message->setFlashMessage($successMessage, array('id'=>'1'));
			else $this->message->setFlashMessage($failureMessage);
			
			redirect($redirectView);
		}
		
	}
	
	public function delete()
	{
		if($this->input->post('ids') && $this->input->post('category'))
		{
			$id = $this->input->post('ids');
			$category = $this->input->post('category');
		
			$result = $this->page->delete_page($category, $id);
							
			if($result)$this->message->setFlashMessage(Message::DATA_DELETE_SUCCESS, array('id'=>'1'));
			else $this->message->setFlashMessage(Message::DATA_CREATE_FAILURE);
				
			redirect(base_url('admin/data'));
		}
				
		
	}
	
	public function escrow_list()
	{
	    $data = array();
	    
	    $this->load->model('page');
	    $this->load->model('library_event_model');
	    $this->load->model('library_event_comment_model','ulecm');
	    
	    
	   
	    
	    
	    # Load Escrow Model
	    
	    $this->load->model('User_library_event_escrow_model', 'escrow');
	    $data['escrowList'] = $this->escrow->escrow_list();
	    
	    
	    $this->template->title('Manage Escrow');
	    $this->template->render('service/manage_escrow', $data);
	}
	
	public function create_escrow()
	{
	    $data = array();
	    
	    # Load page data
	    
	    $this->load->model('admin/page', 'page');
	    $data['products'] = $this->page->get_data();
	    
	    $this->template->title('New Escrow');
	    $this->template->render('service/new_event', $data);
	}
	
	public function delete_escrow()
	{
	    $escrowId = $this->uri->segment(4);
	    
	    # Load user library event escrow model
	    $this->load->model('user_library_event_escrow_model','escrow_model');
	    
	    # Now before actually deleting an escorw we will check the status of the escrow
	    $escrowDetail = $this->escrow_model->get_by_id($escrowId);
// 	    pre($escrowDetail); 
// 	    # Now Let's check the status of the escrow
// 	    if($escrowDetail[0]->{User_library_event_escrow_model::_STATUS} != 1)
// 	    {
// 	        $this->message->setFlashMessage(Message::ESCROW_DELETE_ERROR);
	        
// 	        redirect(base_url('admin/escrow'));
// 	    }
	    
	    $result = $this->escrow_model-> delete_escrow($escrowId);
	    
	    if($result) $this->message->setFlashMessage(Message::ESCROW_DELETE_SUCCESS, array('id'=>1));
	    else $this->message->setFlashMessage(Message::ESCROW_DELETE_FAILURE);
	    
	    redirect(base_url('admin/escrow'));
	    
	}
			
}
