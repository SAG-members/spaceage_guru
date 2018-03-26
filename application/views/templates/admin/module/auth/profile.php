<div class="">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2><?php echo $title;?></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					
					<div class="row">
						<div class="col-sm-12 post">
							<form method="post" action="<?php echo base_url('admin/update-profile');?>"  enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-6">
										<div class="col-md-6">
										<?php $avtar = $user->{User::_AVATAR_IMAGE} == "" ? '' : '<img src="'.base_url(Template::_PUBLIC_AVTAR_DIR.$user->{User::_AVATAR_IMAGE}).'" width="120px;"/>';?>
										<div class="avtar-image-box mar-t-20">
											<?php echo $avtar;?>
											<div class="fileUpload" style="margin: 0px; position:absolute; bottom:0; color:#FFF;">
												<i class="fa fa-camera fa-2x"></i>
												<input class="upload" id="profile-avtar-image" name="file" type="file">
											</div>
										</div>
										
										</div>
										<div class="col-md-6 mar-t-60">
											<label>Avtar Name</label> <input type="text"
												name="avatar_name" class="mar-b-20"
												" placeholder="Avtar Name"
												value="<?php echo $user->{User::_AVATAR_NAME}?>"/>
										</div>

									</div>
									<div class="col-md-6">
										<label>First Name</label> <input type="text" name="first_name"
											class="mar-b-20" " placeholder="First Name"
											value="<?php echo $user->{User::_F_NAME}?>"/> 
											<label>Last
											Name</label> <input type="text" name="last_name"
											class="mar-b-20" " placeholder="Last Name"
											value="<?php echo $user->{User::_L_NAME}?>"/>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Primary Email</label> <input type="text"
											name="primary_email" class="mar-b-20"
											" placeholder="Primary Email"
											value="<?php echo $user->{User::_EMAIL}?>" disabled/>
									</div>
									<div class="col-md-6">
										<label>Secondary Email</label> <input type="text"
											name="secondary_email" class="mar-b-20"
											" placeholder="Secondary Email"
											value="<?php echo $user->{User::_SECONDARY_EMAIL}?>"/>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>User Type</label>
										<?php $u =  new User();?> 
										<input type="text" name="user_type" class="mar-b-20"
											" placeholder="User Type"
											value="<?php echo $u->get_user_level($user->{User::_USER_GROUP})?>"
											disabled />
									</div>
									<div class="col-md-6">
										<label>Mobile</label> <input type="text" name="mobile"
											class="mar-b-20" " placeholder="Mobile Number"
											value="<?php echo $user->{User::_MOBILE}?>" />
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>What are you</label>
										<?php $u =  new User();?>
										<input type="text" name="what_are_you" class="mar-b-20"
											" placeholder="What are you"
											value="<?php echo $user->{User::_WHAT_ARE_YOU}?>"
											/>
									</div>
									<div class="col-md-6">
										<label>What do you want to become?</label> <input type="text" name="what_do_you_want_to_become"
											class="mar-b-20" " placeholder="What do you want to become"
											value="<?php echo $user->{User::_WHAT_YOU_WANT_TO_BECOME}?>" />
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label>Country</label> <select name="country"
											class="form-control">
											<?php if($countries): foreach($countries as $country):?>
											<?php $selected = ''; if($country['id'] === $user->{User::_COUNTRY}){$selected='selected';}?>
											<option value="<?php echo $country['id'];?>"
												<?php echo $selected;?>><?php echo $country['name'];?></option>
											<?php endforeach; endif;?>
										</select>
									</div>
									<div class="col-md-6">
										<label>Date Created</label> <input type="text"
											name="post-title" class="mar-b-20"
											" placeholder="Date Created"
											value="<?php echo $user->{User::_DATE_CREATED}?>" disabled />
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<input type="submit" class="btn btn-primary" name="update-admin-profile" value="Update"/>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('#profile-avtar-image').on('change', function(){
		
		var countFiles = $(this)[0].files.length;
		var img; var imgPath = $(this)[0].value;
		var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
		var image_holder = $(".avtar-image-box");
		image_holder.find('img').remove();
		img = jQuery('<a href="javascript:void(0);" class="delete-thumb"><i class="fa fa-times" aria-hidden="true"></i></a>');
		
		if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") 
		{
			if (typeof (FileReader) != "undefined") 
			{
				for (var i = 0; i < countFiles; i++) 
				{
					var reader = new FileReader();
					reader.onload = function (e) 
					{
						$("<img />", { "src": e.target.result, "class": "thumbimage"}).appendTo(image_holder);
						jQuery('.avtar-image-box').append(img);
					}
					image_holder.show();
					reader.readAsDataURL($(this)[0].files[i]);
				}
			} 
			else 
			{
				alert("It doesn't supports");
			}
		} 
		else 
		{
			alert("Select Only images");
		}

	});
</script>


