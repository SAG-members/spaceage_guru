<h2><?php echo $title;?></h2>
<div class="services_text">
	<form id="create_escrow_form">
	
		<table class="table table-bordered">
			<tbody>				
				<tr>
					<td>Item</td>
					<td><input type="text" class="form-control custom-text-box enable-me" readonly value="<?php echo $this->page->get_by_id($eventData->{User_event_model::_ITEM_ID}, Page::_PAGE_TITLE); ?>"/></td>
					<td><a class="edit_me pointer">Edit</a> </td>
				</tr>
				<tr>
					<td>Notes</td>
					<td><input type="text" name="escrow_notes" class="form-control custom-text-box enable-me" readonly value="<?php echo $eventData->{User_event_model::_TOPIC}?>"/></td>
					<td><a class="edit_me pointer">Edit</a> </td>
				</tr>
				<tr>
					<td>Price</td>
					<td><input name="escrow_price" type="text" class="form-control custom-text-box enable-me" readonly value="<?php echo $eventData->{User_event_model::_PCT_PRICE}?>"/></td>
					<td><a class="edit_me pointer">Edit</a> </td>
				</tr>
				<tr>
					<td>Payment From</td>
					<?php $paymentArr = array(
					        '1'=>'PCT Account', 					         
					        '2'=>'Cash', 					        
					        
					); ?>
					<td>
					<select class="form-control custom-select-box enable-me" name="payment_from" readonly>
        					<option value="0">Select</option>
        					<?php if($paymentArr): foreach ($paymentArr as $key => $val):?>
        					<?php $selected = ''; if($key == $eventData->{User_event_model::_PAYMENT_FROM}){$selected="selected='selected'";}?>
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
        					<?php $selected = ''; if($key == $eventData->{User_event_model::_DELIVERY_METHOD}){$selected="selected='selected'";}?>
        					<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
        					<?php endforeach;endif;?>
    					</select>
    				</td>
					<td><a class="edit_me pointer">Edit</a> </td>
				</tr>				
				<tr>
					<td>When</td>
					<?php $deliveryArr = array('1'=>'done/delivered', '2'=>'sent', '3'=>'plans ready', '4'=>'Write to notes'); ?>
					<td>
					<select class="form-control custom-select-box enable-me" name="payment_when" readonly>
							<option value="0">Select</option>
        					<?php if($deliveryArr): foreach ($deliveryArr as $key => $val):?>
        					<?php $selected = ''; if($key == $eventData->{User_event_model::_ESCROW_RELEASED}){$selected="selected='selected'";}?>
        					<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
        					<?php endforeach;endif;?>
    					</select>
    				</td>
					<td><a class="edit_me pointer">Edit</a> </td>
				</tr>
				<tr>
					<td>To</td>
					<td><input type="text" name="escrow_address" class="form-control custom-text-box enable-me" value="<?php echo $eventData->{User_event_model::_ADDRESS}?>" readonly/></td> 
					<td><a class="edit_me pointer">Edit</a> </td>
				</tr>
				<tr>
					<td>Date Time</td>
					<td><input type="text" name="escrow_date_time" class="form-control custom-text-box enable-me"  value="<?php echo $eventData->{User_event_model::_DATE_CREATED}?>" readonly/></td>
					<td><a class="edit_me pointer">Edit</a> </td>
				</tr>
			</tbody>	
		</table>
		<div id="map" style="height:300px;"></div>
		<div class="clearfix"></div>
		<div class="mar-t-20 mar-b-20">
<!--     		<div class="col-md-2 padding_none"> -->
<!--     			<button type="button" name="btn_accept_escrow" class="btn btn-success">Accept</button> -->
<!--     		</div> -->
<!--     		<div class="col-md-3 padding_none"> -->
<!--     			<button type="button" name="btn_save_exit_escrow" class="btn btn-warning">Save and Exit</button> -->
<!--     		</div> -->
<!--     		<div class="col-md-2 padding_none"> -->
<!--     			<button type="button" name="btn_decline_escrow" class="btn btn-danger">Decline</button> -->
<!--     		</div> -->
			<?php if (($sellerApproved == 1) && ($this->session->userdata('id') != $sellerId)): ?>			       
    		<input type="hidden" name="escrow_id" value="<?php echo $escrowId; ?>">        		
    		<input type="button" name="btn-btn-pay-pct" class="btn btn-primary" value="PCT <?php echo $eventData->{User_event_model::_PCT_PRICE} ?>">        	
			<?php endif; ?>
			
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
			<?php elseif ($sellerApproved == 1): ?>
			<div class="col-md-3 padding_none">
				<button type="button" name="btn_save_escrow" class="btn btn-warning">Save and Exit</button>
			</div>
			<div class="col-md-2 padding_none">
				<button type="button" name="btn_decline_escrow" class="btn btn-danger">Decline</button>
			</div>			
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
			<?php endif;?>
			
			
		</div>
		<input type="hidden" name="hidden_escrow_id" value="<?php echo $escrowId; ?>"/>
	</form>
</div>

<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.datetimepicker.min.css'); ?>">
<script src="<?php echo base_url(); ?>assets/js/jquery.datetimepicker.full.js"></script>

<script type="text/javascript"
	src="https://maps.googleapis.com/maps/api/js?key=<?php echo $this->config->item('google_map_api_key');?>&libraries=places"></script>
<script type="text/javascript">

$('.edit_me').on('click', function(){
	$(this).parents('td').siblings('td').find('.enable-me').prop('readonly', false);
	$(this).parents('td').siblings('td').find('.enable-me').focus();	
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

		codeAddress(address);
        
	});
});

/* Save and Exit Escrow */

$('button[type="button"][name="btn_save_exit_escrow"]').on('click', function(){

	var result = $('#create_escrow_form').serializeObject();

	var escrowId = $('input[type="hidden"][name="hidden_escrow_id"]').val();
	
	var newForm = jQuery('<form>', {
        'action': BASE_URL+'yield/escrow/save/'+escrowId,
        'target': '_top',
        'method':'post'	
    });

	newForm.append(jQuery('<input>', {'name': 'escrow', 'type': 'hidden', 'value': JSON.stringify(result)}));
	
	newForm.appendTo("body").submit();
});


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
				        'action': BASE_URL+'yield/escrow/accept/'+escrowId,
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
		        'action': BASE_URL+'yield/escrow/accept/'+escrowId,
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
				        'action': BASE_URL+'escrow/approve/'+escrowId,
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
		        'action': BASE_URL+'escrow/approve/'+escrowId,
		        'target': '_top',
		        'method':'post'	
		    });

			newForm.append(jQuery('<input>', {'name': 'escrow', 'type': 'hidden', 'value': JSON.stringify(result)}));
			
			newForm.appendTo("body").submit();
		}
	});
	
});


/* Make Payment*/
 
$('input[type="button"][name="btn-btn-pay-pct"]').on('click', function(){

	var escrowId = $('input[type="hidden"][name="hidden_escrow_id"]').val();

	var newForm = jQuery('<form>', {
        'action': BASE_URL+'escrow/pay/'+escrowId,
        'target': '_top',
        'method':'post'	
    });
    	
	newForm.appendTo("body").submit();
});


$(function(){
	var address = $('input[type="text"][name="escrow_address"]').val();
	codeAddress(address);

	jQuery('input[type="text"][name="escrow_date_time"]').datetimepicker();
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
	