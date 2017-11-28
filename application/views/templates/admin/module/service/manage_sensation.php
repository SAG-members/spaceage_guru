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
								<a href="<?php echo base_url('admin/sensations/add')?>" class="btn btn-success btn-xs" name="btn-add-new-symptom">Add New Sensation</a>
								<button type="button" class="btn btn-primary btn-xs" data-category="8" name="btn-publish-service">Publish</button>
								<button type="button" class="btn btn-danger btn-xs" data-category="8" name="btn-unpublish-service">Un-Publish</button>
<!-- 								<button type="button" class="btn btn-danger btn-xs" name="btn-delete-all-symptom">Delete All</button> -->
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
											<th><input type="checkbox" name="select-all-service" class="select-all-service"/></th>
											<th>Sensation</th>
											<th>Author</th>
											<th>Visibility</th>
											<th>Date Published</th>
											<th>Price</th>
											<th>Status</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php if($sensations): foreach ($sensations as $sensation):?>
									<?php $page =  new Page();?>
									<tr>
										<td><input type="checkbox" name="select-one-service[]" class="select-one-service" data-service-id="<?php echo $sensation->{Page::_ID};?>"/></td>
										<td><a href="<?php echo base_url('admin/sensations/edit/').$sensation->{Page::_ID} ?>"><?php echo $sensation->{Page::_PAGE_TITLE};?></a></td>
										<td><?php echo generate_user_id($sensation->{Page::_USER_ID});?></td>
										<td><?php echo $page->get_visibility($sensation->{Page::_VISIBILITY});?></td>
										<td><?php echo $sensation->{Page::_DATE_CREATED};?></td>
										<td><?php echo $sensation->{Page::_PRICE};?>
										<td><?php $status = $sensation->{Page::_STATUS} ?  '<i class="fa fa-eye fa-2x" aria-hidden="true" data-toggle="tooltip" alt="Published" title="Published"></i>':'<i class="fa fa-eye-slash fa-2x" alt="UnPublished" data-toggle="tooltip" title="UnPublished" aria-hidden="true"></i>';echo $status;?> </td>
										<td><a class="delete-service" data-toggle="tooltip" alt="Delete Sensation"
												title="Delete Sensation" data-category-id = "<?php echo $sensation->{Page::_CATEGORY_ID}?>" data-service-id="<?php echo $sensation->{Page::_ID}?>"
												data-service="<?php echo $sensation->{Page::_PAGE_TITLE};?>"><i
													class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
												&nbsp;
												<a href="<?php echo base_url('admin/sensations/edit/').$sensation->{Page::_ID} ?>" data-symptom-id="<?php echo $sensation->{Page::_ID}?>" data-toggle="tooltip" class="edit-service" alt="Edit Sensation"
												title="Edit Sensation"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a> 
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
<div id="manage_service_modal" class="modal fade" role="dialog">
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
				<button type="button" class="btn btn-success" name="btn-confirm-service-delete" data-dismiss="modal">Confirm</button>
				<button type="button" class="btn btn-danger" name="btn-confirm-service-cancel" data-dismiss="modal">Cancel</button>
			</div>
		</div>

	</div>
</div>

<!-- Data Modal Ends Here -->
