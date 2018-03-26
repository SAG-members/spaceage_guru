<?php 
// $lockIcon = 'fa fa-lock';
$lockIcon = '';

if($this->session->userdata('user_id')) $lockIcon = '';

?>
<div class="leftmain">
	<ul class="left-menu-items">
		<li class="text-center menu-li-style"><a href="<?php echo base_url();?>">HOME</a></li>
		<li class="text-center menu-li-style"><a href="<?php echo base_url('club-laws');?>">CLUB GUIDELINES</a></li>		
		<li class="text-center menu-li-style"><a href="<?php echo base_url('e-business')?>"><i class="pull-left <?php echo $lockIcon; ?>"></i> E-BUSINESS</a></li>
		<!-- <li class="text-center menu-li-style"><a href="<?php echo base_url('escrow');?>"><i class="pull-left <?php echo $lockIcon; ?>"></i> ESCROW</a></li> -->
		<li class="text-center menu-li-style"><a href="<?php echo base_url('shop');?>"><i class="pull-left <?php echo $lockIcon; ?>"></i> SHOP WITH CART</a></li>
		<li class="text-center menu-li-style"><a href="<?php echo base_url('profile');?>"><i class="pull-left <?php echo $lockIcon; ?>"></i> PROFILE</a></li>
		<li class="text-center menu-li-style"><a href="<?php echo base_url('service/number-game');?>"><i class="pull-left <?php echo $lockIcon; ?>"></i>Spiritual Guidance</a></li>
		<li class="text-center menu-li-style"><a href="<?php echo base_url('lean-canvas-spaceage-guru')?>">LEAN CANVAS</a></li>
		<li class="text-center menu-li-style">
			<a href="<?php echo base_url('feedback');?>">FEEDBACK</a>			
		</li>
		<li class="text-center menu-li-style">
			<a class="pull-left add-pss" href="<?php echo base_url('faq');?>" title="My Faqs" alt="My Faqs"><i class="fa fa-bars"></i> </a>
			<a href="<?php echo base_url('faq');?>">FAQ</a>
			<a class="pull-right add-pss" href="<?php echo base_url('faq/post-question');?>" title="Add Faq" alt="Add Faq"><i class="fa fa-plus"></i> </a>
		</li>
		<?php if($this->session->has_userdata('id')):?>
		<li class="text-center menu-li-style"><a href="<?php echo base_url('logout');?>">LOGOUT</a></li>
		<?php endif; ?>
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