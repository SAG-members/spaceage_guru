<?php

class Membership_model extends CI_Model
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
	const _CATEGORY_FAQ = 4;
	const _CATEGORY_SYMPTOM = 5;
	const _CATEGORY_FAQ_ANSWER = 6;
	const _CATEGORY_SYMPTOM_ANSWER = 7;
	const _CATEGORY_SENSES = 8;
	
	public function __construct()
	{
		parent::__construct();
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
		
	public function get_membership_by_slug($slug)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_MEMBERSHIP_TITLE_SLUG,$slug);
		$query = $this->db->get();
		
		$response = $query->row();
		
		return $response;
		
	}

	public function get_membership_by_id($id)
	{
		$response = array();
	
		$this->db->from(static::_TABLE);
		$this->db->where(static::_ID,$id);
		$query = $this->db->get();
		
		$response = $query->row();
	
		return $response;
	
	}
	
	public function get_member_logo($membershipType)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_MEMBERSHIP_TYPE,$membershipType);
		
		$query = $this->db->get()->row();
		
		$response = $query->{Membership_model::_MEMBERSHIP_LOGO};
		
		return $response;
		
	}
	
	public function get_shop_products($membershipLevel) 
	{
		$response = array();
		
// 		if($membershipLevel == 1) 
// 		{
// 			return $response;
// 		}
// 		else 
// 		{
// 		    $membershipLevel = $membershipLevel+1; 
		    
// 		    $this->db->select('id, membership_title, membership_title_slug, membership_monthly_price, membership_yearly_price, unit_price, parent_id');
// 		    $this->db->from(static::_TABLE);
// 		    $this->db->where(static::_MEMBERSHIP_TYPE . '='. $membershipLevel);
// 			$this->db->or_where(static::_MEMBERSHIP_TYPE,7);
// 			$this->db->or_where(static::_MEMBERSHIP_TYPE,1);
// 			$this->db->where(static::_PARENT_ID , 0);
// 		}	
				
        $membershipLevel = $membershipLevel+1;

	    $this->db->select('id, membership_title, membership_title_slug, membership_monthly_price, membership_yearly_price, unit_price, parent_id');
	    $this->db->from(static::_TABLE);
	    $this->db->where(static::_MEMBERSHIP_TYPE . '='. $membershipLevel);
		$this->db->or_where(static::_MEMBERSHIP_TYPE,7);
		$this->db->or_where(static::_MEMBERSHIP_TYPE,1);
		$this->db->where(static::_PARENT_ID , 0);

		$response = $this->db->get()->result();
		
		return $response;
	}
	
	public function get_child_products($parentId)
	{   
	    $this->db->from(static::_TABLE);
	    $this->db->where(static::_PARENT_ID, $parentId);
	    
	    return $this->db->get()->result();
	    
	}
}