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
            $add_number_pic= $this->uploadFile('add_number_pic');
            $the_role = $this->input->post('the_role');
            $add_role_pic= $this->uploadFile('add_role_pic');            
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
            
            if(!empty($_FILES['add_number_pic']['name'])){ 
              $add_number_pic= $this->uploadFile('add_number_pic');
            } else {              
              $add_number_pic= $this->input->post('number_pic_old');               
            }
            $the_role = $this->input->post('the_role');
            if(!empty($_FILES['add_role_pic']['name'])){ 
              $add_role_pic= $this->uploadFile('add_role_pic');
            } else {              
              $add_role_pic= $this->input->post('role_pic_old');               
            }         
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


     /**
      * This function is used to Upload file
      * @param $fielName : This is input name from form
      * @return fileName by which file is uploaded on server
      */
    public function uploadFile($fielName) { 
            $imageName = '';
            //$file_exts = array("jpg", "bmp", "jpeg", "gif", "png","JPG", "BMP", "JPEG", "GIF", "PNG");
            $file_exts = array("jpg", "bmp", "jpeg", "gif", "png", "pjpeg","JPG", "BMP", "JPEG", "GIF", "PNG","PJPEG");
            $upload_exts = explode(".", $_FILES["$fielName"]["name"]);
            $upload_exts = end($upload_exts);
            
            /*if ((($_FILES["$fielName"]["type"] == "image/gif") || ($_FILES["$fielName"]["type"] == "image/jpeg") || ($_FILES["$fielName"]["type"] == "image/png") || ($_FILES["$fielName"]["type"] == "image/pjpeg")) && ($_FILES["$fielName"]["size"] < 2000000) && in_array($upload_exts, $file_exts)) {*/
      if ((
                ($_FILES["$fielName"]["type"] == "image/jpg") || 
                ($_FILES["$fielName"]["type"] == "image/bmp") || 
                ($_FILES["$fielName"]["type"] == "image/jpeg") || 
                ($_FILES["$fielName"]["type"] == "image/gif") ||
                ($_FILES["$fielName"]["type"] == "image/png") ||
                ($_FILES["$fielName"]["type"] == "image/pjpeg") ||
                ($_FILES["$fielName"]["type"] == "image/JPG") || 
                ($_FILES["$fielName"]["type"] == "image/BMP") || 
                ($_FILES["$fielName"]["type"] == "image/JPEG") || 
                ($_FILES["$fielName"]["type"] == "image/GIF") || 
                ($_FILES["$fielName"]["type"] == "image/PNG") || 
                ($_FILES["$fielName"]["type"] == "image/PJPEG")
            ) && ($_FILES["$fielName"]["size"] < 2000000) && in_array($upload_exts, $file_exts)) {
                if ($_FILES["$fielName"]["error"] > 0) { echo "Return Code: " . $_FILES["$fielName"]["error"] . "<br>"; }
                else
                {
                    # Generate Timestamp name for image name and upload
                    $imageName = str_replace(' ', '_', $_FILES["$fielName"]["name"]);
                    move_uploaded_file($_FILES["$fielName"]["tmp_name"], Template::_ADMIN_UPLOAD_DIR . $imageName);
                }
            }
        return $imageName;
    }
}


