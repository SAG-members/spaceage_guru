

<div class="quesmain">
	<div class="idealsteps-container"> 
		<form id="profile_reg" method="post" action="<?php echo base_url('profile/update-wpq')?>" novalidate autocomplete="off" class="idealforms">
			<div class="idealsteps-wrap">
				<!-- Step 1 -->
                <?php 
						$achecked=""; $bchecked="";
						
						if($wpq)
						{
							$answers = explode(',', $wpq[0]->answer); 
							foreach ($answers as $a)
							{
								switch ($a)
								{
									case 'a' : $achecked ="checked"; break;
									case 'b' : $bchecked ="checked"; break;
								}
							}	
						}
											
					?>		
				<section class="idealsteps-step" id="step-1">
					<h3>1. You’re Level</h3>
					<div class="checkboobmain">
						<input type="checkbox" id="a" name="wpq_question1" class="wpq_question1" value="a" <?php echo $achecked;?>/> <label class="checkbox-title">Proactive</label>
						<p>Person of Action</p>
						<p>Just doing it without too much of thinking</p>
						<p>Using short and crisp sentences</p>
					</div>
					<div class="checkboobmain">
						<input type="checkbox" id="b" name="wpq_question1" class="wpq_question1" value="b" <?php echo $bchecked;?>/> <label class="checkbox-title">Reactive</label>
						<p>Trying to do stuff, but waiting for something</p>
						<p>Thinking about it</p>
						<p>Like to think that could do it, but what happens then</p>
					</div>
					<h3>2. What do you want in your work?</h3>
					<textarea name="wpq_question2" cols="" rows="" placeholder="Write here"><?php if($wpq) {echo $wpq[1]->answer;}?></textarea>
					<h3 id="wpq_q_3">3. Why is that criteria important for you</h3>
					<input type="hidden" name="wpq-wpq_question-3" value="Why is statement criteria important for you?"/>
					<textarea name="wpq_question3" cols="" rows="" placeholder="Write here"><?php if($wpq) { echo $wpq[2]->answer;}?></textarea>								
