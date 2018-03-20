    <?php 
	$action = base_url('admin/membership/add');
	$ptitle = ''; $description = ''; $mprice = 0; $qprice = 0; $yprice = 0; $logo='';
	$public = ""; $registered = ""; $upgraded = ""; $memberA = ""; $memberB = ""; $memberC = ""; $remainderService = "";
	$unitPrice = ""; $creditPoints = "";
	$maxUnitsJson = '';
	$perLevelUnit = ""; $publicUnit = ""; $registeredUnit = "";
	$upgradedUnit = ""; $membershipaUnit = ""; $membershipbUnit = "";
	$membershipcUnit = "";
	$totalMaxAmount = "";
	
	if(isset($membership))
	{
		$action = base_url('admin/membership/edit/'.$membership->{Membership::_ID});
		$ptitle = $membership->{Membership::_MEMBERSHIP_TITLE};
		$description = $membership->{Membership::_MEMBERSHIP_DESCRIPTION};
		$logo = '<img style="width:250px;" src="'.base_url(Template::_ADMIN_UPLOAD_DIR.$membership->{Membership::_MEMBERSHIP_LOGO}).'" alt="'.$membership->{Membership::_MEMBERSHIP_TITLE}.'" title="'.$membership->{Membership::_MEMBERSHIP_TITLE}.'">';
		$mprice = $membership->{Membership::_MEMBERSHIP_MONTHLY_PRICE};
		$qprice = $membership->{Membership::_MEMBERSHIP_QUARTERLY_PRICE};
		$yprice = $membership->{Membership::_MEMBERSHIP_YEARLY_PRICE};
		$unitPrice = $membership->{Membership::_UNIT_PRICE};
		$creditPoints = $membership->{Membership::_CREDIT_POINT};
		$totalMaxAmount = $membership->{Membership::_TOTAL_MAX_AMOUNT};
		
		if(empty($membership->{Membership::_MEMBERSHIP_LOGO})) $logo = '';
		
		$maxUnitsJson = $membership->{Membership::_MAX_UNIT};
		$maxUnits = json_decode($membership->{Membership::_MAX_UNIT}, true);
		
		
		switch ($membership->{Membership::_MEMBERSHIP_TYPE})
		{
			case 1 : $public='checked'; break;
			case 2 : $registered='checked'; break;
			case 3 : $upgraded='checked'; break;
			case 4 : $memberA='checked'; break;
			case 5 : $memberB='checked'; break;
			case 6 : $memberC='checked'; break;
			case 7 : $remainderService='checked'; break;
		}
		
		
		if(!empty($maxUnits))
		{
			foreach ($maxUnits as $k=>$v)
			{
				switch ($v['k'])
				{
					case 'per-level-unit': $perLevelUnit = $v['v']; break;
					case 'public-unit': $publicUnit = $v['v'];  break;
					case 'registered-unit': $registeredUnit = $v['v'];  break;
					case 'upgraded-unit': $upgradedUnit = $v['v'];  break;
					case 'membershipa-unit': $membershipaUnit = $v['v'];  break;
					case 'membershipb-unit': $membershipbUnit = $v['v'];  break;
					case 'membershipc-unit': $membershipcUnit = $v['v'];  break;
				}
			}
		}
		 
	}

