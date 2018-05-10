<?php 
# Check Product Visibility as well as user level
# Generate message based on user level
$regions = $page->{Page::_COUNTRY_AVAILABLE_IN};
$membershipLevel = $this->session->userdata('membershipLevel');
$message = '';

$regions1 = $page->{Page::_COUNTRY_LEGAL_IN};
$regions2 = $page->{Page::_COUNTRY_ALLOWED_IN};


$visual_images_val = ''; $visual_motion ='';  $visual_motion_val =''; $visual_color =''; $visual_color_val =''; $visual_bright ='';
$visual_bright_val =''; $visual_focused =''; $visual_focused_val =''; $visual_bordered =''; $visual_bordered_val ='';
$visual_associated =''; $visual_associated_val =''; $visual_center =''; $visual_center_val =''; $visual_size_val ='';
$visual_shape_val =''; $visual_flat =''; $visual_flat_val =''; $visual_close =''; $visual_close_val =''; $visual_panormic ='';
$visual_panormic_val =''; $auditory_sound_val =''; $auditory_volume_val =''; $auditory_tone_val =''; $auditory_tempo_val ='';
$auditory_pitch_val =''; $auditory_pace_val =''; $auditory_timbre_val =''; $auditory_duration_val =''; $auditory_intensity_val ='';
$auditory_rhythm_val =''; $auditory_direction_val =''; $auditory_harmony_val =''; $auditory_ear_val =''; $kinesthic_breating_val ='';
$kinesthic_location_in_body_val = '' ; $kinesthic_pulse_val =''; $kinesthic_skin_val =''; $kinesthic_weight_val =''; $kinesthic_pressure_val =''; $kinesthic_intensity_val ='';
$kinesthic_tactile_val =''; $olafactory_sweet_val =''; $olafactory_sour_val =''; $olafactory_salt_val =''; $olafactory_bitter_val ='';
$olafactory_aroma_val =''; $olafactory_fragrance_val =''; $olafactory_essence_val =''; $olafactory_pungence_val ='';

if($submodilities)
{
	$visual_images_val = $submodilities->{Page_submodility::_VISUAL_IMAGE_VAL}; 
	$visual_motion = $submodilities->{Page_submodility::_VISUAL_MOTION};   
	$visual_motion_val = $submodilities->{Page_submodility::_VISUAL_MOTION_VAL}; 
	$visual_color = $submodilities->{Page_submodility::_VISUAL_MOTION}; 
	$visual_color_val = $submodilities->{Page_submodility::_VISUAL_COLOR_VAL}; 
	$visual_bright = $submodilities->{Page_submodility::_VISUAL_BRIGHT};;
	$visual_bright_val = $submodilities->{Page_submodility::_VISUAL_BRIGHT_VAL}; 
	$visual_focused = $submodilities->{Page_submodility::_VISUAL_FOCUSED};; 
	$visual_focused_val = $submodilities->{Page_submodility::_VISUAL_FOCUSED_VAL}; 
	$visual_bordered = $submodilities->{Page_submodility::_VISUAL_BORDERED};; 
	$visual_bordered_val = $submodilities->{Page_submodility::_VISUAL_BORDERED_VAL};
	$visual_associated = $submodilities->{Page_submodility::_VISUAL_ASSOCIATED};; 
	$visual_associated_val = $submodilities->{Page_submodility::_VISUAL_ASSOCIATED_VAL}; 
	$visual_center = $submodilities->{Page_submodility::_VISUAL_CENTER};; 
	$visual_center_val = $submodilities->{Page_submodility::_VISUAL_CENTER_VAL}; 
	$visual_size_val =''; $visual_shape_val = $submodilities->{Page_submodility::_VISUAL_SHAPE_VAL}; 
	$visual_flat = $submodilities->{Page_submodility::_VISUAL_FLAT};; 
	$visual_flat_val = $submodilities->{Page_submodility::_VISUAL_FLAT_VAL}; 
	$visual_close = $submodilities->{Page_submodility::_VISUAL_CLOSE};; 
	$visual_close_val = $submodilities->{Page_submodility::_VISUAL_CLOSE_VAL}; 
	$visual_panormic = $submodilities->{Page_submodility::_VISUAL_PANORMIC};;
	$visual_panormic_val = $submodilities->{Page_submodility::_VISUAL_PANORMIC_VAL}; 
	
	$auditory_sound_val = $submodilities->{Page_submodility::_AUDITORY_SOUND_VAL}; 
	$auditory_volume_val = $submodilities->{Page_submodility::_AUDITORY_VOLUME_VAL};
	$auditory_tone_val = $submodilities->{Page_submodility::_AUDITORY_TONE_VAL}; 
	$auditory_tempo_val = $submodilities->{Page_submodility::_AUDITORY_TEMPO_VAL};
	$auditory_pitch_val = $submodilities->{Page_submodility::_AUDITORY_PITCH_VAL}; 
	$auditory_pace_val = $submodilities->{Page_submodility::_AUDITORY_PACE_VAL}; 
	$auditory_timbre_val = $submodilities->{Page_submodility::_AUDITORY_TIMBRE_VAL}; 
	$auditory_duration_val = $submodilities->{Page_submodility::_AUDITORY_DURATION_VAL};
	$auditory_intensity_val = $submodilities->{Page_submodility::_AUDITORY_INTENSITY_VAL};
	$auditory_rhythm_val = $submodilities->{Page_submodility::_AUDITORY_RHYTHM_VAL};
	$auditory_direction_val = $submodilities->{Page_submodility::_AUDITORY_DIRECTION_VAL}; 
	$auditory_harmony_val = $submodilities->{Page_submodility::_AUDITORY_HARMONY_VAL}; 
	$auditory_ear_val = $submodilities->{Page_submodility::_AUDITORY_EAR_VAL}; 
	
	$kinesthic_location_in_body_val	= $submodilities->{Page_submodility::_KINESTHIC_LOCATION_IN_BODY_VAL};
	$kinesthic_breating_val = $submodilities->{Page_submodility::_KINESTHIC_BREATING_VAL};
	$kinesthic_pulse_val = $submodilities->{Page_submodility::_KINESTHIC_PULSE_VAL};
	$kinesthic_skin_val = $submodilities->{Page_submodility::_KINESTHIC_SKIN_VAL}; 
	$kinesthic_weight_val = $submodilities->{Page_submodility::_KINESTHIC_WEIGHT_VAL}; 
	$kinesthic_pressure_val = $submodilities->{Page_submodility::_KINESTHIC_PRESSURE_VAL}; 
	$kinesthic_intensity_val = $submodilities->{Page_submodility::_KINESTHIC_INTENSITY_VAL};
	$kinesthic_tactile_val = $submodilities->{Page_submodility::_KINESTHIC_TACTILE_VAL}; 
	
	$olafactory_sweet_val = $submodilities->{Page_submodility::_OLAFACTORY_SWEET_VAL};
	$olafactory_sour_val = $submodilities->{Page_submodility::_OLAFACTORY_SOUR_VAL}; 
	$olafactory_salt_val = $submodilities->{Page_submodility::_OLAFACTORY_SALT_VAL}; 
	$olafactory_bitter_val = $submodilities->{Page_submodility::_OLAFACTORY_BITTER_VAL};
	$olafactory_aroma_val = $submodilities->{Page_submodility::_OLAFACTORY_AROMA_VAL}; 
	$olafactory_fragrance_val = $submodilities->{Page_submodility::_OLAFACTORY_FRAGRANCE_VAL}; 
	$olafactory_essence_val = $submodilities->{Page_submodility::_OLAFACTORY_ESSENCE_VAL}; 
	$olafactory_pungence_val = $submodilities->{Page_submodility::_OLAFACTORY_PUNGENCE_VAL};
	
}

