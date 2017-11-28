<?php

class Membership extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'membership';
	const _ID = 'id';
	const _MEMBERSHIP_TITLE = 'membership_title';
	const _MEMBERSHIP_DESCRIPTION = 'membership_description';
	const _MEMBERSHIP_TITLE_SLUG = 'membership_title_slug';
	const _MEMBERSHIP_TYPE = 'membership_type';
	const _MEMBERSHIP_MONTHLY_PRICE = 'membership_monthly_price';
	const _MEMBERSHIP_QUARTERLY_PRICE = 'membership_quarterly_price';
	const _MEMBERSHIP_YEARLY_PRICE = 'membership_yearly_price';
	const _UNIT_PRICE = 'unit_price';
	const _CREDIT_POINT = 'credit_point';
	const _MAX_UNIT = 'max_unit';
	const _TOTAL_MAX_AMOUNT = 'total_max_amount';
	const _MEMBERSHIP_LOGO = 'membership_logo';
	const _USER_ID = 'user_id';
	const _CATEGORY_ID = 'category_id';
	const _PARENT_ID = 'parent_id';
	const _STATUS = 'status';
	const _DATE_CREATED = 'date_created';
	const _DATE_MODIFIED = 'date_modified'; 

	const _CATEGORY_SERVICE = 1;
	const _CATEGORY_PRODUCT = 2;
	const _CATEGORY_MEMBERSHIP = 3;
	const _CATEGORY_SYMPTOM = 10;
	
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function create_new_membership($userId, $title, $description, $monthlyPrice, $quartelyPrice, $yearlyPrice, $logo, $unitPrice, $creditPoints, $maxUnits, $parentId, $membershipType, $totalMaxAmount)
	{
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
	
		$data = array(
				static::_USER_ID=>$userId,
				static::_MEMBERSHIP_TYPE=>$membershipType,
				static::_MEMBERSHIP_TITLE=>$title,
				static::_MEMBERSHIP_DESCRIPTION=>$description,
				static::_MEMBERSHIP_TITLE_SLUG=>create_slug($title),
				static::_MEMBERSHIP_MONTHLY_PRICE=>$monthlyPrice,
				static::_MEMBERSHIP_QUARTERLY_PRICE=>$quartelyPrice,
				static::_MEMBERSHIP_YEARLY_PRICE=>$yearlyPrice,
				static::_UNIT_PRICE => $unitPrice,
				static::_CREDIT_POINT => $creditPoints,
				static::_MAX_UNIT => $maxUnits,
		        static::_TOTAL_MAX_AMOUNT => $totalMaxAmount,
				static::_MEMBERSHIP_LOGO=>$logo,
				static::_CATEGORY_ID=>static::_CATEGORY_MEMBERSHIP,
				static::_PARENT_ID=>$parentId,
				static::_STATUS=>1,
				static::_DATE_CREATED=>$date,
		);
		
		$this->db->insert(static::_TABLE, $data);
		
		
		
		
		return $this->db->insert_id();
	}
	
	public function update_membership($membershipId, $title, $description, $monthlyPrice, $quartelyPrice, $yearlyPrice, $logo, $unitPrice, $creditPoints, $maxUnits, $parentId, $membershipType, $totalMaxAmount)
	{
		$flag = false;
		
		$result = $this->get_membership_by_id($membershipId);
		
		$membershipLogo = $logo == '' ? $result->{static::_MEMBERSHIP_LOGO} : $logo;
		
		
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
	
		$data = array(
				static::_MEMBERSHIP_TITLE=>$title,
				static::_MEMBERSHIP_TYPE => $membershipType,
				static::_MEMBERSHIP_DESCRIPTION=>$description,
				static::_MEMBERSHIP_TITLE_SLUG=>create_slug($title),
				static::_MEMBERSHIP_MONTHLY_PRICE=>$monthlyPrice,
				static::_MEMBERSHIP_QUARTERLY_PRICE=>$quartelyPrice,
				static::_MEMBERSHIP_YEARLY_PRICE=>$yearlyPrice,
				static::_MEMBERSHIP_LOGO=>$membershipLogo,
				static::_UNIT_PRICE => $unitPrice,
		        static::_TOTAL_MAX_AMOUNT => $totalMaxAmount,
				static::_PARENT_ID => $parentId,
				static::_CREDIT_POINT => $creditPoints,
				static::_MAX_UNIT => $maxUnits,
				static::_DATE_MODIFIED=>$date,
		);
		
		$this->db->where(static::_ID, $membershipId);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag;
			
	}
	
	public function get_membership_count()
	{
		$response = array();
		
		$this->db->select(static::_ID);
		$this->db->from(static::_TABLE);
		$query = $this->db->get();
		
		return $query->num_rows();
	}
	
	public function get_memberships($search, $userId, $limit, $offset)
	{
		$response = array();
		
		$this->db->select('*');
		$this->db->from(static::_TABLE);
		if(!empty($search))
		{
			$this->db->where(static::_MEMBERSHIP_TITLE , $search);
			$this->db->where(static::_MEMBERSHIP_DESCRIPTION , $search);
		}
		
		if($limit !=''){$this->db->limit($limit, $offset); }
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0) $response = $query->result();
				
		return $response;
	}
	
	public function get_membership_by_id($membershipId)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_ID,$membershipId);
		$query = $this->db->get();
		
		$response = $query->row();
				
		return $response;
		
	}
	
	public function get_membership_by_slug($slug)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_MEMBERSHIP_TITLE_SLUG,$slug);
		$query = $this->db->get();
		
		$response = $query->row();
		
		return $response;
		
	}

	public function delete_membership_by_id($membershipId)
	{
		$flag = false;
		
		$this->db->where(static::_ID, $membershipId);
		$flag = $this->db->delete(static::_TABLE);
		
		return $flag;
	}
		
}