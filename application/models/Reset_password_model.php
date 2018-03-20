<?php

class Reset_password_model extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'reset_password';
	const _ID = 'id';
	const _USER_ID = 'user_id';
	const _PASSWORD_HASH = 'password_hash';
	const _STATUS = 'status';
	const _DATE_CREATED = 'date_created';
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function create_password_hash($userId)
	{
		$response = array();
		
		$passwordHash = create_hash();
		$date = new DateTime();
		$date = $date->format('Y-m-d H:i:s');
		$data = array(static::_USER_ID=>$userId, static::_PASSWORD_HASH=>md5($passwordHash), static::_STATUS=>0, static::_DATE_CREATED=>$date);
		
		$this->db->insert(static::_TABLE, $data);
		
		$response = array('lastId'=>$this->db->insert_id(), 'passwordHash'=>md5($passwordHash));
		
		return $response;
		
	}
	public function reset_password($hash)
	{
		$response = array();

		$this->db->from(static::_TABLE);
		$this->db->where(static::_PASSWORD_HASH, $hash);
		$response = $this->db->get()->row();
		
		return $response;
		
	}
	
	public function update_hash_status($hash)
	{
		$flag = false;
		$data = array(static::_STATUS=>1);
			
		$this->db->where(static::_PASSWORD_HASH, $hash);
		$flag = $this->db->update(static::_TABLE, $data);
			
		return $flag;
	}
		
}