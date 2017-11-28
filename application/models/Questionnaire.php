<?php

class Questionnaire extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'questionnaire';
	const _ID = 'id';
	const _QUESTION = 'question';
	const _ANSWER_TYPE = 'answer_type';	
	
	/*
	 * HTML Elements constants 
	 */
	
	const TYPE_TEXT = 1; 
	const TYPE_TEXTAREA = 2;
	const TYPE_RADIO = 3;
	const TYPE_CHECKBOX = 4;
	const TYPE_BUTTON = 5;
	const TYPE_SUBMIT = 6;
			
	public function __construct()
	{
		parent::__construct();
	}

	/* 
	 *  Function Updates user questions and answers in the database
	 */
	
	public function getQuestions()
	{

		$query = $this->db->get(Questionnaire::_TABLE);
		
		$response = array();
		
		if($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$output = array();
				
				$this->load->model('questionnaire_option', 'qo');

				$output['id'] = $row->{Questionnaire::_ID};
				$output['question'] = preg_replace("/\\\\|\r|\n|\t/", "", $row->{Questionnaire::_QUESTION});
				$output['question_option'] = $this->qo->getOptionByQuestionId($output['id']);
				$output['answer_type'] = $row->{Questionnaire::_ANSWER_TYPE};
							
				$response[] = $output;
			}
		}
		
		return $response;
		
	}
	
	public function getQuestionById($questionId)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_ID,$questionId);
		$query = $this->db->get();
		
		$response = $query->row();
		
		return $response;
	}
}