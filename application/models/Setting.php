<?php

class Setting extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'setting';
	const _ID = 'id';
	const _MODE = 'mode';
	const _CONFIGURATION = 'configuration';
		
	
	public function __construct()
	{
		parent::__construct();
				
	}
	
	public function update_settings($id=null, $mode, $config)
	{
		$flag = false;
		
		$data = array(
			static::_MODE => $mode,
			static::_CONFIGURATION => $config
		);
		
		if($id)
		{
			
			$flag = $this->db->update(static::_TABLE, $data);
			
			return $flag;
		}
		else
		{
			$this->db->insert(static::_TABLE, $data);
			return $this->db->last_id();
		}
		
	}
	
	public function get_settings()
	{
		$this->db->from(static::_TABLE);
		return $this->db->get()->row();
	}
	
}