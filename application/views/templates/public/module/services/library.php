<div class="services_text">
	<div class="drop-events text-center">
		<p>Drag and drop events here to remove from calendar</p>
		<i class="fa fa-trash fa-3x"></i>
	</div>
	<div class="clearfix"></div>
	<div class="mar-b-20"></div>
	<div id='calendar'></div>
</div>

<!-- Initialise Calendar -->
<script>
$(function(){

	$(document).on("mousemove", function (event) {
		currentMousePos.x = event.pageX;
	    currentMousePos.y = event.pageY;
	});
		

	ini_events($('.external-event'));

	$('drop-events').droppable();

	getFreshEvents();
	
	$('#calendar').fullCalendar({
		// events: JSON.parse(json_events),
		//events: [{"id":"14","title":"New Event","start":"2015-01-24T16:00:00+04:00","allDay":false}],
		utc: true,
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		height: 1450,
		defaultView : 'agendaWeek',
		editable: true,
		droppable: true, 
		slotDuration: '00:30:00',
		
		eventReceive: function(event){
			console.log(event);
			var title = event.title;
			var start = event.start.format("YYYY-MM-DD[T]HH:mm:SS");
			var pageId = event.pageId;
			
			events = {};

		   	events['userId'] = "<?php echo $this->session->userdata('id');?>";
		   	events['eventDataId'] = event.pageId;
			events['eventTitle'] = event.title;
			events['eventPrice'] = event.event_data_price;
			events['startDate'] = event.start.format("YYYY-MM-DD[T]HH:mm:SS");
			events['endDate'] = '';
			events['fullDay'] = true;	

			var data = {'acid':401, 'payload':JSON.stringify(events)};
			$.ajax({
	    		url: BASE_URL + '/ajax',
	    		data: data,
	    		type: 'POST',
	    		dataType: 'json',
	    		success: function(response){
		    		event.id = response.lastId;
	    			$('#calendar').fullCalendar('updateEvent',event);

					$('	<div class="message alert alert-success"><a href="javascript:void(0)" class="remove-message"><i class="fa fa-times-circle" aria-hidden="true"></i></a><p><i class="fa fa-check-circle" aria-hidden="true"></i> New event posted to calendar successfully</p></div>').insertAfter('.message-box');
	    		},
	    		error: function(e)
	    		{
	    			console.log(e.responseText);
	    		}
	    	});
			$('#calendar').fullCalendar('updateEvent',event);
			window.location.reload();
		},
		eventDrop: function(event, delta, revertFunc) {
	        var title = event.title;
	        var start = event.start.format();
	        var end = (event.end == null) ? start : event.end.format();

			events = {};
			
			events['eventTitle'] = title;
			events['startDate'] =start;
			events['endDate'] = end;
			events['fullDay'] = false;
			events['eventId'] = event.id;	
	
			var data = {'acid':402, 'payload':JSON.stringify(events)};
				        
	        $.ajax({
				url: BASE_URL + '/ajax',
				data: data,
				type: 'POST',
				dataType: 'json',
				success: function(response){
					if(response.flag != 1) revertFunc();
					
				},
				error: function(e){		    			
					revertFunc();
					alert('Error processing your request: '+e.responseText);
				}
			});
// 	        getFreshEvents();
// 	        $('#calendar').fullCalendar('updateEvent',event);
	    },
	    eventClick: function(event, jsEvent, view) {
			/* Check if event has some comment already */
			
			get_event_comment_data(event.id);
			
		
			
			$('#add_location_comment_event_modal').modal('show');
			$('#add_location_comment_event_modal').modal({
		        backdrop: 'static',
		        keyboard: false
		    }).on('shown.bs.modal', function () {
		        google.maps.event.trigger(map, 'resize');
		        map.setCenter(center);
		    });
			console.log(event);
		    $('input[type="hidden"][name="edit_event_id"]').val(event.id);
		    $('input[type="text"][name="actual_price"]').val(event.event_data_price);
		    $('input[type="text"][name="item_name"]').val(event.title);
		    $('input[type="text"][name="data_type"]').val(event.event_data_type);
			
		},
		eventResize: function(event, delta, revertFunc) {
			console.log(event);
			var title = event.title;
			var end = event.end.format();
			var start = event.start.format();

			events = {};
			
			events['eventTitle'] = title;
			events['startDate'] =start;
			events['endDate'] = end;
			events['fullDay'] = false;
			events['eventId'] = event.id;	
	
			var data = {'acid':402, 'payload':JSON.stringify(events)};
	        $.ajax({
				url: BASE_URL + '/ajax',
				data: data,
				type: 'POST',
				dataType: 'json',
				success: function(response){
					if(response.flag != 1) revertFunc();
					
				},
				error: function(e){		    			
					revertFunc();
					alert('Error processing your request: '+e.responseText);
				}
			});
// 	        getFreshEvents();
// 	        $('#calendar').fullCalendar('updateEvent',event);
	    },
		eventDragStop: function (event, jsEvent, ui, view) {
			if (isElemOverDiv()) 
			{
		    	$('#delete_event_modal').modal('show');
				$('#delete_event_modal').find('input[type="hidden"][name="event_id"]').val(event.id);
			}
		}
	});
	
});




