<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Membership extends Application 
{
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->isLoggedIn()) { redirect($this->redirectToLogin()); }
		
		$this->load->model('membership_model','membership');
	}

	public function index()
	{
		$slug = $this->uri->segment(2);
		
		$data['membership'] = $this->membership->get_membership_by_slug($slug);
		$this->template->title($data['membership']->{Membership_model::_MEMBERSHIP_TITLE_SLUG});
		$this->template->render('membership/membership', $data);
	}

}
