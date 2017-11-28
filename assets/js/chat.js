/**
 * 
 */

Chat = {
	/* This function will load messages at regular interval so that user
	 * will not have to refresh the page again and again to get new messages
	 */	
	
	init : function()
	{
		refresh = setInterval(function(){
			
			/* Fire an  ajax request to get messages */
			var payload = {};
			var request = {acid:1000, payload:JSON.stringify(payload)};
			var url = BASE_URL+'chat';
			AjaxRequest.startAjax(request, url).done(function(response){
				if(response.flag == 1){
					chats = response.chats;
                    senders = response.senders;
                    
                    
                    $(chats).each(function(k,v){
                    	var html = '';
                    	/* Check if the chat box is visibile then get the last message and append to the messages in the chat */
                    	if($('.direct-chat').is(':visible'))
                    	{
                    		var message_to_user = $('input[type="hidden"][name="message_to_user"]').val();
                    		
                    		if(v.from_user == message_to_user)
                    		{
                    			html += '<div class="direct-chat-msg right">';
    							html += '<div class="direct-chat-info clearfix">';
    							html += '<span class="direct-chat-name pull-right" style="color:#000;">'+v.name+'</span> <span class="direct-chat-timestamp pull-left" style="color:#000;">'+v.time+'</span>';
    							html += '</div>';
    							html += '<img class="direct-chat-img" src="'+BASE_URL+'/assets/uploads/avtar/'+v.avatar+'">';
    							html += '<div class="direct-chat-text">'+emojione.shortnameToImage(v.body)+'</div>';
    							html += '</div>';
                    		}
                    		
                    		$('.direct-chat-messages').append(html);
                    		
                    		/* Once we have this now let's mark the above message as read in the database */
                    		
                    		var url = BASE_URL+'chat';
                    		var payload = {chat_id:v.chat_id};
                    		var request = {acid:1003, payload:JSON.stringify(payload)};
                    		AjaxRequest.startAjax(request, url).done(function(response){
                    			console.log('done');
                    		});
                    	}
                                       	
                    });
                    
                    //                   var audio = new Audio('assets/notify/notify.mp3').play();
				}
			});
			
			
		},2000);
	},
	
	get_chat_history : function(message_to_user, message_limit)
	{
		/* start an ajax request to get the user conversation */
		
		var payload = {message_to_user:message_to_user, limit:message_limit};
		var request = {acid:1002, payload:JSON.stringify(payload)};
		var url = BASE_URL+'chat';
		
		AjaxRequest.startAjax(request, url).done(function(response){
			var html = '';
//			response = JSON.parse(response);
			$('.direct-chat-messages').html('');
			if(response.flag==1)
			{	
				if(!$.isEmptyObject(response.chats)){ console.log(response.chats);
					var html = '';
					$(response.chats).each(function(k,v){console.log(v);
						if(v.type == 'send')
						{
							html += '<div class="direct-chat-msg">';
							html +=	'<div class="direct-chat-info clearfix">';
							html += '<span class="direct-chat-name pull-left" style="color:#000;">'+v.name+'</span> <span class="direct-chat-timestamp pull-right"  style="color:#000;">'+v.time+'</span>';
							html += '</div>';
							html += '<img class="direct-chat-img" src="'+BASE_URL+'/assets/uploads/avtar/'+v.avatar+'">';
							html += '<div class="direct-chat-text">'+emojione.shortnameToImage(v.body)+'</div>';
							html += '</div>';
						}
						else
						{
							html += '<div class="direct-chat-msg right">';
							html += '<div class="direct-chat-info clearfix">';
							html += '<span class="direct-chat-name pull-right" style="color:#000;">'+v.name+'</span> <span class="direct-chat-timestamp pull-left" style="color:#000;">'+v.time+'</span>';
							html += '</div>';
							html += '<img class="direct-chat-img" src="'+BASE_URL+'/assets/uploads/avtar/'+v.avatar+'">';
							html += '<div class="direct-chat-text">'+emojione.shortnameToImage(v.body)+'</div>';
							html += '</div>';
						}
					});
					
					$('.direct-chat-messages').append(html);
				}
				else
				{
					console.log("ehllo");
//					$('.direct-chat-messages').html('<p style="text-align:center; color:#000;">No recent conversation</p>');
				}
				
			}
			else
			{
				
			}
			
			
		});
	    
	}
};


AjaxRequest = {
		
		startAjax : function(request,url)
		{
			var d = new Date();
			return $.ajax({
				type: 'POST',
	            url : url+'?'+d.getTime(),
	            data:request,
	            dataType:'json'
	        });
		}
};