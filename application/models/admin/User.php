<?php

class User extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'user';
	const _ID = 'id';
	const _F_NAME = 'f_name';
	const _M_NAME = 'm_name';
	const _L_NAME = 'l_name';
	const _USERNAME = 'username';
	const _EMAIL = 'email';
	const _SECONDARY_EMAIL = 'secondary_email';
	const _PASSWORD = 'password';
	const _SECRET_QUESTION = 'secret_question';	 
	const _SECRET_QUESTION_ANSWER = 'secret_question_answer';
	const _AVATAR_NAME = 'avatar_name';
	const _AVATAR_IMAGE = 'avatar_image';
	const _WHAT_ARE_YOU = 'what_are_you';
	const _WHAT_YOU_WANT_TO_BECOME = 'what_you_want_to_become';
	const _USER_GROUP = 'user_group';
	const _USER_MEMBERSHIP_LEVEL = 'membership_level';
	const _MOBILE = 'mobile';
	const _STATUS = 'status';
	const _ADDRESS = 'address';
	const _COUNTRY = 'country'; 
	const _RECOMMENDOR = 'recommendor';
	const _IS_LOGGED_IN = 'is_logged_in';
	const _LOGGED_COOKIE = 'logged_cookie';
	const _DATE_CREATED = 'date_created';
	const _LAST_LOGIN = 'last_login';
	const _MODIFIED_BY = 'modified_by';
	const _MODIFIED_DATE = 'modified_date';
	
	const USER_GROUP_LEVEL_ADMINISTRATOR = 1;
	const USER_GROUP_LEVEL_USER = 2;
	
	const VISIBILITY_SIGNED_USER = 1;
	const VISIBILITY_REGISTERED_USER = 2;
	const VISIBILITY_UPGRADED_USER = 3;
	const VISIBILITY_MEMBERSHIP_A_USER = 4;
	const VISIBILITY_MEMBERSHIP_B_USER = 5;
	const VISIBILITY_MEMBERSHIP_C_USER = 6;
	
	const USER_LOGGED_IN = 1;
	const USER_LOGGED_OUT = 0;
	
	const USER_ACTIVE = 1;
	const USER_INACTIVE = 0;
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function test()
	{
		$this->get(User::_PASSWORD);
	}

	public function sign_in($username, $password)
	{
		$password = md5($password);
				
		$sql = " SELECT " . User::_ID . " FROM " . User::_TABLE . " WHERE " . User::_EMAIL . " =  ?  AND " . User::_PASSWORD . " =  ? ";
		$query = $this->db->query($sql, array($username, $password));
		
		$rows = $query->num_rows();
		
		if($rows == 1)
		{ 
			$userId = $query->row()->{User::_ID};
			
			$date = new DateTime();
			$date = $date->format('Y-m-d H:i:s');
			
			# User is Logged In Update Last Login Time and Logged In Status
			$data = array(User::_LAST_LOGIN => $date, User::_IS_LOGGED_IN =>  User::USER_LOGGED_IN);
			
			$this->db->where(static::_ID, $userId);
			$this->db->update(static::_TABLE, $data);
			
			return $userId; 
		}
		
		return false;
	}
	
	public function update_password($userId, $password)
	{
		$flag = false;
		$data = array(static::_PASSWORD=>md5($password));
			
		$this->db->where(static::_ID, $userId);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag;
	}
	
	public function update_user_profile($userId, $avaratName, $avatarImage, $fname, $lname, $secondaryEmail, $mobile, $whatAreYou, $whatYouWantToBecome, $country)
	{
		$flag = false;
		
		$result = $this->getUserProfile($userId);
		
		$data = array(
			static::_AVATAR_NAME => $avaratName == '' ? $result->{static::_AVATAR_NAME} :  $avaratName,
			static::_AVATAR_IMAGE => $avatarImage == '' ? $result->{static::_AVATAR_IMAGE} : $avatarImage ,
			static::_F_NAME => $fname == '' ? $result->{static::_F_NAME} : $fname,
			static::_L_NAME => $lname == '' ? $result->{static::_L_NAME} : $lname,
			static::_SECONDARY_EMAIL => $secondaryEmail = '' ? $result->{static::_SECONDARY_EMAIL} : $secondaryEmail,
			static::_MOBILE => $mobile == '' ? $result->{static::_MOBILE} : $mobile,
			static::_WHAT_ARE_YOU => $whatAreYou == '' ? $result->{static::_WHAT_ARE_YOU} : $whatAreYou,
			static::_WHAT_YOU_WANT_TO_BECOME => $whatYouWantToBecome == '' ? $result->{static::_WHAT_YOU_WANT_TO_BECOME} : $whatYouWantToBecome,
			static::_COUNTRY => $country == '' ? $result->{static::_COUNTRY} : $country
		);
		
		$this->db->where(static::_ID, $userId);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag;
	}
	
	public function getUserProfile($userId)
	{
		$response = array();
		
		$select = User::_ID .','. User::_EMAIL .','. User::_USER_GROUP . ','.User::_F_NAME . ','.User::_L_NAME. ',' .User::_AVATAR_IMAGE. ', '. User::_USERNAME;
		$this->db->select("$select");
		$this->db->from(User::_TABLE);
		$this->db->where(User::_ID, $userId);
		$query = $this->db->get();
			
		$row = $query->row();
				
		$response['id'] = $row->{User::_ID};
		$response['name'] = $row->{User::_F_NAME};
		$response['lname'] = $row->{User::_L_NAME};
		$response['user-name'] = $row->{User::_USERNAME};
		$response['email'] = $row->{User::_EMAIL};
		$response['avatar'] = $row->{User::_AVATAR_IMAGE};
		$response['user-group'] = $row->{User::_USER_GROUP};
		
		return $response;
		
	}
	
	public function getUserCount($userId)
	{
		$response = array();
		
		$this->db->select('*');
		$this->db->from(static::_TABLE);
		$this->db->where(static::_ID .' !=', $userId);
		$query = $this->db->get();
		
		return $query->num_rows();
	}
	
	public function getUsers($userId, $search=NULL, $limit=null, $offset=NULL)
	{
		$response = array();
		
		$this->db->select('*');
		$this->db->from(static::_TABLE);
		$this->db->where(static::_ID .' !=', $userId);
		if(!empty($search))
		{
			$this->db->where(static::_ID , $search);
			$this->db->where(static::_F_NAME , $search);
		}
		
		if($limit !=''){$this->db->limit($limit, $offset); }
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				$output = array();
				
				$output['id'] = $row->{User::_ID};
				$output['username'] = 'U'.(10000+$row->{User::_ID});
				$output['email'] = $row->{User::_EMAIL};
				$output['user-group'] = $row->{User::_USER_GROUP};
				$output['date_created'] = $row->{User::_DATE_CREATED};
				$output['status'] = $row->{User::_STATUS};
				$output['country'] = $row->{User::_COUNTRY};
	
				$response[] = $output;			
			}
		}
		
		return $response;
	}
	
	public function getUserById($userId)
	{
		$response = array();
		
		$this->db->select('*');
		$this->db->from(static::_TABLE);
		$this->db->where(static::_ID , $userId);
		$response = $this->db->get()->row();
		
		return $response;
	}
	
	public function deleteUserById($userId)
	{
		$flag = false;
		
		$this->db->where(static::_ID, $userId);
		$flag = $this->db->delete(static::_TABLE);
		
		return $flag;
	}
	
	public function activate_user($userId)
	{
		$flag = false;
		
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array( static::_MODIFIED_DATE=>$date, static::_STATUS=>static::USER_ACTIVE);
		$userIds = array_map('intval', explode(',', $userId));
		
		$this->db->where_in(static::_ID, $userIds);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag;
	}
	
	public function deactivate_user($userId)
	{
		$flag = false;
		
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array( static::_MODIFIED_DATE=>$date, static::_STATUS=>static::USER_INACTIVE);
		$userIds = array_map('intval', explode(',', $userId));
		
		$this->db->where_in(static::_ID, $userIds);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag;
	}
	
	public function sign_out($userId)
	{
		# User is Logged out Update Logged In Status
		$data = array(User::_IS_LOGGED_IN =>  User::USER_LOGGED_OUT);
			
		$this->db->where(static::_ID, $userId);
		$this->db->update(static::_TABLE, $data);
	}
	
	public function get_user_level($level)
	{
		$type = '';
		switch ($level)
		{
			case 1 : $type = 'Administrator'; break;
			case 2 : $type = 'User'; break;
		}
		
		return $type;
	}
	
	public function get_user_membership($membershipId)
	{
	    $type = "NA";
// 	    echo $membershipId;
		switch ($membershipId)
		{
			case 1 : $type = 'Singed In User'; break;
			case 2 : $type = 'Registered User'; break;
			case 3 : $type = 'Upgraded User'; break;
			case 4 : $type = 'Membership A'; break;
			case 5 : $type = 'Membership B'; break;
			case 6 : $type = 'Membership C'; break;
		}
	
		return $type;
	}
	
	public function update_user_membership($userId, $membershipId)
	{
	    $dateObj = new DateTime();
	    $date = $dateObj->format('Y-m-d H:i:s');
	
	    $data = array(User::_USER_MEMBERSHIP_LEVEL=>$membershipId);
	    $this->db->where(static::_ID, $userId);
	    $flag = $this->db->update(static::_TABLE, $data);
	
	    return $flag;
	}
	
	public function store_cookie_hash($hash, $userId)
	{
	    $data = array(static::_LOGGED_COOKIE => $hash);
	    
	    $this->db->where(static::_ID, $userId);
	    $this->db->update(static::_TABLE, $data);
	    
	    return $this->db->affected_rows();
	}
	
	public function remove_cookie_hash($userId)
	{
	    $data = array(static::_LOGGED_COOKIE => '');
	    
	    $this->db->where(static::_ID, $userId);
	    $this->db->update(static::_TABLE, $data);
	    
	    return $this->db->affected_rows();
	}
	
	public function validate_with_cookie($hash)
	{
	    $this->db->select('id, logged_cookie');
	    $this->db->where(static::_LOGGED_COOKIE, $hash);
	    $this->db->from(static::_TABLE);
	    return $this->db->get()->row();
	}
	
	public function update_login_status($userId)
	{
	    $data = array(static::_IS_LOGGED_IN => 0);
	    
	    $this->db->where(static::_ID, $userId);
	    $this->db->update(static::_TABLE, $data);
	    
	    return $this->db->affected_rows();
	}
		
}