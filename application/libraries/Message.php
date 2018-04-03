<?php
class Message
{
    
    const GENERAL_ERROR = 'Something wrong happend !!!, Please try again later';
    
    const PCT_PAYMENT_FAILED_LOGIN_ERROR = 'Payment failed since invalid login credentials provided';
    
    const PCT_PAYMENT_TRANSFER_SUCCESS = 'PCT Payment transfer successfull';
    const PCT_PAYMENT_TRANSFER_FAILURE = 'PCT Payment transfer failed';
    
    const PCT_PAYMENT_TRANSFER_FAILURE_INSUFFICIENT_FUND = 'Insufficient PCT Points';
    
	const LOGIN_SUCCESS = 'Logged In Successfully to the System';
	const LOGIN_FAILURE = 'Invalid Login Credentials';
	const NO_ACCESS_ERROR = "You don'\t have permissions to visit admin section"; 
	const LOGIN_REQUIRED = 'This page requires you to be logged in';
	const LOGOUT_SUCCESS = 'Logged Out Successfully';
	
	const AVATAR_NAME_ERROR = 'This avatar name is already used, please choose a different one';
	const REGISTRATION_ERROR = 'Unable to register, Please provide required details';
	
	const QUESTION_POSTED_SUCCESS = "Question has been posted successfully";
	const QUESTION_POSTED_FAILURE = "Error posting question";
	
	const ANSWER_POSTED_SUCCESS = "Answer has been posted successfully";
	const ANSWER_POSTED_FAILURE = "Error Posting Answer";
	
	
	# DATA CONSTANTS
	const DATA_CREATE_SUCCESS = 'Data Created Successfully';
	const DATA_CREATE_FAILURE = 'Error Creating Data';
	
	const DATA_UPDATE_SUCCESS = 'Data Updated Successfully';
	const DATA_UPDATE_FAILURE = 'Error Updating Data';
	
	const DATA_DELETE_SUCCESS = 'Data Deleted Successfully';
	const DATA_DELETE_FAILURE = 'Error Deleting Data';
	
	# TASK CONSTANT
	const TASK_CREATE_SUCCESS = 'Task Created Successfully';
	const TASK_CREATE_FAILURE = 'Error Creating Task';
	
	const TASK_UPDATE_SUCCESS = 'Task Updated Successfully';
	const TASK_UPDATE_FAILURE = 'Error Updating Task';
	
	const TASK_DELETE_SUCCESS = 'Task Deleted Successfully';
	const TASK_DELETE_FAILURE = 'Error Deleting Task';
	
	# GOAL CONSTANT
	const GOAL_CREATE_SUCCESS = 'Goal Created Successfully';
	const GOAL_CREATE_FAILURE = 'Error Creating Goal';
	
	const GOAL_UPDATE_SUCCESS = 'Goal Updated Successfully';
	const GOAL_UPDATE_FAILURE = 'Error Updating Goal';
	
	const GOAL_DELETE_SUCCESS = 'Goal Deleted Successfully';
	const GOAL_DELETE_FAILURE = 'Error Deleting Goal';
	
	# OFFER DECLINE
	const OFFER_DECLINE_SUCCESS = 'Offer Declined Successfully';
	const OFFER_DECLINE_FAILURE = 'Error Declining offer';
		
	# OFFER YIELD
	const OFFER_YIELD_SUCCESS = 'Offer Yielded Successfully';
	const OFFER_YIELD_FAILURE = 'Error Yielding offer';
	
	# OFFER DECLINE
	const OFFER_SAVED_SUCCESS = 'Offer Saved Successfully';
	const OFFER_SAVED_FAILURE = 'Error Saving offer';
		
	# OFFER ACCEPT
	const OFFER_ACCEPT_SUCCESS = 'Offer Accepted Successfully, Please wait for Seller Approval';
	const OFFER_ACCEPT_FAILURE = 'Error accepting offer';
	
	const OFFER_APPROVE_SUCCESS = "Offer Approved Successfully";
	const OFFER_APPROVE_FAILURE = "Error approving offer";
	
	# OFFER PAID SUCCESS
	const OFFER_PAID_SUCCESS = "Offer Paid Successfully"; 
	
	
	# Product Constants
	
