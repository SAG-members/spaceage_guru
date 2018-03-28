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
					<td><?php echo $this->page->get_by_id($eventData->{User_event_model::_ITEM_ID}, Page::_PAGE_TITLE); ?></td>
					<td>PCT <?php echo $eventData->{User_event_model::_PCT_PRICE}; ?></td>
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
			<input type="hidden" name="type" value="escrow-payment"/>			
    		<input type="hidden" name="escrow-id" value="<?php echo $escrowId; ?>"> 
    		<input type="hidden" name="event-id" value="<?php echo $eventData->{User_event_model::_ID}; ?>">    		
    		<div class="text-left">
    			<input type="submit" class="btn btn-primary" value="Pay"/>
    		</div>
		</form>
	</div>
</div>