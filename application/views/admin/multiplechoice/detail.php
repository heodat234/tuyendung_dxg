<div class="content-wrapper">
    <section class="content">
    	<div class="row">
       		<div class="col-md-12">
	        	<div class="box box-default">
		            <div class="box-header" id="box_header_1">
		              <!-- <h5 class="box-title"></h5> -->
		              	<?php if ($group == 0){  $active1 = 'active in';?>
		              		<p><label class="title_box_user">Tạo nhóm mới</label><i class="fa fa-users fa_users"></i><label class="title_chil"><?php echo $title_con ?></label></p>
		              	<?php }else{  $active2 = 'active in';?>
			              <p><label class="title_box_user"><?php echo $title ?></label><i class="fa fa-users fa_users"></i><label class="title_chil"><?php echo $title_con ?></label><label class="title_time">Ngày cập nhật cuối cùng 23/04/2018 - Yêu cầu khôi phục mật khẩu: 0</label></p>
			          	<?php } ?>
		              <div class="box-tools pull-right">
		                <button type="button" class="btn btn-default"><i class="fa fa-list color-gray"></i></button>
		              </div>
		            </div>
		            <div id="box_header_2">
		            	<a href="<?php echo base_url()?>admin/multiplechoice" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Previous"><i class="fa fa-chevron-left"></i> Quay lại</a>
		            </div>
		            <form method="post" action="<?php echo base_url() ?>admin/campaign/new_campaign_2">
			            <div class="panel-group" id="accordion">
						  	<div class="panel panel-default border-rad0">
						    	<div class="panel-heading rad-pad0 b-blue"> 
						       		<ul class="nav nav-tabs ul-nav">
								        <li class="<?php echo isset($active2)?$active2 : '' ?>"><a data-toggle="tab" href="#list_user" class="nemu-info-pf">Hoạt động</a></li>
								        <li class="<?php echo isset($active1)?$active1 : '' ?>"><a data-toggle="tab" href="#config_group" class="nemu-info-pf" >Thông tin</a></li>
								        <li class="<?php echo isset($active3)?$active3 : '' ?>"><a data-toggle="tab" href="#content_group" class="nemu-info-pf" >Nội dung</a></li>
								    </ul>
						    	</div>
							    <div id="collapse1" class="panel-collapse collapse in">
							      	<div class="panel-body">
							      		<div class="tab-content">
							      			<!-- Tab1 -->
								      		<div id="list_user" class="tab-pane <?php echo isset($active2)?$active2 : '' ?>">
								        		<div class="panel-group bor-mar-b0">
											      	<div class="panel-body" style="border: 0px">
											      		<p class="titleAppoint1">Đang thực hiện</p>
											     	 	<table class="table table-striped table-bordered table-hover table-responsive" id="table-dangth">
											     	 		<thead>
											     	 			<th>Ứng viên</th>
											     	 			<th>Chiến dịch tuyển dụng</th>
											     	 			<th>Ngày tạo - thực hiện</th>
											     	 			<th>Người phụ trách</th>
											     	 			<th>Trạng thái</th>
											     	 			<th>Kết quả</th>
											     	 		</thead>
											     	 		<tbody>
											     	 			<tr>
											     	 				<td><p class="td-row">Hưng</p></td>
											     	 				<td><p class="td-row">Nhân viên Kinh Doanh Q2 - 2018</p></td>
											     	 				<td><p class="td-row">25/05/2018 - 30/05/2018</p></td>
											     	 				<td><p class="td-row">Hoàng Trung</p></td>
											     	 				<td><p class="td-row">Đang thực hiện</p></td>
											     	 				<td><p class="td-row">-</p></td>
											     	 			</tr>
											     	 			<tr>
											     	 				<td><p class="td-row">Hưng</p></td>
											     	 				<td><p class="td-row">Nhân viên Kinh Doanh Q2 - 2018</p></td>
											     	 				<td><p class="td-row">25/05/2018 - 30/05/2018</p></td>
											     	 				<td><p class="td-row">Hoàng Trung</p></td>
											     	 				<td><p class="td-row">Đang thực hiện</p></td>
											     	 				<td><p class="td-row">-</p></td>
											     	 			</tr>
											     	 			<tr>
											     	 				<td><p class="td-row">Hưng</p></td>
											     	 				<td><p class="td-row">Nhân viên Kinh Doanh Q2 - 2018</p></td>
											     	 				<td><p class="td-row">25/05/2018 - 30/05/2018</p></td>
											     	 				<td><p class="td-row">Hoàng Trung</p></td>
											     	 				<td><p class="td-row">Đang thực hiện</p></td>
											     	 				<td><p class="td-row">-</p></td>
											     	 			</tr>
											     	 			<tr>
											     	 				<td><p class="td-row">Hưng</p></td>
											     	 				<td><p class="td-row">Nhân viên Kinh Doanh Q2 - 2018</p></td>
											     	 				<td><p class="td-row">25/05/2018 - 30/05/2018</p></td>
											     	 				<td><p class="td-row">Hoàng Trung</p></td>
											     	 				<td><p class="td-row">Đang thực hiện</p></td>
											     	 				<td><p class="td-row">-</p></td>
											     	 			</tr>
											     	 			<tr>
											     	 				<td><p class="td-row">Hưng</p></td>
											     	 				<td><p class="td-row">Nhân viên Kinh Doanh Q2 - 2018</p></td>
											     	 				<td><p class="td-row">25/05/2018 - 30/05/2018</p></td>
											     	 				<td><p class="td-row">Hoàng Trung</p></td>
											     	 				<td><p class="td-row">Đang thực hiện</p></td>
											     	 				<td><p class="td-row">-</p></td>
											     	 			</tr>
											     	 			<tr>
											     	 				<td><p class="td-row">Hưng</p></td>
											     	 				<td><p class="td-row">Nhân viên Kinh Doanh Q2 - 2018</p></td>
											     	 				<td><p class="td-row">25/05/2018 - 30/05/2018</p></td>
											     	 				<td><p class="td-row">Hoàng Trung</p></td>
											     	 				<td><p class="td-row">Đang thực hiện</p></td>
											     	 				<td><p class="td-row">-</p></td>
											     	 			</tr>
											     	 			<tr>
											     	 				<td><p class="td-row">Hưng</p></td>
											     	 				<td><p class="td-row">Nhân viên Kinh Doanh Q2 - 2018</p></td>
											     	 				<td><p class="td-row">25/05/2018 - 30/05/2018</p></td>
											     	 				<td><p class="td-row">Hoàng Trung</p></td>
											     	 				<td><p class="td-row">Đang thực hiện</p></td>
											     	 				<td><p class="td-row">-</p></td>
											     	 			</tr>
											     	 			<tr>
											     	 				<td><p class="td-row">Hưng</p></td>
											     	 				<td><p class="td-row">Nhân viên Kinh Doanh Q2 - 2018</p></td>
											     	 				<td><p class="td-row">25/05/2018 - 30/05/2018</p></td>
											     	 				<td><p class="td-row">Hoàng Trung</p></td>
											     	 				<td><p class="td-row">Đang thực hiện</p></td>
											     	 				<td><p class="td-row">-</p></td>
											     	 			</tr>
											     	 			<tr>
											     	 				<td><p class="td-row">Hưng</p></td>
											     	 				<td><p class="td-row">Nhân viên Kinh Doanh Q2 - 2018</p></td>
											     	 				<td><p class="td-row">25/05/2018 - 30/05/2018</p></td>
											     	 				<td><p class="td-row">Hoàng Trung</p></td>
											     	 				<td><p class="td-row">Đang thực hiện</p></td>
											     	 				<td><p class="td-row">-</p></td>
											     	 			</tr>
											     	 			<tr>
											     	 				<td><p class="td-row">Hưng</p></td>
											     	 				<td><p class="td-row">Nhân viên Kinh Doanh Q2 - 2018</p></td>
											     	 				<td><p class="td-row">25/05/2018 - 30/05/2018</p></td>
											     	 				<td><p class="td-row">Hoàng Trung</p></td>
											     	 				<td><p class="td-row">Đang thực hiện</p></td>
											     	 				<td><p class="td-row">-</p></td>
											     	 			</tr>
											     	 			<tr>
											     	 				<td><p class="td-row">Hưng</p></td>
											     	 				<td><p class="td-row">Nhân viên Kinh Doanh Q2 - 2018</p></td>
											     	 				<td><p class="td-row">25/05/2018 - 30/05/2018</p></td>
											     	 				<td><p class="td-row">Hoàng Trung</p></td>
											     	 				<td><p class="td-row">Đang thực hiện</p></td>
											     	 				<td><p class="td-row">-</p></td>
											     	 			</tr>
											     	 			<tr>
											     	 				<td><p class="td-row">Hưng</p></td>
											     	 				<td><p class="td-row">Nhân viên Kinh Doanh Q2 - 2018</p></td>
											     	 				<td><p class="td-row">25/05/2018 - 30/05/2018</p></td>
											     	 				<td><p class="td-row">Hoàng Trung</p></td>
											     	 				<td><p class="td-row">Đang thực hiện</p></td>
											     	 				<td><p class="td-row">-</p></td>
											     	 			</tr>
											     	 		</tbody>
											     	 	</table>
											     	 	<p class="titleAppoint1">Đã hoàn tất</p>
											     	 	<table class="table table-bordered table-hover table-responsive" id="table-daht">
											     	 		<thead>
											     	 			<th>Ứng viên</th>
											     	 			<th>Chiến dịch tuyển dụng</th>
											     	 			<th>Ngày tạo - thực hiện</th>
											     	 			<th>Người phụ trách</th>
											     	 			<th>Trạng thái</th>
											     	 			<th>Kết quả</th>
											     	 		</thead>
											     	 		<tbody>
											     	 			<tr>
											     	 				<td><p class="td-row">Phương</p></td>
											     	 				<td><p class="td-row">Nhân viên kế toán</p></td>
											     	 				<td><p class="td-row">15/06/2018 - 25/06/2018</p></td>
											     	 				<td><p class="td-row">Mỹ Duyên</p></td>
											     	 				<td><p class="td-row">Hoàn thành (0/15)</p></td>
											     	 				<td><p class="td-row">Đạt (70/65/75)</p></td>
											     	 			</tr>
											     	 			<tr>
											     	 				<td><p class="td-row">Phương</p></td>
											     	 				<td><p class="td-row">Nhân viên kế toán</p></td>
											     	 				<td><p class="td-row">15/06/2018 - 25/06/2018</p></td>
											     	 				<td><p class="td-row">Mỹ Duyên</p></td>
											     	 				<td><p class="td-row">Hoàn thành (0/15)</p></td>
											     	 				<td><p class="td-row">Đạt (70/65/75)</p></td>
											     	 			</tr>
											     	 			<tr>
											     	 				<td><p class="td-row">Phương</p></td>
											     	 				<td><p class="td-row">Nhân viên kế toán</p></td>
											     	 				<td><p class="td-row">15/06/2018 - 25/06/2018</p></td>
											     	 				<td><p class="td-row">Mỹ Duyên</p></td>
											     	 				<td><p class="td-row">Hoàn thành (0/15)</p></td>
											     	 				<td><p class="td-row">Đạt (70/65/75)</p></td>
											     	 			</tr>
											     	 			<tr>
											     	 				<td><p class="td-row">Phương</p></td>
											     	 				<td><p class="td-row">Nhân viên kế toán</p></td>
											     	 				<td><p class="td-row">15/06/2018 - 25/06/2018</p></td>
											     	 				<td><p class="td-row">Mỹ Duyên</p></td>
											     	 				<td><p class="td-row">Hoàn thành (0/15)</p></td>
											     	 				<td><p class="td-row">Đạt (70/65/75)</p></td>
											     	 			</tr>
											     	 			<tr>
											     	 				<td><p class="td-row">Phương</p></td>
											     	 				<td><p class="td-row">Nhân viên kế toán</p></td>
											     	 				<td><p class="td-row">15/06/2018 - 25/06/2018</p></td>
											     	 				<td><p class="td-row">Mỹ Duyên</p></td>
											     	 				<td><p class="td-row">Hoàn thành (0/15)</p></td>
											     	 				<td><p class="td-row">Đạt (70/65/75)</p></td>
											     	 			</tr>
											     	 		</tbody>
											     	 	</table>

											  	  	</div>
												</div>
								       		</div>
								       		<!-- Tab2 -->
								       		<div id="config_group" class="tab-pane <?php echo isset($active1)?$active1 : '' ?>">
								        		<div class="panel-group bor-mar-b0">
											      	<div class="panel-body" style="border: 0px; border-bottom: 1px solid #dedede;">
											     	 	<div class="width100 row rowedit h-auto padding_bot_15">
												            <label for="text" class="width20 col-xs-3 label-profile">Trạng thái áp dụng</label>
												            <div class="col-xs-4 padding-lr0">
																<select class="textbox" name="">
																	<option>Đang áp dụng</option>
																	<option>Không áp dụng</option>
																</select>
												            </div>
												        </div>
												        <div class="width100 row rowedit h-auto padding_bot_15">
												            <label for="text" class="width20 col-xs-3 label-profile">Tên gọi</label>
												            <div class="col-xs-4 padding-lr0">
																<input type="text" name="" value="">
												            </div>
												        </div>
												        <div class="width100 row rowedit h-auto padding_bot_15">
												            <label for="text" class="width20 col-xs-3 label-profile">Phân loại</label>
												            <div class="col-xs-4 padding-lr0">
																<select class="textbox" name="" style="font-family: 'FontAwesome'">
																	<option>&#xf086; Phỏng vấn/Đánh giá</option>
																	<option>&#xf15c; Trắc nghiệm</option>
																</select>
												            </div>
												        </div>
											  	  	</div>
											  	  	<div class="panel-body" style="border: 0px;">
											     	 	<div class="width100 row rowedit h-auto padding_bot_15">
												            <label for="text" class="width20 col-xs-3 label-profile">Trộn tự động</label>
												            <div class="col-xs-4 padding-lr0">
																<select class="textbox" name="" disabled="true">
																	<option>-</option>
																</select>
												            </div>
												        </div>
												        <div class="width100 row rowedit h-auto padding_bot_15">
												            <label for="text" class="width20 col-xs-3 label-profile">Số câu hỏi tối đa:</label>
												            <div class="col-xs-4 padding-lr0">
																<input disabled="" type="text" name="" value="-"> <span class="body-blac5">Tự cân đối theo câu/phần</span>
												            </div>
												        </div>
												        <div class="width100 row rowedit h-auto padding_bot_15">
												            <label for="text" class="width20 col-xs-3 label-profile">Mức điểm đạt:</label>
												            <div class="col-xs-4 padding-lr0">
																<input type="text" name="" value=""> <span class="body-blac5">Điểm tối đa của nội dung là: 75</span>
												            </div>
												        </div>
												        <div class="width100 row rowedit h-auto padding_bot_15">
												            <label for="text" class="width20 col-xs-3 label-profile">Giới hạn thời gian</label>
												            <div class="col-xs-4 padding-lr0">
																<input type="text" name="" style="width: 15%"> :
																<input type="text" name="" style="width: 15%"><span class="body-blac5"> 00:00 = không giới hạn thời gian</span>
												            </div>
												        </div>
												        <div class="width100 row rowedit h-auto padding_bot_15">
												            <label for="text" class="width20 col-xs-3 label-profile">Nội dung/ Chỉ dẫn</label>
												            <div class="col-xs-4 padding-lr0">
																<textarea class="textara1" rows="4" placeholder="" required=""></textarea>
												            </div>
												        </div>
												        <div class="box_btn">
														<div class="pull-right">
															<a href="http://recruit.tavicosoft.com/admin/campaign/main" class="btn btn_thoat">Thoát</a>
															<button type="submit" id="saveRound" class="btn btn_tt">Lưu/ Tiếp theo</button>
														</div>
													</div>
											  	  	</div>
												</div>
								       		</div>
								       		<!-- Tab 3 -->

								       		<div id="content_group" class="tab-pane <?php echo isset($active3)?$active3 : '' ?>"><p class="body-blac2">Trạng thái nội dung: 3 phần - 60 câu - Tổng điểm nội dung: 60 | Cho phép trộn 30 câu - Điểm đạt: 20 câu</p>
								        		<div class="panel-group bor-mar-b0">
											      	<div class="panel-body" style="border: 0px">
												        <ul id="sortable" class="sortable-dragging sortable-placeholder">
						        	<form id="form_round">
						        		<li class="ui-state-disabled" data-index="1" data-position="1">
							        		
							        		<div class="v_1" id="afterInsert">

							        			<div class="header_vong_cd ">
								        			<input type="hidden" name="round1[]" value="1" class="sorting">
								        			<div class=" col-xs-4 pull-left">
								        				<i class="fa fa-ellipsis-v dis_fa"></i>
								        				<?php echo $title ?>
								        			</div>
								        			<input type="hidden" name="round1[]" value="Hồ sơ" class="roundname hide ">
								        			<div class="pull-right box_btn_cd disabled" >
								        				<button type="button" class="btn btn_cd btn_copy_2" onclick="copyRound(1)"><i class="fa fa-plus"></i></button>
								        				<button class="btn 	btn_cd" disabled><i class="fa fa-pencil" ></i></button>
								        			</div>
								        		</div>
								        		<div class="body_vong_cd">
								        	<div class="v_1">
								        		<div class="header_vong_con">
								        			<input type="hidden" name="round1[]" value="1" class="sorting">
								        			<div class=" col-xs-6 pull-left">
								        				<i class="fa fa-ellipsis-v dis_fa"></i>
								        				<input type="text" name="" placeholder="Nhập Câu hỏi" style="border: 0;
								        				padding-left: 9px;
  outline: 0;
  background: transparent; width: 97%">
								        			</div>
								        			<input type="hidden" name="round1[]" value="Hồ sơ" class="roundname hide ">
								        			<div class="pull-right box_btn_cd">
								        				<input id="file-input-id" type="file" style="display: none;" onchange="choosePic(this,'addImage')" />
								        				<div class="image-upload">
														    <label for="file-input-id">
														        <button type="button" class="btn btn_cd btn_copy_2" onclick="_upload('file-input-id')" ><i class="fa fa-picture-o" aria-hidden="true"></i></button>
														    </label>

														    

								        				<button type="button" class="btn btn_cd btn_copy_2" ><i class="fa fa-clone" aria-hidden="true"></i></button>
								        				<button type="button" class="btn btn_cd btn_delete_2" onclick="deleteRound(2)"><i class="fa fa-trash-o"></i></button>
								        				<button type="button" class="btn btn_cd btn_edit_2" onclick="editTitle(2)"><i class="fa fa-pencil"></i></button>
														</div>
								        			</div>
								        		</div>
								        		<div class="body_vong_con">
								        			<img src="" height="80px" style="margin-bottom:8px;margin-left:15px" hidden="true" id="addImage">
								        			<div class="row form_campaign">
											            <label for="text" class=" col-xs-2 label-profile">Loại trả lời</label>
											            <div class="col-xs-4  padding-lr0">
											             	<select class="textbox" name="round1[]" >
											             		<option value="Profile" >Trắc nghiệm</option>
											             		<option value="Profile" >Tự luận</option>
											             	</select>
											            </div>
											            <div class="col-xs-4  padding-lr0 checkbox">
															    <label>
															      <input type="checkbox"> Câu hỏi bắt buộc
															    </label>
											            </div>
											        </div>
											        <div class="row form_campaign">
											            <label for="text" class=" col-xs-5 label-profile">Câu trả lời</label>
											            <label for="text" class=" col-xs-3 label-profile">Điểm số</label>
											            <label for="text" class=" col-xs-3 label-profile">Câu trả lời đúng:</label>
											            <div class="row answer">
											            	<div class="col-xs-5 image-upload">
											            		<div class="col-xs-10 padding-lr0"><input type="text" class="textbox-answer" name="" id="textbox-answer-1">
										            			<img src="" height="80px" hidden="true" id="img-answer-1"></div>
											            		<div class="col-xs-2 padding-lr0">
											            			<label for="file-input-answer-1" id="">
														        <button type="button" class="btn btn-answer btn_copy_2" onclick="_upload('file-input-answer-1')" ><i class="fa fa-picture-o" aria-hidden="true"></i></button>
														   		</label>
																<input id="file-input-answer-1" class="filee" type="file" style="display: none;" onchange="choosePicAnswer(this,'1')" />
											            		</div>
											            	</div>
											            	<div class="col-xs-3 " style="padding-left: 0px"><input type="text" class="textbox" name=""></div>
											            	<input type="checkbox" class="col-xs-3" name="">

											            </div>
											            <div class="row answer">
											            	<div class="col-xs-5 image-upload">
											            		<div class="col-xs-10 padding-lr0"><input type="text" class="textbox-answer" name="" id="textbox-answer-2">
										            			<img src="" height="80px" hidden="true" id="img-answer-2"></div>
											            		<div class="col-xs-2 padding-lr0">
											            			<label for="file-input-answer-2">
														        <button type="button" class="btn btn-answer btn_copy_2" onclick="_upload('file-input-answer-2')" ><i class="fa fa-picture-o" aria-hidden="true"></i></button>
														   		</label>
																<input id="file-input-answer-2" class="filee" type="file" style="display: none;" onchange="choosePicAnswer(this,'2')" />
											            		</div>
											            	</div>
											            	<div class="col-xs-3 " style="padding-left: 0px"><input type="text" class="textbox" name=""></div>
											            	<input type="checkbox" class="col-xs-3" name="">

											            </div>
											            <div class="row answer">
											            	<div class="col-xs-5 image-upload">
											            		<div class="col-xs-10 padding-lr0"><input type="text" class="textbox-answer" name="" id="textbox-answer-3">
										            			<img src="" height="80px" hidden="true" id="img-answer-3"></div>
											            		<div class="col-xs-2 padding-lr0">
											            			<label for="file-input-answer-3">
														        <button type="button" class="btn btn-answer btn_copy_2" onclick="_upload('file-input-answer-3')" ><i class="fa fa-picture-o" aria-hidden="true"></i></button>
														   		</label>
																<input id="file-input-answer-3" class="filee" type="file" style="display: none;" onchange="choosePicAnswer(this,'3')" />
											            		</div>
											            	</div>
											            	<div class="col-xs-3 " style="padding-left: 0px"><input type="text" class="textbox" name=""></div>
											            	<input type="checkbox" class="col-xs-3" name="">

											            </div>
											            <div class="row answer">
											            	<div class="col-xs-5 image-upload">
											            		<div class="col-xs-10 padding-lr0"><input type="text" class="textbox-answer" name="" id="textbox-answer-4">
										            			<img src="" height="80px" hidden="true" id="img-answer-4"></div>
											            		<div class="col-xs-2 padding-lr0">
											            			<label for="file-input-answer-4">
														        <button type="button" class="btn btn-answer btn_copy_2"  onclick="_upload('file-input-answer-4')"><i class="fa fa-picture-o" aria-hidden="true"></i></button>
														   		</label>
																<input id="file-input-answer-4" class="filee" type="file" style="display: none;" onchange="choosePicAnswer(this,'4')" />
											            		</div>
											            	</div>
											            	<div class="col-xs-3 " style="padding-left: 0px"><input type="text" class="textbox" name=""></div>
											            	<input type="checkbox" class="col-xs-3" name="">

											            </div>
											            <p class="plus-button" onclick="clickPlus(this)"><i class="fa fa-plus" aria-hidden="true"></i> Thêm câu trả lời</p>
											            <div class="col-xs-4  padding-lr0 checkbox">
															    <label>
															      <input type="checkbox"> Câu hỏi bắt buộc
															    </label>
											            </div>
											        </div>
								        		</div>
								        	</div>

								        	<!-- Round De Insert -->
								        			<div class="v_1" id="round_1" hidden>

								        		<div class="header_vong_con">
								        			<input type="hidden" name="round1[]" value="1" class="sorting">
								        			<div class=" col-xs-6 pull-left">
								        				<i class="fa fa-ellipsis-v dis_fa"></i>
								        				<input type="text" name="" placeholder="Nhập Câu hỏi" style="border: 0;
								        				padding-left: 9px;
  outline: 0;
  background: transparent; width: 97%">
								        			</div>
								        			<input type="hidden" name="round1[]" value="Hồ sơ" class="roundname hide ">
								        			<div class="pull-right box_btn_cd">
								        				<div class="image-upload">
														    <label for="file-input-id-1" id="label-input-1">
														        <button type="button" class="btn btn_cd btn_copy_2"
														         onclick="_upload('file-input-id-1')" id="button-input-id-1" ><i class="fa fa-picture-o" aria-hidden="true"></i></button>
														    </label>

														    <input id="file-input-id-1" class="filee" type="file" style="display: none;" onchange="choosePic(this,'addImage_1')" />

								        				<button type="button" class="btn btn_cd btn_copy_2" ><i class="fa fa-clone" aria-hidden="true"></i></button>
								        				<button type="button" class="btn btn_cd btn_delete_2" onclick="deleteRound(2)"><i class="fa fa-trash-o"></i></button>
								        				<button type="button" class="btn btn_cd btn_edit_2" onclick="editTitle(2)"><i class="fa fa-pencil"></i></button>
														</div>
								        			</div>
								        		</div>
								        		<div class="body_vong_con">
								        			<img src="" height="80px" style="margin-bottom:8px;margin-left:15px" hidden="true" id="addImage_1">
								        			<div class="row form_campaign">
											            <label for="text" class=" col-xs-2 label-profile">Loại trả lời</label>
											            <div class="col-xs-4  padding-lr0">
											             	<select class="textbox" name="round1[]" >
											             		<option value="Profile" >Trắc nghiệm</option>
											             		<option value="Profile" >Tự luận</option>
											             	</select>
											            </div>
											            <div class="col-xs-4  padding-lr0 checkbox">
															    <label>
															      <input type="checkbox"> Câu hỏi bắt buộc
															    </label>
											            </div>
											        </div>
											        <div class="row form_campaign">
											            <label for="text" class=" col-xs-5 label-profile">Câu trả lời</label>
											            <label for="text" class=" col-xs-3 label-profile">Điểm số</label>
											            <label for="text" class=" col-xs-3 label-profile">Câu trả lời đúng:</label>
											            <div class="row answer">
											            	<div class="col-xs-5 image-upload">
											            		<div class="col-xs-10 padding-lr0"><input type="text" class="textbox-answer" name="" id="textbox-answer-1">
										            			<img src="" height="80px" hidden="true" id="img-answer-1"></div>
											            		<div class="col-xs-2 padding-lr0">
											            			<label for="file-input-answer-1" id="label-input-answer-1">
														        <button type="button" class="btn btn-answer btn_copy_2"  id="button-input-answer-1" onclick="_upload('file-input-answer-1')"><i class="fa fa-picture-o" aria-hidden="true"></i></button>
														   		</label>
																<input id="file-input-answer-1" class="filee" type="file" style="display: none;" onchange="choosePicAnswer(this,'1')" />
											            		</div>
											            	</div>
											            	<div class="col-xs-3 " style="padding-left: 0px"><input type="text" class="textbox" name=""></div>
											            	<input type="checkbox" class="col-xs-3" name="">

											            </div>
											            <div class="row answer">
											            	<div class="col-xs-5 image-upload">
											            		<div class="col-xs-10 padding-lr0"><input type="text" class="textbox-answer" name="" id="textbox-answer-2">
										            			<img src="" height="80px" hidden="true" id="img-answer-2"></div>
											            		<div class="col-xs-2 padding-lr0">
											            			<label for="file-input-answer-2" id="label-input-answer-2">
														        <button type="button" class="btn btn-answer btn_copy_2"   id="button-input-answer-2" onclick="_upload('file-input-answer-2')" ><i class="fa fa-picture-o" aria-hidden="true"></i></button>
														   		</label>
																<input id="file-input-answer-2" class="filee" type="file" style="display: none;" onchange="choosePicAnswer(this,'2')" />
											            		</div>
											            	</div>
											            	<div class="col-xs-3 " style="padding-left: 0px"><input type="text" class="textbox" name=""></div>
											            	<input type="checkbox" class="col-xs-3" name="">

											            </div>
											            <div class="row answer">
											            	<div class="col-xs-5 image-upload">
											            		<div class="col-xs-10 padding-lr0"><input type="text" class="textbox-answer" name="" id="textbox-answer-3">
										            			<img src="" height="80px" hidden="true" id="img-answer-3"></div>
											            		<div class="col-xs-2 padding-lr0">
											            			<label for="file-input-answer-3" id="label-input-answer-3">
														        <button type="button" class="btn btn-answer btn_copy_2"   id="button-input-answer-3" onclick="_upload('file-input-answer-3')" ><i class="fa fa-picture-o" aria-hidden="true"></i></button>
														   		</label>
																<input id="file-input-answer-3" class="filee" type="file" style="display: none;" onchange="choosePicAnswer(this,'3')" />
											            		</div>
											            	</div>
											            	<div class="col-xs-3 " style="padding-left: 0px"><input type="text" class="textbox" name=""></div>
											            	<input type="checkbox" class="col-xs-3" name="">

											            </div>
											            <div class="row answer">
											            	<div class="col-xs-5 image-upload">
											            		<div class="col-xs-10 padding-lr0"><input type="text" class="textbox-answer" name="" id="textbox-answer-4">
										            			<img src="" height="80px" hidden="true" id="img-answer-4"></div>
											            		<div class="col-xs-2 padding-lr0">
											            			<label for="file-input-answer-4" id="label-input-answer-4">
														        <button type="button" class="btn btn-answer btn_copy_2"   id="button-input-answer-4" onclick="_upload('file-input-answer-4')" ><i class="fa fa-picture-o" aria-hidden="true"></i></button>
														   		</label>
																<input id="file-input-answer-4" class="filee" type="file" style="display: none;" onchange="choosePicAnswer(this,'4')" />
											            		</div>
											            	</div>
											            	<div class="col-xs-3 " style="padding-left: 0px"><input type="text" class="textbox" name=""></div>
											            	<input type="checkbox" class="col-xs-3" name="">

											            </div>
											            <p class="plus-button" onclick="clickPlus(this)"><i class="fa fa-plus" aria-hidden="true"></i> Thêm câu trả lời</p>
											            <div class="col-xs-4  padding-lr0 checkbox">
															    <label>
															      <input type="checkbox"> Câu hỏi bắt buộc
															    </label>
											            </div>
											        </div>
								        		</div>
								        	</div>

								        		</div>
								        	</div>
								        	
						        	</form>
						        </ul>
											  	  	</div>
												</div>
												<div class="box_btn">
						<div class="pull-right">
							<a href="http://recruit.tavicosoft.com/admin/campaign/main" class="btn btn_thoat">Thoát</a>
							<button type="submit" id="saveRound" class="btn btn_tt">Lưu/ Tiếp theo</button>
						</div>
					</div>
								       		</div>

								       	</div>
							    	</div>
							   	</div>
						  	</div>
						</div>
					</form>
	            <!-- /.box-body -->
	          	</div>
	        </div>
    	</div>
    </section>
