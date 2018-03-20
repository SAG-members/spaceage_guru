<h2><?php echo $membership->{Membership_model::_MEMBERSHIP_TITLE}?></h2>
<div class="membership-text">
	<?php 
	
    	echo $membership->{Membership_model::_MEMBERSHIP_DESCRIPTION};
    	
//     	if($membership->{Membership_model::_MEMBERSHIP_TITLE_SLUG} != 'Registered-User'):
    	$relatedProducts = $this->membership->get_child_products($membership->{Membership_model::_ID});
	   	
	?>
	<!-- Get information of parent product and show here -->
	
	<div>
		
		<?php if(!empty($relatedProducts)) : ?>
		<h3>Related Product</h3> 
		<?php foreach ($relatedProducts as $r):?>
		<br/>
		<a target="_new" href="<?php echo base_url('membership/'.$r->{Membership_model::_MEMBERSHIP_TITLE_SLUG})?>">
			<?php echo $r->{Membership_model::_MEMBERSHIP_TITLE}?>
		</a>
		<?php endforeach; endif;?>
	</div>
	<br/><br/>
	
	
	
	<?php if($membership->{Membership_model::_MEMBERSHIP_TYPE} != 2) :?>		
	<div>
		<form method="post" action="<?php echo base_url('pay')?>">
			<input type="hidden" name="item_id" value="<?php echo $membership->{Membership_model::_ID};?>"/>
			<input type="hidden" name="item_name" value="<?php echo $membership->{Membership_model::_MEMBERSHIP_TITLE};?>"/>
			<input type="hidden" name="category_id" value="<?php echo $membership->{Membership_model::_CATEGORY_ID};?>"/>
			<input type="hidden" name="price"/>
			<input type="hidden" name="mode" value="paypal"/>
			
			
			<!-- Pay with paypal -->
			<div class="panel panel-default ">
            	<div class="panel-heading">
               		<h4 class="panel-title ">
                   		<span style="color: #089bd3; cursor:pointer" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Pay With Paypal</span>
                   		<ul class="nav navbar-right panel_toolbox">
								<li><a style="color: #089bd3; cursor:pointer" class="collapse-link"><i class="fa fa-chevron-down"  data-toggle="collapse" data-parent="#accordion" href="#collapseOne"></i></a></li>
		                    </ul>
		                <div class="clearfix"></div>
               		</h4>
            	</div>
            	<div id="collapseOne" class="panel-collapse collapse">
               		<div class="panel-body">
               			<div class="row">
               				<?php if($membership->unit_price != 0) :?>
               				<input type="hidden" name="amount" value="<?php echo $membership->unit_price; ?>"/>
               				<div class="col-md-6">
                   				<div class="input-group">
    								<span class="input-group-addon" id="basic-addon1"><input type="radio" name="subscription_type" value="1" checked/></span>
    							  	<input type="text" class="form-control" placeholder="Username" value="EUR <?php echo $membership->{Membership_model::_UNIT_PRICE}?> " aria-describedby="basic-addon1" disabled	>
    							  	<input type="hidden" name="price" value="<?php echo $membership->{Membership_model::_UNIT_PRICE}?>"/>
    							</div>
                   			</div>
               				<?php else :?>
                   			<div class="col-md-6">
                   				<div class="input-group">
    								<span class="input-group-addon" id="basic-addon1"><input type="radio" name="subscription_type" value="1" checked/></span>
    							  	<input type="text" class="form-control" placeholder="Username" value="EUR <?php echo $membership->{Membership_model::_MEMBERSHIP_MONTHLY_PRICE}?> Monthly" aria-describedby="basic-addon1" disabled	>
    							</div>
                   			</div>
                   			<div class="col-md-6">
                   			    <?php if($membership->{Membership_model::_MEMBERSHIP_TYPE} != 7) :?>
                   				<div class="input-group">
    								<span class="input-group-addon" id="basic-addon1"><input type="radio" name="subscription_type" value="2"/></span>
    							  	<input type="text" class="form-control" placeholder="Username" value="EUR <?php echo $membership->{Membership_model::_MEMBERSHIP_YEARLY_PRICE}?> Yearly" aria-describedby="basic-addon1" disabled	>
    							  	<input type="hidden" name="price" value="<?php echo $membership->{Membership_model::_MEMBERSHIP_YEARLY_PRICE}?>"/>
    							</div>
    							<?php endif;?>
                   			</div>
                   			<?php endif;?>
               			</div>
        	   			<div class="clear"></div>
        	   			<div class="mar-t-10"></div>
            			<input name="btn-pay" type="submit" value="Make Payment" class="btn btn-primary" data-button="Paypal">       		
               		</div>
               	</div>
            </div>
          </form>  
          
            <!-- Pay with Cryptonator -->
            <div class="panel panel-default ">
            	<div class="panel-heading">
               		<h4 class="panel-title ">
                   		<span style="color: #089bd3; cursor:pointer" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Pay With Cryptonator</span>
                   		<ul class="nav navbar-right panel_toolbox">
								<li><a style="color: #089bd3; cursor:pointer" class="collapse-link" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-chevron-down"  data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"></i></a></li>
		                    </ul>
		                <div class="clearfix"></div>
               		</h4>
            	</div>
            	<div id="collapseTwo" class="panel-collapse collapse">
               		<div class="panel-body">
               			<div class="row">
               				<?php if($membership->unit_price != 0) : $amount = $membership->{Membership_model::_UNIT_PRICE}?>
               				<input type="hidden" name="invoice_amount" value="<?php echo $membership->unit_price; ?>"/>
               				<div class="col-md-6">
                   				<div class="input-group">
    								<span class="input-group-addon" id="basic-addon1"><input type="radio" name="subscription_type" value="1" checked/></span>
    							  	<input type="text" class="form-control" placeholder="Username" value="EUR <?php echo $membership->{Membership_model::_UNIT_PRICE}?> " aria-describedby="basic-addon1" disabled	>
    							</div>
                   			</div>
               				<?php else : $amount = $membership->{Membership_model::_MEMBERSHIP_MONTHLY_PRICE} ?>
                   			<div class="col-md-6">
                   				<div class="input-group">
    								<span class="input-group-addon" id="basic-addon1"><input type="radio" name="cryptonator_subscription_type" value="1" checked/></span>
    							  	<input type="text" class="form-control" placeholder="Username" value="EUR <?php echo $membership->{Membership_model::_MEMBERSHIP_MONTHLY_PRICE}?> Monthly" aria-describedby="basic-addon1" disabled	>
    							</div>
                   			</div>
                   			<div class="col-md-6">
                   				<div class="input-group">
                   				    <?php if($membership->{Membership_model::_MEMBERSHIP_TYPE} != 7) :?>
    								<span class="input-group-addon" id="basic-addon1"><input type="radio" name="cryptonator_subscription_type" value="2"/></span>
    							  	<input type="text" class="form-control" placeholder="Username" value="EUR <?php echo $membership->{Membership_model::_MEMBERSHIP_YEARLY_PRICE}?> Yearly" aria-describedby="basic-addon1" disabled	>
    							  	<?php endif;?>
    							  	<input type="hidden" name="hidden_monthly_subscription" value="<?php echo $membership->{Membership_model::_MEMBERSHIP_MONTHLY_PRICE}?>"/>
    							  	<input type="hidden" name="hidden_yearly_subscription" value="<?php echo $membership->{Membership_model::_MEMBERSHIP_YEARLY_PRICE}?>"/>
    							  	
    							</div>
                   			</div>
                   			<?php endif; ?>
               			</div>
        	   			<div class="clear"></div>
        	   			<div class="mar-t-10"></div>
        	   			<form method="GET" action="https://api.cryptonator.com/api/merchant/v1/startpayment">
                    		<input type="hidden" name="merchant_id" value="f3d2e6eebd0ef1857dbd12fcd4c6f997">
                    		<input type="hidden" name="item_name" value="<?php echo $membership->{Membership_model::_MEMBERSHIP_TITLE}?>">
                    		<input type="hidden" name="invoice_currency" value="eur">
                    		<input type="hidden" name="invoice_amount" value="<?php echo $amount; ?>" data-type="number">
                    		<input type="hidden" name="language" value="en">
                    		<input type="submit" name="btn_cryptonaror_submit" class="btn btn-primary" value="Make Payment">
                    	</form>
            			       		
               		</div>
               	</div>
            </div>
            
            <!--  Pay via Direct Payment to company account -->
            <div class="panel panel-default ">
            	<div class="panel-heading">
               		<h4 class="panel-title ">
                   		<span style="color: #089bd3; cursor:pointer" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Direct Deposit in Company Bank Account</span>
                   		<ul class="nav navbar-right panel_toolbox">
								<li><a style="color: #089bd3; cursor:pointer" class="collapse-link"><i class="fa fa-chevron-down"  data-toggle="collapse" data-parent="#accordion" href="#collapseThree"></i></a></li>
		                    </ul>
		                <div class="clearfix"></div>
               		</h4>
            	</div>
            	<div id="collapseThree" class="panel-collapse collapse">
               		<div class="panel-body">
               		   <p style="color:#000 !important;">Receiver : Axis Mundi Oü</p>
               		   <p style="color:#000 !important;">Bank Account : EE977700771002654084</p>
               		   <p style="color:#000 !important;">BIC/SWIFT: LHVBEE22</p>
					   <p style="color:#000 !important;">Bank Name: AS LHV Pank</p>
					   <p style="color:#000 !important;">Address: Tartu mnt 2, 10145 Tallinn Estonia</p>
					   <p style="color:#000 !important;">User/Member number and purchased item</p>
					   <p style="color:#000 !important;">eg. U10565 Membership 1000 &euro;</p>
					   <p style="color:#000 !important;">or</p>
					   <p style="color:#000 !important;">M10999 Club credit PCT worth of 1000 &euro;</p>
               		</div>
               	</div>
          </div>
		  
		  	
	</div>
	
	<?php endif;?>

</div>
<div class="clearfix"></div>

<script>
$('input[type="radio"][name="cryptonator_subscription_type"]').on('click', function(){console.log("helloe");
	if($(this).val() == 1){
		var newValue = $('input[type="hidden"][name="hidden_monthly_subscription"]').val();	
	}
	else if($(this).val() == 2){
		var newValue = $('input[type="hidden"][name="hidden_yearly_subscription"]').val();
	}

	$('input[type="submit"][name="btn_cryptonaror_submit"]').val('EUR '+newValue);
	$('input[type="hidden"][name="invoice_amount"]').val(newValue);
		
});
		

</script>

