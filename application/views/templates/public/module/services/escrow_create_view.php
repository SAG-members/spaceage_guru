<h2><?php echo $title;?></h2>
<?php 
# Load Escrow Data

$address=''; $dateTime = ''; $escrow_released = ''; $price = ''; $notes = ''; $fromAccount = ''; 
$deliveryMethod= ''; $escrowReleased=''; $category = ''; $title = ''; $commentId = ''; $categoryId = ''; 
$buyerId = ''; $sellerId = ''; $escrowId = ''; $comment = ''; $sellerApproved = '';
#pre($data);
if(isset($data) && !empty($data))
{
	$category = $this->page->get_category($data->category_id);
	$title = $data->title;
	$commentId = $data->comment_id;
	$categoryId = $data->category_id;
}

if(isset($escrowDetails) && !empty($escrowDetails))
{
    # Get Category Id
    $commentData = $this->ulec->get_by_id($escrowDetails[0]->comment_id);
     
    $escrow_released = $escrowDetails[0]->escrow_released;    
    
    $commentId = $escrowDetails[0]->comment_id;
    $buyerId = $escrowDetails[0]->escrow_buyer_id;
    $sellerId = $escrowDetails[0]->escrow_seller_id;
    $escrowId = $escrowDetails[0]->id;
    $sellerApproved = $escrowDetails[0]->seller_approved;
        
     
    $comment = !empty($escrowDetails[0]->escrow_notes) ? $escrowDetails[0]->escrow_notes : $commentData->comment;
    
    $eventDetail = $this->library_event_model->getLibraryEventById($commentData->event_id);
    $pageDetail = $this->page->get_by_id($eventDetail->event_data_id);
    $category = $this->page->get_category($pageDetail->{Page::_CATEGORY_ID});
    
    $fromAccount = !empty($escrowDetails[0]->from_account) ? $escrowDetails[0]->from_account : $commentData->from_account;
    $deliveryMethod = !empty($escrowDetails[0]->delivery_method) ? $escrowDetails[0]->delivery_method : $commentData->delivery_method;
    $escrowReleased = !empty($escrowDetails[0]->escrow_released) ? $escrowDetails[0]->escrow_released : $commentData->escrow_released;
    $address = !empty($escrowDetails[0]->address) ? $address = $escrowDetails[0]->address : $commentData->location;
    
    $price = $commentData->price; 
    if(!empty($escrowDetails[0]->escrow_price) && $escrowDetails[0]->escrow_price != '0.00'){
        $price = $escrowDetails[0]->escrow_price;
    }
        
    $title = $pageDetail->page_title;
    $categoryId = $pageDetail->category_id;
    
    $dateTime = !empty($escrowDetails[0]->date_time) ? $escrowDetails[0]->date_time : $commentData->date_time;
    
    $date = new DateTime($dateTime);
    $date = $date->format('d-m-Y H:i:s');
}