function get_event_comment_data(eventId)
{
	var payload = {'eventId':eventId};
	var data = {'acid':602, 'payload':JSON.stringify(payload)};
	
	$.ajax({
		url: BASE_URL + '/ajax',
		data: data,
		type: 'POST',
		dataType: 'json',
		success: function(response){
// 			$('textarea[name="event_comment"]').val(response.result.comment);
// 			$('input[type="text"][name="price"]').val(response.result.price);
// 			$('input[type="text"][name="location"]').val(response.result.location);
// 			$('input[type="text"][name="address"]').val(response.result.address);
// 			$('input[type="hidden"][name="lat"]').val(response.result.lat);
// 			$('input[type="hidden"][name="lng"]').val(response.result.lng);
			
		},
		error: function(e){		    			

		}
	});
}



var currentMousePos = {
		x: -1,
		y: -1
	};

function isElemOverDiv() 
{
    var trashEl = $('.drop-events');
	console.log(trashEl);
    var ofs = trashEl.offset();
    console.log(ofs);
    var x1 = ofs.left;
    var x2 = ofs.left + trashEl.outerWidth(true);
    var y1 = ofs.top;
    var y2 = ofs.top + trashEl.outerHeight(true);

    if (currentMousePos.x >= x1 && currentMousePos.x <= x2 &&
        currentMousePos.y >= y1 && currentMousePos.y <= y2) {
        return true;
    }
    return false;
}

function ini_events(ele) 
{
	ele.each(function () 
	{
		$(this).data('event', {
			title: $.trim($(this).text()), // use the element's text as the event title
			pageId : $.trim($(this).data('id')),
			event_data_price : $.trim($(this).data('price')),
			stick: true // maintain when user navigates (see docs on the renderEvent method)
		});

		// make the event draggable using $ UI
		$(this).draggable({
			zIndex: 999,
			revert: true,      // will cause the event to go back to its
			revertDuration: 0  //  original position after the drag
		});
    });
}

function getFreshEvents()
{
	var data = {'acid':405};
	$.ajax({
		url: BASE_URL+'ajax',
        type: 'POST', // Send post data
        data: data,
        success: function(response)
        {
		   	client_events = JSON.parse(response);
    	   	console.log(JSON.stringify(client_events.result));
    	   	console.log(JSON.parse(JSON.stringify(client_events.result)));
    	   	$('#calendar').fullCalendar('addEventSource', client_events.result);
        }
	});
	
}

/*
 * Code to remove event permanently
 */
