<div class="">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title"><h2>Manage Faqs</h2><div class="clearfix"></div></div>
				<div class="x_content">
					<div id="datatable_wrapper"
						class="dataTables_wrapper form-inline dt-bootstrap no-footer">
						<div class="row action-btns mar-b-20">
							<div class="col-sm-6">
							</div>
							<div class="col-sm-6">
								<button type="button" data-toggle="modal" data-target="#add_new_faq_modal" class="btn btn-success btn-xs" name="btn-add-new-faq">Add New Faq</button>
								<button type="button" class="btn btn-primary btn-xs" name="btn-publish-faq">Publish</button>
								<button type="button" class="btn btn-danger btn-xs" name="btn-unpublish-faq">Un-Publish</button>
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
											<th>Question</th>
											<th>Author</th>
											<th>Anonymous</th>
											<th>Total Answers</th>
											<th>Date Published</th>
											<th>Status</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php if($faqs): foreach ($faqs as $faq):
									   $userProfile = $this->user->getUserProfile($faq['user_id']);
									
									?>
									<tr>
										<td><input type="checkbox" name="select-one-faq[]" class="select-one-faq" data-faq-id="<?php echo $faq['id'];?>"/></td>
										<td><?php echo $faq['question'];?></td>
										<td><?php echo $userProfile['user-name'] ;?></td>
										<td><?php echo $anonymous = $faq['anonymous'] ? 'Yes':'No';?></td>
										<td><a href=""><?php echo $faq['answer']; ?></a></td>
										<td><?php echo $faq['published_date'];?></td>
										<td><?php $status = $faq['status'] ?  '<i class="fa fa-eye fa-2x" aria-hidden="true" data-toggle="tooltip" alt="Published" title="Published"></i>':'<i class="fa fa-eye-slash fa-2x" alt="UnPublished" data-toggle="tooltip" title="UnPublished" aria-hidden="true"></i>';echo $status;?> </td>
										<td><a class="delete-faq" data-toggle="tooltip" alt="Delete Faq"
												title="Delete Faq" data-faq-id="<?php echo $faq['id']?>"
												data-faq="<?php echo $faq['question'];?>"><i
													class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
												&nbsp;
												<a href="<?php echo base_url('admin/edit-faq/'.$faq['id'])?>" data-faq-id="<?php echo $faq['id']?>" data-toggle="tooltip" class="edit-faq" alt="Edit Faq"
												title="Edit Faq"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a> 
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