?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2><?php echo $title;?></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br>
				<form id="demo-form2" action="<?php echo $action?>"  method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
					
					<label>Membership Type</label>
					<div class="form-group">
						<div class="radio visibility-block row">
							<div class="col-md-3">
								<label> <input type="radio" class="flat" name="visibility" value="1" <?php echo $public;?> checked> Public </label>
                            	<label class="mar-t-10"> <input type="radio" class="flat" name="visibility" value="4" <?php echo $memberA;?>> Membership A </label>
                            	
							</div>
							<div class="col-md-3">
								<label> <input type="radio" class="flat" name="visibility" value="2" <?php echo $registered;?>> Registered Users </label>
								<label class="mar-t-10"> <input type="radio" class="flat" name="visibility" value="5" <?php echo $memberB;?>> Membership B </label>
                            </div>
							<div class="col-md-3">
								<label> <input type="radio" class="flat" name="visibility" value="3" <?php echo $upgraded;?>> Upgraded Users </label>								
                            	<label class="mar-t-10"> <input type="radio" class="flat" name="visibility" value="6" <?php echo $memberC;?>> Membership C </label>
							</div>
                            <div class="col-md-3">
                            	<label> <input type="radio" class="flat" name="visibility" value="7" <?php echo $remainderService;?>> Remainder Service </label>
                            	<label class="mar-t-10"> <input type="radio" class="flat" name="visibility" value="8" <?php echo $remainderService;?>> Membership D </label>                            	
                            </div>
                            
                          </div>
					</div> 
					
					<div class="form-group mar-t-20">
						<input type="text" class="form-control" name="title" value="<?php echo $ptitle;?>" required>
					</div>
					
					<div class="form-group mar-t-20">
						<textarea name="description" id="summernote"><?php echo $description;?></textarea>
					</div>
					
					<div id="dropzone" class="form-group mar-t-20">
						 <p>Drag multiple files to the box below for multi upload or click to select files.</p>
	                    <div class="dropzone" id="mydropzone"></div>
	                    <br />
	                    
					</div>
					<?php if(isset($documents)): ?>
					<label>Attached Documents:</label><br/>
					<?php foreach ($documents as $d):?>
						<a class="mar-r-10" href="<?php echo base_url('assets/uploads/document/'.$d->{Membership_document_model::_DOCUMENT})?>"><i class="fa fa-file-pdf-o fa-4x" aria-hidden="true"></i></a>
					<?php endforeach; endif;?>
										
					<div class="form-group mar-t-20">
						<label>Is Membership Package ?</label>
						<div class="checkbox"  style="display: inline-block">
                            <label><input type="checkbox" class="flat" name="is_membership_package" value="1"></label>
                        </div>						
					</div>					
					<div class="form-group mar-t-20">
						<label>Select Parent Product</label>
						<select class="form-control" name="parent_id" required>
							<option value="0">Select Parent</option>
							<?php if($products): foreach ($products as $p) :?>
							<?php $selected = ' '; if($membership->{Membership::_PARENT_ID} == $p->{Membership::_ID}){$selected = 'selected="selected"';}?>
							<option value="<?php echo $p->{Membership::_ID}?>" <?php echo $selected;?>><?php echo $p->{Membership::_MEMBERSHIP_TITLE}?></option>
							<?php endforeach; endif;?>
						</select>
					</div>
					
					<div class="form-group mar-t-20">
						<div class="row">
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">EUR</span>
								  	<input type="text" class="form-control" name="mprice" placeholder="Monthly Price" value="<?php echo $mprice;?>">	
								</div>
							</div>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">EUR</span>
								  	<input type="text" class="form-control" name="qprice" placeholder="Quarterly Price" value="<?php echo $qprice;?>">	
								</div>
							</div>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">EUR</span>
								  	<input type="text" class="form-control" name="yprice" placeholder="Yearly Price" value="<?php echo $yprice;?>">	
								</div>
							</div>
						</div>
					</div>
					
					<div class="form-group mar-t-20">
						<div class="row">
							<div class="col-md-4">
								<label>Product Logo</label>
								<div class="fileUpload btn btn-primary"><span>Upload Logo</span><input type="file" class="upload" id="membership-logo" name="file"/></div>
								
							</div>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">EUR</span>
								  	<input type="text" class="form-control" name="unit_price" placeholder="Unit Price" value="<?php echo $unitPrice;?>">	
								</div>
							</div>
							<div class="col-md-4">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">EUR</span>
								  	<input type="text" class="form-control" name="credit_points" placeholder="How many Points buyer gains" value="<?php echo $creditPoints;?>">	
								</div>
							</div>
						</div>
					</div>
					
					
					<div class="form-group mar-t-20">
						<div class="row">
							<div class="col-md-4">
								<div class="logo-preview"><?php echo $logo;?></div>
							</div>
							<div class="col-md-8">
								<div class="row">
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon1">Per Level</span>
									  	<input type="text" class="form-control max-unit" name="per-level-unit" placeholder="Max Unit" value="<?php echo $perLevelUnit;?>">	
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon1">Public</span>
									  	<input type="text" class="form-control max-unit" name="public-unit" placeholder="Max Unit" value="<?php echo $publicUnit;?>">	
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon1">Registered User</span>
									  	<input type="text" class="form-control max-unit" name="registered-unit" placeholder="Max Unit" value="<?php echo $registeredUnit;?>">	
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon1">Upgraded User</span>
									  	<input type="text" class="form-control max-unit" name="upgraded-unit" placeholder="Max Unit" value="<?php echo $upgradedUnit;?>">	
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon1">Membership A</span>
									  	<input type="text" class="form-control max-unit" name="membershipa-unit" placeholder="Max Unit" value="<?php echo $membershipaUnit;?>">	
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon1">Membership B</span>
									  	<input type="text" class="form-control max-unit" name="membershipb-unit" placeholder="Max Unit" value="<?php echo $membershipbUnit;?>">	
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon1">Membership C</span>
									  	<input type="text" class="form-control max-unit" name="membershipc-unit" placeholder="Max Unit" value="<?php echo $membershipcUnit;?>">	
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon" id="basic-addon1">Total Max Amount</span>
									  	<input type="text" class="form-control max-unit" name="total-max-amount" placeholder="Total Max Amount" value="<?php echo $totalMaxAmount;?>">	
									</div>
								</div>
								
								</div>
							</div>
							
						</div>
					
					</div>
					
					<div class="ln_solid"></div>
					<div class="form-group mar-t-20">
						<input type="hidden" name="max_unit" value='<?php echo $maxUnitsJson;?>'/>
						<div><button id="send" type="submit" class="btn btn-success">Submit</button></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>



