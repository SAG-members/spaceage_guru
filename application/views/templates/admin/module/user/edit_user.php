<div class="">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2><?php echo $title;?></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="row action-btns mar-b-20">
						<div class="col-sm-6"></div>
						<div class="col-sm-6">
							<?php if($user->{User::_STATUS} == 1):?>
							<button type="button" class="btn btn-danger btn-xs"
								name="btn-block-user" data-toggle="modal" data-target="#block-user-password-model">Block User</button>
							<?php else:?>
							<button type="button" class="btn btn-primary btn-xs"
								name="btn-activate-user" data-toggle="modal" data-target="#unblock-user-password-model">Activate User</button>
							<?php endif;?>
							<button type="button" class="btn btn-warning btn-xs"
								name="btn-reset-password" data-toggle="modal" data-target="#reset-user-password-model">Reset-Password</button>
								
							<button type="button" class="btn btn-primary btn-xs"
								name="btn-upgrade-user" data-toggle="modal" data-target="#upgrade-user-model">Upgrade User</button>	
								
							<a href="<?php echo base_url('admin/show/ppqs/user-id/'.$user->{User::_ID})?>" class="btn btn-success btn-xs">Access PPQ's</a>
							<a href="<?php echo base_url('admin/show/rpqs/user-id/'.$user->{User::_ID})?>" class="btn btn-success btn-xs">Access RPQ's</a>
							<a href="<?php echo base_url('admin/show/wpqs/user-id/'.$user->{User::_ID})?>" class="btn btn-success btn-xs">Access WPQ's</a>	
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="row">
						<div class="col-sm-12 post">
							<form method="post">
								
								<div class="row">
									<div class="col-md-6">
										<div class="col-md-6">
											<?php $avtar = $user->{User::_AVATAR_IMAGE} == "" ? '' : '<img src="'.base_url(Template::_PUBLIC_AVTAR_DIR.$user->{User::_AVATAR_IMAGE}).'" width="95px;"/>';?>
											<div class="avtar-image-box mar-t-20"><?php echo $avtar;?></div>
										</div>
									</div>
									<div class="col-md-6">
										<label>Avtar Name</label> <input type="text"
												name="post-title" class="mar-b-20"
												" placeholder="Avtar Name"
												value="<?php echo $user->{User::_AVATAR_NAME}?>" readonly />
									</div>
									
									<div class="col-md-6">
										<label>First Name</label> <input type="text" name="post-title"
											class="mar-b-20" " placeholder="First Name"
											value="<?php echo $user->{User::_F_NAME}?>" readonly /> <label>Last
											Name</label> <input type="text" name="post-title"
											class="mar-b-20" " placeholder="Last Name"
											value="<?php echo $user->{User::_L_NAME}?>" readonly />
									</div>
								</div>
																
								<div class="row">
									<div class="col-md-6">
										<label>Primary Email</label> <input type="text"
											name="post-title" class="mar-b-20"
											" placeholder="Primary Email"
											value="<?php echo $user->{User::_EMAIL}?>" readonly />
									</div>
									<div class="col-md-6">
										<label>Secondary Email</label> <input type="text"
											name="post-title" class="mar-b-20"
											" placeholder="Secondary Email"
											value="<?php echo $user->{User::_SECONDARY_EMAIL}?>" readonly />
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<label>Mobile</label> <input type="text" name="post-title"
											class="mar-b-20" " placeholder="Mobile Number"
											value="<?php echo $user->{User::_MOBILE}?>" readonly />
									</div>
									<div class="col-md-6">
										<label>Username</label> <input type="text" name="post-title"
											class="mar-b-20" " placeholder="Mobile Number"
											value="<?php echo $user->{User::_USERNAME}?>" readonly />
									</div>
								
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>User Type</label>
										<?php $u =  new User();?>
										<select class="form-control mar-b-20" name="user_type">
											<?php for($i=1; $i<=2; $i++):?>
												<?php $selected = ''; if($user->{User::_USER_GROUP} == $i) $selected='selected="selected"';?>
												<option value="<?php echo $i?>" <?php echo $selected;?>><?php echo $u->get_user_level($i)?></option>
											<?php endfor;?>
										</select>
										
									</div>
									<div class="col-md-6">
										<label>Membership Type</label> 
										<select class="form-control mar-b-20" name="membership_type">
											<?php for($i=1; $i<=6; $i++):?>
												<?php $selected = ''; if($user->{User::_USER_MEMBERSHIP_LEVEL} == $i) $selected='selected="selected"';?>
												<option value="<?php echo $i?>" <?php echo $selected;?>><?php echo $u->get_user_membership($i)?></option>
											<?php endfor;?>
										</select>
										
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>What are you</label>
										<textarea class="mar-b-20" readonly style="display: block; width:100%";><?php echo $user->{User::_WHAT_ARE_YOU}?></textarea>
									</div>
									<div class="col-md-6">
										<label>What do you want to become</label>
										<textarea class="mar-b-20"  readonly style="display: block; width:100%";><?php echo $user->{User::_WHAT_YOU_WANT_TO_BECOME}?></textarea> 
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<label>What do you need</label>
										<textarea  class="mar-b-20" readonly style="display: block; width:100%";><?php echo $user->{User::_WHAT_DO_YOU_NEED}?></textarea>
									</div>
									<div class="col-md-6">
										<label>Security Question</label>
										<textarea  class="mar-b-20" readonly style="display: block; width:100%";><?php echo $user->{User::_SECRET_QUESTION}?></textarea> 
									</div>
								</div>
								
								<div class="row mar-t-10">
									<div class="col-md-6">
										<label>Recommendor</label>
										<input type="text" name="post-title"
											class="mar-b-20" " placeholder="Recommendor"
											value="<?php echo $user->{User::_RECOMMENDOR}?>" readonly /> 
									</div>
									<div class="col-md-6">
										<label>Last Login</label>
										<input type="text" name="post-title"
											class="mar-b-20" " placeholder="Mobile Number"
											value="<?php echo $user->{User::_LAST_LOGIN}?>" readonly /> 
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<label>Country</label> 
										<select name="country"
											class="form-control" readonly>
											<?php if($countries): foreach($countries as $country):?>
											<?php $selected = ''; if($country['id'] === $user->{User::_COUNTRY}){$selected='selected';}?>
											<option value="<?php echo $country['id'];?>"
												<?php echo $selected;?>><?php echo $country['name'];?></option>
											<?php endforeach; endif;?>
										</select>
									</div>
									<div class="col-md-6">
										<label>Date Created</label> <input type="text"
											name="post-title" class="mar-b-20"
											" placeholder="Date Created"
											value="<?php echo $user->{User::_DATE_CREATED}?>" readonly />
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!--  User Subscriptions -->
		<hr/>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>RSS Feed Subscriptions</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
						<div class="row">
							<div class="col-sm-12">
								<table 
									class=" datatable table table-striped table-bordered dataTable no-footer"
									role="grid" aria-describedby="datatable_info">
									<thead>
										<tr role="row">
											<th>Id</th>
											<th>Subscription Type</th>
											<th>Subscribed Item</th>
											<th>Subscribed Date</th>
											<th>Unsubscribed</th>
										</tr>
									</thead>
									<tbody>
									<?php if($rssSubscriptions): foreach ($rssSubscriptions as $s): ?>
									<tr>
										<td><?php echo $s->id;?></td>
										<td><?php echo $this->page->get_category($s->category_id);?></td>
										<td><?php echo $s->page_title;?></td>
										<td><?php echo $s->date_created;?></td>
										<td><?php echo $status = $s->unsubscribe ? 'Yes' : 'No';?> </td>
									</tr>
									<?php endforeach; endif;?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!--  User Subscriptions -->
		<hr/>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Subscriptions</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
						<div class="row">
							<div class="col-sm-12">
								<table
									class="datatable table table-striped table-bordered dataTable no-footer"
									role="grid" aria-describedby="datatable_info">
									<thead>
										<tr role="row">
											<th>Id</th>
											<th>Transaction Id</th>
											<th>Purchased Item</th>
											<th>Category</th>
											<th>Gross Amount</th>
											<th>Subscription Date</th>
											<th>Expiry Date</th>
										</tr>
									</thead>
									<tbody>
									<?php if($subscriptions): foreach ($subscriptions as $p):
										
										$subscriptionObj = $this->membership->get_membership_by_id($p->item_id);
										
										switch ($subscriptionObj->{Membership_model::_MEMBERSHIP_TYPE})
										{
											case 1: $category = 'Signed In User'; break;
											case 2: $category = 'Registered User'; break; 
											case 3: $category = 'Upgraded User'; break;
											case 4: $category = 'Membership A'; break;
											case 5: $category = 'Membership B'; break;
											case 6: $category = 'Membership C'; break;
											case 7: $category = 'Remainder Service'; break;
											
										}								
										
										$subscribedItem = $subscriptionObj->{Membership_model::_MEMBERSHIP_TITLE};
									?>
									<tr>
										<td><?php echo $p->id?></td>
										<td><?php echo $p->txn_id?></td>
										<td><?php echo $subscribedItem; ?></td>
										<td><?php echo $category;?></td>
										<td><?php echo $p->currency . ' ' .$p->gross_amount;?></td>
										<td><?php echo $p->subscription_date;?></td>
										<td><?php echo $p->subscription_expiry;?></td>
									</tr>
									<?php endforeach; endif;?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!--  User PSSS Purchases -->
		<hr/>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Data Purchases</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
						<div class="row">
							<div class="col-sm-12">
								<table
									class="datatable table table-striped table-bordered dataTable no-footer"
									role="grid" aria-describedby="datatable_info">
									<thead>
										<tr role="row">
											<th>Id</th>
											<th>Transaction Id</th>
											<th>Purchased Item</th>
											<th>Category</th>
											<th>Gross Amount</th>
											<th>Purchase Date</th>
										</tr>
									</thead>
									<tbody>
									<?php if($purchases): foreach ($purchases as $p):
										
										$pageO = $this->page->get_by_id($p->item_id); 
										
										switch ($p->category_id)
										{
											case 1: $category = 'Service'; break;
											case 2: $category = 'Product'; break; 
											case 5: $category = 'Symptom'; break;
											case 8: $category = 'Sensations'; break;
											
											
										}								
										
										$purchasedItem = $pageO->page_title;
									?>
									<tr>
										<td><?php echo $p->id?></td>
										<td><?php echo $p->txn_id?></td>
										<td><?php echo $purchasedItem; ?></td>
										<td><?php echo $category;?></td>
										<td><?php echo $p->currency . ' ' .$p->gross_amount;?></td>
										<td><?php echo $p->purchase_date;?></td>
									</tr>
									<?php endforeach; endif;?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		
		
		
	</div>
