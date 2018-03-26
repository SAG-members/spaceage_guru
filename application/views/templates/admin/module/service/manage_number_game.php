<div class="">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title"><h2>Manage Products</h2><div class="clearfix"></div></div>
				<div class="x_content">
					<div id="datatable_wrapper"
						class="dataTables_wrapper form-inline dt-bootstrap no-footer"> 
						<div class="row action-btns mar-b-20">
							<div class="col-sm-6">
							</div>
							<div class="col-sm-6">
								<a href="<?php echo base_url('admin/data/add')?>" class="btn btn-success btn-xs" name="btn-add-new-product">Add New Data</a>
								<button type="button" class="btn btn-primary btn-xs" name="btn-publish-product">Publish</button>
								<button type="button" class="btn btn-danger btn-xs" name="btn-unpublish-product">Un-Publish</button>
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
											<th><input type="checkbox" name="select-all-product" class="select-all-product"/></th>
											<th>Add Picture</th>
											<th>Number</th>
											<th>The Role</th>
											<th>FEAR, TASK, GOAL</th>
											<th>Date Published</th>
											<th>Category</th>
											<th>Visibility</th>
											<th>Status</th>											
											<th></th>											
										</tr>
									</thead>
									<tbody>
									
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

