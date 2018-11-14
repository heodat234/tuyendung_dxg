<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
   
      <div class="row">
        <div class="col-md-12">
           	<div class="nav-tabs-custom">
	            <ul class="nav nav-tabs">
	              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Đang diễn ra (99)</a></li>
	              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Đã kết thúc (99)</a></li>
	            </ul>
            </div>
        </div>
        <?php foreach ($campaigns as $row): 
        	if (isset($row['round'][0]['roundid'])) {
        		$roundid = $row['round'][0]['roundid'];
        	}else{
        		$roundid = 0;
        	}?>
        	<div class="col-md-12">
	        	<a style="color: black" href="<?php echo base_url()?>admin/Campaign/round_1_1/<?php echo $roundid ?>/<?php echo $row['campaignid'] ?>">
		        	<div class="box box-default">
			            <div class="box-header">
			              	<h3 class="box-title"><?php echo $row['position'].' ('.$row['quantity'].')  ' ?></h3>
			              	<a href="#"><?php echo $row['department'] ?></a> - 
			              	<h5><?php echo $row['location'] ?><?php echo date_format(date_create($row['expdate']),"d/m/Y") ?> </h5>
			              	<div class="box-tools pull-right">
			                	<button type="button" class="btn btn-default"><i class="fa fa-align-left"></i></button>
			                	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			                		<?php if ($row['showtype'] == 'O'){ ?>
			                			<i class="fa fa-circle fa_o" style=""></i> Công khai
			                		<?php }elseif ($row['showtype'] == 'I') { ?>
			                			<i class="fa fa-circle fa_i" ></i> Nội bộ 
									<?php }else{ ?>
										<i class="fa fa-circle fa_p" ></i> Bảo mật 
									<?php } ?>
			                    	<span class="caret"></span>
			                    	<span class="sr-only">Toggle Dropdown</span>
		                    	</button>
		                    	<ul class="dropdown-menu" role="menu">
				                    <li><a href="#">Action</a></li>
				                    <li><a href="#">Another action</a></li>
				                    <li><a href="#">Something else here</a></li>
				                    <li class="divider"></li>
				                    <li><a href="#">Separated link</a></li>
			                  	</ul>
			              	</div>
			            </div>
			            <!-- /.box-header -->
			            <div class="box-body no-padding dash-box">
			            	<?php if(count($row['round']) > 1){
				            	$width = 100/count($row['round']);
				            	$width .='%';
				            	 foreach ($row['round'] as $row1){
				            	 	if ($row1['roundtype'] == 'Profile' || $row1['roundtype'] == 'Filter') {
				            	 		$color = 'count_hs';
				            	 	}elseif ($row1['roundtype'] == 'Offer') {
				            	 		$color = 'count_dn';
				            	 	}elseif ($row1['roundtype'] == 'Recruite') {
				            	 		$color = 'count_td';
				            	 	}else{
				            	 		$color = 'count_pv';
				            	 	}
			            	 ?>
			            		<div class="col-pc-14" style="width: <?php echo $width ?>">
				            		<span class="info-box-number <?php echo $color ?>"><?php echo $row1['count_round'] ?></span>
				            		<span class="info-box-text"><?php echo $row1['roundname'] ?></span>
				            	</div>
			            	<?php }} ?>
			            </div>
			            <ul class="users-list clearfix dash-box">
			            	<li>
			            		<h5>Đội ngũ tuyển dụng</h5>
			            	</li>
			            	<?php 
			            	if (!empty($row['manager'])) {
			            	foreach ($row['manager'] as $key) { ?>
			            		<li>
				            		<img src="<?php echo base_url() ?>public/image/bbye.jpg" alt="User Image" title="<?php echo $key['operatorname'] ?>">
				            	</li>
			            	<?php }} ?>
			            	
			            	
			            </ul>
		            <!-- /.box-body -->
		          	</div>
		        </a>
	        </div>
        <?php endforeach ?>
        

        
        <!-- /.col -->
        <a href="<?php echo base_url() ?>admin/campaign/new_campaign" class="b-blue" id="myBtn" title="Go to top"><i class="fa fa-plus"></i></a>
      </div>
    </section>
    <!-- /.content -->
 </div>
 