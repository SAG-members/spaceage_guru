<div class="quesmain">
<h2>Registration</h2>
<hr/>
<h2>The registration may take time 5-30 minutes. You are helping the algoritm to make your freetime as enjoyable fantasy as possible.</h2>
<br/>
<form id="register_form" method="post" action="<?php echo base_url('signup')?>" autocomplete="off" enctype="multipart/form-data">
	<input style="display:none" type="text" name="fakeusernameremembered"/>
	<input style="display:none" type="password" name="fakepasswordremembered"/>
	
	
	<h2>Where did you find about SAG(Spaceage Guru)?</h2>
	<input type="text" name="recommendor" class="password" placeholder="Enter avatar names/coupon code/user id">
	
	<h2>Select the country where you desire to use the program</h2>
	<select name="country" class="password" required>
		<option value="0">You may change the selected country at any given time</option>
		<?php foreach ($countries as $country) : $class = ""; if($country['flag']) $class = " gold"; ?>																
			<option class="country<?php echo $class?>" value="<?php echo $country['id'];?>"><?php echo $country['name']?></option>
		<?php endforeach; ?>
	</select>	
	
	<!-- Since we have to use avatar name to login so it is mandatory to check if same avatar name is already available-->
	<h2>Enter avatar name</h2>
	<input type="text" name="avatar_name" class="password" placeholder="Enter avatar name" autocomplete="off">
	
	<div class="form-group">
		<div class="row"><div class="col-md-6"><div class="fileUpload btn btn-primary"><span>Upload Avatar Image</span><input type="file" class="upload" id="profile-avtar" name="file"/></div></div>
		<div class="col-md-6"><div class="avtar-image-box"></div></div></div>
	</div>
	<div class="clearfix"></div>
	
	<!-- 
	<h2>What are you ?</h2>
	<input type="text" name="what_you_want_to_become" class="password" placeholder="What are you?" autocomplete="off">
	
	<h2>What do you want to become ?</h2>
	<input type="text" name="what_are_you" class="password" placeholder="What do you want to become?" autocomplete="off">
	
	 
	<h2>What is the problem that is preventing you from becoming the one you desire to become ?</h2>
	<input type="text" name="problem_preventing" class="password" placeholder="What is the problem that is preventing you from becoming the one you desire to become?" autocomplete="off">
	-->
	 
	<h2>Are you a ?</h2>
	<div class="checkboobmain">
		<input type="radio" name="user_gender" required="" value="1"> 
		<label>Male</label>
		
		<input type="radio" name="user_gender" required="" value="2"> 
		<label>Female</label>
		
		<input type="radio" name="user_gender" required="" value="3"> 
		<label>Genderless</label>
	</div>
    <div class="clearfix"></div>	
	
	<h2>Write your password</h2>
	<input name="password" type="password" placeholder="Please write a password" class="password">
	
	<h2>Write confirm password</h2> 
	<input name="cpassword" type="password" placeholder="Please write your password again" class="password">
	
	<!-- 
	<h2>Write your secret question, This will help you to recover password</p> 
	<input name="secret_question" type="text" placeholder="Please write personal security question" class="password">
	
	<h2>Write answer to your secret question</h2> 
	<input name="secret_question_answer" type="password" placeholder="Please write a personal security question answer"	class="password">
	 -->
	 
	<h2>Would you like to receive suggestions from our 3rd party partners to aid you become the one you desire to become? </h2>
	<div class="checkboobmain">
		<input type="radio" name="suggestion_required" required="" value="1"> 
		<label>Yes</label>
		
		<input type="radio" name="suggestion_required" required="" value="0" checked> 
		<label>No</label>
	</div>
    <div class="clearfix"></div>
    
	<div class="checkboobmain">
		<input type="checkbox" id="age-flag" name="age-flag" required /> <label>I
			agree I'm 18 years old</label><br /> 
		
		<input type="checkbox"
			id="terms-flag" name="terms-flag" required /> <label>I accept all
			terms of <a data-toggle="modal" data-target="#myModal">TOUS</a>
		</label>
	</div>	 
	
	<div class="field buttons">
		<label class="main">&nbsp;</label>
		<button type="button" name="confirm-user-registration" class="submit">Submit</button>
	</div>
</form>
</div>


<!--  TOUS Modal Starts Here -->

<div id="myModal" class="modal fade tous-modal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">TOUS</h4>
			</div>
			<div class="modal-body">
				<p><?php echo $tandc;?></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>

<!--  TOUS Modal Ends Here -->

<script>
/* 
 * Ajax validation for avatar name
 */
$('input[type="text"][name="avatar_name"]').on('keyup blur', function(){

	var field = $(this);
	var url = BASE_URL+'/ajax';
	
	var payload = {'avatar_name':$(this).val()};
	 
	var data = {'acid':101, payload:JSON.stringify(payload)};
	AjaxCommon.startAjaxRequest(url, data).done(function(response){

		MessageHelper.hideMessage(); 
		 
		if(response.flag == 0)
		{
			$('form').prepend(MessageHelper.showMessage('error', response.message));
			field.focus();
			return false;
		}
			
	});
});

/*
 * Password and confirm password validation
 */

 $('input[type="password"][name="password"], input[type="password"][name="cpassword"]').on('keyup', function(){

 	MessageHelper.hideMessage();	
	var password = $('input[type="password"][name="password"]').val();
	var cpassword = $('input[type="password"][name="cpassword"]').val();
	
	if(password !='' && cpassword !='' && password != cpassword)
	{
		$('form').prepend(MessageHelper.showMessage('error', "Password and confirm password does not match"));
		return false;
	}
	if(password !='' && cpassword !='' && password == cpassword)
	{
		MessageHelper.hideMessage();
	}
 });

$('#register_form').children().on('keyup', function(k, v){
	/* Removed this form condition && $(v).attr('name') != 'recommendor'*/
	if($(v).val() == '')
	{
		MessageHelper.hideMessage();     
	}
	
});

$(document).on('click', 'button[type="button"][name="confirm-user-registration"]', function(e){
    flag = true;

	e.preventDefault();
	
	MessageHelper.hideMessage();
	
	/* First step is to check is age is validated */
	
	if(!$('input[type="checkbox"][name="age-flag"]').is(':checked'))
	{
		$('#register_form').prepend(MessageHelper.showMessage('error', "Please confirm you age first"));
		return false;
	}

	if(!$('input[type="checkbox"][name="terms-flag"]').is(':checked'))
	{
		$('#register_form').prepend(MessageHelper.showMessage('error', "Please check terms and condition first"));
		return false;
	}

	if(!$('input[type="radio"][name="user_gender"]').is(':checked'))
	{
		$('#register_form').prepend(MessageHelper.showMessage('error', "Please select gender first"));
		return false;
	}
	
	
	/*
	 * Check if error exists, then prevent form submit and force user to correct details
	 */ 
 
	$('#register_form').children('input[type="text"], input[type="password"], select').each(function(k, v){
		if($(v).val() == '' && $(v).attr('name') != 'recommendor' && $(v).attr('name') != 'fakeusernameremembered' && $(v).attr('name') != 'fakepasswordremembered')
		{
			
			//$('#register_form').prepend(MessageHelper.showMessage('error', "Please provide required fields"));
			flag = false;  
// 			return false;
		}
		console.log($(v).attr('name')+'=>'+$(v).val());
		
	});

	if(!flag)
    {
    	$('#register_form').prepend(MessageHelper.showMessage('error', "Please check the errors first"));
		return false;
    }

	$('#register_form').submit(); 		
	
});

</script>