<h2>Add New Product</h2>
<div id="new-post" class="services_text">
	<form name="" action="<?php echo base_url('index.php/product/new-product')?>" method="post"> 
		<label class="checkbox-title">Product Visibility</label>
		<div class="checkboobmain">
			<input type="radio" name="product-visibility" value="1"/> <label class="checkbox-title">Public</label>
			<input type="radio" name="product-visibility" value="2"/> <label class="checkbox-title">Registered Users</label>
			<input type="radio" name="product-visibility" value="3"/> <label class="checkbox-title">Members</label>
		</div>
		<input type="text" name="product-name" class="mar-b-20"" placeholder="Product Name"/>
		<textarea name="product-content" id="productcontent"></textarea>
		<div class="clearfix"></div>
		<div class="checkboobmain">
			<input type="checkbox" name="anonymous" value="1"/> <label>Post as Anonymous</label>
		<div class="clearfix"></div>
		</div>
		
		<div class="field buttons">
			<button type="submit" name="btn-submit-post"
				class="field button">Save</button>
		</div>
	</form>	
</div>
<div class="clearfix"></div>