?>
<div class="services_text">
	<form id="create_escrow_form">
	<?php if(isset($data) || isset($escrowDetails)):  ?>
		<table class="table table-bordered">
			<tbody>
				<tr>
					<td>Data Type</td>
					<td>
						<?php $categoryArr = array(
						        '18'=>'Audio/Visual',
						        '17'=>'Article', 
						        '19'=>'Cures',
						        '20'=>'Legal Note',
                                '2'=>'Product', 
						        '8'=>'Sensation', 
						        '1'=>'Service', 
						        '5'=>'Symptom'
						        
						        
						        
						); ?>
    					<select class="form-control custom-select-box enable-me" readonly>
        					<?php if($categoryArr): foreach ($categoryArr as $key => $cat):?>
        					<?php $selected=""; if($key == $categoryId){$selected="selected='selected'";}?>
        					<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $cat; ?></option>
        					<?php endforeach;endif;?>
    					</select>
					</td>
					<td><a class="edit_me pointer">Edit</a> </td>
				</tr>
				<tr>
					<td>Item</td>
					<td><input type="text" class="form-control custom-text-box enable-me" value="<?php echo $title; ?>" readonly/></td>
					<td><a class="edit_me pointer">Edit</a> </td>
				</tr>
				<tr>
					<td>Notes</td>
					<td><input type="text" name="escrow_notes" class="form-control custom-text-box enable-me" value="<?php echo $comment; ?>" readonly/></td>
					<td><a class="edit_me pointer">Edit</a> </td>
				</tr>
				<tr>
					<td>Price</td>
					<td><input name="escrow_price" type="text" class="form-control custom-text-box enable-me" value="<?php echo $price; ?>" readonly/></td>
					<td><a class="edit_me pointer">Edit</a> </td>
				</tr>
				<tr>
					<td>Payment From</td>
					<?php $paymentArr = array(
					        '1'=>'PCT Account', 
					        '2'=>'Cryptonator', 
					        '3'=>'Paypal', 
					        '4'=>'Bank Transfer', 
					        '5'=>'Other CC accounts', 
					        '6'=>'Cash', 
					        '7'=>'Shapeshift.io'
					        
					); ?>
					<td>
					<select class="form-control custom-select-box enable-me" name="payment_from" readonly>
        					<option value="0">Select</option>
        					<?php if($paymentArr): foreach ($paymentArr as $key => $val):?>
        					<?php $selected = ''; if($key == $fromAccount){$selected="selected='selected'";}?>
        					<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
        					<?php endforeach;endif;?>
    					</select>
    				</td>
					<td><a class="edit_me pointer">Edit</a> </td>
				</tr>
				<tr>
					<td>Delivery Method</td>
					<td>
					<?php $deliveryArr = array('1'=>'By Seller', '2'=>'By Post', '3'=>'Pickup by Buyer from given location', '4'=>'Mental'); ?>
					<select class="form-control custom-select-box enable-me" name="delivery_method" readonly>
        					<option value="0">Select</option>
        					<?php if($deliveryArr): foreach ($deliveryArr as $key => $val):?>
        					<?php $selected = ''; if($key == $deliveryMethod){$selected="selected='selected'";}?>
        					<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
        					<?php endforeach;endif;?>
    					</select>
    				</td>
					<td><a class="edit_me pointer">Edit</a> </td>
				</tr>
				<!-- 
				<tr>
					<td>Amount of Escrow Released</td>
					<?php $deliveryArr = array('1'=>'100%', '2'=>'75%', '3'=>'50%', '4'=>'25%', '5'=>'10%', '6'=>'Write'); ?>
					<td>
					<select class="form-control custom-select-box enable-me" name="escrow_percent" readonly>
							<option value="0">Select</option>
        					<?php if($deliveryArr): foreach ($deliveryArr as $key => $val):?>
        					
        					<option value="<?php echo $key; ?>"><?php echo $val; ?></option>
        					<?php endforeach;endif;?>
    					</select>
    				</td>
					<td><a class="edit_me pointer">Edit</a> </td>
				</tr>
				 -->
				<tr>
					<td>When</td>
					<?php $deliveryArr = array('1'=>'done/delivered', '2'=>'sent', '3'=>'plans ready', '4'=>'Write'); ?>
					<td>
					<select class="form-control custom-select-box enable-me" name="payment_when" readonly>
							<option value="0">Select</option>
        					<?php if($deliveryArr): foreach ($deliveryArr as $key => $val):?>
        					<?php $selected = ''; if($key == $escrowReleased){$selected="selected='selected'";}?>
        					<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
        					<?php endforeach;endif;?>
    					</select>
    				</td>
					<td><a class="edit_me pointer">Edit</a> </td>
				</tr>
				<tr>
					<td>To</td>
					<td><input type="text" name="escrow_address" class="form-control custom-text-box enable-me" value="<?php echo $address; ?>" readonly/></td> 
					<td><a class="edit_me pointer">Edit</a> </td>
				</tr>
				<tr>
					<td>Date Time</td>
					<td><input type="text" name="escrow_date_time" class="form-control custom-text-box enable-me" value="<?php echo $dateTime; ?>" readonly/></td>
					<td><a class="edit_me pointer">Edit</a> </td>
				</tr>
			</tbody>	
		</table>
		<div id="map"></div>
		<div class="clearfix"></div>
		<div class="mar-t-20 mar-b-20">
			<?php if(isset($sellerId) && $this->session->userdata('id') == $sellerId && $sellerApproved != 1) :?>
			<div class="col-md-2 padding_none">
				<button type="button" name="btn_approve_escrow" class="btn btn-success">Approve</button>
			</div>
			<div class="col-md-3 padding_none">
				<button type="button" name="btn_save_escrow" class="btn btn-warning">Save and Exit</button>
			</div>
			<div class="col-md-2 padding_none">
				<button type="button" name="btn_decline_escrow" class="btn btn-danger">Decline</button>
			</div>
			<input type="hidden" name="escrow_id" value="<?php echo $escrowId?>"/>
			<input type="hidden" name="hidden_escrow_id" value="<?php echo $this->uri->segment(3); ?>"/>
			<?php elseif ($sellerApproved == 1): ?>
			<div class="col-md-3 padding_none">
				<button type="button" name="btn_save_escrow" class="btn btn-warning">Save and Exit</button>
			</div>
			<div class="col-md-2 padding_none">
				<button type="button" name="btn_decline_escrow" class="btn btn-danger">Decline</button>
			</div>
			<input type="hidden" name="escrow_id" value="<?php echo $escrowId?>"/>
			<input type="hidden" name="hidden_escrow_id" value="<?php echo $this->uri->segment(3); ?>"/>
			<?php else :?>
			<div class="col-md-2 padding_none">
				<button type="button" name="btn_accept_escrow" class="btn btn-success">Accept</button>
			</div>
			<div class="col-md-3 padding_none">
				<button type="button" name="btn_save_exit_escrow" class="btn btn-warning">Save and Exit</button>
			</div>
			<div class="col-md-2 padding_none">
				<button type="button" name="btn_decline_escrow" class="btn btn-danger">Decline</button>
			</div>
			<input type="hidden" name="escrow_id" value="<?php echo $commentId?>"/>
			<input type="hidden" name="hidden_escrow_id" value="<?php echo $this->uri->segment(3); ?>"/>
			<?php endif;?>
			
			
		</div>
	<?php elseif ($sellerApproved == 1): ?>
	
	<?php else:?>
		<div class="alert alert-danger mar-t-20">This page is only accessible after you yields an offer</div>
	<?php endif;?>
	</form>
	
