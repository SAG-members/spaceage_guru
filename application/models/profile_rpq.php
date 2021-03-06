<div class="quesmain">
	<div class="idealsteps-container"> 
		<form id="profile_reg" method="post" action="<?php echo base_url('profile/update-rpq')?>" novalidate autocomplete="off" class="idealforms">
			<div class="idealsteps-wrap">
				<!-- Step 1 -->

				<section class="idealsteps-step" id="step-1">
					
					<?php 
						$achecked=""; $bchecked="";
						
						if($questionnaire)
						{
							$answers = explode(',', $questionnaire[0]->answer);
							foreach ($answers as $a)
							{
								switch ($a)
								{
									case 'a' : $achecked="checked"; break;
									case 'b' : $bchecked="checked"; break;
								}
							}	
						}
						
					
					?>					
					<h3>1. Your Level</h3>
					<div class="checkboobmain">
						<input type="checkbox" id="a" name="question1" class="question1" value="a" <?php echo $achecked;?>/> <label class="checkbox-title">Proactive</label>
						<p>Person of Action</p>
						<p>Just doing it without too much of thinking</p>
						<p>Using short and crisp sentences</p>
					</div>
					<div class="checkboobmain">
						<input type="checkbox" id="b" name="question1" class="question1" value="b" <?php echo $bchecked;?>/> <label class="checkbox-title">Reactive</label>
						<p>Trying to do stuff, but waiting for something</p>
						<p>Thinking about it</p>
						<p>Like to think that could do it, but what happens then</p>
					</div>
					<h3>2. What do you want in your relationship?</h3>
					<textarea name="question2" cols="" rows="" placeholder="Write here"><?php if($questionnaire) {echo $questionnaire[1]->answer;}?></textarea>
					<h3>3. Why is criteria important for you?</h3>
					<textarea name="question3" cols="" rows="" placeholder="Write here"><?php if($questionnaire) { echo $questionnaire[2]->answer;}?></textarea>								
<!-- 					<div class="field buttons"> -->
<!-- 						<label class="main">&nbsp;</label> -->
<!-- 						<button type="button" id="step-1-next" class="next">Next &raquo;</button> -->
<!-- 					</div> -->
				</section>

				<!-- Step 2 -->

				<section class="idealsteps-step" id="step-2">
					<h3 id="heading_q_4">
						4. Why is statement <?php echo $criteria = !empty($questionnaire[3]->answer) ? $questionnaire[3]->answer : 'Criteria';?> important for you? </h3>
						<input type="hidden" name="hidden-question-4" value="Why is statement Criteria important for you?"/>
					<textarea name="question4" cols="" rows="" placeholder="Write here"><?php if($questionnaire) { echo $questionnaire[3]->answer;}?></textarea>
					<h3>
						5. Why is statement Criteria important for you?
					</h3>
					<textarea name="question5" cols="" rows="" placeholder="Write here"><?php if($questionnaire) { echo $questionnaire[4]->answer;}?></textarea>
					
					<?php 
						$achecked=""; $bchecked="";
						
						if($questionnaire) 
						{
							$answers = explode(',', $questionnaire[5]->answer);
							foreach ($answers as $a)
							{
								switch ($a)
								{
									case 'a' : $achecked="checked"; break;
									case 'b' : $bchecked="checked"; break;
								}
							}
						}
					?>	
					<h3>6. How do you know that you have a good relationship</h3>
					<div class="checkboobmain">
						<input type="checkbox" name="question6" id="internal-flag" class="question6" name="internal-flag" value="a" <?php echo $achecked;?>/> <label class="checkbox-title">Internal</label>
						<p>Knows within self</p>
						<p>Feels it</p>
					</div>
					<div class="checkboobmain">
						<input type="checkbox" name="question6" id="external-flag" class="question6" name="external-flag" value="b" <?php echo $bchecked;?>/> <label class="checkbox-title">External
						</label>
						<p>Told by others</p>
						<p>Facts and figures</p>
					</div>
