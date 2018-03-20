<?php
class Email_engine
{
	private $CI;
	
	public function __construct()
	{
		$this->CI = &get_instance();
	}
		
	public function reset_password($to, $body)
	{
		$subject = 'Spaceage Guru - Reset Password Request Received';
		
		return $this->sendEmail($to, $subject, $body);
	}

	public function reset_admin_password($to, $body)
	{
		$subject = 'Spaceage Guru - Administrator Password Reset Request Recieved';
		
		return $this->sendEmail($to, $subject, $body);
	}
	
	public function reset_user_password($to, $body)
	{
		$subject = "Spaceage Guru - Admin Reset Your Password";
		
		return $this->sendEmail($to, $subject, $body);
	}
	
	public function user_blocked($to, $body)
	{
		$subject = "Spaceage Guru - Admin Blocked You";
		
		return $this->sendEmail($to, $subject, $body);
	}
	
	public function user_unblocked($to, $body)
	{
		$subject = "Spaceage Guru - Admin Unblocked You";
		
		return $this->sendEmail($to, $subject, $body);
	}
	
	public function send_invitation_to_join($to, $body)
	{
		$subject = "Spaceage Guru - Invitation to join Spaceage.guru";
				
		return $this->sendEmail($to, $subject, $body);
	}
		
	public function sendEmail($to, $subject, $body)
	{
		$config ['charset'] = 'utf-8';
		$config ['wordwrap'] = TRUE;
		$config ['mailtype'] = 'html'; 
		
		$this->CI->email->set_mailtype ("html");
		$this->CI->email->from ('info@spaceage.guru', 'Spaceage Guru');
		$this->CI->email->to ($to);
		$this->CI->email->subject ($subject);
		$this->CI->email->message($body);
		
		return $this->CI->email->send () ? true : false;
		#print_r($this->CI->email->print_debugger());
	}
}