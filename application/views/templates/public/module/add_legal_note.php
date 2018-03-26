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
				
		<div class="checkboobmain">		
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><label><input name="chckbox-price-per-read-article" value="1" type="checkbox" class="flat"> Price per read article</label></span>
  				<input type="text" class="form-control" name="points" placeholder="Enter vigorbits here" aria-describedby="basic-addon1" style="height: 40px;">
  				<span class="input-group-addon"><label>vigorbits</label></span>
			</div>
		</div>
				
		<div class="countries-combobox mar-t-20">
			<label>Select Countries Data Available In</label>
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
