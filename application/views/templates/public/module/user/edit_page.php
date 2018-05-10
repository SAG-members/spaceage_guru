<?php 

$publicSelected =''; $registeredSelected = ''; $upgradedSelected = ''; $membershipaSelected = ''; $membershipbSelected = ''; $membershipcSelected = '';
$anonymous = ''; $price = ''; $legalRegions = "";

$visual_images_val = ''; $visual_motion ='';  $visual_motion_val =''; $visual_color =''; $visual_color_val =''; $visual_bright ='';
$visual_bright_val =''; $visual_focused =''; $visual_focused_val =''; $visual_bordered =''; $visual_bordered_val ='';
$visual_associated =''; $visual_associated_val =''; $visual_center =''; $visual_center_val =''; $visual_size_val ='';
$visual_shape_val =''; $visual_flat =''; $visual_flat_val =''; $visual_close =''; $visual_close_val =''; $visual_panormic ='';
$visual_panormic_val =''; $auditory_sound_val =''; $auditory_volume_val =''; $auditory_tone_val =''; $auditory_tempo_val ='';
$auditory_pitch_val =''; $auditory_pace_val =''; $auditory_timbre_val =''; $auditory_duration_val =''; $auditory_intensity_val ='';
$auditory_rhythm_val =''; $auditory_direction_val =''; $auditory_harmony_val =''; $auditory_ear_val =''; $kinesthic_breating_val ='';
$kinesthic_location_in_body_val = '' ; $kinesthic_pulse_val =''; $kinesthic_skin_val =''; $kinesthic_weight_val =''; $kinesthic_pressure_val =''; $kinesthic_intensity_val ='';
$kinesthic_tactile_val =''; $olafactory_sweet_val =''; $olafactory_sour_val =''; $olafactory_salt_val =''; $olafactory_bitter_val ='';
$olafactory_aroma_val =''; $olafactory_fragrance_val =''; $olafactory_essence_val =''; $olafactory_pungence_val =''; $page_id = "";

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



$product = ''; $service = ''; $sensation = ''; $legalNote = ''; $audioVisual = ''; $article = ''; $symptom = ''; $cures = '';
$title = ''; $description = ''; $regions = ''; $priceBoxSelected = ''; $priceLessSelected = ''; $wordPrice = "";

if($page)
{
    $page_id = $page->{Page::_ID};
	$categoryId = $page->{Page::_CATEGORY_ID};
	
	switch($categoryId)
	{
		case Page::_CATEGORY_SERVICE : $service = 'checked'; break;
		case Page::_CATEGORY_PRODUCT : $product = 'checked'; break;
		case Page::_CATEGORY_SENSES : $sensation = 'checked'; break;
		case Page::_CATEGORY_LEAGAL_NOTE : $legalNote = 'checked'; break;
		case Page::_CATEGORY_AUDIO_VISUAL : $audioVisual = 'checked'; break;
		case Page::_CATEGORY_ARTICLE : $article = 'checked'; break;
		case Page::_CATEGORY_SYMPTOM : $symptom = 'checked'; break;
		case Page::_CATEGORY_CURES : $cures = 'checked'; break;
	}
	
	$title = $page->{Page::_PAGE_TITLE};
	$tags = $page->{Page::_TAG};
	$description = $page->{Page::_PAGE_DESCRIPTION};
	
	$regions = $page->{Page::_COUNTRY_AVAILABLE_IN};
	$legalRegions = $page->{Page::_COUNTRY_LEGAL_IN};
	$legalAllowedRegions = $page->{Page::_COUNTRY_ALLOWED_IN};
	
	switch ($page->{Page::_VISIBILITY})
	{
		case Page::VISIBILITY_PUBLIC : $publicSelected = 'checked'; break;
		case Page::VISIBILITY_REGISTERED : $registeredSelected = 'checked'; break;
		case Page::VISIBILITY_UPGRADED : $upgradedSelected = 'checked'; break;
		case Page::VISIBILITY_MEMBERSHIP_A : $membershipaSelected = 'checked'; break;
		case Page::VISIBILITY_MEMBERSHIP_B : $membershipbSelected = 'checked'; break;
		case Page::VISIBILITY_MEMBERSHIP_C : $membershipcSelected = 'checked'; break;
	}
	
	$anonymous = $page->{Page::_ANONYMOUS} ? 'checked' : '';
	$price = $page->{Page::_PRICE} ? 'checked': '';
	$wordPrice = $page->{Page::_PRICE};
	
	if($page->{Page::_PRICELESS}) $priceLessSelected = 'checked';
	else $priceBoxSelected = 'checked';
}


