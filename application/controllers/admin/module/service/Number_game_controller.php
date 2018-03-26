<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Number_game_controller extends Application {
    
    public function __construct()
    {
        parent::__construct();        
        
    }
    
    public function index()
    {
        $data = array();
        
        $this->template->title('Manage Number Game');
        $this->template->render('service/manage_number_game', $data);
    }
    
    
}
