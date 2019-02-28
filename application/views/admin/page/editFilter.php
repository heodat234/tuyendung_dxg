<input type="hidden" name="filterid" id="filterid1" value="<?php echo $filter[0]['filterid'] ?>">
<div class="content-wrapper">
    <section class="content">
    	<div class="row">
       		<div class="col-md-12">
	        	<div class="box box-default">
		            <div class="panel-group" id="accordion">
		            	<div class="panel panel-default border-rad0">
					    	<div class="panel-heading rad-pad0 b-blue"> 
					       			<!-- <i class="fa fa-angle-right a-tabcs rotate rotate_1 down"></i> -->
					       		<div class="ul-nav">
							       	<label class="tittle-tab" style="font-size: 17px;margin-bottom: 15px">
							       		Chỉnh sửa tiêu chí lọc
							       	</label>
					       		</div>
					    	</div>
						    <!-- <div id="collapse1" class="panel-collapse collapse in"> -->
						      	<div class="panel-body ">
						      		<div class="row form_campaign_1">
						      			<div class="col-xs-2">
						      				<label class="label_cam"> Tên gọi của tiêu chí</label>
						      			</div>
						      			<div class="col-xs-4">
						      				<input type="text" class="textbox" name="filtername" id="name_filter" required value="<?php echo $filter[0]['filtername'] ?>">
						      			</div>
						      		</div>
						      	</div>
						    <!-- </div> -->
					  	</div>
					  	<div class="panel panel-default border-rad0">
					  		<a data-toggle="collapse" data-parent="#accordion" href="#collapse1" onclick="rotate(1)">
						    	<div class="panel-heading rad-pad0 b-blue"> 
						       			<i class="fa fa-angle-right a-tabcs rotate rotate_1 down"></i>
						       		<div class="ul-nav">
								       	<label class="tittle-tab">
								       		Tiêu chí quản lý
								       	</label>
						       		</div>
						    	</div>
						    </a>
						    <div id="collapse1" class="panel-collapse collapse in">
						      	<div class="panel-body ">
						      		<div class="row form_campaign">
						      			<div class="col-xs-4">
						      				<label class="label_cam"><input type="checkbox" onchange="testtiemnang()" id="chk_tiemnang"
						      					<?php $f1 = ''; $f1_1 = ''; 
						      					foreach ($detail as $key) {
						      						if($key['fieldname'] == 'istalent')
						      						{
						      							echo "checked";
						      							$f1 = $key['filterfrom'];
						      							$f1_1 = $key['filterto'];
						      							break;
						      						}
						      					}?>
						      					> Hồ sơ tiềm năng</label>
						      				<input type="text" id="tiemnang_tu" class="input_hs_cam" placeholder="Từ" maxlength="1" onkeyup="testtiemnang()" value="<?php echo $f1 ?>">
						      				<input type="text" id="tiemnang_den" class="input_hs_cam" placeholder="Đến" maxlength="1" onkeyup="testtiemnang()" value="<?php echo $f1_1 ?>">
						      			</div>
						      			<div class="col-xs-4">
						      				<label class="label_cam"><input type="checkbox" onchange="testdiem()" id="chk_diem"
						      					<?php $f1 = ''; $f1_1 = ''; 
						      						foreach ($detail as $key) {
						      						if($key['fieldname'] == 'rate')
						      						{
						      							echo "checked";
						      							$f1 = $key['filterfrom'];
						      							$f1_1 = $key['filterto'];
						      							break;
						      						} }
						      					?>
						      					> Điểm hồ sơ</label>
						      				<input type="text" id="diem_tu" class="input_hs_cam so100" placeholder="Từ" maxlength="3" onkeyup="testdiem()" value="<?php echo $f1 ?>">
						      				<input type="text" id="diem_den" class="input_hs_cam so100" placeholder="Đến" maxlength="3" onkeyup="testdiem()" value="<?php echo $f1_1 ?>">

						      			</div>
						      			<div class="col-xs-4">
						      				<label class="label_cam"><input type="checkbox" id="chk_chan"
						      					<?php foreach ($detail as $key) {
						      						if($key['fieldname'] == 'blocked')
						      						{
						      							echo "checked";
						      							break;
						      						}
						      					}?>
						      					> Hồ sơ bị chặn</label>
						      			</div>
						      		</div>
						      		<div class="row form_campaign_1">
						      			<!-- <div class="col-xs-4">
						      				<label class="label_cam"><input type="checkbox" name=""> Hồ sơ có lịch sử tương tác</label>
						      			</div>
						      			<div class="col-xs-4">
						      				<label class="label_cam"><input type="checkbox" name=""> Hồ sơ có CV đính kèm</label>
						      			</div> -->
						      			<div class="col-xs-4">
						      				<label class="label_cam"><input type="checkbox" onchange="testngay()" id="chk_lastupdate"
						      					<?php $f1 = ''; $f1_1 = ''; 
						      						foreach ($detail as $key) {
						      						if($key['fieldname'] == 'lastupdate')
						      						{
						      							echo "checked";
						      							$f1 = $key['filterfrom'];
						      							$f1_1 = $key['filterto'];
						      							break;
						      						} }
						      					?>
						      					> Ngày cập nhật</label>
						      				<input type="text" id="update_tu" class="input_hs_cam thoigian" placeholder="Từ" maxlength="3" onkeyup="testngay()" value="<?php echo $f1 ?>">
						      				<input type="text" id="update_den" class="input_hs_cam thoigian" placeholder="Đến" maxlength="3" onkeyup="testngay()" value="<?php echo $f1_1 ?>">

						      			</div>
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
								       		Nguồn hồ sơ
								       	</label>
						       		</div>
						    	</div>
						    </a>
						    <div id="collapse2" class="panel-collapse collapse in">
						    	<div class="panel-body ">
						      		<div class="row form_campaign_1">
						      			 <?php  
                                        for($i = 0; $i < count($profilesrc); $i++) {
                                     	?> 
	                                   <div class="col-xs-4">
	                                   		<label class="label_cam"><input type="checkbox" name="" id="<?php echo 'src'.$i?>" value="<?php echo $profilesrc[$i]['profilesrc']?>"  
	                                   			<?php
		                                        foreach ($detail as $key) {
							      					if($key['fieldname'] == 'profilesrc')
							      					{
							      						if($key['filterfrom'] == $profilesrc[$i]['profilesrc'])
							      						{
							      							echo "checked";
							      							break;
							      						}
							      					}
							      				}
		                                        ?>
	                                   			> <?php echo $profilesrc[$i]['profilesrc'] ?>
	                                   		</label> 
	                                   </div>
                                   		<?php } ?>
                                   		<input type="hidden" id="countprofile" value="<?php echo count($profilesrc) ?>">
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
								       		Vị trí
								       	</label>
						       		</div>
						    	</div>
						    </a>
						    <div id="collapse3" class="panel-collapse collapse in">
						      	<div class="panel-body">
						      		<div class="row form_campaign_1">
						      			 <?php  
                                        for($i = 0; $i < count($tag); $i++) {
                                     	?> 
	                                   <div class="col-xs-4">
	                                   		<label class="label_cam"><input type="checkbox" name="" id="<?php echo 'tag'.$i?>" value="<?php echo $tag[$i]['tagid']?>"  
	                                   			<?php
		                                        foreach ($detail as $key) {
							      					if($key['fieldname'] == 'tag')
							      					{
							      						if($key['filterfrom'] == $tag[$i]['tagid'])
							      						{
							      							echo "checked";
							      							break;
							      						}
							      					}
							      				}
		                                        ?>
	                                   			> <?php echo $tag[$i]['title'] ?>
	                                   		</label> 
	                                   </div>
                                   		<?php } ?>
                                   		<input type="hidden" id="counttag" value="<?php echo count($tag) ?>">
						      		</div>
						      	</div>
						    </div>
					  	</div>
					  	<div class="panel panel-default border-rad0">
					  		<a data-toggle="collapse" data-parent="#accordion" href="#collapse3" onclick="rotate(4)">
						    	<div class="panel-heading rad-pad0 b-blue"> 
						       		<i class="fa fa-angle-right a-tabcs rotate rotate_3 down"></i>
						       		<div class="ul-nav">
								       	<label class="tittle-tab">
								       		Thu nhập
								       	</label>
						       		</div>
						    	</div>
						    </a>
						    <div id="collapse3" class="panel-collapse collapse in">
						      	<div class="panel-body">
						      		<div class="row form_campaign_1">
						      			<!-- <div class="col-xs-4">
						      				<label class="label_cam"><input type="checkbox" name=""> Vị trí cần tuyển</label>
						      			</div> -->
						      			<div class="col-xs-4">
						      				<label class="label_cam"><input type="checkbox" onchange="test_tnht()" id="chk_thunhapht"
						      					<?php $f2 = '';  $f2_1 = '';
						      					foreach ($detail as $key) {
					      						if($key['fieldname'] == 'currentbenefit')
					      						{
					      							echo "checked";
					      							$f2 = $key['filterfrom'];
					      							$f2_1 = $key['filterto'];
					      							break;
					      						} }
						      					?>
						      					> T.nhập hiện tại</label>
						      				<input type="text" id="tn_httu" class="input_hs_cam so" placeholder="Từ" onkeyup="test_tnht()" value="<?php echo $f2 ?>">
						      				<input type="text" id="tn_htden" class="input_hs_cam so" placeholder="Đến" onkeyup="test_tnht()" value="<?php echo $f2_1 ?>">
						      			</div>
						      			<div class="col-xs-4">
						      				<label class="label_cam"><input type="checkbox" onchange="test_tnmm()" id="chk_thunhapmm"
					      					<?php  $f3 = '';  $f3_1 = '';
 					      						foreach ($detail as $key) {
					      						if($key['fieldname'] == 'disirebenefit')
					      						{
					      							echo "checked";
					      							$f3 = $key['filterfrom'];
					      							$f3_1 = $key['filterto'];
					      							break;
					      						}
					      					}
					      					?>
					      					> TN mong muốn</label>
						      				<input type="text" id="tn_mmtu" class="input_hs_cam so" placeholder="Từ" onkeyup="test_tnmm()" value="<?php echo $f3 ?>">
						      				<input type="text" id="tn_mmden" class="input_hs_cam so" placeholder="Đến" onkeyup="test_tnmm()" value="<?php echo $f3_1 ?>">
						      			</div>
						      		</div>
						      		<!-- <div class="row form_campaign_1">
						      			<div class="col-xs-4">
						      				<label class="label_cam label_cam_1"><input type="checkbox" name=""> 
						      					<input type="text" name="" placeholder="Nhập vị trí ứng tuyển/ phù hợp cần lọc" class="input_hs_cam_70">
						      				</label>
						      			</div>
						      		</div> -->
						      	</div>
						    </div>
					  	</div>

					  	<div class="panel panel-default border-rad0">
					  		<a data-toggle="collapse" data-parent="#accordion" href="#collapse4" onclick="rotate(5)">
						    	<div class="panel-heading rad-pad0 b-blue"> 
						       		<i class="fa fa-angle-right a-tabcs rotate rotate_4 down"></i>
						       		<div class="ul-nav">
								       	<label class="tittle-tab">
								       		Kinh nghiệm
								       	</label>
						       		</div>
						    	</div>
						    </a>
						    <div id="collapse4" class="panel-collapse collapse in">
						    	<div class="panel-body">
						      		<div class="row form_campaign">
						      			<div class="col-xs-4">
						      				<label class="label_cam"><input type="checkbox" id="chk_chuacokm" onchange="test_km(this)" value="C"
						      				<?php foreach ($detail as $key) {
						      						if($key['fieldname'] == 'experience')
						      						{
						      							if($key['filterfrom'] == 'C')
						      							{
						      								echo "checked";
						      							}
						      							break;
						      						}
						      					}?>	
						      					> Chưa có kinh nghiệm</label>
						      			</div>
						      			<div class="col-xs-4">
						      				<label class="label_cam"><input type="checkbox" id="chk_cokm" onchange="test_km(this)" value="D"
						      				<?php 	$f4 = ''; $f4_1 = '';   
						      					foreach ($detail as $key) {
						      						if($key['fieldname'] == 'experience' && $key['filterfrom'] != 'C')
						      						{
						      							
						      								echo "checked"; 
						      								$f4 = $key['filterfrom'];
						      								$f4_1 = $key['filterto'];
						      								break;
					      							} }
					      					?>	
						      					> Có kinh nghiệm</label>
						      					<input type="text" id="kinhnghiem_tu" maxlength="2" class="input_hs_cam" onkeyup="test_km(this)" placeholder="Từ" value="<?php echo $f4 ?>">
								      			<input type="text" id="kinhnghiem_den" maxlength="2" class="input_hs_cam" onkeyup="test_km(this)" placeholder="Đến" value="<?php echo $f4_1?>">
						      			</div>
						      		</div>
						      		<!-- <div class="row form_campaign_1">
						      			<div class="col-xs-4">
						      				<label class="label_cam label_cam_1"><input type="checkbox" name=""> 
						      					<input type="text" name="" placeholder="Nhập bằng cấp cần lọc" class="input_hs_cam_70">
						      				</label>
						      			</div>
						      		</div> -->
						      	</div>
						    </div>
					  	</div>

					  	<div class="panel panel-default border-rad0">
					  		<a data-toggle="collapse" data-parent="#accordion" href="#collapse5" onclick="rotate(6)">
						    	<div class="panel-heading rad-pad0 b-blue"> 
						       		<i class="fa fa-angle-right a-tabcs rotate rotate_4 down"></i>
						       		<div class="ul-nav">
								       	<label class="tittle-tab">
								       		Học vấn
								       	</label>
						       		</div>
						    	</div>
						    </a>
						    <div id="collapse5" class="panel-collapse collapse in">
						    	<div class="panel-body">
						      		<div class="row form_campaign">
						      			<div class="col-xs-4">
						      				<label class="label_cam"><input type="checkbox" id="chk_hs_co_tthv" onchange="hocvan(this)" value="1"
						      				<?php foreach ($detail as $key) {
						      						if($key['fieldname'] == 'knowledge')
						      						{
						      							if($key['filterfrom'] == '1')
						      							{
						      								echo "checked";
						      							}
						      							break;
						      						}
						      					}?>	
						      					> Hồ sơ có thông tin học vấn</label>
						      			</div>
						      		</div>
						      		<div class="row form_campaign">
						      			<?php  
	                                    for($i = 0; $i < count($hocvan); $i++) {
	                                     ?> 
	                                   <div class="col-xs-4">
	                                   		<label class="label_cam"><input type="checkbox" name="" id="<?php echo 'hv'.$i?>" onchange="hocvan(this)" value="<?php echo $hocvan[$i]['certificate']?>"  
	                                   			<?php
		                                        foreach ($detail as $key) {
							      					if($key['fieldname'] == 'knowledge')
							      					{
							      						if($key['filterfrom'] == $hocvan[$i]['certificate'])
							      						{
							      							echo "checked";
							      							break;
							      						}
							      					}
							      				}
		                                        ?>
	                                   			> <?php echo $hocvan[$i]['certificate'] ?>
	                                   		</label> 
	                                   </div>
	                                   <?php } ?>
							      		<input type="hidden" id="counthocvan" value="<?php echo count($hocvan) ?>">
						      		</div>
						      		<!-- <div class="row form_campaign_1">
						      			<div class="col-xs-4">
						      				<label class="label_cam label_cam_1"><input type="checkbox" name=""> 
						      					<input type="text" name="" placeholder="Nhập bằng cấp cần lọc" class="input_hs_cam_70">
						      				</label>
						      			</div>
						      		</div> -->
						      	</div>
						    </div>
					  	</div>

					  	<div class="panel panel-default border-rad0">
					  		<a data-toggle="collapse" data-parent="#accordion" href="#collapse6" onclick="rotate(7)">
						    	<div class="panel-heading rad-pad0 b-blue"> 
						       		<i class="fa fa-angle-right a-tabcs rotate rotate_5 down "></i>
						       		<div class="ul-nav">
								       	<label class="tittle-tab">
								       		Ngoại ngữ
								       	</label>
						       		</div>
						    	</div>
						    </a>
						    <div id="collapse6" class="panel-collapse collapse in">
						      	<div class="panel-body">
						      		<div class="row form_campaign">
						      			<div class="col-xs-4">
						      				<label class="label_cam"><input type="checkbox" id="chk_hs_co_ttnn" onchange="ngoaingu(this)" value="1"
						      					<?php foreach ($detail as $key) {
						      						if($key['fieldname'] == 'language' && $key['filterfrom'] == '1')
						      						{
						      							echo "checked";
						      							break;
						      						}
						      					}?>	
						      					> Hồ sơ có thông tin Ngoại ngữ</label>
						      			</div>
						      		</div>
						      		<div class="row form_campaign">
						      			<?php  
	                                    for($i = 0; $i < count($ngoaingu); $i++) {
	                                     ?> 
	                                   <div class="col-xs-4">
	                                   		<label class="label_cam"><input type="checkbox" name="" id="<?php echo 'nn'.$i?>" onchange="ngoaingu(this)" value="<?php echo $ngoaingu[$i]['language']?>"  
	                                   			<?php
		                                        foreach ($detail as $key) {
							      					if($key['fieldname'] == 'language')
							      					{
							      						if($key['filterfrom'] == $ngoaingu[$i]['language'])
							      						{
							      							echo "checked";
							      							break;
							      						}
							      					}
							      				}
		                                        ?>
	                                   			> <?php echo $ngoaingu[$i]['language'] ?>
	                                   		</label> 
	                                   </div>
	                                   <?php } ?>
							      		 <input type="hidden" id="countngoaingu" value="<?php echo count($ngoaingu) ?>">	
						      		</div>
						      		<!-- <div class="row form_campaign_1">
						      			<div class="col-xs-4">
						      				<label class="label_cam label_cam_1"><input type="checkbox" name=""> 
						      					<input type="text" name="" placeholder="Nhập ngoại ngữ cần lọc" class="input_hs_cam_70">
						      				</label>
						      			</div>
						      		</div> -->
						      	</div>
						    </div>
					  	</div>

					  	<div class="panel panel-default border-rad0">
					  		<a data-toggle="collapse" data-parent="#accordion" href="#collapse7" onclick="rotate(8)">
						    	<div class="panel-heading rad-pad0 b-blue"> 
						       		<i class="fa fa-angle-right a-tabcs rotate rotate_6  down"></i>
						       		<div class="ul-nav">
								       	<label class="tittle-tab">
								       		Tin học
								       	</label>
						       		</div>
						    	</div>
						    </a>
						    <div id="collapse7" class="panel-collapse collapse in ">
						      	<div class="panel-body">
						      		<div class="row form_campaign">
						      			<div class="col-xs-4">
						      				<label class="label_cam"><input type="checkbox" id="chk_hs_co_ttth" onchange="tinhoc(this)" value="1"
						      					<?php foreach ($detail as $key) {
						      						if($key['fieldname'] == 'software' && $key['filterfrom'] == '1')
						      						{					      							
						      							echo "checked";
						      							break;
						      						}
						      					}?>	> Hồ sơ có thông tin Tin học</label>
						      			</div>
						      			<!-- <div class="col-xs-4">
						      				<label class="label_cam"><input type="checkbox" name=""> MS Office</label>
						      			</div>
						      			<div class="col-xs-4">
						      				<label class="label_cam"><input type="checkbox" name=""> Excel</label>
						      			</div> -->
						      		</div>
						      		<div class="row form_campaign_1">
						      			<!-- <div class="col-xs-4">
						      				<label class="label_cam label_cam_1"><input type="checkbox" name=""> 
						      					<input type="text" name="" placeholder="Nhập phần mềm cần lọc" class="input_hs_cam_70">
						      				</label>
						      			</div> -->
						      			<?php  
		                                    for($i = 0; $i < count($tinhoc); $i++) {
		                                     ?> 
		                                   <div class="col-xs-4">
		                                   		<label class="label_cam"><input type="checkbox" name="" id="<?php echo 'th'.$i?>" onchange="tinhoc(this)" value="<?php echo $tinhoc[$i]['software']?>"  
		                                   			<?php
			                                        foreach ($detail as $key) {
								      					if($key['fieldname'] == 'software')
								      					{
								      						if($key['filterfrom'] == $tinhoc[$i]['software'])
								      						{
								      							echo "checked";
								      							break;
								      						}
								      					}
								      				}
			                                        ?>
		                                   			> <?php echo $tinhoc[$i]['software'] ?>
		                                   		</label> 
		                                   </div>
	                                   <?php } ?>
	                                    <input type="hidden" id="counttinhoc" value="<?php echo count($tinhoc) ?>">
						      		</div>
						      	</div>
						    </div>
					  	</div>

					  	<div class="panel panel-default border-rad0">
					  		<a data-toggle="collapse" data-parent="#accordion" href="#collapse8" onclick="rotate(9)">
						    	<div class="panel-heading rad-pad0 b-blue"> 
						       		<i class="fa fa-angle-right a-tabcs rotate rotate_7 down"></i>
						       		<div class="ul-nav">
								       	<label class="tittle-tab">
								       		Cá nhân
								       	</label>
						       		</div>
						    	</div>
						    </a>
						    <div id="collapse8" class="panel-collapse collapse in">
						      	<div class="panel-body">
						      		<div class="row form_campaign">
						      			<div class="col-xs-4">
						      				<label class="label_cam"><input type="checkbox" id="chk_nam" onchange="gioitinh(this)" value="M"
						      					<?php foreach ($detail as $key) {
						      						if($key['fieldname'] == 'gender' && $key['filterfrom'] == 'M')
						      						{
						      							echo "checked";
						      							break;
						      						}
						      					}?>
						      					> Nam</label>
						      			</div>
						      			<div class="col-xs-4">
						      				<label class="label_cam"><input type="checkbox" id="chk_nu" onchange="gioitinh(this)" value="F"
						      					<?php foreach ($detail as $key) {
						      						if($key['fieldname'] == 'gender' && $key['filterfrom'] == 'F')
						      						{
						      							echo "checked";
						      							break;
						      						}
						      					}?>
						      					> Nữ</label>
						      			</div>
						      			<!-- <div class="col-xs-4">
						      				<label class="label_cam"><input type="checkbox" name=""> Giới tính khác</label>
						      			</div> -->
						      		</div>
						      		<div class="row form_campaign">
						      			<div class="col-xs-4">
						      				<label class="label_cam"><input type="checkbox" onchange="test_tuoi()" id="chk_tuoi"
						      					<?php $f5 = '';  $f5_1 = '';   
						      						foreach ($detail as $key) {
						      						if($key['fieldname'] == 'age')
						      						{
						      							echo "checked";
						      							$f5 = $key['filterfrom'];
						      							$f5_1 = $key['filterto'];
						      							break;
						      						}
						      					}
						      					?>
							      				> Độ tuổi</label>
							      				<input type="text" id="tuoi-tu" class="input_hs_cam" placeholder="Từ" maxlength="2" onkeyup="test_tuoi()" value="<?php echo $f5?>">
							      				<input type="text" id="tuoi-den" class="input_hs_cam" placeholder="Đến" maxlength="2" onkeyup="test_tuoi()" value="<?php echo $f5_1?>">
						      			</div>
						      			<div class="col-xs-4">
						      				<label class="label_cam"><input type="checkbox" name="" id="chk_chieucao" onchange="test_chieucao()"
						      					<?php $f6 = '';  $f6_1 = '';
						      						foreach ($detail as $key) {
						      						if($key['fieldname'] == 'height')
						      						{
						      							echo "checked";
						      							$f6 = $key['filterfrom']; 
						      							$f6_1 = $key['filterto'];
						      							break;
						      						}
						      					}
						      					?>	
							      				> Chiều cao</label>
							      				<input type="text" name="" class="input_hs_cam" placeholder="Từ" id="caotu" maxlength="3" onkeyup="test_chieucao()" value="<?php echo $f6?>">
							      				<input type="text" name="" class="input_hs_cam" placeholder="Đến" id="caoden" maxlength="3" onkeyup="test_chieucao()" value="<?php echo $f6_1 ?>">	
						      			</div>
						      			<div class="col-xs-4">
						      				<label class="label_cam"><input type="checkbox" id="chk_cannang" onchange="test_cannang()"
						      					<?php $f7 = '';  $f7_1 = '';
						      						foreach ($detail as $key) {
						      						if($key['fieldname'] == 'weight')
						      						{
						      							echo "checked";
						      							$f7 = $key['filterfrom']; 
						      							$f7 = $key['filterto']; 
						      							break;
						      						}
						      					}
						      					?>	
						      					> Cân nặng</label>
							      				<input type="text" id="nangtu" class="input_hs_cam" placeholder="Từ" maxlength="3" onkeyup="test_cannang()" value="<?php echo $f7 ?>">
							      				<input type="text" id="nangden" class="input_hs_cam" placeholder="Đến" maxlength="3" onkeyup="test_cannang()" value="<?php echo $f7_1 ?>">
						      			</div>
						      		</div>
						      		<div class="row form_campaign">
						      			<div class="col-xs-4">
						      				<label class="label_cam label_cam_1"><input type="checkbox" id="chk_noisinh" onchange="test_noisinh()"
						      					<?php $ftam = ''; 
						      						foreach ($detail as $key) {
						      						if($key['fieldname'] == 'placeofbirth')
						      						{
						      							echo "checked"; 
						      							$ftam = $key['filterfrom']; 
						      							break;
						      						} } ?> 
						      				> Nơi Sinh</label>
					      					 <select class="input_hs_cam_70 js-example-basic-single" id="noisinh-ad" onchange="test_noisinh()">
				                                 <option value="0"  >Chọn tỉnh thành</option>
				                                 <?php foreach ($city as $key) {
				                                 ?>
				                                 <option value="<?php echo $key['name'] ?>" <?php echo ($key['id_city'] == $ftam) ? "selected" : ""; ?>><?php echo $key['name'] ?></option>
				                                 <?php } ?>
			                              	 </select>
						      			</div>
						      			<div class="col-xs-4">
						      				<label class="label_cam label_cam_1"><input type="checkbox" id="chk_dantoc" onchange="test_dantoc()"
						      					<?php $f8 = '';
						      						foreach ($detail as $key) {
						      						if($key['fieldname'] == 'ethnic')
						      						{
						      							echo "checked"; 
						      							$f8 = $key['filterfrom'];
						      							break;
						      						}
						      						} ?>
					      					> Dân Tộc</label>
					      					<input type="text" id="dantoc-ad" placeholder="Nhập Dân tộc cần lọc" class="input_hs_cam_70" onkeyup="test_dantoc()">
						      			</div>
						      			<div class="col-xs-4">
						      				<label class="label_cam label_cam_1"><input type="checkbox" id="chk_quoctich" 
						      					<?php $f9 = '';
						      						foreach ($detail as $key) {
						      						if($key['fieldname'] == 'nationality')
						      						{
						      							echo "checked"; 
						      							$f9 = $key['filterfrom'];
						      							break;
						      						}
						      					}
						      					?> 
					      					> Quốc tịch</label>
					      					<select class="input_hs_cam_70" id="quoctich-ad" >
                                          		<option value="Việt Nam" <?php echo ($f9 == "Việt Nam")? "selected" : ""; ?> >Việt Nam</option>
                                         		 <option value="Khác" <?php echo ($f9 != "Việt Nam")? "selected" : ""; ?> >Khác</option>
                                       		</select>				      				
						      			</div>
						      		</div>
						      		<div class="row form_campaign_1">
						      			<div class="col-xs-4">
						      				<label class="label_cam label_cam_1"><input type="checkbox" id="chk_tp_thgtru" onchange="test_dcthgtru()"
						      					<?php $f10 = '';
						      						foreach ($detail as $key) {
						      						if($key['fieldname'] == 'cityori')
						      						{
						      							echo "checked"; 
						      							$f10 = $key['filterfrom'];
						      							break;
						      						}
						      					}
						      					?>
					      					> Địa chỉ thường trú</label>
					      					<select class="input_hs_cam_70 js-example-basic-single" id="tp_thgtru" onchange="test_dcthgtru()">
				                                 <option value="0"  >Chọn tỉnh thành</option>
				                                <?php foreach ($city as $key ) {
				                                ?>
				                                  <option value="<?php echo $key['id_city'] ?>" <?php echo ($key['id_city'] == $f10) ? "selected" : ""; ?>><?php echo $key['name'] ?></option>
				                                  <?php } ?>
			                                </select>
						      			</div>
						      			<div class="col-xs-4">
						      				<label class="label_cam label_cam_1"><input type="checkbox" id="chk_tp_dgsg" onchange="test_tpdgsg()"
						      					<?php $f11 = '';
						      						foreach ($detail as $key) {
						      						if($key['fieldname'] == 'citycurr')
						      						{
						      							echo "checked"; 
						      							$f11 = $key['filterfrom'];
						      							break;
						      						}
						      					}
						      					?>
					      					> Địa chỉ hiện tại</label>
					      					<select class="input_hs_cam_70 js-example-basic-single" name="noisinh"  id="tp_dgsg" onchange="selectcity(this.value,'')">
				                                 <option value="0"  >Chọn tỉnh thành</option>
				                                <?php foreach ($city as $key ) {
				                                ?>
				                                  <option value="<?php echo $key['id_city'] ?>" <?php echo ($key['id_city'] == $f11) ? "selected" : ""; ?>><?php echo $key['name'] ?></option>
				                                  <?php } ?>
				                            </select>
						      			</div>
						      			<div class="col-xs-4">
					      					<label class="label_cam label_cam_1"><input type="checkbox" id="quanhuyen-nav12" disabled onchange="test_qhdgsg()"
				                              <?php
				                              foreach ($detail as $key) {
					      						if($key['fieldname'] == 'district')
					      						{
					      							echo "checked"; 
					      							break;
					      						} }
				                              ?>
				                            > Quận huyện hiện tại</label>
				                            <select class="input_hs_cam_70 js-example-basic-single" name="quanhuyen" id="quanhuyen-nav" required onchange="test_qhdgsg()">
				                              	<option value="0" id="chonqh-nav1" >Chọn quận huyện</option>
				                            </select>
						      			</div>
						      		</div>
						      	</div>
						    </div>
					  	</div>

					  	<div class="panel panel-default border-rad0">
					  		<a data-toggle="collapse" data-parent="#accordion" href="#collapse9" onclick="rotate(10)">
						    	<div class="panel-heading rad-pad0 b-blue"> 
						       		<i class="fa fa-angle-right a-tabcs rotate rotate_8 down"></i>
						       		<div class="ul-nav">
								       	<label class="tittle-tab">
								       		Gia đình
								       	</label>
						       		</div>
						    	</div>
						    </a>
						    <div id="collapse9" class="panel-collapse collapse in">
						      	<div class="panel-body">
						      		<div class="row form_campaign_1">
						      			<div class="col-xs-4">
						      				<label class="label_cam"><input type="checkbox" id="chk_chuacogd" onchange="giadinh(this)" value="S"
						      					<?php foreach ($detail as $key) {
						      						if($key['fieldname'] == 'maritalstatus' && $key['filterfrom'] == 'S')
						      						{
						      							echo "checked";
						      							break;
						      						}
						      					}?>
						      					> Chưa có gia đình</label>
						      			</div>
						      			<div class="col-xs-4">
						      				<label class="label_cam"><input type="checkbox" id="chk_cogd" onchange="giadinh(this)" value="M"
						      					<?php foreach ($detail as $key) {
						      						if($key['fieldname'] == 'maritalstatus' && $key['filterfrom'] == 'M')
						      						{
						      							echo "checked";
						      							break;
						      						}
						      					}?>
						      					> Đã có gia đình</label>
						      			</div>
						      			<!-- <div class="col-xs-4">
						      				<label class="label_cam"><input type="checkbox" name=""> Đã có gia đình và có con cái</label>
						      			</div> -->
						      		</div>
						      	</div>
						    </div>
					  	</div>

					  	<div class="panel panel-default border-rad0">
					  		<a data-toggle="collapse" data-parent="#accordion" href="#collapse10" onclick="rotate(11)">
						    	<div class="panel-heading rad-pad0 b-blue"> 
						       			<i class="fa fa-angle-right a-tabcs rotate rotate_9"></i>
						       		<div class="ul-nav">
								       	<label class="tittle-tab">
								       		Tag
								       	</label>
						       		</div>
						    	</div>
						    </a>
						    <div id="collapse10" class="panel-collapse collapse in">
						      	<div class="panel-body">
						      		<div class="row form_campaign_1">
						      			 <?php  
                                        for($i = 0; $i < count($tagrandom); $i++) {
                                     	?> 
	                                   <div class="col-xs-4">
	                                   		<label class="label_cam"><input type="checkbox" name="" id="<?php echo 'tagr'.$i?>" value="<?php echo $tagrandom[$i]['tagid']?>"  
	                                   			<?php
		                                        foreach ($detail as $key) {
							      					if($key['fieldname'] == 'tagrandom')
							      					{
							      						if($key['filterfrom'] == $tagrandom[$i]['tagid'])
							      						{
							      							echo "checked";
							      							break;
							      						}
							      					}
							      				}
		                                        ?>
	                                   			> <?php echo $tagrandom[$i]['title'] ?>
	                                   		</label> 
	                                   </div>
                                   		<?php } ?>
                                   		<input type="hidden" id="counttagrandom" value="<?php echo count($tagrandom) ?>">
						      		</div>
						      	</div>
						    </div>
					  	</div>
					</div>
					<div class="box_btn">
						<div class="col-md-8">
							<label class="label_cam"><input type="checkbox" id="chk_share_tieuchi" <?php echo ($filter[0]['share'] == 1)? "checked" : "";?> > Chia sẻ tiêu chí lọc</label>
						</div>
						<div class="col-md-4 pull-right">
							<a href="<?php echo base_url() ?>admin/campaign/main" class="btn btn_thoat">Thoát</a>
							<a  class="btn btn_tt" onclick="save_filter()">Lưu</a>
							<!-- href="<?php //echo base_url() ?>admin/campaign/new_campaign_3" -->
						</div>
					</div>
	            <!-- /.box-body -->
	          	</div>
	        </div>
    	</div>
    </section>
