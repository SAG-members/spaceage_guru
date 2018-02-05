<?php

class Cometchat_engine
{
//     const API_KEY = 'c1643e81968324d2058a4afc5b1c1f5a';
    const API_KEY = '943b5f7ebe8a924d1f31277a38da888a';
    public function process($fields)
	{
	    $url = base_url('cometchat/api/index.php');
	      
	    $fields_string = '';
	    
	    foreach($fields as $key=>$value) { 
	        $fields_string .= $key.'='.($value).'&'; 
	    }
	    
	    $fields_string = rtrim($fields_string, '&');
	    
	    
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL,$url);
	    curl_setopt($ch, CURLOPT_POST, 1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS,$fields_string);
	    curl_setopt($ch,CURLOPT_HTTPHEADER,array('api-key: API_KEY'));
	    $result = curl_exec($ch);
	    
	    if (empty($result)) {
	        die(curl_error($ch));
	    }
	    
	    curl_close ($ch);
	    return $result;
	}
	
	public function create_group($groupId, $groupName, $groupType, $groupPassword = null)
	{
	    $fields = array("action"=>"creategroup","api-key"=>static::API_KEY, "groupid"=>$groupId, "groupname"=>$groupName, "grouptype"=>$groupType);
	    
	    if($groupType == 1) $fields["grouppassword"] = $groupPassword;	    
	    
	    return $this->process($fields);
	}
	
	public function delete_group()
	{
	    
	}
	
	public function add_user_to_group($groupId, $groupUsers)
	{
	    $fields = array("action"=>"addgroupusers","api-key"=>static::API_KEY, "groupid"=>$groupId, "users"=>$groupUsers);
	   
	    return $this->process($fields);
	}
}