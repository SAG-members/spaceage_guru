<?php

class Coupon_model extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	 
	const _TABLE = 'coupon';
	const _ID = 'id';
	const _COUPON_CODE = 'coupon_code';
	const _COUPON_TYPE = 'coupon_type';
	const _MEMBERSHIP_TYPE = 'membership_type';
	const _TIME_OF_VALIDATION = 'time_of_validation';
	const _CLUB_CREDIT = 'club_credit';
	const _CREATED_BY = 'created_by';
	const _STATUS = 'status';
	const _CREATED_DATE = 'created_date';
	const _EXPIRY_DATE = 'expiry_date';
	
	const COUPON_ONE_MONTH_FREE = 1;
	const COUPON_LIFE_TIME_FREE = 2;
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function create_new_coupon($userId, $couponCode, $couponType, $membershipType, $time, $clubCredit)
	{
		$date = new DateTime();
		$date = $date->format('Y-m-d H:i:s');
		
		$expiry = new DateTime();
		$expiry->add(new DateInterval('P'.$time.'D')); # Set Expiry Date to current date + 8 days
		$expiry = $expiry->format('Y-m-d H:i:s');
		
		$data = array(
				static::_COUPON_CODE=>$couponCode, 
				static::_COUPON_TYPE=>$couponType,
				static::_MEMBERSHIP_TYPE=>$membershipType,
				static::_TIME_OF_VALIDATION=> $time ." days",
				static::_CLUB_CREDIT=> $clubCredit,
				static::_CREATED_BY=>$userId,
				static::_STATUS=>1, static::_CREATED_DATE=>$date, 
				static::_EXPIRY_DATE=>$expiry
		);
		
		$this->db->insert(static::_TABLE, $data);
		return $this->db->insert_id();
		
	}
	
	public function update_coupon($couponId, $couponCode, $couponType, $membershipType, $time, $clubCredit)
	{
		$flag = false;
		
		$date = new DateTime();
		$date = $date->format('Y-m-d H:i:s');
		
		$expiry = new DateTime();
		$expiry->add(new DateInterval('P'.$time.'D')); # Set Expiry Date to current date + 8 days
		$expiry = $expiry->format('Y-m-d H:i:s');
		
		$data = array(
				static::_COUPON_CODE=>$couponCode,
				static::_COUPON_TYPE=>$couponType,
				static::_MEMBERSHIP_TYPE=>$membershipType,
				static::_TIME_OF_VALIDATION=> $time ." days",
				static::_CLUB_CREDIT=> $clubCredit,
				static::_STATUS=>1, 
				static::_EXPIRY_DATE=>$expiry
		);
		 
		$this->db->where(static::_ID, $couponId);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag; 
	}
	
	public function get_coupon_by_id($couponId)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_ID, $couponId);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0) $response = $query->row();
			
		return $response;
	}
	
	public function get_coupons()
	{
		$response = array();
				
		$this->db->from(static::_TABLE);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0) $response = $query->result();
			
		return $response;
	}
	
	public function get_coupon_array()
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0) 
		{
			foreach ($query->result() as $r)
			{				
				$response = $r->{static::_COUPON_CODE};
			}
		}
				
		return $response;
	}
	
	public function validate_coupon_code($couponCode)
	{
		$date = new DateTime();
		$date = $date->format('Y-m-d H:i:s');
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_COUPON_CODE, $couponCode);
		$this->db->where(static::_EXPIRY_DATE ." >=" .$this->db->escape($date));
		$query = $this->db->get();
				
		return $query->result();
	}
		
}