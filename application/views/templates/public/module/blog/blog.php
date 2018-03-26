<h2>Posts</h2>
<?php if($this->session->userdata('isLoggedIn')):?>
<div class="mar-t-10">
<a href="<?php echo base_url('index.php/blog/new-post')?>" class="new-post pull-right">Create New Post</a>
</div>
<?php endif;?>
<?php if($posts): foreach ($posts as $post):?>
<div class="blogmain">
	<h2><a href="<?php echo base_url("index.php/blog/".$post['slug'])?>"><?php echo $post['post_title'];?></a></h2>
	<small>Published on <?php echo $post['published_date']; ?><a href=""></a></small>
	<?php
	 
	# Strip tags to avoid breaking any html
	$content = $post['post_content'];
	
	if (strlen($content) > 100) 
	{ 
		# Truncate string
		$stringCut = substr($content, 0, 500);
	
		# Make sure it ends in a word so assassinate doesn't become ass...
		$content = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a class="read-more" href="'.base_url("index.php/blog/".$post['slug']).'">Read More</a>';
	}
	
	echo $content;
		 
	?>
</div>
<?php endforeach; endif;?>
<?php if(empty($post)):?>
<h1>Nothing Found</h1>
<p>It seems we can’t find what you’re looking for.</p>
<?php endif;?>