<?php if ($sellerApproved == 1): ?>
<div class="col-md-12 padding_none mar-t-10">
    <!--  Pay via Direct Payment to company account -->
    <div class="panel panel-default ">
    	<div class="panel-heading">
       		<h4 class="panel-title ">
           		<span style="color: #089bd3; cursor:pointer" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Direct Deposit in Company Bank Account</span>
           		<ul class="nav navbar-right panel_toolbox">
    					<li><a style="color: #089bd3; cursor:pointer" class="collapse-link"><i class="fa fa-chevron-down"  data-toggle="collapse" data-parent="#accordion" href="#collapseThree"></i></a></li>
                    </ul>
                <div class="clearfix"></div>
       		</h4>
    	</div>
    	<div id="collapseThree" class="panel-collapse collapse">
       		<div class="panel-body">
       		   <p style="color:#000 !important;">Receiver : Axis Mundi Oü</p>
       		   <p style="color:#000 !important;">Bank Account : EE977700771002654084</p>
       		   <p style="color:#000 !important;">BIC/SWIFT: LHVBEE22</p>
    		   <p style="color:#000 !important;">Bank Name: AS LHV Pank</p>
    		   <p style="color:#000 !important;">Address: Tartu mnt 2, 10145 Tallinn Estonia</p>
    		   <p style="color:#000 !important;">User/Member number and purchased item</p>
    		   <p style="color:#000 !important;">eg. U10565 Membership 1000 &euro;</p>
    		   <p style="color:#000 !important;">or</p>
    		   <p style="color:#000 !important;">M10999 Club credit PCT worth of 1000 &euro;</p>
       		</div>
       	</div>
    </div>
                      
                      <!-- Pay with Cryptonator -->
    <div class="panel panel-default ">
    	<div class="panel-heading">
       		<h4 class="panel-title ">
           		<span style="color: #089bd3; cursor:pointer" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Pay With Cryptonator</span>
    <ul class="nav navbar-right panel_toolbox">
    		<li><a style="color: #089bd3; cursor:pointer" class="collapse-link" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-chevron-down"  data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"></i></a></li>
                </ul>
            <div class="clearfix"></div>
    	</h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
    	<div class="panel-body">
    		
    		<form method="GET" action="https://api.cryptonator.com/api/merchant/v1/startpayment">
        		<input type="hidden" name="merchant_id" value="f3d2e6eebd0ef1857dbd12fcd4c6f997">
        		<input type="hidden" name="item_name" value="Escrow For <?php echo $title; ?>">
                <input type="hidden" name="invoice_currency" value="eur">
                <input type="hidden" name="invoice_amount" value="<?php echo $price; ?>" data-type="number">
        		<input type="hidden" name="language" value="en">
        		<input type="submit" name="btn_cryptonaror_submit" class="btn btn-primary" value="Make Payment">
            	</form>
    			       		
       		</div>
       	</div>
    </div>
    </div>
	<?php endif;?>
