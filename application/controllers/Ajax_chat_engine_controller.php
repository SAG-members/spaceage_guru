<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_chat_engine_controller extends Application 
{

	const AJAX_GET_CHAT_UPDATES = 1000;
	const AJAX_SEND_NEW_MESSAGE = 1001;
	const AJAX_GET_PAGINATED_MESSAGES = 1002;
	const AJAX_SET_MESSAGE_AS_READ = 1003;
	
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->isLoggedIn()) { $this->redirectToLogin();}
		
		# Since we will use chat model throught out this class, let's load message model
		$this->load->model('chat_model', 'chat');
		$this->load->model('user');
		
	}
	
	public function index()
	{
		$response = '';
		$request = $this->input->post('acid');
		$payload = json_decode($this->input->post('payload'), true);
		
		switch ($request)
		{
			case static::AJAX_GET_CHAT_UPDATES : $response = $this->get_chat_updates($payload); break;
			case static::AJAX_SEND_NEW_MESSAGE : $response = $this->send_new_message($payload); break;
			case static::AJAX_GET_PAGINATED_MESSAGES : $response = $this->get_paginated_messages($payload); break;
			case static::AJAX_SET_MESSAGE_AS_READ : $response = $this->set_message_as_read($payload); break;
		}		
		echo json_encode($response);
	}
	
	private function get_chat_updates($payload)
	{
		$response = array();
		
		$newMessage = false;
		$loggedInUser = $this->session->userdata('id');
		$lastSeenObj  = $this->chat->get_last_activity_id($loggedInUser); 
		$recentMessageExists = $this->chat->get_recent_message($loggedInUser, $lastSeenObj->{Chat_model::_ID});
		
		if($recentMessageExists){ $newMessage = true; }
		
		if ($newMessage) 
		{
			$newMessages = $this->chat->get_unread_messages($loggedInUser);
			$chats = array();
			$senders = array();
			foreach ($newMessages as $message) 
			{
				if(!isset($senders[$message->{Chat_model::_FROM_USER}]))
				{
					$senders[$message->{Chat_model::_FROM_USER}]['count'] = 1;
				}
				else
				{
					$senders[$message->{Chat_model::_FROM_USER}]['count'] += 1;
				}
				
				$loggedInUserObj = $this->user->getUserProfile($message->{Chat_model::_FROM_USER});
				
				$chat = array(
						'chat_id' 	=> $message->{Chat_model::_ID},
						'from_user' => $message->{Chat_model::_FROM_USER},
						'to_user' => $message->{Chat_model::_TO_USER},
						'avatar' 	=> $loggedInUserObj->{User::_AVATAR_IMAGE} != '' ? $loggedInUserObj->{User::_AVATAR_IMAGE} : 'no_image.png',
						'body' => $message->{Chat_model::_MESSAGE},
						'time' 		=> date("M j, Y, g:i a", strtotime($message->{Chat_model::_DATE_CREATED})),
						'type'=>$message->{Chat_model::_FROM_USER} == $loggedInUser ? 'send' : 'receive',
						'name'=>$message->{Chat_model::_FROM_USER} == $loggedInUser ? 'You' : $loggedInUserObj->{User::_F_NAME} ? $loggedInUserObj->{User::_F_NAME} : $loggedInUserObj->{User::_AVATAR_NAME} ? $loggedInUserObj->{User::_AVATAR_NAME} : $loggedInUserObj->{User::_USERNAME},  
				);
				array_push($chats, $chat);
			}
		
			$groups = array();
			
			foreach ($senders as $key=>$sender) 
			{
				$sender = array('user'=> $key, 'count'=>$sender['count']);
				array_push($groups, $sender);
			}
					
			$response = array( 'flag' => 1, 'chats' => $chats, 'senders' =>$groups);
		
		}		
		return $response;
	}
	
	private function send_new_message($payload)
	{
		$response = array();
			
		$loggedInUser = $this->session->userdata('id');
		$messageToUser = $payload['message_to_user'];
		$message 	= $payload['message'];
		
		if(!empty($message) && !empty($messageToUser))
		{
			# First step is to save the message to database
			
			$date = new DateTime();
			$date = $date->format('Y-m-d H:i:s');
			
			$data = array(
				Chat_model::_FROM_USER => $loggedInUser,
				Chat_model::_TO_USER => $messageToUser,
				Chat_model::_MESSAGE => $message,
				Chat_model::_IS_READ => 0,
				Chat_model::_DATE_CREATED => $date
			);
			
			$lastId = $this->chat->insert($data);
			
			# Next step is to get message data and start to prepare response
			$message = $this->chat->get_by_id($lastId);
			
			$loggedInUserObj = $this->user->getUserProfile($message->{Chat_model::_FROM_USER});	
			
			$chat = array(
				'chat_id'=>$message->{Chat_model::_ID},
				'from_user'=>$message->{Chat_model::_FROM_USER},
				'to_user'=>$message->{Chat_model::_TO_USER},
				'avatar' 	=> $loggedInUserObj->{User::_AVATAR_IMAGE} != '' ? $loggedInUserObj->{User::_AVATAR_IMAGE} : 'no_image.png',
				'body' => $message->{Chat_model::_MESSAGE},
				'time' 		=> date("M j, Y, g:i a", strtotime($message->{Chat_model::_DATE_CREATED})),
				'type'=>$message->{Chat_model::_FROM_USER} == $loggedInUser ? 'send' : 'receive',
				'name'=>$message->{Chat_model::_FROM_USER} == $loggedInUser ? 'You' : $loggedInUserObj->{User::_F_NAME} ? $loggedInUserObj->{User::_F_NAME} : $loggedInUserObj->{User::_AVATAR_NAME} ? $loggedInUserObj->{User::_AVATAR_NAME} : $loggedInUserObj->{User::_USERNAME},  
			);
			
			
			# Next step is to create response
			
			$response = array( 'flag' => 1, 'chats' => $chat );
		}
		else
		{
			$response = array('flag' => 0, 'message' => 'Empty fields exists');
		}
		
		return $response;
	}
	 
	private function get_paginated_messages($payload)
	{
		$response = array();
		
		# get paginated messages
		$limit = 5;
		$loggedInUser = $this->session->userdata('id');
		$messageToUser = $payload['message_to_user'];
		$limit 	= isset($_POST['limit']) ? $this->input->post('limit') : $limit ;
		
		$messages 	= array_reverse($this->chat->get_chat_history($loggedInUser, $messageToUser, $limit = 5));
		$total 		= $this->chat->get_count($loggedInUser, $messageToUser);
		
		$chats = array();
		foreach ($messages as $message) 
		{
			$loggedInUserObj = $this->user->getUserProfile($message->{Chat_model::_FROM_USER});
			
			$chat = array(
					'chat_id' 	=> $message->{Chat_model::_ID},
					'from_user' => $message->{Chat_model::_FROM_USER},
					'to_user'   => $message->{Chat_model::_TO_USER},
					'avatar' 	=> $loggedInUserObj->{User::_AVATAR_IMAGE} != '' ? $loggedInUserObj->{User::_AVATAR_IMAGE} : 'no_image.png',
					'body' 		=> $message->{Chat_model::_MESSAGE},
					'time' 		=> date("M j, Y, g:i a", strtotime($message->{Chat_model::_DATE_CREATED})),
					'type'		=> $message->{Chat_model::_FROM_USER} == $loggedInUser ? 'send' : 'receive',
					'name'		=> $message->{Chat_model::_FROM_USER} == $loggedInUser ? 'You' : ucwords($loggedInUserObj->{User::_F_NAME})
			);
			
			array_push($chats, $chat);
		}
						
		$response = array( 'flag' => 1, 'errors'  => '', 'message' => '', 'chats'  => $chats);
		
		
		return $response;
	}
	
	private function set_message_as_read($payload)
	{
		$response = array();
		
		$this->chat->set_message_read_status($payload['chat_id']);
		
		return $response;
	}
	
	
}
