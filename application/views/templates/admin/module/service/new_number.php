<?php 
$action = base_url('admin/number-game/add');
$number = ''; $add_number_pic = ''; 
$add_role_pic = ''; $fear =''; $task =''; $the_role =''; $goal='';
$task =''; $the_role =''; $goal='';
$color_layers_hundres =''; $color_layers_tens =''; $singles =''; 
$number_pic='';$role_pic='';



if(isset($spiritual))
{
	
	$action = base_url('admin/number-game/edit/'.$spiritual->{Spiritual::_ID});
		
	if($spiritual)
	{
		$number = $spiritual->{Spiritual::_NUMBER};
		$the_role = $spiritual->{Spiritual::_THE_ROLE};	
		$fear = $spiritual->{Spiritual::_FEAR};
		$task = $spiritual->{Spiritual::_TASK};
		$goal = $spiritual->{Spiritual::_GOAL};		
		$color_layers_hundres = $spiritual->{Spiritual::_COLOR_LAYERS_HUNDRES};
		$color_layers_tens = $spiritual->{Spiritual::_COLOR_LAYERS_TENS};
		$singles = $spiritual->{Spiritual::_SINGLES};
		$num_url = Template::_ADMIN_UPLOAD_DIR.$spiritual->{Spiritual::_ADD_NUMBER_PIC};
		$number_pic = $spiritual->{Spiritual::_ADD_NUMBER_PIC};
		$role_pic = $spiritual->{Spiritual::_ADD_ROLE_PIC};
		if(file_exists($num_url)){
		  $add_number_pic = '<img style="width:250px;" src="'.base_url(Template::_ADMIN_UPLOAD_DIR.$spiritual->{Spiritual::_ADD_NUMBER_PIC}).'" alt="'.$spiritual->{Spiritual::_NUMBER}.'" title="'.$spiritual->{Spiritual::_NUMBER}.'">';
		}else{
			$add_number_pic ='';
		}
		$role_url = Template::_ADMIN_UPLOAD_DIR.$spiritual->{Spiritual::_ADD_ROLE_PIC};
		if(file_exists($role_url)){
		  $add_role_pic = '<img style="width:250px;" src="'.base_url(Template::_ADMIN_UPLOAD_DIR.$spiritual->{Spiritual::_ADD_ROLE_PIC}).'" alt="'.$spiritual->{Spiritual::_THE_ROLE}.'" title="'.$spiritual->{Spiritual::_THE_ROLE}.'">';
	  }else{
      $add_role_pic ='';
	  }
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
								<div class="fileUpload btn btn-primary"><span>Upload Number Pic</span><input type="file" class="upload" id="number-pic" name="add_number_pic"/></div>	
								<input type="hidden" class="form-control" name="number_pic_old" placeholder="FEAR" value="<?php echo $number_pic;?>" >	
								<div class="number-pic-preview"><?php echo $add_number_pic;?></div>							
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
							<div class="fileUpload btn btn-primary"><span>Upload Role Pic</span><input type="file" class="upload" id="role-pic" name="add_role_pic"/></div>			
								
							  <input type="hidden" class="form-control" name="role_pic_old" placeholder="FEAR" value="<?php echo $role_pic;?>" >			
								<div class="role-pic-preview"><?php echo $add_role_pic;?></div>												
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
							<label>Color Layers Hundres </label>
							<ul class="color">
								<li class="color">
						        <div class="input-color">
						            <input type="radio" name="color_layers_hundres" value="225, 225, 225" <?php if($color_layers_hundres=="225, 225, 225"){ echo 'checked="checked"';} ?>/>
						            <div class="color-box" style="background-color: rgb(225, 225, 225);"></div>						         
						        </div>
						    </li>
						    <li class="color">
						        <div class="input-color">
						            <input type="radio" name="color_layers_hundres" value="97, 23, 20, 2, 158, 58" <?php if($color_layers_hundres=="97, 23, 20, 2, 158, 58"){ echo 'checked="checked"';} ?>/>
						            <div class="color-box" style="background-color: rgb(97, 23, 20);"></div>						            
						        </div>
						    </li>								      
						</ul>
					
						</div>
					</div>
						<div class="form-group">
						<div class="mar-t-20">							
							<label>Color Layers Tens </label>
							<ul class="color">
								<li class="color">
						        <div class="input-color">
						            <input type="radio" name="color_layers_tens" value="225, 225, 225" <?php if($color_layers_tens=="225, 225, 225"){ echo 'checked="checked"';} ?>/>
						            <div class="color-box" style="background-color: rgb(225, 225, 225);"></div>						         
						        </div>
						    </li>
						    <li class="color">
						        <div class="input-color">
						            <input type="radio" name="color_layers_tens" value="97, 23, 20, 2, 158, 58" <?php if($color_layers_tens=="97, 23, 20, 2, 158, 58"){ echo 'checked="checked"';} ?>/>
						            <div class="color-box" style="background-color: rgb(97, 23, 20);"></div>						            
						        </div>
						    </li>
						    <li class="color">
						        <div class="input-color">
						            <input type="radio" name="color_layers_tens" value="241, 131, 19, 20, 213, 122" <?php if($color_layers_tens=="241, 131, 19, 20, 213, 122"){ echo 'checked="checked"';} ?>/>
						            <div class="color-box" style="background-color: rgb(241, 131, 19);"></div>						           
						        </div>
						    </li>
						       <li class="color">
						        <div class="input-color">
						            <input type="radio" name="color_layers_tens" value="218, 165, 28, 29, 185, 1162" <?php if($color_layers_tens=="218, 165, 28, 29, 185, 1162"){ echo 'checked="checked"';} ?>/>
						            <div class="color-box" style="background-color: rgb(218, 165, 28);"></div>						           
						        </div>
						    </li>
						       <li class="color">
						        <div class="input-color">
						            <input type="radio" name="color_layers_tens" value="73, 173, 50, 73, 132, 105" <?php if($color_layers_tens=="73, 173, 50, 73, 132, 105"){ echo 'checked="checked"';} ?>/>
						            <div class="color-box" style="background-color: rgb(73, 173, 50);"></div>						            
						        </div>
						    </li>
						       <li class="color">
						        <div class="input-color">
						            <input type="radio" name="color_layers_tens" value="37, 74, 154, 147, 147, 90" <?php if($color_layers_tens=="37, 74, 154, 147, 147, 90"){ echo 'checked="checked"';} ?>/>
						            <div class="color-box" style="background-color: rgb(37, 74, 154);"></div>						            
						        </div>
						    </li>
						       <li class="color">
						        <div class="input-color">
						            <input type="radio" name="color_layers_tens" value="190, 116, 174, 209, 87, 144" <?php if($color_layers_tens=="190, 116, 174, 209, 87, 144"){ echo 'checked="checked"';} ?>/>
						            <div class="color-box" style="background-color: rgb(190, 116, 174);"></div>	
						        </div>
						    </li>
						       <li class="color">
						        <div class="input-color">
						            <input type="radio"  name="color_layers_tens" value="20, 61, 112, 142,167, 62" <?php if($color_layers_tens=="20, 61, 112, 142,167, 62"){ echo 'checked="checked"';} ?>/>
						            <div class="color-box" style="background-color: rgb(20, 61, 112);"></div>
						        </div>
						    </li>

						       <li class="color">
						        <div class="input-color">
						            <input type="radio" name="color_layers_tens" value="88, 49, 137, 178, 114, 88" <?php if($color_layers_tens=="88, 49, 137, 178, 114, 88"){ echo 'checked="checked"';} ?>/>
						            <div class="color-box" style="background-color: rgb(88, 49, 137);" ></div>
						        </div>
						    </li>					      
						</ul>
						</div>
					</div>		
					<div class="form-group">
						<div class="mar-t-20">							
							<label>Singles</label>
											<ul class="color">
								<li class="color">
						        <div class="input-color">
						            <input type="radio" name="singles" value="225, 225, 225" <?php if($singles=="225, 225, 225"){ echo 'checked="checked"';} ?>/>
						            <div class="color-box" style="background-color: rgb(225, 225, 225);"></div>						         
						        </div>
						    </li>
						    <li class="color">
						        <div class="input-color">
						            <input type="radio" name="singles" value="97, 23, 20, 2, 158, 58" <?php if($singles=="97, 23, 20, 2, 158, 58"){ echo 'checked="checked"';} ?>/>
						            <div class="color-box" style="background-color: rgb(97, 23, 20);"></div>						            
						        </div>
						    </li>
						    <li class="color">
						        <div class="input-color">
						            <input type="radio" name="singles" value="241, 131, 19, 20, 213, 122" <?php if($singles=="241, 131, 19, 20, 213, 122"){ echo 'checked="checked"';} ?>/>
						            <div class="color-box" style="background-color: rgb(241, 131, 19);"></div>						           
						        </div>
						    </li>
						       <li class="color">
						        <div class="input-color">
						            <input type="radio" name="singles" value="218, 165, 28, 29, 185, 1162" <?php if($singles=="218, 165, 28, 29, 185, 1162"){ echo 'checked="checked"';} ?>/>
						            <div class="color-box" style="background-color: rgb(218, 165, 28);"></div>						           
						        </div>
						    </li>
						       <li class="color">
						        <div class="input-color">
						            <input type="radio" name="singles" value="73, 173, 50, 73, 132, 105" <?php if($singles=="73, 173, 50, 73, 132, 105"){ echo 'checked="checked"';} ?>/>
						            <div class="color-box" style="background-color: rgb(73, 173, 50);"></div>						            
						        </div>
						    </li>
						       <li class="color">
						        <div class="input-color">
						            <input type="radio" name="singles" value="37, 74, 154, 147, 147, 90" <?php if($singles=="37, 74, 154, 147, 147, 90"){ echo 'checked="checked"';} ?>/>
						            <div class="color-box" style="background-color: rgb(37, 74, 154);"></div>						            
						        </div>
						    </li>
						       <li class="color">
						        <div class="input-color">
						            <input type="radio" name="singles" value="190, 116, 174, 209, 87, 144" <?php if($singles=="190, 116, 174, 209, 87, 144"){ echo 'checked="checked"';} ?> />
						            <div class="color-box" style="background-color: rgb(190, 116, 174);"></div>	
						        </div>
						    </li>
						       <li class="color">
						        <div class="input-color">
						            <input type="radio" name="singles" value="20, 61, 112, 142,167, 62" <?php if($singles=="0, 61, 112, 142,167, 62"){ echo 'checked="checked"';} ?>/>
						            <div class="color-box" style="background-color: rgb(20, 61, 112);"></div>
						        </div>
						    </li>

						       <li class="color">
						        <div class="input-color">
						            <input type="radio" name="singles" value="88, 49, 137, 178, 114, 88" <?php if($singles=="88, 49, 137, 178, 114, 88"){ echo 'checked="checked"';} ?> />
						            <div class="color-box" style="background-color: rgb(88, 49, 137);"></div>
						        </div>
						    </li>					      
						</ul>
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

<style type="text/css">
	.input-color {
		    position: relative;
	}
	.input-color input {
	     margin-right: 5px;
	     float: left;
	}
	.input-color .color-box {
    width: 20px;
    height: 20px;
    display: inline-block;
    background-color: #ccc;
    position: relative; 
    float:left;
}
li.color {
    float: left;
    margin-left: 10px;
    list-style: none;
}
</style>