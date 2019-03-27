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
						    	<a data-toggle="collapse" data-parent="#accordion" href="#collapse1" >
						       		<i class="fa fa-angle-right a-tabcs rotate rotate_1"></i>
						       	</a>
							    <ul class="nav nav-tabs ul-nav">
							        <li class="active"><a data-toggle="tab" href="#total" class="nemu-info-pf">Cá nhân</a></li>
							        <li ><a data-toggle="tab" href="#personal" class="nemu-info-pf" >Nội bộ</a></li>
							        <?php for ($i= 1; $i<= count($candidate_con);$i++) {
							        	echo '<li><a data-toggle="tab" href="#hs_'.$i.'" class="nemu-info-pf" >Hồ sơ '.$i.'</a></li>';
							        } ?>
							    </ul>
						    </div>
						    <!-- ket thuc phan heading cua tab 1 thong tin ung vien -->
						    <div id="collapse1" class="panel-collapse collapse in">
						      	<div class="panel-body tab-collapse">
							      	<div class="tab-content">

							        	<div id="total" class="tab-pane in active">
							        		<div class="panel-group bor-mar-b0">
												<div class="panel panel-default border-rad0">
												    <div class="panel-heading cyan-profile rad-pad0 height25">
												     	<div class="col-xs-11 tab_title">
												        	Tổng quát &nbsp;
												    	</div>
												        <div class="col-xs-1 tab_open">
												        	<a data-toggle="collapse" href="#collapsetotal1" class="a-expand">
								      						 <i class="fa fa-angle-right"></i></a>
												     	</div>
												    </div>
												    <!-- heading ho so ca nhan -->
												    <div id="collapsetotal1" class="panel-collapse collapse tab_con_canhan in">
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
											                    <div class="col-sm-8">
											                      <?php if (isset($document) && !empty($document)){
											                        $url = $document['url'];
											                        $name = $document['filename'];
											                      }else{$url =''; $name = '';}?>
											                        <label class="fontArial colorcyan labelcontent" ><a id="label1"  class="fontstyle" target="_blank" href="<?php echo $url; ?>"><?php echo $name; ?> </a></label>
											                    </div>
												         </div>
												  	  </div>
												    </div>
												    <!-- body ho so ca nhan -->
												</div>
												<!--   ket thuc ho so ca nhan -->
												<div class="panel panel-default border-rad0">
												    <div class="panel-heading cyan-profile rad-pad0 height25">
												     	<div class="col-xs-11 tab_title" >
												        	Cá nhân &nbsp;
												    	</div>
												        <div class="col-xs-1 tab_open">
												        	<a data-toggle="collapse" href="#collapsetotal21" class="a-expand">
								      						 <i class="fa fa-angle-right"></i></a>
												     	</div>
												    </div>
												    <!-- heading ho so ca nhan 2-->
												    <div id="collapsetotal21" class="panel-collapse collapse tab_con_canhan in">
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
												             <label class="fontArial colorgray labelcontent" ><?php
												              echo date("d-m-Y", strtotime($candidate['dateofbirth'] )); ?></label>
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
												             <label class="fontArial colorgray labelcontent" ><?php
												             echo date("d-m-Y", strtotime($candidate['dateofissue'] ));
												             ?></label>
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
												<div class="panel panel-default border-rad0">
											    	<div class="panel-heading cyan-profile rad-pad0 height25">
												     	<div class="col-xs-11 tab_title" >
												        	Liên hệ &nbsp;
												    	</div>
												        <div class="col-xs-1 tab_open">
												        	<a data-toggle="collapse" href="#collapsetotal31" class="a-expand">
								      						 <i class="fa fa-angle-right"></i></a>
												     	</div>
											    	</div>
											   		<!-- heading ho so ca nhan 3-->
											    	<div id="collapsetotal31" class="panel-collapse collapse tab_con_canhan in">
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
													             	 ?>
													              </label>
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
												<div class="panel panel-default border-rad0">
												    <div class="panel-heading cyan-profile rad-pad0 height25">
												     	<div class="col-xs-11 tab_title">
												        	Gia đình &nbsp;
												    	</div>
												        <div class="col-xs-1 tab_open">
												        	<a data-toggle="collapse" href="#collapsetotal41" class="a-expand">
								      						 <i class="fa fa-angle-right"></i></a>
												     	</div>
												    </div>
												    <!-- heading ho so ca nhan 4-->
												    <div id="collapsetotal41" class="panel-collapse collapse tab_con_canhan in">
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
												<div class="panel panel-default border-rad0">
												    <div class="panel-heading cyan-profile rad-pad0 height25">
												     	<div class="col-xs-11 tab_title">
												        	Kinh nghiệm &nbsp;
												    	</div>
												        <div class="col-xs-1 tab_open">
												        	<a data-toggle="collapse" href="#collapsetotal51" class="a-expand">
								      						 <i class="fa fa-angle-right"></i></a>
												     	</div>
												    </div>
												    <!-- heading ho so ca nhan 5-->
												    <div id="collapsetotal51" class="panel-collapse collapse tab_con_canhan in">
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
												<div class="panel panel-default border-rad0">
												    <div class="panel-heading cyan-profile rad-pad0 height25">
												     	<div class="col-xs-11 tab_title" >
												        	Học vấn &nbsp;
												    	</div>
												        <div class="col-xs-1 tab_open">
												        	<a data-toggle="collapse" href="#collapsetotal61" class="a-expand">
								      						 <i class="fa fa-angle-right"></i></a>
												     	</div>
												    </div>
												    <!-- heading ho so ca nhan 6-->
												    <div id="collapsetotal61" class="panel-collapse collapse tab_con_canhan in">
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
												<div class="panel panel-default border-rad0">
												    <div class="panel-heading cyan-profile rad-pad0 height25">
												     	<div class="col-xs-11 tab_title">
												        	Ngoại ngữ &nbsp;
												    	</div>
												        <div class="col-xs-1 tab_open">
												        	<a data-toggle="collapse" href="#collapsetotal71" class="a-expand">
								      						 <i class="fa fa-angle-right"></i></a>
												     	</div>
												    </div>
												    <!-- heading ho so ca nhan 7-->
												    <div id="collapsetotal71" class="panel-collapse collapse tab_con_canhan in">
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
												<div class="panel panel-default border-rad0">
												    <div class="panel-heading cyan-profile rad-pad0 height25">
												     	<div class="col-xs-11 tab_title">
												        	Tin học &nbsp;
												    	</div>
												        <div class="col-xs-1 tab_open" >
												        	<a data-toggle="collapse" href="#collapsetotal81" class="a-expand">
								      						 <i class="fa fa-angle-right"></i></a>
												     	</div>
												    </div>
												    <!-- heading ho so ca nhan 8-->
												    <div id="collapsetotal81" class="panel-collapse collapse tab_con_canhan in">
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
							       		 <!-- ket thuc id tab cá nhân -->

							       		<div id="personal" class="tab-pane">
							        		<div class="panel-group bor-mar-b0">
												<div class="panel panel-default border-rad0">
												    <div class="panel-heading cyan-profile rad-pad0 height25">
												     	<div class="col-xs-11 tab_title">
												        	Tổng quát &nbsp;
												    	</div>
												        <div class="col-xs-1 tab_open">
												        	<a data-toggle="collapse" href="#collapsetotal1" class="a-expand">
								      						 <i class="fa fa-angle-right"></i></a>
												     	</div>
												    </div>
												    <!-- heading ho so ca nhan -->
												    <div id="collapsetotal1" class="panel-collapse collapse tab_con_canhan in">
												      <div class="panel-body" style="border: 0px">
											     	 	 <div class="width100 row rowedit h-auto">
												            <label for="text" class="width20 col-xs-3 label-profile ">Giới thiệu</label>
												            <div class="width80 col-xs-9 padding-lr0">
												             <label class="fontArial colorgray labelcontent"><?php echo $candidate_noibo['introduction']?> </label>

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
												             <label class="width20 col-xs-3 fontArial colorgray labelcontent" ><?php echo number_format($candidate_noibo['currentbenefit'])?> </label>
												             <label for="text" class="width30 col-xs-3 label-profile" >Thu nhập mong muốn</label>
												             <label class="width30 col-xs-3 fontArial colorgray labelcontent"><?php echo number_format($candidate_noibo['desirebenefit'])?> </label>
												         </div>
												          <div class="width100 row rowedit h-auto">
												          		<label for="text" class="width20 col-xs-3 label-profile">Hồ sơ tải lên</label>
											                    <div class="col-sm-8">
											                      <?php if (isset($document_noibo) && !empty($document_noibo)){
											                        $url = $document_noibo['url'];
											                        $name = $document_noibo['filename'];
											                      }else{$url =''; $name = '';}?>
											                        <label class="fontArial colorcyan labelcontent" ><a id="label1"  class="fontstyle" target="_blank" href="<?php echo $url; ?>"><?php echo $name; ?> </a></label>
											                    </div>
												         </div>
												  	  </div>
												    </div>
												    <!-- body ho so ca nhan -->
												</div>
												<!--   ket thuc ho so ca nhan -->
												<div class="panel panel-default border-rad0">
												    <div class="panel-heading cyan-profile rad-pad0 height25">
												     	<div class="col-xs-11 tab_title" >
												        	Cá nhân &nbsp;
												    	</div>
												        <div class="col-xs-1 tab_open">
												        	<a data-toggle="collapse" href="#collapsetotal21" class="a-expand">
								      						 <i class="fa fa-angle-right"></i></a>
												     	</div>
												    </div>
												    <!-- heading ho so ca nhan 2-->
												    <div id="collapsetotal21" class="panel-collapse collapse tab_con_canhan in">
												      <div class="panel-body" style="border: 0px">
											     	 	 <div class="width100 row rowedit h-auto">
												            <label for="text" class="width20 col-xs-3 label-profile">Họ tên</label>
												            <div class="width80 col-xs-9 padding-lr0">
												             <label class="fontArial colorgray labelcontent"><?php echo $candidate_noibo['name']?></label>

												            </div>
												         </div>

												     	 <div class="width100 row rowedit h-auto">
												            <label for="text" class="width20 col-xs-3 label-profile">Ngày sinh</label>
												            <div class="width20 col-xs-3 padding-lr0">
												             <label class="fontArial colorgray labelcontent" ><?php
												              echo date("d-m-Y", strtotime($candidate_noibo['dateofbirth'] )); ?></label>
												            </div>
												            <div class="width20 col-xs-6 padding-lr0">
												             <label class="fontArial colorgray labelcontent" ><?php echo getAge($candidate_noibo['dateofbirth'])." tuổi"?></label>
												            </div>
												            <label for="text" class="width20 col-xs-3 label-profile">Giới tính</label>
												            <div class="width20 col-xs-3 padding-lr0">
												             <label class="fontArial colorgray labelcontent" ><?php echo ($candidate_noibo['gender'] == "M")? "Nam": "Nữ";?></label>
												            </div>
												         </div>
												          <div class="width100 row rowedit h-auto">
												             <label for="text" class="width20 col-xs-3 label-profile">Nơi Sinh</label>
												            <div class="width80 col-xs-9 padding-lr0">
												             <label class="fontArial colorgray labelcontent" ><?php echo $candidate_noibo['placeofbirth']?></label>
												            </div>

												         </div>
												          <div class="width100 row rowedit h-auto">
												            <label for="text" class="width20 col-xs-3 label-profile">Dân Tộc</label>
												            <div class="width20 col-xs-3 padding-lr0">
												             <label class="fontArial colorgray labelcontent" ><?php echo $candidate_noibo['ethnic']?></label>
												            </div>
												            <label for="text" class="width20 col-xs-3 label-profile">Quốc tịch</label>
												            <div class="width30 col-xs-3 padding-lr0">
												             <label class="fontArial colorgray labelcontent" ><?php echo $candidate_noibo['nationality']?></label>
												            </div>
												         </div>
												         <div class="width100 row rowedit h-auto">
												            <label for="text" class="width20 col-xs-3 label-profile">Chiều cao</label>
												            <div class="width20 col-xs-3 padding-lr0">
												             <label class="fontArial colorgray labelcontent" ><?php echo $candidate_noibo['height']?></label>
												            </div>
												            <label for="text" class="width20 col-xs-3 label-profile">Cân nặng</label>
												            <div class="width30 col-xs-3 padding-lr0">
												             <label class="fontArial colorgray labelcontent" ><?php echo $candidate_noibo['weight']?></label>
												            </div>
												         </div>
												         <div class="width100 row rowedit h-auto">
												            <label for="text" class="width20 col-xs-3 label-profile">CMND/ ID</label>
												            <div class="width20 col-xs-3 padding-lr0">
												             <label class="fontArial colorgray labelcontent" ><?php echo $candidate_noibo['idcard']?></label>
												            </div>
												            <label for="text" class="width20 col-xs-3 label-profile">Ngày cấp/ Nơi cấp</label>
												            <div class="width20 col-xs-3 padding-lr0">
												             <label class="fontArial colorgray labelcontent" ><?php
												             echo date("d-m-Y", strtotime($candidate_noibo['dateofissue'] ));
												             ?></label>
												            </div>
												            <div class="width20 col-xs-3 padding-lr0">
												             <label class="fontArial colorgray labelcontent" ><?php echo $candidate_noibo['placeofissue']?></label>
												            </div>
												         </div>

												  	  </div>
												    </div>
												    <!-- body ho so ca nhan 2-->
												</div>
												<!--   ket thuc ho so ca nhan 2-->
												<div class="panel panel-default border-rad0">
											    	<div class="panel-heading cyan-profile rad-pad0 height25">
												     	<div class="col-xs-11 tab_title" >
												        	Liên hệ &nbsp;
												    	</div>
												        <div class="col-xs-1 tab_open">
												        	<a data-toggle="collapse" href="#collapsetotal31" class="a-expand">
								      						 <i class="fa fa-angle-right"></i></a>
												     	</div>
											    	</div>
											   		<!-- heading ho so ca nhan 3-->
											    	<div id="collapsetotal31" class="panel-collapse collapse tab_con_canhan in">
													      <div class="panel-body" style="border: 0px">
												     	 	 <div class="width100 row rowedit h-auto">
													            <label for="text" class="width20 col-xs-3 label-profile">Email</label>
													            <div class="width80 col-xs-9 padding-lr0">
													             <label class="fontArial colorgray labelcontent"><?php echo $candidate_noibo['email']?></label>
													            </div>
													         </div>

													     	 <div class="width100 row rowedit h-auto">
													             <label for="text" class="width20 col-xs-3 label-profile">Địa chỉ thường trú</label>
													            <div class="width80 col-xs-9 padding-lr0">
													             <label class="fontArial colorgray labelcontent"><?php
													                  if($address_noibo != null)
													                  {
													                      foreach ($address_noibo as $key ) {
													                        if($key['addtype'] == "PREMANENT")
													                        {
													                          echo $key['address']; break;
													                        }
													                      }
													                  }
													             	 ?>
													              </label>
													            </div>
													         </div>
													          <div class="width100 row rowedit h-auto">
													             <label for="text" class="width20 col-xs-3 label-profile">Địa chỉ liên hệ</label>
													            <div class="width80 col-xs-9 padding-lr0">
													             <label class="fontArial colorgray labelcontent" >
													             	<?php
													                  if($address_noibo != null)
													                  {
													                      foreach ($address_noibo as $key ) {
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
													             <label class="fontArial colorgray labelcontent" ><?php echo $candidate_noibo['telephone'];?></label>
													            </div>
													        </div>
													         <div class="width100 row rowedit h-auto">
													            <label for="text" class="width20 col-xs-3 label-profile">Liên lạc khẩn cấp</label>
													            <div class="width30 col-xs-3 padding-lr0">
													             <label class="fontArial colorgray labelcontent" ><?php echo $candidate_noibo['emergencycontact'];?></label>
													            </div>
													         </div>

													  	  </div>
											    	</div>
											    	<!-- body ho so ca nhan 3-->
											  	</div>
												<!--   ket thuc ho so ca nhan 3-->
												<div class="panel panel-default border-rad0">
												    <div class="panel-heading cyan-profile rad-pad0 height25">
												     	<div class="col-xs-11 tab_title">
												        	Gia đình &nbsp;
												    	</div>
												        <div class="col-xs-1 tab_open">
												        	<a data-toggle="collapse" href="#collapsetotal41" class="a-expand">
								      						 <i class="fa fa-angle-right"></i></a>
												     	</div>
												    </div>
												    <!-- heading ho so ca nhan 4-->
												    <div id="collapsetotal41" class="panel-collapse collapse tab_con_canhan in">
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
														              <?php if($family_noibo != null) {
														                $i = 0;
														              foreach ($family_noibo as $key) { ?>
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
												<div class="panel panel-default border-rad0">
												    <div class="panel-heading cyan-profile rad-pad0 height25">
												     	<div class="col-xs-11 tab_title">
												        	Kinh nghiệm &nbsp;
												    	</div>
												        <div class="col-xs-1 tab_open">
												        	<a data-toggle="collapse" href="#collapsetotal51" class="a-expand">
								      						 <i class="fa fa-angle-right"></i></a>
												     	</div>
												    </div>
												    <!-- heading ho so ca nhan 5-->
												    <div id="collapsetotal51" class="panel-collapse collapse tab_con_canhan in">
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
													             <?php if($experience_noibo != null) {
													              $i = 0;
													              foreach ($experience_noibo as $key) { ?>
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
													             <?php if($reference_noibo != null) {
													              $i = 0;
													              foreach ($reference_noibo as $key) { ?>
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
												<div class="panel panel-default border-rad0">
												    <div class="panel-heading cyan-profile rad-pad0 height25">
												     	<div class="col-xs-11 tab_title" >
												        	Học vấn &nbsp;
												    	</div>
												        <div class="col-xs-1 tab_open">
												        	<a data-toggle="collapse" href="#collapsetotal61" class="a-expand">
								      						 <i class="fa fa-angle-right"></i></a>
												     	</div>
												    </div>
												    <!-- heading ho so ca nhan 6-->
												    <div id="collapsetotal61" class="panel-collapse collapse tab_con_canhan in">
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
													              <?php if($knowledge_noibo != null) {
													                $i = 0;
													              foreach ($knowledge_noibo as $key) {
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
													             <?php if($knowledge_noibo != null) {
													               $i = 0;
													              foreach ($knowledge_noibo as $key) {
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
												<div class="panel panel-default border-rad0">
												    <div class="panel-heading cyan-profile rad-pad0 height25">
												     	<div class="col-xs-11 tab_title">
												        	Ngoại ngữ &nbsp;
												    	</div>
												        <div class="col-xs-1 tab_open">
												        	<a data-toggle="collapse" href="#collapsetotal71" class="a-expand">
								      						 <i class="fa fa-angle-right"></i></a>
												     	</div>
												    </div>
												    <!-- heading ho so ca nhan 7-->
												    <div id="collapsetotal71" class="panel-collapse collapse tab_con_canhan in">
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
													            <?php if($language_noibo != null) {
													              $i = 0;
													              foreach ($language_noibo as $key) {
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
												<div class="panel panel-default border-rad0">
												    <div class="panel-heading cyan-profile rad-pad0 height25">
												     	<div class="col-xs-11 tab_title">
												        	Tin học &nbsp;
												    	</div>
												        <div class="col-xs-1 tab_open" >
												        	<a data-toggle="collapse" href="#collapsetotal81" class="a-expand">
								      						 <i class="fa fa-angle-right"></i></a>
												     	</div>
												    </div>
												    <!-- heading ho so ca nhan 8-->
												    <div id="collapsetotal81" class="panel-collapse collapse tab_con_canhan in">
												    	 <div class="panel-body" style="border: 0px">
														     <table   class="table table-striped table-bordered" >
													            <thead class="fontstyle">
													              <tr>
													                <th id="th" width="60%">Phần mềm</th>
													                <th id="th" width="30%">Trình độ</th>
													              </tr>
													            </thead>
													            <tbody class="fontstyle text-center">
													             <?php if($software_noibo != null) {
													              $i = 0;
													              foreach ($software_noibo as $key) {
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
							       		 <!-- ket thuc id tab nội bộ -->

							       		<?php $hs = 1; foreach ($candidate_con as $key_con =>$value_con) { ?>
							       			<div id="hs_<?php echo $hs ?>" class="tab-pane">
								        		<div class="panel-group bor-mar-b0">
													<div class="panel panel-default border-rad0">
													    <div class="panel-heading cyan-profile rad-pad0 height25">
													     	<div class="col-xs-11 tab_title">
													        	Tổng quát &nbsp;
													    	</div>
													        <div class="col-xs-1 tab_open">
													        	<a data-toggle="collapse" href="#collapsetotal1" class="a-expand">
									      						 <i class="fa fa-angle-right"></i></a>
													     	</div>
													    </div>
													    <!-- heading ho so ca nhan -->
													    <div id="collapsetotal1" class="panel-collapse collapse tab_con_canhan in">
													      <div class="panel-body" style="border: 0px">
												     	 	 <div class="width100 row rowedit h-auto">
													            <label for="text" class="width20 col-xs-3 label-profile ">Giới thiệu</label>
													            <div class="width80 col-xs-9 padding-lr0">
													             <label class="fontArial colorgray labelcontent"><?php echo $value_con['introduction']?> </label>

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
													             <label class="width20 col-xs-3 fontArial colorgray labelcontent" ><?php echo number_format($value_con['currentbenefit'])?> </label>
													             <label for="text" class="width30 col-xs-3 label-profile" >Thu nhập mong muốn</label>
													             <label class="width30 col-xs-3 fontArial colorgray labelcontent"><?php echo number_format($value_con['desirebenefit'])?> </label>
													         </div>
													          <div class="width100 row rowedit h-auto">
													          		<label for="text" class="width20 col-xs-3 label-profile">Hồ sơ tải lên</label>
												                    <div class="col-sm-8">
												                      <?php if (isset($document_con[$key_con]) && !empty($document_con[$key_con])){
												                        $url = $document_con[$key_con]['url'];
												                        $name = $document_con[$key_con]['filename'];
												                      }else{$url =''; $name = '';}?>
												                        <label class="fontArial colorcyan labelcontent" ><a id="label1"  class="fontstyle" target="_blank" href="<?php echo $url; ?>"><?php echo $name; ?> </a></label>
												                    </div>
													         </div>
													  	  </div>
													    </div>
													    <!-- body ho so ca nhan -->
													</div>
													<!--   ket thuc ho so ca nhan -->
													<div class="panel panel-default border-rad0">
													    <div class="panel-heading cyan-profile rad-pad0 height25">
													     	<div class="col-xs-11 tab_title" >
													        	Cá nhân &nbsp;
													    	</div>
													        <div class="col-xs-1 tab_open">
													        	<a data-toggle="collapse" href="#collapsetotal21" class="a-expand">
									      						 <i class="fa fa-angle-right"></i></a>
													     	</div>
													    </div>
													    <!-- heading ho so ca nhan 2-->
													    <div id="collapsetotal21" class="panel-collapse collapse tab_con_canhan in">
													      <div class="panel-body" style="border: 0px">
												     	 	 <div class="width100 row rowedit h-auto">
													            <label for="text" class="width20 col-xs-3 label-profile">Họ tên</label>
													            <div class="width80 col-xs-9 padding-lr0">
													             <label class="fontArial colorgray labelcontent"><?php echo $value_con['name']?></label>

													            </div>
													         </div>

													     	 <div class="width100 row rowedit h-auto">
													            <label for="text" class="width20 col-xs-3 label-profile">Ngày sinh</label>
													            <div class="width20 col-xs-3 padding-lr0">
													             <label class="fontArial colorgray labelcontent" ><?php
													              echo date("d-m-Y", strtotime($value_con['dateofbirth'] )); ?></label>
													            </div>
													            <div class="width20 col-xs-6 padding-lr0">
													             <label class="fontArial colorgray labelcontent" ><?php echo getAge($value_con['dateofbirth'])." tuổi"?></label>
													            </div>
													            <label for="text" class="width20 col-xs-3 label-profile">Giới tính</label>
													            <div class="width20 col-xs-3 padding-lr0">
													             <label class="fontArial colorgray labelcontent" ><?php echo ($value_con['gender'] == "M")? "Nam": "Nữ";?></label>
													            </div>
													         </div>
													          <div class="width100 row rowedit h-auto">
													             <label for="text" class="width20 col-xs-3 label-profile">Nơi Sinh</label>
													            <div class="width80 col-xs-9 padding-lr0">
													             <label class="fontArial colorgray labelcontent" ><?php echo $value_con['placeofbirth']?></label>
													            </div>

													         </div>
													          <div class="width100 row rowedit h-auto">
													            <label for="text" class="width20 col-xs-3 label-profile">Dân Tộc</label>
													            <div class="width20 col-xs-3 padding-lr0">
													             <label class="fontArial colorgray labelcontent" ><?php echo $value_con['ethnic']?></label>
													            </div>
													            <label for="text" class="width20 col-xs-3 label-profile">Quốc tịch</label>
													            <div class="width30 col-xs-3 padding-lr0">
													             <label class="fontArial colorgray labelcontent" ><?php echo $value_con['nationality']?></label>
													            </div>
													         </div>
													         <div class="width100 row rowedit h-auto">
													            <label for="text" class="width20 col-xs-3 label-profile">Chiều cao</label>
													            <div class="width20 col-xs-3 padding-lr0">
													             <label class="fontArial colorgray labelcontent" ><?php echo $value_con['height']?></label>
													            </div>
													            <label for="text" class="width20 col-xs-3 label-profile">Cân nặng</label>
													            <div class="width30 col-xs-3 padding-lr0">
													             <label class="fontArial colorgray labelcontent" ><?php echo $value_con['weight']?></label>
													            </div>
													         </div>
													         <div class="width100 row rowedit h-auto">
													            <label for="text" class="width20 col-xs-3 label-profile">CMND/ ID</label>
													            <div class="width20 col-xs-3 padding-lr0">
													             <label class="fontArial colorgray labelcontent" ><?php echo $value_con['idcard']?></label>
													            </div>
													            <label for="text" class="width20 col-xs-3 label-profile">Ngày cấp/ Nơi cấp</label>
													            <div class="width20 col-xs-3 padding-lr0">
													             <label class="fontArial colorgray labelcontent" ><?php
													             echo date("d-m-Y", strtotime($value_con['dateofissue'] ));
													             ?></label>
													            </div>
													            <div class="width20 col-xs-3 padding-lr0">
													             <label class="fontArial colorgray labelcontent" ><?php echo $value_con['placeofissue']?></label>
													            </div>
													         </div>

													  	  </div>
													    </div>
													    <!-- body ho so ca nhan 2-->
													</div>
													<!--   ket thuc ho so ca nhan 2-->
													<div class="panel panel-default border-rad0">
												    	<div class="panel-heading cyan-profile rad-pad0 height25">
													     	<div class="col-xs-11 tab_title" >
													        	Liên hệ &nbsp;
													    	</div>
													        <div class="col-xs-1 tab_open">
													        	<a data-toggle="collapse" href="#collapsetotal31" class="a-expand">
									      						 <i class="fa fa-angle-right"></i></a>
													     	</div>
												    	</div>
												   		<!-- heading ho so ca nhan 3-->
												    	<div id="collapsetotal31" class="panel-collapse collapse tab_con_canhan in">
														      <div class="panel-body" style="border: 0px">
													     	 	 <div class="width100 row rowedit h-auto">
														            <label for="text" class="width20 col-xs-3 label-profile">Email</label>
														            <div class="width80 col-xs-9 padding-lr0">
														             <label class="fontArial colorgray labelcontent"><?php echo $value_con['email']?></label>
														            </div>
														         </div>

														     	 <div class="width100 row rowedit h-auto">
														             <label for="text" class="width20 col-xs-3 label-profile">Địa chỉ thường trú</label>
														            <div class="width80 col-xs-9 padding-lr0">
														             <label class="fontArial colorgray labelcontent"><?php
														                  if($address_con[$key_con] != null)
														                  {
														                      foreach ($address_con[$key_con] as $key ) {
														                        if($key['addtype'] == "PREMANENT")
														                        {
														                          echo $key['address']; break;
														                        }
														                      }
														                  }
														             	 ?>
														              </label>
														            </div>
														         </div>
														          <div class="width100 row rowedit h-auto">
														             <label for="text" class="width20 col-xs-3 label-profile">Địa chỉ liên hệ</label>
														            <div class="width80 col-xs-9 padding-lr0">
														             <label class="fontArial colorgray labelcontent" >
														             	<?php
														                  if($address_con[$key_con] != null)
														                  {
														                      foreach ($address_con[$key_con] as $key ) {
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
														             <label class="fontArial colorgray labelcontent" ><?php echo $value_con['telephone'];?></label>
														            </div>
														        </div>
														         <div class="width100 row rowedit h-auto">
														            <label for="text" class="width20 col-xs-3 label-profile">Liên lạc khẩn cấp</label>
														            <div class="width30 col-xs-3 padding-lr0">
														             <label class="fontArial colorgray labelcontent" ><?php echo $value_con['emergencycontact'];?></label>
														            </div>
														         </div>

														  	  </div>
												    	</div>
												    	<!-- body ho so ca nhan 3-->
												  	</div>
													<!--   ket thuc ho so ca nhan 3-->
													<div class="panel panel-default border-rad0">
													    <div class="panel-heading cyan-profile rad-pad0 height25">
													     	<div class="col-xs-11 tab_title">
													        	Gia đình &nbsp;
													    	</div>
													        <div class="col-xs-1 tab_open">
													        	<a data-toggle="collapse" href="#collapsetotal41" class="a-expand">
									      						 <i class="fa fa-angle-right"></i></a>
													     	</div>
													    </div>
													    <!-- heading ho so ca nhan 4-->
													    <div id="collapsetotal41" class="panel-collapse collapse tab_con_canhan in">
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
															              <?php if($family_con[$key_con] != null) {
															                $i = 0;
															              foreach ($family_con[$key_con] as $key) { ?>
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
													<div class="panel panel-default border-rad0">
													    <div class="panel-heading cyan-profile rad-pad0 height25">
													     	<div class="col-xs-11 tab_title">
													        	Kinh nghiệm &nbsp;
													    	</div>
													        <div class="col-xs-1 tab_open">
													        	<a data-toggle="collapse" href="#collapsetotal51" class="a-expand">
									      						 <i class="fa fa-angle-right"></i></a>
													     	</div>
													    </div>
													    <!-- heading ho so ca nhan 5-->
													    <div id="collapsetotal51" class="panel-collapse collapse tab_con_canhan in">
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
														             <?php if($experience_con[$key_con] != null) {
														              $i = 0;
														              foreach ($experience_con[$key_con] as $key) { ?>
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
														             <?php if($reference_con[$key_con] != null) {
														              $i = 0;
														              foreach ($reference_con[$key_con] as $key) { ?>
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
													<div class="panel panel-default border-rad0">
													    <div class="panel-heading cyan-profile rad-pad0 height25">
													     	<div class="col-xs-11 tab_title" >
													        	Học vấn &nbsp;
													    	</div>
													        <div class="col-xs-1 tab_open">
													        	<a data-toggle="collapse" href="#collapsetotal61" class="a-expand">
									      						 <i class="fa fa-angle-right"></i></a>
													     	</div>
													    </div>
													    <!-- heading ho so ca nhan 6-->
													    <div id="collapsetotal61" class="panel-collapse collapse tab_con_canhan in">
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
														              <?php if($knowledge_con[$key_con] != null) {
														                $i = 0;
														              foreach ($knowledge_con[$key_con] as $key) {
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
														             <?php if($knowledge_con[$key_con] != null) {
														               $i = 0;
														              foreach ($knowledge_con[$key_con] as $key) {
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
													<div class="panel panel-default border-rad0">
													    <div class="panel-heading cyan-profile rad-pad0 height25">
													     	<div class="col-xs-11 tab_title">
													        	Ngoại ngữ &nbsp;
													    	</div>
													        <div class="col-xs-1 tab_open">
													        	<a data-toggle="collapse" href="#collapsetotal71" class="a-expand">
									      						 <i class="fa fa-angle-right"></i></a>
													     	</div>
													    </div>
													    <!-- heading ho so ca nhan 7-->
													    <div id="collapsetotal71" class="panel-collapse collapse tab_con_canhan in">
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
														            <?php if($language_con[$key_con] != null) {
														              $i = 0;
														              foreach ($language_con[$key_con] as $key) {
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
													<div class="panel panel-default border-rad0">
													    <div class="panel-heading cyan-profile rad-pad0 height25">
													     	<div class="col-xs-11 tab_title">
													        	Tin học &nbsp;
													    	</div>
													        <div class="col-xs-1 tab_open" >
													        	<a data-toggle="collapse" href="#collapsetotal81" class="a-expand">
									      						 <i class="fa fa-angle-right"></i></a>
													     	</div>
													    </div>
													    <!-- heading ho so ca nhan 8-->
													    <div id="collapsetotal81" class="panel-collapse collapse tab_con_canhan in">
													    	 <div class="panel-body" style="border: 0px">
															     <table   class="table table-striped table-bordered" >
														            <thead class="fontstyle">
														              <tr>
														                <th id="th" width="60%">Phần mềm</th>
														                <th id="th" width="30%">Trình độ</th>
														              </tr>
														            </thead>
														            <tbody class="fontstyle text-center">
														             <?php if($software_con[$key_con] != null) {
														              $i = 0;
														              foreach ($software_con[$key_con] as $key) {
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
							       		<?php $hs++; } ?>
							    	</div>
						      	</div>
						    </div>
						    <!-- ket thuc body cua tab 1 thong tin ung vien -->
					  	</div>
					  	<!-- ket thuc tat ca tab 1 thong tin ung vien -->

					  	<div class="panel panel-default border-rad0">
						  	<a data-toggle="collapse" data-parent="#accordion" href="#collapse2" >
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
						      		<?php
							      		 foreach ($history as $row) {
							      			$share  = $comment = $icon = $interviewer = $display = '';
							      			$createddate  = date_format(date_create($row['createddate']),"d/m/Y - H:i");
							      			if ($row['filename'] == '') {
							      				$image = 'bbye.jpg';
							      			}else{
							      				$image = $row['filename'];
							      			}
							      			$check = 0;
							      			if (isset($row['isshare']) && $row['isshare'] == 'N'){
							      				$share 		= '<label class="colorgray fontArial show-view" >Hiện thị với tất cả mọi người</label>';
							      				$display 	= '';
							      			}else if ($row['isshare'] == 'Y' && $row['createdby'] == $this->session->userdata('user_admin')['operatorid']) {
							      				$display 	= '';
							      			}else{
							      				$display 	= 'hide';
							      			}

							      			if (isset($row['asmtid'])) {
							      				$fa 			= '<a onclick="loadAssessment('.$row['asmtid'].')" target="_blank"><i class="fa fa-file-text-o star-icon1"></i></a>';
							      				$type 			= ' Tạo phiếu trắc nghiệm - '.$createddate;
							      				$comment 		= '<div>'.$row['asmtname'].' Cấu trúc: '.$row['count_section'].' phần - '.$row['count_question'].' câu - Trộn tạo thành '.$row['shuffleqty'].' câu</div>';
							      				if ($row['status'] == 'W') {
								      				$comment 	.= '<div class="color-sign-in">Trạng thái: Đang thực hiện</div>';
								      				$check 		= 1;
							      				}
							      				else if ($row['status'] == 'C') {
								      				$comment 	= '<div class="color-sign-in">Trạng thái: Hoàn thành ('.$row['count_answer'].'/'.$row['count_question'].') - Kết quả: '.$row['score_answer'].'/'.(int)$row['targetscore'].'/'.$row['score_genquest'].'</div>';
								      				$check 		= 1;
							      				}
							      				else if ($row['status'] == 'D') {
								      				$icon 		= '<div class="pull-right"><i class="fa fa-trash-o fa-lg color-trash"></i></div>';
								      				$comment 	.= '<div class="color-sign-in">Trạng thái: Hủy phiếu - bởi '.$row['nameupdate'].' - '.date_format(date_create($row['lastupdate']),"d/m/Y - H:i").'</div>';
								      				$check 		= 1;
							      				}
							      				else {
								      				$comment 	.= '<div class="color-sign-in">Trạng thái: Chưa thực hiện </div>';
								      				$check 		= 1;
							      				}
							      			}else if (isset($row['interviewid'])) {
							      				$thu 			= date_format(date_create($row['intdate']),"N");
												if ($thu != 7) {
													$temp 		= (int)$thu+1;
													$thu 		= 'Thứ '.(string)$temp;
												}else{
													$thu 		= 'Chủ Nhật';
												}
												$ngay 			=  date_format(date_create($row['intdate']),"d");
												$thang 			=  date_format(date_create($row['intdate']),"m");
												$nam 			=  date_format(date_create($row['intdate']),"Y");
												$from 			=  date_format(date_create($row['timefrom']),"H:i");
												$to 			=  date_format(date_create($row['timeto']),"H:i");
												$fa 			= '<a onclick="loadAppointment('.$row['interviewid'].')" target="_blank"><i class="fa fa-calendar star-icon1"></i></a>';
												$type 			= ' Tạo lịch hẹn '.$row['roundname'].' - '.$createddate;
												$comment 		= $thu.', '.$ngay.' Tháng '.$thang.' Năm '.$nam.'<br>'.$row['location'];
												if (!empty($row['interviewer'])) {
							      					$interviewer 		= '<div class="row">';
							      					foreach ($row['interviewer'] as $key) {
							      						$icon_h ='';
							      						if ($key['status'] == 'C') {
							      							if ($key['optionid'] == '1') {
							      								$status 	= '<div class="colorsuccess fontArial show-view" >Đã xác nhận</div>';
							      							}
							      							else if($key['optionid'] == '2'){
							      								$date 		=  date_format(date_create($key['ansdatetime']),"d/m/Y");
							      								$from 		=  date_format(date_create($key['ansdatetime']),"H:i");
																$to 		=  date_format(date_create($key['ansdatetime2']),"H:i");
							      								$status 	= '<div class="colorred fontArial show-view" >Tham dự vào ngày khác </div><div>'.$from.' - '.$to.' '.$date.'</div>';
								      						}
								      						else if($key['optionid'] == '3'){
							      								$status 	= '<div class="colorred fontArial show-view" >Không tham dự </div>';
								      						}
							      						}else{
								      							$status 	= '<div class="colorgray fontArial show-view" >Chờ xác nhận </div>';
								      					}
								      					if ($key['scr_asmtid'] != '0') {
								      						$icon_h 		= ' <i class="fa fa-file-o"></i>';
								      					}
                                                        $img_a = ($key['filename'] != '')? $key['filename'] : 'unknow.jpg';
								      					$interviewer 	.= '<div class="col-xs-3"><img src="'.base_url().'public/image/'.$img_a.'"  class="img_profile">'.$key['operatorname'].$icon_h.$status.'</div>';
								      				}
								      				$interviewer 		.= '</div>';
							      				}

							      				if ($row['status'] == "W") {
								      				$comment 	.= '<br><div class="color-sign-in">Trạng thái: Chờ phỏng vấn </div>';
								      				$check 		= 1;
							      				}
							      				else if ($row['status'] == "C") {
								      				$comment 	.= '<br><div class="color-sign-in">Trạng thái: Đã phỏng vấn </div>';
								      				$check 		= 1;
							      				}
							      				else if ($row['status'] == "D") {
								      				$comment 	.= '<br><div class="color-sign-in">Trạng thái: Hủy phỏng vấn </div>';
								      				$check 		= 1;
							      				}
							      			}

							      			if($check == 1){
							      		?>
						      			<tr class= "<?php echo $display ?> ">
							      			<td class="table-history" style="width: 4%;padding-top: 10px;"><?php echo $fa ?> </td>
							      			<td class="table-his-cont" style="width: 96%">
							      				<img src="<?php echo base_url().'public/image/'.$image?>"  width="32px" height="32px" style="float:left; margin-right: 4px">
							      				<div class="col-xs-11 mr-pd">
							      					<label class="text-his fontArial" style="margin-bottom: 2px"><span style="font-weight: 600"><?php echo $row['operatorname'] ?> </span><span class="colorgray"><?php echo $type ?> </span></label><?php echo isset($icon) ? $icon : '' ?>
							      					<br>
							      					<?php echo isset($share) ? $share : '' ?>
							      					<?php echo $comment ?>
		      										<?php echo isset($interviewer) ? $interviewer : '' ?>
							      				</div>

							      			</td>
							      		</tr>
						      		<?php  }} ?>


						      	</table>
						      </div>
						    </div>
					  	</div>
					</div>
				</div>
				<form id="form_ans">
					<input type="hidden" name="interviewerid" value="<?php echo $interviewerid ?>">
					<input type="hidden" name="interviewid" value="<?php echo $interviewid ?>">
					<input type="hidden" name="asmtid" value="<?php echo(isset($asmtid)?$asmtid:'')?>">
                    <input type="hidden" name="candidateid" value="<?php echo(isset($interview['candidateid'])?$interview['candidateid']:'')?>">
                    <input type="hidden" name="campaignid" value="<?php echo(isset($interview['campaignid'])?$interview['campaignid']:'')?>">
					<div class="row desc_as">
						<label>Phiếu phỏng vấn</label>

					</div>
					<?php if(isset($section)&&!empty($section)) foreach ($section as $sec) {?>
					<div>
						<div class="title_ques"> <?php echo($sec['sectionname'])?></div>
						<?php if(isset($sec['question'])&&!empty($sec['question'])) foreach ($sec['question'] as $ques) {	?>
						<div class="question_as">
							<label>	<?php echo($ques['questioncontent'])?></label>
							<?php if($ques['questiontype']=='scores'){?>
							<div class="answer_as">
								<div class="col-md-3">
									<!-- <input type="textbox" required="" name="question[<?php echo($ques['questionid'])?>][ansnumeric]" placeholder="Điểm số (<?php echo number_format($ques['scorefrom'])?>-><?php echo number_format($ques['scoreto'])?>)"> -->
									<select name="question[<?php echo($ques['questionid'])?>][ansnumeric]" required="" class="select2 width_100">
										<?php for ($i=number_format($ques['scorefrom']); $i <= number_format($ques['scoreto']); $i++) {
											echo "<option>".$i."</option>";
										} ?>
									</select>
								</div>
								<div class="col-md-9">
									<textarea name="question[<?php echo($ques['questionid'])?>][anstext]" class="width_100" rows="3" placeholder="Nhận xét"></textarea>
									<!-- <input type="textbox" class="width_100" name="question[<?php echo($ques['questionid'])?>][anstext]" placeholder="Nhận xét"> -->
								</div>
							</div>
							<?php }elseif($ques['questiontype']=='text'){ ?>
							<div class="answer_as">
								<div class="col-md-12">
									<textarea name="question[<?php echo($ques['questionid'])?>][anstext]" class="width_100" rows="4" placeholder="dạng văn bản"></textarea>
								</div>
							</div>
							<?php }?>
						</div>
						<?php }?>
					</div>
					<?php }?>
			</div>
		</div>
		<div class="footer_as">
			<div>
				<button type="submit" class="btn btn_start" id="btn_end"><i></i> Kết thúc</button>
			</div>
		</div>
	</form>
	</section>
</div>


<!-- <div class="hide" id="operator_js"><?php echo json_encode($operator); ?></div>
<div class="hide" id="interviewer_js"><?php echo json_encode($interviewer); ?></div> -->
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
	.height25 {
		height: 25px;
	}
	.tab_title{
		text-align: left;
	}
	.tab_open{
		text-align: right;
	}
	.img_profile {
	float: left;
	margin-right: 4px;
	width: 32px;
	height: 32px;
	}
</style>
<script type="text/javascript">
	$(document).ready(function() {
		$('.select2').select2();
	});
	$('#form_ans').on('submit',function(){
		var cur = $(this);
		var button = $('#btn_end');
		var icon   = button.find('i');
		console.log(button);
		icon.addClass('fa fa-spin fa-spinner');

		var form = new FormData($(this)[0]);
		for(let[key,value] of form.entries()){
			console.log(key+'->'+value);
		}
		$.ajax({
			url: '<?php echo base_url("admin/multiplechoice/save_answer")?>',
			type: 'POST',
			dataType: 'json',
			data: form,
			contentType: false,
          	cache: false,
          	processData:false,
		})
		.done(function(e) {
			console.log(e);
			//alert("Tất cả các câu trả lời đã được lưu.");
			cur.before('<p class="colorcyan">Tất cả các câu trả lời đã được lưu.</p>\
					<p class="colorcyan">Xin chân thành cảm ơn!!! </p>');
			cur.addClass('hide');
			button.addClass('hide');
		})
		.fail(function(error) {
			icon.removeClass();
			console.log(error);
		})
		return false;
	});
	function loadAppointment(interviewid) {
		window.open('<?php echo base_url() ?>admin/multiplechoice/makingAppointment/'+interviewid);
	}
	function loadAssessment(asmtid) {
		window.open('<?php echo base_url() ?>admin/multiplechoice/pageAssessment/'+asmtid+'/0');
	}

</script>