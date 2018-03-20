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
		
		$this->data['datas'] = $this->page->get_data('', '', '', $userId);
		$this->data['tasks'] = $this->tasks_goals->get_task_by_user($userId);
		$this->data['goals'] = $this->tasks_goals->get_goals_by_user($userId);
		
		$this->template->setLeftSideBar('library_left_menu',$this->data);
		
		$this->template->setSiteLayout(Template::_PUBLIC_TEMPLATE_DIR, Template::_PUBLIC_LAYOUT_DIR, Template::_PUBLIC_MODULE_DIR);
		
		$this->template->setTemplate('library_template.php');
		
		$this->load->model('page_submodility','submodility');
	}
				
	public function index()
	{
		$this->template->title('User Dashboard');
		$this->template->render('user/dashboard', $this->data);
	}
	
	public function edit_pss()
	{
		$category = $this->uri->segment(1);
		$slug = $this->uri->segment(3);
		
		# Load the page model
		$this->load->model('page');
		$this->load->model('country');
		
		$data = array();
		$data['category'] = $category;
		switch ($category)
		{
			case 'product' : $data['page'] = $this->page->get_by_slug($slug); break;
			case 'sensation' : $data['page'] = $this->page->get_by_slug($slug); break;
			case 'service' : $data['page'] = $this->page->get_by_slug($slug); break;
		}
		
		$additionalScripts = array('plugin/summernote/summernote.js','summernote.js');
		$additionalStyles = array('summernote/summernote.css');
		
		$this->template->setAdditionalScript($additionalScripts);
		$this->template->setAdditionalStyle($additionalStyles);
		
		$data['countries'] = $this->country->getCountries();
		$data['submodilities'] = $this->submodility->get_submodility_by_page_id($data['page']->{Page::_ID});
		
		$this->template->title('Edit '.ucfirst($category));
		$this->template->render('user/edit_page', $data);
	}
	
	public function update_pss()
	{
		# Load the page model
		$this->load->model('page');
		$this->load->model('country');
				
		$data = array();
		$page = $this->uri->segment(1);
		$pageId = $this->uri->segment(3);
		
		$title = ''; $view = ''; $category = ''; $messageSuccess = ''; $messageFailure = ''; $redirectView = '';
		
		switch ($page)
		{
			case 'product' :
				$category = Page::_CATEGORY_PRODUCT;
				$messageSuccess = Message::PRODUCT_UPDATE_SUCCESS;
				$messageFailure = Message::PRODUCT_UPDATE_FAILURE;
				break;
			case 'service' :
				$category = Page::_CATEGORY_SERVICE;
				$messageSuccess = Message::SERVICE_UPDATE_SUCCESS;
				$messageFailure =  Message::SERVICE_UPDATE_FAILURE;
				break;
			case 'sensation' :
				$category = Page::_CATEGORY_SENSES;
				$messageSuccess = Message::SENSATION_UPDATE_SUCCESS;
				$messageFailure =  Message::SENSATION_UPDATE_FAILURE;
				break;
		}
			
		
		if($this->input->post('title') && $this->input->post('description'))
		{
			$visibility= $this->input->post('visibility');
			$title = $this->input->post('title');
			$anonymous = $this->input->post('anonymous') ? 1 : 0;
			$description = $this->input->post('description');
			$countriesAvailableIn = $this->input->post('hidden-country-ids') == 'select-all' ? $this->country->get_country_ids() : $this->input->post('hidden-country-ids') ;
			$price = $this->input->post('points');
			$metaTitle = $this->input->post('meta-title');
			$metaKeyword = $this->input->post('meta-keywords');
			$metaDescription = $this->input->post('meta-description');
			$submodility = $this->input->post('hidden_submodility');

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
			
			$flag = $this->page->update_page($pageId, $visibility, $title, $description, $anonymous, $countriesAvailableIn, $price, $metaTitle, $metaKeyword, $metaDescription, $submodility);
			
			$this->submodility->update_page_submodility($pageId, $mod1, $mod2, $mod3, $mod4, $mod5, $mod6, $mod7, $mod8, $mod9, $mod10, $mod11, $mod12, $mod13, $mod14, $mod15, $mod16, $mod17, $mod18, $mod19, $mod20, $mod21, $mod22, $mod23, $mod24, $mod25, $mod26, $mod27, $mod28, $mod29, $mod30, $mod31, $mod32, $mod33, $mod34, $mod35, $mod36, $mod37, $mod38, $mod39, $mod40, $mod41, $mod42, $mod43, $mod44, $mod45, $mod46, $mod47, $mod48, $mod49, $mod50, $mod51, $mod52);
			
			if($flag) {$this->message->setFlashMessage($messageSuccess, array('id'=>'1'));}
			else {$this->message->setFlashMessage($messageFailure);}
		
			#redirect(base_url('user/dashboard'));
		}
				
		redirect(base_url('user/dashboard'));
	}
	
	public  function delete_pss()
	{
		# Load the page model
		$this->load->model('page');
		
		$data = array();
		$page = $this->uri->segment(1);
		$pageId = $this->uri->segment(3);
		
		$title = ''; $view = ''; $category = ''; $messageSuccess = ''; $messageFailure = ''; $redirectView = '';
		
		switch ($page)
		{
			case 'product' :
				$category = Page::_CATEGORY_PRODUCT;
				$messageSuccess = Message::PRODUCT_DELETE_SUCCESS;
				$messageFailure = Message::PRODUCT_DELETE_FAILURE;
				break;
			case 'service' :
				$category = Page::_CATEGORY_SERVICE;
				$messageSuccess = Message::SERVICE_DELETE_SUCCESS;
				$messageFailure =  Message::SERVICE_DELETE_FAILURE;
				break;
			case 'sensation' :
				$category = Page::_CATEGORY_SENSES;
				$messageSuccess = Message::SENSATION_DELETE_SUCCESS;
				$messageFailure =  Message::SENSATION_DELETE_FAILURE;
				break;
		}
		
		$flag = $this->page->delete_pss($pageId);
		
		if($flag) {$this->message->setFlashMessage($messageSuccess, array('id'=>'1'));}
		else {$this->message->setFlashMessage($messageFailure);}
		
		redirect(base_url('user/dashboard'));
	}
	
	public function edit_symptom()
	{
		$data = array();
		
		$symptomId = $this->uri->segment(3);
		
		$this->load->model('symptom_model','symptom');
		
		$data['symptom'] = $this->symptom->getSymptomById($symptomId);
		
		$this->template->title('Edit Symptom');
		$this->template->render('user/edit_symptom', $data);
	}
	
	public function update_symptom()
	{
		$flag = false;
		
		$symptomId = $this->uri->segment(3);
		
		if(!empty($symptomId) && $this->input->post('symptom-title') && $this->input->post('symptom-summary'))
		{
			$symptom = $this->input->post('symptom-title');
			$description = $this->input->post('symptom-summary');
			$anonymous = $this->input->post('anonymous');
			
			# Load symptom modal
			$this->load->model('symptom_model','symptom');
			
			$flag = $this->symptom->updateSymptom($symptomId, $symptom, $description, $anonymous);
			
			if($flag) {$this->message->setFlashMessage(Message::SYMPTOM_UPDATE_SUCCESS, array('id'=>'1'));}
			else {$this->message->setFlashMessage(Message::SYMPTOM_UPDATE_FAILURE);}
			
			redirect(base_url('user/dashboard'));
		}
		
		$this->message->setFlashMessage(Message::SYMPTOM_UPDATE_FAILURE);
		redirect(base_url('user/dashboard'));
	}
	
	public function delete_symptom()
	{
		# Load the page model
		$this->load->model('symptom_model','symptom');
				
		$symptomId = $this->uri->segment(3);
		
		$flag = $this->symptom->delete_symptom($symptomId);
		
		if($flag) {$this->message->setFlashMessage(Message::SYMPTOM_DELETE_SUCCESS, array('id'=>'1'));}
		else {$this->message->setFlashMessage(Message::SYMPTOM_DELETE_FAILURE);}
		
		redirect(base_url('user/dashboard'));
	}
	
}