</div>
<a href="" data-toggle="modal" data-target="#insertUser" class="b-blue" id="myBtn" title="Go to top"><i class="fa fa-plus"></i></a>

<div class="modal fade" id="insertUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-60"  role="document" style="width:850px;">
        <div class="modal-content">
		    	<div class="row">
		       		<div class="col-md-12">
				            <div class="panel-group" id="accordion">
				            	<div class="panel panel-default border-rad0">
							    	<div class="panel-heading rad-pad0 b-blue"> 
							       			<!-- <i class="fa fa-angle-right a-tabcs rotate rotate_1 down"></i> -->
							       		<div class="ul-nav">
									       	<label class="tittle-tab" style="font-size: 17px;margin-bottom: 15px">
									       		Thông tin tài khoản đăng nhập
									       	</label>
							       		</div>
							    	</div>
								    <div id="collapse1" class="panel-collapse collapse in">
								      	<div class="panel-body ">
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> Tên đăng nhập</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<input type="text" class="textbox" name="filtername" value="">
								      			</div>
								      			<div class="col-xs-3">
								      				<button class="btn btn_tk"><i class="fa fa-lock"></i> Khôi phục tài khoản</button>
								      			</div>
								      		</div>
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> Nhóm</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<select class="textbox" name="">
								      					<option>Quản trị hệ thống</option>
								      				</select>
								      			</div>
								      		</div>
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> Trạng thái</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<select class="textbox" name="">
								      					<option>Đang hoạt động</option>
								      				</select>
								      			</div>
								      		</div>
								      	</div>
								      	<div class="panel-body ">
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> Tên tài khoản</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<input type="text" class="textbox" name="filtername" value="">
								      			</div>
								      		</div>
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> Địa chỉ e-mail</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<input type="email" class="textbox" name="filtername" value="">
								      			</div>
								      		</div>
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"><input type="checkbox" name=""> Cấu hình email gửi nhận</label>
								      			</div>
								      		</div>
								      	</div>
								      	<div class="panel-body " style="background: #f6f6f6;">
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> SMTP Server</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<input type="text" class="textbox" name="filtername" value="">
								      			</div>
								      		</div>
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> Tên đăng nhập</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<input type="text" class="textbox" name="filtername" value="">
								      			</div>
								      		</div>
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> Mật khẩu</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<input type="password" class="textbox" name="filtername" value="">
								      			</div>
								      		</div>
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> Domain</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<input type="text" class="textbox" name="filtername" value="">
								      			</div>
								      		</div>
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> Port</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<input type="text" class="textbox" name="filtername" value="">
								      			</div>
								      		</div>
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"></label>
								      			</div>
								      			<div class="col-xs-6">
								      				<label class="checkbox-inline"><input type="checkbox" class="textbox" name="filtername" value="" style="margin-top:-5px;"> Cho phép SSL</label>
								      			</div>
								      		</div>
								      	</div>
								      	<div class="panel-body ">
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> Điện thaoij</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<input type="text" class="textbox" name="filtername" value="">
								      			</div>
								      		</div>
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> CMND/ CCCD</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<input type="text" class="textbox" name="filtername" value="">
								      			</div>
								      		</div>
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam">Ghi chú</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<textarea rows="2" style="width:89%;border: 1px solid #ddd"></textarea>
								      			</div>
								      		</div>
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> ERP/ Authorize id</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<input type="text" class="textbox" name="filtername" value="">
								      			</div>
								      		</div>
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> Hồ sơ ứng viên</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<img src="<?php echo base_url() ?>image/bbye.jpg" alt="" style="width: 120px">
								      				<a href="">Nam Đỗ</a>
								      			</div>
								      		</div>
								      	</div>
								    </div>
							  	</div>
							</div>
							<div class="box_btn">
								<div class=" pull-right">
									<a href="<?php echo base_url() ?>admin/campaign/new_campaign_3" class="btn btn_tt">Lưu</a>
								</div>
							</div>
			            <!-- /.box-body -->
			        </div>
		    	</div>
		</div>
	</div>
