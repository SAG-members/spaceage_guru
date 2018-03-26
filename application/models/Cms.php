<?php

class Cms extends CI_Model
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
		
	public function getCMSPageById($pageId)
	{
		$response = array();
		
		$this->db->select('*');
		$this->db->from(static::_TABLE);
		$this->db->where(static::_ID,$pageId);
		$response = $this->db->get()->row();
		
		return $response;
	}
	
	public function get_by_slug($slug)
	{
		$response = array();
		
		$this->db->select('*');
		$this->db->from(static::_TABLE);
		$this->db->where(static::_SLUG,$slug);
		$response = $this->db->get()->row();
		
		return $response;
	}
		
}