</div>


<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/src/js/bootstrap-datetimepicker.js"></script>



<link href="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/build/css/bootstrap-datetimepicker.css" rel="stylesheet"/>

<script type="text/javascript"
	src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBEhsWhrYpbiuyOi2czg7P49ZW27Uow51c&libraries=places"></script>
<script>
/* Accept Escrow*/
$('button[type="button"][name="btn_accept_escrow"]').on('click', function(){

	var result = $('#create_escrow_form').serializeObject();


	/* Now before actually approving a yielded offer we should check for 2nd and 3rd country restriction
	 *
	 */
	var escrowId = $('input[type="hidden"][name="hidden_escrow_id"]').val();

	var payload = {'escrow_id':escrowId};
	var data = {'acid':12000, 'payload':JSON.stringify(payload)};
	var url = BASE_URL+'/ajax';
	AjaxCommon.startAjaxRequest(url, data).done(function(response){
		
		if(response.aflag == 0)
		{
			$().toastmessage('showToast', {
			    text     : response.message,
			    sticky   : true,
			    position : 'top-right',
			    type     : 'error',
			    close    : function () {/*console.log("toast is closed ...");*/}
			});

			return false;
		}
		else if(response.bflag == 0)
		{
			$().toastmessage('showToast', {
			    text     : response.message,
			    sticky   : true,
			    position : 'top-right',
			    type     : 'warning',
			    close    : function () {
			    	var newForm = jQuery('<form>', {
				        'action': BASE_URL+'user/escrow-offer',
				        'target': '_top',
				        'method':'post'	
				    });

					newForm.append(jQuery('<input>', {'name': 'escrow', 'type': 'hidden', 'value': JSON.stringify(result)}));
					
					newForm.appendTo("body").submit();

				}
			});

			return false;
		}
		else
		{
			var newForm = jQuery('<form>', {
		        'action': BASE_URL+'user/escrow-offer',
		        'target': '_top',
		        'method':'post'	
		    });

			newForm.append(jQuery('<input>', {'name': 'escrow', 'type': 'hidden', 'value': JSON.stringify(result)}));
			
			newForm.appendTo("body").submit();
		}
	});
	
});

/* Approve Escrow */
 
