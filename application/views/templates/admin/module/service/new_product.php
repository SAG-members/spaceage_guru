<?php 
$page_title = ''; $page_description = ''; $visibility = ''; $anonymous = ''; $public = 'checked'; 
$registered = ''; $upgraded = ''; $memberA = ''; $memberB = ''; $memberC = '';
$metaTitle = ''; $metaKeyword = ''; $metaDescription = ''; $priceChecked = ''; $price = ''; $regions = '';
$action = base_url('admin/products/add');
$status = 'disabled';

$visual_images_val = ''; $visual_motion ='';  $visual_motion_val =''; $visual_color =''; $visual_color_val =''; $visual_bright ='';
$visual_bright_val =''; $visual_focused =''; $visual_focused_val =''; $visual_bordered =''; $visual_bordered_val ='';
$visual_associated =''; $visual_associated_val =''; $visual_center =''; $visual_center_val =''; $visual_size_val ='';
$visual_shape_val =''; $visual_flat =''; $visual_flat_val =''; $visual_close =''; $visual_close_val =''; $visual_panormic ='';
$visual_panormic_val =''; $auditory_sound_val =''; $auditory_volume_val =''; $auditory_tone_val =''; $auditory_tempo_val ='';
$auditory_pitch_val =''; $auditory_pace_val =''; $auditory_timbre_val =''; $auditory_duration_val =''; $auditory_intensity_val ='';
$auditory_rhythm_val =''; $auditory_direction_val =''; $auditory_harmony_val =''; $auditory_ear_val =''; 
$kinesthic_location_in_body_val = '';$kinesthic_breating_val ='';
$kinesthic_pulse_val =''; $kinesthic_skin_val =''; $kinesthic_weight_val =''; $kinesthic_pressure_val =''; $kinesthic_intensity_val ='';
$kinesthic_tactile_val =''; $olafactory_sweet_val =''; $olafactory_sour_val =''; $olafactory_salt_val =''; $olafactory_bitter_val ='';
$olafactory_aroma_val =''; $olafactory_fragrance_val =''; $olafactory_essence_val =''; $olafactory_pungence_val ='';

if(isset($page))
{
	$page_title = $page->{Page::_PAGE_TITLE};
	$page_description = $page->{Page::_PAGE_DESCRIPTION};
	if($page->{Page::_ANONYMOUS}) $anonymous = 'checked';
	if($page->{Page::_PRICE} && $page->{Page::_PRICE} != '0.00'){$priceChecked = 'checked';}
	$price = $page->{Page::_PRICE};
	$status = '';
	
	switch ($page->{Page::_VISIBILITY})
	{
		case Page::VISIBILITY_PUBLIC : $public = 'checked'; break;
		case Page::VISIBILITY_REGISTERED : $registered = 'checked'; break;
		case Page::VISIBILITY_UPGRADED : $upgraded = 'checked'; break;
		case Page::VISIBILITY_MEMBERSHIP_A : $memberA = 'checked'; break;
		case Page::VISIBILITY_MEMBERSHIP_B : $memberB = 'checked'; break;
		case Page::VISIBILITY_MEMBERSHIP_C : $memberC = 'checked'; break;
	}
	
	$action = base_url('admin/products/edit/'.$page->{Page::_ID});
	
	$regions = $page->{Page::_COUNTRY_AVAILABLE_IN};
		
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
		
		$kinesthic_location_in_body_val = $submodilities->{Page_submodility::_KINESTHIC_LOCATION_IN_BODY_VAL};
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
	
	
	
	
}


?>