$(document).on('click', 'button[type="button"][name="process_remove"]', function(e){
	var eventId = $(this).parents('.modal-footer').find('input[type="hidden"][name="event_id"]').val();
	console.log(eventId);

	$(this).parents('.modal-footer').find('input[type="hidden"][name="event_id"]').val('');
	
	/* No do an ajax request to remove the event from database */
		
	events = {};
	events['eventId'] = eventId;

	var data = {'acid':404, 'payload':JSON.stringify(events)};
	$.ajax({
		url: BASE_URL + '/ajax',
		data: data,
		type: 'POST',
		dataType: 'json',
		success: function(response){
			console.log(response);
		    if(response.flag == 1)
			{
		    	$('#calendar').fullCalendar('removeEvents');
		    	$('	<div class="message alert alert-success"><a href="javascript:void(0)" class="remove-message"><i class="fa fa-times-circle" aria-hidden="true"></i></a><p><i class="fa fa-check-circle" aria-hidden="true"></i> Event removed successfully</p></div>').insertAfter('.message-box');
       			getFreshEvents();
       			$('#delete_event_modal').modal('hide');
       		}
		},
		error: function(e){	
			$('	<div class="message alert alert-danger"><a href="javascript:void(0)" class="remove-message"><i class="fa fa-times-circle" aria-hidden="true"></i></a><p><i class="fa fa-times-circle" aria-hidden="true"></i> Error processing your request: '+ e.responseText+'</p></div>').insertAfter('.message-box');
		}
	});
});

/* If user press the not button then we need to removed the event id from modal box */

$(document).on('click', 'button[type="button"][name="cancel_remove"]', function(e){
	console.log("Hello");
	$(this).parents('.modal-footer').find('input[type="hidden"][name="event_id"]').val('');
	$('#delete_event_modal').modal('hide');
});


$('body').on('change', 'select[name="escrow_type"]', function(){
	console.log("adfdasf");
	if($(this).val() == 1){
    	$('input[type="text"][name="escrow_limit"]').val(1);
    	$('input[type="text"][name="escrow_limit"]').prop('disabled', true);
	}
    if($(this).val() == 2){
    	$('input[type="text"][name="escrow_limit"]').val("");
    	$('input[type="text"][name="escrow_limit"]').prop('disabled', false);
    }
});


/* Code to add comments to event */
 
$(document).on('click', 'button[type="button"][name="update_comment"]', function(e){

	var eventId = $('input[type="hidden"][name="edit_event_id"]').val();
	var comment = $('textarea[name="event_comment"]').val();
	var price = $('input[type="text"][name="price"]').val();
	var location = $('input[type="text"][name="location"]').val();
	var address = $('input[type="text"][name="address"]').val();
	var lat = $('input[type="hidden"][name="lat"]').val();
	var lng = $('input[type="hidden"][name="lng"]').val();
	var paymentFrom = $('select[name="payment_from"]').val();
	var deliveryMethod = $('select[name="delivery_method"]').val();
	var paymentWhen = $('select[name="payment_when"]').val();
	var dateTime = $('input[type="text"][name="escrow_date_time"]').val();
	var escrowType = 1 
	
	var escrowLimit = 1;
	if($('select[name="escrow_type"]').length >= 1)
	{ 
		escrowType = $('select[name="escrow_type"]').val(); 
		escrowLimit = $('input[type="text"][name="escrow_limit"]').val();
	}
	
	if(comment =='' || location ==''|| address == ''|| lat==''|| lng=='' || price == '' || dateTime == '' || escrowType == '')
	{
		$('.pop_up_message_box').html(MessageHelper.showMessage('error', 'Please provide comment, location, address, date-time and lat, lng and escrow type'));

		

		return false;
	}

	var events = {'eventId':eventId, 'comment':comment, 'location':location, 'address': address, 'lat':lat, 'lng':lng, 'price':price, 'paymentFrom':paymentFrom, 'deliveryMethod':deliveryMethod, 'paymentWhen':paymentWhen, 'dateTime':dateTime, 'escrowType':escrowType, 'escrowLimit':escrowLimit};

	var data = {'acid':601, 'payload':JSON.stringify(events)};   
    $.ajax({
  		url: BASE_URL + '/ajax',
  		data: data,
  		type: 'POST',
  		dataType: 'json',
  		success: function(response){	
  			if(response.flag == 0){
				$('.pop_up_message_box').html(MessageHelper.showMessage('error', response.message));
  			}
  			else
  			{
  				$('.pop_up_message_box').html(MessageHelper.showMessage('success', response.message));
  				setTimeout(function(){ window.location.reload();}, 5000);
  			}
  						    			
    				
  		},
  		error: function(e){
  			alert('Error processing your request: '+e.responseText);
  		}
  	});




	
});




