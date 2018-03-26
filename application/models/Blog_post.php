<?php

class Blog_post extends CI_Model
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
	const _STATUS = 'status';
		
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getPostCount()
	{
		$this->db->from(static::_TABLE);
		$this->db->where(static::_STATUS, 1);
		$query = $this->db->get();
		
		return $query->num_rows();
	}

	public function getPosts($limit, $offset=NULL)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_STATUS, 1);
		$this->db->order_by(static::_ID, "desc");
		
		if($limit != '')$this->db->limit($limit, $offset);
		
		$query = $this->db->get();
		
		foreach ($query->result() as $row)
		{
			$output = array();
			
			$output['id'] = $row->{static::_ID};
			$output['slug'] = $row->{static::_POST_SLUG};
			$output['user_id'] = $row->{static::_USER_ID};
			$output['post_title'] = $row->{static::_POST_TITLE};
			$output['post_content'] = $row->{static::_POST_CONTENT};
			$output['visibility'] = $row->{static::_VISIBILITY};
			$date = new DateTime($row->{static::_PUBLISHED_DATE});
			$date = $date->format('l jS \of F Y h:i:s A');
			$output['published_date'] = $date;
			$output['modified_date'] = $row->{static::_MODIFIED_DATE};
			$output['status'] = $row->{static::_STATUS};
				
			$response[] = $output;
		}
		
		return $response;
	}
	
	public function getPostById($postId)
	{
		$this->load->model('blog_post_comment', 'comment');
		
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
		$response['status'] = $row->{static::_STATUS};
		$response['comments'] = $this->comment->getCommentsById($row->{static::_ID});
		
		return $response;
	}
	
	public function getPostBySlug($slug)
	{
		$this->load->model('user');
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_POST_SLUG .' LIKE '. "'$slug%'");
		$query = $this->db->get();
		
		$row = $query->row();
		
		$response['id'] = $row->{static::_ID};
		$response['post-title'] = $row->{static::_POST_TITLE};
		$response['user'] = User::generate_user_id($row->{static::_USER_ID});
		$response['post-content'] = $row->{static::_POST_CONTENT};
		$response['published-date'] = $row->{static::_PUBLISHED_DATE};
		$response['modified-date'] = $row->{static::_MODIFIED_DATE};
		$response['anonymous'] = $row->{static::_ANONYMOUS};
		$response['visibility'] = $row->{static::_VISIBILITY};
		$response['status'] = $row->{static::_STATUS};
		
		return $response;
	}
	
	public function createNewPost($userId, $title, $content, $anonymous, $visibility, $points)
	{
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array(
				static::_USER_ID=>$userId,
				static::_POST_TITLE=>$title,
				static::_POST_CONTENT=>$content,
				static::_POST_SLUG=>$this->create_url_slug($title),
				static::_ANONYMOUS=>$anonymous,
				static::_VISIBILITY=>$visibility,
				static::_POINTS=>$visibility,
				static::_PUBLISHED_DATE=>$date,
				static::_STATUS=>1,
		);
		
		$this->db->insert(static::_TABLE, $data);
		return $this->db->insert_id();
	}
	
	public function create_url_slug($title)
	{
		$slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $title);
		return $slug;
	}
	
	public function updatePost()
	{
		
	}
	
	public function deletePostById()
	{
		
	}
	
}