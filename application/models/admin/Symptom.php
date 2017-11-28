<?php

class Symptom extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'symptom';
	const _ID = 'id';
	const _USER_ID = 'user_id';
	const _SYMPTOM = 'symptom';
	const _SYMPTOM_DESCRIPTION = 'symptom_description';
	const _SYMPTOM_SLUG = 'symptom_slug'; 
	const _META_TITLE = 'meta_title';
	const _META_KEYWORD = 'meta_keyword';
	const _META_DESCRIPTION = 'meta_description';
	const _ANONYMOUS = 'anonymous';
	const _STATUS = 'status';
	const _DATE_CREATED = 'date_created';
	const _MODIFIED_BY = 'modified_by';
	const _DATE_MODIFIED = 'date_modified';
	
	const PUBLISH_SYMPTOM = 1;
	const UNPUBLISH_SYMPTOM = 0;
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function createNewSymptom($userId, $symptom, $description, $anonymous)
	{
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
	
		$data = array(
				static::_USER_ID=>$userId,
				static::_SYMPTOM=>$symptom,
				static::_SYMPTOM_DESCRIPTION=>$description,
				static::_SYMPTOM_SLUG=>create_slug($symptom),
				static::_ANONYMOUS=>$anonymous,
				static::_DATE_CREATED=>$date,
				static::_STATUS=>static::PUBLISH_SYMPTOM, 
		);
	
		$this->db->insert(static::_TABLE, $data);
		return $this->db->insert_id();
	}
	
	public function updateSymptom($symptomId, $symptom, $description, $anonymous)
	{
		$flag = false;
		
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array(
				static::_SYMPTOM=>$symptom,
				static::_SYMPTOM_DESCRIPTION=>$description,
				static::_ANONYMOUS=>$anonymous,
				static::_DATE_MODIFIED=>$date,
				static::_STATUS=>static::PUBLISH_SYMPTOM,
		);
		
		$this->db->where(static::_ID, $symptomId);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag;
			
	}
	
	public function getSymptomById($symptomId)
	{
		$response = array();
	
		$this->db->from(static::_TABLE);
		$this->db->where(static::_ID,$symptomId);
		$query = $this->db->get();
	
		$row = $query->row();
		
		$response['id'] = $row->{static::_ID};
		$response['user-id'] = $row->{static::_USER_ID};
		$response['symptom'] = $row->{static::_SYMPTOM};
		$response['description'] = $row->{static::_SYMPTOM_DESCRIPTION};
		$response['anonymous'] = $row->{static::_ANONYMOUS};
		$response['status'] = $row->{static::_STATUS};
		$response['date_created'] = $row->{static::_DATE_CREATED};
		$response['modified_by'] = $row->{static::_MODIFIED_BY};
		$response['date_modified'] = $row->{static::_DATE_MODIFIED};
	
		return $response;
	}
	
	public function getSymptomCount()
	{
		$response = array();
		
		$this->db->select('*');
		$this->db->from(static::_TABLE);
		$query = $this->db->get();
		
		return $query->num_rows();
	}
	
	public function getSymptoms($search=NULL, $limit, $offset=NULL)
	{
		$response = array();
		
		$this->db->select('*');
		$this->db->from(static::_TABLE);
		if(!empty($search))
		{
			$this->db->where(static::_ID , $search);
			$this->db->where(static::_SYMPTOM , $search);
			$this->db->where(static::_SYMPTOM_DESCRIPTION , $search);
		}
		
		if($limit !=''){$this->db->limit($limit, $offset); }
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				# Strip tags to avoid breaking any html
				$content = strip_tags($row->{static::_SYMPTOM_DESCRIPTION});
				
				if (strlen($content) > 100)
				{
					# Truncate string
					$stringCut = substr($content, 0, 50);
					
					# Make sure it ends in a word so assassinate doesn't become ass...
					$content = substr($stringCut, 0, strrpos($stringCut, ' ')).'...';
				}
								
				$output = array();
				
				$output['id'] = $row->{static::_ID};
				$output['user_id'] = 'U'.(10000+$row->{static::_USER_ID});
				$output['symptom'] = $row->{static::_SYMPTOM};
				$output['description'] = $content;
				$output['anonymous'] = $row->{static::_ANONYMOUS};
				$output['status'] = $row->{static::_STATUS};
				$output['date_created'] = $row->{static::_DATE_CREATED};
				$output['modified_by'] = $row->{static::_MODIFIED_BY};
				$output['date_modified'] = $row->{static::_DATE_MODIFIED};
	
				$response[] = $output;			
			}
		}
		
		return $response;
	}
		
	public function deleteSymptomById($id)
	{
		$flag = false;
		
		$symptomIds = array_map('intval', explode(',', $id));
		$this->db->where_in(static::_ID, $symptomIds);
		$flag = $this->db->delete(static::_TABLE);
		
		return $flag;
	}
	
	public function publishSymptom($symptomId)
	{
		$flag = false;
		
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array( static::_DATE_MODIFIED=>$date, static::_STATUS=>static::PUBLISH_SYMPTOM);
		$symptomIds = array_map('intval', explode(',', $symptomId));			
		
		$this->db->where_in(static::_ID, $symptomIds);
		$flag = $this->db->update(static::_TABLE, $data);
				
		return $flag;
	}
	
	public function unPublishSymptom($symptomId)
	{
		$flag = false;
		
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array( static::_DATE_MODIFIED=>$date, static::_STATUS=>static::UNPUBLISH_SYMPTOM);
		$symptomIds = array_map('intval', explode(',', $symptomId));
		
		$this->db->where_in(static::_ID, $symptomIds);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag;
	}
		
}