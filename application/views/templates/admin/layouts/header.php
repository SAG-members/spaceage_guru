<div class="nav_menu">
	<nav>
		<div class="nav toggle">
			<a id="menu_toggle"><i class="fa fa-bars"></i></a>
		</div>
		<ul class="nav navbar-nav navbar-right">
			<li class="">
				<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> 
					<?php 
					   $profileImage = base_url('assets/admin/img/img.jpg');
					   
					   # Get user profile information
					   
					   $userProfile = $this->user->getUserProfile($this->session->userdata('id'));
					   				   
					   if(!empty($userProfile['avatar'])){
					       $profileImage = base_url(Template::_PUBLIC_AVTAR_DIR.$userProfile['avatar']);
                       }
					?>
					
					<img src="<?php echo $profileImage; ?>" alt=""><?php echo $this->session->userdata('userName');?> <span class=" fa fa-angle-down"></span>
				</a>
				<ul class="dropdown-menu dropdown-usermenu pull-right">
					<li><a href="<?php echo base_url('admin/profile')?>"> Profile</a></li>
					<li><a href="<?php echo base_url('admin/logout')?>"><i class="fa fa-sign-out pull-right"></i>Log Out</a></li>
				</ul>
			</li>
		</ul>
	</nav>
</div>