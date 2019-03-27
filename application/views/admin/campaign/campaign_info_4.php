<div class="row">
	<div class="col-md-12">
    	<div class="box box-default">
            <form id="form_update_4">
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
						             		<option value="W" <?php echo ($campaign['status'] == 'W')? 'selected' :'' ?> >Đang diễn ra</option>
						             		<option value="C" <?php echo ($campaign['status'] == 'C')? 'selected' :'' ?>>Đã kết thúc</option>
						             	</select>
						            </div>
						            <label for="text" class=" col-xs-2 label-profile">Thời hạn</label>
						            <div class="col-xs-3  padding-lr0">
						             	<input type="text" name="expdate" class="textbox thoihan" value="<?php echo isset($campaign['expdate'])? date_format(date_create($campaign['expdate']),"d/m/Y") : ''  ?>"> 
						            </div>
						        </div>
						        <div class="row form_campaign">
						            <label for="text" class=" col-xs-2 label-profile">Vị trí tuyển dụng</label>
						            <div class="col-xs-4  padding-lr0">
						             	<input type="text" name="position" placeholder="Nhập vị trí cần tuyển" class="textbox" required="" value="<?php echo $campaign['position'] ?>">
						            </div>
						            <label for="text" class=" col-xs-2 label-profile">Số lượng</label>
						            <div class="col-xs-3  padding-lr0">
						             	<input type="text" name="quantity" class="textbox" value="<?php echo $campaign['quantity'] ?>"> 
						            </div>
						        </div>
						        <div class="row form_campaign_1">
						        	<label for="text" class=" col-xs-6 label-profile"><input type="checkbox" name="expeffect" value="Y" <?php echo ($campaign['expeffect'] == 'Y') ? 'checked' :'' ?>> Tự động đóng lại khi hết thời hạn</label>
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
				      				<textarea placeholder="Tóm tắt công việc" rows="10" class="textarea_cd" name="body"><?php echo $campaign['body'] ?></textarea>
				      			</div>
				      		</div>
					      	</div>
					    </div>
				  	</div>
				</div>
				<div class="box_btn">
					<div class="pull-right">
						<button type="button" id="btn_update_4" class="btn btn_tt">Lưu</button>
					</div>
				</div>
            </form>
            
        <!-- /.box-body -->
      	</div>
    </div>
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
	$('#btn_update_4').click(function(event) {
		for (instance in CKEDITOR.instances) {
	        CKEDITOR.instances[instance].updateElement();
	    }
		$.ajax({
			url: '<?php echo base_url() ?>admin/campaign/updateRound4',
			type: 'POST',
			dataType: 'json',
			data: new FormData($('#form_update_4')[0]),
		    contentType: false,
		    processData: false
		})
		.done(function(data) {
			if (data == 1) {
				alert('Cập nhật thành công');
				location.reload();
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