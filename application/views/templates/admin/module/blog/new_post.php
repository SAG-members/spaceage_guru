<div class="">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title"><h2>Add New Blog Post</h2><div class="clearfix"></div></div>
				<div class="x_content">
					<div class="row">
						<div class="col-sm-12 post">
							<form name="" action="<?php echo base_url('admin/new-post')?>" method="post">
								
								<div class="form-group mar-b-20">
									<div class="radio visibility-block">
			                            <label> <input type="radio" class="flat" name="visibility" value="1" checked> Public </label>
			                            <label> <input type="radio" class="flat" name="visibility" value="2" > Registered Users </label>
			                            <label> <input type="radio" class="flat" name="visibility" value="3" > Upgraded Users </label>
			                            <label> <input type="radio" class="flat" name="visibility" value="4" > Membership A </label>
			                            <label> <input type="radio" class="flat" name="visibility" value="5" > Membership B </label>
			                            <label> <input type="radio" class="flat" name="visibility" value="6" > Membership C </label>
			                          </div>
								</div>
								
								<div class="form-group mar-b-20">
									<input type="text" name="post-title" class="form-control" placeholder="Blog Post Title"/>
								</div>
								
								<div class="form-group mar-b-20">
									<textarea name="post-content" class="form-control" id="summernote"></textarea>
								</div>
																
								<div class="form-group mar-b-20">
									<div class="col-md-5">
										<div class="row">
											<div class="checkbox visibility-block">
					                            <label><input name="anonymous" value="1" type="checkbox" class="flat" >&nbsp; Post as Anonymous</label>
					                       	</div>
				                       	</div>
			                       	</div>
			                       	<div class="col-md-5"> 
										<div class="row">
											<div class="input-group mar-t-10">
												<span class="input-group-addon" id="basic-addon1"><label><input name="chckbox-price-per-read-article" value="1" type="checkbox" class="flat" > Price per read article</label></span>
						  						<input type="text" class="form-control" name="points" placeholder="Enter vigorbits here" aria-describedby="basic-addon1" style="height: 40px;" disabled>
						  						<span class="input-group-addon">vigorbits</span>
											</div>
										</div> 
									</div>
									<div class="clearfix"></div>
								</div>
								
								<div class="x_panel mar-t-20">
									<div class="x_title">
										<h2>SEO Information</h2>
										<ul class="nav navbar-right panel_toolbox">
					                    	<li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
					                      	
					                    </ul>
										<div class="clearfix"></div>
									</div>
									<div class="x_content collapse">
										<div class="form-group">
											<label class="control-label" for="last-name">Meta Title</label>
											<div>
												<input type="text" class="form-control" name="meta-title" placeholder="Meta Title" >
											</div>
										</div>
										<div class="clearfix"></div>
										<div class="form-group">
											<label class="control-label">Meta Keywords</label> 
											<div class="control-group">
												<input id="tags_1" type="text" name="meta-keywords" class="tags form-control"/>
					                          	<div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
											</div>
										</div>
										<div class="clearfix"></div>
										<div class="form-group">
											<label class="control-label">Meta Description</label> 
											<div class="control-group">
												<textarea name="meta-description" class="classy-editor" placeholder="Meta Description"></textarea>
											</div>
										</div>
										
									</div>
								</div>
					
								<div class="form-group">
									<button type="submit" name="btn-submit-post"
										class="btn btn-success">Publish</button>
								</div>
							</form>		
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
									