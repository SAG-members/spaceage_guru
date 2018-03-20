<?php

class Library_event_comment_model extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'user_library_event_comment';
	const _ID = 'id';
	const _EVENT_ID = 'event_id';
	const _COMMENT = 'comment';
	const _PRICE = 'price';
	const _LOCATION = 'location';
	const _ADDRESS = 'address';
	const _LAT = 'lat';
	const _LNG = 'lng';
	const _FROM_ACCOUNT = 'from_account';
	const _DELIVERY_METHOD = 'delivery_method';
	const _ESCROW_RELEASED = 'escrow_released';
	const _DATE_TIME = 'date_time';
	const _DATE_CREATED = 'date_created';
	const _ESCROW_TYPE = 'escrow_type';
	const _ESCROW_LIMIT = 'escrow_limit';
	const _DATE_MODIFIED = 'date_modified';
	
	
	public function __construct()
	{
		parent::__construct();
	}
		
	public function createNewLibraryEventComment($eventId, $comment, $price, $location, $address, $lat, $lng, $fromAccount, $deliveryMethod, $escrowReleased, $dateTime, $escrowType, $escrowLimit)
	{
		$date = new DateTime();
		$date = $date->format('Y-m-d H:i:s');
		
		$data = array(
				static::_EVENT_ID=>$eventId,
				static::_COMMENT=>$comment,
				static::_PRICE=>$price,
				static::_LOCATION=>$location,
				static::_ADDRESS=>$address,
				static::_LAT=>$lat,
				static::_LNG=>$lng,
				static::_FROM_ACCOUNT => $fromAccount,
		        static::_DELIVERY_METHOD => $deliveryMethod,
		        static::_ESCROW_RELEASED => $escrowReleased,
		        static::_DATE_TIME => $dateTime,
		        static::_ESCROW_TYPE => $escrowType,
		        static::_ESCROW_LIMIT => $escrowLimit,
		        static::_DATE_CREATED => $date
		);
		
		# Execute insert statment
		$data[static::_DATE_CREATED] = $date;
		
		$this->db->insert(static::_TABLE, $data);
		return $this->db->insert_id();
		
// 		$result = $this->get_comment_by_event($eventId);
		
// 		if($result)
// 		{
// 			# Execute update statement
// 			$data[static::_DATE_MODIFIED] = $date;
			
// 			$this->db->update(static::_TABLE, $data);
// 			return $this->db->affected_rows();
// 		}
// 		else
// 		{
// 			# Execute insert statment
// 			$data[static::_DATE_CREATED] = $date;
			
// 			$this->db->insert(static::_TABLE, $data);
// 			return $this->db->insert_id();
// 		}
					
	}
	
	public function get_communication_data($userId)
	{
		# Some more condition needs to be added here so that
		# A user with RSS feed for the Data can also get
		# Data in his communication panel
		
	    # Load user library
	    
	    
		$response = array();
		
		$this->db->select('A.id, A.event_id, A.comment, A.price, A.address, A.location, A.date_time, B.event_data_id, B.title, B.user_id, B.start, A.escrow_type');
		$this->db->from("user_library_event_comment as A");
		$this->db->join("user_library_events as B","A.event_id = B.id",'left');
		$this->db->join("rss_feed_subscription as C","C.item_id = B.event_data_id", 'left');
// 		$this->db->join("user_library_event_comment_assignment_status as D","D.library_comment_id = A.id",'left');
// 		$this->db->join("page E","E.id != B.event_data_id");
// 		$this->db->where('E.user_id !=', $userId);
		$this->db->where('C.unsubscribe', 0);
		$this->db->where('C.user_id', $userId);
// 		$this->db->where('D.user_id !=', $userId);
		$this->db->group_by('A.id');
		$response = $this->db->get()->result();
// 		echo $this->db->last_query();
		
		return $response;
	}
	
	
	public function get_escrow_form_data($userId, $libraryCommentId)
	{
		$response = array();
		
		$this->db->select('A.id, A.event_id, A.comment, A.price, A.address, A.location, , B.event_data_id, B.event_data_price, B.title, C.category_id, D.status, comment_id, D.escrow_seller_id');
		$this->db->from("user_library_event_comment as A");
		$this->db->join("user_library_events as B","A.event_id = B.id",'left');
		$this->db->join("rss_feed_subscription as C","C.item_id = B.event_data_id", 'left');
		$this->db->join("user_library_event_escrow as D","D.comment_id = A.id",'left');
		$this->db->where('D.escrow_buyer_id', $userId);
		$this->db->where('D.comment_id', $libraryCommentId);
		
		$response = $this->db->get()->row();
			
		return $response;
	}
	
	public function get_comment_by_event($eventId)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_EVENT_ID, $eventId);
		$response = $this->db->get()->row();
		
		return $response;
	}
	
	public function get_by_id($commentId)
	{
	    $response = array();
	    
	    $this->db->from(static::_TABLE);
	    $this->db->where(static::_ID, $commentId);
	    $response = $this->db->get()->row();
	    
	    return $response;
	}
	
	public function delete_comment($id)
	{
	    # Now we have the id so let's delete the escrow
	    $this->db->where(static::_ID, $id);
	    $this->db->delete(static::_TABLE);
	    
	    return $this->db->affected_rows();
	}
	
	
	/*
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
// 		echo $this->db->last_query();
				
		return $flag;
	}
	
	public function updateLibraryEventComment($eventId, $comment)
	{
		$flag = false;
	
		$date = new DateTime();
		$date = $date->format('Y-m-d H:i:s');
	
		$data = array(
				static::_COMMENT=>$comment,
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
		
		$this->db->select('id, title, start, end, full_day');
		$this->db->from(static::_TABLE);
		$this->db->where(static::_USER_ID,$userId);
		$response = $this->db->get()->result();
		
		
		return $response;
	}
	*/
}