<h2><?php echo $title;?></h2>
<?php 
$userProfile = $this->user->getUserProfile($this->session->userdata('id'));
$membershipLevel = $userProfile->{User::_USER_MEMBERSHIP_LEVEL};

?>

<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 col-sm-offset-2">
<div class="services_text">
	<?php if($shop): foreach ($shop as $s):?>
		<div class="col-md-3 shop-item">
			<?php if(isset($s->{Membership_model::_UNIT_PRICE}) && $s->{Membership_model::_UNIT_PRICE} !=0 ) :?>
			<?php $membershipType = 'pct'; ?>
			<?php else :?>
			<?php $membershipType = 'no-pct'; ?>
			<?php endif; ?>
		
			<a class="redirect_to_href" href="<?php echo base_url('membership/'.$s->{Membership_model::_MEMBERSHIP_TITLE_SLUG})?>" data-user-membership="<?php echo $membershipLevel ?>"  data-membership-type="<?php echo $membershipType; ?>">
			<?php 
    			if (strlen($s->{Membership_model::_MEMBERSHIP_TITLE}) > 10)
    			echo $str = substr($s->{Membership_model::_MEMBERSHIP_TITLE}, 0, 15) . '...';
			?>			
			</a>
			<?php if(isset($s->{Membership_model::_UNIT_PRICE}) && $s->{Membership_model::_UNIT_PRICE} !=0 ) :?>
			<p>UNIT PRICE : <?php echo $s->{Membership_model::_UNIT_PRICE}?></p>
			<?php else :?>
			<p>Monthly Price: &euro; <?php echo $s->{Membership_model::_MEMBERSHIP_MONTHLY_PRICE}; ?></p>
			<p>Yearly Price : &euro; <?php echo $s->{Membership_model::_MEMBERSHIP_YEARLY_PRICE}; ?></p>
			<?php endif;?>
		</div>
	<?php endforeach; else:?>
		<div class="alert alert-danger mar-t-20">Please upgrade to registed member first</div>
	<?php endif;?>
</div>
</div>

<script>

$('.redirect_to_href').on('click', function(e){
	e.preventDefault();
	var href = $(this).prop('href');

	var membershipLevel = $(this).data('userMembership');

	var membershipType = $(this).data('membershipType');

	console.log(membershipType);

	if(membershipLevel == 1 && membershipType == 'no-pct')
	{
		/* Open Alert Model */

		MessageHelper.showAlertModal('Please upgrade to registered member first by completing PPQ in profile');
	}
	else
	{
		/* Redirect to href */

		var newForm = jQuery('<form>', {
	        'action': href,
	        'target': '_top',
	        'method':'post'	
	    });
				
		newForm.appendTo("body").submit();
	}


	

	
	
});
</script>
