$.fn.serializeObject = function () {
	var o = {};
    var a = this.serializeArray();
    $.each(a, function () 
    {
         if (o[this.name] !== undefined) {
             if (!o[this.name].push) {
                 o[this.name] = [o[this.name]];
             }
             o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
         }
    });
    return o;
};

$(function(e) 
{	
	
	/*User questionnaire update*/
		
	$('button[type="button"][name="confirm-user-questionnaire-update"]').on('click', updateUserQuestionnaire);
	
	/* User update rpq */
	
	$('button[type="button"][name="confirm-user-rpq_questionnaire-update"]').on('click', updateRPQQuestionnaire);
	
	/* User update wpq */
	
	$('button[type="button"][name="confirm-user-wpq_questionnaire-update"]').on('click', updateWPQQuestionnaire);
	
	
	/* Disable Success Message */
	
	setTimeout(function() {$(".message").hide()}, 5000);
		
	$('input[type="button"][name="btn-pay"]').on('click', initiatePayment);
	
	$('input[type="button"][name="btn-pay-remainder-service"]').on('click', initiateRemainderServicePayment);
	
	
	// Enable Classy Editor
	$(".classy-editor").ClassyEdit();
	
	// Menu Active
	var current = location.pathname;
	
	$(".nav li a").each(function() 
	{
		var $this = $(this);
        // if the current path is like this link, make it active
        if($this.attr('href')){
	        	if($this.attr('href').indexOf(current) !== -1){
	        	$this.parents('li').addClass('active');	
        	}
        }
        
        if(current == '/spaceage_guru/'){$(this).parents('li').removeClass('active');}
        
	});
		
	// Enable WIKI Search
	
	$('input[type="text"][name="wiki-search"]').on('keyup', getWikiSearchResult);
	$('button[type="button"][name="btn-wiki-search"]').on('click', getWikiSearchResult);
	
	// Activate Rss-Feed List Popup
	$('input[type="checkbox"][name="onoffswitch"]').on('click', showRssFeedListPopup)
	
	$('button[type="button"][name="btn-confirm-subscription"]').on('click', confrimRssSubscription);
	
	// Reset Password
	$('button[type="button"][name="btn-recover-password"]').on('click', recoverPassword);
	
	// Upload Membership Logo
	$('#profile-avtar').on('change', imageUpload);
	
	// Change Password
	$('button[type="button"][name="btn-change-password"]').on('click', changePassword);
	
	// Remove Error on Change Password Page
	
	$('input[type="password"][name="password"]').on('keyup', hidePasswordError);
	$('input[type="password"][name="cpassword"]').on('keyup', hidePasswordError);
	
	// Unsubscribe Feed List
	$('input[type="checkbox"][name="unsubscribe-feed-list"]').on('click', confirmRssUnsubscribe);
	
	// Validate Coupon Code
	$('input[type="text"][name="coupon"]').on('blur', validateCouponStatus);
	
	// Invite new user
	$('button[type="button"][name="btn-invite-user"]').on('click', sendInvitationToJoin);
	
	$('input[type="text"][name="user-email"]').on('keyup', function(){
		$('.coupon-msg').remove();
	});
	
	$('input[type="text"][name="coupon"]').on('keyup', function(){
		$('.coupon-msg').remove();
	});
	
	countryIds = [];
	$('button[type="button"][name="btn-add-country"]').on('click', function(){
		if($('input[type="text"][name="country"]').val() != '')
		{
			var country = $('input[type="text"][name="country"]').val();
					
			var option = $('#country-list').find('option').filter(function(){ 
				return $.trim( $(this).val() ) === country; 
			});
		}
		
		var id = option.attr('data-id');
		
		countryIds.push(id);		
		
		var newcountry = $('<div class="country-label"><a class="remove-country" data-id="'+id+'"><i class="fa fa-times" aria-hidden="true"></i></a>'+country+'</div>');
		
		$('input[type="hidden"][name="hidden-country-ids"]').val(countryIds);
		$('.countries-label').append(newcountry);
		
		$('input[type="text"][name="country"]').val('');
	});
	
	$(document).on('click', '.remove-country', function(e){
		countryIds = $('input[type="hidden"][name="hidden-country-ids"]').val().split(",");
		
		var dataId = $(this).data('id');
				
		countryIds = jQuery.grep(countryIds, function(value) {
		  return value != dataId;
		});
		
		$(this).parent('.country-label').remove();
		
		$('input[type="hidden"][name="hidden-country-ids"]').val(countryIds);
		
		
	});
	
	
	
	
});

