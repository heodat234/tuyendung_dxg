<div class="content-wrapper">
    <section class="content">
    	<div class="row">
       		<div class="col-md-12">
	        	<div class="box box-default">
		            <div class="box-header" id="box_header_1">
		              <!-- <h5 class="box-title"></h5> -->
		              	<p>
		              		<label class="title_box_user"><?php echo $records[0]['groupname'] ?></label>
		              		<i class="fa fa-users fa_users"></i>
		              		<label class="title_chil">Tuyen dung vien</label>
		              		<label class="title_time">Ngày cập nhật cuối cùng <?php echo date('d-m-Y',strtotime($records[0]['lastupdate']))?></label>
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
		            <form id="edit">
		            	<input type="hidden" name="groupid" value="<?php echo $records[0]['groupid']?>">
			            <div class="panel-group" id="accordion">
						  	<div class="panel panel-default border-rad0">
						    	<div class="panel-heading rad-pad0 b-blue"> 
						       		<ul class="nav nav-tabs ul-nav">
						       			<li class="">
						       				<a data-toggle="tab" href="#list_user" class="nemu-info-pf">
						       				Danh sách tài khoản</a>
						       			</li>
								        <li class="active">
								        	<a data-toggle="tab" href="#config_group" class="nemu-info-pf" >
								        	Cấu hình nhóm</a>
								        </li>
								    </ul>
						    	</div>
							    <div id="collapse1" class="panel-collapse collapse in">
							      	<div class="panel-body ">
							      		<div class="tab-content">
							      			<div id="list_user" class="tab-pane">
								        		<div class="panel-group bor-mar-b0">
											      	<div class="panel-body" style="border: 0px">
											      		<p class="titleAppoint1">Đang hoạt động</p>
											     	 	<table class="table table-bordered table-hover table-responsive" id="user_w">
											     	 		<thead>
											     	 			<th>ID</th>
											     	 			<th>Tên tài khoản</th>
											     	 			<th>Tên đăng nhập</th>
											     	 			<th>Email</th>
											     	 			<th>Số điện thoại</th>
											     	 			<th>Đăng nhập lần cuối</th>
											     	 			<th>Trạng thái</th>
											     	 		</thead>
											     	 		<tbody>
											     	 			<?php if(isset($users_w)&&!empty($users_w)) foreach ($users_w as $key => $value) {
											     	 				echo "<tr>";
											     	 				echo "<td>".$value['operatorid']."</td>";
											     	 				echo "<td>".$value['operatorname']."</td>";
											     	 				echo "<td>".$value['displayname']."</td>";
											     	 				echo "<td>".$value['email']."</td>";
											     	 				echo "<td>".$value['telephone']."</td>";
											     	 				echo "<td>20-11-2018</td>";
											     	 				echo "<td>Đang hoạt động</td>";
											     	 				echo "</tr>";
											     	 			} ?>
											     	 		</tbody>
											     	 	</table>
											     	 	<p class="titleAppoint1">Ngưng hoạt động</p>
											     	 	<table class="table table-bordered table-hover table-responsive" id="user_c">
											     	 		<thead>
											     	 			<th>ID</th>
											     	 			<th>Tên tài khoản</th>
											     	 			<th>Tên đăng nhập</th>
											     	 			<th>Email</th>
											     	 			<th>Số điện thoại</th>
											     	 			<th>Đăng nhập lần cuối</th>
											     	 			<th>Trạng thái</th>
											     	 		</thead>
											     	 		<tbody>
											     	 			<?php if(isset($users_c)&&!empty($users_c)) foreach ($users_c as $key => $value) {
											     	 				echo "<tr>";
											     	 				echo "<td>".$value['operatorid']."</td>";
											     	 				echo "<td>".$value['operatorname']."</td>";
											     	 				echo "<td>".$value['displayname']."</td>";
											     	 				echo "<td>".$value['email']."</td>";
											     	 				echo "<td>".$value['telephone']."</td>";
											     	 				echo "<td>20-11-2018</td>";
											     	 				echo "<td>Ngưng hoạt động</td>";
											     	 				echo "</tr>";
											     	 			} ?>
											     	 		</tbody>
											     	 	</table>
											  	  	</div>
												</div>
								       		</div>
								       		<div id="config_group" class="tab-pane active">
								        		<div class="panel-group bor-mar-b0">
											      	<div class="panel-body" style="border: 0px">
											     	 	<div class="width100 row rowedit h-auto padding_bot_15">
												            <label for="text" class="width20 col-xs-2 label-profile">
												            Tên nhóm</label>
												            <div class="col-xs-4 padding-lr0">
																<input type="text" class="textbox" name="groupname" value="<?php echo $records[0]['groupname']?>"	>
												            </div>
												        </div>
												        <div class="width100 row rowedit h-auto padding_bot_15">
												            <label for="text" class="width20 col-xs-2 label-profile">
												            Trạng thái</label>
												            <div class="col-xs-4 padding-lr0">
																<select class="textbox" name="status">
																	<option value="W" <?php echo $records[0]['status']=='W'?'selected':''?>>Đang hoạt động</option>
																	<option value="C" <?php echo $records[0]['status']=='C'?'selected':''?>>Không hoạt động</option>
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
													            			<input type="checkbox" name="operator[1]" <?php echo substr($records[0]['operator'],0,1)=='Y'?'checked':''?>> 
													            		Tài khoản người dùng</label>
													            	</div>
													            	<div class="col-xs-3">
													            		<label class="check_quyen">
													            			<input type="checkbox" name="operator[2]" <?php echo substr($records[0]['operator'],1,1)=='Y'?'checked':''?>> 
													            		Mẫu Email</label>
													            	</div>
													            	<div class="col-xs-3">
													            		<label class="check_quyen">
													            			<input type="checkbox" name="operator[3]" <?php echo substr($records[0]['operator'],2,1)=='Y'?'checked':''?>> 
													            		Cấu hình chung</label>
													            	</div>
													            </div>
													            <div class="col-xs-12 padding-lr0">
													            	<div class="col-xs-3">
													            		<label class="check_quyen">
													            			<input type="checkbox" name="operator[4]" <?php echo substr($records[0]['operator'],3,1)=='Y'?'checked':''?>> 
													            		Tin tức tuyển dụng</label>
													            	</div>
													            	<div class="col-xs-3">
													            		<label class="check_quyen">
													            			<input type="checkbox" name="operator[5]" <?php echo substr($records[0]['operator'],4,1)=='Y'?'checked':''?>> 
													            		Chiến dịch tuyển dụng</label>
													            	</div>
													            	<div class="col-xs-3">
													            		<label class="check_quyen">
													            			<input type="checkbox" name="operator[6]" <?php echo substr($records[0]['operator'],5,1)=='Y'?'checked':''?>> 
													            		Quy trình phỏng vấn</label>
													            	</div>
													            	<div class="col-xs-3">
													            		<label class="check_quyen">
													            			<input type="checkbox" name="operator[7]" <?php echo substr($records[0]['operator'],6,1)=='Y'?'checked':''?>> 
													            		Phỏng vấn / Đánh giá</label>
													            	</div>
													            </div>
													            <div class="col-xs-12 padding-lr0">
													            	<div class="col-xs-3">
													            		<label class="check_quyen">
													            			<input type="checkbox" name="operator[8]" <?php echo substr($records[0]['operator'],7,1)=='Y'?'checked':''?>> 
													            		Hồ sơ ứng viên</label>
													            	</div>
													            </div>
													            <div class="col-xs-12 padding-lr0">
													            	<div class="col-xs-3">
													            		<label class="check_quyen">
													            			<input type="checkbox" name="operator[9]" <?php echo substr($records[0]['operator'],8,1)=='Y'?'checked':''?>> 
													            		Web portal</label>
													            	</div>
													            </div>
													            <div class="col-xs-12 padding-lr0">
													            	<div class="col-xs-3">
													            		<label class="check_quyen">
													            			<input type="checkbox" name="operator[10]" <?php echo substr($records[0]['operator'],9,1)=='Y'?'checked':''?>> 
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
<a href="#" class="b-blue" <?php if($this->uri->segment(4)!='3'){?>onclick="showModal()"<?php }?> id="myBtn">
	<i class="fa fa-plus"></i>