$('button[type="button"][name="btn_approve_escrow"]').on('click', function(){

	
	var result = $('#create_escrow_form').serializeObject();

	/* Now before actually approving a yielded offer we should check for 2nd and 3rd country restriction
	 *
	 */
	var escrowId = $('input[type="hidden"][name="hidden_escrow_id"]').val();

	var payload = {'escrow_id':escrowId};
	var data = {'acid':12000, 'payload':JSON.stringify(payload)};
	var url = BASE_URL+'/ajax';
	AjaxCommon.startAjaxRequest(url, data).done(function(response){
		
		if(response.aflag == 0)
		{
			$().toastmessage('showToast', {
			    text     : response.message,
			    sticky   : true,
			    position : 'top-right',
			    type     : 'error',
			    close    : function () {/*console.log("toast is closed ...");*/}
			});

			return false;
		}
		else if(response.bflag == 0)
		{
			$().toastmessage('showToast', {
			    text     : response.message,
			    sticky   : true,
			    position : 'top-right',
			    type     : 'warning',
			    close    : function () {
			    	var newForm = jQuery('<form>', {
				        'action': BASE_URL+'user/approve-offer',
				        'target': '_top',
				        'method':'post'	
				    });

					newForm.append(jQuery('<input>', {'name': 'escrow', 'type': 'hidden', 'value': JSON.stringify(result)}));
					
					newForm.appendTo("body").submit();
				}
			});

			return false;
		}
		else
		{
			var newForm = jQuery('<form>', {
		        'action': BASE_URL+'user/approve-offer',
		        'target': '_top',
		        'method':'post'	
		    });

			newForm.append(jQuery('<input>', {'name': 'escrow', 'type': 'hidden', 'value': JSON.stringify(result)}));
			
			newForm.appendTo("body").submit();
		}
	});
	
	
	
});




/* Save and Exit Escrow */
 
$('button[type="button"][name="btn_save_exit_escrow"]').on('click', function(){

	var result = $('#create_escrow_form').serializeObject();
	
	var newForm = jQuery('<form>', {
        'action': BASE_URL+'user/save-offer',
        'target': '_top',
        'method':'post'	
    });

	newForm.append(jQuery('<input>', {'name': 'escrow', 'type': 'hidden', 'value': JSON.stringify(result)}));
	
	newForm.appendTo("body").submit();
});


/* Decline Escrow*/
$('button[type="button"][name="btn_decline_escrow"]').on('click', function(){

	var commentId = $('input[type="hidden"][name="hidden_escrow_id"]').val();
	
	var newForm = jQuery('<form>', {
        'action': BASE_URL+'user/decline-offer',
        'target': '_top',
        'method':'post'	
    });

	newForm.append(jQuery('<input>', {'name': 'escrow_id', 'type': 'hidden', 'value': commentId}));
		
	newForm.appendTo("body").submit();
});


$('.edit_me').on('click', function(){
	$(this).parents('td').siblings('td').find('.enable-me').prop('readonly', false);
});



$('input[type="text"][name="escrow_address"]').on('keyup', function(){
	var $this = $(this);
		  
	var places = new google.maps.places.Autocomplete($this[0]);

	google.maps.event.addListener(places, 'place_changed', function () 
	{
	  	var place = places.getPlace();
        var address = place.formatted_address;
        var latitude = place.geometry.location.lat();
        var longitude = place.geometry.location.lng();

		$this.attr('data-lat', latitude);
		$this.attr('data-lng', longitude);

		
        
	});
});

$(function(){
	$('input[type="text"][name="escrow_date_time"]').datetimepicker({inline: true, format: 'd/MM/YYYY HH:mm'});
	$('.bootstrap-datetimepicker-widget').show();

	<?php if(!empty($date)):?>
	$('input[type="text"][name="escrow_date_time"]').data("DateTimePicker").date('<?php echo $date; ?>');
	<?php endif;?>

	var address = $('input[type="text"][name="escrow_address"]').val();
	codeAddress(address);
//		if(address.length > 1){ codeAddress(address); } 


	/* Check the user membership status*/
	console.log("dasfdasfdasf");
	var membershipStatus = "<?php echo $this->session->userdata('membershipLevel');?>";

	if(membershipStatus <= 3)
	{
		$('select[name="payment_from"] option[value="6"]').prop('disabled', true);
	}
});