function removeLastComma(str)
{
	str = str.replace(/,\s*$/, "");
	return str;
}



function updateUserQuestionnaire()
{	
	register = [];
	reg = {};
	
//	reg['country'] = $('select[name="country1"]').val();
//	console.log(reg['country']);
	var checked="";
	$('input[type="checkbox"][name="question1"]').each(function(k,v){
		if($(v).is(':checked'))
		{
			checked +=$(this).val()+',';				
		}
	});
	
	reg['q1'] = removeLastComma(checked);
	reg['q2'] = $('textarea[name="question2"]').val();
	reg['q3'] = $('textarea[name="question3"]').val();
	
	var headingq4 = $('input[type="hidden"][name="hidden-question-4"]').val();
	$('#heading_q_4').html('4. '+headingq4.replace('Criteria', $('textarea[name="question3"]').val()));
	
	reg['q4'] = $('textarea[name="question4"]').val();
	reg['q5'] = $('textarea[name="question5"]').val();
	
	var headingq12 = $('input[type="hidden"][name="hidden-question-12"]').val();
	$('#heading_q_12').html('12. '+headingq12.replace('Criteria', reg['q5']));
	
	var headingq13 = $('input[type="hidden"][name="hidden-question-13"]').val();
	$('#heading_q_13').html('13. '+headingq13.replace('Criteria', reg['q5']));
	
	var checked = '';
	$('input[type="checkbox"][name="question6"]').each(function(k,v){
		if($(v).is(':checked'))
		{
			checked +=$(this).val()+',';				
		}
	})
	reg['q6'] = removeLastComma(checked);
	
	reg['q7'] = $('textarea[name="question7"]').val();
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
	
	reg['q10'] = $('textarea[name="question10"]').val();
	reg['q11'] = $('textarea[name="question11"]').val();
	
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
			checked +=$(this).val()+',';
		}
	});
	
	checked += $('input[type="text"][name="question17a"]').val() ? $('input[type="text"][name="question17a"]').val() : 0;
	checked += ',';
	checked += $('input[type="text"][name="question17d"]').val() ? $('input[type="text"][name="question17d"]').val() : 0 +',';
	
	reg['q17'] = removeLastComma(checked);
	
	
	register.push(reg);
	
	$('input[type="hidden"][name="registration-info"]').val(JSON.stringify(register));
	
//	console.log(JSON.stringify(register));
	var newForm = jQuery('<form>', {
        'action': BASE_URL + 'profile/update-questionnaire',
        'target': '_top',
        'method':'post'	
    }).append(jQuery('<input>', {
        'name': 'registration-info',
        'type': 'hidden',
        'value': JSON.stringify(register),
    }));
	
//	console.log(JSON.stringify(register));
	newForm.appendTo("body").submit();
}


