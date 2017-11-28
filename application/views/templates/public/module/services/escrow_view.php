<h2><?php echo $title;?></h2>
<?php #pre($data);?>
<div class="services_text">
	<?php if($data):?>
						
		
		<?php if($data['yielded_escrow']): ?>
    	<h2>Yielded Escrow</h2>
    	<table class="table table-bordered">
    		<thead>
    			<tr>
    				<td>Type</td>
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
    		
    		$eventDetail = $this->library_event_model->getLibraryEventById($e->event_id);
    		    		
    		$eventCommentDetail = $this->ulecm->get_comment_by_event($eventDetail->id);
    		
    		$pageDetail = $this->page->get_by_id($eventDetail->event_data_id);
    		$category = $this->page->get_category($pageDetail->{Page::_CATEGORY_ID});
    		
    		$criteria = User_library_event_escrow_model::_COMMENT_ID .' = '. $e->comment_id;
    		$escrowDetails = $this->escrow->get_by_criteria($criteria);
    		
    		?>
    		<tr>
    			<td><?php echo $category; ?></td>
    			<td><?php echo $eventDetail->title; ?></td>
    			<td>&euro; <?php echo $eventCommentDetail->price; ?></td>
    			<td><?php echo $eventCommentDetail->location;  ?></td>
    			<td><?php echo $eventCommentDetail->date_created; ?></td>
    			<td>
    				<a href="<?php echo base_url('escrow/create/'.$escrowDetails[0]->id)?>">Edit</a>
    				<a class="confirm_escrow_delete" data-href="<?php echo base_url('escrow/delete/'.$escrowDetails[0]->id)?>">Delete</a>
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
    				<td>Type</td>
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
    		
    		$eventDetail = $this->library_event_model->getLibraryEventById($e->event_id);
    		
    		$pageDetail = $this->page->get_by_id($eventDetail->event_data_id);
    		$category = $this->page->get_category($pageDetail->{Page::_CATEGORY_ID});
    		
    		$criteria = User_library_event_escrow_model::_COMMENT_ID .' = '. $e->comment_id;
    		$escrowDetails = $this->escrow->get_by_criteria($criteria);
    		
    		?>
    		<tr>
    			<td><?php echo $category; ?></td>
    			<td><?php echo $eventDetail->title; ?></td>
    			<td><?php echo $escrowDetails[0]->escrow_price; ?></td>
    			<td><?php echo $e->address; ?></td>
    			<td><?php echo $e->date_time; ?></td>
    			<td>
    				<a href="<?php echo base_url('escrow/create/'.$escrowDetails[0]->id)?>">Edit</a>
    				<a class="confirm_escrow_delete" data-href="<?php echo base_url('escrow/delete/'.$escrowDetails[0]->id)?>">Delete</a>
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
    				<td>Type</td>
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
    		
    		$eventDetail = $this->library_event_model->getLibraryEventById($e->event_id);
    		
    		$pageDetail = $this->page->get_by_id($eventDetail->event_data_id);
    		$category = $this->page->get_category($pageDetail->{Page::_CATEGORY_ID});
    		
    		$criteria = User_library_event_escrow_model::_COMMENT_ID .' = '. $e->comment_id;
    		$escrowDetails = $this->escrow->get_by_criteria($criteria);
    		

    		?>
    		<tr>
    			<td><?php echo $category; ?></td>
    			<td><?php echo $eventDetail->title; ?></td>
    			<td><?php echo $escrowDetails[0]->escrow_price; ?></td>
    			<td><?php echo $e->address; ?></td>
    			<td><?php echo $e->date_time; ?></td>
    			<td>
    				<?php if($e->escrow_buyer_id == $this->session->userdata('id') && $e->status == User_library_event_escrow_model::ACCEPT_OFFER && $e->seller_approved == 0) :?>
    				Waiting for Seller Approval
    				<?php elseif($e->escrow_seller_id == $this->session->userdata('id') && $e->status == User_library_event_escrow_model::ACCEPT_OFFER && $e->seller_approved == 0) :?>
    				Approval Required
    				<?php elseif($e->escrow_seller_id == $this->session->userdata('id') && $e->status == User_library_event_escrow_model::ACCEPT_OFFER && $e->seller_approved == 1) :?>
    				Waiting to be paid
    				<?php elseif($e->escrow_buyer_id == $this->session->userdata('id') && $e->status == User_library_event_escrow_model::ACCEPT_OFFER && $e->seller_approved == 1) :?>
    				Pay
    				<?php endif;?>
    				
    			<td>
    				<a href="<?php echo base_url('escrow/create/'.$escrowDetails[0]->id)?>">Edit</a>
    				<a class="confirm_escrow_delete" data-href="<?php echo base_url('escrow/delete/'.$escrowDetails[0]->id)?>">Delete</a>
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