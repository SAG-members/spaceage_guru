<?php if($this->session->userdata('membershipLevel') == 1) :?>
	<h2>Please complete your profile to get registered member benefits</h2>
<?php endif;?>
<div class="profile">
	<div class="panel panel-default mar-t-20">
		<div class="panel-heading">
			<h2>User Profile</h2>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="tabs widget">
					<ul class="nav nav-tabs widget">
						<li class="active"><a data-toggle="tab" href="#profile-tab">
								Profile <span class="menu-active"></span>
						</a></li>
						<li class=""><a data-toggle="tab" href="#projects-tab"> Change
								Password <span class="menu-active"></span>
						</a></li>
						<li class=""><a data-toggle="tab" href="#photos-tab"> PPQ
								<span class="menu-active"></span>
						</a></li>
						<li class=""><a data-toggle="tab" href="#rpq-tab"> RPQ
								<span class="menu-active"></span>
						</a></li>
						<li class=""><a data-toggle="tab" href="#wpq-tab"> WPQ
								<span class="menu-active"></span>
						</a></li>
						<li class=""><a data-toggle="tab" href="#subscriptions-tab"> Subscriptions
								<span class="menu-active"></span>
						</a></li>
						<li class=""><a data-toggle="tab" href="#invite-tab"> Invite
								<span class="menu-active"></span>
						</a></li>
						<li class=""><a data-toggle="tab" href="#tous-tab"> TOUS
								<span class="menu-active"></span>
						</a></li>
						<li class=""><a data-toggle="tab" href="#ewallet-tab"> E-Wallet
								<span class="menu-active"></span>
						</a></li>
