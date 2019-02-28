<div class="content-wrapper">
    <section class="content">
    	<div class="row">
       		<div class="col-md-12">
	        	<div class="box box-default">
		            <div class="box-header" id="box_header_1">
		              <!-- <h5 class="box-title"></h5> -->
		              	<p><label class="title_box_user">Tạo nhóm mới</label><i class="fa fa-users fa_users"></i>
		              	<div class="box-tools pull-right">
		                	<button type="button" class="btn btn-default"><i class="fa fa-list color-gray"></i></button>
		              	</div>
		            </div>
		            <div id="box_header_2">
		            	<a href="<?php echo base_url()?>admin/multiplechoice" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Previous"><i class="fa fa-chevron-left"></i> Quay lại</a>
		            </div>
		            <div class="panel-group" id="accordion">
					  	<div class="panel panel-default border-rad0">
					    	<div class="panel-heading rad-pad0 b-blue"> 
					       		<ul class="nav nav-tabs ul-nav">
							        <li class="active">
							        	<a data-toggle="tab" href="#config_group" class="nemu-info-pf" >Thông tin</a>
							        </li>
							    </ul>
					    	</div>
						    <div id="collapse1" class="panel-collapse collapse in">
						      	<div class="panel-body">
						      		<div class="tab-content">
					
							       		<div id="config_group" class="tab-pane active">
							        		<div class="panel-group bor-mar-b0">
							        			<form id="create">
											      	<div class="panel-body" style="border: 0px; border-bottom: 1px solid #dedede;">
											     	 	<div class="width100 row rowedit h-auto padding_bot_15">
												            <label for="text" class="width20 col-xs-3 label-profile">Trạng thái áp dụng</label>
												            <div class="col-xs-4 padding-lr0">
																<select class="textbox" name="asmtstatus">
																	<option value="W">Đang áp dụng</option>
																	<option value="C">Không áp dụng</option>
																</select>
												            </div>
												        </div>
												        <div class="width100 row rowedit h-auto padding_bot_15">
												            <label for="text" class="width20 col-xs-3 label-profile">Tên gọi</label>
												            <div class="col-xs-4 padding-lr0">
																<input type="text" name="asmtname" required="">
												            </div>
												        </div>
												        <div class="width100 row rowedit h-auto padding_bot_15">
												            <label for="text" class="width20 col-xs-3 label-profile">Phân loại</label>
												            <div class="col-xs-4 padding-lr0">
																<select class="textbox" name="asmttype" style="font-family: 'FontAwesome'">
																	<option value="1">&#xf086; Phỏng vấn/Đánh giá</option>
																	<option value="2">&#xf15c; Trắc nghiệm</option>
																</select>
												            </div>
												        </div>
											  	  	</div>
											  	  	<div class="panel-body" style="border: 0px;">
											     	 	<div class="width100 row rowedit h-auto padding_bot_15">
												            <label for="text" class="width20 col-xs-3 label-profile">Trộn tự động</label>
												            <div class="col-xs-4 padding-lr0">
																<select class="textbox" name="shuffle">
																	<option value="0">Không</option>
																	<option value="1">Có</option>
																</select>
												            </div>
												        </div>
												        <div class="width100 row rowedit h-auto padding_bot_15">
												            <label for="text" class="width20 col-xs-3 label-profile">Số câu hỏi tối đa:</label>
												            <div class="col-xs-4 padding-lr0">
																<input type="text" name="shuffleqty" value="0"> <span class="body-blac5">Tự cân đối theo câu/phần</span>
												            </div>
												        </div>
												        <div class="width100 row rowedit h-auto padding_bot_15">
												            <label for="text" class="width20 col-xs-3 label-profile">Mức điểm đạt:</label>
												            <div class="col-xs-4 padding-lr0">
																<input type="number" name="targetscore" value="0"> <span class="body-blac5">Điểm tối đa của nội dung là: 75</span>
												            </div>
												        </div>
												        <div class="width100 row rowedit h-auto padding_bot_15">
												            <label for="text" class="width20 col-xs-3 label-profile">Giới hạn thời gian</label>
												            <div class="col-xs-4 padding-lr0">
																<input type="number" name="timelimit_h" value="0" style="width: 15%"> Giờ :
																<input type="number" name="timelimit_m" value="0" style="width: 15%"> Phút <span class="body-blac5"> 00:00 = không giới hạn thời gian</span>
												            </div>
												        </div>
												        <div class="width100 row rowedit h-auto padding_bot_15">
												            <label for="text" class="width20 col-xs-3 label-profile">Nội dung/ Chỉ dẫn</label>
												            <div class="col-xs-4 padding-lr0">
																<textarea class="textara1" rows="4" placeholder="" name="note"></textarea>
												            </div>
												        </div>
												        <div class="box_btn">
															<div class="pull-right">
																<a href="http://recruit.tavicosoft.com/admin/campaign/main" class="btn btn_thoat">Thoát</a>
																<button type="submit" class="btn btn_thoat btn_tt"><i></i> Lưu</button>
															</div>
														</div>
													</div>
												</form>
											</div>
							       		</div>
							       		<!-- Tab 3 -->
							       	</div>
						    	</div>
						   	</div>
					  	</div>
					</div>
	            <!-- /.box-body -->
	          	</div>
	        </div>
    	</div>
    </section>
</div>