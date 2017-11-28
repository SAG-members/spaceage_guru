<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $title;?></title>

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- Styles -->
<?php
$stylesheets = array ( 'bootstrap.min.css', 'font-awesome.css', 'custom.min.css', 'plugin/classy/jquery.classyedit.css', 'plugin/datatables/dataTables.bootstrap.css', 'plugin/summernote/summernote.css','style.css','green.css', 'plugin/datatables/dataTables.bootstrap.css', 'plugin/dropzone/dropzone.min.css', 'plugin/select2/select2.min.css');
$scripts = array ('bootstrap.min.js', 'custom.js', 'plugin/tinymce/tinymce.min.js', 'tinymce.js', 'plugin/classy/jquery.classyedit.js', 'plugin/datatables/jquery.dataTables.min.js','plugin/datatables/dataTables.bootstrap.js','plugin/summernote/summernote.js', 'plugin/taginputs/jquery.tagsinput.js', 'plugin/dropzone/dropzone.min.js', 'icheck.js','jquery-ui.js', 'plugin/select2/select2.full.min.js',  'script.js');
?>

<?php if($stylesheets) : foreach ($stylesheets as $style) :?>
<link rel="stylesheet"
	href="<?php echo base_url(Template::_ADMIN_CSS_DIR.$style);?>" />
<?php endforeach; endif;?>
<link href="<?php echo base_url('assets/css/bootstrap-datetimepicker.css')?>" rel="stylesheet">
<!-- <link -->
<!-- 	href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' -->
<!-- 	rel='stylesheet' type='text/css'> -->

<!--  Load jQuery First -->
<script src="<?php echo base_url(Template::_ADMIN_JS_DIR.'jquery.js');?>"></script>

<link href="//vjs.zencdn.net/5.19/video-js.min.css" rel="stylesheet">
<script src="//vjs.zencdn.net/5.19/video.min.js"></script>

<!-- Styles -->
<script type="text/javascript">BASE_URL = "<?php echo base_url();?>";</script>

<script src="<?php echo base_url('assets/js/moment.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-datetimepicker.js');?>"></script> 
	
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col"><?php $this->load->view($siteLeftSideBar);?></div>
			<!-- Top Navigation -->
			<div class="top_nav"><?php $this->load->view($siteHeader);?></div>
			<!-- Top Navigation -->
			
			<!-- Page Content -->
			<div class="right_col" role="main">
			<?php if($this->message->hasFlashMessage()) $this->message->printFlashMessage();?>
			<?php $this->load->view($view);?>
			</div>
			<!-- Page Content -->
			
			<!-- Footer content -->
			<footer><?php $this->load->view($siteFooter);?></footer>
			<!-- Footer content -->	
		</div>
	</div>
	
<?php foreach ($scripts as $script) :?>
<script src="<?php echo base_url(Template::_ADMIN_JS_DIR.$script);?>"></script>
<?php endforeach;?>	
</body>
<?php //$this->output->enable_profiler(TRUE);?>
</html>
