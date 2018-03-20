<div class="">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title"><h2><?php echo $title;?></h2><div class="clearfix"></div></div>
				<div class="x_content">
					<div id="datatable_wrapper"
						class="dataTables_wrapper form-inline dt-bootstrap no-footer">
						<div class="row action-btns mar-b-20">
							<div class="col-sm-6">
							</div>
							<div class="col-sm-6">
								<a href="#" class="btn btn-success btn-xs" data-toggle="modal" name="generate_new_coupon_modal">Generate Coupon</a>
<!-- 								<button type="button" class="btn btn-success btn-xs" name="btn-activate-user">Publish</button> -->
<!-- 								<button type="button" class="btn btn-danger btn-xs" name="btn-deactivate-user">UnPublish</button> -->
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<table id="datatable"
									class="table table-striped table-bordered dataTable no-footer"
									role="grid" aria-describedby="datatable_info">
									<thead>
										<tr role="row">
											<th><input type="checkbox" name="select-all-coupon" class="select-all-coupon"/></th>
											<th>Id</th>
											<th>Coupon Code</th>
											<th>Membership</th>
											<th>Status</th>
											<th>Created Date</th>
											<th>Expiry Date</th>
											<th></th>
										</tr>
									</thead>
									<tbody> 
									<?php ?>
									<?php if($coupons): foreach ($coupons as $c):?>
									<tr>
										<td><input type="checkbox" name="select-one-coupon[]" class="select-one-coupon" data-user-id="<?php echo $c->{Coupon_model::_ID};?>"/></td>
										<td><?php echo $c->{Coupon_model::_ID};?></td>
										<td><a class="edit-coupon-code" data-coupon-id="<?php echo $c->{Coupon_model::_ID}?>" alt="Edit Coupon Code" title="Edit Coupon Code"><?php echo $c->{Coupon_model::_COUPON_CODE};?></a></td>
										<td><?php echo $this->page->get_visibility($c->{Coupon_model::_MEMBERSHIP_TYPE});?></td>
										<td><?php $status = $c->{Coupon_model::_STATUS} ?  '<i class="fa fa-eye fa-2x" aria-hidden="true" data-toggle="tooltip" alt="Active" title="Active"></i>':'<i class="fa fa-eye-slash fa-2x" alt="In Active" data-toggle="tooltip" title="In Active" aria-hidden="true"></i>';echo $status;?> </td>
										<td><?php echo $c->{Coupon_model::_CREATED_DATE}?></td>
										<td><?php echo $c->{Coupon_model::_EXPIRY_DATE}?></td>
										<td>
											<a class="edit-coupon-code" data-coupon-id="<?php echo $c->{Coupon_model::_ID}?>" alt="Edit Coupon Code" title="Edit Coupon Code"><i class="fa fa-edit fa-2x" aria-hidden="true"></i></a>
											<a class="open-send-invite-modal" data-coupon-code="<?php echo $c->{Coupon_model::_COUPON_CODE}?>" alt="Send via email" title="Send via email"><i class="fa fa-share-alt fa-2x" aria-hidden="true"></i></a>
											<a href="<?php echo base_url('admin/delete/coupon/'.$c->{Coupon_model::_ID})?>" alt="Delete Coupon" title="Delete Coupon"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>		
										</td>
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

