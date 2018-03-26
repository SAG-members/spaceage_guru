<div class="row pss_div">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>New Event</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
			<form class="form-label-left" method="post" action="">
				<div clas="col-md-12">
					
						<div class="pop_up_message_box"></div>
						<div class="form-group">
							<div class="row">
    							<div class="col-md-6">
    								<label>Item</label>
    								<select name="item_name" class="form-control">
    								<option>Select</option>
    								<?php if($products): foreach ($products as $p):?>
    								<option id="<?php echo $p->{Page::_ID}; ?>"><?php echo $p->{Page::_PAGE_TITLE}; ?></option>
    								<?php endforeach; endif;?> 
    								</select>    														  		
    							</div>
    							<div class="col-md-6">
    								<label>Data Type</label> 
    								<input type="text" name="data_type" class="form-control" readonly>
    							</div>
							</div>
						</div>
						<div class="form-group"
							style="margin-left: 0px; margin-right: 0px;">
							<label>Event Comment</label>
							<textarea name="event_comment" class="form-control" rows="3" required></textarea>
						</div>
						<div class="form-group">
							<div class="row">
    							<div class="col-md-6">
    								<label>Price that I am willing to pay</label> 
    								<input type="text" name="price" class="form-control">
    							</div>
    							<div class="col-md-6">
    								<label>Currency</label> 
    								<div class="input-group">
    							  		<input type="text" name="actual_price" class="form-control" readonly>
    						  			<span class="input-group-addon" id="basic-addon2">&euro;</span>
    								</div>
    								
    							</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
    							<div class="col-md-6">
    								<label>Start Time</label> 
    								<input type="text" name="start_time" class="form-control">
    							</div>
    							<div class="col-md-6">
    								<label>End Time</label> 
    								<input type="text" name="end_time" class="form-control">
    								
    							</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
							<div class="col-md-6">
								<label>Payment From</label> 
								<?php $paymentArr = array('1'=>'PCT Account', '2'=>'Cryptonator', '3'=>'Paypal', '4'=>'Bank Transfer', '5'=>'Other CC accounts', '6'=>'Cash', '7'=>'Shapeshift.io'); ?>
								<select class="form-control custom-select-box enable-me" name="payment_from" readonly>
                					<option value="0">Select</option>
                					<?php if($paymentArr): foreach ($paymentArr as $key => $val):?>
                					<option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                					<?php endforeach;endif;?>
            					</select>
							</div>
							<div class="col-md-6">
								<label>Delivery Method</label> 
								<?php $deliveryArr = array('1'=>'By Seller', '2'=>'By Post', '3'=>'Pickup by Buyer from given location'); ?>
        						<select class="form-control custom-select-box enable-me" name="delivery_method" readonly>
                					<option value="0">Select</option>
                					<?php if($deliveryArr): foreach ($deliveryArr as $key => $val):?>
                					<option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                					<?php endforeach;endif;?>
            					</select>
							</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
							<div class="col-md-6">
								<label>When</label> 
								<?php $deliveryArr = array('1'=>'done/delivered', '2'=>'sent', '3'=>'plans ready', '4'=>'Write'); ?>
								<select class="form-control custom-select-box enable-me" name="payment_when" readonly>
        							<option value="0">Select</option>
                					<?php if($deliveryArr): foreach ($deliveryArr as $key => $val):?>
                					<option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                					<?php endforeach;endif;?>
            					</select>
							</div>
							<div class="col-md-6">
								<label>Date Time</label> 
								<input type="text" name="escrow_date_time" class="form-control"/>
							</div>	
							</div>
						</div>
						<div class="form-group"
							style="margin-left: 0px; margin-right: 0px;">
							<label>Location</label> 
							<input type="text" name="location" class="form-control" placeholder="Enter your location here" required>
						</div>
						<div class="form-group"
							style="margin-left: 0px; margin-right: 0px;">
							<label>Address</label> 
							<input type="text" name="address" class="form-control">
						</div>
						<div class="form-group"
							style="margin-left: 0px; margin-right: 0px;">
							<div id="map"></div>
						</div>
					
				</div>
			</form>
			</div>
		</div>
	</div>
</div>



<script>
$('select[name="item_name"]').on('change', function(){
	/* Get id and based on id get details from page table*/

	AjaxCommon.startAjaxRequest(url, data).done(function(response){

	});



	
});

</script>
<script>
	$(function(){
		$('input[type="text"][name="escrow_date_time"]').datetimepicker();
// 		$('.bootstrap-datetimepicker-widget').show();

		initialize();
	});
	</script>
<script>
$('input[type="text"][name="location"]').on('keyup', function(){
	var places = new google.maps.places.Autocomplete($(this)[0]);

	google.maps.event.addListener(places, 'place_changed', function () 
	{
	  	var place = places.getPlace();
        var address = place.formatted_address;
        var latitude = place.geometry.location.lat();
        var longitude = place.geometry.location.lng();

		
        var mesg = "Address: " + address;
        mesg += "\nLatitude: " + latitude;
        mesg += "\nLongitude: " + longitude;

		$('input[type="text"][name="address"]').val(address);
		$('input[type="hidden"][name="lat"]').val(latitude);
		$('input[type="hidden"][name="lng"]').val(longitude);

		
        codeAddress(address);    
    });
    
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






</script>

<style>
.pac-container {
	z-index: 999999 !important;
}

#map {
	height: 200px;
}
</style>