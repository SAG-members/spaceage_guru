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
									<select name="country">
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
										<select name="user_gender">
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
									<textarea style="height: auto;" class="password" name="problem_preventing"><?php echo $profile->{User::_PROBLEM_PREVENTING}?></textarea>
								</div>
									
								<div class="row mar-t-10">
									<div class="col-sm-6">
										<label class="control-label">Avatar Name</label>
										<input type="text" class="password" name="avtarname" value="<?php echo $profile->{User::_AVATAR_NAME}?>"/>
											<!-- col-sm-10 -->
										
									</div>
<!-- 									<div class="col-sm-6 mar-t-25"> -->
<!-- 										<label class="control-label">&nbsp;</label>  -->
<!-- 										<div class="fileUpload btn btn-primary"><span>Upload Avatar Image</span><input type="file" class="upload" id="profile-avtar" name="file"/></div> -->
<!-- 									</div> -->
								</div>
								<?php 
									$avtar = $profile->{User::_AVATAR_IMAGE} == "" ? '' : '<img src="'.base_url(Template::_PUBLIC_AVTAR_DIR.$profile->{User::_AVATAR_IMAGE}).'" width="120px;" height="120px"/>';?>
								<div class="mar-t-20">
									<div class="avtar-image-box">
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
										<h3>RSS feed to communication field</h3>
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
							<button class="addtocart" name="btn-invite-user" type="button">Invite</button>
							<?php else :?>
							<div class="alert alert-danger">You have to be UU or Member to invite friends</div>
							<?php endif;?>
						</div>
						
						
						
						<div id="subscriptions-tab" class="tab-pane">
							<div class="pad-20">
								<h3>Active Subscriptions</h3>
								<div class="mar-t-10"></div>
								<table id="datatable"
										class="table table-striped table-bordered dataTable no-footer"
										role="grid" aria-describedby="datatable_info">
								<thead>
									<tr role="row">
										<th>Subscription Type</th>
										<th>Subscription Item</th>
										<th>Unsubscribe</th>
									</tr>
								</thead>
								<tbody>
								<?php if($subscriptions): foreach ($subscriptions as $s):?>
									<?php 
									   $category = $this->page->get_category($s->category_id);
// 										$subscribedItem = ""; $subscriptionType="";

// 										switch ($s->{Rss_feed_subscription_model::_CATEGORY_ID})
// 										{
// 											case 1: $subscriptionType = 'Service'; $subscribedItem = $this->page->get_by_id($s->{Rss_feed_subscription_model::_ITEM_ID})->{Page::_PAGE_TITLE}; break;
// 											case 2: $subscriptionType = 'Product'; $subscribedItem = $this->page->get_by_id($s->{Rss_feed_subscription_model::_ITEM_ID})->{Page::_PAGE_TITLE};  break;
// 											case 3: break;
// 											case 4: break;
// 											case 5: break;
// 											case 6: break;
// 											case 7: break;
// 											case 8: $subscriptionType = 'Sensation'; $subscribedItem = $this->page->get_by_id($s->{Rss_feed_subscription_model::_ITEM_ID})->{Page::_PAGE_TITLE}; break;
// 											case 9: break;
// 											case 10: break;
// 											case 11: break;
// 											case 12: break;
// 											case 13: break;
// 											case 14: break;
// 											case 15: break;
// 										}
										
									?>
									<tr>
										<td><?php echo $category; ?></td>
										<td><?php echo $s->page_title;?></td>
										<td><input type="checkbox" name="unsubscribe-feed-list" class="select-one-user" data-id="<?php echo $s->id;?>"/></td>
									</tr>
								<?php endforeach; endif;?>
								</tbody>
								</table>
							</div>
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


