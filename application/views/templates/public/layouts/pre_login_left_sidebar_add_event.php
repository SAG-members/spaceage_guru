<?php 
// $lockIcon = 'fa fa-lock';
$lockIcon = '';

if($this->session->userdata('user_id')) $lockIcon = '';
$result = get_lat_lng_by_ip();

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
            				<input type="text" name="price" class="form-control" readonly>
            				<div class="input-group-addon" style="padding: 0;">
                                <select name="price_currency" style="height: 32px;">
                                	<?php if($leftSideData['currencyRates']): foreach ($leftSideData['currencyRates'] as $r) : ?>
                                		<?php $selected = ""; if($r->{pct_setting::_CURRENCY} == $leftSideData['profile']->{User::_CURRENCY}) $selected = "selected";?>
                                		<option <?php echo $selected; ?> value="<?php echo $r->{pct_setting::_CURRENCY} ?>" data-rate="<?php echo $r->{pct_setting::_CONVERSION_RATE}?>">
                                		<?php echo $this->currency->get_by_id($r->{pct_setting::_CURRENCY}, Currency::_CURRENCY_NAME); ?>-
                                		<?php echo $this->currency->get_by_id($r->{pct_setting::_CURRENCY}, Currency::_CURRENCY_SYMBOL); ?>
                                		</option>
                                	<?php endforeach; endif;?>
                                	
                                	
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
					<div id="map" style="height:400px;"></div>
				</div>
				<div class="clearfix"></div>
			</div>
    		
    		<div class="form-group">
    			<div class="row">
    			<div class="col-md-12">
    				<input type="hidden" name="edit_event_id" />
    				<input type="hidden" name="lat">
    				<input type="hidden" name="lng">
    				
    				<?php if($leftSideData['profile']->{User::_EVENT_DEFAULT_ADDRESS} != 0):?>
    					<?php if($leftSideData['profile']->{User::_EVENT_DEFAULT_ADDRESS} == 1) :?>
        					<input type="hidden" name="current_lat" value="<?php echo $leftSideData['profile']->{User::_HOME_LAT}; ?>">
        					<input type="hidden" name="current_lng" value="<?php echo $leftSideData['profile']->{User::_HOME_LNG}; ?>">	
    					<?php elseif ($leftSideData['profile']->{User::_EVENT_DEFAULT_ADDRESS} == 2) :?>
    						<input type="hidden" name="current_lat" value="<?php echo $leftSideData['profile']->{User::_WORK_LAT}; ?>">
    						<input type="hidden" name="current_lng" value="<?php echo $leftSideData['profile']->{User::_WORK_LNG}; ?>">
    					<?php elseif ($leftSideData['profile']->{User::_EVENT_DEFAULT_ADDRESS} == 3) :?>
        					<input type="hidden" name="current_lat" value="<?php echo $result->latitude; ?>">
    						<input type="hidden" name="current_lng" value="<?php echo $result->longitude; ?>">
    					<?php endif;?>    					
    				<?php else :?>
    					<?php if(!empty($result)) :?>
        				<input type="hidden" name="current_lat" value="<?php echo $result->latitude; ?>">
        				<input type="hidden" name="current_lng" value="<?php echo $result->longitude; ?>">
        				<?php else :?>    				
        				<input type="hidden" name="current_lat">
        				<input type="hidden" name="current_lng">
        				<?php endif; ?>    				
    				<?php endif;?>  
    				
    				<div class="form-group">
    					
    					<div class="col-md-10">
    						<label class="control-label">Set offer range (in kilometer)</label>
    						<div class="slidecontainer mar-t-15">
        						<input type="range" min="1" max="20037.5" value="0" class="slider" id="myRange">
        					</div>
    					</div>    					
    					<div class="col-md-2">
    						<input type="text" class="form-control" name="kms-range" readony>
    					</div>
    					<div class="clearfix"></div>
    				</div>
    				
    				 				
    				<div class="mar-t-20"></div>
    				<button type="submit" class="btn btn-success" name="update_comment" value="2">Save</button>
				</div>
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

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo $this->config->item('google_map_api_key'); ?>&libraries=places"></script>

<script>

var positions = "";

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


var currentLat = -4.679574;
var currentLng = 55.491977

if($('input[type="hidden"][name="current_lat"]').val() !="")
{
	currentLat = $('input[type="hidden"][name="current_lat"]').val();
}
if($('input[type="hidden"][name="current_lng"]').val() !="")
{
	currentLng = $('input[type="hidden"][name="current_lng"]').val();
}

var geocoder;
var map;
var infowindow;
var marker;
var center = new google.maps.LatLng(currentLat, currentLng);
var circle;

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

    get_circle_in_map(100, marker);

    google.maps.event.addListenerOnce(map, 'tilesloaded', function(){
    	geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) 
	  		{
				if (results[0]) 
	  			{
					$('input[type="text"][name="location"]').val(results[0].formatted_address);
					$('input[type="text"][name="address"]').val(results[0].formatted_address);
					$('input[type="hidden"][name="lat"]').val(marker.getPosition().lat());
					$('input[type="hidden"][name="lng"]').val(marker.getPosition().lng());
				}
			}
		});
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


$('select[name="price_currency"]').on('change', convert_rate);
$('input[type="text"][name="pct_price"]').on('keyup', convert_rate);


function convert_rate()
{
	var conversionRate = $('select[name="price_currency"]').find(':selected').data('rate');
	var pctVal = $('input[type="text"][name="pct_price"]').val();

	convertedVal = parseFloat(conversionRate) * parseFloat(pctVal);
	
	$('input[type="text"][name="price"]').val(convertedVal);
}

$('button[type="button"][name="home-location"]').on('click', function(e){
	console.log(e);
// 	e.preventDefault();

	var lat = $(this).data('homeLat');
	var lng = $(this).data('homeLng');
	var address = $(this).data('homeAddress');
	
});


$(function(){
	console.log("Tesw");
	$("input[type='text'][name='kms-range']").val($("#myRange").val());

	
});

// Update the current slider value (each time you drag the slider handle)
$("#myRange").on('input', function() {
    var $this = $(this);

    $("input[type='text'][name='kms-range']").val($this.val());

    removeCircles();	
    get_circle_in_map($this.val(), marker);
});


function get_circle_in_map(radius, marker)
{	
	circle = new google.maps.Circle({
    	map: map,
        radius:  radius*1000,    // 10 miles in metres
        strokeOpacity:0.3
    });
    
    circle.bindTo('center', marker, 'position');
}

function removeCircles()
{
	circle.setMap(null);	
}



</script>

