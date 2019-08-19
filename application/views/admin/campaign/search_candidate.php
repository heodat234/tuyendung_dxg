<div class="row content_campaign" >
	<section class="col-lg-3 col-md-3 connectedSortable" >
     	<?php
   			 echo isset($nav)? $nav : "";
   		 ?>
	</section>
    <section class="col-lg-9 col-md-9 connectedSortable padding-lr0">
    <div style="background-color: white; min-height: 100vh">
			<div class="row rowedit">
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-8">
							<div class="header-content">
								<span class="color-ccc">Chọn: </span><span class="color-blue"><button id="checkAll" class="btn-none">Tất cả </button></span>|<span class="color-blue"><button id="uncheckAll" class="btn-none"> Bỏ chọn</button></span> &nbsp; &nbsp; &nbsp; &nbsp;   <span class="color-ccc">Sắp xếp:</span><span class="color-blue">
                                        </span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="btn-group header-content">
							  <button type="button" class="btn-none color-blue dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="chonsx"><?php echo isset($checknemu['sort'])? $checknemu['sort'] : "Chọn sắp xếp.." ?></button>
							  <ul class="dropdown-menu">
							    <li><a href="#" onclick="sort_can(1)">Tiềm năng <span class="glyphicon glyphicon-chevron-down"></span></a></li>
							    <li><a href="#" onclick="sort_can(2)">Kinh nghiệm <span class="glyphicon glyphicon-chevron-down"></span></a></li>
							    <li><a href="#" onclick="sort_can(3)">Điểm <span class="glyphicon glyphicon-chevron-down"></span></a></li>
							    <li><a href="#" onclick="sort_can(4)">Tuổi <span class="glyphicon glyphicon-chevron-up"></span></a></li>
							    <li><a href="#" onclick="sort_can(5)">Bằng cấp <span class="glyphicon glyphicon-chevron-down"></span></a></li>
							    <li><a href="#" onclick="sort_can(6)">Ngày cập nhật <span class="glyphicon glyphicon-chevron-down"></span></a></li>
							  </ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 hovbtn">
					<button type="button" class="np-icon btn_chuyen dropdown-toggle" id="btn_transfer"  disabled data-toggle="dropdown">Chuyển</button>
		    		<ul class="dropdown-menu" role="menu">
		                <li><a  onclick="transfer(1,'<?php echo $recflow['transferemail'] ?>', <?php echo $recflow['transfmailtemp'] ?>)">Chuyển vòng</a></li>
		                <!-- <li><a  onclick="transfer(0,'<?php echo $recflow['discardemail'] ?>', <?php echo $recflow['discmailtemp'] ?>)">Loại hồ sơ</a></li> -->
		      		</ul>
					<button type="button" class="btn-icon-header"><i class="fa fa-print color-ccc" ></i></button>
					<button type="button" class="btn-icon-header margin-r7" id="btn_sendMail" onclick="sendMail()" disabled ><i class="fa fa-envelope-o color-ccc" ></i></button>
					<div class="">
						<button type="button" class="btn-icon-header margin-r7" id="starbtn" data-toggle="dropdown" disabled><i class="fa fa-star color-ccc"></i></button>
						<div class="dropdown-menu star-pos">
							<a type="button" onclick="talent(0)" class="btn-none">
							<span class="fa-stack fa-1x" title="Ứng viên không tiềm năng">
							  <i class="fa fa-star color-gray fa-stack-2x star-icon"></i>
							  <span class="fa fa-stack-1x color-white star-text"> </span>
							</span>
							</a>
							<a type="button" onclick="talent(1)" class="btn-none"><span class="fa-stack fa-1x" title="Ứng viên tiềm năng mức 1">
							  <i class="fa fa-star color-orange fa-stack-2x star-icon" ></i>
							  <span class="fa fa-stack-1x color-white star-text">1</span>
							</span></a>
							<a type="button" onclick="talent(2)" class="btn-none"><span class="fa-stack fa-1x" title="Ứng viên tiềm năng mức 2">
							  <i class="fa fa-star color-orange fa-stack-2x star-icon"></i>
							  <span class="fa fa-stack-1x color-white star-text">2</span>
							</span></a>
							<a type="button" onclick="talent(3)" class="btn-none">
								<span class="fa-stack fa-1x" title="Ứng viên tiềm năng mức 3">
							  <i class="fa fa-star color-orange fa-stack-2x star-icon" ></i>
							  <span class="fa fa-stack-1x color-white star-text" >3</span>
							</span></a>
					    </div>
					</div>
					<div class="">
						<button type="button" class="btn-icon-header margin-r7" id="blockbtn" data-toggle="dropdown" disabled> <i class="fa fa-check-circle-o color-ccc"></i>
						</button>
						<div class="dropdown-menu star-pos1">
							<a type="button" onclick="block('')" class="btn-none"><i class="fa fa-check-circle-o color-green size-icon" style="padding-right: 5px"></i></a>
							<a type="button" onclick="block('Y')" class="btn-none"><i class="fa fa-ban color-red size-icon" ></i></a>
					    </div>
					</div>

				</div>
			</div>

			<div class="dash-horizontal"></div>
				<label class="demhs"><?php echo $total_candidate; ?> Hồ sơ</label>
		<form id="form_candidate">
			<input type="hidden" name="campaignid" id="campaignid" value="<?php echo $campaignid ?>">
 			<input type="hidden" name="round" id="roundid" value="<?php echo $roundid ?>">
			<div class="row rowedit pad-t5 candidate-load scroll-full" style="height: 87vh">
				<?php

				 for($i = 0; $i < count($candidate); $i++)
				{
					?>
					<a href="<?php echo base_url()?>admin/campaign/profile/<?php echo $candidate[$i]['candidateid']?>/1/<?php echo $campaignid?>/<?php echo $roundid ?>/<?php echo $type ?>" class="hover-profile ">
					<div class="col-md-6 profile dash-horizontal pad-l0 pad-r5 min-h152 ">

						<table class="margin-t5 margin-b5">
							<tr>
								<td class="td-cot1">
									<input class="checkcandidate" type="checkbox" name="check[]" value="<?php echo $candidate[$i]['candidateid']?>" onclick="checkbox_can1()">
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
									<span class="highr"><?php echo $candidate[$i]['tagsrandom']; ?></span>
								</td>
							</tr>
						</table>

					</div>
				</a>
				<?php } ?>

			</div>
		</form>
			<div class="paginate text-center" style="margin-top: 8px">
				<div class="pagination-page">
					<?php echo isset($phantrang)? $phantrang : '' ?>
				</div>
			</div>
		</div>

	</section>
