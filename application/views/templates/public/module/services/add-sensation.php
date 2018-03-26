<?php 
# First thing to check is the user group level, whether Registered or Usership paid/ Membership paid user
$this->load->model('user');
if($this->session->userdata('membershipLevel')== User::GROUP_USER_REGISTERED):?>

<div class="alert alert-danger mar-t-20">Only Upgraded Usership and Membership owners can add Services and Products</div>

<?php else :?>
<h2><?php echo $title;?></h2>
<div id="new-post" class="services_text">
	<form name="" action="<?php echo $url;?>" method="post"> 
		<label class="checkbox-title">Sensation Visibility</label>
		<div class="checkboobmain">
			<input type="radio" name="service-visibility" value="1" checked/> <label class="checkbox-title">Public</label>
			<input type="radio" name="service-visibility" value="2"/> <label class="checkbox-title">Registered Users</label>
			<input type="radio" name="service-visibility" value="3"/> <label class="checkbox-title">Members</label>
		</div>
		<input type="text" name="title" class="mar-b-20"" placeholder="Service Name"/>
		<textarea name="description" id="summernote"></textarea>
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

<?php endif;?>