<!-- 					<div class="field buttons"> -->
<!-- 						<label class="main">&nbsp;</label> -->
<!-- 						<button type="button" class="prev">&laquo; Prev</button> -->
<!-- 						<button type="button" id="step-2-next" class="next">Next &raquo;</button> -->
<!-- 					</div> -->
				</section>

				<!-- Step 3 -->

				<section class="idealsteps-step" id="step-3">
					<h3>7. Think why did you choose your relationship partner (or previous if no partner currently)?</h3>
					<div class="checkboobmain">
						<input type="checkbox" name="question8" id="procedures-flag" class="question8" value="a" <?php echo $achecked?>/> <label class="checkbox-title">Procedures</label>
						<p>Story</p>
						<p>How and necessity</p>
						<p>Didn´t choose</p>
					</div>
					<div class="checkboobmain">
						<input type="checkbox" name="question8" id="options-flag" class="question8" value="b" <?php echo $bchecked?>/> <label class="checkbox-title">Options
						</label>
						<p>Criteria</p>
						<p>Choice</p>
						<p>Possibilities and variety</p>
					</div>
					<?php
					 				
						$achecked=""; $bchecked=""; $cchecked=""; $dchecked="";
						
						if($questionnaire) 
						{
							$answers = explode(',', $questionnaire[8]->answer);
							foreach ($answers as $a)
							{
								switch ($a)
								{
									case 'a' : $achecked="checked"; break;
									case 'b' : $bchecked="checked"; break;
									case 'c' : $cchecked="checked"; break;
									case 'd' : $dchecked="checked"; break;	
								}
							}
						}
						
						
					?>	
					<h3>8. What is the relationship with your partner between last year and this year??</h3>
					<div class="checkboobmain">
						<input name="question9" type="radio" id="sameness-flag" class="question9" value="a" <?php echo $achecked;?>/> <label class="checkbox-title">Sameness
						</label>
						<p>Same</p>
						<p>No change</p>
					</div>
					<div class="checkboobmain">
						<input name="question9" type="radio" id="sameness-flag" class="question9" value="b" <?php echo $bchecked;?>/> <label class="checkbox-title">Sameness with exception
						</label>
						<p>More</p>
						<p>Better</p>
						<p>Comparisons</p>
					</div>
					<div class="checkboobmain">
						<input name="question9" type="radio" id="difference-flag" class="question9" value="c" <?php echo $cchecked;?>/> <label class="checkbox-title">Difference
						</label>
						<p>Change</p>
						<p>New</p>
						<p>Unique</p>
					</div>
					<div class="checkboobmain">
						<input name="question9" type="radio" id="difference-flag" class="question9" value="d" <?php echo $dchecked;?>/> <label class="checkbox-title">Sameness with difference and exception
						</label>
						<p>New and Comparisons</p>
					</div>
