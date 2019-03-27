 <div style="background-color: white;">
	<label class="np-header">
		<!-- <span style="color: #5fade0"><a href=""><i class="fa fa-angle-left font-16"></i> Quay Lại</a></span> -->
		&nbsp; &nbsp; &nbsp;
		<span class="color-ccc">Chọn: </span> 
		<span class="color-blue"><button id="checkAll" class="btn-none">Tất cả </button>|<button id="uncheckAll" class="btn-none"> Bỏ chọn</button></span>
		<div class="floatright"> 
			<span class="color-ccc">Sắp xếp:</span>
			<span class="color-blue"> Tiềm năng <i class="fa fa-angle-right font-16"></i></span>
		</div>
	</label>
 	<div class="margin-t5 dash-horizontal"></div>
 	<div class="row rowedit">
 		<div class="col-md-4">	
 			<button type="button" class="np-icon btn_eye" ><i class="fa fa-eye color-ccc" ></i></button>
 		</div>
 		<div class="col-md-8 hovbtn">
 			<button type="button" class="np-icon btn_chuyen dropdown-toggle" id="btn_transfer" disabled="" data-toggle="dropdown">Chuyển</button>
    		<ul class="dropdown-menu" role="menu">
                <li><a  onclick="transfer(1,'<?php echo $recflow['transferemail'] ?>', <?php echo $recflow['transfmailtemp'] ?>)">Chuyển vòng</a></li>
                <?php if ($recflow['roundtype'] != 'Profile'){ ?>
                	<li><a  onclick="transfer(0,'<?php echo $recflow['discardemail'] ?>', <?php echo $recflow['discmailtemp'] ?>)">Loại hồ sơ</a></li>
                <?php } ?>
      		</ul>
 			<button type="button" class="btn-icon-header margin-r7"><i class="fa fa-print color-ccc" ></i></button>
			<button type="button" class="btn-icon-header margin-r7" id="btn_sendMail" onclick="sendMail()" disabled><i class="fa fa-envelope-o color-ccc" ></i></button>
			<div class=""> 
				<button type="button" class="btn-icon-header margin-r7" id="starbtn" data-toggle="dropdown" disabled><i class="fa fa-star color-ccc"></i></button>
				<div class="dropdown-menu star-pos-pro">
					<a type="button" onclick="talent(0)" class="btn-none">
					<span class="fa-stack fa-1x" title="Ứng viên không tiềm năng">
					  <i class="fa fa-star color-gray fa-stack-2x star-icon1"></i>
					  <span class="fa fa-stack-1x color-white star-text"> </span>
					</span>
					</a>
					<a type="button" onclick="talent(1)" class="btn-none"><span class="fa-stack fa-1x" title="Ứng viên tiềm năng mức 1">
					  <i class="fa fa-star color-orange fa-stack-2x star-icon1" ></i>
					  <span class="fa fa-stack-1x color-white star-text">1</span>
					</span></a>
					<a type="button" onclick="talent(2)" class="btn-none"><span class="fa-stack fa-1x" title="Ứng viên tiềm năng mức 2">
					  <i class="fa fa-star color-orange fa-stack-2x star-icon1"></i>
					  <span class="fa fa-stack-1x color-white star-text">2</span>
					</span></a>
					<a type="button" onclick="talent(3)" class="btn-none">
						<span class="fa-stack fa-1x" title="Ứng viên tiềm năng mức 3">
					  <i class="fa fa-star color-orange fa-stack-2x star-icon1" ></i>
					  <span class="fa fa-stack-1x color-white star-text" >3</span>
					</span></a>
			    </div>
			</div>
			<div class="">
				<button type="button" class="btn-icon-header margin-r7" id="blockbtn" data-toggle="dropdown" disabled> <i class="fa fa-check-circle-o color-ccc"></i>
				</button>
				<div class="dropdown-menu star-pos1-pro">
					<a type="button" onclick="block('')" class="btn-none"><i class="fa fa-check-circle-o color-green size-icon" style="padding-right: 5px"></i></a>
					<a type="button" onclick="block('Y')" class="btn-none"><i class="fa fa-ban color-red size-icon" ></i></a>
			    </div>
			</div>
			<?php if ($recflow['roundtype'] == 'Assessment'){ ?>
				<button type="button" class="btn-icon-header margin-r7 btn_nav" onclick="createMChoice()" disabled=""><i class="fa fa-file-text-o color-ccc" ></i></button>
			<?php }else if ($recflow['roundtype'] == 'Interview') { ?>
				<button type="button" class="btn-icon-header margin-r7 btn_nav" onclick="createAppointment()" disabled=""><i class="fa fa-calendar color-ccc" ></i></button>
			<?php }else if ($recflow['roundtype'] == 'Offer') { ?>
				<button type="button" class="btn-icon-header margin-r7 btn_nav" onclick="createOffer()" disabled="" ><i class="fa fa-handshake-o color-ccc" ></i></button>
			<?php }else if ($recflow['roundtype'] == 'Recruite'){ ?>
				<button type="button" class="btn-icon-header margin-r7 btn_nav" id="btn_recruite" onclick="recruite()" disabled=""><i class="fa fa-flag color-ccc" ></i></button>
			<?php } ?>
 		</div>
 	</div>
 	<form id="form_candidate">	
 		<input type="hidden" name="campaignid" id="campaignid" value="<?php echo $campaignid ?>">
 		<input type="hidden" name="roundid" id="roundid" value="<?php echo $roundid ?>">
 		<div class="row rowedit scrollbars">
			<?php if ($candidate != '') {
			 for($i = 0; $i < count($candidate); $i++){ ?>
				<a onclick="loadiframe('<?php echo $candidate[$i]['candidateid']?>')" href="#" class="hov-a-if">
					<div class=" profile dash-horizontal pad-l0 pad-r5 hov-a-if profile_<?php echo $candidate[$i]['candidateid']?>" >
						<table class="margin-t5 margin-b5">
							<tr>
								<td class="td-cot1">
									<input class="checkcandidate" type="checkbox" name="check[]" value="<?php echo $candidate[$i]['candidateid']?>" onclick="checkbox_can()">
								</td>
								<td class="td-cot2">
									<img src="<?php echo base_url()?>public/image/<?php echo $candidate[$i]['imagelink']?>" class="frameimage" width="70px" height="70px">
									<label class="label-td pad-t3" ><?php echo round($candidate[$i]['rate'])?> điểm</label>
									<label class="label-td pad-t1" ><?php echo $candidate[$i]['count_campaign']?> chiến dịch</label>
									<label class="margin-t-3">
										<i class="fa fa-bell<?php echo ($candidate[$i]['unsubcribe'] == 'Y')? "-slash" : "";?> icon-label pad-l2"></i>
										<i class="fa fa-user icon-label"></i>
										<i class="fa fa-clock-o icon-de"></i>
									</label>
								</td>
								<td class="td-cot3">
									<div class="row width100 margin-l0" >
										<div class="col-md-7 padding-lr0">
											<label class="label-name color-black"><?php echo $candidate[$i]['name'] ?> <?php echo ($candidate[$i]['recruite'] >0)? '<i class="fa fa-flag color-flag-recruite" ></i>' : '' ?></label>
										</div>
										<?php if($candidate[$i]['blocked'] == 'Y') { ?>
										<div class="col-md-3 padding-lr0 " id="ds<?php echo $candidate[$i]['candidateid']?>">
											<?php } else { ?>
										<div class="col-md-4 padding-lr0 " id="ds<?php echo $candidate[$i]['candidateid']?>">
										<?php } ?>	
											<span class="webportal"><?php echo $candidate[$i]['profilesrc'] ?> </span>
										</div>
										<div id="talent<?php echo $candidate[$i]['candidateid']?>" class="col-md-1 padding-lr0 ">
												<?php if($candidate[$i]['istalent'] == 0) {?>
												<span class="fa-stack fa-1x nohover">
												  <i class="fa fa-star color-gray fa-stack-2x nohover size18" ></i>
												  <span class="fa fa-stack-1x color-white nohover size9" ></span>
												</span> 
												<?php } else {?>
												<span class="fa-stack fa-1x nohover">
												  <i class="fa fa-star color-orange fa-stack-2x nohover size18"></i>
												  <span class="fa fa-stack-1x color-white nohover size9"><?php echo $candidate[$i]['istalent'] ?></span>
												</span> 
												<?php } ?>
										</div>
										<div class="col-md-1 padding-lr0 icon-block" id="block<?php echo $candidate[$i]['candidateid']?>">
											<?php if($candidate[$i]['blocked'] == 'Y') { ?>
													<i class="fa fa-ban color-red " ></i>
											<?php } ?>
										</div>
									</div>
									<?php if($candidate[$i]['position'] != '') {?>
									<label class="tuyendung-label1 color-black"><?php echo $candidate[$i]['position']?></label>
									<?php } ?>
									<?php if($candidate[$i]['tags'] != '') {?>
										<label class="tuyendung-label2"><?php echo $candidate[$i]['tags'];?></label>
										<?php } ?>
									<label class="tuyendung-label3">
										<?php echo ($candidate[$i]['gender'] == "M")? "Nam" : "Nữ"?>, <?php echo getAge($candidate[$i]['dateofbirth']);?> tuổi, <?php echo ($candidate[$i]['height'] == 0)? "" : $candidate[$i]['height']."cm, ";?><?php echo ($candidate[$i]['weight'] == 0)? "" : $candidate[$i]['weight']."kg, ";?><?php if($candidate[$i]['yearexperirence'] != null){    
							                  echo ($candidate[$i]['yearexperirence'] == 0)? "kinh nghiệm dưới 1 năm, " : $candidate[$i]['yearexperirence']." năm kinh nghiệm, ";
							              }              
							              ?><?php echo ($candidate[$i]['desirebenefit'] == 0)? "" : number_format($candidate[$i]['desirebenefit'])." VND, "?><?php echo ($candidate[$i]['certificate'] == "")? "" :$candidate[$i]['certificate'].", ";?><?php 
							              	  if($candidate[$i]['countlanguage'] == 0) echo "";
							              	  else if($candidate[$i]['countlanguage'] == 1) echo $candidate[$i]['language'].", ";
							              	  else echo $candidate[$i]['language']."+".($candidate[$i]['countlanguage']-1).", ";
							              	  ?><?php
							              	  if($candidate[$i]['countsoftware'] == 0) echo "";
							              	  else if($candidate[$i]['countsoftware'] == 1) echo $candidate[$i]['software'].", ";
							              	  else echo $candidate[$i]['software']."+".($candidate[$i]['countsoftware']-1).", ";
							                  ?>...
									</label>

									<span class="highr"><?php echo $candidate[$i]['tagsrandom']?></span>
								</td>
							</tr>
						</table>
					</div>
				</a>
			<?php }} ?>
		</div>	
	</form>
