<?php 
$lockIcon = 'fa fa-lock';

if($this->session->userdata('user_id')) $lockIcon = '';

?>
<div class="rightmain">
	<ul class="right-menu-items">
		<li class="text-center menu-li-style">
    		<a href="<?php echo base_url('timeline')?>">TIMELINE</a>    		
		</li>
		<li class="text-center menu-li-style">
			<a href="<?php echo base_url('whitepaper')?>">WHITEPAPER</a>
		</li>
		<li class="text-center menu-li-style">
			
			<a class="pull-left add-pss" href="<?php echo base_url('user/dashboard#mySymptoms');?>" title="My Tasks" alt="My Tasks"><i class="fa fa-bars"></i> </a>
			<i class="pull-left <?php echo $lockIcon; ?>"></i> TASKS 
			<a class="pull-right add-pss" data-toggle="modal"
			data-target="#taskModal" title="Add New Task"
			alt="Add New Task"><i class="fa fa-plus"></i> </a>			
		</li>
		<?php if($this->session->userdata('isLoggedIn')):?>
    		<?php if($rightSideData['tasks']): ?>
    		<ul>
        		<?php foreach ($rightSideData['tasks'] as $t):?>
        			<li><?php echo "<a style='cursor:pointer'><i class='fa fa-minus'></i> ". $t->{Tasks_goals::_CONTENT} . " </a>"?></li>
        		<?php endforeach; ?>
    		</ul>
    		<?php endif;?>
		<?php endif;?>
		
		<li class="text-center menu-li-style">
			<a class="pull-left add-pss" href="<?php echo base_url('user/dashboard#mySymptoms');?>" title="My Dreams and Goals" alt="My Dreams and Goals"><i class="fa fa-bars"></i> </a>
			<i class="pull-left <?php echo $lockIcon; ?>"></i> GOALS/DREAMS
			<?php if($this->session->userdata('isLoggedIn')):?>
    		<a class="pull-right add-pss" data-toggle="modal"
    			data-target="#goalModal" title="Add Dreams and Goals"
    			alt="Add Dreams and Goals"><i class="fa fa-plus"></i> </a>
    		<?php endif;?>			
		</li>
		<?php if($this->session->userdata('isLoggedIn')):?>
    		<?php if($rightSideData['goals']): ?>
    		<ul>
        		<?php foreach ($rightSideData['goals'] as $t):?>
        			<li><?php echo "<a style='cursor:pointer'><i class='fa fa-minus'></i> ". $t->{Tasks_goals::_CONTENT} . " </a>"?></li>
        		<?php endforeach; ?>
    		</ul>
    		<?php endif;?>
    		<?php endif;?>
		<li class="text-center menu-li-style">
			<a class="pull-left add-pss" href="<?php echo base_url('user/dashboard#myProducts');?>" title="View My Data" alt="View My Data"><i class="fa fa-bars"></i> </a>
			<i class="pull-left <?php echo $lockIcon; ?>"></i> PERSONAL CHANNEL
			<a class="pull-right add-pss" href="<?php echo base_url('user/add/data');?>" title="Add Data" alt="Add Data"><i class="fa fa-plus"></i> </a>			
		</li>
		
		<li class="text-center menu-li-style"><i class="pull-left <?php echo $lockIcon; ?>"></i> COMMUNICATION</li>
		<?php 
		  $date = new DateTime();
		?>
		<?php if($this->session->userdata('isLoggedIn')):?>
			<?php if($rightSideData['communication']): foreach ($rightSideData['communication'] as $c): ?>
			
			<?php 
    			if($c->escrow_type == 2)
    			{
    			    if(! $this->escrow->get_offer_count_status($c->id, $this->session->userdata('id'), $c->user_id, $this->session->userdata('membershipLevel'))) continue;
    			    $escrowDetails = $this->escrow->get_offer_status($c->id, $this->session->userdata('id'));
    		          	    
    			    if(!empty($escrowDetails))
    			    {
    			        if($escrowDetails->status == 1) continue;
    			        if($escrowDetails->status==1 && $escrowDetails->escrow_seller_id == $this->session->userdata('id')) continue;
    			        if($escrowDetails->status==1 && $escrowDetails->escrow_buyer_id == $this->session->userdata('id')) continue;
    			        if($escrowDetails->status==3 && $escrowDetails->escrow_seller_id == $this->session->userdata('id')) continue;
    			        if($escrowDetails->status==3 && $escrowDetails->escrow_buyer_id == $this->session->userdata('id')) continue;
    			        if($escrowDetails->status==5 && $escrowDetails->escrow_seller_id == $this->session->userdata('id')) continue;
    			        if($escrowDetails->status==5 && $escrowDetails->escrow_buyer_id == $this->session->userdata('id')) continue;
    			    }
    			}
    			else
    			{
    			    if($c->user_id == $this->session->userdata('id')) continue;
    			    
    			    $escrowDetails = $this->escrow->get_offer_status($c->id);
    			    
    			    if(!empty($escrowDetails))
    			    {
    			        if($escrowDetails->status == 1) continue;
    			        if($escrowDetails->status==1 && $escrowDetails->escrow_seller_id == $this->session->userdata('id')) continue;
    			        if($escrowDetails->status==1 && $escrowDetails->escrow_buyer_id == $this->session->userdata('id')) continue;
    			        if($escrowDetails->status==3 && $escrowDetails->escrow_seller_id == $this->session->userdata('id')) continue;
    			        if($escrowDetails->status==3 && $escrowDetails->escrow_buyer_id == $this->session->userdata('id')) continue;
    			        if($escrowDetails->status==4) continue;
    			        if($escrowDetails->status==5) continue;
    			    }
    			    
    			    
    			    $escrowDetails = $this->escrow->get_offer_status($c->id, $this->session->userdata('id'));
    			    
    			    if(!empty($escrowDetails))
    			    {
    			        if($escrowDetails->status == 1) continue;
    			        if($escrowDetails->status==1 && $escrowDetails->escrow_seller_id == $this->session->userdata('id')) continue;
    			        if($escrowDetails->status==1 && $escrowDetails->escrow_buyer_id == $this->session->userdata('id')) continue;
    			        if($escrowDetails->status==3 && $escrowDetails->escrow_seller_id == $this->session->userdata('id')) continue;
    			        if($escrowDetails->status==3 && $escrowDetails->escrow_buyer_id == $this->session->userdata('id')) continue;
    			        if($escrowDetails->status==5 && $escrowDetails->escrow_seller_id == $this->session->userdata('id')) continue;
    			        if($escrowDetails->status==5 && $escrowDetails->escrow_buyer_id == $this->session->userdata('id')) continue;
    			    }
    			}			
			?>
			<div class="col-md-12 col-xs-12 widget widget_tally_box">
    			<div class="x_panel ui-ribbon-container fixed_height_390">
    				<div class="x_title">
    					<h2><?php echo str_replace('<', '', $c->title); ?></h2>
    					<div class="clearfix"></div>
    				</div>
    				<div class="x_content">
    					<h4><?php echo $c->{Library_event_comment_model::_COMMENT}?></h3>
    						<p>
    							<b>Location </b>
    						</p>
    						<p><?php echo $c->{Library_event_comment_model::_LOCATION}?></p>
    						<p>
    							<b>Price </b>
    						</p>
    						<p>&euro; <?php echo $c->{Library_event_comment_model::_PRICE}?></p>
    						<p>
    							<b>Date Time </b>
    						</p>
    						<p><?php echo $c->{Library_event_comment_model::_DATE_TIME}?></p>
    				
    				</div>
    				<div class="x_footer">
    					<input type="hidden" name="hidden_comment_id" value="<?php echo $c->{Library_event_comment_model::_ID}?>" />
    					
    					<div class="col-md-3 padding_none">
    						<button type="button" name="btn_decline" class="btn btn-danger">Decline</button>
    					</div>
    					<div class="col-md-6 padding_none">
    						<button type="button" name="btn_recommend_to_friend" data-toggle="modal" data-target="#recommend_to_friend"
    							class="btn btn-warning">Recommend to friend</button>
    					</div>
    					<div class="col-md-3 padding_none">
    						<button type="button" name="btn_yield" class="btn btn-success">Yield</button>
    					</div>
    					
    					
    				</div>
    			</div>
    		</div>
			<?php endforeach; endif; ?>	
		<?php endif; ?>
		<li class="text-center menu-li-style"><i class="pull-left <?php echo $lockIcon; ?>"></i> CHAT WITH FRIENDS</li>
		<?php if($this->session->userdata('isLoggedIn')): ?>
			<?php //echo 1; ?>
			<div id="cometchat_embed_synergy_container" style="width:100%;height:420px;max-width:100%;border:1px solid #CCCCCC;overflow:hidden;" ></div>
			<script src="<?php echo base_url('cometchat/js.php?type=core&name=embedcode'); ?>" type="text/javascript"></script>
			<script>var iframeObj = {};iframeObj.module="synergy";iframeObj.style="min-height:420px;min-width:100%;";iframeObj.width="100%";iframeObj.height="420px";iframeObj.src="<?php echo base_url('cometchat/cometchat_embedded.php')?>"; if(typeof(addEmbedIframe)=="function"){addEmbedIframe(iframeObj);}</script>
    	<?php endif; ?>		
	</ul>
