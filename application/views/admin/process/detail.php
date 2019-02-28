<style type="text/css">
	.select2-container{
		width: 100% !important;
	}
	.col-pc-12{
		width: 12.5%;
	}
	li{
		list-style: none;
	}
</style>

<div class="content-wrapper">
    <section class="content">
    	<div class="row">
       		<div class="col-md-12">
	        	<div class="box box-default">
	        		<form id="form_round">
			            <div class="box-header">
			              <!-- <i class="fa fa-warning"></i> -->
			              <input type="hidden" name="flowpresetid" id="flowpresetid" value="<?php echo isset($flowpresetid)? $flowpresetid: '0' ?>">
			              <?php if ($flowpresetid != 0){ ?>
			              	<h3 class="head-black"><input type="text" style="width: 500px" name="flowpresetname" value="<?php echo $process[0]['flowpresetname'] ?>"></h3>
			              	<h5 class="guide-black"> Tạo bởi: <?php echo $process[0]['name'] ?> - <?php echo date_format(date_create($process[0]['createddate']),"d/m/Y H:i:s") ?></h5>
			              <?php }else{ ?>
			              	<h3 class="head-black"><input type="text" name="flowpresetname" placeholder="Nhập tên quy trình" value=""></h3>
			              <?php } ?>
			              <div class="box-tools pull-right">
			                <button type="button" class="btn btn-default"><i class="fa fa-align-left"></i></button>
		                    <ul class="dropdown-menu" role="menu">
			                    <li><a href="#">Action</a></li>
			                    <li><a href="#">Another action</a></li>
			                    <li><a href="#">Something else here</a></li>
			                    <li class="divider"></li>
			                    <li><a href="#">Separated link</a></li>
			                  </ul>
			              </div>
			            </div>
			            <div id="box_header_2">
			            	<a href="<?php echo base_url() ?>admin/recruitprocess/" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Previous"><i class="fa fa-chevron-left"></i> Quay lại</a>
			            </div>
			            <!-- /.box-header -->
			            
			            <div class="panel-group" id="accordion">
						  	<div class="panel panel-default border-rad0">
						  		<a data-toggle="collapse" data-parent="#accordion" href="#collapse2" onclick="rotate(2)">
							    	<div class="panel-heading rad-pad0 b-blue"> 
							       		<i class="fa fa-angle-right a-tabcs rotate rotate_2 down"></i>
							       		<div class="ul-nav">
									       	<label class="tittle-tab">
									       		Thiết lập quy trình
									       	</label>
							       		</div>
							    	</div>
							    </a>
							    <div id="collapse2" class="panel-collapse collapse in">
							      <div class="panel-body">
							      	
							        <p class="title_ql">Xem trước quy trình:</p>
							        <div class="box-body no-padding dash-box">
							        	<?php if (!isset($round)){ ?>
							        		<div class=" col-pc-12" >
								                <span class="info-box-number count_hs">V1</span>
								                <span class="info-box-text">HỒ SƠ</span>
								            </div>
								            <div class=" col-pc-12" id="box_round_2">
								                <span class="info-box-number count_hs">V2</span>
								                <span class="info-box-text">SƠ LOẠI</span>
								            </div>
								            <div class=" col-pc-12" id="box_round_3">
								                <span class="info-box-number count_pv">V3</span>
								                <span class="info-box-text">TIẾP CẬN</span>
								            </div>
								            <div class=" col-pc-12" id="box_round_4">
								              	<span class="info-box-number count_pv">V4</span>
								                <span class="info-box-text">BÀI TEST</span>
								              </div>
								            <div class=" col-pc-12" id="box_round_5">
								                <span class="info-box-number count_pv">V5</span>
								                <span class="info-box-text">PHỎNG VẤN V1</span>
								            </div>
								            <div class=" col-pc-12" id="box_round_6">
								                <span class="info-box-number count_pv">V6</span>
								                <span class="info-box-text">PHỎNG VẤN 2</span>
								            </div>
								            <div class=" col-pc-12" id="box_round_7">
								              	<span class="info-box-number count_dn">V7</span>
								                <span class="info-box-text">ĐỀ NGHỊ</span>
								            </div>
								            <div class=" col-pc-12" id="box_round_8">
								              	<span class="info-box-number count_td">V8</span>
								                <span class="info-box-text">TUYỂN DỤNG</span>
								            </div>
							            <?php } else if(count($round) > 1 && isset($round)){
							            	$width = 100/count($round);
							            	$width .='%';
							            	$i = 1;
							            	 foreach ($round as $row1){
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
						            		<div class="col-pc-12" id="box_round_<?php echo $i ?>" style="width: <?php echo $width ?>">
							            		<span class="info-box-number <?php echo $color ?>">V<?php echo $i ?></span>
							            		<span class="info-box-text"><?php echo $row1['roundname'] ?></span>
							            	</div>
						            	<?php $i++; }} ?>
							        </div>
							        <p class="title_qt">Điều chỉnh Quy trình:</p>
							        <input type="hidden" id="count_round" name="count_round_form" value="8">
							        <ul id="sortable" class="sortable-dragging sortable-placeholder">
							        	<?php if ($flowpresetid == 0){ ?>
							        		<li class="ui-state-disabled" data-index="1" data-position="1">
								        		<div class="v_1" >
									        		<div class="header_vong_cd ">
									        			<input type="hidden" name="round1[]" value="1" class="sorting">
									        			<div class=" col-xs-4 pull-left">
									        				<i class="fa fa-ellipsis-v dis_fa"></i>
									        				Hồ sơ
									        			</div>
									        			<input type="hidden" name="round1[]" value="Hồ sơ" class="roundname hide ">
									        			<div class="pull-right box_btn_cd disabled" >
									        				<button class="btn btn_cd" disabled><i class="fa fa-plus" ></i></button>
									        				<button class="btn 	btn_cd" disabled><i class="fa fa-pencil" ></i></button>
									        			</div>
									        		</div>
									        		<div class="body_vong_cd">
									        			<div class="row form_campaign">
												            <label for="text" class=" col-xs-2 label-profile">Loại vòng</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round1[]" >
												             		<option value="Profile" >Hồ sơ</option>
												             	</select>
												            </div>
												        </div>
												    
												        <div class="row form_campaign">
												            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round1[]" > Email Chuyển vòng</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round1[]">
												             		<?php foreach ($mailtemplate as $mail): ?>
										                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
										                            <?php endforeach ?>
												             	</select>
												            </div>
												        </div>
												        <div class="row form_campaign_1">
												            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round1[]" > Email loại</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round1[]">
												             		<?php foreach ($mailtemplate as $mail): ?>
										                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
										                            <?php endforeach ?>
												             	</select>
												            </div>
												        </div>
									        		</div>
									        	</div>
								        	</li>
								        	<li id="round_2" data-index="2" data-position="2">
								        		<div class="v_2" >
									        		<div class="header_vong_cd">
									        			<input type="hidden" name="round2[]" value="2" class="sorting">
									        			<div class=" col-xs-4 pull-left">
									        				<i class="fa fa-ellipsis-v handle"></i>
									        				<span id="title_2">Sơ loại</span>
									        				<input type="text" name="round2[]" value="Sơ loại" class="roundname hide input_title_2">
									        			</div>
									        			<div class="pull-right box_btn_cd">
									        				<button type="button" class="btn btn_cd btn_copy_2" onclick="copyRound(2)"><i class="fa fa-plus"></i></button>
									        				<button type="button" class="btn btn_cd btn_delete_2" onclick="deleteRound(2)"><i class="fa fa-trash-o"></i></button>
									        				<button type="button" class="btn btn_cd btn_edit_2" onclick="editTitle(2)"><i class="fa fa-pencil"></i></button>
									        			</div>
									        		</div>
									        		<div class="body_vong_cd">
									        			<div class="row form_campaign">
												            <label for="text" class=" col-xs-2 label-profile">Loại vòng</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round2[]" id="select_type2">
												             		<option value="Profile" disabled="">Hồ sơ</option>
												             		<option value="Filter">Sơ loại</option>
												             		<option value="Contact">Tiếp cận</option>
												             		<option value="Assessment">Trắc nghiệm</option>
												             		<option value="Interview">Phỏng vấn</option>
												             		<option value="Offer">Đề nghị</option>
												             		<option value="Recruite" disabled="">Tuyển dụng</option>
												             	</select>
												            </div>
												        </div>
												        
												        <div class="row form_campaign">
												            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round2[]"> Email Chuyển vòng</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round2[]">
												             		<?php foreach ($mailtemplate as $mail): ?>
										                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
										                            <?php  endforeach ?>
												             	</select>
												            </div>
												        </div>
												        <div class="row form_campaign_1">
												            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round2[]"> Email loại</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round2[]">
												             		<?php foreach ($mailtemplate as $mail): ?>
										                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
										                            <?php  endforeach ?>
												             	</select>
												            </div>
												        </div>
									        		</div>
									        	</div>
								        	</li>
								        	<li id="round_3" data-index="3" data-position="3">
								        		<div class="v_3" >
									        		<div class="header_vong_cd">
									        			<input type="hidden" name="round3[]" value="3" class="sorting">
									        			<div class=" col-xs-4 pull-left">
									        				<i class="fa fa-ellipsis-v handle"></i>
									        				
									        				<span id="title_3">Tiếp cận</span>
									        				<input type="text" name="round3[]" value="Tiếp cận" class="roundname hide input_title_3">
									        			</div>
									        			<div class="pull-right box_btn_cd">
									        				<button type="button" class="btn btn_cd btn_copy_3" onclick="copyRound(3)"><i class="fa fa-plus"></i></button>
									        				<button type="button" class="btn btn_cd btn_delete_3" onclick="deleteRound(3)"><i class="fa fa-trash-o"></i></button>
									        				<button type="button" class="btn btn_cd btn_edit_3" onclick="editTitle(3)"><i class="fa fa-pencil"></i></button>
									        			</div>
									        		</div>
									        		<div class="body_vong_cd">
									        			<div class="row form_campaign">
												            <label for="text" class=" col-xs-2 label-profile">Loại vòng</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round3[]" id="select_type3">
												             		<option value="Profile" disabled="">Hồ sơ</option>
												             		<option value="Filter">Sơ loại</option>
												             		<option value="Contact" selected="">Tiếp cận</option>
												             		<option value="Assessment">Trắc nghiệm</option>
												             		<option value="Interview">Phỏng vấn</option>
												             		<option value="Offer">Đề nghị</option>
												             		<option value="Recruite" disabled="">Tuyển dụng</option>
												             	</select>
												            </div>
												        </div>
												        
												        <div class="row form_campaign">
												            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round3[]"> Email Chuyển vòng</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round3[]">
												             		<?php foreach ($mailtemplate as $mail): ?>
										                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
										                            <?php  endforeach ?>
												             	</select>
												            </div>
												        </div>
												        <div class="row form_campaign_1">
												            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round3[]"> Email loại</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round3[]">
												             		<?php foreach ($mailtemplate as $mail): ?>
										                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
										                            <?php  endforeach ?>
												             	</select>
												            </div>
												        </div>
									        		</div>
									        	</div>
								        	</li>
								        	<li id="round_4" data-index="4" data-position="4">
								        		<div class="v_4" >
									        		<div class="header_vong_cd">
									        			<input type="hidden" name="round4[]" value="4" class="sorting">
									        			<div class=" col-xs-4 pull-left">
									        				<i class="fa fa-ellipsis-v handle"></i>
									        				<span id="title_4">Bài Test</span>
									        				<input type="text" name="round4[]" value="Bài Test" class="roundname hide input_title_4">
									        			</div>
									        			<div class="pull-right box_btn_cd">
									        				<button type="button" class="btn btn_cd btn_copy_4" onclick="copyRound(4)"><i class="fa fa-plus"></i></button>
									        				<button type="button" class="btn btn_cd btn_delete_4" onclick="deleteRound(4)"><i class="fa fa-trash-o"></i></button>
									        				<button type="button" class="btn btn_cd btn_edit_4" onclick="editTitle(4)"><i class="fa fa-pencil"></i></button>
									        			</div>
									        		</div>
									        		<div class="body_vong_cd">
									        			<div class="row form_campaign">
												            <label for="text" class=" col-xs-2 label-profile">Loại vòng</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round4[]" id="select_type4">
												             		<option value="Profile" disabled="">Hồ sơ</option>
												             		<option value="Filter">Sơ loại</option>
												             		<option value="Contact">Tiếp cận</option>
												             		<option value="Assessment" selected="">Trắc nghiệm</option>
												             		<option value="Interview">Phỏng vấn</option>
												             		<option value="Offer">Đề nghị</option>
												             		<option value="Recruite" disabled="">Tuyển dụng</option>
												             	</select>
												            </div>
												        </div>
												        
												        <div class="row form_campaign">
												            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round4[]"> Email Chuyển vòng</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round4[]">
												             		<?php foreach ($mailtemplate as $mail): ?>
										                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
										                            <?php endforeach ?>
												             	</select>
												            </div>
												        </div>
												        <div class="row form_campaign_1">
												            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round4[]"> Email loại</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round4[]">
												             		<?php foreach ($mailtemplate as $mail): ?>
										                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
										                            <?php endforeach ?>
												             	</select>
												            </div>
												        </div>
									        		</div>
									        		<div class="body_vong_cd_1">
												        <div class="row form_campaign">
												            <label for="text" class=" col-xs-2 label-profile">Giới hạn mẫu phiếu trắc nghiệm</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round4[]">
												             		<?php foreach ($asmt_tn as $tn): ?>
										                              	<option value="<?php echo $tn['asmttemp'] ?>"><?php echo $tn['asmtname'] ?></option>
										                            <?php endforeach ?>	
												             	</select>
												            </div>
												        </div>
												        <div class="row form_campaign_1">
												            <label for="text" class=" col-xs-2 label-profile">Email thông báo</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round4[]">
												             		<?php foreach ($mailtemplate as $mail): ?>
										                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
										                            <?php endforeach ?>
												             	</select>
												            </div>
												        </div>
									        		</div>
									        	</div>
								        	</li>
								        	<li id="round_5" data-index="5" data-position="5">
								        		<div class="v_5" >
									        		<div class="header_vong_cd">
									        			<input type="hidden" name="round5[]" value="5" class="sorting">
									        			<div class=" col-xs-4 pull-left">
									        				<i class="fa fa-ellipsis-v handle"></i>
									        				<span id="title_5">Phỏng vấn V1</span>
									        				<input type="text" name="round5[]" value="Phỏng vấn V1" class="roundname hide input_title_5">
									        			</div>
									        			<div class="pull-right box_btn_cd">
									        				<button type="button" class="btn btn_cd btn_copy_5" onclick="copyRound(5)"><i class="fa fa-plus"></i></button>
									        				<button type="button" class="btn btn_cd btn_delete_5" onclick="deleteRound(5)"><i class="fa fa-trash-o"></i></button>
									        				<button type="button" class="btn btn_cd btn_edit_5" onclick="editTitle(5)"><i class="fa fa-pencil"></i></button>
									        			</div>
									        		</div>
									        		<div class="body_vong_cd">
									        			<div class="row form_campaign">
												            <label for="text" class=" col-xs-2 label-profile">Loại vòng</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round5[]" id="select_type5">
												             		<option value="Profile" disabled="">Hồ sơ</option>
												             		<option value="Filter">Sơ loại</option>
												             		<option value="Contact">Tiếp cận</option>
												             		<option value="Assessment">Trắc nghiệm</option>
												             		<option value="Interview" selected="">Phỏng vấn</option>
												             		<option value="Offer">Đề nghị</option>
												             		<option value="Recruite" disabled="">Tuyển dụng</option>
												             	</select>
												            </div>
												        </div>
												        
												        <div class="row form_campaign">
												            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round5[]"> Email Chuyển vòng</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round5[]">
												             		<?php foreach ($mailtemplate as $mail): ?>
										                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
										                            <?php endforeach ?>
												             	</select>
												            </div>
												        </div>
												        <div class="row form_campaign_1">
												            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round5[]"> Email loại</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round5[]">
												             		<?php foreach ($mailtemplate as $mail): ?>
										                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
										                            <?php endforeach ?>
												             	</select>
												            </div>
												        </div>
									        		</div>
									        		<div class="body_vong_cd_1">
												        <div class="row form_campaign">
												            <label for="text" class=" col-xs-2 label-profile">Giới hạn mẫu phiếu phỏng vấn</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round5[]">
												             		<?php foreach ($asmt_pv as $tn): ?>
										                              	<option value="<?php echo $tn['asmttemp'] ?>"><?php echo $tn['asmtname'] ?></option>
										                            <?php endforeach ?>
												             	</select>
												            </div>
												        </div>
												        <div class="row form_campaign">
												            <label for="text" class=" col-xs-2 label-profile">Email thông báo Ứng viên</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round5[]">
												             		<?php foreach ($mailtemplate as $mail): ?>
										                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
										                            <?php endforeach ?>
												             	</select>
												            </div>
												        </div>
												        <div class="row form_campaign_1">
												            <label for="text" class=" col-xs-2 label-profile">Email thông báo Người PV</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round5[]">
												             		<?php foreach ($mailtemplate as $mail): ?>
										                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
										                            <?php endforeach ?>
												             	</select>
												            </div>
												        </div>
									        		</div>
									        	</div>
								        	</li>
								        	<li id="round_6" data-index="6" data-position="6">
								        		<div class="v_6" >
									        		<div class="header_vong_cd">
									        			<input type="hidden" name="round6[]" value="6" class="sorting">
									        			<div class=" col-xs-4 pull-left">
									        				<i class="fa fa-ellipsis-v handle"></i>
									        				<span id="title_6">Phỏng vấn V2</span>
									        				<input type="text" name="round6[]" value="Phỏng vấn V2" class="roundname hide input_title_6">
									        			</div>
									        			<div class="pull-right box_btn_cd">
									        				<button type="button" class="btn btn_cd btn_copy_6" onclick="copyRound(6)"><i class="fa fa-plus"></i></button>
									        				<button type="button" class="btn btn_cd btn_delete_6" onclick="deleteRound(6)"><i class="fa fa-trash-o"></i></button>
									        				<button type="button" class="btn btn_cd btn_edit_6" onclick="editTitle(6)"><i class="fa fa-pencil"></i></button>
									        			</div>
									        		</div>
									        		<div class="body_vong_cd">
									        			<div class="row form_campaign">
												            <label for="text" class=" col-xs-2 label-profile">Loại vòng</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round6[]" id="select_type6">
												             		<option value="Profile" disabled="">Hồ sơ</option>
												             		<option value="Filter">Sơ loại</option>
												             		<option value="Contact">Tiếp cận</option>
												             		<option value="Assessment">Trắc nghiệm</option>
												             		<option value="Interview" selected="">Phỏng vấn</option>
												             		<option value="Offer">Đề nghị</option>
												             		<option value="Recruite" disabled="">Tuyển dụng</option>
												             	</select>
												            </div>
												        </div>
												        
												        <div class="row form_campaign">
												            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round6[]"> Email Chuyển vòng</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round6[]">
												             		<?php foreach ($mailtemplate as $mail): ?>
										                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
										                            <?php endforeach ?>
												             	</select>
												            </div>
												        </div>
												        <div class="row form_campaign_1">
												            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round6[]"> Email loại</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round6[]">
												             		<?php foreach ($mailtemplate as $mail): ?>
										                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
										                            <?php endforeach ?>
												             	</select>
												            </div>
												        </div>
									        		</div>
									        		<div class="body_vong_cd_1">
												        <div class="row form_campaign">
												            <label for="text" class=" col-xs-2 label-profile">Giới hạn mẫu phiếu phỏng vấn</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round6[]">
												             		<?php foreach ($asmt_pv as $tn): ?>
										                              	<option value="<?php echo $tn['asmttemp'] ?>"><?php echo $tn['asmtname'] ?></option>
										                            <?php endforeach ?>
												             	</select>
												            </div>
												        </div>
												        <div class="row form_campaign">
												            <label for="text" class=" col-xs-2 label-profile">Email thông báo Ứng viên</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round6[]">
												             		<?php foreach ($mailtemplate as $mail): ?>
										                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
										                            <?php endforeach ?>
												             	</select>
												            </div>
												        </div>
												        <div class="row form_campaign_1">
												            <label for="text" class=" col-xs-2 label-profile">Email thông báo Người PV</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round6[]">
												             		<?php foreach ($mailtemplate as $mail): ?>
										                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
										                            <?php endforeach ?>
												             	</select>
												            </div>
												        </div>
									        		</div>
									        	</div>
								        	</li>
								        	<li id="round_7" data-index="7" data-position="7">
								        		<div class="v_7" >
									        		<div class="header_vong_cd">
									        			<input type="hidden" name="round7[]" value="7" class="sorting">
									        			<div class=" col-xs-4 pull-left">
									        				<i class="fa fa-ellipsis-v handle"></i>
									        				<span id="title_7">Đề nghị</span>
									        				<input type="text" name="round7[]" value="Đề nghị" class="roundname hide input_title_7">
									        			</div>
									        			<div class="pull-right box_btn_cd">
									        				<button type="button" class="btn btn_cd btn_copy_7" onclick="copyRound(7)"><i class="fa fa-plus"></i></button>
									        				<button type="button" class="btn btn_cd btn_delete_7" onclick="deleteRound(7)"><i class="fa fa-trash-o"></i></button>
									        				<button type="button" class="btn btn_cd btn_edit_7" onclick="editTitle(7)"><i class="fa fa-pencil"></i></button>
									        			</div>
									        		</div>
									        		<div class="body_vong_cd">
									        			<div class="row form_campaign">
												            <label for="text" class=" col-xs-2 label-profile">Loại vòng</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round7[]" id="select_type7">
												             		<option value="Profile" disabled="">Hồ sơ</option>
												             		<option value="Filter">Sơ loại</option>
												             		<option value="Contact">Tiếp cận</option>
												             		<option value="Assessment">Trắc nghiệm</option>
												             		<option value="Interview">Phỏng vấn</option>
												             		<option value="Offer" selected="">Đề nghị</option>
												             		<option value="Recruite" disabled="">Tuyển dụng</option>
												             	</select>
												            </div>
												        </div>
												        
												        <div class="row form_campaign">
												            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round7[]"> Email Chuyển vòng</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round7[]">
												             		<?php foreach ($mailtemplate as $mail): ?>
										                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
										                            <?php endforeach ?>
												             	</select>
												            </div>
												        </div>
												        <div class="row form_campaign_1">
												            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round7[]"> Email loại</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round7[]">
												             		<?php foreach ($mailtemplate as $mail): ?>
										                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
										                            <?php endforeach ?>
												             	</select>
												            </div>
												        </div>
									        		</div>
									        		<div class="body_vong_cd_1">
												        <div class="row form_campaign_1">
												            <label for="text" class=" col-xs-2 label-profile">Email Đề nghị</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round7[]">
												             		<?php foreach ($mailtemplate as $mail): ?>
										                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
										                            <?php endforeach ?>
												             	</select>
												            </div>
												        </div>
									        		</div>
									        	</div>
								        	</li>
								        	<li id="round_8" class="ui-state-disabled" data-index="8" data-position="8">
								        		<div class="v_8 ">
									        		<div class="header_vong_cd">
									        			<input type="hidden" name="round8[]" value="8" class="sorting">
									        			<div class=" col-xs-4 pull-left">
									        				<i class="fa fa-ellipsis-v dis_fa"></i>
									        				Tuyển dụng
									        			</div>
									        			<input type="hidden" name="round8[]" value="Tuyển dụng" class="roundname  ">
									        			<div class="pull-right box_btn_cd">
									        				<button class="btn btn_cd" disabled><i class="fa fa-plus"></i></button>
									        				<button class="btn 	btn_cd" disabled><i class="fa fa-pencil"></i></button>
									        			</div>
									        		</div>
									        		<div class="body_vong_cd">
									        			<div class="row form_campaign">
												            <label for="text" class=" col-xs-2 label-profile">Loại vòng</label>
												            <div class="col-xs-4  padding-lr0">
												             	<select class="textbox" name="round8[]">
												             		<option value="Recruite" selected="">Tuyển dụng</option>
												             	</select>
												            </div>
												        </div>
												        
									        		</div>
									        	</div>
								        	</li>
							        	<?php }else{ 
							        		foreach ($round as $key) {
							        			if ($key['roundtype'] == 'Profile') {
							        		?>
							        			<li class="ui-state-disabled" data-index="1" data-position="1">
									        		<div class="v_1" >
										        		<div class="header_vong_cd ">
										        			<input type="hidden" name="round1[]" value="1" class="sorting">
										        			<div class=" col-xs-4 pull-left">
										        				<i class="fa fa-ellipsis-v dis_fa"></i>
										        				<?php echo $key['roundname'] ?>
										        			</div>
										        			<input type="hidden" name="round1[]" value="<?php echo $key['roundname'] ?>" class="roundname hide ">
										        			<div class="pull-right box_btn_cd disabled" >
										        				<button class="btn btn_cd" disabled><i class="fa fa-plus" ></i></button>
										        				<button class="btn 	btn_cd" disabled><i class="fa fa-pencil" ></i></button>
										        			</div>
										        		</div>
										        		<div class="body_vong_cd">
										        			<div class="row form_campaign">
													            <label for="text" class=" col-xs-2 label-profile">Loại vòng</label>
													            <div class="col-xs-4  padding-lr0">
													             	<select class="textbox" name="round1[]" >
													             		<option value="Profile" >Hồ sơ</option>
													             	</select>
													            </div>
													        </div>
													    
													        <div class="row form_campaign">
													            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round1[]"
													            <?php echo ($key['transferemail'] == 'Y') ?'checked' : '' ?> > Email Chuyển vòng</label>
													            <div class="col-xs-4  padding-lr0">
													             	<select class="textbox" name="round1[]">
													             		<?php foreach ($mailtemplate as $mail): 
													             			if ($key['transfmailtemp'] == $mail['mailprofileid']) {
													             		?>
													             			<option selected="" value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
													             		<?php }else { ?>
											                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
											                            <?php } endforeach ?>
													             	</select>
													            </div>
													        </div>
													        <div class="row form_campaign_1">
													            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round1[]"
													            <?php echo ($key['discardemail'] == 'Y') ?'checked' : '' ?> > Email loại</label>
													            <div class="col-xs-4  padding-lr0">
													             	<select class="textbox" name="round1[]">
													             		<?php foreach ($mailtemplate as $mail): 
													             			if ($key['discmailtemp'] == $mail['mailprofileid']) {
													             		?>
													             			<option selected="" value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
													             		<?php }else { ?>
											                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
											                            <?php } endforeach ?>
													             		
													             	</select>
													            </div>
													        </div>
										        		</div>
										        	</div>
									        	</li>
									        <?php }else if ($key['roundtype'] == 'Recruite'){ ?>
									        	<li id="round_<?php echo $key['sorting'] ?>" class="ui-state-disabled" data-index="<?php echo $key['sorting'] ?>" data-position="<?php echo $key['sorting'] ?>">
									        		<div class="v_<?php echo $key['sorting'] ?> ">
										        		<div class="header_vong_cd">
										        			<input type="hidden" name="round<?php echo $key['sorting'] ?>[]" value="<?php echo $key['sorting'] ?>" class="sorting">
										        			<div class=" col-xs-4 pull-left">
										        				<i class="fa fa-ellipsis-v dis_fa"></i>
										        				<?php echo $key['roundname'] ?>
										        			</div>
										        			<input type="hidden" name="round<?php echo $key['sorting'] ?>[]" value="<?php echo $key['roundname'] ?>" class="roundname  ">
										        			<div class="pull-right box_btn_cd">
										        				<button class="btn btn_cd" disabled><i class="fa fa-plus"></i></button>
										        				<button class="btn 	btn_cd" disabled><i class="fa fa-pencil"></i></button>
										        			</div>
										        		</div>
										        		<div class="body_vong_cd">
										        			<div class="row form_campaign">
													            <label for="text" class=" col-xs-2 label-profile">Loại vòng</label>
													            <div class="col-xs-4  padding-lr0">
													             	<select class="textbox" name="round<?php echo $key['sorting'] ?>[]">
													             		<option value="Recruite" selected="">Tuyển dụng</option>
													             	</select>
													            </div>
													        </div>
													        
										        		</div>
										        	</div>
									        	</li>
									        <?php }else{ ?>
									        	<li id="round_<?php echo $key['sorting'] ?>" data-index="<?php echo $key['sorting'] ?>" data-position="<?php echo $key['sorting'] ?>">
									        		<div class="v_<?php echo $key['sorting'] ?>" >
										        		<div class="header_vong_cd">
										        			<input type="hidden" name="round<?php echo $key['sorting'] ?>[]" value="<?php echo $key['sorting'] ?>" class="sorting">
										        			<div class=" col-xs-4 pull-left">
										        				<i class="fa fa-ellipsis-v handle"></i>
										        				<span id="title_<?php echo $key['sorting'] ?>"><?php echo $key['roundname'] ?></span>
										        				<input type="text" name="round<?php echo $key['sorting'] ?>[]" value="<?php echo $key['roundname'] ?>" class="roundname hide input_title_<?php echo $key['sorting'] ?>">
										        			</div>
										        			<div class="pull-right box_btn_cd">
										        				<button type="button" class="btn btn_cd btn_copy_<?php echo $key['sorting'] ?>" onclick="copyRound(<?php echo $key['sorting'] ?>)"><i class="fa fa-plus"></i></button>
										        				<button type="button" class="btn btn_cd btn_delete_<?php echo $key['sorting'] ?>" onclick="deleteRound(<?php echo $key['sorting'] ?>)"><i class="fa fa-trash-o"></i></button>
										        				<button type="button" class="btn btn_cd btn_edit_<?php echo $key['sorting'] ?>" onclick="editTitle(<?php echo $key['sorting'] ?>)"><i class="fa fa-pencil"></i></button>
										        			</div>
										        		</div>
										        		<div class="body_vong_cd">
										        			<div class="row form_campaign">
													            <label for="text" class=" col-xs-2 label-profile">Loại vòng</label>
													            <div class="col-xs-4  padding-lr0">
													             	<select class="textbox" name="round<?php echo $key['sorting'] ?>[]" id="select_type<?php echo $key['sorting'] ?>">
													             		<option value="Profile" disabled="">Hồ sơ</option>
													             		<option value="Filter">Sơ loại</option>
													             		<option value="Contact">Tiếp cận</option>
													             		<option value="Assessment">Trắc nghiệm</option>
													             		<option value="Interview">Phỏng vấn</option>
													             		<option value="Offer">Đề nghị</option>
													             		<option value="Recruite" disabled="">Tuyển dụng</option>
													             	</select>
													            </div>
													        </div>
													        <script>
												            	$(document).ready(function() {
												            		$('#select_type<?php echo $key['sorting'] ?> option[value="<?php echo $key['roundtype'] ?>"]').prop('selected', 'selected');
												            	});
												            </script>
													        <div class="row form_campaign">
													            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round<?php echo $key['sorting'] ?>[]"
													            	<?php echo ($key['transferemail'] == 'Y') ?'checked' : '' ?>> Email Chuyển vòng</label>
													            <div class="col-xs-4  padding-lr0">
													             	<select class="textbox" name="round<?php echo $key['sorting'] ?>[]">
													             		<?php foreach ($mailtemplate as $mail): 
													             			if ($key['transfmailtemp'] == $mail['mailprofileid']) {
													             		?>
													             			<option selected="" value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
													             		<?php }else { ?>
											                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
											                            <?php } endforeach ?>
													             	</select>
													            </div>
													        </div>
													        <div class="row form_campaign_1">
													            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round<?php echo $key['sorting'] ?>[]"<?php echo ($key['discardemail'] == 'Y') ?'checked' : '' ?>> Email loại</label>
													            <div class="col-xs-4  padding-lr0">
													             	<select class="textbox" name="round<?php echo $key['sorting'] ?>[]">
													             		<?php foreach ($mailtemplate as $mail): 
													             			if ($key['discmailtemp'] == $mail['mailprofileid']) {
													             		?>
													             			<option selected="" value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
													             		<?php }else { ?>
											                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
											                            <?php } endforeach ?>
													             	</select>
													            </div>
													        </div>
										        		</div>
										        		<?php if ($key['roundtype'] == 'Assessment'){ ?>
										        			<div class="body_vong_cd_1">
														        <div class="row form_campaign">
														            <label for="text" class=" col-xs-2 label-profile">Giới hạn mẫu phiếu trắc nghiệm</label>
														            <div class="col-xs-4  padding-lr0">
														             	<select class="textbox" name="round<?php echo $key['sorting'] ?>[]">
														             		<?php foreach ($asmt_tn as $tn): 
														             			if ($key['assessment'] == $tn['asmttemp']) { ?>
														             				<option value="<?php echo $tn['asmttemp'] ?>" selected><?php echo $tn['asmtname'] ?></option>
														             			<?php }else{ ?>
												                              		<option value="<?php echo $tn['asmttemp'] ?>"><?php echo $tn['asmtname'] ?></option>
												                            <?php } endforeach ?>
														             	</select>
														            </div>
														        </div>
														        <div class="row form_campaign_1">
														            <label for="text" class=" col-xs-2 label-profile">Email thông báo</label>
														            <div class="col-xs-4  padding-lr0">
														             	<select class="textbox" name="round<?php echo $key['sorting'] ?>[]">
														             		<?php foreach ($mailtemplate as $mail): 
													             			if ($row['asmtmailtemp'] == $mail['mailprofileid']) { ?>
													             				<option value="<?php echo $mail['mailprofileid'] ?>" selected><?php echo $mail['profilename'] ?></option>
													             			<?php }else{ ?>
											                              		<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
											                            <?php } endforeach ?>
														             	</select>
														            </div>
														        </div>
											        		</div>
										        		<?php }else if ($key['roundtype'] == 'Interview') { ?>
										        			<div class="body_vong_cd_1">
														        <div class="row form_campaign">
														            <label for="text" class=" col-xs-2 label-profile">Giới hạn mẫu phiếu phỏng vấn</label>
														            <div class="col-xs-4  padding-lr0">
														             	<select class="textbox" name="round<?php echo $key['sorting'] ?>[]">
														             		<?php foreach ($asmt_pv as $tn): 
														             			if ($key['scorecard'] == $tn['asmttemp']) { ?>
														             				<option value="<?php echo $tn['asmttemp'] ?>" selected><?php echo $tn['asmtname'] ?></option>
														             			<?php }else{ ?>
												                              		<option value="<?php echo $tn['asmttemp'] ?>"><?php echo $tn['asmtname'] ?></option>
												                            <?php } endforeach ?>
														             	</select>
														            </div>
														        </div>
														        <div class="row form_campaign">
														            <label for="text" class=" col-xs-2 label-profile">Email thông báo Ứng viên</label>
														            <div class="col-xs-4  padding-lr0">
														             	<select class="textbox" name="round<?php echo $key['sorting'] ?>[]">
														             		<?php foreach ($mailtemplate as $mail): 
														             			if ($key['interviewmailtemp'] == $mail['mailprofileid']) { ?>
														             				<option value="<?php echo $mail['mailprofileid'] ?>" selected><?php echo $mail['profilename'] ?></option>
														             			<?php }else{ ?>
												                              		<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
											                            	<?php } endforeach ?>
														             	</select>
														            </div>
														        </div>
														        <div class="row form_campaign_1">
														            <label for="text" class=" col-xs-2 label-profile">Email thông báo Người PV</label>
														            <div class="col-xs-4  padding-lr0">
														             	<select class="textbox" name="round<?php echo $key['sorting'] ?>[]">
														             		<?php foreach ($mailtemplate as $mail): 
														             			if ($key['invitemailtemp'] == $mail['mailprofileid']) { ?>
														             				<option value="<?php echo $mail['mailprofileid'] ?>" selected><?php echo $mail['profilename'] ?></option>
														             			<?php }else{ ?>
												                              		<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
											                            	<?php } endforeach ?>
														             	</select>
														            </div>
														        </div>
											        		</div>
										        		<?php }else if ($key['roundtype'] == 'Offer') { ?>
										        			<div class="body_vong_cd_1">
														        <div class="row form_campaign_1">
														            <label for="text" class=" col-xs-2 label-profile">Email Đề nghị</label>
														            <div class="col-xs-4  padding-lr0">
														             	<select class="textbox" name="round<?php echo $key['sorting'] ?>[]">
														             		<?php foreach ($mailtemplate as $mail): 
														             			if ($key['letteroffermailtemp'] == $mail['mailprofileid']) { ?>
														             				<option value="<?php echo $mail['mailprofileid'] ?>" selected><?php echo $mail['profilename'] ?></option>
														             			<?php }else{ ?>
												                              		<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
											                            	<?php } endforeach ?>
														             	</select>
														            </div>
														        </div>
											        		</div>
										        		<?php } ?>
										        	</div>
									        	</li>
						        		<?php } } } ?>
							        </ul>
							      </div>
							    </div>
						  	</div>
						</div>
						<div class="box_btn">
							<div class="pull-right">
								<a href="<?php echo base_url() ?>admin/campaign/main" class="btn btn_thoat">Thoát</a>
								<button type="button" id="saveRound" class="btn btn_tt">Lưu</button>
							</div>
						</div>
		            <!-- /.box-body -->
		       		</form>
	          	</div>
	        </div>
    	</div>
    </section>
