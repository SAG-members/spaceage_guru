<?php 
// $lockIcon = 'fa fa-lock';
$lockIcon = '';

if($this->session->userdata('user_id')) $lockIcon = '';

?>
<div class="rightmain">
	<ul class="right-menu-items">		
		<li class="text-center menu-li-style">
			<a href="<?php echo base_url('whitepaper')?>">WHITEPAPER</a>
		</li>
	</ul>
</div>		