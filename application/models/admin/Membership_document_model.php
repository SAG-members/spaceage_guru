<?php

class Membership_document_model extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'membership_document';
	const _ID = 'id';
	const _MEMBERSHIP_ID = 'membership_id';
	const _DOCUMENT = 'document';
	const _DATE_CREATED = 'date_created';
	const _DATE_MODIFIED = 'date_modified';
	
	public function __construct()
	{
		parent::__construct();
	}
		
	public function get_membership_document($membershipId)
	{
		$response = array();
	
		$this->db->from(static::_TABLE);
		$this->db->where(static::_MEMBERSHIP_ID,$membershipId);
		$query = $this->db->get();
		
		$response = $query->result();
	
		return $response;
	
	}
	
	public function create_new_membership_document($membershipId, $document)
	{
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
	
		$data = array(
				static::_MEMBERSHIP_ID=>$membershipId,
				static::_DOCUMENT=>$document,
				static::_DATE_CREATED=>$date,
		);
		$this->db->insert(static::_TABLE, $data);
		return $this->db->insert_id();
	}
}