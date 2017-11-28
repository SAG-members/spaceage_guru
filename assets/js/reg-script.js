/**
 * Registration Script 
 */

$(function(e){
	
	/*
	 * Initialize ideal form functionality
	 * helps in step by step form processing 
	 */
	
//	disableNextButton(e);
	
	$('form.idealforms').idealforms({
		onSubmit : function(invalid, e) 
		{
			e.preventDefault();
						
			$('#invalid')
			.show()
			.toggleClass('valid', !invalid)
			.text(invalid ? (invalid + ' invalid fields') : '');
						
			console.log($('form.idealforms').serialize())	;
		}
	});
	
	$('.prev').click(function(e) {
		$('.prev').show();
		$('form.idealforms').idealforms('prevStep');
		
		processRegistration(e);
	});

	$('.next').click(function(e) {
		
		if(processRegistration(e))
		{
			$('.next').show();			    
			$('form.idealforms').idealforms('nextStep');
		}
				
	});
	
	/* Fire Event on change of country select box */
	
	$('select[name="country"]').on('change', function(){Util.hideRegistrationError()});
	
		
	// Fire event on submit
	$('button[type="submit"][name="confirm-user-registration"]').on('click', registerUser);
	
	/* IdealForms Navigation*/
	
	$('.idealsteps-nav ul').addClass('pagination');
	$('.idealsteps-nav ul li').find('span').remove();
	
	$('.idealsteps-nav ul li').each(function(){
		var str = $(this).children('a').html();
		var string = str.replace('Step',''); 
		$(this).children('a').html(string);
	});
	
//	$('.idealsteps-nav ul li').children()
//	var str = $('.idealsteps-nav ul li').find('a').html();
//	var string = str.replace('Step',''); console.log(string);
//	$('.idealsteps-nav ul li').find('a').html(string);
	
	// Validate Coupon Code During Registration
	
	$('input[type="text"][name="recommendor"]').on('blur', validateCouponCode);
});

var reg = {};

var register = [];

function disableNextButton(e)
{
	if($('.idealsteps-container').length > 0) $('.idealsteps-container').find('.next').attr('disabled', 'disabled');
}

Util = 
{
		showRegistrationError : function(message)
		{
			$('.regisrtation-error-messages').show();
			$('.regisrtation-error-messages').html(message);
		},
		hideRegistrationError : function()
		{
			$('.regisrtation-error-messages').hide();
		}
}




