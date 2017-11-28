<?php

class User_subscription extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'user_subscription';
	const _ID = 'id';
	const _TXN_ID = 'txn_id';
	const _USER_ID = 'user_id';
	const _ITEM_ID = 'item_id';
	const _ITEM_NAME = 'item_name';
	const _CATEGORY_ID = 'category_id';
	const _GROSS_AMOUNT = 'gross_amount';
	const _PAYMENT_MODE = 'payment_mode';
	const _CURRENCY = 'currency';
	const _PAYER_EMAIL = 'payer_email';
	const _SUBSCRIPTION_DATE = 'subscription_date';
	const _SUBSCRIPTION_EXPIRY = 'subscription_expiry';
	const _SUBSCRIPTION_TYPE = 'subscription_type';
		
	public function __construct()
	{
		parent::__construct();
	}
				
	public function create_subscription($txnId, $userId, $itemId, $itemName, $itemType, $grossAmount, $currency, $payerEmail, $date, $expiry, $paymentMode, $type=null)
	{
		$data = array(
				static::_TXN_ID=>$txnId, 
		        static::_USER_ID=>$userId, 
		        static::_ITEM_ID=>$itemId,
				static::_ITEM_NAME=>$itemName, 
		        static::_CATEGORY_ID=>$itemType, 
		        static::_GROSS_AMOUNT=>$grossAmount,
		        static::_PAYMENT_MODE => $paymentMode,
				static::_CURRENCY=>$currency, 
		        static::_PAYER_EMAIL=>$payerEmail, 
		        static::_SUBSCRIPTION_DATE=>$date,
				static::_SUBSCRIPTION_EXPIRY=>$expiry, 
		        static::_SUBSCRIPTION_TYPE=>$type
			);
		
		$this->db->insert(static::_TABLE, $data);
		
		return $this->db->insert_id();
	}
	
	public function get_subscriptions()
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->order_by(static::_ID, 'DESC');
		$response = $this->db->get()->result();
		
		return $response;
	}
	
	public function get_subscription_by_user_id($userId)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_USER_ID,$userId);
		$response = $this->db->get()->result();
		
		return $response;
	}
}