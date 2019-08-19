<div class="row">
		<div class="col-md-12">
    	<div class="box box-default">
            <form id="form_update_1">
            	<input type="hidden" name="campaignid" value="<?php echo $campaign['campaignid'] ?>">
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
						             		<option value="W" <?php echo ($campaign['status'] == 'W')? 'selected' :'' ?> >Đang diễn ra</option>
						             		<option value="C" <?php echo ($campaign['status'] == 'C')? 'selected' :'' ?> >Đã kết thúc</option>
						             	</select>
						            </div>
						             <label class="col-xs-3 width20 label-profile"><input type="checkbox" name="expeffect" value="Y" <?php echo ($campaign['expeffect'] == 'Y')? 'checked' :'' ?>> Tự động đóng lại khi hết thời gian</label>
						         </div>
						        <div class="row form_campaign">
						            <label for="text" class=" col-xs-2 label-profile">Vị trí cần tuyển</label>
						            <div class="col-xs-4  padding-lr0">
						             	<input type="text" name="position" value="<?php echo $campaign['position'] ?>" class="textbox" required="">
						            </div>
						            <label for="text" class="col-xs-offset-1  col-xs-2 label-profile">Số lượng</label>
						            <div class="col-xs-2 padding-lr0">
						             	<input type="text" name="quantity" class="textbox" value="<?php echo $campaign['quantity'] ?>" required="">
						            </div>
						        </div>
						        <div class="row form_campaign">
						            <label for="text" class=" col-xs-2 label-profile">Phòng ban</label>
						            <div class="col-xs-4  padding-lr0">
						             	<input type="text" name="department" value="<?php echo $campaign['department'] ?>" class="textbox">
						            </div>
						            <label for="text" class="col-xs-offset-1  col-xs-2 label-profile">Thời hạn</label>
						            <div class="col-xs-2 padding-lr0">
						             	<input type="text" name="expdate" class="textbox thoihan" required="" value="<?php echo date_format(date_create($campaign['expdate']),"d/m/Y"); ?>">
						            </div>
						        </div>
						        <div class="row form_campaign">
						            <label for="text" class=" col-xs-2 label-profile">Địa điểm làm việc</label>
						            <div class="col-xs-4  padding-lr0">
						             	<input type="text" name="location" value="<?php echo $campaign['location'] ?>" class="textbox">
						            </div>
						            <label for="text" class="col-xs-offset-1  col-xs-2 label-profile">Hiển thị</label>
						            <div class="col-xs-2 padding-lr0">
						             	<select class="textbox" name="showtype" required="">
						             		<option value="O" <?php echo ($campaign['showtype'] == 'O')? 'selected' :'' ?> >Công khai</option>
						             		<option value="I" <?php echo ($campaign['showtype'] == 'I')? 'selected' :'' ?> >Nội bộ</option>
						             		<option value="P" <?php echo ($campaign['showtype'] == 'P')? 'selected' :'' ?> >Bảo mật</option>
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
						             	<input type="text" name="reference" value="<?php echo $campaign['reference'] ?>" class="textbox">
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
					      				<textarea placeholder="Tóm tắt công việc" rows="5" class="textarea_cd" name="jobbrief"><?php echo $campaign['jobbrief'] ?></textarea>
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
					      				<textarea placeholder="Trách nhiệm, mục tiêu" rows="5" class="textarea_cd" name="responsibilities"><?php echo $campaign['responsibilities'] ?></textarea>
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
					      				<textarea placeholder="Giám sát, chịu giám sát" rows="5" class="textarea_cd" name="supervised"><?php echo $campaign['supervised'] ?></textarea>
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
					      				<textarea placeholder="Quyền hạn" rows="5" class="textarea_cd" name="jurisdiction"><?php echo $campaign['jurisdiction'] ?></textarea>
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
					      				<textarea placeholder="Môi trường làm việc" rows="5" class="textarea_cd" name="environment"><?php echo $campaign['environment'] ?></textarea>
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
					      				<textarea placeholder="Yêu cầu" rows="5" class="textarea_cd" name="requirements"><?php echo $campaign['requirements'] ?></textarea>
					      			</div>
					      		</div>
					      	</div>
					    </div>
				  	</div>
				</div>
				<div class="box_btn">
					<div class="pull-right">
						<button type="button" class="btn btn_tt" id="btn_update_1">Lưu</button>
					</div>
				</div>
			</form>
      	</div>
    </div>
</div>
<script type="text/javascript">
	$('#btn_update_1').click(function(event) {
		$.ajax({
			url: '<?php echo base_url() ?>admin/campaign/updateRound1',
			type: 'POST',
			dataType: 'json',
			data: new FormData($('#form_update_1')[0]),
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
		});

	});
</script>