</a>

<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-60"  role="document" style="width:850px;">
        <div class="modal-content">
		    	<div class="row">
		       		<div class="col-md-12">
		       			<form id="user_acc" act="">
		       				<input type="hidden" name="operatorid">
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
								      				<input type="text" class="textbox" name="displayname" value="">
								      			</div>
								      			<div class="col-xs-3">
								      				<button type="button" class="btn btn_tk">
								      					<i class="fa fa-lock"></i> 
								      				Khôi phục tài khoản</button>
								      			</div>
								      		</div>
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> Mật khẩu</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<input type="password" class="textbox" name="password" value="******">
								      			</div>
								      			
								      		</div>
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> Nhóm</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<select class="textbox" name="groupid">
								      					<!-- <option value="<?php echo($records[0]['groupid'])?>"><?php echo($records[0]['groupname'])?></option> -->
								      					<?php foreach ($groups as $gr){ 
								      						if ($gr['groupid'] == $records[0]['groupid']) { ?>
								      							<option value="<?php echo($gr['groupid'])?>" selected><?php echo($gr['groupname'])?></option>
								      						<?php }else{ ?>
								      							<option value="<?php echo($gr['groupid'])?>"><?php echo($gr['groupname'])?></option>
								      					<?php } } ?>
								      				</select>
								      			</div>
								      		</div>
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> Trạng thái</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<select class="textbox" name="status">
								      					<option value="W">Đang hoạt động</option>
								      					<option value="C">Ngưng hoạt động</option>
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
								      				<input type="text" required="" class="textbox" name="operatorname" value="">
								      			</div>
								      		</div>
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> Địa chỉ e-mail</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<input type="email" class="textbox" name="email" value="">
								      			</div>
								      		</div>
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam">
								      					<input type="checkbox" name="check_for_email"> 
								      				Cấu hình email gửi nhận</label>
								      			</div>
								      		</div>
								      	</div>
								      	<div id="email_info" class="panel-body hide" style="background: #f6f6f6;">
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> SMTP Server</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<input type="text" class="textbox" name="mcsmtp" value="">
								      			</div>
								      		</div>
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> Tên đăng nhập</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<input type="text" class="textbox" name="mcuser" value="">
								      			</div>
								      		</div>
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> Mật khẩu</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<input type="password" class="textbox" name="mcpass" value="******">
								      			</div>
								      		</div>
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> Domain</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<input type="text" class="textbox" name="mcdomain" value="">
								      			</div>
								      		</div>
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> Port</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<input type="text" class="textbox" name="mcport" value="">
								      			</div>
								      		</div>
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"></label>
								      			</div>
								      			<div class="col-xs-6">
								      				<label class="checkbox-inline">
								      					<input type="checkbox" name="mcssl" value="" style="margin-top:5px !important;"> 
								      				Cho phép SSL</label>
								      			</div>
								      		</div>
								      	</div>
								      	<div class="panel-body ">
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> Điện thoại</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<input type="text" class="textbox" name="telephone" value="">
								      			</div>
								      		</div>
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> CMND/ CCCD</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<input type="text" class="textbox" name="idcard" value="">
								      			</div>
								      		</div>
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam">Ghi chú</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<textarea name="notes" rows="2" style="width:89%;border: 1px solid #ddd"></textarea>
								      			</div>
								      		</div>
								      		<div class="row form_campaign">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> ERP/ Authorize id</label>
								      			</div>
								      			<div class="col-xs-4">
								      				<input type="text" class="textbox" name="authorizeid" value="">
								      			</div>
								      		</div>
								      		<div class="row form_campaign" id="user_avatar">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> Avatar</label>
								      			</div>
								      			<div class="col-xs-4">

								      				<div class="avatar">
								      					<img src="<?php echo base_url() ?>public/image/bbye.jpg" alt=" " width="100" height="100">
								      				</div>
								      				
								      				<a href="#"></a>
								      			</div>
								      		</div>
								      		<div class="row form_campaign" id="user_profile">
								      			<div class="col-xs-3">
								      				<label class="label_cam"> Hồ sơ ứng viên</label>
								      			</div>
								      			<div class="col-xs-4">

								      				<div class="profile">
								      					<img src="<?php echo base_url() ?>public/image/bbye.jpg" alt=" " width="100" height="100">
								      				</div>
								      				
								      				<a href="#"></a>
								      			</div>
								      		</div>
								      	</div>
								    </div>
							  	</div>
							</div>
							<div class="box_btn">
								<div class=" pull-right">
									<button class="btn btn-warning" data-dismiss="modal"> Huỷ</button> 
									<button type="submit" class="btn btn_tt"><i></i> Lưu</button>
								</div>
							</div>
						</form>
			            <!-- /.box-body -->
			        </div>
		    	</div>
		</div>
	</div>
</div>
<style type="text/css">
	.avatar,.profile{
		width: 100px;height:100px;display: -webkit-inline-box;border: 1px solid #dbdbdb; cursor: pointer;
	}
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