var geocoder;
var map;
var infowindow;
var marker;
var center = new google.maps.LatLng(59.76522, 18.35002);

geocoder = new google.maps.Geocoder();

function initialize() 
{
	var mapOptions = { 
		zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: center
    };

    map = new google.maps.Map(document.getElementById('map'), mapOptions);

    marker = new google.maps.Marker({ map: map, position: center, draggable: true});


    google.maps.event.addListener(marker, 'dragend', function() {
		geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) 
	  		{
				if (results[0]) 
	  			{
					$('input[type="text"][name="address"]').val(results[0].formatted_address);
					$('input[type="hidden"][name="lat"]').val(marker.getPosition().lat());
					$('input[type="hidden"][name="lng"]').val(marker.getPosition().lng());
				}
			}
		});
    });	

//     codeAddress();
//     marker.setMap( map );
//     moveBus( map, marker );
}




function codeAddress(address) 
{
// 	var address = document.getElementById("address").value;
	  
	$.ajax({
	    type: "GET",
	    dataType: "json",
	    url: "http://maps.googleapis.com/maps/api/geocode/json",
	    data: {'address': address,'sensor':false},
	    success: function(data){
	        if(data.results.length){
	            $('#latitude').val(data.results[0].geometry.location.lat);
	        $('#longitude').val(data.results[0].geometry.location.lng);
	        }else{
	        $('#latitude').val('invalid address');
	        $('#longitude').val('invalid address');
	       }
	    }
	}); 

 	
	geocoder.geocode({
    	'address': address
  	}, function(results, status) {
    	if (status == google.maps.GeocoderStatus.OK) {
      		map.setCenter(results[0].geometry.location);
      		var marker = new google.maps.Marker({
        		map: map,
        		position: results[0].geometry.location,
        		draggable: true 
      		});


      		google.maps.event.addListener(marker, 'dragend', function() {
      			geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
      				if (status == google.maps.GeocoderStatus.OK) 
          			{
      					if (results[0]) 
          				{
      						$('input[type="text"][name="address"]').val(results[0].formatted_address);
      						$('input[type="hidden"][name="lat"]').val(marker.getPosition().lat());
      						$('input[type="hidden"][name="lng"]').val(marker.getPosition().lng());
						}
      				}
      			});
      		});
		} 
    	else { /* alert("Geocode was not successful for the following reason: " + status); */   }
  	});
}

function callback(results, status) 
{
	if (status == google.maps.places.PlacesServiceStatus.OK) 
	{
	    for (var i = 0; i < results.length; i++) 
		{
	    	createMarker(results[i]);
	    }
	  }
}

function createMarker(place) 
{
	var placeLoc = place.geometry.location;
	var marker = new google.maps.Marker({
	    map: map,
	    position: place.geometry.location
	});

	google.maps.event.addListener(marker, 'mouseover', function() {
		infowindow.setContent(place.name);
		infowindow.open(map, this);
	});
}

function moveBus( map, marker ) {
	marker.setPosition( new google.maps.LatLng( 0, 0 ) );
    map.panTo( new google.maps.LatLng( 0, 0 ) );

};

function geocodePosition(pos) 
{
	geocoder.geocode({
		latLng: pos
	}, function(responses) {
		if (responses && responses.length > 0) {
	    	return marker.formatted_address = responses[0].formatted_address; console.log(responses[0].formatted_address);
	    } else {
	    	return marker.formatted_address = 'Cannot determine address at this location.';
	    }
// 	    infowindow.setContent(marker.formatted_address + "<br>coordinates: " + marker.getPosition().toUrlValue(6));
// 	    infowindow.open(map, marker);
	});
}





initialize();
</script>
<style>
	#map{ height: 200px; }
</style>