function updateRPQQuestionnaire()
{	
	register = [];
	reg = {};
	
	var checked="";
	$('input[type="checkbox"][name="rpq_question1"]').each(function(k,v){
		if($(v).is(':checked'))
		{
			checked +=$(this).val()+',';				
		}
	});
	
	reg['q1'] = removeLastComma(checked);
	reg['q2'] = $('textarea[name="rpq_question2"]').val();
	reg['q3'] = $('textarea[name="rpq_question3"]').val();
	reg['q4'] = $('textarea[name="rpq_question4"]').val();
	reg['q5'] = $('textarea[name="rpq_question5"]').val();
	
	var checked="";
	$('input[type="checkbox"][name="rpq_question6"]').each(function(k,v){
		if($(v).is(':checked'))
		{
			checked +=$(this).val()+',';				
		}
	});
	
	reg['q6'] = removeLastComma(checked);
	
	var checked="";
	$('input[type="checkbox"][name="rpq_question7"]').each(function(k,v){
		if($(v).is(':checked'))
		{
			checked +=$(this).val()+',';				
		}
	});
	
	reg['q7'] = removeLastComma(checked);
	reg['q8'] = $('input[type="radio"][name="rpq_question8"]').val();
	reg['q9'] = $('textarea[name="rpq_question9"]').val();
	reg['q10'] = $('textarea[name="rpq_question10"]').val();
	
	var checked="";
	$('input[type="checkbox"][name="rpq_question11"]').each(function(k,v){
		if($(v).is(':checked'))
		{
			checked +=$(this).val()+',';				
		}
	});
	
	reg['q11'] = removeLastComma(checked);
	
	var checked="";
	$('input[type="checkbox"][name="rpq_question12"]').each(function(k,v){
		if($(v).is(':checked'))
		{
			checked +=$(this).val()+',';				
		}
	});
	
	reg['q12'] = removeLastComma(checked);
	
	reg['q13'] = $('input[type="radio"][name="rpq_question13"]').val();
	reg['q14'] = $('input[type="radio"][name="rpq_question14"]').val();
	
	var checked="";
	$('input[type="checkbox"][name="rpq_question15"]').each(function(k,v){
		if($(v).is(':checked'))
		{
			checked +=$(this).val()+',';				
		}
	});
	
	reg['q15'] = removeLastComma(checked);
	
	var checked = '';
	$('input[type="checkbox"][name="rpq_question16"]').each(function(k,v){
		if($(v).is(':checked'))
		{
			checked +=$(this).val()+',';
		}
	});
	
	checked += $('input[type="text"][name="rpq_question16a"]').val() ? $('input[type="text"][name="rpq_question16a"]').val() : 0;
	checked += ',';
	checked += $('input[type="text"][name="rpq_question16d"]').val() ? $('input[type="text"][name="rpq_question16d"]').val() : 0 +',';
	
	reg['q16'] = removeLastComma(checked);
	
	
	register.push(reg);
	
	
	
	
	var newForm = jQuery('<form>', {
        'action': BASE_URL + 'profile/update-rpq', 
        'target': '_top',
        'method':'post'	
    }).append(jQuery('<input>', {
        'name': 'registration-info',
        'type': 'hidden',
        'value': JSON.stringify(register),
    }));
		
	newForm.appendTo("body").submit();
}




