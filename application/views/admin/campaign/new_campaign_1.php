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
		            	<a href="<?php echo base_url()?>admin/Campaign/main" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Previous"><i class="fa fa-chevron-left"></i> Quay lại</a>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body no-padding dash-box">
		              <div class="col-md-3 box_body">
		                <div class="info-box-title"><i class="fa fa-suitcase"></i> Thông tin công việc</div>
		                <span class="info-box-text_1">Mô tả về các yêu cầu công việc, trách nhiệm, mục tiêu, quyền hạn, môi trường làm việc</span>
		              </div>
		              <div class="col-md-3 box_body box_2">
		                <div class="info-box-title"><i class="fa fa-suitcase"></i> Phạm vi tìm kiếm</div>
		                <span class="info-box-text_1">Thiết lập sẵn các phạm vi tìm kiếm giúp giới hạn số lượng hồ sơ phù hợp</span>
		              </div>
		              <div class="col-md-3 box_body box_2">
		                <div class="info-box-title"><i class="fa fa-list-ol"></i> Quy trình tuyển dụng</div>
		                <span class="info-box-text_1">Thiết lập quy trình cho các vòng Sơ loại, Tiếp cận, Phỏng vấn, Đề nghị và Tuyển dụng</span>
		              </div>
		              <div class="col-md-3 box_body box_2">
		                <div class="info-box-title"><i class="fa fa-credit-card"></i> Cơ hội nghề nghiệp</div>
		                <span class="info-box-text_1">Đưa chiến dịch tuyển dụng lên trang chủ (Web portal) của tập đoàn</span>
		              </div>
		            </div>
		            <form method="post" action="<?php echo base_url() ?>admin/campaign/new_campaign_2">
			            <div class="panel-group" id="accordion">
						  	<div class="panel panel-default border-rad0">
						  		<a data-toggle="collapse" data-parent="#accordion" href="#collapse1" onclick="rotate(1)">
							    	<div class="panel-heading rad-pad0 b-blue"> 
							       		<i class="fa fa-angle-right a-tabcs rotate rotate_1 down"></i>
							       		<div class="ul-nav">
									       	<label class="tittle-tab">
									       		Thông tin chung 
									       	</label>
							       		</div>
							    	</div>
							    </a>
							    <div id="collapse1" class="panel-collapse collapse in">
							      	<div class="panel-body">
							      		<div class="row form_campaign">
								             <label for="text" class=" col-xs-2 label-profile">Trạng thái chiến dịch</label>
								            <div class="col-xs-4  padding-lr0">
								             	<select class="textbox" name="status" required="">
								             		<option value="W">Đang diễn ra</option>
								             		<option value="C">Đã kết thúc</option>
								             	</select>
								            </div>
								             <label class="col-xs-3 width20 label-profile"><input type="checkbox" name="expeffect" value="Y"> Tự động đóng lại khi hết thời gian</label>
								         </div>
								        <div class="row form_campaign">
								            <label for="text" class=" col-xs-2 label-profile">Vị trí cần tuyển</label>
								            <div class="col-xs-4  padding-lr0">
								             	<input type="text" name="position" placeholder="Nhập vị trí cần tuyển" class="textbox" required="">
								            </div>
								            <label for="text" class="col-xs-offset-1  col-xs-2 label-profile">Số lượng</label>
								            <div class="col-xs-2 padding-lr0">
								             	<input type="text" name="quantity" class="textbox" value="1" required="">
								            </div>   
								        </div>
								        <div class="row form_campaign">
								            <label for="text" class=" col-xs-2 label-profile">Phòng ban</label>
								            <div class="col-xs-4  padding-lr0">
								             	<input type="text" name="department" placeholder="Nhập phòng ban làm việc" class="textbox">
								            </div>
								            <label for="text" class="col-xs-offset-1  col-xs-2 label-profile">Thời hạn</label>
								            <div class="col-xs-2 padding-lr0">
								             	<input type="text" name="expdate" class="textbox thoihan" required="" value="<?php echo date_format(date_create(),"d/m/Y"); ?>"> 
								            </div>   
								        </div>
								        <div class="row form_campaign">
								            <label for="text" class=" col-xs-2 label-profile">Địa điểm làm việc</label>
								            <div class="col-xs-4  padding-lr0">
								             	<input type="text" name="department" placeholder="Nhập phòng ban làm việc" class="textbox">
								            </div>
								            <label for="text" class="col-xs-offset-1  col-xs-2 label-profile">Hiển thị</label>
								            <div class="col-xs-2 padding-lr0">
								             	<select class="textbox" name="showtype" required="">
								             		<option value="O">Công khai</option>
								             		<option value="I">Nội bộ</option>
								             		<option value="p">Bảo mật</option>
								             	</select>
								            </div>   
								        </div>
								        <div class="row form_campaign">
								            <label for="text" class=" col-xs-2 label-profile">Tags</label>
								            <div class="col-xs-10  padding-lr0 padding_ri">
								             	<input class="textbox" name="">
								            </div>
								        </div>
								        <div class="row form_campaign">
								            <label for="text" class=" col-xs-2 label-profile">Căn cứ YCTD</label>
								            <div class="col-xs-4  padding-lr0">
								             	<input type="text" name="reference" placeholder="" class="textbox">
								            </div>
								            <label for="text" class="col-xs-2 label-profile">Trạng thái</label>
								            <!-- <div class="col-xs-2 padding-lr0">
								             	<select class="textbox" name="">
								             		<option>Hoạt động</option>
								             	</select>
								            </div>    -->
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
									       		Tóm tắt công việc
									       	</label>
							       		</div>
							    	</div>
							    </a>
							    <div id="collapse2" class="panel-collapse collapse in">
							      	<div class="panel-body">
							      		<div class="row form_campaign_1">
							      			<div class="col-xs-11  padding-lr0">
							      				<textarea placeholder="Tóm tắt công việc" rows="5" class="textarea_cd" name="jobbrief"></textarea>
							      			</div>
							      		</div>
							      	</div>
							    </div>
						  	</div>

						  	<div class="panel panel-default border-rad0">
						  		<a data-toggle="collapse" data-parent="#accordion" href="#collapse3" onclick="rotate(3)">
							    	<div class="panel-heading rad-pad0 b-blue"> 
							       		<i class="fa fa-angle-right a-tabcs rotate rotate_3 down"></i>
							       		<div class="ul-nav">
									       	<label class="tittle-tab">
									       		Trách nhiệm, mục tiêu
									       	</label>
							       		</div>
							    	</div>
							    </a>
							    <div id="collapse3" class="panel-collapse collapse in">
							      	<div class="panel-body">
							      		<div class="row form_campaign_1">
							      			<div class="col-xs-11  padding-lr0">
							      				<textarea placeholder="Trách nhiệm, mục tiêu" rows="5" class="textarea_cd" name="responsibilities"></textarea>
							      			</div>
							      		</div>
							      	</div>
							    </div>
						  	</div>

						  	<div class="panel panel-default border-rad0">
						  		<a data-toggle="collapse" data-parent="#accordion" href="#collapse4" onclick="rotate(4)">
							    	<div class="panel-heading rad-pad0 b-blue"> 
							       		<i class="fa fa-angle-right a-tabcs rotate rotate_4 down"></i>
							       		<div class="ul-nav">
									       	<label class="tittle-tab">
									       		Giám sát, chịu giám sát
									       	</label>
							       		</div>
							    	</div>
							    </a>
							    <div id="collapse4" class="panel-collapse collapse in">
							      	<div class="panel-body">
							      		<div class="row form_campaign_1">
							      			<div class="col-xs-11  padding-lr0">
							      				<textarea placeholder="Giám sát, chịu giám sát" rows="5" class="textarea_cd" name="supervised"></textarea>
							      			</div>
							      		</div>
							      	</div>
							    </div>
						  	</div>

						  	<div class="panel panel-default border-rad0">
						  		<a data-toggle="collapse" data-parent="#accordion" href="#collapse5" onclick="rotate(5)">
							    	<div class="panel-heading rad-pad0 b-blue"> 
							       		<i class="fa fa-angle-right a-tabcs rotate rotate_5 down"></i>
							       		<div class="ul-nav">
									       	<label class="tittle-tab">
									       		Quyền hạn
									       	</label>
							       		</div>
							    	</div>
							    </a>
							    <div id="collapse5" class="panel-collapse collapse in">
							      	<div class="panel-body">
							      		<div class="row form_campaign_1">
							      			<div class="col-xs-11  padding-lr0">
							      				<textarea placeholder="Quyền hạn" rows="5" class="textarea_cd" name="jurisdiction"></textarea>
							      			</div>
							      		</div>
							      	</div>
							    </div>
						  	</div>

						  	<div class="panel panel-default border-rad0">
						  		<a data-toggle="collapse" data-parent="#accordion" href="#collapse6" onclick="rotate(6)">
							    	<div class="panel-heading rad-pad0 b-blue"> 
							       		<i class="fa fa-angle-right a-tabcs rotate rotate_6 down"></i>
							       		<div class="ul-nav">
									       	<label class="tittle-tab">
									       		Môi trường làm việc
									       	</label>
							       		</div>
							    	</div>
							    </a>
							    <div id="collapse6" class="panel-collapse collapse in">
							      	<div class="panel-body">
							      		<div class="row form_campaign_1">
							      			<div class="col-xs-11  padding-lr0">
							      				<textarea placeholder="Môi trường làm việc" rows="5" class="textarea_cd" name="environment"></textarea>
							      			</div>
							      		</div>
							      	</div>
							    </div>
						  	</div>

						  	<div class="panel panel-default border-rad0">
						  		<a data-toggle="collapse" data-parent="#accordion" href="#collapse7" onclick="rotate(7)">
							    	<div class="panel-heading rad-pad0 b-blue"> 
							       		<i class="fa fa-angle-right a-tabcs rotate rotate_7 down"></i>
							       		<div class="ul-nav">
									       	<label class="tittle-tab">
									       		Yêu cầu
									       	</label>
							       		</div>
							    	</div>
							    </a>
							    <div id="collapse7" class="panel-collapse collapse in">
							      	<div class="panel-body">
							      		<div class="row form_campaign_1">
							      			<div class="col-xs-11  padding-lr0">
							      				<textarea placeholder="Yêu cầu" rows="5" class="textarea_cd" name="requirements"></textarea>
							      			</div>
							      		</div>
							      	</div>
							    </div>
						  	</div>
						</div>
						<div class="box_btn">
							<div class="pull-right">
								<a href="<?php echo base_url() ?>admin/campaign/main" class="btn btn_thoat">Thoát</a>
								<button class="btn btn_tt">Lưu/ Tiếp theo</button>
							</div>
						</div>
					</form>
	            <!-- /.box-body -->
	          	</div>
	        </div>
    	</div>
    </section>
</div>