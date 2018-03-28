<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ebusiness_controller extends Application
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
        
        $this->template->setLeftSideBar('left_sidebar',$this->data);
        $this->template->setRightSideBar('right_sidebar',$this->data);
        
        $this->template->setSiteLayout(Template::_PUBLIC_TEMPLATE_DIR, Template::_PUBLIC_LAYOUT_DIR, Template::_PUBLIC_MODULE_DIR);
        
        $this->template->setTemplate('public_master_template.php');
        
        $this->load->model('page_submodility','submodility');
    }
    
    public function index()
    {
        $data = array();
        
        
        /* Get Escrow List */
        
        $response = array();
        
        $userId = $this->session->userdata('id');
        
        # Load user model
        $this->load->model('user');
        
        # Load page view to be used
        $this->load->model('User_event_escrow_model', 'ueem');
        
        # Load library event comment model
        $this->load->model('user_event_status_model', 'uesm');
        
        # Load Library Event Model
        $this->load->model('user_event_model','uem');
        
        # Load page model
        $this->load->model('page');
        
        # Get Saved Escrow Data
        $criteria = '('.User_event_escrow_model::_ESCROW_BUYER_ID.' = '.$userId. ' OR '. User_event_escrow_model::_ESCROW_SELLER_ID. ' = '.$userId .') AND ' .User_event_escrow_model::_STATUS.' = '.User_event_escrow_model::YIELD_OFFER;
        $response['data']['yielded_escrow'] = $this->ueem->get_by_criteria($criteria);
        
        # Get Saved Escrow Data
        $criteria = '('.User_event_escrow_model::_ESCROW_BUYER_ID.' = '.$userId. ' OR '. User_event_escrow_model::_ESCROW_SELLER_ID. ' = '.$userId .') AND ' .User_event_escrow_model::_STATUS.' = '.User_event_escrow_model::SAVE_AND_EXIT;
        $response['data']['saved_escrow'] = $this->ueem->get_by_criteria($criteria);
        
        # Get Accepted Escrow Data
        $criteria = '('.User_event_escrow_model::_ESCROW_BUYER_ID.' = '.$userId. ' OR '. User_event_escrow_model::_ESCROW_SELLER_ID. ' = '.$userId . ') AND ' .User_event_escrow_model::_STATUS.' = '.User_event_escrow_model::ACCEPT_OFFER;
        $response['data']['accepted_escrow'] = $this->ueem->get_by_criteria($criteria);
       
        $response['profile'] = $this->user->getUserProfile($userId);
        
        # Get Users from table
        
        $response['accounts'] = $this->db->from('user')->where('id !=', $userId)->get()->result();
        
        # Get User transactions
        
        $this->load->model('pct_transaction');
        $response['recentTransactions'] = $this->pct_transaction->get_transactions($userId);
        
//         echo $this->db->last_query();
        
        $this->template->title('E-Business');
        $this->template->render('services/e-business', $response);
    }
    
        
}
