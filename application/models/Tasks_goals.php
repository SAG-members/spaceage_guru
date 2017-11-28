<?php

class Tasks_goals extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'tasks_goals';
	
	const _ID = 'id';
	const _USER_ID = 'user_id';
	const _CONTENT = 'content';
	const _TYPE = 'type';
	const _DATE_CREATED = 'date_created';
	const _DATE_MODIFIED = 'date_modified';
	
	const TYPE_TASK = 1;
	const TYPE_GOAL = 2;
	
	public function __construct()
	{
		parent::__construct();
	}
		
	public function create_new_task_goals($userId, $content, $type)
	{
		$data = array(
			static::_USER_ID => $userId,
			static::_CONTENT => $content,
			static::_TYPE => $type,
		);
		
		$this->db->insert(static::_TABLE, $data);
		return $this->db->insert_id();
	}
	
	public function update_task_goals($contentId, $content)
	{
		$data = array(
				static::_CONTENT => $content,
		);
		
		$this->db->where(static::_ID, $contentId);
		$this->db->update(static::_TABLE, $data);
		
		
		return $this->db->affected_rows();
	}
	
	public function delete_task_goal($contentId)
	{
		$this->db->where(static::_ID, $contentId);
		$this->db->delete(static::_TABLE); 
		
		return $this->db->affected_rows();
	}
	
	
	public function get_task_by_user($userId)
	{
		$this->db->from(static::_TABLE);
		$this->db->where(static::_USER_ID, $userId);
		$this->db->where(static::_TYPE, static::TYPE_TASK);
		$query = $this->db->get();
		
		return $query->result(); 
	}
	
	public function get_goals_by_user($userId)
	{
		$this->db->from(static::_TABLE);
		$this->db->where(static::_USER_ID, $userId);
		$this->db->where(static::_TYPE, static::TYPE_GOAL);
		$query = $this->db->get();
		
		return $query->result(); 
	}
	
	public function get_task_by_id($id)
	{
		$this->db->from(static::_TABLE);
		$this->db->where(static::_ID, $id);
		$this->db->where(static::_TYPE, static::TYPE_TASK);
		$query = $this->db->get();
		
		return $query->row();
		
	}

	public function get_goal_by_id($id)
	{
		$this->db->from(static::_TABLE);
		$this->db->where(static::_ID, $id);
		$this->db->where(static::_TYPE, static::TYPE_GOAL);
		$query = $this->db->get();
		
		return $query->row();
	}
}