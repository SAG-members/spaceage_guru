<div class="">
<script>
	window.addEventListener( "pageshow", function ( event ) {
  var historyTraversal = event.persisted || ( typeof window.performance != "undefined" && window.performance.navigation.type === 2 );
  if ( historyTraversal ) {
    // Handle page restore.
    window.location.reload();
  }
});
  /*  $(document).ready(function() {
        function disableBack() { 
        	window.history.forward() }
        window.onload = disableBack();
        window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
    });*/
</script>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title"><h2>Manage Spiritual Guidance Roles</h2><div class="clearfix"></div></div>
				<div class="x_content">
					<div id="datatable_wrapper"
						class="dataTables_wrapper form-inline dt-bootstrap no-footer"> 
						<div class="row action-btns mar-b-20">
							<div class="col-sm-6">
							</div>
							<div class="col-sm-6">
								<a href="<?php echo base_url('admin/number-game/add')?>" class="btn btn-success btn-xs" name="btn-add-new-product">Add Role</a>
								<button type="button" class="btn btn-primary btn-xs" name="btn-publish-spiritual">Publish</button>
								<button type="button" class="btn btn-danger btn-xs" name="btn-unpublish-spiritual">Un-Publish</button>
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
											<th><input type="checkbox" name="select-all-spiritual" class="select-all-spiritual"/></th>
											<th>Number</th>
											<th>Add Number Pic</th>
											<th>The Role</th>
											<th>Add Role Pic</th>
											<th>FEAR</th>
											<th>TASK</th>
											<th>GOAL</th>
											<th>Date Published</th>	
											<th>Color Layers Hundres</th>
											<th>Color Layers Tens</th>
											<th>Singles</th>										
											<th></th>											
										</tr>
									</thead>
									<tbody>
									
									<?php if($spirituals): foreach ($spirituals as $spiritual):?>								
									<tr>
										<td><input type="checkbox" name="select-one-spiritual[]" class="select-one-spiritual" data-spiritual-id="<?php echo $spiritual->{Spiritual::_ID};?>"/></td>
										<td><a href="<?php echo base_url('admin/products/edit/'.$spiritual->{Spiritual::_ID});?>"><?php echo $spiritual->{Spiritual::_NUMBER};?></a></td>
										<td><?php $num_url =Template::_ADMIN_UPLOAD_DIR.$spiritual->{Spiritual::_ADD_NUMBER_PIC};
	                 	if(file_exists($num_url)){ echo '<img style="width:80px;" src="'.base_url(Template::_ADMIN_UPLOAD_DIR.$spiritual->{Spiritual::_ADD_NUMBER_PIC}).'" alt="'.$spiritual->{Spiritual::_NUMBER}.'" title="'.$spiritual->{Spiritual::_NUMBER}.'">'; }?></td>
										<td><?php echo $spiritual->{Spiritual::_THE_ROLE};?></td>
										<td><?php $role_url = Template::_ADMIN_UPLOAD_DIR.$spiritual->{Spiritual::_ADD_ROLE_PIC};
		                 if(file_exists($role_url)){ echo '<img style="width:80px;" src="'.base_url(Template::_ADMIN_UPLOAD_DIR.$spiritual->{Spiritual::_ADD_ROLE_PIC}).'" alt="'.$spiritual->{Spiritual::_THE_ROLE}.'" title="'.$spiritual->{Spiritual::_THE_ROLE}.'">';} ?>
										</td>
										<td><?php echo $spiritual->{Spiritual::_FEAR};?></td>
										<td><?php echo $spiritual->{Spiritual::_TASK};?></td>
										<td><?php echo $spiritual->{Spiritual::_GOAL};?></td>		
										<td><?php echo $spiritual->{Spiritual::_DATE_CREATED};?></td>						
										<td><?php $h = explode(',',$spiritual->{Spiritual::_COLOR_LAYERS_HUNDRES}); ?><div class="color-box" style="background-color: rgb(<?= $h[0]?>, <?= $h[1]?>, <?= $h[2]?>);"></div></td>										
										<td><?php $t = explode(',',$spiritual->{Spiritual::_COLOR_LAYERS_TENS});?><div class="color-box" style="background-color: rgb(<?= $t[0]?>, <?= $t[1]?>, <?= $t[2]?>);"></div></td>										
										<td><?php $s = explode(',',$spiritual->{Spiritual::_SINGLES});?><div class="color-box" style="background-color: rgb(<?= $s[0]?>, <?= $s[1]?>, <?= $s[2]?>);"></div></td>										
										<td><a class="delete-spiritual" data-toggle="tooltip" alt="Delete Spiritual"
												title="Delete Spiritual" data-spiritual-id="<?php echo $spiritual->{Spiritual::_ID}?>"
												data-spiritual="<?php echo $spiritual->{Spiritual::_NUMBER};?>"><i
													class="fa fa-trash fa-2x" aria-hidden="true" ></i></a>
												&nbsp;
												<a href="<?php echo base_url('admin/number-game/edit/'.$spiritual->{Spiritual::_ID});?>" data-spiritual-id="<?php echo $spiritual->{Spiritual::_ID}?>" data-toggle="tooltip" class="edit-product" alt="Edit Product"
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
<div id="manage_spiritual_modal" class="modal fade" role="dialog">
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
				<button type="button" class="btn btn-success" name="btn-confirm-spiritual-delete" data-dismiss="modal">Confirm</button>
				<button type="button" class="btn btn-danger" name="btn-confirm-spiritual-cancel" data-dismiss="modal">Cancel</button>
			</div>
		</div>

	</div>
</div>

<!-- Data Modal Ends Here -->

<style type="text/css">

	.color-box {
    width: 20px;
    height: 20px;
    display: inline-block;
    background-color: #ccc;
    position: relative; 
    float:left;
}
a.delete-spiritual {
    cursor: pointer;
    z-index:10;
}
</style>