	const PRODUCT_CREATE_SUCCESS = 'Product Created Successfully';
	const PRODUCT_CREATE_FAILURE = 'Error Creating Product';
	const PRODUCT_UPDATE_SUCCESS = 'Product Updated Successfully';
	const PRODUCT_UPDATE_FAILURE = 'Error Updating Product, Please Try Again Later';
	const PRODUCT_DELETE_SUCCESS = 'Product Deleted Successfully';
	const PRODUCT_DELETE_FAILURE = 'Error Deleting Product, Please Try Again Later';
	const PRODUCT_PUBLISH_SUCCESS = 'Product Published Successfully';
	const PRODUCT_PUBLISH_FAILURE = 'Error Publishing Product, Please Try Again Later';
	const PRODUCT_UNPUBLISH_SUCCESS = 'Product Unpublished Successfully';
	const PRODUCT_UNPUBLISH_FAILURE = 'Error Unpublishing Product, Please Try Again Later';
	
	
	# Service Constants
	
	const SERVICE_CREATE_SUCCESS = 'Service Created Successfully';
	const SERVICE_CREATE_FAILURE = 'Error Creating Service';
	const SERVICE_UPDATE_SUCCESS = 'Service Updated Successfully';
	const SERVICE_UPDATE_FAILURE = 'Error Updating Service, Please Try Again Later';
	const SERVICE_DELETE_SUCCESS = 'Service Deleted Successfully';
	const SERVICE_DELETE_FAILURE = 'Error Deleting Service, Please Try Again Later';
	const SERVICE_PUBLISH_SUCCESS = 'Service Published Successfully';
	const SERVICE_PUBLISH_FAILURE = 'Error Publishing Service, Please Try Again Later';
	const SERVICE_UNPUBLISH_SUCCESS = 'Service Unpublished Successfully';
	const SERVICE_UNPUBLISH_FAILURE = 'Error Unpublishing Service, Please Try Again Later';
	
	# Sensation Constants
	
	const SENSATION_CREATE_SUCCESS = 'Sensation Created Successfully';
	const SENSATION_CREATE_FAILURE = 'Error Creating Sensation';
	const SENSATION_UPDATE_SUCCESS = 'Sensation Updated Successfully';
	const SENSATION_UPDATE_FAILURE = 'Error Updating Sensation';
	const SENSATION_DELETE_SUCCESS = 'Sensation Deleted Successfully';
	const SENSATION_DELETE_FAILURE = 'Error Deleting Sensation';
	const SENSATION_PUBLISH_SUCCESS = 'Sensation Published Successfully';
	const SENSATION_PUBLISH_FAILURE = 'Error Publishing Sensation';
	const SENSATION_UNPUBLISH_SUCCESS = 'Sensation Unpublished Successfully';
	const SENSATION_UNPUBLISH_FAILURE = 'Error Unpublishing Sensation';
	
	
	const SYMPTOM_CREATE_SUCCESS = 'Symptom Created Successfully';
	const SYMPTOM_CREATE_FAILURE = 'Error Creating Symptom';
	
	const SYMPTOM_ANSWER_CREATE_SUCCESS = 'Symptom Answer Created Successfully';
	const SYMPTOM_ANSWER_CREATE_FAILURE = 'Error Creating Symptom Answer'; 
	
	const BLOG_POST_SUCCESS = 'Blog Post Created Successfully';
	const BLOG_POST_FAILURE = 'Error Posting Blog Post';
	const BLOG_POST_COMMENT_SUCCESS = 'Comment Posted Successfully';
	const BLOG_POST_COMMENT_FAILURE = 'Error Posting Comment, Please Try Again Later';
	
	const FEEDBACK_CREATE_SUCCESS = 'Feedback Created Successfully';
	const FEEDBACK_CREATE_FAILURE = 'Error Creating Feedback';
	
	const PROFILE_UPDATE_FAILURE = 'Error Updating profile, Please try again later';
	const PROFILE_UPDATE_SUCCESS = 'Profile Updated Successfully';
	
	const PASSWORD_UPDATE_FAILURE = 'Error Updating password, Please try again later';
	const PASSWORD_UPDATE_SUCCESS = 'Password Updated Successfully';

	const RSS_SUBSCRIPTION_FAILURE = 'Error in subscription, Please try again later';
	const RSS_SUBSCRIPTION_SUCCESS = 'News Feed Subscription Successfull';
	
