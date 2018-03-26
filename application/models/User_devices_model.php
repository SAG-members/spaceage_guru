<?php

class User_devices_model extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'user_devices';
	const _ID = 'id';
	const _USER_ID = 'user_id';
	const _DEVICE_ID = 'device_id';
	const _DEVICE_TOKEN = 'device_token';
	const _DEVICE_TYPE = 'device_type';
	const _DATE_CREATED = 'date_created';
	
	
	const DEVICE_TYPE_ANDRIOD = 1;
	const DEVICE_TYPE_IOS = 2;
	
	public function __construct()
	{
		parent::__construct();
	}

	public function register_user_device($userId, $deviceId, $deviceToken, $deviceType)
	{
	    $date = new DateTime();
	    $date = $date->format('Y-m-d H:i:s');
	    
		$data = array(
		        static::_USER_ID => $userId, 
		        static::_DEVICE_ID => $deviceId, 
		        static::_DEVICE_TOKEN => $deviceToken, 
		        static::_DEVICE_TYPE => $deviceType,
		        static::_DATE_CREATED => $date
		);
		
		$this->db->insert(static::_TABLE, $data);
		return $this->db->insert_id();
		
	}
	
	public function update_user_device($userId, $deviceId, $deviceToken, $deviceType)
	{
	    $result = $this->get_device($userId, $deviceToken);
	    if(empty($result))
	    {
	        return $this->register_user_device($userId, $deviceId, $deviceToken, $deviceType);
	    }
	    return true;
	}
	
	public function get_device($userId, $deviceToken=null)
	{
	    $this->db->select(static::_DEVICE_TOKEN);
		$this->db->from(static::_TABLE);
		$this->db->where(static::_USER_ID, $userId);
		if($deviceToken) $this->db->where(static::_DEVICE_TOKEN, $deviceToken);
		$response = $this->db->get()->result();
		
	    return $response;
	}
	
			
}