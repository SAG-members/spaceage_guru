<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-02-05 12:56:35 --> Severity: Notice --> Undefined index: tx /var/www/html/spaceage_guru/application/controllers/module/payment/Payment.php 83
ERROR - 2018-02-05 12:56:35 --> Severity: Notice --> Undefined index: st /var/www/html/spaceage_guru/application/controllers/module/payment/Payment.php 84
ERROR - 2018-02-05 12:56:35 --> Severity: Notice --> Undefined index: amt /var/www/html/spaceage_guru/application/controllers/module/payment/Payment.php 85
ERROR - 2018-02-05 12:56:35 --> Severity: Notice --> Undefined index: amt /var/www/html/spaceage_guru/application/controllers/module/payment/Payment.php 86
ERROR - 2018-02-05 12:56:35 --> Severity: Notice --> Undefined index: cc /var/www/html/spaceage_guru/application/controllers/module/payment/Payment.php 87
ERROR - 2018-02-05 12:56:35 --> Severity: Notice --> Undefined index: cm /var/www/html/spaceage_guru/application/controllers/module/payment/Payment.php 92
ERROR - 2018-02-05 12:56:35 --> Severity: Notice --> Undefined offset: 1 /var/www/html/spaceage_guru/application/controllers/module/payment/Payment.php 94
ERROR - 2018-02-05 12:56:35 --> Query error: Column 'txn_id' cannot be null - Invalid query: INSERT INTO `psss_purchase_history` (`txn_id`, `user_id`, `item_id`, `item_name`, `category_id`, `gross_amount`, `currency`, `payer_email`, `purchase_date`, `payment_mode`) VALUES (NULL, '27', '4', 'Alpha Membership 89€/month or 890€ per year', '', NULL, NULL, '', '2018-02-05 12:56:35', 'Paypal')
ERROR - 2018-02-05 12:56:35 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /var/www/html/spaceage_guru/system/core/Exceptions.php:272) /var/www/html/spaceage_guru/system/core/Common.php 573
ERROR - 2018-02-05 12:58:51 --> Severity: error --> Exception: Undefined class constant 'SUBSCRIPTION_INVITED' /var/www/html/spaceage_guru/application/controllers/module/auth/Register.php 140
ERROR - 2018-02-05 13:07:37 --> Query error: Column 'subscription_type' cannot be null - Invalid query: INSERT INTO `user_subscription` (`txn_id`, `user_id`, `item_id`, `item_name`, `category_id`, `gross_amount`, `payment_mode`, `currency`, `payer_email`, `subscription_date`, `subscription_expiry`, `subscription_type`) VALUES ('initiation', 383, '3', 'Membership upgrade by coupon', 3, 0, 'coupon', '', '', '2018-02-05 13:07:37', '2018-03-08 13:07:37', NULL)
ERROR - 2018-02-05 13:10:54 --> Query error: Column 'subscription_type' cannot be null - Invalid query: INSERT INTO `user_subscription` (`txn_id`, `user_id`, `item_id`, `item_name`, `category_id`, `gross_amount`, `payment_mode`, `currency`, `payer_email`, `subscription_date`, `subscription_expiry`, `subscription_type`) VALUES ('initiation', 384, '3', 'Membership upgrade by coupon', 3, 0, 'coupon', '', '', '2018-02-05 13:10:54', '2018-03-08 13:10:54', NULL)
ERROR - 2018-02-05 13:14:05 --> Query error: Column 'subscription_type' cannot be null - Invalid query: INSERT INTO `user_subscription` (`txn_id`, `user_id`, `item_id`, `item_name`, `category_id`, `gross_amount`, `payment_mode`, `currency`, `payer_email`, `subscription_date`, `subscription_expiry`, `subscription_type`) VALUES ('initiation', 385, '3', 'Membership upgrade by coupon', 3, 0, 'coupon', '', '', '2018-02-05 13:14:05', '2018-03-08 13:14:05', NULL)
