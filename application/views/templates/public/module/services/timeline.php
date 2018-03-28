<div class="services_text">
<h2><?php echo $title;?></h2>
<?php if($this->session->userdata('id')) :?>

<?php if($createdOffer) : ?>
<table class="table table-bordered">
	<caption>Created Offers</caption>
	<thead>
  		<tr>
    		<th>Topic</th>
    		<th>Comment</th>
    		<th>Item</th>
    		<th>Created Date</th>
    		<th>Status</th>    		
    		<th>Edit</th>
  		</tr>
  	</thead>
  	<tbody>
    <?php foreach ($createdOffer as $o):?>
    <tr>
    	<td><?php echo $o->{User_event_model::_TOPIC}; ?></td>
    	<td><?php echo read_more($o->{User_event_model::_COMMENT}, 20, 25); ?></td>
    	<td><?php echo $this->page->get_by_id($o->{User_event_model::_ITEM_ID}, Page::_PAGE_TITLE); ?></td>
    	<td><?php echo $o->{User_event_model::_DATE_CREATED}; ?></td>    	
    	<td>
    		<?php 
    		$status = "";
    		switch ($o->{User_event_model::_STATUS}) 
    		{
    		    case User_event_model::EVENT_CREATED : $status = "Event Created"; break;
    		    case User_event_model::EVENT_PENDING : $status = "Offer Incomplete"; break;
    		    case User_event_model::EVENT_COMPLETED : $status = "Offer Complete"; break;
    		}
    		
    		echo $status;
    		?>
    		
    	</td>
    	<td></td>    	
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>

<?php if($completedOffers) : ?>
<table class="table table-bordered">
	<caption>Completed Offers</caption>
	<thead>
  		<tr>
    		<th>Topic</th>
    		<th>Comment</th>
    		<th>Item</th>
    		<th>Created Date</th> 
  		</tr>
  	</thead>
  	<tbody>
    <?php foreach ($completedOffers as $o):?>
    <tr>
    	<td><?php echo $o->{User_event_model::_TOPIC}; ?></td>
    	<td><?php echo read_more($o->{User_event_model::_COMMENT}, 20, 25); ?></td>
    	<td><?php echo $this->page->get_by_id($o->{User_event_model::_ITEM_ID}, Page::_PAGE_TITLE); ?></td>
    	<td><?php echo $o->{User_event_model::_DATE_CREATED}; ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>




<?php if($incompleteOffers) : ?>
<table class="table table-bordered">
	<caption>Incomplete Offers</caption>
	<thead>
  		<tr>
    		<th>Topic</th>
    		<th>Comment</th>
    		<th>Item</th>
    		<th>Created Date</th>    		    		
    		<th></th>
  		</tr>
  	</thead>
  	<tbody>
    <?php foreach ($incompleteOffers as $o):?>
    <tr>
    	<td><?php echo $o->{User_event_model::_TOPIC}; ?></td>
    	<td><?php echo read_more($o->{User_event_model::_COMMENT}, 20, 25); ?></td>
    	<td><?php echo $this->page->get_by_id($o->{User_event_model::_ITEM_ID}, Page::_PAGE_TITLE); ?></td>
    	<td><?php echo $o->{User_event_model::_DATE_CREATED}; ?></td>
    	<td>
    		<?php if($o->{User_event_status_model::_STATUS} == User_event_status_model::STATUS_YIELD_SMART_CONTRACT) :?>
    		<a href="<?php echo base_url('yield/event/'.$o->{User_event_model::_ID})?>">Smart Contract</a>
    		<?php else :?>
    		<a href="<?php echo base_url('yield/escrow/event/'.$o->{User_event_model::_ID})?>">Escrow</a>    		
    		<?php endif;?>
    	</td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>

<?php if($declinedOffers) : ?>
<table class="table table-bordered">
	<caption>Declined Offers</caption>
	<thead>
  		<tr>
    		<th>Id</th>
    		<th>Topic</th>
    		<th>Comment</th>
    		<th>Created Date</th>
    		<th>Decline Date</th>
  		</tr>
  	</thead>
  	<tbody>
    <?php $i=1; foreach ($declinedOffers as $o):?>
    <tr>
    	<td><?php echo $i;?></td>
    	<td><?php echo $this->uem->get_by_id($o->{User_event_status_model::_EVENT_ID}, User_event_model::_TOPIC); ?></td>
    	<td><?php echo $this->uem->get_by_id($o->{User_event_status_model::_EVENT_ID}, User_event_model::_COMMENT); ?></td>
    	<td><?php echo $this->uem->get_by_id($o->{User_event_status_model::_EVENT_ID}, User_event_model::_DATE_CREATED); ?></td>
    	<td><?php echo $o->{User_event_status_model::_DATE_CREATED}; ?></td>
    </tr>
    <?php endforeach; $i++; ?>
    </tbody>
</table>
<?php endif; ?>


<?php endif;?>

<p>3D timeline where you can place pictures and visual notes from anything important to you. The idea is to combine and synchronize the timelines with all of the users and Members to make all of the things wished to happen</p>
<video width="100%" autoplay loop>
  <source src="<?php echo base_url('assets/uploads/timeline/DNA_TIMELINE_FUNCTIONAL.mp4'); ?>" type="video/mp4">  
  Your browser does not support HTML5 video.
</video>
</div>