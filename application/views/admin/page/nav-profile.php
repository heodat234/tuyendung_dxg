 <div style="background-color: white; height: 100vh;overflow: hidden;">
 	
 			<label class="np-header">
 				<span style="color: #5fade0"><a href="<?php echo base_url()?>admin/handling/index/1"><i class="fa fa-angle-left font-16"></i> Quay Lại</a></span>
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
 		<div class="col-md-6">	
 			<label class="demhs"><?php echo count($candidate); ?> Hồ sơ</label>
 		</div>
 		<div class="col-md-6 hovbtn">
 			<button type="button" class="btn-icon-header"><i class="fa fa-print color-ccc" ></i></button>
					<button type="button" class="btn-icon-header margin-r7" ><i class="fa fa-envelope-o color-ccc" ></i></button>
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
 		</div>
 	</div>
 	<form id="form_candidate">	
 		<div class="row rowedit scrollbars">
 				<?php
				 for($i = 0; $i < count($candidate); $i++)
				{
					?>
					<a onclick="loadiframe('<?php echo $candidate[$i]['candidateid']?>')" href="#" class="hov-a-if">
					<div class=" profile dash-horizontal pad-l0 pad-r5 hov-a-if profile_<?php echo $candidate[$i]['candidateid']?>" >

						<table class="margin-t5 margin-b5">
							<tr>
								<td class="td-cot1">
									<input class="checkcandidate" type="checkbox" name="check[]" value="<?php echo $candidate[$i]['candidateid']?>" onclick="checkbox()">
								</td>
								<td class="td-cot2">
									<img src="<?php echo base_url()?>public/image/<?php echo $candidate[$i]['imagelink']?>" class="frameimage" width="70px" height="70px">
									<label class="label-td pad-t3" ><?php echo round($candidate[$i]['rate'])?> điểm</label>
									<label class="label-td pad-t1" >3 chiến dịch</label>
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
									<label class="tuyendung-label2">Tuyển dụng, đào tạo</label>
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

									<span class="highr">#HighR</span>
								</td>
							</tr>
						</table>

					</div>
				</a>
				<?php } ?>
			</div>	
		</form>
</div>
<style type="text/css">
	div.active{
    background: rgba(114,175,210,.1);
  }
</style>
<script type="text/javascript">
	var id_active = <?php echo $id_active; ?>;
	$('.profile_'+id_active).addClass('active');
	function loadiframe(id)
	{
		$('.active').removeClass('active');
		$('.profile_'+id).addClass('active');
		document.getElementById('idf_profile').src = "<?php echo base_url()?>admin/handling/hosochitiet/"+id;
	}
	$(document).ready(function(){
 		$("#checkAll").click(function(){
	 	 if (! $('.checkcandidate').is(':checked')) {
	      	$('.checkcandidate').prop('checked',true);
	      	$('#starbtn').removeAttr('disabled');
	      	$('#blockbtn').removeAttr('disabled');
	 	 } else {
	     	$('.checkcandidate').prop('checked', false);
	     	$('#starbtn').attr('disabled', 'disabled');
	     	$('#blockbtn').attr('disabled', 'disabled');
	 	 }       
		});
		$("#uncheckAll").click(function(){
	 	 if (! $('.checkcandidate').is(':checked')) {
	      	$('.checkcandidate').prop('checked',false);
	      	$('#starbtn').attr('disabled','disabled');
	    	$('#blockbtn').attr('disabled','disabled');  	
	 	 } else {
	     	$('.checkcandidate').prop('checked', true);
	     	$('#starbtn').removeAttr('disabled');
	     	$('#blockbtn').removeAttr('disabled');
	 	 }       
		});
 	});

 	function checkbox() {
		var gallery = document.querySelectorAll('.checkcandidate');
		var count = 0;
		gallery.forEach(function(item) {
			if ($(item).prop('checked')) {
				$('#starbtn').removeAttr('disabled');
				$('#blockbtn').removeAttr('disabled');
				count = 1;
			}
		  
		});
		if(count == 0){
			$('#starbtn').attr('disabled',true);
			$('#blockbtn').attr('disabled',true);
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
</script>
