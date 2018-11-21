<div class="row">
	<section class="col-md-6 col-md-offset-3">
		<div class="page_header">
			<div class="logo_as" >
				<img src="<?php echo base_url() ?>public/image/logoheader.png">
				<label >DXG Recruiter</label>
				<div class="pull-right"><i class="fa fa-close"></i></div>
			</div>
			<div>
				<p class="header_title">PHIẾU TRẮC NGHIỆM KIẾN THỨC TỔNG QUÁT</p>
			</div>
		</div>
		<div class="page_header_profile">
			<div class="row" >
				<div class="col-md-3">
					<label>Người thực hiện: </label>
				</div>
				<div class="col-md-9 header_pro">
					<?php echo isset($assessment['name'])?$assessment['name'] : 'Đỗ Phương Nam' ?>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-3">
					<label>Email: </label>
				</div>
				<div class="col-md-9 header_pro">
					<?php echo isset($assessment['email'])?$assessment['email'] : 'namdophuong@gmail.com' ?>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-3">
					<label>Thời hạn hoàn thành: </label>
				</div>
				<div class="col-md-9 header_pro">
					<?php echo isset($assessment['duedate'])?date_format(date_create($assessment['duedate']),"H:i - d/m/Y") : '20/11/2018' ?>
				</div>
				<input type="hidden" id="duedate" value="<?php echo isset($assessment['duedate'])? date_format(date_create($assessment['duedate']),"F d Y H:i:s") : '20/11/2018' ?>">
			</div>
		</div>
		<div class="body_as">
			<?php if ($check =='0'): ?>
				<div class="row">
					<div class="btn_as">
						<button onclick="huyPhieu(<?php echo isset($assessment['asmtid'])? $assessment['asmtid'] :'0' ?>)"><i class="fa fa-trash-o fa-lg"></i></button>
						<button><i class="fa fa-print fa-lg"></i></button>
					</div>
				</div>
			<?php endif ?>
			<div class="row">
				<div class="desc_as">
					<label>Hướng dẫn</label>
					<p>Ứng viên có 60 phút kể từ lúc bấm nút “Bắt đầu” để trả lời 30 câu hỏi kiến thức tổng quát, khi hết giờ, phần trắc nghiệm sẽ tự kết thúc, để kết thúc phiếu trắc nghiệm của mình trước khi hết giờ, thí sinh có thể bấm nút “Kết thúc”</p>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="desc_as">
					<label>Nội dung</label>
					<?php if (isset($assessment['status']) && $assessment['status'] != 'D'){ ?>
						<div class="time_as">
							<p>Thời gian còn lại: <span class="countdown" data-date="November 11 2018 20:59:00">
					            <span data-hours="">00</span>:<span data-minutes="">00</span>:<span data-seconds="">00</span></span>
					        </p>
						</div>
					<?php } ?>
				</div>
				<?php if ($assessment['status'] == 'D'){ ?>
					<p style="color: red">Phiếu trắc nghiệm nãy đã bị Hủy, vui lòng liên hệ với chúng tôi hoặc kiểm tra email của bạn để nhận được phiếu trắc nghiệm mới nhất.</p>
					<p style="color: red">Xin chân thành cảm ơn </p>
				<?php }else{ 
					if ($check == '1') { ?>
						<button class="btn btn_start" id="start_tn">Bắt đầu</button>
					 <?php }else{ ?>
					 	<button class="btn btn_start" disabled="">Bắt đầu</button>
					<?php } ?>
					<div id="content_tn">
						<div class="title_ques">Câu hỏi kiến thức (10/10)</div>
						<div class="question_as">
							<label>Nhà văn người Anh George Orwell (1903-1950) sáng tác truyện?</label>
							<div class="answer_as">
								<div class="col-md-6">
									<span class="checkbox-inline"><input type="checkbox" name=""> Lord of the Flies (Chúa ruồi)</span>
								</div>
								<div class="col-md-6">
									<span class="checkbox-inline"><input type="checkbox" name=""> Animal Farm (Trại súc vật)</span>
								</div>
								<div class="col-md-6">
									<span class="checkbox-inline"><input type="checkbox" name=""> The Great Gatsby (Gatsby vĩ đại)</span>
								</div>
								<div class="col-md-6">
									<span class="checkbox-inline"><input type="checkbox" name=""> Lord of the Flies (Chúa ruồi)</span>
								</div>
							</div>
						</div>
						<div class="question_as">
							<label>Nhà văn người Anh George Orwell (1903-1950) sáng tác truyện?</label>
							<div class="answer_as">
								<div class="col-md-6">
									<span class="checkbox-inline"><input type="checkbox" name=""> Lord of the Flies (Chúa ruồi)</span>
								</div>
								<div class="col-md-6">
									<span class="checkbox-inline"><input type="checkbox" name=""> Animal Farm (Trại súc vật)</span>
								</div>
								<div class="col-md-6">
									<span class="checkbox-inline"><input type="checkbox" name=""> The Great Gatsby (Gatsby vĩ đại)</span>
								</div>
								<div class="col-md-6">
									<span class="checkbox-inline"><input type="checkbox" name=""> Lord of the Flies (Chúa ruồi)</span>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<?php if ($assessment['status'] != 'D'){ ?>
			<div class="footer_as">
				<div>
					<button class="btn btn_start">Kết thúc</button>
				</div>
			</div>
		<?php } ?>
	</section>
</div>

<div class="modal fade" id="huyPhieu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog ">
    <div class="modal-content " >
        <div class="modal-header modal_header_cam">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Xác nhận Hủy phiếu trắc nghiệm</h4>
        </div>
        <form id="formHuyPhieu">
          <div class=" modal_body_chuyen">
            <p style="color:red;text-align: center;padding: 20px">Bạn chắc chắn muốn hủy phiếu đánh giá trắc nghiệm nghiệm này không?</p>
            <input type="hidden" name="asmtid" id="asmtid" value="">
          </div>
          <div class="modal-footer modal_footer_cam">
            <label class="share_chuyen"><input type="checkbox" name="isshare" value="N"> Không chia sẻ nội dung này</label>
            <button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Không</button>
            <button type="button" class="btn btn_tt btn_tt1" id="luuHuy" data-dismiss="modal">Có</button>
          </div>
        </form>
    </div>
  </div>
</div>

<script type="text/javascript">
	$('#content_tn').hide();
	$('#start_tn').click(function(event) {
		$('#content_tn').show();
		var date = $('#duedate').val();
		$('.countdown').attr('data-date', date).attr('countdown', '');
	});

	function huyPhieu(asmtid) {
		$('#asmtid').val(asmtid);
		$('#huyPhieu').modal('show');
	}
	$('#luuHuy').click(function(event) {
		$.ajax({
			url: '<?php echo base_url() ?>admin/campaign/cancleAssessment',
			type: 'POST',
			dataType: 'json',
			data: $('#formHuyPhieu').serialize(),
		})
		.done(function() {
			alert('Bạn đã hủy phiếu thành công');
			location.href= "<?php echo base_url() ?>admin/campaign/round_1_2/<?php echo isset($assessment['roundid'])? $assessment['roundid'] :'0' ?>/<?php echo isset($assessment['campaignid'])? $assessment['campaignid'] :'0' ?>";
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
</script>