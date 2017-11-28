<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order_controller extends Application 
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('psss_purchase_history','psss');
		$this->load->model('user_subscription','subscription');
	}

	public function index()
	{
		$data['orders'] = $this->psss->get_psss_history();
		
		$this->template->title('Manage Orders');
		$this->template->render('order/manage_order', $data);
	}
	
	public function manage_subscriptions()
	{
		$data['orders'] = $this->subscription->get_subscriptions();
		
		$this->template->title('Manage Subscriptions');
		$this->template->render('order/manage_subscriptions', $data);
	}
			
}
