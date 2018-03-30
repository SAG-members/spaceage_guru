<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Number_game_controller extends Application {
    
    public function __construct()
    {
        parent::__construct(); 
        if(!$this->isLoggedIn()) { $this->redirectToLogin();}

        # Load user modal             
        $this->load->model('admin/spiritual','spiritual');        
        
    }
    
    public function index()
    {
        $data['spirituals'] = $this->spiritual->get_data();
        
        $this->template->title('Manage Spiritual Guidance Roles');
        $this->template->render('service/manage_number_game', $data);
    }
    
        public function create_number()
    {
       
        $data = array();               
          
        if($this->input->post('submit'))
        {                    
            $userId = $this->session->userdata('id');
            $number = $this->input->post('number');
            $add_number_pic= $this->input->post('add_number_pic');
            $the_role = $this->input->post('the_role');
            $add_role_pic = $this->input->post('add_role_pic');            
            $fear = $this->input->post('fear');
            $task = $this->input->post('task');
            $goal = $this->input->post('goal');
            $color_layers_hundres = $this->input->post('color_layers_hundres');
            $color_layers_tens = $this->input->post('color_layers_tens');
            $singles = $this->input->post('singles');
           
            
            
            /* Create new Spiritual Guidance here */
            $lastId = $this->spiritual->create_spiritual($number, $userId, $add_number_pic, $the_role, $add_role_pic, $fear, $task, $goal, $color_layers_hundres, $color_layers_tens, $singles);

       
            /* Now since every thing is setup let's show sucess/ failure message and redirect*/
            
            if($lastId) {$this->message->setFlashMessage(Message::SPIRITUAL_CREATE_SUCCESS, array('id'=>'1'));}
            else {$this->message->setFlashMessage(Message::SPIRITUAL_CREATE_SUCCESS);}
        
            redirect(base_url('admin/number-game'));
        }
        
        $this->template->title('Manage Spiritual Guidance');
        $this->template->render('service/new_number', $data); 
    }
    
    public function edit_number()
    {
        $dataId = $this->uri->segment(4);
        
        if($this->input->post('submit'))
        {                    
            $userId = $this->session->userdata('id');
            $number = $this->input->post('number');
            $add_number_pic= $this->input->post('add_number_pic');
            $the_role = $this->input->post('the_role');
            $add_role_pic = $this->input->post('add_role_pic');            
            $fear = $this->input->post('fear');
            $task = $this->input->post('task');
            $goal = $this->input->post('goal');
            $color_layers_hundres = $this->input->post('color_layers_hundres');
            $color_layers_tens = $this->input->post('color_layers_tens');
            $singles = $this->input->post('singles');
           
            
            
            /* Update new Spiritual Guidance here */
            $lastId = $this->spiritual->update_spiritual($dataId,$number, $userId, $add_number_pic, $the_role, $add_role_pic, $fear, $task, $goal, $color_layers_hundres, $color_layers_tens, $singles);

       
            /* Now since every thing is setup let's show sucess/ failure message and redirect*/
            
            if($lastId) {$this->message->setFlashMessage(Message::SPIRITUAL_UPDATE_SUCCESS, array('id'=>'1'));}
            else {$this->message->setFlashMessage(Message::SPIRITUAL_UPDATE_SUCCESS);}
        
            redirect(base_url('admin/number-game'));
        }
        
        $data['spiritual'] = $this->spiritual->get_by_id($dataId);

        $this->template->title('Edit Spiritual Guidance');
        $this->template->render('service/new_number', $data); 
    }   


    public function publish()
    {
        if($this->input->post('ids'))
        {
            $serviceIds = $this->input->post('ids');            
            
            $result = $this->spiritual->publish_spiritual($serviceIds);   
            
            if($result)$this->message->setFlashMessage(Message::SPIRITUAL_PUBLISH_SUCCESS, array('id'=>'1'));
            else $this->message->setFlashMessage(Message::SPIRITUAL_PUBLISH_FAILURE);
            
            redirect($redirectView);
        }
                
    }
    
    public function unpublish()
    {
        if($this->input->post('ids'))
        {
            $serviceIds = $this->input->post('ids');        
                
            $result = $this->spiritual->unpublish_spiritual( $serviceIds);
            
            if($result)$this->message->setFlashMessage(Message::SPIRITUAL_UNPUBLISH_SUCCESS, array('id'=>'1'));
            else $this->message->setFlashMessage(Message::SPIRITUAL_UNPUBLISH_FAILURE);
            
            redirect($redirectView);
        }
        
    }
    
    public function delete()
    {
        if($this->input->post('ids'))
        {
            $id = $this->input->post('ids');       
        
            $result = $this->spiritual->delete_spiritual($id);
                            
            if($result)$this->message->setFlashMessage(Message::SPIRITUAL_DELETE_SUCCESS, array('id'=>'1'));
            else $this->message->setFlashMessage(Message::SPIRITUAL_CREATE_FAILURE);
                
            redirect(base_url('admin/number-game'));
        }
                
        
    }
}
