<div class="leftmain">
	<ul>
		<li>Public Library</li>
		<li>
			<div style="padding-right:15px;">
				<div class="input-group">
			  		<input type="text" name="wiki-search" class="form-control" placeholder="Search" aria-describedby="basic-addon1">
			  		<span class="input-group-btn">
		        		<button class="btn btn-secondary" name="btn-wiki-search" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
		      		</span>
				</div>
			</div>
			
			<?php if($this->session->userdata('id')):?>
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
			
			<?php endif;?>
			
			
		</li>
	</ul>
		
	<ul>
		<li>Data <a class="pull-right add-pss" href="<?php echo base_url('user/add/data');?>" title="Add Data" alt="Add Data"><i class="fa fa-plus"></i> </a></li>
		<!-- 
		<?php if($this->session->userdata('isLoggedIn')):?>
		<?php if(!empty($leftSideData['datas'])): foreach ($leftSideData['datas'] as $q):?>
			<li><a class="external-event" href="<?php echo base_url('user/data/'.$q->{Page::_PAGE_SLUG});?>">< <?php echo $q->{Page::_PAGE_TITLE};?></a></li>
		<?php endforeach; endif;?>
		<?php else:?>
		<li><a>Login or Register to view</a></li>
		<?php endif;?>
		 -->
	</ul>
	 
	 	
	<div class="copyright">&copy; <?php echo date("Y");?> Spaceage guru</div>
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

$('.add-friend').on('click', function(){
	var newForm = jQuery('<form>', {
        'action': BASE_URL + 'profile',
        'target': '_top',
        'method':'post'	
    }).append(jQuery('<input>', {
        'name': 'input',
        'type': 'hidden',
        'value': 'invite_friend',
    }));
	
	newForm.appendTo('body').submit();
});

</script>