</script>

<style>
.drop-events {
	border: 1px solid #FFF;
	padding: 20px 0px;
}
</style>


<!-- Event Delete Modal Start -->

<div class="modal fade" id="delete_event_modal" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content" style="background: #63141A;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Event Delete Confirmation ?</h4>
			</div>
			<div class="modal-body">
				<p>
					<b>Are you sure you want to delete this event from you calendar ?</b>
				</p>
			</div>
			<div class="modal-footer">
				<input type="hidden" name="event_id" />
				<button type="button" class="btn btn-danger" data-dismiss="modal" name="cancel_remove">No</button>
				<button type="button" class="btn btn-success" name="process_remove">Yes</button>
			</div>
		</div>

	</div>
</div>

<!-- Event Delete Modal End -->


<!-- Event Edit Modal Start -->

<div class="modal fade" id="add_location_comment_event_modal"
	role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content" style="background: #63141A;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Event</h4>
			</div>
			<div class="modal-body">
				<div clas="col-md-12">
					<form class="form-horizontal form-label-left">
						<div class="pop_up_message_box"></div>
						<div class="form-group">
							<div class="col-md-6">
								<label style="color: #FFF;">Data Type</label> 
								<input type="text" name="data_type" class="form-control" readonly>
							</div>
							<div class="col-md-6">
								<label style="color: #FFF;">Item</label> 
								<input type="text" name="item_name" class="form-control" readonly>						  		
							</div>
						</div>
						<div class="form-group"
							style="margin-left: 0px; margin-right: 0px;">
							<label style="color: #FFF;">Event Comment</label>
							<textarea name="event_comment" class="form-control" rows="3" required></textarea>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label style="color: #FFF;">Price that I am willing to pay or get</label> 
								<input type="text" name="price" class="form-control">
							</div>
							<div class="col-md-6">
								<label style="color: #FFF;">Currency</label> 
								<div class="input-group">
							  		<input type="text" name="actual_price" class="form-control" readonly>
						  			<span class="input-group-addon" id="basic-addon2">&euro;</span>
								</div>
								
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label style="color: #FFF;">Payment From</label> 
								<?php $paymentArr = array('1'=>'PCT Account', '2'=>'Cryptonator', '3'=>'Paypal', '4'=>'Bank Transfer', '5'=>'Other CC accounts', '6'=>'Cash', '7'=>'Shapeshift.io'); ?>
								<select class="form-control custom-select-box enable-me" name="payment_from" readonly>
                					<option value="0">Select</option>
                					<?php if($paymentArr): foreach ($paymentArr as $key => $val):?>
                					<option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                					<?php endforeach;endif;?>
            					</select>
							</div>
							<div class="col-md-6">
								<label style="color: #FFF;">Delivery Method</label> 
								<?php $deliveryArr = array('1'=>'By Seller', '2'=>'By Post', '3'=>'Pickup by Buyer from given location', '4'=>'Mental'); ?>
        						<select class="form-control custom-select-box enable-me" name="delivery_method" readonly>
                					<option value="0">Select</option>
                					<?php if($deliveryArr): foreach ($deliveryArr as $key => $val):?>
                					<option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                					<?php endforeach;endif;?>
            					</select>
								
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-md-6">
								<label style="color: #FFF;">When is the escrow released</label> 
								<?php $deliveryArr = array('1'=>'done/delivered', '2'=>'sent', '3'=>'plans ready', '4'=>'Write to notes'); ?>
								<select class="form-control custom-select-box enable-me" name="payment_when" readonly>
        							<option value="0">Select</option>
                					<?php if($deliveryArr): foreach ($deliveryArr as $key => $val):?>
                					<option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                					<?php endforeach;endif;?>
            					</select>
							</div>
							<div class="col-md-6">
								<label style="color: #FFF;">Date Time</label> 
								<input type="text" name="escrow_date_time" class="form-control" required/>
								
							</div>
						</div>
					
						<?php if($this->session->userdata('membershipLevel') > 3) :?>
						<div class="form-group">
							<div class="col-md-6">
								<label style="color: #FFF;">Select Escrow Type</label> 
								<?php $deliveryArr = array('1'=>'Single', '2'=>'Multiple'); ?>
								<select class="form-control custom-select-box enable-me" name="escrow_type" readonly>
        							<option value="0">Select</option>
                					<?php if($deliveryArr): foreach ($deliveryArr as $key => $val):?>
                					<option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                					<?php endforeach;endif;?>
            					</select>
							</div>
							<div class="col-md-6">
								<label style="color: #FFF;">Escrow Limit</label> 
								<input type="text" name="escrow_limit" class="form-control"/>
							</div>
							<div class="clearfix"></div>
						</div>
						<?php endif;?>
						<div class="form-group"
							style="margin-left: 0px; margin-right: 0px;">
							<label style="color: #FFF;">Location</label> 
							<input type="text" name="location" class="form-control" placeholder="Enter your location here" required>
						</div>
						<div class="form-group"
							style="margin-left: 0px; margin-right: 0px;">
							<label style="color: #FFF;">Address</label> 
							<input type="text" name="address" class="form-control">
						</div>
						<div class="form-group"
							style="margin-left: 0px; margin-right: 0px;">
							<div id="map"></div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<input type="hidden" name="edit_event_id" />
				<input type="hidden" name="lat">
				<input type="hidden" name="lng">
				<button type="button" class="btn btn-danger" data-dismiss="modal" name="cancel_remove">No</button>
				<button type="button" class="btn btn-success" name="update_comment">Yes</button>
			</div>
		</div>

	</div>
