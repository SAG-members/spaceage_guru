<h2><?php //echo $title;?></h2>
<?php #pre($data);?>
<div class="services_text">
	<?php if($data):?>
						
		
		<?php if($data['yielded_escrow']): ?>
    	<h2>Yielded Escrow</h2>
    	<table class="table table-bordered">
    		<thead>
    			<tr>    				
    				<td>Item</td>
    				<td>Price</td>
    				<td>Address</td>
    				<td>Date Time</td>
    				<td></td>
    			</tr>
    		</thead>
    		<tbody>
    		<?php foreach ($data['yielded_escrow'] as $e):?>
    		<?php 
    		$eventData = $this->uem->get_by_id($e->event_id);
    		?>    		
    		<tr>
    			<td><?php echo $this->page->get_by_id($eventData->{User_event_model::_ITEM_ID}, Page::_PAGE_TITLE); ?></td>
    			<td>&euro; <?php echo $eventData->{User_event_model::_PRICE}; ?></td>
    			<td><?php echo $eventData->{User_event_model::_ADDRESS};  ?></td>
    			<td><?php echo $eventData->{User_event_model::_DATE_CREATED}; ?></td>
    			<td>
    				<a href="<?php echo base_url('yield/escrow/event/'.$eventData->{User_event_model::_ID})?>">Edit</a>
    				<a class="confirm_escrow_delete" data-href="<?php echo base_url('escrow/delete/'.$eventData->{User_event_model::_ID})?>">Delete</a>
    			</td>
    		</tr>
    		<?php endforeach;?>
    		</tbody>
    	</table>
    	<?php endif;?>
	
	
    	<?php if($data['saved_escrow']): ?>
    	<h2>Saved Escrow</h2>
    	<table class="table table-bordered">
    		<thead>
    			<tr>    				
    				<td>Item</td>
    				<td>Price</td>
    				<td>Address</td>
    				<td>Date Time</td>
    				<td></td>
    			</tr>
    		</thead>
    		<tbody>
    		<?php foreach ($data['saved_escrow'] as $e):?>
    		<?php 
    		$eventData = $this->uem->get_by_id($e->event_id);
    		?>    		
    		<tr>
    			<td><?php echo $this->page->get_by_id($eventData->{User_event_model::_ITEM_ID}, Page::_PAGE_TITLE); ?></td>
    			<td>&euro; <?php echo $eventData->{User_event_model::_PRICE}; ?></td>
    			<td><?php echo $eventData->{User_event_model::_ADDRESS};  ?></td>
    			<td><?php echo $eventData->{User_event_model::_DATE_CREATED}; ?></td>
    			<td>
    				<a href="<?php echo base_url('yield/escrow/event/'.$eventData->{User_event_model::_ID})?>">Edit</a>
    				<a class="confirm_escrow_delete" data-href="<?php echo base_url('escrow/delete/'.$eventData->{User_event_model::_ID})?>">Delete</a>
    			</td>
    		</tr>
    		<?php endforeach;?>
    		</tbody>
    	</table>
    	<?php endif;?>
    	<?php if($data['accepted_escrow']):?>
    	<h2>Accepted Escrow</h2>
    	<table class="table table-bordered">
    		<thead>
    			<tr>
    				<td>Item</td>
    				<td>Price</td>
    				<td>Address</td>
    				<td>Date Time</td>
    				<td></td>
    				<td></td>
    			</tr>
    		</thead>
    		<tbody>
    		<?php foreach ($data['accepted_escrow'] as $e):?>
    		<?php 
    		$eventData = $this->uem->get_by_id($e->event_id);
    		?>    		
    		<tr>
    			<td><?php echo $this->page->get_by_id($eventData->{User_event_model::_ITEM_ID}, Page::_PAGE_TITLE); ?></td>
    			<td>&euro; <?php echo $eventData->{User_event_model::_PRICE}; ?></td>
    			<td><?php echo $eventData->{User_event_model::_ADDRESS};  ?></td>
    			<td><?php echo $eventData->{User_event_model::_DATE_CREATED}; ?></td> 
    			<td>
    				<?php if($e->escrow_buyer_id == $this->session->userdata('id') && $e->status == User_event_escrow_model::ACCEPT_OFFER && $e->seller_approved == 0) :?>
    				Waiting for Seller Approval
    				<?php elseif($e->escrow_seller_id == $this->session->userdata('id') && $e->status == User_event_escrow_model::ACCEPT_OFFER && $e->seller_approved == 0) :?>
    				Approval Required
    				<?php elseif($e->escrow_seller_id == $this->session->userdata('id') && $e->status == User_event_escrow_model::ACCEPT_OFFER && $e->seller_approved == 1) :?>
    				Waiting to be paid
    				<?php elseif($e->escrow_buyer_id == $this->session->userdata('id') && $e->status == User_event_escrow_model::ACCEPT_OFFER && $e->seller_approved == 1) :?>
    				Pay
    				<?php endif;?>
    				
    				<td>
    				<a href="<?php echo base_url('yield/escrow/event/'.$eventData->{User_event_model::_ID})?>">Edit</a>
    				<a class="confirm_escrow_delete" data-href="<?php echo base_url('escrow/delete/'.$eventData->{User_event_model::_ID})?>">Delete</a>
    			</td>
    		</tr>
    		<?php endforeach;?>
    		</tbody>
    	</table>
    	
    	<?php endif;?>
	<?php else:?>
	<h2>No Escrow Exists !!!</h2>
	<?php endif;?>
</div>

<script>
$('.confirm_escrow_delete').on('click', function(){
	
	var r = confirm("Are you sure you want to delete this offer ??");

	if(r==true)
	{
		var newForm = jQuery('<form>', {
	        'action': $(this).data('href'),
	        'target': '_top',
	        'method':'post'	
	    });

		newForm.appendTo("body").submit();
	}
	else
	{
		console.log("Noting Happens");
	}		
});


</script>