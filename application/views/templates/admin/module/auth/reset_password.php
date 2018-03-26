<div class="login_wrapper">
	<div class="animate form login_form">
		<section class="login_content">
			<img src="<?php echo base_url('assets/img/logo-1.png')?>"> 
			<form method="post" class="form-horizontal">
			<h1>Change Password</h1>
			<?php if($this->message->hasFlashMessage()) {$this->message->printFlashMessage();}?>
			<div class="alert alert-danger error-change-password"></div> 
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
				  	<input type="password" class="form-control" name="password" placeholder="Enter your password"
					required value="" autocomplete="new-password"/>	
				</div>
				
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
				  	<input type="password" class="form-control" name="cpassword" placeholder="Enter confirm Password"
					required autocomplete="new-password"/>
				</div>
				
			</div>
			<div class="pull-right">
				<input type="button" name="change-password-button" class="btn btn-success submit" value="Change Password"/>
				<input type="hidden" name="user-id" value="<?php echo $userId;?>"/>

			</div>
			<div class="clearfix"></div>
			</form>
		</section>
	</div>
</div>
