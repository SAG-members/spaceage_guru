<div class="row pss_div">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2><?php echo $title;?></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="">
					<a class="btn btn-primary btn-sm pull-right add_answer" data-toggle="modal" data-target="#add_faq_answer" >Add Answer</a>
					<div class="clearfix"></div>
				</div>
				<form id="div_to_clone" action="<?php echo base_url('admin/process/faq/'.$faqs['id'])?>" method="post">
    				<div class="form-group">
    					<textarea class="classy-editor" name="faq_question" placeholder="Question Description"><?php echo $faqs['question']; ?></textarea>	
    				</div>
    				<div class="form-group">
    					<input name="anonymous" value="1" type="checkbox" <?php echo $a = $faqs['anonymous'] ? 'checked':''?>> <label>Post as Anonymous</label>
    				</div>
    				<div class="modal-footer">
        				<button type="submit" class="btn btn-success" name="faq_update" value="1" data-dismiss="modal">Update Faq</button>
        				<button type="submit" class="btn btn-danger" name="faq_delete" value="1" data-dismiss="modal">Delete</button>
        			</div>
    			</form>
			</div>
			
		</div>
	</div>
</div>

<div class="row pss_div answers_div">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>FAQ Answers</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<?php if($faqsAnswers): foreach ($faqsAnswers as $f): 
				    $userProfile = $this->user->getUserProfile($f['user_id']);
				?>
				<form method="post" action="<?php echo base_url('admin/process/faq-answer/'.$f['id'])?>">
				<div class="form-group">
					<textarea name="faq-question-answer" placeholder="Question Description" style="width: 100%" rows="10"><?php echo strip_tags($f['answer']); ?></textarea>	
				</div>
				<div class="form-group row">
					<div class="col-md-6">
						<label>Answered By : <?php echo $userProfile['user-name']; ?></label>
					</div>
					<div class="col-md-6">
						<input name="anonymous" value="1" type="checkbox" <?php echo $a = $f['anonymous'] ? 'checked':''?>> <label>Post as Anonymous</label>
					</div>
					<div class="clearfix"></div>
					
				</div>
				<div class="modal-footer">
    				<button type="submit" class="btn btn-success" name="faq_answer_update" value="1" data-dismiss="modal">Update Answer</button>
    				<button type="submit" class="btn btn-danger" name="faq_answer_delete" value="1" data-dismiss="modal">Delete</button>
    			</div>
    			<input type="hidden" name="hidden_id" value="<?php echo $f['id']?>"/>
    			</form>
    			<?php endforeach; endif;?>
			</div>
		</div>
	</div>
</div>


<!--  Add New Faq Data Modal Start Here -->
<div id="add_faq_answer" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Faq Answer</h4>
			</div>
			<form action="<?php echo base_url('admin/faq/add-answer'); ?>" method="post">
    			<div class="modal-body">
    				<div class="form-group">
    					<textarea  style="width: 100%" rows="8" name="faq-answer"></textarea>	
    				</div>
    				<div class="form-group">
    					<input name="anonymous" value="1" type="checkbox"> <label>Post as Anonymous</label>
    					<input type="hidden" name="faq-question-id" value="<?php echo $faqs['id']; ?>"/>
    				</div>
    			</div>
    			<div class="modal-footer">
    				<button type="submit" class="btn btn-success" name="btn-confirm-add-faq-answer">Add Answer</button>
    				<button type="button" class="btn btn-danger" name="btn-confirm-cancel-faq-answer" data-dismiss="modal">Cancel</button>
    			</div>
			</form>
		</div>

	</div>
</div>

<!-- Data Modal Ends Here -->
		