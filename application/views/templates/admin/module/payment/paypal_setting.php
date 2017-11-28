<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2><?php echo $title;?></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<form action="" method="post">
					<div class="row">
						<div class="form-group">
							<div class="col-md-6">
								<label>Paypal Test URL</label>
								<input type="text" class="form-control" name="test-url" value=""/>
							</div>
							<div class="col-md-6">
								<label>Paypal Test Email</label>
								<input type="text" name="test-email" class="form-control"/>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label>Paypal Live URL</label>
								<input type="text" name="live-url" class="form-control"/>
							</div>
							<div class="col-md-6">
								<label>Paypal Business Email</label>
								<input type="text" name="live-name" class="form-control"/>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label>Test Mode</label>
								<div class="btn-group btn-toggle"> 
								    <button type="button" class="btn btn-sm btn-default" data-value="1">ON</button>
								    <button type="button" class="btn btn-sm btn-primary active" data-value="0">OFF</button>
							    </div>
							</div>
							<div class="col-md-6"></div>
							<div class="clearfix"></div>
						</div>
					</div>	
					<div class="form-group mar-t-20">
						<input type="hidden" name="test_mode" value="0"/>
						<div><button name="update_paypal_settings" id="send" type="button" class="btn btn-success">Submit</button></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
$(function(){
	$('.btn-toggle').on('click', function() {
	    $(this).find('.btn').toggleClass('active');  

	    if ($(this).find('.btn-primary').size()>0) {
	    	$(this).find('.btn').toggleClass('btn-primary');
	    }
	    	    
	    $(this).find('.btn').toggleClass('btn-default');

		var testModeVal = $(this).find('.active').data("value");
		$('input[type="hidden"][name="test_mode"]').val(testModeVal);
// 	    console.log($(this).find('.active').data("value"));   
	});

	get_paypal_settings();
});


function get_paypal_settings()
{
	$.ajax({
		url : BASE_URL+'admin/ajax',
		method : 'POST',
		data : request,
		success : function(){

		}	

	});
}

$('button[type="button"][name="update_paypal_settings"]').on('click', function(){

	var testURL = $('input[type="text"][name="test-url"]').val();
	var testEmail = $('input[type="text"][name="test-email"]').val();
	var liveURL = $('input[type="text"][name="live-url"]').val();
	var liveEmail = $('input[type="text"][name="live-email"]').val();
	var mode = $('input[type="hidden"][name="test_mode"]').val();
	var id = $('input[type="hidden"][name=""]').val();
	
	if(testURL == ''|| testEmail == '' || liveURL == '' || liveEmail == '') 
	{
		alert("Please Fill required Fields");
		return false;
	}

	payment = {};

	payment['test_url'] = testURL;
	payment['test_email'] = testEmail;
	payment['live_url'] = liveURL;
	payment['live_email'] = liveEmail;
	payment['mode'] = mode;

	console.log(JSON.stringify(payment));


	/* Fire ajax to store all this information */
	
	payload = {'settings':payment}
	request = {'acid':10013,'payload':JSON.stringify(payload)}
	
	$.ajax({
		url : BASE_URL+'admin/ajax',
		method : 'POST',
		data : request,
		success : function(){

		}	

	});
	
});
</script>
