<?php

class Faq extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'faq';
	const _ID = 'id';
	const _USER_ID = 'user_id';
	const _QUESTION = 'question';
	const _ANONYMOUS = 'anonymous';
	const _STATUS = 'status';
	const _DATE_CREATED = 'date_created';
	const _MODIFIED_BY = 'modified_by';
	const _DATE_MODIFIED = 'date_modified';
	
	
	const PUBLISH_FAQ = 1;
	const UNPUBLISH_FAQ = 0;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('faq_answer');
	}
	
	public function createNewFaq($userId, $question, $anonymous)
	{
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
	
		$data = array(
				static::_USER_ID=>$userId,
				static::_QUESTION=>$question,
				static::_ANONYMOUS=>$anonymous,
				static::_DATE_CREATED=>$date,
				static::_STATUS=>1, 
		);
	
		$this->db->insert(static::_TABLE, $data);
		return $this->db->insert_id();
	}
	
	public function updateFaq($faqId, $question, $anonymous)
	{
		$flag = false;
		
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array(
				static::_QUESTION=>$question,
				static::_ANONYMOUS=>$anonymous,
				static::_DATE_MODIFIED=>$date,
				static::_STATUS=>1,
		);
		
		$this->db->where(static::_ID, $faqId);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag;
			
	}
	
	public function getFaqById($postId)
	{
		$response = array();
	
		$this->db->from(static::_TABLE);
		$this->db->where(static::_ID,$postId);
		$query = $this->db->get();
	
		$row = $query->row();
	
		$response['id'] = $row->{static::_ID};
		$response['user-id'] = $row->{static::_USER_ID};
		$response['question'] = $row->{static::_QUESTION};
		$response['anonymous'] = $row->{static::_ANONYMOUS};
		$response['status'] = $row->{static::_STATUS};
		$response['date_created'] = $row->{static::_DATE_CREATED};
		$response['modified_by'] = $row->{static::_MODIFIED_BY};
		$response['date_modified'] = $row->{static::_DATE_MODIFIED};
	
		return $response;
	}
	
	public function getFaqCount()
	{
		$response = array();
		
		$this->db->select('*');
		$this->db->from(static::_TABLE);
		$query = $this->db->get();
		
		return $query->num_rows();
	}
	
	public function getFaqs($search=NULL, $limit, $offset=NULL)
	{
		$response = array();
		
		$sql = '';
		$sql .=' SELECT A.*, count(B.'.Faq_answer::_ID.') as answer FROM '.static::_TABLE .' A ';
		$sql .=' LEFT JOIN '.Faq_answer::_TABLE .' B ON A.'.static::_ID .' = '. Faq_answer::_FAQ_ID;
		$sql .=' GROUP BY A.'.static::_ID;
		
		$query = $this->db->query($sql);
		
		
		if($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				$output = array();
				
				$output['id'] = $row->{static::_ID};
				$output['user_id'] = $row->{static::_USER_ID};
				$output['question'] = $row->{static::_QUESTION};
				$output['anonymous'] = $row->{static::_ANONYMOUS};
				$output['status'] = $row->{static::_STATUS};
				$output['answer'] = $row->answer;
				$output['modified_date'] = $row->{static::_DATE_MODIFIED};
				$output['published_date'] = $row->{static::_DATE_CREATED};
	
				$response[] = $output;			
			}
		}
		
		return $response;
	}
		
	public function deleteFaqById($id)
	{
		$flag = false;
		
		# When deleting faq ensure to remove all faq answers 
		# Load faq_answer model
		
		$this->load->model('faq_answer');
		$this->faq_answer->deleteFaq($id);		
		
		$this->db->where(static::_ID, $id);
		$flag = $this->db->delete(static::_TABLE);
		
		return $flag;
	}
	
	public function publishFaq($faqId)
	{
		$flag = false;
		
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array( static::_DATE_MODIFIED=>$date, static::_STATUS=>static::PUBLISH_FAQ);
		$faqIds = array_map('intval', explode(',', $faqId));			
		
		$this->db->where_in(static::_ID, $faqIds);
		$flag = $this->db->update(static::_TABLE, $data);
				
		return $flag;
	}
	
	public function unPublishFaq($faqId)
	{
		$flag = false;
		
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array( static::_DATE_MODIFIED=>$date, static::_STATUS=>static::UNPUBLISH_FAQ);
		$faqIds = array_map('intval', explode(',', $faqId));
		
		$this->db->where_in(static::_ID, $faqIds);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag;
	}
		
}