<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_controller extends Application {
	
	public function __construct()
	{
		parent::__construct();
		if(!$this->isLoggedIn()) { $this->redirectToLogin();}
		
		$this->load->model('admin/user','user');
		$this->load->model('country');
	}
	
	public function index()
	{
		$this->template->title('Edit Profile');
		
		$data = array();
		
		$data['user'] = $this->user->getUserById($this->session->userdata('id'));
		$data['countries'] = $this->country->getCountries();
				
		$this->template->render('auth/profile', $data);
		
	}
	
	public function update_profile()
	{
		if($this->input->post('avatar_name') || $this->input->post('first_name') || $this->input->post('last_name') || $this->input->post('secondary_email') || $this->input->post('mobile') || $this->input->post('what_are_you') || $this->input->post('what_do_you_want_to_become') || $this->input->post('country'))
		{
			# First step is to check for Avatar Image
			
			$imageName = '';
			if($_FILES['file'])
			{
				# Get Image and Create Thumb and upload
				
				$file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
				$upload_exts = explode(".", $_FILES["file"]["name"]);
				$upload_exts = end($upload_exts);
				
				if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 2000000) && in_array($upload_exts, $file_exts))
				{
					if ($_FILES["file"]["error"] > 0) { echo "Return Code: " . $_FILES["file"]["error"] . "<br>"; }
					else
					{
						# Generate Timestamp name for image name and upload
						$imageName = md5($_FILES["file"]["name"].microtime()).'.png';
						move_uploaded_file($_FILES["file"]["tmp_name"], Template::_PUBLIC_AVTAR_DIR . $imageName);
					}
				}
				else
				{
					echo "<div class='error'>Invalid file</div>";
				}
			}
			
			$avaratName = $this->input->post('avatar_name');
			$fname = $this->input->post('first_name');
			$lname = $this->input->post('last_name');
			$secondaryEmail = $this->input->post('secondary_email');
			$mobile = $this->input->post('mobile');
			$whatAreYou = $this->input->post('what_are_you');
			$whatYouWantToBecome = $this->input->post('what_do_you_want_to_become');
			$country = $this->input->post('country');
			
			$flag = $this->user->update_user_profile($this->session->userdata('id'), $avaratName, $imageName, $fname, $lname, $secondaryEmail, $mobile, $whatAreYou, $whatYouWantToBecome, $country);
			
			if($flag) $this->message->setFlashMessage(Message::PROFILE_UPDATE_SUCCESS, array('id'=>1));
			else $this->message->setFlashMessage(Message::PROFILE_UPDATE_FAILURE);
				
			redirect(base_url('admin/profile'));
				 
		}		
	}
		
}
