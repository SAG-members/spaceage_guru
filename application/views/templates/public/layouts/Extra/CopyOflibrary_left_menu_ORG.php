<div class="leftmain">
	<ul>
		<li>Personal Library</li>
		<li>
			<div style="padding-right:15px;"><div class="input-group">
			  <input type="text" name="wiki-search" class="form-control" placeholder="Search" aria-describedby="basic-addon1">
			  <span class="input-group-btn">
		        <button class="btn btn-secondary" name="btn-wiki-search" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
		      </span>
			</div></div>
		</li>
	</ul>
	
	<ul>
		<li>Products 
			<a class="pull-right add-pss" href="<?php echo base_url('user/dashboard#myProducts');?>" title="View My Product" alt="View My Product"><i class="fa fa-bars"></i> </a>
			<!-- <a class="pull-right add-pss" href="<?php echo base_url('product/add');?>" title="Add Product" alt="Add Product"><i class="fa fa-plus"></i> </a> -->
						
		</li>
		<?php if(!empty($leftSideData['products'])): foreach ($leftSideData['products'] as $q):?>
			<li><a class="external-event" href="<?php echo base_url('product/'.$q->{Page::_PAGE_SLUG});?>" data-id="<?php echo $q->{Page::_ID}?>">< <?php echo $q->{Page::_PAGE_TITLE};?></a></li>
		<?php endforeach; endif;?>
		
	</ul>
	<ul>
		<li>Services
			<a class="pull-right add-pss" href="<?php echo base_url('user/dashboard#myServices');?>" title="View My Services" alt="View My Services"><i class="fa fa-bars"></i> </a>
			<!-- <a class="pull-right add-pss" href="<?php echo base_url('service/add');?>" title="Add Service" alt="Add Service"><i class="fa fa-plus"></i> </a> -->
						
		</li>
		
		<?php if(!empty($leftSideData['services'])): foreach ($leftSideData['services'] as $q):?>
			<li><a class="external-event" href="<?php echo base_url('service/'.$q->{Page::_PAGE_SLUG});?>">< <?php echo $q->{Page::_PAGE_TITLE};?></a></li>
		<?php endforeach; endif;?>
		
	</ul>
	<ul>
		<li>Sensation
			<a class="pull-right add-pss" href="<?php echo base_url('user/dashboard#mySensations');?>" title="View My Sensations" alt="View My Sensations"><i class="fa fa-bars"></i> </a>
			<!-- <a class="pull-right add-pss" href="<?php echo base_url('sensation/add');?>" title="Add Sensation" alt="Add Sensation"><i class="fa fa-plus"></i> </a> -->
						
		</li>
		
		<?php if(!empty($leftSideData['sensations'])): foreach ($leftSideData['sensations'] as $s):?>
			<li><a class="external-event" href="<?php echo base_url('sensation/'.$s->{Page::_PAGE_SLUG});?>">< <?php echo $s->{Page::_PAGE_TITLE};?></a></li>
		<?php endforeach; endif;?>
		
	</ul>
	<ul>
		<li>SYMPTOMS
			<a class="pull-right add-pss" href="<?php echo base_url('user/dashboard#mySymptoms');?>" title="View My Symptoms" alt="View My Symptoms"><i class="fa fa-bars"></i> </a>
			<!-- <a class="pull-right add-pss" href="<?php echo base_url('symptom/post-symptom');?>" title="Add Symptom" alt="Add Symptom"><i class="fa fa-plus"></i> </a> -->
						
		</li>
		
		<?php if(!empty($leftSideData['symptoms'])): foreach ($leftSideData['symptoms'] as $s):?>
			<li><a href="<?php echo base_url('symptom/'.$s['slug']);?>">< <?php echo $s['symptom'];?></a></li>
		<?php endforeach; endif;?>
		
	</ul>

<div class="copyright">&copy; <?php echo date("Y");?> Satanclause</div>
</div>