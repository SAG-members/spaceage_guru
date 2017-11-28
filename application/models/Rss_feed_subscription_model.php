<?php

class Rss_feed_subscription_model extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'rss_feed_subscription';
	const _ID = 'id';
	const _USER_ID = 'user_id';
	const _ITEM_ID = 'item_id';
	const _CATEGORY_ID = 'category_id';
	const _EMAIL = 'email';
	const _DATE_CREATED = 'date_created';
	const _UNSUBSCRIBE = 'unsubscribe';
		
	const _FAQ_PUBLISH = 1;
	const _FAQ_UNPUBLISH = 2;
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function create_rss_feed_subscription($userId, $itemId, $itemType, $email)
	{
		$date = new DateTime();
		$date = $date->format('Y-m-d H:i:s');
		
		$data = array(static::_USER_ID=>$userId, static::_ITEM_ID=>$itemId, 
				static::_CATEGORY_ID=>$itemType, static::_EMAIL=>$email, 
				static::_DATE_CREATED=>$date);
		
		$this->db->insert(static::_TABLE, $data);
		
		return $this->db->insert_id();
	}
	
	public function get_rss_feed_subscription_by_user_id($userId)
	{
		$response = array();
		
		$sql = 'select p.page_title, p.category_id, r.unsubscribe, r.id from rss_feed_subscription r';
		$sql .=' JOIN page p ON p.id = r.item_id';
		$sql .=' WHERE r.user_id = '.$userId;
		$sql .=' AND r.unsubscribe = 0';
		
		$response = $this->db->query($sql)->result();
		
		
// 		$this->db->from(static::_TABLE);
// 		$this->db->where(static::_USER_ID,$userId);
// 		$this->db->where(static::_UNSUBSCRIBE,0);
// 		$response = $this->db->get()->result();
		
		return $response;
		
	}
	
	public function unsubscribe_rss_feed_list($userId, $id)
	{
		$flag = false;
		
		$data = array(static::_UNSUBSCRIBE=>1);
		$this->db->where(static::_ID, $id);
		$this->db->where(static::_USER_ID, $userId);

		$flag = $this->db->update(static::_TABLE, $data); 
		return $flag;
	}
	
	public function check_if_rss_feed_available($condition)
	{
	    $this->db->select('*');
	    $this->db->from(static::_TABLE);
	    $this->db->where($condition);
	    $this->db->where(static::_UNSUBSCRIBE, 0);
	    
	    return $this->db->get()->row();
	}
	
	public function change_rss_feed_ownership($userId, $dataId)
	{
	    $data = array(static::_USER_ID => 1);
	    $this->db->where(static::_USER_ID, $userId);
	    $this->db->where(static::_ITEM_ID, $dataId);
	    
	    $this->db->update(self::_TABLE, $data);
	    return $this->db->affected_rows();
	}
}