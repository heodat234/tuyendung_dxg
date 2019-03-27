<div class="row">
	<section class="col-md-6 col-md-offset-3">
		<div class="page_header">
			<div class="logo_as" >
				<img src="<?php echo base_url() ?>public/image/logoheader.png">
				<label >DXG Recruiter</label>
				<div class="pull-right"><i class="fa fa-close"></i></div>
			</div>
			<div>
				<p class="header_title"><?php echo isset($interviewerid)? 'THƯ MỜI THAM DỰ PHỎNG VẤN' :'THƯ MỜI PHỎNG VẤN'  ?></p>
			</div>
		</div>
		<div class="page_header_profile">
			<div class="row" >
				<div class="col-md-3">
					<label>Ứng viên: </label>
				</div>
				<div class="col-md-9 header_pro">
					<?php echo $interview['name'] ?>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-3">
					<label>Vị trí ứng tuyển: </label>
				</div>
				<div class="col-md-9 header_pro">
					<?php echo $interview['position'] ?>
				</div>
			</div>
		</div>
		<div class="body_as">
			<div class="row">
				<div class="desc_as">
					<label>Thời gian/ Địa điểm </label>
					<?php
						$thu = date_format(date_create($interview['intdate']),"N");
						if ($thu != 7) {
							$temp = (int)$thu+1;
							$thu = 'Thứ '.(string)$temp;
						}else{
							$thu = 'Chủ Nhật';
						}
						$ngay =  date_format(date_create($interview['intdate']),"d");
						$thang =  date_format(date_create($interview['intdate']),"m");
						$nam =  date_format(date_create($interview['intdate']),"Y");
						$from =  date_format(date_create($interview['timefrom']),"H:i");
						$to =  date_format(date_create($interview['timeto']),"H:i");
					?>
					<p><?php echo $thu.', '.$ngay.' Tháng '.$thang.' Năm '.$nam ?></p>
					<p><?php echo $from.' → '.$to ?></p>
					<p><?php echo $interview['location'] ?></p>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="desc_as">
					<label>Hướng dẫn</label>
					<p><?php echo isset($interview['notes'])? $interview['notes'] :''  ?></p>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="desc_as">
					<label>Xác nhận thư mời</label>
					<?php if ($status == 'C'){ ?>
						<p>Bạn đã xác nhận thư mời phỏng vấn. Vui lòng đến đúng thời gian phỏng vấn như trên.</p>
					<?php }{ ?>
						<form id="form_confirm">
							<input type="hidden" name="candidateid" value="<?php echo isset($interview['candidateid'])? $interview['candidateid'] :''  ?>">
                            <input type="hidden" name="campaignid" value="<?php echo isset($interview['campaignid'])? $interview['campaignid'] :''  ?>">
							<input type="hidden" name="interviewerid" value="<?php echo isset($interviewerid)? $interviewerid :''  ?>">
							<input type="hidden" name="inv_asmtid" value="<?php echo isset($inv_asmtid)? $inv_asmtid :''  ?>">
							<div class="row margin_bottom_10">
								<div class="col-md-1">
									<input type="radio" class="width_15" name="check" value="1">
								</div>
								<div class="col-md-11">
									<span> Tôi xác nhận sẽ có mặt theo đúng thời gian và địa điểm như trên</span>
								</div>
							</div>
							<div class="row margin_bottom_10">
								<div class="col-md-1">
									<input type="radio" class="width_15" name="check" value="2">
								</div>
								<div class="col-md-11">
									<div class="col-md-12 padding_0 margin_bottom_10">
										<span> Tôi không thể có mặt tại thời gian và địa điểm như trên</span>
									</div>
									<div class="col-md-12 padding_0 margin_bottom_10">
										<span> Thời gian tôi có thể tham dự phỏng vấn:</span>
									</div>
									<div class="col-md-3 padding_0 margin_bottom_10">
										<input type="text" name="intdate" class="datepicker" placeholder="Chọn ngày" style="height: 30px;border: 1px solid #ddd;width: 90%">
									</div>
									<div class="col-md-2 padding_0 margin_bottom_10">
										<input type="text" name="timefrom" class="timepicker" placeholder="Từ giờ" style="width: 100px;">
									</div>
									<div class="col-md-2 padding_0 margin_bottom_10">
										<input type="text" name="timeto" class="timepicker" placeholder="Đến giờ" style="width: 100px;">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1">
									<input type="radio" class="width_15" name="check" value="3">
								</div>
								<div class="col-md-11">
									<span> Tôi sẽ không tham gia phỏng vấn</span>
								</div>
							</div>
						</form>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="footer_as">
			<div>
				<button class="btn btn_start <?php echo ($status == 'C')?'hide' : '' ?>" id="btn_confirm">Xác nhận</button>
			</div>
		</div>
	</section>
</div>
<style type="text/css">
	.margin_bottom_10{
		margin-bottom: 10px;
	}
	.width_15{
		width: 15px;
	}
</style>
<script type="text/javascript">
	$(document).on('click', '.datepicker', function() {
	    $( this ).datetimepicker({
	        timepicker:false,
	        format:'d/m/Y',
	      });
	  });
	  $(document).on('click', '.timepicker', function() {
	    $( this ).datetimepicker({datepicker:false,format:'H:i',});
	  });
	$('#btn_confirm').click(function(event) {
		$.ajax({
			url: '<?php echo base_url() ?>admin/interview/interview_feedback',
			type: 'POST',
			dataType: 'json',
			data: $('#form_confirm').serialize(),
		})
		.done(function(data) {
			if (data == 1) {
				$('#form_confirm').empty().html('<p>Cảm ơn bạn đã phản hồi lịch phỏng vấn</p>');
				$('#btn_confirm').hide();
				// alert('Cảm ơn bạn đã phản hồi lịch phỏng vấn');
			}
		})
		.fail(function() {
			console.log("error");
		});

	});
</script>