<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'cms_page_controller'; 
$route['module/auth'] = "module/auth/register";
// $route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE; 

# Auth Routes
$route['register'] = 'module/auth/register';
$route['signup'] = 'module/auth/register/sign_up'; 
$route['login'] = 'module/auth/login';
$route['logout'] = 'module/auth/logout';
$route['home'] = 'module/auth/home';
$route['profile'] = 'module/auth/profile';
$route['profile/change-password'] = 'module/auth/profile/update_user_password';
$route['profile/update-questionnaire'] = 'module/auth/profile/update_user_questionnaire';
$route['profile/update-rpq'] = 'module/auth/profile/update_user_rpq';
$route['profile/update-wpq'] = 'module/auth/profile/update_user_wpq';
$route['profile/update-ewallet'] = 'module/auth/profile/update_ewallet_address';


# CMS Page Routes
$route['intro'] = 'cms_page_controller';
$route['lean-canvas-spaceage-guru'] = 'cms_page_controller';
$route['club-laws'] = 'cms_page_controller';
$route['whitepaper'] = 'cms_page_controller';
// $route['timeline'] = 'cms_page_controller';
#$route['introduction-to-spageage-guru'] = 'cms_page_controller';

# Membership Routes 
$route['faq'] = 'module/services/faq';
$route['faq/post-question'] = 'module/services/faq/post_question';
$route['faq/question/(:num)'] = 'module/services/service_public/show_question';
$route['faq/post-answer'] = 'module/services/faq/post_answer';
$route['membership/user'] = 'module/services/membership/user_membership_one_euro';
$route['membership/pay'] = 'module/services/membership/user_payment';
$route['membership/thanku'] = 'module/services/membership/thanku';
$route['registered-user'] = 'module/services/service_public/show_registered_user_page';

 

# Membership Routes
#$route['membership/registered-user'] = 'module/services/reminder_service/registered_user';
$route['membership/(:any)'] = 'module/membership/membership';


#$route['membership/member/100'] = 'module/services/membership/user_membership_hundered_euro';
$route['service/number-game'] = 'module/services/number_game';


/*==============================Library Routes Start==============================*/
$route['personal-library'] = 'module/services/library';

# Data Add | Edit | Delete Routes

$route['user/add/data'] = 'module/services/library/public_library_add_data';
$route['user/edit/data/(:any)'] = 'module/user/dashboard/edit_data';
$route['user/update/data/(:num)'] = 'module/user/dashboard/update_data';
$route['user/delete/data/(:num)'] = 'module/user/dashboard/delete_data';
$route['user/unsubsribe/data/(:num)'] = 'module/user/dashboard/unsubsribe_data';
$route['user/data/(:any)'] = 'module/services/page_controller/get_data';

$route['user/update/goal/(:num)'] = 'module/user/dashboard/update_task_goal';
$route['user/update/task/(:num)'] = 'module/user/dashboard/update_task_goal';

$route['user/delete/task/(:num)'] = 'module/user/dashboard/delete_task_goal';
$route['user/delete/goal/(:num)'] = 'module/user/dashboard/delete_task_goal';




/*==============================Library Routes Ends==============================*/


/*==============================Public Library Routes Starts==============================*/

$route['public-library'] = 'module/services/library/public_library';



/*==============================Public Library Routes Ends==============================*/

$route['user/add/task'] = 'module/services/library/add_tasks_goal';
$route['user/add/goal'] = 'module/services/library/add_tasks_goal';




/*==============================Legal Library Routes Start==============================*/

$route['legal-library'] = 'module/services/legal_library';

/*==============================Legal Library Routes Ends==============================*/


$route['reminder-service'] = 'module/services/reminder_service';
$route['remainder-service/payment']= 'module/services/reminder_service/remainder_service_payment';
$route['remainder-service/success'] = 'module/services/reminder_service/remainder_service_success';

