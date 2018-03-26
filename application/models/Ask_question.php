<?php

class Ask_question extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'faq';
	const _ID = 'id';
	const _USER_ID = 'user_id';
	const _QUESTION = 'question';
	const _ANONYMOUS = 'anonymous';
	const _STATUS = 'status';
	const _DATE_CREATED = 'date_created';
	const _MODIFIED_BY = 'modified_by';
	const _DATE_MODIFIED = 'date_modified';
	
	const _FAQ_PUBLISH = 1;
	const _FAQ_UNPUBLISH = 2;
	public function __construct()
	{
		parent::__construct();
	}

	public function getAllUserQuestions()
	{
		# Set Limit To Max 5 Questions
		
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_STATUS, static::_FAQ_PUBLISH);
		$this->db->order_by(static::_ID, "desc");
		$this->db->limit(10);
		$query = $this->db->get();
				
		foreach ($query->result() as $row)
		{
			$output['id'] = $row->{static::_ID};
			$output['question'] = $row->{static::_QUESTION};
					
			$response[] = $output;
		}
		
		return $response;
	}
	
	public function getUserQuestion($userId)
	{
		$response = array();
		
		$this->db->from(Country::_TABLE);
		$this->db->where(static::_USER_ID,$userId);
		$this->db->order_by(static::_ID, "desc");
		$query = $this->db->get();
		
		foreach ($query->result() as $row)
		{
			$output['id'] = $row->{static::_ID};
			$output['question'] = $row->{static::_QUESTION};
				
			$response[] = $output;
		}
		
		return $response;
	}
	
	public function getQuestionById($questionId)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_ID,$questionId);
		$query = $this->db->get();
		
		$row = $query->row();
		
		$response['id'] = $row->{static::_ID};
		$response['question'] = $row->{static::_QUESTION};
				
		return $response;
	}
	
	public function createUserQuestion($userId, $question, $anonymous)
	{
		$date = new DateTime();
		$dateFormat = $date->format('Y-m-d H:i:s');
		
		$data = array(static::_USER_ID=>$userId, static::_QUESTION=>$question, static::_ANONYMOUS=>$anonymous, static::_STATUS=>static::_FAQ_PUBLISH, static::_DATE_CREATED=>$dateFormat);
		
		$this->db->insert(static::_TABLE, $data);
		
		return $this->db->insert_id();
	}
}