</div>

<!-- Event Edit Modal End -->

<script type="text/javascript"
	src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBEhsWhrYpbiuyOi2czg7P49ZW27Uow51c&libraries=places"></script>

<script>
	$(function(){
		$('input[type="text"][name="escrow_date_time"]').datetimepicker();
		$('[data-toggle="tooltip"]').tooltip() ;
// 		$('.bootstrap-datetimepicker-widget').show();
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

$(function(){
	/* Check the user membership status*/
	console.log("dasfdasfdasf");
	var membershipStatus = "<?php echo $this->session->userdata('membershipLevel');?>";

	if(membershipStatus <= 3)
	{
		$('select[name="payment_from"] option[value="6"]').prop('disabled', true);
	}
		
	
});

$('select[name="payment_from"]').on('change', function(){
	
});


 $('input[type="text"][name="escrow_limit"]').on('keyup', function(){
	
	var $this = $(this);
	$this.removeClass('hasError');
	$('.limit_error').remove();
 	$('button[name="update_comment"]').prop('disabled', false); 
	var payload = {'escrow_limit': $(this).val()}	
	var data = {'acid':13000, 'payload':JSON.stringify(payload)}
	AjaxCommon.startAjaxRequest(BASE_URL+'/ajax', data).done(function(response){
		if(response.flag == 0){
			$this.addClass('hasError');
			$('button[name="update_comment"]').prop('disabled', true); 
			//MessageHelper.showAlertModal(response.message);

			$this.parents('.form-group').append('<span class="limit_error" style="color:#fff; margin-top:10px; margin-left:12px;">'+response.message+'</span>');
		}		
			
	});
}); 


	  



	initialize();

</script>

<style>
.pac-container {
	z-index: 999999 !important;
}

#map {
	height: 200px;
}
.modal .popover, .modal .tooltip {
    z-index:100000000;
}
.hasError{
border:2px solid red !important;
</style>