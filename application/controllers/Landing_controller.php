<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing_controller extends Base 
{
	public function __construct()
	{
		parent::__construct();
		
		$this->template->setSiteLayout(Template::_PUBLIC_TEMPLATE_DIR, Template::_PUBLIC_LAYOUT_DIR, Template::_PUBLIC_MODULE_DIR);
		
		$this->template->setTemplate('landing_template');
	}
	
	public function index()
	{
	    $data = array();
	    
	    $this->template->title('Sparring humankind to space age');
		$this->template->render('landing', $data);
	}
	
		
}