<!-- 					<div class="field buttons"> -->
<!-- 						<label class="main">&nbsp;</label> -->
<!-- 						<button type="button" id="step-1-next" class="next">Next &raquo;</button> -->
<!-- 					</div> -->
				</section>

				<!-- Step 2 -->

				<section class="idealsteps-step" id="step-2">
					<h3 id="wpq_q_4">
						4. Why is statement <?php echo $criteria = !empty($wpq[3]->answer) ? $wpq[3]->answer : 'Criteria';?> important for you? </h3>
						<input type="hidden" name="wpq-wpq_question-4" value="Why is statement criteria important for you?"/>
					<textarea name="wpq_question4" cols="" rows="" placeholder="Write here"><?php if($wpq) { echo $wpq[3]->answer;}?></textarea>
					<h3 id="wpq_q_5">5. Why is statement "Criteria" important for you?</h3>
					<input type="hidden" name="wpq-wpq_question-5" value="Why is statement criteria important for you?"/>
					<textarea name="wpq_question5" cols="" rows="" placeholder="Write here"><?php if($wpq) { echo $wpq[4]->answer;}?></textarea>
					
					<?php 
						$achecked=""; $bchecked="";
						
						if($wpq) 
						{
							$answers = explode(',', $wpq[5]->answer);
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
					<h3>6. How do you know you have done good job at your work</h3>
					<div class="checkboobmain">
						<input type="checkbox" name="wpq_question6" class="wpq_question6" name="internal-flag" value="a" <?php echo $achecked;?>/> <label class="checkbox-title">Internal</label>
						<p>Knows within self</p>
						<p>Feels it</p>
					</div>
					<div class="checkboobmain">
						<input type="checkbox" name="wpq_question6" class="wpq_question6" name="external-flag" value="b" <?php echo $bchecked;?>/> <label class="checkbox-title">External
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
				<?php 
						
						$achecked=""; $bchecked=""; $cchecked=""; $dchecked="";
						
						if($wpq) 
						{
							$answers = explode(',', $wpq[6]->answer);
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
					<h3>7. Think why did you choose your current work?</h3>
					<div class="checkboobmain">
						<input type="checkbox" name="wpq_question7" class="wpq_question7" value="a" <?php echo $achecked?>/> <label class="checkbox-title">Procedures</label>
						<p>Story</p>
						<p>How and necessity</p>
						<p>Didn´t choose</p>
					</div>
					<div class="checkboobmain">
						<input type="checkbox" name="wpq_question7" class="wpq_question7" value="b" <?php echo $bchecked?>/> <label class="checkbox-title">Options
						</label>
						<p>Criteria</p>
						<p>Choice</p>
						<p>Possibilities and variety</p>
					</div>
					
					<?php 
						
						$achecked=""; $bchecked=""; $cchecked=""; $dchecked="";
						
						if($wpq) 
						{
							$answers = explode(',', $wpq[7]->answer);
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
					<h3>8. What is the relationship with your work between last year and this year?</h3>
					<div class="checkboobmain">
						<input name="wpq_question8" type="radio" class="wpq_question8" value="a" <?php echo $achecked;?>/> <label class="checkbox-title">Sameness
						</label>
						<p>Same</p>
						<p>No change</p>
					</div>
					<div class="checkboobmain">
						<input name="wpq_question8" type="radio" class="wpq_question8" value="b" <?php echo $bchecked;?>/> <label class="checkbox-title">Sameness with exception
						</label>
						<p>More</p>
						<p>Better</p>
						<p>Comparisons</p>
					</div>
					<div class="checkboobmain">
						<input name="wpq_question8" type="radio" class="wpq_question8" value="c" <?php echo $cchecked;?>/> <label class="checkbox-title">Difference
						</label>
						<p>Change</p>
						<p>New</p>
						<p>Unique</p>
					</div>
					<div class="checkboobmain">
						<input name="wpq_question8" type="radio" class="wpq_question8" value="d" <?php echo $dchecked;?>/> <label class="checkbox-title">Sameness with difference and exception
						</label>
						<p>New and Comparisons</p>
					</div>

				</section>

				<!-- Step 4 -->

				<section class="idealsteps-step" id="step-4">
					<h3>9. Please tell about a challenge you faced while working</h3>	
					<textarea name="wpq_question9" cols="" rows="" placeholder="Write here"><?php if($wpq) { echo $wpq[8]->answer; }?></textarea>
					
					<h3>10. How did you get true with this challenging situation?</h3>	
					<textarea name="wpq_question10" cols="" rows="" placeholder="Write here"><?php if($wpq) { echo $wpq[9]->answer; }?></textarea>
									
					<?php
						$achecked=""; $bchecked=""; $cchecked="";
						
						if($wpq) 
						{
							$answers = explode(',', $wpq[10]->answer);
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
					
					<h3 id="wpq_q_11">11. Think about a work situation that was “Criteria” ?</h3>
					<input type="hidden" name="wpq-wpq_question-11" value="Think about a free time situation that was criteria?"/>
					<div class="checkboobmain">
						<input name="wpq_question11" type="checkbox" class="wpq_question11" value="a" <?php echo $achecked;?>/> <label class="checkbox-title">Feeling,</label>
						<p>You go in and stays in feelings</p>
					</div>
					<div class="checkboobmain">
						<input name="wpq_question11" type="checkbox" class="wpq_question11" value="b" <?php echo $bchecked;?>/> <label class="checkbox-title">Choice</label>
						<p>You go in and out of feelings</p>
					</div>
					<div class="checkboobmain">
						<input name="wpq_question11" type="checkbox" class="wpq_question11" value="c" <?php echo $cchecked;?>/> <label class="checkbox-title">Thinking,</label>
						<p>You don´t go in to feelings or hide and block them</p>
					</div>
					
					<?php 
						
						$achecked=""; $bchecked=""; 
						
						if($wpq) 
						{
							$answers = explode(',', $wpq[11]->answer);
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
					<h3 id="wpq_q_12">12. What did you like about the situation that was “Criteria”? </h3>
					<input type="hidden" name="wpq-wpq_question-12" value="What did you like about the situation that was criteria?"/>
					<div class="checkboobmain">
						<input name="wpq_question12" type="checkbox"class="wpq_question12" value="a" <?php echo $achecked;?>/> <label class="checkbox-title">Person</label>
						<p>People</p>
						<p>Feelings</p>
						<p>Reactions</p>
					</div>
					<div class="checkboobmain">
						<input name="wpq_question12" type="checkbox" class="wpq_question12" value="b" <?php echo $bchecked;?>/> <label class="checkbox-title">Thing</label>
						<p>Tool</p>
						<p>Tasks</p>
						<p>Results</p>
					</div>
				</section>

				<!-- Step 5 -->
				<?php 
					$achecked=""; $bchecked="";
					
					if($wpq) 
					{
						$answers = explode(',', $wpq[12]->answer);
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
					<h3>13. What is a good way for you to increase your success in your work?</h3>
					<div class="checkboobmain">
						<input name="wpq_question13" type="radio" class="wpq_question13" value="a" <?php echo $achecked?>/> <!-- <label class="checkbox-title">My</label>-->
						<p>My rules for me</p>
					</div>
					<div class="checkboobmain">
						<input name="wpq_question13" type="radio" class="wpq_question13" value="b" <?php echo $bchecked?>/> <!-- <label class="checkbox-title">No</label>-->
						<p>No rules for me</p>
					</div>
					<?php 
						$achecked=""; $bchecked=""; $cchecked="";
						
						if($wpq) 
						{
							$answers = explode(',', $wpq[13]->answer);
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
					<h3>14. What is a good way for someone else equal to you to increase their success in their work? </h3>
					<div class="checkboobmain">
						<input name="wpq_question14" type="radio" class="wpq_question14" value="a" <?php echo $achecked;?>/> <!-- <label class="checkbox-title">My</label> -->
						<p>My rules for you</p>
					</div>
					<div class="checkboobmain">
						<input name="wpq_question14" type="radio" class="wpq_question14" value="b" <?php echo $bchecked;?>/> <!-- <label class="checkbox-title">No</label> -->
						<p>Who cares</p>
					</div>
					<div class="checkboobmain">
						<input name="wpq_question14" type="radio" class="wpq_question14" value="c" <?php echo $cchecked;?>/> <!-- <label class="checkbox-title">You</label> -->
						<p>Your rules for you</p>
					</div>

				</section>

				<!-- Step 6 -->
				<?php 
					$as = ''; $bs = ''; $cs = ''; $ds = '';
					$achecked=""; $bchecked=""; $cchecked=""; $dchecked="";
					
					$q16 = 'How many times do you have to';
					
					if($wpq) 
					{
						$answers = explode(',', $wpq[14]->answer);
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
					
					$q16 .=$as .''.$bs.''.$cs.''.$ds.' that you are convinced that your friends are good for you?';
						
						
				?>	
				<section class="idealsteps-step" id="step-6">
					<h3>15. How do you know your colleague has done a good job?</h3>
					<p>You can choose multiple answers</hp>
					<div class="checkboobmain">
						<input name="wpq_question15" type="checkbox" class="wpq_question15" value="a" <?php echo $achecked;?>/> <label class="checkbox-title">By seeing it
						</label>
					</div>
					<div class="checkboobmain">
						<input name="wpq_question15" type="checkbox" class="wpq_question15" value="b" <?php echo $bchecked;?>/> <label class="checkbox-title">By hearing it
						</label>
					</div>
					<div class="checkboobmain">
						<input name="wpq_question15" type="checkbox" class="wpq_question15" value="c" <?php echo $cchecked;?>/> <label class="checkbox-title">By reading it
						</label>
					</div>
					<div class="checkboobmain">
						<input name="wpq_question15" type="checkbox" class="wpq_question15" value="d" <?php echo $dchecked;?>/> <label class="checkbox-title">By doing it
						</label>
					</div>
					<?php 
						$achecked=""; $bchecked=""; $cchecked=""; $dchecked="";
						$ans = ""; $ans1 =""; $ans2 ="";
												
						if($wpq) 
						{
							$answers = explode(',', $wpq[15]->answer);
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
					<h3 id="wpq_question_number_16">16. <?php echo $q16; ?> </h3>
					<!-- <h3 id="wpq_question_number_17">17. <?php //echo $q17 = $q17 != '' ? $q17 : 'chosen options from up'?></h3> -->
					<div class="checkboobmain">
						<input name="wpq_question16" type="checkbox" class="wpq_question16" value="a" <?php echo $achecked;?>/> <label class="checkbox-title"># of examples</label>
						<p>give number <input type="text" name="wpq_question16a"  class="password1111" placeholder="Insert number here" value="<?php echo $ans1;?>" autocomplete="new-password"/></p>
					</div>
					<div class="checkboobmain">
						<input name="wpq_question16" type="checkbox" class="wpq_question16" value="b" <?php echo $bchecked;?>/> <label class="checkbox-title">Automatic</label>
						<p>Benefit of doubt</p>
						<p>Instant you just know it</p>
					</div>
					<div class="checkboobmain">
						<input name="wpq_question16" type="checkbox" class="wpq_question16" value="c" <?php echo $cchecked;?>/> <label class="checkbox-title">Consistent</label>
						<p>Never completely convinced</p>
					</div>
					<div class="checkboobmain">
						<input name="wpq_question16" type="checkbox" class="wpq_question16" value="d" <?php echo $dchecked;?>/> <label class="checkbox-title">Period of Time</label>
						<p>Given time period, <input type="text" class="password1111" name="wpq_question16d" placeholder="e.g 6 days" autocomplete="confirm-password" autocomplete="off" value="<?php echo $ans2;?>"/></p>
					</div>
					<div class="field buttons">
						<label class="main">&nbsp;</label>
<!-- 						<button type="button" class="prev">&laquo; Prev</button> -->
						<button type="button" name="confirm-user-wpq_questionnaire-update" class="submit">Update</button>
					</div>
				</section>
			</div>
			<span id="invalid"></span>
		</form>
	</div>
</div>


<script>

$('textarea[name="wpq_question2"]').on('keyup', function(){
	var headingq3 = $('input[type="hidden"][name="wpq-wpq_question-3"]').val();
	$('#wpq_q_3').html('3. '+headingq3.replace('criteria', $(this).val()));
});

$('textarea[name="wpq_question3"]').on('keyup', function(){
	var headingq4 = $('input[type="hidden"][name="wpq-wpq_question-4"]').val();
	$('#wpq_q_4').html('4. '+headingq4.replace('criteria', $(this).val()));
});

$('textarea[name="wpq_question4"]').on('keyup', function(){
	var headingq5 = $('input[type="hidden"][name="wpq-wpq_question-5"]').val();
	$('#wpq_q_5').html('5. '+headingq5.replace('criteria', $(this).val()));
});


$('textarea[name="wpq_question5"]').on('keyup', function(){
	var headingq11 = $('input[type="hidden"][name="wpq-wpq_question-11"]').val();
	var headingq12 = $('input[type="hidden"][name="wpq-wpq_question-12"]').val();

	$('#wpq_q_11').html('11. '+headingq11.replace('criteria', $(this).val()));
	$('#wpq_q_12').html('12. '+headingq12.replace('criteria', $(this).val()));
});

					
$('.wpq_question15').on('click', function(e){

	
	as = ''; bs = ''; cs = ''; ds = '';
	
	$('.wpq_question15').each(function(e){
		if($(this).is(':checked'))
		{
			q16 = 'How many times do you have to';				
			switch ($(this).val())
			{
				case 'a' : as += ' see it'; break;
				case 'b' : bs += as != '' ? ' and hear it' : ' hear it'; break;
				case 'c' : cs += as != '' ? ' and read it' : bs != '' ? ' and read it' : ' read it'; break;
				case 'd' : ds += as != '' ? ' and do it' : bs != '' ? ' and do it' : cs != '' ? ' and do it' : ' do it'; break;	
				
			}
			
			
			q16 += as +''+ bs+''+ cs+''+ds+' that you are convinced that your friends are good for you?';

			$('#wpq_question_number_16').html('16. '+q16);
		}
			
	});

});

</script>



