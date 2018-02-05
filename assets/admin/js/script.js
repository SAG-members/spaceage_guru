$(function(){ 
	/* Disable Message Box */
	setTimeout(function() { $(".message").remove() }, 5000);
	setTimeout(function() { $(".warning-msg").remove() }, 5000);
	
	/* Enable Select2 */

	$(".select_6_multiple").select2({
		placeholder: "Select countries",
		maximumSelectionLength: 50,
	    allowClear: true
	});
	
	
	/* Enable Bootstrap tooltip*/
	$('[data-toggle="tooltip"]').tooltip(); 
	
	/* Enable Classy Editor*/
	$(".classy-editor").ClassyEdit();
	
//	$("textarea[name='faq-question-answer[]']").ClassyEdit();
	
	/* Enable Summernote Editor */
	$('#summernote').summernote({
				height: 300,disableResizeEditor: true});
	
	/* Enable Tag Inputs */
	$('#tags_1').tagsInput({width: 'auto'});
	
	$('#tags_2').tagsInput({width: 'auto',defaultText:'Enter emails to send invitation to join santa clause'});
	
	$('#data_tag').tagsInput({width: 'auto', defaultText:'add tags'});
	
	/* Blog Section*/
	/*=====================================================================================================*/
	$('.delete-post').on('click', ManageBlog.deleteBlogPostModal);
	
	$('.select-all').on('change', ManageBlog.selectAllPosts);
	
	$('.select-one').on('change', ManageBlog.selectOnePost);
	
	$('button[type="button"][name="btn-confirm-blog-delete"]').on('click', ManageBlog.confirmDeleteBlogPost);
	
	/* Publish Post */
	$('button[type="button"][name="btn-publish-post"]').on('click', ManageBlog.publishPost);
	
	/* Publish Post */
	$('button[type="button"][name="btn-unpublish-post"]').on('click', ManageBlog.unPublishPost);
	/*=====================================================================================================*/
	
	/* User Section*/
	/*=====================================================================================================*/
	$('.delete-user').on('click', ManageUser.deleteUserModal);
	
	$('button[type="button"][name="btn-confirm-user-delete"]').on('click', ManageUser.confirmDeleteUser);
	
	$('.select-all-user').on('change', ManageUser.selectAllUsers);
	
	$('.select-one-user').on('change', ManageUser.selectOneUser);
	
	/* Activate User */
	$('button[type="button"][name="btn-activate-user"]').on('click', ManageUser.activateUser);
	
	/* De-Activate User */
	$('button[type="button"][name="btn-deactivate-user"]').on('click', ManageUser.deActivateUser);
	
	/* Generate User Password */
	$('button[type="button"][name="btn-generate-password"]').on('click', ManageUser.generateNewPassword);
	
	/*=====================================================================================================*/
	
	/* Faq Section*/
	/*=====================================================================================================*/
	$('.delete-faq').on('click', ManageFaq.deleteFaqModal);
	
	$('button[type="button"][name="btn-confirm-faq-delete"]').on('click', ManageFaq.confirmDeleteFaq);
	
	$('.select-all-faq').on('change', ManageFaq.selectAllFaqs);
	
	$('.select-one-faq').on('change', ManageFaq.selectOneFaq);
	
	/* Publish Faq */
	$('button[type="button"][name="btn-publish-faq"]').on('click', ManageFaq.publishFaq);
	
	/* Un-Publish Faq */
	$('button[type="button"][name="btn-unpublish-faq"]').on('click', ManageFaq.unPublishFaq);
	
	/* Add new Faq */
	$('button[type="button"][name="btn-confirm-add-faq"]').on('click', ManageFaq.addNewFaq);
	
	/* Edit Faq */
	$('.edit-faq').on('click', ManageFaq.editFaq);
	
	/* Update Faq */
	$('button[type="button"][name="btn-confirm-update-faq"]').on('click', ManageFaq.updateFaq);
	
	/*=====================================================================================================*/
	
	/* Symptom Section*/
	/*=====================================================================================================*/
	
	$('.delete-symptom').on('click', ManageSymptom.deleteSymptomModal);
	
	$('button[type="button"][name="btn-confirm-symptom-delete"]').on('click', ManageSymptom.confirmDeleteSymptom);
		
	$('.select-all-symptom').on('change', ManageSymptom.selectAllSymptom);
	
	$('.select-one-symptom').on('change', ManageSymptom.selectOneSymptom);
	
	/* Publish Symptom */
	$('button[type="button"][name="btn-publish-symptom"]').on('click', ManageSymptom.publishSymptom);
	
	/* Un-Publish Symptom */
	$('button[type="button"][name="btn-unpublish-symptom"]').on('click', ManageSymptom.unPublishSymptom);
	
	/* Add new Symptom */
	$('button[type="button"][name="btn-confirm-add-symptom"]').on('click', ManageSymptom.addNewSymptom);
	
	/* Edit Symptom */
	$('.edit-symptom').on('click', ManageSymptom.editSymptom);
	
	/* Update Symptom */
	$('button[type="button"][name="btn-confirm-update-symptom"]').on('click',ManageSymptom.updateSymptom);
	
	/*=====================================================================================================*/
	
	/* Service Section */
	/*=====================================================================================================*/
	
	$('.delete-service').on('click', ManageService.deleteServiceModal);
	
	$('button[type="button"][name="btn-confirm-service-delete"]').on('click', ManageService.confirmDeleteService);
	
	$('.select-all-service').on('change', ManageService.selectAllService);
	
	$('.select-one-service').on('change', ManageService.selectOneService);
	
	/* Publish Service */
	$('button[type="button"][name="btn-publish-service"]').on('click', ManageService.publishService);
	
	/* Un-Publish Service */
	$('button[type="button"][name="btn-unpublish-service"]').on('click', ManageService.unPublishService);
	
	/*=====================================================================================================*/
	
	/* Product Section */
	/*=====================================================================================================*/
	
	$('.delete-product').on('click', ManageProduct.deleteProductModal);
	
	$('button[type="button"][name="btn-confirm-product-delete"]').on('click', ManageProduct.confirmDeleteProduct);
	
	$('.select-all-product').on('change', ManageProduct.selectAllProduct);
	
	$('.select-one-product').on('change', ManageProduct.selectOneProduct);
	
	/* Publish Service */
	$('button[type="button"][name="btn-publish-product"]').on('click', ManageProduct.publishProduct);
	
	/* Un-Publish Service */
	$('button[type="button"][name="btn-unpublish-product"]').on('click', ManageProduct.unPublishProduct);
	
	
	/*=====================================================================================================*/
	
	/* Country Section */
	/*=====================================================================================================*/
	$('.delete-country').on('click', ManageCountries.deleteCountryModal);
	
	$('button[type="button"][name="btn-confirm-country-delete"]').on('click', ManageCountries.confirmDeleteCountry);
	
	$('.select-all-country').on('change', ManageCountries.SelectAllCountry);
	
	$('.select-one-country').on('change', ManageCountries.selectOneCountry);
	
	/* Publish Country */
	$('button[type="button"][name="btn-publish-country"]').on('click', ManageCountries.publishCountry);
	
	/* Un-Publish Country */
	$('button[type="button"][name="btn-unpublish-country"]').on('click', ManageCountries.unPublishCountry);
	
	/* Edit Country */
	$('.edit-country').on('click', ManageCountries.editCountry);
	
	/* Add new Country */
	$('button[type="button"][name="btn-confirm-add-country"]').on('click', ManageCountries.createNewCountry);
	
	/* Update Country */
	$('button[type="button"][name="btn-confirm-update-country"]').on('click',ManageCountries.updateCountry);
	
	/*=====================================================================================================*/
	
	
	/* CMS Page */
	/*=====================================================================================================*/
	
	$('.select-all-page').on('click', ManageCMSPage.selectAllPage);
	
	$('.select-one-page').on('click', ManageCMSPage.selectOnePage);
	
	$('button[type="button"][name="btn-publish-page"]').on('click', ManageCMSPage.publishPage);
	
	$('button[type="button"][name="btn-unpublish-page"]').on('click', ManageCMSPage.unPublishPage);
	
	/*=====================================================================================================*/
	
		
	// Upload Membership Logo
	$('input[type="file"][name="file"]').on('change', Util.imageUpload);
	
	// Forgot Password
	$('button[type="button"][name="btn-recover-password"]').on('click', Util.forgotPassword);
	
	
	// Change Password
	$('input[type="button"][name="change-password-button"]').on('click', Util.changePassword);
	
	$('input[type="email"][name="email"]').on('keyup', Util.hideEmailError);
	
	// Remove Error on Change Password Page
	
	$('input[type="password"][name="password"]').on('keyup', Util.hidePasswordError);
	$('input[type="password"][name="cpassword"]').on('keyup', Util.hidePasswordError);
	
	$('#datatable').DataTable({"pageLength": 100}); 
	
	$('.datatable').DataTable({"pageLength": 100});
	
	
	// Confirm reset user password
	
	$('button[type="button"][name="confirm-reset-password"]').on('click', Util.resetUserPassword);
	
	/* Block User*/
	$('button[type="button"][name="confirm-block-user"]').on('click', Util.blockUser);
	
	/* Unblock User */
	$('button[type="button"][name="confirm-unblock-user"]').on('click', Util.unBlockUser);
	
	/* Send Invite Modal Show */
	$('.open-send-invite-modal').on('click', Util.sendInvitationToJoinPopup);
	
	/* Send Invitation*/
	$('button[type="button"][name="btn-confirm-invite-user"]').on('click', Util.sendInvitationToJoin);
	
	/* Add country */
	$('input[type="text"][name="country"]').on('blur', Util.addCountriesAvailableIn);
	
	/* Add country */
	$('button[type="button"][name="btn-add-country"]').on('click', Util.addCountriesAvailableIn);
	
	/* Remove country*/
	$(document).on('click', '.remove-country', Util.removeCountriesAvailableIn);
	
	/* */
	$('input[type="checkbox"][name="chckbox-price-per-read-article"]').on('ifChanged', Util.enablePointsTextBox);
	
	
	/* Manage country group*/
	
	
	$('input[type="checkbox"][name="is_group"]').on('click', function(){
		if($(this).is(':checked')){
			$('.group_countries').show();
		}
		else{
			$('.group_countries').hide();
		}
	});
	
	
	
	
});


