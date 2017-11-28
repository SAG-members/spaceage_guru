<h2><?php echo $post['post-title']?></h2>
<?php $user = $post['user']; if($post['anonymous']){$user = 'Anonymous';}?>
<div class="blogmain"><small>Published on <?php echo $post['published-date']; ?> by <?php echo $user;?></a></small></div>
<div class="services_text">
	<?php echo $post['post-content'];?>
</div>
<div class="clearfix"></div>
<!-- <!-- Comments On Blog Post -->
<p class="blogmain"></p>
<h2>User Comments</h2>
<?php if($comments): foreach ($comments as $comment):?>
<div class="media">
	<a class="pull-left" href="#"> <img class="media-object"
		src="http://placehold.it/64x64" alt="">
	</a>
	<div class="media-body">
		<h4 class="media-heading">
			<?php $user = $comment['user-id']; if($comment['anonymous']){$user = 'Anonymous';}?>
			<?php echo $user;?> <small><?php echo $comment['comment-date']?></small>
		</h4>
		<?php echo $comment['post-comment']?>
	</div>
	<div class="clearfix"></div>
</div>
<?php endforeach; endif;?>
<?php if(empty($comment)):?>
<h1>No Comments Found</h1>
<?php endif;?>
<!-- <!-- Leave a Reply -->
<p class="blogmain"></p>
<h2>Leave a Reply</h2>
<br />
<form name=""
	action="<?php echo base_url('index.php/blog/post-comment')?>"
	method="post">
	<textarea rows="5" cols="80" name="post-comment"
		placeholder="Post Comment"></textarea>
	<div class="checkboobmain">
		<input type="checkbox" name="anonymous" value="1"/> <label>Post as Anonymous</label>
	</div>
	<div clas="clearfix"></div>	
	
	<div class="field buttons">
		<input type="hidden" name="post-id" value="<?php echo $post['id']?>" />
		<button type="submit" name="btn-submit-post-comment"
			class="field button">Post Comment</button>
	</div>
</form>