switch ($page->{Page::_VISIBILITY})
{
	case Page::VISIBILITY_REGISTERED : $message = 'This Post is only accessible by Registered '; break;
	case Page::VISIBILITY_UPGRADED : $message = 'This Post is only accessible by Upgraded User '; break;
	case Page::VISIBILITY_MEMBERSHIP_A : $message = 'This Post is only accessible by Membership A User '; break;
	case Page::VISIBILITY_MEMBERSHIP_B : $message = 'This Post is only accessible by Membership B User '; break;
	case Page::VISIBILITY_MEMBERSHIP_C : $message = 'This Post is only accessible by Membership C User '; break;
	case Page::VISIBILITY_SPECIFIED_USER : $message = 'This post is only accessible by specific users'; break;
}






?>
<?php if(isset($error) && $error == true):?>
<div class="alert alert-danger mar-t-20"><?php echo $message;?></div>
<?php else :?>
<style>
.services_text p, .services_text h2{
    background-color:transparent !important;
}
</style>
<h2>Data Type : <?php echo $this->page->get_category($page->{Page::_CATEGORY_ID}); ?></h2>
<hr />
<h3><?php echo $page->{Page::_PAGE_TITLE}; ?></h3>
<hr />
<div class="services_text">
	<?php $tagsType = array('label-default', 'label-primary', 'label-success', 'label-info', 'label-warning', 'label-danger');?>
	<?php if(!empty($page->{Page::_TAG})) : $tags = explode(',', $page->{Page::_TAG}); foreach ($tags as $t) :?>
	<span class="label <?php echo $tagsType[array_rand($tagsType,1)];?>" style="font-size:20px; color:#fff;"><?php echo $t;?></span>
	<?php endforeach; endif;?>
	
	<div class="mar-t-20"></div>
	<?php echo $page->{Page::_PAGE_DESCRIPTION};?>
	
	<div class="mar-t-20"></div>
	<!-- Show Files  -->
	<div class="row">
    	<?php if($files): foreach ($files as $file) :  $extn = get_file_extension($file->document);?>
        	
        	<?php if($extn == 'png' || $extn == 'jpg' || $extn == 'jpeg' || $extn == 'bmp' || $extn == 'x-png') :?>
        	<div class="col-md-3" style="min-height: 160px; margin-bottom:10px;">
        		<a href="<?php echo base_url('assets/uploads/data_document/').$file->document; ?>" target="_blank">
        			<img style="width: 100%;" src="<?php echo base_url('assets/uploads/data_document/thumb/').$file->document; ?>"/>
        		</a>
        	</div>
        	<?php elseif($extn == 'mp4' || $extn == 'mp3'):?>
        	<div class="col-md-3"  style="min-height: 160px; margin-bottom:10px;">
        		<img src="<?php echo base_url('assets/uploads/data_document/').$file->document; ?>"/>
        	</div>
        	<?php elseif($extn == 'pdf') :?>
        	<div class="col-md-3" style="min-height: 160px; margin-bottom:10px;">
        		<a href="<?php echo base_url('assets/uploads/data_document/').$file->document; ?>" target="_blank">
        			<img style="width: 100%;" src="<?php echo base_url('assets/img/pdf.jpeg'); ?>"/>
        		</a>
        	</div>
        	<?php elseif ( $extn == 'doc' || $extn == 'docx' || $extn == 'ppt' || $extn == 'pptx' || $extn == 'xls' || $extn == 'xlsx') :?>
        	<div class="col-md-3" style="min-height: 160px; margin-bottom:10px;">
        		<a href="<?php echo base_url('assets/uploads/data_document/').$file->document; ?>" target="_blank">
        			<img style="width: 100%;" src="<?php echo base_url('assets/img/doc.jpeg') ?>"/>
        		</a>
        	</div>
        	<?php endif;?>
        	
        	<?php endforeach; endif;?>
        <div class="clearfix"></div>
   	</div>
	
	<div class='mar-t-20'></div>
	<!-- Submodilities -->
	<div class="submodilites_div">
		<div class="visual_div">
			
				<?php if(!empty($visual_images_val)):?>
				<div class="col-md-4">Number of Images</div>
			<div class="col-md-8">
				<input type="text" class="password" name="visual_images_val"
					style="margin-top: 0px;" value="<?php echo $visual_images_val;?>" />
			</div>
				<?php endif;?>
				
				<?php 
					if(!empty($visual_motion) || !empty($visual_motion_val)):
				
					$a = ''; $b = '';
					switch ($visual_motion)
					{
						case 1 : $a='checked'; break;
						case 2 : $b='checked'; break;
					}
				?>
				<div class="col-md-4">
				<input type="radio" name="visual_motion" value="1" <?php echo $a;?>>
				<label> Motion</label> <input type="radio" name="visual_motion"
					value="2" <?php echo $b;?>> <label> Still</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="visual_motion_val"
					style="margin-top: 0px;" value="<?php echo $visual_motion_val;?>" />
			</div>
				<?php endif;?>
				
				<?php
					if(!empty($visual_color) || !empty($visual_color_val)):
					
					$a = ''; $b = '';
					switch ($visual_color)
					{
						case 1 : $a='checked'; break;
						case 2 : $b='checked'; break;
					}
				?>
				<div class="col-md-4">
				<input type="radio" name="visual_color" value="1" <?php echo $a;?>> <label>
					Color</label> <input type="radio" name="visual_color" value="2"
					<?php echo $b;?>> <label> Black & White</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="visual_color_val"
					style="margin-top: 0px;" value="<?php echo $visual_color_val;?>" />
			</div>
				<?php endif;?>
				
				<?php 
					if(!empty($visual_bright) || !empty($visual_bright_val)):
				
					$a = ''; $b = '';
					switch ($visual_bright)
					{
						case 1 : $a='checked'; break;
						case 2 : $b='checked'; break;
					}
				?>
				<div class="col-md-4">
				<input type="radio" name="visual_bright" value="1" <?php echo $a;?>>
				<label> Bright</label> <input type="radio" name="visual_bright"
					value="2" <?php echo $b;?>> <label> Dim</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="visual_bright_val"
					style="margin-top: 0px;" value="<?php echo $visual_bright_val;?>" />
			</div>
				<?php endif;?>
				
				<?php 
					if(!empty($visual_focused) || !empty($visual_focused_val)):
					
					$a = ''; $b = '';
					switch ($visual_focused)
					{
						case 1 : $a='checked'; break;
						case 2 : $b='checked'; break;
					}
				?>
				<div class="col-md-4">
				<input type="radio" name="visual_focused" value="1" <?php echo $a;?>>
				<label> Focused</label> <input type="radio" name="visual_focused"
					value="2" <?php echo $b;?>> <label> Unfocused</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="visual_focused_val"
					style="margin-top: 0px;" value="<?php echo $visual_focused_val;?>" />
			</div>
				<?php endif;?>
				
				<?php 
					if(!empty($visual_bordered) || !empty($visual_bordered_val)):
				
					$a = ''; $b = '';
					switch ($visual_bordered)
					{
						case 1 : $a='checked'; break;
						case 2 : $b='checked'; break;
					}
				?>
				<div class="col-md-4">
				<input type="radio" name="visual_bordered" value="1" <?php echo $a;?>>
				<label> Bordered</label> <input type="radio" name="visual_bordered"
					value="2" <?php echo $b;?>> <label> Borderless</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="visual_bordered_val"
					style="margin-top: 0px;" value="<?php echo $visual_bordered_val;?>" />
			</div>
				<?php endif;?>
				
				<?php 
					if(!empty($visual_associated) || !empty($visual_associated_val)):
					
					$a = ''; $b = '';
					switch ($visual_associated)
					{
						case 1 : $a='checked'; break;
						case 2 : $b='checked'; break;
					}
				?>
				<div class="col-md-4">
				<input type="radio" name="visual_associated" value="1"
					<?php echo $a;?>> <label> Associated</label> <input type="radio"
					name="visual_associated" value="2" <?php echo $b;?>> <label>
					Dissociated</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="visual_associated_val"
					style="margin-top: 0px;"
					value="<?php echo $visual_associated_val;?>" />
			</div>
				<?php endif;?>
				
				<?php 
					if(!empty($visual_center) || !empty($visual_center_val)):
					
					$a = ''; $b = '';	
					switch ($visual_center)
					{
						case 1 : $a='checked'; break;
						case 2 : $b='checked'; break;
					}
				?>
				<div class="col-md-4">
				<input type="radio" name="visual_center" value="1" <?php echo $a;?>>
				<label> Center Weighted</label> <input type="radio"
					name="visual_center" value="2" <?php echo $b;?>> <label> Wide Angle</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="visual_center_val"
					style="margin-top: 0px;" value="<?php echo $visual_center_val;?>" />
			</div>
				<?php endif;?>
				
				<?php if(!empty($visual_center_val)) :?>			
				<div class="col-md-4">
				<label> Size (Relative to Life)</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="visual_center_val"
					style="margin-top: 0px;" value="<?php echo $visual_center_val;?>" />
			</div>
				<?php endif;?>
				
				<?php if(!empty($visual_shape_val)) :?>
				<div class="col-md-4">
				<label> Shape</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="visual_shape_val"
					style="margin-top: 0px;" value="<?php echo $visual_shape_val;?>" />
			</div>
				<?php endif;?>
				
				<?php 
					if(!empty($visual_flat) || !empty($visual_flat_val)):
					
					$a = ''; $b = '';
					switch ($visual_flat)
					{
						case 1 : $a='checked'; break;
						case 2 : $b='checked'; break;
					}
				?>
				<div class="col-md-4">
				<input type="radio" name="visual_flat" value="1" <?php echo $a;?>> <label>
					Three Dimensional</label> <input type="radio" name="visual_flat"
					value="2" <?php echo $b;?>> <label> Flat</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="visual_flat_val"
					style="margin-top: 0px;" value="<?php echo $visual_flat_val;?>" />
			</div>
				<?php endif;?>
				
				<?php
					if(!empty($visual_close) || !empty($visual_close_val)):
					
					$a = ''; $b = '';
					switch ($visual_close)
					{
						case 1 : $a='checked'; break;
						case 2 : $b='checked'; break;
					}
				?>
				<div class="col-md-4">
				<input type="radio" name="visual_close" value="1" <?php echo $a;?>> <label>
					Close</label> <input type="radio" name="visual_close" value="2"
					<?php echo $b;?>> <label> Distant</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="visual_close_val"
					style="margin-top: 0px;" value="<?php echo $visual_close_val;?>" />
			</div>
				<?php endif;?>
				
				<?php 
					if(!empty($visual_panormic) || !empty($visual_panormic_val)):
					
					$a = ''; $b = '';
					switch ($visual_panormic)
					{
						case 1 : $a='checked'; break;
						case 2 : $b='checked'; break;
					}
				?>						
				<div class="col-md-4">
				<input type="radio" name="visual_panormic" value="1" <?php echo $a;?>>
				<label> Location in space</label> <input type="radio"
					name="visual_panormic" value="2" <?php echo $b;?>> <label> Panoramic</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="visual_panormic_val"
					style="margin-top: 0px;" value="<?php echo $visual_panormic_val;?>" />
			</div>
			<div class="clearfix"></div>
				
				<?php endif; ?>
			</div>
	
		<div class="auditory_div">
			<!-- 			<p><strong>Auditory</strong></p> -->
				
				<?php if(!empty($auditory_sound_val)):?>
				<div class="col-md-4">
				<label> Number of Sounds/Source</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="auditory_sound_val"
					style="margin-top: 0px;" disabled
					value="<?php echo $auditory_sound_val;?>" />
			</div>
				<?php endif;?>
				
				
				<?php if(!empty($auditory_volume_val)):?>
				
				<div id="player">
				<div id="volume"></div>
			</div>
			<div class="clearfix"></div>
	
			<div class="col-md-4">
				<label> Volume</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="auditory_volume_val"
					style="margin-top: 0px;" value="<?php echo $auditory_volume_val;?>" />
			</div>
				<?php endif;?>
				
				<?php if(!empty($auditory_tone_val)):?>
				<div class="col-md-4">
				<label> Tone</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="auditory_tone_val"
					style="margin-top: 0px;" value="<?php echo $auditory_tone_val;?>" />
			</div>
				<?php endif;?>
				
				<?php if(!empty($auditory_tempo_val)):?>
				<div class="col-md-4">
				<label> Tempo</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="auditory_tempo_val"
					style="margin-top: 0px;" value="<?php echo $auditory_tempo_val;?>" />
			</div>
				<?php endif;?>
				
				<?php if(!empty($auditory_pitch_val)):?>
				<div class="col-md-4">
				<label> Pitch</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="auditory_pitch_val"
					style="margin-top: 0px;" value="<?php echo $auditory_pitch_val;?>" />
			</div>
				<?php endif;?>
				
				<?php if(!empty($auditory_pace_val)):?>
				<div class="col-md-4">
				<label> Pace</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="auditory_pace_val"
					style="margin-top: 0px;" value="<?php echo $auditory_pace_val;?>" />
			</div>
				<?php endif;?>
				
				<?php if(!empty($auditory_timbre_val)):?>
				<div class="col-md-4">
				<label> Timbre</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="auditory_timbre_val"
					style="margin-top: 0px;" value="<?php echo $auditory_timbre_val;?>" />
			</div>
				<?php endif;?>
				
				<?php if(!empty($auditory_duration_val)):?>
				<div class="col-md-4">
				<label> Duration</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="auditory_duration_val"
					style="margin-top: 0px;"
					value="<?php echo $auditory_duration_val;?>" />
			</div>
				<?php endif;?>
					
				<?php if(!empty($auditory_intensity_val)):?>			
				<div class="col-md-4">
				<label> Intensity</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="auditory_intensity_val"
					style="margin-top: 0px;"
					value="<?php echo $auditory_intensity_val;?>" />
			</div>
				<?php endif;?>
				
				<?php if(!empty($auditory_direction_val)):?>
				<div class="col-md-4">
				<label> Direction</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="auditory_direction_val"
					style="margin-top: 0px;"
					value="<?php echo $auditory_direction_val;?>" />
			</div>
				<?php endif;?>
				
				<?php if(!empty($auditory_rhythm_val)):?>	
				<div class="col-md-4">
				<label> Rhythm</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="auditory_rhythm_val"
					style="margin-top: 0px;" value="<?php echo $auditory_rhythm_val;?>" />
			</div>
				<?php endif;?>
				
				<?php if(!empty($auditory_harmony_val)):?>	
				<div class="col-md-4">
				<label> Harmony</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="auditory_harmony_val"
					style="margin-top: 0px;" value="<?php echo $auditory_harmony_val;?>" />
			</div>
				<?php endif;?>
				
				<?php if(!empty($auditory_ear_val)):?>						
				<div class="col-md-4">
				<label> More in one ear than another</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="auditory_ear_val"
					style="margin-top: 0px;" value="<?php echo $auditory_ear_val;?>" />
			</div>
			<div class="clearfix"></div>
				<?php endif;?>
			</div>
	
		<div class="kinesthetic_div">
			<!-- 			<p><strong>KINESTHETIC</strong></p> -->
				
				<?php if(!empty($kinesthic_location_in_body_val)):?>
				<div class="col-md-4">
				<label> Location in body</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password"
					name="kinesthic_location_in_body_val" style="margin-top: 0px;"
					value="<?php echo $kinesthic_location_in_body_val;?>" />
			</div>
				<?php endif;?>
				
				<?php if(!empty($kinesthic_breating_val)):?>
				<div class="col-md-4">
				<label> Breathing Rate</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="kinesthic_breating_val"
					style="margin-top: 0px;"
					value="<?php echo $kinesthic_breating_val;?>" />
			</div>
				<?php endif;?>
				
				<?php if(!empty($kinesthic_pulse_val)):?>
				<div class="col-md-4">
				<label> Pulse Rate</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="kinesthic_pulse_val"
					style="margin-top: 0px;" value="<?php echo $kinesthic_pulse_val;?>" />
			</div>
				<?php endif;?>
				
				<?php if(!empty($kinesthic_skin_val)):?>
				<div class="col-md-4">
				<label> Skin Temperature</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="kinesthic_skin_val"
					style="margin-top: 0px;" value="<?php echo $kinesthic_skin_val;?>" />
			</div>
				<?php endif;?>
				
				<?php if(!empty($kinesthic_weight_val)):?>
				<div class="col-md-4">
				<label> Weight</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="kinesthic_weight_val"
					style="margin-top: 0px;" value="<?php echo $kinesthic_weight_val;?>" />
			</div>
				<?php endif;?>
				
				<?php if(!empty($kinesthic_pressure_val)):?>
				<div class="col-md-4">
				<label> Pressure</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="kinesthic_pressure_val"
					style="margin-top: 0px;"
					value="<?php echo $kinesthic_pressure_val;?>" />
			</div>
				<?php endif;?>
				
				<?php if(!empty($kinesthic_tactile_val)):?>
				<div class="col-md-4">
				<label> Intensity</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="kinesthic_intensity_val"
					style="margin-top: 0px;"
					value="<?php echo $kinesthic_intensity_val;?>" />
			</div>
				<?php endif;?>
				
				<?php if(!empty($kinesthic_tactile_val)):?>
				<div class="col-md-4">
				<label> Tactile Sensations</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="kinesthic_tactile_val"
					style="margin-top: 0px;"
					value="<?php echo $kinesthic_tactile_val;?>" />
			</div>
				<?php endif;?>
			</div>
	
		<div class="olafactory_div">
			<!-- 			<p><strong>OLFACTORY & GUSTATORY</strong></p> -->
				
				<?php if(!empty($olafactory_sweet_val)):?>			
				<div class="col-md-4">
				<label> Sweet</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="olafactory_sweet_val"
					style="margin-top: 0px;" value="<?php echo $olafactory_sweet_val;?>">
			</div>
				<?php endif;?>
				
				<?php if(!empty($olafactory_sour_val)):?>
				<div class="col-md-4">
				<label> Sour</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="olafactory_sour_val"
					style="margin-top: 0px;" value="<?php echo $olafactory_sour_val;?>" />
			</div>
				<?php endif;?>
				
				<?php if(!empty($olafactory_salt_val)):?>
				<div class="col-md-4">
				<label> Salt</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="olafactory_salt_val"
					style="margin-top: 0px;" value="<?php echo $olafactory_salt_val;?>" />
			</div>
				<?php endif;?>
				
				<?php if(!empty($olafactory_bitter_val)):?>
				<div class="col-md-4">
				<label> Bitter</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="olafactory_bitter_val"
					style="margin-top: 0px;"
					value="<?php echo $olafactory_bitter_val;?>" />
			</div>
				<?php endif;?>
				
				<?php if(!empty($olafactory_aroma_val)):?>
				<div class="col-md-4">
				<label> Aroma</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="olafactory_aroma_val"
					style="margin-top: 0px;" value="<?php echo $olafactory_aroma_val;?>" />
			</div>
				<?php endif;?>
				
				<?php if(!empty($olafactory_fragrance_val)):?>
				<div class="col-md-4">
				<label> Fragrance</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="olafactory_fragrance_val"
					style="margin-top: 0px;"
					value="<?php echo $olafactory_fragrance_val;?>" />
			</div>
				<?php endif;?>
				
				<?php if(!empty($olafactory_essence_val)):?>
				<div class="col-md-4">
				<label> Essence</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="olafactory_essence_val"
					style="margin-top: 0px;"
					value="<?php echo $olafactory_essence_val;?>" />
			</div>
				<?php endif;?>
				
				<?php if(!empty($olafactory_pungence_val)):?>
				<div class="col-md-4">
				<label> Pungence</label>
			</div>
			<div class="col-md-8">
				<input type="text" class="password" name="olafactory_pungence_val"
					style="margin-top: 0px;"
					value="<?php echo $olafactory_pungence_val;?>" />
			</div>
				<?php endif;?>
				<div class="clearfix"></div>
	
		</div>
	
	</div>
	<?php if($page->price == 0):?>
	<h1 class="mar-t-10 mar-b-10">Priceless</h1>
	<div class="clearfix mar-b-10"></div>
	<?php else:?>
	<div class="checkboobmain">		
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1"><label><input name="chckbox-price-per-read-article" value="1" type="checkbox" class="flat" <?php echo $page->{Page::_PRICE} ? 'checked="checked"':'';?>"> Price per read article</label></span>
  			<input type="text" class="form-control" name="points" placeholder="Enter word price here" aria-describedby="basic-addon1" style="height: 40px;" value="<?php echo $page->{Page::_PRICE} ? $page->{Page::_PRICE}:'';?>" disabled>
  			<span class="input-group-addon"><label>word price</label></span>
		</div>
	</div>
	<?php endif;?>
	<div class="clearfix"></div>
	
	<!-- Countries Available In -->
	<div class="clearfix"></div>
	<div class="bs-example faq">
		<div class="panel-group" id="accordion">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion"
							href="#collapseOne">Countries Data Available In</a> <i
							data-toggle="collapse" data-parent="#accordion"
							href="#collapseOne" class="fa fa-chevron-down pull-right"
							aria-hidden="true"></i>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse">
					<div class="panel-body">
	                    <?php if($regions != ''):?>
						<?php if($regions != 'select-all') :?>
							<?php $regionArr = explode(',', $regions);?>
							<?php if($regionArr): foreach ($regionArr as $r):?>
							<?php $c = new Country();?>
							<div class="country-label">
								<?php echo $c->get_country_by_id($r);?>
							</div>
							<?php endforeach; endif;?>
						<?php else :?>
						<div class="country-label">All Countries</div>
						<?php endif;?>
						<?php endif;?>
	                </div>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	
	
	<!-- Countries Legal In -->
	<div class="clearfix"></div>
	<div class="bs-example faq">
		<div class="panel-group" id="accordion">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion"
							href="#collapseTow">Data legal to acquire physically in </a> <i
							data-toggle="collapse" data-parent="#accordion"
							href="#collapseTwo" class="fa fa-chevron-down pull-right"
							aria-hidden="true"></i>
					</h4>
				</div>
				<div id="collapseTwo" class="panel-collapse collapse">
					<div class="panel-body">
	                    <?php if($regions1 != ''):?>
						<?php if($regions1 != 'select-all') :?>
							<?php $regionArr = explode(',', $regions1);?>
							<?php if($regionArr): foreach ($regionArr as $r):?>
							<?php $c = new Country();?>
							<div class="country-label">
								<?php echo $c->get_country_by_id($r);?>
							</div>
							<?php endforeach; endif;?>
						<?php else :?>
						<div class="country-label">All Countries</div>
						<?php endif;?>
						<?php endif;?>
	                </div>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	
	
	<!-- Countries Physically Legal In -->
	<div class="clearfix"></div>
	<div class="bs-example faq">
		<div class="panel-group" id="accordion">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion"
							href="#collapseThree">Data legal to acquire physically with restrictions(please contact you lawyer or doctor before you acquire data physically)</a> <i
							data-toggle="collapse" data-parent="#accordion"
							href="#collapseThree" class="fa fa-chevron-down pull-right"
							aria-hidden="true"></i>
					</h4>
				</div>
				<div id="collapseThree" class="panel-collapse collapse">
					<div class="panel-body">
	                    <?php if($regions2 != ''):?>
						<?php if($regions2 != 'select-all') :?>
							<?php $regionArr = explode(',', $regions2);?>
							<?php if($regionArr): foreach ($regionArr as $r):?>
							
							<?php $c = new Country();?>
							<div class="country-label">
								<?php echo $c->get_country_by_id($r);?>
							</div>
							<?php endforeach; endif;?>
						<?php else :?>
						<div class="country-label">All Countries</div>
						<?php endif;?>
						<?php endif;?>
	                </div>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	
	
	
	<!--  LIKE UNLIKE SECTION FOR PAGE DATA START HERE -->
	<div class="row">
	<div class="col-md-4">
		<div class="row">
		<div class="col-md-6">
			<a class="btn btn-primary love_it_post no-border-radius" data-id=<?php echo $page->{Page::_ID}?>><i class="fa fa-heart-o fa-2x"></i> <span style="color: #fff; font-size:16px" class="loveit"><?php echo $like_dislike->loveitcount; ?></span></a>	LOVE IT
		</div>
		<div class="col-md-6">
			<a class="btn btn-success like_post no-border-radius" data-id=<?php echo $page->{Page::_ID}?>><i class="fa fa-thumbs-o-up fa-2x"></i> <span style="color: #fff; font-size:16px" class="likecount"><?php echo $like_dislike->likecount; ?></span></a>	LIKE IT
		</div>
		</div>
	</div>
	<div class="col-md-4 text-center">
		<button type="button" class="btn btn-warning btn-lg no-border-radius" name="btn_comment_count">NO COMMENT</button>
	</div>
	<div class="col-md-4">
		<div class="row">
		<div class="col-md-6">
			<a class="btn btn-warning unlike_post no-border-radius" data-id=<?php echo $page->{Page::_ID}?>><i class="fa fa-thumbs-o-down fa-2x"></i> <span style="color: #fff; font-size:16px" class="dislikecount"><?php echo $like_dislike->dislikecount; ?></span></a> DISLIKE IT
		</div>
		<div class="col-md-6">
				<a class="btn btn-danger hate_it_post no-border-radius" data-id=<?php echo $page->{Page::_ID}?>><i class="fa fa-heart-o fa-2x"></i> <span style="color: #fff; font-size:16px" class="hateit"><?php echo $like_dislike->hateitcount; ?></span></a> HATE IT
		</div>
		</div>
	</div>
	</div>
	
	<!--  LIKE UNLIKE SECTION FOR PAGE DATA ENDS HERE -->
	
	<div class="comments_div text-center" style="margin-top: 30px;">
		<form action="">
		<label class="text-center">Comments</label>
		<textarea class="form-control" rows="5" cols="" name="comment_box"></textarea>
		<div class="text-right"><button class="btn btn-success no-border-radius" name="submit_comment"  data-id=<?php echo $page->{Page::_ID}?>" type="button" style="margin-top: 10px;">Submit</button></div>
		</form>
	</div>
	
	
	
