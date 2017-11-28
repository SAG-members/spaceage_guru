<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Public_ajax_controller extends CI_Controller 
{
	/* General Service */
	
	const AJAX_VALIDATE_AVATAR_OR_COUPON = 100;
	const AJAX_VALIDATE_AVATAR_NAME = 101;
	
	const AJAX_RECOVER_PASSWORD_VIA_EMAIL = 201;
	
	const AJAX_RECOVER_PASSWORD_VIA_QUESTION = 301;
	const AJAX_VALIDATE_QUESTION_PASSWORD = 302;
	const AJAX_CHANGE_USER_PASSWORD = 303;
	
	const AJAX_SAVE_USER_CALENDAR_EVENTS = 401;
	const AJAX_UPDATE_USER_CALENDAR_EVENTS = 402;
	const AJAX_UPDATE_USER_CALENDAR_COMMENTS = 403;
	const AJAX_REMOVE_USER_CALENDAR_EVENT = 404;
	const AJAX_GET_USER_CALENDAR_EVENTS = 405;
	
	const AJAX_GET_SUBMODILITY_LIST = 501;

	const AJAX_ADD_COMMENT_TO_CALENDAR_EVENT = 601;
	const AJAX_GET_EVENT_DATA = 602;
	
	const AJAX_GET_TASK_BY_ID = 701;
	const AJAX_GET_GOAL_BY_ID = 702;
	
	const AJAX_GET_SATAN_USERS = 1000;
	
	const AJAX_GET_LIBRARY_SEARCH = 1100;
	
	
	const AJAX_LIKE_PAGE_DATA = 1200;
	const AJAX_UNLIKE_PAGE_DATE = 1201;
	const AJAX_LOVE_IT_PAGE_DATE = 1202;
	const AJAX_HATE_IT_PAGE_DATE = 1203;
	
	const AJAX_POST_COMMENT = 1301;
	const AJAX_POST_COMMENT_REPLY = 1302;
	
	const AJAX_ACCQUIRE_PRICELESS_DATA = 1400;
	
	const AJAX_CHECK_IF_ALREADY_RSS_SUBSCRIBED = 1500;
	
	
	const AJAX_VALIDATE_COUPON_CODE = 10011;
	const AJAX_INVITE_NEW_USER_TO_JOIN = 10012;
	
	const AJAX_VALIDATE_DATA_SUBSCRIBED = 11000;
	
	const AJAX_VALIDATE_ESCROW_COUNTRY = 12000;
	
	const AJAX_VALIDATE_ESCROW_LIMIT = 13000;
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$response = '';
				
		$request = $this->input->post('acid');
		$payload = json_decode($this->input->post('payload'), true);
		
		switch ($request)
		{
			case self::AJAX_VALIDATE_AVATAR_OR_COUPON : $response = $this->validateAvatarNameOrCoupon($payload); break;
			case self::AJAX_VALIDATE_AVATAR_NAME : $response = $this->validateAvatarName($payload); break;
			
			case self::AJAX_RECOVER_PASSWORD_VIA_EMAIL : $response = $this->recoverPasswordViaEmail($payload); break;
			
			case self::AJAX_RECOVER_PASSWORD_VIA_QUESTION : $response = $this->recoverPasswordViaQuestion($payload); break;
			case self::AJAX_VALIDATE_QUESTION_PASSWORD : $response = $this->validateQuestionPassword($payload); break;
			case self::AJAX_CHANGE_USER_PASSWORD : $response = $this->changeUserPassword($payload); break;
			
			case self::AJAX_SAVE_USER_CALENDAR_EVENTS : $response = $this->saveUserCalendarEvents($payload); break;
			case self::AJAX_UPDATE_USER_CALENDAR_EVENTS : $response = $this->updateUserCalendarEvents($payload); break;
			case self::AJAX_UPDATE_USER_CALENDAR_COMMENTS : $response = $this->updateUserCalendarComments($payload); break;
			case self::AJAX_REMOVE_USER_CALENDAR_EVENT : $response = $this->removeUserCalendarEvent($payload); break;
			case self::AJAX_GET_USER_CALENDAR_EVENTS : $response = $this->getUserCalendarEvents($payload); break;
			
			case static::AJAX_GET_SUBMODILITY_LIST : $response = $this->getSubmodility($payload); break;
			
			case static::AJAX_ADD_COMMENT_TO_CALENDAR_EVENT : $response = $this->addCommentToCalendarEvents($payload); break;
			case static::AJAX_GET_EVENT_DATA : $response = $this->getEventData($payload); break;
			
			case static::AJAX_GET_TASK_BY_ID : $response = $this->get_task_by_id($payload); break;
			case static::AJAX_GET_GOAL_BY_ID : $response = $this->get_goal_by_id($payload); break;
			
			case static::AJAX_GET_SATAN_USERS : $response = $this->get_satan_users($payload); break;
			
			case static::AJAX_GET_LIBRARY_SEARCH : $response = $this->library_search($payload); break;
			
			case static::AJAX_LIKE_PAGE_DATA : $response = $this->like_page_data($payload); break;
			case static::AJAX_UNLIKE_PAGE_DATE : $response = $this->unlike_page_data($payload); break;
			case static::AJAX_LOVE_IT_PAGE_DATE : $response = $this->love_it_page_data($payload); break;
			case static::AJAX_HATE_IT_PAGE_DATE : $response = $this->hate_it_page_data($payload); break;
			
			case static::AJAX_POST_COMMENT : $response= $this->post_comment($payload); break;
// 			case static::AJAX_POST_COMMENT_REPLY : $response = 

			case static::AJAX_ACCQUIRE_PRICELESS_DATA : $response = $this->accquire_priceless_data($payload); break;
			case static::AJAX_CHECK_IF_ALREADY_RSS_SUBSCRIBED : $response = $this->check_if_alreay_rss_subscribed($payload); break;
			
			case self::AJAX_VALIDATE_COUPON_CODE : $response = $this->validateCouponCode($payload); break;
			case self::AJAX_INVITE_NEW_USER_TO_JOIN : 	$response = $this->inviteNewUserToJoin($payload); break;
			
			
			case self::AJAX_VALIDATE_DATA_SUBSCRIBED : $response = $this->validateDataSubscribed($payload); break;
			
			case self::AJAX_VALIDATE_ESCROW_COUNTRY : $response = $this->validateEscrowCountry($payload); break;
			
			case self::AJAX_VALIDATE_ESCROW_LIMIT : $response = $this->validateEscrowLimit($payload); break;
		}
		
		echo json_encode($response);
	}
	
	private function validateAvatarNameOrCoupon($payload)
	{
		$response = array();
		
// 		if($payload['recommendor'])
// 		{
// 			# First step is to validate is provided value is avatar name/ Coupon Code
								
// 			$this->load->model('user');
				
// 			$result = $this->user->isAvatarNameAvailable($payload['recommendor']);
				
// 			if($result)
// 			{
// 				$response = array('flag'=>0, 'message' => 'This avatar name is already used, please try something else');
// 				return $response;
// 			}
				
			
			
			
// 		}
		
		return $response;
	}
	
	private function validateAvatarName($payload)
	{
		$response = array();
		
		if($payload['avatar_name'])
		{
			# Validate the avatar name, load model user
					
			$this->load->model('user');
			
			$result = $this->user->isAvatarNameAvailable($payload['avatar_name']);
			
			if($result)
			{
				$response = array('flag'=>0, 'message' => 'This avatar name is already used, please try something else');
				return $response;
			}
			
			$response = array('flag'=>1, 'This avatar is available');
		}
		
		return $response;
	}
	
	private function recoverPasswordViaEmail($payload)
	{
		$response = array();
		
		if($payload['email'])
		{
			$email = $payload['email'];
			
			# Get user based on email
			
			$this->load->model('user');
			$result = $this->user->getByEmail($email);
			
			if(count($result) == 0) 
			{
				$response = array('flag'=>0,'message'=>'No email matching our records, please check and try again');
				return $response;
			}
			
			# Generate a new password hash, and Update password reset table for user
			
			$this->load->model('reset_password_model','resetPassword');
			
			$response = $this->resetPassword->create_password_hash($result->{User::_ID});
			
			if($response)
			{
				$data['name'] = $result->{User::_F_NAME} == " " ? $result->{User::_EMAIL} :  $result->{User::_EMAIL};
				$data['passwordHash'] = $response['passwordHash'];
			
				# Load View
			
				$body = $this->load->view('email_templates/reset_password', $data, TRUE);
			
				# Send Email and display message
				$response = $this->email_engine->reset_password($payload['email'], $body) ? array('flag'=>1,'message'=>'New password sent to '.$email.', please check your mailbox.') : array('flag'=>0,'message'=>'Not able to send email, please try again later');
			}
			
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please provide email address first');
		}
				
		return $response;
	}
	
	private function recoverPasswordViaQuestion($payload)
	{
		$response = array();
		
		if($payload['user_id'])
		{
			$this->load->model('user');
			
			$result = $this->user->getUserProfileByUsername($payload['user_id']);
			
			if($result)
			{
				$response = array('flag'=>1, 'message'=>'User exists', 'result'=>$result->{User::_SECRET_QUESTION});
			}
			else 
			{
				$response = array('flag'=>0, 'message'=>'No records matching with given user id');
			}
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please provide user id first');
		}
		
		return $response;
	}
	
	private function validateQuestionPassword($payload)
	{
		$response = array();
		
		if($payload['answer'])
		{
			$this->load->model('user');
				
			$result = $this->user->getUserProfileByUsername($payload['user_id']);
				
			if(strtolower($result->{User::_SECRET_QUESTION_ANSWER}) == strtolower(md5($payload['answer'])))
			{
				$response = array('flag'=>1, 'message'=>'Answer Validated');
			}
			else
			{
				$response = array('flag'=>0, 'message'=>'Incorrect answer to the above question');
			}
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please provide answer first');
		}
		
		return $response;
	}
	
	private function changeUserPassword($payload)
	{
		$response = array();
		
		if($payload['password'] && $payload['cpassword'])
		{
			$password = $payload['password'];
			$cpassword = $payload['cpassword'];
			
			if($password != $cpassword)
			{
				$response = array('flag'=>0, 'message'=>'Password and confirm password does not match');
				return $response;
			}
			
			$this->load->model('user');
		
			$result = $this->user->getUserProfileByUsername($payload['user_id']);
		
			if($result)
			{
				$result = $this->user->update_user_password($result->{User::_ID}, $password);
				
				if($result) $response = array('flag'=>1, 'message'=>'Password changed successfully, please login with the username and new password');
				else $response = array('flag'=>1, 'message'=>'Unable to change password, please try again later');
			}
			else
			{
				$response = array('flag'=>0, 'message'=>'Unable to change your password, please try again later');
			}
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please provide password and confirm password first');
		}
		
		return $response;
	}
	
	private function saveUserCalendarEvents($payload)
	{
		$response = array();
		
		if($payload)
		{
			$userId = $this->session->userdata('id');

			if($payload['userId'] != $userId)
			{
				$response = array('flag'=>0, 'message'=>'Unable to create library events');
				return $response;
			}
	
			# Load user library events modal
			$this->load->model('library_event_model', 'library1');
			
			$lastId = $this->library1->createNewLibraryEvent($payload['userId'], $payload['eventDataId'], $payload['eventPrice'], $payload['eventTitle'], $payload['startDate'], $payload['endDate'], $payload['fullDay']);
            
			# Load page model
			$this->load->model('page');
			$dataDetail = $this->page->get_by_id($payload['eventDataId']);
			
			$categoryId = $dataDetail->{Page::_CATEGORY_ID};
			$dataType = $this->page->get_category($categoryId);			
			# Now since the new event is added, we will add data type to the event
			
			$this->library1->updateLibraryDataType($lastId, $dataType);			
			
			if($lastId)
			{
				$result = $this->library1->getLibraryEventById($lastId);
				
				$response = array('flag'=>1, 'message'=>'Library Event Saved Successfully', 'lastId'=>$lastId);
				return $response;
			}
			
			$response = array('flag'=>0, 'message'=>'Unable to create library event');
		}
		
		return $response;
	}
	
	private function updateUserCalendarEvents($payload)
	{
		$response = array();
		
		$flag = false;
		
		if($payload)
		{
			# Load user library events modal
			$this->load->model('library_event_model', 'library1');
			
			$flag = $this->library1->updateLibraryEvent($payload['eventId'], $payload['eventTitle'], $payload['startDate'], $payload['endDate'], $payload['fullDay']);

			if($flag)
			{				
				$response = array('flag'=>1, 'message'=>'Library Event Saved Successfully');
			}
			else 
			{
				$response = array('flag'=>0, 'message'=>'Unable to save library event');
			}
		}
		
		return $response;
	}
	
	private function updateUserCalendarComments($payload)
	{
		$response = array();
		
		$flag = false;
		
		if($payload)
		{
			# Load user library events modal
			$this->load->model('library_event_model', 'library1');
			
			$flag = $this->library1->updateLibraryEventComment($payload['eventId'], $payload['comment']);
			
			if($flag)
			{
				$response = array('flag'=>1, 'message'=>'Library Event Comment updated Successfully');
			}
			else
			{
				$response = array('flag'=>0, 'message'=>'Unable to update comment for library event');
			}
		}
		
		return $response;
	}
	
	private function removeUserCalendarEvent($payload)
	{
		$response = array();
		
		$flag = false;
		
		if($payload)
		{
		# Load user library events modal
		$this->load->model('library_event_model', 'library1');
		
		$flag = $this->library1->removeCalendarEvent($payload['eventId']);
		
		if($flag)
		{
			$response = array('flag'=>1, 'message'=>'Library Event deleted Successfully');
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Unable to delete library event');
			}
		}
		
		return $response;
	}
	
	private function getUserCalendarEvents($payload)
	{
		if($this->session->userdata('id'))
		{
			# Load user library events modal
			$this->load->model('library_event_model', 'library1');
			
			$userId = $this->session->userdata('id');
			
			$result = $this->library1->getLibraryEventsByUserId($userId);
									
			$response = array('flag'=>1, 'result'=>$result);
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please login first');
		}
		return $response;
	}

	public function getSubmodility($payload)
	{
		$response = array();
	
		$this->load->model('page_submodility','submodility');
	
		$response = $this->submodility->get_submodility_by_page_id($payload['pageId']);
	
		return $response;
	}
	
	
	public function addCommentToCalendarEvents($payload)
	{
		if($payload)
		{
			# Load library event comment model
			
			$this->load->model('library_event_comment_model','comment');
			
			$eventId = $payload['eventId'];
			$comment = $payload['comment'];
			$price = $payload['price'];
			$location = $payload['location'];
			$address = $payload['address'];
			$lat = $payload['lat'];
			$lng = $payload['lng'];
			$fromAccount = $payload['paymentFrom'];
			$deliveryMethod = $payload['deliveryMethod'];
			$escrowReleased = $payload['paymentWhen'];
			$dateTime = $payload['dateTime'];
			$escrowType = $payload['escrowType'];
			$escrowLimit = $payload['escrowLimit'];
			
			$date = '';
			if(!empty($payload['dateTime']))
			{
                $date =  new DateTime($dateTime);
                $date = $date->format("Y-m-d H:i:s");			
			}
			
			if(empty($eventId) || empty($comment) || empty($location) || empty($address) || empty($lat) || empty($lng) || empty($price) || empty($escrowType) || empty($escrowLimit))
			{
				$response = array('flag'=>0, 'message'=>'Please provide comment, location, address, lat, lng, price and escrow type and escrow limit');
				return $response;
			}
						
			$response = $this->comment->createNewLibraryEventComment($eventId, $comment, $price, $location, $address, $lat, $lng, $fromAccount, $deliveryMethod, $escrowReleased, $date, $escrowType, $escrowLimit);
			
			if($response) $response = array('flag'=>1, 'message'=>'New comment added to event');
			else $response = array('flag'=>0, 'message'=>'Unable to add comment to event');
			
			return $response;
		}
	}
	
	public function getEventData($payload)
	{
	    $response = array();
	    
	    if(empty($payload['eventId']))
	    {
	        $response = array('flag'=>0, 'message'=>'Please provide event id');
	        return $response;
	    }
	    
	    return $response;
	}
	
	public function get_task_by_id($payload)
	{
		if($payload['id'])
		{
			$this->load->model('tasks_goals', 'tg');

			$result = $this->tg->get_task_by_id($payload['id']);
			
			$response = array('flag'=>1, 'result'=> $result);
			
			return $response;
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please select a goal first');
		}
	}
	
	
	public function get_goal_by_id($payload)
	{
		if($payload['id'])
		{
			$this->load->model('tasks_goals', 'tg');
			
			$result = $this->tg->get_goal_by_id($payload['id']);
			
			$response = array('flag'=>1, 'result'=> $result);
			
			return $response;
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please select a goal first');
		}
	}
	
	
	public function get_satan_users($payload)
	{
		$response = array();
		if($payload['term'])
		{
			# Now since we have the term ready, now lets query the user table to get data based on the search term
			# Load user model
			
			$this->load->model('user');
			$result = $this->user->search_user($payload['term']);
			
			$response = array('flag'=>1, 'result'=>$result);
		}
		else
		{
			$response = array('flag'=>0, 'message'=>'Please enter some value first');
		}
		
		return $response;	
	}
	
	
	public function library_search($payload)
	{
		$response = array();
		
		$search = '';
		if(isset($payload['search']))
		{
			$search = $payload['search'];
		}
					
		$categories = isset($payload['categories']) ? implode(',', $payload['categories']) : '';
		$tags = isset($payload['tags']) ? $payload['tags'] : '';
		
		# Load user model
		$this->load->model('user');
		$membeshipLevel = 1;
		if($this->session->userdata('id'))
		{
			$userObj = $this->user->getUserProfile($this->session->userdata('id'));
			$membeshipLevel = $userObj->{User::_USER_MEMBERSHIP_LEVEL};
		}
	
		# Load Results From Products Based On Search
		$this->load->model('page');
		$result = $this->page->search_data($membeshipLevel, $search, $categories, $tags);
		
		if($result)$response = array('flag'=>1, 'result'=>$result);
		else $response = array('flag'=>0, 'message'=>'No Result Found');
		
		
		return $response;
	}
	
	public function like_page_data($payload)
	{
		$response = array();
		
		if($payload['id'])
		{
			$pageId = $payload['id'];
			$userId = $this->session->userdata('id');
			
			# Load page like unlike model
			$this->load->model('page_like_dislike_model', 'pld');
			
			# First step is to check if we have already liked the page
			$result = $this->pld->get_data($pageId, $userId);
			
			if($result)
			{
				if($result->{Page_like_dislike_model::_PAGE_LIKE}){
					$response = array('flag'=>0, 'message'=>'You have already liked this data');
					return $response;
				}
			}
						
			$result = $this->pld->like_data($pageId, $userId);
			$result = $this->pld->get_count_like_dislike($pageId);
			
			if($result) $response = array('flag'=>1, 'message'=>'You have liked this data','likecount'=>$result->likecount, 'dislikecount'=>$result->dislikecount);
			else $response = array('flag'=>1, 'message'=>'Error occured while liking');
			
		}
		else
		{
			$response = array('flag'=>1, 'message'=>'Unable to like data');
		}
			
		return $response;
	}
	
	public function unlike_page_data($payload)
	{
		$response = array();
		
		if($payload['id'])
		{
			$pageId = $payload['id'];
			$userId = $this->session->userdata('id');
				
			# Load page like unlike model
			$this->load->model('page_like_dislike_model', 'pld');
				
			# First step is to check if we have already liked the page
			$result = $this->pld->get_data($pageId, $userId);
			
			if($result)
			{
				if($result->{Page_like_dislike_model::_PAGE_DISLIKE}){
					$response = array('flag'=>0, 'message'=>'You have already disliked this data');
					return $response;
				}
			}
		
			$result = $this->pld->dislike_data($pageId, $userId);
			$result = $this->pld->get_count_like_dislike($pageId);
			
			if($result) $response = array('flag'=>1, 'message'=>'You have disliked this data', 'likecount'=>$result->likecount, 'dislikecount'=>$result->dislikecount);
			else $response = array('flag'=>1, 'message'=>'Error occured while disliking');
		
		}
		else
		{
			$response = array('flag'=>1, 'message'=>'Unable to like data');
		}
					
		return $response;
		
	}
	
	public function love_it_page_data($payload)
	{
		$response = array();
		
		if($payload['id'])
		{
			$pageId = $payload['id'];
			$userId = $this->session->userdata('id');
			
			# Load page like unlike model
			$this->load->model('page_like_dislike_model', 'pld');
			
			# First step is to check if we have already liked the page
			$result = $this->pld->get_data($pageId, $userId);
			
			if($result)
			{
				if($result->{Page_like_dislike_model::_PAGE_LOVE_IT}){
					$response = array('flag'=>0, 'message'=>'You have already loved this data');
					return $response;
				}
			}
			
			$result = $this->pld->love_data($pageId, $userId);
			$result = $this->pld->get_count_like_dislike($pageId);
			
			if($result) $response = array('flag'=>1, 'message'=>'You have loved this data', 'lovecount'=>$result->loveitcount, 'hatecount'=>$result->hateitcount);
			else $response = array('flag'=>1, 'message'=>'Error occured while loving it');
			
		}
		else
		{
			$response = array('flag'=>1, 'message'=>'Unable to like data');
		}
		
		return $response;
		
	}
	
	public function hate_it_page_data($payload)
	{
		$response = array();
		
		if($payload['id'])
		{
			$pageId = $payload['id'];
			$userId = $this->session->userdata('id');
			
			# Load page like unlike model
			$this->load->model('page_like_dislike_model', 'pld');
			
			# First step is to check if we have already liked the page
			$result = $this->pld->get_data($pageId, $userId);
			
			if($result)
			{
				if($result->{Page_like_dislike_model::_PAGE_HATE_IT}){
					$response = array('flag'=>0, 'message'=>'You have already hated this data');
					return $response;
				}
			}
			
			$result = $this->pld->hate_data($pageId, $userId);
			$result = $this->pld->get_count_like_dislike($pageId);
			
// 			print_r($result);
			
			if($result) $response = array('flag'=>1, 'message'=>'You have hated this data', 'lovecount'=>$result->loveitcount, 'hatecount'=>$result->hateitcount);
			else $response = array('flag'=>1, 'message'=>'Error occured while hating');
			
		}
		else
		{
			$response = array('flag'=>1, 'message'=>'Unable to like data');
		}
		
		return $response;
		
	}
	
	public function post_comment($payload)
	{
		$response = array();
		
		if($payload['comment'])
		{
			$pageId = $payload['id'];
			$parentId = $payload['parent_id'];
			$userId = $this->session->userdata('id');
			$comment = $payload['comment'];
			
			# Load page comment model
			$this->load->model('page_comment_model', 'pcm');
			
			# Insert new comment to the table
			$result = $this->pcm->create_new_comment($pageId, $userId, $comment, $parentId);//echo $this->db->last_query();
			
			if($result) 
			{
				# Since a new comment has been posted so now its time to get comment show on the front end
				
				$comment = $this->pcm->get_page_comment_by_id($result);//echo $this->db->last_query();
				$response = array('flag'=>1, 'message'=>'Comment posted successfully', 'comment'=>(array)$comment);
			}
			else $response = array('flag'=>1, 'message'=>'Error occured while commenting');
			
		}
		
		return $response;
	}
	
	public function post_reply_to_comment()
	{
		
	}
	
	
	public function upload_attachments_via_dropzone()
	{
		$response = array();
		
		# We will check for the files 
		if(isset($_FILES['file']['name']))
		{
			$upload_exts = explode(".", $_FILES["file"]["name"]);
						
			# Generate Timestamp name for image name and upload
			$imageName = md5($_FILES["file"]["name"].microtime()).'.'.end($upload_exts);
				
			if(move_uploaded_file($_FILES["file"]["tmp_name"], Template::_PUBLIC_DOCUMENT_DIR.$imageName))
			{
				$response = array('flag'=>1, 'result'=>$imageName);
			}
			else
			{
				$response = array('flag'=>0, 'message'=>'Unable to upload');
			}
			
		}
		else
		{
			$response = array('flag'=>0, 'result'=>'No file given');
		}
		
		
		echo json_encode($response); 
	}
	
	public function upload_data_documents()
	{
		$response = array();
		
		# We will check for the files
		if(isset($_FILES['file']['name']))
		{
			$upload_exts = explode(".", $_FILES["file"]["name"]);
			
				# Generate Timestamp name for image name and upload
			$imageName = md5($_FILES["file"]["name"].microtime()).'.'.end($upload_exts);
			
			if(move_uploaded_file($_FILES["file"]["tmp_name"], Template::_PUBLIC_DATA_DOCUMENT_DIR.$imageName))
			{
				$response = array('flag'=>1, 'result'=>$imageName);
			}
			else
			{
				$response = array('flag'=>0, 'message'=>'Unable to upload');
			}
			
		}
		else
		{
			$response = array('flag'=>0, 'result'=>'No file given');
		}
		
		echo json_encode($response);
	}
	
	public function remove_data_documents()
	{
		$response = array();
		
		$fileName = $this->input->post('filename');
		
		if(file_exists(Template::_PUBLIC_DATA_DOCUMENT_DIR.$fileName))
		{
			echo "Exists";
			echo  unlink(Template::_PUBLIC_DATA_DOCUMENT_DIR.$fileName) ? "Removed": "Not Removed";
		}
		else 
		{
			echo "Not Exists";
		}
		
		return $response;
	}
	
	
	public function accquire_priceless_data($payload)
	{
	    $response = array();
	    
	    if($payload['item-number'])
	    {
	        # Load Page Model
	        $this->load->model('page');
	        $result = $this->page->get_by_id($payload['item-number']);
	        
	        # Check if data is already accquired
	        
	        # Load pss purchase history model
	        $this->load->model('psss_purchase_history', 'pss');
	        
	        $condition = array(Psss_purchase_history::_ITEM_ID=> $payload['item-number'], Psss_purchase_history::_USER_ID => $this->session->userdata('id'));
	        $output = $this->pss->check_if_pss_available($condition);
	        
	        if(!empty($output))
	        {
	            $response = array('flag'=>0, 'message'=>'This data is alreay accquired by you');
	            return $response;
	        }
	        
	        $this->load->model('psss_purchase_history','psss');
	        
	        $result = $this->psss->create_purchase_history('PRICELESS', $this->session->userdata('id'), $payload['item-number'], $result->{Page::_PAGE_TITLE}, $result->{Page::_CATEGORY_ID}, 0, 'EUR', $this->session->userdata('email'));
	    }
	    
	    if($result) $response = array('flag'=>1, 'message'=>'Priceless data accquiring successfull');
	    else $response = array('flag'=>0, 'message'=>'OOPS ! Unable to accquire priceless data');
	    
	    return $response;
	}
	
	
	public function check_if_alreay_rss_subscribed($payload)
	{
	    $response = array();
	    
	    if($payload['item-number'])
	    {
	       # Load Page Model
	        $this->load->model('rss_feed_subscription_model', 'feed');
	        
	        $userId = $this->session->userdata('id');
	        
	        $condition = array(Rss_feed_subscription_model::_ITEM_ID => $payload['item-number'], Rss_feed_subscription_model::_USER_ID => $userId);
	        $result = $this->feed->check_if_rss_feed_available($condition);
	                               
            if(!empty($result))
            {
                $response = array('flag'=>0, 'message'=>'RSS feed to communication already done');
                return $response;
            }            
	    }
	    
	    return $response;
	}
	
	public function validateCouponCode($payload)
	{
	    $response = array();
	    
	    # Load Coupon Model
	    $this->load->model('admin/coupon_model','coupon');
	    
	    $count = $this->coupon->validate_coupon_code($payload['coupon']);
	    
	    if(count($count) > 0) $response = array('flag'=>1,'message'=>"Coupon Applied Successfully");
	    else $response = array('flag'=>0,'message'=>'Invalid Coupon Code');
	    
	    return $response;
	}
	
	public function inviteNewUserToJoin($payload)
	{
	    $flag = false;
	    
	    $response = array();
	    
	    # First step is to validate the coupon and check if invited user is already registered
	    
	    # Validate the user
	    $this->load->model('user');
	    
	    if($this->user->getByEmail($payload['email']))
	    {
	        $response = array('flag'=>0,'message'=>"Unable to send invitation as user is already registered");	        
	        return $response;
	    }
	    
		if($payload['coupon'] != "")
		{
			# Load Coupon Model
			$this->load->model('admin/coupon_model','coupon');
    
			$count = $this->coupon->validate_coupon_code($payload['coupon']);

			if(count($count) == 0) {
			    $response = array('flag'=>0,'message'=>'Invalid Coupon Code');
			    return $response;
			}
            
			# Next step is to insert data in user invite table and generate a invitation link
			
			$this->load->model('user_invite','invite');
			
			$lastId = $this->invite->create_new_user_invite($this->session->userdata('id'), $payload['email'], $payload['coupon'], 2);;
			
			# Get invitation hash by last id
			
			$data['email'] = $payload['email'];
			$data['invitationHash'] = $this->invite->get_hash_by_id($lastId);
			$data['couponCode'] = $payload['coupon'];
			
			# Load View
			
			$body = $this->load->view('email_templates/invite_new_user', $data, TRUE);
			
			# Next is to send an email to the user
			
			$flag = $this->email_engine->send_invitation_to_join($payload['email'], $body);
			
			if($flag) $response = array('flag'=>1,'message'=>"Invitation sent successfully");
			else $response = array('flag'=>0,'message'=>'Unable to send invitation, Please try again later');
			
			return $response;
			
		}
        
        
        
        
	} 
	
	
	private function validateDataSubscribed($payload)
	{
	    $response = array();
	    
	    # check if user is alreay logged in
	    
	    if(!$this->session->userdata('id'))
	    {
	        $response = array('flag'=>0, 'message'=>'Please login first');
	        return $response;
	    }
	    
	    # Load rss subscription feed model
	    $this->load->model('rss_feed_subscription_model', 'rss');
	    
	    $condition = Rss_feed_subscription_model::_USER_ID . ' = '. $this->session->userdata('id') . ' AND '. Rss_feed_subscription_model::_ITEM_ID .' = ' . $payload['data-id'];
	    $result = $this->rss->check_if_rss_feed_available($condition);
	    
	    if($result) $response = array('flag'=>1);
	    else $response = array('flag'=>0);     
	    
	    
	    return $response;
	}
	
	private function validateEscrowCountry($payload)
	{
	    $response = array();
	    
// 	    if(empty($payload['escrow_id']) || empty($payload['comment_id']))
// 	    {
// 	       $response = array('flag'=>0, 'message'=>'Please provide escorw id or comment id first'); 
// 	       return $response; 
// 	    }
	    
	    if(isset($payload['comment_id']))
	    {
	        # Load user library event comment model
	        $this->load->model('library_event_comment_model', 'comment_model');
	        $commentData = $this->comment_model->get_by_id($payload['comment_id']);
	        
	        $eventId = $commentData->{Library_event_comment_model::_EVENT_ID};
	    }
	    else 
	    {
	        # Load user library event escrow model
	        $this->load->model('user_library_event_escrow_model','escrow_model');
	        $escrowDetail = $this->escrow_model->get_by_id($payload['escrow_id']);
	        
	        $eventId = $escrowDetail[0]->event_id;
	    }
	    	    	    
	    # With the escrow id, let's get the event id or comment id to get data id and based on data id we can get 2nd and 3rd country restrication
	    	    
	    
	    # Load user library events
	    $this->load->model('Library_event_model', 'library_event');
	    $eventDetail = $this->library_event->getLibraryEventById($eventId);
	    
	    $dataId = $eventDetail->event_data_id;
	    
	    # Load page model
	    $this->load->model('page');
	    $pageData = $this->page->get_by_id($dataId);
	       
	    
	    # Let's get user registered country
	    $userId = $this->session->userdata('id');
	    
	    # Load user model to get user details
	    $this->load->model('user');
	    $userDetail = $this->user->getUserProfile($userId);
	    
	    $userCountry = $userDetail->{User::_COUNTRY};
	    
	    # Load country model
	    $this->load->model('country');
	    $this->load->model('country_group_model', 'group');
	    
	    # Now let's check
	    
	    if(!empty($pageData->{Page::_COUNTRY_ALLOWED_IN})){
	        $countryAllowedIn = explode(',', $pageData->{Page::_COUNTRY_ALLOWED_IN});
	        
	        # Now Loop Through the data to check if country allowed in contains some 
	        
	        foreach ($countryAllowedIn as $c)
	        {
	            $country = $this->country->get_by_id($c);
// 	            
	            if($country->{Country::_IS_GROUP})
	            {
	                $countryGroup = $this->group->get_group_countries($country->{Country::_ID});
	                
	                $countryGroupArr = explode(',', $countryGroup->{Country_group_model::_COUNTRY_ID});
	                
	                foreach ($countryGroupArr as $g)
	                {
	                    array_push($countryAllowedIn, $g);
	                }
	            
	            }
	        }
	              
	        
	        if(in_array($userCountry, $countryAllowedIn))
	        {
	            $response = array('bflag'=>0, 'message'=>'Data physically available in these countries, but might contain some restrictions, please consult your lawyer and or doctor before acquiring it.');
	            return $response;
	        }
	    }
	    
	    if(!empty($pageData->{Page::_COUNTRY_LEGAL_IN})){
	        $countryLegalIn = explode(',', $pageData->{Page::_COUNTRY_LEGAL_IN});
	        
	        
	        foreach ($countryLegalIn as $c)
	        {
	            $country = $this->country->get_by_id($c);
	            //
	            if($country->{Country::_IS_GROUP})
	            {
	                $countryGroup = $this->group->get_group_countries($country->{Country::_ID});
	                
	                $countryGroupArr = explode(',', $countryGroup->{Country_group_model::_COUNTRY_ID});
	                
	                foreach ($countryGroupArr as $g)
	                {
	                    array_push($countryLegalIn, $g);
	                }
	                
	            }
	        }
	        
	        if(!in_array($userCountry, $countryLegalIn))
	        {
	            $response = array('flag'=>0, 'message'=>'Product or service is not legal to acquire in your registered country, please check in which countries it is legal or perhaps try it with hypnosis or just talking about it');
	            return $response;
	        }
	    }
	    
	    
	    return $response;
	}
	
	
	private function validateEscrowLimit($payload)
	{
	    $response = array();
	    
	    if(empty($payload['escrow_limit']))
	    {
	        $response = array('flag'=>0, 'message'=>'Please provide escrow limit first');
	        return $response;
	    }
	    $count = $payload['escrow_limit'];
	    $userId = $this->session->userdata('id');
	    
        $membershipLevel = $this->session->userdata('membershipLevel');	   
	    
        # Predifined Settings, Allowed escrow quota for memberA => 100, memberB => 1000, memberC and above unlimited
        
        if($membershipLevel == 4){
            if($count < 100) return true;
            $response = array('flag'=>0, 'message'=>'You can\'t create more than 100 escorw');
            return $response;
        }
        elseif($membershipLevel == 5){
            if($count < 1000) return true;
            $response = array('flag'=>0, 'message'=>'You can\'t create more than 100 escorw');
            return $response;            
        }
        else{
            return true;
        }
        
        
	    
	    
	}
	
}
