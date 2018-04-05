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
    		<input type="hidden" name="hidden-pct-amount" value="<?php echo $eventData->{User_event_model::_PCT_PRICE}; ?>"/>   		
    		<div class="text-left">
    			<input type="button" class="btn btn-success addPCTAmount" value="Add PCT"/>
    			<input type="submit" class="btn btn-primary" value="Pay"/>
    		</div>
		</form>
	</div>
</div>

<!-- Modal -->
<div id="addPCTAmount" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      	<button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color: #333;">Add PCT to wallet</h4>
      </div>
      <div class="modal-body">
      	<form  method="post" action="<?php echo base_url('quick/pay')?>">
      		<div class="form-group">
      			<label class="font-10">Enter PCT Amount</label>
      			<div class="col-md-12">
      				<div class="row">
      					<div class="input-group">
          					<span class="input-group-addon">PCT</span>
          					<input type="text" class="form-control" name="pct-amount">
          				</div>
      				</div>      				
      			</div>    
      			<div class="clearfix"></div>			
      		</div>
      		
      		<button type="submit" class="btn btn-success">Pay via paypal</button>
      		<input type="hidden" name="redirect-url">      		
      		<input type="hidden" name="item_id" value="1001"/>
			<input type="hidden" name="item_name" value="PCT"/>
			<input type="hidden" name="eur_amount"/>
      		<input type="hidden" name="mode" value="paypal"/>
      	</form>  
      </div>
    </div>
  </div>
</div>


<script>
$('.addPCTAmount').on('click', function(){

	var pctTransferPoints = $('input[type="hidden"][name="hidden-pct-amount"]').val();
	$("#addPCTAmount").find('input[type="text"][name="pct-amount"]').val(pctTransferPoints);
	
	$("#addPCTAmount").find('input[type="hidden"][name="eur_amount"]').val(1000);
	$("#addPCTAmount").find('input[type="hidden"][name="redirect-url"]').val(window.location.href);
	$("#addPCTAmount").modal('show');
});
</script>