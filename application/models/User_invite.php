<?php

class User_invite extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'user_invite';
	const _ID = 'id';
	const _INVITED_EMAIL = 'invited_email';
	const _COUPON_CODE = 'coupon_code';
	const _INVITATION_HASH = 'invitation_hash';
	const _INVITED_BY = 'invited_by';
	const _MEMBERSHIP_TYPE = 'membership_type';	
	const _STATUS = 'status';
	const _INVITATION_DATE = 'invitation_date';
	
	public function __construct()
	{
		parent::__construct();
		
	}

	public function create_new_user_invite($userId, $email, $couponCode, $membershipType)
	{
		$hash = create_hash();
		$date = new DateTime();
		$date = $date->format('Y-m-d H:i:s');
		
		$data = array(static::_INVITED_BY => $userId, static::_COUPON_CODE => $couponCode, static::_INVITED_EMAIL => $email,
		static::_INVITATION_HASH => md5($hash), static::_MEMBERSHIP_TYPE => $membershipType,static::_STATUS => 1, static::_INVITATION_DATE => $date);
		
		$this->db->insert(static::_TABLE, $data);
		
		return $this->db->insert_id();
	}
	
	
	public function get_hash_by_id($id)
	{
		$response = array();
		
		$this->db->select(static::_INVITATION_HASH);
		$this->db->from(static::_TABLE);

		$this->db->where(static::_ID, $id);
		
		$query = $this->db->get()->row();   
		
		$response = $query->{static::_INVITATION_HASH};
		
		return $response;
	}
	
	public function validate_hash($hash)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		
		$this->db->where(static::_INVITATION_HASH, $hash);
		$this->db->where(static::_STATUS, 1);
		
		$response = $this->db->get()->row();
				
		return $response;
		
	}
	
	public function update_hash_status($hash)
	{
		$flag = false;
		
		$data = array(static::_STATUS => 0);
		$this->db->where(static::_INVITATION_HASH, $hash);
		
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag;
	}
		
}