# Blog Routes
$route['blog'] = 'module/blog/blog_public';
$route['blog/(:num)'] = 'module/blog/blog';
$route['blog/post-comment'] = 'module/blog/blog/post_comment';
$route['blog/new-post'] = 'module/blog/blog/new_post';
$route['blog/(:any)'] = 'module/blog/blog/get_post_by_slug';

# Feedback Routes
$route['feedback'] = 'module/services/feedback_controller';

# Page Routes
$route['satan-clause-ltd'] = 'module/services/page_controller/satan_clause_ltd';
$route['lean-canvas'] = 'module/services/page_controller/lean_canvas';

# Rss Feed Routes
$route['rss-feed/subscribe'] = 'module/rss_feed/rss_feed_controller';
$route['rss-feed/unsubscribe'] = 'module/rss_feed/rss_feed_controller/unsubscribe_rss_feed_list';

# Payment Routes
$route['pay'] = 'module/payment/payment';
$route['payment/success'] = 'module/payment/payment/success';
$route['payment/cancel'] = 'module/payment/payment/cancel';
$route['payment/ipn'] = 'module/payment/payment/ipn_transaction';



# Decline Offer #Accept Offer # Escrow Offer
$route['user/decline-offer'] = 'module/services/page_controller/decline_offer';
$route['user/accept-offer'] = 'module/services/page_controller/yield_offer';
$route['user/save-offer'] = 'module/services/page_controller/save_offer';
$route['user/escrow-offer'] = 'module/services/page_controller/escrow_offer';
$route['user/approve-offer'] = 'module/services/page_controller/approve_offer';


# Escrow offer view
$route['escrow'] = 'module/services/page_controller/view_escrow_page';
$route['escrow/create'] = 'module/services/page_controller/create_escrow_page';
$route['escrow/create/(:num)'] = 'module/services/page_controller/create_escrow_page';
$route['escrow/delete/(:num)'] = 'module/services/page_controller/delete_escrow';


# Escrow Success / Failure

$route['escrow/payment/success'] = 'module/services/page_controller/escrow_success';
$route['escrow/payment/failure'] = 'module/services/page_controller/escrow_failure';
$route['escrow/payment/callback'] = 'module/services/page_controller/escrow_callback';


# User Dashboard Routes
$route['user/dashboard'] = 'module/user/dashboard';

# Invite Routes
$route['user-invite/(:any)'] = 'module/auth/user_invite_controller';

# Shop Routes

$route['shop'] = 'module/services/shop_controller';

# TimeLine
$route['timeline'] = 'module/services/feedback_controller/timeline';



$route['ajax'] = 'public_ajax_controller';
$route['ajax/dropzone'] = 'public_ajax_controller/upload_attachments_via_dropzone';
$route['ajax/upload-document'] = 'public_ajax_controller/upload_data_documents';
$route['ajax/remove-document'] = 'public_ajax_controller/remove_data_documents';
$route['public/api_down'] = 'webservice_controller'; 


#IOS ROUTE
$route['public/api_down/ppq-ios'] = 'webservice_controller/ppq_for_ios'; 
$route['profile/update-questionnaire-ios'] = 'welcome/update_user_questionnaire_ios';

$route['public/api_down/rpq-ios'] = 'webservice_controller/rpq_for_ios'; 
$route['profile/update-rpq-ios'] = 'welcome/update_user_rpq_ios';

$route['public/api_down/wpq-ios'] = 'webservice_controller/wpq_for_ios';
$route['profile/update-wpq-ios'] = 'welcome/update_user_wpq_ios';



$route['e-business'] = 'module/product/ebusiness_controller';


# User Reset Password Routes

$route['reset-password/(:any)'] = 'module/auth/reset_password_controller';
$route['change-password'] = 'module/auth/reset_password_controller/update_password';

# Admin Reset Password

$route['admin/reset-password/(:any)'] = 'admin/module/auth/reset_password_controller';
$route['admin/change-password'] = 'admin/module/auth/reset_password_controller/update_admin_password';

