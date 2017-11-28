<?php

class Chat_model extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'messages';
	const _ID = 'id';
	const _FROM_USER = 'from_user';
	const _TO_USER = 'to_user';
	const _MESSAGE = 'message';
	const _IS_READ = 'is_read';
	const _DATE_CREATED = 'date_created';
		
	public function __construct()
	{
		parent::__construct();
	}
	
	public function insert($data)
	{
		$this->db->insert(static::_TABLE, $data);
		return $this->db->insert_id();
	}
	
	public function get_by_id($id)
	{
		$this->db->from(static::_TABLE);
		$this->db->where(static::_ID, $id);
		
		return $this->db->get()->row();
	}

	
	public function get_chat_history($user, $message_to_user, $limit = 5, $offset = 0)
	{
		$response = array();
		
		$this->db->where(static::_FROM_USER, $user);
		$this->db->where(static::_TO_USER, $message_to_user);
		$this->db->or_where(static::_FROM_USER, $message_to_user);
		$this->db->where(static::_TO_USER, $user);
		$this->db->order_by(static::_ID, 'desc');
		$response = $this->db->get(static::_TABLE, $limit, $offset);
	
// 		$this->db->where('to', $user)->where('from',$chatbuddy)->update('messages', array('is_read'=>'1'));
		
		return $response->result();
	}
	
	public function get_count($user, $message_to_user)
	{
		$response = array();
		
		$this->db->where(static::_FROM_USER, $user);
		$this->db->where(static::_TO_USER, $message_to_user);
		$this->db->or_where(static::_FROM_USER , $message_to_user);
		$this->db->where(static::_TO_USER, $user);
		$this->db->order_by(static::_ID, 'desc');
		
		$response = $this->db->count_all_results(static::_TABLE);
		
		return $response;
	}
	
	public function get_recent_message($user, $lastActive)
	{
		$response = array();
		
		$response  =  $this->db->where(static::_TO_USER, $user)->where(static::_ID .' = ', $lastActive)->order_by(static::_DATE_CREATED, 'desc')->get(static::_TABLE, 1);
		
		if($response->num_rows() > 0){ return true; }
		else{ return false; }
	}
	
	public function get_unread_messages($user)
	{
		$response = array();
		
		$response  =  $this->db->where(static::_TO_USER, $user)->where(static::_IS_READ, '0')->order_by(static::_DATE_CREATED, 'asc')->get(static::_TABLE);
		
		return $response->result();
	}
	
	public function get_last_activity_id($user)
	{
		$response = array();
		
		$response = $this->db->where(static::_TO_USER, $user)->order_by(static::_DATE_CREATED, 'desc')->get(static::_TABLE, 1)->row();
			
		return $response;
	}
	
	public function set_message_read_status($chatId)
	{
		$response = array();
		
		$this->db->where(static::_ID, $chatId)->update(static::_TABLE, array(static::_IS_READ=>'1'));
		
		return $response = $this->db->affected_rows();
		
	}
	
}