/*
 * Mange CMS Page Js
 */

ManageCMSPage = {
		pageIds : {},
		selectAllPage : function(e)
		{
			ManageCMSPage.pageIds = []; 
			$(".select-one-page").prop('checked', $(this).prop("checked"));
			
			if($(this).prop("checked")){$(".select-one-page").each(function(){ ManageCMSPage.pageIds.push($(this).data('page-id')); });}
			else { ManageCMSPage.pageIds = []; }
			
			console.log(ManageCMSPage.pageIds);
		},
		selectOnePage : function(e)
		{
			ManageCMSPage.pageIds = []; 
			if(false == $(this).prop("checked")) 
			{
				pageId = $(this).data('page-id');
				
				$('.select-all-page').prop('checked', false); 
					ManageCMSPage.pageIds = $.grep(ManageCMSPage.pageIds, function(v){
					return v != pageId;
				});
				
			}
		    if ($('.select-one-page:checked').length == $('.select-one-page').length ) 
		    {
		    	$(".select-all-page").prop('checked', true);
		    }
		    
		    if($(this).prop("checked")) ManageCMSPage.pageIds.push($(this).data('page-id'));
		    
		    console.log(ManageCMSPage.pageIds);
		},
		publishPage : function(e)
		{
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/cms/page/publish',
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'page-ids',
		        'type': 'hidden',
		        'value': ManageCMSPage.pageIds,
		    }));
			
			newForm.appendTo("body").submit();
		},
		unPublishPage : function(e)
		{
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/cms/page/unpublish',
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'page-ids',
		        'type': 'hidden',
		        'value': ManageCMSPage.pageIds,
		    }));
			
			newForm.appendTo("body").submit();
		}
}


/* 
 * Manage Blog Section Js 
 */

ManageBlog = {
		postIds : [],
		deleteBlogPostModal : function(e)
		{
			var postId = $(this).data('postId');
			var postTitle = $(this).data('postTitle');
						
			$('#manage_blog_modal').find('.modal-title').html("Confirm Delete ?");
			$('#manage_blog_modal').find('.modal-body').html("<p>"+postTitle+"</p>");
			$('#manage_blog_modal').find('.modal-body').append('<input type="hidden" name="post-id" value="'+postId+'"/>');
			$('#manage_blog_modal').modal('show');
		},
		confirmDeleteBlogPost : function(e)
		{
			var postId = $(this).parents('.modal-content').find('input[type="hidden"][name="post-id"]').val();
			
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/delete-post/'+postId,
		        'target': '_top',
		        'method':'post'	
		    });
			
			newForm.appendTo("body").submit();
		},
		selectAllPosts : function(e)
		{
			ManageBlog.postIds = []; 
			$(".select-one").prop('checked', $(this).prop("checked"));
			
			if($(this).prop("checked")){$(".select-one").each(function(){ ManageBlog.postIds.push($(this).data('postId')); });}
			else { ManageBlog.postIds = []; }
			
			console.log(ManageBlog.postIds);
		},
		selectOnePost : function(e)
		{
			if(false == $(this).prop("checked")) 
			{
				postId = $(this).data('postId')
				$('.select-all').prop('checked', false); 
				ManageBlog.postIds = $.grep(ManageBlog.postIds, function(v){
					return v != postId;
				});
				
			}
		    if ($('.select-one:checked').length == $('.select-one').length ) 
		    {
		    	$(".select-all").prop('checked', true);
		    }
		    
		    if($(this).prop("checked")) ManageBlog.postIds.push($(this).data('postId'));
		    
		    console.log(ManageBlog.postIds);
		},
		publishPost : function(e)
		{
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/publish-post',
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'post-ids',
		        'type': 'hidden',
		        'value': ManageBlog.postIds,
		    }));
			
			newForm.appendTo("body").submit();
		},
		unPublishPost : function(e)
		{
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/unpublish-post',
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'post-ids',
		        'type': 'hidden',
		        'value': ManageBlog.postIds,
		    }));
			
			newForm.appendTo("body").submit();
		}
}

