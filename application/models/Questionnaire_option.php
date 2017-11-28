<?php

class Questionnaire_option extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'questionnaire_option';
	const _ID = 'id';
	const _QUESTION_ID = 'question_id';
	const _QUESTION_OPTION = 'question_option';	
	
				
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getOptionByQuestionId($questionId)
	{
		
		$this->db->from(Questionnaire_option::_TABLE);
		$this->db->where(Questionnaire_option::_QUESTION_ID, $questionId);
		$query = $this->db->get();
// 		$query = $this->db->get(Questionnaire_option::_TABLE);
				
		$response = array();
		
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$output = array();

				$output['id'] = $row->{Questionnaire_option::_ID};
				$output['question_option'] = preg_replace("/\\\\|\r|\n|\t/", "", $row->{Questionnaire_option::_QUESTION_OPTION}); ;
							
				$response[] = $output;
			}
			
		}
		
		return $response;
		
	}
}