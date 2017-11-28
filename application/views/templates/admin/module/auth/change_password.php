<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title"><h2>Change Password</h2><div class="clearfix"></div></div>
		<div class="x_content">
			<form method="post" class="form-horizontal" action="<?php base_url('admin/change-password');?>">
				<div class="col-md-6">
					<div class="error-message"></div>
					<div class="form-group">
						<label>Enter Your Password</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
						  	<input type="password" class="form-control" name="password" placeholder="Enter your password"
							required value="" autocomplete="new-password"/>	
						</div>
					</div>
					<div class="form-group">
						<label>Enter Confirm Password</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
						  	<input type="password" class="form-control" name="cpassword" placeholder="Enter confirm Password"
							required autocomplete="new-password"/>
						</div>
					</div>
					<div>
						<input type="button" name="change-password-button" class="btn btn-success submit" value="Change Password" disabled/>
					</div>
					
				</div>
				<div class="col-md-6"></div>
				<div class="clearfix"></div>
			</form>	
		</div>
	</div>
</div>	

<script>
$(function(){
	$('input[type="password"][name="password"], input[type="password"][name="cpassword"]').on('keyup', function(){
		var password = $('input[type="password"][name="password"]').val();
		var cpassword = $('input[type="password"][name="cpassword"]').val();

		if(password !='' && cpassword !='')
		{
			if(password != cpassword)
			{
				var html = '<div class="alert alert-danger">';
					html +='<strong>Password and confirm password does not match</strong>';
					html +='</div>';

				$('.error-message').html(html);		
			}
			else
			{				
				$('.error-message').html('');
				$('input[type="button"][name="change-password-button"]').prop('disabled', false);
			}	
		}
		
	});
});

</script>