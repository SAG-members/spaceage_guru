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
								<a href="" class="btn btn-success btn-xs" name="btn-add-new-country" data-toggle="modal" data-target="#add_new_country_modal">Add New country</a>
								<button type="button" class="btn btn-primary btn-xs" name="btn-publish-country">Publish</button>
								<button type="button" class="btn btn-danger btn-xs" name="btn-unpublish-country">Un-Publish</button>
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
											<th><input type="checkbox" name="select-all-country" class="select-all-country"/></th>
											<th>Country Code</th>
											<th>Country Name</th>
											<th>Status</th>
											<th>Date Created</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php if($countries): foreach ($countries as $country):?>
									<tr>
										<td><input type="checkbox" name="select-one-country[]" class="select-one-country" data-country-id="<?php echo $country->{Country_model::_ID};?>"/></td>
										<td><?php echo $country->{Country_model::_COUNTRY_CODE};?></td>
										<td><?php echo $country->{Country_model::_COUNTRY_NAME};?></td>
										<td><?php echo $country->{Country_model::_STATUS} ? '<i class="fa fa-eye fa-2x" aria-hidden="true" alt="Published" title="Published"></i>' : '<i class="fa fa-eye-slash fa-2x" aria-hidden="true" alt="Un-Published" title="Un-Published"></i>'?> </td>
										<td><?php echo $country->{Country_model::_DATE_CREATED};?></td>
										<td>
											<a class="delete-country" data-toggle="tooltip" alt="Delete country" title="Delete country" 
												data-country-id="<?php echo $country->{Country_model::_ID}?>" data-country="<?php echo $country->{Country_model::_COUNTRY_NAME}?>">
												<i class="fa fa-trash fa-2x" aria-hidden="true"></i>
											</a>&nbsp;
											<a href="javascript:void(0)" 
												data-country-id="<?php echo $country->{Country_model::_ID}?>" data-toggle="tooltip" class="edit-country" alt="Edit country"
												title="Edit country"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
										
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
				<h4 class="modal-title">Add New Country/ Country Group</h4>
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
				<div class="form-group">
					<input name="is_group" value="1" type="checkbox"> <label>Is Group ?</label>
				</div>
				
				<div class="form-group country group_countries" style="display:none;">
					<select name="legal_countries[]" class="form-control select_6_multiple" multiple required style="width:100%">
						<option></option>
						<?php if($countries): foreach ($countries as $country) :?>
						<option data-id="<?php echo $country->id?>" value="<?php echo $country->id;?>"><?php echo $country->country_name;?></option>
						<?php endforeach; endif;?>
					</select>
				</div>
				
				<div class="form-group">
				    <div class="map_preview_box_wrapper">
				        <div class="map_preview_box"></div>
				        <div class="fileUpload" style="bottom: 0px; position:absolute;"><i class="fa fa-camera fa-2x"></i><input type="file" class="upload upload-country-image" name="add_country"/></div>
				    </div>
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
				<div class="form-group">
					<input name="is_group" value="1" type="checkbox"> <label>Is Group ?</label>
				</div>
				
				<div class="form-group country group_countries" style="display:none;">
					<select name="legal_countries[]" class="form-control select_6_multiple" multiple required style="width:100%">
						<option></option>
						<?php if($countries): foreach ($countries as $country) :?>
						<option data-id="<?php echo $country->id?>" value="<?php echo $country->id;?>"><?php echo $country->country_name;?></option>
						<?php endforeach; endif;?>
					</select>
				</div>
				
				<div class="form-group">
				    <div class="map_preview_box_wrapper">
				        <div class="map_preview_box"></div>
				        <div class="fileUpload" style="bottom: 0px; position:absolute;"><i class="fa fa-camera fa-2x"></i><input type="file" class="upload upload-country-image" name="add_country"/></div>
				    </div>
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


<script>
$('.upload-country-image').off('change').on('change', function(){
	Util.previewUploadedImage($(this)[0], $(this).parent('div').siblings('.map_preview_box'));
});
</script>