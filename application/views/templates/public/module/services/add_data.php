<?php 
# First thing to check is the user group level, whether Registered or Usership paid/ Membership paid user
if($this->session->userdata('membershipLevel') <= User::VISIBILITY_REGISTERED_USER):?>

<div class="alert alert-danger mar-t-20">Only Upgraded Usership and Membership owners can add Products, Services, Sensation and Symptoms</div>

<?php else :?>

<h2><?php echo $title;?></h2>
<hr/>
<div id="new-post" class="services_text pss_div">
	<form id="add_new_data_form" action="<?php echo base_url('user/add/data');?>" method="post"> 
			
		<div class="row">
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-public"><input type="radio" name="data_type" value="<?php echo Page::_CATEGORY_SERVICE?>" checked/></span>
				  	<input type="text" class="form-control level-public" value="Service" disabled>
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-registered"><input type="radio" name="data_type" value="<?php echo Page::_CATEGORY_PRODUCT?>"/></span>
				  	<input type="text" class="form-control level-registered" value="Product" disabled>
				</div>
			</div>
		</div>
		
		<div class="row mar-t-20">
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-upgraded"><input type="radio" name="data_type" value="<?php echo Page::_CATEGORY_SENSES?>" /></span>
				  	<input type="text" class="form-control level-upgraded" value="Sensation" disabled>
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-membershipa"><input type="radio" name="data_type" value="<?php echo Page::_CATEGORY_LEAGAL_NOTE?>"/></span>
				  	<input type="text" class="form-control level-membershipa" value="Legal Note" disabled>
				</div>
			</div>
		</div>
		
		<div class="row mar-t-20">
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-membershipb"><input type="radio" name="data_type" value="<?php echo Page::_CATEGORY_AUDIO_VISUAL?>" /></span>
				  	<input type="text" class="form-control level-membershipb" value="Audio/Visual" disabled>
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-membershipc"><input type="radio" name="data_type" value="<?php echo Page::_CATEGORY_ARTICLE?>"/></span>
				  	<input type="text" class="form-control level-membershipc" value="Article" disabled>
				</div>
			</div>
		</div>
		
		<div class="row mar-t-20">
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-symptom"><input type="radio" name="data_type" value="<?php echo Page::_CATEGORY_SYMPTOM ?>" /></span>
				  	<input type="text" class="form-control level-symptom" value="Symptoms" disabled>
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-cures"><input type="radio" name="data_type" value="<?php echo Page::_CATEGORY_CURES ?>"/></span>
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
					<span class="input-group-addon level-public"><input type="radio" name="visibility" value="1" checked/></span>
				  	<input type="text" class="form-control level-public" value="Signed In" disabled>
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-registered"><input type="radio" name="visibility" value="2"/></span>
				  	<input type="text" class="form-control level-registered" value="Registered Users 'RU'" disabled>
				</div>
			</div>
			
		</div>
		
		<div class="row mar-t-20">
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-upgraded"><input type="radio" name="visibility" value="3"/></span>
				  	<input type="text" class="form-control level-upgraded" value="Upgraded Users 'UU'" disabled>
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-membershipa"><input type="radio" name="visibility" value="4"/></span>
				  	<input type="text" class="form-control level-membershipa" value="Membership A" disabled>
				</div>
			</div>
		</div>
		
		<div class="row mar-t-20">
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-membershipb"><input type="radio" name="visibility" value="5"/></span>
				  	<input type="text" class="form-control level-membershipb" value="Membership B" disabled>
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-membershipc"><input type="radio" name="visibility" value="6"/></span>
				  	<input type="text" class="form-control level-membershipc" value="Membership C" disabled>
				</div>
			</div>
		</div>
		
		<div class="row mar-t-20">
			<div class="col-md-12">
				<div class="input-group">
					<span class="input-group-addon level-membershipa"><input type="radio" name="visibility" id="enable_specified_user" value="7"/> Only Specified Users</span>
				  	<select name="specified_user_value[]" class="specified_user_value password" multiple disabled>
						<?php if($users) : foreach($users as $u):?> 
				    	<option data-id="<?php echo $u->id;?>" value="<?php echo $u->id;?>"><?php echo $u->username;?></option>
				    	<?php endforeach; endif;?>
			    	</select>
				</div>
			</div>
		
		</div>
		
		<div class="clearfix"></div>
				
		<input type="text" name="title" class="password mar-t-20" placeholder="Title" required/>
		
		<input type="text" id="tags_1" name="tags" class="password mar-b-20" placeholder="Tags"/>
		
		<div class="mar-t-20">
		<textarea name="description" id="summernote" class="password" required></textarea>
		<div class="clearfix"></div>
		</div>
		
		<div id="dropzone" class="form-group mar-t-20">
			<p>Drag multiple files to the box below for multi upload or click to select files.</p>
            <div class="dropzone" id="mydropzone"></div>
            <br />
        </div>
		
		<div class="checkboobmain">
			<input type="checkbox" name="anonymous" value="1"/> <label>Post as Anonymous</label>
		</div>	
		<div class="clearfix"></div>
		
		
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
	                <input type="text" class="password" name="visual_images_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <input type="radio" name="visual_motion" value="1">
	                <label> Motion</label>
	                <input type="radio" name="visual_motion" value="2">
	                <label> Still</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="visual_motion_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <input type="radio" name="visual_color" value="1">
	                <label> Color</label>
	                <input type="radio" name="visual_color" value="2">
	                <label> Black & White</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="visual_color_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <input type="radio" name="visual_bright" value="1">
	                <label> Bright</label>
	                <input type="radio" name="visual_bright" value="2">
	                <label> Dim</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="visual_bright_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <input type="radio" name="visual_focused" value="1">
	                <label> Focused</label>
	                <input type="radio" name="visual_focused" value="2">
	                <label> Unfocused</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="visual_focused_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <input type="radio" name="visual_bordered" value="1">
	                <label> Bordered</label>
	                <input type="radio" name="visual_bordered" value="2">
	                <label> Borderless</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="visual_bordered_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <input type="radio" name="visual_associated" value="1">
	                <label> Associated</label>
	                <input type="radio" name="visual_associated" value="2">
	                <label> Dissociated</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="visual_associated_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <input type="radio" name="visual_center" value="1">
	                <label> Center Weighted</label>
	                <input type="radio" name="visual_center" value="2">
	                <label> Wide Angle</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="visual_center_val" style="width:auto; margin-top:0px;"/>
	            </div>
	                        
	            <div class="col-md-7">
	                <label> Size (Relative to Life)</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="visual_center_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <label> Shape</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="visual_shape_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <input type="radio" name="visual_flat" value="1">
	                <label> Three Dimensional</label>
	                <input type="radio" name="visual_flat" value="2">
	                <label> Flat</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="visual_flat_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <input type="radio" name="visual_close" value="1">
	                <label> Close</label>
	                <input type="radio" name="visual_close" value="2">
	                <label> Distant</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="visual_close_val" style="width:auto; margin-top:0px;"/>
	            </div>
	                                    
	            <div class="col-md-7">
	                <input type="radio" name="visual_panormic" value="1">
	                <label> Location in space</label>
	                <input type="radio" name="visual_panormic" value="2">
	                <label> Panoramic</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="visual_panormic_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            <div class="clearfix"></div>
	        </div>
	        
	        <div class="auditory_div">
	            <p><strong>Auditory</strong></p>
	            
	            
	            <div class="col-md-7">
	                <label> Number of Sounds/Source</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="auditory_sound_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            <div class="clearfix"></div>
	            
	            <div id="player"><div id="volume"></div></div>
	            
	            <div class="clearfix"></div>
	            
	            <div class="col-md-7">
	                <label> Volume</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="auditory_volume_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <label> Tone</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="auditory_tone_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <label> Tempo</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="auditory_tempo_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <label> Pitch</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="auditory_pitch_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <label> Pace</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="auditory_pace_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <label> Timbre</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="auditory_timbre_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <label> Duration</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="auditory_duration_val" style="width:auto; margin-top:0px;"/>
	            </div>
	                        
	            <div class="col-md-7">
	                <label> Intensity</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="auditory_intensity_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <label> Direction</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="auditory_direction_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <label> Rhythm</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="auditory_rhythm_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <label> Harmony</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="auditory_harmony_val" style="width:auto; margin-top:0px;"/>
	            </div>
	                                    
	            <div class="col-md-7">
	                <label> More in one ear than another</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="auditory_ear_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            <div class="clearfix"></div>
	        </div>
	        
	        <div class="kinesthetic_div">
	            <p><strong>KINESTHETIC</strong></p>
	           <div class="col-md-7">
	                <label> Location in body</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="kinesthic_location_in_body_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <label> Breathing Rate</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="kinesthic_breating_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <label> Pulse Rate</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="kinesthic_pulse_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <label> Skin Temperature</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="kinesthic_skin_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <label> Weight</label> 
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="kinesthic_weight_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <label> Pressure</label> 
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="kinesthic_pressure_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <label> Intensity</label> 
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="kinesthic_intensity_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <label> Tactile Sensations</label> 
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="kinesthic_tactile_val" style="width:auto; margin-top:0px;"/>
	            </div>
	        </div>
	        
	        <div class="olafactory_div">
	            <p><strong>OLFACTORY & GUSTATORY</strong></p>
	                        
	            <div class="col-md-7">
	                <label> Sweet</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="olafactory_sweet_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <label> Sour</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="olafactory_sour_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <label> Salt</label>
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="olafactory_salt_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <label> Bitter</label> 
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="olafactory_bitter_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <label> Aroma</label> 
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="olafactory_aroma_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <label> Fragrance</label> 
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="olafactory_fragrance_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <label> Essence</label> 
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="olafactory_essence_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="col-md-7">
	                <label> Pungence</label> 
	            </div>
	            <div class="col-md-4">
	                <input type="text" class="password" name="olafactory_pungence_val" style="width:auto; margin-top:0px;"/>
	            </div>
	            
	            <div class="clearfix"></div>
	        
	        </div>          
	        </div>
	    </div>
	</div>
		</div>
			
		<div class="checkboobmain">
		    <div class="col-md-8">
		    <div class="row">		
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><label><input name="chckbox-price-per-read-article" value="1" type="radio" class="flat"> Price per read article</label></span>
  				<input type="text" class="form-control" name="points" placeholder="Enter word price here" aria-describedby="basic-addon1" style="height: 40px;" disabled>
  				<span class="input-group-addon"><label>word price</label></span>
			</div>
			</div></div>
			<div class="col-md-4">
			    <div class="input-group">
                    <span class="input-group-addon">
                        <input name="chckbox-price-per-read-article" value="2" type="radio">
                    </span>
                    <span class="input-group-addon" style="color: #FFF;">Priceless</span>
                </div>
            </div>
		</div>
		<div class="clearfix"></div>
		
		
		
		<div class="countries-combobox mar-t-20">
				<label style="color:#fff;">Select Data Available In</label>
	 			<select name="countries[]" class="select_2_multiple password" multiple required>
					<option data-id="select-all" value="Select All">Select All</option>
					<?php if($countries) : foreach($countries as $country):?> 
				    <option data-id="<?php echo $country['id'];?>" value="<?php echo $country['id'];?>"><?php echo $country['name'];?></option>
				    <?php endforeach; endif;?>
			    </select>
		</div>
		
		
		<div class="countries-combobox mar-t-20">
			<label style="color:#fff;">Select Data legal to acquire physically in</label>
			<select name="legal_countries[]" class="select_4_multiple password" multiple required>
				<option data-id="select-all" value="Select All">Select All</option>
				<?php if($countries) : foreach($countries as $country):?> 
			    <option data-id="<?php echo $country['id'];?>" value="<?php echo $country['id'];?>"><?php echo $country['name'];?></option>
			    <?php endforeach; endif;?>
		    </select>
		</div>
		
		<div class="countries-combobox mar-t-20">
			<label style="color:#fff;">Select Data legal to acquire physically with restrictions(please contact you lawyer or doctor before you acquire data physically)</label>
			<select name="physically_legal_countries[]" class="select_6_multiple password" multiple required>
				<option data-id="select-all" value="Select All">Select All</option>
				<?php if($countries) : foreach($countries as $country):?> 
			    <option data-id="<?php echo $country['id'];?>" value="<?php echo $country['id'];?>"><?php echo $country['name'];?></option>
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
			  
				$('#add_new_data_form').append('<input type="hidden" name="hidden_documents[]" value="'+response.result+'"/>');    
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


	$(".specified_user_value").select2({
		placeholder: "Select users you want to share the data with",
    	maximumSelectionLength: 50,
        allowClear: true
    });


    $('input[type="radio"][name="visibility"]').on('change', function(e){
		if($(this).val() == 7)
		{
			$('select[name="specified_user_value[]"]').prop('disabled', false);
		}
		else
		{
			$('select[name="specified_user_value[]"]').prop('disabled', true);
		}
    });

    /* Enable the checkbox for price */
	$('input[type="radio"][name="chckbox-price-per-read-article"]').on('change', function(e){

		if($(this).val() == 1){
			$('input[type="text"][name="points"]').prop('disabled', false);
		}
		else
		{
			$('input[type="text"][name="points"]').prop('disabled', true);
		}
		
	});
    
 
});

</script>



<?php endif;?>
