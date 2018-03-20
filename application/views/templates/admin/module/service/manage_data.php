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
											<th>Product</th>
<!-- 											<th>Description</th> -->
											<th>Author</th>
											<th>Date Published</th>
											<th>Category</th>
											<th>Visibility</th>
											<th>Status</th>
											<th>Price</th>
											<th></th>
											
										</tr>
									</thead>
									<tbody>
									<?php if($datas): foreach ($datas as $service):?>
									<?php $page =  new Page();?>
									<tr>
										<td><input type="checkbox" name="select-one-product[]" class="select-one-product" data-product-id="<?php echo $service->{Page::_ID};?>"/></td>
										<td><a href="<?php echo base_url('admin/data/edit/'.$service->{Page::_ID});?>"><?php echo $service->{Page::_PAGE_TITLE};?></a></td>
										<td><?php echo generate_user_id($service->{Page::_USER_ID});?></td>
										<td><?php echo $service->{Page::_DATE_CREATED};?></td>
										<td><?php echo $page->get_category($service->{Page::_CATEGORY_ID});?></td>
										<td><?php echo $page->get_visibility($service->{Page::_VISIBILITY});?></td>
										<td><?php $status = $service->{Page::_STATUS} ?  '<i class="fa fa-eye fa-2x" aria-hidden="true" data-toggle="tooltip" alt="Published" title="Published"></i>':'<i class="fa fa-eye-slash fa-2x" alt="UnPublished" data-toggle="tooltip" title="UnPublished" aria-hidden="true"></i>';echo $status;?> </td>
										<td><?php echo $service->{Page::_PRICE}?></td>
										<td><a class="delete-product" data-toggle="tooltip" alt="Delete Product"
												title="Delete Product" data-product-id="<?php echo $service->{Page::_ID}?>"
												data-product="<?php echo $service->{Page::_PAGE_TITLE};?>"><i
													class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
												&nbsp;
												<a href="<?php echo base_url('admin/data/edit/'.$service->{Page::_ID});?>" data-product-id="<?php echo $service->{Page::_ID}?>" data-toggle="tooltip" class="edit-product" alt="Edit Product"
												title="Edit Product"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a> 
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
<div id="manage_product_modal" class="modal fade" role="dialog">
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
				<button type="button" class="btn btn-success" name="btn-confirm-product-delete" data-dismiss="modal">Confirm</button>
				<button type="button" class="btn btn-danger" name="btn-confirm-product-cancel" data-dismiss="modal">Cancel</button>
			</div>
		</div>

	</div>
</div>

<!-- Data Modal Ends Here -->
