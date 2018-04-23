<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title><?php echo $title; ?></title>
<link rel="icon" href="<?php echo base_url('assets/img/fav-32X32.png'); ?>" type="image/gif" sizes="32x32">

<!-- Bootstrap -->

<link href="<?php echo base_url('assets/landing')?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets/landing')?>/css/responsive.css" rel="stylesheet">
<link href="<?php echo base_url('assets/landing')?>/css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700,800,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">
</head>
<link rel="stylesheet" href="<?php echo base_url('assets/landing')?>/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/landing')?>/css/owl.theme.default.min.css">
<style>
header { width:100%; height:auto; float:left; background:url(<?php echo base_url('assets')?>/img/head-bg.png); background-size:cover; padding:10px 0px;}
.midbgmain { width:100%; height:auto; float:left; background:url(<?php echo base_url('assets')?>/img/mid-bg.png); background-size:cover; min-height:775px; position:relative;}
.botttom-main { width:100%; height:auto; float:left; background:url(<?php echo base_url('assets')?>/img/bottom-bg.png); background-size:cover;  position:relative;}
.dropdown-menu>li>a { display: inline-block !important;}
.dropdown-menu { min-width:210px !important;}

ul.dropdown-menu li{}

</style>
<body>
<div class="main_wrap">
	<header>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-4 col-sm-6 col-md-6 col-lg-6">
					<?php 
					   $backgroungImage = base_url('assets/img/white-moon.png');
					   if($this->session->userdata('id')) $backgroungImage = base_url('assets/img/red-moon.png');
					?>
					<div class="moon" style="background:url(<?php echo $backgroungImage;?>) no-repeat;">
					<?php if(!$this->session->userdata('id')) : ?>
        			<a data-placement="right" alt="<?php echo strip_tags($this->cms->get_by_slug('what', Cms::_CONTENT))?>" data-toggle="tooltip" title="<?php echo strip_tags($this->cms->get_by_slug('what', Cms::_CONTENT))?>" href="<?php echo base_url('what')?>" target="_blank">WHAT</a><br>
					<a data-placement="right" alt="<?php echo strip_tags($this->cms->get_by_slug('where', Cms::_CONTENT))?>" data-toggle="tooltip" title="<?php echo strip_tags($this->cms->get_by_slug('where', Cms::_CONTENT))?>"  href="<?php echo base_url('where')?>"  target="_blank">WHERE</a><br>
					<a data-placement="right" alt="<?php echo strip_tags($this->cms->get_by_slug('how', Cms::_CONTENT))?>" data-toggle="tooltip" title="<?php echo strip_tags($this->cms->get_by_slug('how', Cms::_CONTENT))?>"  href="<?php echo base_url('how')?>"  target="_blank">HOW
                	</a>
        			<?php else :?>
        			<div class="dropdown">
                    	<button class="btd dropdown-toggle" type="button" data-toggle="dropdown"> <img src="<?php echo base_url('assets')?>/img/home-icon.png"></button>
                      	<ul class="dropdown-menu left-dropdown">
                        	<li><a href="<?php echo base_url('club-laws'); ?>">Club Guidelines</a></li>
                        	<li><a href="<?php echo base_url('shop'); ?>">Shop</a></li>
                        	<li><a href="<?php echo base_url('service/number-game'); ?>">Spiritual guidance</a></li>
                        	<li><a href="<?php echo base_url('lean-canvas-spaceage-guru'); ?>">Lean Canvas</a></li>
                        	<li><a href="<?php echo base_url('feedback'); ?>">Feedback</a></li>
                        	<li><a href="<?php echo base_url('faq'); ?>">FAQ</a></li>
                        	<li><a href="<?php echo base_url('e-business'); ?>">E-Business</a></li>
                        	<li><a href="<?php echo base_url('logout'); ?>">Logout</a></li>
                      	</ul>
                    </div>
        			<?php endif; ?>
       				</div>	
						
				</div>
				<div
					class="col-xs-8 col-sm-6 col-md-6 col-lg-6 text-right head-right-main">
<!-- 					<input name="" type="text"> -->
<!-- 					<button> -->
<!-- 						<i class="fa fa-search" aria-hidden="true"></i> -->
<!-- 					</button> -->
<!-- 					<br>  -->
					
					<?php if(!$this->session->userdata('id')) : ?>
					<form action="<?php echo base_url('login')?>" method="post">
    					<input name="username" type="text" placeholder="User Name">
                        <input name="password" type="password" placeholder="Password">
                        <button type="submit">Login</button>
                    </form>
					<?php else :?>
					
					<div class="santa">  
                    	<div class="dropdown">
              				<button class="btd dropdown-toggle" type="button" data-toggle="dropdown"><img src="<?php echo base_url('assets')?>/img/santa.png"></button>
              				<ul class="dropdown-menu">
                				<li><a href="<?php echo base_url('timeline'); ?>">Timeline</a></li>
            					<li><a href="<?php echo base_url('profile'); ?>">Profile</a></li>
                				<li><a href="<?php echo base_url('whitepaper'); ?>">Whitepaper</a></li>
                				<li>
                					<a href="<?php echo base_url('whitepaper'); ?>">Tasks</a>
                					<a class="pull-right"  href="<?php echo base_url('profile')?>"><i class="fa fa-plus"></i></a>
                				</li>
                				<li>
                					<a href="<?php echo base_url('whitepaper'); ?>">Goals & Dreams</a>
                					<a class="pull-right"  href="<?php echo base_url('profile')?>"><i class="fa fa-plus"></i></a>
                				</li>
                				<li>
                    				<a href="<?php echo base_url('user/dashboard')?>">Personal Channel</a>
                    				<a class="pull-right" href="<?php echo base_url('user/add/data')?>"><i class="fa fa-plus"></i></a>                    				
                				</li>
                				<li><a href="<?php echo base_url('user/dashboard')?>">Communication</a></li>
                				<li><a href="<?php echo base_url('user/dashboard')?>">Chat</a></li>                				
              				</ul>
            			</div>
            		</div>
					
					<?php endif;?>
				</div>
				<div class="clearfix"></div>					
			</div>
		</div>		
	</header>
	<div class="midbgmain">
		<img src="<?php echo base_url('assets/')?>img/mid-bg.png" class="img-responsive hide1">
		<div class="dnamain">
			<img src="<?php echo base_url('assets/')?>img/d-n-a.png">
		</div>
		<div class="bottom_pic">
			<img src="<?php echo base_url('assets/')?>img/bottom-pic.png">
		</div>
	</div>
	<div class="botttom-main"></div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="<?php echo base_url('assets/landing')?>/js/bootstrap.min.js"></script> 
<!--<script src="js/fontawesome-all.js"></script>--> 
<script src="<?php echo base_url('assets/landing')?>/js/owl.carousel.js"></script> 
<script>


        $(document).ready(function() {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                margin: 10,
                nav: true,
                navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
                loop: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 5
                    }
                }
            })

            $('[data-toggle="tooltip"]').tooltip({
                html: "true", 
                placement: "auto-right", 
                delay: {"show": 100, "hide": 100000} 
              }); 
            
        })
        
        
        $('.dropdown').hover(function() {
          $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
        }, function() {
          $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
        });
    </script>
</body>
</html>