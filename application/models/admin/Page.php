<?php

class Page extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'page';
	const _ID = 'id';
	const _PAGE_TITLE = 'page_title';
	const _PAGE_DESCRIPTION = 'page_description';
	const _PAGE_SLUG = 'page_slug';
	const _META_TITLE = 'meta_title'; 
	const _META_DESCRIPTION = 'meta_description';
	const _META_KEYWORD	 = 'meta_keywords';
	const _VISIBILITY = 'visibility';
	const _TAG = 'tag';
	const _USER_ID = 'user_id';
	const _CATEGORY_ID = 'category_id';
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
	
	
	public function __construct()
	{
		parent::__construct();
	}
	
	
	public function create_page($category, $userId, $visibility, $title, $description, $anonymous, $countriesAvailableIn, $countriesLegalIn, $countriesAllowedIn, $metaTitle, $metaKeyword, $metaDescription, $price, $priceLess, $tag)
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
				static::_COUNTRY_LEGAL_IN=>$countriesLegalIn,
		        static::_COUNTRY_ALLOWED_IN=>$countriesAllowedIn,
				static::_META_TITLE=>$metaTitle,
				static::_META_KEYWORD=>$metaKeyword,
				static::_META_DESCRIPTION=>$metaDescription,
				static::_PRICE=>$price,
				static::_PRICELESS=>$priceLess,
				static::_ANONYMOUS => $anonymous,
				static::_STATUS => static::PUBLISH_PAGE,
				static::_DATE_CREATED => $date
		);
	
	
		$this->db->insert(static::_TABLE, $data);
	
		return $this->db->insert_id();
	}
			
	public function update_page($id, $userId, $category, $visibility, $title, $description, $anonymous, $countriesAvailableIn, $countriesLegalIn, $countriesAllowedIn, $metaTitle, $metaKeyword, $metaDescription, $price, $priceLess, $tag)
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
				static::_COUNTRY_LEGAL_IN=>$countriesLegalIn,
		        static::_COUNTRY_ALLOWED_IN=>$countriesAllowedIn,
				static::_META_TITLE=>$metaTitle,
				static::_META_KEYWORD=>$metaKeyword,
				static::_META_DESCRIPTION=>$metaDescription,
				static::_PRICE=>$price,
				static::_PRICELESS=>$priceLess,
				static::_ANONYMOUS => $anonymous,
				static::_STATUS => static::PUBLISH_PAGE,
				static::_DATE_MODIFIED => $date,
				static::_MODIFIED_BY => $userId
		);
		
		$this->db->where(static::_ID, $id);
		$this->db->update(static::_TABLE, $data);
	
		return $this->db->affected_rows();
	}
	
	public function get_by_id($id)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_ID, $id);
					
		$query = $this->db->get();
		
		if($query->num_rows() > 0) return $query->row();
		
		return $response;
	}
	
	public function get_slug_array()
	{
		$response = array();
		
		$this->db->select(static::_PAGE_SLUG);
		$this->db->from(static::_TABLE);
			
		$query = $this->db->get();
		
		if($query->num_rows() > 0) 
		{
			foreach ($query->result() as $r)
			{
				$output = array();
				
				$output['slug'] = $r->{static::_PAGE_SLUG};
				$response [] = $output;	
			}
		}
		
		return $response;
	}
	
	
	
	public function get_count($category)
	{
		$response = array();
		
		$this->db->select('*');
		$this->db->where(static::_CATEGORY_ID, $category);
		$this->db->from(static::_TABLE);
		$query = $this->db->get();
		
		return $query->num_rows();
	}

	
	public function get_data()
	{
		$response = array();
		
		$this->db->select('*');
		$this->db->from(static::_TABLE);
		$this->db->order_by(static::_DATE_CREATED, " DESC ");
		$query = $this->db->get();
		
		if($query->num_rows() > 0) return $query->result();
		
		return $response;
	}
		
	public function get_page($category, $userId, $search=NULL, $limit, $offset=NULL)
	{
		$response = array();
		
		$this->db->select('*');
		
		if(empty($category))
		{
			$this->db->where(
						static::_CATEGORY_ID . ' IN ('. static::_CATEGORY_VISUAL .','.static::_CATEGORY_AUDITORY.','.
						static::_CATEGORY_KINESTHETIC .','.static::_CATEGORY_ODOUR .','.static::_CATEGORY_TASTURE.','.
						static::_CATEGORY_6TH_SENSE .')'
					);
		}
		else
		{
			$this->db->where(static::_CATEGORY_ID, $category);
		}
		
		$this->db->from(static::_TABLE);
		
				
		if($limit !=''){$this->db->limit($limit, $offset); }
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0) return $query->result();
				
		return $response;
	}
	
	public function get_submodility($pageId)
	{
		$response = array();
		
		$this->db->select(static::_SUBMODILITY);
		$this->db->where(static::_ID, $pageId);
		$this->db->from(static::_TABLE);
			
		$query = $this->db->get();
		
		if($query->num_rows() > 0) return $query->row();
		
		return $response;
	}
	
	public function get_page_by_id($category, $id)
	{
		$response = array();
		
		$this->db->select('*');
		$this->db->where(static::_CATEGORY_ID, $category);
		$this->db->where(static::_ID, $id);
		$this->db->from(static::_TABLE);
			
		$query = $this->db->get();
	
		if($query->num_rows() > 0) return $query->row();
		
		return $response;
	}
	
	public function publish_page($category, $page)
	{
		$flag = false;
		
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array( static::_DATE_MODIFIED=>$date, static::_STATUS=>static::PUBLISH_PAGE);
		$pageIds = array_map('intval', explode(',', $page));
		
		$this->db->where(static::_CATEGORY_ID, $category);
		$this->db->where_in(static::_ID, $pageIds);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag;
	}
	
	public function unpublish_page($category, $page)
	{
		$flag = false;
		
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array( static::_DATE_MODIFIED=>$date, static::_STATUS=>static::UNPUBLISH_PAGE);
		$pageIds = array_map('intval', explode(',', $page));
		
		$this->db->where(static::_CATEGORY_ID, $category);
		$this->db->where_in(static::_ID, $pageIds);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag;
	}
	public function delete_page($category, $id)
	{
		$flag = false;
	
		$this->db->where(static::_ID, $id);
		$flag = $this->db->delete(static::_TABLE);
	
		return $flag;
	}

	public function get_visibility($visibility)
	{
		$publicity = '';
		switch ($visibility)
		{
			case static::VISIBILITY_PUBLIC : $publicity = 'Public'; break;
			case static::VISIBILITY_REGISTERED : $publicity = 'Registered'; break;
			case static::VISIBILITY_UPGRADED : $publicity = 'Upgraded'; break;
			case static::VISIBILITY_MEMBERSHIP_A : $publicity = 'Membership A'; break;
			case static::VISIBILITY_MEMBERSHIP_B : $publicity = 'Membership B'; break;
			case static::VISIBILITY_MEMBERSHIP_C : $publicity = 'Membership C'; break;
		}
		
		return $publicity;
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
}