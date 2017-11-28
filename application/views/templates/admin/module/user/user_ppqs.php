<div class="">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2><?php echo $title;?></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="row">
						<div class="col-sm-12 post">
							<form method="post">
								<div class="row">
									<div class="col-md-6">
										<label>Where did you find about SCC?</label> 
										<input type="text" name="post-title" class="mar-b-20" " placeholder="Enter User Id of Recommendor Eg. U10001" value="" readonly />
									</div>
									<div class="col-md-6">
										<label>Select the country where you desire to use the program</label>
										<select name="country-list" class="form-control">
										<?php if($countries): foreach($countries as $c):?>
											<?php $selected=""; if($user->{User::_COUNTRY}==$c['id'])$selected="selected";?>
											<option value="<?php echo $c['id']?>" <?php echo $selected;?>><?php echo $c['name'];?></option>
										<?php endforeach; endif;?>
										</select> 
									</div>
								</div>
								<div class="x_title"></div>
								<div class="row">
									<?php 
									$achecked=""; $bchecked="";
									
									$answers = explode(',', $questionnaire[0]->answer);
									foreach ($answers as $a)
									{
										switch ($a)
										{
											case 'a' : $achecked="checked"; break;
											case 'b' : $bchecked="checked"; break;
										}
									}
								
								?>	
									<div class="col-md-6">
										<label>1. You’re Level</label>
										<div class="checkbox">
			                            	<label><input type="checkbox" <?php echo $achecked;?>> Proactive</label>
			                            	<p>Person of Action</p>
			                            	<p>Just doing it without too much of thinking</p>
			                            	<p>Using short and crisp sentences</p>
			                          	</div>
			                          	<div class="checkbox">
			                            	<label><input type="checkbox" <?php echo $bchecked;?>> Reactive</label>
			                            	<p>Trying to do stuff, but waiting for something</p>
			                            	<p>Thinking about it</p>
			                            	<p>Like to think that could do it, but what happens then</p>
			                          	</div>
									</div>
									<div class="col-md-6">
										<label>2. What do you want in your free time?</label>
										<textarea class="form-control" rows="3" cols="50"><?php echo $questionnaire[1]->answer?></textarea>
									</div>
								</div>
								<div class="x_title"></div>
								<div class="row">
									<div class="col-md-6">
										<label>3. Why is above important for you?</label>
										<textarea class="form-control" rows="3" cols="50"><?php echo $questionnaire[2]->answer?></textarea>
									</div>
									<div class="col-md-6">
										<label>4. Why is statement important for you?</label>
										<textarea class="form-control" rows="3" cols="50"><?php echo $questionnaire[3]->answer?></textarea>
									</div>
								</div>
								<div class="x_title"></div>
								<div class="row">
									<div class="col-md-6">
										<label>5. Why is above statement important for you?</label>
										<textarea class="form-control" rows="3" cols="50"><?php echo $questionnaire[4]->answer?></textarea>
									</div>
									<?php 
										$achecked=""; $bchecked="";
										
										$answers = explode(',', $questionnaire[5]->answer);
										foreach ($answers as $a)
										{
											switch ($a)
											{
												case 'a' : $achecked="checked"; break;
												case 'b' : $bchecked="checked"; break;
											}
										}
									?>	
									<div class="col-md-6">
										<label>6. How do you know that you have enjoyed yourself at your free time</label>
										<div class="checkbox">
			                            	<label><input type="checkbox" <?php echo $achecked;?>> Internal</label>
			                            	<p>Knows within self</p>
			                            	<p>Feels it</p>
			                            </div>
			                          	<div class="checkbox">
			                            	<label><input type="checkbox" <?php echo $bchecked;?>> External</label>
			                            	<p>Told by others</p>
			                            	<p>Facts and figures</p>
			                            </div>
									</div>
								</div>
								<div class="x_title"></div>
								<div class="row">
									<div class="col-md-6">
										<label>7. What is your favorite free time activity?</label>
										<textarea class="form-control" rows="3" cols="50"><?php echo $questionnaire[6]->answer?></textarea>
									</div>
									<div class="col-md-6">
										<?php
					 						$achecked=""; $bchecked="";
											
											$answers = explode(',', $questionnaire[7]->answer);
											foreach ($answers as $a)
											{
												switch ($a)
												{
													case 'a' : $achecked="checked"; break;
													case 'b' : $bchecked="checked"; break;
												}
											}
										?>	
										<label>8. Think why did you choose your current favorite free time activity?</label>
										<div class="checkbox">
			                            	<label><input type="checkbox" <?php echo $achecked;?>> Procedures</label>
			                            	<p>Story</p>
			                            	<p>How and necessity</p>
			                            	<p>Didn´t choose</p>
			                            </div>
			                          	<div class="checkbox">
			                            	<label><input type="checkbox" <?php echo $bchecked;?>> Options</label>
			                            	<p>Criteria</p>
			                            	<p>Choice</p>
			                            	<p>Possibilities and variety</p>
			                            </div>
									</div>
								</div>
								<div class="x_title"></div>
								<div class="row">
									<div class="col-md-6">
										<?php 
						
											$achecked=""; $bchecked=""; $cchecked=""; $dchecked="";
											
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
											
											
										?>	
										<label>9. What is the relationship with your free time activity between last year and this year?</label>
										<div class="radio">
			                            	<label><input type="radio" <?php echo $achecked;?>>Sameness </label>
			                            	<p>Same</p>
			                            	<p>No change</p>
			                            </div>
			                          	<div class="radio">
			                            	<label><input type="radio" <?php echo $bchecked;?>>Sameness with exception</label>
			                            	<p>More</p>
			                            	<p>Better</p>
			                            	<p>Comparisons</p>
			                            </div>
			                            <div class="radio">
			                            	<label><input type="radio" <?php echo $bchecked;?>>Difference</label>
			                            	<p>Change</p>
			                            	<p>New</p>
			                            	<p>Unique</p>
			                            </div>
			                            <div class="radio">
			                            	<label><input type="radio" <?php echo $dchecked;?>>Sameness with difference and exception</label>
			                            	<p>New and Comparisons</p>
			                            </div>
									</div>
									<div class="col-md-6">
										<label>10. Please tell about a challenge you faced while enjoying your freetime</label>
										<textarea class="form-control" rows="3" cols="50"><?php echo $questionnaire[9]->answer?></textarea>
									</div>
								</div>
								<div class="x_title"></div>
								<div class="row">
									<div class="col-md-6">
										<label>11. How did you get true with this challenging situation?</label>
										<textarea class="form-control" rows="3" cols="50"><?php echo $questionnaire[10]->answer?></textarea>	
									</div>
									<div class="col-md-6">
										<?php
											$achecked=""; $bchecked=""; $cchecked="";
											
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
											
										?>	
										<label>12. Think about a free time situation that was ?</label>
										<div class="checkbox">
			                            	<label><input type="checkbox" <?php echo $achecked;?>>Feeling, </label>
			                            	<p>You go in and stay in feelings</p>
			                            </div>
			                          	<div class="checkbox">
			                            	<label><input type="checkbox" <?php echo $bchecked;?> >Choice</label>
			                            	<p>You go in and out of feelings</p>
			                            </div>
			                            <div class="checkbox">
			                            	<label><input type="checkbox" <?php echo $cchecked;?>>Thinking,</label>
			                            	<p>You don´t go into feelings or hide and block them</p>
			                            </div>
			                        </div>
								</div>
								<div class="x_title"></div>
								<div class="row">
									<div class="col-md-6">
										<?php 
						
											$achecked=""; $bchecked=""; 
											
											$answers = explode(',', $questionnaire[12]->answer);
											foreach ($answers as $a)
											{
												switch ($a)
												{
													case 'a' : $achecked="checked"; break;
													case 'b' : $bchecked="checked"; break;
												}
											}
																
										?>	
										<label>13. What did you like about the situation that was ?</label>
										<div class="checkbox">
			                            	<label><input type="checkbox" <?php echo $achecked;?>>Person, </label>
			                            	<p>People</p>
			                            	<p>Feelings</p>
			                            	<p>Reactions</p>
			                            </div>
			                          	<div class="checkbox">
			                            	<label><input type="checkbox" <?php echo $achecked;?>>Thing</label>
			                            	<p>Tools</p>
			                            	<p>Tasks</p>
			                            	<p>Results</p>
			                            </div>	
									</div>
									<div class="col-md-6">
										<?php 
											$achecked=""; $bchecked="";
											
											$answers = explode(',', $questionnaire[13]->answer);
											foreach ($answers as $a)
											{
												switch ($a)
												{
													case 'a' : $achecked="checked"; break;
													case 'b' : $bchecked="checked"; break;
												}
											}
												
										?>	
										<label>14. What is a good way for you to increase your enjoyment at your free time ?</label>
										<div class="radio">
			                            	<label><input type="radio" <?php echo $achecked;?>></label>
			                            	<p>My rules for me</p>
			                            </div>
			                          	<div class="radio">
			                            	<label><input type="radio" <?php echo $bchecked;?>></label>
			                            	<p>No rules for me</p>
			                            </div>
			                        </div>
								</div>
								<div class="x_title"></div>
								<div class="row">
									<?php 
										$achecked=""; $bchecked=""; $cchecked="";
										
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
									
									?>	
									<div class="col-md-6">
										<label>15. What is a good way for someone else to increase their enjoyment at their free time ?</label>
										<div class="radio">
			                            	<label><input type="radio" <?php echo $achecked;?>></label>
			                            	<p>My rules for you</p>
			                            </div>
			                          	<div class="radio">
			                            	<label><input type="radio" <?php echo $bchecked;?>></label>
			                            	<p>Who cares</p>
			                            </div>
			                            <div class="radio">
			                            	<label><input type="radio" <?php echo $cchecked;?>></label>
			                            	<p>Your rules for you</p>
			                            </div>
									</div>
									<div class="col-md-6">
										<?php 
					
											$achecked=""; $bchecked=""; $cchecked=""; $dchecked="";
											
											$answers = explode(',', $questionnaire[15]->answer);
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
												
												
										?>	
										<div class="col-md-6">
											<label>16. How do you know your friends are your friends ?</label>
											<div class="radio">
				                            	<label><input type="radio" <?php echo $achecked;?>> By seeing it</label>
				                           	</div>
				                          	<div class="radio" >
				                            	<label><input type="radio" <?php echo $bchecked;?>> By hearing it </label>
				                            </div>
				                            <div class="radio" >
				                            	<label><input type="radio" <?php echo $cchecked;?>> By reading it </label>
				                            </div>
				                            <div class="radio" >
				                            	<label><input type="radio" <?php echo $dchecked;?>> By doing it/feeling it  </label>
				                            </div>
			                       	 	</div>
									</div>
			                    </div>
								<div class="x_title"></div>
								<div class="row">
									<?php 
										$achecked=""; $bchecked=""; $cchecked=""; $dchecked="";
											
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
											
									?>	
									<div class="col-md-6">
										<label>17. How many times do you have to (chosen options from up) that you are convinced that your friends are good for you?</label>
										<div class="checkbox">
			                            	<label><input type="checkbox" <?php echo $achecked;?>># of examples</label>
			                            	<p>give number<input type="text"/></p>
			                            </div>
			                          	<div class="checkbox">
			                            	<label><input type="checkbox" <?php echo $bchecked;?>>Automatic</label>
			                            	<p>Benefit of doubt</p>
			                            	<p>Instant you just know it</p>
			                            </div>
			                            <div class="checkbox">
			                            	<label><input type="checkbox" <?php echo $cchecked;?>>Consistent</label>
			                            	<p>Never completely convinced</p>
			                            </div>
			                            <div class="checkbox">
			                            	<label><input type="checkbox" <?php echo $dchecked;?>>Period of Time</label>
			                            	<p>Given time period, <input type="text"/></p>
			                            </div>
									</div>
									<div class="col-md-6">
										
									</div>
			                    </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>