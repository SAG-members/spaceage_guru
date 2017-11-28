<div class="menu">
	<nav class="navbar navbar-default">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse" data-target="#navbar" aria-expanded="false"
				aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
		</div>
		<div id="navbar" class="navbar-collapse collapse left-menu">
			<ul class="nav navbar-nav">
				<!-- <li><a href="<?php echo base_url('library')?>">Library</a></li> -->
				<?php if($this->uri->segment(1)=='personal-library') :?>
				<li><a href="<?php echo base_url('public-library')?>">Public Library</a></li>
				<?php else:?>
				<li><a href="<?php echo base_url('personal-library')?>">Personal Library</a></li>
				<?php endif;?>
<!-- 				<li><a href="#">Legal Aid</a></li> -->
				<li><a href="<?php echo base_url('legal-library');?>">Legal Library</a></li>
				<li><a href="<?php echo base_url('shop');?>">Shop/Cart</a></li>
				<li><a href="">E-Money</a></li>
				<li><a href="#">Logistics</a></li>
				<li><a href="<?php echo base_url('profile');?>">Profile</a></li>
				<li><a href="<?php echo base_url('service/number-game');?>">Number Game</a></li>
				<li><a href="<?php echo base_url('blog');?>">Blogs</a></li>
				<li><a href="<?php echo base_url('reminder-service');?>">Reminder Services</a></li>
				<!-- <li><a href="<?php echo base_url('satan-clause-ltd')?>">SCLTD</a></li> -->
				<li><a href="<?php echo base_url('lean-canvas-scc')?>">Lean Canvas</a></li>
				<li><a href="<?php echo base_url('feedback');?>">Feedback</a></li>
				<li><a href="<?php echo base_url('faq');?>">Faq</a></li>
				<?php if($this->session->has_userdata('isLoggedIn')):?> 
				<!-- <li><a href="<?php echo base_url('user/dashboard');?>">Dashboard</a></li> -->
				<li><a href="<?php echo base_url('logout');?>">Logout</a></li>
				<?php else :?>
				<li><a href="<?php echo base_url('login');?>">Login</a></li>
		 		<li><a href="<?php echo base_url('register');?>">Sign Up</a></li>
				<?php endif;?>
			</ul>
		</div>
		<!--/.nav-collapse -->

	</nav>
</div>