<!--  Data Modal Start Here -->
<div id="generate_new_coupon_modal" class="modal fade" role="dialog">
	<div class="modal-dialog"> 

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Invitation coupon generator to the SCC</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>COUPON NAME</label>
					<div class="input-group">
						<input type="text" class="form-control" name="txt-coupon-name"/>
						<span class="input-group-btn"><button type="button" class="btn btn-success" name="btn-generate-coupon-code">Generate Coupon</button></span>
					</div>
					
				</div>
				<div class="x_panel mar-t-20">
					<div class="x_title">
						<h2><div class="radio visibility-block"><label> <input type="radio" class="flat collapse-link free-month" name="coupon-type" value="1"></label> Test period for a month with account being frozen after <br/>time of validation unless receiving monthly payment</div></h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content collapse">
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<div class="radio visibility-block">
			                            <label> <input type="radio" class="flat" name="visibility" value="3"> Upgraded Users </label>
			                         </div>	
								</div>
								<div class="col-md-6">
									<div class="radio visibility-block">
										<label> <input type="radio" class="flat" name="visibility" value="4"> Membership A </label>
			                        </div>	
								</div>
								<div class="col-md-6">
									<div class="radio visibility-block">
										<label> <input type="radio" class="flat" name="visibility" value="5"> Membership B </label>
			                        </div>
								</div>
								<div class="col-md-6">
									<div class="radio visibility-block">
										<label> <input type="radio" class="flat" name="visibility" value="6"> Membership C </label>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="middle-name" class="control-label">Time of validation</label> 
							<div class="row">
								<div class="col-md-6">
									<div class="radio visibility-block">
			                            <label> <input type="radio" class="flat" name="expiry" value="11 days"> 11 days </label>
			                         </div>	
								</div>
								<div class="col-md-6">
									<div class="radio visibility-block">
										<label> <input type="radio" class="flat" name="expiry" value="21 days"> 21 days </label>
			                        </div>	
								</div>
								<div class="col-md-6">
									<div class="radio visibility-block">
										<label> <input type="radio" class="flat" name="expiry" value="31 days"> 31 days </label>
			                        </div>
								</div>
								<div class="col-md-6">
									<div class="radio visibility-block">
										<label> <input type="radio" class="flat" name="expiry" value="41 days"> 41 days </label>
									</div>
								</div>
								<div class="clearfix"></div>	
							</div>
						</div>
					</div>
				</div>
				
				<div class="x_panel mar-t-20">
					<div class="x_title">
						<h2><div class="radio visibility-block"><label> <input type="radio" class="flat collapse-link free-life" name="coupon-type" value="2"> </label> Permanent no monetary cost invitation</div></h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content collapse">
												
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<div class="radio visibility-block">
			                            <label> <input type="radio" class="flat" name="visibility" value="3"> Upgraded Users </label>
			                         </div>	
								</div>
								<div class="col-md-6">
									<div class="radio visibility-block">
										<label> <input type="radio" class="flat" name="visibility" value="4"> Membership A </label>
			                        </div>	
								</div>
								<div class="col-md-6">
									<div class="radio visibility-block">
										<label> <input type="radio" class="flat" name="visibility" value="5"> Membership B </label>
			                        </div>
								</div>
								<div class="col-md-6">
									<div class="radio visibility-block">
										<label> <input type="radio" class="flat" name="visibility" value="6"> Membership C </label>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="middle-name" class="control-label">Time of validation</label> 
							<div class="row">
								<div class="col-md-6">
									<div class="radio visibility-block">
			                            <label> <input type="radio" class="flat" name="expiry" value="11 days"> 11 days </label>
			                         </div>	
								</div>
								<div class="col-md-6">
									<div class="radio visibility-block">
										<label> <input type="radio" class="flat" name="expiry" value="21 days"> 21 days </label>
			                        </div>	
								</div>
								<div class="col-md-6">
									<div class="radio visibility-block">
										<label> <input type="radio" class="flat" name="expiry" value="31 days"> 31 days </label>
			                        </div>
								</div>
								<div class="col-md-6">
									<div class="radio visibility-block">
										<label> <input type="radio" class="flat" name="expiry" value="41 days"> 41 days </label>
									</div>
								</div>
								<div class="clearfix"></div>	
							</div>
						</div>						
					</div>
				</div>
				
				<div class="form-group">
					<label>CLUB CREDIT FOR INVITES</label>
					<div class="input-group">
						<input type="text" class="form-control" name="club-credits"/>
						<span class="input-group-addon">
							<span>Points</span>
						</span>
					</div>
					
				</div>
				
            </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success btn-save-coupon" name="btn-save-coupon-code">Submit</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			</div>
		</div>

	</div>
