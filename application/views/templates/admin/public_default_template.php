<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $title;?></title>
<link rel="icon" href="<?php echo base_url('assets/img/fav-32X32.png'); ?>" type="image/gif" sizes="32x32">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- Styles -->
<?php $stylesheets = array ( 'bootstrap.min.css', 'font-awesome.css','custom.css','style.css');?>
<?php if($stylesheets) : foreach ($stylesheets as $style) :?>
<link rel="stylesheet" 
	href="<?php echo base_url(Template::_ADMIN_CSS_DIR.$style);?>" />
<?php endforeach; endif;?>
<link href="<?php echo base_url('assets/css/bootstrap-datetimepicker.css')?>" rel="stylesheet">

<!-- <link -->
<!-- 	href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' -->
<!-- 	rel='stylesheet' type='text/css'> -->

<!-- Styles -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url(Template::_ADMIN_JS_DIR .'jquery.js')?>"></script>    
<script type="text/javascript">BASE_URL = "<?php echo base_url();?>";</script>

<script src="<?php echo base_url(Template::_ADMIN_JS_DIR .'bootstrap.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/plugin/classy/js/jquery.classyedit.js')?>"></script>
	<script src="<?php echo base_url(Template::_ADMIN_JS_DIR .'script.js');?>"></script>
	<script src="<?php echo base_url('assets/js/moment.js');?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap-datetimepicker.js');?>"></script> 

</head>

<body class="login">
	<?php $this->load->view($view)?>
	
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	
</body>
</html>