?>
<div id="new-post" class="services_text pss_div">
	
	<?php if($this->session->userdata('membershipLevel') <=3 ):?>
	<div class="alert alert-danger">Please Upgrade as Member to edit data</div>
	
	<?php endif; ?>
	<form name="" action="<?php echo base_url('user/update/data/'.$page->{Page::_ID});?>" method="post"> 
			
		<div class="row">
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-public"><input type="radio" name="data_type" value="<?php echo Page::_CATEGORY_SERVICE?>" <?php echo $service;?>/></span>
				  	<input type="text" class="form-control level-public" value="Service" disabled>
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-registered"><input type="radio" name="data_type" value="<?php echo Page::_CATEGORY_PRODUCT?>" <?php echo $product;?>/></span>
				  	<input type="text" class="form-control level-registered" value="Product" disabled>
				</div>
			</div>
		</div>
		
		<div class="row mar-t-20">
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-upgraded"><input type="radio" name="data_type" value="<?php echo Page::_CATEGORY_SENSES?>" <?php echo $sensation;?>/></span>
				  	<input type="text" class="form-control level-upgraded" value="Sensation" disabled>
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-membershipa"><input type="radio" name="data_type" value="<?php echo Page::_CATEGORY_LEAGAL_NOTE?>" <?php echo $legalNote;?>/></span>
				  	<input type="text" class="form-control level-membershipa" value="Legal Note" disabled>
				</div>
			</div>
		</div>
		
		<div class="row mar-t-20">
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-membershipb"><input type="radio" name="data_type" value="<?php echo Page::_CATEGORY_AUDIO_VISUAL?>" <?php echo $audioVisual;?>/></span>
				  	<input type="text" class="form-control level-membershipb" value="Audio/Visual" disabled>
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-membershipc"><input type="radio" name="data_type" value="<?php echo Page::_CATEGORY_ARTICLE?>" <?php echo $article;?>/></span>
				  	<input type="text" class="form-control level-membershipc" value="Article" disabled>
				</div>
			</div>
		</div>
		
		<div class="row mar-t-20">
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-symptom"><input type="radio" name="data_type" value="<?php echo Page::_CATEGORY_SYMPTOM?>" <?php echo $symptom;?>/></span>
				  	<input type="text" class="form-control level-symptom" value="Symptoms" disabled>
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-cures"><input type="radio" name="data_type" value="<?php echo Page::_CATEGORY_CURES?>" <?php echo $cures;?>/></span>
				  	<input type="text" class="form-control level-cures" value="Cures" disabled>
				</div>
			</div>
		</div>
		
		<h3> Data Visibility</h3>
		<div class="clearfix"></div>
		<hr/>
			
		<div class="row mar-t-20">
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-public"><input type="radio" name="visibility" value="1" <?php echo $publicSelected?>/></span>
				  	<input type="text" class="form-control level-public" value="Signed In" disabled>
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-registered"><input type="radio" name="visibility" value="2" <?php echo $registeredSelected?>/></span>
				  	<input type="text" class="form-control level-registered" value="Registered Users 'RU'" disabled>
				</div>
			</div>
			
		</div>
		
		<div class="row mar-t-20">
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-upgraded"><input type="radio" name="visibility" value="3" <?php echo $upgradedSelected?>/></span>
				  	<input type="text" class="form-control level-upgraded" value="Upgraded Users 'UU'" disabled>
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-membershipa"><input type="radio" name="visibility" value="4" <?php echo $membershipaSelected?>/></span>
				  	<input type="text" class="form-control level-membershipa" value="Membership A" disabled>
				</div>
			</div>
		</div>
		
		<div class="row mar-t-20">
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-membershipb"><input type="radio" name="visibility" value="5" <?php echo $membershipbSelected?>/></span>
				  	<input type="text" class="form-control level-membershipb" value="Membership B" disabled>
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-membershipc"><input type="radio" name="visibility" value="6" <?php echo $membershipcSelected?>/></span>
				  	<input type="text" class="form-control level-membershipc" value="Membership C" disabled>
				</div>
			</div>
		</div>
		
		<div class="clearfix"></div>
				
		<input type="text" name="title" class="password mar-t-20" placeholder="Title" value="<?php echo $title;?>" required/>
		
		<input type="text" id="tags_1" name="tags" class="password mar-b-20" placeholder="Tags" value="<?php echo $tags?>"/>
		
		<div class="mar-t-20">
		<textarea name="description" id="summernote1" class="password" required><?php echo $description?></textarea>
		<div class="clearfix"></div>
		</div>
		
		<div id="dropzone" class="form-group mar-t-20">
			<p>Drag multiple files to the box below for multi upload or click to select files.</p>
            <div class="dropzone" id="mydropzone"></div>
            <br />
        </div>
        
        <div class="row">
        	<?php if($files): foreach ($files as $file) :  $extn = get_file_extension($file->document);?>
        	
        	<?php if($extn == 'png' || $extn == 'jpg' || $extn == 'jpeg' || $extn == 'bmp' || $extn == 'x-png') :?>
        	<div class="col-md-3" style="min-height: 160px; margin-bottom:10px; position:relative; ">
        		<a href="<?php echo base_url('assets/uploads/data_document/').$file->document; ?>" target="_blank">
        			<img  class="img-responsive" style="width: 100%;" src="<?php echo base_url('assets/uploads/data_document/thumb/').$file->document; ?>"/>
        		</a>
        		<a class="remove-image"  data-page-id="<?php echo $page_id; ?>" data-id="<?php echo $file->id; ?>" style="position: absolute; top:-5px; right:10px; color: #000;"/><i class="fa fa-close fa-2x"></i></a>
        	</div>
        	<?php elseif($extn == 'mp4' || $extn == 'mp3'):?>
        	<div class="col-md-3"  style="min-height: 160px; margin-bottom:10px; position:relative; ">
        		<img class="img-responsive" src="<?php echo base_url('assets/uploads/data_document/').$file->document; ?>"/>
        		<a class="remove-image" data-page-id="<?php echo $page_id; ?>"  data-id="<?php echo $file->id; ?>"  style="position: absolute; top:-5px; right:10px; color: #000;"/><i class="fa fa-close fa-2x"></i></a>
        	</div>
        	<?php elseif($extn == 'pdf') :?>
        	<div class="col-md-3" style="min-height: 160px; margin-bottom:10px; position:relative; ">
        		<a href="<?php echo base_url('assets/uploads/data_document/').$file->document; ?>" target="_blank">
        			<img  class="img-responsive" style="width: 100%;" src="<?php echo base_url('assets/img/pdf.jpeg'); ?>"/>
        			<a class="remove-image" data-page-id="<?php echo $page_id; ?>"  data-id="<?php echo $file->id; ?>"  style="position: absolute; top:-5px; right:10px; color: #000;"/><i class="fa fa-close fa-2x"></i></a>
        		</a>
        	</div>
        	<?php elseif ( $extn == 'doc' || $extn == 'docx' || $extn == 'ppt' || $extn == 'pptx' || $extn == 'xls' || $extn == 'xlsx') :?>
        	<div class="col-md-3" style="min-height: 160px; margin-bottom:10px; position:relative; ">
        		<a href="<?php echo base_url('assets/uploads/data_document/').$file->document; ?>" target="_blank">
        			<img  class="img-responsive" style="width: 100%;" src="<?php echo base_url('assets/img/doc.jpeg') ?>"/>
        			<a class="remove-image" data-page-id="<?php echo $page_id; ?>" data-id="<?php echo $file->id; ?>"  style="position: absolute; top:-5px; right:10px; color: #000;"/><i class="fa fa-close fa-2x"></i></a>
        		</a>
        	</div>
        	<?php endif;?>
        	
        	<?php endforeach; endif;?>
        	<div class="clearfix"></div>
        </div>
		
		<div class="checkboobmain">
			<input type="checkbox" name="anonymous" value="1" <?php echo $anonymous;?>/> <label>Post as Anonymous</label>
		</div>	
		<div class="clearfix"></div>
		
		<?php if($page->{Page::_CATEGORY_ID} != 20 && $page->{Page::_CATEGORY_ID} != 17):?>
		
		<div class="submodilites">
			<div class="panel panel-default submodility_panel">
    			<div class="panel-heading">
			        <h4 class="panel-title">
			            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" class="">Submodilities</a>
			        </h4>
			    </div>
    			<div id="collapseOne" class="panel-collapse collapse" aria-expanded="true">
	        		<div class="panel-body">
	           			<div class="visual_div">
							<p><strong>VISUAL</strong></p>
							
							<div class="col-md-7">
								Number of Images	
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="visual_images_val" style="width:auto; margin-top:0px;" value="<?php echo $visual_images_val;?>"/>
							</div>
							
							<?php 
								$a = ''; $b = '';
								switch ($visual_motion)
								{
									case 1 : $a='checked'; break;
									case 2 : $b='checked'; break;
								}
							?>
							<div class="col-md-7">
								<input type="radio" name="visual_motion" value="1" <?php echo $a;?>>
								<label> Motion</label>
								<input type="radio" name="visual_motion" value="2" <?php echo $b;?>>
								<label> Still</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="visual_motion_val" style="width:auto; margin-top:0px;" value="<?php echo $visual_motion_val;?>"/>
							</div>
							<?php 
								$a = ''; $b = '';
								switch ($visual_color)
								{
									case 1 : $a='checked'; break;
									case 2 : $b='checked'; break;
								}
							?>
							<div class="col-md-7">
								<input type="radio" name="visual_color" value="1" <?php echo $a;?>>
								<label> Color</label>
								<input type="radio" name="visual_color" value="2" <?php echo $b;?>>
								<label> Black & White</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="visual_color_val" style="width:auto; margin-top:0px;" value="<?php echo $visual_color_val;?>"/>
							</div>
							<?php 
								$a = ''; $b = '';
								switch ($visual_bright)
								{
									case 1 : $a='checked'; break;
									case 2 : $b='checked'; break;
								}
							?>
							<div class="col-md-7">
								<input type="radio" name="visual_bright" value="1" <?php echo $a;?>>
								<label> Bright</label>
								<input type="radio" name="visual_bright" value="2" <?php echo $b;?>>
								<label> Dim</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="visual_bright_val" style="width:auto; margin-top:0px;" value="<?php echo $visual_bright_val;?>"/>
							</div>
							<?php 
								$a = ''; $b = '';
								switch ($visual_focused)
								{
									case 1 : $a='checked'; break;
									case 2 : $b='checked'; break;
								}
							?>
							<div class="col-md-7">
								<input type="radio" name="visual_focused" value="1" <?php echo $a;?>>
								<label> Focused</label>
								<input type="radio" name="visual_focused" value="2" <?php echo $b;?>>
								<label> Unfocused</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="visual_focused_val" style="width:auto; margin-top:0px;" value="<?php echo $visual_focused_val;?>"/>
							</div>
							<?php 
								$a = ''; $b = '';
								switch ($visual_bordered)
								{
									case 1 : $a='checked'; break;
									case 2 : $b='checked'; break;
								}
							?>
							<div class="col-md-7">
								<input type="radio" name="visual_bordered" value="1" <?php echo $a;?>>
								<label> Bordered</label>
								<input type="radio" name="visual_bordered" value="2" <?php echo $b;?>>
								<label> Borderless</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="visual_bordered_val" style="width:auto; margin-top:0px;" value="<?php echo $visual_bordered_val;?>"/>
							</div>
							<?php 
								$a = ''; $b = '';
								switch ($visual_associated)
								{
									case 1 : $a='checked'; break;
									case 2 : $b='checked'; break;
								}
							?>
							<div class="col-md-7">
								<input type="radio" name="visual_associated" value="1" <?php echo $a;?>>
								<label> Associated</label>
								<input type="radio" name="visual_associated" value="2" <?php echo $b;?>>
								<label> Dissociated</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="visual_associated_val" style="width:auto; margin-top:0px;" value="<?php echo $visual_associated_val;?>"/>
							</div>
							<?php 
								$a = ''; $b = '';	
								switch ($visual_center)
								{
									case 1 : $a='checked'; break;
									case 2 : $b='checked'; break;
								}
							?>
							<div class="col-md-7">
								<input type="radio" name="visual_center" value="1" <?php echo $a;?>>
								<label> Center Weighted</label>
								<input type="radio" name="visual_center" value="2" <?php echo $b;?>>
								<label> Wide Angle</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="visual_center_val" style="width:auto; margin-top:0px;" value="<?php echo $visual_center_val;?>"/>
							</div>
										
							<div class="col-md-7">
								<label> Size (Relative to Life)</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="visual_center_val" style="width:auto; margin-top:0px;" value="<?php echo $visual_center_val;?>"/>
							</div>
							
							<div class="col-md-7">
								<label> Shape</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="visual_shape_val" style="width:auto; margin-top:0px;" value="<?php echo $visual_shape_val;?>"/>
							</div>
							<?php 
								$a = ''; $b = '';
								switch ($visual_flat)
								{
									case 1 : $a='checked'; break;
									case 2 : $b='checked'; break;
								}
							?>
							<div class="col-md-7">
								<input type="radio" name="visual_flat" value="1" <?php echo $a;?>>
								<label> Three Dimensional</label>
								<input type="radio" name="visual_flat" value="2" <?php echo $b;?>>
								<label> Flat</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="visual_flat_val" style="width:auto; margin-top:0px;" value="<?php echo $visual_flat_val;?>"/>
							</div>
							<?php 
								$a = ''; $b = '';
								switch ($visual_close)
								{
									case 1 : $a='checked'; break;
									case 2 : $b='checked'; break;
								}
							?>
							<div class="col-md-7">
								<input type="radio" name="visual_close" value="1" <?php echo $a;?>>
								<label> Close</label>
								<input type="radio" name="visual_close" value="2" <?php echo $b;?>>
								<label> Distant</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="visual_close_val" style="width:auto; margin-top:0px;" value="<?php echo $visual_close_val;?>"/>
							</div>
							<?php 
								$a = ''; $b = '';
								switch ($visual_panormic)
								{
									case 1 : $a='checked'; break;
									case 2 : $b='checked'; break;
								}
							?>						
							<div class="col-md-7">
								<input type="radio" name="visual_panormic" value="1" <?php echo $a;?>>
								<label> Location in space</label>
								<input type="radio" name="visual_panormic" value="2" <?php echo $b;?>>
								<label> Panoramic</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="visual_panormic_val" style="width:auto; margin-top:0px;" value="<?php echo $visual_panormic_val;?>"/>
							</div>
							<div class="clearfix"></div>
						</div>
						
						<div class="auditory_div">
							<p><strong>Auditory</strong></p>
							
							
							<div class="col-md-7">
								<label> Number of Sounds/Source</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="auditory_sound_val" style="width:auto; margin-top:0px;" value="<?php echo $auditory_sound_val;?>"/>
							</div>
							<div class="clearfix"></div>
							
							<div id="player"><div id="volume"></div></div>
							
							<div class="clearfix"></div>
							
							<div class="col-md-7">
								<label> Volume</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="auditory_volume_val" style="width:auto; margin-top:0px;" value="<?php echo $auditory_volume_val;?>"/>
							</div>
							
							<div class="col-md-7">
								<label> Tone</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="auditory_tone_val" style="width:auto; margin-top:0px;" value="<?php echo $auditory_tone_val;?>"/>
							</div>
							
							<div class="col-md-7">
								<label> Tempo</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="auditory_tempo_val" style="width:auto; margin-top:0px;" value="<?php echo $auditory_tempo_val;?>"/>
							</div>
							
							<div class="col-md-7">
								<label> Pitch</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="auditory_pitch_val" style="width:auto; margin-top:0px;" value="<?php echo $auditory_pitch_val;?>"/>
							</div>
							
							<div class="col-md-7">
								<label> Pace</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="auditory_pace_val" style="width:auto; margin-top:0px;" value="<?php echo $auditory_pace_val;?>"/>
							</div>
							
							<div class="col-md-7">
								<label> Timbre</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="auditory_timbre_val" style="width:auto; margin-top:0px;" value="<?php echo $auditory_timbre_val;?>"/>
							</div>
							
							<div class="col-md-7">
								<label> Duration</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="auditory_duration_val" style="width:auto; margin-top:0px;" value="<?php echo $auditory_duration_val;?>"/>
							</div>
										
							<div class="col-md-7">
								<label> Intensity</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="auditory_intensity_val" style="width:auto; margin-top:0px;" value="<?php echo $auditory_intensity_val;?>"/>
							</div>
							
							<div class="col-md-7">
								<label> Direction</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="auditory_direction_val" style="width:auto; margin-top:0px;" value="<?php echo $auditory_direction_val;?>"/>
							</div>
							
							<div class="col-md-7">
								<label> Rhythm</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="auditory_rhythm_val" style="width:auto; margin-top:0px;" value="<?php echo $auditory_rhythm_val;?>"/>
							</div>
							
							<div class="col-md-7">
								<label> Harmony</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="auditory_harmony_val" style="width:auto; margin-top:0px;" value="<?php echo $auditory_harmony_val;?>"/>
							</div>
													
							<div class="col-md-7">
								<label> More in one ear than another</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="auditory_ear_val" style="width:auto; margin-top:0px;" value="<?php echo $auditory_ear_val;?>"/>
							</div>
							<div class="clearfix"></div>
						</div>
						
						<div class="kinesthetic_div">
							<p><strong>KINESTHETIC</strong></p>
							
							<div class="col-md-7">
								<label> Location in body</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="kinesthic_location_in_body_val" style="width:auto; margin-top:0px;" value="<?php echo $kinesthic_location_in_body_val;?>"/>
							</div>
							<div class="col-md-7">
								<label> Breathing Rate</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="kinesthic_breating_val" style="width:auto; margin-top:0px;" value="<?php echo $kinesthic_breating_val;?>"/>
							</div>
							
							<div class="col-md-7">
								<label> Pulse Rate</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="kinesthic_pulse_val" style="width:auto; margin-top:0px;" value="<?php echo $kinesthic_pulse_val;?>"/>
							</div>
							
							<div class="col-md-7">
								<label> Skin Temperature</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="kinesthic_skin_val" style="width:auto; margin-top:0px;" value="<?php echo $kinesthic_skin_val;?>"/>
							</div>
							
							<div class="col-md-7">
								<label> Weight</label> 
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="kinesthic_weight_val" style="width:auto; margin-top:0px;" value="<?php echo $kinesthic_weight_val;?>"/>
							</div>
							
							<div class="col-md-7">
								<label> Pressure</label> 
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="kinesthic_pressure_val" style="width:auto; margin-top:0px;" value="<?php echo $kinesthic_pressure_val;?>"/>
							</div>
							
							<div class="col-md-7">
								<label> Intensity</label> 
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="kinesthic_intensity_val" style="width:auto; margin-top:0px;" value="<?php echo $kinesthic_intensity_val;?>"/>
							</div>
							
							<div class="col-md-7">
								<label> Tactile Sensations</label> 
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="kinesthic_tactile_val" style="width:auto; margin-top:0px;" value="<?php echo $kinesthic_tactile_val;?>"/>
							</div>
						</div>
						
						<div class="olafactory_div">
							<p><strong>OLFACTORY & GUSTATORY</strong></p>
										
							<div class="col-md-7">
								<label> Sweet</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="olafactory_sweet_val" style="width:auto; margin-top:0px;" value="<?php echo $olafactory_sweet_val;?>">
							</div>
							
							<div class="col-md-7">
								<label> Sour</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="olafactory_sour_val" style="width:auto; margin-top:0px;" value="<?php echo $olafactory_sour_val;?>"/>
							</div>
							
							<div class="col-md-7">
								<label> Salt</label>
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="olafactory_salt_val" style="width:auto; margin-top:0px;" value="<?php echo $olafactory_salt_val;?>"/>
							</div>
							
							<div class="col-md-7">
								<label> Bitter</label> 
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="olafactory_bitter_val" style="width:auto; margin-top:0px;" value="<?php echo $olafactory_bitter_val;?>"/>
							</div>
							
							<div class="col-md-7">
								<label> Aroma</label> 
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="olafactory_aroma_val" style="width:auto; margin-top:0px;" value="<?php echo $olafactory_aroma_val;?>"/>
							</div>
							
							<div class="col-md-7">
								<label> Fragrance</label> 
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="olafactory_fragrance_val" style="width:auto; margin-top:0px;" value="<?php echo $olafactory_fragrance_val;?>"/>
							</div>
							
							<div class="col-md-7">
								<label> Essence</label> 
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="olafactory_essence_val" style="width:auto; margin-top:0px;" value="<?php echo $olafactory_essence_val;?>"/>
							</div>
							
							<div class="col-md-7">
								<label> Pungence</label> 
							</div>
							<div class="col-md-4">
								<input type="text" class="password" name="olafactory_pungence_val" style="width:auto; margin-top:0px;" value="<?php echo $olafactory_pungence_val;?>"/>
							</div>
							
							<div class="clearfix"></div>
						
						</div>
		       
		                  
		    		</div>
				</div>
			</div>
		</div>
		
		<?php endif;?>	
			
		<div class="checkboobmain">
		    <div class="col-md-8">
		    <div class="row">		
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><label><input name="chckbox-price-per-read-article" value="1" type="radio" class="flat" <?php echo $priceBoxSelected;?>> Price per read article</label></span>
  				<input type="text" class="form-control" name="points" placeholder="Enter word price here" aria-describedby="basic-addon1" style="height: 40px;" value="<?php echo $wordPrice; ?>">
  				<span class="input-group-addon"><label>word price</label></span>
			</div>
			</div></div>
			<div class="col-md-4">
			    <div class="input-group">
                    <span class="input-group-addon">
                        <input name="chckbox-price-per-read-article" value="2" type="radio" <?php echo $priceLessSelected;?>>
                    </span>
                    <span class="input-group-addon" style="color: #FFF;">Priceless</span>
                </div>
            </div>
		</div>
		<div class="clearfix"></div>
		
		
		
		<div class="countries-combobox mar-t-20">
		   <label>Countries where data is available</label>
    		<select name="countries[]" class="select_2_multiple password" multiple required>
				<option data-id="select-all" value="Select All">Select All</option>
				<?php if($countries) : foreach($countries as $country):?>
				<?php $selected=''; if(in_array($country['id'], explode(',', $regions))){echo $selected='selected="selected"';}?> 
		    	<option data-id="<?php echo $country['id'];?>" value="<?php echo $country['id'];?>" <?php echo $selected;?>><?php echo $country['name'];?></option>
			    <?php endforeach; endif;?>
		    </select>
		</div>
		
		<div class="countries-combobox mar-t-20">
			<label>Ccountries where data is legal to accquire physically</label>			
    		<select name="legal_countries[]" class="select_4_multiple password" multiple required>
				<option data-id="select-all" value="Select All">Select All</option>
				<?php if($countries) : foreach($countries as $country):?>
				<?php $selected=''; if(in_array($country['id'], explode(',', $legalRegions))){echo $selected='selected="selected"';}?> 
		    	<option data-id="<?php echo $country['id'];?>" value="<?php echo $country['id'];?>" <?php echo $selected;?>><?php echo $country['name'];?></option>
			    <?php endforeach; endif;?>
		    </select>
		</div>	 
		
		<div class="countries-combobox mar-t-20">
			<label>Select countries where data is legal to use physically with restriction</label>
    		<select name="physically_legal_countries[]" class="select_6_multiple password" multiple required>
				<option data-id="select-all" value="Select All">Select All</option>
				<?php if($countries) : foreach($countries as $country):?>
				<?php $selected=''; if(in_array($country['id'], explode(',', $legalAllowedRegions))){echo $selected='selected="selected"';}?> 
		    	<option data-id="<?php echo $country['id'];?>" value="<?php echo $country['id'];?>" <?php echo $selected;?>><?php echo $country['name'];?></option>
			    <?php endforeach; endif;?>
		    </select>
		</div>	
			
		<hr/>
		<div class="field buttons">
			<input type="hidden" name="hidden-country-ids"/>
			<input type="hidden" name="hidden_submodility"/>
			<button type="submit" name="btn-submit-post" class="field button">Save</button>
		</div>
	</form>	