function processRegistration(e)
{
	var registration = [];
	
	
	controller = $(e.currentTarget); 
	var divID = controller.parents('.idealsteps-step').attr('id');
		
	switch (divID) 
	{
		case 'step-1': 
			
			var country = controller.parents('.idealsteps-step').find('select[name="country"]').val();
			var recommendor = controller.parents('.idealsteps-step').find('input[type="text"][name="recommendor"]').val();
			var ageFlag = controller.parents('.idealsteps-step').find('input[type="checkbox"][name="age-flag"]:checked').val();
			var tcFlag = controller.parents('.idealsteps-step').find('input[type="checkbox"][name="terms-flag"]:checked').val();
			
			
			/* Validate if values as per requirement */ 
			
			if(country == 0){Util.showRegistrationError("Please Select Country First"); return false;}
			if(typeof ageFlag === 'undefined' || !ageFlag){Util.showRegistrationError("Please confirm your age"); return false;}
			if(typeof tcFlag === 'undefined' || !tcFlag){Util.showRegistrationError("Please accept the terms and conditions"); return false;}
								
			reg['recommendor'] = controller.parents('.idealsteps-step').find('input[type="text"][name="recommendor"]').val();
			reg['country'] = controller.parents('.idealsteps-step').find('select[name="country"]').val();
			reg['age'] = controller.parents('.idealsteps-step').find('input[type="checkbox"][name="age-flag"]').val();	
			registration.push(reg);
			

			Util.hideRegistrationError();
			return true;
			
		break;
		case 'step-2': 
			var checked = '';
			$('input[type="checkbox"][name="question1"]').each(function(k,v){
				if($(v).is(':checked'))
				{
					checked +=$(this).val()+',';				
				}
			})
			
			if(checked === ""){Util.showRegistrationError("Please select at least one option"); return false;}
			

			reg['q1'] = removeLastComma(checked);
			registration.push(reg);
			
			Util.hideRegistrationError();
			return true;
						
		break;
		case 'step-3':
			reg['q2'] = $('textarea[name="question2"]').val();
			reg['q3'] = $('textarea[name="question3"]').val();
											
			var headingq4 = $('input[type="hidden"][name="hidden-question-4"]').val();
			$('#heading_q_4').html('4. '+headingq4.replace('Criteria', $('textarea[name="question3"]').val()));
			
			if(reg['q2'] === "" || reg['q3'] === ""){Util.showRegistrationError("Please answer the questions first"); return false;}
						
			registration.push(reg);
			
			Util.hideRegistrationError();
			return true;
			
		break;
		case 'step-4': 
						
			reg['q4'] = $('textarea[name="question4"]').val();
			reg['q5'] = $('textarea[name="question5"]').val();
			
			var headingq12 = $('input[type="hidden"][name="hidden-question-12"]').val();
			$('#heading_q_12').html('12. '+headingq12.replace('Criteria', reg['q5']));
			
			var headingq13 = $('input[type="hidden"][name="hidden-question-13"]').val();
			$('#heading_q_13').html('13. '+headingq13.replace('Criteria', reg['q5']));
			
			if(reg['q4'] === "" || reg['q5'] === ""){Util.showRegistrationError("Please answer the questions first"); return false;}			
			
			registration.push(reg);
			
			Util.hideRegistrationError();
			return true;
			
		break;
		case 'step-5': 
			var checked = '';
			$('input[type="checkbox"][name="question6"]').each(function(k,v){
				if($(v).is(':checked'))
				{
					checked +=$(this).val()+',';				
				}
			})
			reg['q6'] = removeLastComma(checked);
			reg['q7'] = $('textarea[name="question7"]').val();
			
			if(reg['q6'] === "" || reg['q7'] === ""){Util.showRegistrationError("Please answer the questions first"); return false;}
			
			registration.push(reg);
			
			Util.hideRegistrationError();
			return true;
			
		break;
		case 'step-6': 
			var checked = '';
			$('input[type="checkbox"][name="question8"]').each(function(k,v){
				if($(v).is(':checked'))
				{
					checked +=$(this).val()+',';				
				}
			})
			reg['q8'] = removeLastComma(checked);
			
			var checked = '';
			$('input[type="radio"][name="question9"]').each(function(k,v){
				if($(v).is(':checked'))
				{
					checked +=$(this).val()+',';				
				}
			})
			reg['q9'] = removeLastComma(checked);
			
			if(reg['q8'] === "" || reg['q9'] === ""){Util.showRegistrationError("Please answer the questions first"); return false;}
			
			registration.push(reg);
			
			Util.hideRegistrationError();
			return true;
			
		break;
		case 'step-7': 
			reg['q10'] = $('textarea[name="question10"]').val();
			reg['q11'] = $('textarea[name="question11"]').val();
			
			if(reg['q10'] === "" || reg['q11'] === ""){Util.showRegistrationError("Please answer the questions first"); return false;}
			
			registration.push(reg);
			
			Util.hideRegistrationError();
			return true;
						
		break;
		case 'step-8': 
						
			var checked = '';
			$('input[type="checkbox"][name="question12"]').each(function(k,v){
				if($(v).is(':checked'))
				{
					checked +=$(this).val()+',';				
				}
			})
			reg['q12'] = removeLastComma(checked);
			
			var checked = '';
			$('input[type="checkbox"][name="question13"]').each(function(k,v){
				if($(v).is(':checked'))
				{
					checked +=$(this).val()+',';				
				}
			})
			reg['q13'] = removeLastComma(checked);
			
			if(reg['q12'] === "" || reg['q13'] === ""){Util.showRegistrationError("Please answer the questions first"); return false;}
			
			registration.push(reg);
			
			Util.hideRegistrationError();
			return true;
			
		break;
		case 'step-9': 
			var checked = '';
			$('input[type="radio"][name="question14"]').each(function(k,v){
				if($(v).is(':checked'))
				{
					checked +=$(this).val()+',';				
				}
			})
			reg['q14'] = removeLastComma(checked);
			
			var checked = '';
			$('input[type="radio"][name="question15"]').each(function(k,v){
				if($(v).is(':checked'))
				{
					checked +=$(this).val()+',';				
				}
			})
			reg['q15'] = removeLastComma(checked);
			registration.push(reg);
			
			if(reg['q14'] === "" || reg['q15'] === ""){Util.showRegistrationError("Please answer the questions first"); return false;}
			
			registration.push(reg);
			
			Util.hideRegistrationError();
			return true;
			
		break;
		case 'step-10': 
			
			var checked = '';
			$('input[type="checkbox"][name="question16"]').each(function(k,v){
				if($(v).is(':checked'))
				{
					checked +=$(this).val()+',';				
				}
			})
			reg['q16'] = removeLastComma(checked);
			
			var checked = '';
			$('input[type="checkbox"][name="question17"]').each(function(k,v){
				if($(v).is(':checked'))
				{
					if($(this).val() == 'a')
					{
						checked += $('input[type="text"][name="question17a"]').val() + ',';
					}
					if($(this).val() == 'd')
					{
						checked += $('input[type="text"][name="question17d"]').val() + ',';
					}
					
					checked +=$(this).val()+',';
				}
			})
			reg['q17'] = removeLastComma(checked);
			
			if(reg['q16'] === "" || reg['q17'] === ""){Util.showRegistrationError("Please answer the questions first"); return false;}
			
			registration.push(reg);
			autoGeneratedEmailId();
			
			Util.hideRegistrationError();
			return true;
			
		break;
	}
	
	register = registration;
	
	console.log(JSON.stringify(register));
}

