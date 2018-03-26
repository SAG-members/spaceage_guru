<div class="login_wrapper">
	<div class="animate form login_form">
		<section class="login_content">
			<img src="<?php echo base_url('assets/img/new_logo.jpg')?>" class="mar-b-20" style="width: 100%">
			<img src="<?php echo base_url('assets/img/spaceage_guru_logo.jpg')?>" style="width: 100%"> 
			<form method="post" class="form-horizontal" action="<?php echo base_url('admin/login');?>">
			<h1>Spaceguru Administrator</h1>
			<?php if($this->message->hasFlashMessage()) {$this->message->printFlashMessage();}?> 
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
				  	<input type="text" class="form-control" name="username" placeholder="Username"
					required value="" autocomplete="new-password"/>	
				</div>
				
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
				  	<input type="password" class="form-control" name="password" placeholder="Password"
					required autocomplete="new-password"/>
				</div>
				
			</div>
			<div>
				<input type="submit" name="login-button" class="btn btn-success submit" value="Log in"/>
<!-- 				<a class="btn btn-default submit" href="index.html">Log in</a>  -->
					<a class="reset_pass" data-toggle="modal" data-target="#forgot-password">Lost your password?</a>
			</div>
			
			<div class="clearfix"></div>
			</form>
		</section>
	</div>
</div>



<!-- Forgot Password Pop up -->

<div id="forgot-password" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<div class="row"><div class="col-centered"><img src="<?php echo base_url('assets/img/forgot-logo.png')?>"/></div></div>
			</div>
			<div class="modal-body">
				<form id="recoverform" action="#" class="form-vertical"
					style="display: block;">
					<div class="popup-message-box"></div>
					<p class="normal_text">Enter your e-mail address below we will
						send you instructions on how to reset your password.</p>

					<div class="controls mar-t-20">
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
						  	<input type="email" name="email" id="email" placeholder="Email Address" class="form-control">	
						</div>
					</div>
					<button type="button" class="btn btn-success mar-t-20" name="btn-recover-password">Recover Password</button>
				</form>
			</div>
		</div>

	</div>
</div>
<!-- Forgot Password Pop up -->