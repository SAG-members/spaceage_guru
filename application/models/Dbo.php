<?php

class Dbo extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	
	private $data = array();
			
	public function __construct()
	{
		parent::__construct();
	}
	
	protected function set($key, $value)
	{
		$this->data[$key] = $value;
	}
	
	protected function get($key)
	{
		return $this->data[$key];
	}
			
	protected function get_one()
	{
		
	}
	
	public function get_all()
	{
		$response = array();
		
		$this->db->from($table);
		$this->db->where($condition);
		$this->db->order_by('id', 'DESC');
		$response = $this->db->get()->result();
		
		return $response;
	}
	
}