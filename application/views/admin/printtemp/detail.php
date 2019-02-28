<div class="content-wrapper">
    <section class="content">
    	<div class="row">
       		<div class="col-md-12">
	        	<div class="box box-default">
		            <div class="box-header" id="box_header_1">
		              <!-- <h5 class="box-title"></h5> -->
		              	<?php if ($group == 0){ ?>
		              		<p><label class="title_box_user">Tạo mẫu in mới</label><i class="fa fa-print"></i><label class="title_chil"></label></p>
		              	<?php }else{ ?>
			              <p><label class="title_box_user"><?php echo $template[0]['tempname'] ?></label><i class="fa fa-print" style="color: gray;margin-right: 8px"></i><label class="title_chil" style="cursor: pointer;"><?php 
			               if($template[0]['temptype'] == 0)
								    {
								    	echo "Đề nghị";
								    }
								    else
								    {
								    	echo "Hệ thống";
								    }?></label><label class="title_time">Tạo bởi: <?php echo $template[0]['operatorname'] ?> - <?php echo convertDate($template[0]['createddate']) ?></label></p>
			          	<?php } ?>
		              <div class="box-tools pull-right">
		                <button type="button" class="btn btn-default"><i class="fa fa-list color-gray"></i></button>
		              </div>
		            </div>
		            <div id="box_header_2">
		            	<a href="<?php echo base_url()?>admin/printtemp" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Previous"><i class="fa fa-chevron-left"></i> Quay lại</a>
		            </div>
		            <form method="post" enctype="multipart/form-data" action="
		            <?php 
		            if($group == 0)
		            {
		            	echo base_url().'admin/printtemp/insert';
		            }
		            else{
		            	echo base_url().'admin/printtemp/update/'.$group;
		            } ?>"
		            >
			            <div class="panel-group" id="accordion">
						  	<div class="panel panel-default border-rad0">
						    	<div class="panel-heading rad-pad0 b-blue div-title">
						    		<span class="nemu-info-pf" style="margin-left: 15px;color: #FFF">Thông tin</span> 
						    	</div>
							    <div id="collapse1" class="panel-collapse collapse in">
							      	<div class="panel-body">
							      		<div class="width100 row rowedit h-auto padding_bot_15">
								            <label for="text" class="width20 col-xs-3 label-profile">Tên phiếu in</label>
								            <div class="col-xs-4 padding-lr0">
												<input class="kttext" required="" type="text" id="" placeholder="" name="tempname" value="<?php echo isset($template[0]['tempname']) ? $template[0]['tempname'] : '' ?>" style="width: 100%">
								            </div>
								        </div>
								        <div class="width100 row rowedit h-auto padding_bot_15">
								            <label for="text" class="width20 col-xs-3 label-profile">Loại mẫu in</label>
								            <div class="col-xs-4 padding-lr0">
												<select class="seletext js-example-basic-single" name="temptype" required="" id="select_type1">
													<option value="0">Đề nghị</option>
													<!-- <option value="1">Hệ thống</option>
													<option value="2">Tin tức</option> -->
												</select>
								            </div>
								        </div>
								        <div class="width100 row rowedit h-auto padding_bot_15">
								            <label for="text" class="width20 col-xs-3 label-profile">Trạng thái</label>
								            <div class="col-xs-4 padding-lr0">
												<select class="seletext js-example-basic-single" name="status" required="" id="select_type" >
													<option value="W">Đang hoạt động</option>
													<option value="C">Hết thời hạn</option>
												</select>
								            </div>
								        </div>
								        <script type="text/javascript">
								        	$('#select_type option[value="<?php echo isset($template[0]['status']) ? $template[0]['status'] : 'W' ?>"]').prop('selected', true);
								        </script>
							    	</div>
							   	</div>

							   	<div class="panel-heading rad-pad0 b-blue div-title">
						    		<span class="nemu-info-pf" style="margin-left: 15px;color: #FFF">Nội dung</span> 
						    	</div>
							    <div id="collapse1" class="panel-collapse collapse in">
							      	<div class="panel-body">
							      		<div class="width100 row rowedit h-auto padding_bot_15">
								            <label for="text" class="width20 col-xs-3 label-profile">Nguồn dữ liệu</label>
								            <div class="col-xs-4 padding-lr0">
												<select class="seletext js-example-basic-single" name="datasource" required="" id="select_type2" onchange="selectDatasouce(this)" >
													<option value="0">Nghiệp vụ đề nghị</option>
													<!-- <option value="1">Hệ thống</option> -->
												</select>
								            </div>
								        </div>
								        <p data-toggle="modal" data-target="#insertData" class="plus-button" style="margin-left: 15px" id="clickPlus"><i class="fa fa-plus" aria-hidden="true"></i> Thêm trường dữ liệu</p>
								        <div class="width100 row rowedit h-auto padding_bot_15">
								            <label for="text" class="width20 col-xs-3 label-profile">Tiêu đề hiển thị</label>
								            <div class="col-xs-9 padding-lr0">
												<textarea class="kttext" required="" type="text" id="subject" placeholder="" name="subject"   style="width: 100%;border:1px solid #bbb" rows="2"><?php echo isset($template[0]['subject']) ? $template[0]['subject'] : '' ?></textarea>
								            </div>
								        </div>
								        
								        <div class="width100 row rowedit h-auto padding_bot_15">
								            <label for="text" class="width20 col-xs-3 label-profile">Nội dung</label>
								            <div class="col-xs-9 padding-lr0">
												<textarea id="body" name="body" style="width: 100%;" rows="30" required=""><?php echo isset($template[0]['body']) ? $template[0]['body'] : '' ?></textarea>
								            </div>
								        </div>

							    	</div>
							   	</div>
						  	</div>
						</div>
						<div class="box_btn">
						<div class="pull-right">
							<button type="submit" id="saveRound" class="btn btn_tt">Lưu</button>
						</div>
					</div>
					</form>
	            <!-- /.box-body -->
	          	</div>
	        </div>
    	</div>
    </section>