</div>

<!-- Data Modal Ends Here -->


<!--  Data Modal Start Here -->
<div id="send_new_user_invite_modal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Enter emails to send invitation to join santa clause</h4>
			</div>
			<div class="modal-body">
				<div class="alert alert-danger manage_coupon_error"></div>
				<label>Enter email ids</label>
				<div class="mar-b-10">
					<input id="tags_2" type="email" data-default="Enter emails to send invitation to join santa clause" class="tags form-control" placeholder="Enter emails to send invitation to join santa clause" />
				</div>	
				<label>Select Membership Type</label>
				<div class="mar-b-10">
					<select name="membership-type" class="form-control">
						<option value="select">Select Membership Type</option>
						<option value="2">Registered User</option>
						<option value="3">Usership 1 &euro;</option>
						<option value="4">Alpha Membership 10 &euro;</option>
						<option value="5">Membership 100 &euro;</option>
					</select>
				</div>
				<label>Coupon Selected</label>
				<div class="mar-b-10">
					<input type="text" class="form-control" name="coupon-code" disabled/>
				</div>
            </div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success" name="btn-confirm-invite-user">Send Invite</button>
				<button type="button" class="btn btn-danger" name="btn-confirm-invite-user-cancel" data-dismiss="modal">Cancel</button>
			</div>
		</div>

	</div>
</div>

<!-- Data Modal Ends Here -->