# Admin Routes

$route['admin'] = 'admin/module/auth/login';
$route['admin/login'] = 'admin/module/auth/login';
$route['admin/logout'] = 'admin/module/auth/logout';
$route['admin/home'] = 'admin/module/auth/home';
$route['admin/user'] = 'admin/module/auth/user';
$route['admin/profile'] = 'admin/module/auth/profile_controller';
$route['admin/update-profile'] = 'admin/module/auth/profile_controller/update_profile';
$route['admin/change-password'] = 'admin/module/auth/change_password_controller';


# User Routes
$route['admin/users'] = 'admin/module/user/user_controller';
$route['admin/edit-user/(:num)'] = 'admin/module/user/user_controller/edit_user';
$route['admin/delete-user/(:num)'] = 'admin/module/user/user_controller/delete_user';
$route['admin/activate-user'] = 'admin/module/user/user_controller/activate_user';
$route['admin/deactivate-user'] = 'admin/module/user/user_controller/deactivate_user';
$route['admin/show/ppqs/user-id/(:num)'] = 'admin/module/user/user_controller/show_ppqs';

# Blog Routes
$route['admin/blogs'] = 'admin/module/blog/blog_controller';
$route['admin/new-post'] = 'admin/module/blog/blog_controller/new_post';
$route['admin/edit-post/(:num)'] = 'admin/module/blog/blog_controller/edit_post';
$route['admin/delete-post/(:num)'] = 'admin/module/blog/blog_controller/delete_post';
$route['admin/publish-post'] = 'admin/module/blog/blog_controller/publish_post';
$route['admin/unpublish-post'] = 'admin/module/blog/blog_controller/unpublish_post';

# Faq Routes
$route['admin/faqs'] = 'admin/module/service/faq_controller';
$route['admin/edit-faq/(:num)'] = 'admin/module/service/faq_controller/edit_faq';
$route['admin/delete-faq/(:num)'] = 'admin/module/service/faq_controller/delete_faq';
$route['admin/faq/add-answer'] = 'admin/module/service/faq_controller/add_faq_answer';

$route['admin/process/faq/(:num)'] = 'admin/module/service/faq_controller/process_faq';
$route['admin/process/faq-answer/(:num)'] = 'admin/module/service/faq_controller/process_faq_answer';
$route['admin/publish-faq'] = 'admin/module/service/faq_controller/publish_faq';
$route['admin/unpublish-faq'] = 'admin/module/service/faq_controller/unpublish_faq';
$route['admin/update-faq'] = 'admin/module/service/faq_controller/update_faq';

# Data Routes

$route['admin/data'] = 'admin/module/service/page_controller/manage_data';
$route['admin/data/add'] = 'admin/module/service/page_controller/create_data';
$route['admin/data/edit/(:num)'] = 'admin/module/service/page_controller/edit_data';

# Number Game Routes
$route['admin/number-game'] = 'admin/module/service/number_game_controller';


# Symptom Routes
$route['admin/symptoms'] = 'admin/module/service/symptom_controller';
$route['admin/delete-symptom/(:num)'] = 'admin/module/service/symptom_controller/delete_symptom';
$route['admin/publish-symptom'] = 'admin/module/service/symptom_controller/publish_symptom';
$route['admin/unpublish-symptom'] = 'admin/module/service/symptom_controller/unpublish_symptom';
$route['admin/update-symptom'] = 'admin/module/service/symptom_controller/update_symptom';

# Product Routes
$route['admin/products'] = 'admin/module/service/page_controller/manage';
$route['admin/products/add'] = 'admin/module/service/page_controller/create';
$route['admin/products/edit/(:num)'] = 'admin/module/service/page_controller/edit';

