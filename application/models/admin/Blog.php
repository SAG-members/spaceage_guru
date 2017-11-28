<?php

class Blog extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'blog_post';
	const _ID = 'id';
	const _USER_ID = 'user_id';
	const _POST_TITLE = 'post_title';
	const _POST_CONTENT = 'post_content';
	const _POST_SLUG = 'post_slug';
	const _ANONYMOUS = 'anonymous';
	const _VISIBILITY = 'visibility';
	const _POINTS = 'points';
	const _META_TITLE = 'meta_title';
	const _META_KEYWORDS = 'meta_keywords';
	const _META_DESCRIPTION = 'meta_description';
	const _PUBLISHED_DATE = 'published_date';
	const _MODIFIED_DATE = 'modified_date';
	const _MODIFIED_BY = 'modified_by';
	const _STATUS = 'status';
	
	const PUBLISH_POST = 1;
	const UNPUBLISH_POST = 0;
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function createNewPost($userId, $title, $content, $anonymous, $visibility, $points, $metaTitle, $metaKeywords, $metaDescription)
	{
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
	
		$data = array(
				static::_USER_ID=>$userId,
				static::_POST_TITLE=>$title,
				static::_POST_CONTENT=>$content,
				static::_POST_SLUG=>create_slug($title),
				static::_ANONYMOUS=>$anonymous,
				static::_VISIBILITY=>$visibility,
				static::_POINTS=>$points,
				static::_META_TITLE=>$metaTitle,
				static::_META_KEYWORDS=>$metaKeywords,
				static::_META_DESCRIPTION=>$metaDescription,
				static::_PUBLISHED_DATE=>$date,
				static::_STATUS=>1,
		);
	
		$this->db->insert(static::_TABLE, $data);
		return $this->db->insert_id();
	}
	
	public function updatePost($userId, $postId, $title, $content, $anonymous, $visibility, $points, $metaTitle, $metaKeywords, $metaDescription)
	{
		$flag = false;
		
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array(
				static::_POST_TITLE=>$title,
				static::_POST_CONTENT=>$content,
				static::_ANONYMOUS=>$anonymous,
				static::_VISIBILITY=>$visibility,
				static::_POINTS=>$points,
				static::_META_TITLE=>$metaTitle,
				static::_META_KEYWORDS=>$metaKeywords,
				static::_META_DESCRIPTION=>$metaDescription,
				static::_MODIFIED_DATE=>$date,
				static::_MODIFIED_BY=>$userId,
				static::_STATUS=>1,
		);
		
		
		$this->db->where(static::_ID, $postId);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag;
			
	}
	
	public function getPostById($postId)
	{
		$response = array();
	
		$this->db->from(static::_TABLE);
		$this->db->where(static::_ID,$postId);
		$query = $this->db->get();
	
		$row = $query->row();
	
		$response['id'] = $row->{static::_ID};
		$response['post-title'] = $row->{static::_POST_TITLE};
		$response['post-content'] = $row->{static::_POST_CONTENT};
		$response['published-date'] = $row->{static::_PUBLISHED_DATE};
		$response['modified-date'] = $row->{static::_MODIFIED_DATE};
		$response['anonymous'] = $row->{static::_ANONYMOUS};
		$response['visibility'] = $row->{static::_VISIBILITY};
		$response['points'] = $row->{static::_POINTS};
		$response['metaTitle'] = $row->{static::_META_TITLE};
		$response['metaKeyword'] = $row->{static::_META_KEYWORDS};
		$response['metaDescription'] = $row->{static::_META_DESCRIPTION};
		$response['status'] = $row->{static::_STATUS};
	
		return $response;
	}
	
	public function getBlogCount($userId)
	{
		$response = array();
		
		$this->db->select('*');
		$this->db->from(static::_TABLE);
		$query = $this->db->get();
		
		return $query->num_rows();
	}
	
	public function getBlogs($userId, $search=NULL, $limit, $offset=NULL)
	{
		$response = array();
		
		$this->db->select('*');
		$this->db->from(static::_TABLE);
		if(!empty($search))
		{
			$this->db->where(static::_ID , $search);
			$this->db->where(static::_POST_TITLE , $search);
			$this->db->where(static::_POST_CONTENT , $search);
		}
		
		if($limit !=''){$this->db->limit($limit, $offset); }
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				$output = array();
				
				$output['id'] = $row->{static::_ID};
				$output['user_id'] = 'U'.(10000+$row->{static::_USER_ID});
				$output['post_title'] = $row->{static::_POST_TITLE};
				$output['status'] = $row->{static::_STATUS};
				
// 				$date = new DateTime($row->{static::_PUBLISHED_DATE});
// 				$date = $date->format('l jS \of F Y h:i:s A');
				$output['modified_date'] = $row->{static::_MODIFIED_DATE};
				$output['published_date'] = $row->{static::_PUBLISHED_DATE};
	
				$response[] = $output;			
			}
		}
		
		return $response;
	}
	
	public function deleteBlogById($id)
	{
		$flag = false;
		
		$this->db->where(static::_ID, $id);
		$flag = $this->db->delete(static::_TABLE);
		
		return $flag;
	}
	
	public function publishPost($postId)
	{
		$flag = false;
		
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array( static::_MODIFIED_DATE=>$date, static::_STATUS=>static::PUBLISH_POST);
		$postIds = array_map('intval', explode(',', $postId));			
		
		$this->db->where_in(static::_ID, $postIds);
		$flag = $this->db->update(static::_TABLE, $data);
				
		return $flag;
	}
	
	public function unPublishPost($postId)
	{
		$flag = false;
		
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array( static::_MODIFIED_DATE=>$date, static::_STATUS=>static::UNPUBLISH_POST);
		$postIds = array_map('intval', explode(',', $postId));
		
		$this->db->where_in(static::_ID, $postIds);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag;
	}
		
}