<!-- 					<div class="field buttons"> -->
<!-- 						<label class="main">&nbsp;</label> -->
<!-- 						<button type="button" class="prev">&laquo; Prev</button> -->
<!-- 						<button type="button" id="step-3-next" class="next">Next &raquo;</button> -->
<!-- 					</div> -->

					<h3>9. Please tell about a challenge you faced while being in a relationship</h3>	
					<textarea name="question10" cols="" rows="" placeholder="Write here"><?php if($questionnaire) { echo $questionnaire[9]->answer; }?></textarea>
				</section>

				<!-- Step 4 -->

				<section class="idealsteps-step" id="step-4">
					<h3>10. How did you get true with this challenging situation?</h3>	
					<textarea name="question10" cols="" rows="" placeholder="Write here"><?php if($questionnaire) { echo $questionnaire[9]->answer; }?></textarea>
					<?php
						$achecked=""; $bchecked=""; $cchecked="";
						
						if($questionnaire) 
						{
							$answers = explode(',', $questionnaire[11]->answer);
							foreach ($answers as $a)
							{
								switch ($a)
								{
									case 'a' : $achecked="checked"; break;
									case 'b' : $bchecked="checked"; break;
									case 'c' : $cchecked="checked"; break;
								}
							}
						}
						
					?>	
					
					<h3 id="heading_q_12">11. Think about a relationship situation that was <?php echo $criteria = !empty($questionnaire[4]->answer) ? $questionnaire[4]->answer : 'Criteria'; ?> ?</h3>
					<input type="hidden" name="hidden-question-11" value="Think about a relationship situation that was “Criteria” ?"/>
					<div class="checkboobmain">
						<input name="question12" type="checkbox" id="free-time-activity-flag" class="question12" value="a" <?php echo $achecked;?>/> <label class="checkbox-title">Feeling,</label>
						<p>You go in and stays in feelings</p>
					</div>
					<div class="checkboobmain">
						<input name="question12" type="checkbox" id="free-time-activity-option-flag" class="question12" value="b" <?php echo $bchecked;?>/> <label class="checkbox-title">Choice</label>
						<p>You go in and out of feelings</p>
					</div>
					<div class="checkboobmain">
						<input name="question12" type="checkbox" id="free-time-activity-option-flag" class="question12" value="c" <?php echo $cchecked;?>/> <label class="checkbox-title">Thinking,</label>
						<p>You don´t go in to feelings or hide and block them</p>
					</div>
					
					<?php 
						
						$achecked=""; $bchecked=""; 
						
						if($questionnaire) 
						{
							$answers = explode(',', $questionnaire[12]->answer);
							foreach ($answers as $a)
							{
								switch ($a)
								{
									case 'a' : $achecked="checked"; break;
									case 'b' : $bchecked="checked"; break;
								}
							}
						}						
					?>	
					<h3 id="heading_q_13">12. What did you like about the situation that was <?php echo $criteria = !empty($questionnaire[3]->answer) ? $questionnaire[3]->answer : 'Criteria'; ?> ?</h3>
					<input type="hidden" name="hidden-question-12" value="What did you like about the situation that was Criteria?"/>
					<div class="checkboobmain">
						<input name="question13" type="checkbox" id="last-year-activity" class="question13" value="a" <?php echo $achecked;?>/> <label class="checkbox-title">Person</label>
						<p>People</p>
						<p>Feelings</p>
						<p>Reactions</p>
					</div>
					<div class="checkboobmain">
						<input name="question13" type="checkbox" id="last-year-activity-sameness" class="question13" value="b" <?php echo $bchecked;?>/> <label class="checkbox-title">Thing</label>
						<p>Tool</p>
						<p>Tasks</p>
						<p>Results</p>
					</div>
<!-- 					<div class="field buttons"> -->
<!-- 						<label class="main">&nbsp;</label> -->
<!-- 						<button type="button" class="prev">&laquo; Prev</button> -->
<!-- 						<button type="button" id="step-4-next" class="next">Next &raquo;</button> -->
<!-- 					</div> -->
				</section>

				<!-- Step 5 -->
				<?php 
					$achecked=""; $bchecked="";
					
					if($questionnaire) 
					{
						$answers = explode(',', $questionnaire[13]->answer);
						foreach ($answers as $a)
						{
							switch ($a)
							{
								case 'a' : $achecked="checked"; break;
								case 'b' : $bchecked="checked"; break;
							}
						}
					}
						
				?>	
				<section class="idealsteps-step" id="step-5">
					<h3>13. What is a good way for you to increase your your success in your relationship? </h3>
					<div class="checkboobmain">
						<input name="question14" type="radio" id="last-year-activity-sameness" class="question14" value="a" <?php echo $achecked?>/> <!-- <label class="checkbox-title">My</label>-->
						<p>My rules for me</p>
					</div>
					<div class="checkboobmain">
						<input name="question14" type="radio" id="last-year-activity-sameness" class="question14" value="b" <?php echo $bchecked?>/> <!-- <label class="checkbox-title">No</label>-->
						<p>No rules for me</p>
					</div>
					<?php 
						$achecked=""; $bchecked=""; $cchecked="";
						
						if($questionnaire) 
						{
							$answers = explode(',', $questionnaire[14]->answer);
							foreach ($answers as $a)
							{
								switch ($a)
								{
									case 'a' : $achecked="checked"; break;
									case 'b' : $bchecked="checked"; break;
									case 'c' : $cchecked="checked"; break;
								}
							}
						}	
					
					?>	
					<h3>14. 14. What is a good way for someone else equal to you to increase their success in their relationship?</h3>
					<div class="checkboobmain">
						<input name="question15" type="radio" id="last-year-activity-sameness" class="question15" value="a" <?php echo $achecked;?>/> <!-- <label class="checkbox-title">My</label> -->
						<p>My rules for you</p>
					</div>
					<div class="checkboobmain">
						<input name="question15" type="radio" id="last-year-activity-sameness" class="question15" value="b" <?php echo $bchecked;?>/> <!-- <label class="checkbox-title">No</label> -->
						<p>Who cares</p>
					</div>
					<div class="checkboobmain">
						<input name="question15" type="radio" id="last-year-activity-sameness" class="question15" value="c" <?php echo $cchecked;?>/> <!-- <label class="checkbox-title">You</label> -->
						<p>Your rules for you</p>
					</div>
