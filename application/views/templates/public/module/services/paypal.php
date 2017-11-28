<body onload="body_onload()">

	<h1 style="text-align: center;">
		Please Wait While We are Redirecting You To Paypal...<br>
	</h1>

	<div style="margin-top: 150px;text-align: center;"> 
		<img src="<?php echo base_url(); ?>assets/img/loading.gif"
			style="width: 145px; height: 126px;">
	</div>

	<form action="https://www.sandbox.paypal.com/cgi-bin/webscr"
		method="post" name="paypal_payment_form" id="paypal_payment_form">
		<input type="hidden" name="cmd" value="_xclick" /> 
		<input type="hidden" name="upload" value="1" /> 
		<input type="hidden" name="business" value="juhi@xantatech.in" /> 
		<input type="hidden" name="currency_code" value="EUR" /> 
		<input type="hidden" name="return" value="<?php echo base_url('index.php/membership/thanku'); ?>"> 
		<input type="hidden" name="cbt" value="Click Here to Complete Transaction">
		<input type="hidden" name="cancel_return" value="<?php echo base_url('index.php/membership/user'); ?>"> 
		<input type="hidden" name="notify_url" value="<?php echo base_url('index.php/membership/thanku'); ?>"> 
		<input type="hidden" name="item_name" value="<?php echo $item?>" /> 
		<input type="hidden" name="quantity" value="1" /> 
		<input type="hidden" name="amount" value="<?php echo $price?>" />
	</form>

</body>


<script type="text/javascript">
    function body_onload() {
        var form = document.getElementById('paypal_payment_form');
       form.submit();
    }
</script>
