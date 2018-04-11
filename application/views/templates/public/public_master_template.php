<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="<?php if(isset($metaTitle)) $metaTitle; else "Space age guru "; ?>">

<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<!-- Update title dynamically -->
<title><?php echo $title?></title>

<link rel="icon" href="<?php echo base_url('assets/img/fav-32X32.png'); ?>" type="image/gif" sizes="32x32">

<!-- css -->
<link href="<?php echo base_url('assets/css/bootstrap/bootstrap.min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/font-awesome.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/bootstrap-toggle/bootstrap-toggle.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/custom.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/responsive.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/jquery/jquerysctipttop.css')?>" rel="stylesheet">

<link
	href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700"
	rel="stylesheet"> 
	
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/plugin/classy/css/jquery.classyedit.css')?>" />

<!-- Additional Styles -->
<?php if(isset($additionalStyle)) : foreach ($additionalStyle as $style):?>
<link href="<?php echo base_url('assets/css/'.$style);?>" rel="stylesheet">
<?php endforeach; endif;?>


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url('assets/js/jquery/jquery.min.js')?>"></script>    
<script type="text/javascript">BASE_URL = "<?php echo base_url();?>";</script>

<!-- EmojiOne -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/emojione/2.2.6/assets/css/emojione.min.css">
<!-- <link href="<?php echo base_url('assets/css/plugin/EmojiOne/emojionearea.min.css')?>" rel="stylesheet"> -->
<!-- EmojiOneArea -->
<link rel="stylesheet" href="//cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">

<!-- EmojiOne -->
<script src="//cdn.jsdelivr.net/emojione/2.2.6/lib/js/emojione.min.js"></script>
<!-- EmojiOneArea -->
<script src="//cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>

<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5a24e3ec1b118100135877d2&product=inline-share-buttons' async='async'></script>

