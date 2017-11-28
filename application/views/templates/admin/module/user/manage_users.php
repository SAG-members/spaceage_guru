<div class="">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title"><h2>Manage Users</h2><div class="clearfix"></div></div>
				<div class="x_content">
					<div id="datatable_wrapper"
						class="dataTables_wrapper form-inline dt-bootstrap no-footer">
						<div class="row action-btns mar-b-20">
							<div class="col-sm-6">
							</div>
							<div class="col-sm-6">
								<button type="button" class="btn btn-success btn-xs" name="btn-activate-user">Activate</button>
								<button type="button" class="btn btn-danger btn-xs" name="btn-deactivate-user">De-Activate</button>
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
											<th><input type="checkbox" name="select-all-user" class="select-all-user"/></th>
											<th>Id</th>
											<th>Username</th>
											<th>Email</th>
											<th>Membership</th>
											<th>Registered Country</th>
											<th>Date Registered</th>
											<th>Status</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php if($users): foreach ($users as $user):?>
									<?php $u =  new User(); ?>
									<tr>
										<td><input type="checkbox" name="select-one-user[]" class="select-one-user" data-user-id="<?php echo $user['id'];?>"/></td>
										<td><?php echo $user['id'];?></td>
										<td><?php echo $user['username'];?></td>
										<td><?php echo $user['email'];?></td>
										<td><?php echo $u->get_user_membership($user['user-group']);?></td>
										<td><?php echo $country = $user['country'] != 0 ? $this->country->get_country_name($user['country']) : '';?></td>
										<td><?php echo $user['date_created'];?></td>
										<td><?php $status = $user['status'] ?  '<i class="fa fa-eye fa-2x" aria-hidden="true" data-toggle="tooltip" alt="Active" title="Active"></i>':'<i class="fa fa-eye-slash fa-2x" alt="In Active" data-toggle="tooltip" title="In Active" aria-hidden="true"></i>';echo $status;?> </td>
										<td><a class="delete-user" data-toggle="tooltip" alt="Delete User"
												title="Delete User" data-user-id="<?php echo $user['id']?>"
												data-user-name="<?php echo $user['username'];?>"><i
													class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
												&nbsp;
												<a href="<?php echo base_url('admin/edit-user/'.$user['id'])?>" data-toggle="tooltip" class="edit-post" alt="Edit User"
												title="Edit User"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
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
<div id="manage_user_modal" class="modal fade" role="dialog">
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
				<button type="button" class="btn btn-success" name="btn-confirm-user-delete" data-dismiss="modal">Confirm</button>
				<button type="button" class="btn btn-danger" name="btn-confirm-user-cancel" data-dismiss="modal">Cancel</button>
			</div>
		</div>

	</div>
</div>

<!-- Data Modal Ends Here -->