function updateWPQQuestionnaire()
{	
	register = [];
	reg = {};
	var checked="";
	$('input[type="checkbox"][name="wpq_question1"]').each(function(k,v){
		if($(v).is(':checked'))
		{
			checked +=$(this).val()+',';				
		}
	});
	
	reg['q1'] = removeLastComma(checked);
	reg['q2'] = $('textarea[name="wpq_question2"]').val();
	reg['q3'] = $('textarea[name="wpq_question3"]').val();
	reg['q4'] = $('textarea[name="wpq_question4"]').val();
	reg['q5'] = $('textarea[name="wpq_question5"]').val();
	
	var checked="";
	$('input[type="checkbox"][name="wpq_question6"]').each(function(k,v){
		if($(v).is(':checked'))
		{
			checked +=$(this).val()+',';				
		}
	});
	
	reg['q6'] = removeLastComma(checked);
	
	var checked="";
	$('input[type="checkbox"][name="wpq_question7"]').each(function(k,v){
		if($(v).is(':checked'))
		{
			checked +=$(this).val()+',';				
		}
	});
	
	reg['q7'] = removeLastComma(checked);
	var checked="";
	$('input[type="radio"][name="wpq_question8"]').each(function(k,v){
		if($(v).is(':checked'))
		{
			checked +=$(this).val()+',';				
		}
	});
	reg['q8'] = checked;
	reg['q9'] = $('textarea[name="wpq_question9"]').val();
	reg['q10'] = $('textarea[name="wpq_question10"]').val();
	
	var checked="";
	$('input[type="checkbox"][name="wpq_question11"]').each(function(k,v){
		if($(v).is(':checked'))
		{
			checked +=$(this).val()+',';				
		}
	});
	
	reg['q11'] = removeLastComma(checked);
	
	var checked="";
	$('input[type="checkbox"][name="wpq_question12"]').each(function(k,v){
		if($(v).is(':checked'))
		{
			checked +=$(this).val()+',';				
		}
	});
	
	reg['q12'] = removeLastComma(checked);
	
	reg['q13'] = $('input[type="radio"][name="wpq_question13"]').val();
	reg['q14'] = $('input[type="radio"][name="wpq_question14"]').val();
	
	var checked="";
	$('input[type="checkbox"][name="wpq_question15"]').each(function(k,v){
		if($(v).is(':checked'))
		{
			checked +=$(this).val()+',';				
		}
	});
	
	reg['q15'] = removeLastComma(checked);
	
	var checked = '';
	$('input[type="checkbox"][name="wpq_question16"]').each(function(k,v){
		if($(v).is(':checked'))
		{
			checked +=$(this).val()+',';
		}
	});
	
	checked += $('input[type="text"][name="wpq_question16a"]').val() ? $('input[type="text"][name="wpq_question16a"]').val() : 0;
	checked += ',';
	checked += $('input[type="text"][name="wpq_question16d"]').val() ? $('input[type="text"][name="wpq_question16d"]').val() : 0 +',';
	
	reg['q16'] = removeLastComma(checked);
		
	register.push(reg);
	console.log(JSON.stringify(register));	
	var newForm = jQuery('<form>', {
        'action': BASE_URL + 'profile/update-wpq', 
        'target': '_top',
        'method':'post'	
    }).append(jQuery('<input>', {
        'name': 'registration-info',
        'type': 'hidden',
        'value': JSON.stringify(register),
    }));
		
	newForm.appendTo("body").submit();
}




function initiatePayment(e)
{
	var paymentType = $(e.currentTarget).data('button');
	
	inputArr = []; 
	input = {};		
	$('input[type="hidden"]').each(function(){
		input[$(this).attr('name')] = $(this).val();
	});
	
	input['subscription-type'] = $('input[type="radio"][name="subscription-type"]:checked').val();
	
	inputArr.push(input);
		
	var newForm = jQuery('<form>', {
        'action': BASE_URL + 'pay',
        'target': '_top',
        'method':'post'	
    }).append(jQuery('<input>', {
        'name': 'inputs',
        'type': 'hidden',
        'value': JSON.stringify(inputArr),
    })).append(jQuery('<input>', {
        'name': 'redirect-url',
        'type': 'hidden',
        'value': window.location.pathname,
    })).append(jQuery('<input>',{
    	'name': 'payment-method',
        'type': 'hidden',
        'value': paymentType,
    }));
	
	newForm.appendTo('body').submit();
	
}
 

function initiateRemainderServicePayment()
{
	inputArr = []; 
	input = {};		
	$('input[type="hidden"]').each(function(){
		input[$(this).attr('name')] = $(this).val();
	});
	inputArr.push(input);
	
	var newForm = jQuery('<form>', {
        'action': BASE_URL + 'remainder-service/payment',
        'target': '_top',
        'method':'post'	
    }).append(jQuery('<input>', {
        'name': 'inputs',
        'type': 'hidden',
        'value': JSON.stringify(inputArr),
    }));
	
	newForm.appendTo('body').submit();
}