</div>
<div class="clearfix"></div>
<div class="clearfix mar-t-60"></div>

<!-- Order RSS Feed Button -->
<div class="buttonmain">
	<h2>
		<img src="<?php echo base_url('assets/img/rss.png')?>" height="150" />
	</h2>
	<h3>News feed to communication field</h3>
	<!-- 	<p>Simply add an RSS feed URL from any website or blog and have new posts automatically delivered to your inbox.</p> -->
	<div class="onoffswitch">
		<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
			id="myonoffswitch" data-id="<?php echo $page->{Page::_ID}?>"> <label class="onoffswitch-label"
			for="myonoffswitch"> <span class="onoffswitch-inner"></span> <span
			class="onoffswitch-switch"></span>
		</label>
	</div>
</div>
<div class="clearfix"></div>
<hr/>

<div class="sharethis-inline-share-buttons"></div>

<hr/>
<?php if(!$page->{Page::_PRICELESS} && $page->{Page::_PRICE} !=0 ) :?>
<div class ="row mar-b-20">
	
	<!-- Pay via Internal PCT Wallet -->
	<div class="col-md-12">
		<div>
        	<h3>Internal PCT Wallet</h3><br/>        	        		
        	<form method="post" action="<?php echo base_url('pay-via-pct-wallet');?>">        		
        		<input type="hidden" name="item_id" value="<?php echo $page->{Page::_ID};?>"/>
    			<input type="hidden" name="item_name" value="<?php echo $page->{Page::_PAGE_TITLE};?>"/>
    			<input type="hidden" name="category_id" value="<?php echo $page->{Page::_CATEGORY_ID};?>"/>
        		<input type="hidden" name="item_name" value="<?php echo $page->{Page::_PAGE_TITLE}?>">
        		<input type="hidden" name="invoice_currency" value="eur">
        		<input type="hidden" name="invoice_amount" value="<?php echo restructure_price($page->{Page::_PRICE})?>" data-type="number">
        		<input type="hidden" name="language" value="en">
        		<input type="submit" class="btn btn-primary" value="EUR <?php echo restructure_price($page->{Page::_PRICE})?>">
        	</form>
    	
    	</div>
	</div>			  	            
    <!-- Pay via Internal PCT Wallet -->
