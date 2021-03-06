<?php

class Pct_transaction extends CI_Model
{
    /*
     * Define table constants at the begining of class to ensure single
     * line of changes applies to whole class.
     */
    
    const _TABLE = 'pct_transactions';
    const _ID = 'id';
    const _FROM_USER = 'from_user';
    const _TO_USER = 'to_user';
    const _EVENT_ID = 'event_id';
    const _TXN_ID = 'txn_id';
    const _TXN_TYPE = 'txn_type';
    const _TXN_POINTS = 'txn_points';
    const _TXN_TOPIC = 'txn_topic';
    const _TXN_MESSAGE = 'txn_message';
    const _STATUS = 'status';
    const _DATE_CREATED = 'date_created';
    const _DATE_MODIFIED = 'date_modified';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function create_transaction($fromUser, $toUser, $txnId, $txnType, $txnPoints, $txnTopic = null, $txnMessage = null)
    {
        $data = array(
            static::_FROM_USER => $fromUser,
            static::_TO_USER => $toUser,
            static::_TXN_ID => $txnId,
            static::_TXN_TYPE => $txnType,
            static::_TXN_POINTS => $txnPoints,
            static::_TXN_TOPIC => $txnTopic,
            static::_TXN_MESSAGE => $txnMessage,
        );
        
        $this->db->insert(static::_TABLE, $data);
        return $this->db->insert_id();
    }
    
    public function update_transaction($type, $eventId, $id)
    {
        $data = array(static::_TXN_TYPE => $type, static::_EVENT_ID => $eventId);
        $this->db->where(static::_ID, $id);
        $this->db->update(static::_TABLE, $data);
    }
    
    public function get_transactions($userId)
    {
        $this->db->where(static::_FROM_USER, $userId);
        $this->db->or_where(static::_TO_USER, $userId);
        $this->db->from(static::_TABLE);
        return $this->db->get()->result();
    }
    
    
}