<?php

class Page_specified_user_assignment_model extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'page_specified_user_assignment';
	const _ID = 'id';
	const _PAGE_ID = 'page_id';
	const _USER_ID = 'user_id';
	const _DATE_CREATED = 'date_created';
		
	public function __construct()
	{
		parent::__construct();
	}
		
	public function assign_data_to_specified_user($pageId, $userId)
	{
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
	
		$data = array(
				static::_PAGE_ID=>$pageId,
				static::_USER_ID=>$userId,
				static::_DATE_CREATED=>$date,
		);
		$this->db->insert(static::_TABLE, $data);
		return $this->db->insert_id();
	}
}