<div class="profile">
	<div class="panel panel-default mar-t-20">
		<div class="panel-heading">
			<h2>E Business</h2>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="tabs widget">
					<ul class="nav nav-tabs widget">
						<li  class="active"><a data-toggle="tab" href="#pct-ewallet-tab">
								PCT Wallet <span class="menu-active"></span>
						</a></li>
						<li class=""><a data-toggle="tab" href="#pct-amount-transfer-tab">
								PCT Transfer <span class="menu-active"></span>
						</a></li>
						<li class=""><a data-toggle="tab" href="#profile-tab">
								Escrow <span class="menu-active"></span>
						</a></li>
						
					</ul>
					<div class="tab-content">
						<div id="pct-ewallet-tab" class="tab-pane  active">
							<div class="pad-20">
							<input type="text" class="password" name="pct-wallet-amount" value="PCT <?php echo $profile->{User::_PCT_WALLET_AMOUNT}; ?>" readonly/>
														
							<?php if(!empty($recentTransactions)):?>
							<h3> Recent Transactions</h3>
							<table class="table table-bordered">
    							<thead>
    								<tr>
    									<td>Id</td>
    									<td>Transaction Id</td>
    									<td>Transaction Type</td>
    									<td>Transaction Points</td>
    									<td>Transaction Date</td>
    								</tr>
    							</thead>
    							<tbody>
							<?php foreach ($recentTransactions as $k => $r):?>
								<tr>
									<td><?php echo ++$k; ?></td>
									<td><?php echo $r->{Pct_transaction::_TXN_ID}; ?></td>
									<td><?php echo $r->{Pct_transaction::_TXN_TYPE}; ?></td>
									<td>PCT <?php echo $r->{Pct_transaction::_TXN_POINTS}; ?></td>
									<td><?php echo $r->{Pct_transaction::_DATE_CREATED}; ?></td>
								</tr>
							<?php endforeach;?>
								</tbody>	
							</table>
							<?php endif;?>
							
							</div>
						</div>
						
						<!-- PCT AMOUNT TRANSFER TAB -->
						<div id="pct-amount-transfer-tab" class="tab-pane">
							<div class="pad-20">
								<form action="<?php echo base_url('transfer/pct'); ?>" name="form-horizontal" method="post">
									<div class="form-group">
										<label>Username</label>
										<input type="text" name="user-name" class="password" value="<?php echo $profile->{User::_USERNAME}; ?>" readonly>
									</div>
									<div class="form-group">
										<label>To User</label>										
										<select class="specified_user_value password" name="to-account" name="to-account">
											<option value="select" disabled selected>Select</option>
											<?php if($accounts): foreach ($accounts as $acc):?>
											<option value="<?php echo $acc->{User::_ID}?>"><?php echo $acc->{User::_USERNAME}?></option>
											<?php endforeach; endif; ?>
										</select>
									</div>
									<div class="form-group">
										<label>Topic</label>
										<textarea style="height: 100px;" class="password" name="pct-topic"></textarea>
									</div>
									<div class="form-group">
										<label>Message</label>
										<textarea style="height: 100px;" rows="5" cols="" class="password" name="pct-message"></textarea>
									</div>
									<div class="form-group">
										<label>PCT Balance</label>
										<input type="text" name="pct-balance" class="password" value="PCT <?php echo $profile->{User::_PCT_WALLET_AMOUNT}; ?>" readonly>
									</div>
									<div class="form-group">
										<label>PCT Transfer</label>
										<input type="text" class="password" name="pct-transfer-points">
									</div>
									<div class="form-group">
										<label>Password</label>
										<input type="password" class="password" name="user-password">
									</div>
									<div class="form-group">									
										<input type="submit" class="btn-round-red password" name="pct-transfer-points-submit-btn">
									</div>
								</form>
							</div>
						</div>
						
						<!--  ESCROW TAB -->
						<div id="profile-tab" class="tab-pane">
							<div class="pad-20">
								<?php $this->load->view('templates/public/module/services/escrow_view')?>
							</div>
						</div>
						
						
					</div>		
				</div>
			</div>
		</div>
	</div>
</div>

			