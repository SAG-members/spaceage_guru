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
								<a href="<?php echo base_url('admin/membership/add')?>" class="btn btn-success btn-xs" name="btn-add-new-membership">Add New Shop Product</a>
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
											<th><input type="checkbox" name="select-all-membership" class="select-all-membership"/></th>
											<th>Membership Title</th>
											<th>Membership Type</th>
											<th>Membership Logo</th>
											<th>Created Date</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php if($memberships): foreach ($memberships as $membership):?>
									<?php $logo = $membership->{Membership::_MEMBERSHIP_LOGO} ? '<img style="width:150px;" src="'. base_url(Template::_ADMIN_UPLOAD_DIR.$membership->{Membership::_MEMBERSHIP_LOGO}).'">':'';?>
									<tr>
										<td><input type="checkbox" name="select-one-membership[]" class="select-one-membership" data-faq-id="<?php echo $membership->{Membership::_ID};?>"/></td>
										<td><?php echo $membership->{Membership::_MEMBERSHIP_TITLE};?></td>
										<td><?php echo $membership->{Membership::_MEMBERSHIP_TITLE};?></td>
										<td><?php echo $logo;?></td>
										<td><?php echo $membership->{Membership::_DATE_CREATED}?> </td>
										<td>
										
										<a href="<?php echo base_url('admin/membership/delete/'.$membership->{Membership::_ID})?>" class="delete-membership" data-toggle="tooltip" alt="Delete Membership"
												title="Delete Membership" data-faq-id="<?php echo $membership->{Membership::_ID}?>"
												data-faq="<?php echo $membership->{Membership::_ID}?>"><i
													class="fa fa-trash fa-2x" aria-hidden="true"></i></a> 
												&nbsp;
												<a href="<?php echo base_url('admin/membership/edit/'.$membership->{Membership::_ID})?>" data-faq-id="<?php echo $membership->{Membership::_ID}?>" data-toggle="tooltip" class="edit-faq" alt="Edit Membership"
												title="Edit Membership"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a> 
										</td>
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