</div>

<!-- Confirm Reset Password Model -->

<div id="reset-user-password-model" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Confirm Reset User Password</h4>
			</div>
			<div class="modal-body">
				<p>A Email will be sent to user with new password, which user will use to login to the site</p>
				<div class="input-group">
	                <input type="text" name="password" class="form-control">
	                <span class="input-group-btn">
	                	<button type="button" class="btn btn-success" name="btn-generate-password">Generate Password</button>
	                </span>
                </div>
			</div>
			<div class="modal-footer">
				<input type="hidden" name="user-id" value="<?php echo $user->{User::_ID}?>"/>
				<button type="button" name="confirm-reset-password" class="btn btn-success" data-dismiss="modal">Confirm</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>

<!-- Confirm Block User Model -->

<div id="block-user-password-model" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Confirm Block User</h4>
			</div>
			<div class="modal-body">
				<p>A Email will be sent to user informing that he has been blocked</p>
			</div>
			<div class="modal-footer">
				<input type="hidden" name="user-id" value="<?php echo $user->{User::_ID}?>"/>
				<button type="button" name="confirm-block-user" class="btn btn-success" data-dismiss="modal">Confirm</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>

<!-- Confirm Un Block User Model -->

<div id="unblock-user-password-model" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Confirm UnBlock User</h4>
			</div>
			<div class="modal-body">
				<p>A Email will be sent to user informing that he has been Unblocked</p>
			</div>
			<div class="modal-footer">
				<input type="hidden" name="user-id" value="<?php echo $user->{User::_ID}?>"/>
				<button type="button" name="confirm-unblock-user" class="btn btn-success" data-dismiss="modal">Confirm</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>


