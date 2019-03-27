<div class="row" id="letterOffer">
	<section id="section_offer" class="col-md-6 col-md-offset-3">
		<div class="page_header">
			<div class="logo_as" >
				<img src="<?php echo base_url() ?>public/image/logoheader.png">
				<label >DXG Recruiter</label>
				<!-- <div id="" class="pull-right"><i class="fa fa-close"></i></div> -->
			</div>
			<div>
				<p class="header_title">THƯ MỜI NHẬN VIỆC</p>
			</div>
		</div>
		<div class="page_header_profile">
			<div class="row" >
				<div class="col-xs-4">
					<label class="label_400">Kính gửi Ông/ bà	: </label>
				</div>
				<div class="col-xs-8 header_pro">
					<?php echo $offer['name'] ?>
				</div>
			</div>
			<!-- <div class="row" >
				<div class="col-xs-4">
					<label class="label_400">Vị trí ứng tuyển: </label>
				</div>
				<div class="col-xs-8 header_pro">
					<?php echo $offer['position_campaign'] ?>
				</div>
			</div> -->
			<div class="row" >
				<div class="col-xs-4">
					<label class="label_400">Địa chỉ: </label>
				</div>
				<div class="col-xs-8 header_pro">
					<?php echo $offer['address'] ?>
				</div>
			</div>
			<div class="row" >
				<div class="col-xs-4 ">
					<div class="col-xs-6 padding_0">
						<label class="label_400">Ngày sinh: </label>
					</div>
					<div class="col-xs-6 header_pro">
						<?php echo date_format(date_create($offer['dateofbirth']),"d/m/Y") ?>
					</div>
				</div>
				<div class="col-xs-8 padding_0">
					<div class="col-xs-3">
						<label class="label_400">Nơi sinh: </label>
					</div>
					<div class="col-xs-9 header_pro">
						<?php echo $offer['placeofbirth'] ?>
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-xs-4 padding_0">
					<div class="col-xs-6 ">
						<label class="label_400">CMND số: </label>
					</div>
					<div class="col-xs-6 header_pro">
						<?php echo $offer['idcard'] ?>
					</div>
				</div>
				<div class="col-xs-4">
					<div class="col-xs-6 padding_0">
						<label class="label_400">Ngày cấp: </label>
					</div>
					<div class="col-xs-6 header_pro">
						<?php echo date_format(date_create($offer['dateofissue']),"d/m/Y")  ?>
					</div>
				</div>
				<div class="col-xs-4 padding_0">
					<div class="col-xs-5 padding_0">
						<label class="label_400">Nơi cấp: </label>
					</div>
					<div class="col-xs-7 header_pro">
						<?php echo $offer['placeofissue'] ?>
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-xs-4">
					<label class="label_400">Địện thoại DĐ: </label>
				</div>
				<div class="col-xs-8 header_pro">
					<?php echo trim($offer['telephone'],',') ?>
				</div>
			</div>
		</div>
		<div class="body_as">
			<div class="row" style="margin-bottom: 15px" id="id_profileOffer">
				<?php if ($check == 10):
                    $img = ($offer['filename'] != '')? $offer['filename'] : 'unknow.jpg' ; ?>
					<div class="col-md-8 padding_0 manage_pv ql" id="col_pt_1">
      					<div class="col-md-1 padding_0">
      						<img class="img-pv" src="<?php echo base_url().'public/image/'.$img ?>">
      					</div>
      					<div class="col-md-11 padding_0">
      						<div class="body-blac5a"><?php echo $offer['operatorname'] ?><span style="color: #999999; margin-left: 10px"> Tạo đề nghị - <?php echo date_format(date_create($offer['createddate']),"d/m/Y")  ?></span></div>
      						<?php
      							if ($offer['status'] == 'C' && $offer['optionid'] == '1') {
				      				echo  '<div class="color-sign-in">Trạng thái: Phản hồi - Đồng ý</div>';
			      				}
			      				else if ($offer['status'] == 'C' && $offer['optionid'] == '2') {
				      				echo '<div class="color-trash">Trạng thái: Phản hồi - Không đồng ý - Lý do: '.$offer['anstext'].'</div>';
			      				}
			      				else if ($offer['status'] == 'D') {
				      				echo '<div class="color-sign-in">Trạng thái: Hủy thư mời </div>';
			      				}
			      				else if ($offer['status'] == 'P') {
			      					echo '<div class="color-sign-in">Lưu tạm</div>';
			      				}
			      				else {
				      				echo '<div class="color-sign-in">Trạng thái: Chờ phản hồi</div>';
			      				} ?>
      						<!-- <span class="body-blac5b">Chờ xác nhận</span> -->
      					</div>
      				</div>
					<div class="col-md-3 btn_as">
						<button onclick="huyPhieu()" title="Hủy đề nghị"><i class="fa fa-trash-o fa-lg"></i></button>
						<a class="btn" href="<?php echo base_url().'admin/offer/exportOffer/'.$offer['offerid'] ?>" title="Xuất file word"><i class="fa fa-file-word-o fa-lg"></i></a>
						<button onclick="printOffer()" title="In mẫu"><i class="fa fa-print fa-lg" ></i></button>
					</div>
				<?php endif ?>
			</div>
			<div class="row">
				<?php echo $offer['body'] ?>

			</div>
		</div>
		<?php if ($check != 10){
			if ($offer['status'] == 'C') {
				echo '<div class="body_as"><div class="row"><div class="desc_as"><p class="color-sign-in">Bạn đã xác nhận thư mời.</p></div></div></div>';
			}else if ($offer['status'] == 'D') {
				echo '<div class="body_as"><div class="row"><div class="desc_as"><p class="color-trash">Thư mời đã bị hủy.</p></div></div></div>';
			}else{ ?>
			<div class="body_as">
				<div class="row">
					<div class="desc_as">
						<form id="form_confirm">
							<input type="hidden" name="offerid" value="<?php echo isset($offer['offerid'])? $offer['offerid'] :''  ?>">
							<input type="hidden" name="off_asmtid" value="<?php echo isset($offer['off_asmtid'])? $offer['off_asmtid'] :''  ?>">
							<label>Xác nhận thư mời</label>
							<div class="row margin_bottom_10">
								<div class="col-md-1">
									<input type="checkbox" name="check" value="4">
								</div>
								<div class="col-md-11">
									<span> Tôi đồng ý với đề nghị này và sẽ có mặt nhận việc đúng thời hạn</span>
								</div>
							</div>
							<div class="row margin_bottom_10">
								<div class="col-md-1">
									<input type="checkbox" name="check" value="5">
								</div>
								<div class="col-md-11">
									<div class="col-md-12 padding_0 margin_bottom_10">
										<span> Tôi không đồng ý với đề nghị này</span>
									</div>
									<div class="col-md-12 padding_0 margin_bottom_10">
										<span> Vì lí do :</span>
									</div>
									<div class="col-md-12 padding_0 margin_bottom_10">
										<input type="text" name="note" style="width: 100%">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="footer_as">
				<div>
					<button class="btn btn_start" id="btn_confirm">Xác nhận</button>
				</div>
			</div>
		<?php } }else{ ?>
			<div class="footer_as">
				<div>
					<a href="<?php echo base_url().'admin/campaign/round_1_2/'.$offer['roundid'].'/'.$offer['campaignid'] ?>" class="btn btn_start" style="background: #FAC18F">Đóng</a>
					<button class="btn btn_start" id="btn_Offer" >Tiến hành</button>
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
          <h4 class="modal-title">Xác nhận Hủy phiếu mời nhận việc</h4>
        </div>
        <form id="formHuyPhieu">
          <div class=" modal_body_chuyen">
            <p style="color:red;text-align: center;padding: 20px">Bạn chắc chắn muốn hủy phiếu mời nhận việc này không?</p>
            <input type="hidden" name="asmtid" value="<?php echo isset($offer['off_asmtid'])? $offer['off_asmtid'] :''  ?>">
          </div>
          <div class="modal-footer modal_footer_cam">
            <label class="share_chuyen"><input type="checkbox" name="isshare" value="Y"> Không chia sẻ nội dung này</label>
            <button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Không</button>
            <button type="button" class="btn btn_tt btn_tt1" id="luuHuy" data-dismiss="modal">Có</button>
          </div>
        </form>
    </div>
  </div>
</div>

<style type="text/css">
	.label_400{
		font-weight: 400;
	}
	.margin_bottom_10{
		margin-bottom: 10px;
	}
	.color-sign-in{
		color: #5FA2DD;
	}
	.color-trash{
		color: #E15B6C;
	}
	.btn_as >a {
		width: 35px;
		height: 35px;
		background: #F6F6F6;
		border: #E4E4E4;
	}
</style>
<script type="text/javascript">
	$('#btn_confirm').click(function(event) {
		$.ajax({
			url: '<?php echo base_url() ?>admin/offer/offer_feedback',
			type: 'POST',
			dataType: 'json',
			data: $('#form_confirm').serialize(),
		})
		.done(function(data) {
			if (data == 1) {
				alert('Cảm ơn bạn đã xác nhận thư mời');
				$('#btn_confirm').hide();
			}
		})
		.fail(function() {
			console.log("error");
		});

	});

	function huyPhieu() {
		$('#huyPhieu').modal('show');
	}
	$('#luuHuy').click(function(event) {
		$.ajax({
			url: '<?php echo base_url() ?>admin/offer/cancelOffer',
			type: 'POST',
			dataType: 'json',
			data: $('#formHuyPhieu').serialize(),
		})
		.done(function() {
			alert('Bạn đã hủy phiếu thành công');
			location.href= "<?php echo base_url() ?>admin/campaign/round_1_2/<?php echo isset($offer['roundid'])? $offer['roundid'] :'0' ?>/<?php echo isset($assessment['offer'])? $assessment['offer'] :'0' ?>";
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

	});

	$('#btn_Offer').click(function(event) {
		$('.body_offer').remove();
		var candidateid = '<?php echo $offer['candidateid'] ?>';
		var campaignid 	= '<?php echo $offer['campaignid'] ?>';
		var roundid 	= '<?php echo $offer['roundid'] ?>';
		var row 		= '';
		var email 		= '';
		var k 			= 1;

		var name = '<?php echo $offer['name'] ?>';
		var avatar = '<?php echo ($offer['avatar'] != '')? $offer['avatar'] : 'unknow.jpg' ?>';
		row += '<div class="body_cam col-xs-12 body_chuyen body_offer"><div class="row" style="margin-right: 0px">';
        row += '<div class="col-md-3 box_profile_tn"><div class="profile_tn"><img src="<?php echo base_url() ?>public/image/'+avatar+'"><p class="guide-black">'+name+'</p><input type="hidden" name="profile_'+k+'[]" value="'+candidateid+'"><input type="hidden" name="profile_'+k+'[]" value="'+name+'"></div></div>';
        row += '<div class="col-md-9 border_left_ddd"><div class="row"><div class="col-md-3 "><span>Ngày nhận việc</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90 datetimepicker" name="profile_'+k+'[]" value="<?php echo date_format(date_create($offer['startdate']),"d/m/Y") ?>"></div></div>';
        row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Thời gian thử việc</span></div><div class="col-md-9 padding_0"><div class="col-md-6 padding_0"><input type="text" class="so" name="profile_'+k+'[]" value="<?php echo (int)$offer['duration'] ?>"></div><div class="col-md-6"><input type="text"  name="" value="Tháng" readonly=""></div></div></div>';
        row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Từ ngày</span></div><div class="col-md-9 padding_0"><div class="col-md-4 padding_0"><input type="text" class="datetimepicker" name="profile_'+k+'[]" value="<?php echo date_format(date_create($offer['fromdate']),"d/m/Y") ?>"></div><div class="col-md-2 padding_0"><span>Đến ngày</span></div><div class="col-md-4"><input class="datetimepicker" type="text" name="profile_'+k+'[]" value="<?php echo date_format(date_create($offer['todate']),"d/m/Y") ?>"></div></div></div>';
        row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Địa điểm</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90"  name="profile_'+k+'[]" value="<?php echo $offer['location'] ?>"></div></div>';
        row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Chế độ làm việc</span></div><div class="col-md-9 padding_0"><select class="select2 js-example-basic select_workingtype" name="profile_'+k+'[]" required="" style="width: 90%"><option value="Toàn thời gian">Toàn thời gian</option><option value="Bán thời gian">Bán thời gian</option></select></div></div>';
        row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Người hướng dẫn</span></div><div class="col-md-9 padding_0"><select class="select2 js-example-basic" id="select_trainer"  name="profile_'+k+'[]" required="" style="width: 90%">';
        <?php foreach ($category as $key){
        	if ($key['category'] == 'POSITION') {
        		if ($key['code'] == $offer['trainer']) {?>
        			row += '<option selected value="<?php echo $key['code'] ?>"><?php echo $key['code'].' - '.$key['description'] ?></option>';
        		<?php }else{ ?>
        			row += '<option value="<?php echo $key['code'] ?>"><?php echo $key['code'].' - '.$key['description'] ?></option>';
        <?php }}} ?>
        row += '</select></div></div>';
        row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Báo cáo cho</span></div><div class="col-md-9 padding_0"><select class="select2 js-example-basic" id="select_reportto" name="profile_'+k+'[]" required="" style="width: 90%">';
        <?php foreach ($category as $key){
        	if ($key['category'] == 'POSITION') {
        		if ($key['code'] == $offer['reportto']) {?>
        			row += '<option selected value="<?php echo $key['code'] ?>"><?php echo $key['code'].' - '.$key['description'] ?></option>';
        		<?php }else{ ?>
        			row += '<option value="<?php echo $key['code'] ?>"><?php echo $key['code'].' - '.$key['description'] ?></option>';
        <?php }}} ?>
        row += '</select></div></div>';
        row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Mức lương thử việc</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90 so" name="profile_'+k+'[]" value="<?php echo number_format((int)$offer['tempbenefit']) ?>"></div></div>';
        row += '<div class="row margin_top_15"><div class="col-md-3 " value="0"><span>Mức lương chính thức</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90 so" name="profile_'+k+'[]" value="<?php echo number_format((int)$offer['officialbenefit']) ?>"></div></div>';
        row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Cấp</span></div><div class="col-md-9 padding_0"><select class="select2 js-example-basic" id="select_level" name="profile_'+k+'[]"  required="" style="width: 90%">';
        <?php foreach ($category as $key){
        	if ($key['category'] == 'CAPBAC') {
        		if ($key['code'] == $offer['positionlevel']) {?>
        			row += '<option selected value="<?php echo $key['code'] ?>"><?php echo $key['description'] ?></option>';
        		<?php }else{ ?>
        			row += '<option value="<?php echo $key['code'] ?>"><?php echo $key['description'] ?></option>';
        <?php }}} ?>
        row += '</select></div></div>';
        row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Bậc</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90" name="profile_'+k+'[]" value="<?php echo $offer['grade'] ?>"></div></div>';
        row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Chức vụ</span></div><div class="col-md-9 padding_0"><select class="select2 js-example-basic" id="select_position" name="profile_'+k+'[]" required="" style="width: 90%">';
        <?php foreach ($category as $key){
        	if ($key['category'] == 'POSITION') {
        		if ($key['code'] == $offer['position']) {?>
        			row += '<option selected value="<?php echo $key['code'] ?>"><?php echo $key['description'] ?></option>';
        		<?php }else{ ?>
        			row += '<option value="<?php echo $key['code'] ?>"><?php echo $key['description'] ?></option>';
        <?php }}} ?>
        row += '</select></div></div>';
        row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Phòng ban</span></div><div class="col-md-9 padding_0"><select class="select2 js-example-basic" id="select_department" name="profile_'+k+'[]" required="" style="width: 90%">';
        <?php foreach ($category as $key){
        	if ($key['category'] == 'DEPT') {
        		if ($key['code'] == $offer['department']) {?>
        			row += '<option selected value="<?php echo $key['code'] ?>"><?php echo $key['code'].' - '.$key['description'] ?></option>';
        		<?php }else{ ?>
        			row += '<option value="<?php echo $key['code'] ?>"><?php echo $key['code'].' - '.$key['description'] ?></option>';
        <?php }}} ?>
        row += '</select></div></div>';
        row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Phụ cấp ăn trưa</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90 so" name="profile_'+k+'[]" value="<?php echo number_format((int)$offer['avalue0']) ?>"></div></div>';
        row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Phụ cấp điện thoại</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90 so" name="profile_'+k+'[]" value="<?php echo number_format((int)$offer['avalue1']) ?>"></div></div>';
        row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Hỗ trợ xăng xe</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90 so" name="profile_'+k+'[]" value="<?php echo number_format((int)$offer['avalue2']) ?>"></div></div>';
        row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Đi lại, điện thoại, xăng xe tài xế</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90 so" name="profile_'+k+'[]" value="<?php echo number_format((int)$offer['avalue3']) ?>"></div></div>';
        row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Phụ cấp khác</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90 so" name="profile_'+k+'[]" value="<?php echo number_format((int)$offer['avalue4']) ?>"></div></div></div></div></div>';

      	if (email == '') {
        	email += '<?php echo $offer['email'] ?>';
        }else{
        	email += ', '+'<?php echo $offer['email'] ?>';
        }

        $('#tempid11').val('<?php echo $offer['note'] ?>').change();
        $('#offerid').val('<?php echo $offer['offerid'] ?>');
        $('#off_asmtid').val('<?php echo $offer['off_asmtid'] ?>');
        $('.select_workingtype option[value="<?php echo $offer['workingtype'] ?>"]').prop('selected', true);
        $('#count_candidate_offer').val(k);
		$('#mailid6').val('<?php echo $offer['letteroffermailtemp'] ?>').change();
		$('#profile_offer').prepend(row);
		initializeSelect2($(".select2"));
		$('#mail_to_offer').val(email);
		$('#campaignid_offer').val(campaignid);
		$('#roundid_offer').val(roundid);
		$('#check_offer').val(1);
		loadCategoryOffer();
		$('#createOffer').modal('show');
	});


	function printOffer() {
	    var restorepage = $('#letterOffer').html();
		var printcontent = $('#letterOffer').clone();
		printcontent.find('#id_profileOffer').remove();
		printcontent.find('.footer_as').remove();
		printcontent.find('#section_offer').removeClass('col-md-6').removeClass('col-md-offset-3').addClass('col-md-12');
		$('body').empty().html(printcontent);
		// $('#section_offer').printThis();
		window.print();
		// printJS({ printable: 'section_offer', type: 'html'})
		setTimeout(function () {
			$('body').empty().html(restorepage);
			location.reload();
		}, 300);
	}
	function exportWord($offerid) {
		location.href = '<?php echo base_url() ?>admin/offer/exportOffer/'+$offerid;
	}


</script>