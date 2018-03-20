<?php

class User_questionnaire extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'user_questionnaire';
	const _ID = 'id';
	const _USER_ID = 'user_id';
	const _QUESTION_GROUP = 'question_group';
	const _QUESTION_ID = 'question_id';
	const _ANSWER = 'answer';
	
	const QUESTION_GROUP_PPQ = 1;
	const QUESTION_GROUP_RPQ = 2;
	const QUESTION_GROUP_WPQ = 3;
	
	public function __construct()
	{
		parent::__construct();
	}

	/* 
	 *  Function Updates user questions and answers in the database
	 */
	
	public function user_Q_A($userId, $registrationInfo, $questionGroup)
	{
		$flag = false;
		
		for($i=1; $i<=17; $i++)
		{
			$data = array(
					User_questionnaire::_USER_ID=>$userId,
					User_questionnaire::_QUESTION_GROUP => $questionGroup,
					User_questionnaire::_QUESTION_ID=>$i,
					User_questionnaire::_ANSWER=>$registrationInfo['q'.$i]
					);
			$lastId = $this->db->insert(User_questionnaire::_TABLE, $data);
			if($lastId) $flag = true;
		}
		
		return $flag;
						
	}
	
	public function get_user_questionnaire($userId)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_USER_ID,$userId);
		$this->db->where(static::_QUESTION_GROUP, static::QUESTION_GROUP_PPQ);
		$query = $this->db->get();
		
		$response = $query->result();
		
		return $response;
	}
	
	public function get_user_rpq($userId)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_USER_ID,$userId);
		$this->db->where(static::_QUESTION_GROUP, static::QUESTION_GROUP_RPQ);
		$query = $this->db->get();
		
		$response = $query->result();
		
		return $response;
	}
	
	public function get_user_wpq($userId)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_USER_ID,$userId);
		$this->db->where(static::_QUESTION_GROUP, static::QUESTION_GROUP_WPQ);
		$query = $this->db->get();
		
		$response = $query->result();
		
		return $response;
	}
	
	public function get_data($userId, $questionGroup)
	{
		$this->db->from(static::_TABLE);
		$this->db->where(static::_USER_ID, $userId);
		$this->db->where(static::_QUESTION_GROUP, $questionGroup);
		$numRows = $this->db->get()->num_rows();
		
		return $numRows;
	}
	
	public function update_user_questionnaire($userId, $registrationInfo)
	{
		# First step is to check if user entry exists in PPQ table
		
		if($this->get_data($userId, static::QUESTION_GROUP_PPQ) > 0)
		{
			$flag = false;
			
			for($i=1; $i<=17; $i++)
			{
				$data = array(
						User_questionnaire::_ANSWER=>$registrationInfo['q'.$i]
				);
						
					$this->db->where(static::_USER_ID, $userId);
					$this->db->where(static::_QUESTION_ID, $i);
					$this->db->where(static::_QUESTION_GROUP, static::QUESTION_GROUP_PPQ);
					$flag = $this->db->update(User_questionnaire::_TABLE, $data);
					
					
			}
			
			return $flag;
		}
		else 
		{
			for($i=1; $i<=17; $i++)
			{
				$data = array(
						User_questionnaire::_USER_ID=>$userId,
						User_questionnaire::_QUESTION_ID=>$i,
						User_questionnaire::_QUESTION_GROUP => static::QUESTION_GROUP_PPQ,
						User_questionnaire::_ANSWER=>$registrationInfo['q'.$i]						
				);
						
				$this->db->insert(User_questionnaire::_TABLE, $data);
			}
			
			return $this->db->insert_id();
		}
		
		
		
		
	}
	
	public function update_user_rpq($userId, $registrationInfo)
	{
		# First step is to check if user entry exists in PPQ table
		
		if($this->get_data($userId, static::QUESTION_GROUP_RPQ) > 0)
		{
			$flag = false;
			
			for($i=1; $i<17; $i++)
			{
				$data = array(
						User_questionnaire::_ANSWER=>$registrationInfo['q'.$i]
				);
				
				$this->db->where(static::_USER_ID, $userId);
				$this->db->where(static::_QUESTION_ID, $i);
				$this->db->where(static::_QUESTION_GROUP, static::QUESTION_GROUP_RPQ);
				$flag = $this->db->update(User_questionnaire::_TABLE, $data);
				
				
			}
			
			return $flag;
		}
		else
		{
			for($i=1; $i<17; $i++)
			{
				$data = array(
						User_questionnaire::_USER_ID=>$userId,
						User_questionnaire::_QUESTION_ID=>$i,
						User_questionnaire::_QUESTION_GROUP => static::QUESTION_GROUP_RPQ,
						User_questionnaire::_ANSWER=>$registrationInfo['q'.$i]
				);
				
				$this->db->insert(User_questionnaire::_TABLE, $data);
			}
			
			return $this->db->insert_id();
		}
		
		
		
		
	}
	
	
	public function update_user_wpq($userId, $registrationInfo)
	{
		# First step is to check if user entry exists in PPQ table
		
		if($this->get_data($userId, static::QUESTION_GROUP_WPQ) > 0)
		{
			$flag = false;
			
			for($i=1; $i<17; $i++)
			{
				$data = array(
						User_questionnaire::_ANSWER=>$registrationInfo['q'.$i]
				);
				
				$this->db->where(static::_USER_ID, $userId);
				$this->db->where(static::_QUESTION_ID, $i);
				$this->db->where(static::_QUESTION_GROUP, static::QUESTION_GROUP_WPQ);
				$flag = $this->db->update(User_questionnaire::_TABLE, $data);
				
				
			}
			
			return $flag;
		}
		else
		{
			for($i=1; $i<17; $i++)
			{
				$data = array(
						User_questionnaire::_USER_ID=>$userId,
						User_questionnaire::_QUESTION_ID=>$i,
						User_questionnaire::_QUESTION_GROUP => static::QUESTION_GROUP_WPQ,
						User_questionnaire::_ANSWER=>$registrationInfo['q'.$i]
				);
				
				$this->db->insert(User_questionnaire::_TABLE, $data);
				
				
			}
			
			return $this->db->insert_id();
		}
		
		
		
		
	}
	
	
	public function check_ppq_rpq_wpq_status($userId, $questionGroupVal)
	{
	    $this->db->from(static::_TABLE);
	    $this->db->where(static::_USER_ID,$userId);
	    $this->db->where(static::_QUESTION_GROUP, $questionGroupVal);
	    	    
	    $query = $this->db->get();	    
	    $response = $query->result();
	    	    
	    return $response;
	}
	
		
}