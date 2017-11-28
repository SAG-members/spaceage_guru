<div class="">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Manage Blogs</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div id="datatable_wrapper"
						class="dataTables_wrapper form-inline dt-bootstrap no-footer">
						<div class="row action-btns mar-b-20">
							<div class="col-sm-6"></div>
							<div class="col-sm-6">
								<a href="<?php echo base_url('admin/new-post')?>"
									class="btn btn-success btn-xs">New Blog</a>
								<button type="button" class="btn btn-primary btn-xs" name="btn-publish-post">Publish</button>
								<button type="button" class="btn btn-danger btn-xs" name="btn-unpublish-post">Un-Publish</button>
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
<!-- 									<label>Search:<input type="search" -->
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
											<th><input type="checkbox" name="select-all" class="select-all"/></th>
											<th>Title</th>
											<th>Author</th>
											<th>Post Date</th>
											<th>Modified Date</th>
											<th>Status</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php if($blogs): foreach ($blogs as $blog):?>
									<tr>
											<td><input type="checkbox" name="select-one[]" class="select-one" data-post-id="<?php echo $blog['id'];?>"/></td>
											<td><a
												href="<?php echo base_url('admin/edit-post/'.$blog['id'])?>"><?php echo $blog['post_title'];?></a></td>
											<td><?php echo $blog['user_id'];?></td>
											<td><?php echo $blog['published_date'];?></td>
											<td><?php echo $blog['modified_date'];?></td>
											<td><?php $status = $blog['status'] ?  '<i class="fa fa-eye fa-2x" aria-hidden="true" data-toggle="tooltip" alt="Published" title="Published"></i>':'<i class="fa fa-eye-slash fa-2x" alt="Un-Published" data-toggle="tooltip" title="Un-Published" aria-hidden="true"></i>';echo $status;?> </td>
											<td><a class="delete-post" data-toggle="tooltip" alt="Delete Post"
												title="Delete Post" data-post-id="<?php echo $blog['id']?>"
												data-post-title="<?php echo $blog['post_title'];?>"><i
													class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
												&nbsp;
												<a href="<?php echo base_url('admin/edit-post/'.$blog['id'])?>" data-toggle="tooltip" class="edit-post" alt="Edit Post"
												title="Edit Post"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></a>
											</td>

										</tr>
									<?php endforeach; endif;?>
									</tbody>
								</table>
							</div>
						</div>
						<!-- 						<div class="row"> -->
						<!-- 							<div class="col-sm-5"> -->
						<!-- <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of <?php //echo $count;?> entries</div> -->
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
<div id="manage_blog_modal" class="modal fade" role="dialog">
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
				<button type="button" class="btn btn-success" name="btn-confirm-blog-delete" data-dismiss="modal">Confirm</button>
				<button type="button" class="btn btn-danger" name="btn-confirm-cancel" data-dismiss="modal">Cancel</button>
			</div>
		</div>

	</div>
</div>

<!-- Data Modal Ends Here -->
