<?php 
$action = base_url('admin/number-game/add');
$number = ''; $add_number_pic = ''; 
$add_role_pic = ''; $fear =''; $task =''; $the_role =''; $goal='';
$task =''; $the_role =''; $goal='';
$color_layers_hundres =''; $color_layers_tens =''; $singles =''; 


if(isset($spiritual))
{
	
	$action = base_url('admin/number-game/edit/'.$spiritual->{Spiritual::_ID});
		
	if($spiritual)
	{
		$number = $spiritual->{Spiritual::_NUMBER};
	  $add_number_pic = $spiritual->{Spiritual::_ADD_NUMBER_PIC};
		$the_role = $spiritual->{Spiritual::_THE_ROLE};
		$add_role_pic = $spiritual->{Spiritual::_ADD_ROLE_PIC};
		$fear = $spiritual->{Spiritual::_FEAR};
		$task = $spiritual->{Spiritual::_TASK};
		$goal = $spiritual->{Spiritual::_GOAL};		
		$color_layers_hundres = $spiritual->{Spiritual::_COLOR_LAYERS_HUNDRES};
		$color_layers_tens = $spiritual->{Spiritual::_COLOR_LAYERS_TENS};
		$singles = $spiritual->{Spiritual::_SINGLES};
	}
	
	
	
	
}


?>

<div class="row pss_div">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2><?php echo $title;?></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br>
				<form id="demo-form2" action="<?php echo $action;?>"  method="post" class="form-horizontal form-label-left" enctype="multipart/form-data"> 
					<div class="form-group">
						<div class="mar-t-20 ">
							<label> Number </label>
							<input type="text" class="form-control" name="number" placeholder="Number" value="<?php echo $number;?>" >
						</div>						
					</div>
					<div class="form-group">
						<div class="mar-t-20 ">
							<label>Add Number Pic</label>
							<input type="text" class="form-control" name="add_number_pic" placeholder="Add Number Pic" value="<?php echo $add_number_pic;?>" >
						</div>						
					</div>
					<div class="form-group">
						<div class="mar-t-20 ">
							<label>The Role</label>
							<input type="text" class="form-control" name="the_role" placeholder="The Role" value="<?php echo $the_role;?>" >
						</div>						
					</div>
					<div class="form-group">
						<div class="mar-t-20">
							<label>Add Role Pic</label>
							<input type="text" class="form-control" name="add_role_pic" placeholder="Add Role Pic" value="<?php echo $add_role_pic;?>" >
						</div>
					</div>
					
					<div class="form-group">
						<div class="mar-t-20">
							<label>Fear</label>
							<input type="text" class="form-control" name="fear" placeholder="FEAR" value="<?php echo $fear;?>" >
						</div>
					</div>
					<div class="form-group">
						<div class="mar-t-20">
							<label>Task</label>
							<input type="text" class="form-control" name="task" placeholder="TASK" value="<?php echo $task;?>" >
						</div>
					</div>
					<div class="form-group">
						<div class="mar-t-20">
							<label>Goal</label>
							<input type="text" class="form-control" name="goal" placeholder="GOAL" value="<?php echo $goal;?>" >
						</div>
					</div>
					<div class="form-group">
						<div class="mar-t-20">							
							<label>Color Layers Hundres <?php echo $color_layers_hundres;?></label>
							<select class="form-control" name="color_layers_hundres">
								<option  value="" <?php if($color_layers_hundres == ''){ echo 'selected';} ?>>Select Option</option>
								<option data-id="1" value="0" <?php if($color_layers_hundres =='0'){ echo 'selected';} ?>>White</option>
								<option data-id="2" value="1" <?php if($color_layers_hundres == '1'){ echo 'selected';} ?>>Red</option>
							</select>
						</div>
					</div>
						<div class="form-group">
						<div class="mar-t-20">							
							<label>Color Layers Tens </label>
							<select class="form-control" name="color_layers_tens">
								<option  value="" <?php if($color_layers_tens == ''){ echo 'selected';} ?>>Select Option</option>
								<option data-id="1" value="0" <?php if($color_layers_tens == '0'){ echo 'selected';} ?>>White</option>
								<option data-id="2" value="1" <?php if($color_layers_tens == '1'){ echo 'selected';} ?>>Red</option>
								<option data-id="3" value="2" <?php if($color_layers_tens == '2'){ echo 'selected';} ?>>Orange</option>
								<option data-id="4" value="3" <?php if($color_layers_tens == '3'){ echo 'selected';} ?>>Gold</option>
								<option data-id="5" value="4" <?php if($color_layers_tens == '4'){ echo 'selected';} ?>>Green</option>
								<option data-id="6" value="5" <?php if($color_layers_tens == '5'){ echo 'selected';} ?>>Blue</option>
								<option data-id="7" value="6" <?php if($color_layers_tens == '6'){ echo 'selected';} ?>>Pink</option>
								<option data-id="8" value="7" <?php if($color_layers_tens == '7'){ echo 'selected';} ?>>Indigo</option>
								<option data-id="9" value="8" <?php if($color_layers_tens == '8'){ echo 'selected';} ?>>Red</option>
								<option data-id="10" value="9" <?php if($color_layers_tens == '9'){ echo 'selected';} ?>>Violet</option>
								<option data-id="11" value="10" <?php if($color_layers_tens == '10'){ echo 'selected';} ?>>Rainbow</option>
							</select>
						</div>
					</div>		
					<div class="form-group">
						<div class="mar-t-20">							
							<label>Singles</label>
							<select class="form-control" name="singles">
								<option  value="" <?php if($singles == ''){ echo 'selected';} ?>>Select Option</option>
								<option data-id="1" value="0" <?php if($singles == '0'){ echo 'selected';} ?>>White</option>
								<option data-id="2" value="1" <?php if($singles == '1'){ echo 'selected';} ?>>Red</option>
								<option data-id="3" value="2" <?php if($singles == '2'){ echo 'selected';} ?>>Orange</option>
								<option data-id="4" value="3" <?php if($singles == '3'){ echo 'selected';} ?>>Gold</option>
								<option data-id="5" value="4" <?php if($singles == '4'){ echo 'selected';} ?>>Green</option>
								<option data-id="6" value="5" <?php if($singles == '5'){ echo 'selected';} ?>>Blue</option>
								<option data-id="7" value="6" <?php if($singles == '6'){ echo 'selected';} ?>>Pink</option>
								<option data-id="8" value="7" <?php if($singles == '7'){ echo 'selected';} ?>>Indigo</option>
								<option data-id="9" value="8" <?php if($singles == '8'){ echo 'selected';} ?>>Red</option>
								<option data-id="10" value="9" <?php if($singles == '9'){ echo 'selected';} ?>>Violet</option>
								<option data-id="11" value="10" <?php if($singles == '10'){ echo 'selected';} ?>>Rainbow</option>
							</select>
						</div>
					</div>
					<div class="ln_solid"></div>
					<div class="form-group mar-t-20">						
						<div><button id="send" type="submit" name="submit" value="submit" class="btn btn-success">Submit</button></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
$(function(){
	
});


</script>