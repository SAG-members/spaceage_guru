<div class="bs-example mar-t-20">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default" id="myProducts">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">My Products</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    <table class="table table-bordered">
                    	<thead>
                    		<tr>
                    			<th>Product Name</th>
                    			<th>Edit</th>
                    			<th>Delete</th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		<?php if($products): foreach ($products as $p) :?>
                    			<tr>
                    				<td><a href="<?php echo base_url('product/edit/'.$p->{Page::_PAGE_SLUG})?>"><?php echo $p->{Page::_PAGE_TITLE};?></a></td>
                    				<td class="text-center"><a  class="btn btn-info" href="<?php echo base_url('product/edit/'.$p->{Page::_PAGE_SLUG})?>"><i class="fa fa-pencil"></i> Edit</a></td>
                    				<td class="text-center"><a class="btn btn-danger" href="<?php echo base_url('product/delete/'.$p->{Page::_ID})?>"><i class="fa fa-close"></i> Delete</a></td>
                    			</tr>
                    		<?php endforeach; endif;?>
                    	</tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel panel-default" id="mySensations">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">My Sensations</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse in">
                <div class="panel-body">
                    <table class="table table-bordered">
                    	<thead>
                    		<tr>
                    			<th>Sensation Name</th>
                    			<th>Edit</th>
                    			<th>Delete</th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		<?php if($sensations): foreach ($sensations as $s) :?>
                    			<tr>
                    				<td><a href="<?php echo base_url('sensation/edit/'.$s->{Page::_PAGE_SLUG})?>"><?php echo $s->{Page::_PAGE_TITLE};?></a></td>
                    				<td class="text-center"><a  class="btn btn-info" href="<?php echo base_url('sensation/edit/'.$s->{Page::_ID})?>"><i class="fa fa-pencil"></i> Edit</a></td>
                    				<td class="text-center"><a href="<?php echo base_url('sensation/delete/'.$s->{Page::_ID})?>" class="btn btn-danger"><i class="fa fa-close"></i> Delete</a></td> 
                    			</tr>
                    		<?php endforeach; endif;?>
                    	</tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel panel-default" id="myServices">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">My Services</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse in">
                <div class="panel-body">
                    <table class="table table-bordered">
                    	<thead>
                    		<tr>
                    			<th>Service Name</th>
                    			<th>Edit</th>
                    			<th>Delete</th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		<?php if($services): foreach ($services as $se) :?> 
                    			<tr>
                    				<td><a href="<?php echo base_url('service/edit/'.$se->{Page::_PAGE_SLUG})?>"><?php echo $se->{Page::_PAGE_TITLE};?></td>
                    				<td class="text-center"><a  class="btn btn-info" href="<?php echo base_url('service/edit/'.$se->{Page::_PAGE_SLUG})?>"><i class="fa fa-pencil"></i> Edit</a></td>
                    				<td class="text-center"><a href="<?php echo base_url('service/delete/'.$se->{Page::_ID})?>" class="btn btn-danger"><i class="fa fa-close"></i> Delete</a></td>
                    			</tr>
                    		<?php endforeach; endif;?>
                    	</tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="panel panel-default" id="mySymptoms">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">My Symptoms</a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse in">
                <div class="panel-body">
                    <table class="table table-bordered">
                    	<thead>
                    		<tr>
                    			<th>Symptom Name</th>
                    			<th>Edit</th>
                    			<th>Delete</th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		<?php if($symptoms): foreach ($symptoms as $s) :?>
                    			<tr>
                    				<td><a href="<?php echo base_url('symptom/edit/'.$s['id'])?>"><?php echo $s['symptom'];?></td>
                    				<td class="text-center"><a  class="btn btn-info" href="<?php echo base_url('symptom/edit/'.$s['id'])?>"><i class="fa fa-pencil"></i> Edit</a></td>
                    				<td class="text-center"><a href="<?php echo base_url('symptom/delete/'.$s['id'])?>" class="btn btn-danger"><i class="fa fa-close"></i> Delete</a></td>
                    			</tr>
                    		<?php endforeach; endif;?>
                    	</tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- 
         <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">My Faqs</a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse in">
                <div class="panel-body">
                    <table class="table table-bordered">
                    	<thead>
                    		<tr>
                    			<td>Faq</td>
                    			<td>Edit</td>
                    			<td>Delete</td>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		
                    	</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
	 -->
</div>

<style>
.panel-title{color:#c653ff !important;}
button a{color: #FFF;}
</style>