function getWikiSearchResult(e)
{
	var searchKey = $('input[type="text"][name="wiki-search"]').val();
	var categories = []; var tags = '';
		
	var payload = {'search': searchKey}; 
	
	
	/* Before sending the search request we will check if advance search is active
	 * If active, then we will add those parameters to the search to make it more generic
	 */
	
	if($('.library_advance_search').is(':visible'))
	{
		$('.library_advance_search input[type="checkbox"][name="data_type[]"]').each(function(e){
			
			if($(this).is(':checked'))
			{
				categories.push($(this).val());
				categories.join();
			}
			
			payload['categories'] = categories;
		});
		
		if($('input[type="text"][name="tags"]').val() != '')
		{
			tags = $('input[type="text"][name="tags"]').val();
			
			payload['tags'] = tags;
		}
	}
		
	if(searchKey == '') return false;
	$.ajax({
		url:BASE_URL+'ajax', 
		data:{acid:1100,payload:JSON.stringify(payload)},
		type:'post', 
		dataType : 'JSON',
		beforeSend : function()
		{
			$('.content').html('<div class="spinner"><i class="fa fa-spinner fa-spin fa-4x" aria-hidden="true"></i></div>');
		},
		success:function(data)
		{
			var html = '';
			if((data.result).length > 0) 
			{
				html += '<table class="table table-bordered">';
				html +='<caption><h2>Data List</h2></caption>';
				html +='<thead>';
					html +='<tr>';
						html +='<td>Data</td>';
						html +='<td>Description</td>';
					html +='<tr>';	
				html +='</thead>';	
				html +='<tbody>';
					
				$(data.result).each(function(k,v){
					var regex = /(<([^>]+)>)/ig
					// Check Description Length
//						var result = body.replace(regex, "");
					description = v.page_description.replace(regex,"");
					if(description.length > 100) {description = description.substring(0,100);};
					html +='<tr>';
						html +='<td><a href="'+BASE_URL+'user/data/'+v.page_slug+'">'+v.page_title+'</a></td>';
						html +='<td>'+description+'</td>';
					html +='</tr>';
				});
				
				html +='</tbody>';
				html +='</table>';
			
				html +='<div class="blogmain"></div>';	
			}
									
			$('.content').html(html);	
		}
	});

}

function showRssFeedListPopup(e)
{
	/* Fire ajax request to check if already subscribed*/
	
	
	var payload = {'item-number':$(this).data('id')};
	
	$.ajax({
		url:BASE_URL+'ajax',
		data:{acid:1500,payload:JSON.stringify(payload)},
		type:'post', 
		dataType : 'JSON',
		success:function(response)
		{
			if(response.flag == 0){
				$().toastmessage('showSuccessToast', response.message);
				return false;
			}
			else
			{
				if($(e.currentTarget).is(':checked'))
				{
					$('#manage_rss_feed_modal').modal('show');
				}
			}
		}
	});
	
}

function confrimRssSubscription(e)
{
	var itemId = $('input[type="hidden"][name="item-id"]').val();
	var itemType = $('input[type="hidden"][name="item-type"]').val();
		
	var newForm = jQuery('<form>', {
        'action': BASE_URL + 'rss-feed/subscribe',
        'target': '_top',
        'method':'post'	
    }).append(jQuery('<input>', {
        'name': 'item-id',
        'type': 'hidden',
        'value': itemId,
    })).append(jQuery('<input>', {
        'name': 'item-type',
        'type': 'hidden',
        'value': itemType,
    })).append(jQuery('<input>', {
        'name': 'referrer',
        'type': 'hidden',
        'value': window.location.pathname,
    }));
	
	newForm.appendTo('body').submit();
}

