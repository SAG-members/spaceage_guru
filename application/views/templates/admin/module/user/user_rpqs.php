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
									<?php 
									$achecked=""; $bchecked="";
									
									$answers = explode(',', $rpq[0]->answer);
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
										<label>2. What do you want in your relationship?</label>
										<textarea class="form-control" rows="3" cols="50"><?php echo $rpq[1]->answer?></textarea>
									</div>
								</div>
								<div class="x_title"></div>
								<div class="row">
									<div class="col-md-6">
										<label>3. Why is <?php echo $criteria = !empty($rpq[1]->answer) ? $rpq[1]->answer : 'criteria';?> important for you?</label>
										<textarea class="form-control" rows="3" cols="50"><?php echo $rpq[2]->answer?></textarea>
									</div>
									<div class="col-md-6">
										<label>4. Why is statement <?php echo $criteria = !empty($rpq[2]->answer) ? $rpq[2]->answer : 'criteria';?> important for you? </label>
										<textarea class="form-control" rows="3" cols="50"><?php echo $rpq[3]->answer?></textarea>
									</div>
								</div>
								<div class="x_title"></div>
								<div class="row">
									<div class="col-md-6">
										<label>5. Why is statement <?php echo $criteria = !empty($rpq[3]->answer) ? $rpq[3]->answer : 'criteria';?>  important for you?</label>
										<textarea class="form-control" rows="3" cols="50"><?php echo $rpq[4]->answer?></textarea>
									</div>
									<?php 
										$achecked=""; $bchecked="";
										
										$answers = explode(',', $rpq[5]->answer);
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
										<label>6. How do you know that you have a good relationship</label>
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
									<?php
					 				    $achecked=""; $bchecked=""; $cchecked=""; $dchecked="";
                    						
                    					if($rpq) 
                    					{
                    					   $answers = explode(',', $rpq[6]->answer);
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
										<label>7. Think why did you choose your relationship partner (or previous if no partner currently)?</label>
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
									<div class="col-md-6">
										<?php
					 						$achecked=""; $bchecked="";
											
											$answers = explode(',', $rpq[7]->answer);
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
										<label>8. What is the relationship with your partner between last year and this year??</label>
										<div class="checkbox">
			                            	<label><input type="radio" <?php echo $achecked;?>> Sameness</label>
			                            	<p>Same</p>
											<p>No change</p>
			                            </div>
			                          	<div class="checkbox">
			                            	<label><input type="radio" <?php echo $bchecked;?>> Sameness with exception</label>
			                            	<p>More</p>
                    						<p>Better</p>
                    						<p>Comparisons</p>
			                            </div>
			                            <div class="checkbox">
			                            	<label><input type="radio" <?php echo $cchecked;?>> Difference</label>
			                            	<p>Change</p>
                    						<p>New</p>
                    						<p>Unique</p>
                    					</div>
			                            <div class="checkbox">
			                            	<label><input type="radio" <?php echo $dchecked;?>> Sameness with difference and exception</label>
			                            	<p>New and Comparisons</p>
			                            </div>
									</div>
								</div>
								<div class="x_title"></div>
								<div class="row">
									<div class="col-md-6">										
										<label>9. Please tell about a challenge you faced while being in a relationship</label>
										<textarea name="rpq_question9" cols="50" rows="3" class="form-control" placeholder="Write here"><?php if($rpq) { echo $rpq[8]->answer; }?></textarea>
									</div>
									<div class="col-md-6">
										<label>10. How did you get true with this challenging situation?</label>
										<textarea class="form-control" rows="3" cols="50"><?php echo $rpq[9]->answer?></textarea>
									</div>
								</div>
								<div class="x_title"></div>
								<div class="row">
									<div class="col-md-6">
										<?php
											$achecked=""; $bchecked=""; $cchecked="";
											
											$answers = explode(',', $rpq[10]->answer);
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
										<label>11. Think about a relationship situation that was <?php echo $criteria = !empty($rpq[4]->answer) ? $rpq[4]->answer : 'Criteria'; ?> ?</label>
										<div class="checkbox">
			                            	<label><input type="checkbox" <?php echo $achecked;?>> Feeling</label>
			                            	<p>You go in and stays in feelings</p>
			                            </div>
			                            <div class="checkbox">
			                            	<label><input type="checkbox" <?php echo $achecked;?>> Choice</label>
			                            	<p>You go in and out of feelings</p>
			                            </div>
			                            <div class="checkbox">
			                            	<label><input type="checkbox" <?php echo $achecked;?>> Thinking</label>
			                            	<p>You don´t go in to feelings or hide and block them</p>
			                            </div>	
									</div>
									<div class="col-md-6">
										<?php
											$achecked=""; $bchecked="";
											
											$answers = explode(',', $rpq[11]->answer);
											foreach ($answers as $a)
											{
												switch ($a)
												{
													case 'a' : $achecked="checked"; break;
													case 'b' : $bchecked="checked"; break;													
												}
											}
											
										?>	
										<label>12. What did you like about the situation that was <?php echo $criteria = !empty($rpq[4]->answer) ? $rpq[3]->answer : 'Criteria'; ?> ?</label>
										<div class="checkbox">
			                            	<label><input type="checkbox" <?php echo $achecked;?>>Person, </label>
			                            	<p>People</p>
                    						<p>Feelings</p>
                    						<p>Reactions</p>
			                            </div>
			                          	<div class="checkbox">
			                            	<label><input type="checkbox" <?php echo $bchecked;?> >Thing</label>
			                            	<p>Tool</p>
                    						<p>Tasks</p>
                    						<p>Results</p>
			                            </div>			                            
			                        </div>
								</div>
								<div class="x_title"></div>
								<div class="row">
									<div class="col-md-6">
										<?php 
						
											$achecked=""; $bchecked=""; 
											
											$answers = explode(',', $rpq[12]->answer);
											foreach ($answers as $a)
											{
												switch ($a)
												{
													case 'a' : $achecked="checked"; break;
													case 'b' : $bchecked="checked"; break;
												}
											}
																
										?>	
										<label>13. What is a good way for you to increase your success in your relationship?</label>
										<div class="checkbox">
			                            	<label><input type="radio" <?php echo $achecked;?>></label>
			                            	<p>My rules for me</p>
			                            </div>
			                          	<div class="checkbox">
			                            	<label><input type="radio" <?php echo $achecked;?>></label>
			                            	<p>No rules for me</p>
			                            </div>	
									</div>
									<div class="col-md-6">
										<?php 
											$achecked=""; $bchecked=""; $cchecked="";
											
											$answers = explode(',', $rpq[13]->answer);
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
										<label>14. What is a good way for someone else equal to you to increase their success in their relationship?</label>
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
								</div>
								<div class="x_title"></div>
								<div class="row">
									<?php 
										$achecked=""; $bchecked=""; $cchecked="";
										
										$answers = explode(',', $rpq[14]->answer);
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
										<label>15. How do you know your friend is trustworthy?</label>
										<p>You can choose multiple answers</p>
										<div class="radio">
			                            	<input name="rpq_question15" type="checkbox" class="rpq_question16" value="a" <?php echo $achecked;?>/> 
			                            	<label class="checkbox-title">By seeing it </label>
			                            </div>
			                          	<div class="radio">
			                            	<input name="rpq_question15" type="checkbox" class="rpq_question16" value="b" <?php echo $bchecked;?>/> 
			                            	<label class="checkbox-title">By hearing it</label>
			                            </div>
			                            <div class="radio">
			                            	<input name="rpq_question15" type="checkbox" class="rpq_question16" value="c" <?php echo $cchecked;?>/> 
			                            	<label class="checkbox-title">By reading it</label>
			                            </div>
			                            <div class="radio">
			                            	<input name="rpq_question15" type="checkbox" class="rpq_question16" value="d" <?php echo $dchecked;?>/> 
			                            	<label class="checkbox-title">By doing it</label>
			                            </div>
									</div>
									<div class="col-md-6">
										<?php 
                        					$as = ''; $bs = ''; $cs = ''; $ds = '';
                        					$achecked=""; $bchecked=""; $cchecked=""; $dchecked="";
                        					
                        					$q16 = 'How many times do you have to';
                        					
                        					if($rpq) 
                        					{
                        						$answers = explode(',', $rpq[14]->answer);
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
                        					
                        					$achecked=""; $bchecked=""; $cchecked=""; $dchecked="";
                        					$ans = ""; $ans1 =""; $ans2 ="";
                        					
                        					if($rpq)
                        					{
                        					    $answers = explode(',', $rpq[15]->answer);
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
										
										<label>16. <?php echo $q16; ?></label>
										<div class="radio">
			                            	<input name="rpq_question16" type="checkbox" class="rpq_question16" value="a" <?php echo $achecked;?>/> <label class="checkbox-title"># of examples</label>
											<p>give number <input type="text" name="rpq_question16a"  class="password1111" placeholder="Insert number here" value="<?php echo $ans1;?>" autocomplete="new-password"/></p>
			                           	</div>
			                          	<div class="radio" >
			                            	<input name="rpq_question16" type="checkbox" class="rpq_question16" value="b" <?php echo $bchecked;?>/> <label class="checkbox-title">Automatic</label>
                    						<p>Benefit of doubt</p>
                    						<p>Instant you just know it</p>
			                            </div>
			                            <div class="radio" >
			                            	<input name="rpq_question16" type="checkbox" class="rpq_question16" value="c" <?php echo $cchecked;?>/> <label class="checkbox-title">Consistent</label>
											<p>Never completely convinced</p>
			                            </div>
			                            <div class="radio" >
			                            	<input name="rpq_question16" type="checkbox" class="rpq_question16" value="d" <?php echo $dchecked;?>/> <label class="checkbox-title">Period of Time</label>
											<p>Given time period, <input type="text" class="password1111" name="rpq_question16d" placeholder="e.g 6 days" autocomplete="confirm-password" autocomplete="off" value="<?php echo $ans2;?>"/></p>
			                            </div>			                           
			                       	 	
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