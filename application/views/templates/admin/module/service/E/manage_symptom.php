<div class="">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title"><h2>Manage Symptoms</h2><div class="clearfix"></div></div>
				<div class="x_content">
					<div id="datatable_wrapper"
						class="dataTables_wrapper form-inline dt-bootstrap no-footer">
						<div class="row action-btns mar-b-20">
							<div class="col-sm-6">
							</div>
							<div class="col-sm-6">
								<button type="button" data-toggle="modal" data-target="#add_new_symptom_modal" class="btn btn-success btn-xs" name="btn-add-new-symptom">Add New Symptom</button>
								<button type="button" class="btn btn-primary btn-xs" name="btn-publish-symptom">Publish</button>
								<button type="button" class="btn btn-danger btn-xs" name="btn-unpublish-symptom">Un-Publish</button>
<!-- 								<button type="button" class="btn btn-danger btn-xs" name="btn-delete-all-symptom">Delete All</button> -->
							</div>
							<div class="clearfix"></div>
						</div>
<!-- 						<div class="row"> -->
<!-- 							<div class="col-sm-6"> -->
<!-- 								<div class="dataTables_length" id="datatable_length"> -->
<!-- 									<label>Show <select name="datatable_length" -->
<!-- 										aria-controls="datatable" class="form-control input-sm"><option -->
<!-- 												value="10">10</option> -->
<!-- 											<option value="25">25</option> -->
<!-- 											<option value="50">50</option> -->
<!-- 											<option value="100">100</option></select> entries -->
<!-- 									</label> -->
<!-- 								</div> -->
<!-- 							</div> -->
<!-- 							<div class="col-sm-6"> -->
<!-- 								<div id="datatable_filter" class="dataTables_filter"> -->
<!-- 									<label>Search: <input type="search" -->
<!-- 										class="form-control input-sm" placeholder="" -->
<!-- 										aria-controls="datatable"></label> -->
<!-- 								</div> -->
<!-- 							</div> -->
<!-- 						</div> -->
						
						<div class="row">
							<div class="col-sm-12">
								<table id="datatable"
									class="table table-striped table-bordered dataTable no-footer"
									role="grid" aria-describedby="datatable_info">
									<thead>
										<tr role="row">
											<th><input type="checkbox" name="select-all-symptom" class="select-all-symptom"/></th>
											<th>Symptom</th>
											<th>Description</th>
											<th>Author</th>
											<th>Date Published</th>
											<th>Status</th>
											<th></th>
											
										</tr>
									</thead>
									<tbody>
									<?php if($symptoms): foreach ($symptoms as $symptom):?>
									<tr>
										<td><input type="checkbox" name="select-one-symptom[]" class="select-one-symptom" data-symptom-id="<?php echo $symptom['id'];?>"/></td>
										<td><a href=""><?php echo $symptom['symptom'];?></a></td>
										<td><?php echo $symptom['description'];?></td>
										<td><?php echo $symptom['user_id'];?></td>
										<td><?php echo $symptom['date_created'];?></td>
										<td><?php $status = $symptom['status'] ?  '<i class="fa fa-eye fa-2x" aria-hidden="true" data-toggle="tooltip" alt="Published" title="Published"></i>':'<i class="fa fa-eye-slash fa-2x" alt="UnPublished" data-toggle="tooltip" title="UnPublished" aria-hidden="true"></i>';echo $status;?> </td>
										<td><a class="delete-symptom" data-toggle="tooltip" alt="Delete Symptom"
												title="Delete Symptom" data-symptom-id="<?php echo $symptom['id']?>"
												data-symptom="<?php echo $symptom['symptom'];?>"><i
													class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
												&nbsp;
												<a href="javascript:void(0);" data-symptom-id="<?php echo $symptom['id']?>" data-toggle="tooltip" class="edit-symptom" alt="Edit Symptom"
												title="Edit Symptom"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a> 
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
<div id="manage_symptom_modal" class="modal fade" role="dialog">
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
				<button type="button" class="btn btn-success" name="btn-confirm-symptom-delete" data-dismiss="modal">Confirm</button>
				<button type="button" class="btn btn-danger" name="btn-confirm-faq-cancel" data-dismiss="modal">Cancel</button>
			</div>
		</div>

	</div>
</div>

<!-- Data Modal Ends Here -->


<!--  Add New Faq Data Modal Start Here -->
<div id="add_new_symptom_modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		 
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add New Symptom</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<input type="text" class="form-control" name="symptom-title" placeholder="Symptom Title" required>	
				</div>
				<div class="form-group">
					<textarea class="classy-editor" name="symptom-descripton" placeholder="Symptom Description" required></textarea>	
				</div>
				<div class="form-group">
					<input name="anonymous" value="1" type="checkbox"> <label>Post as Anonymous</label>
					
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" name="btn-confirm-add-symptom" data-dismiss="modal">Add Symptom</button>
				<button type="button" class="btn btn-danger" name="btn-confirm-symptom-cancel" data-dismiss="modal">Cancel</button>
			</div>
		</div>

	</div>
</div>

<!-- Data Modal Ends Here -->


<!--  Add New Faq Data Modal Start Here -->
<div id="edit_symptom_modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Symptom</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<input type="text" class="form-control" name="symptom-title" placeholder="Symptom Title" required>	
				</div>
				<div class="form-group">
					<textarea class="classy-editor" name="symptom-descripton" placeholder="Symptom Description" required></textarea>	
				</div>
				<div class="form-group">
					<input name="anonymous" value="1" type="checkbox"> <label>Post as Anonymous</label>
					<input name="symptom-id" type="hidden">
					
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" name="btn-confirm-update-symptom" data-dismiss="modal">Update Symptom</button>
				<button type="button" class="btn btn-danger" name="btn-confirm-symptom-cancel" data-dismiss="modal">Cancel</button>
			</div>
		</div>

	</div>
</div>

<!-- Data Modal Ends Here -->


