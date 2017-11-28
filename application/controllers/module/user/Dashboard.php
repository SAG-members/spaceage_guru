<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Application
{
	public $data = array();
	
	public function __construct()
	{
		parent::__construct();
		if(!$this->isLoggedIn()) { redirect($this->redirectToLogin()); }
		
		# Load Page model
		$this->load->model('page');
		$this->load->model('tasks_goals');
		
		$userId = $this->session->userdata('id');
		
		$this->data['datas'] = $this->page->get_user_data($userId);
		$this->data['tasks'] = $this->tasks_goals->get_task_by_user($userId);
		$this->data['goals'] = $this->tasks_goals->get_goals_by_user($userId);
		
		$this->template->setLeftSideBar('library_left_menu',$this->data);
		
		$this->template->setSiteLayout(Template::_PUBLIC_TEMPLATE_DIR, Template::_PUBLIC_LAYOUT_DIR, Template::_PUBLIC_MODULE_DIR);
		
		$this->template->setTemplate('public_master_template.php');
		
		$this->load->model('page_submodility','submodility');
		$this->load->model('country', 'country');
		$this->load->model('data_document_model','data_document');
	}
				
	public function index()
	{
		$this->template->title('User Dashboard');
		$this->template->render('user/dashboard', $this->data);
	}
	
	public function edit_data()
	{
		$slug = $this->uri->segment(4);
		$data['page'] = $this->page->get_by_slug($slug);
		$data['submodilities'] = $this->submodility->get_submodility_by_page_id($data['page']->{Page::_ID});
		$data['countries'] = $this->country->getCountries();
		$data['files'] = $this->data_document->get_data_document($data['page']->{Page::_ID});
		
		$additionalScripts = array('plugin/summernote/summernote.js','summernote.js', 'plugin/dropzone/dropzone.min.js', 'plugin/taginputs/jquery.tagsinput.js', 'plugin/select2/select2.full.min.js');
		$additionalStyles = array('summernote/summernote.css','dropzone/dropzone.min.css', 'jquery-tagsinput/jquery.tagsinput.css', 'select2/select2.min.css',);
		
		$this->template->setAdditionalScript($additionalScripts);
		$this->template->setAdditionalStyle($additionalStyles);
		
		$this->template->title('Edit Data');
		$this->template->render('user/edit_page', $data);
	}
	
	public function update_data()
	{
		$dataId = $this->uri->segment(4);

		$datas = $this->page->get_by_id($dataId);
		
		$data = array();
		
		/* Check if post parameter title and description exists */
		
		if($this->input->post('title') && $this->input->post('description'))
		{
			$userId = $this->session->userdata('id');
			$category = $this->input->post('data_type');
			$visibility= $this->input->post('visibility');
			$tag= $this->input->post('tags');
			$title = $this->input->post('title');
			$anonymous = $this->input->post('anonymous') ? 1 : 0;
			$description = $this->input->post('description');
			$countriesAvailableIn = $this->input->post('countries');
			$countriesLegalIn = $this->input->post('legal_countries');
			$countryAllowedIn = $this->input->post('physically_legal_countries');
			$priceLess = $this->input->post('chckbox-price-per-read-article') == 2 ? 1 : 0;
			$price = $this->input->post('points');
			$metaTitle = '';
			$metaKeyword = '';
			$metaDescription = '';
				
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
			
			$countryAllowed = implode(',', $countryAllowedIn);
			foreach ($countryAllowedIn as $c)
			{
			    if($c == 'Select All') { $countryAllowed = $this->country->get_country_ids(); break; }
			}
			
			
			$response = $this->page->update_page($dataId, $category, $visibility, $title, $description, $anonymous, $countries, $countriesLegal, $price, $priceLess, $tag, $countryAllowed);
			
			# Lets Check if we have some documents along with the data
				
			if($this->input->post('hidden_documents'))
			{
				# Load data document model
				$this->load->model('data_document_model');
		
				foreach ($this->input->post('hidden_documents') as $document)
				{
					$this->data_document_model->create_new_data_document($dataId, $document);
				}
			}
						
			if($category!=20 && $category!=17)
			{
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
		
				# Once we have data created lets create submodility
				$this->load->model('page_submodility','submodility');
		
				$this->submodility->update_page_submodility($dataId, $mod1, $mod2, $mod3, $mod4, $mod5, $mod6, $mod7, $mod8, $mod9, $mod10, $mod11, $mod12, $mod13, $mod14, $mod15, $mod16, $mod17, $mod18, $mod19, $mod20, $mod21, $mod22, $mod23, $mod24, $mod25, $mod26, $mod27, $mod28, $mod29, $mod30, $mod31, $mod32, $mod33, $mod34, $mod35, $mod36, $mod37, $mod38, $mod39, $mod40, $mod41, $mod42, $mod43, $mod44, $mod45, $mod46, $mod47, $mod48, $mod49, $mod50, $mod51, $mod52);
			}
						
			if($response) {$this->message->setFlashMessage(Message::DATA_UPDATE_SUCCESS, array('id'=>'1'));}
			else {$this->message->setFlashMessage(Message::DATA_UPDATE_FAILURE);}

			redirect(base_url('user/edit/data/'.$datas->{Page::_PAGE_SLUG}));
		}
				
	}
	
	public function delete_data()
	{
		$contentId = $this->uri->segment(4);
		
		# Since these data can either be liked and or purchased, subscribed so we are not going to 
		# Actually delete these from the system, We will just change the ownership of the data and 
		# Assign admin as the current owner
		
		$response = $this->page->delete_data($contentId, 1);
				
		if($response) {$this->message->setFlashMessage(Message::DATA_DELETE_SUCCESS, array('id'=>'1'));}
		else {$this->message->setFlashMessage(Message::DATA_DELETE_FAILURE);}
		
		redirect(base_url('user/dashboard'));
	}
	
	public function unsubsribe_data()
	{
	    $userId = $this->session->userdata('id');
	    $dataId = $this->uri->segment(4);
	    
	    # Now we will have to check whether
	    
	    # Load rss feed model
	    $this->load->model('rss_feed_subscription_model', 'rss');
	    $response = $this->rss->change_rss_feed_ownership($userId, $dataId);
	    
	    # Loas psss model
	    $this->load->model('psss_purchase_history', 'pss');
	    $response = $this->pss->change_psss_ownership($userId, $dataId);
	    
	    if($response) {$this->message->setFlashMessage(Message::DATA_DELETE_SUCCESS, array('id'=>'1'));}
	    else {$this->message->setFlashMessage(Message::DATA_DELETE_FAILURE);}
	    
	    redirect(base_url('user/dashboard'));
	}
	
	
	public function update_task_goal()
	{
		
		$contentId = $this->uri->segment(4);
		
		switch ($this->uri->segment(3))
		{
			case 'task' :
				$successMessage = Message::TASK_UPDATE_SUCCESS;
				$failureMessage = Message::TASK_UPDATE_FAILURE;
				break;
			case 'goal' :
				$successMessage = Message::GOAL_UPDATE_SUCCESS;
				$failureMessage = Message::GOAL_UPDATE_FAILURE;
				break;
		}
		
		if($this->input->post('content'))
		{
			# Load Task and Goal Model
			
			$this->load->model('tasks_goals','tg');
			
			$response = $this->tg->update_task_goals($contentId, $this->input->post('content'));
									
			if($response)$this->message->setFlashMessage($successMessage, array('id'=>'1'));
			else $this->message->setFlashMessage($failureMessage);
			
		}
		else 
		{
			$this->message->setFlashMessage($failureMessage);
		}
		
		redirect(base_url('user/dashboard'));
	}
	
	public function delete_task_goal()
	{
		$contentId = $this->uri->segment(4);
		
		# Load Task and Goal Model
			
		$this->load->model('tasks_goals','tg');
		
		switch ($this->uri->segment(3))
		{
			case 'task' :
				$successMessage = Message::TASK_DELETE_SUCCESS;
				$failureMessage = Message::TASK_DELETE_FAILURE;
				break;
			case 'goal' :
				$successMessage = Message::GOAL_DELETE_SUCCESS;
				$failureMessage = Message::GOAL_DELETE_FAILURE;
				break;
		}
		
		$response = $this->tg->delete_task_goal($contentId);
		
		if($response)$this->message->setFlashMessage($successMessage, array('id'=>'1'));
		else $this->message->setFlashMessage($failureMessage);
		
		redirect(base_url('user/dashboard'));
	}
	
	
}
