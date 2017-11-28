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
				<li><a href="<?php echo base_url('admin/cms');?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Manage CMS Pages</a></li>
				<li><a href="<?php echo base_url('admin/countries')?>"><i class="fa fa-map" aria-hidden="true"></i> Manage Countries </a></li>
				<li><a href="<?php echo base_url('admin/coupons');?>"><i class="fa fa-bars" aria-hidden="true"></i> Manage Coupons</a></li>
				<li><a href="<?php echo base_url('admin/data');?>"><i class="fa fa-cubes" aria-hidden="true"></i> Manage Data </a></li>	
				<li><a href="<?php echo base_url('admin/escrow');?>"><i class="fa fa-university" aria-hidden="true"></i> Manage Escrow </a></li>	
				<li><a href="<?php echo base_url('admin/faqs');?>"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Manage FAQ </a></li>
				<li><a href="<?php echo base_url('admin/orders');?>"><i class="fa fa-truck" aria-hidden="true"></i> Manage Orders</a></li>
				<li><a href="<?php echo base_url('admin/pct');?>"><i class="fa fa-btc" aria-hidden="true"></i> Manage PCT</a></li>
				<li><a href="<?php echo base_url('admin/rss-feeds');?>"><i class="fa fa-rss" aria-hidden="true"></i> Manage RSS Subscription</a></li>
				<li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Settings </a>
					<ul class="nav child_menu">
						
						<li><a href="<?php echo base_url('admin/feedbacks');?>"><i class="fa fa-universal-access" aria-hidden="true"></i> Manage Feedback </a></li>
						<li><a href="<?php echo base_url('admin/paypal-setting');?>"><i class="fa fa-cc-paypal" aria-hidden="true"></i> Paypal Setting </a></li>
						<li><a href="<?php echo base_url('admin/change-password');?>"><i class="fa fa-lock" aria-hidden="true"></i> Change Password </a></li>
					</ul>
				</li>
				<li><a href="<?php echo base_url('admin/memberships');?>"><i class="fa fa-futbol-o" aria-hidden="true"></i> Manage Shop Products</a></li>
				<li><a href="<?php echo base_url('admin/subscriptions');?>"><i class="fa fa-life-ring" aria-hidden="true"></i> Manage Subscriptions</a></li>
				<li><a href="<?php echo base_url('admin/users')?>"><i class="fa fa-users" aria-hidden="true"></i> Manage Users </a></li>
			</ul>
		</div>
	</div>
</div>