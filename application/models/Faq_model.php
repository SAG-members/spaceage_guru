<?php

class Faq_model extends CI_Model
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
		
		$this->load->model('faq_answer', 'ans');
	}
	
	public function get_all_questions()
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_STATUS, static::_FAQ_PUBLISH);
		$this->db->order_by(static::_ID, "desc");
		$query = $this->db->get();
		
		if($query->num_rows() > 0) { return $query->result(); }
				
		return $response;
		
	}
	
	public function get_all_question_with_answer()
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_STATUS, static::_FAQ_PUBLISH);
		$this->db->order_by(static::_ID, "desc");
		$query = $this->db->get();
		
		if($query->num_rows() > 0) 
		{ 
			foreach ($query->result() as $r)
			{
				$output['id'] = $r->{static::_ID};
				$output['question'] = $r->{static::_QUESTION};
				$output['user_id'] = $r->{static::_USER_ID};
				$output['anonymous'] = $r->{static::_ANONYMOUS};
				$output['answers'] = $this->ans->get_faq_answers_by_id($r->{static::_ID});
				
				$response[] = $output;
			} 
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
		$response['answers'] = $this->ans->get_faq_answers_by_id($row->{static::_ID});
				
		return $response;
	}
	
	public function new_faq($question, $anonymous, $userId = null)
	{
		$date = new DateTime();
		$dateFormat = $date->format('Y-m-d H:i:s');
		
		$data = array(static::_USER_ID=>$userId, static::_QUESTION=>$question, static::_ANONYMOUS=>$anonymous, static::_STATUS=>static::_FAQ_PUBLISH, static::_DATE_CREATED=>$dateFormat);
		
		$this->db->insert(static::_TABLE, $data);
		
		return $this->db->insert_id();
	}
	
}