<script>

	$(function(){
		
		$('.max-unit').on('blur', function(e){

			unitArr = [];

			$('.max-unit').each(function(k,v){
				var name =  $(v).attr('name');
				var value = $(v).val();
				console.log(name);
				if(value)
	 			{
					var unit ={};
					unit['k'] = $(v).attr('name');
	 				unit['v'] = $(v).val();
	 				unitArr.push(unit);
	 			}
			});

			$('input[type="hidden"][name="max_unit"]').val(JSON.stringify(unitArr));
			
		});
		
		Dropzone.autoDiscover = false;
		/*
		$("div.dropzone").dropzone({ 
			url: BASE_URL+"/ajax/dropzone", 
			uploadMultiple:true, 
			parallelUploads:7,
			maxFiles :7,
			removeFiles : true	
		});
		*/
		var accept = ".pdf";
		var myDropzone = new Dropzone("div.dropzone", { 
			acceptedFiles: accept,	
			url: BASE_URL+"/ajax/dropzone",
			uploadMultiple: false,
			createImageThumbnails: true,
		    addRemoveLinks: true,
			maxFiles: 7,
			maxfilesexceeded: function(file) {
			        this.removeAllFiles();
			        this.addFile(file);
			},
			init: function () {
				var drop = this;
				this.on("addedfile", function(file) {

					// Create the remove button
					var removeButton = Dropzone.createElement("<div class=\"remove\"><i class=\"fa fa-times-circle-o\" aria-hidden=\"true\"></i> Remove File</idv>");

					// Capture the Dropzone instance as closure.
					var _this = this;

					// Listen to the click event
					removeButton.addEventListener("click", function(e) {
					// Make sure the button click doesn't submit the form:
					e.preventDefault();
					e.stopPropagation();

					// Remove the file preview.
					_this.removeFile(file);
					// If you want to the delete the file on the server as well,
					// you can do the AJAX request here.
					});

					// Add the button to the file preview element.
					file.previewElement.appendChild(removeButton);
					});

									
// 			    this.on('error', function (file, errorMessage) 
// 				{
// 					if (errorMessage.indexOf('Error 404') !== -1) 
// 					{
// 						var errorDisplay = document.querySelectorAll('[data-dz-errormessage]');
// 						errorDisplay[errorDisplay.length - 1].innerHTML = 'Error 404: The upload page was not found on the server';
// 					}
// 					if (errorMessage.indexOf('File is too big') !== -1) 
// 					{
// 						alert('i remove current file');
// 			        	drop.removeFile(file);
// 					}
// 				});

			    this.on("success", function(file, response) {
				    response = JSON.parse(response);
				    
					$('form').append('<input type="hidden" name="hidden_files[]" value="'+response.result+'"/>');    
				});	
			},
			removedfile: function(file) { 
			      $.post('/url/to/delete/file', {filename: file.name}, onsuccess)
			    }		  
		});
					
		
		
		/*
		 var myDropzone = new Dropzone("div.dropzone");

		 myDropzone.on("addedfile", function(file) {
		    /* Maybe display some more file information on your page 
		 });
		*/
		
		
	});

	function onsuccess()
	{
		console.log("Hello");
	}
</script>