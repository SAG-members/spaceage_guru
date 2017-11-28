<?php

class Psss_purchase_history extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'psss_purchase_history';
	const _ID = 'id';
	const _TXN_ID = 'txn_id';
	const _USER_ID = 'user_id';
	const _ITEM_ID = 'item_id';
	const _ITEM_NAME = 'item_name';
	const _CATEGORY_ID = 'category_id';
	const _PAYMENT_MODE = 'payment_mode';
	const _GROSS_AMOUNT = 'gross_amount';
	const _CURRENCY = 'currency';
	const _PAYER_EMAIL = 'payer_email';
	const _PURCHASE_DATE = 'purchase_date';
			
	
	public function __construct()
	{
		parent::__construct();
	}
				
	public function create_purchase_history($txnId, $userId, $itemId, $itemName, $itemType, $grossAmount, $currency, $payerEmail, $paymentMode)
	{
		$date = new DateTime();
		
		$date = $date->format('Y-m-d H:i:s');
		
		$data = array(
				static::_TXN_ID=>$txnId, 
		        static::_USER_ID=>$userId, 
		        static::_ITEM_ID=>$itemId,
				static::_ITEM_NAME=>$itemName, 
		        static::_CATEGORY_ID=>$itemType, 
		        static::_GROSS_AMOUNT=>$grossAmount,
				static::_CURRENCY=>$currency, 
		        static::_PAYER_EMAIL=>$payerEmail, 
		        static::_PURCHASE_DATE=>$date,
		        static::_PAYMENT_MODE => $paymentMode
			);
		
		$this->db->insert(static::_TABLE, $data);
		
		return $this->db->insert_id();
	}
	
	public function get_psss_history()
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->order_by(static::_ID, 'DESC');
		$response = $this->db->get()->result();
		
		return $response;
	}
	
	public function get_psss_by_user_id($userId)
	{
		$response = array();
		
		$this->db->select('B.*');
		$this->db->from('page A ');
		$this->db->join('psss_purchase_history B', 'B.item_id = A.id');
		$this->db->where('B.user_id', $userId);
		
		$response = $this->db->get()->result();
						
		return $response;
	}
	
	public function check_if_pss_available($condition)
	{
	    $this->db->select('*');
	    $this->db->from(static::_TABLE);
	    $this->db->where($condition);
	    
	    return $this->db->get()->row();
	}
	
	public function change_psss_ownership($userId, $dataId)
	{
	    $data = array(static::_USER_ID => 1);
	    $this->db->where(static::_USER_ID, $userId);
	    $this->db->where(static::_ITEM_ID, $dataId);
	    
	    $this->db->update(self::_TABLE, $data);
	    return $this->db->affected_rows();
	}

}