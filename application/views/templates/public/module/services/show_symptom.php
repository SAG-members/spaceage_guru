<h2>Symptom</h2>
<hr/>
<h4><?php echo $symptom->{Symptom_model::_SYMPTOM};?></h4>
<p><?php echo $symptom->{Symptom_model::_SYMPTOM_DESCRIPTION};?></p>
<div class="services_text">

<h2>Symptom Answers</h2>
<?php if(empty($answers)):?>
<p class="mar-t-10">No Answers Found</p>
<?php else: foreach ($answers as $answer):?>
<p class="blogmain"><?php echo $answer['answer'];?></p>
<?php endforeach; endif;?>
</div>
<?php if($this->session->userdata('isLoggedIn')):?>
<h2>Post Your Answer Here</h2>
<div  id="new-post" class="services_text"> 
	<form name="" action="<?php echo base_url('index.php/symptom/post-answer')?>" method="post">
	<textarea class="classy-editor" name="symptom-answer" placeholder="Symptom Answer"></textarea>
	<input type="hidden" name="symptom-id" value="<?php echo $symptom->{Symptom_model::_ID};?>"/>
	<div class="checkboobmain">
		<input type="checkbox" name="anonymous" value="1"/> <label>Post as Anonymous</label>
	</div>
	<div class="field buttons">
		<button type="submit" name="btn-submit-question" class="field button" >Post Answer</button>
	</div>
	</form>
</div>
<?php endif;?>

<div class="buttonmain">
	<h2><img src="<?php echo base_url('assets/img/rss.png')?>" height="150" /></h2>
	<h3>RSS feed to email</h3>
<!-- 	<p>Simply add an RSS feed URL from any website or blog and have new posts automatically delivered to your inbox.</p> -->
    <div class="onoffswitch">
        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch">
        <label class="onoffswitch-label" for="myonoffswitch">
            <span class="onoffswitch-inner"></span>
            <span class="onoffswitch-switch"></span>
        </label>
    </div>
</div>

<?php $id = ''; $email = ''; if($this->session->userdata('id')): $email=$this->session->userdata('email'); endif;?>

<!--  Data Modal Start Here -->
<div id="manage_rss_feed_modal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<form method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo generate_user_id($this->session->userdata('id'));?>" readonly required>
					<input type="hidden" name="item-type" value="<?php echo Page::_CATEGORY_SYMPTOM?>"/>
					<input type="hidden" name="item-id" value="<?php echo $symptom->{Symptom_model::_ID};?>"/>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" name="btn-confirm-subscription">Subscribe</button>
				</div>
			</form>
		</div>

	</div>
</div>
<div class="clearfix"></div>
<!-- Data Modal Ends Here -->




