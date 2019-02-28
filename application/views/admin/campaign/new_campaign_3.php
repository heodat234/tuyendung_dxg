<div class="content-wrapper">
    <section class="content">
    	<div class="row">
       		<div class="col-md-12">
	        	<div class="box box-default">
		            <div class="box-header" id="box_header_1">
		              <h5 class="box-title">Tạo một chiến dịch tuyển dụng</h5>
		              <div class="box-tools pull-right">
		                <button type="button" class="btn btn-default"><i class="fa fa-print"></i></button>
		              </div>
		            </div>
		            <div id="box_header_2">
		            	<a href="<?php echo base_url() ?>admin/campaign/main" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Previous"><i class="fa fa-chevron-left"></i> Quay lại</a>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body no-padding dash-box">
		              <div class="col-md-3 box_body">
		                <div class="info-box-title"><i class="fa fa-suitcase"></i> Thông tin công việc</div>
		                <span class="info-box-text_1">Mô tả về các yêu cầu công việc, trách nhiệm, mục tiêu, quyền hạn, môi trường làm việc</span>
		              </div>
		              <div class="col-md-3 box_body">
		                <div class="info-box-title"><i class="fa fa-suitcase"></i> Phạm vi tìm kiếm</div>
		                <span class="info-box-text_1">Thiết lập sẵn các phạm vi tìm kiếm giúp giới hạn số lượng hồ sơ phù hợp</span>
		              </div>
		              <div class="col-md-3 box_body">
		                <div class="info-box-title"><i class="fa fa-list-ol"></i> Quy trình tuyển dụng</div>
		                <span class="info-box-text_1">Thiết lập quy trình cho các vòng Sơ loại, Tiếp cận, Phỏng vấn, Đề nghị và Tuyển dụng</span>
		              </div>
		              <div class="col-md-3 box_body box_2">
		                <div class="info-box-title"><i class="fa fa-credit-card"></i> Cơ hội nghề nghiệp</div>
		                <span class="info-box-text_1">Đưa chiến dịch tuyển dụng lên trang chủ (Web portal) của tập đoàn</span>
		              </div>
		            </div>
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
						             	<select class="textbox select2" name="" onchange="changeProcess(this.value)">
						             		<option value="0">Chọn quy trình mẫu</option>
						             		<?php foreach ($process as $pc): ?>
						             			<option value="<?php echo $pc['flowpresetid'] ?>"><?php echo $pc['flowpresetname'] ?></option>
						             		<?php endforeach ?>
						             	</select>
						            </div>
						        </div>
						        <p class="title_ql">Sử dụng quy trình mẫu giúp rút ngắn thời gian xây dựng một chiến dịch. Người thiết lập có thể hiệu chỉnh số lượng vòng và thêm thành viên chiến dịch vào mỗi vòng.</p>
						        <p class="title_ql">Xem trước quy trình:</p>
						        <div class="box-body no-padding dash-box" id="box_temp">
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
						        </div>
						        <p class="title_qt">Điều chỉnh Quy trình:</p>
						        <input type="hidden" id="count_round" name="count_round_form" value="8">
						        <ul id="sortable" class="sortable-dragging sortable-placeholder">
						        	<form id="form_round">
						        		<input type="hidden" name="campaignid" id="campaignid_v3" value="<?php echo $campaignid ?>">
						        		<li class="li_round ui-state-disabled" data-index="1" data-position="1">
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
											             	<select class="textbox select2" name="round1[]" >
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
											            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round1[]" > Email Chuyển vòng</label>
											            <div class="col-xs-4  padding-lr0">
											             	<select class="textbox select2" name="round1[]">
											             		<option value="0">Chọn mẫu mail thông báo</option>
											             		<?php foreach ($mailtemplate as $mail): ?>
									                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
									                            <?php endforeach ?>
											             	</select>
											            </div>
											        </div>
											        <div class="row form_campaign_1">
											            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round1[]" > Email loại</label>
											            <div class="col-xs-4  padding-lr0">
											             	<select class="textbox select2" name="round1[]">
											             		<option value="0">Chọn mẫu mail thông báo</option>
											             		<?php foreach ($mailtemplate as $mail): ?>
									                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
									                            <?php endforeach ?>
											             	</select>
											            </div>
											        </div>
								        		</div>
								        	</div>
							        	</li>
							        	<li class="li_round" id="round_2" data-index="2" data-position="2">
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
											             	<select class="textbox select2" name="round2[]" id="select_type2">
											             		<option value="Profile" disabled="">Hồ sơ</option>
											             		<option value="Filter">Sơ loại</option>
											             		<option value="Contact">Tiếp cận</option>
											             		<option value="Assessment">Trắc nghiệm</option>
											             		<option value="Interview">Phỏng vấn</option>
											             		<option value="Offer">Đề nghị</option>
											             		<option value="Recruite" disabled="">Tuyển dụng</option>
											             	</select>
											            </div>
											            <label for="text" class=" col-xs-2 label-profile">Thời hạn vòng</label>
											            <div class="col-xs-4  padding-lr0">
											             	<input type="text" name="round2[]" class="textbox thoihan" value="<?php echo date_format(date_create(),"d/m/Y"); ?>"> 
											            </div>
											        </div>
											        <div class="row form_campaign">
											        	<label for="text" class=" col-xs-2 label-profile">Phụ trách vòng</label>
											        	<div class="col-xs-10  padding-lr0">
											        		<div class="col-xs-2 padding_le_ri_0" id="col_add_pt_2">
												      			<div class="col-xs-3 padding_le_ri_0">
												      				<img class="img_ql" src="<?php echo base_url() ?>public/image/bbye.jpg">
												      			</div>
												      			<div class="col-xs-9 padding_le_ri_0">
												      				<a href="javascript:void(0)" class="add_pt" onclick="insertPT(2)"><p class="name_ql">Thêm phụ trách vòng</p></a>
												      			</div>
												      		</div>
												      		<input type="hidden" id="manageround_2" name="round2[]" value="">
											        	</div>
											        </div>
											        <div class="row form_campaign">
											            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round2[]"> Email Chuyển vòng</label>
											            <div class="col-xs-4  padding-lr0">
											             	<select class="textbox select2" name="round2[]">
											             		<option value="0">Chọn mẫu mail thông báo</option>
											             		<?php foreach ($mailtemplate as $mail): ?>
									                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
									                            <?php  endforeach ?>
											             	</select>
											            </div>
											        </div>
											        <div class="row form_campaign_1">
											            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round2[]"> Email loại</label>
											            <div class="col-xs-4  padding-lr0">
											             	<select class="textbox select2" name="round2[]">
											             		<option value="0">Chọn mẫu mail thông báo</option>
											             		<?php foreach ($mailtemplate as $mail): ?>
									                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
									                            <?php  endforeach ?>
											             	</select>
											            </div>
											        </div>
								        		</div>
								        	</div>
							        	</li>
							        	<li class="li_round" id="round_3" data-index="3" data-position="3">
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
											             	<select class="textbox select2" name="round3[]" id="select_type3">
											             		<option value="Profile" disabled="">Hồ sơ</option>
											             		<option value="Filter">Sơ loại</option>
											             		<option value="Contact" selected="">Tiếp cận</option>
											             		<option value="Assessment">Trắc nghiệm</option>
											             		<option value="Interview">Phỏng vấn</option>
											             		<option value="Offer">Đề nghị</option>
											             		<option value="Recruite" disabled="">Tuyển dụng</option>
											             	</select>
											            </div>
											            <label for="text" class=" col-xs-2 label-profile">Thời hạn vòng</label>
											            <div class="col-xs-4  padding-lr0">
											             	<input type="text" name="round3[]" class="textbox thoihan" value="<?php echo date_format(date_create(),"d/m/Y"); ?>"> 
											            </div>
											        </div>
											        <div class="row form_campaign">
											        	<label for="text" class=" col-xs-2 label-profile">Phụ trách vòng</label>
											        	<div class="col-xs-10  padding-lr0">
											        		<div class="col-xs-2 padding_le_ri_0" id="col_add_pt_3">
												      			<div class="col-xs-3 padding_le_ri_0">
												      				<img class="img_ql" src="<?php echo base_url() ?>public/image/bbye.jpg">
												      			</div>
												      			<div class="col-xs-9 padding_le_ri_0">
												      				<a href="javascript:void(0)" class="add_pt" onclick="insertPT(3)"><p class="name_ql">Thêm phụ trách vòng</p></a>
												      			</div>
												      		</div>
												      		<input type="hidden" id="manageround_3" name="round3[]" value="">
											        	</div>
											        </div>
											        <div class="row form_campaign">
											            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round3[]"> Email Chuyển vòng</label>
											            <div class="col-xs-4  padding-lr0">
											             	<select class="textbox select2" name="round3[]">
											             		<option value="0">Chọn mẫu mail thông báo</option>
											             		<?php foreach ($mailtemplate as $mail): ?>
									                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
									                            <?php  endforeach ?>
											             	</select>
											            </div>
											        </div>
											        <div class="row form_campaign_1">
											            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round3[]"> Email loại</label>
											            <div class="col-xs-4  padding-lr0">
											             	<select class="textbox select2" name="round3[]">
											             		<option value="0">Chọn mẫu mail thông báo</option>
											             		<?php foreach ($mailtemplate as $mail): ?>
									                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
									                            <?php  endforeach ?>
											             	</select>
											            </div>
											        </div>
								        		</div>
								        	</div>
							        	</li>
							        	<li class="li_round" id="round_4" data-index="4" data-position="4">
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
											             	<select class="textbox select2" name="round4[]" id="select_type4">
											             		<option value="Profile" disabled="">Hồ sơ</option>
											             		<option value="Filter">Sơ loại</option>
											             		<option value="Contact">Tiếp cận</option>
											             		<option value="Assessment" selected="">Trắc nghiệm</option>
											             		<option value="Interview">Phỏng vấn</option>
											             		<option value="Offer">Đề nghị</option>
											             		<option value="Recruite" disabled="">Tuyển dụng</option>
											             	</select>
											            </div>
											            <label for="text" class=" col-xs-2 label-profile">Thời hạn vòng</label>
											            <div class="col-xs-4  padding-lr0">
											             	<input type="text" name="round4[]" class="textbox thoihan" value="<?php echo date_format(date_create(),"d/m/Y"); ?>"> 
											            </div>
											        </div>
											        <div class="row form_campaign">
											        	<label for="text" class=" col-xs-2 label-profile">Phụ trách vòng</label>
											        	<div class="col-xs-10  padding-lr0">
											        		<div class="col-xs-2 padding_le_ri_0" id="col_add_pt_4">
												      			<div class="col-xs-3 padding_le_ri_0">
												      				<img class="img_ql" src="<?php echo base_url() ?>public/image/bbye.jpg">
												      			</div>
												      			<div class="col-xs-9 padding_le_ri_0">
												      				<a href="javascript:void(0)" class="add_pt" onclick="insertPT(4)"><p class="name_ql">Thêm phụ trách vòng</p></a>
												      			</div>
												      		</div>
												      		<input type="hidden" id="manageround_4" name="round4[]" value="">
											        	</div>
											        </div>
											        <div class="row form_campaign">
											            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round4[]"> Email Chuyển vòng</label>
											            <div class="col-xs-4  padding-lr0">
											             	<select class="textbox select2" name="round4[]">
											             		<option value="0">Chọn mẫu mail thông báo</option>
											             		<?php foreach ($mailtemplate as $mail): ?>
									                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
									                            <?php endforeach ?>
											             	</select>
											            </div>
											        </div>
											        <div class="row form_campaign_1">
											            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round4[]"> Email loại</label>
											            <div class="col-xs-4  padding-lr0">
											             	<select class="textbox select2" name="round4[]">
											             		<option value="0">Chọn mẫu mail thông báo</option>
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
											             	<select class="textbox select2" name="round4[]">
											             		<option value="0">Chọn phiếu trắc nghiệm</option>
											             		<?php foreach ($asmt_tn as $tn): ?>
									                              	<option value="<?php echo $tn['asmttemp'] ?>"><?php echo $tn['asmtname'] ?></option>
									                            <?php endforeach ?>	
											             	</select>
											            </div>
											        </div>
											        <div class="row form_campaign_1">
											            <label for="text" class=" col-xs-2 label-profile">Email thông báo</label>
											            <div class="col-xs-4  padding-lr0">
											             	<select class="textbox select2" name="round4[]">
											             		<option value="0">Chọn mẫu mail thông báo</option>
											             		<?php foreach ($mailtemplate as $mail): ?>
									                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
									                            <?php endforeach ?>
											             	</select>
											            </div>
											        </div>
								        		</div>
								        	</div>
							        	</li>
							        	<li class="li_round" id="round_5" data-index="5" data-position="5">
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
											             	<select class="textbox select2" name="round5[]" id="select_type5">
											             		<option value="Profile" disabled="">Hồ sơ</option>
											             		<option value="Filter">Sơ loại</option>
											             		<option value="Contact">Tiếp cận</option>
											             		<option value="Assessment">Trắc nghiệm</option>
											             		<option value="Interview" selected="">Phỏng vấn</option>
											             		<option value="Offer">Đề nghị</option>
											             		<option value="Recruite" disabled="">Tuyển dụng</option>
											             	</select>
											            </div>
											            <label for="text" class=" col-xs-2 label-profile">Thời hạn vòng</label>
											            <div class="col-xs-4  padding-lr0">
											             	<input type="text" name="round5[]" class="textbox thoihan" value="<?php echo date_format(date_create(),"d/m/Y"); ?>"> 
											            </div>
											        </div>
											        <div class="row form_campaign">
											        	<label for="text" class=" col-xs-2 label-profile">Phụ trách vòng</label>
											        	<div class="col-xs-10  padding-lr0">
											        		<div class="col-xs-2 padding_le_ri_0" id="col_add_pt_5">
												      			<div class="col-xs-3 padding_le_ri_0">
												      				<img class="img_ql" src="<?php echo base_url() ?>public/image/bbye.jpg">
												      			</div>
												      			<div class="col-xs-9 padding_le_ri_0">
												      				<a href="javascript:void(0)" class="add_pt" onclick="insertPT(5)"><p class="name_ql">Thêm phụ trách vòng</p></a>
												      			</div>
												      		</div>
												      		<input type="hidden" id="manageround_5" name="round5[]" value="">
											        	</div>
											        </div>
											        <div class="row form_campaign">
											            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round5[]"> Email Chuyển vòng</label>
											            <div class="col-xs-4  padding-lr0">
											             	<select class="textbox select2" name="round5[]">
											             		<option value="0">Chọn mẫu mail thông báo</option>
											             		<?php foreach ($mailtemplate as $mail): ?>
									                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
									                            <?php endforeach ?>
											             	</select>
											            </div>
											        </div>
											        <div class="row form_campaign_1">
											            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round5[]"> Email loại</label>
											            <div class="col-xs-4  padding-lr0">
											             	<select class="textbox select2" name="round5[]">
											             		<option value="0">Chọn mẫu mail thông báo</option>
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
											             	<select class="textbox select2" name="round5[]">
											             		<option value="0">Chọn phiếu phỏng vấn</option>
											             		<?php foreach ($asmt_pv as $tn): ?>
									                              	<option value="<?php echo $tn['asmttemp'] ?>"><?php echo $tn['asmtname'] ?></option>
									                            <?php endforeach ?>
											             	</select>
											            </div>
											        </div>
											        <div class="row form_campaign">
											            <label for="text" class=" col-xs-2 label-profile">Email thông báo Ứng viên</label>
											            <div class="col-xs-4  padding-lr0">
											             	<select class="textbox select2" name="round5[]">
											             		<option value="0">Chọn mẫu mail thông báo</option>
											             		<?php foreach ($mailtemplate as $mail): ?>
									                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
									                            <?php endforeach ?>
											             	</select>
											            </div>
											        </div>
											        <div class="row form_campaign_1">
											            <label for="text" class=" col-xs-2 label-profile">Email thông báo Người PV</label>
											            <div class="col-xs-4  padding-lr0">
											             	<select class="textbox select2" name="round5[]">
											             		<option value="0">Chọn mẫu mail thông báo</option>
											             		<?php foreach ($mailtemplate as $mail): ?>
									                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
									                            <?php endforeach ?>
											             	</select>
											            </div>
											        </div>
								        		</div>
								        	</div>
							        	</li>
							        	<li class="li_round" id="round_6" data-index="6" data-position="6">
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
											             	<select class="textbox select2" name="round6[]" id="select_type6">
											             		<option value="Profile" disabled="">Hồ sơ</option>
											             		<option value="Filter">Sơ loại</option>
											             		<option value="Contact">Tiếp cận</option>
											             		<option value="Assessment">Trắc nghiệm</option>
											             		<option value="Interview" selected="">Phỏng vấn</option>
											             		<option value="Offer">Đề nghị</option>
											             		<option value="Recruite" disabled="">Tuyển dụng</option>
											             	</select>
											            </div>
											            <label for="text" class=" col-xs-2 label-profile">Thời hạn vòng</label>
											            <div class="col-xs-4  padding-lr0">
											             	<input type="text" name="round6[]" class="textbox thoihan" value="<?php echo date_format(date_create(),"d/m/Y"); ?>"> 
											            </div>
											        </div>
											        <div class="row form_campaign">
											        	<label for="text" class=" col-xs-2 label-profile">Phụ trách vòng</label>
											        	<div class="col-xs-10  padding-lr0">
											        		<div class="col-xs-2 padding_le_ri_0" id="col_add_pt_6">
												      			<div class="col-xs-3 padding_le_ri_0">
												      				<img class="img_ql" src="<?php echo base_url() ?>public/image/bbye.jpg">
												      			</div>
												      			<div class="col-xs-9 padding_le_ri_0">
												      				<a href="javascript:void(0)" class="add_pt" onclick="insertPT(6)"><p class="name_ql">Thêm phụ trách vòng</p></a>
												      			</div>
												      		</div>
												      		<input type="hidden" id="manageround_6" name="round6[]" value="">
											        	</div>
											        </div>
											        <div class="row form_campaign">
											            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round6[]"> Email Chuyển vòng</label>
											            <div class="col-xs-4  padding-lr0">
											             	<select class="textbox select2" name="round6[]">
											             		<option value="0">Chọn mẫu mail thông báo</option>
											             		<?php foreach ($mailtemplate as $mail): ?>
									                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
									                            <?php endforeach ?>
											             	</select>
											            </div>
											        </div>
											        <div class="row form_campaign_1">
											            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round6[]"> Email loại</label>
											            <div class="col-xs-4  padding-lr0">
											             	<select class="textbox select2" name="round6[]">
											             		<option value="0">Chọn mẫu mail thông báo</option>
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
											             	<select class="textbox select2" name="round6[]">
											             		<option value="0">Chọn phiếu phỏng vấn</option>
											             		<?php foreach ($asmt_pv as $tn): ?>
									                              	<option value="<?php echo $tn['asmttemp'] ?>"><?php echo $tn['asmtname'] ?></option>
									                            <?php endforeach ?>
											             	</select>
											            </div>
											        </div>
											        <div class="row form_campaign">
											            <label for="text" class=" col-xs-2 label-profile">Email thông báo Ứng viên</label>
											            <div class="col-xs-4  padding-lr0">
											             	<select class="textbox select2" name="round6[]">
											             		<option value="0">Chọn mẫu mail thông báo</option>
											             		<?php foreach ($mailtemplate as $mail): ?>
									                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
									                            <?php endforeach ?>
											             	</select>
											            </div>
											        </div>
											        <div class="row form_campaign_1">
											            <label for="text" class=" col-xs-2 label-profile">Email thông báo Người PV</label>
											            <div class="col-xs-4  padding-lr0">
											             	<select class="textbox select2" name="round6[]">
											             		<option value="0">Chọn mẫu mail thông báo</option>
											             		<?php foreach ($mailtemplate as $mail): ?>
									                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
									                            <?php endforeach ?>
											             	</select>
											            </div>
											        </div>
								        		</div>
								        	</div>
							        	</li>
							        	<li class="li_round" id="round_7" data-index="7" data-position="7">
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
											             	<select class="textbox select2" name="round7[]" id="select_type7">
											             		<option value="Profile" disabled="">Hồ sơ</option>
											             		<option value="Filter">Sơ loại</option>
											             		<option value="Contact">Tiếp cận</option>
											             		<option value="Assessment">Trắc nghiệm</option>
											             		<option value="Interview">Phỏng vấn</option>
											             		<option value="Offer" selected="">Đề nghị</option>
											             		<option value="Recruite" disabled="">Tuyển dụng</option>
											             	</select>
											            </div>
											            <label for="text" class=" col-xs-2 label-profile">Thời hạn vòng</label>
											            <div class="col-xs-4  padding-lr0">
											             	<input type="text" name="round7[]" class="textbox thoihan" value="<?php echo date_format(date_create(),"d/m/Y"); ?>"> 
											            </div>
											        </div>
											        <div class="row form_campaign">
											        	<label for="text" class=" col-xs-2 label-profile">Phụ trách vòng</label>
											        	<div class="col-xs-10  padding-lr0">
											        		<div class="col-xs-2 padding_le_ri_0" id="col_add_pt_7">
												      			<div class="col-xs-3 padding_le_ri_0">
												      				<img class="img_ql" src="<?php echo base_url() ?>public/image/bbye.jpg">
												      			</div>
												      			<div class="col-xs-9 padding_le_ri_0">
												      				<a href="javascript:void(0)" class="add_pt" onclick="insertPT(7)"><p class="name_ql">Thêm phụ trách vòng</p></a>
												      			</div>
												      		</div>
												      		<input type="hidden" id="manageround_7" name="round7[]" value="">
											        	</div>
											        </div>
											        <div class="row form_campaign">
											            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round7[]"> Email Chuyển vòng</label>
											            <div class="col-xs-4  padding-lr0">
											             	<select class="textbox select2" name="round7[]">
											             		<option value="0">Chọn mẫu mail thông báo</option>
											             		<?php foreach ($mailtemplate as $mail): ?>
									                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
									                            <?php endforeach ?>
											             	</select>
											            </div>
											        </div>
											        <div class="row form_campaign_1">
											            <label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round7[]"> Email loại</label>
											            <div class="col-xs-4  padding-lr0">
											             	<select class="textbox select2" name="round7[]">
											             		<option value="0">Chọn mẫu mail thông báo</option>
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
											             	<select class="textbox select2" name="round7[]">
											             		<option value="0">Chọn mẫu mail thông báo</option>
											             		<?php foreach ($mailtemplate as $mail): ?>
									                              	<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>
									                            <?php endforeach ?>
											             	</select>
											            </div>
											        </div>
								        		</div>
								        	</div>
							        	</li>
							        	<li id="round_8" class="li_round ui-state-disabled" data-index="8" data-position="8">
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
											             	<select class="textbox select2" name="round8[]">
											             		<option value="Recruite" selected="">Tuyển dụng</option>
											             	</select>
											            </div>
											            <label for="text" class=" col-xs-2 label-profile">Thời hạn vòng</label>
											            <div class="col-xs-4  padding-lr0">
											             	<input type="text" name="round8[]" class="textbox thoihan" value="<?php echo date_format(date_create(),"d/m/Y"); ?>"> 
											            </div>
											        </div>
											        <div class="row form_campaign_1">
											        	<label for="text" class=" col-xs-2 label-profile">Phụ trách vòng</label>
											        	<div class="col-xs-10  padding-lr0">
											        		<div class="col-xs-2 padding_le_ri_0" id="col_add_pt_8">
												      			<div class="col-xs-3 padding_le_ri_0">
												      				<img class="img_ql" src="<?php echo base_url() ?>public/image/bbye.jpg">
												      			</div>
												      			<div class="col-xs-9 padding_le_ri_0">
												      				<a href="javascript:void(0)" class="add_pt" onclick="insertPT(8)"><p class="name_ql">Thêm phụ trách vòng</p></a>
												      			</div>
												      		</div>
												      		<input type="hidden" id="manageround_8" name="round8[]" value="">
											        	</div>
											        </div>
								        		</div>
								        	</div>
							        	</li>
						        	</form>
						        </ul>
						      </div>
						    </div>
					  	</div>
					</div>
					<div class="box_btn">
						<div class="pull-right">
							<a href="<?php echo base_url() ?>admin/campaign/main" class="btn btn_thoat">Thoát</a>
							<button type="submit" id="saveRound" class="btn btn_tt">Lưu/ Tiếp theo</button>
						</div>
					</div>
	            <!-- /.box-body -->
	          	</div>
	        </div>
    	</div>
    </section>
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
		      			<select class="seletext select2 js-example-basic_ql" name="managecampaign[]" required="" id="select_type_1" >
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
		      			<select class="seletext select2 js-example-basic" name="managecampaign[]" required="" id="select_type_pt_1" >
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
			// initializeSelect2($(".select2"));
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
			manageround = ','+str+',';
		}
		$('#manageround_'+roundid).val(manageround);
		$('#insertPT').modal('hide');
		
		
		
	});

	function changeProcess(id) {
		$.ajax({
			url: '<?php echo base_url() ?>admin/RecruitProcess/changeProcess/'+id,
			type: 'POST',
			dataType: 'json',
			data: {},
		})
		.done(function(data) {
			$('#box_temp').empty();
			$('.li_round').remove();
			var width = 100/(data.length);
        	width +='%';
        	var j = 1;
        	var color = row = '';
        	for (var i = 0; i < data.length; i++) {
        		if (data[i]['roundtype'] == 'Profile' || data[i]['roundtype'] == 'Filter') {
        	 		color = 'count_hs';
        	 	}else if (data[i]['roundtype'] == 'Offer') {
        	 		color = 'count_dn';
        	 	}else if (data[i]['roundtype'] == 'Recruite') {
        	 		color = 'count_td';
        	 	}else{
        	 		color = 'count_pv';
        	 	}
        	 	row += '<div class="col-pc-12" id="box_round_'+j+'" style="width: '+width+' "><span class="info-box-number '+color+' ">V'+j+'</span><span class="info-box-text">'+data[i]['roundname']+'</span></div>';
        	 	j++;
        	}
        	$('#box_temp').append(row);	

        	
        	var k =1;
        	for (var i = 0; i < data.length; i++) {
        		var row1 = check1 = check2 = '';
        		if (data[i]['transferemail'] == 'Y' ) {
        			check1 = 'checked';
        		}
        		if (data[i]['discardemail'] == 'Y' ) {
        			check2 = 'checked';
        		}
        		if (data[i]['roundtype'] == 'Profile' ) {
        	 		row1 += '<li class="li_round ui-state-disabled" id="round_'+k+'" data-index="'+k+'" data-position="'+k+'">';
					row1 += '<div class="v_'+k+'" >';
					row1 += '<div class="header_vong_cd "><input type="hidden" name="round'+k+'[]" value="'+k+'" class="sorting"><div class=" col-xs-4 pull-left"><i class="fa fa-ellipsis-v dis_fa"></i> '+data[i]['roundname']+'</div><input type="hidden" name="round'+k+'[]" value="'+data[i]['roundname']+'" class="roundname hide "><div class="pull-right box_btn_cd disabled" ><button class="btn btn_cd" disabled><i class="fa fa-plus" ></i></button><button class="btn btn_cd" disabled><i class="fa fa-pencil" ></i></button></div></div>';        		
					row1 += '<div class="body_vong_cd"><div class="row form_campaign"><label for="text" class=" col-xs-2 label-profile">Loại vòng</label><div class="col-xs-4  padding-lr0"><select class="textbox select2" name="round'+k+'[]" ><option value="Profile" >Hồ sơ</option></select></div><label for="text" class=" col-xs-2 label-profile">Thời hạn vòng</label><div class="col-xs-4  padding-lr0"><input type="text" name="round'+k+'[]" class="textbox thoihan" value="<?php echo date_format(date_create(),"d/m/Y"); ?>"></div></div>';		        		
					row1 += '<div class="row form_campaign"><label for="text" class=" col-xs-2 label-profile">Phụ trách vòng</label><div class="col-xs-10  padding-lr0"><div class="col-xs-2 padding_le_ri_0" id="col_add_pt_'+k+'"><div class="col-xs-3 padding_le_ri_0"><img class="img_ql" src="<?php echo base_url() ?>public/image/bbye.jpg"></div><div class="col-xs-9 padding_le_ri_0"><a href="javascript:void(0)" class="add_pt" onclick="insertPT('+k+')"><p class="name_ql">Thêm phụ trách vòng</p></a></div></div><input type="hidden" id="manageround_'+k+'" name="round'+k+'[]" value=""></div></div>';			        	
					row1 += '<div class="row form_campaign"><label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round'+k+'[]" '+check1+' > Email Chuyển vòng</label><div class="col-xs-4  padding-lr0"><select class="textbox select2" name="round'+k+'[]"><option value="0">Chọn mẫu mail thông báo</option>';
						<?php foreach ($mailtemplate as $mail): ?>
							if ( data[i]['transfmailtemp'] == '<?php echo $mail['mailprofileid'] ?>') { 
								row1 += '<option value="<?php echo $mail['mailprofileid'] ?>" selected><?php echo $mail['profilename'] ?></option>';
							}else{
								row1 += '<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>';
							}
						<?php endforeach ?>
					row1 += '</select></div></div>';
					row1 += '<div class="row form_campaign_1"><label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round'+k+'[]" '+check2+'> Email loại</label><div class="col-xs-4  padding-lr0"><select class="textbox select2" name="round'+k+'[]"><option value="0">Chọn mẫu mail thông báo</option>';
						<?php foreach ($mailtemplate as $mail): ?>
							if ( data[i]['discmailtemp'] == '<?php echo $mail['mailprofileid'] ?>') { 
								row1 += '<option value="<?php echo $mail['mailprofileid'] ?>" selected><?php echo $mail['profilename'] ?></option>';
							}else{
								row1 += '<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>';
							}
						<?php endforeach ?>
					row1 += '</select></div></div></div></div></li>';

        	 	}
        	 	else if (data[i]['roundtype'] == 'Recruite') {
        	 		row1 += '<li class="li_round" id="round_'+k+'" class="ui-state-disabled" data-index="'+k+'" data-position="'+k+'"><div class="v_'+k+' ">';
        	 		row1 += '<div class="header_vong_cd"><input type="hidden" name="round'+k+'[]" value="'+k+'" class="sorting"><div class=" col-xs-4 pull-left"><i class="fa fa-ellipsis-v dis_fa"></i> '+data[i]['roundname']+'</div><input type="hidden" name="round'+k+'[]" value="'+data[i]['roundname']+'" class="roundname "><div class="pull-right box_btn_cd"><button class="btn btn_cd" disabled><i class="fa fa-plus"></i></button><button class="btn btn_cd" disabled><i class="fa fa-pencil"></i></button></div></div>';
					row1 += '<div class="body_vong_cd"><div class="row form_campaign"><label for="text" class=" col-xs-2 label-profile">Loại vòng</label><div class="col-xs-4  padding-lr0"><select class="textbox select2" name="round'+k+'[]"><option value="Recruite" selected="">Tuyển dụng</option></select></div><label for="text" class=" col-xs-2 label-profile">Thời hạn vòng</label><div class="col-xs-4  padding-lr0"><input type="text" name="round'+k+'[]" class="textbox thoihan" value="<?php echo date_format(date_create(),"d/m/Y"); ?>"></div></div>';			        		
					row1 += '<div class="row form_campaign_1"><label for="text" class=" col-xs-2 label-profile">Phụ trách vòng</label><div class="col-xs-10  padding-lr0"><div class="col-xs-2 padding_le_ri_0" id="col_add_pt_'+k+'"><div class="col-xs-3 padding_le_ri_0"><img class="img_ql" src="<?php echo base_url() ?>public/image/bbye.jpg"></div><div class="col-xs-9 padding_le_ri_0"><a href="javascript:void(0)" class="add_pt" onclick="insertPT('+k+')"><p class="name_ql">Thêm phụ trách vòng</p></a></div></div><input type="hidden" id="manageround_'+k+'" name="round'+k+'[]" value=""></div></div></div></div></li>';
        	 	}
        	 	else{
        	 		row1 += '<li class="li_round" id="round_'+k+'" data-index="'+k+'" data-position="'+k+'"><div class="v_'+k+'" >';
					row1 += '<div class="header_vong_cd"><input type="hidden" name="round'+k+'[]" value="'+k+'" class="sorting"><div class=" col-xs-4 pull-left"><i class="fa fa-ellipsis-v handle"></i><span id="title_'+k+'"> '+data[i]['roundname']+'</span><input type="text" name="round'+k+'[]" value="'+data[i]['roundname']+'" class="roundname hide input_title_'+k+'"></div><div class="pull-right box_btn_cd"><button type="button" class="btn btn_cd btn_copy_'+k+'" onclick="copyRound('+k+')"><i class="fa fa-plus"></i></button><button type="button" class="btn btn_cd btn_delete_'+k+'" onclick="deleteRound('+k+')"><i class="fa fa-trash-o"></i></button><button type="button" class="btn btn_cd btn_edit_'+k+'" onclick="editTitle('+k+')"><i class="fa fa-pencil"></i></button></div></div>';	

					row1 += '<div class="body_vong_cd"><div class="row form_campaign"><label for="text" class=" col-xs-2 label-profile">Loại vòng</label><div class="col-xs-4  padding-lr0"><select class="textbox select2" name="round'+k+'[]" id="select_type'+k+'"><option value="Profile" disabled="">Hồ sơ</option><option value="Filter">Sơ loại</option><option value="Contact">Tiếp cận</option><option value="Assessment">Trắc nghiệm</option><option value="Interview">Phỏng vấn</option><option value="Offer">Đề nghị</option><option value="Recruite" disabled="">Tuyển dụng</option></select></div><label for="text" class=" col-xs-2 label-profile">Thời hạn vòng</label><div class="col-xs-4  padding-lr0"><input type="text" name="round'+k+'[]" class="textbox thoihan" value="<?php echo date_format(date_create(),"d/m/Y"); ?>"></div></div>'; 

					row1 += '<div class="row form_campaign"><label for="text" class=" col-xs-2 label-profile">Phụ trách vòng</label><div class="col-xs-10  padding-lr0"><div class="col-xs-2 padding_le_ri_0" id="col_add_pt_'+k+'"><div class="col-xs-3 padding_le_ri_0"><img class="img_ql" src="<?php echo base_url() ?>public/image/bbye.jpg"></div><div class="col-xs-9 padding_le_ri_0"><a href="javascript:void(0)" class="add_pt" onclick="insertPT('+k+')"><p class="name_ql">Thêm phụ trách vòng</p></a></div></div><input type="hidden" id="manageround_'+k+'" name="round'+k+'[]" value=""></div></div>';       	
								        		
					row1 += '<div class="row form_campaign"><label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round'+k+'[]" '+check1+'> Email Chuyển vòng</label><div class="col-xs-4  padding-lr0"><select class="textbox select2" name="round'+k+'[]"><option value="0">Chọn mẫu mail thông báo</option>';
						<?php foreach ($mailtemplate as $mail): ?>
							if ( data[i]['transfmailtemp'] == '<?php echo $mail['mailprofileid'] ?>') { 
								row1 += '<option value="<?php echo $mail['mailprofileid'] ?>" selected><?php echo $mail['profilename'] ?></option>';
							}else{
								row1 += '<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>';
							}
						<?php endforeach ?>
					row1 += '</select></div></div>';
					
					row1 += '<div class="row form_campaign_1"><label for="text" class=" col-xs-2 label-profile"><input type="checkbox" name="round'+k+'[]" '+check2+'> Email loại</label><div class="col-xs-4  padding-lr0"><select class="textbox select2" name="round'+k+'[]"><option value="0">Chọn mẫu mail thông báo</option>';
						<?php foreach ($mailtemplate as $mail): ?>
							if ( data[i]['discmailtemp'] == '<?php echo $mail['mailprofileid'] ?>') { 
								row1 += '<option value="<?php echo $mail['mailprofileid'] ?>" selected><?php echo $mail['profilename'] ?></option>';
							}else{
								row1 += '<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>';
							}
						<?php endforeach ?>
					row1 += '</select></div></div></div>';	

					if (data[i]['roundtype'] == 'Assessment') {
						row1 += '<div class="body_vong_cd_1"><div class="row form_campaign"><label for="text" class=" col-xs-2 label-profile">Giới hạn mẫu phiếu trắc nghiệm</label><div class="col-xs-4  padding-lr0"><select class="textbox select2" name="round'+k+'[]">';
						<?php foreach ($asmt_tn as $tn){ ?>
							if ( data[i]['assessment'] == '<?php echo $tn['asmttemp'] ?>') { 
								row1 += '<option value="<?php echo $tn['asmttemp'] ?>" selected><?php echo $tn['asmtname'] ?></option>';
							}else{
								row1 += '<option value="<?php echo $tn['asmttemp'] ?>"><?php echo $tn['asmtname'] ?></option>';
							}
						<?php } ?>
						row1 += '</select></div></div>';

						row1 += '<div class="row form_campaign_1"><label for="text" class=" col-xs-2 label-profile">Email thông báo</label><div class="col-xs-4  padding-lr0"><select class="textbox select2" name="round'+k+'[]">';
							<?php foreach ($mailtemplate as $mail): ?>
								if ( data[i]['asmtmailtemp'] == '<?php echo $mail['mailprofileid'] ?>') { 
									row1 += '<option value="<?php echo $mail['mailprofileid'] ?>" selected><?php echo $mail['profilename'] ?></option>';
								}else{
									row1 += '<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>';
								}
							<?php endforeach ?>
						row1 += '</select></div></div></div>';

					}else if (data[i]['roundtype'] == 'Interview') {
						row1 += '<div class="body_vong_cd_1"><div class="row form_campaign"><label for="text" class=" col-xs-2 label-profile">Giới hạn mẫu phiếu phỏng vấn</label><div class="col-xs-4  padding-lr0"><select class="textbox select2" name="round'+k+'[]">';
							<?php foreach ($asmt_pv as $tn){ ?>
								if ( data[i]['scorecard'] == '<?php echo $tn['asmttemp'] ?>') { 
									row1 += '<option value="<?php echo $tn['asmttemp'] ?>" selected><?php echo $tn['asmtname'] ?></option>';
								}else{
									row1 += '<option value="<?php echo $tn['asmttemp'] ?>"><?php echo $tn['asmtname'] ?></option>';
								}
							<?php } ?>
						row1 += '</select></div></div>';

						row1 += '<div class="row form_campaign"><label for="text" class=" col-xs-2 label-profile">Email thông báo Ứng viên</label><div class="col-xs-4  padding-lr0"><select class="textbox select2" name="round'+k+'[]">';
							<?php foreach ($mailtemplate as $mail): ?>
								if ( data[i]['interviewmailtemp'] == '<?php echo $mail['mailprofileid'] ?>') { 
									row1 += '<option value="<?php echo $mail['mailprofileid'] ?>" selected><?php echo $mail['profilename'] ?></option>';
								}else{
									row1 += '<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>';
								}
							<?php endforeach ?>
						row1 += '</select></div></div>';

						row1 += '<div class="row form_campaign_1"><label for="text" class=" col-xs-2 label-profile">Email thông báo Người PV</label><div class="col-xs-4  padding-lr0"><select class="textbox select2" name="round'+k+'[]">';
							<?php foreach ($mailtemplate as $mail): ?>
								if ( data[i]['invitemailtemp'] == '<?php echo $mail['mailprofileid'] ?>') { 
									row1 += '<option value="<?php echo $mail['mailprofileid'] ?>" selected><?php echo $mail['profilename'] ?></option>';
								}else{
									row1 += '<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>';
								}
							<?php endforeach ?>
						row1 += '</select></div></div></div>';
					}else if (data[i]['roundtype'] == 'Offer') {
						row1 += '<div class="body_vong_cd_1"><div class="row form_campaign_1"><label for="text" class=" col-xs-2 label-profile">Email Đề nghị</label><div class="col-xs-4  padding-lr0"><select class="textbox select2" name="round'+k+'[]">';
							<?php foreach ($mailtemplate as $mail): ?>
								if ( data[i]['letteroffermailtemp'] == '<?php echo $mail['mailprofileid'] ?>') { 
									row1 += '<option value="<?php echo $mail['mailprofileid'] ?>" selected><?php echo $mail['profilename'] ?></option>';
								}else{
									row1 += '<option value="<?php echo $mail['mailprofileid'] ?>"><?php echo $mail['profilename'] ?></option>';
								}
							<?php endforeach ?>
						row1 += '</select></div></div></div>';
					}						        
											        
					row1 += '</div></li>';

        	 	}

            	$('#campaignid_v3').before(row1);	
            	initializeSelect2($(".select2"));
            	$('#select_type'+k+' option[value="'+data[i]['roundtype']+'"]').prop('selected', true);
        	 	k++;
        	}

        	$('.thoihan').datetimepicker({
		    	timepicker:false,
		    	format:'d/m/Y',
		    });
			
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}

	$('#saveRound').click(function(event) {
		var campaignid = $('#campaignid_v3').val();
		
		$.ajax({
			url: '<?php echo base_url() ?>admin/campaign/saveRound',
			type: 'POST',
			dataType: 'json',
			data: $('#form_round').serialize(),
		})
		.done(function() {
			location.href='<?php echo base_url() ?>admin/campaign/new_campaign_4/'+campaignid;
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
</script>