# Service Routes
$route['admin/services'] = 'admin/module/service/page_controller/manage';
$route['admin/services/add'] = 'admin/module/service/page_controller/create';
$route['admin/services/edit/(:num)'] = 'admin/module/service/page_controller/edit';

# Sensation Routes
$route['admin/sensations'] = 'admin/module/service/page_controller/manage';
$route['admin/sensations/add'] = 'admin/module/service/page_controller/create';
$route['admin/sensations/edit/(:num)'] = 'admin/module/service/page_controller/edit';

# Page Routes
$route['admin/publish-page'] = 'admin/module/service/page_controller/publish';
$route['admin/unpublish-page'] = 'admin/module/service/page_controller/unpublish';
$route['admin/delete-page'] = 'admin/module/service/page_controller/delete';

# RSS Feeds
$route['admin/rss-feeds'] = 'admin/module/rss-feed/rss_feed_controller';

# Membership Routes
$route['admin/memberships'] = 'admin/module/membership/membership_controller';
$route['admin/membership/add'] = 'admin/module/membership/membership_controller/new_membership';
$route['admin/membership/edit/(:num)'] = 'admin/module/membership/membership_controller/edit_membership';
$route['admin/membership/delete/(:num)'] = 'admin/module/membership/membership_controller/delete_membership';

# Feedback Routes
$route['admin/feedbacks'] = 'admin/module/feedback/feedback_controller';

# Country Routes
$route['admin/countries'] = 'admin/module/country/country_controller';
$route['admin/add-country'] = 'admin/module/country/country_controller/create_country';
$route['admin/update-country'] = 'admin/module/country/country_controller/update_country';
$route['admin/delete-country'] = 'admin/module/country/country_controller/delete_country';
$route['admin/publish-country'] = 'admin/module/country/country_controller/publish_country';
$route['admin/unpublish-country'] = 'admin/module/country/country_controller/unpublish_country';

# Ajax Routes
$route['admin/ajax'] = 'admin/ajax_request_controller';

# CMS Page Routes

$route['admin/cms'] = 'admin/module/cms/cms_controller';
$route['admin/cms/page/add'] = 'admin/module/cms/cms_controller/new_page';
$route['admin/cms/page/edit/(:any)'] = 'admin/module/cms/cms_controller/edit_page';
$route['admin/cms/page/publish'] = 'admin/module/cms/cms_controller/publish_page';
$route['admin/cms/page/unpublish'] = 'admin/module/cms/cms_controller/unpublish_page';

# Coupon Routes

$route['admin/coupons'] = 'admin/module/coupon/coupon_controller';
$route['admin/create/coupon'] = 'admin/module/coupon/coupon_controller/create_new_coupon';
$route['admin/update/coupon'] = 'admin/module/coupon/coupon_controller/update_coupon_code';
$route['admin/delete/coupon/(:num)'] = 'admin/module/coupon/coupon_controller/delete_coupon_code';

# Escrow Routes

$route['admin/escrow'] = 'admin/module/service/page_controller/escrow_list';
$route['admin/escrow/create'] = 'admin/module/service/page_controller/create_escrow';
$route['admin/escrow/delete/(:num)'] = 'admin/module/service/page_controller/delete_escrow';

# Order Routes

$route['admin/orders'] = 'admin/module/order/order_controller';

$route['admin/subscriptions'] = 'admin/module/order/order_controller/manage_subscriptions';

# Admin Reset Password

$route['admin/paypal-setting'] = 'admin/module/payment/payment_controller';
 

# Admin Updagrade User 
$route['admin/upgrade/user'] = 'admin/module/user/user_controller/updgrade_user_membership';


# Chat Route

$route['chat'] = 'ajax_chat_engine_controller';



# Internal Wallet Payment

$route['pay-via-pct-wallet'] = 'module/payment/payment/pay_via_pct_wallet';
$route['process/pct/payment'] = 'module/payment/payment/process_pct_payment';
$route['transfer/pct'] = 'module/payment/payment/process_pct_transfer';

















