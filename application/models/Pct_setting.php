<?php

class pct_setting extends CI_Model
{
    /*
     * Define table constants at the begining of class to ensure single
     * line of changes applies to whole class.
     */
    
    const _TABLE = 'pct_setting';
    const _ID = 'id';
    const _PCT_RATE = 'pct_rate';
    const _CURRENCY = 'real_currency';
    const _CONVERSION_RATE = 'conversion_rate';   
    const _STATUS = 'status';
    const _DATE_CREATED = 'date_created';
    
    
    public function __construct()
    {
        parent::__construct();
    }   
    
    public function set_pct_rate($pctRate, $currency, $conversionRate)
    {
        $this->update_pct_rate_status($currency);
        
        $data = array(
            static::_PCT_RATE => $pctRate,
            static::_CURRENCY => $currency,
            static::_CONVERSION_RATE => $conversionRate,
            static::_STATUS => 1,
        );
        
        $this->db->insert(static::_TABLE, $data);
        return $this->db->insert_id();
    }
    
    public function get_rates($admin=false)
    {
        $this->db->from(static::_TABLE); 
        if(!$admin)$this->db->where(static::_STATUS, 1);
        $this->db->order_by(static::_DATE_CREATED, "DESC");
        
        return $this->db->get()->result();        
    }
    
    public function update_pct_rate_status($currency)
    {
        $data = array(static::_STATUS => 0);
        $this->db->where(static::_CURRENCY, $currency);
        $this->db->update(static::_TABLE, $data);
        
        return $this->db->affected_rows();
    }
    
    
    
}