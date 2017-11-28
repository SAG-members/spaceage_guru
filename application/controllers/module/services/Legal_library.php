<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Legal_library extends Application 
{
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->isLoggedIn()) { redirect($this->redirectToLogin()); }
		
		$this->template->setSiteLayout(Template::_PUBLIC_TEMPLATE_DIR, Template::_PUBLIC_LAYOUT_DIR, Template::_PUBLIC_MODULE_DIR);
		
		$this->template->setTemplate('library_template.php');
		
		# Load Page model
		$this->load->model('page');
			
		$this->data['products'] = $this->page->get_by_category_n_user(Page::_CATEGORY_PRODUCT, $this->session->userdata('id'), 5);
			
		# Load Page model and get all service limit by 10
		$this->data['services'] = $this->page->get_by_category_n_user(Page::_CATEGORY_SERVICE, $this->session->userdata('id'), 5);
			
		# Load Page model and get all sensations
		$this->data['sensations'] = $this->page->get_by_category_n_user(page::_CATEGORY_SENSES, $this->session->userdata('id'), 5);
		
		# Load Symptom model and get all symptoms limit by 10
		$this->load->model('symptom_model','symptom');
		
		$this->data['symptoms'] = $this->symptom->get_symptom_by_user($this->session->userdata('id'), 5);
		
		$this->template->setLeftSideBar('legal_library_left_menu',$this->data); 
		
	}
				
	public function index()
	{
				
		$additionalScripts = array('plugin/fullcalendar/moment.min.js', 'plugin/fullcalendar/fullcalendar.js');
		$additionalStyles = array('fullcalendar/fullcalendar.css');
		
		$this->template->setAdditionalScript($additionalScripts);
		$this->template->setAdditionalStyle($additionalStyles);
		
		$this->template->title("Library");
		$this->template->render('services/legal_library');
	}
	
	
	
}
