<?php

function create_slug($title)
{
	$slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $title);
	return strtolower($slug)	;
}

function create_unique_slug($slugArray, $title)
{
	$slug = url_title($title);
	$slug = strtolower($title);
	$i = 0;
	$params = array ();

	foreach ($slugArray as $s)
	{
// 		print_r($s['slug']);
// 		echo "====";
		if (!preg_match ('/-{1}[0-9]+$/', $slug ))
			$slug .= '-' . ++$i;
		else
			$slug = preg_replace ('/[0-9]+$/', ++$i, $slug );
	}
		
	return $slug;
	
}

function create_hash()
{
	$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	$pass = array(); //remember to declare $pass as an array
	$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	for ($i = 0; $i < 8; $i++) 
	{
		$n = rand(0, $alphaLength);
		$pass[] = $alphabet[$n];
	}
	
	return implode($pass);
}

function generate_email($id)
{
	$prefix = 'U';
	$suffix = '@satanclause.it';
		
	return $prefix.(10000+$id).$suffix; 
}

function generate_user_id($id)
{
	$prefix = 'U';
	return $prefix.(10000+$id);	
}

function extract_id_from_user_id($userId)
{
	return (intval(preg_replace('/[^0-9]+/', '', $userId), 10)-10000);
}

function generate_coupon_code($couponArr) 
{
	$characters = 'ABCDEFGHJKLMNPQRSTUZWXYZ';
	$random_string_length = 8;
	$string = '';
	
	for ($i = 0; $i < $random_string_length; $i++) 
	{
		$string .= $characters[rand(0, strlen($characters) - 1)];
	}
	
	if (is_array($couponArr) && in_array($string, $couponArr))
	{
		return get_coupon_code();
	}
	else
	{
		return $string;
	}
}

function is_valid_email($email)
{
	return !!filter_var($email, FILTER_VALIDATE_EMAIL);
}

function image_upload($field, $destination, $name, $thumb = FALSE, $thumbFolder, $thumbWidth, $thumbHeight)
{
	
}


function get_file_extension($filename)
{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	return $ext;
}

function pre($data)
{
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}
function restructure_price($price)
{
	$percent = 11;
	
	$amount = ($price *($percent/100))+$price;
	
	return $amount;
	
}

function get_ip_address() {
    // check for shared internet/ISP IP
    if (! empty($_SERVER['HTTP_CLIENT_IP']) && validate_ip($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    
    // check for IPs passing through proxies
    if (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // check if multiple ips exist in var
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== false) {
            $iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($iplist as $ip) {
                if (validate_ip($ip))
                    return $ip;
            }
        } else {
            if (validate_ip($_SERVER['HTTP_X_FORWARDED_FOR']))
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    }
    if (! empty($_SERVER['HTTP_X_FORWARDED']) && validate_ip($_SERVER['HTTP_X_FORWARDED']))
        return $_SERVER['HTTP_X_FORWARDED'];
        if (! empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && validate_ip($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
            return $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
            if (! empty($_SERVER['HTTP_FORWARDED_FOR']) && validate_ip($_SERVER['HTTP_FORWARDED_FOR']))
                return $_SERVER['HTTP_FORWARDED_FOR'];
                if (! empty($_SERVER['HTTP_FORWARDED']) && validate_ip($_SERVER['HTTP_FORWARDED']))
                    return $_SERVER['HTTP_FORWARDED'];
                    
                    // return unreliable ip since all else failed
                    return $_SERVER['REMOTE_ADDR'];
}

function get_lat_lng_by_ip()
{    
    $ip = '120.22.53.133'; // Queensland
//     $ip = get_ip_address();
    $url = "http://freegeoip.net/json/$ip";
    $ch  = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    $data = curl_exec($ch);
    curl_close($ch);
    
    if ($data)
    {
        $location = json_decode($data);
        // 		preformatted_data($location);
        return $location;
    }
    
}

function read_more($content, $limit=100, $wordToShow)
{
    if (strlen($content) > $limit)
    {
        # Truncate string
        $stringCut = substr($content, 0, $wordToShow);
        
        # Make sure it ends in a word so assassinate doesn't become ass...
        $content = substr($stringCut, 0, strrpos($stringCut, ' ') ? strrpos($stringCut, ' ') : $wordToShow);
    }
    
    return $content;
}

function get_color($index)
{
	$color=array('White','Red','Orange','Gold','Green','Blue','Pink','Indigo','Red','Violet','Rainbow');
	return $color[$index];
}

