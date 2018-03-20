<div class="leftmain">
	<ul>
<!-- 		<li>Wiki Search</li> -->
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
		<li><a href="" style="color: #FFF;">Add a legal note</a></li>
	</ul>

	<ul>
		<li>Products</li>
		<?php if(!empty($leftSideData['products'])): foreach ($leftSideData['products'] as $q):?>
			<li><a class="external-event" href="<?php echo base_url('product/'.$q->{Page::_PAGE_SLUG});?>">< <?php echo $q->{Page::_PAGE_TITLE};?></a></li>
		<?php endforeach; endif;?>
		
	</ul>
	<ul>
		<li>Services</li>
		<?php if(!empty($leftSideData['services'])): foreach ($leftSideData['services'] as $q):?>
			<li><a class="external-event" href="<?php echo base_url('service/'.$q->{Page::_PAGE_SLUG});?>">< <?php echo $q->{Page::_PAGE_TITLE};?></a></li>
		<?php endforeach; endif;?>
	</ul>
	<ul>
		<li>Sensation</li>
		<?php if(!empty($leftSideData['sensations'])):?>
		<?php foreach ($leftSideData['sensations'] as $s):?>
			<li><a class="external-event" href="<?php echo base_url('sensation/'.$s->{Page::_PAGE_SLUG});?>">< <?php echo $s->{Page::_PAGE_TITLE};?></a></li>
		<?php endforeach; endif;?>
		
	</ul>
	<ul>
		<li>SYMPTOMS</li>
		<?php if(!empty($leftSideData['symptoms'])):?>
		<?php foreach ($leftSideData['symptoms'] as $s):?>
			<li><a href="<?php echo base_url('symptom/'.$s['slug']);?>">< <?php echo $s['symptom'];?></a></li>
		<?php endforeach; endif;?>
	</ul>
	<div class="copyright">&copy; <?php echo date("Y");?> Satanclause</div>
</div>