<!-- 					<div class="field buttons"> -->
<!-- 						<label class="main">&nbsp;</label> -->
<!-- 						<button type="button" class="prev">&laquo; Prev</button> -->
<!-- 						<button type="button" id="step-5-next" class="next">Next &raquo;</button> -->
<!-- 					</div> -->
				</section>

				<!-- Step 6 -->
				<?php 
					$as = ''; $bs = ''; $cs = ''; $ds = '';
					$achecked=""; $bchecked=""; $cchecked=""; $dchecked="";
					
					$q17 = 'How many times do you have to';
					
					if($questionnaire) 
					{
						$answers = explode(',', $questionnaire[15]->answer);
						foreach ($answers as $a)
						{
							switch ($a)
							{
								case 'a' : $achecked="checked"; $as .= ' see it'; break;
								case 'b' : $bchecked="checked"; $bs = $as != '' ? ' and hear it' : ' hear it'; break;
								case 'c' : $cchecked="checked"; $cs .= $as != '' ? ' and read it' : $bs != '' ? ' and read it' : ' read it'; break;
								case 'd' : $dchecked="checked"; $ds .= $as != '' ? ' and do it' : $bs != '' ? ' and do it' : $cs != '' ? ' and do it' : ' do it'; break;	
							}
						}
					}
					
					$q17 .=$as .''.$bs.''.$cs.''.$ds.' that you are convinced that your friends are good for you?';
						
						
				?>	
				<section class="idealsteps-step" id="step-6">
					<h3>15. How do you know your friend is trustworthy?</h3>
						<p>You can choose multiple answers</p>
					<div class="checkboobmain">
						<input name="question16" type="checkbox" class="question16" id="feeling-flag" value="a" <?php echo $achecked;?>/> <label class="checkbox-title">By seeing it
						</label>
					</div>
					<div class="checkboobmain">
						<input name="question16" type="checkbox" class="question16" id="choice-flag" value="b" <?php echo $bchecked;?>/> <label class="checkbox-title">By hearing it
						</label>
					</div>
					<div class="checkboobmain">
						<input name="question16" type="checkbox" class="question16" id="thinking-flag" value="c" <?php echo $cchecked;?>/> <label class="checkbox-title">By reading it
						</label>
					</div>
					<div class="checkboobmain">
						<input name="question16" type="checkbox" class="question16" id="thinking-flag" value="d" <?php echo $dchecked;?>/> <label class="checkbox-title">By doing it
						</label>
					</div>
					<?php 
						$achecked=""; $bchecked=""; $cchecked=""; $dchecked="";
						$ans = ""; $ans1 =""; $ans2 ="";
												
						if($questionnaire) 
						{
							$answers = explode(',', $questionnaire[16]->answer);
							foreach ($answers as $a)
							{
								switch ($a)
								{
									case 'a' : $achecked="checked"; break;
									case 'b' : $bchecked="checked"; break;
									case 'c' : $cchecked="checked"; break;
									case 'd' : $dchecked="checked"; break;
								}
							}
							
							$alphas = array('a','b','c','d');
							
							$numArray =  array();
							
							foreach ($alphas as $a) { if (($key = array_search($a, $answers)) !== false) { unset($answers[$key]); } }
							
							foreach ($answers as $a){ $numArray[] = $a; }
							
							
							if(!empty($numArray))
							{
								$arrCount = count($numArray);
								if($arrCount > 1)
								{
									$ans1 = $numArray[0];
									$ans2 = $numArray[1];
								}
								$ans1 = $numArray[0];
							}
						}
						
						
							
					?>	
					<h3 id="question_number_17">16. How many times do you have to (chosen options from up) that you are convinced that your friends are good for you? </h3>
					<!-- <h3 id="question_number_17">17. <?php //echo $q17 = $q17 != '' ? $q17 : 'chosen options from up'?></h3> -->
					<div class="checkboobmain">
						<input name="question17" type="checkbox" class="question17" id="person-flag" value="a" <?php echo $achecked;?>/> <label class="checkbox-title"># of examples</label>
						<p>give number <input type="text" name="question17a"  class="password1111" placeholder="Insert number here" value="<?php echo $ans1;?>" autocomplete="new-password"/></p>
					</div>
					<div class="checkboobmain">
						<input name="question17" type="checkbox" class="question17" id="thing-flag" value="b" <?php echo $bchecked;?>/> <label class="checkbox-title">Automatic</label>
						<p>Benefit of doubt</p>
						<p>Instant you just know it</p>
					</div>
					<div class="checkboobmain">
						<input name="question17" type="checkbox" class="question17" id="thing-flag" value="c" <?php echo $cchecked;?>/> <label class="checkbox-title">Consistent</label>
						<p>Never completely convinced</p>
					</div>
					<div class="checkboobmain">
						<input name="question17" type="checkbox" class="question17" id="thing-flag" value="d" <?php echo $dchecked;?>/> <label class="checkbox-title">Period of Time</label>
						<p>Given time period, <input type="text" class="password1111" name="question17d" placeholder="e.g 6 days" autocomplete="confirm-password" autocomplete="off" value="<?php echo $ans2;?>"/></p>
					</div>
					<div class="field buttons">
						<label class="main">&nbsp;</label>
