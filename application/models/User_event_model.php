<?php

class User_event_model extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'user_events';
	const _ID = 'id';
	const _USER_ID = 'user_id';
	const _TOPIC = 'topic';
	const _ITEM_ID = 'item_id';	
	const _COMMENT = 'comment';
	const _IMAGE = 'image';
	const _PCT_PRICE = 'pct_price';
	const _PRICE = 'price';
	const _PRICE_CURRENCY = 'price_currency';
	const _PAYMENT_FROM = 'payment_from';
	const _DELIVERY_METHOD = 'delivery_method';	 
	const _ESCROW_RELEASED = 'escrow_released';
	const _EXPIRY_DATE = 'expiry_date';
	const _HAS_EXPIRY = 'has_expiry_date';
	const _ESCROW_TYPE = 'escrow_type';
	const _ESCROW_MIN_LIMIT = 'escrow_min_limit';
	const _ESCROW_MAX_LIMIT = 'escrow_max_limit';
	const _LOCATION = 'location';
	const _ADDRESS = 'address';
	const _LAT = 'lat';
	const _LNG = 'lng';
	const _DATE_CREATED = 'date_created';
	
	public function __construct()
	{
		parent::__construct();		
	}
    
	public function register_new_event($data)
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
	
	public function get_communication_data($userId)
	{
	    $response = array();
	    
	    $this->db->select('A.id, A.user_id, A.topic, A.comment, A.item_id, A.image, A.pct_price, A.price, A.expiry_date, A.has_expiry_date, A.address');
	    $this->db->from("user_events as A");
	    $this->db->join("rss_feed_subscription as C","C.item_id = A.item_id", 'left');
// 	    $this->db->join("user_events_status as D","D.event_id = A.id", 'left');
	    $this->db->where('C.unsubscribe', 0);
// 	    $this->db->where('D.status !=', 1);
// 	    $this->db->or_where('D.status !=', 2);
// 	    $this->db->or_where('D.status !=', 3);
	    $this->db->where('C.user_id', $userId);	    		
	    $this->db->group_by('A.id');
	    $response = $this->db->get()->result();	    
	    
	    return $response;
	}
	
	
}