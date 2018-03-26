<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2018-02-28 10:08:50 --> 404 Page Not Found: Assets/uploads
ERROR - 2018-02-28 18:39:45 --> Severity: error --> Exception: Undefined class constant '_SUBSCRIPTION_TYPE_PAID' /var/www/html/spaceage_guru/application/controllers/Webservice_controller.php 3536
ERROR - 2018-02-28 18:41:18 --> Severity: error --> Exception: Undefined class constant '_SUBSCRIPTION_TYPE_PAID' /var/www/html/spaceage_guru/application/controllers/Webservice_controller.php 3536
ERROR - 2018-02-28 18:41:52 --> Severity: error --> Exception: Class 'Payment' not found /var/www/html/spaceage_guru/application/controllers/Webservice_controller.php 3536
ERROR - 2018-02-28 18:42:33 --> Severity: 4096 --> Object of class DateTime could not be converted to string /var/www/html/spaceage_guru/system/database/DB_driver.php 1476
ERROR - 2018-02-28 18:42:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ' 'paid')' at line 1 - Invalid query: INSERT INTO `user_subscription` (`txn_id`, `user_id`, `item_id`, `item_name`, `category_id`, `gross_amount`, `payment_mode`, `currency`, `payer_email`, `subscription_date`, `subscription_expiry`, `subscription_type`) VALUES ('PAYPAL12345', '8', '1', 'Membership B 890€/month or 8900€/year', '3', '1000', 'Paypal', 'EUR', 'test@test.com', '2018-02-28 18:42:33', , 'paid')
ERROR - 2018-02-28 18:45:13 --> Severity: Notice --> Use of undefined constant type - assumed 'type' /var/www/html/spaceage_guru/application/controllers/Webservice_controller.php 3541
ERROR - 2018-02-28 19:33:24 --> 404 Page Not Found: Assets/uploads