<div class="row pss_div">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2><?php echo $title;?></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br>
				<form id="demo-form2" action="<?php echo $action;?>"  method="post" class="form-horizontal form-label-left" enctype="multipart/form-data"> 

					<div class="form-group">
						<div class="radio visibility-block">
                            <label> <input type="radio" class="flat" name="visibility" value="1" <?php echo $public;?>> Signed In </label>
                            <label> <input type="radio" class="flat" name="visibility" value="2" <?php echo $registered;?>> Registered Users </label>
                            <label> <input type="radio" class="flat" name="visibility" value="3" <?php echo $upgraded;?>> Upgraded Users </label>
                            <label> <input type="radio" class="flat" name="visibility" value="4" <?php echo $memberA;?>> Membership A </label>
                            <label> <input type="radio" class="flat" name="visibility" value="5" <?php echo $memberB;?>> Membership B </label>
                            <label> <input type="radio" class="flat" name="visibility" value="6" <?php echo $memberC;?>> Membership C </label>
                          </div>
					</div> 
					
					<div class="form-group">
						<div class="mar-t-20">
							<input type="text" class="form-control" name="title" placeholder="Product Name" value="<?php echo $page_title;?>" >
						</div>
					</div>
					
					<div class="form-group">
						<div class="mar-t-20">
							<textarea name="description" id="summernote" ><?php echo $page_description;?></textarea>
						</div>
					</div>
					
					<div class="form-group mar-t-20">
						
						<label>Select Countries Available In</label>
						<div class="input-group">
			      			<input class="form-control" name="country" list="country-list" type="text">
			      			<span class="input-group-btn">
			        			<button class="btn btn-default country-add-button" name="btn-add-country" type="button">Add</button>
							</span>
			    		</div>
					</div>
					
					<div class="form-group">
						<div class="col-md-5">
							<div class="row">
								<div class="checkbox visibility-block mar-t-20">
		                            <label><input name="anonymous" value="1" type="checkbox" class="flat" <?php echo $anonymous;?>>&nbsp; Post as Anonymous</label>
		                       	</div>
	                       	</div>
                       	</div>
                       	<div class="col-md-5"> 
							<div class="row">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1"><label><input name="chckbox-price-per-read-article" value="1" type="checkbox" class="flat" <?php echo $priceChecked;?>> Price per read article</label></span>
			  						<input type="text" class="form-control" name="points" placeholder="Enter vigorbits here" aria-describedby="basic-addon1" style="height: 40px;" value="<?php echo $price;?>" <?php echo $status;?>>
			  						<span class="input-group-addon">vigorbits</span>
								</div>
							</div> 
						</div>
					</div>
														
					<datalist id="country-list"> 
						<option data-id="select-all" value="select-all"></option>
						<?php if($countries): foreach ($countries as $country):?>
						<option data-id="<?php echo $country['id']?>" value="<?php echo $country['name'];?>"><?php echo $country['name'];?></option>
						<?php endforeach; endif;?>
					</datalist>
					
					<div class="x_panel countries-label mar-t-20">
						<div class="x_title">
							<h2>Countries Data Available In</h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
		                    </ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content collapse">
							<?php if($regions != ''):?>
							<?php if($regions != 'select-all') :?>
								<?php $regionArr = explode(',', $regions);?>
								<?php if($regionArr): foreach ($regionArr as $r):?>
								<?php $c = new Country();?>
								<div class="country-label">
									<a class="remove-country" data-id="<?php echo $r;?>"><i class="fa fa-times" aria-hidden="true"></i></a>
									<?php echo $c->get_country_by_id($r);?>
								</div>
								<?php endforeach; endif;?>
							<?php else :?>
							<div class="country-label">
									<a class="remove-country" data-id="select-all"><i class="fa fa-times" aria-hidden="true"></i></a>
									All Countries
								</div>
							<?php endif;?>
							<?php endif;?>
						</div>
					</div>
					
					<div class="x_panel mar-t-20">
						<div class="x_title">
							<h2>SEO Information</h2>
							<ul class="nav navbar-right panel_toolbox">
		                    	<li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
		                      	
		                    </ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content collapse">
							<div class="form-group">
								<label class="control-label" for="last-name">Meta Title</label>
								<div>
									<input type="text" class="form-control" name="meta-title" placeholder="Meta Title" value="<?php echo $metaTitle?>">
								</div>
							</div>
							<div class="form-group">
								<label for="middle-name" class="control-label">Meta Keywords</label> 
								<div class="control-group">
									<input id="tags_1" type="text" name="meta-keywords" class="tags form-control" value="<?php echo $metaKeyword?>"/>
		                          	<div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
								</div>
							</div>
							<div class="form-group">
								<label for="middle-name" class="control-label">Meta Description</label> 
								<div>
									<textarea name="meta-description" class="classy-editor" placeholder="Meta Description"><?php echo $metaDescription;?></textarea>
								</div>
							</div>
							
						</div>
					</div>
					
					<!-- Visual Box -->
					<div class="x_panel mar-t-20">
						<div class="x_title">
							<h2>Visual </h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
		                    </ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content collapse visual_div">
							
							<div class="form-group">
								<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-12">			
										<strong>Number of Images</strong>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="visual_images_val" value="<?php echo $visual_images_val;?>"/>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="row">
									<?php 
										$a = ''; $b = '';
										switch ($visual_motion)
										{
											case 1 : $a='checked'; break;
											case 2 : $b='checked'; break;
										}
									?>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="radio" name="visual_motion" value="1" <?php echo $a;?>>
										<label> Motion</label>
										<input type="radio" name="visual_motion" value="2" <?php echo $b;?>>
										<label> Still</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="visual_motion_val" value="<?php echo $visual_motion_val;?>"/>
									</div>
									<?php 
										$a = ''; $b = '';
										switch ($visual_motion)
										{
											case 1 : $a='checked'; break;
											case 2 : $b='checked'; break;
										}
									?>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="radio" name="visual_color" value="1" <?php echo $a;?>>
										<label> Color</label>
										<input type="radio" name="visual_color" value="2" <?php echo $b;?>>
										<label> Black & White</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="visual_color_val" value="<?php echo $visual_color_val;?>"/>
									</div>
								</div>
							</div>
														
							<div class="form-group">
								<div class="row">
									<?php 
										$a = ''; $b = '';
										switch ($visual_motion)
										{
											case 1 : $a='checked'; break;
											case 2 : $b='checked'; break;
										}
									?>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="radio" name="visual_bright" value="1" <?php echo $a;?>>
										<label> Bright</label>
										<input type="radio" name="visual_bright_val" value="2" <?php echo $b;?>>
										<label> Dim</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="visual_bright_val" value="<?php echo $visual_bright_val;?>"/>
									</div>
									<?php 
										$a = ''; $b = '';
										switch ($visual_motion)
										{
											case 1 : $a='checked'; break;
											case 2 : $b='checked'; break;
										}
									?>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="radio" name="visual_focused" value="1" <?php echo $a;?>>
										<label> Focused</label>
										<input type="radio" name="visual_focused" value="2" <?php echo $b;?>>
										<label> Unfocused</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="visual_focused_val" value="<?php echo $visual_focused_val;?>"/>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="row">
									<?php 
										$a = ''; $b = '';
										switch ($visual_motion)
										{
											case 1 : $a='checked'; break;
											case 2 : $b='checked'; break;
										}
									?>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="radio" name="visual_bordered" value="1" <?php echo $a;?>>
										<label> Bordered</label>
										<input type="radio" name="visual_bordered" value="2" <?php echo $b;?>>
										<label> Borderless</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="visual_bordered_val" value="<?php echo $visual_bordered_val;?>"/>
									</div>
									<?php 
										$a = ''; $b = '';
										switch ($visual_motion)
										{
											case 1 : $a='checked'; break;
											case 2 : $b='checked'; break;
										}
									?>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="radio" name="visual_associated" value="1" <?php echo $a;?>>
										<label> Associated</label>
										<input type="radio" name="visual_associated" value="2" <?php echo $b;?>>
										<label> Dissociated</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="visual_associated_val" value="<?php echo $visual_associated_val;?>"/>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="row">
									<?php 
										$a = ''; $b = '';
										switch ($visual_motion)
										{
											case 1 : $a='checked'; break;
											case 2 : $b='checked'; break;
										}
									?>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="radio" name="visual_center" value="1" <?php echo $a;?>>
										<label> Center Weighted</label>
										<input type="radio" name="visual_center" value="2" <?php echo $b;?>>
										<label> Wide Angle</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="visual_center_val" value="<?php echo $visual_center_val;?>"/>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<label> Size (Relative to Life)</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="visual_size_val" value="<?php echo $visual_size_val;?>"/>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-12">
										<label> Shape</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="visual_shape_val" value="<?php echo $visual_shape_val;?>"/>
									</div>
									<?php 
										$a = ''; $b = '';
										switch ($visual_motion)
										{
											case 1 : $a='checked'; break;
											case 2 : $b='checked'; break;
										}
									?>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="radio" name="visual_flat" value="1" <?php echo $a;?>>
										<label> Three Dimensional</label>
										<input type="radio" name="visual_flat" value="2" <?php echo $b;?>>
										<label> Flat</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="visual_flat_val" value="<?php echo $visual_flat_val;?>"/>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="row">
									<?php 
										$a = ''; $b = '';
										switch ($visual_motion)
										{
											case 1 : $a='checked'; break;
											case 2 : $b='checked'; break;
										}
									?>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="radio" name="visual_close" value="1" <?php echo $a;?>>
										<label> Close</label>
										<input type="radio" name="visual_close" value="2" <?php echo $b;?>>
										<label> Distant</label>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="visual_close_val" value="<?php echo $visual_close_val;?>"/>
									</div>
									<?php 
										$a = ''; $b = '';
										switch ($visual_motion)
										{
											case 1 : $a='checked'; break;
											case 2 : $b='checked'; break;
										}
									?>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="radio" name="visual_panormic" value="1" <?php echo $a;?>>
										<label> Location in space</label>
										<input type="radio" name="visual_panormic" value="2" <?php echo $b;?>>
										<label> Panoramic</label> 
									</div>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="visual_panormic_val" value="<?php echo $visual_panormic_val;?>"/>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="row">
									
								</div>
							</div>
							
						</div>
					</div>
					
					<!-- Visual Box -->
					
					<!-- Auditory Box -->
					
					<div class="x_panel mar-t-20">
						<div class="x_title">
							<h2>AUDITORY</h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
		                    </ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content collapse auditory_div">
							
							<div class="form-group">
								<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-12">			
										<strong>Number of sounds / Source</strong>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<div id="player"><div id="volume"></div></div>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-12"></div>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="auditory_sound_val" value="<?php echo $auditory_sound_val;?>">
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="row">
									
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Volume</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="auditory_volume_val" value="<?php echo $auditory_volume_val;?>">
									</div>
									
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Tone</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="auditory_tone_val" value="<?php echo $auditory_tone_val;?>">
									</div>
								</div>
							</div>
														
							<div class="form-group">
								<div class="row">
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Tempo</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="auditory_tempo_val" value="<?php echo $auditory_tempo_val;?>">
									</div>
									
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Pitch</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="auditory_pitch_val" value="<?php echo $auditory_pitch_val;?>">
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="row">
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Pace</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="auditory_pace_val" value="<?php echo $auditory_pace_val;?>">
									</div>
									
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Timbre</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="auditory_timbre_val" value="<?php echo $auditory_timbre_val;?>">
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="row">
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Duration</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="auditory_duration_val" value="<?php echo $auditory_duration_val;?>">
									</div>
									
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Intensity</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="auditory_intensity_val" value="<?php echo $auditory_intensity_val;?>">
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="row">
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Direction</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="auditory_direction_val" value="<?php echo $auditory_direction_val;?>">
									</div>
									
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Rhythm</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="auditory_rhythm_val" value="<?php echo $auditory_rhythm_val;?>">
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="row">
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Harmony</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="auditory_harmony_val" value="<?php echo $auditory_harmony_val;?>">
									</div>
									
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">More in one ear than another</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="auditory_ear_val" value="<?php echo $auditory_ear_val;?>">
									</div>
								</div>
							</div>
							
						</div>
					</div>
					
					<!-- Auditory Box -->
					
					<!-- Kinesthetic Box -->
					
					<div class="x_panel mar-t-20">
						<div class="x_title">
							<h2>KINESTHETIC</h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
		                    </ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content collapse kinesthetic_div">
							
							<div class="form-group">
								<div class="row">
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Location in body</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="kinesthic_location_in_body_val" value="<?php echo $kinesthic_location_in_body_val;?>">
									</div>
									
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Breating Rate</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="kinesthic_breating_val" value="<?php echo $kinesthic_breating_val;?>">
									</div>
								</div>
							</div>
														
							<div class="form-group">
								<div class="row">
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Pulse Rate</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="kinesthic_pulse_val" value="<?php echo $kinesthic_pulse_val;?>">
									</div>
									
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Skin Temperature</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="kinesthic_skin_val" value="<?php echo $kinesthic_skin_val;?>">
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="row">
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Weight</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="kinesthic_weight_val" value="<?php echo $kinesthic_weight_val;?>">
									</div>
									
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Pressure</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="kinesthic_pressure_val" value="<?php echo $kinesthic_pressure_val;?>">
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="row">
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Intensity</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="kinesthic_intensity_val" value="<?php echo $kinesthic_intensity_val;?>">
									</div>
									
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Tactile Sensations</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="kinesthic_tactile_val" value="<?php echo $kinesthic_tactile_val;?>">
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Kinesthetic Box -->
					
					<!-- Olfactory & Gustatory -->
					
					<div class="x_panel mar-t-20">
						<div class="x_title">
							<h2>OLFACTORY & GUSTATORY</h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
		                    </ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content collapse olafactory_div">
							
							<div class="form-group">
								<div class="row">
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Sweet</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="olafactory_sweet_val" value="<?php echo $olafactory_sweet_val;?>">
									</div>
									
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Sour</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="olafactory_sour_val" value="<?php echo $olafactory_sour_val;?>">
									</div>
								</div>
							</div>
														
							<div class="form-group">
								<div class="row">
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Salt</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="olafactory_salt_val" value="<?php echo $olafactory_salt_val;?>">
									</div>
									
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Bitter</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="olafactory_bitter_val" value="<?php echo $olafactory_bitter_val;?>">
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="row">
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Aroma</label>
									<div class="col-md-3 col-sm-3 col-xs-12"> 
										<input type="text" class="form-control" name="olafactory_aroma_val" value="<?php echo $olafactory_aroma_val;?>">
									</div>
									
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Fragnance</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="olafactory_fragrance_val" value="<?php echo $olafactory_fragrance_val;?>">
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="row">
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Essence</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="olafactory_essence_val" value="<?php echo $olafactory_essence_val;?>">
									</div>
									
									<label class="col-md-3 col-sm-3 col-xs-12" for="last-name">Pungence</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<input type="text" class="form-control" name="olafactory_pungence_val" value="<?php echo $olafactory_pungence_val;?>">
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Olfactory & Gustatory -->
					
					<div class="ln_solid"></div>
					<div class="form-group">
						<div>
							<input type="hidden" name="hidden-country-ids" value="<?php echo $regions;?>"/>
							<input type="hidden" name="hidden_submodility"/>
							<button id="send" type="submit" class="btn btn-success">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

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
		

	function setVolume(myVolume) {
	    var myMedia = document.getElementById('myMedia');
	    myMedia.volume = myVolume;
	    $('input[type="text"][name="auditory_volume_val"]').val(myVolume *100);
	}



	
});


</script>