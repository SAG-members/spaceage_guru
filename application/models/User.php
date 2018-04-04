<?php

class User extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'user';
	const _ID = 'id';
	const _PCT_WALLET_AMOUNT = 'pct_wallet_amount';
	const _F_NAME = 'f_name';
	const _M_NAME = 'm_name';
	const _L_NAME = 'l_name';
	const _E_WALLET_ADDRESS = 'e_wallet_address';
	const _USERNAME = 'username';
	const _EMAIL = 'email';
	const _SECONDARY_EMAIL = 'secondary_email';
	const _PASSWORD = 'password';
	const _SECRET_QUESTION = 'secret_question';	 
	const _SECRET_QUESTION_ANSWER = 'secret_question_answer';
	const _AVATAR_NAME = 'avatar_name';
	const _AVATAR_IMAGE = 'avatar_image';
	const _GENDER = 'gender';
	const _WHAT_ARE_YOU = 'what_are_you';
	const _WHAT_YOU_WANT_TO_BECOME = 'what_you_want_to_become';
	const _WHAT_DO_YOU_NEED = 'what_do_you_need';
	const _PROBLEM_PREVENTING = 'problem_preventing';
	const _USER_GROUP = 'user_group';
	const _USER_MEMBERSHIP_LEVEL = 'membership_level';
	const _MOBILE = 'mobile';
	const _STATUS = 'status';
	const _ADDRESS = 'address';
	const _COUNTRY = 'country'; 
	const _HOME_ADDRESS = 'home_address'; 
	const _HOME_LAT = 'home_lat'; 
	const _HOME_LNG = 'home_lng'; 
	const _WORK_ADDRESS = 'work_address'; 
	const _WORK_LAT = 'work_lat'; 
	const _WORK_LNG = 'work_lng'; 
	const _CURRENCY = 'currency'; 
	const _RECOMMENDOR = 'recommendor';
	const _EVENT_DEFAULT_ADDRESS = 'event_default_address';
	const _OFFER_IN_RADIUS = 'offer_in_radius';
	const _IS_LOGGED_IN = 'is_logged_in';
	const _LOGGED_COOKIE = 'logged_cookie';
	const _DATE_CREATED = 'date_created';
	const _LAST_LOGIN = 'last_login';
	const _SUGGESTION_REQUIRED = 'suggestion_required';
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
	
	const GENDER_MALE = 1;
	const GENDER_FEMALE = 2;
	const GENDER_TRANSGENDER = 3;
	
	const EVENT_HOME_LOCATION = 1;
	const EVENT_WORK_LOCATION = 2;
	const EVENT_CURRENT_LOCATION = 3;
	
	public function __construct()
	{
		parent::__construct();
				
		$this->load->model('user');
		$this->load->model('user_questionnaire', 'question');
	}
    
	public function update_pct_wallet_amount($id, $amount)
	{	    
	    $data = array(static::_PCT_WALLET_AMOUNT => $amount);
	    
	    $this->db->where(static::_ID, $id);
	    $this->db->update(static::_TABLE, $data);
	    $this->db->affected_rows();
	    
	}
	
	public function sign_in($username, $password)
	{
		$password = md5($password);
				
		$sql = " SELECT " . User::_ID . " FROM " . User::_TABLE . " WHERE (" . User::_USERNAME . " =  ? OR " . User::_AVATAR_NAME . " = ? ) AND " . User::_PASSWORD . " =  ? ";
		$query = $this->db->query($sql, array($username, $username, $password));
				
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
	
	/* Since we are following ne signup process, new method is implemented*/
	
	public function sign_up($recommendor, $country, $avatarName, $avatarImage, $gender, $whatAreYou, $whatYouWantToBecome, $problemPreventing, $password, $securityQuestion, $securityQuestionAnswer, $suggestionRequired, $whatDoYouNeed = null)
	{
		$date = new DateTime();
		$date = $date->format('Y-m-d H:i:s');
		
		$data = array(
				User::_RECOMMENDOR => $recommendor,
				User::_COUNTRY => $country,
				User::_AVATAR_NAME=>$avatarName,
				User::_AVATAR_IMAGE=>$avatarImage,
				User::_USERNAME=>generate_user_id($this->getLastCreatedUser()+1),
		        User::_GENDER => $gender,
				User::_WHAT_ARE_YOU=>$whatAreYou,
				User::_WHAT_YOU_WANT_TO_BECOME=>$whatYouWantToBecome,
		        User::_WHAT_DO_YOU_NEED => $whatDoYouNeed,
		        User::_PROBLEM_PREVENTING => $problemPreventing,
				User::_PASSWORD=>md5($password),
				User::_SECRET_QUESTION=>$securityQuestion,
				User::_SECRET_QUESTION_ANSWER=>md5($securityQuestionAnswer),
				User::_USER_GROUP=>User::USER_GROUP_LEVEL_USER,
				User::_USER_MEMBERSHIP_LEVEL=>User::VISIBILITY_SIGNED_USER,
		        User::_SUGGESTION_REQUIRED => $suggestionRequired, 
				User::_STATUS=>1,
				User::_DATE_CREATED=>$date
		);
			
		$this->db->insert(User::_TABLE, $data);
		$userId = $this->db->insert_id();
		
		return $userId;
	}
	
	
// 	public function update_login_status($userId, $loginStatus)
// 	{
// 		$flag = false;
		
// 		$data = array(User::_IS_LOGGED_IN => $loginStatus);
		
// 		$this->db->where(static::_ID, $userId);
// 		$flag = $this->db->update(static::_TABLE, $data);
		
// 		return $flag;
// 	}
	
	/*
	public function sign_up($registrationInfo)
	{
		$password = md5($registrationInfo['password']);
		
		$secretQuestionAnswer = md5($registrationInfo['secret_question_answer']);
		
		# Before actually storing the email to database check to see if the email is already available with us/ 
		# and if available create a new email id.
		
		$email = '';
// 		if($this->isEmailAvailable($registrationInfo['email'])) { $email = generate_email($this->getLastCreatedUser()); }
// 		else { $email = $registrationInfo['email']; }
		
		# Now Check if recommendor is already available with the system, then insert the recommendor id else, don't insert this
		# into the system
		
// 		$recommendor = 0;
		
// 		$result = $this->getUserProfile(extract_id_from_user_id($registrationInfo['recommendor']));
// 		if(!empty($result)){$recommendor = $registrationInfo['recommendor'];};
				
		$date = new DateTime();
		$date = $date->format('Y-m-d H:i:s');
		
		$data = array(
				User::_COUNTRY=>$registrationInfo['country'], 
				User::_USERNAME=>generate_user_id($this->getLastCreatedUser()+1),
				User::_EMAIL=>$email, 
				User::_PASSWORD=>$password,
				User::_SECRET_QUESTION=>$registrationInfo['secret_question'],
				User::_SECRET_QUESTION_ANSWER=>$secretQuestionAnswer,
				User::_USER_GROUP=>User::USER_GROUP_LEVEL_USER,
				USER::_USER_MEMBERSHIP_LEVEL=>User::VISIBILITY_REGISTERED_USER,
				User::_RECOMMENDOR=>$registrationInfo['recommendor'],
				User::_STATUS=>1,
				User::_DATE_CREATED=>$date
		);
					
		$this->db->insert(User::_TABLE, $data);
		$userId = $this->db->insert_id();
		
		$flag = $this->question->user_Q_A($userId, $registrationInfo);
				
		return $userId;		
	}
	*/
	
	public function update_profile($userId, $fname, $lname, $email, $mobile, $country, $avtarName, $avtarImage, $gender, $secretQuestion, $secretAnswer, $whatAreYou, $whatYouWantToBecome, $problemPreventing)
	{
		$flag = false;
		
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
				
		$profile = $this->getUserProfile($userId);
		
		$data = array(
				User::_F_NAME=>$fname, 
				User::_L_NAME=>$lname == " " ? $profile->{static::_L_NAME} : $lname, 
				User::_EMAIL=>$email == " " ? $profile->{static::_EMAIL} : $email,
				User::_SECONDARY_EMAIL=>$email == " " ? $profile->{static::_EMAIL} : $email, 
				User::_MOBILE=>$mobile == " " ? $profile->{static::_MOBILE} : $mobile, 
				User::_WHAT_ARE_YOU=> $whatAreYou == " " ? $profile->{static::_WHAT_ARE_YOU} : $whatAreYou,
				User::_WHAT_YOU_WANT_TO_BECOME=> $whatYouWantToBecome == " " ? $profile->{static::_WHAT_YOU_WANT_TO_BECOME} : $whatYouWantToBecome,
				User::_PROBLEM_PREVENTING=> $problemPreventing == " " ? $profile->{static::_PROBLEM_PREVENTING} : $problemPreventing,
				User::_COUNTRY=>$country == " " ? $profile->{static::_COUNTRY} : $country, 
				User::_AVATAR_NAME=>$avtarName == " " ? $profile->{static::_AVATAR_NAME} : $avtarName,
				User::_AVATAR_IMAGE=>$avtarImage == " " ? $profile->{static::_AVATAR_IMAGE} : $avtarImage,
				User::_GENDER=>$gender == " " ? $profile->{static::_GENDER} : $gender,
				User::_SECRET_QUESTION=>$secretQuestion == " " ? $profile->{static::_SECRET_QUESTION} : $secretQuestion,
				User::_SECRET_QUESTION_ANSWER=> $secretAnswer == " " ? $profile->{static::_SECRET_QUESTION_ANSWER} : md5($secretAnswer),
				User::_MODIFIED_DATE=>$date
		);
		
		$this->db->where(static::_ID, $userId);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag;
	}
	
	public function update_user_address($userId, $homeAddress, $homeLat, $homeLng, $workAddress, $workLat, $workLng)
	{
	    $data = array(
	        static::_HOME_ADDRESS => $homeAddress,
	        static::_HOME_LAT => $homeLat,
	        static::_HOME_LNG => $homeLng,
	        static::_WORK_ADDRESS => $workAddress,
	        static::_WORK_LAT => $workLat,
	        static::_WORK_LNG => $workLng,
	    );
	    
	    $this->db->where(static::_ID, $userId);
	    $this->db->update(static::_TABLE, $data);
	    
	    return $this->db->affected_rows();
	    
	}
	
	public function set_event_default_address($userId, $preferedAddress)
	{
	    $data = array(
	        static::_EVENT_DEFAULT_ADDRESS => $preferedAddress
	    );
	    
	    $this->db->where(static::_ID, $userId);
	    $this->db->update(static::_TABLE, $data);
	    
	    return $this->db->affected_rows();
	}
	
	public function set_offer_in_radius($userId, $offerInRadius)
	{
	    $data = array(
	        static::_OFFER_IN_RADIUS => $offerInRadius
	    );
	    
	    $this->db->where(static::_ID, $userId);
	    $this->db->update(static::_TABLE, $data);
	    
	    return $this->db->affected_rows();
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
	
	public function update_user_password($userId, $password)
	{
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array(User::_PASSWORD=>md5($password));
		$this->db->where(static::_ID, $userId);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag;
	}
	
	public function update_user_country($userId, $countryId)
	{
		$data = array(User::_COUNTRY=>$countryId);
		$this->db->where(static::_ID, $userId);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag;
	}
	
	public function isEmailAvailable($email)
	{
		$result = false;
		$this->db->from(User::_TABLE);
		$this->db->where(User::_EMAIL, "$email");
		$query = $this->db->get();
				
		if ($query->num_rows() > 0){ $result = true; }
		else{ $result = false;}
		
		return $result;
	}
	
	public function isAvatarNameAvailable($avatarName)
	{
		$result = false;
		$this->db->from(User::_TABLE);
		$this->db->where(User::_AVATAR_NAME ." LIKE '%$avatarName'");
		$query = $this->db->get();
		
		if ($query->num_rows() > 0){ $result = $query->row(); }
		else{ $result = false;}
		
		return $result;
	}
	
	public function getUserProfileByUsername($username)
	{
		$response = array();
					
		$this->db->select("*");
		$this->db->from(User::_TABLE);
		$this->db->where(User::_USERNAME, $username);
		$response = $this->db->get()->row();
			
		return $response;
	}
	
	public function getUserProfile($userId)
	{
		$response = array();
		
// 		$select = User::_ID .','. User::_EMAIL .','. User::_USER_GROUP;
		$this->db->select("*");
		$this->db->from(User::_TABLE);
		$this->db->where(User::_ID, $userId);
		$response = $this->db->get()->row();
			
		return $response;
		
	}
		
	public function getByEmail($email)
	{
		$response = array();
					
		$this->db->select("*");
		$this->db->from(User::_TABLE);
		$this->db->where(static::_EMAIL." LIKE '%$email%' OR ". static::_SECONDARY_EMAIL." LIKE '%$email%'");
			
		$response = $this->db->get()->row(); 
			
		return $response;
	}
	
	public function get_avtar_image($userId)
	{
		$result = false;
		$this->db->from(User::_TABLE);
		$this->db->where(User::_ID, $userId);
		$query = $this->db->get()->row();

		$result = $query->{static::_AVATAR_IMAGE};
		return $result;
	}
	
	/*
	 * Send email verification after successfull registration
	 */
	
	public function sendEmailVerification()
	{
		
	}
	
	public function emailLoginDetails($userId, $email)
	{

		$message = 'Your account is created, please login with below details\n';
		$message .= "User Id $userId\n";
		$message .= "Email Id $email\n";
		$message .= "";

		$this->email->from($companyEmail, $compnayName);
		$this->email->reply_to($companyEmail, $companyName);
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
		
	}
	
	public function getLastCreatedUser()
	{
		$this->db->select(User::_ID);
		$this->db->from(User::_TABLE);
		$this->db->limit(1);
		$this->db->order_by(User::_ID, 'DESC');
		
		$query = $this->db->get();
		return $query->row()->{User::_ID};
		
	}
	
	public static function generate_user_id($userId)
	{
		# Generate new email and store in database
		$prefix = 'U';
// 		$suffix = '@satanclause.it';
					
// 		return $prefix.(10000+$userId).$suffix;
		return $prefix.(10000+$userId);
	}
	
	public function update_membership_and_recommendor($id, $recommendor, $membershipType, $secondaryEmail)
	{
		$flag = false;
		
		$data = array(
					static::_RECOMMENDOR => $recommendor, 
					static::_USER_GROUP => $membershipType, 
					static::_SECONDARY_EMAIL => $secondaryEmail
				);
		
		$this->db->where(static::_ID, $id);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag;
	}
	
	public function get_user_membership($membershipId)
	{
		switch ($membershipId)
		{
			case 1 : $type = 'Signed In User'; break;
			case 2 : $type = 'Registered User'; break;
			case 3 : $type = 'Upgraded User'; break;
			case 4 : $type = 'Membership A'; break;
			case 5 : $type = 'Membership B'; break;
			case 6 : $type = 'Membership C'; break;
		}
	
		return $type;
	}
	
	public function get_users()
	{
		$response = array();
			
		$this->db->select("id, username");
		$this->db->from(User::_TABLE);
		$response = $this->db->get()->result();
			
		return $response;
	}
	
	
	
	public function search_user($searchTerm)
	{
		$response = array();
			
		$this->db->select("username");
		$this->db->from(User::_TABLE); 
		$this->db->where(static::_EMAIL." LIKE '%$searchTerm%' OR ". static::_SECONDARY_EMAIL." LIKE '%$searchTerm%' OR ".static::_AVATAR_NAME ." LIKE '%$searchTerm' OR ". static::_USERNAME . " LIKE '%$searchTerm'");
			
		$response = $this->db->get()->result();
			
		return $response;
	}
	
	public function get_chat_friend_lists($membershipLevel, $userId)
	{
		$response = array();
			
		$this->db->select("id, f_name, username, avatar_name, avatar_image, is_logged_in");
		$this->db->from(User::_TABLE);
		$this->db->where(static::_USER_MEMBERSHIP_LEVEL .' <= ', $membershipLevel);
		$this->db->where(static::_ID.' != ', $userId);
		$this->db->where(static::_USER_GROUP, static::USER_GROUP_LEVEL_USER);
		$response = $this->db->get()->result();
			
		return $response;
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
	
	public function update_ewallet_address($userId, $address)
	{
	    $data = array(static::_E_WALLET_ADDRESS => $address);
	    
	    $this->db->where(static::_ID, $userId);
	    $this->db->update(static::_TABLE, $data);
	    
	    return $this->db->affected_rows();
	}
	
	public function update_currency($userId, $currencyId)
	{
	    $data = array(static::_CURRENCY => $currencyId);
	    
	    $this->db->where(static::_ID, $userId);
	    $this->db->update(static::_TABLE, $data);
	    
	    return $this->db->affected_rows();
	    
	}
	
	
}