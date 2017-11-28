<?php

class Blog_post_comment extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'blog_post_comment';
	const _ID = 'id';
	const _USER_ID = 'user_id';
	const _POST_ID = 'post_id';
	const _POST_COMMENT = 'post_comment';
	const _ANONYMOUS = 'anonymous';
	const _COMMENT_DATE = 'comment_date';
	const _MODIFIED_DATE = 'modified_date';
	const _STATUS = 'status';	
		
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getCommentsById($postId)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_POST_ID,$postId);
		$this->db->where(static::_STATUS,1);
		$this->db->order_by(static::_COMMENT_DATE,'desc');
		$query = $this->db->get();
		
		foreach ($query->result() as $row)
		{
			$output['id'] = $row->{static::_ID};
			$output['user-id'] = 'U'.(10000+$row->{static::_USER_ID});
			$output['post-id'] = $row->{static::_POST_ID};
			$output['post-comment'] = $row->{static::_POST_COMMENT};
			$output['anonymous'] = $row->{static::_ANONYMOUS};
			$date = new DateTime($row->{static::_COMMENT_DATE});
			$date = $date->format('l jS \of F Y h:i:s A');
			$output['comment-date'] = $date;
			$output['modified-date'] = $row->{static::_MODIFIED_DATE};
			$output['status'] = $row->{static::_STATUS};
		
			$response[] = $output;
		}
		
		return $response;
		
	}
	
	public function createNewComment($userId, $postId, $comment, $anonymous)
	{
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array(
					static::_USER_ID=>$userId, 
					static::_POST_ID=>$postId, 
					static::_POST_COMMENT=>$comment,
					static::_ANONYMOUS=>$anonymous,
					static::_COMMENT_DATE=>$date,
					static::_STATUS=>1,
					);
		
		$this->db->insert(static::_TABLE, $data);
		return $this->db->insert_id();
	}
	
	public function updateComment()
	{
		
	}
	
	public function deleteCommentById()
	{
		
	}
	
}