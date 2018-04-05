<!-- PCT AMOUNT TRANSFER TAB -->
<div id="pct-amount-transfer-tab" class="tab-pane">
	<div class="pad-20">
		<form action="<?php echo base_url('transfer/pct'); ?>" name="form-horizontal" method="post">
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="user-name" class="password" value="<?php echo $profile->{User::_USERNAME}; ?>" readonly>
			</div>
			<div class="form-group">
				<label>To User</label>										
				<select class="specified_user_value password" name="to-account" name="to-account" readonly>																						
					<?php if($accounts): foreach ($accounts as $acc):?>											
					<?php $name = !empty($acc->{User::_AVATAR_NAME}) ? $acc->{User::_AVATAR_NAME} : !empty($acc->{User::_USERNAME}) ? $acc->{User::_USERNAME} : "";  ?>
					<?php $selected = ""; if($acc->{User::_ID} == $eventData->{User_event_model::_USER_ID}) echo $selected="selected"; ?>
					
					<option value="<?php echo $acc->{User::_ID}?>" <?php echo $selected; ?>><?php echo $name; ?></option>
					<?php endforeach; endif; ?>
				</select>
			</div>
			<div class="form-group">
				<label>Topic</label>
				<textarea style="height: 100px;" class="password" name="pct-topic" readonly><?php echo $eventData->{User_event_model::_TOPIC}?></textarea>
			</div>
			<div class="form-group">
				<label>Message</label>
				<textarea style="height: 100px;" rows="5" cols="" class="password" name="pct-message" readonly><?php echo $eventData->{User_event_model::_COMMENT}?></textarea>
			</div>
			<div class="form-group">
				<label>PCT Balance( <a class="addPCTAmount">Add PCT</a> )</label>
				<input type="text" name="pct-balance" class="password" value="PCT <?php echo $profile->{User::_PCT_WALLET_AMOUNT}; ?>" readonly>
			</div>
			<div class="form-group">
				<label>PCT Transfer</label>
				<input type="text" class="password" name="pct-transfer-points" value="<?php echo $eventData->{User_event_model::_PCT_PRICE}?>" readonly>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="password" name="user-password">
			</div>
			<div class="form-group">	
				<input type="hidden" name="event-id" value="<?php echo $eventData->{User_event_model::_ID}?>"/>
				<input type="hidden" name="transfer-type" value="smart contract"/>								
				<input type="submit" class="btn-round-red password" name="pct-transfer-points-submit-btn">
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

	var pctTransferPoints = $('input[type="text"][name="pct-transfer-points"]').val();
	$("#addPCTAmount").find('input[type="text"][name="pct-amount"]').val(pctTransferPoints);
	
	$("#addPCTAmount").find('input[type="hidden"][name="eur_amount"]').val(1000);
	$("#addPCTAmount").find('input[type="hidden"][name="redirect-url"]').val(window.location.href);
	$("#addPCTAmount").modal('show');
});
</script>