</div>
<div class="hide" id="list_candidate"><?php echo ($candidate != '')? json_encode($candidate) :'' ?> </div>
<style type="text/css">
	.color-flag-recruite{
		color: #A0BA82;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(){
        $("#checkAll").click(function(){
            $('.checkcandidate').prop('checked',true);
            $('#starbtn').removeAttr('disabled');
            $('#blockbtn').removeAttr('disabled');
            $('#btn_transfer').prop('disabled', false);
            $('#btn_sendMail').prop('disabled', false);

        });
        $("#uncheckAll").click(function(){
            $('.checkcandidate').prop('checked',false);
            $('#starbtn').attr('disabled','disabled');
            $('#blockbtn').attr('disabled','disabled');
            $('#btn_transfer').attr('disabled', 'disabled');
            // $('.btn_nav').attr('disabled', 'disabled');
            $('#btn_sendMail').attr('disabled', 'disabled');

        });
 	});
 	function checkbox_can1() {
		var gallery = document.querySelectorAll('.checkcandidate');
		var count = 0;
		gallery.forEach(function(item) {
			if ($(item).prop('checked')) {
				$('#starbtn').removeAttr('disabled');
				$('#blockbtn').removeAttr('disabled');
				$('#btn_transfer').removeAttr('disabled');
				$('#btn_sendMail').removeAttr('disabled');
				count = 1;
			}

		});
		if(count == 0){
			$('#starbtn').attr('disabled',true);
			$('#blockbtn').attr('disabled',true);
			$('#btn_transfer').attr('disabled', 'disabled');
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

			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}

	function transfer(type, checkmail, mailtemp)
	{
		// var list_candidate = JSON.parse($('#list_candidate').text()) ;
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
			data: $('#form_candidate').serialize(),
		})
		.done(function(data) {
			var option = '';
            var list_candidate = data['candidate'];
            data = data['round'];
            // console.log(data);
			for(var i in data){
				if (data[i]['roundid'] == new_round) {
					option += '<option value="'+data[i]['roundid']+'" selected >'+data[i]['roundname']+'</option>';
				}else{
					option += '<option value="'+data[i]['roundid']+'">'+data[i]['roundname']+'</option>';
				}
			}
			var row = to_mail='';
			for(var j =0;j < list_candidate.length; j++){
					var name = list_candidate[j]['name'];
					var avatar = list_candidate[j]['imagelink'];
					var email 	= list_candidate[j]['email'];
                    var candidateid = (list_candidate[j]['mergewith'] == 0) ? list_candidate[j]['candidateid'] : list_candidate[j]['mergewith'];
					row += '<div class="col-xs-4 candidate_chuyen"><div><img src="<?php echo base_url() ?>public/image/'+avatar+'" class="img_chuyen"></div><label>'+name+'</label></div><input type="hidden" name="id[]" value="'+candidateid+'">';
					if (to_mail == '') {
		            	to_mail += email;
		            }else{
		            	to_mail += ', '+ email;
		            }

			}
			if (type == 1) {
				if (checkmail == 'Y') {
					parent.$('#check_mail1').removeClass('hide');
					parent.$('#inputcheckmail_1').prop('checked',true);
				}
				parent.$('#mailid1').val(mailtemp).change();
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
	function sendMail() {
		parent.$('#email_to').val();
		var form = $('#form_candidate').serializeArray();
		var campaignid = form[0].value;
		var roundid = form[1].value;
		$.ajax({
            url: '<?php echo base_url() ?>admin/handling/getCandidateForMail',
            type: 'POST',
            dataType: 'json',
            data: $('#form_candidate').serialize(),
        })
        .done(function(data) {
            parent.$('#candidateid_mail').val(data.list_candidateid);
            parent.$('#campaignid_mail').val(campaignid);
            parent.$('#roundid_mail').val(roundid);
            parent.$('#email_to').val(data.list_email);
            parent.$('#modalMail').modal('show');
        })
        .fail(function() {
            console.log("error");
        });

	}
</script>