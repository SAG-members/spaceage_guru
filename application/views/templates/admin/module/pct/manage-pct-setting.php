<div class="">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title"><h2><?php echo $title;?></h2><div class="clearfix"></div></div>
				<div class="x_content">
					<div id="datatable_wrapper"
						class="dataTables_wrapper form-inline dt-bootstrap no-footer">
						<div class="row action-btns mar-b-20">
							<div class="col-sm-6">
							</div>
							<div class="col-sm-6">
								<a class="btn btn-success btn-xs" name="btn-add-new-rate" data-toggle="modal" data-target="#add_new_rate_modal">Add Rate</a>								
							</div>
							<div class="clearfix"></div>
						</div>
					
						<div class="row">
							<div class="col-sm-12">
								<table id="datatable"
									class="table table-striped table-bordered dataTable no-footer"
									role="grid" aria-describedby="datatable_info">
									<thead>
										<tr role="row">											
											<th>PCT Rate</th>
											<th>Country Name</th>
											<th>Country Symbol</th>
											<th>Conversion Rate</th>
											<th>Date Created</th>												
										</tr>
									</thead>
									<tbody>
									<?php if($pctConversions): foreach ($pctConversions as $pct):?>
									<tr>										
										<td><?php echo $pct->{pct_setting::_PCT_RATE};?></td>
										<td><?php echo $this->currency->get_by_id($pct->{pct_setting::_CURRENCY}, Currency::_NAME)?></td>
										<td><?php echo $this->currency->get_by_id($pct->{pct_setting::_CURRENCY}, Currency::_SYMBOL)?></td>
										<td><?php echo $pct->{pct_setting::_CONVERSION_RATE};?></td>
										<td><?php echo $pct->{pct_setting::_DATE_CREATED};?></td>										
									</tr>
									<?php endforeach; endif;?>
									</tbody>
								</table>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>	


<!--  Add New Country Data Modal Start Here -->
<div id="add_new_rate_modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		 
		<!-- Modal content-->
		<div class="modal-content">
			<form action="<?php echo base_url('admin/add/pct-rate'); ?>" method="post">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal">&times;</button>
    				<h4 class="modal-title">Add New Rate</h4>
    			</div>
    			<div class="modal-body">
    				<div class="form-group">
    					<input type="text" name="pct-rate" class="form-control" Placeholder="PCT Rate"/>	
    				</div>
    				<div class="form-group">
    					<select class="form-control" name="currency">
    						<?php if($currencies): foreach ($currencies as $cur) :?>
    						<option value="<?php echo $cur->{Currency::_ID} ?>"><?php echo $cur->{Currency::_NAME}."-".$cur->{Currency::_SYMBOL} ?></option>
    						<?php endforeach; endif;?>
    					</select>	
    				</div>
    				<div class="form-group">
    					<input type="text" name="conversion-rate" class="form-control" Placeholder="Conversion Rate"/>
    				</div>
    			</div>
    			<div class="modal-footer">
    				<button type="submit" class="btn btn-success" name="btn-add-rate" value="2">Add</button>
    				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    			</div>
			</form>
		</div>

	</div>
</div>

<!-- Data Modal Ends Here -->
