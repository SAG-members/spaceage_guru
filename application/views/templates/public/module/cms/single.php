<h2 class="text-center"><?php echo $pageTitle;?></h2>
<div class="blogmain">
	<?php echo $pageDescription;?>
</div>
<div class="clearfix"></div>
<?php if($pageTitle=='Intro')  :?>
<img src="<?php echo base_url('assets/img/beta_test.jpg'); ?>" class="img-responsive"/>
<?php endif;?>
<?php if(!$this->session->userdata('isLoggedIn') && $pageTitle=='Intro')  :?>

<!-- 
<h2 class="text-center">Login</h2>
<div class="services_text feedback">
	<form action="<?php echo base_url('login')?>" method="post"
		autocomplete="off">
		<label>Username</label> <input class="password" name="username" type="text"
			autocomplete="new-password"> <label>Password</label> <input
			name="password" class="password" type="password" autocomplete="new-password">
		<?php if($this->session->has_userdata('referrer')):?>
		<input type="hidden" name="referrer"
			value="<?php echo $this->session->userdata('referrer');?>" /> 
		<?php endif;?>
		<div>
			<label><a href="<?php echo base_url('register');?>">Register</a></label>
		</div>
		<button type="submit" name="btn-submit">Login</button>
	</form>
</div>
 -->
<?php endif;?>


<script type="text/javascript">
$(function(){

$('pre').each(function(){
	
	var div = '<div class="alike-pre">'+$(this).html()+'</div>';
	
	$(div).insertAfter($(this));

	$(this).remove();
});


});

</script>