<!-- 						<li class=""><a data-toggle="tab" href="#pct-ewallet-tab"> PCT Wallet -->
<!-- 								<span class="menu-active"></span> -->
<!-- 						</a></li> -->
					</ul>
					<div class="tab-content">
						<div id="ewallet-tab" class="tab-pane">
							<div class="pad-20">
							<form method="post" action="<?php echo base_url('profile/update-ewallet')?>">
								<label class="control-label">Please write to which address payments dedicated to your escrow acccounts and in the case of cashout from account closure will be paid :</label>
								
								<input type="text" name="e_wallet_address" class="password" value="<?php echo $profile->{User::_E_WALLET_ADDRESS};?>" required/>
								<button class="addtocart" name="e_wallet_address_button" type="submit">Submit</button>
									
							</form>
							</div>
						</div>
						
						
						<div id="pct-ewallet-tab" class="tab-pane">
							<div class="pad-20">
							<input type="text" class="password" name="pct-wallet-amount" value="PCT <?php echo $profile->{User::_PCT_WALLET_AMOUNT}; ?>" readonly/>
							<h3> Recent Transactions</h3>
							</div>
						</div>
						
						<div id="profile-tab" class="tab-pane active">
							<div class="pad-20">
								<form method="post" action="<?php echo base_url('profile');?>" enctype="multipart/form-data">
								
								<div>
									<label class="control-label">Select the country where you desire to use the program</label>
									<div class="profile">
									<select name="country" class="password">
		 								<option value="0">Select Country</option>
										<?php if($countries): foreach ($countries as $country): $selected = '';?>
										<?php if($country['id']=== $profile->{User::_COUNTRY}){$selected = 'selected="selected"';}?>
										<option value="<?php echo $country['id'];?>" <?php echo $selected?>><?php echo $country['name']?></option>
										<?php endforeach; endif;?>
 									</select>
 									</div>
								</div>
								
								<div class="row mar-t-10">
									<div class="col-sm-6">
										<label class="control-label">First Name</label>
										<input type="text" class="password" name="firstname" value="<?php echo $profile->{User::_F_NAME}?>"/>
									</div>
									<div class="col-sm-6">
										<label class="control-label">Last Name</label>
										<input type="text" class="password" name="lastname" value="<?php echo $profile->{User::_L_NAME}?>"/>
											<!-- col-sm-10 -->
									</div>
								</div>
								<div class="row mar-t-10">
									<div class="col-sm-6">
										<label class="control-label">Username</label>
										<input type="email" class="password" name="email" value="<?php echo $profile->{User::_USERNAME}?>" disabled/>
									</div>
									<div class="col-sm-6">
										<label class="control-label">Email</label>
										<input type="email" class="password" name="secondary-email" value="<?php echo $profile->{User::_EMAIL}?>"/>
									</div>
								</div>
								
								<?php $genderArr = array('1'=>'Male', '2'=>'Female', '3'=>'Genderless'); ?>
								
								<div class="row mar-t-10">
									<div class="col-sm-6">
										<label class="control-label">Gender</label>
										<select name="user_gender" class="password">
										  <option value="0">Select Gender</option>
										  <?php foreach ($genderArr as $k => $v) :?>
										  <?php $selected = ""; if($k == $profile->{User::_GENDER}){$selected = "selected='selected'";}?>
										  <option value="<?php echo $k?>" <?php echo $selected; ?>><?php echo $v;?></option>
										  <?php endforeach;?>
										</select>
									</div>
									<div class="col-sm-6">
										<label class="control-label">Phone</label>
										<input type="number" class="password" name="number" value="<?php echo $profile->{User::_MOBILE}?>"/>
									</div>
								</div>
								
								<div class="row mar-t-10">
									<div class="col-sm-6">
										<label class="control-label">Secret Question</label>
										<input type="text" class="password" name="secret-question" value="<?php echo $profile->{User::_SECRET_QUESTION}?>"/>
									</div>
									<div class="col-sm-6">
										<label class="control-label">Secret Question Answer</label>
										<input type="text" class="password" name="secret-question-answer" value=""/>
											<!-- col-sm-10 -->
									</div>
								</div>
								
								<div>
								    <label class="control-label">What are you?</label>
									<textarea style="height: auto;" class="password" name="what_are_you"><?php echo $profile->{User::_WHAT_ARE_YOU}?></textarea>
								
									<label class="control-label">What do you want to become?</label>
									<textarea style="height: auto;" class="password" name="what_you_want_to_become"><?php echo $profile->{User::_WHAT_YOU_WANT_TO_BECOME}?></textarea>
									
									<!-- <label class="control-label">What is the problem that is preventing you from becoming the one you desire to become ?</label> -->
									<label class="control-label">What do you need ?</label>
									<textarea style="height: auto;" class="password" name="what_do_you_need"><?php echo $profile->{User::_WHAT_DO_YOU_NEED}?></textarea>
								</div>
									
								<div class="row mar-t-10">
									<div class="col-sm-6">
										<label class="control-label">Avatar Name</label>
										<input type="text" class="password" name="avtarname" value="<?php echo $profile->{User::_AVATAR_NAME}?>"/>
											<!-- col-sm-10 -->
										
									</div>									
									<div class="col-sm-6">
										<label class="control-label">Currency</label> 
										<select name="currency" class="password">
											<option>select</option>
											<?php if($currencyRates) : foreach ($currencyRates as $r) : ?>
											<?php $selected = ""; if($r->{pct_setting::_CURRENCY} == $profile->{User::_CURRENCY}){ $selected = "selected"; } ?>
											<option <?php echo $selected; ?> value="<?php echo $r->{pct_setting::_CURRENCY} ?>" data-rate="<?php echo $r->{pct_setting::_CONVERSION_RATE}?>">
											<?php echo $this->currency->get_by_id($r->{pct_setting::_CURRENCY}, Currency::_CURRENCY_NAME); ?>-
											<?php echo $this->currency->get_by_id($r->{pct_setting::_CURRENCY}, Currency::_CURRENCY_CODE); ?>-
											<?php echo $this->currency->get_by_id($r->{pct_setting::_CURRENCY}, Currency::_CURRENCY_SYMBOL); ?>
											</option>
                                        	<?php endforeach; endif; ?>
										</select>
									</div>
								</div>
								
								<div class="mar-t-10">
									<label class="control-label">Home Address</label>
									<input type="text" class="password" name="home-address" value="<?php echo $profile->{User::_HOME_ADDRESS}?>"/>
									<input type="hidden"  name="home-lat" value="<?php echo $profile->{User::_HOME_LAT}?>">
									<input type="hidden"  name="home-lng"  value="<?php echo $profile->{User::_HOME_LNG}?>">
								</div>
								
								<div class="mar-t-10">
									<label class="control-label">Work Address</label>
									<input type="text" class="password" name="work-address"  value="<?php echo $profile->{User::_WORK_ADDRESS}?>"/>
									<input type="hidden"  name="work-lat"  value="<?php echo $profile->{User::_WORK_LAT}?>">
									<input type="hidden" name="work-lng"  value="<?php echo $profile->{User::_WORK_LNG}?>">
								</div>
								<?php 
								$preferredLocationArr = array(
								    "1"=>"Home",
								    "2"=>"Work",
								    "3"=>"Current"
								);
								
								?>
								<div class="mar-t-10">
									<label class="control-label">Preferred Event Location</label>
									<select class="password" name="preferred-event-location">
										<option value="0">Select</option>
										<?php if($preferredLocationArr): foreach ($preferredLocationArr as $k => $v) :?>
										<?php $selected=""; if($k == $profile->{User::_EVENT_DEFAULT_ADDRESS}) $selected="selected"; ?>
										<option <?php echo $selected; ?> value="<?php echo $k?>"><?php echo $v; ?></option>
										<?php endforeach; endif;?>
									</select>
								</div>
								
								
								<div class="form-group">
									<label class="control-label">Search offers in Range (in kilometer)</label>
								<div class="row">
                					<div class="col-md-10">
                						<div class="slidecontainer mar-t-15">
                    						<input type="range" min="0" max="20037.5" value="<?php echo $profile->{User::_OFFER_IN_RADIUS}?>" class="slider" id="myRange">
                    					</div>
                					</div>    					
                					<div class="col-md-2">
                						<input type="text" class="form-control" name="kms-range" readonly value="<?php echo $profile->{User::_OFFER_IN_RADIUS}?>">
                					</div>
                				</div>
                					<div class="clearfix"></div>
                				</div>
								
								<?php
								
									$avtar = $profile->{User::_AVATAR_IMAGE} == "" ? '' : '<img src="'.base_url(Template::_PUBLIC_AVTAR_DIR.$profile->{User::_AVATAR_IMAGE}).'" width="120px;" height="120px"/>';?>
								<div class="mar-t-20">
									<div class="avtar-image-box" style="margin:0px auto;">
										<div class="fileUpload" style="bottom: 0px; position:absolute; color: #FFF;"><i class="fa fa-camera fa-2x"></i><input type="file" class="upload" id="profile-avtar" name="file"/></div>
										<?php echo $avtar;?>
									</div>
								</div>
								
								<div class="row mar-t-10">
									<div class="col-sm-12">
										<input type="hidden" name="user-id" value="<?php echo $profile->{User::_ID}?>"/>
										<input type="submit" name="btn-update-details" class="btn btn-primary" value="Update Details"/>
									</div>
								</div>
								</form>
							<!-- row -->
							
								<div class="mar-t-10">
									<h4>Get a summary of personality trade with explanation/teaching how to improve oneself.</h4>
									<br/>
									<!-- Order RSS Feed Button -->
									<div class="buttonmain">
										<h2><img src="<?php echo base_url('assets/img/rss.png')?>" height="150" /></h2>
										<h3>News feed to communication field</h3>
									<!-- 	<p>Simply add an RSS feed URL from any website or blog and have new posts automatically delivered to your inbox.</p> -->
									    <div class="onoffswitch">
									        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch">
									        <label class="onoffswitch-label" for="myonoffswitch">
									            <span class="onoffswitch-inner"></span>
									            <span class="onoffswitch-switch"></span>
									        </label>
									    </div>
									</div>
									
								</div>
							</div>
							<!-- pd-20 -->
						</div>
						<!-- home-tab -->
	
						<div id="projects-tab" class="tab-pane">
							<div class="pad-20">
								<form method="post" action="<?php echo base_url('profile/change-password')?>">
								<div class="row mar-t-10">
									<label class="control-label">Current Password</label>
									<input type="password" class="password" name="cpassword"/>
								</div>
								<div class="row mar-t-10">
									<label class="control-label">New Password</label>
									<input type="password" class="password" name="npassword"/>
								</div>
								<div class="row mar-t-10">
									<label class="control-label">Confirm Password</label>
									<input type="password" class="password" name="rpassword"/>
								</div>
								<div class="row mar-t-10">
									<input type="hidden" name="user-id" value="<?php echo $profile->{User::_ID}?>"/>
									<input type="submit" name="" class="btn btn-primary" value="Change Password"/>
								</div>
								</form>
							</div>
						</div>
	
						<div id="photos-tab" class="tab-pane">
							<?php $this->load->view('templates/public/module/auth/profile_questionnaire');?>
						</div>
						
						<div id="rpq-tab" class="tab-pane">
							<?php $this->load->view('templates/public/module/auth/profile_rpq');?>
						</div>
						
						<div id="wpq-tab" class="tab-pane">
							<?php $this->load->view('templates/public/module/auth/profile_wpq');?>
						</div>
						
						
						<div id="invite-tab" class="tab-pane">
							<?php if($this->session->userdata('membershipLevel') > 2):?>
							<input type="text" name="user-email" class="password" placeholder="Add User Email to Invite"/>
							<input type="text" name="coupon" class="password" placeholder="Enter Coupon Code"/>
							<button class="addtocart btn-round-red" name="btn-invite-user" type="button">Invite</button>
							<?php else :?>
							<div class="alert alert-danger">You have to be UU or Member to invite friends</div>
							<?php endif;?>
						</div>
						
						<div id="tous-tab" class="tab-pane">
							<?php if($profile->{User::_USER_MEMBERSHIP_LEVEL} > 3) :?>
							<h3>Member TOUS</h3>
							<?php else :?>
							<h3>User TOUS</h3>
							<?php endif;?>
							<div class="pad-20 services_text"><?php echo $tandc;?></div>	
						</div>
					</div>
					<!-- tab-content -->
				</div>
				<!-- tabs-widget -->
	
			</div>
		</div>
	</div>
