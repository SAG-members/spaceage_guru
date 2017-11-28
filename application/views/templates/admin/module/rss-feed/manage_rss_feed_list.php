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
								<button type="button" class="btn btn-success btn-xs" name="btn-add-new-feed">Add New Feed</button>
								<button type="button" class="btn btn-primary btn-xs" name="btn-publish-feed">Publish</button>
								<button type="button" class="btn btn-danger btn-xs" name="btn-unpublish-feed">Un-Publish</button>
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
											<th><input type="checkbox" name="select-all-faq" class="select-all-faq"/></th>
											<th>Subscribed Item</th>
											<th>Subscription Type</th>
											<th>User Email</th>
											<th>Subscription Date</th>
<!-- 											<th></th> -->
										</tr>
									</thead>
									<tbody>
									<?php if($subscriptions): foreach ($subscriptions as $subscription):?>
									<?php $rss = new Rss_feed_subscription_model();?>
									<tr>
										<td><input type="checkbox" name="select-one-faq[]" class="select-one-faq" data-faq-id="<?php echo $subscription->{Rss_feed_subscription_model::_ID};?>"/></td>
										<td><?php echo $rss->get_feed_item($subscription->{Rss_feed_subscription_model::_ITEM_ID});?></td>
										<td><?php echo Rss_feed_subscription_model::get_feed_item_type($subscription->{Rss_feed_subscription_model::_CATEGORY_ID});?></td>
										<td><?php echo $subscription->{Rss_feed_subscription_model::_EMAIL}?></td>
										<td><?php echo $subscription->{Rss_feed_subscription_model::_DATE_CREATED}?> </td>
										<!-- <td><a class="delete-faq" data-toggle="tooltip" alt="Delete Faq"
												title="Delete Faq" data-faq-id="<?php echo $subscription->{Rss_feed_subscription_model::_ITEM_ID}?>"
												data-faq="<?php echo $subscription->{Rss_feed_subscription_model::_ITEM_ID}?>"><i
													class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
												&nbsp;
												<a href="javascript:void(0);" data-faq-id="<?php echo $subscription->{Rss_feed_subscription_model::_ITEM_ID}?>" data-toggle="tooltip" class="edit-faq" alt="Edit Faq"
												title="Edit Faq"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a> 
										</td>-->
									</tr>
									<?php endforeach; endif;?>
									</tbody>
								</table>
							</div>
						</div>
<!-- 						<div class="row"> -->
<!-- 							<div class="col-sm-5"> -->
								<!-- <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of <?php echo $count;?> entries</div> -->
<!-- 							</div> -->
<!-- 							<div class="col-sm-7"> -->
<!-- 								<div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"> -->
<!-- 									<ul class="pagination"> -->
<!-- 										<li class="paginate_button previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0">Previous</a></li> -->
<!-- 										<li class="paginate_button active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0">1</a></li> -->
<!-- 										<li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0">2</a></li> -->
<!-- 										<li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0">3</a></li> -->
<!-- 										<li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0">4</a></li> -->
<!-- 										<li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0">5</a></li> -->
<!-- 										<li class="paginate_button "><a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0">6</a></li> -->
<!-- 										<li class="paginate_button next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0">Next</a></li> -->
<!-- 									</ul> -->
<!-- 								</div> -->
<!-- 							</div> -->
<!-- 						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	

<!--  Data Modal Start Here -->
<div id="manage_faq_modal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" name="btn-confirm-faq-delete" data-dismiss="modal">Confirm</button>
				<button type="button" class="btn btn-danger" name="btn-confirm-faq-cancel" data-dismiss="modal">Cancel</button>
			</div>
		</div>

	</div>
</div>

<!-- Data Modal Ends Here -->


<!--  Add New Faq Data Modal Start Here -->
<div id="add_new_faq_modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		 
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add New Faq</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<textarea class="classy-editor" name="faq-question" placeholder="Question Description"></textarea>	
				</div>
				<div class="form-group">
					<input name="anonymous" value="1" type="checkbox"> <label>Post as Anonymous</label>
					
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" name="btn-confirm-add-faq" data-dismiss="modal">Add Faq</button>
				<button type="button" class="btn btn-danger" name="btn-confirm-faq-cancel" data-dismiss="modal">Cancel</button>
			</div>
		</div>

	</div>
</div>

<!-- Data Modal Ends Here -->


<!--  Add New Faq Data Modal Start Here -->
<div id="edit_faq_modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Faq</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<textarea class="classy-editor" name="faq-question" placeholder="Question Description"></textarea>	
				</div>
				<div class="form-group">
					<input name="anonymous" value="1" type="checkbox"> <label>Post as Anonymous</label>
					<input type="hidden" name="faq-id"/>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" name="btn-confirm-update-faq" data-dismiss="modal">Update Faq</button>
				<button type="button" class="btn btn-danger" name="btn-confirm-faq-cancel" data-dismiss="modal">Cancel</button>
			</div>
		</div>

	</div>
</div>

<!-- Data Modal Ends Here -->


