<?php

class User_event_status_model extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'user_events_status';
	const _ID = 'id';
	const _EVENT_ID = 'event_id';
	const _USER_ID = 'user_id';
	const _STATUS = 'status';
	const _DATE_CREATED = 'date_created';
	
	const STATUS_DECLINE = 1;
	const STATUS_YIELD = 2;
	const STATUS_RECOMMEND = 3;
	
	public function __construct()
	{
		parent::__construct();		
	}
    
	public function register_event_status($eventId, $userId, $status)
	{
	    $data = array(
	        static::_EVENT_ID => $eventId, 
	        static::_USER_ID => $userId,
	        static::_STATUS => $status
	    );
	    
	    $this->db->insert(static::_TABLE, $data);
	    return $this->db->insert_id();
	}
	
	public function get_by_id($eventId, $userId)
	{
	    $this->db->from(STATIC::_TABLE);
	    $this->db->where(static::_EVENT_ID, $eventId);
	    $this->db->where(static::_USER_ID, $userId);
	    return $this->db->get()->num_rows();
	}
	
}