<!-- Upgrade user model -->

<div id="upgrade-user-model" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Upgrade User</h4>
			</div>
			<form method="post" action="<?php echo base_url('admin/upgrade/user')?>">
			<div class="modal-body">
				
				    <div class="form-group">
				        <label>Select Shop Product</label>
				        <select name="transaction_product" class="form-control" required>
				            <option value="0">Select Product</option>
				            <?php if($shopProducts): foreach ($shopProducts as $product):?>
				            <option value="<?php echo $product->{Membership_model::_ID}?>"><?php echo $product->{Membership_model::_MEMBERSHIP_TITLE}?></option>
				            <?php endforeach; endif;?>
				        </select>
				    </div>
				    
				    <?php $validForArray = array('1'=>'Monthly', '2'=>'Yearly'); ?>
				    <div class="form-group">
				        <label>Product Valid For</label>
				        <select name="transaction_subscription" class="form-control" required>
				            <option value="0">Select Valid For</option>
				            <?php if($validForArray): foreach ($validForArray as $k => $valid):?>
				            <option value="<?php echo $k?>"><?php echo $valid; ?></option>
				            <?php endforeach; endif;?>
				        </select>
				    </div>
				    
				    <?php $modeArray = array('1'=>'Paypal', '2'=>'Cryptonator', '3'=>'Direct Bank Payment');?>
				    
				    <div class="form-group">
				        <label>Transaction Mode</label>
				        <select name="transaction_mode" class="form-control" required>
				            <option value="0">Select Mode</option>
				            <?php if($modeArray): foreach ($modeArray as $k => $mode):?>
				            <option value="<?php echo $k?>"><?php echo $mode; ?></option>
				            <?php endforeach; endif;?>
				        </select>
				    </div>
				    
				    <?php $currencyArray = array('EUR', 'USD', 'GBP');?>
				    
				    <div class="form-group">
				        <label>Transaction Currency</label>
				        <select name="transaction_currency" class="form-control" required>
    				        <option value="0">Select Currency</option>
    				        <?php if($currencyArray): foreach ($currencyArray as $currency):?>
				            <option value="<?php echo $currency?>"><?php echo $currency; ?></option>
				            <?php endforeach; endif;?>
				        </select>
				        
				    </div>
				    
				    <div class="form-group">
				        <label>Transaction Amount</label>
				        <input type="text" name="transaction_amount" class="form-control" required/>
				    </div>
				    
				    <div class="form-group">
				        <label>Transaction #</label>
				        <input type="text" name="transaction_number" class="form-control" required/>
				    </div>
				    
				    <div class="form-group">
				        <label>Payer Email</label>
				        <input type="text" name="transaction_email" class="form-control" required/>
				    </div>
			</div>
			<div class="modal-footer">
				<input type="hidden" name="user-id" value="<?php echo $user->{User::_ID}?>"/>
				<input type="submit" name="confirm-unblock-user" class="btn btn-success" value="Submit"/>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
			</form>
		</div>

	</div>
</div>