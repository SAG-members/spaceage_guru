<?php

class Library_event_model extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'user_library_events';
	const _ID = 'id';
	const _USER_ID = 'user_id';
	const _EVENT_DATA_ID = 'event_data_id';
	const _EVENT_DATA_PRICE = 'event_data_price';
	const _EVENT_TITLE = 'title';
	const _START_DATE = 'start';
	const _END_DATE = 'end';
	const _FULL_DAY = 'full_day';
	const _COMMENT = 'comment';
	const _EVENT_DATA_TYPE = 'event_data_type';
	const _DATE_CREATED = 'date_created';
	const _DATE_MODIFIED = 'date_modified';
	
	
	public function __construct()
	{
		parent::__construct();
	}
		
	public function createNewLibraryEvent($userId, $eventDataId, $eventDataPrice, $eventTitle, $startDate, $endDate, $fullDay)
	{
		$date = new DateTime();
		$date = $date->format('Y-m-d H:i:s');
		
		$data = array(
			static::_USER_ID=>$userId,
			static::_EVENT_DATA_ID=>$eventDataId,
			static::_EVENT_DATA_PRICE=>$eventDataPrice,
			static::_EVENT_TITLE=>$eventTitle,
			static::_START_DATE=>$startDate,
			static::_END_DATE=>$endDate,
			static::_FULL_DAY=>$fullDay,
			static::_DATE_CREATED=>$date
		);
			
		$this->db->insert(static::_TABLE, $data);
			
		$response = $this->db->insert_id();
				
		return $response;
			
	}
	
	public function updateLibraryDataType($eventId, $dataType)
	{
	    $data = array(
	       static::_EVENT_DATA_TYPE => $dataType
	    );
	    
	    $this->db->where(static::_ID, $eventId);
	    return $this->db->update(static::_TABLE, $data);	    
	}
	
	public function updateLibraryEvent($eventId, $eventTitle, $startDate, $endDate, $fullDay)
	{
		$flag = false;
		
		$date = new DateTime();
		$date = $date->format('Y-m-d H:i:s');
		
		$data = array(
				static::_EVENT_TITLE=>$eventTitle,
				static::_START_DATE=>$startDate,
				static::_END_DATE=>$endDate,
				static::_FULL_DAY=>$fullDay,
				static::_DATE_MODIFIED=>$date
		);

		$this->db->where(static::_ID, $eventId);
		$flag = $this->db->update(static::_TABLE, $data);
				
		return $flag;
	}
	
	public function removeCalendarEvent($eventId)
	{
		$flag = false;
				
		$this->db->where(static::_ID, $eventId);
		$flag = $this->db->delete(static::_TABLE);
		
		return $flag;
		
	}
	
	public function getLibraryEventById($id)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_ID,$id);
		$response = $this->db->get()->row();
		
		
		return $response;
	}
	
	
	public function getLibraryEventsByUserId($userId)
	{
		$response = array();
		
		$this->db->select('id, title, start, end, event_data_id, event_data_price, full_day, event_data_type');
		$this->db->from(static::_TABLE);
		$this->db->where(static::_USER_ID,$userId);
		$response = $this->db->get()->result();
		
		
		return $response;
	}
	
	
	public function delete_event($id)
	{
	    # Now we have the id so let's delete the escrow
	    $this->db->where(static::_ID, $id);
	    $this->db->delete(static::_TABLE);
	    
	    return $this->db->affected_rows();
	}
}