<?php if($group == 0){
	$dataEmail[0]['profilename'] = '';
	$dataEmail[0]['presubject'] = '';
	$dataEmail[0]['prebody'] = '';
}
$dataEmail[0]['presender'] = "Tài khoản đang đăng nhập";
 ?>
<div class="content-wrapper">
    <section class="content">
    	<div class="row">
       		<div class="col-md-12">
	        	<div class="box box-default">
		            <div class="box-header" id="box_header_1">
		              <!-- <h5 class="box-title"></h5> -->
		              	<?php if ($group == 0){  $active1 = 'active in';?>
		              		<p><label class="title_box_user">Tạo mẫu Email mới</label><i class="fa fa-envelope-o"></i><label class="title_chil"></label></p>
		              	<?php }else{  $active2 = 'active in';?>
			              <p><label class="title_box_user"><?php echo $dataEmail[0]['profilename'] ?></label><i class="fa fa-envelope-o" style="color: gray;margin-right: 8px"></i><label class="title_chil" style="cursor: pointer;"><?php 
			               if($dataEmail[0]['profiletype'] == 0)
								    {
								    	echo "Nghiệp vụ";
								    }
								    else
								    {
								    	echo "Hệ thống";
								    }?></label><label class="title_time">Tạo bởi: <?php echo $dataEmail[0]['createdby'] ?> - <?php echo convertDate($dataEmail[0]['createddate']) ?></label></p>
			          	<?php } ?>
		              <div class="box-tools pull-right">
		                <button type="button" class="btn btn-default"><i class="fa fa-list color-gray"></i></button>
		              </div>
		            </div>
		            <div id="box_header_2">
		            	<a href="<?php echo base_url()?>admin/email" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Previous"><i class="fa fa-chevron-left"></i> Quay lại</a>
		            </div>
		            <form method="post" action="

		            <?php 
		            if($group == 0)
		            {
		            	echo base_url().'admin/email/insertEmail';
		            }
		            else{
		            	echo base_url().'admin/email/updateEmail/'.$group;
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
								            <label for="text" class="width20 col-xs-3 label-profile">Tên mẫu Email</label>
								            <div class="col-xs-4 padding-lr0">
												<input class="kttext" required="" type="text" id="" placeholder="" name="profilename" value="<?php echo $dataEmail[0]['profilename'] ?>" style="width: 100%">
								            </div>
								        </div>
								        <div class="width100 row rowedit h-auto padding_bot_15">
								            <label for="text" class="width20 col-xs-3 label-profile">Trạng thái áp dụng</label>
								            <div class="col-xs-4 padding-lr0">
												<select class="seletext js-example-basic-single" name="status" required="" id="select_type" >
													<option value="0">Đang áp dụng</option>
													<option value="1">Hết thời hạn</option>

												</select>
								            </div>
								        </div>
								        <div class="width100 row rowedit h-auto padding_bot_15">
								            <label for="text" class="width20 col-xs-3 label-profile">Loại hình Email</label>
								            <div class="col-xs-4 padding-lr0">
												<select class="seletext js-example-basic-single" name="profiletype" required="" id="select_type1" onchange="changeTypeEmail(this)" >
													<option value="0">Nghiệp vụ</option>
													<option value="1">Hệ thống</option>

												</select>
								            </div>
								        </div>
								        <div class="width100 row rowedit h-auto padding_bot_15">
								            <label for="text" class="width20 col-xs-3 label-profile">Người gửi</label>
								            <div class="col-xs-4 padding-lr0">
												<input class="kttext" required="" type="text" id="presender" placeholder="" name="presender" value="Tài khoản đang đăng nhập" style="width: 100%">
								            </div>
								        </div>
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
													<option value="0">Nghiệp vụ</option>
													<option value="1">Hệ thống</option>

												</select>
								            </div>
								        </div>
								        <div class="width100 row rowedit h-auto padding_bot_15">
								            <label for="text" class="width20 col-xs-3 label-profile">Người nhận</label>
								            <div class="col-xs-4 padding-lr0">
												<select class="seletext js-example-basic-single" name="prereceiver" required="" id="select_type3" >
													<option value="0">Ứng viên</option>

												</select>
								            </div>
								        </div>
								        <div class="width100 row rowedit h-auto padding_bot_15">
								            <label for="text" class="width20 col-xs-3 label-profile">Cc</label>
								            <div class="col-xs-4 padding-lr0">
												<select class="seletext js-example-basic-single" name="precc" required="" id="select_type4" >
													<option value="0">Phụ trách vòng</option>

												</select>
								            </div>
								        </div>
								        <div class="width100 row rowedit h-auto padding_bot_15">
								            <label for="text" class="width20 col-xs-3 label-profile">Bcc</label>
								            <div class="col-xs-4 padding-lr0">
												<select class="seletext js-example-basic-single" name="prebcc" required="" id="select_type5" >
													<option value="0"></option>
													<option value="1"></option>
												</select>
								            </div>
								        </div>
								        <p data-toggle="modal" data-target="#insertUser" class="plus-button" style="margin-left: 15px" id="clickPlus"><i class="fa fa-plus" aria-hidden="true"></i> Thêm trường dữ liệu</p>
								        <div class="width100 row rowedit h-auto padding_bot_15">
								            <label for="text" class="width20 col-xs-3 label-profile">Tiêu đề</label>
								            <div class="col-xs-4 padding-lr0">
												<input class="kttext" required="" type="text" id="" placeholder="" name="presubject" value="<?php echo $dataEmail[0]['presubject'] ?>" style="width: 100%">
								            </div>
								        </div>
								        <div class="width100 row rowedit h-auto padding_bot_15">
								            <label for="text" class="width20 col-xs-3 label-profile">Nội dung</label>
								            <div class="col-xs-6 padding-lr0">
												<textarea id="prebody" name="prebody" style="width: 100%;" rows="10" required=""><?php echo isset($news[0]['body'])? $news[0]['body']: ''; ?></textarea>
								            </div>
								        </div>

								        <div class="width100 row rowedit h-auto padding_bot_15">
								            
											<div class="col-xs-3 padding-lr0">
												<label style="color: #5fade0; float: right; cursor: pointer;" class="filebutton">
												<i class="fa fa-paperclip" aria-hidden="true"></i> Đính kèm
												<span><input type="file" style="display: none;" id="myfile" name="myfile"></span>
												</label>
								            </div>
								        </div>

							    	</div>
							   	</div>
						  	</div>
						</div>
						<div class="box_btn">
						<div class="pull-right">
							<a href="http://recruit.tavicosoft.com/admin/campaign/main" class="btn btn_thoat">Thoát</a>
							<button type="submit" id="saveRound" class="btn btn_tt">Lưu/ Tiếp theo</button>
						</div>
					</div>
					</form>
	            <!-- /.box-body -->
	          	</div>
	        </div>
    	</div>
    </section>
</div>

<div class="modal fade" id="insertUser" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #5fade0 !important;
border-top-left-radius: 5px;
border-top-right-radius: 5px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 1;
color: white;"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" style="color: #FFF">Thêm trường dữ liệu</h4>
      </div>
      <div class="modal-body">
        <p id="titleDatasource">Nguồn dữ liệu: Nghiệp vụ chiến dịch</p>
        <div class="contentDatasource">
        <a class="suggest-field" onclick="getField(this)">Ứng viên</a><a class="suggest-field" onclick="getField(this)">Tuyển dụng viên</a><a class="suggest-field" onclick="getField(this)">Tên</a><a class="suggest-field" onclick="getField(this)">Vị trí tuyển dụng</a><a class="suggest-field" onclick="getField(this)">Prefix</a><a class="suggest-field" onclick="getField(this)">Link phiếu trắc nghiệm</a>
    	</div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="content-CK" hidden="true">
	<?php echo $dataEmail[0]['prebody'] ?>
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
		var setdata = $('.content-CK').html();
	    $('#select_type1').select2({ width: '100%' });
	    $('#select_type2').select2({ width: '100%' });
	    $('#select_type3').select2({ width: '100%' });
	    $('#select_type4').select2({ width: '100%' });
	    $('#select_type5').select2({ width: '100%' });
	    $('#select_type').select2({ width: '100%' });
	    var checkGroup = '<?php echo $group ;?>';
	    if(checkGroup != '0')
	    {
	    	$('#select_type').val(<?php echo $dataEmail[0]['status'] ?>).trigger('change');
	    	$('#select_type1').val(<?php echo $dataEmail[0]['profiletype'] ?>).trigger('change');
	    	$('#select_type2').val(<?php echo $dataEmail[0]['datasource'] ?>).trigger('change');
	    	$('#select_type3').val(<?php echo $dataEmail[0]['prereceiver'] ?>).trigger('change');
	    	$('#select_type4').val(<?php echo $dataEmail[0]['precc'] ?>).trigger('change');
	    	$('#select_type5').val(<?php echo $dataEmail[0]['prebcc'] ?>).trigger('change');
	    }
	    
	    var dateNow = new Date();
	    $('.thoihan').datetimepicker({
	    	timepicker:false,
	    	format:'d/m/Y',
	    });
	    CKEDITOR.replace('prebody',{
	    	allowedContent: true,
	        disableAutoInline: true,
	        toolbarStartupExpanded : false,
	        toolbarCanCollapse: true});
	    	CKEDITOR.instances['prebody'].setData(setdata);
	});
	function selectDatasouce(thiss) {
		var value = thiss.value;
		var textt = $("#select_type2 option:selected").text();
		$('#titleDatasource').text('Nguồn dữ liệu: Nghiệp vụ '+textt);
		if(value == 1)
		{
			$('.contentDatasource').html('<a class="suggest-field" onclick="getField(this)">Ứng viên</a><a class="suggest-field" onclick="getField(this)">Tuyển dụng viên</a><a class="suggest-field" onclick="getField(this)">Tên</a><a class="suggest-field" onclick="getField(this)">Vị trí tuyển dụng</a><a class="suggest-field" onclick="getField(this)">Prefix</a><a class="suggest-field" onclick="getField(this)">Link phiếu trắc nghiệm</a><a class="suggest-field" onclick="getField(this)">Vòng</a>');
		}
		else{
			$('.contentDatasource').html('<a class="suggest-field" onclick="getField(this)">Ứng viên</a><a class="suggest-field" onclick="getField(this)">Tuyển dụng viên</a><a class="suggest-field" onclick="getField(this)">Tên</a><a class="suggest-field" onclick="getField(this)">Vị trí tuyển dụng</a><a class="suggest-field" onclick="getField(this)">Prefix</a><a class="suggest-field" onclick="getField(this)">Link phiếu trắc nghiệm</a>');
		}
	}
	function changeTypeEmail(argument) {
		var value = argument.value;
		var vall = '';
		if(value == 0)
		{
			vall 	= 'Tài khoản đang đăng nhập';
		}
		else{
			vall 	= 'tavicosoft@gmail.com';
		}
		$('#presender').val(vall);
	}
	function rotate(id) {
		for (var i = 1; i <= 9; i++) {
			if(i != id){
				$(".rotate_"+i).removeClass("down"); 
			}
		}
		$(".rotate_"+id).toggleClass("down"); 
	}
	function getField(id) {
		var value = ' <span style="color:#3498db;">['+id.text+']&nbsp;</span> ';
		CKEDITOR.instances['prebody'].insertHtml(value);
		$('#insertUser').modal('toggle');
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
<?php
	function convertDate($value)
	{
		$date=date_create($value);
		echo date_format($date,"d/m/Y");
	}
?>