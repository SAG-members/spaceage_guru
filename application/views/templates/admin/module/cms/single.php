<?php 
$action = base_url('admin/cms/page/add'); $title = ""; $content=""; $metaTitle = ""; $metaKeyword = ""; $metaDescription = ""; 
if(isset($page))
{
	$action = base_url('admin/cms/page/edit/'.$page->{Cms_model::_SLUG});
	$title = $page->{Cms_model::_TITLE};
	$content = $page->{Cms_model::_CONTENT};
	$metaTitle = $page->{Cms_model::_META_TITLE};
	$metaKeyword = $page->{Cms_model::_META_KEYWORD};
	$metaDescription = $page->{Cms_model::_META_DESCRIPTION};	
}


?>


<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2><?php echo $title;?></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br>
				<form id="demo-form2" action="<?php echo $action?>"  method="post" class="form-horizontal form-label-left">
					<div class="form-group">
						<label class="control-label" for="last-name">Title</label>
						<div>
							<input type="text" class="form-control" name="title" placeholder="Page Title" value="<?php echo $title;?>" required>
						</div>
					</div>
					<div class="form-group">
						<label for="middle-name" class="control-label">Description</label>
						<div>
							<textarea name="description" id="summernote" placeholder="Page Description" required><?php echo $content;?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="last-name">Meta Title</label>
						<div>
							<input type="text" class="form-control" name="meta-title" placeholder="Meta Title" value="<?php echo $metaTitle?>">
						</div>
					</div>
					<div class="form-group">
						<label for="middle-name" class="control-label">Meta Keywords</label> 
						<div class="control-group">
							<input id="tags_1" type="text" name="meta-keywords" class="tags form-control" value="<?php echo $metaKeyword?>"/>
                          	<div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
						</div>
					</div>
					<div class="form-group">
						<label for="middle-name" class="control-label">Meta Description</label> 
						<div>
							<textarea name="meta-description" class="classy-editor" placeholder="Meta Description"><?php echo $metaDescription;?></textarea>
						</div>
					</div>
					
					<div class="ln_solid"></div>
					<div class="form-group">
						<div>
							<?php if(isset($page)):?>
							<input type="hidden" name="page-id" value="<?php echo $page->{Cms_model::_ID};?>"/>
							<?php endif;?>
							<button id="send" type="submit" class="btn btn-success">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>