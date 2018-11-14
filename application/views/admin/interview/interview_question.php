<div class="row">
	<section class="col-md-6 col-md-offset-3">
		<div class="page_header">
			<div class="logo_as" >
				<img src="<?php echo base_url() ?>public/image/logoheader.png">
				<label >DXG Recruiter</label>
				<div class="pull-right"><i class="fa fa-close"></i></div>
			</div>
			<div>
				<p class="header_title">PHIẾU PHỎNG VẤN</p>
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
				<label>Thông tin ứng viên</label>
				<div class="margin_top_15 border_bottom_f2 margin_le_ri">
					<div class="panel-group" id="accordion">
					  	<div class="panel panel-default border-rad0" >
						    <div class="panel-heading b-blue rad-pad0">
						    	<a data-toggle="collapse" data-parent="#accordion" href="#collapse1" onclick="rotate(1)">
						       		<i class="fa fa-angle-right a-tabcs rotate rotate_1"></i>
						       	</a>
							    <ul class="nav nav-tabs ul-nav">
							        <li class="active"><a data-toggle="tab" href="#total" class="nemu-info-pf">Tổng quát</a></li>
							        <li ><a data-toggle="tab" href="#personal" class="nemu-info-pf" >Cá nhân</a></li>
							        <li ><a data-toggle="tab" href="#contact" class="nemu-info-pf" >Liên hệ</a></li>
							        <li ><a data-toggle="tab" href="#family" class="nemu-info-pf" >Gia đình</a></li>
							        <li ><a data-toggle="tab" href="#experience" class="nemu-info-pf" >Kinh nghiệm</a></li>
							        <li ><a data-toggle="tab" href="#knowledge" class="nemu-info-pf" >Học vấn</a></li>
							        <li ><a data-toggle="tab" href="#language" class="nemu-info-pf" >Ngoại ngữ</a></li>
							        <li ><a data-toggle="tab" href="#software" class="nemu-info-pf" >Tin học</a></li>
							    </ul>
						    </div>
						    <!-- ket thuc phan heading cua tab 1 thong tin ung vien -->
						    <div id="collapse1" class="panel-collapse collapse in">
						      	<div class="panel-body tab-collapse">
							      	<div class="tab-content">
							        	<div id="total" class="tab-pane in active">
							        		<div class="panel-group bor-mar-b0">
											  	<div class="panel panel-default border-rad0">
												    <div id="collapsetotal1" class="panel-collapse collapse in">
												      <div class="panel-body" style="border: 0px">
											     	 	 <div class="width100 row rowedit h-auto">
												            <label for="text" class="width20 col-xs-3 label-profile ">Giới thiệu</label>
												            <div class="width80 col-xs-9 padding-lr0">
												             <label class="fontArial colorgray labelcontent"><?php echo $candidate['introduction']?> </label>
												             
												            </div>
												         </div>
												     	 <div class="width100 row rowedit h-auto">
												            <label for="text" class="width20 col-xs-3 label-profile ">Vị trí mong muốn</label>
												            <div class="width80 col-xs-9 padding-lr0">
												             <label class="fontArial colorcyan labelcontent" >Tuyển dụng </label>
												             
												            </div>
												         </div>
												          <div class="width100 row rowedit h-auto">
												             <label for="text" class="width20 col-xs-3 label-profile">Thu nhập hiện tại</label>
												             <label class="width20 col-xs-3 fontArial colorgray labelcontent" ><?php echo number_format($candidate['currentbenefit'])?> </label>
												             <label for="text" class="width30 col-xs-3 label-profile" >Thu nhập mong muốn</label>
												             <label class="width30 col-xs-3 fontArial colorgray labelcontent"><?php echo number_format($candidate['desirebenefit'])?> </label>
												         </div>
												          <div class="width100 row rowedit h-auto">
												            <label for="text" class="width20 col-xs-3 label-profile">Hồ sơ tải lên</label>
												            <div class="width80 col-xs-9 padding-lr0"">
												            	<?php if (!empty($document)){
											                        $url = $document['url'];
											                        $name = $document['filename'];
											                    }else{$url =''; $name = '';}?>
												             <label class="fontArial colorcyan labelcontent" ><a id="label1"  class="fontstyle"  href="<?php echo $url; ?>"><?php echo $name; ?> </a>   </label>
												             
												            </div>
												         </div>
												  	  </div>
												    </div>
												    <!-- body ho so ca nhan -->
											  	</div>
											<!--   ket thuc ho so ca nhan -->
											</div>
							       		</div>
							       		 <!-- ket thuc id tab tong quat -->

							       		<div id="personal" class="tab-pane">
							        		<div class="panel-group bor-mar-b0">
											  	<div class="panel panel-default border-rad0">
												    <div id="collapsetotal21" class="panel-collapse collapse in">
												      <div class="panel-body" style="border: 0px">
											     	 	 <div class="width100 row rowedit h-auto">
												            <label for="text" class="width20 col-xs-3 label-profile">Họ tên</label>
												            <div class="width80 col-xs-9 padding-lr0">
												             <label class="fontArial colorgray labelcontent"><?php echo $candidate['name']?></label>
												             
												            </div>
												         </div>

												     	 <div class="width100 row rowedit h-auto">
												            <label for="text" class="width20 col-xs-3 label-profile">Ngày sinh</label>
												            <div class="width20 col-xs-3 padding-lr0">
												             <label class="fontArial colorgray labelcontent" ><?php echo $candidate['dateofbirth']?></label>
												            </div>
												            <div class="width20 col-xs-6 padding-lr0">
												             <label class="fontArial colorgray labelcontent" ><?php echo getAge($candidate['dateofbirth'])." tuổi"?></label>
												            </div>
												            <label for="text" class="width20 col-xs-3 label-profile">Giới tính</label>
												            <div class="width20 col-xs-3 padding-lr0">
												             <label class="fontArial colorgray labelcontent" ><?php echo ($candidate['gender'] == "M")? "Nam": "Nữ";?></label>
												            </div>
												         </div>
												          <div class="width100 row rowedit h-auto">
												             <label for="text" class="width20 col-xs-3 label-profile">Nơi Sinh</label>
												            <div class="width80 col-xs-9 padding-lr0">
												             <label class="fontArial colorgray labelcontent" ><?php echo $candidate['placeofbirth']?></label>
												            </div>
												            
												         </div>
												          <div class="width100 row rowedit h-auto">
												            <label for="text" class="width20 col-xs-3 label-profile">Dân Tộc</label>
												            <div class="width20 col-xs-3 padding-lr0">
												             <label class="fontArial colorgray labelcontent" ><?php echo $candidate['ethnic']?></label>
												            </div>
												            <label for="text" class="width20 col-xs-3 label-profile">Quốc tịch</label>
												            <div class="width30 col-xs-3 padding-lr0">
												             <label class="fontArial colorgray labelcontent" ><?php echo $candidate['nationality']?></label>
												            </div>
												         </div>
												         <div class="width100 row rowedit h-auto">
												            <label for="text" class="width20 col-xs-3 label-profile">Chiều cao</label>
												            <div class="width20 col-xs-3 padding-lr0">
												             <label class="fontArial colorgray labelcontent" ><?php echo $candidate['height']?></label>
												            </div>
												            <label for="text" class="width20 col-xs-3 label-profile">Cân nặng</label>
												            <div class="width30 col-xs-3 padding-lr0">
												             <label class="fontArial colorgray labelcontent" ><?php echo $candidate['weight']?></label>
												            </div>
												         </div>
												         <div class="width100 row rowedit h-auto">
												            <label for="text" class="width20 col-xs-3 label-profile">CMND/ ID</label>
												            <div class="width20 col-xs-3 padding-lr0">
												             <label class="fontArial colorgray labelcontent" ><?php echo $candidate['idcard']?></label>
												            </div>
												            <label for="text" class="width20 col-xs-3 label-profile">Ngày cấp/ Nơi cấp</label>
												            <div class="width20 col-xs-3 padding-lr0">
												             <label class="fontArial colorgray labelcontent" ><?php echo $candidate['dateofissue']?></label>
												            </div>
												            <div class="width20 col-xs-3 padding-lr0">
												             <label class="fontArial colorgray labelcontent" ><?php echo $candidate['placeofissue']?></label>
												            </div>
												         </div>
												        
												  	  </div>
												    </div>
												    <!-- body ho so ca nhan 2-->
											  	</div>
												<!--   ket thuc ho so ca nhan 2-->
											</div>
							       		</div>
							       		 <!-- ket thuc id tab ca nhan -->

							       		<div id="contact" class="tab-pane">
							        		<div class="panel-group bor-mar-b0">
											  	<div class="panel panel-default border-rad0">
											    	<div id="collapsetotal31" class="panel-collapse collapse in">
													    <div class="panel-body" style="border: 0px">
												     	 	 <div class="width100 row rowedit h-auto">
													            <label for="text" class="width20 col-xs-3 label-profile">Email</label>
													            <div class="width80 col-xs-9 padding-lr0">
													             <label class="fontArial colorgray labelcontent"><?php echo $candidate['email']?></label>
													             
													            </div>
													         </div>

													     	 <div class="width100 row rowedit h-auto">
													             <label for="text" class="width20 col-xs-3 label-profile">Địa chỉ thường trú</label>
													            <div class="width80 col-xs-9 padding-lr0">
													             <label class="fontArial colorgray labelcontent"><?php 
													                  if($address != null)
													                  { 
													                      foreach ($address as $key ) {
													                        if($key['addtype'] == "PREMANENT")
													                        {
													                          echo $key['address']; break;
													                        }
													                      }
													                  }
													              ?></label>
													             
													            </div>
													         </div>
													          <div class="width100 row rowedit h-auto">
													             <label for="text" class="width20 col-xs-3 label-profile">Địa chỉ liên hệ</label>
													            <div class="width80 col-xs-9 padding-lr0">
													             <label class="fontArial colorgray labelcontent" >
													             	<?php 
													                  if($address != null)
													                  {
													                      foreach ($address as $key ) {
													                        if($key['addtype'] == "CONTACT")
													                        {
													                          echo $key['address']; break;
													                        }
													                      }
													                  }
													              ?></label>
													            </div>
													            
													         </div>
													          <div class="width100 row rowedit h-auto">
													            <label for="text" class="width20 col-xs-3 label-profile">Điện thoại</label>
													            <div class="width80 col-xs-9 padding-lr0">
													             <label class="fontArial colorgray labelcontent" ><?php echo $candidate['telephone'];?></label>
													            </div>
													        </div>
													         <div class="width100 row rowedit h-auto">
													            <label for="text" class="width20 col-xs-3 label-profile">Liên lạc khẩn cấp</label>
													            <div class="width30 col-xs-3 padding-lr0">
													             <label class="fontArial colorgray labelcontent" ><?php echo $candidate['emergencycontact'];?></label>
													            </div>
													         </div>
													  	</div>
											    	</div>
											    	<!-- body ho so ca nhan 3-->
											  	</div>
												<!--   ket thuc ho so ca nhan 3-->
											</div>
							       		</div>
							       		 <!-- ket thuc id tab lien he -->

							       		<div id="family" class="tab-pane">
							        		<div class="panel-group bor-mar-b0">
											  	<div class="panel panel-default border-rad0">
											    	<div id="collapsetotal41" class="panel-collapse collapse in">
											    	 	<div class="panel-body" style="border: 0px">
													    	<table class="table table-striped table-bordered"> 
												            <thead> 
												              <tr class="fontstyle"> 
												                <th id="th" width="30%">Họ và tên</th> 
												                <th id="th" width="20%">Năm sinh</th> 
												                <th id="th" width="20%">Quan hệ</th> 
												                <th id="th" width="20%">Nghề nghiệp</th>
												              </tr> 
												            </thead> 
												            <tbody class="fontstyle text-center"> 
												              	<?php if($family != null) {
												                $i = 0;
												              	foreach ($family as $key) { ?>
												             	<tr>
												              		<td><?php echo $key['name']?></td>
												              		<td><?php echo ($key['yob'] !== 0) ? $key['yob'] : ""; ?></td>
												              		<td><?php echo ($key['type'] !== '0') ? $key['type'] : ""; ?></td>
												              		<td><?php echo $key['career']?></td>
												             		</tr>
												             	<?php $i++;} } ?>
												            </tbody> 
												        	</table>
										      			</div>
											    	</div>
											   		<!-- body ho so ca nhan 4-->
											  	</div>
												<!--   ket thuc ho so ca nhan 4-->
											</div>
							       		</div>
							       		 <!-- ket thuc id tab gia dinh -->
							       		 
							       		<div id="experience" class="tab-pane">
							        		<div class="panel-group bor-mar-b0">
											  	<div class="panel panel-default border-rad0">
												    <div id="collapsetotal51" class="panel-collapse collapse in">
												    	 <div class="panel-body" style="border: 0px">
														      <table   class="table table-striped table-bordered" > 
													            <thead class="fontstyle"> 
													              <tr > 
													                <th id="th" class="middle2" width="20%">Từ - Đến</th> 
													                <th id="th" class="middle2" width="20%">Cty/ Địa chỉ/ ĐT</th> 
													                <th id="th" width="13%">CV khi nghỉ</th> 
													                <th id="th" width="17%">NV/ Trách nhiệm</th>
													                 <th id="th" class="middle2" width="20%">Lý do nghỉ</th>
													              </tr> 
													            </thead> 
													            <tbody class="fontstyle text-center"> 
													             <?php if($experience != null) { 
													              $i = 0;
													              foreach ($experience as $key) { ?>
													             <tr>
													              
													              <td><?php echo date("d-m-Y", strtotime($key['datefrom'])).' - '.date("d-m-Y", strtotime($key['dateto']))?></td>
													              <td><?php echo $key['company']." / ".$key['address']." / ".$key['phone']?></td>
													              <td><?php echo $key['position']?></td>
													              <td><?php echo $key['responsibility']?></td>
													              <td><?php echo $key['quitreason']?></td>
													             </tr>
													             <?php $i++; } } ?>
													            </tbody> 
													          </table>

													          <table   class="table table-striped table-bordered" > 
													            <thead> 
													              <tr class="fontstyle"> 
													                <th id="th" width="30%">Họ và tên</th> 
													                <th id="th" width="15%">Chức vụ</th> 
													                <th id="th" width="20%">Công ty</th> 
													                <th id="th" width="25%">Liên hệ</th>				                  
													              </tr> 
													            </thead> 
													            <tbody class="fontstyle text-center"> 
													             <?php if($reference != null) {
													              $i = 0;
													              foreach ($reference as $key) { ?>
													             <tr>					               
													              <td><?php echo $key['name']?></td>
													              <td><?php echo $key['position']?></td>
													              <td><?php echo $key['company']?></td>
													              <td><?php echo $key['contactno']?></td>
													             </tr>
													             <?php $i++; } } ?>
													            </tbody> 
													          </table>
											      		</div>
												    </div>
												    <!-- body ho so ca nhan 5-->
											  	</div>
											<!--   ket thuc ho so ca nhan 5-->
											</div>
							       		</div>
							       		 <!-- ket thuc id tab kinh nghiệm -->

							       		<div id="knowledge" class="tab-pane">
							        		<div class="panel-group bor-mar-b0">
											  	<div class="panel panel-default border-rad0">
												    <div id="collapsetotal61" class="panel-collapse collapse in">
												    	 <div class="panel-body" style="border: 0px">
														      <table   class="table table-striped table-bordered" > 
													            <thead class="fontstyle"> 
													              <tr > 
													                <th id="th" width="20%">Từ - Đến</th> 
													                <th id="th" width="20%">Trường</th> 
													                <th id="th" width="15%">Nơi học</th> 
													                <th id="th" width="20%">Ngành học</th>
													                 <th id="th" width="15%">Bằng cấp</th>
													                 
													              </tr> 
													            </thead> 
													            <tbody class="fontstyle text-center"> 
													              <?php if($knowledge != null) {
													                $i = 0;
													              foreach ($knowledge as $key) { 
													                if($key['traintimetype'] != null)
													                  { continue; } else {?>
													             <tr>
													              <td><?php echo date("d-m-Y", strtotime($key['datefrom'])).' - '.date("d-m-Y", strtotime($key['dateto']))?></td>
													              <td><?php echo $key['trainingcenter']?></td>
													              <td><?php echo $key['trainingplace']?></td>
													              <td><?php echo $key['trainingcourse']?></td>
													              <td><?php echo $key['certificate']; if($key['highestcer'] == "Y") echo "(*)"; ?></td>
													             </tr>
													             <?php $i++; } } }?>
													            </tbody> 
													          </table>

													          <table   class="table table-striped table-bordered" > 
													            <thead class="fontstyle"> 
													              <tr> 
													                <th id="th" width="20%">Từ - Đến</th> 
													                <th id="th" width="25%">Cơ sở đạo tào</th> 
													                <th id="th" width="13%">TG học</th> 
													                <th id="th" width="17%">Ngành học</th>
													                 <th id="th" width="15%">Bằng cấp</th>
													                
													              </tr> 
													            </thead> 
													            <tbody class="fontstyle text-center"> 
													             <?php if($knowledge != null) {
													               $i = 0;
													              foreach ($knowledge as $key) { 
													                if($key['traintimetype'] == null)
													                  { continue; } else {?>
													             <tr>
													              <td><?php echo date("d-m-Y", strtotime($key['datefrom'])).' - '.date("d-m-Y", strtotime($key['dateto']))?></td>
													              <td><?php echo $key['trainingcenter']?></td>
													              <td><?php echo $key['traintime'].' '.$key['traintimetype']?></td>
													              <td><?php echo $key['trainingcourse']?></td>
													              <td><?php echo $key['certificate']?></td>
													             </tr>
													             <?php $i++; } } } ?>
													            </tbody> 
													          </table>
											      		</div>
												    </div>
												    <!-- body ho so ca nhan 6-->
											  	</div>
												<!--   ket thuc ho so ca nhan 6-->
											</div>
							       		</div>
							       		 <!-- ket thuc id tab hoc van-->
							       		 
							       		<div id="language" class="tab-pane">
							        		<div class="panel-group bor-mar-b0">
											  	<div class="panel panel-default border-rad0">
												    <div id="collapsetotal71" class="panel-collapse collapse in">
												    	 <div class="panel-body" style="border: 0px">
														      <table class="table table-striped table-bordered" > 
													            <thead class="fontstyle"> 
													              <tr> 
													                <th id="th" >Ngoại Ngữ</th> 
													                <th id="th" >Nghe</th> 
													                <th id="th" >Nói</th> 
													                <th id="th" >Đọc</th>
													                <th id="th" >Viết</th>
													              </tr> 
													            </thead> 
													            <tbody class="fontstyle text-center"> 
													            <?php if($language != null) {
													              $i = 0;
													              foreach ($language as $key) { 
													              
													                ?>
													             <tr>
													              <td><?php echo $key['language']?></td>
													              <td><?php echo ($key['rate1'] !== "0") ? $key['rate1'] : ""; ?></td>
													              <td><?php echo ($key['rate2'] !== "0")? $key['rate2'] : ""; ?></td>
													              <td><?php echo ($key['rate3'] !== "0")? $key['rate3']: ""; ?></td>
													              <td><?php echo ($key['rate4'] !== "0")? $key['rate4']: ""; ?></td>
													             </tr>
													             <?php $i++; } } ?>
													            </tbody> 
													          </table>
											      		</div>
												    </div>
												    <!-- body ho so ca nhan 7-->
											  	</div>
												<!--   ket thuc ho so ca nhan 7-->
											</div>
							       		</div>
							       		 <!-- ket thuc id tab ngoai ngu-->

							       		<div id="software" class="tab-pane">
							        		<div class="panel-group bor-mar-b0">
											  	<div class="panel panel-default border-rad0">
												    <div id="collapsetotal81" class="panel-collapse collapse in">
												    	 <div class="panel-body" style="border: 0px">
														     <table   class="table table-striped table-bordered" > 
													            <thead class="fontstyle"> 
													              <tr> 
													                <th id="th" width="60%">Phần mềm</th> 
													                <th id="th" width="30%">Trình độ</th>
													              </tr> 
													            </thead> 
													            <tbody class="fontstyle text-center"> 
													             <?php if($software != null) {
													              $i = 0;
													              foreach ($software as $key) { 
													                ?>
													             <tr>
													              <td><?php echo $key['software']?></td>
													              <td><?php echo ($key['rate1'] !== "0")? $key['rate1'] : ""; ?></td>
													             </tr>
													             <?php $i++; } } ?>
													            </tbody> 
													          </table>
											      		</div>
												    </div>
												    <!-- body ho so ca nhan 8-->
											  	</div>
												<!--   ket thuc ho so ca nhan 8-->
											</div>
							       		</div>
							       		 <!-- ket thuc id tab tin hoc-->
							    	</div>
						      	</div>
						    </div>
						    <!-- ket thuc body cua tab 1 thong tin ung vien -->
					  	</div>
					  	<!-- ket thuc tat ca tab 1 thong tin ung vien -->

					  	<div class="panel panel-default border-rad0">
						  	<a data-toggle="collapse" data-parent="#accordion" href="#collapse2" onclick="rotate(2)">
							    <div class="panel-heading rad-pad0 b-blue"> 
							       <i class="fa fa-angle-right a-tabcs rotate rotate_2 "></i>
							       <div class="ul-nav">
							       	<label class="tittle-tab">
							       		Lịch sử hồ sơ
							       	</label>
							       </div>
							    </div>
							</a>
						    <div id="collapse2" class="panel-collapse collapse in">
						      <div class="panel-body pad0">
						      	<table class="width100">
						      		<?php foreach ($history as $row) { 
						      			$share = $rate = $comment = '';
						      			if ($row['filename'] == '') {
						      				$image = 'bbye.jpg';
						      			}else{
						      				$image = $row['filename'];
						      			}
						      			$check = 0;
						      			if(isset($row['type'])){
						      				if ($row['type'] == 'comment') {
							      				$fa = '<i class="fa fa-comment-o" ></i>';
							      				$type = 'Thêm nhận xét/ Đánh giá - '.date_format(date_create($row['createddate']),"d/m/Y - h:i");
							      				$check = 1;
							      			}else{
							      				$fa = '<i class="fa fa-phone" ></i>';
							      				$type = 'Thêm Nhật ký Điện thoại - '.date_format(date_create($row['createddate']),"d/m/Y - h:i");
							      				$check = 1;
							      			}
							      			if ($row['rate'] >= '80') {
							      				$rate = 'Hồ sơ tốt - '.(int)$row['rate'].' điểm';
							      			}else if ($row['rate'] >= '50' && $row['rate'] < '80') {
							      				$rate = 'Hồ sơ khá - '.(int)$row['rate'].' điểm';
							      			}else{
							      				$rate = 'Hồ sơ trung bình - '.(int)$row['rate'].' điểm';
							      			}
							      			if ($row['share'] == 'Y'){
							      				$share = '<label class="colorgray fontArial show-view" >Hiện thị với tất cả mọi người</label>';
							      			}
							      			$comment = '<div class="col-xs-11"><p style="font-size: 14px">'.$row['comments'].'</p></div>';
						      			}else if(isset($row['actiontype'])){
						      				if ($row['actiontype'] == 'Trust') {
							      				$fa = '<i class="fa fa-check-circle-o color-green size-icon"></i>';
							      				$type = ' - '.$row['actionnote'].' - '.date_format(date_create($row['createddate']),"d/m/Y - h:i");
							      				$check = 1;
							      			}else if ($row['actiontype'] == 'Block'){
							      				$fa = '<i class="fa fa-ban color-red size-icon"></i>';
							      				$type = ' - '.$row['actionnote'].' - '.date_format(date_create($row['createddate']),"d/m/Y - h:i");
							      				$check = 1;
							      			}else if ($row['actiontype'] == 'Talent') {
							      				$fa = '<i class="fa fa-star color-orange  star-icon1" ></i>';
							      				$type = ' - '.$row['actionnote'].' - '.date_format(date_create($row['createddate']),"d/m/Y - h:i");
							      				$check = 1;
							      			}else if ($row['actiontype'] == 'NotTalent'){
							      				$fa = '<i class="fa fa-star color-gray star-icon1"></i>';
							      				$type = ' - '.$row['actionnote'].' - '.date_format(date_create($row['createddate']),"d/m/Y - h:i");
							      				$check = 1;
							      			}
							      			else if ($row['actiontype'] == 'NotTalent'){
							      				$fa = '<i class="fa fa-star color-gray star-icon1"></i>';
							      				$type = ' - '.$row['actionnote'].' - '.date_format(date_create($row['createddate']),"d/m/Y - h:i");
							      				$check = 1;
							      			}
							      			if ($row['isshare'] == 'Y'){
							      				$share = '<label class="colorgray fontArial show-view" >Hiện thị với tất cả mọi người</label>';
							      			}
						      			}
						      			if($check == 1){
						      		?>
						      			<tr >
							      			<td class="table-history" style="width: 4%;padding-top: 10px;"><?php echo $fa ?> </td>
							      			<td class="table-his-cont" style="width: 96%">
							      				<img src="<?php echo base_url().'public/image/'.$image?>"  width="32px" height="32px" style="float:left; margin-right: 4px">
							      				<div class="col-xs-11 mr-pd">
							      					<label class="text-his fontArial" style="margin-bottom: 2px"><span style="font-weight: 600"><?php echo $row['operatorname'] ?> </span><span class="colorgray"><?php echo $type ?> </span></label>
							      					<br>
							      					<?php echo isset($share) ? $share : '' ?>
							      				</div>
							      				<?php echo isset($rate) ? '<label class="fontArial text-his" >'.$rate.'</label>' : '' ?>
								      			<?php echo $comment ?>
							      				
							      			</td>
							      		</tr>
						      		<?php  }} ?>
						      		
						      		
						      	</table>
						      </div>
						    </div>
					  	</div>
					</div>
				</div>
				<form>
					<input type="hidden" name="interviewerid" value="<?php echo $interviewerid ?>">
					<div class="row desc_as">
						<label>Phiếu phỏng vấn</label>
						<div class="col-md-12">
							<div class="col-md-3 padding_0 manage_pv ql">
	          					<div class="col-md-3 padding_0">
	          						<img class="img-pv" src="<?php echo base_url() ?>public/image/bbye.jpg">
	          					</div>
	          					<div class="col-md-9 padding_0">
	          						<div class="body-blac5a">Nguyễn Huy Hoàng</div>
	          					</div>
	          				</div>
	          				<div class="pull-right">
	          					<div class="btn_as">
									<button onclick="changeAssessment()"><i class="fa fa-pencil fa-lg"></i></button>
								</div>
	          				</div>
						</div>
					</div>
					<div>
						<div class="title_ques">A.	Kiến thức/ Kinh nghiệm/ Năng lực/ Sự phù hợp</div>
						<div class="question_as">
							<label>1.	Học vấn/ Kiến thức</label>
							<div class="answer_as">
								<div class="col-md-3">
									<input type="textbox" name="" placeholder="Điểm số (1->5)">
								</div>
								<div class="col-md-9">
									<input type="textbox" class="width_100" name="" placeholder="Nhận xét">
								</div>
							</div>
						</div>
						<div class="question_as">
							<label>2.	Kinh nghiệm làm việc</label>
							<div class="answer_as">
								<div class="col-md-3">
									<input type="textbox" name="" placeholder="Điểm số (1->5)">
								</div>
								<div class="col-md-9">
									<input type="textbox" class="width_100" name="" placeholder="Nhận xét">
								</div>
							</div>
						</div>
						<div class="question_as">
							<label>3.	Năng lực chuyên môn</label>
							<div class="answer_as">
								<div class="col-md-3">
									<input type="textbox" name="" placeholder="Điểm số (1->5)">
								</div>
								<div class="col-md-9">
									<input type="textbox" class="width_100" name="" placeholder="Nhận xét">
								</div>
							</div>
						</div>
						<div class="question_as">
							<label>4.	Cầu tiến/ Ham học hỏi/ Khát vọng lớn</label>
							<div class="answer_as">
								<div class="col-md-3">
									<input type="textbox" name="" placeholder="Điểm số (1->5)">
								</div>
								<div class="col-md-9">
									<input type="textbox" class="width_100" name="" placeholder="Nhận xét">
								</div>
							</div>
						</div>
						<div class="question_as">
							<label>5.	Mức độ gắn bó lâu dài với tổ chức</label>
							<div class="answer_as">
								<div class="col-md-3">
									<input type="textbox" name="" placeholder="Điểm số (1->5)">
								</div>
								<div class="col-md-9">
									<input type="textbox" class="width_100" name="" placeholder="Nhận xét">
								</div>
							</div>
						</div>
						<div class="question_as">
							<label>6.	Tư duy đột phá và cải tiến liên tục</label>
							<div class="answer_as">
								<div class="col-md-3">
									<input type="textbox" name="" placeholder="Điểm số (1->5)">
								</div>
								<div class="col-md-9">
									<input type="textbox" class="width_100" name="" placeholder="Nhận xét">
								</div>
							</div>
						</div>
						<div class="question_as">
							<label>7.	Khả năng lập kế hoạch và triển khai hành động </label>
							<div class="answer_as">
								<div class="col-md-3">
									<input type="textbox" name="" placeholder="Điểm số (1->5)">
								</div>
								<div class="col-md-9">
									<input type="textbox" class="width_100" name="" placeholder="Nhận xét">
								</div>
							</div>
						</div>
						<div class="question_as">
							<label>8.	Tinh thần đồng đội, phối kết hợp</label>
							<div class="answer_as">
								<div class="col-md-3">
									<input type="textbox" name="" placeholder="Điểm số (1->5)">
								</div>
								<div class="col-md-9">
									<input type="textbox" class="width_100" name="" placeholder="Nhận xét">
								</div>
							</div>
						</div>
						<div class="question_as">
							<label>9.	Tiềm năng/ Khả năng lãnh đạo</label>
							<div class="answer_as">
								<div class="col-md-3">
									<input type="textbox" name="" placeholder="Điểm số (1->5)">
								</div>
								<div class="col-md-9">
									<input type="textbox" class="width_100" name="" placeholder="Nhận xét">
								</div>
							</div>
						</div>
						<div class="question_as">
							<label>10.	Sự phù hợp của ứng viên: Với công việc</label>
							<div class="answer_as">
								<div class="col-md-3">
									<input type="textbox" name="" placeholder="Điểm số (1->5)">
								</div>
								<div class="col-md-9">
									<input type="textbox" class="width_100" name="" placeholder="Nhận xét">
								</div>
							</div>
						</div>
						<div class="question_as">
							<label>11.	Sự phù hợp của ứng viên: Với văn hoá công ty</label>
							<div class="answer_as">
								<div class="col-md-3">
									<input type="textbox" name="" placeholder="Điểm số (1->5)">
								</div>
								<div class="col-md-9">
									<input type="textbox" class="width_100" name="" placeholder="Nhận xét">
								</div>
							</div>
						</div>
						<div class="question_as">
							<label>12.	Sự phù hợp của ứng viên: Với địa điểm làm việc</label>
							<div class="answer_as">
								<div class="col-md-3">
									<input type="textbox" name="" placeholder="Điểm số (1->5)">
								</div>
								<div class="col-md-9">
									<input type="textbox" class="width_100" name="" placeholder="Nhận xét">
								</div>
							</div>
						</div>
					</div>
					<div>
						<div class="title_ques">B.	Kỹ năng văn phòng</div>
						<div class="question_as">
							<label>•	Anh ngữ (nếu cần)</label>
							<div class="answer_as">
								<div class="col-md-3">
									<input type="textbox" name="" placeholder="Điểm số (1->5)">
								</div>
								<div class="col-md-9">
									<input type="textbox" class="width_100" name="" placeholder="Nhận xét">
								</div>
							</div>
						</div>
						<div class="question_as">
							<label>•	Vi tính (nếu cần)</label>
							<div class="answer_as">
								<div class="col-md-3">
									<input type="textbox" name="" placeholder="Điểm số (1->5)">
								</div>
								<div class="col-md-9">
									<input type="textbox" class="width_100" name="" placeholder="Nhận xét">
								</div>
							</div>
						</div>
						<div class="question_as">
							<label>•	Mức lương hiện tại:</label>
							<div class="answer_as">
								<div class="col-md-3">
									<input type="textbox" name="" placeholder="dạng số">
								</div>
								<div class="col-md-9">
									<input type="textbox" class="width_100" name="" placeholder="Nhận xét">
								</div>
							</div>
						</div>
						<div class="question_as">
							<label>•	Mức lương mong muốn:</label>
							<div class="answer_as">
								<div class="col-md-3">
									<input type="textbox" name="" placeholder="dạng số">
								</div>
								<div class="col-md-9">
									<input type="textbox" class="width_100" name="" placeholder="Nhận xét">
								</div>
							</div>
						</div>
						<div class="question_as">
							<label>•	Khác:</label>
							<div class="answer_as">
								<div class="col-md-12">
									<input type="textbox" class="width_100" name="" placeholder="dạng văn bản">
								</div>
							</div>
						</div>
					</div>
					<div>
						<div class="title_ques">C.	Nhận xét</div>
						<div class="question_as">
							<label></label>
							<div class="answer_as">
								<div class="col-md-12">
									<textarea class="width_100" rows="4" placeholder="dạng văn bản"></textarea>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="footer_as">
			<div>
				<button class="btn btn_start">Kết thúc</button>
			</div>
		</div>
	</section>
</div>


<div class="hide" id="operator_js"><?php echo json_encode($operator); ?></div>
<div class="hide" id="interviewer_js"><?php echo json_encode($interviewer); ?></div>
<style type="text/css">
	.margin_le_ri{
		margin-left: -20px;
		margin-right: -10px;
	}
	.del_ql {
		margin-top: -30px;
		margin-left: 10px;
		display: none;
		cursor: pointer;
	}
	.img-pv{
		width: 40px !important;
		height: 40px !important;
	}
	.padding_0{
		padding-left: 0;
		padding-right: 0;
	}
	.body-blac5a{
		font-size: 13px;
		font-weight: 500;
	}
	.body-blac5b {
	  color: #D9D9D9;
	  font-size: 13px;
	}
	a > span{
		font-size: 14px !important;
	}
	.margin_top_15{
		margin-top: 15px;
	}
	.margin_left_15{
		margin-left: 15px;
	}
	.margin_left_15 > p{
		color: #000000;
	  	font-family: ArialMT;
	  	font-size: 15px;
	  	font-weight: 400;
	  	line-height: 20px;
	  	text-align: left;
	}
	.border_bottom_f2{
		border-bottom: 1px solid #F2f2f2;
	}
	.width_100{
		width: 100%;
	}
</style>