	const RSS_UNSUBSCRIPTION_FAILURE = 'Error in Unsubscribing, Please try again later';
	const RSS_UNSUBSCRIPTION_SUCCESS = 'News Feed Subscription Unsunbscribed Successfull';
	
	const PAYMENT_FAILURE = 'Error in payment, Please try again later';
	const PAYMENT_SUCCESS = 'Payment Successfull';
	
	const PASSWORD_CHANGE_ERROR = 'Unable to reset password, please try again later';
	const PASSWORD_CHANGE_LINK_FAILURE = 'This link is Expired, Please try again to reset your password';
	const PASSWORD_CONFIRM_PASSWORD_MATCH_FAILURE = 'Password and Confirm Password do not match';
	const PASSWORD_CHANGE_SUCCESS = 'Password Changed Successfully, Please login with new password';
	const PASSWORD_CHANGE_FAILURE = 'Unable to change password, Please try again later';
	
	const INVITATION_LINK_ERROR = 'Unable to process request, as the link is expired, even though you can register, but the referrer will not get benefit';
	const INVITATION_LINK_SUCCESS = 'Please register now';
	
	
	
	const QUESTIONNAIRE_UPDATE_SUCCESS = 'User Questionnaire updated successfully';
	const QUESTIONNAIRE_UPDATE_FAILURE = 'Error Updating User Questionnaire, Please try again later';
	
	const RPQ_UPDATE_SUCCESS = 'User RPQ updated successfully';
	const RPQ_UPDATE_FAILURE = 'Error Updating User RPQ, Please try again later';
	
	const WPQ_UPDATE_SUCCESS = 'User WPQ updated successfully';
	const WPQ_UPDATE_FAILURE = 'Error Updating User WPQ, Please try again later';
	
	# Admin Constants
	
	
	const USER_DELETE_SUCCESS = 'User Deleted Successfully';
	const USER_DELETE_FAILUTE = 'Error Deleting User';
	
	const USER_ACTIVATION_SUCCESS = 'Users Activated Successfully';
	const USER_ACTIVATION_FAILURE = 'Error Activating Users';
	
	const USER_DEACTIVATION_SUCCESS = 'Users Deactivated Successfully';
	const USER_DEACTIVATION_FAILURE = 'Error Deactivating Users';
		
	const BLOG_POST_UPDATE_SUCCESS = 'Post Updated Successfully';
	const BLOG_POST_UPDATE_FAILURE = 'Error Updating Post';
	
	const BLOG_POST_DELETE_SUCCESS = 'Post Deleted Successfully';
	const BLOG_POST_DELETE_FAILURE = 'Error Deleting Post';
	
	const BLOG_POST_PUBLISHED_SUCCESS = 'Post Published Successfully';
	const BLOG_POST_PUBLISHED_FAILURE = 'Error Publishing Post';
	
	const BLOG_POST_UNPUBLISHED_SUCCESS = 'Post Un-Published Successfully';
	const BLOG_POST_UNPUBLISHED_FAILURE = 'Error Un-Publishing Post';
		
	const FAQ_CREATE_SUCCESS = 'Faq Created Successfully';
	const FAQ_CREATE_FAILURE = 'Error Creating Faq, Please Try Again Later';
	
	const FAQ_UPDATE_SUCCESS = 'Faq Updated Successfully';
	const FAQ_UPDATE_FAILURE = 'Error Updating Faq, Please Try Again Later';
	
	const FAQ_DELETE_SUCCESS = 'Faq Deleted Successfully';
	const FAQ_DELETE_FAILURE = 'Error Deleting Faq, Please Try Again Later';
	
	const FAQ_PUBLISH_SUCCESS = 'Faq Published Successfully';
	const FAQ_PUBLISH_FAILURE = 'Error Publishing Faq, Please Try Again Later';
	
	const FAQ_UNPUBLISH_SUCCESS = 'Faq Un-Published Successfully';
	const FAQ_UNPUBLISH_FAILURE = 'Error Un-Publishing Faq, Please Try Again Later';
	
	const FAQ_ANSWER_UPDATE_SUCCESS = 'Faq Answer Updated Successfully';
	const FAQ_ANSWER_UPDATE_FAILURE = 'Error Updating Faq answer, Please Try Again Later';
	
