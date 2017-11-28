<div class="rightmain">
	
	<?php if($this->session->userdata('id')): $membershipLevel = $this->session->userdata('membershipLevel');?>
		<?php if($membershipLevel == User::VISIBILITY_SIGNED_USER):?>
			<div class="offermain">
				<h2><a href="<?php //echo base_url('membership/registered-user');?>">Free for registered users</a></h2>
				<p>Number account</p>
				<p>Write and ask questions</p>
				<p>Play number game</p>	
			</div>
		<?php elseif($membershipLevel == User::VISIBILITY_REGISTERED_USER):?>
			<div class="offermain">
				<h2><a href="<?php echo base_url('membership/'.$rightSideData['membership'][2]->membership_title_slug);?>">Usership 1€ a month</a></h2>
				<p>Offshore number account</p>
				<p>Merchant ability</p>
				<p>Stock option</p>
			</div>	
		<?php elseif($membershipLevel == User::VISIBILITY_UPGRADED_USER):?>
			<div class="offermain">
				<h2><a href="<?php echo base_url('membership/'.$rightSideData['membership'][3]->membership_title_slug);?>">Membership 10€ a month</a></h2>
				<p>Offshore number account</p>
				<p>Merchant ability</p>
				<p>Membership</p>
				<p>A Stock option</p>
			</div>	
		<?php elseif($membershipLevel == User::VISIBILITY_MEMBERSHIP_A_USER):?>
			<div class="offermain">
				<h2><a href="<?php echo base_url('membership/'.$rightSideData['membership'][0]->membership_title_slug);?>">Membership 100€ a month</a></h2>
				<p>Offshore number account</p>
				<p>Merchant ability</p>
				<p>Membership</p>
				<p>stock options</p>
				<p>Trading rights</p>
			</div>
		<?php else:?>
		
		<?php endif;?>
			<div class="offermain">
				<h2><a href="<?php echo base_url('reminder-service');?>">Reminder Services 235€</a></h2>
				<p>Vitalize your old accounts</p>
			</div>
	<?php endif;?>
	
	
	<div class="offermain">
		<h2><a href="<?php echo base_url('service/number-game');?>">Number Game</a></h2>
		<p><img src="<?php echo base_url('assets/img/number-game.png')?>"/></p> 
	</div>
	
</div>