<script>
$(function(){
	$('a[name="generate_new_coupon_modal"]').on('click', function(){

		$('input[type="text"][name="txt-coupon-name"]').val('');
		$('input[type="radio"][name="coupon-type"]').iCheck('uncheck');
		$('input[type="radio"][name="visibility"]').iCheck('uncheck');
		$('input[type="radio"][name="expiry"]').iCheck('uncheck');
		$('input[type="text"][name="club-credits"]').val('');

		$('.btn-save-coupon').prop('name','btn-save-coupon-code');
		$('.btn-save-coupon').html('Submit');
		
		$('#generate_new_coupon_modal').modal('show');
	});

	
	$('input[type="radio"][name="coupon-type"]').on('ifChanged', function(){
		$('#generate_new_coupon_modal').find('.x_content').removeClass('in');
		if($(this).is(':checked'))
		{
			$(this).parents().siblings().toggleClass('in');
		}
	});

	$('button[type="button"][name="btn-generate-coupon-code"]').on('click', function(){

		payload = {}
		request = {'acid':10009,'payload':JSON.stringify(payload)}
		/* Fire Ajax */
		$.ajax({
			url :BASE_URL+'admin/ajax',
			method: 'post',
			data :{request:request},
			dataType:'json',
			success : function(data) 
			{
				if(data.flag == 0)
				{
					$('#generate_new_coupon_modal').find('.modal-body').prepend('<div class="message alert alert-danger"><strong>'+data.message+'</strong></div>');
				}
				else
				{
					$('input[type="text"][name="txt-coupon-name"]').val(data.message);
				}
			}
			
		});

	});

	$('button[type="button"][name="btn-save-coupon-code"]').on('click', function(){
	console.log("Helloadfadsfasdf");
		var couponCode = $('input[type="text"][name="txt-coupon-name"]').val();
		var couponType = $('input[type="radio"][name="coupon-type"]:checked').val();
		var membershipType = $('input[type="radio"][name="visibility"]:checked').val();
		var validity = $('input[type="radio"][name="expiry"]:checked').val();
		var clubCredits = 	$('input[type="text"][name="club-credits"]').val();
	
		var newForm = jQuery('<form>', {
	        'action': BASE_URL + 'admin/create/coupon',
	        'target': '_top',
	        'method':'post'	
	    }).append(jQuery('<input>', {
	        'name': 'coupon-code',
	        'type': 'hidden',
	        'value': couponCode,
	    })).append(jQuery('<input>', {
	        'name': 'coupon-type',
	        'type': 'hidden',
	        'value': couponType,
	    })).append(jQuery('<input>', {
	        'name': 'membership-type',
	        'type': 'hidden',
	        'value': membershipType,
	    })).append(jQuery('<input>', {
	        'name': 'validity',
	        'type': 'hidden',
	        'value': validity,
	    })).append(jQuery('<input>', {
	        'name': 'club-credits',
	        'type': 'hidden',
	        'value': clubCredits, 
	    }));
		
		newForm.appendTo("body").submit();	
	});
	

	$('.edit-coupon-code').on('click', function(){
	
		payload = {'coupon-id':$(this).data('couponId')};
		request = {'acid':10010,'payload':JSON.stringify(payload)};
		/* Fire Ajax */
		$.ajax({
			url :BASE_URL+'admin/ajax',
			method: 'post',
			data :{request:request},
			dataType:'json',
			success : function(data) 
			{
				console.log(data);
				if(data[0].coupon_type == 1)
				{
					$('.free-month').iCheck('check');
					$('.free-month').parents('.x_title').siblings('.x_content').find('input[type="radio"][name="visibility"][value="'+data[0].membership_type+'"]').iCheck('check');
					$('.free-month').parents('.x_title').siblings('.x_content').find('input[type="radio"][name="expiry"][value="'+data[0].time_of_validation+'"]').iCheck('check');
				}
				else
				{
					$('.free-life').iCheck('check');
					$('.free-life').parents('.x_title').siblings('.x_content').find('input[type="radio"][name="visibility"][value="'+data[0].membership_type+'"]').iCheck('check');
					$('.free-life').parents('.x_title').siblings('.x_content').find('input[type="radio"][name="expiry"][value="'+data[0].time_of_validation+'"]').iCheck('check');
				}
				$('input[type="text"][name="txt-coupon-name"]').val(data[0].coupon_code);
				$('input[type="text"][name="club-credits"]').val(data[0].club_credit);
				$('.btn-save-coupon').prop('name','btn-update-coupon-code');
				$('.btn-save-coupon').attr('data-coupon-id',data[0].id);
				$('.btn-save-coupon').html('Update');
				
				$('#generate_new_coupon_modal').modal('show');
			}
			
		});
	});

	/* Update Coupon Code */
	
	$(document).on('click', 'button[type="button"][name="btn-update-coupon-code"]', function(e){
		
		
		var couponId = $(this).data('couponId'); 
		var couponCode = $('input[type="text"][name="txt-coupon-name"]').val();
		var couponType = $('input[type="radio"][name="coupon-type"]:checked').val();
		var membershipType = $('input[type="radio"][name="visibility"]:checked').val();
		var validity = $('input[type="radio"][name="expiry"]:checked').val();
		var clubCredits = 	$('input[type="text"][name="club-credits"]').val();
	
		var newForm = jQuery('<form>', {
	        'action': BASE_URL + 'admin/update/coupon',
	        'target': '_top',
	        'method':'post'	
	    }).append(jQuery('<input>', {
	        'name': 'coupon-code',
	        'type': 'hidden',
	        'value': couponCode,
	    })).append(jQuery('<input>', {
	        'name': 'coupon-type',
	        'type': 'hidden',
	        'value': couponType,
	    })).append(jQuery('<input>', {
	        'name': 'membership-type',
	        'type': 'hidden',
	        'value': membershipType,
	    })).append(jQuery('<input>', {
	        'name': 'validity',
	        'type': 'hidden',
	        'value': validity,
	    })).append(jQuery('<input>', {
	        'name': 'club-credits',
	        'type': 'hidden',
	        'value': clubCredits, 
	    })).append(jQuery('<input>', {
	        'name': 'coupon-id',
	        'type': 'hidden',
	        'value': couponId, 
	    }));
		
		newForm.appendTo("body").submit();	
	});
	
});


</script>