/* Manage User Section*/

ManageUser ={
		userIds : [],
		deleteUserModal : function(e)
		{
			var userId = $(this).data('userId');
			var userName = $(this).data('userName');
						
			$('#manage_user_modal').find('.modal-title').html("Confirm Delete ?");
			$('#manage_user_modal').find('.modal-body').html("<p>"+userName+"</p>");
			$('#manage_user_modal').find('.modal-body').append('<input type="hidden" name="user-id" value="'+userId+'"/>');
			$('#manage_user_modal').modal('show');
		},
		confirmDeleteUser : function(e)
		{
			var userId = $(this).parents('.modal-content').find('input[type="hidden"][name="user-id"]').val();
			
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/delete-user/'+userId,
		        'target': '_top',
		        'method':'post'	
		    });
			
			newForm.appendTo("body").submit();
		},
		selectAllUsers : function(e)
		{
			ManageUser.userIds = []; 
			$(".select-one-user").prop('checked', $(this).prop("checked"));
			
			if($(this).prop("checked")){$(".select-one-user").each(function(){ ManageUser.userIds.push($(this).data('userId')); });}
			else { ManageUser.userIds = []; }
			
			console.log(ManageUser.userIds);
		},
		selectOneUser : function(e)
		{
			if(false == $(this).prop("checked")) 
			{
				userId = $(this).data('userId')
				$('.select-all-user').prop('checked', false); 
				ManageUser.userIds = $.grep(ManageUser.userIds, function(v){
					return v != userId;
				});
				
			}
		    if ($('.select-one-user:checked').length == $('.select-one-user').length ) 
		    {
		    	$(".select-all-user").prop('checked', true);
		    }
		    
		    if($(this).prop("checked")) ManageUser.userIds.push($(this).data('userId'));
		    
		    console.log(ManageUser.userIds);
		},
		activateUser : function(e)
		{
			if(ManageUser.userIds.length === 0){return false;}
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/activate-user',
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'user-ids',
		        'type': 'hidden',
		        'value': ManageUser.userIds,
		    }));
			
			newForm.appendTo("body").submit();
		},
		deActivateUser : function(e)
		{
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/deactivate-user',
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'user-ids',
		        'type': 'hidden',
		        'value': ManageUser.userIds,
		    }));
			
			newForm.appendTo("body").submit();
		},
		generateNewPassword : function(e)
		{
			var payload = '';
			request = {'acid':10007,'payload':JSON.stringify(payload)}
			/* Fire Ajax */
			$.ajax({
				url :BASE_URL+'admin/ajax',
				method: 'post',
				data :{request:request},
				dataType:'json',
				success : function(data) 
				{
					$('input[type="text"][name="password"]').val(data.password);
				}
				
			});
		},
		blockUser : function(e)
		{
			userId = $('input[type="hidden"][name="user-id"]').val()
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/deactivate-user',
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'user-ids',
		        'type': 'hidden',
		        'value': userId,
		    }));
			
			newForm.appendTo("body").submit();
		}
		
}

/* Manage Faq Section*/

ManageFaq = {
		faqIds :[],
		deleteFaqModal : function(e)
		{
			var faqId = $(this).data('faqId');
			var faqTitle = $(this).data('faq');
						
			$('#manage_faq_modal').find('.modal-title').html("Confirm Delete ?");
			$('#manage_faq_modal').find('.modal-body').html("<p>"+faqTitle+"</p>");
			$('#manage_faq_modal').find('.modal-body').append('<input type="hidden" name="faq-id" value="'+faqId+'"/>');
			$('#manage_faq_modal').modal('show');
		},
		confirmDeleteFaq : function(e)
		{
			var faqId = $(this).parents('.modal-content').find('input[type="hidden"][name="faq-id"]').val();
			
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/delete-faq/'+faqId,
		        'target': '_top',
		        'method':'post'	
		    });
			
			newForm.appendTo("body").submit();
		},
		selectAllFaqs : function(e)
		{
			ManageFaq.faqIds = [];
			$(".select-one-faq").prop('checked', $(this).prop("checked"));
			
			if($(this).prop("checked")){$(".select-one-faq").each(function(){ ManageFaq.faqIds.push($(this).data('faqId')); });}
			else { ManageFaq.faqIds = []; }
			
			console.log(ManageFaq.faqIds);
		},
		selectOneFaq : function(e)
		{
			if(false == $(this).prop("checked")) 
			{
				faqId = $(this).data('faqId')
				$('.select-all-faq').prop('checked', false); 
				ManageFaq.faqIds = $.grep(ManageFaq.faqIds, function(v){
					return v != faqId;
				});
				
			}
		    if ($('.select-one-faq:checked').length == $('.select-one-faq').length ) 
		    {
		    	$(".select-all-faq").prop('checked', true);
		    }
		    
		    if($(this).prop("checked")) ManageFaq.faqIds.push($(this).data('faqId'));
		    
		    console.log(ManageFaq.faqIds);
		},
		publishFaq : function(e)
		{
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/publish-faq',
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'faq-ids',
		        'type': 'hidden',
		        'value': ManageFaq.faqIds,
		    }));
			
			newForm.appendTo("body").submit();
			
		},
		unPublishFaq : function(e)
		{
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/unpublish-faq',
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'faq-ids',
		        'type': 'hidden',
		        'value': ManageFaq.faqIds,
		    }));
			
			newForm.appendTo("body").submit();
		},
		addNewFaq : function(e)
		{
			var anonymous = '';
			
			if($('input[type="checkbox"][name="anonymous"]:checked')){anonymous = $('input[type="checkbox"][name="anonymous"]:checked').val();}
			var faqQuestion = $('textarea[name="faq-question"]').val();
			
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/faqs',
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'anonymous',
		        'type': 'hidden',
		        'value': anonymous,
		    }).append(jQuery('<input>', {
		        'name': 'faq-question',
		        'type': 'hidden',
		        'value': faqQuestion,
		    })));
			
			newForm.appendTo("body").submit();
		},
		editFaq	 : function(e)
		{
			payload = {'id':$(this).data('faqId')}
			request = {'acid':10001,'payload':JSON.stringify(payload)}
			/* Fire Ajax */
			$.ajax({
				url :BASE_URL+'admin/ajax',
				method: 'post',
				data :{request:request},
				dataType:'json',
				success : function(data) 
				{
					if(data.anonymous === "1"){$('input[type="checkbox"][name="anonymous"]').prop('checked',true)}
					else {$('input[type="checkbox"][name="anonymous"]').prop('checked',false)}
					$('#edit_faq_modal').find('.modal-body').children('.form-group').find('textarea[name="faq-question"]').siblings('.classyedit').children('.editor').html(data.question);
					$('#edit_faq_modal').find('.modal-body').children('.form-group').find('input[type="hidden"][name="faq-id"]').val(data.id);
					$('#edit_faq_modal').modal('show');
				}
				
			});
		},
		updateFaq : function(e)
		{
			var anonymous = '';
			
			if($('input[type="checkbox"][name="anonymous"]:checked')){anonymous = $('input[type="checkbox"][name="anonymous"]:checked').val();}
			var faqQuestion = $('textarea[name="faq-question"]').val();
			var faqId = $('input[type="hidden"][name="faq-id"]').val();
				
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/update-faq',
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'anonymous',
		        'type': 'hidden',
		        'value': anonymous,
		    })).append(jQuery('<input>', {
		        'name': 'faq-question',
		        'type': 'hidden',
		        'value': faqQuestion,
		    })).append(jQuery('<input>', {
		        'name': 'faq-id',
		        'type': 'hidden',
		        'value': faqId,
		    }));
			
			newForm.appendTo("body").submit();
		}
		
}

