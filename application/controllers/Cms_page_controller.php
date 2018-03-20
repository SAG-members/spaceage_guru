<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms_page_controller extends Base 
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
	    $this->load->model('cms');
		
		$slug = $this->uri->segment(1) ? $this->uri->segment(1) : 'Intro';
		
		$result = $this->cms->get_by_slug($slug);

		$data['pageTitle'] = $result->{Cms::_TITLE};
		$data['pageDescription'] = $result->{Cms::_CONTENT};

		$this->template->title('Sparring humankind to space age');
		$this->template->render('cms/single.php', $data);
	}
	
		
}
