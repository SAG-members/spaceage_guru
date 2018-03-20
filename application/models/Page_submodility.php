<?php

class Page_submodility extends CI_Model
{
	/*
	 * Define table constants at the begining of class to ensure single
	 * line of changes applies to whole class.
	 */
	
	const _TABLE = 'page_submodility';
	const _ID = 'id';
	const _PAGE_ID = 'page_id';
	const _VISUAL_IMAGE_VAL = 'visual_images_val';
	const _VISUAL_MOTION = 'visual_motion';
	const _VISUAL_MOTION_VAL = 'visual_motion_val';
	const _VISUAL_COLOR = 'visual_color';
	const _VISUAL_COLOR_VAL = 'visual_color_val';
	const _VISUAL_BRIGHT = 'visual_bright';
	const _VISUAL_BRIGHT_VAL = 'visual_bright_val';
	const _VISUAL_FOCUSED = 'visual_focused';
	const _VISUAL_FOCUSED_VAL = 'visual_focused_val';
	const _VISUAL_BORDERED = 'visual_bordered';
	const _VISUAL_BORDERED_VAL = 'visual_bordered_val';
	const _VISUAL_ASSOCIATED = 'visual_associated';
	const _VISUAL_ASSOCIATED_VAL = 'visual_associated_val';
	const _VISUAL_CENTER = 'visual_center';
	const _VISUAL_CENTER_VAL = 'visual_center_val';
	const _VISUAL_SIZE_VAL = 'visual_size_val';
	const _VISUAL_SHAPE_VAL = 'visual_shape_val';
	const _VISUAL_FLAT = 'visual_flat';
	const _VISUAL_FLAT_VAL = 'visual_flat_val';
	const _VISUAL_CLOSE = 'visual_close';
	const _VISUAL_CLOSE_VAL = 'visual_close_val';
	const _VISUAL_PANORMIC = 'visual_panormic';
	const _VISUAL_PANORMIC_VAL = 'visual_panormic_val';
	
	const _AUDITORY_SOUND_VAL = 'auditory_sound_val';
	const _AUDITORY_VOLUME_VAL = 'auditory_volume_val';
	const _AUDITORY_TONE_VAL = 'auditory_tone_val';
	const _AUDITORY_TEMPO_VAL = 'auditory_tempo_val';
	const _AUDITORY_PITCH_VAL = 'auditory_pitch_val';
	const _AUDITORY_PACE_VAL = 'auditory_pace_val';
	const _AUDITORY_TIMBRE_VAL = 'auditory_timbre_val';
	const _AUDITORY_DURATION_VAL = 'auditory_duration_val';
	const _AUDITORY_INTENSITY_VAL = 'auditory_intensity_val';
	const _AUDITORY_RHYTHM_VAL = 'auditory_rhythm_val';
	const _AUDITORY_DIRECTION_VAL = 'auditory_direction_val';
	const _AUDITORY_HARMONY_VAL = 'auditory_harmony_val';
	const _AUDITORY_EAR_VAL = 'auditory_ear_val';
	
	const _KINESTHIC_LOCATION_IN_BODY_VAL = 'kinesthic_location_in_body_val';
	const _KINESTHIC_BREATING_VAL = 'kinesthic_breating_val';
	const _KINESTHIC_PULSE_VAL = 'kinesthic_pulse_val';
	const _KINESTHIC_SKIN_VAL = 'kinesthic_skin_val';
	const _KINESTHIC_WEIGHT_VAL = 'kinesthic_weight_val';
	const _KINESTHIC_PRESSURE_VAL = 'kinesthic_pressure_val';
	const _KINESTHIC_INTENSITY_VAL = 'kinesthic_intensity_val';
	const _KINESTHIC_TACTILE_VAL = 'kinesthic_tactile_val';
	
	const _OLAFACTORY_SWEET_VAL = 'olafactory_sweet_val';
	const _OLAFACTORY_SOUR_VAL = 'olafactory_sour_val';
	const _OLAFACTORY_SALT_VAL = 'olafactory_salt_val';
	const _OLAFACTORY_BITTER_VAL = 'olafactory_bitter_val';
	const _OLAFACTORY_AROMA_VAL = 'olafactory_aroma_val';
	const _OLAFACTORY_FRAGRANCE_VAL = 'olafactory_fragrance_val';
	const _OLAFACTORY_ESSENCE_VAL = 'olafactory_essence_val';
	const _OLAFACTORY_PUNGENCE_VAL = 'olafactory_pungence_val';
		
	
	public function __construct()
	{
		parent::__construct();
	} 
	
	public function get_submodility_by_page_id($pageId)
	{
		$response = array();
		
		$this->db->from(static::_TABLE);
		$this->db->where(static::_PAGE_ID, $pageId);
			
		$response = $this->db->get()->row();
			
		return $response;
	}
	