</div>

<?php else :?>

<button type="button" class="btn btn-primary" name="btn_accquire_priceless_data" data-id="<?php echo $page->{Page::_ID}?>">Accquire Priceless data</button>


<?php endif; ?>


<!--  Data Modal Start Here -->
<div id="manage_rss_feed_modal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<form method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<?php if($this->session->userdata('id')): ?>
					<input type="text" class="form-control" placeholder="Email"
						name="email"
						value="<?php echo generate_user_id($this->session->userdata('id'));?>"
						readonly required> <input type="hidden" class="form-control"
						name="user-id"
						value="<?php echo $this->session->userdata('id');?>" required>
					<?php else :?>
					<input type="text" class="form-control" placeholder="Email"
						name="email" required>
					<?php endif;?>
					<input type="hidden" name="item-type"
						value="<?php echo $page->{Page::_CATEGORY_ID};?>" /> <input
						type="hidden" name="item-id"
						value="<?php echo $page->{Page::_ID};?>" />
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success"
						name="btn-confirm-subscription">Subscribe</button>
				</div>
			</form>
		</div>

	</div>
</div>
<div class="clearfix"></div>
<!-- Data Modal Ends Here -->

<?php endif;?>


<script>
$(function(){
	$("#volume").slider({
	    min: 0,
	    max: 100,
	    value: 0,
			range: "min",
			animate: true,
	    slide: function(event, ui) {
	      setVolume((ui.value) / 100);
	    }
	  });

	  var myMedia = document.createElement('audio');
	  $('#player').append(myMedia);
	  myMedia.id = "myMedia";

	$('.submodilites_div input').each(function(k,v){
		$(v).prop('disabled', true);
	});

	$('.like_post').off().on('click', function(e){
		console.log("Like Me");
		console.log($(this).data('id'));

		/* Fire an ajax request */
		
		var payload = {'id':$(this).data('id')};
		$.ajax({
			url:BASE_URL+'ajax', 
			data:{acid:1200,payload:JSON.stringify(payload)},
			type:'post', 
			dataType : 'JSON',
			success:function(response)
			{
				$().toastmessage('showSuccessToast', response.message);	

				if(response.flag == 1){
					$('.likecount').html(response.likecount);
					$('.dislikecount').html(response.dislikecount);
				}
			}
		});
	
	});

	$('.unlike_post').off().on('click', function(e){
		console.log("Unlike post");

		/* Fire an ajax request */
		
		var payload = {'id':$(this).data('id')};
		$.ajax({
			url:BASE_URL+'ajax', 
			data:{acid:1201,payload:JSON.stringify(payload)},
			type:'post', 
			dataType : 'JSON',
			success:function(response)
			{
				$().toastmessage('showSuccessToast', response.message);	

				if(response.flag == 1){
					$('.likecount').html(response.likecount);
					$('.dislikecount').html(response.dislikecount);
				}
			}
		});
	
	});

	$('.love_it_post').off().on('click', function(e){
		console.log("Love it post");

		/* Fire an ajax request */
		
		var payload = {'id':$(this).data('id')};
		$.ajax({
			url:BASE_URL+'ajax', 
			data:{acid:1202,payload:JSON.stringify(payload)},
			type:'post', 
			dataType : 'JSON',
			success:function(response)
			{
				$().toastmessage('showSuccessToast', response.message);	

				if(response.flag == 1){
					$('.loveit').html(response.lovecount);
					$('.hateit').html(response.hatecount);
				}
			}
		});
	
	});

	$('.hate_it_post').off().on('click', function(e){
		console.log("Love it post");

		/* Fire an ajax request */
		
		var payload = {'id':$(this).data('id')};
		$.ajax({
			url:BASE_URL+'ajax', 
			data:{acid:1203,payload:JSON.stringify(payload)},
			type:'post', 
			dataType : 'JSON',
			success:function(response)
			{
				$().toastmessage('showSuccessToast', response.message);	

				if(response.flag == 1){
					$('.loveit').html(response.lovecount);
					$('.hateit').html(response.hatecount);
				}
			}
		});
	
	});


	$('button[type="button"][name="submit_comment"]').on('click', function(){
		console.log("comment button");

		/* Check if comment box has something */
		
		var comment = $('textarea[name="comment_box"]').val();

		if(comment == "")
		{
			$('textarea[name="comment_box"]').addClass('has-error');
			return false;
		}
		
		/* Fire an ajax request */
		
		var html = '';
		var payload = {'id':$(this).data('id'),'comment':comment,'parent_id':''};
		$.ajax({
			url:BASE_URL+'ajax', 
			data:{acid:1301,payload:JSON.stringify(payload)},
			type:'post', 
			dataType : 'JSON',
			success:function(response)
			{
				$().toastmessage('showSuccessToast', response.message);	
				console.log(response.comment);
				if(response.flag == 1){
// 					response.comment.comment
					html +='<div class="row comment text-left">';
						html +='<div class="col-md-2"><img class="img-responsive" src="'+BASE_URL +'/assets/uploads/avtar/'+response.comment.avatar_image+'</div>';
						html +='<div class="col-md-8">'+response.comment.comment+'</div>';
						html +='<div class="col-md-4"></div>';
						
					html +='</div>';
				}

				$('textarea[name="comment_box"]').val('');

				$('.comments_div form').prepend(html);
			}
		});
	});

	$('textarea[name="comment_box"]').on('keyup', function(){
		if($(this).hasClass('has-error')) $(this).removeClass('has-error');
	});

	
});


