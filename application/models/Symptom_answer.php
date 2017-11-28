<?php

class Symptom_answer extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'symptom_answer';
	const _ID = 'id';
	const _SYMPTOM_ID = 'symptom_id';
	const _SYMPTOM_ANSWER = 'symptom_answer';
	const _ANONYMOUS = 'anonymous';
	const _DATE_CREATED = 'date_created';
	const _MODIFIED_BY = 'modified_by';
	const _DATE_MODIFIED = 'date_modified';
	
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getSymptomAnswerById($symptomId)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_SYMPTOM_ID,$symptomId);
		$query = $this->db->get();
		
		foreach ($query->result() as $row)
		{
			$output['id'] = $row->{static::_ID};
			$output['answer'] = $row->{static::_SYMPTOM_ANSWER};
// 			$output['answer'] = $row->{static::_ANONYMOUS};
// 			$output['answer'] = $row->{static::_DATE_CREATED};
				
			$response[] = $output;
		}
		
		return $response;
	}
		
	public function createSymptomAnswer($symptomId, $answer, $anonymous)
	{
		$date = new DateTime();
		$date = $date->format('Y-m-d H:i:s');
		
		$data = array(
				static::_SYMPTOM_ID=>$symptomId, 
				static::_SYMPTOM_ANSWER=>$answer,
				static::_ANONYMOUS=>$anonymous,
				static::_DATE_CREATED=>$date
			);
		
		$this->db->insert(static::_TABLE, $data);
		
		return $this->db->insert_id();
	}
}