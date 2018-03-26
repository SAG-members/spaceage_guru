<?php 
// $lockIcon = 'fa fa-lock';
$lockIcon = '';

if($this->session->userdata('user_id')) $lockIcon = '';

?>
<div class="leftmain">
	<ul class="left-menu-items">
		<li class="text-center menu-li-style"><a href="<?php echo base_url();?>">HOME</a></li>		
		<li class="text-center menu-li-style"><a href="<?php echo base_url('lean-canvas-spaceage-guru')?>">LEAN CANVAS</a></li>		
	</ul>
	<div class="clearfix"></div>
	<div id="google_translate_element" class="text-center"></div>
	<script type="text/javascript">
        function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	<div class="copyright">&copy; <?php echo date("Y");?> Spageage guru</div>
</div>	