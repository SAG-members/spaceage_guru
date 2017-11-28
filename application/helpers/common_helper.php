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
