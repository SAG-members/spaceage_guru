<h2>Registration</h2>
<div class="quesmain">
	<div class="idealsteps-container"> 
		<form id="registration" method="post" action="<?php base_url('index.php/signup')?>" novalidate autocomplete="off" class="idealforms">
			<div class="idealsteps-wrap">
				<!-- Step 1 -->

				<section class="idealsteps-step" id="step-1">
					<h2>Select the country where you desire to use the program</h2>
					
					<select name="country">
						<option value="0">You may change the selected country at any given time</option>
						<?php foreach ($countries as $country) :
						$class = "";
						if($country['flag']) $class = " gold";						
						?>																
						<option class="country<?php echo $class?>" value="<?php echo $country['id'];?>"><?php echo $country['name']?></option>
						<?php endforeach; ?>
					</select>
					
					<!-- <input name="first-name" placeholder="First Name" class="password" type="text">
                    <input name="last-name" placeholder="Last Name" class=" password" type="text">
                    <input name="email-id" placeholder="Email ID" class="password" type="email"> -->
                    
					<div class="checkboobmain">
						<input type="checkbox" id="age-flag" name="age-flag" required/> <label>I agree I'm 18 years
							old</label>
					</div>
									
					<div class="field buttons">
						<label class="main">&nbsp;</label>
						<button type="button" id="step-1-next" class="next">Next &raquo;</button>
					</div>
				</section>

				<!-- Step 2 -->

				<section class="idealsteps-step" id="step-2">
					<div class="hscroll">
					<?php echo $tandc;?>
					
					</div>
					<div class="checkboobmain">
						<input name="terms-flag" type="checkbox" name="terms-flag" id="terms-flag" /> <label>Accept all terms</label>
					</div>
					<div class="field buttons">
						<label class="main">&nbsp;</label>
						<button type="button" class="prev">&laquo; Prev</button>
						<button type="button" id="step-2-next" class="next">Next &raquo;</button>
					</div>
				</section>

				<!-- Step 3 -->

				<section class="idealsteps-step" id="step-3">
					<h3>1. You’re Level</h3>
					<div class="checkboobmain">
						<input type="checkbox" id="a" name="question1" class="question1" value="a"/> <label class="checkbox-title">Proactive</label>
						<p>Person of Action</p>
						<p>Just doing it without too much of thinking</p>
						<p>Using short and crisp sentences</p>
					</div>
					<div class="checkboobmain">
						<input type="checkbox" id="b" name="question1" class="question1" value="b"/> <label class="checkbox-title">Reactive</label>
						<p>Trying to do stuff, but waiting for something</p>
						<p>Thinking about it</p>
						<p>Like to think that could do it, but what happens then</p>
					</div>
					<div class="field buttons">
						<label class="main">&nbsp;</label>
						<button type="button" class="prev">&laquo; Prev</button>
						<button type="button" id="step-3-next" class="next">Next &raquo;</button>
					</div>
				</section>

				<!-- Step 4 -->

				<section class="idealsteps-step" id="step-4">
					<h3>2. What do you want in your free time?</h3>
					<textarea name="question2" cols="" rows="" placeholder="Write here"></textarea>
					<h3>3. Why is above important for you?</h3>
					<textarea name="question3" cols="" rows="" placeholder="Write here"></textarea>
					<div class="field buttons">
						<label class="main">&nbsp;</label>
						<button type="button" class="prev">&laquo; Prev</button>
						<button type="button" id="step-4-next" class="next">Next &raquo;</button>
					</div>
				</section>

				<!-- Step 5 -->

				<section class="idealsteps-step" id="step-5">
					<h3 id="heading_q_4">
						4. Why is statement Criteria important for you? </h3>
						<input type="hidden" name="hidden-question-4" value="Why is statement Criteria important for you?"/>
					<textarea name="question4" cols="" rows="" placeholder="Write here"></textarea>
					<h3>
						5. Why is above statement important for you?
					</h3>
					<textarea name="question5" cols="" rows="" placeholder="Write here"></textarea>
					<div class="field buttons">
						<label class="main">&nbsp;</label>
						<button type="button" class="prev">&laquo; Prev</button>
						<button type="button" id="step-5-next" class="next">Next &raquo;</button>
					</div>
				</section>

				<!-- Step 6 -->

				<section class="idealsteps-step" id="step-6">
					<h3>6. How do you know that you have enjoyed yourself at your free
						time</h3>
					<div class="checkboobmain">
						<input type="checkbox" name="question6" id="internal-flag" class="question6" name="internal-flag" value="a"/> <label class="checkbox-title">Internal</label>
						<p>Knows within self</p>
						<p>Feels it</p>
					</div>
					<div class="checkboobmain">
						<input type="checkbox" name="question6" id="external-flag" class="question6" name="external-flag" value="b"/> <label class="checkbox-title">External
						</label>
						<p>Told by others</p>
						<p>Facts and figures</p>
					</div>
					<h3>7. What is your favorite free time activity?</h3>
					<textarea name="question7" cols="" rows="" placeholder="Write here"></textarea>
					<div class="field buttons">
						<label class="main">&nbsp;</label>
						<button type="button" class="prev">&laquo; Prev</button>
						<button type="button" id="step-6-next" class="next">Next &raquo;</button>
					</div>
				</section>

				<!-- Step 7 -->

				<section class="idealsteps-step" id="step-7">
					<h3>8. Think why did you choose your current favorite free time
						activity?</h3>
					<div class="checkboobmain">
						<input type="checkbox" name="question8" id="procedures-flag" class="question8" value="a"/> <label class="checkbox-title">Procedures</label>
						<p>Story</p>
						<p>How and necessity</p>
						<p>Didn´t choose</p>
					</div>
					<div class="checkboobmain">
						<input type="checkbox" name="question8" id="options-flag" class="question8" value="b"/> <label class="checkbox-title">Options
						</label>
						<p>Criteria</p>
						<p>Choice</p>
						<p>Possibilities and variety</p>
					</div>
					<h3>9. What is the relationship with your free time activity
						between last year and this year?</h3>
					<div class="checkboobmain">
						<input name="question9" type="radio" id="sameness-flag" class="question9" value="a"/> <label class="checkbox-title">Sameness
						</label>
						<p>Same</p>
						<p>No change</p>
					</div>
					<div class="checkboobmain">
						<input name="question9" type="radio" id="sameness-flag" class="question9" value="b"/> <label class="checkbox-title">Sameness with exception
						</label>
						<p>More</p>
						<p>Better</p>
						<p>Comparisons</p>
					</div>
					<div class="checkboobmain">
						<input name="question9" type="radio" id="difference-flag" class="question9" value="c"/> <label class="checkbox-title">Difference
						</label>
						<p>Change</p>
						<p>New</p>
						<p>Unique</p>
					</div>
					<div class="checkboobmain">
						<input name="question9" type="radio" id="difference-flag" class="question9" value="d"/> <label class="checkbox-title">Sameness with difference and exception
						</label>
						<p>New and Comparisons</p>
					</div>
					<div class="field buttons">
						<label class="main">&nbsp;</label>
						<button type="button" class="prev">&laquo; Prev</button>
						<button type="button" id="step-7-next" class="next">Next &raquo;</button>
					</div>
				</section>

				<!-- Step 8 -->

				<section class="idealsteps-step" id="step-8">
					<h3>10. Please tell about a free time situation that was
						challenging?</h3>
					<textarea name="question10" cols="" rows="" placeholder="Write here"></textarea>
					<h3>11. How did you cope with this challenging situation?</h3>
					<textarea name="question11" cols="" rows="" placeholder="Write here"></textarea>
					<div class="field buttons">
						<label class="main">&nbsp;</label>
						<button type="button" class="prev">&laquo; Prev</button>
						<button type="button" id="step-8-next" class="next">Next &raquo;</button>
					</div>
				</section>

				<!-- Step 9 -->

				<section class="idealsteps-step" id="step-9">
					<h3 id="heading_q_12">12. Think about a free time situation that was Criteria ?</h3>
					<input type="hidden" name="hidden-question-12" value="Think about a free time situation that was Criteria?"/>
					<div class="checkboobmain">
						<input name="question12" type="checkbox" id="free-time-activity-flag" class="question12" value="a"/> <label class="checkbox-title">Feeling</label>
						<p>You go in and stays in feelings</p>
					</div>
					<div class="checkboobmain">
						<input name="question12" type="checkbox" id="free-time-activity-option-flag" class="question12" value="b"/> <label class="checkbox-title">Choice</label>
						<p>You go in and out of feelings</p>
					</div>
					<div class="checkboobmain">
						<input name="question12" type="checkbox" id="free-time-activity-option-flag" class="question12" value="c"/> <label class="checkbox-title">Thinking</label>
						<p>You don´t go in to feelings or hide and block them</p>
					</div>
					<h3 id="heading_q_13">13. What did you like about the situation that was Criteria ?</h3>
					<input type="hidden" name="hidden-question-13" value="What did you like about the situation that was Criteria?"/>
					<div class="checkboobmain">
						<input name="question13" type="checkbox" id="last-year-activity" class="question13" value="a"/> <label class="checkbox-title">Person</label>
						<p>People</p>
						<p>Feelings</p>
						<p>Reactions</p>
					</div>
					<div class="checkboobmain">
						<input name="question13" type="checkbox" id="last-year-activity-sameness" class="question13" value="b"/> <label class="checkbox-title">Thing</label>
						<p>Tool</p>
						<p>Tasks</p>
						<p>Results</p>
					</div>
					<div class="field buttons">
						<label class="main">&nbsp;</label>
						<button type="button" class="prev">&laquo; Prev</button>
						<button type="button" id="step-9-next" class="next">Next &raquo;</button>
					</div>
				</section>

				<!-- Step 10 -->

				<section class="idealsteps-step" id="step-10">
					<h3>14. What is a good way for you to increase your enjoyment at your free time ?</h3>
					<div class="checkboobmain">
						<input name="question14" type="radio" id="last-year-activity-sameness" class="question14" value="a"/> <label class="checkbox-title">My</label>
						<p>My rules for me</p>
					</div>
					<div class="checkboobmain">
						<input name="question14" type="radio" id="last-year-activity-sameness" class="question14" value="b"/> <label class="checkbox-title">No</label>
						<p>No rules for me</p>
					</div>
					<h3>15. What is a good way for someone else to increase their enjoyment at their free time ?</h3>
					<div class="checkboobmain">
						<input name="question15" type="radio" id="last-year-activity-sameness" class="question15" value="a"/> <label class="checkbox-title">My</label>
						<p>My rules for you</p>
					</div>
					<div class="checkboobmain">
						<input name="question15" type="radio" id="last-year-activity-sameness" class="question15" value="b"/> <label class="checkbox-title">No</label>
						<p>Who cares</p>
					</div>
					<div class="checkboobmain">
						<input name="question15" type="radio" id="last-year-activity-sameness" class="question15" value="c"/> <label class="checkbox-title">You</label>
						<p>Your rules for you</p>
					</div>
					<div class="field buttons">
						<label class="main">&nbsp;</label>
						<button type="button" class="prev">&laquo; Prev</button>
						<button type="button" id="step-10-next" class="next">Next &raquo;</button>
					</div>
				</section>

				<!-- Step 11 -->

				<section class="idealsteps-step" id="step-11">
					<h3>16. How do you know your friends are your friends ?</h3>
					<div class="checkboobmain">
						<input name="question16" type="checkbox" class="question16" id="feeling-flag" value="a"/> <label class="checkbox-title">By seeing it
						</label>
					</div>
					<div class="checkboobmain">
						<input name="question16" type="checkbox" class="question16" id="choice-flag" value="b"/> <label class="checkbox-title">By hearing it
						</label>
					</div>
					<div class="checkboobmain">
						<input name="question16" type="checkbox" class="question16" id="thinking-flag" value="c"/> <label class="checkbox-title">By reading it
						</label>
					</div>
					<div class="checkboobmain">
						<input name="question16" type="checkbox" class="question16" id="thinking-flag" value="d" /> <label class="checkbox-title">By doing it
						</label>
					</div>
					<h3>17. How many times do you have to (chosen options from up) that you are convinced that your friends are good for you?</h3>
					<div class="checkboobmain">
						<input name="question17" type="checkbox" class="question17" id="person-flag" value="a"/> <label class="checkbox-title"># of examples</label>
						<p>give number <input type="text" name="question17a"  placeholder="Insert number here" autocomplete="new-password"/></p>
					</div>
					<div class="checkboobmain">
						<input name="question17" type="checkbox" class="question17" id="thing-flag" value="b"/> <label class="checkbox-title">Automatic</label>
						<p>Benefit of doubt</p>
					</div>
					<div class="checkboobmain">
						<input name="question17" type="checkbox" class="question17" id="thing-flag" value="c"/> <label class="checkbox-title">Consistent</label>
						<p>Never completely convinced</p>
					</div>
					<div class="checkboobmain">
						<input name="question17" type="checkbox" class="question17" id="thing-flag" value="d"/> <label class="checkbox-title">Period of Time</label>
						<p>Given time period, <input type="text" name="question17d" placeholder="e.g 6 days" autocomplete="confirm-password" autocomplete="off"/></p>
					</div>
					<div class="field buttons">
						<label class="main">&nbsp;</label>
						<button type="button" class="prev">&laquo; Prev</button>
						<button type="button" id="step-11-next" class="next">Next &raquo;</button>
					</div>
				</section>

				<!-- Step 12 -->

				<section class="idealsteps-step" id="step-12">
					<h3>
						U10001 (Program generates a rising user ID-number with email
						address dedicated to that User ID and an account dedicated to that
						number)<br> <br> <div class="user-email">U10001@satanclause.it</div>
					</h3>
					<input type="hidden" name="user-email"/>
					<input name="txt-password" type="password" placeholder="Please write a password" class="password">
					<input name="secret-question" type="text" placeholder="Please write personal security question" class="password">
					<input name="secret-question-answer" type="text" placeholder="Please write a personal security question answer" class="password">
					<input type="hidden" name="registration-info" value="">
					<div class="field buttons">
						<label class="main">&nbsp;</label>
						<button type="button" class="prev">&laquo; Prev</button>
						<button type="submit" name="confirm-user-registration" class="submit">Submit</button>
					</div>
				</section>
			</div>
			<span id="invalid"></span>
		</form>
	</div>
</div>



