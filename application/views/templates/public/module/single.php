<?php 
# First thing to check is the user group level, whether Registered or Usership paid/ Membership paid user
if($this->session->userdata('membershipLevel') <= User::VISIBILITY_REGISTERED_USER):?>

<div class="alert alert-danger mar-t-20">Only Upgraded Usership and Membership owners can add Products, Services, Sensation and Symptoms</div>

<?php else :?>

<h2><?php echo $title;?></h2>
<hr/>
<div id="new-post" class="services_text pss_div">
	<form name="" action="<?php echo $url;?>" method="post"> 
		<div class="row">
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
		
		<div class="clearfix"></div>
				
		<input type="text" name="title" class="password mar-t-20 mar-b-20" placeholder="Title" required/>
		
		<textarea name="description" id="summernote" class="password" required></textarea>
		<div class="clearfix"></div>
		
		<div class="checkboobmain">
			<input type="checkbox" name="anonymous" value="1"/> <label>Post as Anonymous</label>
		</div>	
		<div class="clearfix"></div>
		
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
			<p> Location in body</p>
			
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
		
			
		
		<div class="checkboobmain">		
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><label><input name="chckbox-price-per-read-article" value="1" type="checkbox" class="flat"> Price per read article</label></span>
  				<input type="text" class="form-control" name="points" placeholder="Enter vigorbits here" aria-describedby="basic-addon1" style="height: 40px;">
  				<span class="input-group-addon"><label>vigorbits</label></span>
			</div>
		</div>
		
		
		
		
		<div class="countries-combobox mar-t-20">
			<label>Select Countries Available In</label>
			<div class="input-group">
      			<input type="text" class="password" name="country" list="country-list">
      			<span class="input-group-btn">
        			<button class="btn btn-secondary country-add-button" name="btn-add-country" type="button">Add</button>
				</span>
    		</div>
			
			<datalist id="country-list">
				<option data-id="select-all" value="Select All">
				<?php if($countries) : foreach($countries as $country):?> 
			    <option data-id="<?php echo $country['id'];?>" value="<?php echo $country['name'];?>">
			    <?php endforeach; endif;?>
			</datalist>
			
			<fieldset class="scheduler-border">
				<legend class="scheduler-border">Countires Data Available In</legend>
				<div class="countries-label mar-t-20"></div>
			</fieldset>
			
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

	
	$('.pss_div input, .pss_div radio').on('click keyup blur', function()
	{		
		submodilities = [];

		$('.visual_div input, .visual_div radio').each(function(k,v){
			var name = $(v).attr('name');
			var value = $(v).val();
			var type = $(v).attr('type');

			
			switch(type)
			{
				case 'radio': 
					if($(v).is(':checked'))
					{
						var olaObj = {};
						olaObj['k'] = name;
						olaObj['v'] = value;
						olaObj['type'] = 'radio';

						submodilities.push(olaObj);
					}
				break;
				case 'text': 
					if(value !="")
					{
						var olaObj = {};
						olaObj['k'] = name;
						olaObj['v'] = value;
						olaObj['type'] = 'text';

						submodilities.push(olaObj);
					}
				break;
			}
		});
		
		$('.auditory_div input').each(function(k,v){
			var name = $(v).attr('name');
			var value = $(v).val();
			
			if(value !="")
			{
				var olaObj = {};
				olaObj['k'] = name;
				olaObj['v'] = value;
				submodilities.push(olaObj);
			}
			
		});
		
		$('.kinesthetic_div input').each(function(k,v){
			var name = $(v).attr('name');
			var value = $(v).val();
			
			if(value !="")
			{
				var olaObj = {};
				olaObj['k'] = name;
				olaObj['v'] = value;
				submodilities.push(olaObj);
			}
			
		});
		
		$('.olafactory_div input').each(function(k,v){
			var name = $(v).attr('name');
			var value = $(v).val();
			
			if(value !="")
			{
				var olaObj = {};
				olaObj['k'] = name;
				olaObj['v'] = value;
				submodilities.push(olaObj);
			}
			
		});
		$('input[type="hidden"][name="hidden_submodility"]').val(JSON.stringify(submodilities));
		console.log(JSON.stringify(submodilities));
	});


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



<?php endif;?>
