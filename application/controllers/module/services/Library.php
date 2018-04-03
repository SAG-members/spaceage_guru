<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Library extends Application 
{
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->isLoggedIn()) { redirect($this->redirectToLogin()); }
		
		$this->template->setSiteLayout(Template::_PUBLIC_TEMPLATE_DIR, Template::_PUBLIC_LAYOUT_DIR, Template::_PUBLIC_MODULE_DIR);
		
		
		
		# Load Page model
		$this->load->model('page');
		$this->load->model('country');
		$this->load->model('user');
		$this->load->model('currency');
		$this->load->model('pct_setting', 'pct');
		
		# Load personal library data
		$this->data['datas'] = $this->page->get_data_created_and_purchased_by_user($this->session->userdata('id'));
		
		$this->data['currencyRates'] = $this->pct->get_rates();
		$this->data['currencies'] = $this->currency->getCurrencies();
		$this->data['profile'] = $this->user->getUserProfile($this->session->userdata('id'));
				
		
		
	}
		
	public function index()
	{   
	    $data = array();
	    
	    $userId = $this->session->userdata('id');
	    
	    $this->template->setTemplate('personal_library_template.php');
	    $this->template->setLeftSideBar('pre_login_left_sidebar_add_event',$this->data); 
	    
	    # Load page model
	    $this->load->model('page');
	    
	    # Load user event model
	    $this->load->model('user_event_model', 'uem');
	    
	    # Load user event status model
	    $this->load->model('user_event_status_model', 'uesm');
	    
	    # Get Created offers
	    $data['createdOffer'] = $this->uem->get_by_user($userId);
	    
	    # Get Incomplete Offers
	    $data['incompleteOffers'] = $this->uem->get_incomplete_offers($userId);
	    
	    # Get Declined Offers
	    $data['declinedOffers'] = $this->uesm->get_by_user_and_status($userId, User_event_status_model::STATUS_DECLINE);
	    
	    # Get offers recommended to friends
	    
	    
	    # Get Smart contract offers
	    
	    # Get completed offers
	    $data['completedOffers'] = $this->uem->get_completed_offers($userId);
	    	    
	    # Get escrow offers
	    
	    $this->template->title("Add Event");
	    $this->template->render('services/new_calendar', $data);
	}
	
	/*
	 * 
	 * OLD FUNCTION
	public function index()
	{
				
		$additionalScripts = array('plugin/fullcalendar/moment.min.js', 'plugin/fullcalendar/fullcalendar.js');
		$additionalStyles = array('fullcalendar/fullcalendar.css');
		
		$this->template->setAdditionalScript($additionalScripts);
		$this->template->setAdditionalStyle($additionalStyles);
		
		$this->template->title("Library");
		$this->template->render('services/library');
	}
	
	*/
	
	
	public function public_library()
	{
		$this->template->setTemplate('public_master_template.php');

		# Load page model and get all data
		$membeshipLevel = 1;
		if($this->session->userdata('id'))
		{
			$userObj = $this->user->getUserProfile($this->session->userdata('id'));
			$membeshipLevel = $userObj->{User::_USER_MEMBERSHIP_LEVEL};
			$isLoggedIn = true;
		}
		
		$this->data['datas'] = $this->page->get_data(20, 'desc', $membeshipLevel);
		$this->template->setLeftSideBar('left_menu',$this->data);
		
		
		
		$additionalScripts = array('plugin/fullcalendar/moment.min.js', 'plugin/fullcalendar/fullcalendar.js');
		$additionalStyles = array('fullcalendar/fullcalendar.css');
			
		$this->template->setAdditionalScript($additionalScripts);
		$this->template->setAdditionalStyle($additionalStyles);
			
		$this->template->title("Public Library");
		$this->template->render('services/public_library');
	}
	
	
	public function public_library_add_data()
	{
		$this->load->model('tasks_goals');
		
		$userId = $this->session->userdata('id');
		
		$this->data['tasks'] = $this->tasks_goals->get_task_by_user($userId);
		$this->data['goals'] = $this->tasks_goals->get_goals_by_user($userId);
		
		
		$this->template->setTemplate('public_master_template.php');
		$this->template->setLeftSideBar('library_left_menu',$this->data);
		#$this->template->setRightSideBar('right_sidebar', $this->data);
		
		
		$data = array();
		
		/* Check if post parameter title and description exists */
		
		if($this->input->post('title') && $this->input->post('description'))
		{
			$userId = $this->session->userdata('id');
			$category = $this->input->post('data_type');
			$visibility= $this->input->post('visibility');
			$tag= $this->input->post('tags');
			$title = $this->input->post('title');
			$anonymous = $this->input->post('anonymous') ? 1 : 0;
			$description = $this->input->post('description');
			$countriesAvailableIn = $this->input->post('countries');
			$countriesLegalIn = $this->input->post('legal_countries');
			$country_allowed_in = $this->input->post('physically_legal_countries');
			$price = $this->input->post('points');
			$priceType = $this->input->post('chckbox-price-per-read-article') == 2 ? 1 : 0;
			$metaTitle = '';
			$metaKeyword = '';
			$metaDescription = '';
			
			$countries = implode(',', $countriesAvailableIn);
			foreach ($countriesAvailableIn as $c)
			{
				if($c == 'Select All') { $countries = $this->country->get_country_ids(); break; }
			}
			
			$countriesLegal = implode(',', $countriesLegalIn);
			foreach ($countriesLegalIn as $c)
			{
				if($c == 'Select All') { $countriesLegal = $this->country->get_country_ids(); break; }
			}
			
			
			
			$lastId = $this->page->create_page($category, $userId, $visibility, $title, $description, $anonymous, $countries, $countriesLegal, $price, $priceType, $tag, $country_allowed_in);
			
			# Lets Check if we have some documents along with the data
			
			if($this->input->post('hidden_documents'))
			{
				# Load data document model
				$this->load->model('data_document_model');
				
				foreach ($this->input->post('hidden_documents') as $document)
				{
					$this->data_document_model->create_new_data_document($lastId, $document);
				}
			}
			
			if($visibility == 7)
			{
				# Load Page_specified_user_assignment_model model
				
				$this->load->model('Page_specified_user_assignment_model', 'mm');
				foreach ($this->input->post('specified_user_value') as $u)
				{
					$this->mm->assign_data_to_specified_user($lastId, $u);
				}
			}
			
			
					
			if($category!=20 && $category!=17)
			{
				$mod1 = $this->input->post('visual_images_val');
				$mod2 = $this->input->post('visual_motion');
				$mod3 = $this->input->post('visual_motion_val');
				$mod4 = $this->input->post('visual_color');
				$mod5 = $this->input->post('visual_color_val');
				$mod6 = $this->input->post('visual_bright');
				$mod7 = $this->input->post('visual_bright_val');
				$mod8 = $this->input->post('visual_focused');
				$mod9 = $this->input->post('visual_focused_val');
				$mod10 = $this->input->post('visual_bordered');
				$mod11 = $this->input->post('visual_bordered_val');
				$mod12 = $this->input->post('visual_associated');
				$mod13 = $this->input->post('visual_associated_val');
				$mod14 = $this->input->post('visual_center');
				$mod15 = $this->input->post('visual_center_val');
				$mod16 = $this->input->post('visual_size_val');
				$mod17 = $this->input->post('visual_shape_val');
				$mod18 = $this->input->post('visual_flat');
				$mod19 = $this->input->post('visual_flat_val');
				$mod20 = $this->input->post('visual_close');
				$mod21 = $this->input->post('visual_close_val');
				$mod22 = $this->input->post('visual_panormic');
				$mod23 = $this->input->post('visual_panormic_val');
				$mod24 = $this->input->post('auditory_sound_val');
				$mod25 = $this->input->post('auditory_volume_val');
				$mod26 = $this->input->post('auditory_tone_val');
				$mod27 = $this->input->post('auditory_tempo_val');
				$mod28 = $this->input->post('auditory_pitch_val');
				$mod29 = $this->input->post('auditory_pace_val');
				$mod30 = $this->input->post('auditory_timbre_val');
				$mod31 = $this->input->post('auditory_duration_val');
				$mod32 = $this->input->post('auditory_intensity_val');
				$mod33 = $this->input->post('auditory_rhythm_val');
				$mod34 = $this->input->post('auditory_direction_val');
				$mod35 = $this->input->post('auditory_harmony_val');
				$mod36 = $this->input->post('auditory_ear_val');
				$mod37 = $this->input->post('kinesthic_breating_val');
				$mod38 = $this->input->post('kinesthic_pulse_val');
				$mod39 = $this->input->post('kinesthic_skin_val');
				$mod40 = $this->input->post('kinesthic_weight_val');
				$mod41 = $this->input->post('kinesthic_pressure_val');
				$mod42 = $this->input->post('kinesthic_intensity_val');
				$mod43 = $this->input->post('kinesthic_tactile_val');
				$mod44 = $this->input->post('olafactory_sweet_val');
				$mod45 = $this->input->post('olafactory_sour_val');
				$mod46 = $this->input->post('olafactory_salt_val');
				$mod47 = $this->input->post('olafactory_bitter_val');
				$mod48 = $this->input->post('olafactory_aroma_val');
				$mod49 = $this->input->post('olafactory_fragrance_val');
				$mod50 = $this->input->post('olafactory_essence_val');
				$mod51 = $this->input->post('olafactory_pungence_val');
				$mod52 = $this->input->post('kinesthic_location_in_body_val');
				
				
				# Once we have data created lets create submodility
				
				$this->load->model('page_submodility','submodility');
				
				$this->submodility->update_page_submodility($lastId, $mod1, $mod2, $mod3, $mod4, $mod5, $mod6, $mod7, $mod8, $mod9, $mod10, $mod11, $mod12, $mod13, $mod14, $mod15, $mod16, $mod17, $mod18, $mod19, $mod20, $mod21, $mod22, $mod23, $mod24, $mod25, $mod26, $mod27, $mod28, $mod29, $mod30, $mod31, $mod32, $mod33, $mod34, $mod35, $mod36, $mod37, $mod38, $mod39, $mod40, $mod41, $mod42, $mod43, $mod44, $mod45, $mod46, $mod47, $mod48, $mod49, $mod50, $mod51, $mod52);
			}
		    
			# Once the data is created we can do rss feed subscription for the user
			
			$this->load->model('rss_feed_subscription_model','rss');
			$this->rss->create_rss_feed_subscription($this->session->userdata('id'), $lastId, $this->input->post('data_type'), '');
			
			# Now once the data is created, rss subscription is also done, now it's time to create
			# a group with the name of the data
			# Load cometchat engine
			
			$this->load->library('cometchat_engine');
			
			ob_start();
			$this->cometchat_engine->create_group($lastId, $this->input->post('title'), 2);
			$chatroomData = ob_get_clean();
			$chatroomDataArr = json_decode($chatroomData, true);
			
			$res = $this->cometchat_engine->add_user_to_group($chatroomDataArr['success']['roomid'], $this->session->userdata('id'));
			
			# Let's update the created by here
			
			$data = array('createdby'=> $this->session->userdata('id'));
			$this->db->where('id', $chatroomDataArr['success']['roomid']);
			$this->db->update('cometchat_chatrooms', $data);
			
			
			if($lastId) {$this->message->setFlashMessage(Message::DATA_CREATE_SUCCESS, array('id'=>'1'));}
			else {$this->message->setFlashMessage(Message::DATA_CREATE_FAILURE);}

			redirect(base_url('profile'));
		}
				
		$additionalScripts = array('plugin/summernote/summernote.js','summernote.js', 'plugin/dropzone/dropzone.min.js', 'plugin/taginputs/jquery.tagsinput.js', 'plugin/select2/select2.full.min.js');
		$additionalStyles = array('summernote/summernote.css','dropzone/dropzone.min.css', 'jquery-tagsinput/jquery.tagsinput.css', 'select2/select2.min.css',);
		
		$this->template->setAdditionalScript($additionalScripts);
		$this->template->setAdditionalStyle($additionalStyles);
		
		
		$data['countries'] = $this->country->getCountries();
		$data['users'] = $this->user->get_users();
		
		$this->template->title("Add Data");
		$this->template->render('services/add_data', $data);
	}
	
	public function add_tasks_goal()
	{
		if($this->input->post('content'))
		{
			$this->load->model('tasks_goals');
			
			$type = '';
			switch ($this->input->post('hidden_type'))
			{
				case 'goal': $type = Tasks_goals::TYPE_GOAL; $successMessage = Message::GOAL_CREATE_SUCCESS; $failureMessage = Message::GOAL_CREATE_FAILURE; break;
				case 'task': $type = Tasks_goals::TYPE_TASK; $successMessage = Message::TASK_CREATE_SUCCESS; $failureMessage = Message::TASK_CREATE_FAILURE; break;
			}
			
			$lastId = $this->tasks_goals->create_new_task_goals($this->session->userdata('id'), $this->input->post('content'), $type);
			
			if($lastId) {$this->message->setFlashMessage($successMessage, array('id'=>'1'));}
			else {$this->message->setFlashMessage($failureMessage);}
			
			# TODO
// 			$redirectURL = strstr($this->input->post('hidden_redirect_path'), '/spaceage_guru');
// 			# Remove base directory and index.php
// 			$redirectURL = str_replace('/spaceage_guru/', '', $redirectURL);
			
			redirect(base_url('profile'));
		}
	}
	
	public function register_new_event()
	{
	    $this->template->setTemplate('public_master_template.php');
	    $this->template->setLeftSideBar('library_left_menu',$this->data);
	    $this->template->setRightSideBar('right_sidebar', $this->data);
	    
	    if($this->input->post('data_type'))
	    {   
	        # Load user event model
	        $this->load->model('user_event_model', 'event');
	        
	        $userId = $this->session->userdata('id');
	        $topic = $this->input->post('data_type');
	        $itemId = $this->input->post('item_name');
	        $priceCurrency =  $this->input->post('price_currency');
	        $comment =  $this->input->post('event_comment');
	        $image =  "";
	        $pctPrice =  $this->input->post('pct_price');
	        $price =  $this->input->post('price');
	        $paymentFrom =  $this->input->post('payment_from');
	        $deliveryMethod =  $this->input->post('delivery_method');
	        $escrowReleased =  $this->input->post('payment_when');
	        $expiryDate =  $this->input->post('escrow_date_time');
	        $hasExpiry = $this->input->post('has_date_time') ? 0 : 1;
	        
	        $escrowType =  $this->input->post('escrow_type');
	        $minLimit =  $this->input->post('min_limit');
	        $maxLimit =  $this->input->post('max_limit');
	        $location =  $this->input->post('location');
	        $address =  $this->input->post('address');
	        $lat =  $this->input->post('lat');
	        $lng =  $this->input->post('lng');
	        
	        if($_FILES)
	        {
	            # Get Image and Create Thumb and upload
	            
	            $file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
	            $upload_exts = explode(".", $_FILES["file"]["name"]);
	            $upload_exts = end($upload_exts);
	            
	            if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 2000000) && in_array($upload_exts, $file_exts))
	            {
	                if ($_FILES["file"]["error"] > 0) {  }
	                else
	                {
	                    $extensionArr = explode($_FILES["file"]["type"]);
	                    $extension = $extensionArr[1];
	                    
	                    # Generate Timestamp name for image name and upload
	                    $image = md5($_FILES["file"]["name"].microtime()).$extension;	                    
	                    move_uploaded_file($_FILES["file"]["tmp_name"], Template::_PUBLIC_DATA_DOCUMENT_DIR . $image);	                    						
	                    
	                }
	            }
	        }
	        
	        $data = array(
	            User_event_model::_USER_ID => $userId,
	            User_event_model::_TOPIC => $topic,
	            User_event_model::_ITEM_ID => $itemId,	            
	            User_event_model::_COMMENT => $comment,
	            User_event_model::_IMAGE => $image,
	            User_event_model::_PCT_PRICE => $pctPrice,
	            User_event_model::_PRICE => $price,
	            User_event_model::_PRICE_CURRENCY => $priceCurrency,
	            User_event_model::_PAYMENT_FROM => $paymentFrom,
	            User_event_model::_DELIVERY_METHOD => $deliveryMethod,
	            User_event_model::_ESCROW_RELEASED => $escrowReleased,
	            User_event_model::_EXPIRY_DATE => $expiryDate,
	            User_event_model::_HAS_EXPIRY => $hasExpiry,
	            User_event_model::_ESCROW_TYPE => $escrowType,
	            User_event_model::_ESCROW_MIN_LIMIT => $minLimit,
	            User_event_model::_ESCROW_MAX_LIMIT => $maxLimit,
	            User_event_model::_LOCATION => $location,
	            User_event_model::_ADDRESS => $address,
	            User_event_model::_LAT => $lat,
	            User_event_model::_LNG => $lng,
	            
	        );
	        
	        if($this->event->register_new_event($data))
	        {
	            $this->message->setFlashMessage(Message::EVENT_CREATE_SUCCESS, array('id'=>1));
	        }
	        else
	        {
	            $this->message->setFlashMessage(Message::EVENT_CREATE_FAILURE);
	        }
	        
	        redirect('profile');
	    }
	}
	
	public function register_event_status()
	{
	    if($this->input->post('action'))
	    {
	        $eventId = $this->input->post('event-id');
	        $userId = $this->session->userdata('id');
	        
	        # Load user event status model
	        $this->load->model('user_event_status_model','uesm');
	        
	        switch ($this->input->post('action'))
	        {
	            case 'decline' :  $status = User_event_status_model::STATUS_DECLINE; break;	            
	        }
	        
	        if($this->uesm->register_event_status($eventId, $userId, $status))
            $this->message->setFlashMessage(Message::OFFER_DECLINE_SUCCESS, array('id'=>'1'));
            else {$this->message->setFlashMessage(Message::OFFER_DECLINE_FAILURE);}
	        
	        redirect($this->input->post('redirect_url'));
	        
	    }
	}
	
	public function yield_event($eventId)
	{	 	   
        $data = array();
	        
        # Load user event status model
        $this->load->model('user_event_status_model','uesm');
	        
        # Load user event model
        $this->load->model('user_event_model', 'uem');
        
        # Update event status to pending
        $this->uem->update_status($eventId, User_event_model::EVENT_PENDING);
        
        # Load user model
        $this->load->model('user');
	        	        
        $userId = $this->session->userdata('id');
        $status = User_event_status_model::STATUS_YIELD_SMART_CONTRACT;
        
        # Check if event status already exists
        $result = $this->uesm->get_by_id($eventId, $userId);
        if(empty($result)) $this->uesm->register_event_status($eventId, $userId, $status);
        
        $data['eventData'] = $this->uem->get_by_id($eventId);
        	        
        $data['accounts'] = $this->db->from('user')->get()->result();
        
        $data['profile'] = $this->user->getUserProfile($userId);
        	        
        $this->template->render('services/pct_transfer', $data);	            
	    
	}
	
	public function yield_escrow($eventId)
	{
	    $data = array();
	    
	    # Load user event status model
	    $this->load->model('user_event_status_model','uesm');
	    
	    # Load user event model
	    $this->load->model('user_event_model', 'uem');
	    
	    # Load user event escrow model
	    $this->load->model('user_event_escrow_model', 'ueem');
	    
	    # Update event status to pending
	    $this->uem->update_status($eventId, User_event_model::EVENT_PENDING);
	    
	    # Load user model
	    $this->load->model('user');
	    
	    $userId = $this->session->userdata('id');
	    $status = User_event_status_model::STATUS_YIELD_ESCROW;
	    
	    # Check if event status already exists
	    $result = $this->uesm->get_by_id($eventId, $userId);
	    
	    if(empty($result)) $this->uesm->register_event_status($eventId, $userId, $status);
	    
	    $data['eventData'] = $this->uem->get_by_id($eventId);
	    
	    $data['accounts'] = $this->db->from('user')->get()->result();
	    
	    $data['profile'] = $this->user->getUserProfile($userId);
	    
	    # Now since we are doing the escrow, let's store the details in esrow table
	    	    
	    $criteria = array(User_event_escrow_model::_EVENT_ID => $eventId);
	    $result = $this->ueem->get_by_criteria($criteria);
	    
	    $data['escrowId'] = ""; $data['sellerId'] = ""; $data['sellerApproved'] = "";
	    
	    if(!empty($result))
	    {
	        $data['escrowId'] = $result[0]->{User_event_escrow_model::_ID};
	        $data['sellerId'] = $result[0]->{User_event_escrow_model::_ESCROW_SELLER_ID};
	        $data['sellerApproved'] = $result[0]->{User_event_escrow_model::_SELLER_APPROVED};
	    }
	    else
	    {
	        $data['escrowId'] = $this->ueem->yield_offer($eventId, $data['eventData']->{User_event_model::_USER_ID}, $userId);
	        $eventEscrowData = $this->ueem->get_by_id($data['escrowId']);
	        
	        $data['sellerId'] = $eventEscrowData->{User_event_escrow_model::_ESCROW_SELLER_ID};
	        $data['sellerApproved'] = $eventEscrowData->{User_event_escrow_model::_SELLER_APPROVED};
	    }
	    	    
	    $this->template->title('Create Escrow');
	    $this->template->render('services/escrow_create_view', $data);
	}
	
	public function accept_escrow($escrowId)
	{
	    $escrow = json_decode($this->input->post('escrow'), true);
	    $escrowId = $this->uri->segment('4');
	    
	    if(empty($escrow))
	    {
	        $this->message->setFlashMessage(Message::GENERAL_ERROR);
	        redirect(base_url('profile'));
	    }
	    
	    
	    # Load model
	    $this->load->model('user_event_escrow_model', 'ueem');
	    $result = $this->ueem->accept_offer($escrowId, $escrow['escrow_notes'], $escrow['payment_from'], $escrow['delivery_method'], $escrow['payment_when'], $escrow['escrow_address'], $escrow['escrow_price']);
	    
	    if($result) {$this->message->setFlashMessage(Message::OFFER_ACCEPT_SUCCESS, array('id'=>'1'));}
	    else {$this->message->setFlashMessage(Message::OFFER_ACCEPT_FAILURE    );}
	    
	    redirect(base_url('escrow-list'));
	}
	
	public function save_escrow($escrowId)
	{
	    $escrow = json_decode($this->input->post('escrow'), true);
	    $escrowId = $this->uri->segment('4');
	    
	    if(empty($escrow))
	    {
	        $this->message->setFlashMessage(Message::GENERAL_ERROR);
	        redirect(base_url('profile'));
	    }
	    
	    
	    # Load model
	    $this->load->model('user_event_escrow_model', 'ueem');
	    $result = $this->ueem->save_offer($escrowId, $escrow['escrow_notes'], $escrow['payment_from'], $escrow['delivery_method'], $escrow['payment_when'], $escrow['escrow_address'], $escrow['escrow_price']);
	    	    
	    if($result) {$this->message->setFlashMessage(Message::OFFER_SAVED_SUCCESS, array('id'=>'1'));}
	    else {$this->message->setFlashMessage(Message::OFFER_SAVED_FAILURE);}
	    
	    redirect(base_url('escrow-list'));
	}
	
	public function approve_escrow($escrowId)
	{	    
	    # Load model
	    $this->load->model('user_event_escrow_model', 'ueem');
	    $result = $this->ueem->approve_offer($escrowId);
	    
	    if($result) {$this->message->setFlashMessage(Message::OFFER_APPROVE_SUCCESS, array('id'=>'1'));}
	    else {$this->message->setFlashMessage(Message::OFFER_APPROVE_FAILURE);}
	    
	    redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function pay_escrow($escrowId)
	{
	    $data = array();
	    
	    # Load user model
	    $this->load->model('user');
	    $userId = $this->session->userdata('id');
	    
	    # Load user escrow event model
	    $this->load->model('user_event_escrow_model', 'ueem');
	    $escrowData = $this->ueem->get_by_id($escrowId);
	    
	    # Load user event model
	    $this->load->model('user_event_model','uem');
	    
	    # Load page model
	    $this->load->model('page');
	    
	    $data['eventData'] = $this->uem->get_by_id($escrowData->{User_event_escrow_model::_EVENT_ID});
	    	    
	    $data['profile'] = $this->user->getUserProfile($userId);
	    $data['escrowId'] = $escrowId;
	    
	    $this->template->title("Pay Via Internal PCT Wallet");
	    $this->template->render('escrow-payment-internal-pct-wallet', $data);
	}
	
	public function escrow_list()
	{
	    $response = array();
	    
	    $userId = $this->session->userdata('id');
	    
	    # Load page view to be used
	    $this->load->model('user_event_escrow_model', 'ueem');
	    
	    # Load user event status model
	    $this->load->model('user_event_status_model', 'uesm');
	    
	    # Load Library Event Model
	    $this->load->model('user_event_model','uem');
	    
	    # Load page model
	    $this->load->model('page');
	    
	    # Get Saved Escrow Data
	    $criteria = '('.User_event_escrow_model::_ESCROW_BUYER_ID.' = '.$userId. ' OR '. User_event_escrow_model::_ESCROW_SELLER_ID. ' = '.$userId .') AND ' .User_event_escrow_model::_STATUS.' = '.User_event_escrow_model::YIELD_OFFER;
	    $response['data']['yielded_escrow'] = $this->ueem->get_by_criteria($criteria);
	    
	    # Get Saved Escrow Data
	    $criteria = '('.User_event_escrow_model::_ESCROW_BUYER_ID.' = '.$userId. ' OR '. User_event_escrow_model::_ESCROW_SELLER_ID. ' = '.$userId .') AND ' .User_event_escrow_model::_STATUS.' = '.User_event_escrow_model::SAVE_AND_EXIT;
	    $response['data']['saved_escrow'] = $this->ueem->get_by_criteria($criteria);
	    
	    # Get Accepted Escrow Data
	    $criteria = '('.User_event_escrow_model::_ESCROW_BUYER_ID.' = '.$userId. ' OR '. User_event_escrow_model::_ESCROW_SELLER_ID. ' = '.$userId . ') AND ' .User_event_escrow_model::_STATUS.' = '.User_event_escrow_model::ACCEPT_OFFER;
	    $response['data']['accepted_escrow'] = $this->ueem->get_by_criteria($criteria);
	    	    
	    $this->template->title('Escrow List');
	    $this->template->render('services/escrow_view', $response);
	}
	
    public function edit_event($eventId)
    {
        $response = array();
        
        $userId = $this->session->userdata('id');
        
        # Load User Event Model
        $this->load->model('user_event_model','uem');
        $response['eventData'] = $this->uem->get_by_id($eventId);
        
        # Load personal library data
        $response['datas'] = $this->page->get_data_created_and_purchased_by_user($this->session->userdata('id'));
        
        $response['currencyRates'] = $this->pct->get_rates();
        $response['currencies'] = $this->currency->getCurrencies();
        $response['profile'] = $this->user->getUserProfile($userId);
        
        
        if($this->input->post('data_type'))
        {
            # Load user event model
            $this->load->model('user_event_model', 'event');
            
            $userId = $this->session->userdata('id');
            $topic = $this->input->post('data_type');
            $itemId = $this->input->post('item_name');
            $priceCurrency =  $this->input->post('price_currency');
            $comment =  $this->input->post('event_comment');
            $image =  "";
            $pctPrice =  $this->input->post('pct_price');
            $price =  $this->input->post('price');
            $paymentFrom =  $this->input->post('payment_from');
            $deliveryMethod =  $this->input->post('delivery_method');
            $escrowReleased =  $this->input->post('payment_when');
            $expiryDate =  $this->input->post('escrow_date_time');
            $hasExpiry = $this->input->post('has_date_time') ? 0 : 1;
            
            $escrowType =  $this->input->post('escrow_type');
            $minLimit =  $this->input->post('min_limit');
            $maxLimit =  $this->input->post('max_limit');
            $location =  $this->input->post('location');
            $address =  $this->input->post('address');
            $lat =  $this->input->post('lat');
            $lng =  $this->input->post('lng');
            
            if($_FILES)
            {
                # Get Image and Create Thumb and upload
                
                $file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
                $upload_exts = explode(".", $_FILES["file"]["name"]);
                $upload_exts = end($upload_exts);
                
                if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 2000000) && in_array($upload_exts, $file_exts))
                {
                    if ($_FILES["file"]["error"] > 0) {  }
                    else
                    {
                        $extensionArr = explode($_FILES["file"]["type"]);
                        $extension = $extensionArr[1];
                        
                        # Generate Timestamp name for image name and upload
                        $image = md5($_FILES["file"]["name"].microtime()).$extension;
                        move_uploaded_file($_FILES["file"]["tmp_name"], Template::_PUBLIC_DATA_DOCUMENT_DIR . $image);
                        
                    }
                }
            }
            
            $data = array(                
                User_event_model::_TOPIC => $topic,
                User_event_model::_ITEM_ID => $itemId,
                User_event_model::_COMMENT => $comment,
                User_event_model::_IMAGE => $image,
                User_event_model::_PCT_PRICE => $pctPrice,
                User_event_model::_PRICE => $price,
                User_event_model::_PRICE_CURRENCY => $priceCurrency,
                User_event_model::_PAYMENT_FROM => $paymentFrom,
                User_event_model::_DELIVERY_METHOD => $deliveryMethod,
                User_event_model::_ESCROW_RELEASED => $escrowReleased,
                User_event_model::_EXPIRY_DATE => $expiryDate,
                User_event_model::_HAS_EXPIRY => $hasExpiry,
                User_event_model::_ESCROW_TYPE => $escrowType,
                User_event_model::_ESCROW_MIN_LIMIT => $minLimit,
                User_event_model::_ESCROW_MAX_LIMIT => $maxLimit,
                User_event_model::_LOCATION => $location,
                User_event_model::_ADDRESS => $address,
                User_event_model::_LAT => $lat,
                User_event_model::_LNG => $lng,
                
            );
            
            if($this->event->update_event($eventId, $data))
            {
                $this->message->setFlashMessage(Message::EVENT_UPDATE_SUCCESS, array('id'=>1));
            }
            else
            {
                $this->message->setFlashMessage(Message::EVENT_UPDATE_FAILURE);
            }
            
            redirect(base_url('timeline'));
        
        }
        
        $this->template->title('Edit Event');
        $this->template->render('services/event_edit', $response);
        
    }
}

