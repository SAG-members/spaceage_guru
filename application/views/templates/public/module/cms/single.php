<h2 class="text-center"><?php echo $pageTitle;?></h2>
<div class="blogmain">
	<?php echo $pageDescription;?>
</div>
<div class="clearfix"></div>
<?php if($pageTitle=='Intro')  :?>
<img src="<?php echo base_url('assets/img/beta_test.jpg'); ?>" class="img-responsive"/>
<?php endif;?>

<?php if(!$this->session->userdata('isLoggedIn') && ( $pageTitle=='How' || $pageTitle=="HOW" || $pageTitle=="how" ))  :?>

<?php $this->load->view('templates/public/module/auth/register'); ?>

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