	const FAQ_ANSWER_DELETE_SUCCESS = 'Faq Answer Deleted Successfully';
	const FAQ_ANSWER_DELETE_FAILURE = 'Error Deleting Faq Answer, Please Try Again Later';
	
	const SYMPTOM_DELETE_SUCCESS = 'Symptom Deleted Successfully';
	const SYMPTOM_DELETE_FAILURE = 'Error Deleting Symptom, Please Try Again Later';
	
	const SYMPTOM_UPDATE_SUCCESS = 'Symptom Updated Successfully';
	const SYMPTOM_UPDATE_FAILURE = 'Error Updating Symptom, Please Try Again Later';
	
	const SYMPTOM_PUBLISH_SUCCESS = 'Symptom Published Successfully';
	const SYMPTOM_PUBLISH_FAILURE = 'Error Publishing Symptom, Please Try Again Later';
	
	const SYMPTOM_UNPUBLISH_SUCCESS = 'Symptom Un-Published Successfully';
	const SYMPTOM_UNPUBLISH_FAILURE = 'Error Un-Publishing Symptom, Please Try Again Later';
		
	
			
	
	
	const MEMBERSHIP_CREATE_SUCCESS = 'Membership Created Successfully';
	const MEMBERSHIP_CREATE_FAILURE = 'Error Creating Membership, Please Try Again Later';
	
	const MEMBERSHIP_UPDATE_SUCCESS = 'Membership Updated Successfully';
	const MEMBERSHIP_UPDATE_FAILURE = 'Error Updating Membership, Please Try Again Later';
	
	const MEMBERSHIP_DELETE_SUCCESS = 'Membership Deleted Successfully';
	const MEMBERSHIP_DELETE_FAILURE = 'Error Deleting Membership, Please Try Again Later';
		
	const COUNTRY_CREATE_SUCCESS = 'Country Created Successfully';
	const COUNTRY_CREATE_FAILURE = 'Error Creating Country, Please Try Again Later';
	
	const COUNTRY_UPDATE_SUCCESS = 'Country Updated Successfully';
	const COUNTRY_UPDATE_FAILURE = 'Error Updating Country, Please Try Again Later';
	
	const COUNTRY_DELETE_SUCCESS = 'Country Deleted Successfully';
	const COUNTRY_DELETE_FAILURE = 'Error Deleting Country, Please Try Again Later';
	
	const COUNTRY_PUBLISH_SUCCESS = 'Country Published Successfully';
	const COUNTRY_PUBLISH_FAILURE = 'Error Publishing Country, Please Try Again Later';
	
	const COUNTRY_UNPUBLISH_SUCCESS = 'Country UnPublished Successfully';
	const COUNTRY_UNPUBLISH_FAILURE = 'Error UnPublishing Country, Please Try Again Later';
	
	const CMS_PAGE_CREATE_SUCCESS = 'Page Created Sucessfully';
	const CMS_PAGE_CREATE_FAILURE = 'Error Creating Page, Please Try Again Later';
	
	const CMS_PAGE_UPDATE_SUCCESS = 'Page Updated Sucessfully';
	const CMS_PAGE_UPDATE_FAILURE = 'Error Updating Page, Please Try Again Later';
	
	const CMS_PAGE_PUBLISH_SUCCESS = 'Page Published Sucessfully';
	const CMS_PAGE_PUBLISH_FAILURE = 'Error Publishing Page, Please Try Again Later';
	
	const CMS_PAGE_UNPUBLISH_SUCCESS = 'Page UnPublished Sucessfully';
	const CMS_PAGE_UNPUBLISH_FAILURE = 'Error UnPublishing Page, Please Try Again Later';
	
	const COUPON_CREATE_SUCCESS = 'Coupon Created Successfully';
	const COUPON_CREATE_FAILURE = 'Unable to create coupon, please try again later';
	
	const COUPON_UPDATE_SUCCESS = 'Coupon Updated Successfully';
	const COUPON_UPDATE_FAILURE = 'Unable to update coupon, please try again later';
	
	const COUPON_DELETE_SUCCESS = 'Coupon Deleted Successfully';
	const COUPON_DELETE_FAILURE = 'Unable to delete coupon, please try again later';
	
	
	const USER_MEMBERSHIP_ALREADY_SUBSCRIBED = 'User have already subscribed for this Membership Package, Please select different one';
	const USER_MEMBERSHIP_HIGHER_SUBSCRIBED = 'User have already subscribed for higher Membership Package, Please check again';
	const USER_SUBSCRIPTION_SUCCESS = 'User Subscription Successfull';
	const USER_SUBSCRIPTION_FAILURE = 'OOPS ! Unable to process your request, Please try again later';
	
