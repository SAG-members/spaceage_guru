<?php

class Currency extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'currency';
	const _ID = 'id';
	const _NAME = 'name';
	const _CODE = 'code';
	const _DIAL_CODE = 'dial_code';
	const _CURRENCY_NAME = 'currency_name';
	const _CURRENCY_SYMBOL = 'currency_symbol';
	const _CURRENCY_CODE = 'currency_code';		
	
	public function __construct()
	{
		parent::__construct();
				
	}

	public function getCurrencies()
	{   
	    $this->db->select('ANY_VALUE(id) id, ANY_VALUE(name) name, ANY_VALUE(code) code, ANY_VALUE(currency_name) currency_name, ANY_VALUE(currency_symbol) currency_symbol, ANY_VALUE(currency_code) currency_code');
		$this->db->from(static::_TABLE);
		$this->db->group_by(static::_CURRENCY_CODE);
		return $this->db->get()->result();
		
	}
	
	public function get_by_id($id, $field=null)
	{
	    $this->db->where(static::_ID, $id);
	    $this->db->from(static::_TABLE);
	    
	    if(!empty($field)) return $this->db->get()->row()->{$field};
	    return $this->db->get()->row();
	}	
}