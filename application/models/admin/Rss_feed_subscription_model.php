<?php

class Rss_feed_subscription_model extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'rss_feed_subscription';
	const _ID = 'id';
	const _ITEM_ID = 'item_id';
	const _CATEGORY_ID = 'category_id';
	const _EMAIL = 'email';
	const _DATE_CREATED = 'date_created';
	const _UNSUBSCRIBE = 'unsubscribe';
		
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_feed_count()
	{
		$response = array();
		
		$this->db->select('*');
		$this->db->from(static::_TABLE);
		$query = $this->db->get();
		
		return $query->num_rows();
	}
	
	public function get_feed_list($search=NULL, $limit, $offset)
	{
		$response = array();
		
		$this->db->select('*');
		$this->db->from(static::_TABLE);
		
		if(!empty($search))
		{
			$this->db->where(static::_ID , $search);
			$this->db->where(static::_CATEGORY_ID , static::get_feed_item_type($search));
			$this->db->where(static::_ITEM_ID , $search);
		}
		
		if($limit !=''){$this->db->limit($limit, $offset); }
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0) $response = $query->result();
		
		return $response;
			
	}
	
	public function get_feed_item($itemId)
	{
		$response = array();
		
		$this->db->select('*');
		$this->db->where(static::_ID, $itemId);
		$this->db->from('page');
			
		$query = $this->db->get();
		
		if($query->num_rows() > 0) return $query->row()->{'page_title'};
		
		return $response;
		
	}
	
	public static function get_feed_item_type($itemType)
	{
		switch ($itemType)
		{
			case 1: return 'Service'; break;
			case 2: return 'Product'; break;
			case 5: return 'Symptom'; break;
				
		}
	}
	
	public function create_rss_feed_subscription($itemId, $itemType, $email)
	{
		$date = new DateTime();
		$date = $date->format('Y-m-d H:i:s');
		
		$data = array(static::_ITEM_ID=>$itemId, static::_CATEGORY_ID=>$itemType, static::_EMAIL=>$email, static::_DATE_CREATED=>$date);
		
		$this->db->insert(static::_TABLE, $data);
		
		return $this->db->insert_id();
	}
}