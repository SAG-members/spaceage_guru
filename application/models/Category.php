<?php

class Category extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */	
	
	const _TABLE = 'category';
	const _ID = 'id';
	const _CATEGORY = 'category';
	const _CATEGORY_DESCRIPTION = 'category_description';
	const _PARENT_ID = 'parent_id';
	const _DATE_CREATED = 'date_created';
	
	public function __construct()
	{
		parent::__construct();
	}

	public function getCategories()
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$response = $this->db->get()->result();
			
		return $response;
		
	}
	
	
}