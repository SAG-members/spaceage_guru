<h2>Feedback</h2>
<div class="services_text feedback">
	<form action="<?php echo base_url('index.php/feedback');?>" method="post">
		<label>Email(required)</label> 
		<input name="email" type="email" required> 
		
		<label>Website</label>
		<input name="website" type="url"> 
		
		<label>Comment(required)</label>
		<textarea name="comment" cols="" rows="" required></textarea> 
		
		<div>
			<input name="response" type="checkbox" value="1"><label> Want a response?</label>
		</div>
		<button type="submit">Submit</button>
	</form>
</div>