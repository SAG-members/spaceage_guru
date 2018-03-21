<?php 
// $lockIcon = 'fa fa-lock';
$lockIcon = '';

if($this->session->userdata('user_id')) $lockIcon = '';

?>
<style>
.select2-selection{
    display: block !important;
    width: 100% !important;
    height: 33px !important;
}
.has-error{
    color: #fff;
    border:1px solid red;
    background : red;
}
::-webkit-input-placeholder { /* Chrome */
  color: #fff;
}
:-ms-input-placeholder { /* IE 10+ */
  color: #fff;
}
::-moz-placeholder { /* Firefox 19+ */
  color: #fff;
  opacity: 1;
}
:-moz-placeholder { /* Firefox 4 - 18 */
  color: #fff;
  opacity: 1;
}
</style>
<div class="leftmain">
	<ul class="left-menu-items">
		<li class="text-center menu-li-style"><a href="<?php echo base_url();?>">HOME</a></li>		
		<li class="text-center menu-li-style">
			<i class="pull-left <?php echo $lockIcon; ?>"></i> Data
			<a class="pull-right add-pss" href="<?php echo base_url('user/dashboard#myProducts');?>" title="View My Data" alt="View My Data"><i class="fa fa-bars"></i> </a>
			<a class="pull-right add-pss" href="<?php echo base_url('user/add/data');?>" title="Add Data" alt="Add Data"><i class="fa fa-plus"></i> </a>			
		</li>		
	</ul>
	
	<h4 class="modal-title">Add Event</h4>
	<form name="newEvent" method="post" action="<?php echo base_url('add/new/event'); ?>" enctype="multipart/form-data">
	<div class="form-group font-10 mar-t-10">
		<div clas="col-md-12">
			<div class="form-group">
        		<div class="col-md-6">
        			<label style="color: #FFF;">Topic</label> 
        			<input type="text" name="data_type" class="form-control">
        		</div>
        		<div class="col-md-6">
        			<label style="color: #FFF;">Item</label> 
        			<select class="form-control" name="item_name" >
        				<option value="0">Select</option>
        				<?php if($leftSideData['datas']) : foreach ($leftSideData['datas'] as $d):?>
        				<option value="<?php echo $d->{Page::_ID} ?>"><?php echo $d->{Page::_PAGE_TITLE} ?></option>
        				<?php endforeach; endif; ?>
        			</select>        									  		
        		</div>
        		<div class="clearfix"></div> 
    		</div>
    		
			<div class="form-group">    		   		
        		<div class="col-md-12">
    				<label style="color: #FFF;">Event Comment</label>
    				<textarea name="event_comment" class="form-control" rows="3" ></textarea>
    			</div>
    			<div class="clearfix"></div>
			</div>
			
			<div class="form-group"> 
    			<div class="col-md-6">
        			<label style="color: #FFF;">Add Image</label> 
        			<input type="file" name="file" class="form-control">
        		</div>
        		<div class="col-md-6">
        			<div class="row">
        			<div class="col-md-6">
            			<label style="color: #FFF;">Target Price</label>
            			<div class="input-group">
            				<input type="text" name="pct_price" class="form-control">
            				<span class="input-group-addon">PCT</span>
            			</div> 
            			
            		</div>
            		<div class="col-md-6">
            			<label style="color: #FFF;">&nbsp;</label> 
            			<div class="input-group">
            				<input type="text" name="price" class="form-control">
            				<div class="input-group-addon" style="padding: 0;">
                                <select name="price_currency" style="height: 32px;">
                                	<?php if($leftSideData['currencies']) : foreach ($leftSideData['currencies'] as $cu) : ?>
                                	<option value="<?php echo $cu->{Currency::_ID} ?>"><?php echo $cu->{Currency::_SYMBOL}; ?></option>
                                	<?php endforeach; endif; ?>
                                </select>
                          	</div>
            			</div>						  		
            		</div>			
            		</div>			  		
        		</div>
        		<div class="clearfix"></div>
    		</div>
    		
    		<div class="form-group"> 
        		<div class="col-md-6">
        			<label style="color: #FFF;">Payment From</label> 
        			<?php $paymentArr = array('1'=>'PCT Account', '2'=>'Cash'); ?>
    				<select class="form-control" name="payment_from">    					
    					<?php if($paymentArr): foreach ($paymentArr as $key => $val):?>
    					<option value="<?php echo $key; ?>"><?php echo $val; ?></option>
    					<?php endforeach;endif;?>
    				</select>						  		
        		</div> 
        		   		
        		<div class="col-md-6">
    				<label style="color: #FFF;">Delivery Method</label>
    				<?php $deliveryArr = array('1'=>'By Seller', '2'=>'By Post', '3'=>'Pickup by Buyer from given location', '4'=>'Mental'); ?>
    				<select class="form-control" name="delivery_method">    					
    					<?php if($deliveryArr): foreach ($deliveryArr as $key => $val):?>
    					<option value="<?php echo $key; ?>"><?php echo $val; ?></option>
    					<?php endforeach;endif;?>
    				</select>
    			</div>
    			<div class="clearfix"></div>
    		</div>
			
			<div class="form-group">
    			<div class="col-md-6">
        			<label style="color: #FFF;">When is the escrow released</label> 
        			<?php $deliveryArr = array('1'=>'done/delivered', '2'=>'sent', '3'=>'plans ready', '4'=>'Write to notes'); ?>
    				<select class="form-control" name="payment_when">    					
    					<?php if($deliveryArr): foreach ($deliveryArr as $key => $val):?>
    					<option value="<?php echo $key; ?>"><?php echo $val; ?></option>
    					<?php endforeach;endif;?>
    				</select>					  		
        		</div> 
        		   		
        		<div class="col-md-6">
    				<label style="color: #FFF;">Date Time</label>
    				<?php if($this->session->userdata('membershipLevel') > 3) :?>
    				<input type="checkbox" name="has_date_time" checked data-toggle="toggle">  
    				<?php endif; ?>
    				<input type="text" name="escrow_date_time" class="form-control"/>
    			</div>   		
    			<div class="clearfix"></div>
    		</div>
    		
    		
    		<div class="form-group">
    			<div class="col-md-6">
        			<label style="color: #FFF;">Select Escrow Type</label> 
        			<?php $deliveryArr = array('1'=>'Single', '2'=>'Multiple'); ?>
					<select class="form-control" name="escrow_type">
						<option value="0">Select</option>
    					<?php if($deliveryArr): foreach ($deliveryArr as $key => $val):?>
    					<option value="<?php echo $key; ?>"><?php echo $val; ?></option>
    					<?php endforeach;endif;?>
					</select>				  		
        		</div> 
        		   		
        		<div class="col-md-6">
        			<div class="row">
        			<div class="col-md-6">
            			<label style="color: #FFF;">Escrow Limit</label> 
            			<input type="text" name="min_limit" class="form-control" placeholder="Minimum">
            		</div>
            		<div class="col-md-6">
            			<label style="color: #FFF;">&nbsp;</label> 
            			<input type="text" name="max_limit" class="form-control" placeholder="Maximum">						  		
            		</div>			
            		</div>		
            		<div class="clearfix"></div>	  		
        		</div> 		
    			<div class="clearfix"></div>
    		</div>
    		
    		<div class="form-group" >
    			<div class="col-md-12">
    				<label style="color: #FFF;">Location</label> 
    				<input type="text" name="location" class="form-control" placeholder="Enter your location here" >
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
    				<label style="color: #FFF;">Address</label> 
    				<input type="text" name="address" class="form-control">
    			</div>
    			<div class="clearfix"></div>
			</div>
			
			<div class="form-group">
				<div class="col-md-12">
					<div id="map" style="height:200px;"></div>
				</div>
				<div class="clearfix"></div>
			</div>
    		
    		<div class="form-group">
    			<div class="col-md-12">
    				<input type="hidden" name="edit_event_id" />
    				<input type="hidden" name="lat">
    				<input type="hidden" name="lng">    				
    				<button type="submit" class="btn btn-success" name="update_comment" value="2">Save</button>
				</div>
				<div class="clearfix"></div>
			</div>
    		
		</div>
		
		<div class="clearfix"></div>
	</div>
	</form>
	<div class="clearfix"></div>
	
	
	
