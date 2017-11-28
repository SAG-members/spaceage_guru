<h2>Add Blog New Post</h2>
<div id="new-post" class="services_text">
	<form name="" action="<?php echo base_url('index.php/blog/new-post')?>" method="post">
		
		<div class="row">
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-public"><input type="radio" name="visibility" value="1" checked/></span>
				  	<input type="text" class="form-control level-public" value="Public" disabled>
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-registered"><input type="radio" name="visibility" value="2"/></span>
				  	<input type="text" class="form-control level-registered" value="Registered Users 'RU'" disabled>
				</div>
			</div>
			
		</div>
		
		<div class="row mar-t-20">
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-upgraded"><input type="radio" name="visibility" value="3"/></span>
				  	<input type="text" class="form-control level-upgraded" value="Upgraded Users 'UU'" disabled>
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-membershipa"><input type="radio" name="visibility" value="4"/></span>
				  	<input type="text" class="form-control level-membershipa" value="Membership A" disabled>
				</div>
			</div>
		</div>
		
		<div class="row mar-t-20">
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-membershipb"><input type="radio" name="visibility" value="5"/></span>
				  	<input type="text" class="form-control level-membershipb" value="Membership B" disabled>
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group">
					<span class="input-group-addon level-membershipc"><input type="radio" name="visibility" value="6"/></span>
				  	<input type="text" class="form-control level-membershipc" value="Membership C" disabled>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
								
		<div class="form-group">
			<input type="text" name="post-title" class="password mar-b-20" placeholder="Post Title"/>
		</div>
		
		<div class="form-group">
			<textarea name="post-content" class="password" id="summernote"></textarea>
		</div>
		
		<div class="clearfix"></div>
		
		<div class="checkboobmain">
			<input type="checkbox" name="anonymous" value="1"/> <label>Post as Anonymous</label>
		</div>
		
		<div class="checkboobmain">		
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><label><input name="chckbox-price-per-read-article" value="1" type="checkbox" class="flat"> Price per read article</label></span>
  				<input type="text" class="form-control" name="points" placeholder="Enter vigorbits here" aria-describedby="basic-addon1" style="height: 40px;">
  				<span class="input-group-addon"><label>vigorbits</label></span>
			</div>
		</div>
		
		<div class="field buttons">
			<button type="submit" name="btn-submit-post"
				class="field button">Publish</button>
		</div>
	</form>	
</div>
<div class="clearfix"></div>