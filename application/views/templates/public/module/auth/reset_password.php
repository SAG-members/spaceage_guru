<h2>Change Password</h2>
<div class="services_text feedback">
	<form  method="post" autocomplete="off">
		<div class="alert alert-danger error-change-password"></div>
		<label>Password</label> 
		<input name="password" type="password" autocomplete="new-password"> 
		
		<label>Confirm Password</label> 
		<input name="cpassword" type="password" autocomplete="new-password">
		<input type="hidden" name="user-id" value="<?php echo $userId;?>"/>
		<button type="button" name="btn-change-password">Change Password</button>
	</form>
</div>

