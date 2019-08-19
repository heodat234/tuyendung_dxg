<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">
           	<div class="nav-tabs-custom">
	            <ul class="nav nav-tabs">
	              <li class="active"><a href="#campaigns_1" data-toggle="tab" aria-expanded="true">Đang diễn ra (<?php echo count($campaigns_active) ?>)</a></li>
	              <li class=""><a href="#campaigns_2" data-toggle="tab" aria-expanded="false">Đã kết thúc (<?php echo count($campaigns_end) ?>)</a></li>
                  <li class=""><a href="#campaigns_3" data-toggle="tab" aria-expanded="false">Đang chờ (<?php echo count($campaigns_wait) ?>)</a></li>
	            </ul>
            </div>
        </div>
        <div class="tab-content" id="tab_round">
		    <div class="tab-pane active" id="campaigns_1">
		    	<div class="col-md-12 search_box_1">
		        	<div class="box box-default">
			            <div class="box-header">
			            	<form >
			            		<div class="input-group">
			            			<input type="text" name="" class="form-control input_search" placeholder="Search..." onkeyup="searchName(this.value,1)">
			            			<span class="input-group-btn">
			            				<button type="button" id="search-btn" class="btn btn-flat btn_search"><i class="fa fa-search"></i></button>
			            			</span>
			            		</div>
			            	</form>
			            </div>
			        </div>
			    </div>
		    	<?php foreach ($campaigns_active as $row):
		    		$href = '#';
		    		$roundid = 0;
		    		$class = 'adisable';
		    		$sorting = isset($row['roundlist'][0]['sorting'])&&$row['roundlist'][0]['sorting']!='1'?'2':'1';
		        	if (isset($row['roundlist'][0]['roundid'])) {
		        		$roundid = $row['roundlist'][0]['roundid'];
		        		// var_dump($row['roundlist']);
		        		$href = base_url('admin/Campaign/round_1_'.$sorting.'/'.$roundid.'/'.$row['campaignid']);
		        		$class = '';
		        	}
		        	?>
		        	<div class="col-md-12 dom_cam_1">
			        	<a class="<?php echo $class ?>" style="color: black" href="<?php echo($href)?>">
				        	<div class="box box-default">
					            <div class="box-header">
					              	<h3 class="box-title"><?php echo $row['position'].' ('.$row['quantity'].')  ' ?></h3>
					              	<a href="#"><?php echo $row['department'] ?></a> -
					              	<h5><?php echo $row['location'] ?> <?php echo date_format(date_create($row['expdate']),"d/m/Y") ?> </h5>
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
		    </div>
		    <div class="tab-pane " id="campaigns_2">
		    	<div class="col-md-12 search_box">
		        	<div class="box box-default">
			            <div class="box-header">
			            	<form >
			            		<div class="input-group">
			            			<input type="text" name="" class="form-control input_search" placeholder="Search..." onkeyup="searchName(this.value,2)">
			            			<span class="input-group-btn">
			            				<button type="button" id="search-btn" class="btn btn-flat btn_search"><i class="fa fa-search"></i></button>
			            			</span>
			            		</div>
			            	</form>
			            </div>
			        </div>
			    </div>

		    	<?php foreach ($campaigns_end as $row):
		    		$href = '#';
		    		$roundid = 0;
		    		$class = 'adisable';
		    		$sorting = isset($row['roundlist'][0]['sorting'])&&$row['roundlist'][0]['sorting']!='1'?'2':'1';
		        	if (isset($row['roundlist'][0]['roundid'])) {
		        		$roundid = $row['roundlist'][0]['roundid'];
		        		// var_dump($row['roundlist']);
		        		$href = base_url('admin/Campaign/round_1_'.$sorting.'/'.$roundid.'/'.$row['campaignid']);
		        		$class = '';
		        	}
		        	?>
		        	<div class="col-md-12 dom_cam">
			        	<a class="<?php echo $class ?>" style="color: black" href="<?php echo($href)?>">
				        	<div class="box box-default">
					            <div class="box-header">
					              	<h3 class="box-title"><?php echo $row['position'].' ('.$row['quantity'].')  ' ?></h3>
					              	<a href="#"><?php echo $row['department'] ?></a> -
					              	<h5><?php echo $row['location'] ?> <?php echo date_format(date_create($row['expdate']),"d/m/Y") ?> </h5>
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
						            		<img src="<?php echo base_url() ?>public/image/bbye.jpg" alt="User Image" title="<?php echo isset($key['operatorname']) ? $key['operatorname'] : '' ?>">
						            	</li>
					            	<?php }} ?>


					            </ul>
				            <!-- /.box-body -->
				          	</div>
				        </a>
			        </div>
		        <?php endforeach ?>
		    </div>
            <div class="tab-pane " id="campaigns_3">
                <div class="col-md-12 search_box">
                    <div class="box box-default">
                        <div class="box-header">
                            <form >
                                <div class="input-group">
                                    <input type="text" name="" class="form-control input_search" placeholder="Search..." onkeyup="searchName(this.value,3)">
                                    <span class="input-group-btn">
                                        <button type="button" id="search-btn" class="btn btn-flat btn_search"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php foreach ($campaigns_wait as $row):
                    $href = '#';
                    $roundid = 0;
                    $class = 'adisable';
                    $width = 100/8;
                    $width .='%';
                    $href = base_url('admin/Campaign/new_campaign/'.$row['campaignid']);
                        $class = '';
                    ?>
                    <div class="col-md-12 dom_cam">
                        <a class="<?php echo $class ?>" style="color: black" href="<?php echo($href)?>">
                            <div class="box box-default">
                                <div class="box-header">
                                    <h3 class="box-title"><?php echo $row['position'].' ('.$row['quantity'].')  ' ?></h3>
                                    <a href="#"><?php echo $row['department'] ?></a> -
                                    <h5><?php echo $row['location'] ?> <?php echo date_format(date_create($row['expdate']),"d/m/Y") ?> </h5>
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
                                    <div class="col-pc-14" style="width: <?php echo $width ?>">
                                        <span class="info-box-number count_hs">0</span>
                                        <span class="info-box-text">Hồ sơ</span>
                                    </div>
                                    <div class="col-pc-14" style="width: <?php echo $width ?>">
                                        <span class="info-box-number count_hs">0</span>
                                        <span class="info-box-text">Sơ loại</span>
                                    </div>
                                    <div class="col-pc-14" style="width: <?php echo $width ?>">
                                        <span class="info-box-number count_pv">0</span>
                                        <span class="info-box-text">Tiếp cận</span>
                                    </div>
                                    <div class="col-pc-14" style="width: <?php echo $width ?>">
                                        <span class="info-box-number count_pv">0</span>
                                        <span class="info-box-text">Bài Test</span>
                                    </div>
                                    <div class="col-pc-14" style="width: <?php echo $width ?>">
                                        <span class="info-box-number count_pv">0</span>
                                        <span class="info-box-text">Phỏng vấn V1</span>
                                    </div>
                                    <div class="col-pc-14" style="width: <?php echo $width ?>">
                                        <span class="info-box-number count_pv">0</span>
                                        <span class="info-box-text">Phỏng vấn V2</span>
                                    </div>
                                    <div class="col-pc-14" style="width: <?php echo $width ?>">
                                        <span class="info-box-number count_dn">0</span>
                                        <span class="info-box-text">Đề nghị</span>
                                    </div>
                                    <div class="col-pc-14" style="width: <?php echo $width ?>">
                                        <span class="info-box-number count_td">0</span>
                                        <span class="info-box-text">Tuyển dụng</span>
                                    </div>
                                </div>
                                <ul class="users-list clearfix dash-box">
                                    <li>
                                        <h5>Đội ngũ tuyển dụng</h5>
                                    </li>
                                </ul>
                            <!-- /.box-body -->
                            </div>
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>

        <!-- /.col -->
        <a href="<?php echo base_url() ?>admin/campaign/new_campaign" class="b-blue" id="myBtn" title="Tạo chiến dịch mới"><i class="fa fa-plus"></i></a>
      </div>
    </section>
    <!-- /.content -->
    <div class="hide" id="base_url"><?php echo base_url() ?></div>
 </div>
 <style type="text/css">
 	.adisable{
 		cursor: no-drop;
 	}
 	.input_search{
 		box-shadow: none;
 		background-color: #fff;
 		border: 1px solid transparent;
 	}
 	.btn_search{
 		background-color: #fff;
 		border: 1px solid transparent;
 		height: 35px;
 	}
 </style>
 <script type="text/javascript">
 	function searchName(obj,type) {
 		var base_url = $('#base_url').text();
 		$.ajax({
 			url: '<?php echo base_url('admin/Campaign/searchNameCampaign') ?>',
 			type: 'POST',
 			dataType: 'json',
 			data: {name: obj,type: type},
 		})
 		.done(function(data) {
 			// console.log(data);
 			if(type == 2){
 				var class_dom = 'dom_cam';
 			}else{
 				var class_dom = 'dom_cam_1';
 			}
 			var dom ='';
 			for(var i in data){
 				var row = data[i];
 				// console.log(row['roundlist']);
 				var href = '#';
		    	var roundid = 0;
		    	var class_a = 'adisable';
		    	if (!row['roundlist'].length == 0) {
		    		if (row['roundlist'][0]['sorting']!='1') {
		    			var sorting = '2';
		    		}else{
		    			var sorting = '1';
		    		}
		    		roundid = row['roundlist'][0]['roundid'];
	        		href = base_url+'admin/Campaign/round_1_'+sorting+'/'+roundid+'/'+row['campaignid'];
	        		class_a = '';
		    	}else{
		    		var sorting = '1';
		    	}

	        	dom += '<div class="col-md-12 '+class_dom+'">\
		        	<a class="'+class_a+'" style="color: black" href="'+href+'">\
			        	<div class="box box-default">\
				            <div class="box-header">\
				              	<h3 class="box-title">'+row['position']+' ('+row['quantity']+')  </h3>\
				              	<a href="#">'+row['department']+'</a> - \
				              	<h5>'+row['location']+' '+row['expdate']+' </h5>\
				              	<div class="box-tools pull-right">\
				                	<button type="button" class="btn btn-default"><i class="fa fa-align-left"></i></button>\
				                	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">';
				                		if (row['showtype'] == 'O'){
				                			dom+= '<i class="fa fa-circle fa_o" style=""></i> Công khai';
				                		}else if (row['showtype'] == 'I') {
				                			dom+= '<i class="fa fa-circle fa_i" ></i> Nội bộ ';
										}else{
											dom+= '<i class="fa fa-circle fa_p" ></i> Bảo mật ';
										}
				                    dom += '<span class="caret"></span>\
				                    	<span class="sr-only">Toggle Dropdown</span>\
			                    	</button>\
			                    	<ul class="dropdown-menu" role="menu">\
					                    <li><a href="#">Action</a></li>\
					                    <li><a href="#">Another action</a></li>\
					                    <li><a href="#">Something else here</a></li>\
					                    <li class="divider"></li>\
					                    <li><a href="#">Separated link</a></li>\
				                  	</ul>\
				              	</div>\
				            </div>\
				            <div class="box-body no-padding dash-box">';
				            	if(row['round'].length > 1){
				            		var color = '';
					            	var width = 100/row['round'].length;
					            	width +='%';
					            	 for(var j in row['round']){
					            	 	var row1 = row['round'][j];
					            	 	if (row1['roundtype'] == 'Profile' || row1['roundtype'] == 'Filter') {
					            	 		color = 'count_hs';
					            	 	}else if (row1['roundtype'] == 'Offer') {
					            	 		color = 'count_dn';
					            	 	}else if (row1['roundtype'] == 'Recruite') {
					            	 		color = 'count_td';
					            	 	}else{
					            	 		color = 'count_pv';
					            	 	}

				            	dom += '<div class="col-pc-14" style="width: '+width+'">\
					            		<span class="info-box-number '+color +'">'+row1['count_round'] +'</span>\
					            		<span class="info-box-text">'+row1['roundname'] +'</span>\
					            	</div>';
				            	}}
					dom += '</div>\
				            <ul class="users-list clearfix dash-box">\
				            	<li>\
				            		<h5>Đội ngũ tuyển dụng</h5>\
				            	</li>';
				            	if (row['manager'] != '') {
				            	for(var k in row['manager']) {
				            	dom += '<li>\
					            		<img src="<?php echo base_url() ?>public/image/bbye.jpg" alt="User Image" title="'+row['manager'][k]['operatorname'] +'">\
					            	</li>';
				            	 }}
				        dom += '</ul>\
			          	</div>\
			        </a>\
		        </div>';
 			}
 			if(type == 2){
	 			$('.dom_cam').remove();
	 			$('.search_box').after(dom);
	 		}else{
	 			$('.dom_cam_1').remove();
	 			$('.search_box_1').after(dom);
	 		}
 		})
 		.fail(function() {
 			console.log("error");
 		});

 	}
 </script>