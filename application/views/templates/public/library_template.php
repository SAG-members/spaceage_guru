<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<!-- Update title dynamically -->
<title><?php echo $title?></title>

<!-- css -->
<link href="<?php echo base_url('assets/css/bootstrap/bootstrap.min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/font-awesome.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/bootstrap-toggle/bootstrap-toggle.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/custom.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/jquery/jquerysctipttop.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/bootstrap-datetimepicker.css')?>" rel="stylesheet">
<link
	href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700"
	rel="stylesheet"> 
	
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/plugin/classy/css/jquery.classyedit.css')?>" />

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url('assets/js/jquery/jquery.min.js')?>"></script>    
<script type="text/javascript">BASE_URL = "<?php echo base_url();?>";</script>


<!-- Additional Styles -->
<?php if(isset($additionalStyle)) : foreach ($additionalStyle as $style):?>
<link href="<?php echo base_url('assets/css/'.$style);?>" rel="stylesheet">
<?php endforeach; endif;?>
</head>

<body>

	<div class="container-fluid">
		
		<!-- Header includes header and main menu  -->
		<header>
			<?php $this->load->view($siteHeader)?>
			<?php $this->load->view($siteNavigation)?>
		</header>
		
		
		<section id="midmain">
			<div class="row fullheight">
				
				<!-- Left Menu -->
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 fullcol pad-l-15">
					<?php $this->load->view($siteLeftSideBar)?>
			    </div>
				
				<!-- Main content section -->
				<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 fullcol no-pad-library">
					<div class="midmain">
						<?php if($this->session->flashdata('welcome-message')){echo '<div class="message-box">'. $this->session->flashdata('welcome-message') .'</div>';}?>
						<?php if($this->message->hasFlashMessage()) $this->message->printFlashMessage();?>
						<div class="content">
							<?php $this->load->view($view);?>
						</div>
						
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
	<script src="<?php echo base_url('assets/js/moment.js');?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap-datetimepicker.js');?>"></script> 
	<!-- Additional Script -->
	<?php if(isset($additionalScript)) : foreach ($additionalScript as $script):?>
	<script src="<?php echo base_url("assets/js/".$script);?>"></script>
	<?php endforeach; endif;?>
	
	<?php //$this->output->enable_profiler(TRUE);?>
	
</body>
</html>