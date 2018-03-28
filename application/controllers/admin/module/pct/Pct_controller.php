<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pct_controller extends Application 
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Pct_setting','pct');
		$this->load->model('currency');
	}

	public function index()
	{
	    $data = array();
	    
	    $data['pctConversions'] = $this->pct->get_rates(true);
	    $data['currencies'] = $this->currency->getCurrencies();
	    
		$this->template->title('Manage PCT Rates');
		$this->template->render('pct/manage-pct-setting', $data);
	}	
	
	public function add_pct_rate()
	{
	    if($this->input->post('btn-add-rate'))
	    {
	        $pctRate = $this->input->post('pct-rate');
	        $currency = $this->input->post('currency');
	        $conversionRate = $this->input->post('conversion-rate');
	        
	        if(empty($pctRate) || empty($currency) || empty($conversionRate))
	        {
	            $this->message->setFlashMessage(Message::PCT_RATE_ADDED_MESSAGE);	            
	            redirect('admin/pct-setting');
	        }
	        
	        # Load pct setting model
	        $this->load->model('pct_setting', 'pct');
	        
	        if($this->pct->set_pct_rate($pctRate, $currency, $conversionRate)) $this->message->setFlashMessage(Message::PCT_RATE_ADDED_SUCCESS, array('id'=>1));
	        else $this->message->setFlashMessage(Message::PCT_RATE_ADDED_FAILURE);
	        
	        redirect('admin/pct-setting');
	    }
	}
	
}