function autoGeneratedEmailId()
{
	$.ajax({
		url:BASE_URL+'public/api',
		data:{acid:10001},
		type:'post', 
		dataType : 'JSON',
		success:function(data)
		{
			$('input[type="hidden"][name="user-email"]').val(data.email);
			$('.user-email').html(data.email);
			$('input[type="text"][name="user-email-txt"]').val(data.email);
		}
	});
}

function registerUser()
{
	console.log('reaching here');
	var registration = [];
	
	reg['email'] = $('input[type="hidden"][name="user-email"]').val();
	reg['password'] = $('input[type="password"][name="txt-password"]').val();
	reg['cpassword'] = $('input[type="password"][name="txt-cpassword"]').val();
	reg['secret_question'] = $('input[type="text"][name="secret-question"]').val();
	reg['secret_question_answer'] = $('input[type="text"][name="secret-question-answer"]').val();
	
	if(reg['password'] != reg['cpassword']){Util.showRegistrationError("Password and confirm password does not match"); return false;}
	
	if(reg['password'] === ""){Util.showRegistrationError("Please input password first"); return false;}
	
	if(reg['cpassword'] === ""){Util.showRegistrationError("Please input confirm password first"); return false;}
	
	if(reg['secret_question'] === ""){Util.showRegistrationError("Please input secret question to be used in case you forgot your password"); return false;}
	
	if(reg['secret_question_answer'] === ""){Util.showRegistrationError("Please input secret question answer to be used in case you forgot your password"); return false;}
	
	Util.hideRegistrationError();
	
	registration.push(reg);
	register = registration;
	
	$('input[type="hidden"][name="registration-info"]').val(JSON.stringify(register));
	
	console.log(JSON.stringify(register));
	
	var newForm = jQuery('<form>', {
        'action': BASE_URL + 'signup',
        'target': '_top',
        'method':'post'	
    }).append(jQuery('<input>', {
        'name': 'registration-info',
        'type': 'hidden',
        'value': JSON.stringify(register),
    }));

	newForm.appendTo("body").submit(); 
}

function removeLastComma(str)
{
	str = str.replace(/,\s*$/, "");
	return str;
}

function validateCouponCode(e)
{
	var payload = {coupon:$(this).val()};
	console.log(e.currentTarget);
	// Ajax Request Here
	
	$.ajax({
		url:BASE_URL+'public/api',
		data:{acid:10011,payload:JSON.stringify(payload)},
		type:'post', 
		dataType : 'JSON',
		success:function(data)
		{
			$('.coupon-msg').remove();
			if(data.flag==0){msg = data.message ; divclass = "alert-danger"}
			else { msg = data.message; divclass = "alert-success"; }
			
			$(e.currentTarget).after('<div class="alert '+divclass+' coupon-msg"></div>');
			$('.coupon-msg').html(msg);
		}
	});
}

