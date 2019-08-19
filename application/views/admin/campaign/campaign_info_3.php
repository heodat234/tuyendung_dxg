<div class="row">
	<div class="col-md-12">
    	<div class="box box-default">
            <div class="panel-group" id="accordion">
			  	<div class="panel panel-default border-rad0">
			  		<a data-toggle="collapse" data-parent="#accordion" href="#collapse1" onclick="rotate(1)">
				    	<div class="panel-heading rad-pad0 b-blue">
				       		<i class="fa fa-angle-right a-tabcs rotate rotate_1 down"></i>
				       		<div class="ul-nav">
						       	<label class="tittle-tab">
						       		Quản lý chiến dịch
						       	</label>
				       		</div>
				    	</div>
				    </a>
				    <div id="collapse1" class="panel-collapse collapse in">
				      	<div class="panel-body">
				      		<p class="title_ql">Là những người có thể thấy được toàn bộ nội dung của mọi bước trong chiến dịch, bao gồm cả những nội dung được đánh dấu ẩn với người khác của Thành viên chiến dịch</p>
				      		<?php
				      		if ($manager != '') {
				      		 foreach ($manager as $row){
				      		 	foreach ($operator as $op){
				      				if ($row == $op['operatorid']) { ?>
				      					<div class="col-xs-2 padding_le_ri_0 ql" id="col_ql_<?php echo $row ?>" onclick="subColQL(<?php echo $row ?>)">
							      			<div class="col-xs-3 padding_le_ri_0">
							      				<img class="img_ql" src="<?php echo base_url() ?>public/image/bbye.jpg">
							      				<div class="del_ql"><i class="fa fa-minus-circle fa-lg"></i></div>
							      			</div>
							      			<div class="col-xs-9 padding_le_ri_0">
							      				<p class="name_ql"><?php echo $op['operatorname'] ?></p>
							      			</div>
							      		</div>

				      		<?php } } } } ?>

				      		<div class="col-xs-2 padding_le_ri_0" id="col_add_ql">
				      			<div class="col-xs-3 padding_le_ri_0">
				      				<img class="img_ql" src="<?php echo base_url() ?>public/image/bbye.jpg">
				      			</div>
				      			<div class="col-xs-9 padding_le_ri_0">
				      				<a href data-toggle="modal" data-target="#insertQL"><p class="name_ql">Thêm quản lý chiến dịch</p></a>
				      			</div>
				      		</div>
				      	</div>
				    </div>
			  	</div>

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
				      	<div class="row form_campaign">
				            <label for="text" class=" col-xs-2 label-profile">Quy trình mẫu</label>
				            <div class="col-xs-5  padding-lr0">
				             	<select class="textbox" name="">
				             		<option>Hoạt động</option>
				             	</select>
				            </div>
				        </div>
				        <p class="title_ql">Sử dụng quy trình mẫu giúp rút ngắn thời gian xây dựng một chiến dịch. Người thiết lập có thể hiệu chỉnh số lượng vòng và thêm thành viên chiến dịch vào mỗi vòng.</p>
				        <p class="title_ql">Xem trước quy trình:</p>
				        <div class="box-body no-padding dash-box">
				        	<?php if(count($round) > 1){
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
				        	<form id="form_round">
				        		<input type="hidden" name="campaignid" id="campaignid_v3" value="<?php echo $campaignid ?>">
				        		<?php $i = 1; foreach ($round as $row):
				        			if ($row['roundtype'] == 'Profile') {
				        		?>
				        			<li class="ui-state-disabled" data-index="1" data-position="1">
						        		<div class="v_1" >
							        		<div class="header_vong_cd ">
							        			<input type="hidden" name="round1[]" value="1" class="sorting">
							        			<div class=" col-xs-4 pull-left">
							        				<i class="fa fa-ellipsis-v dis_fa"></i>
							        				<?php echo $row['roundname'] ?>
							        			</div>
							        			<input type="hidden" name="round1[]" value="<?php echo $row['roundname'] ?>" class="roundname hide ">
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
										            <label for="text" class=" col-xs-2 label-profile">Thời hạn vòng</label>
										            <div class="col-xs-4  padding-lr0">
										             	<input type="text" name="round1[]" class="textbox thoihan" value="<?php echo date_format(date_create(),"d/m/Y"); ?>">
										            </div>
										        </div>
										        <div class="row form_campaign">
										        	<label for="text" class=" col-xs-2 label-profile">Phụ trách vòng</label>
										        	<div class="col-xs-10  padding-lr0">
										        		<?php foreach ($row['manage'] as $mana): ?>
										        			<div class="col-xs-2 padding_le_ri_0 ql" id="col_pt_<?php echo $mana['operatorid'] ?>" onclick="subColPT(<?php echo $mana['operatorid'] ?>,<?php echo $row['roundid'] ?>)">
											        			<div class="col-xs-3 padding_le_ri_0">
																	<img class="img_ql" src="<?= base_url('public/image/')?><?= ($mana['filename'] != '')? $mana['filename'] : 'unknow.jpg' ?>">
																	<div class="del_ql">
																		<i class="fa fa-minus-circle fa-lg"></i>
																	</div>
																</div>
																<div class="col-xs-9 padding_le_ri_0">
																	<p class="name_ql"><?php echo $mana['operatorname'] ?></p>
																</div>
															</div>
										        		<?php endforeach ?>
										        		<div class="col-xs-2 padding_le_ri_0" id="col_add_pt_1">
											      			<div class="col-xs-3 padding_le_ri_0">
											      				<img class="img_ql" src="<?php echo base_url() ?>public/image/bbye.jpg">
											      			</div>
											      			<div class="col-xs-9 padding_le_ri_0">
											      				<a href="javascript:void(0)" class="add_pt" onclick="insertPT(1)"><p class="name_ql">Thêm phụ trách vòng</p></a>
											      			</div>
											      		</div>
											      		<input type="hidden" id="manageround_1" name="round1[]" value="">
										        	</div>
										        </div>
										        <div class="row form_campaign">
										            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round1[]" value="Y"> Email Chuyển vòng</label>
										            <div class="col-xs-4  padding-lr0">
										             	<select class="textbox" name="round1[]">
										             		<?php foreach ($mailtemplate as $mail):
										             			if ($row['transfmailtemp'] == $mail['mailprofileid']) { ?>
										             				<option value="<?php echo $mail['mailprofileid'] ?>" selected><?php echo $mail['profilename'] ?></option>
										             			<?php }else{ ?>
								                              		<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
								                            <?php } endforeach ?>
										             	</select>
										            </div>
										        </div>
										        <div class="row form_campaign_1">
										            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round1[]" value="Y"> Email loại</label>
										            <div class="col-xs-4  padding-lr0">
										             	<select class="textbox" name="round1[]">
										             		<?php foreach ($mailtemplate as $mail):
										             			if ($row['discmailtemp'] == $mail['mailprofileid']) { ?>
										             				<option value="<?php echo $mail['mailprofileid'] ?>" selected><?php echo $mail['profilename'] ?></option>
										             			<?php }else{ ?>
								                              		<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
								                            <?php } endforeach ?>
										             	</select>
										            </div>
										        </div>
							        		</div>
							        	</div>
						        	</li>
						        <?php }else if ($row['roundtype'] == 'Recruite') { ?>
						        	<li id="round_<?php echo $i ?>" class="ui-state-disabled" data-index="<?php echo $i ?>" data-position="<?php echo $i ?>">
						        		<div class="v_<?php echo $i ?> ">
							        		<div class="header_vong_cd">
							        			<input type="hidden" name="round<?php echo $i ?>[]" value="<?php echo $i ?>" class="sorting">
							        			<div class=" col-xs-4 pull-left">
							        				<i class="fa fa-ellipsis-v dis_fa"></i>
							        				<?php echo $row['roundname'] ?>
							        			</div>
							        			<input type="hidden" name="round<?php echo $i ?>[]" value="<?php echo $row['roundname'] ?>" class="roundname  ">
							        			<div class="pull-right box_btn_cd">
							        				<button class="btn btn_cd" disabled><i class="fa fa-plus"></i></button>
							        				<button class="btn 	btn_cd" disabled><i class="fa fa-pencil"></i></button>
							        			</div>
							        		</div>
							        		<div class="body_vong_cd">
							        			<div class="row form_campaign">
										            <label for="text" class=" col-xs-2 label-profile">Loại vòng</label>
										            <div class="col-xs-4  padding-lr0">
										             	<select class="textbox" name="round<?php echo $i ?>[]">
										             		<option value="Recruite" selected="">Tuyển dụng</option>
										             	</select>
										            </div>
										            <label for="text" class=" col-xs-2 label-profile">Thời hạn vòng</label>
										            <div class="col-xs-4  padding-lr0">
										             	<input type="text" name="round<?php echo $i ?>[]" class="textbox thoihan" value="<?php echo date_format(date_create($row['duedate']),"d/m/Y"); ?>">
										            </div>
										        </div>
										        <div class="row form_campaign_1">
										        	<label for="text" class=" col-xs-2 label-profile">Phụ trách vòng</label>
										        	<div class="col-xs-10  padding-lr0">
										        		<?php foreach ($row['manage'] as $mana): ?>
										        			<div class="col-xs-2 padding_le_ri_0 ql" id="col_pt_<?php echo $mana['operatorid'] ?>" onclick="subColPT(<?php echo $mana['operatorid'] ?>,<?php echo $row['roundid'] ?>)">
											        			<div class="col-xs-3 padding_le_ri_0">
                                                                    <img class="img_ql" src="<?= base_url('public/image/')?><?= ($mana['filename'] != '')? $mana['filename'] : 'unknow.jpg' ?>">
																	<div class="del_ql">
																		<i class="fa fa-minus-circle fa-lg"></i>
																	</div>
																</div>
																<div class="col-xs-9 padding_le_ri_0">
																	<p class="name_ql"><?php echo $mana['operatorname'] ?></p>
																</div>
															</div>
										        		<?php endforeach ?>
										        		<div class="col-xs-2 padding_le_ri_0" id="col_add_pt_<?php echo $i ?>">
											      			<div class="col-xs-3 padding_le_ri_0">
											      				<img class="img_ql" src="<?php echo base_url() ?>public/image/bbye.jpg">
											      			</div>
											      			<div class="col-xs-9 padding_le_ri_0">
											      				<a href="javascript:void(0)" class="add_pt" onclick="insertPT(<?php echo $i ?>)"><p class="name_ql">Thêm phụ trách vòng</p></a>
											      			</div>
											      		</div>
											      		<input type="hidden" id="manageround_<?php echo $i ?>" name="round<?php echo $i ?>[]" value="">
										        	</div>
										        </div>
							        		</div>
							        	</div>
						        	</li>
				        		<?php }else { ?>
				        			<li id="round_<?php echo $i ?>" data-index="<?php echo $i ?>" data-position="<?php echo $i ?>">
						        		<div class="v_<?php echo $i ?>" >
							        		<div class="header_vong_cd">
							        			<input type="hidden" name="round<?php echo $i ?>[]" value="<?php echo $i ?>" class="sorting">
							        			<div class=" col-xs-4 pull-left">
							        				<i class="fa fa-ellipsis-v handle"></i>
							        				<span id="title_<?php echo $i ?>"><?php echo $row['roundname'] ?></span>
							        				<input type="text" name="round<?php echo $i ?>[]" value="<?php echo $row['roundname'] ?>" class="roundname hide input_title_<?php echo $i ?>">
							        			</div>
							        			<div class="pull-right box_btn_cd">
							        				<button type="button" class="btn btn_cd btn_copy_<?php echo $i ?>" onclick="copyRound(<?php echo $i ?>)"><i class="fa fa-plus"></i></button>
							        				<button type="button" class="btn btn_cd btn_delete_<?php echo $i ?>" onclick="deleteRound(<?php echo $i ?>)"><i class="fa fa-trash-o"></i></button>
							        				<button type="button" class="btn btn_cd btn_edit_<?php echo $i ?>" onclick="editTitle(<?php echo $i ?>)"><i class="fa fa-pencil"></i></button>
							        			</div>
							        		</div>
							        		<div class="body_vong_cd">
							        			<div class="row form_campaign">
										            <label for="text" class=" col-xs-2 label-profile">Loại vòng</label>
										            <div class="col-xs-4  padding-lr0">
										             	<select class="textbox" id="select_type<?php echo $i ?>" name="round<?php echo $i ?>[]">
										             		<option value="Profile" disabled="">Hồ sơ</option>
										             		<option value="Filter">Sơ loại</option>
										             		<option value="Contact" >Tiếp cận</option>
										             		<option value="Assessment">Trắc nghiệm</option>
										             		<option value="Interview">Phỏng vấn</option>
										             		<option value="Offer">Đề nghị</option>
										             		<option value="Recruite" disabled="">Tuyển dụng</option>
										             	</select>
										            </div>
										            <script>
										            	$(document).ready(function() {
										            		$('#select_type<?php echo $i ?> option[value="<?php echo $row['roundtype'] ?>"]').prop('selected', 'selected');
										            	});
										            </script>
										            <label for="text" class=" col-xs-2 label-profile">Thời hạn vòng</label>
										            <div class="col-xs-4  padding-lr0">
										             	<input type="text" name="round<?php echo $i ?>[]" class="textbox thoihan" value="<?php echo date_format(date_create($row['duedate']),"d/m/Y"); ?>">
										            </div>
										        </div>
										        <div class="row form_campaign">
										        	<label for="text" class=" col-xs-2 label-profile">Phụ trách vòng</label>
										        	<div class="col-xs-10  padding-lr0">
										        		<?php foreach ($row['manage'] as $mana): ?>
										        			<div class="col-xs-2 padding_le_ri_0 ql" id="col_pt_<?php echo $mana['operatorid'] ?>" onclick="subColPT(<?php echo $mana['operatorid'] ?>,<?php echo $row['roundid'] ?>)">
											        			<div class="col-xs-3 padding_le_ri_0">
																	<img class="img_ql" src="<?= base_url('public/image/')?><?= ($mana['filename'] != '')? $mana['filename'] : 'unknow.jpg' ?>">
																	<div class="del_ql">
																		<i class="fa fa-minus-circle fa-lg"></i>
																	</div>
																</div>
																<div class="col-xs-9 padding_le_ri_0">
																	<p class="name_ql"><?php echo $mana['operatorname'] ?></p>
																</div>
															</div>
										        		<?php endforeach ?>
										        		<div class="col-xs-2 padding_le_ri_0" id="col_add_pt_<?php echo $i ?>">
											      			<div class="col-xs-3 padding_le_ri_0">
											      				<img class="img_ql" src="<?php echo base_url() ?>public/image/bbye.jpg">
											      			</div>
											      			<div class="col-xs-9 padding_le_ri_0">
											      				<a href="javascript:void(0)" class="add_pt" onclick="insertPT(<?php echo $i ?>)"><p class="name_ql">Thêm phụ trách vòng</p></a>
											      			</div>
											      		</div>
											      		<input type="hidden" id="manageround_<?php echo $i ?>" name="round<?php echo $i ?>[]" value="">
										        	</div>
										        </div>
										        <div class="row form_campaign">
										            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round<?php echo $i ?>[]"> Email Chuyển vòng</label>
										            <div class="col-xs-4  padding-lr0">
										             	<select class="textbox" name="round<?php echo $i ?>[]">
										             		<?php foreach ($mailtemplate as $mail):
										             			if ($row['transfmailtemp'] == $mail['mailprofileid']) { ?>
										             				<option value="<?php echo $mail['mailprofileid'] ?>" selected><?php echo $mail['profilename'] ?></option>
										             			<?php }else{ ?>
								                              		<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
								                            <?php } endforeach ?>
										             	</select>
										            </div>
										        </div>
										        <div class="row form_campaign_1">
										            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round<?php echo $i ?>[]"> Email loại</label>
										            <div class="col-xs-4  padding-lr0">
										             	<select class="textbox" name="round<?php echo $i ?>[]">
										             		<?php foreach ($mailtemplate as $mail):
										             			if ($row['discmailtemp'] == $mail['mailprofileid']) { ?>
										             				<option value="<?php echo $mail['mailprofileid'] ?>" selected><?php echo $mail['profilename'] ?></option>
										             			<?php }else{ ?>
								                              		<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
								                            <?php } endforeach ?>
										             	</select>
										            </div>
										        </div>
							        		</div>
							        		<?php if ($row['roundtype'] == 'Assessment'){ ?>
							        			<div class="body_vong_cd_1">
											        <div class="row form_campaign">
											            <label for="text" class=" col-xs-2 label-profile">Giới hạn mẫu phiếu trắc nghiệm</label>
											            <div class="col-xs-4  padding-lr0">
											             	<select class="textbox" name="round<?php echo $i ?>[]">
											             		<?php foreach ($asmt_tn as $tn):
											             			if ($row['assessment'] == $tn['asmttemp']) { ?>
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
											             	<select class="textbox" name="round<?php echo $i ?>[]">
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
							        		<?php }else if ($row['roundtype'] == 'Interview') { ?>
							        			<div class="body_vong_cd_1">
											        <div class="row form_campaign">
											            <label for="text" class=" col-xs-2 label-profile">Giới hạn mẫu phiếu phỏng vấn</label>
											            <div class="col-xs-4  padding-lr0">
											             	<select class="textbox" name="round<?php echo $i ?>[]">
											             		<?php foreach ($asmt_pv as $tn):
											             			if ($row['scorecard'] == $tn['asmttemp']) { ?>
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
											             	<select class="textbox" name="round<?php echo $i ?>[]">
											             		<?php foreach ($mailtemplate as $mail):
											             			if ($row['interviewmailtemp'] == $mail['mailprofileid']) { ?>
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
											             	<select class="textbox" name="round<?php echo $i ?>[]">
											             		<?php foreach ($mailtemplate as $mail):
											             			if ($row['invitemailtemp'] == $mail['mailprofileid']) { ?>
											             				<option value="<?php echo $mail['mailprofileid'] ?>" selected><?php echo $mail['profilename'] ?></option>
											             			<?php }else{ ?>
									                              		<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
								                            	<?php } endforeach ?>
											             	</select>
											            </div>
											        </div>
								        		</div>
							        		<?php }else if ($row['roundtype'] == 'Offer') { ?>
							        			<div class="body_vong_cd_1">
											        <div class="row form_campaign_1">
											            <label for="text" class=" col-xs-2 label-profile">Email Đề nghị</label>
											            <div class="col-xs-4  padding-lr0">
											             	<select class="textbox" name="round<?php echo $i ?>[]">
											             		<?php foreach ($mailtemplate as $mail):
											             			if ($row['letteroffermailtemp'] == $mail['mailprofileid']) { ?>
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
				        		<?php } ?>

				        		<?php $i++; endforeach ?>

				        	</form>
				        </ul>
				      </div>
				    </div>
			  	</div>
			</div>
			<!-- <div class="box_btn">
				<div class="pull-right">
					<a href="<?php echo base_url() ?>admin/campaign/main" class="btn btn_thoat">Thoát</a>
					<button type="submit" id="saveRound" class="btn btn_tt">Lưu</button>
				</div>
			</div> -->
        <!-- /.box-body -->
      	</div>
    </div>
</div>
<!-- <input type="hidden" id="count" value="8"> -->
<div class="hide" id="operator_js"><?php echo json_encode($operator); ?></div>

<div class="modal fade" id="insertQL" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width_450">
    <div class="modal-content " >
      	<div class="modal-header modal_header_cam">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
        	<h4 class="modal-title">Thêm Quản lý Chiến dịch</h4>
      	</div>
      	<form id="formManager">
      		<div class="modal-body modal_body_cam">
		      	<div class="body_cam" id="body_cam_1">
		      		<div class="col-xs-1" id="btn_event_1">
		      			<i class="fa fa-plus-circle fa-lg" onclick="addQL(1)"></i>
		      		</div>
		      		<div class="col-xs-11">
		      			<select class="seletext js-example-basic_ql" name="managecampaign[]" required="" id="select_type_1" >
		      				<option value="">Tìm kiếm từ danh sách người dùng</option>
		      				<?php foreach ($operator as $row): ?>
		      					<option value="<?php echo $row['operatorid'] ?>" ><?php echo $row['operatorname'] ?></option>
		      				<?php endforeach ?>
						</select>
						<span class="hide" id="show_name_1"></span>
		      		</div>
		      	</div>
		      	<input type="hidden" id="campaignid_ql" name="id" value="<?php echo $campaignid ?>">
		      </div>
		      <div class="modal-footer modal_footer_cam">
		      	<button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Hủy</button>
		      	<button type="button" class="btn btn_tt btn_tt1" id="saveManager" data-dismiss="modal">Lưu</button>
		      </div>
      	</form>
    </div>
  </div>
</div>

<div class="modal fade" id="insertPT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width_450">
    <div class="modal-content " >
      	<div class="modal-header modal_header_cam">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
        	<h4 class="modal-title">Thêm phụ trách vòng </h4>
      	</div>
      	<input type="hidden" id="roundid_pt">
      	<form id="formPT">
      		<div class="modal-body modal_body_cam_pt">
		      	<div class="body_cam" id="body_cam_pt_1">
		      		<div class="col-xs-1" id="btn_event_pt_1">
		      			<i class="fa fa-plus-circle fa-lg fa_pt" onclick="addPT(1)"></i>
		      		</div>
		      		<div class="col-xs-11">
		      			<select class="seletext js-example-basic" name="managecampaign[]" required=""  >
		      				<option value="">Tìm kiếm từ danh sách người dùng</option>
		      				<?php foreach ($operator as $row): ?>
		      					<option value="<?php echo $row['operatorid'] ?>" ><?php echo $row['operatorname'] ?></option>
		      				<?php endforeach ?>
						</select>
						<span class="hide" id="show_name_pt_1"></span>
		      		</div>
		      	</div>
		      </div>
		      <div class="modal-footer modal_footer_cam">
		      	<button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Hủy</button>
		      	<button type="button" class="btn btn_tt btn_tt1" id="savePT" data-dismiss="modal">Lưu</button>
		      </div>
      	</form>
    </div>
  </div>
</div>
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
			$('#round_'+i).find('.btn_edit_'+i).attr('onclick', 'editRound('+j+')').addClass('btn btn_cd btn_edit_'+j).removeClass('btn_edit_'+i);
			$('#round_'+i).find('.roundname').addClass('roundname input_title_'+j).removeClass('input_title_'+i);
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
		$('#round_'+new_round).find('.add_pt').attr('onclick', 'insertPT('+new_round+')');
		$('#round_'+new_round).find('#manageround_'+round).attr('id', 'manageround_'+new_round);
		$('#round_'+new_round).find('[name*="round"]').each(function(){
		    $(this).attr('name','round'+new_round+'[]');
		});

		var new_count = count_round+1;
		$('#count_round').val(new_count);

		var box = $('#box_round_'+round).clone().attr('id', 'box_round_'+new_round).after('#box_round_'+round);
		$('#box_round_'+round).after(box);
		$('#box_round_'+new_round).find('.info-box-number').text('V'+new_round);
		$('#box_round_'+new_round).find('.info-box-text').text(title+' Copy');
		var width = 100/new_count;
		$('.col-pc-12').css('width', width+'%');
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
			$('#round_'+i).find('.btn_edit_'+i).attr('onclick', 'editRound('+j+')').addClass('btn btn_cd btn_edit_'+j).removeClass('btn_edit_'+i);
			$('#round_'+i).find('.roundname').addClass('roundname input_title_'+j).removeClass('input_title_'+i);
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
	function addQL(i) {
		var j = i+1;
		var value = $('#select_type_'+i).val();
		var name = $('#select_type_'+i).find(":selected").text();
		if (value != '') {
			var row = $('#body_cam_'+i).clone().attr('id', 'body_cam_'+j).after('#body_cam_'+i);
			$('.modal_body_cam').append(row);
			$('#body_cam_'+j).contents().find('.fa-plus-circle').attr('onclick', 'addQL('+j+')');
			$('#body_cam_'+j).contents().find('.seletext').attr('id', 'select_type_'+j);
			$('#body_cam_'+j).contents().find('#show_name_'+i).attr('id', 'show_name_'+j);
			$('#body_cam_'+j).children().attr('id', 'btn_event_'+j);
			$('.js-example-basic_ql').select2({ width: '100%' });
			$('.js-example-basic_ql').last().next().next().remove();

			$('#show_name_'+i).text(name).removeClass('hide');
			$('#select_type_'+i).hide();
			$('#btn_event_'+i).empty().html('<i class="fa fa-minus-circle fa-lg" onclick="subQL('+i+')"></i>');
		}else{
			alert('Bạn chưa chọn người quản lý');
		}
	}
	function subQL(i) {
		$('#body_cam_'+i).remove();
	}
	function subColQL(id) {
		var campaignid = $('#campaignid_ql').val();
		$('#col_ql_'+id).remove();
		$.ajax({
			url: '<?php echo base_url() ?>admin/campaign/removeManager',
			type: 'POST',
			dataType: 'json',
			data: {id:id, campaignid:campaignid},
		})
		.done(function() {
		})
		.fail(function() {
			console.log("error");
		});
	}
	$('#saveManager').click(function(event) {
		var operator = $('#operator_js').text();
		operator = (JSON.parse(operator));
		$.ajax({
			url: '<?php echo base_url() ?>admin/campaign/saveManager',
			type: 'POST',
			dataType: 'json',
			data: $('#formManager').serialize(),
		})
		.done(function(data) {
			var row ='';
			for(var i in data){
				for(var j in operator ){
					if (data[i] == operator[j]['operatorid']) {
						row ='<div class="col-xs-2 padding_le_ri_0 ql" id="col_ql_'+data[i]+'" onclick="subColQL('+data[i]+')"><div class="col-xs-3 padding_le_ri_0">';
						row += '<img class="img_ql" src="<?php echo base_url() ?>public/image/bbye.jpg"><div class="del_ql"><i class="fa fa-minus-circle fa-lg"></i></div></div>';
						row += '<div class="col-xs-9 padding_le_ri_0"><p class="name_ql">'+operator[j]['operatorname']+'</p></div></div>';
						$('#col_add_ql').before(row);
					}
				}
			}

			$('#insertQL').modal('hide');
		})
		.fail(function() {
			console.log("error");
		});

	});

	function insertPT(roundid) {
		$('#roundid_pt').val(roundid);
		$('#insertPT').modal('show');
	}

	function addPT(i) {
		var j = i+1;
		var value = $('#select_type_pt_'+i).val();
		var name = $('#select_type_pt_'+i).find(":selected").text();
		if (value != '') {
			var row = $('#body_cam_pt_'+i).clone().attr('id', 'body_cam_pt_'+j).after('#body_cam_pt_'+i);
			$('.modal_body_cam_pt').append(row);
			$('#body_cam_pt_'+j).contents().find('.fa_pt').attr('onclick', 'addPT('+j+')');
			$('#body_cam_pt_'+j).contents().find('.seletext').attr('id', 'select_type_pt_'+j);
			$('#body_cam_pt_'+j).contents().find('#show_name_pt_'+i).attr('id', 'show_name_pt_'+j);
			$('#body_cam_pt_'+j).children().attr('id', 'btn_event_pt_'+j);
			$('.js-example-basic').select2({ width: '100%' });
			$('.js-example-basic').last().next().next().remove();

			$('#show_name_pt_'+i).text(name).removeClass('hide');
			$('#select_type_pt_'+i).hide();
			$('#btn_event_pt_'+i).empty().html('<i class="fa fa-minus-circle fa-lg" onclick="subPT('+i+')"></i>');
		}else{
			alert('Bạn chưa chọn người phụ trách vòng');
		}
	}
	function subPT(i) {
		$('#body_cam_pt_'+i).remove();
	}
	function subColPT(id,roundid) {
		$('#col_pt_'+id).remove();
		var manageround = $('#manageround_'+roundid).val();
		manageround1 = manageround.replace(id+',', '');
		$('#manageround_'+roundid).val(manageround1);
	}

	$('#savePT').click(function(event) {
		var roundid = $('#roundid_pt').val();
		var operator = $('#operator_js').text();
		operator = (JSON.parse(operator));
		var data = $('#formPT').serializeArray();
		var row = '';
		var str = '';
		for(var i in data){
			if (data[i].value == '')
			{
				continue;
			}
			for(var j in operator ){
				if (data[i].value == operator[j]['operatorid']) {
					row ='<div class="col-xs-2 padding_le_ri_0 ql" id="col_pt_'+data[i].value+'" onclick="subColPT('+data[i].value+','+roundid+')"><div class="col-xs-3 padding_le_ri_0">';
					row += '<img class="img_ql" src="<?php echo base_url() ?>public/image/bbye.jpg"><div class="del_ql"><i class="fa fa-minus-circle fa-lg"></i></div></div>';
					row += '<div class="col-xs-9 padding_le_ri_0"><p class="name_ql">'+operator[j]['operatorname']+'</p></div></div>';
					$('#col_add_pt_'+roundid).before(row);
				}
			}
			str += data[i].value + ',';
		}
		var manageround = $('#manageround_'+roundid).val();
		if(manageround != ''){
			manageround += str;
		}else{
			manageround = str;
		}
		$('#manageround_'+roundid).val(manageround);
		$('#insertPT').modal('hide');



	});

	// $('#saveRound').click(function(event) {
	// 	var campaignid = $('#campaignid_v3').val();

	// 	$.ajax({
	// 		url: '<?php echo base_url() ?>admin/campaign/saveRound',
	// 		type: 'POST',
	// 		dataType: 'json',
	// 		data: $('#form_round').serialize(),
	// 	})
	// 	.done(function() {
	// 		location.href='<?php echo base_url() ?>admin/campaign/new_campaign_4/'+campaignid;
	// 	})
	// 	.fail(function() {
	// 		console.log("error");
	// 	})
	// 	.always(function() {
	// 		console.log("complete");
	// 	});

	// });
</script>