</div>
<style type="text/css">
	.btn_tk{
		background: #f6f6f6;
		border: 1px solid #ddd;
	}
	.fa-lock{
		color: #F8A762;
	}
	.input_hs_cam{
		width: 60px;
		margin-bottom: 10px;
	}
	.input_hs_cam_70{
		margin-bottom: 7px;
	}
	.btn_thoat{
	  background: #FAC18F;
	  width: 130px;
	  color: #fff;
	}
	.btn_tt{
	  background: #5FA2DD;
	  margin-right: 20px;
	  color: #fff;
	}
</style>
<script type="text/javascript">
	var idIncrease = 5;
	$(document).ready(function() {
		$('#table-dangth').DataTable({
    "bPaginate": true,
    "bLengthChange": false,
    "pageLength": 10,
    "bFilter": false,
    "bInfo": false,
    "language": {
    "paginate": {
      "previous": "<i class='fa fa-angle-double-left' aria-hidden='true'></i>",
      "next": "<i class='fa fa-angle-double-right' aria-hidden='true'></i>"
	    }
	  },
    "bAutoWidth": false });
		$('#table-daht').DataTable({
    "bPaginate": true,
    "bLengthChange": false,
    "language": {
    "paginate": {
      "previous": "<i class='fa fa-angle-double-left' aria-hidden='true'></i>",
      "next": "<i class='fa fa-angle-double-right' aria-hidden='true'></i>"
	    }
	  },
    "pageLength": 10,
    "bFilter": false,
    "bInfo": false,
    "bAutoWidth": false });
		// "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
	});
	function clickPlus(input) {
		$(input).before(`<div class="row answer">\
											            	<div class="col-xs-5 image-upload">\
											            		<div class="col-xs-10 padding-lr0"><input type="text" class="textbox-answer" name="" id="textbox-answer-`+idIncrease+`">\
										            			<img src="" height="80px" hidden="true" id="img-answer-`+idIncrease+`"></div>\
											            		<div class="col-xs-2 padding-lr0">\
											            			<label for="file-input-answer-`+idIncrease+`">\
														        <button type="button" class="btn btn-answer btn_copy_2" onclick="_upload('file-input-answer-`+idIncrease+`')" id="button-input-id-`+idIncrease+`" ><i class="fa fa-picture-o" aria-hidden="true"></i></button>\
														   		</label>\
																<input id="file-input-answer-`+idIncrease+`" class="filee" type="file" style="display: none;" onchange="choosePicAnswer(this,'`+idIncrease+`')" />\
											            		</div>\
											            	</div>\
											            	<div class="col-xs-3 " style="padding-left: 0px"><input type="text" class="textbox" name=""></div>\
											            	<input type="checkbox" class="col-xs-3" name="">\
											            </div>`);
		idIncrease++;
	}
	function rotate(id) {
		for (var i = 1; i <= 9; i++) {
			if(i != id){
				$(".rotate_"+i).removeClass("down"); 
			}
		}
		$(".rotate_"+id).toggleClass("down"); 
	}
	function copyRound(round) {
		var count_round = Number($('#count_round').val());
		var new_round = Number(round)+1;
		var row = $('#round_'+round).clone().attr('id', 'round_'+new_round).after('#round_'+round);
		$('#round_'+round).after(row);
		$('#round_'+new_round).attr('data-index', new_round);
		$('#round_'+new_round).attr('hidden', false);
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
		//Image Main
		$('#round_'+new_round).contents().find('#addImage_'+round).attr('id', 'addImage_'+new_round);
		$('#round_'+new_round).contents().find('#label-input-'+round).attr('for', 'file-input-id-'+new_round);
		$('#round_'+new_round).contents().find('#file-input-id-'+round).attr('id', "file-input-id-"+new_round);
		$('#round_'+new_round).contents().find('#file-input-id-'+new_round).attr('onchange', "choosePic(this,'addImage_"+new_round+"')");
		//Image Answer
		$('#round_'+new_round).contents().find('#textbox-answer-1').attr('id', "textbox-answer-"+idIncrease);
		$('#round_'+new_round).contents().find('#img-answer-1').attr('id', "img-answer-"+idIncrease);
		$('#round_'+new_round).contents().find('#label-input-answer-1').attr('for', "file-input-answer-"+idIncrease);
		$('#round_'+new_round).contents().find('#file-input-answer-1').attr('id', "file-input-answer-"+idIncrease);
		$('#round_'+new_round).contents().find('#file-input-answer-'+idIncrease).attr('onchange', "choosePicAnswer(this,'"+idIncrease+"')");
		$('#round_'+new_round).contents().find('#button-input-answer-1').attr('id', "button-input-answer-"+idIncrease);
		$('#round_'+new_round).contents().find('#button-input-answer-'+idIncrease).attr('onclick', "_upload('file-input-answer-"+idIncrease+"')");
		// onclick="_upload('file-input-answer-1')"
		idIncrease++;
		$('#round_'+new_round).contents().find('#textbox-answer-2').attr('id', "textbox-answer-"+idIncrease);
		$('#round_'+new_round).contents().find('#img-answer-2').attr('id', "img-answer-"+idIncrease);
		$('#round_'+new_round).contents().find('#label-input-answer-2').attr('for', "file-input-answer-"+idIncrease);
		$('#round_'+new_round).contents().find('#file-input-answer-2').attr('id', "file-input-answer-"+idIncrease);
		$('#round_'+new_round).contents().find('#file-input-answer-'+idIncrease).attr('onchange', "choosePicAnswer(this,'"+idIncrease+"')");
		$('#round_'+new_round).contents().find('#button-input-answer-2').attr('id', "button-input-answer-"+idIncrease);
		$('#round_'+new_round).contents().find('#button-input-answer-'+idIncrease).attr('onclick', "_upload('file-input-answer-"+idIncrease+"')");
		idIncrease++;
		$('#round_'+new_round).contents().find('#textbox-answer-3').attr('id', "textbox-answer-"+idIncrease);
		$('#round_'+new_round).contents().find('#img-answer-3').attr('id', "img-answer-"+idIncrease);
		$('#round_'+new_round).contents().find('#label-input-answer-3').attr('for', "file-input-answer-"+idIncrease);
		$('#round_'+new_round).contents().find('#file-input-answer-3').attr('id', "file-input-answer-"+idIncrease);
		$('#round_'+new_round).contents().find('#file-input-answer-'+idIncrease).attr('onchange', "choosePicAnswer(this,'"+idIncrease+"')");
		$('#round_'+new_round).contents().find('#button-input-answer-3').attr('id', "button-input-answer-"+idIncrease);
		$('#round_'+new_round).contents().find('#button-input-answer-'+idIncrease).attr('onclick', "_upload('file-input-answer-"+idIncrease+"')");
		idIncrease++;
		$('#round_'+new_round).contents().find('#textbox-answer-4').attr('id', "textbox-answer-"+idIncrease);
		$('#round_'+new_round).contents().find('#img-answer-4').attr('id', "img-answer-"+idIncrease);
		$('#round_'+new_round).contents().find('#label-input-answer-4').attr('for', "file-input-answer-"+idIncrease);
		$('#round_'+new_round).contents().find('#file-input-answer-4').attr('id', "file-input-answer-"+idIncrease);
		$('#round_'+new_round).contents().find('#file-input-answer-'+idIncrease).attr('onchange', "choosePicAnswer(this,'"+idIncrease+"')");
		$('#round_'+new_round).contents().find('#button-input-answer-4').attr('id', "button-input-answer-"+idIncrease);
		$('#round_'+new_round).contents().find('#button-input-answer-'+idIncrease).attr('onclick', "_upload('file-input-answer-"+idIncrease+"')");
		idIncrease++;
		//End
		var new_count = count_round+1;		
		$('#count_round').val(new_count);

		var box = $('#box_round_'+round).clone().attr('id', 'box_round_'+new_round).after('#box_round_'+round);
		$('#box_round_'+round).after(box);
		$('#box_round_'+new_round).find('.info-box-number').text('V'+new_round);
		$('#box_round_'+new_round).find('.info-box-text').text(title+' Copy');
		var width = 100/new_count;
		$('.col-pc-12').css('width', width+'%');
	}

	function choosePicAnswer(input,id) {
			$("#textbox-answer-"+id+"").attr("hidden",true);
			$("#img-answer-"+id+"").attr("hidden",false);
			readURL(input,"img-answer-"+id);
	}
	function choosePic(input,id) {
		$('#'+id).attr("hidden",false);
		readURL(input,id);
	}
	
	function readURL(input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#'+id).attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    function _upload(id){
    	var browser_name = '';
		isIE = /*@cc_on!@*/false || !!document.documentMode;
		isEdge = !isIE && !!window.StyleMedia;
		if(navigator.userAgent.indexOf("Chrome") != -1 && !isEdge)
		{
		    browser_name = 'chrome';
		}
		else if(navigator.userAgent.indexOf("Safari") != -1 && !isEdge)
		{
		    browser_name = 'safari';
		}
		else if(navigator.userAgent.indexOf("Firefox") != -1 ) 
		{
		    browser_name = 'firefox';
		}
		else if((navigator.userAgent.indexOf("MSIE") != -1 ) || (!!document.documentMode == true )) //IF IE > 10
		{
		    browser_name = 'ie';
		}
		else if(isEdge)
		{
		    browser_name = 'edge';
		}
		else 
		{
		   browser_name = 'other-browser';
		}
		if(browser_name == 'chrome')
		{
	    	document.getElementById(id).click();
		}
	}
</script>
        </div>
    </div>
</div>


<style type="text/css">
</style>