function confirmRssUnsubscribe(e)
{
	if($(e.currentTarget).is(':checked'))
	{
		result = confirm("Are you sure, you want to unsubscribe ?");
		
		if(result)
		{
			var id = $(this).data('id');
			
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'rss-feed/unsubscribe',
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'id',
		        'type': 'hidden',
		        'value': id,
		    }));
			
			newForm.appendTo('body').submit();
		}
		else
		{
			$(e.currentTarget).prop('checked', false);
		}

	}
	else
	{
		console.log("Not Checked");
	}
}

function recoverPassword(e)
{
	var email = $(e.currentTarget).parents('#recoverform').find('input[type="email"][name="recover-email-address"]').val();console.log(email);
	if(email == '') 
	{
		$('.popup-message-box').html('<div class="alert alert-danger">Please enter email first</div>');
		return false;
	}
	
	if(!isValidEmailAddress(email))
	{
		$('.popup-message-box').html('<div class="alert alert-danger">Invalid email id</div>');
		return false;
	}
	$('.popup-message-box').html('');
	
	var payload = {email:email};
	// Ajax Request Here
	$.ajax({
		url:BASE_URL+'public/api',
		data:{acid:10009,payload:JSON.stringify(payload)},
		type:'post', 
		dataType : 'JSON',
		success:function(data)
		{
			if(data.flag==0){$('.popup-message-box').html('<div class="alert alert-danger">'+data.message+'</div>');}
			else 
			{
				$('input[type="email"][name="recover-email-address"]').val(' ');
				$('.popup-message-box').html('<div class="alert alert-success">'+data.message+'</div>');
			}
		}
	});

}

function validateFeedback(e)
{
	console.log(e);
//	alert("Hello");
	return false;
}

function isValidEmailAddress(email) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(email);
};

function imageUpload()
{
	console.log($(this)[0].files);
	console.log("Hello");
	var countFiles = $(this)[0].files.length;
	var img; var imgPath = $(this)[0].value;
	var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
	var image_holder = $(".avtar-image-box");
	img = jQuery('<a href="javascript:void(0);" class="delete-thumb"><i class="fa fa-times" aria-hidden="true"></i></a>');
//	image_holder.empty();

	if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") 
	{
		if (typeof (FileReader) != "undefined") 
		{
			for (var i = 0; i < countFiles; i++) 
			{
				var reader = new FileReader();
				reader.onload = function (e) 
				{
					$("<img />", { "src": e.target.result, "class": "thumbimage"}).appendTo(image_holder);
					jQuery('.avtar-image-box').append(img);
				}
				image_holder.show();
				reader.readAsDataURL($(this)[0].files[i]);
			}
		} 
		else 
		{
			alert("It doesn't supports");
		}
	} 
	else 
	{
		alert("Select Only images");
	}
}


function changePassword(e) 
{
	$('.error-change-password').hide();
	
	var password = $('input[type="password"][name="password"]').val();
	var cpassword = $('input[type="password"][name="cpassword"]').val();
	var userId = $('input[type="hidden"][name="user-id"]').val();
	
	if(password == "" || cpassword == "")
	{
		$('.error-change-password').show();
		$('.error-change-password').html('<strong>Please enter password first</strong>');
		return false;
	}
	
	if(password != cpassword)
	{
		$('.error-change-password').show();
		$('.error-change-password').html('<strong>Password and confirm password do not match</strong>');
		return false;
	}
	
	
	/* Since Both the passwords are equal send this to change password controller*/
	
	var newForm = jQuery('<form>', {
        'action': BASE_URL + 'change-password',
        'target': '_top',
        'method':'post'	
    }).append(jQuery('<input>', {
        'name': 'redirect-url',
        'type': 'hidden',
        'value': location.pathname,
    })).append(jQuery('<input>', {
        'name': 'password',
        'type': 'hidden',
        'value': password,
    })).append(jQuery('<input>', {
        'name': 'cpassword',
        'type': 'hidden',
        'value': cpassword,
    })).append(jQuery('<input>', {
        'name': 'user-id',
        'type': 'hidden',
        'value': userId,
    }));
	
	newForm.appendTo("body").submit();
//	
}

