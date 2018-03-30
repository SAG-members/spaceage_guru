<div class="left_col scroll-view">
	<div class="navbar nav_title" style="border: 0;">
		<a href="<?php echo base_url('admin/home')?>" class="site_title"> <span>Spaceage Guru</span></a>
	</div>

	<div class="clearfix"></div>
	
	<?php 
	
// 	print_r($_SESSION);
	$profileImage = base_url('assets/admin/img/img.jpg');
	
	# Get user profile information
	
	$userProfile = $this->user->getUserProfile($this->session->userdata('id'));
		
	if(!empty($userProfile['avatar'])){
	    $profileImage = base_url(Template::_PUBLIC_AVTAR_DIR.$userProfile['avatar']);
	}
	
	?>
	<!-- menu profile quick info -->
	<div class="profile">
		<div class="profile_pic">
		
			<img src="<?php echo $profileImage; ?>" alt="..." class="img-circle profile_img">
		</div>
		<div class="profile_info">
			<span>Welcome,</span>
			<h2><?php echo $this->session->userdata('userName');?></h2>
		</div>
	</div>
	<!-- /menu profile quick info -->

	<br />

	<!-- sidebar menu -->
	<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
		<div class="menu_section">
			<p>&nbsp;</p>
			<ul class="nav side-menu">
				<li><a href="<?php echo base_url('admin/cms');?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> CMS Pages</a></li>
				<li><a href="<?php echo base_url('admin/countries')?>"><i class="fa fa-map" aria-hidden="true"></i> Countries </a></li>
				<li><a href="<?php echo base_url('admin/currency')?>"><i class="fa fa-money" aria-hidden="true"></i> Currencies </a></li>
				<li><a href="<?php echo base_url('admin/coupons');?>"><i class="fa fa-bars" aria-hidden="true"></i> Coupons</a></li>
				<li><a href="<?php echo base_url('admin/data');?>"><i class="fa fa-cubes" aria-hidden="true"></i> Data </a></li>	
				<li><a href="<?php echo base_url('admin/escrow');?>"><i class="fa fa-university" aria-hidden="true"></i> Escrow </a></li>	
				<li><a href="<?php echo base_url('admin/faqs');?>"><i class="fa fa-question-circle-o" aria-hidden="true"></i> FAQ </a></li>
				<li><a href="<?php echo base_url('admin/number-game');?>"><i class="fa fa-cube" aria-hidden="true"></i> Spiritual Guidance</a></li>
				<li><a href="<?php echo base_url('admin/orders');?>"><i class="fa fa-truck" aria-hidden="true"></i> Data Purchase</a></li>
				<li><a href="<?php echo base_url('admin/pct-setting');?>"><i class="fa fa-btc" aria-hidden="true"></i> PCT Setting</a></li>
				<li><a href="<?php echo base_url('admin/rss-feeds');?>"><i class="fa fa-rss" aria-hidden="true"></i> RSS Subscription</a></li>
				<li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Settings </a>
					<ul class="nav child_menu">
						
						<li><a href="<?php echo base_url('admin/feedbacks');?>"><i class="fa fa-universal-access" aria-hidden="true"></i> Feedback </a></li>
						<li><a href="<?php echo base_url('admin/paypal-setting');?>"><i class="fa fa-cc-paypal" aria-hidden="true"></i> Setting </a></li>
						<li><a href="<?php echo base_url('admin/change-password');?>"><i class="fa fa-lock" aria-hidden="true"></i> Change Password </a></li>
					</ul>
				</li>
				<li><a href="<?php echo base_url('admin/memberships');?>"><i class="fa fa-futbol-o" aria-hidden="true"></i> Shop Products</a></li>
				<li><a href="<?php echo base_url('admin/subscriptions');?>"><i class="fa fa-life-ring" aria-hidden="true"></i> Subscriptions</a></li>
				<li><a href="<?php echo base_url('admin/users')?>"><i class="fa fa-users" aria-hidden="true"></i> Users </a></li>
			</ul>
		</div>
	</div>
</div>