<!-- 						<button type="button" class="prev">&laquo; Prev</button> -->
						<button type="button" name="confirm-user-questionnaire-update" class="submit">Update</button>
					</div>
				</section>
			</div>
			<span id="invalid"></span>
		</form>
	</div>
</div>


<script>

$('textarea[name="question3"]').on('keyup', function(){

	var headingq4 = $('input[type="hidden"][name="hidden-question-4"]').val();
	$('#heading_q_4').html('4. '+headingq4.replace('Criteria', $(this).val()));
});

$('textarea[name="question5"]').on('keyup', function(){

	var headingq5 = $('input[type="hidden"][name="hidden-question-5"]').val();
	$('#heading_q_12').html('12. '+headingq5.replace('Criteria', $(this).val()));
	$('#heading_q_13').html('13. '+headingq5.replace('Criteria', $(this).val()));
});


					
$('.question16').on('click', function(e){

	
	as = ''; bs = ''; cs = ''; ds = '';
	
	$('.question16').each(function(e){
		if($(this).is(':checked'))
		{
			console.log($(this).val());
			q17 = 'How many times do you have to';				
			switch ($(this).val())
			{
				case 'a' : as += ' see it'; break;
				case 'b' : bs += as != '' ? ' and hear it' : ' hear it'; break;
				case 'c' : cs += as != '' ? ' and read it' : bs != '' ? ' and read it' : ' read it'; break;
				case 'd' : ds += as != '' ? ' and do it' : bs != '' ? ' and do it' : cs != '' ? ' and do it' : ' do it'; break;	
				
			}
			
			
			q17 += as +''+ bs+''+ cs+''+ds+' that you are convinced that your friends are good for you?';

			$('#question_number_17').html('17. '+q17);
		}
			
	});

});

</script>