</div>


<!--  Data Modal Start Here -->
<div id="manage_rss_feed_modal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<form method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<?php if($this->session->userdata('id')): ?>
					<input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo generate_user_id($this->session->userdata('id'));?>" readonly required>
					<input type="hidden" class="form-control" name="user-id" value="<?php echo $this->session->userdata('id');?>" required>
					<?php else :?>
					<input type="email" class="form-control" placeholder="Email" name="email" required>
					<?php endif;?>
					<input type="hidden" name="item-type" value="<?php echo Page::_CATEGORY_PROFILE?>"/>
					<input type="hidden" name="item-id" value="<?php echo $this->session->userdata('id');?>"/>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" name="btn-confirm-subscription">Subscribe</button>
				</div>
			</form>
		</div>

	</div>
</div>
<div class="clearfix"></div>
<!-- Data Modal Ends Here -->



<script type="text/javascript">
$(function(){
	<?php if($this->session->has_userdata('member_upgrade_message')) : ?>
	$().toastmessage('showSuccessToast', "<?php echo $this->session->userdata('member_upgrade_message'); ?>");
	<?php endif; ?>	

	<?php if($invite_friend && $invite_friend == 'invite_friend') :?>
	$('a[data-toggle="tab"][href="#invite-tab"]').trigger('click');
	<?php else : ?>
	$('a[data-toggle="tab"][href="#profile-tab"]').trigger('click');
	<?php endif;?>

	
});
</script>


