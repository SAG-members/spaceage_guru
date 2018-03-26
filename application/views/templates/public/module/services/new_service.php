<h2>Add New Service</h2>
<div id="new-post" class="services_text">
	<form name="" action="<?php echo base_url('index.php/service/new-service')?>" method="post"> 
		<label class="checkbox-title">Service Visibility</label>
		<div class="checkboobmain">
			<input type="radio" name="service-visibility" value="1"/> <label class="checkbox-title">Public</label>
			<input type="radio" name="service-visibility" value="2"/> <label class="checkbox-title">Registered Users</label>
			<input type="radio" name="service-visibility" value="3"/> <label class="checkbox-title">Members</label>
		</div>
		<input type="text" name="service-name" class="mar-b-20"" placeholder="Service Name"/>
		<textarea name="service-content" id="servicecontent"></textarea>
		<div class="clearfix"></div>
		<div class="checkboobmain">
			<input type="checkbox" name="anonymous" value="1"/> <label>Post as Anonymous</label>
		<div class="clearfix"></div>
		</div>
		
		<div class="field buttons">
			<button type="submit" name="btn-submit-post"
				class="field button">Save</button>
		</div>
	</form>	
</div>
<div class="clearfix"></div>