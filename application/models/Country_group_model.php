<?php

class Country_group_model extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'country_group';
	const _ID = 'id';
	const _GROUP_ID = 'group_id';
	const _COUNTRY_ID = 'country_id';
	const _DATE_CREATED = 'date_created';
	
	public function __construct() { parent::__construct(); }
	
	public function create_new_group($groupId, $countryId)
	{
	    $dateObj = new DateTime();
	    $date = $dateObj->format('Y-m-d H:i:s');
	   
	    if($this->get_group_countries($groupId)){
	        $data = array(
	                static::_COUNTRY_ID=>$countryId,
	                static::_DATE_CREATED=>$date,
	        );
	        
	        $this->db->where(static::_GROUP_ID, $groupId);
	        
	        $this->db->update(static::_TABLE, $data);
	        return $this->db->affected_rows();
	         
	    }
	    else{
	        $data = array(
	                static::_GROUP_ID=>$groupId,
	                static::_COUNTRY_ID=>$countryId,
	                static::_DATE_CREATED=>$date,
	        );
	        
	        $this->db->insert(static::_TABLE, $data);
	        return $this->db->insert_id();
	         
	    }
	    
	}
	
	public function get_group_countries($groupId){
	    $response = array();
	    
	    $this->db->from(static::_TABLE);
	    $this->db->where(static::_GROUP_ID, $groupId);
	    
	    $response = $this->db->get()->row();
	    
	    return $response;
	}
}