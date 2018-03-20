<?php

class User_library_event_escrow_model extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'user_library_event_escrow';
	const _ID = 'id';
	const _EVENT_ID = 'event_id';
	const _COMMENT_ID = 'comment_id';
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
	
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_by_id($id)
	{
	    $this->db->from(static::_TABLE);
	    $this->db->where(static::_ID, $id);
	    return $this->db->get()->result();
	}
	
	public function get_by_criteria($criteria) 
	{
	    $this->db->from(static::_TABLE);
	    $this->db->where($criteria);
	    return $this->db->get()->result();
	}
	
	public function get_offer_status($libraryCommentId, $userId=NULL)
	{
	    $this->db->select('id, event_id, comment_id, escrow_buyer_id, escrow_seller_id, status');
	    $this->db->where(static::_COMMENT_ID, $libraryCommentId);
	    if($userId) $this->db->where(static::_ESCROW_BUYER_ID, $userId);
	    $this->db->from(static::_TABLE);
	    
	    return $this->db->get()->row();
	}
	
	public function get_offer_count_status($libraryCommentId, $userId, $creator, $creatorMembeship)
	{
	    $this->db->select('id,escrow_buyer_id');
	    $this->db->where(static::_COMMENT_ID, $libraryCommentId);
	    $this->db->where(static::_ESCROW_SELLER_ID, $creator);
	    $this->db->from(static::_TABLE);
	    $result = $this->db->get()->result();
// 	    pre($result);

	    # Load user library event escrow model
	    $this->load->model('library_event_comment_model','lecm');
	    $commentObj = $this->lecm->get_by_id($libraryCommentId);
	    
	    
	    if(!empty($result)){
	        $count = count($result);
	        
	        if($creatorMembeship == 4){
	            if($count < 100 && $count < $commentObj->{Library_event_comment_model::_ESCROW_LIMIT}) return true;
	            return false;
	        }
	        elseif($creatorMembeship == 5){
	            if($count < 1000 && $count < $commentObj->{Library_event_comment_model::_ESCROW_LIMIT}) return true;
	            return false;
	        }
	        else{
	            return false;
	        }
	    }
	    return true;
	    
	}
	
	
	
	public function yield_offer($commentId, $eventId, $sellerId, $buyerId)
	{
	    $dateObj = new DateTime();
	    $date = $dateObj->format('Y-m-d H:i:s');
	    
	    $data = array(
                static::_COMMENT_ID=>$commentId,
	            static::_EVENT_ID=>$eventId,
	            static::_ESCROW_SELLER_ID=>$sellerId,
	            static::_ESCROW_BUYER_ID=>$buyerId,
                static::_STATUS=>static::YIELD_OFFER,
                static::_DATE_CREATED=>$date,
        );
        $this->db->insert(static::_TABLE, $data);
        return $this->db->insert_id();
	}
	
	public function decline_offer($commentId, $eventId, $sellerId, $buyerId)
	{
	    # Let us first check if libraryCommentId is already available with user id

	    $dateObj = new DateTime();
	    $date = $dateObj->format('Y-m-d H:i:s');

	    $result = $this->get_offer_status($commentId, $buyerId);

	    if(!empty($result)){
	        $data = array(
	                static::_COMMENT_ID=>$commentId,
	                static::_EVENT_ID=>$eventId,
	                static::_ESCROW_SELLER_ID=>$sellerId,
	                static::_ESCROW_BUYER_ID=>$buyerId,
	                static::_STATUS=>static::DECLINE_OFFER,
	                static::_DATE_MODIFIED=>$date,
	        );
	        
	        $this->db->where(static::_COMMENT_ID, $commentId);
	        
	        $this->db->update(static::_TABLE, $data);
        
	        return $this->db->affected_rows();
	    }
	    else{
	        $data = array(
	                static::_COMMENT_ID=>$commentId,
	                static::_EVENT_ID=>$eventId,
	                static::_ESCROW_SELLER_ID=>$sellerId,
	                static::_ESCROW_BUYER_ID=>$buyerId,
	                static::_STATUS=>static::DECLINE_OFFER,
	                static::_DATE_CREATED=>$date,
	        );
	        $this->db->insert(static::_TABLE, $data);
	        return $this->db->insert_id();
	    }
	    
    }
    
    public function decline_offer_by_id($escrowId)
    {
        $dateObj = new DateTime();
        $date = $dateObj->format('Y-m-d H:i:s');
        
        
        $data = array(
                static::_STATUS=>static::DECLINE_OFFER,
                static::_DATE_MODIFIED=>$date,
        );
        
        $this->db->where(static::_ID, $escrowId);        
        $this->db->update(static::_TABLE, $data);
        
        return $this->db->affected_rows();
    }
    
    public function accept_offer($commentId, $notes, $fromAccount, $deliveryMethod, $escrowReleased, $address, $dateTime, $price, $buyerId)
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
                static::_ESCROW_DATE_TIME => $dateTime,
                static::_STATUS=>static::ACCEPT_OFFER,
                static::_DATE_MODIFIED=>$date,
        );
        
        $this->db->where(static::_COMMENT_ID, $commentId);
        
        $this->db->update(static::_TABLE, $data);
        return $this->db->affected_rows();
    }
	
    public function save_offer($commentId, $notes, $fromAccount, $deliveryMethod, $escrowReleased, $address, $dateTime, $price, $buyerId)
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
        
        $this->db->where(array(static::_COMMENT_ID => $commentId, static::_ESCROW_BUYER_ID => $buyerId));
        
        $this->db->update(static::_TABLE, $data);
        return $this->db->affected_rows();
    }
    
    public function approve_offer($escrowId)
    {
        $dateObj = new DateTime();
        $date = $dateObj->format('Y-m-d H:i:s');
        
        $data = array(
                static::_SELLER_APPROVED=>1,
        );
        
        $this->db->where(array(static::_ID => $escrowId));
        
        $this->db->update(static::_TABLE, $data);
        return $this->db->affected_rows();
    }
    
    public function escrow_list()
    {
        $this->db->from(static::_TABLE);
        return $this->db->get()->result();
    }
    
    public function delete_escrow($id)
    {
        # Now we have the id so let's delete the escrow
        $this->db->where(static::_ID, $id);
        $this->db->delete(static::_TABLE);
        
        return $this->db->affected_rows();
    }
	
}