<?php

class Page_like_dislike_model extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'page_like_dislike';
	const _ID = 'id';
	const _PAGE_ID = 'page_id';
	const _USER_ID = 'user_id';
	const _PAGE_LIKE = 'page_like';
	const _PAGE_DISLIKE = 'page_dislike';
	const _PAGE_LOVE_IT = 'page_love_it';
	const _PAGE_HATE_IT = 'page_hate_it';
	const _DATE_CREATED = 'date_created';
	
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function love_data($pageId, $userId)
	{
		$response = array();
		
		$date = new DateTime();
		$date = $date->format('Y-m-d H:i:s');
		
		
		# First step is to check if data for page id is already available
		$result = $this->get_data($pageId, $userId);
		
		$data = array(static::_PAGE_LOVE_IT => 1, static::_PAGE_HATE_IT => 0);
		
		if($result)
		{
			$this->db->where(static::_PAGE_ID, $pageId);
			$this->db->where(static::_USER_ID, $userId);
			$this->db->update(static::_TABLE, $data);
			return $this->db->affected_rows();
		}
		else
		{
			$data[static::_USER_ID] = $userId;
			$data[static::_PAGE_ID] = $pageId;
			$data[static::_DATE_CREATED] = $date;
			
			$this->db->insert(static::_TABLE, $data);
			return $this->db->insert_id();
		}
		
	}
	
	
	public function like_data($pageId, $userId)
	{
		$response = array();
		
		$date = new DateTime();
		$date = $date->format('Y-m-d H:i:s');
		
		
		# First step is to check if data for page id is already available
		$result = $this->get_data($pageId, $userId);
		
		$data = array(static::_PAGE_LIKE => 1, static::_PAGE_DISLIKE => 0);
		
		if($result)
		{
			$this->db->where(static::_PAGE_ID, $pageId);
			$this->db->where(static::_USER_ID, $userId);
			$this->db->update(static::_TABLE, $data);
			return $this->db->affected_rows();
		}
		else 
		{
			$data[static::_USER_ID] = $userId;
			$data[static::_PAGE_ID] = $pageId;
			$data[static::_DATE_CREATED] = $date;
			
			$this->db->insert(static::_TABLE, $data);
			return $this->db->insert_id();
		}
				
	}
	
	public function hate_data($pageId, $userId)
	{
		$response = array();
		
		$date = new DateTime();
		$date = $date->format('Y-m-d H:i:s');
		
		
		# First step is to check if data for page id is already available
		$result = $this->get_data($pageId, $userId);
		
		$data = array(static::_PAGE_LOVE_IT => 0, static::_PAGE_HATE_IT => 1);
		
		if($result)
		{
			$this->db->where(static::_PAGE_ID, $pageId);
			$this->db->where(static::_USER_ID, $userId);
			$this->db->update(static::_TABLE, $data);
			return $this->db->affected_rows();
		}
		else
		{
			$data[static::_USER_ID] = $userId;
			$data[static::_PAGE_ID] = $pageId;
			$data[static::_DATE_CREATED] = $date;
			
			$this->db->insert(static::_TABLE, $data);
			return $this->db->insert_id();
		}
		
	}
	
	public function dislike_data($pageId, $userId)
	{
		$response = array();
		
		$date = new DateTime();
		$date = $date->format('Y-m-d H:i:s');
		
		
		# First step is to check if data for page id is already available
		$result = $this->get_data($pageId, $userId);
		
		$data = array(static::_PAGE_DISLIKE => 1, static::_PAGE_LIKE => 0);
		
		if($result)
		{
			$this->db->where(static::_PAGE_ID, $pageId);
			$this->db->where(static::_USER_ID, $userId);
			$this->db->update(static::_TABLE, $data);
			return $this->db->affected_rows();
		}
		else 
		{
			$data[static::_USER_ID] = $userId;
			$data[static::_PAGE_ID] = $pageId;
			$data[static::_DATE_CREATED] = $date;
			
			$this->db->insert(static::_TABLE, $data);
			return $this->db->insert_id();
		}
	
	}
	
	public function get_data($pageId, $userId)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_PAGE_ID, $pageId);
		$this->db->where(static::_USER_ID, $userId);
		$response = $this->db->get()->row();
		
		return $response;
	}
	
	public function get_count_like_dislike($pageId)
	{
		$response = array();
		
				
		$this->db->select('sum(page_like)  as likecount, sum(page_dislike) as dislikecount, sum(page_love_it) as loveitcount, sum(page_hate_it) as hateitcount');
		$this->db->from(static::_TABLE);
		$this->db->where(static::_PAGE_ID, $pageId);
		$response = $this->db->get()->row();
// 		echo $this->db->last_query();	
		return $response;
	}
	
	
}