</div>		



<!-- Modals to be used in multiple views -->

<!-- Add New Task Modal -->
<div id="taskModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<form method="post" action="<?php echo base_url('user/add/task')?>">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add New Task</h4>
				</div>
				<div class="modal-body">
					<textarea name="content" rows="5" class="form-control"
						placeholder="Add new Task"></textarea>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="hidden_type" value="task" /> <input
						type="hidden" name="hidden_redirect_path[]" />
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>

	</div>
</div>


<!-- Modal -->
<div id="recommend_to_friend" class="modal fade" role="dialog">
	<div class="modal-dialog" style="width:400px;">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Recommend Escrow to Friend</h4>
			</div>
			<div class="modal-body" style="overflow-y: scroll; height: 350px;">
				<table class="table table-bordered">
					<thead>
						<tr>
							<td>Name</td>
							<td>Recommend</td>
						</tr>
					</thead>
					<tbody>
    				<?php if($rightSideData['friends']): foreach ($rightSideData['friends'] as $f):?>
    				<tr>
    					<td><?php echo $f->username?></td>
    					<td class="text-center"><button data-id="<?php echo $f->id ?>" type="button" name="btn_recommend" class="btn btn-warning btn-sm">Recommend</button></td>
    					
    				</tr>
    				<?php endforeach; endif;?>
				</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>



