<div class="logomain clearfix">
	<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-sm-offset-1">
		<?php if($this->session->userdata('isLoggedIn')) :?>
		<?php 
// 			$membership = new Membership_model();
// 			$logo = $membership->get_member_logo($this->session->userdata('membershipLevel')); 
// 			$logo = Template::_ADMIN_UPLOAD_DIR.$logo;
					      
			if($this->session->userdata('gender') == 1){
			     $logo = base_url('assets/img/male.JPG');	
			}
			if($this->session->userdata('gender') == 2){
				$logo = base_url('assets/img/female.JPG');
			}
			if($this->session->userdata('gender') == 3){
				$logo = base_url('assets/img/trans.png');
			}
			
		?>	
		<div class="top-pic" style="margin: 0px;">
		   	      
		   	<img src="<?php echo $logo;?>" style="width: 160px; height:190px;">
		   	
		   	<h2><?php echo generate_user_id($this->session->userdata('id'));?></h2>
	   	</div>
	   	<?php endif?>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-center">
    	<?php if($this->session->userdata('isLoggedIn')): ?>
    	
    	<!--  Now since user is logged in we should check the registered country of the user and get globle angle based on that -->
    	
        	<?php 
        	$userProfile = $this->user->getUserProfile($this->session->userdata('id'));
        	$registeredCountry = $userProfile->country;
        	
        	
        	# Get country globe angle based on country code
        	$countryInfo = $this->country->get_by_id($registeredCountry);
        	
        	if(empty($countryInfo->country_image)): ?>
        	<img src="<?php echo base_url('assets/img/new_logo.jpg'); ?>" style="width: 500px; height:230px;">';
        	<?php else :?>
        	<img src="<?php echo base_url('assets/uploads/country/'.$countryInfo->country_image); ?>" style="height:230px;">
        	<?php endif;?>
     <?php else :?>
    <img src="<?php echo base_url('assets/img/new_logo.jpg')?>" style="width: 500px; height:230px;">
    <?php endif;?>
    	 
    	<?php if($this->session->userdata('isLoggedIn') && $this->session->userdata('membershipLevel') != 1):?>
    	<p style="color: #fff; font-size: 20px; margin-left: 20px;">We are all living in it so lets start healing it while enjoying life on it</p>
    	<?php endif;?>
    </div>

</div>
