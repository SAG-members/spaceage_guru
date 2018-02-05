<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------
// Paypal IPN Class
// ------------------------------------------------------------------------

# Use PayPal on Sandbox or Live

$config['sandbox'] = TRUE; // FALSE for live environment

# PayPal Business Email ID
$config['business'] = 'office@spaceage.guru';


# If (and where) to log ipn to file
$config['paypal_lib_ipn_log_file'] = BASEPATH . 'logs/paypal_ipn.log';
$config['paypal_lib_ipn_log'] = TRUE;

# Where are the buttons located at 
$config['paypal_lib_button_path'] = 'buttons';

$config['sandbox_url'] = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
$config['live_url'] = 'https://www.paypal.com/cgi-bin/webscr';

# What is the default currency?
$config['paypal_lib_currency_code'] = 'EUR';

?>
