<?php

class User_event_escrow_model extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'user_event_escrow';
	const _ID = 'id';
	const _EVENT_ID = 'event_id';	
	const _ESCROW_NOTES = 'escrow_notes';
	const _ESCROW_BUYER_ID = 'escrow_buyer_id';
	const _ESCROW_SELLER_ID = 'escrow_seller_id';
	const _ESCROW_FROM_ACCOUNT = 'from_account';
	const _ESCROW_DELIVERY_METHOD = 'delivery_method';
	const _ESCROW_RELEASED = 'escrow_released';
	const _ESCROW_PRICE = 'escrow_price';
	const _ESCROW_ADDRESS = 'address';
	const _ESCROW_DATE_TIME = 'date_time';
	const _STATUS = 'status';
	const _SELLER_APPROVED = 'seller_approved';
	const _DATE_CREATED = 'date_created';
	const _DATE_MODIFIED = 'date_modified';
			
	const YIELD_OFFER = 1;
	const RECOMMEND_TO_FRIEND = 2; 
	const DECLINE_OFFER = 3;
	const ACCEPT_OFFER = 4;
	const SAVE_AND_EXIT = 5;
	const OFFER_COMPLETE = 6;
		
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_by_id($id)
	{
	    $this->db->from(static::_TABLE);
	    $this->db->where(static::_ID, $id);
	    return $this->db->get()->row();
	}
	
	public function get_by_criteria($criteria) 
	{
	    $this->db->from(static::_TABLE);
	    $this->db->where($criteria);
	    return $this->db->get()->result();
	}
	
	public function yield_offer($eventId, $sellerId, $buyerId)
	{
	    $dateObj = new DateTime();
	    $date = $dateObj->format('Y-m-d H:i:s');
	    
	    $data = array(	        
	        static::_EVENT_ID=>$eventId,
	        static::_ESCROW_SELLER_ID=>$sellerId,
	        static::_ESCROW_BUYER_ID=>$buyerId,
	        static::_STATUS=>static::YIELD_OFFER,
	        static::_DATE_CREATED=>$date,
	    );
	    $this->db->insert(static::_TABLE, $data);
	    return $this->db->insert_id();
	}
	
	public function save_offer($escrowId, $notes, $fromAccount, $deliveryMethod, $escrowReleased, $address, $price)
	{
	    $dateObj = new DateTime();
	    $date = $dateObj->format('Y-m-d H:i:s');
	    
	    $data = array(
	        static::_ESCROW_NOTES => $notes,
	        static::_ESCROW_FROM_ACCOUNT => $fromAccount,
	        static::_ESCROW_DELIVERY_METHOD=>$deliveryMethod,
	        static::_ESCROW_RELEASED=>$escrowReleased,
	        static::_ESCROW_ADDRESS=>$address,
	        static::_ESCROW_PRICE => $price,
	        static::_STATUS=>static::SAVE_AND_EXIT,
	        static::_DATE_MODIFIED=>$date,
	    );
	    
	    $this->db->where(static::_ID, $escrowId);
	    
	    $this->db->update(static::_TABLE, $data);
	    return $this->db->affected_rows();
	}
	
	public function accept_offer($escrowId, $notes, $fromAccount, $deliveryMethod, $escrowReleased, $address, $price)
	{
	    $dateObj = new DateTime();
	    $date = $dateObj->format('Y-m-d H:i:s');
	    
	    $data = array(
	        static::_ESCROW_NOTES => $notes,
	        static::_ESCROW_FROM_ACCOUNT => $fromAccount,
	        static::_ESCROW_DELIVERY_METHOD=>$deliveryMethod,
	        static::_ESCROW_RELEASED=>$escrowReleased,
	        static::_ESCROW_ADDRESS=>$address,
	        static::_ESCROW_PRICE => $price,
	        static::_STATUS=>static::ACCEPT_OFFER,
	        static::_DATE_MODIFIED=>$date,
	    );
	    
	    $this->db->where(static::_ID, $escrowId);
	    
	    $this->db->update(static::_TABLE, $data);
	    return $this->db->affected_rows();
	}
	
	public function approve_offer($escrowId)
	{   
	    $data = array( static::_SELLER_APPROVED=>1);
	    
	    $this->db->where(static::_ID,$escrowId);
	    
	    $this->db->update(static::_TABLE, $data);
	    return $this->db->affected_rows();
	}
    
    
}