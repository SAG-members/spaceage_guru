<?php

class Symptom_model extends CI_Model
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
	
	const SYMPTOM_PUBLISH = 1;
	const SYMPTOM_UN_PUBLISH = 0;
	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Symptom_answer', 'answer');
	}

	public function getAllSymptoms()
	{
		# Set Limit To Max 5 Questions
		
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_STATUS, static::SYMPTOM_PUBLISH);
		$this->db->order_by(static::_ID, "desc");
		$this->db->limit(10);
		$query = $this->db->get();
				
		foreach ($query->result() as $row)
		{
			$output['id'] = $row->{static::_ID};
			$output['symptom'] = $row->{static::_SYMPTOM};
			$output['description'] = $row->{static::_SYMPTOM_DESCRIPTION};
			$output['slug'] = $row->{static::_SYMPTOM_SLUG};
			
			$response[] = $output;
		}
		
		return $response;
	}
	# Service Search
	
	public function symptom_search($search)
	{
		$response = array();
	
		$this->db->from(static::_TABLE);
		$this->db->where(static::_SYMPTOM. ' LIKE '. "'%$search%'" .' OR ' . static::_SYMPTOM_DESCRIPTION. ' LIKE '. "'$search%'");
		$this->db->where(static::_STATUS, static::SYMPTOM_PUBLISH);
	
		$query = $this->db->get();
	
		foreach ($query->result() as $row)
		{
			$output['id'] = $row->{static::_ID};
			$output['title'] = $row->{static::_SYMPTOM};
			$output['slug'] = $row->{static::_SYMPTOM_SLUG};
			$output['description'] = strip_tags($row->{static::_SYMPTOM_DESCRIPTION});
	
			$response[] = $output;
		}
	
		return $response;
	}
		
	public function getSymptomById($symptomId)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_ID,$symptomId);
		$query = $this->db->get();
		
		$row = $query->row();
		
		$response['id'] = $row->{static::_ID};
		$response['symptom'] = $row->{static::_SYMPTOM};
		$response['slug'] = $row->{static::_SYMPTOM_SLUG};
		$response['description'] = $row->{static::_SYMPTOM_DESCRIPTION};
		$response['anonymous'] = $row->{static::_ANONYMOUS};
		$response['answers'] = $this->answer->getSymptomAnswerById($symptomId);
				
		return $response;
	}
	
	public function getBySymptom($symptom)
	{
		$response = array();
	
		$this->db->from(static::_TABLE);
		$this->db->where(static::_SYMPTOM,$symptom);
		$query = $this->db->get();
	
		$row = $query->row();
	
		$response['id'] = $row->{static::_ID};
		$response['symptom'] = $row->{static::_SYMPTOM};
		$response['description'] = $row->{static::_SYMPTOM_DESCRIPTION};
	
		return $response;
	}
	
	public function createUserSymptom($userId, $symptom, $symptomDescription, $anonymous)
	{
		$date = new DateTime();
		$dateFormat = $date->format('Y-m-d H:i:s');
		
		$data = array(
				static::_USER_ID=>$userId, 
				static::_SYMPTOM=>$symptom,
				static::_SYMPTOM_DESCRIPTION=>$symptomDescription,
				static::_SYMPTOM_SLUG=>create_slug($symptom),
				static::_ANONYMOUS=>$anonymous,
				static::_STATUS=>1,
				static::_DATE_CREATED=>$dateFormat
			);
		
		$this->db->insert(static::_TABLE, $data);
		
		return $this->db->insert_id();
	}
	
	public function updateSymptom($symptomId, $symptom, $description, $anonymous)
	{
		$flag = false;

		$date = new DateTime();
		$date = $date->format('Y-m-d H:i:s');
		
		$data = array(
				static::_SYMPTOM=>$symptom,
				static::_SYMPTOM_DESCRIPTION=>$description,
				static::_SYMPTOM_SLUG=>create_slug($symptom),
				static::_ANONYMOUS=>$anonymous,
				static::_STATUS=>1,
				static::_DATE_MODIFIED=>$date
		);
		$this->db->where(static::_ID, $symptomId);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag;
	}
	
	public function get_symptom_by_slug($slug)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_SYMPTOM_SLUG,$slug);
		$response = $this->db->get()->row();
		
		return $response;
	}
	
	public function get_symptom_by_user($userId, $limit=null)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_USER_ID,$userId); 
		
		if($limit) { $this->db->limit($limit); }
		
		$query = $this->db->get();
		
		
		foreach ($query->result() as $row)
		{
			$output['id'] = $row->{static::_ID};
			$output['symptom'] = $row->{static::_SYMPTOM};
			$output['slug'] = $row->{static::_SYMPTOM_SLUG};
			$output['description'] = strip_tags($row->{static::_SYMPTOM_DESCRIPTION});
		
			$response[] = $output;
		}
		
		return $response;
		
	}
	
	public function delete_symptom($symptomId)
	{
		# Since we don't want to remove the symptom completely from the system, we will move the symptom to admin symptoms
		
		$flag = false;
		
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
		
		$data = array(
				static::_USER_ID => 1,
				static::_DATE_MODIFIED => $date
		);
		
		$this->db->where(static::_ID, $symptomId);
		$flag = $this->db->update(static::_TABLE, $data);
		
		return $flag;
	}
}