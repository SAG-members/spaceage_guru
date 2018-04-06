<div class="menu">
    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 fullcol">
        <div class="leftmain">
        	<div>
				<div class="input-group">
			  		<input type="text" name="wiki-search" class="form-control" placeholder="Write what you want" aria-describedby="basic-addon1">
			  		<span class="input-group-btn">
		        		<button class="btn btn-secondary" name="btn-wiki-search" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
		      		</span>
				</div>
				
    			<h4>Advance Search Option <a class="open_library_advance_search pull-right"><i class="fa fa-plus"></i></a></h4>
    			<div class="library_advance_search" id="new-post">
    				<div class="row">
    					<div class="col-md-12" style="margin-bottom: 5px;">
    						<div class="input-group">
    							<span class="input-group-addon level-public"><input type="checkbox" name="data_type[]" value="<?php echo Page::_CATEGORY_SERVICE?>"/></span>
    						  	<input type="text" class="form-control level-public data_type" value="Service">
    						</div>
    					</div>
    					<div class="col-md-12" style="margin-bottom: 5px;">
    						<div class="input-group">
    							<span class="input-group-addon level-registered"><input type="checkbox" name="data_type[]" value="<?php echo Page::_CATEGORY_PRODUCT?>"/></span>
    						  	<input type="text" class="form-control level-registered data_type" value="Product">
    						</div>
    					</div>
    					<div class="col-md-12" style="margin-bottom: 5px;">
    						<div class="input-group">
    							<span class="input-group-addon level-upgraded"><input type="checkbox" name="data_type[]" value="<?php echo Page::_CATEGORY_SENSES?>"/></span>
    						  	<input type="text" class="form-control level-upgraded data_type" value="Sensation">
    						</div>
    					</div>
    					<div class="col-md-12" style="margin-bottom: 5px;">
    						<div class="input-group">
    							<span class="input-group-addon level-membershipa"><input type="checkbox" name="data_type[]" value="<?php echo Page::_CATEGORY_LEAGAL_NOTE?>"/></span>
    						  	<input type="text" class="form-control level-membershipa data_type" value="Legal Note">
    						</div>
    					</div>
    					<div class="col-md-12" style="margin-bottom: 5px;">
    						<div class="input-group">
    							<span class="input-group-addon level-membershipb"><input type="checkbox" name="data_type[]" value="<?php echo Page::_CATEGORY_AUDIO_VISUAL?>"/></span>
    						  	<input type="text" class="form-control level-membershipb data_type" value="Audio/Visual">
    						</div>
    					</div>
    					<div class="col-md-12" style="margin-bottom: 5px;">
    						<div class="input-group">
    							<span class="input-group-addon level-membershipc"><input type="checkbox" name="data_type[]" value="<?php echo Page::_CATEGORY_ARTICLE?>"/></span>
    						  	<input type="text" class="form-control level-membershipc data_type" value="Article">
    						</div>
    					</div>
    					<div class="col-md-12" style="margin-bottom: 5px;">
    						<div class="input-group">
    							<span class="input-group-addon level-symptom"><input type="checkbox" name="data_type[]" value="<?php echo Page::_CATEGORY_SYMPTOM?>"/></span>
    						  	<input type="text" class="form-control level-symptom data_type" value="Symptom">
    						</div>
    					</div>
    					<div class="col-md-12" style="margin-bottom: 5px;">
    						<div class="input-group">
    							<span class="input-group-addon level-cures"><input type="checkbox" name="data_type[]" value="<?php echo Page::_CATEGORY_CURES?>"/></span>
    						  	<input type="text" class="form-control level-cures data_type" value="Cures">
    						</div>
    					</div>
    					
    					<div class="col-md-12" style="margin-bottom: 5px;">
    						<input type="text" name="tags" class="form-control tags data_type" placeholder="Tags">
    					</div>
    				</div>
    			</div>
			
			
			</div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 fullcol">
    	<div class="midmain">
    		<p>!WE ARE LIVING IN IT SO LETS START HEALING IT WHILE ENJOYING LIFE ON IT!</p>
    	</div>
    </div>
    
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 fullcol">
        <div class="rightmain">
        	<?php if(!$this->session->userdata('id')) : ?>
        	<div class="text-center white-color">
        		<p>
        			
        			<a class="white-color" href="<?php echo base_url('register'); ?>">REGISTER</a>
        		</p>
        	</div>
        	<form action="<?php echo base_url('login')?>" method="post">
        		<div class="col-md-6 pad-l-0 pad-r-0"><input class="password" name="username" type="text" placeholder="username"></div>
        		<div class="col-md-6 pad-l-0 pad-r-0">
        			<div class="input-group">
    			  		<input class="password" type="password" name="password" placeholder="password">
    			  		<span class="input-group-btn">
    		        		<button style="height: 43px;" class="btn btn-secondary" name="btn-wiki-search" type="submit">Login</button>
    		      		</span>
    				</div>
        		</div>
        	</form>
        	<?php else : ?>
        	<a class="pull-right btn btn-danger button mar-t-20" href="<?php echo base_url('logout'); ?>">Logout</a>
        	<?php endif; ?>
        </div>
    </div>
</div>
<script>
$('.open_library_advance_search').on('click', function(e){
	e.preventDefault();
	
	if($('.library_advance_search').is(':visible'))
	{
		$(this).children('i').removeClass('fa fa-minus').addClass('fa fa-plus');
		$('.library_advance_search').hide();
	}
	else
	{
		$(this).children('i').removeClass('fa fa-plus').addClass('fa fa-minus');
		$('.library_advance_search').show();
	}
	
});

</script>