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
								<a href="<?php echo base_url('admin/cms/page/add')?>" class="btn btn-success btn-xs" name="btn-add-new-page">Add New</a>
								<button type="button" class="btn btn-primary btn-xs" name="btn-publish-page">Publish</button>
								<button type="button" class="btn btn-danger btn-xs" name="btn-unpublish-page">Un-Publish</button>
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
											<th><input type="checkbox" name="select-all-page" class="select-all-page"/></th>
											<th>Title</th>
											<th>Content</th>
											<th>Status</th>
											<th>Date Created</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php if($pages): foreach ($pages as $p):?>
									<tr>
										<td><input type="checkbox" name="select-one-page[]" class="select-one-page" data-page-id="<?php echo $p->{Cms_model::_ID};?>"/></td>
										<td><?php echo $p->{Cms_model::_TITLE};?></td>
										<td><?php echo substr(strip_tags($p->{Cms_model::_CONTENT}), 0, 500);?></td>
										<td><?php echo $p->{Cms_model::_STATUS} ? '<i class="fa fa-eye fa-2x" aria-hidden="true" alt="Published" title="Published"></i>' : '<i class="fa fa-eye-slash fa-2x" aria-hidden="true" alt="Un-Published" title="Un-Published"></i>'?> </td>
										<td><?php echo $p->{Cms_model::_DATE_CREATED};?></td>
										<td>
											<!-- <a class="delete-country" data-toggle="tooltip" alt="Delete content" title="Delete content" 
												data-country-id="<?php echo $p->{Cms_model::_ID}?>" data-country="<?php echo $p->{Cms_model::_TITLE}?>">
												<i class="fa fa-trash fa-2x" aria-hidden="true"></i>
											</a>&nbsp; -->
											<a href="<?php echo base_url('admin/cms/page/edit/'.$p->{Cms_model::_SLUG})?>" data-toggle="tooltip" class="edit-content" alt="Edit content" title="Edit content"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
										
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


<!--  Add New Country Data Modal Start Here -->
<div id="add_new_country_modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		 
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add New Country</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<input type="text" name="country-code" class="form-control" Placeholder="Country Code"/>	
				</div>
				<div class="form-group">
					<input type="text" name="country-name" class="form-control" Placeholder="Country Name"/>	
				</div>
				<div class="form-group">
					<input name="highlight-country" value="1" type="checkbox"> <label>Highlight Country</label>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" name="btn-confirm-add-country" data-dismiss="modal">Add Country</button>
				<button type="button" class="btn btn-danger" name="btn-confirm-faq-cancel" data-dismiss="modal">Cancel</button>
			</div>
		</div>

	</div>
</div>

<!-- Data Modal Ends Here -->


<!--  Add New Country Data Modal Start Here -->
<div id="edit_country_modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		 
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Country</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<input type="text" name="edit-country-code" class="form-control" Placeholder="Country Code"/>	
				</div>
				<div class="form-group">
					<input type="text" name="edit-country-name" class="form-control" Placeholder="Country Name"/>	
				</div>
				<div class="form-group">
					<input name="edit-highlight-country" value="1" type="checkbox"> <label>Highlight Country</label>
					<input type="hidden" name="edit-country-id">
				</div>
			</div>
			<div class="modal-footer">
					<button type="button" class="btn btn-success" name="btn-confirm-update-country" data-dismiss="modal">Update Country</button>
					<button type="button" class="btn btn-danger" name="" data-dismiss="modal">Cancel</button>
			</div>
		</div>

	</div>
</div>

<!-- Data Modal Ends Here -->


<!--  Data Modal Start Here -->
<div id="delete_country_modal" class="modal fade" role="dialog">
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
				<button type="button" class="btn btn-success" name="btn-confirm-country-delete" data-dismiss="modal">Confirm</button>
				<button type="button" class="btn btn-danger" name="btn-confirm-cancel" data-dismiss="modal">Cancel</button>
			</div>
		</div>

	</div>
</div>

<!-- Data Modal Ends Here -->

