<?php 
$invitationURL = base_url('user-invite/'.$invitationHash);
?>
<html>
<body style="margin:0; padding:0;">
	<div style="border:1px solid #E7E7E7; background-color:#087dc2; color:#FFF; text-align:center;">
		<img src="<?php echo base_url('assets/img/rainbow_couple.jpg')?>" style="width: 400px;"><br/><br/>
		<img src="<?php echo base_url('assets/img/mother_earth.jpg')?>" style="width: 400px;">
		
	</div>
	
	<div style="margin:0px; text-align:center;height:300px;padding:10px;">	
		<h3>You are invited to join spaceage.guru </h3>	
		<p>

		<b>Hello, <?php echo $email;?></b><br/><br/>
		You have received a invitation to join spaceage.guru, Please click on the button below to join<br />
		<?php if(isset($couponCode)):?>
		Please use the below mentioned coupon code during registration
		<h2><?php echo $couponCode;?></h2>
		<?php endif;?>
		<br /><br />
		<a href='<?php echo $invitationURL;?>' target='_blank' style="cursor:pointer; text-decoration: none; color: #FFF; border: 1px solid #E7E7E7; padding: 10px 12px; background: #087dc2; border-radius: 5px; border-radius: 5px 5px 5px 5px; -moz-border-radius: 5px 5px 5px 5px; -webkit-border-radius: 5px 5px 5px 5px; border: 0px solid #000000;"/> Accept Invite. </a> <br />
		<br /><br />If the above button does not work, just copy and paste the link in the address bar to join. <br />
		<br /><?php echo $invitationURL;?>
		</p>
	</div>
</body>
</html>