ManageSymptom = {
		symptomIds : [],
		deleteSymptomModal : function(e)
		{
			var symptomId = $(this).data('symptomId');
			var symptom = $(this).data('symptom');
						
			$('#manage_symptom_modal').find('.modal-title').html("Confirm Delete ?");
			$('#manage_symptom_modal').find('.modal-body').html("<p>"+symptom+"</p>");
			$('#manage_symptom_modal').find('.modal-body').append('<input type="hidden" name="symptom-id" value="'+symptomId+'"/>');
			$('#manage_symptom_modal').modal('show');
		},
		confirmDeleteSymptom : function(e)
		{
			var symptomId = $(this).parents('.modal-content').find('input[type="hidden"][name="symptom-id"]').val();
			
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/delete-symptom/'+symptomId,
		        'target': '_top',
		        'method':'post'	
		    });
			
			newForm.appendTo("body").submit();
		},
		selectAllSymptom : function(e)
		{
			ManageSymptom.symptomIds = [];
			$(".select-one-symptom").prop('checked', $(this).prop("checked"));
			
			if($(this).prop("checked")){$(".select-one-symptom").each(function(){ ManageSymptom.symptomIds.push($(this).data('symptomId')); });}
			else { ManageSymptom.symptomIds = []; }
			
			console.log(ManageSymptom.symptomIds);
		},
		selectOneSymptom : function(e)
		{
			if(false == $(this).prop("checked")) 
			{
				symptomId = $(this).data('symptomId')
				$('.select-all-symptom').prop('checked', false); 
				ManageSymptom.symptomIds = $.grep(ManageSymptom.symptomIds, function(v){
					return v != symptomId;
				});
				
			}
		    if ($('.select-one-symptom:checked').length == $('.select-one-symptom').length ) 
		    {
		    	$(".select-all-symptom").prop('checked', true);
		    }
		    
		    if($(this).prop("checked")) ManageSymptom.symptomIds.push($(this).data('symptomId'));
		    
		    console.log(ManageSymptom.symptomIds);
		},
		publishSymptom : function(e)
		{
			if(ManageSymptom.symptomIds.length == 0) {Util.showWarningMessage('Please select some symptom first'); return false;}
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/publish-symptom',
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'symptom-ids',
		        'type': 'hidden',
		        'value': ManageSymptom.symptomIds,
		    }));
			
			newForm.appendTo("body").submit();
			
		},
		unPublishSymptom : function(e)
		{
			if(ManageSymptom.symptomIds.length == 0) {Util.showWarningMessage('Please select some symptom first'); return false;}
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/unpublish-symptom',
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'symptom-ids',
		        'type': 'hidden',
		        'value': ManageSymptom.symptomIds,
		    }));
			
			newForm.appendTo("body").submit();
		},
		addNewSymptom : function(e)
		{
			var anonymous = '';
			
			if($('input[type="checkbox"][name="anonymous"]:checked')){anonymous = $('input[type="checkbox"][name="anonymous"]:checked').val();}
			var symptom = $('input[type="text"][name="symptom-title"]').val();
			var desc = $('textarea[name="symptom-descripton"]').val();
			
			if(symptom.length == 0 && desc.length == 0) {Util.showModalWarningMessage('Please enter some symptom first'); return false;}
			
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/symptoms', 
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'anonymous',
		        'type': 'hidden',
		        'value': anonymous,
		    })).append(jQuery('<input>', {
		        'name': 'symptom-title',
		        'type': 'hidden',
		        'value': symptom,
		    })).append(jQuery('<input>', {
		        'name': 'symptom-description',
		        'type': 'hidden',
		        'value': desc,
		    }));
			
			newForm.appendTo("body").submit();
		},
		editSymptom	 : function(e)
		{
			payload = {'id':$(this).data('symptomId')}
			request = {'acid':10002,'payload':JSON.stringify(payload)}
			/* Fire Ajax */
			$.ajax({
				url :BASE_URL+'admin/ajax',
				method: 'post',
				data :{request:request},
				dataType:'json',
				success : function(data) 
				{
					if(data.anonymous === "1"){$('input[type="checkbox"][name="anonymous"]').prop('checked',true)}
					else {$('input[type="checkbox"][name="anonymous"]').prop('checked',false)}
					$('#edit_symptom_modal').find('.modal-body').children('.form-group').find('input[type="text"][name="symptom-title"]').val(data.symptom);
					$('#edit_symptom_modal').find('.modal-body').children('.form-group').find('textarea[name="symptom-descripton"]').siblings('.classyedit').children('.editor').html(data.description);
					$('#edit_symptom_modal').find('.modal-body').children('.form-group').find('input[type="hidden"][name="symptom-id"]').val(data.id);
					$('#edit_symptom_modal').modal('show');
				}
				
			});
		},
		updateSymptom : function(e)
		{
			var anonymous = '';
			
			if($('input[type="checkbox"][name="anonymous"]:checked')){anonymous = $('input[type="checkbox"][name="anonymous"]:checked').val();}
			var symptom = $(this).parents('.modal-content').find('input[type="text"][name="symptom-title"]').val();
			var desc = $(this).parents('.modal-content').find('textarea[name="symptom-descripton"]').siblings('.classyedit').children('.editor').html(); 
			var symptomId = $(this).parents('.modal-content').find('input[name="symptom-id"]').val();
			
			if(symptom.length == 0 && desc.length == 0) {Util.showModalWarningMessage('Please enter some symptom first'); return false;}
			
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/update-symptom', 
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'anonymous',
		        'type': 'hidden',
		        'value': anonymous,
		    })).append(jQuery('<input>', {
		        'name': 'symptom-id',
		        'type': 'hidden',
		        'value': symptomId,
		    })).append(jQuery('<input>', {
		        'name': 'symptom-title',
		        'type': 'hidden',
		        'value': symptom,
		    })).append(jQuery('<input>', {
		        'name': 'symptom-description',
		        'type': 'hidden',
		        'value': desc,
		    }));
			
			newForm.appendTo("body").submit();
		}
}

