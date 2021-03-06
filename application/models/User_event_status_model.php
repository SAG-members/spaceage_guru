<?php

class User_event_status_model extends CI_Model
{
    /*
     * Define table constants at the begining of class to ensure single
     * line of changes applies to whole class.
     */
    
    const _TABLE = 'user_events_status';
    const _ID = 'id';
    const _EVENT_ID = 'event_id';
    const _USER_ID = 'user_id';
    const _STATUS = 'status';
    const _DATE_CREATED = 'date_created';
    
    const STATUS_DECLINE = 1;
    const STATUS_YIELD_SMART_CONTRACT = 2;
    const STATUS_YIELD_ESCROW = 3;
    const STATUS_RECOMMEND = 4;
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function register_event_status($eventId, $userId, $status)
    {
        $criteria = array(static::_EVENT_ID=>$eventId, static::_USER_ID=>$userId);
        
        $count = $this->get_by_criteria($criteria);
        
        if(count($count) > 0) {
            $this->remove_by_criteria($criteria);            
        }
        
        $data = array(
            static::_EVENT_ID => $eventId,
            static::_USER_ID => $userId,
            static::_STATUS => $status
        );
        
        $this->db->insert(static::_TABLE, $data);
        return $this->db->insert_id();
    }
    
    public function get_by_id($eventId, $userId)
    {
        $this->db->from(STATIC::_TABLE);
        $this->db->where(static::_EVENT_ID, $eventId);
        $this->db->where(static::_USER_ID, $userId);
        return $this->db->get()->num_rows(); 
    }
    
    public function get_by_user_and_status($userId, $status)
    {
        $this->db->from(STATIC::_TABLE);
        $this->db->where(static::_USER_ID, $userId);
        $this->db->where(static::_STATUS, $status);
        return $this->db->get()->result();
    }
    
    public function remove_by_criteria($criteria){
        $this->db->where($criteria);
        $this->db->delete(static::_TABLE);
    }
    
    public function get_by_criteria($criteria){
        $this->db->from(STATIC::_TABLE);
        $this->db->where($criteria);
        return $this->db->get()->result();
    }
    
    public function update_by_criteria($data, $criteria){
        $this->db->select(static::_TABLE);
        $this->db->where($criteria);
        $this->db->update(static::_TABLE, $data);
        
        return $this->db->affected_rows();
    }
    
}