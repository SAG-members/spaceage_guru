<?php 
# First thing to check is the user group level, whether Registered or Usership paid/ Membership paid user
if($this->session->userdata('membershipLevel') <= User::VISIBILITY_REGISTERED_USER):?>

<div class="alert alert-danger mar-t-20">Only Upgraded Usership and Membership owners can add Products, Services, Sensation and Symptoms</div>

<?php else :?>
<h2>Describe A Symptom</h2>
<div id="new-post" class="services_text"> 
	<form name="" action="<?php echo base_url('symptom/post-symptom')?>" method="post">
	<input type="text" name="symptom-title" class="password mar-b-20" 	placeholder="Symptom Title"/>
	<textarea class="classy-editor password" name="symptom-summary" placeholder="Describe Symptom"></textarea>
	<div class="clearfix"></div>
	<div class="checkboobmain">
		<input type="checkbox" name="anonymous" value="1"/> <label>Post as Anonymous</label>
	</div>
	<div class="field buttons">
		<button type="submit" name="btn-submit-question" class="field button" >Post Symptom</button>
	</div>
	</form> 
</div>
<?php endif;?>