ManageService = {
		serviceIds : [],
		deleteServiceModal : function(e)
		{
			var serviceId = $(this).data('serviceId');
			var service = $(this).data('service');
			var categoryId = $(this).data('categoryId');
						
			$('#manage_service_modal').find('.modal-title').html("Confirm Delete ?");
			$('#manage_service_modal').find('.modal-body').html("<p>"+service+"</p>");
			$('#manage_service_modal').find('.modal-body').append('<input type="hidden" name="service-id" value="'+serviceId+'"/>');
			$('#manage_service_modal').find('.modal-body').append('<input type="hidden" name="category-id" value="'+categoryId+'"/>');
			$('#manage_service_modal').modal('show');
		},
		confirmDeleteService : function(e)
		{
			var serviceId = $(this).parents('.modal-content').find('input[type="hidden"][name="service-id"]').val();
			var categoryId = $(this).parents('.modal-content').find('input[type="hidden"][name="category-id"]').val();
						
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/delete-page',
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'ids',
		        'type': 'hidden',
		        'value': serviceId,
		    })).append(jQuery('<input>', {
		        'name': 'category',
		        'type': 'hidden',
		        'value': categoryId,
		    }));
			
			newForm.appendTo("body").submit();
		},
		selectAllService : function(e)
		{
			ManageService.serviceIds = [];
			$(".select-one-service").prop('checked', $(this).prop("checked"));
			
			if($(this).prop("checked")){$(".select-one-service").each(function(){ ManageService.serviceIds.push($(this).data('serviceId')); });}
			else { ManageService.serviceIds = []; }
			
			console.log(ManageService.serviceIds);
		},
		selectOneService : function(e)
		{
			if(false == $(this).prop("checked")) 
			{
				serviceId = $(this).data('serviceId')
				$('.select-all-service').prop('checked', false); 
				ManageService.serviceIds = $.grep(ManageService.serviceIds, function(v){
					return v != serviceId;
				});
				
			}
		    if ($('.select-one-service:checked').length == $('.select-one-service').length ) 
		    {
		    	$(".select-all-service").prop('checked', true);
		    }
		    
		    if($(this).prop("checked")) ManageService.serviceIds.push($(this).data('serviceId'));
		    
		    console.log(ManageService.serviceIds);
		},
		publishService : function(e)
		{
			var category = 1;
			if($(e.currentTarget).data('category'))
			{
				category = $(e.currentTarget).data('category');
			}
			
			if(ManageService.serviceIds.length == 0) {Util.showWarningMessage('Please select some service first'); return false;}
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/publish-page',
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'ids',
		        'type': 'hidden',
		        'value': ManageService.serviceIds,
		    })).append(jQuery('<input>', {
		        'name': 'category',
		        'type': 'hidden',
		        'value': category,
		    		
		    }));
			
			newForm.appendTo("body").submit();
			
		},
		unPublishService : function(e)
		{
			var category = 1;
			if($(e.currentTarget).data('category'))
			{
				category = $(e.currentTarget).data('category');
			}
			
			if(ManageService.serviceIds.length == 0) {Util.showWarningMessage('Please select some service first'); return false;}
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/unpublish-page',
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'ids',
		        'type': 'hidden',
		        'value': ManageService.serviceIds,
		    })).append(jQuery('<input>', {
		        'name': 'category',
		        'type': 'hidden',
		        'value': category,
		    		
		    }));
			
			newForm.appendTo("body").submit();
		},
}

ManageProduct = {
		productIds : [],
		deleteProductModal : function(e)
		{
			var productId = $(this).data('productId');
			var product = $(this).data('product');
						
			$('#manage_product_modal').find('.modal-title').html("Confirm Delete ?");
			$('#manage_product_modal').find('.modal-body').html("<p>"+product+"</p>");
			$('#manage_product_modal').find('.modal-body').append('<input type="hidden" name="product-id" value="'+productId+'"/>');
			$('#manage_product_modal').modal('show');
		},
		confirmDeleteProduct : function(e)
		{
			var productId = $(this).parents('.modal-content').find('input[type="hidden"][name="product-id"]').val();
			
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/delete-page',
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'ids',
		        'type': 'hidden',
		        'value': productId,
		    })).append(jQuery('<input>', {
		        'name': 'category',
		        'type': 'hidden',
		        'value': 2,
		    }));
			
			newForm.appendTo("body").submit();
		},
		selectAllProduct : function(e)
		{
			ManageProduct.productIds = [];
			$(".select-one-product").prop('checked', $(this).prop("checked"));
			
			if($(this).prop("checked")){$(".select-one-product").each(function(){ ManageProduct.productIds.push($(this).data('productId')); });}
			else { ManageProduct.productIds = []; }
			
			console.log(ManageProduct.productIds);
		},
		selectOneProduct : function(e)
		{
			if(false == $(this).prop("checked")) 
			{
				productId = $(this).data('productId')
				$('.select-all-product').prop('checked', false); 
				ManageProduct.productIds = $.grep(ManageProduct.productIds, function(v){
					return v != productId;
				});
				
			}
		    if ($('.select-one-product:checked').length == $('.select-one-product').length ) 
		    {
		    	$(".select-all-product").prop('checked', true);
		    }
		    
		    if($(this).prop("checked")) ManageProduct.productIds.push($(this).data('productId'));
		    
		    console.log(ManageProduct.productIds);
		},
		publishProduct : function(e)
		{
			if(ManageProduct.productIds.length == 0) {Util.showWarningMessage('Please select some product first'); return false;}
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/publish-page',
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'ids',
		        'type': 'hidden',
		        'value': ManageProduct.productIds,
		    })).append(jQuery('<input>', {
		        'name': 'category', 
		        'type': 'hidden',
		        'value': 2,
		    		
		    }));
			
			newForm.appendTo("body").submit();
			
		},
		unPublishProduct : function(e)
		{
			console.log(ManageProduct.productIds);
			if(ManageProduct.productIds.length == 0) {Util.showWarningMessage('Please select some product first'); return false;}
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/unpublish-page',
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'ids',
		        'type': 'hidden',
		        'value': ManageProduct.productIds,
		    })).append(jQuery('<input>', {
		        'name': 'category',
		        'type': 'hidden',
		        'value': 2,
		    		
		    }));
			
			newForm.appendTo("body").submit();
		},
}

