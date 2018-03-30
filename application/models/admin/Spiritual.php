<?php

class Spiritual extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'spiritual';
	const _ID = 'id';
	const _NUMBER = 'number';
	const _ADD_NUMBER_PIC = 'add_number_pic';
	const _THE_ROLE = 'the_role'; 
	const _ADD_ROLE_PIC = 'add_role_pic';
	const _FEAR	 = 'fear';
	const _TASK = 'task';
	const _GOAL = 'goal';
	const _USER_ID = 'user_id';
	const _COLOR_LAYERS_HUNDRES = 'color_layers_hundres';
	const _COLOR_LAYERS_TENS = 'color_layers_tens';
	const _SINGLES = 'singles';
	const _STATUS = 'status';
	const _DATE_CREATED = 'date_created';
	const _MODIFIED_BY = 'modified_by';
	const _DATE_MODIFIED = 'date_modified';

	const PUBLISH_SPIRITUAL = 1;
	const UNPUBLISH_SPIRITUAL = 0;
	
	
	public function __construct()
	{
		parent::__construct();
	}
	
	
	public function create_spiritual($number, $userId, $add_number_pic, $the_role, $add_role_pic, $fear, $task, $goal, $color_layers_hundres, $color_layers_tens, $singles)
	{
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
	
		$data = array(
				static::_NUMBER => $number,
				static::_ADD_NUMBER_PIC => $add_number_pic,
				static::_ADD_ROLE_PIC=>$add_role_pic,
				static::_USER_ID=>$userId,
				static::_TASK => $task,			
				static::_GOAL=>$goal,
				static::_THE_ROLE=>$the_role,
				static::_FEAR=>$fear,
				static::_COLOR_LAYERS_HUNDRES=>$color_layers_hundres,
				static::_COLOR_LAYERS_TENS=>$color_layers_tens,
				static::_SINGLES => $singles,
				static::_STATUS => static::PUBLISH_SPIRITUAL,
				static::_DATE_CREATED => $date
		);
	
	
		$this->db->insert(static::_TABLE, $data);
	
		return $this->db->insert_id();
	}
			
	public function update_spiritual($id, $number, $userId, $add_number_pic, $the_role, $add_role_pic, $fear, $task, $goal, $color_layers_hundres, $color_layers_tens, $singles)
	{
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array(
				static::_NUMBER => $number,
				static::_ADD_NUMBER_PIC => $add_number_pic,
				static::_ADD_ROLE_PIC=>$add_role_pic,
				static::_USER_ID=>$userId,
				static::_TASK => $task,			
				static::_GOAL=>$goal,
				static::_THE_ROLE=>$the_role,
				static::_FEAR=>$fear,
				static::_COLOR_LAYERS_HUNDRES=>$color_layers_hundres,
				static::_COLOR_LAYERS_TENS=>$color_layers_tens,
				static::_SINGLES => $singles,
				static::_STATUS => static::PUBLISH_SPIRITUAL,
				static::_DATE_MODIFIED => $date,
				static::_MODIFIED_BY => $userId
		);
		
		$this->db->where(static::_ID, $id);
		$this->db->update(static::_TABLE, $data);
	
		return $this->db->affected_rows();
	}
	
	public function get_by_id($id)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_ID, $id);
					
		$query = $this->db->get();
		
		if($query->num_rows() > 0) return $query->row();
		
		return $response;
	}
	
		
	public function get_data()
	{
		$response = array();
		
		$this->db->select('*');
		$this->db->from(static::_TABLE);
		$this->db->order_by(static::_DATE_CREATED, " DESC ");
		$query = $this->db->get();
		
		if($query->num_rows() > 0) return $query->result();
		
		return $response;
	}
		
	public function get_spiritual($userId, $search=NULL, $limit, $offset=NULL)
	{
		$response = array();
		
		$this->db->select('*');	
		
		$this->db->from(static::_TABLE);
		
				
		if($limit !=''){$this->db->limit($limit, $offset); }
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0) return $query->result();
				
		return $response;
	}
	
	public function get_sipritual($pageId)
	{
		$response = array();		

		$this->db->where(static::_ID, $pageId);
		$this->db->from(static::_TABLE);
			
		$query = $this->db->get();
		
		if($query->num_rows() > 0) return $query->row();
		
		return $response;
	}
	
	public function get_spiritual_by_id($id)
	{
		$response = array();
		
		$this->db->select('*');	
		$this->db->where(static::_ID, $id);
		$this->db->from(static::_TABLE);
			
		$query = $this->db->get();
	
		if($query->num_rows() > 0) return $query->row();
		
		return $response;
	}
	
	public function publish_spiritual($number)
	{
		$flag = false;
		
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array( static::_DATE_MODIFIED=>$date, static::_STATUS=>static::PUBLISH_SPIRITUAL);
		$pageIds = array_map('intval', explode(',', $number));		

		$this->db->where_in(static::_ID, $pageIds);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag;
	}
	
	public function unpublish_spiritual($number)
	{
		$flag = false;
		
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array( static::_DATE_MODIFIED=>$date, static::_STATUS=>static::UNPUBLISH_SPIRITUAL);
		$pageIds = array_map('intval', explode(',', $number));		

		$this->db->where_in(static::_ID, $pageIds);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag;
	}
	public function delete_spiritual($id)
	{
		$flag = false;
	
		$this->db->where(static::_ID, $id);
		$flag = $this->db->delete(static::_TABLE);
	
		return $flag;
	}

}