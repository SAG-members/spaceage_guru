<?php 
$resetURL = base_url('reset-password/'.$passwordHash);
?>
<html>
<body style="margin:0; padding:0;">
	<div style="border:1px solid #E7E7E7; background-color:#087dc2; color:#FFF; text-align:center;"><p style="text-align: center;"><img src="<?php echo base_url('assets/img/logo-1.png')?>" style="width: 255.842px; height: 180px;"><br></p></div>
	<div style="margin:0px; text-align:center;height:300px;padding:10px;">	
		<h3>Reset Password </h3>	
		<p>

		<b>Hello, <?php echo $name;?></b><br/><br/>
		We have received a request to reset your password, Please click on the button below to reset you password<br />
		<br /><br />
		<a href='<?php echo $resetURL;?>' target='_blank' style="cursor:pointer; text-decoration: none; color: #FFF; border: 1px solid #E7E7E7; padding: 10px 12px; background: #087dc2; border-radius: 5px; border-radius: 5px 5px 5px 5px; -moz-border-radius: 5px 5px 5px 5px; -webkit-border-radius: 5px 5px 5px 5px; border: 0px solid #000000;"/> Reset My Password. </a> <br />
		<br /><br />If the above button does not work, just copy and paste the link in the address bar to reset your password. <br />
		<br /><?php echo $resetURL;?>
		</p>
	</div>
</body>
</html>