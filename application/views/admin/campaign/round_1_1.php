<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/admin/css/campaign_css.css">
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      	<div class="row">
        	<div class="col-md-12">
        		<div class="box box-default">
	            	<div class="box-header">
	              		<h3 class="box-title"><?php echo $campaigns[0]['position'].' ('.$campaigns[0]['quantity'].')  '  ?></h3>
	              		<a href="#"><?php echo $campaigns[0]['department'] ?></a> - 
	              		<h5> <?php echo $campaigns[0]['location'] ?> <?php echo date_format(date_create($campaigns[0]['expdate']),"d/m/Y") ?></h5>
	              		<div class="box-tools pull-right">
	                		<button type="button" class="btn btn-default"><i class="fa fa-align-left"></i></button>
	                		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
	                			<?php if ($campaigns[0]['showtype'] == 'O'){ ?>
		                			<i class="fa fa-circle fa_o" style=""></i> Công khai
		                		<?php }elseif ($campaigns[0]['showtype'] == 'I') { ?>
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
	            	<a href="<?php echo base_url()?>admin/Campaign/main" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Previous"><i class="fa fa-chevron-left"></i> Quay lại</a>
	            	<div class="box-body no-padding dash-box">
						<?php echo isset($main_round)? $main_round : '' ?>
			            <div class="boxbox-solid row no-margin" id="box_detail">
				            <div class="box-header back-blue with-border">
				              <h5 class="fill-white">Tìm kiếm hồ sơ ứng viên</h5>
				            </div>
				            <iframe class="iframe_abc" src="<?php echo $src; ?>"  width=100%></iframe>
					    </div>
	            	</div>
          		</div>
        	</div>
      	</div>
    </section>
</div>
<script type="text/javascript">
	$('#tab_cam_1').click(function(event) {
	    $('#list_manage').show();
	    $('#box_detail').show();
	  });
	  $('#tab_cam_2').click(function(event) {
	    $('#list_manage').hide();
	    $('#box_detail').hide();
	  });
</script>
 