</div>
<div class="hide" id="list_candidate"><?php echo ($candidate != '')? json_encode($candidate) :'' ?> </div>
<style type="text/css">
	div.active{
	    background: rgba(114,175,210,.1);
	}
	.color-flag-recruite{
		color: #A0BA82;
	}
</style>
<script type="text/javascript">
	var id_active = <?php echo $id_active; ?>;
	$('.profile_'+id_active).addClass('active');
	function loadiframe(id)
	{
		var campaignid = $('#campaignid').val();
		var roundid = $('#roundid').val();
		$('.active').removeClass('active');
		$('.profile_'+id).addClass('active');
		document.getElementById('idf_profile').src = "<?php echo base_url()?>admin/campaign/hosochitiet/"+id+'/'+campaignid+'/'+roundid;
	}
	$(document).ready(function(){
 		$("#checkAll").click(function(){
	 	 if (! $('.checkcandidate').is(':checked')) {
	      	$('.checkcandidate').prop('checked',true);
	      	$('#starbtn').removeAttr('disabled');
	      	$('#blockbtn').removeAttr('disabled');
	      	$('#btn_transfer').removeAttr('disabled');
	      	$('.btn_nav').removeAttr('disabled');
	      	$('#btn_sendMail').removeAttr('disabled');
	 	 } else {
	     	$('.checkcandidate').prop('checked', false);
	     	$('#starbtn').attr('disabled', 'disabled');
	     	$('#blockbtn').attr('disabled', 'disabled');
	     	$('#btn_transfer').attr('disabled', 'disabled');
	     	$('.btn_nav').attr('disabled', 'disabled');
	     	$('#btn_sendMail').attr('disabled', 'disabled');
	 	 }       
		});
		$("#uncheckAll").click(function(){
	 	 if (! $('.checkcandidate').is(':checked')) {
	      	$('.checkcandidate').prop('checked',false);
	      	$('#starbtn').attr('disabled','disabled');
	    	$('#blockbtn').attr('disabled','disabled');  
	    	$('#btn_transfer').attr('disabled', 'disabled');
	    	$('.btn_nav').attr('disabled', 'disabled');
	    	$('#btn_sendMail').attr('disabled', 'disabled');
	 	 } else {
	     	$('.checkcandidate').prop('checked', true);
	     	$('#starbtn').removeAttr('disabled');
	     	$('#blockbtn').removeAttr('disabled');
	     	$('#btn_transfer').removeAttr('disabled');
	     	$('.btn_nav').removeAttr('disabled');
	     	$('#btn_sendMail').removeAttr('disabled');
	 	 }       
		});
 	});

 	function checkbox_can() {
		var gallery = document.querySelectorAll('.checkcandidate');
		var count = 0;
		gallery.forEach(function(item) {
			if ($(item).prop('checked')) {
				$('#starbtn').removeAttr('disabled');
				$('#blockbtn').removeAttr('disabled');
				$('#btn_transfer').removeAttr('disabled');
				$('.btn_nav').removeAttr('disabled');
				$('#btn_sendMail').removeAttr('disabled');
				count = 1;
			}
		  
		});
		if(count == 0){
			$('#starbtn').attr('disabled',true);
			$('#blockbtn').attr('disabled',true);
			$('#btn_transfer').attr('disabled', 'disabled');
			$('.btn_nav').attr('disabled', 'disabled');
			$('#btn_sendMail').attr('disabled', 'disabled');
		}	
	}

	function talent(obj)
	{
		var id = obj; 
		$.ajax({
			url: '<?php echo base_url()?>admin/handling/talent/'+id,
			type: 'POST',
			dataType: 'JSON',
			data:  $('#form_candidate').serialize(),
		})
		.done(function(data) {
			
			for(var i in data)
			{	
				var t = '';
				$('#talent'+data[i]).empty();
				if(id == 0) {
					t = '<span class="fa-stack fa-1x"> <i class="fa fa-star color-gray fa-stack-2x nohover size18"></i><span class="fa fa-stack-1x color-white size9" ></span></span> ';
				} else {
					t =	'<span class="fa-stack fa-1x"> <i class="fa fa-star color-orange fa-stack-2x nohover size18" ></i><span class="fa fa-stack-1x color-white size9">'+id+'</span></span> ';
				}		
				$('#talent'+data[i]).append(t);	
				if($('#idf_profile').contents().find('#checkoneid').val() == data[i])		
				{
					$('#idf_profile').contents().find('#iconstar_profile').removeClass('color-gray');
					$('#idf_profile').contents().find('#iconstar_profile').removeClass('color-orange');
					var t = '';
					if(id == 0)
					{
						$('#idf_profile').contents().find('#iconstar_profile').addClass('color-gray');
						$('#idf_profile').contents().find('#textstar_profile').text('');	
					} 
					else
					{
						$('#idf_profile').contents().find('#iconstar_profile').addClass('color-orange');
						$('#idf_profile').contents().find('#textstar_profile').text(id);	
					}	
				}		
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}
	function block(obj)
	{
		var id = obj; 
		$.ajax({
			url: '<?php echo base_url()?>admin/handling/block/'+id,
			type: 'POST',
			dataType: 'JSON',
			data:  $('#form_candidate').serialize(),
		})
		.done(function(data) {
			for(var i in data)
			{	
				var t = '';
				$('#block'+data[i]).empty();
				if(id == 'Y') {
					t = '<i class="fa fa-ban color-red " ></i>';
					$('#block'+data[i]).append(t);
					$('#ds'+data[i]).removeClass('col-md-4');
					$('#ds'+data[i]).addClass('col-md-3');	
				} else {
					$('#ds'+data[i]).removeClass('col-md-3');
					$('#ds'+data[i]).addClass('col-md-4');	
				}
				if($('#idf_profile').contents().find('#checkoneid').val() == data[i])		
				{
					$('#idf_profile').contents().find('#checkchange').empty();
					var t = ''; 
					if(id == 'Y')
					{ 
						t ='<i class="fa fa-ban color-red size-icon" ></i>';
					}
					else 
					{
						t = '<i class="fa fa-check-circle-o color-green size-icon"></i> ';	
					}
					$('#idf_profile').contents().find('#checkchange').append(t);
					$('#idf_profile').contents().find('#checkchange').val(id);
				}
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}

	function transfer(type,checkmail, mailtemp)
	{
		var list_candidate = JSON.parse($('#list_candidate').text()) ;
		parent.$('#body_chuyen').empty();
		parent.$('#body_loai').empty();
		var form = $('#form_candidate').serializeArray();
		var campaignid = form[0].value;
		var roundid = form[1].value;
		var new_round = Number(roundid)+1;
		$.ajax({
			url: '<?php echo base_url() ?>admin/campaign/selectRound',
			type: 'POST',
			dataType: 'json',
			data: {campaignid: campaignid},
		})
		.done(function(data) {
			var option = '';
			for(var i in data){
				if(data[i]['roundtype'] == 'Profile'){
					continue;
				}else{
					if (data[i]['roundid'] == new_round) {
						option += '<option value="'+data[i]['roundid']+'" selected >'+data[i]['roundname']+'</option>';
					}else{
						option += '<option value="'+data[i]['roundid']+'">'+data[i]['roundname']+'</option>';
					}
				}
			}
			var row = to_mail = '';
			for (var i = 2; i < form.length; i++) {
				for(var j =0;j < list_candidate.length; j++){
					if (form[i].value == list_candidate[j]['candidateid']) {
						var name = list_candidate[j]['name'];
						var avatar = list_candidate[j]['imagelink'];
						row += '<div class="col-xs-4 candidate_chuyen"><div><img src="<?php echo base_url() ?>public/image/'+avatar+'" class="img_chuyen"></div><label>'+name+'</label></div><input type="hidden" name="id[]" value="'+form[i].value+'">';
						if (to_mail == '') {
			            	to_mail += list_candidate[j]['email'];
			            }else{
			            	to_mail += ', '+list_candidate[j]['email'];
			            }
					}
				}
			}
			if (type == 1) {
				if (checkmail == 'Y') {
					parent.$('#check_mail1').removeClass('hide');
					parent.$('#inputcheckmail_1').prop('checked',true);
				}
				parent.$('#mailid1').val(mailtemp).change();
				// parent.$('#mailid1 option[value="'+mailtemp+'"]').prop('selected', true);
				parent.$('#email_to_tran').val(to_mail);
				parent.$('#email_cc_tran').val('<?php echo $manageround ?>');
				parent.$('#campaignid_tran').val(campaignid);
				parent.$('#roundid_old').val(roundid);
				parent.$('#body_chuyen').append(row);
				parent.$('.select_chuyen').append(option);
				parent.$('.select_chuyen').find('option [value="'+new_round+'"]').attr('selected', true);
				parent.$('#transferHS').modal('show');
			}else{
				if (checkmail == 'Y') {
					parent.$('#check_mail2').removeClass('hide');
					parent.$('#inputcheckmail_2').prop('checked',true);
				}
				parent.$('#mailid2').val(mailtemp).change();
				parent.$('#email_to_dis').val(to_mail);
				parent.$('#email_cc_dis').val('<?php echo $manageround ?>');
				parent.$('#campaignid_dis').val(campaignid);
				parent.$('#body_loai').append(row);
				parent.$('#roundid_dis').val(roundid);
				parent.$('.select_loai').append(option);
				parent.$('.select_loai').find('option [value="'+roundid+'"]').attr('selected', true);
				parent.$('.select_loai').attr('disabled', 'true');
				parent.$('#discardHS').modal('show');
			}
		})
		.fail(function() {
			console.log("error");
		});		
	}

	function recruite() {
		$.ajax({
			url: '<?php echo base_url() ?>admin/campaign/recruite',
			type: 'POST',
			dataType: 'json',
			data: $('#form_candidate').serialize(),
		})
		.done(function(data) {
			$('#btn_recruite').empty().html('<i class="fa fa-flag color-flag-recruite star-icon1"></i>');
			alert('Tuyển dụng ứng viên thành công');
			location.reload();
		})
		.fail(function() {
			console.log("error");
		});
		
	}

	function createMChoice(assessment, mailtemp) {
		var list_candidate = JSON.parse($('#list_candidate').text()) ;
		parent.$('.body_taophieu').remove();
		var form = $('#form_candidate').serializeArray();
		var campaignid = form[0].value;
		var roundid = form[1].value;
		var row ='';
		var email = '';
		var k = 1;
		for (var i = 2; i < form.length; i++) {
			for(var j =0;j < list_candidate.length; j++){
				if (form[i].value == list_candidate[j]['candidateid']) {
					var name = list_candidate[j]['name'];
					var avatar = list_candidate[j]['imagelink'];
					row += '<div class="body_cam col-xs-12 body_chuyen body_taophieu" ><div class="row"><div class="col-md-3 box_profile_tn"><div class="profile_tn"><input type="hidden" name="profile_'+k+'[]" value="'+form[i].value+'">';
		            row += '<img src="<?php echo base_url() ?>public/image/'+avatar+'"><p class="guide-black">'+name+'</p></div></div>';       
		            row += '<div class="col-md-9 border_left_ddd"><div class="rowedit2"><div class="col-xs-3 body-blac4">Mẫu phiếu trắc nghiệm: </div><div class="col-xs-8"><select class="js-example-basic-2 select2" name="profile_'+k+'[]" required="" style="width: 100%">';
		            <?php foreach ($asmt_tn as $key): ?>
		            	if (assessment == <?php echo $key['asmttemp'] ?>) {
		            		row += '<option selected value="<?php echo $key['asmttemp'] ?>"><?php echo $key['asmtname'] ?></option>';
		            	}else{
		            		row += '<option value="<?php echo $key['asmttemp'] ?>"><?php echo $key['asmtname'] ?></option>';
		            	}
		            <?php endforeach ?>
		            row += '</select></div></div>';
		            row += '<div class="rowedit2"><div class="col-xs-3 body-blac4">Thời hạn hoàn thành:</div><div class="col-xs-8"><input class="kttext datepicker" type="text"  name="profile_'+k+'[]" value="<?php echo date_format(date_create(),"d/m/Y H:i")  ?>"></div></div><div class="rowedit3"><div class="col-xs-3 body-blac4">Ghi chú:</div><div class="col-xs-8"><textarea name="profile_'+k+'[]" class="textarea_profile" rows="3" required=""></textarea></div></div></div></div></div>';

		            if (email == '') {
		            	email += list_candidate[j]['email'];
		            }else{
		            	email += ', '+list_candidate[j]['email'];
		            }
		            parent.$('#count_candidate').val(k);
		            k = Number(k)+1;
		        }
		    }
		}

		parent.$('#mailid3').val(mailtemp).change();
		parent.$('#email_to_tn_1').val(email);
		parent.$('#profile_taophieu').prepend(row);
		parent.$('#campaignid_tn').val(campaignid);
		parent.$('#roundid_tn').val(roundid);
		parent.initializeSelect2(parent.$(".select2"));
		parent.$('#createMultiChoice').modal('show');
	}

	function createAppointment(scorecard, mailtemp1, mailtemp2) {
		var list_candidate = JSON.parse($('#list_candidate').text()) ;
		parent.$('.body_taopv').remove();
		var form = $('#form_candidate').serializeArray();
		var campaignid = form[0].value;
		var roundid = form[1].value;
		var row ='';
		var email = '';
		var k = 1;
		for (var i = 2; i < form.length; i++) {
			for(var j =0;j < list_candidate.length; j++){
				if (form[i].value == list_candidate[j]['candidateid']) {
					var name = list_candidate[j]['name'];
					var avatar = list_candidate[j]['imagelink'];
					row += '<div class="body_cam col-xs-12 body_chuyen body_taopv" style="margin-top: 5px">\
								<div class="row">\
									<div class="col-md-3 box_profile_tn">\
										<div class="profile_tn">';
		            row += '<img src="<?php echo base_url() ?>public/image/'+avatar+'">\
		            		<p class="guide-black">'+name+'</p>\
		            		<input type="hidden" name="profile_'+k+'[]" value="'+form[i].value+'">\
		            		<input type="hidden" name="profile_'+k+'[]" value="'+name+'">\
		            	</div>\
		            </div>';
		            row += '<div class="col-md-9 border_left_ddd"><div class="rowedit2"><div class="col-xs-3 body-blac4">Loại hình phỏng vấn:</div>';
		            row += '<div class="col-xs-8"><select class="js-example-basic-2 select2" name="profile_'+k+'[]" required="" id="select_status6" style="width: 100%"><option value="W">Phỏng vấn trực tiếp</option><option value="C">Phỏng vấn gián tiếp</option></select></div></div>';
		            row += '<div class="rowedit2"><div class="col-xs-3 body-blac4">Thời gian:</div><div class="col-xs-3"><input class="kttext width_100 timepicker" type="text" name="profile_'+k+'[]" value="09:00"></div><div class="col-xs-3"><input class="kttext width_100 timepicker" type="text" name="profile_'+k+'[]" value="10:00"></div></div>';          
		            row += '<div class="rowedit2"><div class="col-xs-3 body-blac4">Địa điểm:</div><div class="col-xs-8"><input class="kttext width_100" type="text" name="profile_'+k+'[]" value="2W Ung Văn Khiêm, P.25, Quận Bình Thạnh, Tp. HCM"></div></div>';             
		            row += '<div class="rowedit3"><div class="col-xs-3 body-blac4">Nội dung:</div><div class="col-xs-8"><textarea name="profile_'+k+'[]" class="textarea_profile" rows="3" required=""></textarea></div></div>';              
		            row += '<div class="rowedit3"><div class="col-xs-3 body-blac4">Người phỏng vấn:</div><div class="col-xs-8"><div class="col-xs-6 manage_pv" id="col_add_pt_'+k+'"><div ><img src="<?php echo base_url() ?>public/image/unknow.jpg"><a href="javascript:void(0)" class="add_pt" onclick="insertPV('+k+')"><span>Thêm người phỏng vấn</span></a></div></div></div><input type="hidden" id="managePV_'+k+'" name="profile_'+k+'[]"></div></div>';          
		            //       
		          
		            if (email == '') {
		            	email += list_candidate[j]['email'];
		            }else{
		            	email += ', '+list_candidate[j]['email'];
		            }
		            parent.$('#count_candidate_pv').val(k);
		            k = Number(k)+1;
		        }
		    }
		}
		parent.$('#mailid4').val(mailtemp1).change();
		parent.$('#mailid5').val(mailtemp2).change();
		parent.$('#profile_taopv').append(row);
		parent.$('#email_bcc_pv1').val(email);
		parent.$('#campaignid_pv').val(campaignid);
		parent.$('#roundid_pv').val(roundid);
		parent.initializeSelect2(parent.$(".select2"));

		parent.$('#createAppointment').modal('show');
	}
	function createInterviewer() {
		parent.$('#createInterviewer').modal('show');
	}
	function createOffer(mailtemp) {
		var list_candidate = JSON.parse($('#list_candidate').text()) ;
		parent.$('.body_offer').remove();
		var form = $('#form_candidate').serializeArray();
		var campaignid = form[0].value;
		var roundid = form[1].value;
		var row ='';
		var email = '';
		var k = 1;
		for (var i = 2; i < form.length; i++) {
			for(var j =0;j < list_candidate.length; j++){
				if (form[i].value == list_candidate[j]['candidateid']) {
					var name = list_candidate[j]['name'];
					var avatar = list_candidate[j]['imagelink'];
					row += '<div class="body_cam col-xs-12 body_chuyen body_offer"><div class="row" style="margin-right: 0px">';
		            row += '<div class="col-md-3 box_profile_tn"><div class="profile_tn"><img src="<?php echo base_url() ?>public/image/'+avatar+'"><p class="guide-black">'+name+'</p><input type="hidden" name="profile_'+k+'[]" value="'+form[i].value+'"><input type="hidden" name="profile_'+k+'[]" value="'+name+'"></div></div>';       
		            row += '<div class="col-md-9 border_left_ddd"><div class="row"><div class="col-md-3 "><span>Ngày nhận việc</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90 datetimepicker" name="profile_'+k+'[]" value="<?php echo date_format(date_create(),"d/m/Y") ?>"></div></div>';
		            row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Thời gian thử việc</span></div><div class="col-md-9 padding_0"><div class="col-md-6 padding_0"><input type="text" class="so" name="profile_'+k+'[]" value="2"></div><div class="col-md-6"><input type="text"  name="" value="Tháng" readonly=""></div></div></div>';   
		            row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Từ ngày</span></div><div class="col-md-9 padding_0"><div class="col-md-4 padding_0"><input type="text" class="datetimepicker" name="profile_'+k+'[]" value="<?php echo date_format(date_create(),"d/m/Y") ?>"></div><div class="col-md-2 padding_0"><span>Đến ngày</span></div><div class="col-md-4"><input class="datetimepicker" type="text" name="profile_'+k+'[]" value="<?php echo date_format(date_create(),"d/m/Y") ?>"></div></div></div>';       
		            row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Địa điểm</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90"  name="profile_'+k+'[]" value="2W Ung Văn Khiêm, P.25, Quận Bình Thạnh, Tp. HCM"></div></div>';             
		            row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Chế độ làm việc</span></div><div class="col-md-9 padding_0"><select class="select2" name="profile_'+k+'[]" required="" style="width: 90%"><option value="Toàn thời gian">Toàn thời gian</option><option value="Bán thời gian">Bán thời gian</option></select></div></div>';              
		            row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Người hướng dẫn</span></div><div class="col-md-9 padding_0"><select class="select2 js-example-basic" id="select_trainer" name="profile_'+k+'[]" required="" style="width: 90%">';
		            <?php foreach ($category as $key){
		            	if ($key['category'] == 'POSITION') {?>
		            	row += '<option value="<?php echo $key['code'] ?>"><?php echo $key['code'].' - '.$key['description'] ?></option>';
		            <?php }} ?>
		            row += '</select></div></div>';
		            row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Báo cáo cho</span></div><div class="col-md-9 padding_0"><select class="select2 js-example-basic" id="select_reportto" name="profile_'+k+'[]" required="" style="width: 90%">';
		            <?php foreach ($category as $key){
		            	if ($key['category'] == 'POSITION') {?>
		            	row += '<option value="<?php echo $key['code'] ?>"><?php echo $key['code'].' - '.$key['description'] ?></option>';
		            <?php }} ?>
		            row += '</select></div></div>';
		            row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Mức lương thử việc</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90 so" name="profile_'+k+'[]" value="0"></div></div>';              
		            row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Mức lương chính thức</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90 so" name="profile_'+k+'[]" value="0"></div></div>';
		            row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Cấp</span></div><div class="col-md-9 padding_0"><select class="select2 js-example-basic" id="select_level" name="profile_'+k+'[]" required="" style="width: 90%">';
		            <?php foreach ($category as $key){
		            	if ($key['category'] == 'CAPBAC') {?>
		            	row += '<option value="<?php echo trim($key['code']) ?>"><?php echo $key['description'] ?></option>';
		            <?php }} ?>
		            row += '</select></div></div>';  
		            row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Bậc</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90" name="profile_'+k+'[]" ></div></div>';   
		            row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Chức vụ</span></div><div class="col-md-9 padding_0"><select class="select2 js-example-basic" id="select_position" name="profile_'+k+'[]" required="" style="width: 90%">';
		            <?php foreach ($category as $key){
		            	if ($key['category'] == 'POSITION') {?>
		            	row += '<option value="<?php echo $key['code'] ?>"><?php echo $key['description'] ?></option>';
		            <?php }} ?>
		            row += '</select></div></div>'; 
		            row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Phòng ban</span></div><div class="col-md-9 padding_0"><select class="select2 js-example-basic" id="select_department" name="profile_'+k+'[]" required="" style="width: 90%">';
		            <?php foreach ($category as $key){
		            	if ($key['category'] == 'DEPT') {?>
		            	row += '<option value="<?php echo $key['code'] ?>"><?php echo $key['code'].' - '.$key['description'] ?></option>';
		            <?php }} ?>
		            row += '</select></div></div>';   
		            row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Phụ cấp ăn trưa</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90 so" name="profile_'+k+'[]" value="0"></div></div>';    
		            row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Phụ cấp điện thoại</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90 so" name="profile_'+k+'[]" value="0"></div></div>';  
		            row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Hỗ trợ xăng xe</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90 so" name="profile_'+k+'[]" value="0"></div></div>';   
		            row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Đi lại, điện thoại, xăng xe tài xế</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90 so" name="profile_'+k+'[]" value="0"></div></div>';           
		            row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Phụ cấp khác</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90 so" name="profile_'+k+'[]" value="0"></div></div></div></div></div>';                
		          
		            if (email == '') {
		            	email += list_candidate[j]['email'];
		            }else{
		            	email += ', '+list_candidate[j]['email'];
		            }
		            parent.$('#count_candidate_offer').val(k);
		            k = Number(k)+1;

		        }
		    }
		}
		parent.$('#mailid6').val(mailtemp).change();
		parent.$('#profile_offer').prepend(row);
		parent.$('#mail_to_offer').val(email);
		parent.$('#campaignid_offer').val(campaignid);
		parent.$('#roundid_offer').val(roundid);
		parent.initializeSelect2(parent.$(".select2"));
		parent.loadCategoryOffer();
		parent.$('#createOffer').modal('show');
	}

	function sendMail() {
		var list_candidate = JSON.parse($('#list_candidate').text()) ;
		parent.$('#email_to').val();
		var form = $('#form_candidate').serializeArray();
		var campaignid = form[0].value;
		var roundid = form[1].value;
		var candidateid = '';
		var email = '';
		for (var i = 2; i < form.length; i++) {
			for(var j =0;j < list_candidate.length; j++){
				if (form[i].value == list_candidate[j]['candidateid']) {
		            if (email == '') {
		            	email += list_candidate[j]['email'];
		            }else{
		            	email += ', '+list_candidate[j]['email'];
		            }
		        }
		    }
		    candidateid += form[i]['value']+ ',';
		}
		parent.$('#campaignid_mail').val(campaignid);
		parent.$('#roundid_mail').val(roundid);
		parent.$('#candidateid_mail').val(candidateid);
		parent.$('#email_to').val(email);
		parent.$('#modalMail').modal('show');
	}
</script>