ManageCountries = {
		countryIds : [],
		deleteCountryModal : function(e)
		{
			var countryId = $(this).data('countryId');
			var country = $(this).data('country');
						
			$('#delete_country_modal').find('.modal-title').html("Confirm Delete ?");
			$('#delete_country_modal').find('.modal-body').html("<p>"+country+"</p>");
			$('#delete_country_modal').find('.modal-body').append('<input type="hidden" name="country-id" value="'+countryId+'"/>');
			$('#delete_country_modal').modal('show');
		},
		confirmDeleteCountry : function(e)
		{
			var countryId = $(this).parents('.modal-content').find('input[type="hidden"][name="country-id"]').val();
			
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/delete-country',
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'country-id',
		        'type': 'hidden',
		        'value': countryId,
		    }));
			
			newForm.appendTo("body").submit();
		},
		selectOneCountry : function()
		{
			if(false == $(this).prop("checked")) 
			{
				countryId = $(this).data('countryId')
				$('.select-all-country').prop('checked', false); 
				ManageCountries.countryIds = $.grep(ManageCountries.countryIds, function(v){
					return v !=countryId;
				});
				
			}
		    if ($('.select-one-country:checked').length == $('.select-one-country').length ) 
		    {
		    	$(".select-all-country").prop('checked', true);
		    }
		    
		    if($(this).prop("checked")) ManageCountries.countryIds.push($(this).data('countryId'));
		    
		    console.log(ManageCountries.countryIds);
		},
		SelectAllCountry : function()
		{
			ManageCountries.countryIds = [];
			$(".select-one-country").prop('checked', $(this).prop("checked"));
			
			if($(this).prop("checked")){$(".select-one-country").each(function(){ ManageCountries.countryIds.push($(this).data('countryId')); });}
			else { ManageCountries.countryIds = []; }
			
			console.log(ManageCountries.countryIds);
		},
		createNewCountry : function()
		{
			var highlightCountry = ''; var isGroup = '';
			
			if($('input[type="checkbox"][name="highlight-country"]:checked')){highlightCountry = $('input[type="checkbox"][name="highlight-country"]:checked').val();}
			var countryCode = $('input[type="text"][name="country-code"]').val();
			var countryName = $('input[type="text"][name="country-name"]').val();
			var groupCountries = $('select[name="legal_countries[]"]').val();
			if($('input[type="checkbox"][name="is_group"]').is("checked")){
				isGroup = 1;
			}
			else{
				isGroup = 0;
			}
			
			var countryImage = $('input[type="hidden"][name="hidden_country_image"]').val();
						
			if(countryCode == '' && countryName == ''){return false;}
			
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/add-country',
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'highlight-country',
		        'type': 'hidden',
		        'value': highlightCountry,
		    }).append(jQuery('<input>', {
		        'name': 'country-code',
		        'type': 'hidden',
		        'value': countryCode,
		    })).append(jQuery('<input>', {
		        'name': 'country-name',
		        'type': 'hidden',
		        'value': countryName,
		    })).append(jQuery('<input>', {
		        'name': 'group-countries',
		        'type': 'hidden',
		        'value': groupCountries,
		    })).append(jQuery('<input>', {
		        'name': 'is-group',
		        'type': 'hidden',
		        'value': isGroup,
		    })).append(jQuery('<input>', {
		        'name': 'country-image',
		        'type': 'hidden',
		        'value': countryImage,
		    })));
			
			newForm.appendTo("body").submit();
		},
		
		updateCountry : function()
		{
			var highlightCountry = ''; var isGroup = '';
			
			if($('input[type="checkbox"][name="edit-highlight-country"]:checked')){ console.log('checked');highlightCountry = $('input[type="checkbox"][name="edit-highlight-country"]:checked').val();}
			var countryCode = $('input[type="text"][name="edit-country-code"]').val();
			var countryName = $('input[type="text"][name="edit-country-name"]').val();
			var countryId = $('input[type="hidden"][name="edit-country-id"]').val();
			
			var groupCountries =  $('select[name="legal_countries[]"]').select2('val');
			
			if($('input[type="checkbox"][name="is_group"]').is("checked")){
				isGroup = 1;
			}
			else{
				isGroup = 0;
			}
			
			if(countryCode == '' && countryName == ''){return false;}
			
			var countryImage = $('input[type="hidden"][name="hidden_country_image"]').val();
			
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/update-country',
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'country-id',
		        'type': 'hidden',
		        'value': countryId,
		    })).append(jQuery('<input>', {
		        'name': 'highlight-country',
		        'type': 'hidden',
		        'value': highlightCountry,
		    })).append(jQuery('<input>', {
		        'name': 'country-code',
		        'type': 'hidden',
		        'value': countryCode,
		    })).append(jQuery('<input>', {
		        'name': 'country-name',
		        'type': 'hidden',
		        'value': countryName,
		    }).append(jQuery('<input>', {
		        'name': 'group-countries',
		        'type': 'hidden',
		        'value': groupCountries,
		    })).append(jQuery('<input>', {
		        'name': 'is-group',
		        'type': 'hidden',
		        'value': isGroup,
		    })).append(jQuery('<input>', {
		        'name': 'country-image',
		        'type': 'hidden',
		        'value': countryImage,
		    })));
			
			newForm.appendTo("body").submit();
		},
				
		publishCountry : function()
		{
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/publish-country',
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'country-ids',
		        'type': 'hidden',
		        'value': ManageCountries.countryIds,
		    }));
			
			newForm.appendTo("body").submit();
		},
		
		unPublishCountry : function()
		{
			var newForm = jQuery('<form>', {
		        'action': BASE_URL + 'admin/unpublish-country',
		        'target': '_top',
		        'method':'post'	
		    }).append(jQuery('<input>', {
		        'name': 'country-ids',
		        'type': 'hidden',
		        'value': ManageCountries.countryIds,
		    }));
			
			newForm.appendTo("body").submit();
		},
		
		editCountry	 : function(e)
		{
			payload = {'id':$(this).data('countryId')};
			request = {'acid':10003,'payload':JSON.stringify(payload)};
			
			/* Fire Ajax */
			$.ajax({
				url :BASE_URL+'admin/ajax',
				method: 'post',
				data :{request:request},
				dataType:'json',
				success : function(data) 
				{
					console.log();
					
					if(data.color_flag === "1"){$('input[type="checkbox"][name="edit-highlight-country"]').prop('checked',true)}
					else {$('input[type="checkbox"][name="edit-highlight-country"]').prop('checked',false)}
					$('#edit_country_modal').find('.modal-body').children('.form-group').find('input[type="text"][name="edit-country-code"]').val(data.country_code);
					$('#edit_country_modal').find('.modal-body').children('.form-group').find('input[type="text"][name="edit-country-name"]').val(data.country_name);
					$('#edit_country_modal').find('.modal-body').children('.form-group').find('input[type="hidden"][name="edit-country-id"]').val(data.id);
					
					if(typeof data.group != "undefined" != 0 && (data.group.country_id).length != 0){
						$('input[type="checkbox"][name="is_group"]').prop('checked',true);
						$('.group_countries').show();
						
						countries = (data.group.country_id).split(",");
							
						$('select[name="legal_countries[]"]').val(countries).trigger('change');
					}
					
					if((data.image).length > 0){
						$('.map_preview_box').html('<img src="'+BASE_URL+'/assets/uploads/country/'+data.image+'" class="thumbimage_220"/>');
					}
					
										
					$('#edit_country_modal').modal('show');
				}
				
			});
		},
}

