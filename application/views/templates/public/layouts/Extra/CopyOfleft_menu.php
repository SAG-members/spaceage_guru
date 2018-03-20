<div class="leftmain">
	<ul>
<!-- 		<li>Wiki Search</li> -->
		<li>Public Library</li>
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
		<li>Products <a class="pull-right add-pss" href="<?php echo base_url('product/add');?>" title="Add Product" alt="Add Product"><i class="fa fa-plus"></i> </a></li>
		<?php if($this->session->userdata('isLoggedIn')):?>
		<?php if(!empty($leftSideData['products'])): foreach ($leftSideData['products'] as $q):?>
			<li><a class="external-event" href="<?php echo base_url('product/'.$q->{Page::_PAGE_SLUG});?>">< <?php echo $q->{Page::_PAGE_TITLE};?></a></li>
		<?php endforeach; endif;?>
		<!-- <li><a href="<?php echo base_url('product/add');?>">< Add a product</a></li> -->
		<?php else:?>
		<li><a>Login or Register to view</a></li>
		<?php endif;?>
	</ul>
	<ul>
		<li>Services <a class="pull-right add-pss" href="<?php echo base_url('service/add');?>" title="Add Service" alt="Add Service"><i class="fa fa-plus"></i> </a></li>
		<?php if($this->session->userdata('isLoggedIn')):?>
		<?php if(!empty($leftSideData['services'])): foreach ($leftSideData['services'] as $q):?>
			<li><a class="external-event" href="<?php echo base_url('service/'.$q->{Page::_PAGE_SLUG});?>">< <?php echo $q->{Page::_PAGE_TITLE};?></a></li>
		<?php endforeach; endif;?>
		<!-- <li><a href="<?php echo base_url('service/add');?>">< Add a service</a></li> -->
		<?php else:?>
		<li><a>Login or Register to view</a></li>
		<?php endif;?>
	</ul>
	<ul>
		<li>Sensation <a class="pull-right add-pss" href="<?php echo base_url('sensation/add');?>" title="Add Sensation" alt="Add Sensation"><i class="fa fa-plus"></i> </a></li>
		<?php if($this->session->userdata('isLoggedIn')):?>
		<?php if(!empty($leftSideData['sensations'])):?>
		<?php foreach ($leftSideData['sensations'] as $s):?>
			<li><a class="external-event" href="<?php echo base_url('sensation/'.$s->{Page::_PAGE_SLUG});?>">< <?php echo $s->{Page::_PAGE_TITLE};?></a></li>
		<?php endforeach;?>
		<?php endif;?>
		<!-- <li><a href="<?php echo base_url('sensation/add');?>">< Add a sensation</a></li> -->
		<?php else:?>
		<li><a>Login or Register to view</a></li>
		<?php endif;?>
	</ul>
	<ul>
		<li>SYMPTOMS <a class="pull-right add-pss" href="<?php echo base_url('symptom/post-symptom');?>" title="Add Symptom" alt="Add Symptom"><i class="fa fa-plus"></i> </a></li>
		<?php if($this->session->userdata('isLoggedIn')):?>
		<?php if(!empty($leftSideData['symptoms'])):?>
		<?php foreach ($leftSideData['symptoms'] as $s):?>
			<li><a href="<?php echo base_url('symptom/'.$s['slug']);?>">< <?php echo $s['symptom'];?></a></li>
		<?php endforeach;?>
		<?php endif;?>
		<!-- <li><a href="<?php echo base_url('symptom/post-symptom')?>">< Describe a Symptom</a></li> -->
		<?php else:?>
		<li><a>Login or Register to view</a></li>
		<?php endif;?>
	</ul>
<!-- 	<ul> -->
		<!-- <li>FAQ</li>
		<?php //if(!empty($leftSideData['questions'])):?>
		<?php //foreach ($leftSideData['questions'] as $q):?>
			<li><a href="<?php //echo base_url('faq/question/'.$q['id']);?>">< <?php //echo $q['question'];?></a></li>
		<?php //endforeach;?>
		<?php // endif;?>
		<li><a href="<?php // echo base_url('faq/post-question')?>">< Ask a question?</a></li> -->
		
		
		
<!-- 	</ul> -->
		
		
	<div class="copyright">&copy; <?php echo date("Y");?> Satanclause</div>
</div>