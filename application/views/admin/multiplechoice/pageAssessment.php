<div class="row">
	<form id="form_ans"> 
	<input type="hidden" name="asmtid" value="<?php echo($assessment['asmtid'])?>">
	<section class="col-md-6 col-md-offset-3">
		<div class="page_header">
			<div class="logo_as" >
				<img src="<?php echo base_url() ?>public/image/logoheader.png">
				<label >DXG Recruiter</label>
				<div class="pull-right"><i class="fa fa-close"></i></div>
			</div>
			<div>
				<p class="header_title"><?php echo isset($assessment['asmtname'])? mb_strtoupper($assessment['asmtname'],'UTF-8') : 'PHIẾU TRẮC NGHIỆM KIẾN THỨC TỔNG QUÁT' ?></p>
			</div>
		</div>
		<div class="page_header_profile">
			<div class="row" >
				<div class="col-md-3">
					<label>Người thực hiện: </label>
				</div>
				<div class="col-md-9 header_pro">
					<?php echo isset($assessment['can_name'])?$assessment['can_name'] : 'Đỗ Phương Nam' ?>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-3">
					<label>Email: </label>
				</div>
				<div class="col-md-9 header_pro">
					<?php echo isset($assessment['can_email'])?$assessment['can_email'] : 'namdophuong@gmail.com' ?>
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
						<button onclick="huyPhieu(<?php echo isset($assessment['asmtid'])? $assessment['asmtid'] :'' ?>)"><i class="fa fa-trash-o fa-lg"></i></button>
						<button><i class="fa fa-print fa-lg"></i></button>
					</div>
				</div>
			<?php endif ?>
			<div class="row">
				<?php if ($assessment['status'] != 'C'){ ?>
					<div class="desc_as" id="desc_hd">
						<label>Hướng dẫn</label>
						<p><?php echo ($assessment['note'])?></p>
					</div>
				<?php } ?>
			</div>
			<hr>
			<div class="row">
				<?php if ($check =='0'){ ?>
					<div class="desc_as" id="desc_hd">
						<label>Nội dung</label>
						<?php $str = ''; foreach ($genq as $row1){
							$str .= '<div class="title_ques">'.$row1['sectionname'].'('.count($row1['question']).') </div>';
							if ($row1['question']&&count($row1['question'])>0){
								foreach ($row1['question'] as $key) {
									if ($key['questiontype'] == 'text') {
										$str .= '<div class="question_as col-md-12"><p><label>'.$key['questioncontent'].'</label></p><img height="100"'.($key['image']!=null?'src="'.$key['image'].'"':'hidden').'><div class="answer_as">';
										$str .= '<div class="col-md-12"><textarea name="question['.$key['questionid'].'][anstext]" onchange="anstext(this)" style="width:100%;border:1px solid #ddd;" rows="5">'.$key['anstext'].'</textarea></div></div></div>';
									}else{
										$str .= '<div class="question_as col-md-12"><p><label>'.$key['questioncontent'].'</label></p><img height="100"'.($key['image']!=null?'src="'.$key['image'].'"':'hidden').'><div class="answer_as">';
										if ($key['answer']&&count($key['answer'])>0) {
											foreach ($key['answer'] as $ans) {
												if ($key['optionid'] == $ans['optionid']) {
													$str .= '<div class="col-md-6"><label class="radio-inline"><input checked type="radio" '.($key['requirement']=='1'?'required':'').' name="question['.$key['questionid'].'][optionid]" value="'.$ans['optionid'].'">  '.$ans['answercontent'].'<img height="80"'.($ans['image']!=null?'src="'.$ans['image'].'"':'hidden').'></label></div>';
												}else{
													$str .= '<div class="col-md-6"><label class="radio-inline"><input type="radio" '.($key['requirement']=='1'?'required':'').' name="question['.$key['questionid'].'][optionid]" value="'.$ans['optionid'].'">  '.$ans['answercontent'].'<img height="80"'.($ans['image']!=null?'src="'.$ans['image'].'"':'hidden').'></label></div>';
												}
											}
										}
										if ($key['addanswerallow']=='1') {
											$str .= '<div class="col-md-12"><textarea name="question['.$key['questionid'].'][anstext]" onchange="anstext(this)" style="width:100%;border:1px solid #ddd;" rows="3">'.$key['anstext'].'</textarea></div>';
											// $str .= '<div class="col-md-12"><input type="text" name="question['.$key['questionid'].'][anstext]" onchange="anstext(this)" style="width:100%;"></div>';
										}
										$str .= '</div></div>';
									}
								}
							}
							$str .= '</div>';
						}
						echo $str;
						?>
					</div>
				<?php }else{ ?>
					<div class="desc_as">
						<label>Nội dung</label>
						<?php if (isset($assessment['status']) && ($assessment['status'] != 'D' || $assessment['status'] != 'C')){ ?>
							<div class="time_as">
								<p>Thời gian còn lại: <span class="countdown" id="countdown1"><?php echo date('H:i:s',mktime(0,$assessment['timelimit'],0))?></span>
						        
						        <span class="countdown" id="js-countdown">
								      <span class="countdown__timer js-countdown-hours" aria-labelledby="hour-countdown">
								      </span> :
								    
								      <span class="countdown__timer js-countdown-minutes" aria-labelledby="minute-countdown">
								      </span> :
								      
								      <span class="countdown__timer js-countdown-seconds" aria-labelledby="second-countdown">
								      </span>
								      
								</span>
								</p>
							</div>
						<?php } ?>
					</div>
					<?php if ($assessment['status'] == 'D'){ ?>
						<p style="color: red">Phiếu trắc nghiệm nãy đã bị Hủy, vui lòng liên hệ với chúng tôi hoặc kiểm tra email của bạn để nhận được phiếu trắc nghiệm mới nhất.</p>
						<p style="color: red">Xin chân thành cảm ơn </p>
					<?php }elseif ($assessment['status'] == 'C'){ ?>
						<p style="color: red">Bạn đã hoàn thành phiếu này. Chúng tôi sẽ thông báo kết quả tới bạn sớm nhất có thể.</p>
						<p style="color: red">Xin chân thành cảm ơn </p>
					<?php }else{ 
						if ($check == '1') { ?>
							<button type="button" class="btn btn_start" id="btn_start" data-asmtid="<?php echo($assessment['asmtid'])?>" data-asmttemp="<?php echo($assessment['asmttemp'])?>"><i></i> Bắt đầu</button>
						 <?php }else{ ?>
						 	<button type="button" class="btn btn_start" id="btn_start" disabled=""><i></i> Bắt đầu</button>
						<?php } ?>

						<div class="content"></div>
				<?php }} ?>
			</div>
		</div>
		<?php if ($assessment['status'] != 'D'){ ?>
			<div class="footer_as">
				<div>
					<button type="submit" class="btn btn_start hide"><i></i> Kết thúc</button>
				</div>
			</div>
		<?php } ?>
	</section>
	</form>
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
<!-- <?php print_r(getdate(date('H:i:s',mktime(0,$assessment['timelimit'],0))))?> -->
<script type="text/javascript">
	$('#js-countdown').hide();
	function getRemainingTime(endtime) {
	  const milliseconds = Date.parse(new Date(endtime)) - Date.parse(new Date());
	  
	  const seconds = Math.floor( (milliseconds/1000) % 60 );
	  const minutes = Math.floor( (milliseconds/1000/60) % 60 );
	  const hours = Math.floor( (milliseconds/(1000*60*60)) % 24 );
	  const days = Math.floor( milliseconds/(1000*60*60*24) );

	  return {
	    'total': milliseconds,
	    'seconds': seconds,
	    'minutes': minutes,
	    'hours': hours,
	    'days': days,
	  };
	}
	  
	function initClock(id, endtime) {
	  const counter = document.getElementById(id);
	  const hoursItem = counter.querySelector('.js-countdown-hours');
	  const minutesItem = counter.querySelector('.js-countdown-minutes');
	  const secondsItem = counter.querySelector('.js-countdown-seconds');

	  function updateClock() {
	    const time = getRemainingTime(endtime);

	    hoursItem.innerHTML = ('0' + time.hours).slice(-2);
	    minutesItem.innerHTML = ('0' + time.minutes).slice(-2);
	    secondsItem.innerHTML = ('0' + time.seconds).slice(-2);
	    // console.log(time);
	    if (time.total <= 0) {
	      clearInterval(timeinterval);
	      hoursItem.innerHTML = '00';
	      minutesItem.innerHTML = '00';
	      secondsItem.innerHTML = '00';
	      alert("Thời gian làm bài đã hết. Tất cả các câu trả lời của bạn đã được lưu vào hệ thống của Bộ Phận Tuyển Dụng. Xin cảm ơn đã dành thời gian hoàn thành bài Test");
	      $('#form_ans').submit();
			// window.location.href="<?php echo(base_url())?>";
	    }
	  }

	  updateClock();
	  const timeinterval = setInterval(updateClock, 1000);
	}

	// initClock('js-countdown', countdown);


	// localStorage.clear();
	var counter;
	var stt = "<?php echo($assessment['status'])?>";
	var asmt = "<?php echo($assessment['asmtid'])?>";
	var duedate = "<?php echo date('Y-m-d H:i:s',strtotime($assessment['duedate']))?>";
	if(duedate!=''){
		var duedate1 = new Date(duedate);
		var d_now	= new Date();
		if (d_now.getTime()>duedate1.getTime()) {
			alert("Phiếu này đã hết hạn. Vui lòng liên hệ bộ phận tuyển dụng.");
			window.location.href="<?php echo(base_url())?>";
		}
	}
	$(document).ready(function(){
		if (stt=='W') {
			$('#btn_start').trigger('click');
		}
	});


	$('#btn_start').one('click',function(event) {
		var cur  = $(this);
		var icon = cur.find('i');
		icon.addClass('fa fa-spin fa-spinner');

		var asmtid   = $(this).data('asmtid');
		var asmttemp = $(this).data('asmttemp');
		$.ajax({
			url: '<?php echo base_url("admin/multiplechoice/gen_quest")?>',
			type: 'POST',
			dataType: 'json',
			data: {asmttemp:asmttemp,asmtid:asmtid},
		})
		.done(function(e) {
			icon.removeClass();
			var data = e.data;
			// console.log(data);
			if (data) {
				var dom = dom_quest(data);
				cur.next().html(dom);
				// console.log(dom);
				$("button[type=submit]").removeClass('hide');
				$(cur).addClass("hide");

				const countdown = e.time;
				// console.log(countdown);
				initClock('js-countdown', countdown);
				$('#countdown1').hide();
				$('#js-countdown').show();
			}
		})
		.fail(function(error) {
			icon.removeClass();
			console.log(error);
		})
	});

	function huyPhieu(asmtid) {
		$('#asmtid').val(asmtid);
		$('#huyPhieu').modal('show');
	}
	$('#luuHuy').click(function(event) {
		$.ajax({
			url: '<?php echo base_url() ?>admin/campaign/cancelAssessment',
			type: 'POST',
			dataType: 'json',
			data: $('#formHuyPhieu').serialize(),
		})
		.done(function(data) {
			if (data == 1) {
				alert('Bạn đã hủy phiếu thành công');
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

	$('#form_ans').on('submit',function(){
		var button = $(this).find('button[type=submit]');
		button.find('i').addClass('fa fa-spin fa-spinner');

		var form = new FormData($(this)[0]);
		for(let[key,value] of form.entries()){
			//console.log(key+'->'+value);
		}
		$.ajax({
			url: '<?php echo base_url("admin/multiplechoice/save_answer")?>',
			type: 'POST',
			dataType: 'json',
			data: form,
			contentType: false,
          	cache: false,
          	processData:false,
          	timeout: 3000
		})
		.done(function(e) {
			// console.log(e);
			//alert("Tất cả các câu trả lời đã được lưu.");
			$('div.content').addClass('hide');
			$('#desc_hd').addClass('hide');
			$('button#btn_start').remove();
			$('div.time_as').remove();
			$('div.content').before('<p class="colorcyan">Tất cả các câu trả lời của bạn đã được lưu vào hệ thống của Bộ Phận Tuyển Dụng.</p>\
					<p class="colorcyan">Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.</p>\
					<p class="colorcyan">Xin cảm ơn đã dành thời gian hoàn thành bài Test</p>');
			button.addClass('hide');
		})
		.fail(function(error) {
			icon.removeClass();
			console.log(error);
		})
		return false;
	});

	function dom_quest(data){
		// console.log(data);
		var dom = '';
		for (let i in data) {
			var sec = data[i];
			var length_ques = sec['question'].length;
			dom+='\
				<div class="title_ques">'+sec['sectionname']+'('+length_ques+') </div>';
				if (sec['question']&&sec['question'].length>0)
					for(let j in sec['question']){
						var ques = sec['question'][j];
						// console.log(ques);
						if (ques['questiontype'] == 'text') {
							dom+='\
						   	<div class="question_as col-md-12">\
								<p><label>'+ques['questioncontent']+'</label></p>\
								<img height="100"'+(ques['image']!=null?'src="'+ques['image']+'"':'hidden')+'>\
								<div class="answer_as">';
							dom+='\
									<div class="col-md-12">\
										<textarea name="question['+ques['questionid']+'][anstext]" onchange="anstext(this)" placeholder="Nhập đáp án" style="width:100%;border:1px solid #ddd;" rows="5"></textarea>\
									</div>';
							dom+='</div></div>';
						}else{
							dom+='\
						   	<div class="question_as col-md-12">\
								<p><label>'+ques['questioncontent']+'</label></p>\
								<img height="100"'+(ques['image']!=null?'src="'+ques['image']+'"':'hidden')+'>\
								<div class="answer_as">';
								if (ques['answer']&&ques['answer'].length>0)
								for(let k in ques['answer']){
									var ans = ques['answer'][k];
									// console.log(ans);
									dom+='\
									<div class="col-md-6">\
										<span class="checkbox-inline">\
											<input type="radio" '+(ques['requirement']=='1'?'required':'')+' name="question['+ques['questionid']+'][optionid]" value="'+ans.optionid+'"> \
											'+ans.answercontent+'\
											<img height="80"'+(ans['image']!=null?'src="'+ans['image']+'"':'hidden')+'>\
										</span>\
									</div>';
								}
								if (ques['addanswerallow']=='1') {
									dom+='\
									<div class="col-md-12">\
										<textarea name="question['+ques['questionid']+'][anstext]" onchange="anstext(this)" placeholder="Nhập đáp án khác nếu có" style="width:100%;border:1px solid #ddd;" rows="3"></textarea>\
									</div>';
								}
							dom+='</div></div>';
						}
					   	
					}
			dom+='</div>';
		}
		return dom;
	}


	function anstext(e){
		var input = $(e).val();
		if (input) {
			$(e).closest('div.answer_as').find('input[type=radio]').prop('required',false);
		}else if(input==''){
			$(e).closest('div.answer_as').find('input[type=radio]').prop('required',true);
		}
	}
</script>