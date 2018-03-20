<?php
 
class Country_model extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'country';
	const _ID = 'id';
	const _COUNTRY_CODE = 'country_code';
	const _COUNTRY_NAME = 'country_name';
	const _COLOR_FLAG = 'color_flag';
	const _STATUS = 'status';
	const _IS_GROUP = 'is_group';
	const _COUNTRY_IMAGE = 'country_image';
	const _DATE_CREATED	= 'date_created';
	
	const PUBLISH_COUNTRY = 1;
	const UNPUBLISH_COUNTRY = 0;
	
	public function __construct()
	{
		parent::__construct();
				
	}
	
	public function create_new_country($countryCode, $countryName, $highlightCountry, $isGroup = 0, $countryImage)
	{
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array(
				static::_COUNTRY_CODE=>$countryCode,
				static::_COUNTRY_NAME=>$countryName,
				static::_COLOR_FLAG=>$highlightCountry,
		        static::_IS_GROUP=>$isGroup,
		        static::_COUNTRY_IMAGE => $countryImage
		);
		
		$this->db->insert(static::_TABLE, $data);
		return $this->db->insert_id();
	}
	
	public function update_country($countryId, $countryName, $countryCode, $highlightCountry, $isGroup, $countryImage)
	{
		$flag = false;
		
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array(
				static::_COUNTRY_CODE=>$countryCode,
				static::_COUNTRY_NAME=>$countryName,
				static::_COLOR_FLAG=>$highlightCountry,
		        static::_IS_GROUP => $isGroup,
		        static::_COUNTRY_IMAGE => $countryImage
		);
		
		$this->db->where(static::_ID, $countryId);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag;
	}
	
	public function get_countries_count()
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$query = $this->db->get();
		
		$response = $query->num_row();
		
		return $response;
	}

	public function get_countries()
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$response = $this->db->get()->result();
				
		return $response;
		
	}
	
	public function get_country_by_id($countryId)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_ID, $countryId);
		
		$response = $this->db->get()->row();
		
		return $response;
	}
	
	public function delete_country_by_id($countryId)
	{
		$flag = false;
		
		$this->db->where(static::_ID, $countryId);
		$flag = $this->db->delete(static::_TABLE);
		
		return $flag;
	}
	
	public function publish_contries($countryId)
	{
		$flag = false;
		
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array(static::_STATUS=>static::PUBLISH_COUNTRY);
		$countryIds = array_map('intval', explode(',', $countryId));
		
		$this->db->where_in(static::_ID, $countryIds);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag;
	}
	
	public function unpublish_countries($countryId)
	{
		$flag = false;
		
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array( static::_STATUS=>static::UNPUBLISH_COUNTRY);
		$countryIds = array_map('intval', explode(',', $countryId));
		
		$this->db->where_in(static::_ID, $countryIds);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag;
	}
	
	public function get_country_name($id)
	{
	    $this->db->select('country_name');
	    $this->db->from(static::_TABLE);
	    $this->db->where(static::_ID, $id);
	    $query = $this->db->get()->row();
	    return $query;
	}
}