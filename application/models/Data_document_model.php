<?php

class Data_document_model extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'page_data_document';
	const _ID = 'id';
	const _PAGE_ID = 'page_id';
	const _DOCUMENT = 'document';
	const _STATUS = 'status';
	const _DATE_CREATED = 'date_created';
	const _DATE_MODIFIED = 'date_modified';
	
	public function __construct()
	{
		parent::__construct();
	}
		
	public function get_data_document($pageId)
	{
		$response = array();
	
		$this->db->from(static::_TABLE);
		$this->db->where(static::_PAGE_ID,$pageId);
		$query = $this->db->get();
		
		$response = $query->result();
	
		return $response;
	
	}
	
	public function create_new_data_document($pageId, $document)
	{
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
	
		$data = array(
				static::_PAGE_ID=>$pageId,
				static::_DOCUMENT=>$document,
				static::_STATUS=>1,
				static::_DATE_CREATED=>$date,
		);
		$this->db->insert(static::_TABLE, $data);
		return $this->db->insert_id();
	}
}