</div>
<!-- <input type="hidden" id="count" value="8"> -->
<div class="hide" id="operator_js"><?php echo json_encode($operator); ?></div>

<style type="text/css">
	.select2-container{
		width: 100% !important;
	}
	.col-pc-12{
		width: 12.5%;
	}
	li{
		list-style: none;
	}
</style>
<script type="text/javascript">
	$(document).ready(function() {
		$('#sortable').sortable({
			handle: '.handle',
			items: 'li:not(.ui-state-disabled)',
			update: function (event, ui) {
				$('#sortable').find('li').each(function(index) {
					if($(this).attr('data-position') != (index+1)){
						$(this).attr('data-position',(index+1)).addClass('updated');
						$(this).find('.sorting').val(index+1);
						$(this).attr('id','round_'+(index+1))
					}
				});
				updateNewPositions();
			}
		});
	});
	function updateNewPositions() {
		var positions =[];
		$('.updated').each(function() {
			positions.push([$(this).attr('data-index'),$(this).attr('data-position')]);
			
			$(this).removeClass('updated');
		});
		console.log(positions);
		for (var i = 0; i < positions.length; i++) {
			var old_round =positions[i][0];
			var new_round =positions[i][1];
			var box = $('#box_round_'+old_round).clone().attr('id', 'box_round_temp_'+new_round).after('#box_round_'+old_round);
			$('#box_round_'+new_round).after(box);
			$('#box_round_temp_'+new_round).find('.info-box-number').text('V'+new_round);
			$('#box_round_'+old_round).empty();
			// $('#box_round_temp_'+new_round).attr('id', 'box_round_'+new_round);
		}
		for (var i = 0; i < positions.length; i++) {
			var old_round =positions[i][0];
			$('#box_round_'+old_round).remove();
			$('#box_round_temp_'+old_round).attr('id', 'box_round_'+old_round);
			$('#round_'+old_round).removeAttr('data-position').removeAttr('data-index').attr({
				'data-position': old_round,
				'data-index': old_round
			});;
		}

	}
	
	function copyRound(round) {
		var count_round = Number($('#count_round').val());
		var new_round = Number(round)+1;

		for (var i = count_round; i > round; i--) {
			var j = i+1;
			$('#round_'+i).find('.sorting').val(j);
			$('#round_'+i).removeAttr('data-position').attr('data-position', j).attr('data-index', j);
			$('#round_'+i).find('.btn_copy_'+i).attr('onclick', 'copyRound('+j+')').addClass('btn btn_cd btn_copy_'+j).removeClass('btn_copy_'+i);
			$('#round_'+i).find('.btn_delete_'+i).attr('onclick', 'deleteRound('+j+')').addClass('btn btn_cd btn_delete_'+j).removeClass('btn_delete_'+i);
			$('#round_'+i).find('.btn_edit_'+i).attr('onclick', 'editTitle('+j+')').addClass('btn btn_cd btn_edit_'+j).removeClass('btn_edit_'+i);
			$('#round_'+i).find('.roundname').addClass('roundname input_title_'+j).removeClass('input_title_'+i);
			$('#round_'+i).contents().find('#title_'+i).attr('id', 'title_' + j);
			$('#round_'+i).find('#col_add_pt_'+i).attr('id', 'col_add_pt_'+j);
			$('#round_'+i).find('#select_type'+i).attr('id', 'select_type'+j);
			$('#round_'+i).find('.add_pt').attr('onclick', 'insertPT('+j+')');
			$('#round_'+i).find('#manageround_'+i).attr('id', 'manageround_'+j);
			$('#round_'+i).find('[name*="round"]').each(function(){
			    $(this).attr('name','round'+j+'[]');
			}); 
			$('#round_'+i).attr('id', 'round_'+j);

			$('#box_round_'+i).find('.info-box-number').text('V'+j);
			$('#box_round_'+i).attr('id', 'box_round_'+j);
		}

		var roundtype = $('#select_type'+round).val();
		var row = $('#round_'+round).clone().attr('id', 'round_'+new_round).after('#round_'+round);
		$('#round_'+round).after(row);
		$('#round_'+new_round).attr('data-index', new_round);
		$('#round_'+new_round).attr('data-position', new_round);
		$('#round_'+new_round).find('.sorting').val(new_round);
		$('#round_'+new_round).children('.v_'+round).attr('class', 'v_' + new_round);
		$('#round_'+new_round).contents().find('#title_'+round).attr('id', 'title_' + new_round);
		var title = $('#title_'+new_round).text();
		$('#title_'+new_round).text(title+' copy');
		$('#round_'+new_round).contents().find('.input_title_'+round).attr('class', 'input_title_' + new_round+ ' roundname hide');
		$('#round_'+new_round).contents().find('.btn_copy_'+round).attr('onclick', 'copyRound('+new_round+')');
		$('#round_'+new_round).contents().find('.btn_delete_'+round).attr('onclick', 'deleteRound('+new_round+')');
		$('#round_'+new_round).contents().find('.btn_edit_'+round).attr('onclick', 'editTitle('+new_round+')');
		$('#round_'+new_round).find('#col_add_pt_'+round).attr('id', 'col_add_pt_'+new_round);
		$('#round_'+new_round).find('#select_type'+round).attr('id', 'select_type'+new_round);
		$('#round_'+new_round).find('.add_pt').attr('onclick', 'insertPT('+new_round+')');
		$('#round_'+new_round).find('#manageround_'+round).attr('id', 'manageround_'+new_round);
		$('#round_'+new_round).find('[name*="round"]').each(function(){
		    $(this).attr('name','round'+new_round+'[]');
		}); 
		$('#select_type'+new_round+' option[value="'+roundtype+'"]').prop('selected', true);
		var new_count = count_round+1;		
		$('#count_round').val(new_count);

		var box = $('#box_round_'+round).clone().attr('id', 'box_round_'+new_round).after('#box_round_'+round);
		$('#box_round_'+round).after(box);
		$('#box_round_'+new_round).find('.info-box-number').text('V'+new_round);
		$('#box_round_'+new_round).find('.info-box-text').text(title+' Copy');
		var width = 100/new_count;
		$('.col-pc-12').css('width', width+'%');

		$('.thoihan').datetimepicker({
	    	timepicker:false,
	    	format:'d/m/Y',
	    });
	}
	function deleteRound(round) {
		var count_round = $('#count_round').val();
		$('#round_'+round).remove();
		$('#box_round_'+round).remove();
		var width = 100/(count_round -1);
		$('.col-pc-12').css('width', width+'%');
		$('#count_round').val(count_round -1);

		for(var i = (round+1); i<=count_round; i++){
			var j = i-1;
			$('#round_'+i).find('.sorting').val(j);
			$('#round_'+i).attr('data-position', j).attr('data-index', j);
			$('#round_'+i).find('.btn_copy_'+i).attr('onclick', 'copyRound('+j+')').addClass('btn btn_cd btn_copy_'+j).removeClass('btn_copy_'+i);
			$('#round_'+i).find('.btn_delete_'+i).attr('onclick', 'deleteRound('+j+')').addClass('btn btn_cd btn_delete_'+j).removeClass('btn_delete_'+i);
			$('#round_'+i).find('.btn_edit_'+i).attr('onclick', 'editTitle('+j+')').addClass('btn btn_cd btn_edit_'+j).removeClass('btn_edit_'+i);
			$('#round_'+i).find('.roundname').addClass('roundname input_title_'+j).removeClass('input_title_'+i);
			$('#round_'+i).contents().find('#title_'+i).attr('id', 'title_' + j);
			$('#round_'+i).find('#col_add_pt_'+i).attr('id', 'col_add_pt_'+j);
			$('#round_'+i).find('.add_pt').attr('onclick', 'insertPT('+j+')');
			$('#round_'+i).find('#manageround_'+i).attr('id', 'manageround_'+j);
			$('#round_'+i).find('[name*="round"]').each(function(){
			    $(this).attr('name','round'+j+'[]');
			}); 
			$('#round_'+i).attr('id', 'round_'+j);

			$('#box_round_'+i).find('.info-box-number').text('V'+j);
			$('#box_round_'+i).attr('id', 'box_round_'+j);
		}
		$('#count_round').val(count_round-1);
	}
	function editTitle(round) {
		$('#title_'+round).addClass('hide');
		$('.input_title_'+round).removeClass('hide');
	}
	

	$('.js-example-basic_ql').select2({ width: '100%' });
	
	$('#saveRound').click(function(event) {
		// var flowpresetid = $('#flowpresetid').val();
		
		$.ajax({
			url: '<?php echo base_url() ?>admin/recruitprocess/saveRound',
			type: 'POST',
			dataType: 'json',
			data: $('#form_round').serialize(),
		})
		.done(function(data) {
			location.href='<?php echo base_url() ?>admin/recruitprocess/detail/'+data;
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
</script>