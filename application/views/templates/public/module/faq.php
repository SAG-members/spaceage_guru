<div class="midmain faq">
	<?php if($this->session->userdata('user_id')) :?>
	<div class="pull-right mar-t-10"><a href="<?php echo base_url('faq/post-question');?>" class="new-post">Add New Question</a></div>
	<?php endif;?>
	<h2><?php echo $title;?></h2>
	<div class="services_text">
		<p>Frequently asked questions and answers</p>
		<div id="accordion" class="panel-group">
		
		<?php $i=1; if($questions): foreach($questions as $q):?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-parent="#accordion" class="panel-question accordion-toggle "> 
						<?php 
						  $by = "";
						  $userProfile = $this->user->getUserProfile($q['user_id']);
						?>
						Q<?php echo $i?>: <?php echo $q['question'];?>
						<span class="text-right" style="display: inline-block"><?php if($q['anonymous'] != 1) { echo $by .="by @ ". $userProfile->username; }  ?></span>
					</a>
					<i data-parent="#accordion" class="panel-question fa fa-chevron-down pull-right" aria-hidden="true"></i>
				</h4>
			</div>
			<div class="panel-collapse collapse panel-answer">
				<div class="panel-body">
				
					<?php if($q['answers']): foreach ($q['answers'] as $a) :?>
						<?php 
    						$by = '';
    						$userProfile = $this->user->getUserProfile($a['user_id']);
    						if($a['anonymous'] != 1) { $by .="by @ ". $userProfile->username; }
    						
//     						$by .=" @ ". DateTime::createFromFormat('D', $a['date_created']);
						
						?>
						<p><?php echo $by;?>
						</p>
						<p><?php echo $a['answer'];?></p>
						
					<?php endforeach; else : ?>
						<p>No answers yet</p>
					<?php endif;?>
					
					<div class="pull-right mar-t-10"><a class="new-post">Post your reply</a></div>
					<div class="clearfix"></div>
					<div class="faq-answer-div collapse">
						<h2>Post Your Answer Here</h2>
						<div id="new-post" class="services_text"> 
							<form name="" action="<?php echo base_url('faq/post-answer')?>" method="post">
							<textarea  class="classy-editor" name="question-answer" placeholder="Question Description"></textarea>
							<input type="hidden" name="faq-question-id" value="<?php echo $q['id'];?>"/>
							<div class="checkboobmain">
								<input type="checkbox" name="anonymous" value="1"/> <label>Post as Anonymous</label>
							</div>
							<div class="field buttons">
								<button type="submit" name="btn-submit-question" class="field button" >Post Answer</button>
							</div>
							</form> 
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $i++; endforeach; endif;?>
		</div>
	</div>
</div>

<!-- Script to open accordion -->
<script>
$('.panel-question').on('click', function(e){
	$(this).parents('.panel-heading').siblings('.panel-answer').toggle('in');
});

$('.new-post').on('click', function(e){
	console.log("hello");
	$(this).parents('.mar-t-10').siblings('.faq-answer-div').addClass('in');
});
</script>