</div>	

<link rel="stylesheet" href="<?php echo base_url('assets/css/select2/select2.min.css'); ?>">
<script src="<?php echo base_url(); ?>assets/js/plugin/select2/select2.full.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.datetimepicker.min.css'); ?>">
<script src="<?php echo base_url(); ?>assets/js/jquery.datetimepicker.full.js"></script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEhsWhrYpbiuyOi2czg7P49ZW27Uow51c&libraries=places"></script>

<script>
$(function(){
	$('select[name="item_name"]').select2();	
	initialize();
	jQuery('input[type="text"][name="escrow_date_time"]').datetimepicker();
});

$('button[type="submit"][name="update_comment"]').on('click', function(e){
	e.preventDefault();

	var flag = true;
	$('form[name="newEvent"]').find('input,select').each(function(e){
		
		if($(this).attr('type') == 'file') return 1;
		if($(this).val() == ""){
			$(this).addClass('has-error');	
			$(this).prop('placeholder', 'Field is required');
			
			flag = false;
		}
		flag = true;
		
	});
	console.log(flag);
	if(!flag) return false;
	$('form[name="newEvent"]').submit();
	
		
// 	var topic = $('input[type="text"][name="data_type"]').val();
// 	var itemName = $('select[name="item_name"]').val();
// 	var eventComment = $('textarea[name="event_comment"]').val();
// 	var pctPrice = $('input[type="text"][name="pct_price"]').val();
// 	var price = $('input[type="text"][name="price"]').val();
// 	var priceCurrency = $('select[name="price-currency"]').val();
// 	var paymentFrom = $('select[name="payment_from"]').val();
// 	var deliveryMethod = $('select[name="delivery_method"]').val();
// 	var paymentWhen = $('select[name="payment_when"]').val();
// 	var escrowDateTime = $('select[name="escrow_date_time"]').val();
// 	var hasDateTime = $('input[type="checkbox"][name="has_date_time"]').val();
// 	var escrowType = $('input[type="text"][name="escrow_type"]').val();
	
});

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
var center = new google.maps.LatLng(-4.679574, 55.491977);

geocoder = new google.maps.Geocoder();
function initialize() 
{
	var mapOptions = { 
		zoom: 1,
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

