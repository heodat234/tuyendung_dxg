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
		            	<a href="<?php echo base_url() ?>admin/campaign/new_campaign_3" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Previous"><i class="fa fa-chevron-left"></i> Quay lại</a>
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
		              <div class="col-md-3 box_body">
		                <div class="info-box-title"><i class="fa fa-credit-card"></i> Cơ hội nghề nghiệp</div>
		                <span class="info-box-text_1">Đưa chiến dịch tuyển dụng lên trang chủ (Web portal) của tập đoàn</span>
		              </div>
		            </div>
		            <form method="post" action="<?php echo base_url() ?>admin/campaign/saveRound4">
		            	<input type="hidden" name="campaignid" value="<?php echo $campaignid ?>">
		            	<div class="panel-group" id="accordion">
						  	<div class="panel panel-default border-rad0">
						  		<a data-toggle="collapse" data-parent="#accordion" href="#collapse1" onclick="rotate(1)">
							    	<div class="panel-heading rad-pad0 b-blue"> 
							       		<i class="fa fa-angle-right a-tabcs rotate rotate_1 down"></i>
							       		<div class="ul-nav">
									       	<label class="tittle-tab">
									       		Thông tin cơ hội
									       	</label>
							       		</div>
							    	</div>
							    </a>
							    <div id="collapse1" class="panel-collapse collapse in">
							      	<div class="panel-body">
							      		<div class="row form_campaign">
								            <label for="text" class=" col-xs-2 label-profile">Trạng thái tin đăng</label>
								            <div class="col-xs-4  padding-lr0">
								             	<select class="textbox" name="status">
								             		<option value="W">Đang diễn ra</option>
								             		<option value="C">Đã kết thúc</option>
								             	</select>
								            </div>
								            <label for="text" class=" col-xs-2 label-profile">Thời hạn</label>
								            <div class="col-xs-3  padding-lr0">
								             	<input type="text" name="expdate" class="textbox thoihan" value="<?php echo isset($campaigns[0]['expdate'])? date_format(date_create($campaigns[0]['expdate']),"d/m/Y") : ''  ?>"> 
								            </div>
								        </div>
								        <div class="row form_campaign">
								            <label for="text" class=" col-xs-2 label-profile">Vị trí tuyển dụng</label>
								            <div class="col-xs-4  padding-lr0">
								             	<input type="text" name="position" placeholder="Nhập vị trí cần tuyển" class="textbox" required="" value="<?php echo isset($campaigns[0]['position'])? $campaigns[0]['position'] : '' ?>">
								            </div>
								            <label for="text" class=" col-xs-2 label-profile">Số lượng</label>
								            <div class="col-xs-3  padding-lr0">
								             	<input type="text" name="quantity" class="textbox" value="<?php echo isset($campaigns[0]['quantity']) ? $campaigns[0]['quantity'] :'' ?>"> 
								            </div>
								        </div>
								        <div class="row form_campaign_1">
								        	<label for="text" class=" col-xs-6 label-profile"><input type="checkbox" name="expeffect" value="Y" <?php echo ($campaigns[0]['expeffect'] == 'Y') ? 'checked' :'' ?>> Tự động đóng lại khi hết thời hạn</label>
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
									       		Nội dung bài đăng
									       	</label>
							       		</div>
							    	</div>
							    </a>
							    <div id="collapse2" class="panel-collapse collapse in">
							      	<div class="panel-body">
							      		<div class="row form_campaign_1">
						      			<div class="col-xs-11  padding-lr0">
						      				<textarea placeholder="Tóm tắt công việc" rows="10" class="textarea_cd" name="body"></textarea>
						      			</div>
						      		</div>
							      	</div>
							    </div>
						  	</div>
						</div>
						<div class="box_btn">
							<div class="pull-right">
								<a href="<?php echo base_url() ?>admin/campaign/main" class="btn btn_thoat">Thoát</a>
								<button type="submit" class="btn btn_tt">Lưu/ Tiếp theo</button>
							</div>
						</div>
		            </form>
		            
	            <!-- /.box-body -->
	          	</div>
	        </div>
    	</div>
    </section>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		CKEDITOR.replace('body',{
	    	allowedContent: true,
	        disableAutoInline: true,
	        toolbarStartupExpanded : true,
	        toolbarCanCollapse: true,
	        filebrowserBrowseUrl: '<?php echo base_url('public/ckfinder/ckfinder.html') ?>',
          filebrowserUploadUrl: '<?php echo base_url('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') ?>',
          filebrowserImageBrowseUrl : '<?php echo base_url('public/ckfinder/ckfinder.html?type=Images') ?>',
          filebrowserFlashBrowseUrl : '<?php echo base_url('public/ckfinder/ckfinder.html?type=Flash') ?>',
          filebrowserImageUploadUrl : '<?php echo base_url('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') ?>',
          filebrowserFlashUploadUrl : '<?php echo base_url('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') ?>'
	    });
	});
</script>	