</div>
<div class="clearfix"></div>
<script>
$(function(){

	/* Enable Tag Inputs */
	$('#tags_1').tagsInput({width: 'auto'});
	
	
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
		

	function setVolume(myVolume) {
	    var myMedia = document.getElementById('myMedia');
	    myMedia.volume = myVolume;
	    $('input[type="text"][name="auditory_volume_val"]').val(myVolume *100);
	}

	Dropzone.autoDiscover = false;
	
	var accept = ".pdf,.doc,.jpg,.jpeg,.png,.bmp,.avi,.mp4";
	var myDropzone = new Dropzone("div.dropzone", { 
		acceptedFiles: accept,	
		url: BASE_URL+"/ajax/upload-document",
		uploadMultiple: false,
		createImageThumbnails: true,
	    addRemoveLinks: true,
		maxFiles: 20,
		maxfilesexceeded: function(file) {
		        this.removeAllFiles();
		        this.addFile(file);
		},
		init: function () {
			this.on("success", function(file, response) {
			    response = JSON.parse(response);
			  
			    console.log(file._removeLink.dataset);
			    file._removeLink.dataset.fileName = response.result;
			  
				$('form').append('<input type="hidden" name="hidden_documents[]" value="'+response.result+'"/>');    
			});	
		},
	});

	myDropzone.on("removedfile", function(file){
        var fileName = file._removeLink.dataset.fileName;
	
		$('input[type="hidden"][name="hidden_documents[]"]').each(function(){

			if($(this).val() == fileName) $(this).remove();
		});

		
        /* Now Since we have the file name available we can remove this from directory */

        $.post(BASE_URL+"/ajax/remove-document", {filename: fileName});
    });
	

	$('input[type="radio"][name="data_type"]').on('change', function(){
		var dataTypeVal = $(this).val();
		
		$('.submodilites').show();

		if(dataTypeVal == 20 || dataTypeVal == 17)
		{
			$('.submodilites').hide();	
		}
		
	});


	/* Enable Select2 */

	$(".select_2_multiple").select2({
		placeholder: "Select countries where data available in",
    	maximumSelectionLength: 50,
        allowClear: true
    });

	$(".select_4_multiple").select2({
		placeholder: "Select countries where data is legal to use physically",
    	maximumSelectionLength: 50,
        allowClear: true
    });

	$(".select_6_multiple").select2({
		placeholder: "Select countries where data is legal to use physically with restriction",
    	maximumSelectionLength: 50,
        allowClear: true
    });

});

$(function(){
	
	<?php if((int)$page->user_id != (int)$this->session->userdata('id')) :?>
	$('input, textarea, select, button').each(function(){
		$(this).prop('disabled', true);
	});
	<?php elseif ($page->anonymous == 1): ?>
	$('input, textarea, select, button').each(function(){
		$(this).prop('disabled', true);
	});
	<?php endif;?>


	<?php if($this->session->userdata('membershipLevel') <=3 ):?>
	
	$('input, select, button').each(function(e){
		$(this).prop('disabled', true);
	});
	
	<?php endif; ?>
	
});

$('.remove-image').on('click', function(e){
	var $this = $(this);
	var pageId = $(this).data('pageId');
	var documentId = $(this).data('id');

	var payload = {'page-id':pageId, 'document-id':documentId};
	/* Fire ajax request to remove document */
	
	$.ajax({
		url:BASE_URL+'ajax', 
		data:{acid:'remove_data_image', payload:JSON.stringify(payload)},
		type:'post', 
		dataType : 'JSON',		
		success:function(data)
		{
			$this.parents('.col-md-3').remove();
		}
	});
	

	
});




</script>

