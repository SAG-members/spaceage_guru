<?php

class Page_comment_model extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'page_comment';
	const _ID = 'id';
	const _PAGE_ID = 'page_id';
	const _USER_ID = 'user_id';
	const _PAGE_COMMENT = 'comment';
	const _PAGE_PARENT_ID = 'parent_id';
	const _DATE_CREATED = 'date_created';
	
	
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function create_new_comment($pageId, $userId, $comment, $parentId=NULL)
	{
		$response = array();
		
		$date = new DateTime();
		$date = $date->format('Y-m-d H:i:s');
		
		$data = array(
				static::_PAGE_ID => $pageId,
				static::_USER_ID => $userId,
				static::_PAGE_COMMENT => $comment,
				static::_PAGE_PARENT_ID => $parentId,
				static::_DATE_CREATED => $date
		);
		
		$this->db->insert(static::_TABLE, $data);
		return $this->db->insert_id();
			
	}
		
	public function get_page_comments($pageId)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_PAGE_ID, $pageId);
		
		$response = $this->db->get()->result();
		
		return $response;
	}
	
	public function get_page_comment_by_id($commentId)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_ID, $commentId);
		
		$response = $this->db->get()->row();
		
		return $response;
	}
	
	
	
	
}