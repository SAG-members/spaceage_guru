<div class="">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title"><h2>Manage Escrow</h2><div class="clearfix"></div></div>
				<div class="x_content">
					<div id="datatable_wrapper"
						class="dataTables_wrapper form-inline dt-bootstrap no-footer"> 
						<div class="row action-btns mar-b-20">
							<div class="col-sm-6">
							</div>
							<div class="col-sm-6">
								<a href="<?php echo base_url('admin/escrow/create'); ?>" class="btn btn-success btn-xs" name="btn-add-new-product">Create New Escrow</a>
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
											<th><input type="checkbox" name="select-all-product" class="select-all-product"/></th>
											<th>Type</th>
											<th>Title</th>
											<th>Price</th>
											<th>Address</th>
											<th>Date Time</th>
											<th>Status</th>
											<th></th>										
										</tr>
									</thead>
									<tbody>
									<?php //pre($escrowList);?>
									<?php if($escrowList): foreach ($escrowList as $e):
									    
									    $status = $e->status;
									    $stat = '';
									    
									    switch ($status)
									    {
									        case 1 : $stat = "Yielded offer"; break;
									        case 2 : $stat = "Recommend to friend"; break;
									        case 3 : $stat = "Decline Offer"; break;
									        case 4 : $stat = "Accept Offer"; break;
									        case 5 : $stat = "Save and Exit"; break;
									    }
									    
    									$eventDetail = $this->library_event_model->getLibraryEventById($e->event_id);
// 									    pre($eventDetail);
    									$eventCommentDetail = $this->ulecm->get_comment_by_event($eventDetail->id);
    									
    									$pageDetail = $this->page->get_by_id($eventDetail->event_data_id);
    									
    									$category = $this->page->get_category($pageDetail->{Page::_CATEGORY_ID});
    									
    									$criteria = User_library_event_escrow_model::_COMMENT_ID .' = '. $e->comment_id;
    									$escrowDetails = $this->escrow->get_by_criteria($criteria);
									    
// 									   $this->page->get_category($e->{User_library_event_escrow_model::_COMMENT_ID})
									?>
									<td><input type="checkbox" name="select-one-product" class="select-one-product" data-product-id="<?php echo $e->id;?>"/></td>
									<td><?php echo $category; ?></td>
									<td><?php echo $eventDetail->title; ?></td>
									<td>&euro; <?php echo $eventCommentDetail->price; ?></td>
									<td><?php echo $eventCommentDetail->location;  ?></td>
									<td><?php echo $eventCommentDetail->date_created; ?></td>
									<td><?php echo $stat;?></td>
									<td>
										
										<a alt="Delete Escrow" title="Delete Escrow" href="<?php echo base_url('admin/escrow/delete/'.$e->id)?>" class="btn btn-delete"><i class="fa fa-trash fa-2x"></i></a>
										
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

<script type="text/javascript"
	src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBEhsWhrYpbiuyOi2czg7P49ZW27Uow51c&libraries=places"></script>
	

<!-- CREATE NEW OFFER -->

<div class="modal fade" id="add_location_comment_event_modal"
	role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add New Event</h4>
			</div>
			<form class="form-label-left" method="post" action="">
			<div class="modal-body">
				<div clas="col-md-12">
					
						<div class="pop_up_message_box"></div>
						<div class="form-group">
							<div class="row">
    							<div class="col-md-6">
    								<label>Item</label>
    								<select name="item_name" class="form-control">
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
    								<input type="text" name="price" class="form-control">
    							</div>
    							<div class="col-md-6">
    								<label>End Time</label> 
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
			</div>
			<div class="modal-footer">
				<input type="hidden" name="edit_event_id" />
				<input type="hidden" name="lat">
				<input type="hidden" name="lng">
				<button type="button" class="btn btn-danger" data-dismiss="modal" name="cancel_remove">No</button>
				<button type="button" class="btn btn-success" name="update_comment">Yes</button>
			</div>
			</form>
		</div>

	</div>
</div>


	