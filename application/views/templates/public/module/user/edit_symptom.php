<h2>Edit Symptom</h2>
<div id="new-post" class="services_text"> 
	<form name="" action="<?php echo base_url('symptom/update/'.$symptom['id'])?>" method="post">
	<input type="text" name="symptom-title" class="password mar-b-20" 	placeholder="Symptom Title" value="<?php echo $symptom['symptom'];?>"/>
	<textarea class="classy-editor password" name="symptom-summary" placeholder="Describe Symptom"><?php echo $symptom['description'];?></textarea>
	<div class="clearfix"></div>
	<div class="checkboobmain">
		<input type="checkbox" name="anonymous" value="1" <?php echo $anonymous = $symptom['anonymous'] ? 'checked' : ''?>/> <label>Post as Anonymous</label>
	</div>
	<div class="field buttons">
		<button type="submit" name="btn-submit-question" class="field button" >Update Symptom</button>
	</div>
	</form> 
</div>
