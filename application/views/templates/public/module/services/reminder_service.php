<h2><?php echo $membership->{Membership_model::_MEMBERSHIP_TITLE}?></h2>
<div class="membership-text">
	<?php echo $membership->{Membership_model::_MEMBERSHIP_DESCRIPTION};?>
	<?php if($membership->{Membership_model::_MEMBERSHIP_TITLE_SLUG} != 'Registered-User'):?>	
	<form method="post" name="paynow" action="<?php echo base_url('pay');?>">
		<input type="hidden" value="<?php echo $membership->{Membership_model::_ID};?>" name="item_id"/>
		<input type="hidden" value="<?php echo $membership->{Membership_model::_MEMBERSHIP_TITLE};?>" name="item_name"/>
		<input type="hidden" value="<?php echo $membership->{Membership_model::_MEMBERSHIP_MONTHLY_PRICE}?>" name="price"/>	
		<input type="hidden" value="<?php echo $membership->{Membership_model::_MEMBERSHIP_TYPE}?>" name="category_id"/>
		<input type="hidden" name="mode" value="paypal"/>	
				
		<input name="btn-pay" type="submit" value="Pay With Paypal" class="addtocart" >
	</form>
	<?php endif;?>
</div>
<div class="clearfix"></div>
