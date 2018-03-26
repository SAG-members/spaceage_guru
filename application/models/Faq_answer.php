<?php

class Faq_answer extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'faq_answer';
	const _ID = 'id';
	const _FAQ_ID = 'faq_id';
	const _USER_ID = 'user_id';
	const _ANSWER = 'answer';
	const _ANONYMOUS = 'anonymous';
	const _STATUS = 'status';
	const _DATE_CREATED = 'date_created';
	const _MODIFIED_BY = 'modified_by';
	const _MODIFIED_DATE = 'modified_date';
	
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_faq_answers_by_id($questionId)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_FAQ_ID,$questionId);
		$query = $this->db->get();
		
		foreach ($query->result() as $row)
		{
			$output['id'] = $row->{static::_ID};
			$output['user_id'] = $row->{static::_USER_ID};
			$output['answer'] = $row->{static::_ANSWER};
			$output['anonymous'] = $row->{static::_ANONYMOUS};
			$output['date_created'] = $row->{static::_DATE_CREATED};
				
			$response[] = $output;
		}
		
		return $response;
	}
		
	public function createFaqAnswer($questionId, $answer, $anonymous, $userId = NULL)
	{
		$date = new DateTime();
		$dateFormat = $date->format('Y-m-d H:i:s');
		
		$data = array(static::_FAQ_ID=>$questionId, 
				static::_ANSWER=>$answer, 
				static::_ANONYMOUS=>$anonymous, 
				static::_USER_ID=>$userId, 
				static::_STATUS=>1,
				static::_DATE_CREATED=>$dateFormat
		);
		
		$this->db->insert(static::_TABLE, $data);
		
		return $this->db->insert_id();
	}
	
	public function updateFaqAnswer($id, $answer, $anonymous)
	{
	    $date = new DateTime();
	    $dateFormat = $date->format('Y-m-d H:i:s');
	    
	    $data = array(
	            static::_ANSWER=>$answer,
	            static::_ANONYMOUS=>$anonymous,
	            static::_STATUS=>1,
	            static::_MODIFIED_DATE=>$dateFormat
	    );
	    
	    $this->db->where(static::_ID, $id);
	    $this->db->update(static::_TABLE, $data);
	    return $this->db->affected_rows();
	}
	
	public function deleteFaqAnswer($id)
	{
	    $this->db->where(static::_ID, $id);
	    $this->db->delete(static::_TABLE);
	    
	    return $this->db->affected_rows();
	}
	
	public function deleteFaq($id)
	{
	    $this->db->where(static::_FAQ_ID, $id);
	    $this->db->delete(static::_TABLE);
	    
	    return $this->db->affected_rows();
	}
}