<!-- Add New Goal Modal -->
<div id="goalModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<form method="post" action="<?php echo base_url('user/add/goal')?>">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add New Goal</h4>
				</div>
				<div class="modal-body">
					<textarea name="content" rows="5" class="form-control"
						placeholder="Add new Goal"></textarea>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="hidden_type" value="goal" /> <input
						type="hidden" name="hidden_redirect_path[]" />
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>

	</div>
</div>
<div class="clearfix"></div>



<!--  Let's Run a javascript code on run-time to get current path -->

<script type="text/javascript">
$(function(){
	$('input[type="hidden"][name="hidden_redirect_path[]"]').val(window.location.pathname);

	/* Decline Offer */
	$('button[type="button"][name="btn_decline"]').off().on('click', function(e){
		var id = $(this).parents('.x_footer').find('input[type="hidden"][name="hidden_comment_id"]').val();
		var redirectPath = window.location.href;

		var newForm = jQuery('<form>', {
	        'action': BASE_URL + 'user/decline-offer',
	        'target': '_top',
	        'method':'post'	
	    }).append(jQuery('<input>', {
	        'name': 'id',
	        'type': 'hidden',
	        'value': id,
	    })).append(jQuery('<input>', {
	        'name': 'redirect_url',
	        'type': 'hidden',
	        'value': redirectPath,
	    }));
		
		newForm.appendTo('body').submit();
	});


	/* Recommend to fried Offer */
	$('button[type="button"][name="btn_recommend_to_friend"]').off().on('click', function(e){
		console.log("Hello");
	});

	/* Yield Offer */
	$('button[type="button"][name="btn_yield"]').off().on('click', function(e){
		var id = $(this).parents('.x_footer').find('input[type="hidden"][name="hidden_comment_id"]').val();
		var redirectPath = window.location.href;

		var payload = {'comment_id':id};
		var data = {'acid':12000, 'payload':JSON.stringify(payload)};
		var url = BASE_URL+'/ajax';
		AjaxCommon.startAjaxRequest(url, data).done(function(response){
			
			if(response.aflag == 0)
			{
				$().toastmessage('showToast', {
				    text     : response.message,
				    sticky   : true,
				    position : 'top-right',
				    type     : 'error',
				    close    : function () {/*console.log("toast is closed ...");*/}
				});

				return false;
			}
			else if(response.bflag == 0)
			{
				$().toastmessage('showToast', {
				    text     : response.message,
				    sticky   : true,
				    position : 'top-right',
				    type     : 'warning',
				    close    : function () {
				    	var newForm = jQuery('<form>', {
					        'action': BASE_URL + 'user/accept-offer',
					        'target': '_top',
					        'method':'post'	
					    }).append(jQuery('<input>', {
					        'name': 'id',
					        'type': 'hidden',
					        'value': id,
					    })).append(jQuery('<input>', {
					        'name': 'redirect_url',
					        'type': 'hidden',
					        'value': redirectPath,
					    }));
						
						newForm.appendTo('body').submit();

					}
				});

				return false;
			}
			else
			{
				var newForm = jQuery('<form>', {
			        'action': BASE_URL + 'user/accept-offer',
			        'target': '_top',
			        'method':'post'	
			    }).append(jQuery('<input>', {
			        'name': 'id',
			        'type': 'hidden',
			        'value': id,
			    })).append(jQuery('<input>', {
			        'name': 'redirect_url',
			        'type': 'hidden',
			        'value': redirectPath,
			    }));
				
				newForm.appendTo('body').submit();
			}
		});
				
	});

	/* Escrow Offer */
	$('button[type="button"][name="btn_escrow"]').off().on('click', function(){
		var id = $(this).parents('.x_footer').find('input[type="hidden"][name="hidden_comment_id"]').val();
	
		var newForm = jQuery('<form>', {
	        'action': BASE_URL + 'user/escrow-offer',
	        'target': '_top',
	        'method':'post'	
	    }).append(jQuery('<input>', {
	        'name': 'id',
	        'type': 'hidden',
	        'value': id,
	    }));
		
		newForm.appendTo('body').submit();
			
	});











	

	$(document).on('click', '#accordion', function (e) {
		var $this = $(this);
		if ($this.hasClass('panel-collapsed')) {
			$this.removeClass('panel-collapsed');
			$this.parents('.chatter_box').children('.panel-body').removeClass('in');
		    
		    console.log("Reaching if block");
		} else {
			console.log("Reaching else block");
			$this.addClass('panel-collapsed');
		    $this.parents('.chatter_box').children('.panel-body').addClass('in');
		    
		}
       
    }); 

    $(document).on('click', '.chatwrap', function(e){
		var message_to_user = $(this).find('input[type="hidden"][name="hidden_message_to_user"]').val();
		var message_to_username = $(this).find('.chatname').html();

		/* Before actully showing the chat box let's get chat conversations between these 2 users */
		
		Chat.get_chat_history(message_to_user, 1);	
		
		$('.direct-chat').show();
		$('.direct-chat').children('.box-header').find('.box-title').html(message_to_username);
		$('.direct-chat').children('.box-footer').find('input[type="hidden"][name="message_to_user"]').val(message_to_user);
    });

	/* Initalise chat to get constant responses*/
	//Chat.init();
	
	/* Send Message */
	$(document).on('keypress', '.messages', function(e){

		if(message !== "" && e.which == 13)
		{
			$(this).find('.emojionearea-editor').blur();
			var message = $(this).siblings('textarea[name="message"]').val();
			var message_to_user = $(this).siblings('input[type="hidden"][name="message_to_user"]').val();
			
			$(this).find('.emojionearea-editor').html('');
	       
	       // Send the message 
	       
	       var payload = {'message':message, 'message_to_user':message_to_user};
	       var request = {'acid':1001, 'payload':JSON.stringify(payload)};
			
		   AjaxRequest.startAjax(request, BASE_URL+'chat').done(function(response){
				var html = '';
// 				response = JSON.parse(response);
				console.log(response);
				console.log(response.flag);
				if(response.flag == 1)
				{
					
					html += '<div class="direct-chat-msg">';
					html +=	'<div class="direct-chat-info clearfix">';
					html += '<span class="direct-chat-name pull-left" style="color:#000;">'+response.chats.name+'</span> <span class="direct-chat-timestamp pull-right"  style="color:#000;">'+response.chats.time+'</span>';
					html += '</div>';
					html += '<img class="direct-chat-img" src="'+BASE_URL+'/assets/uploads/avtar/'+response.chats.avatar+'">';
					html += '<div class="direct-chat-text">'+emojione.shortnameToImage(response.chats.body)+'</div>';
					html += '</div>';

					$('.direct-chat-messages').append(html);

// 					$('ul.chat-box-body').animate({scrollTop: $('ul.chat-box-body').prop("scrollHeight")}, 500);
				}
		   });
	    }
	});



    


    $('.emojis').emojioneArea({
		hideSource: true,
		saveEmojisAs:"shortname",
		pickerPosition    : "bottom", // top | bottom | right
		filtersPosition   : "bottom", // top | bottom
		hidePickerOnBlur  : true,
		autocomplete: false,
	});

	$('button[type="button"][data-widget="remove"]').off().on('click', function(){
		$(this).parents('.direct-chat').hide();
	});

	$(document).on('click', 'button[type="button"][data-widget="collapse"]', function(){
		$(this).children('i').removeClass('fa-minus').addClass('fa-plus');
		$(this).attr('data-widget','expand');
		$(this).parents('.direct-chat').find('.box-body').hide();
		$(this).parents('.direct-chat').find('.box-footer').hide();
	});

	$(document).on('click', 'button[type="button"][data-widget="expand"]', function(){
		console.log("hello");
		$(this).children('i').removeClass('fa-plus').addClass('fa-minus');
		$(this).attr('data-widget','collapse');
		$(this).parents('.direct-chat').find('.box-body').show();
		$(this).parents('.direct-chat').find('.box-footer').show();
	});
	
});



$('button[name="btn_recommend"][type="button"]').on('click', function(){
	var current = $(this);
	var userId = current.data('id');

	console.log(userId);
});






</script>
<style>
.box-footer .emojionearea{
	min-height:34px;
	max-height:auto;
	height: 0;
}			
			
</style>






	 