	public function update_page_submodility($pageId, $mod1, $mod2, $mod3, $mod4, $mod5, $mod6, $mod7, $mod8, $mod9, $mod11, $mod10, $mod12, $mod13, $mod14, $mod15, $mod16, $mod17, $mod18, $mod19, $mod20, $mod21, $mod22, $mod23, $mod24, $mod25, $mod26, $mod27, $mod28, $mod29, $mod30, $mod31, $mod32, $mod33, $mod34, $mod35, $mod36, $mod37, $mod38, $mod39, $mod40, $mod41, $mod42, $mod43, $mod44, $mod45, $mod46, $mod47, $mod48, $mod49, $mod50, $mod51, $mod52)
	{
		# Check if page id is already present, then update, else insert
		
		$result = $this->get_submodility_by_page_id($pageId);	
				
		$dateObj = new DateTime();
		$date = $dateObj->format('Y-m-d H:i:s');
				
		$data = array(
				static::_PAGE_ID => $pageId, static::_VISUAL_IMAGE_VAL => $mod1, static::_VISUAL_MOTION => $mod2,
				static::_VISUAL_MOTION_VAL => $mod3, static::_VISUAL_COLOR => $mod4, static::_VISUAL_COLOR_VAL => $mod5,
				static::_VISUAL_BRIGHT => $mod6, static::_VISUAL_BRIGHT_VAL => $mod7, static::_VISUAL_FOCUSED => $mod8,
				static::_VISUAL_FOCUSED_VAL => $mod9, static::_VISUAL_BORDERED => $mod10, static::_VISUAL_BORDERED_VAL => $mod11,
				static::_VISUAL_ASSOCIATED => $mod12, static::_VISUAL_ASSOCIATED_VAL => $mod13, static::_VISUAL_CENTER => $mod14,
				static::_VISUAL_CENTER_VAL => $mod15,	static::_VISUAL_SIZE_VAL => $mod16, static::_VISUAL_SHAPE_VAL => $mod17,
				static::_VISUAL_FLAT => $mod18, static::_VISUAL_FLAT_VAL => $mod19, static::_VISUAL_CLOSE => $mod20,
				static::_VISUAL_CLOSE_VAL => $mod21, static::_VISUAL_PANORMIC => $mod22, static::_VISUAL_PANORMIC_VAL => $mod23,
				static::_AUDITORY_SOUND_VAL => $mod24, static::_AUDITORY_VOLUME_VAL => $mod25, static::_AUDITORY_TONE_VAL => $mod26,
				static::_AUDITORY_TEMPO_VAL => $mod27, static::_AUDITORY_PITCH_VAL => $mod28, static::_AUDITORY_PACE_VAL => $mod29,
				static::_AUDITORY_TIMBRE_VAL => $mod30, static::_AUDITORY_DURATION_VAL => $mod31, static::_AUDITORY_INTENSITY_VAL => $mod32,
				static::_AUDITORY_RHYTHM_VAL => $mod33, static::_AUDITORY_DIRECTION_VAL => $mod34, static::_AUDITORY_HARMONY_VAL => $mod35,
				static::_AUDITORY_EAR_VAL => $mod36, static::_KINESTHIC_BREATING_VAL => $mod37, static::_KINESTHIC_PULSE_VAL => $mod38,
				static::_KINESTHIC_SKIN_VAL => $mod39,static::_KINESTHIC_WEIGHT_VAL => $mod40, static::_KINESTHIC_PRESSURE_VAL => $mod41,
				static::_KINESTHIC_INTENSITY_VAL => $mod42, static::_KINESTHIC_TACTILE_VAL => $mod43, static::_OLAFACTORY_SWEET_VAL => $mod44,
				static::_OLAFACTORY_SOUR_VAL => $mod45, static::_OLAFACTORY_SALT_VAL => $mod46, static::_OLAFACTORY_BITTER_VAL => $mod47,
				static::_OLAFACTORY_AROMA_VAL => $mod48, static::_OLAFACTORY_FRAGRANCE_VAL => $mod49, static::_OLAFACTORY_ESSENCE_VAL => $mod50,
				static::_OLAFACTORY_PUNGENCE_VAL => $mod51, static::_KINESTHIC_LOCATION_IN_BODY_VAL=>$mod52
		);

		if($result)
		{
			$this->db->where(static::_PAGE_ID, $pageId);
			$flag = $this->db->update(static::_TABLE, $data);
		}
		else 
		{
			$this->db->insert(static::_TABLE, $data);
			return $this->db->insert_id();
		}		
		
		
	}
		
		
	
} 