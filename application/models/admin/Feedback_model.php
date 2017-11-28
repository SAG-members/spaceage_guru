<?php

class Feedback_model extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'user_feedback';
	const _ID = 'id';
	const _EMAIL = 'email';
	const _WEBSITE = 'website';
	const _COMMENT = 'comment';
	const _RESPONSE = 'response';
	const _DATE_CREATED = 'date_created';
	
	
	public function __construct()
	{
		parent::__construct();
	}
	
		
	public function get_feedback_count()
	{
		$response = array();
		
		$this->db->select(static::_ID);
		$this->db->from(static::_TABLE);
		$query = $this->db->get();
		
		return $query->num_rows();
	}
	
	public function get_feedbacks($search, $userId, $limit, $offset)
	{
		$response = array();
		
		$this->db->select('*');
		$this->db->from(static::_TABLE);
		if(!empty($search))
		{
			$this->db->where(static::_EMAIL , $search);
			$this->db->where(static::_COMMENT , $search);
		}
		
		if($limit !=''){$this->db->limit($limit, $offset); }
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0) $response = $query->result();
				
		return $response;
	}
	
	public function get_feedback_by_id($feedbackId)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_ID,$feedbackId);
		$query = $this->db->get();
		
		$response = $query->row();
				
		return $response;
		
	}
	
	public function get_membership_by_slug($slug)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_MEMBERSHIP_TITLE_SLUG,$slug);
		$query = $this->db->get();
		
		$response = $query->row();
		
		return $response;
		
	}

	public function delete_feedback_by_id($feedbackId)
	{
		$flag = false;
		
		$this->db->where(static::_ID, $feedbackId);
		$flag = $this->db->delete(static::_TABLE);
		
		return $flag;
	}
		
}