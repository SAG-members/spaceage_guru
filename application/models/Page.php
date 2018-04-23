<?php

class Page extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'page';
	const _ID = 'id';
	const _CATEGORY_ID = 'category_id';
	const _USER_ID = 'user_id';
	const _PAGE_TITLE = 'page_title';
	const _VISIBILITY = 'visibility';
	const _PAGE_DESCRIPTION = 'page_description';
	const _PAGE_SLUG = 'page_slug';
	const _META_TITLE = 'meta_title'; 
	const _META_DESCRIPTION = 'meta_description';
	const _META_KEYWORD	 = 'meta_keywords';
	const _TAG = 'tag';
	const _COUNTRY_AVAILABLE_IN = 'country_available_in';
	const _COUNTRY_LEGAL_IN = 'country_legal_in';
	const _COUNTRY_ALLOWED_IN = 'country_allowed_in';
	const _PRICE = 'price';
	const _PRICELESS = 'priceless';
	const _ANONYMOUS = 'anonymous';
	const _STATUS = 'status';
	const _DATE_CREATED = 'date_created';
	const _MODIFIED_BY = 'modified_by';
	const _DATE_MODIFIED = 'date_modified';
	
	
	const PUBLISH_PAGE = 1;
	const UNPUBLISH_PAGE = 0;
		
	const VISIBILITY_PUBLIC = 1;
	const VISIBILITY_REGISTERED = 2;
	const VISIBILITY_UPGRADED = 3;
	const VISIBILITY_MEMBERSHIP_A = 4; 
	const VISIBILITY_MEMBERSHIP_B = 5;
	const VISIBILITY_MEMBERSHIP_C = 6;
	const VISIBILITY_MEMBERSHIP_D = 8;
	const VISIBILITY_SPECIFIED_USER = 9;
	
	
	
	const _CATEGORY_SERVICE = 1;
	const _CATEGORY_PRODUCT = 2;
	const _CATEGORY_MEMBERSHIP = 3;
	const _CATEGORY_FAQ = 4;
	const _CATEGORY_SYMPTOM = 5;
	const _CATEGORY_FAQ_ANSWER = 6;
	const _CATEGORY_SYMPTOM_ANSWER = 7;
	const _CATEGORY_SENSES = 8;
	const _CATEGORY_VISUAL = 9;
	const _CATEGORY_AUDITORY = 10;
	const _CATEGORY_KINESTHETIC = 11;
	const _CATEGORY_ODOUR = 12;
	const _CATEGORY_TASTURE = 13;
	const _CATEGORY_6TH_SENSE = 14;
	const _CATEGORY_PROFILE = 15;
	const _CATEGORY_ARTICLE = 17;
	const _CATEGORY_AUDIO_VISUAL = 18;
	const _CATEGORY_CURES = 19;
	const _CATEGORY_LEAGAL_NOTE = 20;
	const _CATEGORY_PCT = 21;
	
	
	public function __construct()
	{
		parent::__construct();
	} 
	
	public function create_page($category, $userId, $visibility, $title, $description, $anonymous, $countriesAvailableIn, $countryLegalIn, $price, $priceLess, $tag, $country_allowed_in = NULL)
	{
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
	
		$data = array(
				static::_PAGE_TITLE => $title,
				static::_PAGE_DESCRIPTION => $description,
				static::_PAGE_SLUG=>create_slug($title),
				static::_USER_ID=>$userId,
				static::_VISIBILITY => $visibility,
				static::_TAG => $tag,
				static::_CATEGORY_ID => $category,
				static::_COUNTRY_AVAILABLE_IN=>$countriesAvailableIn,
				static::_COUNTRY_LEGAL_IN=>$countryLegalIn,
		          static::_COUNTRY_ALLOWED_IN => $country_allowed_in,
				static::_PRICE=>$price,
				static::_PRICELESS=>$priceLess,
				static::_ANONYMOUS => $anonymous,
				static::_STATUS => static::PUBLISH_PAGE,
				static::_DATE_CREATED => $date
		);
	
	
		$this->db->insert(static::_TABLE, $data);
	
		return $this->db->insert_id();
	}
	
	public function update_page($dataId, $category, $visibility, $title, $description, $anonymous, $countriesAvailableIn, $countryLegalIn, $price, $priceLess, $tag, $country_allowed_in = NULL)
	{
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array(
				static::_PAGE_TITLE => $title,
				static::_PAGE_DESCRIPTION => $description,
				static::_PAGE_SLUG=>create_slug($title),
				static::_VISIBILITY => $visibility,
				static::_TAG => $tag,
				static::_CATEGORY_ID => $category,
				static::_COUNTRY_AVAILABLE_IN=>$countriesAvailableIn,
				static::_COUNTRY_LEGAL_IN=>$countryLegalIn,
		        static::_COUNTRY_ALLOWED_IN => $country_allowed_in,
				static::_PRICE=>$price,
				static::_PRICELESS=>$priceLess,
				static::_ANONYMOUS => $anonymous,
				static::_STATUS => static::PUBLISH_PAGE,
				static::_DATE_MODIFIED => $date
		);
		
		$this->db->where(static::_ID, $dataId);
		$this->db->update(static::_TABLE, $data);
		
		return $this->db->affected_rows();
	}
		
	public function get_data($limit = null, $order = null, $visibility = null, $userId = null)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_STATUS, 1);
		
		if($userId)
		{
			$this->db->where(static::_USER_ID, $userId);
		}
		if($visibility == null)
		{
			$this->db->where(static::_VISIBILITY, static::VISIBILITY_PUBLIC);
		}
		
		if($order) { $this->db->order_by(static::_ID, $order); }
		if($limit) { $this->db->limit($limit); }
		
		if($visibility && $visibility !="")
		{
			# Add this to ensure that products are visbile according to user group
			$this->db->where(static::_VISIBILITY .' <= ' . $visibility);
		}
		
		$response = $this->db->get()->result();
			
		return $response;
	}
	
	public function search_data($visibility = null, $searchKey = null, $categories = null, $tags = null)
	{
		$response = array();
		
		$this->db->select('id, page_title, page_slug, tag, category_id');
		$this->db->from(static::_TABLE);
		$this->db->where(static::_STATUS, 1);
				
		if($visibility)
		{
// 			$this->db->where(static::_VISIBILITY .' <= ', $visibility);
		}
				
		if($searchKey)
		{
// 		    $this->db->like(static::_PAGE_TITLE, $searchKey);
// 		    $this->db->or_like(static::_PAGE_DESCRIPTION, $searchKey);
		    $this->db->where(static::_PAGE_TITLE ." LIKE '$searchKey%' OR ". static::_PAGE_DESCRIPTION ." LIKE '$searchKey%'");
		    $this->db->or_where(static::_TAG ." LIKE '$searchKey%'");
		}
		
		if($categories)
		{
			$this->db->or_where_in(static::_CATEGORY_ID, $categories);
		}
		
		if($tags)
		{
			$this->db->or_where(static::_TAG ." LIKE '%$tags%'"); 
		}
		
		$this->db->order_by(static::_DATE_CREATED, 'DESC');
		
		$response = $this->db->get()->result();
		
		return $response;
	}
	
	
	
	
	public function get_data_created_and_purchased_by_user($userId)
	{
		$response = array();
		
		$this->db->select('A.*, B.item_id');
		$this->db->from("page as A");
		$this->db->join("psss_purchase_history B","A.id = B.item_id", 'left');
// 		$this->db->join('rss_feed_subscription C', "A.id = C.item_id", 'left');
		$this->db->where('A.user_id', $userId);
		$this->db->or_where('B.user_id', $userId);
// 		$this->db->or_where('C.user_id', $userId);
		$this->db->group_by('A.id');
		$response = $this->db->get()->result();
				
		return $response;
	}
	
	public function get_by_slug($slug)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_PAGE_SLUG, $slug);
		$this->db->order_by(static::_ID, "asc");
		$response = $this->db->get()->row();
		
		return $response;
	}
	
	public function get_by_id($id, $field = null)
	{
		$response = array();
	
		$this->db->from(static::_TABLE);
		$this->db->where(static::_ID, $id);		
		
		if($field) return $response = $this->db->get()->row()->{$field}; 
		
		$response = $this->db->get()->row();
	
		return $response;
	}
	
				
	public function delete_data($pageId, $newOwnerId)
	{
		# Since we don't want to remove the product completely from the system, we will move the product to admin pss
		
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array(
				static::_USER_ID => $newOwnerId,
				static::_DATE_MODIFIED => $date
		);
		
		$this->db->where(static::_ID, $pageId);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $this->db->affected_rows();
	}
	
	public function get_category($categoryId)
	{
		$category = '';
	
		switch ($categoryId)
		{
			case 1: return $category = 'Service'; break;
			case 2: return $category = 'Product'; break;
			case 3: $category = ''; break;
			case 4: $category = ''; break;
			case 5: return $category = 'Symptom'; break;
			case 6: $category = ''; break;
			case 7: $category = ''; break;
			case 8: return $category = 'Sensation'; break;
			case 9: $category = ''; break;
			case 10: $category = ''; break;
			case 11: $category = ''; break;
			case 12: $category = ''; break;
			case 13: $category = ''; break;
			case 14: $category = ''; break;
			case 15: $category = ''; break;
			case 16: $category = ''; break;
			case 17: return $category = 'Article'; break;
			case 18: return $category = 'Audio Visual'; break;
			case 19: return $category = 'Cures'; break;
			case 20: return $category = 'Legal Note'; break;
				
		}
		
	}
	
	public function get_data_by_user($userId)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_USER_ID, $userId);
		$this->db->order_by(static::_DATE_CREATED, " DESC ");
		
		$response = $this->db->get()->result();
		
		return $response;
	}
	
	public function get_user_data($userId)
	{
	    # This function will return all the data created by user+ all the data which is rss feed subscribed by user+
	    # All the data which is purchased by the user
	    
	    $this->load->model('rss_feed_subscription_model');
	    $this->load->model('psss_purchase_history');
	    
	    $sql = ''; 
	    
	    $sql .=' SELECT A.* FROM '.static::_TABLE .' A ';
	    $sql .=' LEFT JOIN '.Rss_feed_subscription_model::_TABLE . ' B ON A.'.static::_ID .' = B.'.Rss_feed_subscription_model::_ITEM_ID;
	    $sql .=' LEFT JOIN '.Psss_purchase_history::_TABLE. ' C ON A.'.static::_ID . ' = C.'. Psss_purchase_history::_ITEM_ID;
	    $sql .=' WHERE A.'.static::_USER_ID . ' = '.$userId;
	    $sql .=' OR B.'.Rss_feed_subscription_model::_USER_ID . ' = '. $userId;
	    $sql .=' OR C.'.Psss_purchase_history::_USER_ID .' = '.$userId;
	    $sql .=' GROUP BY A.'.static::_ID;
        
	    $response = $this->db->query($sql)->result();
	    
	    return $response;
	}
	
	
	
}