countryIds = [];

Util = {
	showWarningMessage :  function(message)
	{
		var html = '<div class="alert alert-warning fade in alert-dismissable mar-t-60 warning-msg">';
				html += '<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>';
				html +=  message;
			html +=	'</div>';
			
		$('.right_col').prepend(html);	
	},
	showModalWarningMessage : function(message)
	{
		var html = '<div class="alert alert-warning fade in alert-dismissable warning-msg">';
				html += '<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>';
				html +=  message;
			html +=	'</div>';
			
		$('.modal-body').prepend(html);
	},
	
	ValidateService : function(e)
	{
		test = $(e.currentTarget).find('input[name="service-visibility"]:checked').val();
		console.log(test);
		return false;
	},
	imageUpload : function(e)
	{
		var countFiles = $(this)[0].files.length;
		var img; var imgPath = $(this)[0].value;
		var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
		var image_holder = $(".logo-preview");
		img = jQuery('<input type="button" name="del" value="Delete" id="delete" onclick="delfunction()">');
		image_holder.empty();

		if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") 
		{
			if (typeof (FileReader) != "undefined") 
			{
				for (var i = 0; i < countFiles; i++) 
				{
					var reader = new FileReader();
					reader.onload = function (e) 
					{
						$("<img />", { "src": e.target.result, "class": "thumbimage"}).appendTo(image_holder);
						jQuery('#preview-image').append(img);
					}
					image_holder.show();
					reader.readAsDataURL($(this)[0].files[i]);
				}
			} 
			else 
			{
				alert("It doesn't supports");
			}
		} 
		else 
		{
			alert("Select Only images");
		}
	},
	hideEmailError : function(e)
	{
		if($('.error-message').length){$('.popup-message-box').html('');}
	},
	forgotPassword : function(e)
	{
		var email = $(this).parents('#recoverform').find('input[type="email"][name="email"]').val();
		if(email === ''){$('.popup-message-box').html('<div class="alert alert-danger error-message"><strong>Please Enter Email First.</strong></div>'); return false; }
		
		if(!Util.isValidateEmail(email)) {$('.popup-message-box').html('<div class="alert alert-danger error-message"><strong>Please Enter a valid Email Address.</strong></div>'); return false; }
		
		/* If Everything is okay than fire ajax */
		
		var payload = {'email':email};
		
		/* Fire Ajax */
		$.ajax({
			url :BASE_URL+'public/api',
			method: 'post',
			data :{acid:10009, 'payload':JSON.stringify(payload)},
			dataType:'json',
			success : function(data) 
			{
				if(data.flag == 0)
				{
					$('.popup-message-box').html('<div class="alert alert-danger error-message"><strong>'+data.message+'</strong></div>'); return false; 
				}
				else 
				{
					$('input[type="email"][name="recover-email-address"]').val(' ');
					$('.popup-message-box').html('<div class="alert alert-success">'+data.message+'</div>');
				}
			}
			
		});
		
	},
	changePassword : function(e)
	{
		$('.error-change-password').hide();
		
		var password = $('input[type="password"][name="password"]').val();
		var cpassword = $('input[type="password"][name="cpassword"]').val();
		var userId = $('input[type="hidden"][name="user-id"]').val();
		
		if(password == "" || cpassword == "")
		{
			$('.error-change-password').show();
			$('.error-change-password').html('<strong>Please enter password first</strong>');
			return false;
		}
		
		if(password != cpassword)
		{
			$('.error-change-password').show();
			$('.error-change-password').html('<strong>Password and confirm password do not match</strong>');
			return false;
		}
		
		
		/* Since Both the passwords are equal send this to change password controller*/
		
		var newForm = jQuery('<form>', {
	        'action': BASE_URL + 'admin/change-password',
	        'target': '_top',
	        'method':'post'	
	    }).append(jQuery('<input>', {
	        'name': 'redirect-url',
	        'type': 'hidden',
	        'value': location.pathname,
	    })).append(jQuery('<input>', {
	        'name': 'password',
	        'type': 'hidden',
	        'value': password,
	    })).append(jQuery('<input>', {
	        'name': 'cpassword',
	        'type': 'hidden',
	        'value': cpassword,
	    })).append(jQuery('<input>', {
	        'name': 'user-id',
	        'type': 'hidden',
	        'value': userId,
	    }));
		
		newForm.appendTo("body").submit();
//		
	},
	hidePasswordError : function(email)
	{
		$('.error-change-password').hide();
	},
	isValidateEmail : function(email)
	{
		var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
	    return pattern.test(email);
	},
	resetUserPassword : function(e)
	{
		var userId = $('input[type="hidden"][name="user-id"]').val();
		var password = $('input[type="text"][name="password"]').val();
		payload = {'user-id':userId, 'password':password}
		request = {'acid':10004,'payload':JSON.stringify(payload)}
		/* Fire Ajax */
		$.ajax({
			url :BASE_URL+'admin/ajax',
			method: 'post',
			data :{request:request},
			dataType:'json',
			success : function(data) 
			{
				$('#reset-user-password-model').modal('hide');
				
				if(data.flag == 0)
				{
					$('.right_col').prepend('<div class="message alert alert-danger"><strong>'+data.message+'</strong></div>');
				}
				else
				{
					$('.right_col').append('<div class="alert alert-succes><strong>'+data.message+'</strong></div>');
				}
				
			}
			
		});
	},
	blockUser : function(e)
	{
		var userId = $('input[type="hidden"][name="user-id"]').val();
		
		payload = {'user-id':userId}
		request = {'acid':10005,'payload':JSON.stringify(payload)}
		/* Fire Ajax */
		$.ajax({
			url :BASE_URL+'admin/ajax',
			method: 'post',
			data :{request:request},
			dataType:'json',
			success : function(data) 
			{
				$('#block-user-password-model').modal('hide');
				
				if(data.flag == 0)
				{
					$('.right_col').prepend('<div class="message alert alert-danger"><strong>'+data.message+'</strong></div>');
				}
				else
				{
					$('.right_col').append('<div class="alert alert-succes><strong>'+data.message+'</strong></div>');
				}
			}
			
		});
	},
	unBlockUser : function(e)
	{
		var userId = $('input[type="hidden"][name="user-id"]').val();
		
		payload = {'user-id':userId}
		request = {'acid':10006,'payload':JSON.stringify(payload)}
		/* Fire Ajax */
		$.ajax({
			url :BASE_URL+'admin/ajax',
			method: 'post',
			data :{request:request},
			dataType:'json',
			success : function(data) 
			{
				$('#unblock-user-password-model').modal('hide');
				
				if(data.flag == 0)
				{
					$('.right_col').prepend('<div class="message alert alert-danger"><strong>'+data.message+'</strong></div>');
				}
				else
				{
					$('.right_col').append('<div class="alert alert-succes><strong>'+data.message+'</strong></div>');
				}
			}
			
		});
	},
	sendInvitationToJoinPopup : function(e)
	{
		var coupon = $(this).data('couponCode');
		$('#send_new_user_invite_modal').find('input[type="text"][name="coupon-code"]').val(coupon);
		$('#send_new_user_invite_modal').modal('show');
		
	},
	
	sendInvitationToJoin : function(e)
	{
		var emails = $('#tags_2').val();
		var membershipType = $('select[name="membership-type"]').val();
		var coupon = $('input[type="text"][name="coupon-code"]').val();
		
		if(emails == "")
		{
			$('.manage_coupon_error').html('Please enter emails first');
			$('.manage_coupon_error').show();
			return false;
		}
		
		var emailArr = emails.split(',');
		$(emailArr).each(function(k,v){
			if(!Util.isValidateEmail(v))
			{
				$('.manage_coupon_error').html('Please enter correct emails address');
				$('.manage_coupon_error').show();
				return false;
			}
		});
		
		if(membershipType == "select")
		{
			$('.manage_coupon_error').html('Please select a membership type');
			$('.manage_coupon_error').show();
			return false;
		}
		$('.manage_coupon_error').hide();
		
		/* Do an ajax request to ensure that all captured data is sent to ajax controller to record in database */
		
		payload = {'emails':emails, 'membership-type':membershipType, 'coupon':coupon }
		request = {'acid':10008,'payload':JSON.stringify(payload)}
		/* Fire Ajax */
		$.ajax({
			url :BASE_URL+'admin/ajax',
			method: 'post',
			data :{request:request},
			dataType:'json',
			success : function(data) 
			{
				$('#block-user-password-model').modal('hide');
				
				if(data.flag == 0)
				{
					$('.right_col').prepend('<div class="message alert alert-danger"><strong>'+data.message+'</strong></div>');
				}
				else
				{
					$('.right_col').append('<div class="alert alert-succes><strong>'+data.message+'</strong></div>');
				}
			}
			
		});
		
	},
	
	addCountriesAvailableIn : function(e)
	{
		console.log("Hello");
		if($('input[type="text"][name="country"]').val() != '')
		{
			var country = $('input[type="text"][name="country"]').val();
					
			var option = $('#country-list').find('option').filter(function(){ 
				return $.trim( $(this).val() ) === country; 
			});
			
			var id = option.attr('data-id');
			
			countryIds.push(id);		
			
			var newcountry = $('<div class="country-label"><a class="remove-country" data-id="'+id+'"><i class="fa fa-times" aria-hidden="true"></i></a>'+country+'</div>');
			
			$('input[type="hidden"][name="hidden-country-ids"]').val(countryIds);
			$('.countries-label').children('.x_content').append(newcountry);
			
			$('input[type="text"][name="country"]').val('');
		}
	},
	
	removeCountriesAvailableIn : function(e)
	{
		var dataId = $(this).data('id');
			
		countryIds = jQuery.grep(countryIds, function(value) {
		  return value != dataId;
		});
		
		$(this).parent('.country-label').remove();
		
		$('input[type="hidden"][name="hidden-country-ids"]').val(countryIds);
	},
	
	enablePointsTextBox : function(e)
	{
		
		if($(this).is(':checked')) { $('input[type="text"][name="points"]').prop('disabled', false); }
		else {  $('input[type="text"][name="points"]').prop('disabled', true); }
	},
	
	previewUploadedImage : function($this, holder)
	{
		holder.empty();
		var file, img, flag = true;
		if ((file = $this.files[0])) 
	    {
			var reader = new FileReader();
			reader.onload = function (e) 
			{
				$("<img />", { "src": e.target.result, "class": "thumbimage_220"}).appendTo(holder);
				holder.append('<input type="hidden" name="hidden_country_image" value="'+e.target.result+'"/>');
			}
			reader.readAsDataURL($this.files[0]);
			
	    }
	},
	showAlertModal : function(message)
	{
		html = '';
		html +='<div id="alert_modal" class="modal fade" role="dialog">';
			html +='<div class="modal-dialog modal-sm">';
				html +='	<div class="modal-content">';
					html +='<div class="modal-header">';
						html +='<button type="button" class="close" data-dismiss="modal">&times;</button>';
						html +='<h4 class="modal-title">Alert</h4>';
					html +='</div>';
					html +='<div class="modal-body">';
						html +='<p>'+message+'</p>';
					html +='</div>';
					html +='<div class="modal-footer">';
						html +='<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
					html +='</div>';
				html +='</div>';
			html +='</div>';
		html +='</div>';
		
		if($('#alert_modal').length > 0) { $('#alert_modal').remove(); }
		$('body').append(html);
		
		$('#alert_modal').modal('show');
	},
	
	
}

