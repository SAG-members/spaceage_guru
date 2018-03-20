<div class="">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title"><h2><?php echo $title;?></h2><div class="clearfix"></div></div>
				<div class="x_content">
					<div id="datatable_wrapper"
						class="dataTables_wrapper form-inline dt-bootstrap no-footer">
						<div class="row">
							<div class="col-sm-12">
								<table id="datatable"
									class="table table-striped table-bordered dataTable no-footer"
									role="grid" aria-describedby="datatable_info">
									<thead>
										<tr role="row">
											<th>Id</th>
											<th>Transaction Id</th>
											<th>Item</th>
											<th>Gross Amount</th>
											<th>Ordered By</th>
											<th>Purchase Date</th>
											
										</tr>
									</thead>
									<tbody> 
									<?php ?>
									<?php if($orders): foreach ($orders as $o):?>
									<tr>
										<td><?php echo $o->{Psss_purchase_history::_ID};?></td>
										<td><?php echo $o->{Psss_purchase_history::_TXN_ID};?></td>
										<td><?php echo $o->{Psss_purchase_history::_ITEM_NAME};?></td>
										<td><?php echo $o->{Psss_purchase_history::_CURRENCY}.' '.$o->{Psss_purchase_history::_GROSS_AMOUNT};?></td>
										<td><?php echo generate_user_id($o->{Psss_purchase_history::_USER_ID})?></td>
										<td><?php echo $o->{Psss_purchase_history::_PURCHASE_DATE}; ?></td>
										
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
