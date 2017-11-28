<?php

class Cms_model extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'cms';
	
	const _ID = 'id';
	const _TITLE = 'title';
	const _CONTENT = 'content';
	const _SLUG = 'slug';
	const _META_TITLE = 'meta_title';
	const _META_KEYWORD = 'meta_keywords';
	const _META_DESCRIPTION = 'meta_description';
	const _STATUS = 'status';
	const _DATE_CREATED = 'date_created';
	
	const PUBLISH_POST = 1;
	const UNPUBLISH_POST = 0;
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function create_new_page($title, $content, $metaTitle, $metaKeyword, $metaDesc)
	{
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
	
		$data = array(
				static::_TITLE=>$title,
				static::_CONTENT=>$content,
				static::_SLUG=>create_slug($title),
				static::_META_TITLE=>$metaTitle,
				static::_META_KEYWORD=>$metaKeyword,
				static::_META_DESCRIPTION=>$metaDesc,
				static::_STATUS=>1,
				static::_DATE_CREATED=>$date,
		);
	
		$this->db->insert(static::_TABLE, $data);
		return $this->db->insert_id();
	}
	
	public function get_page_by_slug($slug)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_SLUG,$slug);
		$response = $this->db->get()->row();
		
		return $response;
	}
	
	public function get_pages()
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$response = $this->db->get()->result();
		
		return $response;
	}
	
	public function update_page($pageId, $title, $content, $metaTitle, $metaKeyword, $metaDesc)
	{
		$flag = false;
		
		$data = array(
				static::_TITLE=>$title,
				static::_CONTENT=>$content,
				static::_META_TITLE=>$metaTitle,
				static::_META_KEYWORD=>$metaKeyword,
				static::_META_DESCRIPTION=>$metaDesc,
				static::_STATUS=>1,
		);
		
		$this->db->where(static::_ID, $pageId);
		$flag = $this->db->update(static::_TABLE, $data);
		return $flag;
	}
		
	public function publish_page($pageId)
	{
		$flag = false;
		
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array(static::_STATUS=>1);
		$pageIds = array_map('intval', explode(',', $pageId));			
		
		$this->db->where_in(static::_ID, $pageIds);
		$flag = $this->db->update(static::_TABLE, $data);
				
		return $flag;
	}
	
	public function unpublish_page($pageId)
	{
		$flag = false;
		
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array( static::_STATUS=>0);
		$pageIds = array_map('intval', explode(',', $pageId));
		
		$this->db->where_in(static::_ID, $pageIds);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag;
	}
		
}