$('button[type="button"][name="btn_accquire_priceless_data"]').on('click', function(){

	var itemNumber = $(this).data('id');

    var payload = {'item-number':itemNumber};
    
	$.ajax({
		url:BASE_URL+'ajax',
		data:{acid:1400,payload:JSON.stringify(payload)},
		type:'post', 
		dataType : 'JSON',
		success:function(response)
		{
			if(response){
				$().toastmessage('showSuccessToast', response.message);
			}	
		}
	});
	
});

/* Once the page starts to load let's fire and ajax to check if user has alreay subscribed for the data */
 
$(function(){
	var payload = {'data-id': '<?php echo $page->{Page::_ID}?>'};
	var data = {'acid':11000,'payload':JSON.stringify(payload)};
	
	AjaxCommon.startAjaxRequest(BASE_URL+'ajax', data).done(function(response){
		if(response.flag == 1)
		{
			$('input[type="checkbox"][name="onoffswitch"]').prop('checked', true);
		}	
	});
});







</script>

<style>
.no-border-radius{
border-radius: 0px 0px 0px 0px;
-moz-border-radius: 0px 0px 0px 0px;
-webkit-border-radius: 0px 0px 0px 0px;
border: 0px solid #000000;
}
.has-error{
border:1px solid red;
}
</style>