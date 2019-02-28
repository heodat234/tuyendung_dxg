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
			            <div class="boxbox-solid row no-margin">
				            <div class="nav-tabs-custom">
							    <ul class="nav nav-tabs">
							      	<li class="active"><a href="#tab_11" id="tab1" data-toggle="tab" aria-expanded="true">Đang xử lý ( <?php echo $count_tranfer ?> )</a></li>
							      	<li class=""><a href="#tab_22" id="tab2" data-toggle="tab" aria-expanded="false">Không đạt ( <?php echo $count_discard ?> )</a></li>
							    </ul>
							    <div class="tab-content" id="tab_round">
							      	<div class="tab-pane active webkit-box text-center" id="tab_11">
				            			<iframe class="iframe_abc" id="frame_1" src="<?php echo $src_1; ?>"></iframe>
				            		</div>
				            		<div class="tab-pane webkit-box text-center" id="tab_22">
				            			<iframe class="iframe_abc" id="frame_2" src="<?php echo $src_2; ?>"  width=100%></iframe>
				            		</div>
				            	</div>
				            </div>
					    </div>
	            	</div>
          		</div>
        	</div>
      	</div>
    </section>
</div>
 <script type="text/javascript">
 	$('#frame_2').hide();
 	$('#tab1').click(function(event) {
 		$('#frame_1').show();
 		$('#frame_2').hide();
 	});
 	$('#tab2').click(function(event) {
 		$('#frame_2').show();
 		$('#frame_1').hide();
 	});
 </script>
 