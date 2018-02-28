<div class="leftmain">
	<ul>
		<li>
			<a href="<?php echo base_url('profile');?>">Profile</a>
		</li>		
	</ul>
	
	<ul class="txt-white">
		<li>Data 
			<a class="pull-right add-pss" href="<?php echo base_url('user/dashboard#myProducts');?>" title="View My Product" alt="View My Product"><i class="fa fa-bars"></i> </a>
			<a class="pull-right add-pss" href="<?php echo base_url('user/add/data');?>" title="Add Product" alt="Add Product"><i class="fa fa-plus"></i> </a>
						
		</li>
		<?php if(!empty($leftSideData['datas'])): foreach ($leftSideData['datas'] as $q):?>
			<li><a class="external-event" href="<?php echo base_url('user/data/'.$q->{Page::_PAGE_SLUG});?>" data-price="<?php echo $q->{Page::_PRICE}?>" data-id="<?php echo $q->{Page::_ID}?>">< <?php echo $q->{Page::_PAGE_TITLE};?></a></li>
		<?php endforeach; endif;?>
		
	</ul>
	
<div class="copyright">&copy; <?php echo date("Y");?> Spageage guru</div>
</div>
<style>
#midmain .leftmain ul.txt-white li a{
    color : #FFF !important;
}
</style>