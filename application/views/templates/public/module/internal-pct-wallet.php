<div id="new-post" class="services_text pss_div">
	<div class="text-center">
		<h3>Your order summary</h3>
		<br/><br/>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="text-center">Description</th>
					<th class="text-center">Amount</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo $pctInfo['item_name']; ?></td>
					<td>PCT <?php echo $pctInfo['invoice_amount']; ?></td>
				</tr>
			</tbody>
		</table>
		<form method="post" action="<?php echo base_url('process/pct/payment'); ?>">
			<div class="row">
				<div class="col-md-6 text-left">
					<label class="text-left">Username</label>
				</div>
				<div class="col-md-6">
					<input type="text" class="password" name="user-name" value="<?php echo $profile->{User::_USERNAME}?>" readonly>						
				</div>
				<div class="col-md-6 text-left">
					<label  class="">Please enter your login password to complete this transaction</label>
				</div>
				<div class="col-md-6">
					<input type="password" class="password" name="user-password" required>
				</div>
			</div>
			<input type="hidden" name="item_id" value="<?php echo $pctInfo['item_id'];?>"/>
			<input type="hidden" name="item_name" value="<?php echo $pctInfo['item_name'] ;?>"/>
			<input type="hidden" name="category_id" value="<?php echo $pctInfo['category_id'] ;?>"/>    		
    		<input type="hidden" name="invoice_currency" value="eur">
    		<input type="hidden" name="invoice_amount" value="<?php echo $pctInfo['invoice_amount']; ?>" data-type="number">    		
    		<div class="text-left">
    			<input type="submit" class="btn btn-primary" value="Pay"/>
    		</div>
		</form>
	</div>
</div>