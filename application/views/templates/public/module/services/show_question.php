<h2>FAQ</h2>
<hr/>
<h2><?php echo $question;?></h2>

<div class="services_text">
<h2>Symptom Answers</h2>
<?php if(empty($answers)):?>
<p class="mar-t-10">No Answers Found</p>
<?php endif;?>

<?php if(isset($answers)): foreach ($answers as $answer):?>
<p class="blogmain"><?php echo $answer['answer'];?></p>
<?php endforeach; endif;?>
</div>
<?php if($this->session->userdata('isLoggedIn')):?>
<h2>Post Your Answer Here</h2>
<div id="new-post" class="services_text"> 
	<form name="" action="<?php echo base_url('index.php/faq/post-answer')?>" method="post">
	<textarea  class="classy-editor" name="question-answer" placeholder="Question Description"></textarea>
	<input type="hidden" name="faq-question-id" value="<?php echo $id;?>"/>
	<div class="checkboobmain">
		<input type="checkbox" name="anonymous" value="1"/> <label>Post as Anonymous</label>
	</div>
	<div class="field buttons">
		<button type="submit" name="btn-submit-question" class="field button" >Post Answer</button>
	</div>
	</form> 
</div>
<?php endif;?>