function hidePasswordError(e)
{
	$('.error-change-password').hide();
}


function validateCouponStatus(e)
{
	setTimeout(function(){ $('.coupon-msg').remove(); }, 5000);
	
	coupon = $(this).val();
	
	if(coupon == ''){
		if($('.coupon-msg').length >=1){ $('.coupon-msg').remove(); }
		$(e.currentTarget).after('<div class="alert alert-danger coupon-msg">Please provide coupon code first</div>');
		return false;
	}
	
	var payload = {coupon:$(this).val()};
	console.log(e.currentTarget);
	// Ajax Request Here
	
	$.ajax({
		url:BASE_URL+'ajax',
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

function sendInvitationToJoin(e)
{
	var coupon = $('input[type="text"][name="coupon"]').val();
	var email = $('input[type="text"][name="user-email"]').val();
	
	if(email === "")
	{
		$('.coupon-msg').remove();
		$(e.currentTarget).before('<div class="alert alert-danger coupon-msg">Please provide email first</div>');
		
		return false;
	}
	
	if(!isValidEmailAddress(email))
	{
		$('.coupon-msg').remove();
		$(e.currentTarget).before('<div class="alert alert-danger coupon-msg">Please provide valid email address</div>');
		
		return false;
	}
	0
	
	var payload = {coupon:coupon,email:email};
	
	$.ajax({
		url:BASE_URL+'ajax',
		data:{acid:10012,payload:JSON.stringify(payload)},
		type:'post', 
		dataType : 'JSON',
		success:function(data)
		{
			$('.coupon-msg').remove();
			if(data.flag==0){msg = data.message ; divclass = "alert-danger"}
			else { msg = data.message; divclass = "alert-success"; }
			
			$(e.currentTarget).before('<div class="alert '+divclass+' coupon-msg"></div>');
			$('.coupon-msg').html(msg);
		}
	});
}

AjaxCommon = {
	startAjaxRequest : function(url, data)
	{
		return $.ajax({
			url:url,
			data:data,
			type:'post', 
			dataType : 'JSON',
		});
	}
};

MessageHelper = {
	showMessage : function(type, message)
	{
		className = ''; icon = '';
		switch(type)
		{
			case 'error' : className = 'alert alert-danger'; icon = '<i class="fa fa-times-circle" aria-hidden="true"></i>'; break;
			case 'success' : className = 'alert alert-success'; icon = '<i class="fa fa-check-circle" aria-hidden="true"></i>'; break;
		}
		var html = '';
				
		html +='<div class="message '+className+'">';
		html += '<a href="javascript:void(0)" class="remove-message"><i class="fa fa-times-circle" aria-hidden="true"></i></a>';
		html += '<p>'+icon+ ' '+message+'</p>';
		html +='</div>';
		
				
		return html;
	},
	hideMessage : function()
	{
		$(document).find('.message').remove();
	},
	showAlertModal : function(message)
	{
		html = '';
		html +='<div id="alert_modal" class="modal fade" role="dialog">';
			html +='<div class="modal-dialog modal-sm">';
				html +='	<div class="modal-content">';
					html +='<div class="modal-header">';
						html +='<button type="button" class="close" data-dismiss="modal">&times;</button>';
						html +='<h4 class="modal-title">Alert</h4>';
					html +='</div>';
					html +='<div class="modal-body">';
						html +='<p>'+message+'</p>';
					html +='</div>';
					html +='<div class="modal-footer">';
						html +='<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
					html +='</div>';
				html +='</div>';
			html +='</div>';
		html +='</div>';
		
		if($('#alert_modal').length > 0) { $('#alert_modal').remove(); }
		$('body').append(html);
		
		$('#alert_modal').modal('show');
	},
};



