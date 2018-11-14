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
		            	<a href="<?php echo base_url()?>admin/user" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Previous"><i class="fa fa-chevron-left"></i> Quay lại</a>
		            </div>
		            <form method="post" action="<?php echo base_url() ?>admin/campaign/new_campaign_2">
			            <div class="panel-group" id="accordion">
						  	<div class="panel panel-default border-rad0">
						    	<div class="panel-heading rad-pad0 b-blue"> 
						       		<ul class="nav nav-tabs ul-nav">
								        <li class="<?php echo isset($active2)?$active2 : '' ?>"><a data-toggle="tab" href="#list_user" class="nemu-info-pf">Danh sách tài khoản</a></li>
								        <li class="<?php echo isset($active1)?$active1 : '' ?>"><a data-toggle="tab" href="#config_group" class="nemu-info-pf" >Cấu hình nhóm</a></li>
								    </ul>
						    	</div>
							    <div id="collapse1" class="panel-collapse collapse in">
							      	<div class="panel-body height_600">
							      		<div class="tab-content">
								      		<div id="list_user" class="tab-pane <?php echo isset($active2)?$active2 : '' ?>">
								        		<div class="panel-group bor-mar-b0">
											      	<div class="panel-body" style="border: 0px">
											     	 	<table class="table table-bordered table-hover table-responsive">
											     	 		<thead>
											     	 			<th>Tên tài khoản</th>
											     	 			<th>Tên đăng nhập</th>
											     	 			<th>Email</th>
											     	 			<th>Số điện thoại</th>
											     	 			<th>Đăng nhập lần cuối</th>
											     	 			<th>Trạng thái</th>
											     	 		</thead>
											     	 		<tbody>
											     	 			<tr>
											     	 				<td>Hưng</td>
											     	 				<td>Hưng</td>
											     	 				<td>Hưng</td>
											     	 				<td>1111</td>
											     	 				<td>123</td>
											     	 				<td>Đang hoạt động</td>
											     	 			</tr>
											     	 		</tbody>
											     	 	</table>
											  	  	</div>
												</div>
								       		</div>

								       		<div id="config_group" class="tab-pane <?php echo isset($active1)?$active1 : '' ?>">
								        		<div class="panel-group bor-mar-b0">
											      	<div class="panel-body" style="border: 0px">
											     	 	<div class="width100 row rowedit h-auto padding_bot_15">
												            <label for="text" class="width20 col-xs-3 label-profile">Tên nhóm</label>
												            <div class="col-xs-4 padding-lr0">
																<input type="text" class="textbox" name="" value="<?php echo $title ?>"	>
												            </div>
												        </div>
												        <div class="width100 row rowedit h-auto padding_bot_15">
												            <label for="text" class="width20 col-xs-3 label-profile">Trạng thái</label>
												            <div class="col-xs-4 padding-lr0">
																<select class="textbox" name="">
																	<option>Đang hoạt động</option>
																	<option>Không hoạt động</option>
																</select>
												            </div>
												        </div>
												        <?php if ($group == 4): ?>
												        	<div class="width100 row rowedit h-auto padding_bot_15">
													            <label for="text" class="width20 col-xs-3 label-profile">Chức năng</label>
													            <div class="col-xs-4 padding-lr0">
																	<select class="textbox" name="">
																		<option>Tuyển dụng viên</option>
																		<option>Không hoạt động</option>
																	</select>
													            </div>
													        </div>
												        <?php endif ?>
												        <div class="width100 row rowedit h-auto">
												            <label for="text" class="width20 col-xs-3 label-profile">Quyền hạn</label>
												            <div class="width80 col-xs-9 padding-lr0">
												            	<div class="col-xs-3">
												            		<label class="check_quyen"><input type="checkbox" name=""> Tài khoản người dùng</label>
												            	</div>
												            	<div class="col-xs-3">
												            		<label class="check_quyen"><input type="checkbox" name=""> Tài khoản người dùng</label>
												            	</div>
												            	<div class="col-xs-3">
												            		<label class="check_quyen"><input type="checkbox" name=""> Tài khoản người dùng</label>
												            	</div>
												            	<div class="col-xs-3">
												            		<label class="check_quyen"><input type="checkbox" name=""> Tài khoản người dùng</label>
												            	</div>
												            	<div class="col-xs-3">
												            		<label class="check_quyen"><input type="checkbox" name=""> Tài khoản người dùng</label>
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
	$(document).ready(function() {
	    $('.js-example-basic').select2({ width: '100%' });
	    var dateNow = new Date();
	    $('.thoihan').datetimepicker({
	    	timepicker:false,
	    	format:'d/m/Y',
	    });
	    CKEDITOR.replace('content',{
	    	allowedContent: true,
	        disableAutoInline: true,
	        toolbarStartupExpanded : false,
	        toolbarCanCollapse: true});
	});
	function rotate(id) {
		for (var i = 1; i <= 9; i++) {
			if(i != id){
				$(".rotate_"+i).removeClass("down"); 
			}
		}
		$(".rotate_"+id).toggleClass("down"); 
	}
</script>
        </div>
    </div>
</div>


<style type="text/css">
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