</div>

<!-- Thêm trường dữ liệu nội dung -->
<div class="modal fade" id="insertData" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #5fade0 !important;border-top-left-radius: 5px;border-top-right-radius: 5px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 1;color: white;"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" style="color: #FFF">Thêm trường dữ liệu nội dung</h4>
      </div>
      <div class="modal-body">
        <p id="titleDatasource">Nguồn dữ liệu: Nghiệp vụ đề nghị</p>
        <div class="contentDatasource">
        <a class="suggest-field" onclick="getFieldOffer(this)">Chức danh vị trí</a><a class="suggest-field" onclick="getFieldOffer(this)">Địa điểm làm việc</a><a class="suggest-field" onclick="getFieldOffer(this)">Chế độ làm việc</a><a class="suggest-field" onclick="getFieldOffer(this)">Ngày nhận việc</a><a class="suggest-field" onclick="getFieldOffer(this)">Thời gian thử việc</a><a class="suggest-field" onclick="getFieldOffer(this)">Người hướng dẫn</a><a class="suggest-field" onclick="getFieldOffer(this)">Báo cáo cho</a><a class="suggest-field" onclick="getFieldOffer(this)">Lương thử việc</a><a class="suggest-field" onclick="getFieldOffer(this)">Lương chính thức</a><a class="suggest-field" onclick="getFieldOffer(this)">Cấp</a><a class="suggest-field" onclick="getFieldOffer(this)">Bậc</a><a class="suggest-field" onclick="getFieldOffer(this)">Chức vụ</a><a class="suggest-field" onclick="getFieldOffer(this)">Phòng ban</a><a class="suggest-field" onclick="getFieldOffer(this)">Phụ cấp ăn trưa</a><a class="suggest-field" onclick="getFieldOffer(this)">Phụ cấp điện thoại</a><a class="suggest-field" onclick="getFieldOffer(this)">Hỗ trợ xăng xe</a>
        <a class="suggest-field" onclick="getFieldOffer(this)">Phụ cấp tài xế</a><a class="suggest-field" onclick="getFieldOffer(this)">Phụ cấp khác</a>
    	</div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="content-CK" hidden="true">
	<?php echo isset($template[0]['body']) ? $template[0]['body'] : ''; ?>
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
	.div-title{
		height: 40px;
		line-height: 40px;
	}
	.suggest-field{
		color: #5fade0;
		background: #f8f9fc;
		padding: 3px;
		margin: 5px;
		display: inline-block;
		cursor: pointer;
	}
</style>
<script type="text/javascript">
	$(document).ready(function() {
	    $('#select_type1').select2({ width: '100%' });
	    $('#select_type2').select2({ width: '100%' });
	    $('#select_type').select2({ width: '100%' });
	    
	    var dateNow = new Date();
	    $('.thoihan').datetimepicker({
	    	timepicker:false,
	    	format:'d/m/Y',
	    });
	    CKEDITOR.replace('body',{
	    	allowedContent: true,
	        disableAutoInline: true,
	        toolbarCanCollapse: true,
	        height: 600
	    });

		var setdata = $('.content-CK').html();
	    CKEDITOR.instances['body'].setData(setdata);

	});
	function selectDatasouce(thiss) {
		var value = thiss.value;
		var textt = $("#select_type2 option:selected").text();
		$('#titleDatasource').text('Nguồn dữ liệu: Nghiệp vụ '+textt);
		if(value == 0)
		{
			$('.contentDatasource').html('<a class="suggest-field" onclick="getField(this)">Chức danh vị trí</a><a class="suggest-field" onclick="getField(this)">Địa điểm làm việc</a><a class="suggest-field" onclick="getField(this)">Ngày nhận việc</a><a class="suggest-field" onclick="getField(this)">Thời gian thử việc</a><a class="suggest-field" onclick="getField(this)">Người hướng dẫn</a><a class="suggest-field" onclick="getField(this)">Báo cáo cho</a><a class="suggest-field" onclick="getField(this)">Lương thử việc</a><a class="suggest-field" onclick="getField(this)">Lương chính thức</a><a class="suggest-field" onclick="getField(this)">Phụ cấp</a><a class="suggest-field" onclick="getField(this)">Bậc</a>');
		}
		
	}
	
	function getFieldOffer(id) {
		var value = ' <span style="color:#3498db;">['+id.text+']&nbsp;</span> ';
		CKEDITOR.instances['body'].insertHtml(value);
		$('#insertData').modal('toggle');
	}
	
</script>
        
<?php
	function convertDate($value)
	{
		$date=date_create($value);
		echo date_format($date,"d/m/Y");
	}
?>