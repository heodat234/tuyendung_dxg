<div class="content-wrapper">
    <section class="content">
    	<div class="row">
       		<div class="col-md-12">
	        	<div class="box box-default">
		            <div class="box-header" id="box_header_1">
		              <!-- <h5 class="box-title"></h5> -->
		              	<p>
		              		<label class="title_box_user">Tạo nhóm mới</label>
		              		<i class="fa fa-users fa_users"></i>
		              	</p>
		              	<div class="box-tools pull-right">
		                	<button type="button" class="btn btn-default">
		                		<i class="fa fa-list color-gray"></i>
		                	</button>
		              	</div>
		            </div>
		            <div id="box_header_2">
		            	<a href="<?php echo base_url()?>admin/user" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Previous">
		            		<i class="fa fa-chevron-left"></i> 
		            		Quay lại
		            	</a>
		            </div>
		            <form id="create">
			            <div class="panel-group" id="accordion">
						  	<div class="panel panel-default border-rad0">
						    	<div class="panel-heading rad-pad0 b-blue"> 
						       		<ul class="nav nav-tabs ul-nav">
								        <li class="active">
								        	<a data-toggle="tab" href="#config_group" class="nemu-info-pf" >Cấu hình nhóm</a>
								        </li>
								    </ul>
						    	</div>
							    <div id="collapse1" class="panel-collapse collapse in">
							      	<div class="panel-body height_600">
							      		<div class="tab-content">
								       		<div id="config_group" class="tab-pane active">
								        		<div class="panel-group bor-mar-b0">
											      	<div class="panel-body" style="border: 0px">
											     	 	<div class="width100 row rowedit h-auto padding_bot_15">
												            <label for="text" class="width20 col-xs-2 label-profile">
												            Tên nhóm</label>
												            <div class="col-xs-4 padding-lr0">
																<input type="text" class="textbox" name="groupname" value=""	>
												            </div>
												        </div>
												        <div class="width100 row rowedit h-auto padding_bot_15">
												            <label for="text" class="width20 col-xs-2 label-profile">
												            Trạng thái</label>
												            <div class="col-xs-4 padding-lr0">
																<select class="textbox" name="status">
																	<option value="W">Đang hoạt động</option>
																	<option value="C">Không hoạt động</option>
																</select>
												            </div>
												        </div>
												        <div class="width100 row rowedit h-auto">
												            <label for="text" class="col-xs-2 label-profile">
												            Quyền hạn</label>
												            <div class="col-xs-10">
													            <div class="col-xs-12 padding-lr0">
													            	<div class="col-xs-3">
													            		<label class="check_quyen">
													            			<input type="checkbox" name="operator[1]"> 
													            		Tài khoản người dùng</label>
													            	</div>
													            	<div class="col-xs-3">
													            		<label class="check_quyen">
													            			<input type="checkbox" name="operator[2]"> 
													            		Mẫu Email</label>
													            	</div>
													            	<div class="col-xs-3">
													            		<label class="check_quyen">
													            			<input type="checkbox" name="operator[3]"> 
													            		Cấu hình chung</label>
													            	</div>
													            </div>
													            <div class="col-xs-12 padding-lr0">
													            	<div class="col-xs-3">
													            		<label class="check_quyen">
													            			<input type="checkbox" name="operator[4]"> 
													            		Tin tức tuyển dụng</label>
													            	</div>
													            	<div class="col-xs-3">
													            		<label class="check_quyen">
													            			<input type="checkbox" name="operator[5]"> 
													            		Chiến dịch tuyển dụng</label>
													            	</div>
													            	<div class="col-xs-3">
													            		<label class="check_quyen">
													            			<input type="checkbox" name="operator[6]"> 
													            		Quy trình phỏng vấn</label>
													            	</div>
													            	<div class="col-xs-3">
													            		<label class="check_quyen">
													            			<input type="checkbox" name="operator[7]"> 
													            		Phỏng vấn / Đánh giá</label>
													            	</div>
													            </div>
													            <div class="col-xs-12 padding-lr0">
													            	<div class="col-xs-3">
													            		<label class="check_quyen">
													            			<input type="checkbox" name="operator[8]"> 
													            		Hồ sơ ứng viên</label>
													            	</div>
													            </div>
													            <div class="col-xs-12 padding-lr0">
													            	<div class="col-xs-3">
													            		<label class="check_quyen">
													            			<input type="checkbox" name="operator[9]"> 
													            		Web portal</label>
													            	</div>
													            </div>
													            <div class="col-xs-12 padding-lr0">
													            	<div class="col-xs-3">
													            		<label class="check_quyen">
													            			<input type="checkbox" name="operator[10]"> 
													            		Import data</label>
													            	</div>
													            </div>
													        </div>
												        </div>
												        <div class="box_btn">
															<div class="pull-right">
																<a href="http://recruit.tavicosoft.com/admin/campaign/main" class="btn btn_thoat">Thoát</a>
																<button type="submit" class="btn btn_thoat btn_tt"><i></i> Lưu</button>
															</div>
														</div>
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

	#myBtn {
		width:75px;
		height:75px;
	    position: fixed; /* Fixed/sticky position */
	    bottom: 20px; /* Place the button at the bottom of the page */
	    right: 30px; /* Place the button 30px from the right */
	    z-index: 99; /* Make sure it does not overlap */
	    border: none; /* Remove borders */
	    outline: none; /* Remove outline */
	    color: white; /* Text color */
	    cursor: pointer; /* Add a mouse pointer on hover */
	    padding: 19px; /* Some padding */
	    border-radius: 50%; /* Rounded corners */
	    font-size: 30px; /* Increase font size */
	    padding-left: 25px;
	}
	.title_box_user{
		font-size: 20px;
		margin-right: 10px;
	}
	.fa_users{
		opacity: .5;
		margin-right: 10px;
	}
	.title_chil{
		color: #3c8dbc;
		font-weight: 300;
		margin-right: 10px;
	}
	.title_time{
		font-weight: 400;
	}
	.height_600{
		height: 600px;
	}
	.padding_bot_15{
		padding-bottom: 15px;
	}
	.check_quyen{
		font-weight: 400;
	}
</style>