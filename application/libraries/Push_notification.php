<?php
class Push_notification
{
	const _GOOGLE_API_KEY = 'AAAAWXOiXT0:APA91bG4XMbCFHRZX6U5s8OY-Po6jU4vs6tv3WRtcn_-o14Yjb8q_d8IHJqJ3P2ePfy7er41mw9m5Kqwqf1ltMrGHymKYcXwr273caY6FooBRo_7KehWlsc_gEKqLkSy4wKUsT84oMc-';
	const _GOOGLE_FCM_URL = 'https://fcm.googleapis.com/fcm/send';
	
	public function __construct(){ }
		
	public function andriod_push($registrationId, $message)
	{
	    $fields = array(
	       'registration_ids' => $registrationId , 
	       'data'=>$message
	    );
		   
	    $headers = array(
            'Authorization: key='.static::_GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
       
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, static::_GOOGLE_FCM_URL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        // Close connection
        curl_close($ch);
        return $result;
	}
	
	private function ios_push()
	{
	    
	}
	
	public function send_notification($registrationId, $message)
	{
	    $this->andriod_push($registrationId, $message);
	    $this->ios_push();	    
	}
	
	
}