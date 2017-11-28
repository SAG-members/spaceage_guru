<?php

class Feedback extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'user_feedback';
	const _ID = 'id';
	const _USER_ID = 'user_id';
	const _EMAIL = 'email';
	const _WEBSITE = 'website';
	const _COMMENT = 'comment';
	const _RESPONSE = 'response';
	const _DATE_CREATED = 'date_created';
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function create_feedback($email, $website = NULL, $response = NULL, $comment)
	{
		$date = new DateTime();
		$date = $date->format('Y-m-d H:i:s');
		
		$data = array(static::_EMAIL=>$email, static::_WEBSITE=>$website, static::_COMMENT=>$comment, static::_RESPONSE=>$response, static::_DATE_CREATED=>$date);
		
		$this->db->insert(static::_TABLE, $data);
		
		return $this->db->insert_id();
	}
}