<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEhsWhrYpbiuyOi2czg7P49ZW27Uow51c&libraries=places"></script>
<script>

$('input[type="text"][name="home-address"]').on('keyup', function(){
	  
	var places = new google.maps.places.Autocomplete($(this)[0]);

	google.maps.event.addListener(places, 'place_changed', function () 
	{
	  	var place = places.getPlace();
        var address = place.formatted_address;
        var latitude = place.geometry.location.lat();
        var longitude = place.geometry.location.lng();

        $('input[type="hidden"][name="home-lat"]').val(latitude);
        $('input[type="hidden"][name="home-lng"]').val(longitude);
	});
});

$('input[type="text"][name="work-address"]').on('keyup', function(){
	  
	var places = new google.maps.places.Autocomplete($(this)[0]);

	google.maps.event.addListener(places, 'place_changed', function () 
	{
	  	var place = places.getPlace();
        var address = place.formatted_address;
        var latitude = place.geometry.location.lat();
        var longitude = place.geometry.location.lng();

        $('input[type="hidden"][name="work-lat"]').val(latitude);
        $('input[type="hidden"][name="work-lng"]').val(longitude);
	});
});

//Update the current slider value (each time you drag the slider handle)
$("#myRange").on('input', function() {
    var $this = $(this);

    $("input[type='text'][name='kms-range']").val($this.val());	
    
});

</script>
