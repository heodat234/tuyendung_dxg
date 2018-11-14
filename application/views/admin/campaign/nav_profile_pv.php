 <div style="background-color: white;">
 	
 			<label class="np-header">
 				
 				<span class="color-ccc">Chọn: </span>
 				<span class="color-blue">Tất cả | Bỏ chọn</span> 
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
 			<button type="button" class="np-icon btn_chuyen dropdown-toggle" data-toggle="dropdown">Chuyển</button>
    		<ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
      		</ul>
 			<button type="button" class="np-icon" ><i class="fa fa-print color-ccc" ></i></button>
 			<button type="button" class="np-icon "><i class="fa fa-envelope-o color-ccc" ></i></button>
 			<button type="button" class="np-icon " ><i class="fa fa-star color-ccc" ></i></button>
 			<button type="button" class="np-icon " > <i class="fa fa-check-circle-o color-ccc" ></i></button>
 		</div>
 	</div>
 		<div class="row rowedit scrollbars">
 				<?php
				 for($i = 0; $i < count($candidate); $i++)
				{
					?>
					<a onclick="loadiframe('<?php echo $candidate[$i]['candidateid']?>')" href="#" class="hov-a-if">
					<div class=" profile dash-horizontal pad-l0 pad-r5 hov-a-if" >

						<table class="margin-t5 margin-b5">
							<tr>
								<td class="td-cot1">
									<input type="checkbox">
								</td>
								<td class="td-cot2">
									<img src="<?php echo base_url()?>public/image/<?php echo $candidate[$i]['imagelink']?>" class="frameimage" width="70px" height="70px">
									
								</td>
								<td class="td-cot3">
									<div class="row" >
										<div class="col-md-7">
											<label class="label-name color-black"><?php echo $candidate[$i]['name'] ?></label>
										</div>
										<div class="col-md-5">
											<span class="webportal">Web portal <i class="fa fa-star color-orange"></i></span>
										</div>
									</div>
									<label class="tuyendung-label1 color-black">Chuyên viên tuyển dụng - VP BANK</label>
									<label class="tuyendung-label2">Vòng 5 - Phỏng vấn V1</label>
									<label class="tuyendung-label3">
										
									</label>
	
									<!-- <span class="highr">#HighR</span> -->
								</td>

							</tr>
							<tr>
								<td></td>
								<td colspan="3">
									<div class="col-sm-6 list_content_pv" ><p><i class="fa fa-phone fa_pv"></i> Điện thoại (1)</p></div>
									<div class="col-sm-6 list_content_pv"><p><i class="fa fa-envelope-o fa_pv"></i> Email (1)</p></div>
								</td>
							</tr>
							<tr>
								<td></td>
								<td colspan="3">
									<div class=" col-sm-6 list_content_pv"><p><i class="fa fa-file-text-o fa_pv"></i> 25/30/30 (Đạt)</p></div>
									<div class=" col-sm-6 list_content_pv"><p><i class="fa fa-calendar fa_pv"></i> V5: Đã phỏng vấn</p></div>
								</td>
							</tr>
							<tr>
								<td></td>
								<td colspan="3">
									<div class=" col-sm-6 list_content_pv"><p><i class="fa fa-calendar fa_pv"></i> V6: Chờ phỏng vấn</p></div>
								</td>
							</tr>
						</table>

					</div>
				</a>
				<?php } ?>
			</div>	
</div>
<script type="text/javascript">
	function loadiframe(id)
	{

		document.getElementById('idf_profile').src = "<?php echo base_url()?>admin/handling/hosochitiet/"+id;
	}
</script>