	const ESCROW_DELETE_SUCCESS = "Escrow Deleted Successfully";
	const ESCROW_DELETE_FAILURE = "OOPS!! Error in deleting escrow";
	
	const ESCROW_DELETE_ERROR = "OOPS !! Escrow is alreay accepted, can not be deleted";
	
	const WALLET_ADDRESS_CREATE_SUCCESS = "E-wallet address saved successfully";
	const WALLET_ADDRESS_CREATE_FAILURE = "OOPS ! Unable to process your request, please try again later";
	const WALLET_ADDRESS_CREATE_ERROR = "Please provide wallet address first";
	
	const EVENT_CREATE_SUCCESS = "Event created successfully";
	const EVENT_CREATE_FAILURE = "OOPS !!! unable to create event please try again";
	
	const EVENT_UPDATE_SUCCESS = "Event updated successfully";
	const EVENT_UPDATE_FAILURE = "OOPS !!! unable to update event please try again";
	
	const PCT_RATE_ADDED_SUCCESS = "PCT rate added successfully";
	const PCT_RATE_ADDED_FAILURE = "OOPS ! unable to add rate, please try again later";
	const PCT_RATE_ADDED_MESSAGE = "Please provide pct rate, currency and conversion rate";

		# SPIRITUAL CONSTANTS
	const SPIRITUAL_CREATE_SUCCESS = 'Spiritual Created Successfully';
	const SPIRITUAL_CREATE_FAILURE = 'Error Creating Spiritual';
	
	const SPIRITUAL_UPDATE_SUCCESS = 'Spiritual Updated Successfully';
	const SPIRITUAL_UPDATE_FAILURE = 'Error Updating Spiritual';
	
	const SPIRITUAL_DELETE_SUCCESS = 'Spiritual Deleted Successfully';
	const SPIRITUAL_DELETE_FAILURE = 'Error Deleting Spiritual';

	const SPIRITUAL_PUBLISH_SUCCESS = 'Spiritual Publish Successfully';
	const SPIRITUAL_PUBLISH_FAILURE = 'Error Publish Spiritual';
	
	const SPIRITUAL_UNPUBLISH_SUCCESS = 'Spiritual UnPublish Successfully';
	const SPIRITUAL_UNPUBLISH_FAILURE = 'Error UnPublish Spiritual';
	
	private $CI;
	public function __construct()
	{
		$this->CI = &get_instance();
	}
	
	public function setFlashMessage($message, array $data = null)
	{
		$this->CI->session->set_flashData('message',$message);
		$this->CI->session->set_flashData('data', $data);
	}
	
	public function getFlashMessage()
	{
		if($this->CI->session->flashData('message'))
		{	$message = $this->CI->session->flashData('message');
			if($this->CI->session->flashData('data'))
			$data = $this->CI->session->flashData('data');
			if(!empty($data))
			{
				foreach($data as $key => $value)
				{
					$output['message'] = str_replace("{{" . $key . "}}", $value , $message);
					$output[$key] = $value;
					$output['type'] = 'Success';
				}	
			}
			else 
			{
				$output['message'] = $message;
				$output['type'] = 'Failure';
			}
			return $output;
		}
		return null;
	}

	public function printFlashMessage()
	{
		$icon = '';
		$class = '';
		$result = $this->getFlashMessage();
		if($result['type'] == 'Success')
		{
			$class = 'message alert-success';
			$icon = 'fa fa-check-circle';
		}
		if($result['type'] == 'Failure')
		{
			$class = 'message alert-danger';
			$icon = 'fa fa-times-circle';
		}
		
		echo '<div class="'.$class.'">';
		echo '<a href="javascript:void(0)" class="remove-message"><i class="fa fa-times-circle" aria-hidden="true"></i></a>';
		echo '<p><i class="'.$icon.'" aria-hidden="true"></i> '.$result['message'].'</p>';
		echo '</div>';
	}
	
	public function hasFlashMessage()
	{
		$result = $this->CI->session->flashData('message');
		if(empty($result) || $result === null || $result === '')return false;
		return true;
	}
	
	
}