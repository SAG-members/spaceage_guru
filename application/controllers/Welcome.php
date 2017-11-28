<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Base 
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
	    
	    # Load User model
	    $this->load->model('user');
	    
	        
		$this->load->model('cms');
		
		$result = $this->cms->getCMSPageById(1);

		$data['pageTitle'] = $result->{Cms::_TITLE};
		$data['pageDescription'] = $result->{Cms::_CONTENT};

		$this->template->title('Registered with Santa');
		$this->template->render('cms/single.php', $data);
	}
}