<!-- start Mixpanel --><script type="text/javascript">(function(e,a){if(!a.__SV){var b=window;try{var c,l,i,j=b.location,g=j.hash;c=function(a,b){return(l=a.match(RegExp(b+"=([^&]*)")))?l[1]:null};g&&c(g,"state")&&(i=JSON.parse(decodeURIComponent(c(g,"state"))),"mpeditor"===i.action&&(b.sessionStorage.setItem("_mpcehash",g),history.replaceState(i.desiredHash||"",e.title,j.pathname+j.search)))}catch(m){}var k,h;window.mixpanel=a;a._i=[];a.init=function(b,c,f){function e(b,a){var c=a.split(".");2==c.length&&(b=b[c[0]],a=c[1]);b[a]=function(){b.push([a].concat(Array.prototype.slice.call(arguments,
0)))}}var d=a;"undefined"!==typeof f?d=a[f]=[]:f="mixpanel";d.people=d.people||[];d.toString=function(b){var a="mixpanel";"mixpanel"!==f&&(a+="."+f);b||(a+=" (stub)");return a};d.people.toString=function(){return d.toString(1)+".people (stub)"};k="disable time_event track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config reset people.set people.set_once people.unset people.increment people.append people.union people.track_charge people.clear_charges people.delete_user".split(" ");
for(h=0;h<k.length;h++)e(d,k[h]);a._i.push([b,c,f])};a.__SV=1.2;b=e.createElement("script");b.type="text/javascript";b.async=!0;b.src="undefined"!==typeof MIXPANEL_CUSTOM_LIB_URL?MIXPANEL_CUSTOM_LIB_URL:"file:"===e.location.protocol&&"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js".match(/^\/\//)?"https://cdn.mxpnl.com/libs/mixpanel-2-latest.min.js":"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js";c=e.getElementsByTagName("script")[0];c.parentNode.insertBefore(b,c)}})(document,window.mixpanel||[]);
mixpanel.init("87b5c558f76ec0cd24e8ecdec25acf65");</script><!-- end Mixpanel -->

<script type="text/javascript">
mixpanel.track("<?php echo $title?>");
</script>

</head>

<body>

	<div class="container-fluid">
		
		<!-- Header includes header and main menu  -->
		<header>
			<?php #$this->load->view($siteHeader)?>
			<?php $this->load->view($siteNavigation)?>
			
		</header>
		
		
		<section id="midmain">
			<div class="row">
				
				<div class="fullheight">
				<!-- Left Menu -->
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 fullcol pad-l-15 hide left-col">
					<?php $this->load->view($siteLeftSideBar)?>
			    </div>
			    
			    <div class="left-col-identifier"><i class="fa fa-angle-double-right fa-5x"></i></div>
				
				<!-- Main content section -->
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fullcol no-pad middle-col">
					<div class="midmain">
						<?php if($this->session->flashdata('welcome-message')){echo '<div class="message-box">'. $this->session->flashdata('welcome-message') .'</div>';}?>
						<?php if($this->message->hasFlashMessage()) $this->message->printFlashMessage();?>
							
						
						<!-- 
							Render various section to this div based on user request
							Ex- Registration, Login, etc.
						-->
						<div class="content">
							<?php $this->load->view($view);?>
						</div>
												
						<?php //if (!$login):?>
						<div class="">
							<?php //$this->load->view("module/blog/blog.php");?>
						</div>
						<?php //endif;?>
					</div>
				</div>
				
				<div class="right-col-identifier"><i class="fa fa-angle-double-left fa-5x"></i></div>
				
				<!-- Right Menu -->
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 fullcol pad-r-15 hide right-col">
					<?php // pre($_SESSION['id']);?>
					<?php $this->load->view($siteRightSideBar)?>
      			</div>
			</div>
			</div>
		</section>
	</div>

	
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?php echo base_url('assets/js/bootstrap/bootstrap.min.js');?>"></script>
<!-- 	<script src="js/jquery.idealforms.js"></script> -->
	<script src="<?php echo base_url('assets/js/jquery.idealforms.js')?>"></script>
	<script src="<?php echo base_url('assets/js/plugin/classy/js/jquery.classyedit.js')?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap-toggle/bootstrap-toggle.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>
	<script src="<?php echo base_url('assets/js/app.js');?>"></script> 
	<script src="<?php echo base_url('assets/js/chat.js');?>"></script> 
	<!-- Additional Script -->
	<?php if(isset($additionalScript)) : foreach ($additionalScript as $script):?>
	<script src="<?php echo base_url("assets/js/".$script);?>"></script>
	<?php endforeach; endif;?>
	
	
	
	<!-- Go to www.addthis.com/dashboard to customize your tools --> 
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a21103aad337c00"></script> 
	
	<?php //$this->output->enable_profiler(TRUE);?>
	
	<script type="text/javascript">
	
	<?php if(isset($leftSideData['playVideo']) && $leftSideData['playVideo'] == true) :?>
	$(function(){
// 		$('#virginUserVideoModal').modal('show');


// 		$('video').on('ended',function(){
// 			$('#virginUserVideoModal').modal('hide');
// 			console.log("video ended");
// 		});
	});
	
	<?php endif;?>

	$('.left-col-identifier').on('click', function(){

		var $this = $(this);
		if($this.hasClass('open'))
		{
			$this.removeClass('open')
			$('.left-col').addClass('hide');

			/* Check if right sidebar is open*/
			
			if($('.right-col').hasClass('hide')) {
				$('.middle-col').addClass('col-xs-12 col-sm-12 col-md-12 col-lg-12').removeClass('col-xs-12 col-sm-9 col-md-9 col-lg-9');
			}
			else {
				$('.middle-col').addClass('col-xs-12 col-sm-12 col-md-12 col-lg-12').removeClass('col-xs-12 col-sm-6 col-md-6 col-lg-6');	
			}		
		}
		else
		{
			$this.addClass('open')
			$('.left-col').removeClass('hide');

			/* Check if right sidebar is open*/
			
			if($('.right-col').hasClass('hide')) {
				$('.middle-col').removeClass('col-xs-12 col-sm-12 col-md-12 col-lg-12').addClass('col-xs-12 col-sm-9 col-md-9 col-lg-9');
			}
			else {
				$('.middle-col').removeClass('col-xs-12 col-sm-12 col-md-12 col-lg-12').addClass('col-xs-12 col-sm-6 col-md-6 col-lg-6');	
			}

			
			
		}
	});

	$('.right-col-identifier').on('click', function(){

		var $this = $(this);
		if($this.hasClass('open'))
		{
			$this.removeClass('open')
			$('.right-col').addClass('hide');

			/* Check if right left is open*/
			
			if($('.left-col').hasClass('hide')) {
				$('.middle-col').addClass('col-xs-12 col-sm-12 col-md-12 col-lg-12').removeClass('col-xs-12 col-sm-9 col-md-9 col-lg-9');
			}
			else {
				$('.middle-col').addClass('col-xs-12 col-sm-12 col-md-12 col-lg-12').removeClass('col-xs-12 col-sm-6 col-md-6 col-lg-6');	
			}		
			
		}
		else
		{
			$this.addClass('open')
			$('.right-col').removeClass('hide');

			/* Check if left sidebar is open*/
			
			if($('.left-col').hasClass('hide')) {
				$('.middle-col').removeClass('col-xs-12 col-sm-12 col-md-12 col-lg-12').addClass('col-xs-12 col-sm-9 col-md-9 col-lg-9');
			}
			else {
				$('.middle-col').removeClass('col-xs-12 col-sm-12 col-md-12 col-lg-12').addClass('col-xs-12 col-sm-6 col-md-6 col-lg-6');	
			}

		}
	});
	
	
	</script>
	
	
	<?php if(isset($leftSideData['playVideo']) && $leftSideData['playVideo'] == true) :?>
	<!-- Virgin User Video Modal -->
    <div id="virginUserVideoModal" class="modal fade" role="dialog">
    	<div class="modal-dialog" style="width:100%; height:100%; margin:0px; padding:0px;" >
    
            <!-- Modal content-->
        	<div class="modal-content">          		
          		<div class="modal-body">
          			<iframe style="width:100%;"  width="100%" src="https://www.youtube.com/embed/wr5qcKUIAgo?rel=0&autoplay=1"></iframe>            		
          		</div>          		
        	</div>
    	</div>
    </div>
	<?php endif; ?>
	
</body>
</html>