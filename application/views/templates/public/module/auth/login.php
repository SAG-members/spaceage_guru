<div style="width: 120px; margin: 0px auto;">
	<img src="<?php echo base_url('assets/img/rainbow_couple.jpg')?>" class="img-responsive">
</div>

<div style="width: 320px; margin: 0px auto;">
	<img src="<?php echo base_url('assets/img/mother_earth.jpg')?>"  class="img-responsive">
</div>

<h2>Login</h2>
<div class="services_text feedback">
	<form action="<?php echo base_url('/index.php/login')?>" method="post"
		autocomplete="off">
		<label>Username</label> <input class="password" name="username" type="text"
			autocomplete="new-password"> <label>Password</label> <input
			name="password"  class="password" type="password" autocomplete="new-password">
		<?php if($this->session->has_userdata('referrer')):?>
		<input type="hidden" name="referrer"
			value="<?php echo $this->session->userdata('referrer');?>" /> 
		<?php endif;?>
		<div>
			<label><a data-toggle="modal" data-target="#forgot-password">Forgot
					Password?</a><a href="<?php echo base_url('register');?>">Register</a></label>
		</div>
		<button type="submit" class="btn-round-red" name="btn-submit">Login</button>
	</form>
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
				
				<div class="checkboobmain">
					<input type="radio" name="recover-mode" value="recover_password_with_email" required /> 
					<label>Recover password using Email</label><br /> 
					
					<input type="radio" name="recover-mode" value="recover_password_with_question" required /> 
					<label>Recover password using Security Question</label>
				</div>	 
				<div class="clearfix"></div>
				
				<div class="recover_password_with_question">
					<form id="recoverViaEmailQuestion" action="#" class="form-vertical" style="display: block;">
						<p class="normal_text">Enter your user Id, we will validate the secret question and then you need to answer the security question in order to reset your password</p>
						<div class="controls mar-t-20">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
							  	<input type="text" class="form-control" name="user_id" placeholder="Please Enter User Id"/>
							</div>
							<div class="secret-question mar-t-20">
								<p></p>
								<input type="text" class="form-control password" name="security_question_answer" placeholder="Write your answer here"/>
								
								<button type="button" class="btn btn-success mar-t-20" name="btn_submit_question_answer">Submit Answer</button>
							</div>
							
							<div class="reset-password mar-t-20">
								<div class="input-group mar-b-20">
									<span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
								  	<input type="password" class="form-control" name="for_password" placeholder="Please Enter new password"/>
								</div>
								
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
								  	<input type="password" class="form-control password" name="for_cpassword" placeholder="Please Re-Enter new password"/>
								</div>
																
								<button type="button" class="btn btn-success mar-t-20" name="btn_submit_change_password">Change Password</button>
							</div>
							
							
						</div>
						<button type="button" class="btn btn-success mar-t-20" name="btn-recover-password-by-userid">Submit</button>
					</form>
				</div>
				
				<div class="recover_password_with_email">				
					<form id="recoverViaEmailform" action="#" class="form-vertical" style="display: block;">
						<div class="popup-message-box"></div>
						<p class="normal_text">Enter your e-mail address below we will
							reset your password and send you new password.</p>
	
						<div class="controls mar-t-20">
							<div class="input-group">
								<span class="input-group-addon" id="basic-addon1"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
							  	<input type="text" class="form-control" placeholder="E-mail address" name="recover-email-address"/>
							</div>
						</div>
						<button type="button" class="btn btn-success mar-t-20" name="btn-recover-password-by-email">Recover Password</button>
					</form>
				</div>
			</div>
		</div>

	</div>
</div>

<style>
.recover_password_with_question, .recover_password_with_email, .secret-question, .reset-password { display:none}
#forgot-password .modal-content{background: #089bd3;}
</style>

<script type="text/javascript">
$('input[type="radio"][name="recover-mode"]').on('click', function(){

	$('.recover_password_with_question').hide();
	$('.recover_password_with_email').hide();
	
	$('.'+$(this).val()).show();
});

/* Fire ajax event to submit user id */
 
$('button[type="button"][name="btn-recover-password-by-userid"]').on('click', function(){
	
	var userId = $('input[type="text"][name="user_id"]').val();
	MessageHelper.hideMessage();
	
	if(userId == '')
	{
		$('#forgot-password .modal-body').prepend(MessageHelper.showMessage('error', 'Please provide user id first'));
		return false;
	}
	else
	{
		var url = BASE_URL + 'ajax';
		var payload = {'user_id': userId};

		var data = {'acid':301,'payload':JSON.stringify(payload)};
		AjaxCommon.startAjaxRequest(url, data).done(function(response){ 
			if(response.flag == 0)
			{
				$('#forgot-password .modal-body').prepend(MessageHelper.showMessage('error', response.message));
				return false;
			}

			$('input[type="text"][name="user_id"]').prop('readonly', true);
			$('button[name="btn-recover-password-by-userid"][type="button"]').hide();
			$('.secret-question').show();
			$('.secret-question').find('p').html(response.result);
		});
	}
	
	
});

