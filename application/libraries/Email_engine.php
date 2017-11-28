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
		$subject = 'Santa Clause - Reset Password Request Received';
		
		return $this->sendEmail($to, $subject, $body);
	}

	public function reset_admin_password($to, $body)
	{
		$subject = 'Santa Clause - Administrator Password Reset Request Recieved';
		
		return $this->sendEmail($to, $subject, $body);
	}
	
	public function reset_user_password($to, $body)
	{
		$subject = "Santa Clause - Admin Reset Your Password";
		
		return $this->sendEmail($to, $subject, $body);
	}
	
	public function user_blocked($to, $body)
	{
		$subject = "Santa Clause - Admin Blocked You";
		
		return $this->sendEmail($to, $subject, $body);
	}
	
	public function user_unblocked($to, $body)
	{
		$subject = "Santa Clause - Admin Unblocked You";
		
		return $this->sendEmail($to, $subject, $body);
	}
	
	public function send_invitation_to_join($to, $body)
	{
		$subject = "Santa Clause - Invitation to join santaclauseclub";
				
		return $this->sendEmail($to, $subject, $body);
	}
		
	public function sendEmail($to, $subject, $body)
	{
		$config ['charset'] = 'utf-8';
		$config ['wordwrap'] = TRUE;
		$config ['mailtype'] = 'html';
		
		$this->CI->email->set_mailtype ("html");
		$this->CI->email->from ('no-reply@digitalnewidea.in', 'Satan Clause');
		$this->CI->email->to ($to);
		$this->CI->email->subject ($subject);
		$this->CI->email->message($body);
		
		return $this->CI->email->send () ? true : false;
	}
}