</div>
<input type="hidden" id="checkqh" value="<?php foreach ($detail as $key) {
						      						if($key['fieldname'] == 'district')
						      						{
						      							echo $key['filterfrom'];
						      							break;
						      						}
						      					}?>">
<input type="hidden" id="checkcity" value="<?php foreach ($detail as $key) {
						      						if($key['fieldname'] == 'citycurr')
						      						{
						      							echo $key['filterfrom'];
						      							break;
						      						}
						      					}?>">
<style type="text/css">
	.input_hs_cam{
		width: 80px;
		margin-bottom: 10px;
	}
	.input_hs_cam_70{
		margin-bottom: 7px;
	}
	.btn_thoat{
	  background: #FAC18F;
	  width: 130px;
	  color: #fff;
	}
	.btn_tt{
	  background: #5FA2DD;
	  margin-right: 20px;
	  color: #fff;
	}
</style>
<script type="text/javascript">
	$(document).ready(function() {
	    $('.js-example-basic').select2({ width: '100%' });
	    var dateNow = new Date();
	    $('.thoihan').datetimepicker({
	    	timepicker:false,
	    	format:'d/m/Y',
	    });
	    CKEDITOR.replace('content',{
	    	allowedContent: true,
	        disableAutoInline: true,
	        toolbarStartupExpanded : false,
	        toolbarCanCollapse: true});
	});
	$('.thoigian').datetimepicker({
	    timepicker:false,
	    format:'d-m-Y',
	  });
	function rotate(id) {
		// for (var i = 1; i <= 10; i++) {
		// 	if(i != id){
		// 		$(".rotate_"+i).removeClass("down"); 
		// 	}
		// }
		// $(".rotate_"+id).toggleClass("down"); 
	}
	 $('#example-multiple-selected').multiselect();
     $('.js-example-basic-single').select2();

	$("input[id='diem_den']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
    $("input[id='diem_tu']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
    $("input[id='tn_httu']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9,]/g, ''));});
    $("input[id='tn_htden']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9,]/g, ''));});
    $("input[id='tn_mmtu']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9,]/g, ''));});
    $("input[id='tn_mmden']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9,]/g, ''));});

    $("input[id='tuoi-tu']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
    $("input[id='tuoi-den']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
    $("input[id='caotu']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
    $("input[id='caoden']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
    $("input[id='nangtu']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
    $("input[id='nangden']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
    $("input[id='kinhnghiem_tu']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
    $("input[id='kinhnghiem_den']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
    $("input[id='tiemnang_tu']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
    $("input[id='tiemnang_den']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
    $('.so').on('input', function(e){
      if ($(this).val() == '') {
              $(this).val();
        }        
    $(this).val(formatCurrency(this.value.replace(/[,VNĐ]/g,'')));
    }).on('keypress',function(e){
        if ($(this).val() == 0)
          $(this).val('');
        if(!$.isNumeric(String.fromCharCode(e.which))) e.preventDefault();
    }).on('paste', function(e){    
        var cb = e.originalEvent.clipboardData || window.clipboardData;      
        if(!$.isNumeric(cb.getData('text'))) e.preventDefault();
    });
    function formatCurrency(number){
        var n = number.split('').reverse().join("");
        var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");    
        return  n2.split('').reverse().join('');
    }
    $('.so100').on('input', function(e){
      if ($(this).val() == '') {
              $(this).val();
        }
     if ($(this).val() == '0') {
          $(this).val('1');
     }
     if ($(this).val() > 100) {
          $(this).val('100');
     }            
    $(this).val(formatCurrency(this.value.replace(/[,VNĐ]/g,'')));
    }).on('keypress',function(e){
        if ($(this).val() == 0)
          $(this).val('');
        if(!$.isNumeric(String.fromCharCode(e.which))) e.preventDefault();
    }).on('paste', function(e){    
        var cb = e.originalEvent.clipboardData || window.clipboardData;      
        if(!$.isNumeric(cb.getData('text'))) e.preventDefault();
    });
    function testdiem()
    {
    	if( $('#diem_tu').val() == '' && $('#diem_den').val() == '')
    	{
    		$( "#chk_diem").prop('checked', false); 
    	}
    }
    function testtiemnang()
    {
    	if( $('#tiemnang_tu').val() == '' && $('#tiemnang_den').val() == '')
    	{
    		$( "#chk_tiemnang").prop('checked', false); 
    	}
    }
    function testngay()
    {
    	if( $('#update_tu').val() == '' && $('#update_den').val() == '')
    	{
    		$( "#chk_lastupdate").prop('checked', false); 
    	}
    }
    function test_tnht()
    {
    	if( $('#tn_httu').val() == '' && $('#tn_htden').val() == '')
    	{
    		$( "#chk_thunhapht").prop('checked', false); 
    	}
    }
     function test_tnmm()
    {
    	if( $('#tn_mmtu').val() == '' && $('#tn_mmden').val() == '')
    	{
    		$( "#chk_thunhapmm").prop('checked', false); 
    	}
    }
     function test_km(obj)
    {
    	var value = obj.value;
        if(value == 'C')
        {
          $("#chk_cokm").prop("checked",false);
        }
        if(value != 'C')
        {
          	if( $('#kinhnghiem_tu').val() == '' && $('#kinhnghiem_den').val() == '')
    		{
    			$( "#chk_cokm").prop('checked', false); 
    		}
    		if($( "#chk_cokm").is(':checked'))
    		{
    			$( "#chk_chuacokm").prop('checked', false);
    		} 
        }
    }
    function hocvan(obj)
    {

        var value = obj.value;
       
        if(value == '1')
        {
          for(var i = 0; i < $('#counthocvan').val() ; i++ )
           {
                $('#hv'+i).prop("checked",false);
           }
        }
        else
        {
          $( "#chk_hs_co_tthv").prop('checked', false); 
        }
    }
    function ngoaingu(obj)
    {

        var value = obj.value;
        if(value == '1')
        {
          for(var i = 0; i < $('#countngoaingu').val() ; i++ )
           {
                $('#nn'+i).prop("checked",false);
           }
        }
        else
        {
          $( "#chk_hs_co_ttnn").prop('checked', false); 
        }
    }
    function tinhoc(obj)
    {
        var value = obj.value;
        if(value == '1')
        {
          for(var i = 0; i < $('#counttinhoc').val() ; i++ )
           {
                $('#th'+i).prop("checked",false);
           }
        }
        else
        {
          $( "#chk_hs_co_ttth").prop('checked', false); 
        }
    }
    function gioitinh(obj)
    {
        var value = obj.value;
        
        if(value == 'M')
        {
          $("#chk_nu").prop("checked",false);
        }
        if(value == 'F')
        {
          $("#chk_nam").prop('checked', false); 
        }
    }
     function test_tuoi()
    {
    	if( $('#tuoi-tu').val() == '' && $('#tuoi-den').val() == '')
    	{
    		$( "#chk_tuoi").prop('checked', false); 
    	}
    }
    function test_chieucao()
    {
    	if( $('#caotu').val() == '' && $('#caoden').val() == '')
    	{
    		$( "#chk_chieucao").prop('checked', false); 
    	}
    }
    function test_cannang()
    {
    	if( $('#nangtu').val() == '' && $('#nangden').val() == '')
    	{
    		$( "#chk_cannang").prop('checked', false); 
    	}
    }
    function test_noisinh()
    {
    	if( $('#noisinh-ad').val() == '' || $('#noisinh-ad').val() == '0')
    	{
    		$( "#chk_noisinh").prop('checked', false); 
    	}
    }
    function test_dantoc()
    {
    	if( $('#dantoc-ad').val() == '')
    	{
    		$( "#chk_dantoc").prop('checked', false); 
    	}
    }
 	function test_dcthgtru()
 	{
    	if( $('#tp_thgtru').val() == '0')
    	{
    		$( "#chk_tp_thgtru").prop('checked', false); 
    	}
    }
    function test_tpdgsg()
    {
    	if( $('#tp_dgsg').val() == '0')
    	{
    		$( "#chk_tp_dgsg").prop('checked', false); 
    	}
    	if($('#chk_tp_dgsg').is(':checked'))
    	{
    		$('#quanhuyen-nav12').removeAttr('disabled','disabled');
    	}
    	else
    	{
    		$('#quanhuyen-nav12').prop('checked', false); 
    		$('#quanhuyen-nav12').attr('disabled','disabled');
    	}
    }
    function test_qhdgsg()
    {
    	if( $('#quanhuyen-nav').val() == '0')
    	{
    		$('#quanhuyen-nav12').prop('checked', false); 
    	}
    }
    function giadinh(obj)
    {
        var value = obj.value;
        if(value == 'S')
        {
          $("#chk_cogd").prop("checked",false);
        }
        if(value == 'M')
        {
          $( "#chk_chuacogd").prop('checked', false); 
        }
    }
	function save_filter()
    {
      var value = {'gender' : '','placeofbirth' : '' , 'age': '' , 'height' : '',  'weight' : '', 'ethnic' : '', 'nationality' : '' , 'cityori' : '' , 'citycurr' : '' , 'district' : '' , 'currentbenefit' : '' , 'desirebenefit' : '' , 'experience' : '' , 'knowledge' : '' , 'language' : '' , 'software' : '' , 'maritalstatus' : '' , 'istalent' : '' , 'lastupdate' : '' , 'blocked' : '' , 'rate' : '' , 'tag' : '' , 'tagrandom' : ''};
       if($('#name_filter').val() == '')
       {
       		alert("Tên gọi của tiêu chí không được bỏ trống!");
       		return;
       }
       if($('#chk_nam').is(':checked'))
       {
          value['gender'] = 'candidate/gender/S/=/M/'; 
       }
       if($('#chk_nu').is(':checked'))
       {
          value['gender'] = 'candidate/gender/S/=/F/';
       }
        if($('#chk_chuacogd').is(':checked'))
       {
          value['maritalstatus'] = 'candidate/maritalstatus/S/=/S/'; 
       }
       if($('#chk_cogd').is(':checked'))
       {
          value['maritalstatus'] = 'candidate/maritalstatus/S/=/M/';
       }
       if($('#chk_noisinh').is(':checked'))
       {
            value['placeofbirth'] = 'candidate/placeofbirth/S/=/'+$('#noisinh-ad').val()+'/';
       }
       if($('#chk_tuoi').is(':checked'))
       {
            if(($('#tuoi-tu').val() != '' ) && ($('#tuoi-den').val() != '') ) $ope = "BETWEEN";
            else if($('#tuoi-tu').val() != '') $ope = "BEGIN WITH";
            else $ope = "END WITH";
            value['age'] = 'candidate/dateofbirth/D/'+$ope+'/'+$('#tuoi-tu').val()+'/'+$('#tuoi-den').val();
          
       }
       if($('#chk_chieucao').is(':checked'))
       {
            if(($('#caotu').val() != '' ) && ($('#caoden').val() != '') ) $ope = "BETWEEN";
            else if($('#caotu').val() != '') $ope = "BEGIN WITH";
            else $ope = "END WITH";
            value['height'] = 'candidate/height/N/'+$ope+'/'+$('#caotu').val()+'/'+$('#caoden').val();
          
       }
       if($('#chk_cannang').is(':checked'))
       {

            if(($('#nangtu').val() != '' ) && ($('#nangden').val() != '') ) $ope = "BETWEEN";
            else if($('#nangtu').val() != '') $ope = "BEGIN WITH";
            else $ope = "END WITH";
            value['weight'] = 'candidate/weight/N/'+$ope+'/'+$('#nangtu').val()+'/'+$('#nangden').val();
          
       }
       if($('#chk_dantoc').is(':checked'))
       { 
            value['ethnic'] = 'candidate/ethnic/S/=/'+$('#dantoc-ad').val()+'/';
          
       }
       if($('#chk_quoctich').is(':checked'))
       {
          if($('#quoctich-ad').val() == ''){
            $( "#chk_quoctich").prop('checked', false); 
          } else {
            value['nationality'] = 'candidate/nationality/S/=/'+$('#quoctich-ad').val()+'/';
          }
       }
       if($('#chk_tp_thgtru').is(':checked'))
       {
            value['cityori'] = 'canaddress/cityori/S/=/'+$('#tp_thgtru').val()+'/';
       }
       if($('#chk_tp_dgsg').is(':checked'))
       {

            value['citycurr'] = 'canaddress/citycurr/S/=/'+$('#tp_dgsg').val()+'/';
          
       }
       if($('#quanhuyen-nav12').is(':checked'))
       {

            value['district'] = 'canaddress/district/S/=/'+$('#quanhuyen-nav').val()+'/';
          
       }
       if($('#chk_thunhapht').is(':checked'))
       {

            if(($('#tn_httu').val() != '' ) && ($('#tn_htden').val() != '') ) $ope = "BETWEEN";
            else if($('#tn_httu').val() != '') $ope = "BEGIN WITH";
            else $ope = "END WITH";
            value['currentbenefit'] = 'candidate/currentbenefit/N/'+$ope+'/'+$('#tn_httu').val()+'/'+$('#tn_htden').val();
          
       }
       if($('#chk_thunhapmm').is(':checked'))
       {

            if(($('#tn_mmtu').val() != '' ) && ($('#tn_mmden').val() != '') ) $ope = "BETWEEN";
            else if($('#tn_mmtu').val() != '') $ope = "BEGIN WITH";
            else $ope = "END WITH";
            value['disirebenefit'] = 'candidate/disirebenefit/N/'+$ope+'/'+$('#tn_mmtu').val()+'/'+$('#tn_mmden').val();
          
       }
       if($('#chk_chuacokm').is(':checked'))
       {
          value['experience'] = 'canexperience/experience/S/NOT IN/C/';
       }
       if($('#chk_cokm').is(':checked'))
       {
          if(($('#kinhnghiem_tu').val() != '' ) && ($('#kinhnghiem_den').val() != '') ) $ope = "BETWEEN";
          else if($('#kinhnghiem_tu').val() != '') $ope = "BEGIN WITH";
          else $ope = "END WITH";
          value['experience'] = 'canexperience/experience/N/'+$ope+'/'+$('#kinhnghiem_tu').val()+'/'+$('#kinhnghiem_den').val();
       }
       if($('#chk_hs_co_tthv').is(':checked'))
       {
           value['knowledge'] = 'canknowledge/knowledge/S/IN/1/';
       }
       else
       {
           for(var i = 0; i < $('#counthocvan').val() ; i++ )
           {
              if($('#hv'+i).is(':checked'))
             {
                value['knowledge'+i] = 'canknowledge/knowledge/S/=/'+$('#hv'+i).val()+'/';
             }
           }
       }
       if($('#chk_hs_co_ttnn').is(':checked'))
       {
          value['language'] = 'canlanguage/language/S/IN/1/';
       }
       else
       {
           for(var i = 0; i < $('#countngoaingu').val() ; i++ )
           {
              if($('#nn'+i).is(':checked'))
             {
                value['language'+i] = 'canlanguage/language/S/=/'+$('#nn'+i).val()+'/';
             }
           }
       }
       if($('#chk_hs_co_ttth').is(':checked'))
       {
         
          value['software'] = 'cansoftware/software/S/IN/1/';
       }
       else
       {
           for(var i = 0; i < $('#counttinhoc').val() ; i++ )
           {
              if($('#th'+i).is(':checked'))
             {
                value['software'+i] = 'cansoftware/software/S/=/'+$('#th'+i).val()+'/';
             }
           }
       }
       for(var i = 0; i < $('#countprofile').val() ; i++ )
       {
          if($('#src'+i).is(':checked'))
         {
            value['profilesrc'+i] = 'candidate/profilesrc/S/=/'+$('#src'+i).val()+'/';
         }
       }
       for(var i = 0; i < $('#counttag').val() ; i++ )
       {
          if($('#tag'+i).is(':checked'))
         {
            value['tag'+i] = 'tagtransaction/tag/S/=/'+$('#tag'+i).val()+'/';
         }
       }
       for(var i = 0; i < $('#counttagrandom').val() ; i++ )
       {
          if($('#tagr'+i).is(':checked'))
         {
            value['tagrandom'+i] = 'tagtransaction/tagrandom/S/=/'+$('#tagr'+i).val()+'/';
         }
       }
       if($('#chk_tiemnang').is(':checked'))
       {
       	if(($('#tiemnang_tu').val() != '' ) && ($('#tiemnang_den').val() != '') ) $ope = "BETWEEN";
          else if($('#tiemnang_tu').val() != '') $ope = "BEGIN WITH";
          else $ope = "END WITH";
          value['istalent'] = 'candidate/istalent/N/'+$ope+'/'+$('#tiemnang_tu').val()+'/'+$('#tiemnang_den').val();
       }

       if($('#chk_lastupdate').is(':checked'))
       {
          if(($('#update_tu').val() != '' ) && ($('#update_den').val() != '') ) $ope = "BETWEEN";
          else if($('#update_tu').val() != '') $ope = "BEGIN WITH";
          else $ope = "END WITH";
          value['lastupdate'] = 'candidate/lastupdate/N/'+$ope+'/'+$('#update_tu').val()+'/'+$('#update_den').val();
       }

       if($('#chk_chan').is(':checked'))
       {
          value['blocked'] = 'candidate/blocked/S/=/Y/';
       }
       if($('#chk_diem').is(':checked'))
       {
          if(($('#diem_tu').val() != '' ) && ($('#diem_den').val() != '') ) $ope = "BETWEEN";
          else if($('#diem_tu').val() != '') $ope = "BEGIN WITH";
          else $ope = "END WITH";
          value['rate'] = 'cancomment/rate/N/'+$ope+'/'+$('#diem_tu').val()+'/'+$('#diem_den').val();
       }
       value['filter'] = $('#name_filter').val();
       if($('#chk_share_tieuchi').is(':checked'))
       {
          value['share'] = '1';
       }
       else
       {
          value['share'] = '0';
       }
       var edit = $('#filterid1').val();
        $.ajax({
          url: '<?php echo base_url()?>admin/handling/save_edit_filter/'+edit,
          type: 'POST',
          dataType: 'json',
          data: value,
        })
        .done(function(data) {
          console.log(data);
            // $('.nav-check-save').append('<li id="dropdown" class="width100"><a class="nav-menu-hs" onclick="loadfilter('+data[0]['filterid']+')">'+data[0]['filtername']+'</a></li>');
            parent.$('#editFilter').modal('hide');
          alert("Thêm thành công!");
          parent.location.reload();
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
    }

    $(document).ready(function(){
    
    if($('#checkqh').val() != "")
    {
      var get = $('#checkqh').val();
      var $id = $('#checkcity').val();
      $('.gicungdc').remove();
     
      $('#quanhuyen-nav12').attr('disabled','disabled');
      $( "#quanhuyen-nav12").prop('checked', false); 
      if($id != '0')
      {
        $('#quanhuyen-nav12').removeAttr('disabled','disabled');
        $( "#quanhuyen-nav12").prop('checked', true); 
      }

        $.ajax({
          url: '<?php echo base_url()?>admin/handling/selectCity',
          type: 'POST',
          dataType: 'JSON',
          data: {id_city : $id},
        })
        .done(function(data) {
             for(var i in data)
             {  
                if(get != 0 && get == data[i].id_district)
                {
                  $('#chonqh-nav1').after('<option class="gicungdc" value="'+data[i].id_district+'" selected>'+data[i].name+'</option>');
                }
                else
                {
                  $('#chonqh-nav1').after('<option class="gicungdc" value="'+data[i].id_district+'">'+data[i].name+'</option>');
                } 
              }
          })
        .fail(function() {
          alert('thatbai');
          console.log("error");
        });
    }
  });
    function selectcity(obj,get=''){
      var $id = obj;
      $('.gicungdc').remove();
     
      $('#quanhuyen-nav12').attr('disabled','disabled');
      $( "#quanhuyen-nav12").prop('checked', false); 
      if($('#chk_tp_dgsg').is(':checked'))
      {
    
        $('#quanhuyen-nav12').removeAttr('disabled','disabled');
      }

        $.ajax({
          url: '<?php echo base_url()?>admin/handling/selectCity',
          type: 'POST',
          dataType: 'JSON',
          data: {id_city : $id},
        })
        .done(function(data) {
             for(var i in data)
             {  
                if(get != 0 && get == data[i].id_district)
                {
                  $('#chonqh-nav1').after('<option class="gicungdc" value="'+data[i].id_district+'" selected>'+data[i].name+'</option>');
                }
                else
                {
                  $('#chonqh-nav1').after('<option class="gicungdc" value="'+data[i].id_district+'">'+data[i].name+'</option>');
                } 
              }
          })
        .fail(function() {
          alert('thatbai');
          console.log("error");
        });
    }
</script>