$('button[type="button"][name="btn_submit_question_answer"]').on('click', function(){

	var userId = $('input[type="text"][name="user_id"]').val();
	var answer = $('input[type="text"][name="security_question_answer"]').val();
	
	MessageHelper.hideMessage();
	if(answer == '')
	{
		$('#forgot-password .modal-body').prepend(MessageHelper.showMessage('error', 'Please provide answer first'));
		return false;
	}
	else
	{
		var url = BASE_URL + 'ajax';
		var payload = {'user_id': userId, 'answer': answer};

		var data = {'acid':302,'payload':JSON.stringify(payload)};
		AjaxCommon.startAjaxRequest(url, data).done(function(response){ 
			if(response.flag == 0)
			{
				$('#forgot-password .modal-body').prepend(MessageHelper.showMessage('error', response.message));
				return false;
			}
			$('input[type="text"][name="user_id"]').prop('readonly', true);
			$('button[name="btn_submit_question_answer"][type="button"]').hide();
			$('.secret-question').hide();
			$('.reset-password').show();
		});
	}
});

$('input[type="password"][name="for_password"], input[type="password"][name="for_cpassword"]').on('keyup blur', function(){
	
	MessageHelper.hideMessage();
	
	var password = $('input[type="password"][name="for_password"]').val();
	var cpassword = $('input[type="password"][name="for_cpassword"]').val();
	
	if(password !='' && cpassword !='' && password != cpassword)
	{
		$('#forgot-password .modal-body').prepend(MessageHelper.showMessage('error', 'Password and confirm password does not match'));
		return false;
	} 
	if(password !='' && cpassword !='' && password == cpassword)
	{
		MessageHelper.hideMessage();
	}
}); 

/* Change Password Functionality */
 
$('button[type="button"][name="btn_submit_change_password"]').on('click', function(){
	
	MessageHelper.hideMessage();

	var userId = $('input[type="text"][name="user_id"]').val();
	var password = $('input[type="password"][name="for_password"]').val();
	var cpassword = $('input[type="password"][name="for_cpassword"]').val();
	
	if(password =='' && cpassword =='')
	{
		$('#forgot-password .modal-body').prepend(MessageHelper.showMessage('error', 'Please enter password and confirm password'));
		return false;
	} 
	else
	{
		var url = BASE_URL + 'ajax';
		var payload = {'user_id': userId, 'password': password, 'cpassword' : cpassword};

		var data = {'acid':303,'payload':JSON.stringify(payload)};
		AjaxCommon.startAjaxRequest(url, data).done(function(response){ 

			if(response.flag == 0) 
			{
				$('#forgot-password .modal-body').prepend(MessageHelper.showMessage('error', response.message));
			}
			else
			{
				$('#forgot-password .modal-body').prepend(MessageHelper.showMessage('success', response.message));
			}

			/* Reload the page after 5 Seconds*/
			setTimeout(function(){ window.location.reload(); }, 5000);
			
		});
	}
});  

/* Recover password by gmail*/

$('button[type="button"][name="btn-recover-password-by-email"]').on('click', function(){
	MessageHelper.hideMessage();
	var email = $('input[type="text"][name="recover-email-address"]').val();

	/* First step to validate the email address */

	if(!isValidEmailAddress(email))
	{
		$('#forgot-password .modal-body').prepend(MessageHelper.showMessage('error', "Please provide a valid email address"));
		return false;
	}

	var url = BASE_URL + 'ajax';
	var payload = {'email': email};

	var data = {'acid':201,'payload':JSON.stringify(payload)};
	
	AjaxCommon.startAjaxRequest(url, data).done(function(response){ 

		if(response.flag == 0) 
		{
			$('#forgot-password .modal-body').prepend(MessageHelper.showMessage('error', response.message));
		}
		else
		{
			$('#forgot-password .modal-body').prepend(MessageHelper.showMessage('success', response.message));
		}

		/* Reload the page after 5 Seconds*/
		setTimeout(function(){ window.location.reload(); }, 5000);
		
	});
});


</script>
<!-- Forgot Password Pop up -->