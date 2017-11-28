<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Membership_controller extends Application
{
	public function __construct()
	{
		parent::__construct(); 
		
		$redirectURL = $this->input->post('redirect-url');
		if(!$this->isLoggedIn()) { redirect($this->redirectToLogin($redirectURL)); }

		$this->load->model('admin/membership','membership');
		$this->load->model('admin/membership_document_model','document');
	}
	
	public function index()
	{
		$data = array();
		$data['memberships'] = $this->membership->get_memberships('', '', '', '');
		$data['count'] = $this->membership->get_membership_count();
		
		$this->template->title('Manage Membership');
		$this->template->render('membership/manage_membership', $data);
	}
	
	public function new_membership()
	{
		if($this->input->post('title') && $this->input->post('description'))
		{
			# First Step Is to Upload Logo to upload directory
			$imageName = '';
			$file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
			$upload_exts = explode(".", $_FILES["file"]["name"]);
			$upload_exts = end($upload_exts);
			
			if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 2000000) && in_array($upload_exts, $file_exts))
			{
				if ($_FILES["file"]["error"] > 0) { echo "Return Code: " . $_FILES["file"]["error"] . "<br>"; }
				else
				{
					# Generate Timestamp name for image name and upload
					$imageName = $_FILES["file"]["name"].microtime();
					move_uploaded_file($_FILES["file"]["tmp_name"], Template::_ADMIN_UPLOAD_DIR . $imageName);
				}
			}
			else
			{
				echo "<div class='error'>Invalid file</div>";
			}
						
// 			$lastId = $this->membership->create_new_membership($this->session->userdata('id'), $this->input->post('title'), $this->input->post('description'), $this->input->post('mprice'), $this->input->post('qprice'), $this->input->post('yprice'), $imageName);
// 			$lastId = $this->membership->create_new_membership($this->session->userdata('id'), $this->input->post('title'), $this->input->post('description'), $this->input->post('mprice'), $this->input->post('qprice'), $this->input->post('yprice'), $imageName,  $this->input->post('unit_price'), $this->input->post('credit_points'), $this->input->post('max_unit'));
			$lastId = $this->membership->create_new_membership($this->session->userdata('id'), $this->input->post('title'), $this->input->post('description'), $this->input->post('mprice'), $this->input->post('qprice'), $this->input->post('yprice'), $imageName,  $this->input->post('unit_price'), $this->input->post('credit_points'), $this->input->post('max_unit'), $this->input->post('parent_id'), $this->input->post('visibility'), $this->input->post('total-max-amount'));
			
			if($this->input->post('hidden_files'))
			{
				$files = $this->input->post('hidden_files');
												
				foreach ($files as $f)
				{
					$this->document->create_new_membership_document($lastId, $f);	
				}
			}
			
			if($lastId) $this->message->setFlashMessage(Message::MEMBERSHIP_CREATE_SUCCESS, array('id'=>'1')); 
			else $this->message->setFlashMessage(Message::MEMBERSHIP_CREATE_FAILURE);
			
			redirect(base_url('admin/memberships'));
		}
		
		
		# Get already added products to decide product parent
		
		$data['products'] =  $this->membership->get_memberships('', '', '', '');
		
		
		$this->template->title('Add New Shop Product');
		$this->template->render('membership/new_membership', $data);
	}
	
	public function edit_membership()
	{
		$membershipId = $this->uri->segment(4);
		
		if($this->input->post('title') && $this->input->post('description') && $this->input->post('mprice'))
		{
			
			# First Step Is to Upload Logo to upload directory
			$imageName = $_FILES["file"]["name"];
			$file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
			$upload_exts = explode(".", $imageName);
			$upload_exts = end($upload_exts);
				
			if(isset($_FILES))
			{
			    if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 2000000) && in_array($upload_exts, $file_exts))
			    {
			        if ($_FILES["file"]["error"] > 0) { echo "Return Code: " . $_FILES["file"]["error"] . "<br>"; }
			        else
			        {
			            # Generate Timestamp name for image name and upload
			            $imageName = md5($_FILES["file"]["name"].microtime()).'.png';
			            
			            move_uploaded_file($_FILES["file"]["tmp_name"], Template::_ADMIN_UPLOAD_DIR . $imageName);
			            
			        }
			    }
			    else
			    {
			        // 				echo "<div class='error'>Invalid file</div>";
			    }
			}			 
			
			$flag = $this->membership->update_membership($membershipId, $this->input->post('title'), $this->input->post('description'), $this->input->post('mprice'), $this->input->post('qprice'), $this->input->post('yprice'),$imageName, $this->input->post('unit_price'), $this->input->post('credit_points'), $this->input->post('max_unit'), $this->input->post('parent_id'), $this->input->post('visibility'), $this->input->post('total-max-amount'));
			
			if($this->input->post('hidden_files'))
			{
				$files = $this->input->post('hidden_files');
						
				foreach ($files as $f)
				{
					$this->document->create_new_membership_document($lastId, $f);
				}
			}
			
			if($flag) $this->message->setFlashMessage(Message::MEMBERSHIP_UPDATE_SUCCESS, array('id'=>'1'));
			else $this->message->setFlashMessage(Message::MEMBERSHIP_UPDATE_FAILURE);
				
			redirect(base_url('admin/memberships'));
		}
		
		# Get already added products to decide product parent
		$data['products'] =  $this->membership->get_memberships('', '', '', '');
		
		$data['membership'] = $this->membership->get_membership_by_id($membershipId);
		$data['documents'] = $this->document->get_membership_document($membershipId);
		
		$this->template->title('Edit Shop Product');
		$this->template->render('membership/new_membership', $data);
	}
	
	public function delete_membership()
	{
	    $membershipId = $this->uri->segment(4);
	    
	    $result = $this->membership->delete_membership_by_id($membershipId);
	    
	    if($result) $this->message->setFlashMessage(Message::MEMBERSHIP_DELETE_SUCCESS, array('id'=>'1'));
	    else $this->message->setFlashMessage(Message::MEMBERSHIP_DELETE_FAILURE);
	    
	    redirect(base_url('admin/memberships'));
	}
}
