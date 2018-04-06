<?php

class Country extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'country';
	const _ID = 'id';
	const _COUNTRY_CODE = 'country_code';
	const _COUNTRY_NAME = 'country_name';
	const _status = 'status';
	const _COLOR_FLAG = 'color_flag';
	const _IS_GROUP = 'is_group';
	const _COUNTRY_IMAGE = 'country_image';
	const _DATE_CREATED = 'date_created';
	
	public function __construct()
	{
		parent::__construct();
				
	}

	public function getCountries()
	{
		$response = array();
		
// 		$query = $this->db->get(Country::_TABLE);

		$this->db->from(Country::_TABLE);
		$this->db->order_by(Country::_COLOR_FLAG, "desc");
		$query = $this->db->get();
		
		
		foreach ($query->result() as $row)
		{
			$output['id'] = $row->id;
			$output['code'] = $row->country_code;
			$output['name'] = $row->country_name;
			$output['flag'] = $row->color_flag;
		
			$response[] = $output;
		}
		
		return $response;
		
	}
	
	public function get_by_id($id, $field=null)
	{
	    $response = array();
	    
	    $this->db->from(Country::_TABLE);
	    $this->db->where(static::_ID, $id);
	    if($field) return $this->db->get()->row()->{$field};
	    return $this->db->get()->row();
	    
	}
	
	public function get_country_by_id($id)
	{
		$response = array();
		
		$this->db->from(Country::_TABLE);
		$this->db->where(static::_ID, $id);
		$query = $this->db->get();
				
		if($query->num_rows() > 0) return $query->row()->{static::_COUNTRY_NAME};
		
		return $response;
		
	}
	
	public function get_country_ids()
	{
		$response = array();
		
		$this->db->select(static::_ID);
		$this->db->from(Country::_TABLE);
		$query = $this->db->get();
		
		if($query->num_rows() > 0) 
		{
			foreach ($query->result() as $r)
			{	
				$response[] = $r->{static::_ID};
			}
		}
		$ids = implode(',', $response);
		return $ids;
	}
	
	public function get_country_name($id)
	{
	    $this->db->select('country_name');
	    $this->db->from(static::_TABLE);
	    $this->db->where(static::_ID, $id);
	    return $this->db->get()->row()->{static::_COUNTRY_NAME};
	}
}