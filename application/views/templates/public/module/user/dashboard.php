<div class="bs-example mar-t-20">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default" id="myProducts">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">My Data</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    <table class="table table-bordered">
                    	<thead>
                    		<tr>
                    			<th>Data</th>
                    			<th>Edit</th>
                    			<th>Delete</th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		<?php if($datas): foreach ($datas as $p) : ?>
                    			<tr>
                    				<td><a href="<?php echo base_url('user/edit/data/'.$p->{Page::_PAGE_SLUG})?>"><?php echo $p->{Page::_PAGE_TITLE};?></a></td>
                    				
                    				<?php if($p->user_id == $this->session->userdata('id')) :?>
                    				<td class="text-center"><a  class="btn btn-info" href="<?php echo base_url('user/edit/data/'.$p->{Page::_PAGE_SLUG})?>"><i class="fa fa-pencil"></i> Edit</a></td>
                    				<td class="text-center"><a class="btn btn-danger" href="<?php echo base_url('user/delete/data/'.$p->{Page::_ID})?>"><i class="fa fa-close"></i> Delete</a></td>
                    				<?php else: ?>
                    				<td></td>
                    				<td class="text-center"><a class="btn btn-danger" href="<?php echo base_url('user/unsubsribe/data/'.$p->{Page::_ID})?>"><i class="fa fa-close"></i> Delete</a></td>
                    				<?php endif;?>
                    			</tr>
                    		<?php endforeach; endif;?>
                    	</tbody>
                    </table>
                </div>
            </div>
        </div>
       
        
        <div class="panel panel-default" id="mySymptoms">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">My Tasks</a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse in">
                <div class="panel-body">
                    <table class="table table-bordered">
                    	<thead>
                    		<tr>
                    			<th>Task</th>
                    			<th>Edit</th>
                    			<th>Delete</th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		<?php if($tasks): foreach ($tasks as $t) :?>
                    			<tr>
                    				<td><a class="edit_tasks" data-id="<?php echo $t->{Tasks_goals::_ID}; ?>"><?php echo $t->{Tasks_goals::_CONTENT};?></td>
                    				<td class="text-center"><a  class="edit_tasks btn btn-info" data-id="<?php echo $t->{Tasks_goals::_ID}; ?>"><i class="fa fa-pencil"></i> Edit</a></td>
                    				<td class="text-center"><a href="<?php echo base_url('user/delete/task/'.$t->{Tasks_goals::_ID})?>" class="btn btn-danger"><i class="fa fa-close"></i> Delete</a></td>
                    			</tr>
                    		<?php endforeach; endif;?>
                    	</tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="panel panel-default" id="mySymptoms">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">My Goals</a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse in">
                <div class="panel-body">
                    <table class="table table-bordered">
                    	<thead>
                    		<tr>
                    			<th>Goal</th>
                    			<th>Edit</th>
                    			<th>Delete</th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		<?php if($goals): foreach ($goals as $g) :?>
                    			<tr>
                    				<td><a class="edit_goals" data-id="<?php echo $g->{Tasks_goals::_ID};?>"><?php echo $g->{Tasks_goals::_CONTENT};?></td>
                    				<td class="text-center"><a  class="edit_goals btn btn-info" data-id="<?php echo $g->{Tasks_goals::_ID};?>"><i class="fa fa-pencil"></i> Edit</a></td>
                    				<td class="text-center"><a href="<?php echo base_url('user/delete/goal/'.$g->{Tasks_goals::_ID})?>" class="btn btn-danger"><i class="fa fa-close"></i> Delete</a></td>
                    			</tr>
                    		<?php endforeach; endif;?>
                    	</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.panel-title{color:#c653ff !important;}
button a{color: #FFF;}

#editTaskModal > .modal-dialog .modal-content .modal-header .modal-title{color: #000;}
#editGoalModal > .modal-dialog .modal-content .modal-header .modal-title{color: #000;}
</style>


<!--  Edit Task Modal Start -->

<div id="editTaskModal" class="modal fade in" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<form method="post" action="<?php echo base_url('user/update/task');?>">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h4 class="modal-title">Edit Task</h4>
				</div>
				<div class="modal-body">
					<textarea name="content" rows="5" class="form-control"></textarea>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="hidden_type" value="task">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</form>
		</div>

	</div>
</div>


<!--  Edit Task Modal Ends-->


<!-- ==================================================================================================================== -->


<!--  Edit Goal Modal Start -->


<div id="editGoalModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<form method="post" action="<?php echo base_url('user/update/goal')?>">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h4 class="modal-title">Edit Goal</h4>
				</div>
				<div class="modal-body">
					<textarea name="content" rows="5" class="form-control"></textarea>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="hidden_type" value="goal">
					<input type="hidden" name="hidden_type_id">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</form>
		</div>

	</div>
</div>


<!--  Edit Goal Modal Ends -->



<script>
$(function(){
	$(document).on('click','.edit_goals', function(e){
		var id = $(this).data('id');
		var payload = {'id': id}; 
		$.ajax({
			url:BASE_URL+'ajax',
			data:{acid:702,payload:JSON.stringify(payload)},
			type:'post', 
			dataType : 'JSON',
			success:function(data)
			{
				$('#editGoalModal').find('input[type="hidden"][name="hidden_type_id"]').val(data.result.id);
				$('#editGoalModal').find('textarea[name="content"]').val(data.result.content);
				$('#editGoalModal').find('form').attr('action','<?php echo base_url('user/update/goal/')?>'+id);
				
				$('#editGoalModal').modal('show');
			}
		});
	});


	$(document).on('click','.edit_tasks', function(e){
		var id = $(this).data('id');
		var payload = {'id': id}; 
		$.ajax({
			url:BASE_URL+'ajax',
			data:{acid:701,payload:JSON.stringify(payload)},
			type:'post', 
			dataType : 'JSON',
			success:function(data)
			{
				$('#editTaskModal').find('input[type="hidden"][name="hidden_type_id"]').val(data.result.id);
				$('#editTaskModal').find('textarea[name="content"]').val(data.result.content);
				$('#editTaskModal').find('form').attr('action','<?php echo base_url('user/update/task/');?>'+id);

				$('#editTaskModal').modal('show');
			}
		});
	});
});


</script>
