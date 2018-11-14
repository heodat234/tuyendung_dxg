
<div >
	<section class="">
		<div class="row">
			<section class="col-lg-5 col-md-5 connectedSortable" style="width: 37% !important">
				<?php echo isset($nav)? $nav : ""; ?>  	
			</section>
			<section class="col-lg-7 col-md-7 connectedSortable" style="width: 63% !important; padding-left: 0px; padding-right: 0px">
				<iframe src="<?php echo base_url()?>admin/campaign/hosochitiet/<?php echo isset($id)? $id : ""; ?>/<?php echo isset($campaignid)? $campaignid : ""; ?>/<?php echo isset($roundid)? $roundid : ""; ?>" id="idf_profile"></iframe>
			</section>
		</div>
	</section>
</div>
<div class="modal fade" id="transferHS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog ">
    <div class="modal-content " >
      	<div class="modal-header modal_header_cam">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
        	<h4 class="modal-title">Xác nhận Chuyển hồ sơ</h4>
      	</div>
      	<form id="formTransfer">
      		<div class=" modal_body_chuyen">
		      	<div class="body_cam col-xs-12 body_chuyen" id="body_chuyen">
		      		
		      	</div>
		      	<div class="col-xs-12 body_chuyen_1">
		      		<div class="col-xs-4">
		      			<label class="label_chon">Chọn vòng cần chuyển</label>
		      		</div>
		      		<div class="col-xs-8">
		      			<select class="selecttext select_chuyen" name="roundid">
		      				<option value="1">Vòng hồ sơ</option>
		      				<option value="2">Vòng Sơ loại</option>
		      				<option value="3">Vòng Tiếp cận</option>
		      				<option value="4">Vòng Bài test</option>
		      				<option value="5">Vòng Phỏng vấn V1</option>
		      				<option value="6">Vòng Phỏng vấn V2</option>
		      				<option value="7">Vòng Đề nghị</option>
		      				<option value="8">Vòng Bài test</option>
		      			</select>
		      		</div>
		      	</div>
		      	<div class="col-xs-12 body_chuyen_2">
		      		<label class="label_chon"><input type="checkbox" name=""> Gửi email thông báo</label>
		      	</div>
		      	<input type="hidden" name="campaignid" id="campaignid" value="">
		      </div>
		      <div class="modal-footer modal_footer_cam">
		      	<label class="share_chuyen"><input type="checkbox" name=""> Không chia sẻ nội dung này</label>
		      	<button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Hủy</button>
		      	<button type="button" class="btn btn_tt btn_tt1" id="saveTransfer" data-dismiss="modal">Lưu</button>
		      </div>
      	</form>
    </div>
  </div>
</div>
<div class="modal fade" id="discardHS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog ">
    <div class="modal-content " >
      	<div class="modal-header modal_header_cam">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
        	<h4 class="modal-title">Xác nhận Loại hồ sơ</h4>
      	</div>
      	<form id="formDiscard">
      		<div class=" modal_body_chuyen">
		      	<div class="body_cam col-xs-12 body_chuyen" id="body_loai">
		      		
		      	</div>
		      	<div class="col-xs-12 body_chuyen_1">
		      		<div class="col-xs-4">
		      			<label class="label_chon">Xác nhận loại hồ sơ</label>
		      		</div>
		      		<div class="col-xs-8">
		      			<select class="selecttext select_chuyen select_loai" >
		      				<option value="1">Vòng hồ sơ</option>
		      				<option value="2">Vòng sơ loại</option>
		      			</select>
		      		</div>
		      	</div>
		      	<div class="col-xs-12 body_chuyen_2">
		      		<label class="label_chon"><input type="checkbox" name=""> Gửi email thông báo</label>
		      	</div>
		      	<input type="hidden" name="campaignid" id="campaignid" value="">
		      	<input type="hidden" name="roundid" id="roundid" value="">
		      </div>
		      <div class="modal-footer modal_footer_cam">
		      	<label class="share_chuyen"><input type="checkbox" name=""> Không chia sẻ nội dung này</label>
		      	<button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Hủy</button>
		      	<button type="button" class="btn btn_tt btn_tt1" id="saveDiscard" data-dismiss="modal">Lưu</button>
		      </div>
      	</form>
    </div>
  </div>
</div>
<style type="text/css">
	.modal_body_chuyen {
		overflow: auto;
	}
	.candidate_chuyen{
		text-align: center;
	}
	.img_chuyen{
		width: 50px;
	}
	.body_chuyen{
		background: #f6f6f6;
		overflow: auto;
		border-bottom: 1px solid #ddd;
	}
	.select_chuyen{
		width: 80%;
		height: 28px;
	}
	.body_chuyen_1{
		padding: 20px;
	}
 	.label_chon{
		font-weight: 300;
	}
	.body_chuyen_2{
		padding: 10px 15px;
		border-top: 1px solid #ddd;
	}
	.share_chuyen{
		float: left;
		font-weight: 300;
	}
</style>
<script type="text/javascript">
	$('#saveTransfer').click(function(event) {
		$.ajax({
			url: '<?php echo base_url()?>admin/campaign/transfer/1',
			type: 'POST',
			dataType: 'json',
			data: $('#formTransfer').serialize(),
		})
		.done(function(data) {
			if (data == 1) {
				parent.location.reload();
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
	$('#saveDiscard').click(function(event) {
		$.ajax({
			url: '<?php echo base_url()?>admin/campaign/transfer/0',
			type: 'POST',
			dataType: 'json',
			data: $('#formDiscard').serialize(),
		})
		.done(function(data) {
			if (data == 1) {
				parent.location.reload();
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
</script>