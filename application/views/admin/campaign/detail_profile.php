
<?php if ($id != ''): ?>
	<form id="form_checkone">	
	<input type="hidden" name="campaignid" value="<?php echo $campaignid ?>">
 	<input type="hidden" name="roundid" value="<?php echo $roundid ?>">
	<input type="hidden" name="check[]" id="checkoneid" value="<?php echo $candidate['candidateid']?>" >
</form>
<input type="hidden" id="candidatename" value="<?php echo $candidate['name']?>">
<input type="hidden" id="candidateimage" value="<?php echo $candidate['imagelink']?>">
<input type="hidden" id="candidateemail" value="<?php echo $candidate['email']?>">
<div style="background-color: white">
	<div class="row rowedit">
		<div class="col-md-6 col-xs-6">
			<label class="margin-t5 margin-b0" >
				<i class="fa fa-bell<?php echo ($candidate['unsubcribe'] == 'Y')? "-slash" : "";?> icon-detail"></i>
				<i class="fa fa-user icon-detail2"></i>
				<i class="fa fa-clock-o icon-detail3"></i>
			</label>
		</div>
		<div class="col-md-6 col-xs-6 hov-btn-ad">
			<button type="button" class="np-icon btn_chuyen dropdown-toggle" data-toggle="dropdown">Chuyển</button>
    		<ul class="dropdown-menu" role="menu">
                <li><a  onclick="transfer(1)">Chuyển vòng</a></li>
                <li><a  onclick="transfer(0)">Loại hồ sơ</a></li>

                <!-- <li><a  onclick="createMChoice()">Tạo Trắc nghiệm</a></li> -->
                <!-- <li><a  onclick="createAppointment()">Tạo lịch hẹn phỏng vấn</a></li> -->
                <!-- <li><a  onclick="createInterviewer()">Tạo người phỏng vấn</a></li> -->
      		</ul>
				<button type="button" class="btn-icon-header margin-r7" ><i class="fa fa-print color-ccc" ></i></button>
				<button type="button" class="btn-icon-header margin-r7" ><i class="fa fa-envelope-o color-ccc" ></i></button>
				<div class=""> 
					<button type="button" class="btn-icon-header margin-r7" id="starbtn" data-toggle="dropdown" >
						<span class="fa-stack fa-1x fixicon">
						  <i class="fa fa-star <?php echo ($candidate['istalent'] == '0')? "color-gray" : "color-orange";?> fa-stack-2x star-icon" id="iconstar_profile"></i>
						  <span class="fa fa-stack-1x color-white star-texta" id="textstar_profile"><?php echo ($candidate['istalent'] == 0)? "": $candidate['istalent'];?></span>
						</span></button>
					<div class="dropdown-menu star-pos2">
						<a type="button" onclick="talent_detail(0)" class="btn-none"><span class="fa-stack fa-1x" title="Ứng viên không tiềm năng">
						  <i class="fa fa-star color-gray fa-stack-2x star-icon"></i>
						  <span class="fa fa-stack-1x color-white star-text"></span>
						</span>
						</a>
						<a type="button" onclick="talent_detail(1)" class="btn-none"><span class="fa-stack fa-1x" title="Ứng viên tiềm năng mức 1">
						  <i class="fa fa-star color-orange fa-stack-2x star-icon" ></i>
						  <span class="fa fa-stack-1x color-white star-text">1</span>
						</span></a>
						<a type="button" onclick="talent_detail(2)" class="btn-none"><span class="fa-stack fa-1x" title="Ứng viên tiềm năng mức 2">
						  <i class="fa fa-star color-orange fa-stack-2x star-icon"></i>
						  <span class="fa fa-stack-1x color-white star-text">2</span>
						</span></a>
						<a type="button" onclick="talent_detail(3)" class="btn-none"><span class="fa-stack fa-1x" title="Ứng viên tiềm năng mức 3">
						  <i class="fa fa-star color-orange fa-stack-2x star-icon" ></i>
						  <span class="fa fa-stack-1x color-white star-text" >3</span>
						</span></a>
				    </div>
				</div>
				<button type="button" class="btn-icon-header margin-r7" onclick="changeblock(this)" value="<?php echo $candidate['blocked'];?>" id="checkchange">
					<?php if($candidate['blocked'] == 'Y') { ?> 
						<i class="fa fa-ban color-red size-icon" ></i>
						<?php } else { ?>
						<i class="fa fa-check-circle-o color-green size-icon"></i> 
						<?php } ?>
				</button>
				<?php if ($roundtype == 'Assessment'){ ?>
					<button type="button" class="btn-icon-header margin-r7" onclick="createMChoice()" ><i class="fa fa-file-text-o color-ccc" ></i></button>
				<?php }else if ($roundtype == 'Interview') { ?>
					<button type="button" class="btn-icon-header margin-r7" onclick="createAppointment()" ><i class="fa fa-calendar color-ccc" ></i></button>
				<?php }else if ($roundtype == 'Offer') { ?>
					<button type="button" class="btn-icon-header margin-r7" onclick="createOffer()" ><i class="fa fa-handshake-o color-ccc" ></i></button>
				<?php }else if ($roundtype == 'Recruite'){ 
					if ($recruite == 0) { ?>
					<button type="button" class="btn-icon-header margin-r7" id="btn_recruite" onclick="recruite()" ><i class="fa fa-flag color-ccc" ></i></button>
				<?php }else{ ?>
					<button type="button" class="btn-icon-header margin-r7" disabled="" id="btn_recruite" onclick="recruite()" ><i class="fa fa-flag color-flag-recruite" ></i></button>
				<?php }} ?>
				
		</div>
	</div>
	<div class="margin-t4 dash-horizontal"  ></div>
	<img src="<?php echo base_url()?>public/image/<?php echo $candidate['imagelink'] ?>" class="image-avatar-ad" width="130px" height="130px">
	<div class="row rowcontent">
		<div class="col-md-6 col-xs-6">

			<label class="can-name"><?php echo $candidate['name']?> <?php echo ($recruite >0)? '<i class="fa fa-flag color-flag-recruite" ></i>' : '' ?></label>
			<label class="cv-old"><?php echo $vt['position'].' - '.$vt['company'] ?></label>
			<label class="tag-lb">Tuyển dụng, đào tạo</label>
			<span class="highR">#HighR</span>
		</div>
		<div class="col-md-6 col-xs-6" style="text-align: right; padding-right: 30px">
			<label class="diem"><?php echo round($comment['scores'])?> điểm</label>
			<label class="mau3">3 chiến dịch</label>
			<br><br>
			<span class="webportal">Web portal</span>							
		</div>
	</div>
	<div style="height: 20px"></div>
	<!-- ket thuc phan thong tin chung -->

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
				    <div class="panel-heading cyan-profile rad-pad0">
				     	<div style="text-align: right;">
				        <span class="">Hồ sơ cá nhân &nbsp;</span>
				        <a data-toggle="collapse" href="#collapsetotal1" class="a-expand">
      						 <i class="fa fa-angle-right"></i></a>
				     	</div>
				    </div>
				    <!-- heading ho so ca nhan -->
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
				  <div class="panel panel-default border-rad0">
				    <div class="panel-heading cyan-profile rad-pad0">
				     	<div style="text-align: right;">
				        Hồ sơ nội bộ &nbsp;
				        <a data-toggle="collapse" href="#collapsetotal2" class="a-expand">
      						 <i class="fa fa-angle-right"></i></a>
				     	</div>
				    </div>
				    <!-- heading ho so noi bo -->
				    <div id="collapsetotal2" class="panel-collapse collapse in">
				      <div class="panel-body" style="border: 0px">
				          <div class="width100">
				             <label for="text" class="width20 col-xs-3 label-profile">Họ tên</label>
				             <div class="col-xs-3 width30 padding-lr0">
				             	<input type="text" name="" class="textbox">
				             </div>
				             <label for="text" class="col-xs-3 width20 col-xs-3 label-profile">Email</label>
				             <div class="col-xs-3 width30 padding-lr0">
				             	<input type="text" name="" class="textbox">
				             </div>   
				         </div>
				         <br><br>
				         <div class="width100">
				             <label for="text" class="width20 col-xs-3 label-profile"></label>
				             <div class="col-xs-3 width30 padding-lr0">
				             	<input type="text" name="" class="textbox">
				             </div>
				             <label for="text" class="col-xs-3 width20 col-xs-3 label-profile">CMND/ ID</label>
				             <div class="col-xs-3 width30 padding-lr0">
				             	<input type="text" name="" class="textbox">
				             </div>   
				         </div>
				         <br><br>
				         <div class="width100">
				             <label for="text" class="width20 col-xs-3 label-profile">Nguồn hồ sơ</label>
				             <div class="col-xs-3 width30 padding-lr0">
				             	<select class="textbox">
				             		<option>Chọn nguồn hồ sơ...</option>
				             	</select>
				             </div>
				         </div>
				         <br><br>
				         <div class="width100">
				             <label for="text" class="width20 col-xs-3 label-profile">Vị trí phù hợp</label>
				             <div class="col-xs-9 width80 padding-lr0">
				             	<input type="text" name="" class="textbox2">
				             </div>
				         </div>
				         <br><br>
				         <div class="width100">
				             <label for="text" class="width20 col-xs-3 label-profile">Tag</label>
				             <div class="col-xs-9 width80 padding-lr0">
				             	<input type="text" name="" class="textbox2">
				             </div>
				         </div>
				         <br><br>
				         <div class="width100">
				            <label for="text" class="width20 col-xs-3 label-profile">Hồ sơ tải lên</label>
				            <div class="width80 col-xs-9 padding-lr0"">
				             <label class="fontArial colorcyan labelcontent" ><i class="fa fa-upload"></i> Tải lên hồ sơ</label>
				             
				            </div>
				         </div>
				         <button type="button" class="btn-luu-nav floatright"> Lưu</button>
				  	  </div>
				    </div>
				    <!-- body ho so noi bo -->
				  </div>
				  <!-- ket thuc ho so noi bo -->
				</div>
       		 </div>
       		 <!-- ket thuc id tab tong quat -->

       		 <div id="personal" class="tab-pane">
        		<div class="panel-group bor-mar-b0">
				  <div class="panel panel-default border-rad0">
				    <div class="panel-heading cyan-profile rad-pad0">
				     	<div style="text-align: right;">
				        Hồ sơ cá nhân &nbsp;
				        <a data-toggle="collapse" href="#collapsetotal21" class="a-expand">
      						 <i class="fa fa-angle-right"></i></a>
				     	</div>
				    </div>
				    <!-- heading ho so ca nhan 2-->
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
				  <div class="panel panel-default border-rad0">
				    <div class="panel-heading cyan-profile rad-pad0">
				     	<div style="text-align: right;">
				        Hồ sơ nội bộ &nbsp;
				        <a data-toggle="collapse" href="#collapsetotal22" class="a-expand">
      						 <i class="fa fa-angle-right"></i></a>
				     	</div>
				    </div>
				    <!-- heading ho so noi bo 2-->
				    <div id="collapsetotal22" class="panel-collapse collapse in">
				      <div class="panel-body" style="border: 0px">
				          <div class="width100">
				             <label for="text" class="width20 col-xs-3 label-profile">Ngày sinh/ Giới tính</label>
				             <div class="col-xs-3 width30 padding-lr0">
				             	<input type="text" name="ngaysinh11" id="ngaysinh123" class="textbox2">
				             </div>
				             <div class="col-xs-1 width5 padding-lr0"></div>
				             <label class="radio-inline">
			                    <input type="radio" name="gender" checked="true" value="M"> Nam
			                  </label>
			                  <label class="radio-inline">
			                    <input type="radio" name="gender" value="F"> Nữ
			                  </label>
				         </div>
				         <br>
				         <div class="width100">
				             <label for="text" class="width20 col-xs-3 label-profile">Nơi sinh</label>
				             <div class="col-xs-3 width30 padding-lr0">
				             	<select class="textbox2 js-example-basic-single" name="noisinh" style="width: 195px">
					                 <option value="0" style="width: 195px" >Chọn tỉnh thành</option>
					                <?php foreach ($city as $key ) {

					                ?>
					                  <option value="<?php echo $key['name'] ?>"><?php echo $key['name'] ?></option>
					                  <?php } ?>
				                </select>
				             </div> 
				         </div>
				         <br><br>
				         <div class="width100">
				             <label for="text" class="width20 col-xs-3 label-profile">Dân tộc</label>
				             <div class="col-xs-3 width30 padding-lr0">
				             	<input type="text" name="" class="textbox2">
				             </div>
				         </div>
				         <br><br>
				         <div class="width100">
				             <label for="text" class="width20 col-xs-3 label-profile">Quốc tịch</label>
				             <div class="col-xs-3 width30 padding-lr0">
				             	<select class="textbox2">
				             		<option>Việt Nam</option>
				             		<option>Khác</option>
				             	</select>
				             </div>
				         </div>
				         <br><br>
				         <div class="width100">
				             <label for="text" class="width20 col-xs-3 label-profile">Chiều cao (Cm)</label>
				             <div class="col-xs-3 width30 padding-lr0">
				             	<input type="text" name="" class="textbox2">
				             </div>
				         </div>
				         <br><br>
				         <div class="width100">
				             <label for="text" class="width20 col-xs-3 label-profile">Cân nặng (Kg)</label>
				             <div class="col-xs-3 width30 padding-lr0">
				             	<input type="text" name="" class="textbox2">
				             </div>
				         </div>
				         <br><br>
				         <div class="width100">
				             <label for="text" class="width20 col-xs-3 label-profile">Ngày cấp/ Nơi cấp</label>
				             <div class="col-xs-3 width30 padding-lr0">
				             	<input type="text" name="ngaycap" id="ngaycap1" class="textbox2">
				             </div>
				             <div class="col-xs-1 width5 padding-lr0"></div>
				             <div class="col-xs-3 width30 padding-lr0">
				             	<select class="textbox2 js-example-basic-single" name="noicap" style="width: 195px">
					                 <option value="0" style="width: 195px" >Chọn tỉnh thành</option>
					                <?php foreach ($city as $key ) {

					                ?>
					                  <option value="<?php echo $key['name'] ?>"><?php echo $key['name'] ?></option>
					                  <?php } ?>
				                </select>
				             </div> 
				         </div>
				         <button type="button" class="btn-luu-nav floatright margin-t35"> Lưu</button>
				  	  </div>
				    </div>
				    <!-- body ho so noi bo 2-->
				  </div>
				  <!-- ket thuc ho so noi bo 2-->
				</div>
       		 </div>
       		 <!-- ket thuc id tab ca nhan -->

       		  <div id="contact" class="tab-pane">
        		<div class="panel-group bor-mar-b0">
				  <div class="panel panel-default border-rad0">
				    <div class="panel-heading cyan-profile rad-pad0">
				     	<div style="text-align: right;">
				        Hồ sơ cá nhân &nbsp;
				        <a data-toggle="collapse" href="#collapsetotal31" class="a-expand">
      						 <i class="fa fa-angle-right"></i></a>
				     	</div>
				    </div>
				    <!-- heading ho so ca nhan 3-->
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
				  <div class="panel panel-default border-rad0">
				    <div class="panel-heading cyan-profile rad-pad0">
				     	<div style="text-align: right;">
				        Hồ sơ nội bộ &nbsp;
				        <a data-toggle="collapse" href="#collapsetotal32" class="a-expand">
      						 <i class="fa fa-angle-right"></i></a>
				     	</div>
				    </div>
				    <!-- heading ho so noi bo 3-->
				    <div id="collapsetotal32" class="panel-collapse collapse in">
				      <div class="panel-body" style="border: 0px">
				          <div class="width100">
				             <label for="text" class="width20 col-xs-3 label-profile">Địa chỉ thường trú</label>
				             <div class="col-xs-3 width30 padding-lr0">
				             	<select class="textbox2" >
				             		<option>Việt Nam</option>
				             		<option>Khác</option>
				             	</select>
				             	<div class="h10-w-auto"></div>
				             	<select class="textbox2 js-example-basic-single" onchange="comb_admin(this.value)" name="noisinh-ad" style="width: 195px;">
					                 <option value="0" style="width: 195px" >Chọn tỉnh thành</option>
					                <?php foreach ($city as $key ) {

					                ?>
					                  <option value="<?php echo $key['id_city'] ?>"><?php echo $key['name'] ?></option>
					                  <?php } ?>
				                </select>
				                <div class="h10-w-auto"></div>

				                <select class="seletext js-example-basic-single" name="quanhuyen" id="quanhuyen8-ad" style="width: 100%" required onchange="comb_admin_qhpx(this.value)">
				                 	<option value="0" id="chonqh-ad1" >Chọn quận huyện</option>
				                </select>

				                <div class="h10-w-auto"></div>

				                 <select class="textbox2 js-example-basic-single" name="phuongxa" id="phuongxa8-ad" style="width: 100%" required>
				                 	<option value="0" id="chonpx-ad1" >Chọn phường xã</option>				                
				                </select>
				                <div class="h10-w-auto"></div>

				                 <textarea class="form-control off-resize fontstyle" rows="2" name="duong" id="duong8" required></textarea>
				                 <div class="h10-w-auto"></div>
				                   <textarea class="form-control off-resize fontstyle" rows="2" name="toanha" id="toanha8"></textarea>
				             </div>
				            
				             <label for="text" class="width20 col-xs-3 label-profile" style="padding-left: 15px">Địa chỉ liên hệ</label>
				             <div class="col-xs-3 width30 padding-lr0">
				             	<select class="textbox2">
				             		<option>Việt Nam</option>
				             		<option>Khác</option>
				             	</select>
				             	<div class="h10-w-auto"></div>
				             	<select class="textbox2 js-example-basic-single" name="noisinh-ad2" style="width: 195px" onchange="comb_admin2(this.value)">
					                 <option value="0" style="width: 195px" >Chọn tỉnh thành</option>
					                <?php foreach ($city as $key ) {

					                ?>
					                  <option value="<?php echo $key['id_city'] ?>"><?php echo $key['name'] ?></option>
					                  <?php } ?>
				                </select>
				                <div class="h10-w-auto"></div>
				                <select class="seletext js-example-basic-single" name="quanhuyen" id="quanhuyen-ad2" style="width: 100%" required onchange="comb_admin_qhpx2(this.value)">
				                 <option value="0" id="chonqh-ad2" >Chọn quận huyện</option>
				                </select>
				                <div class="h10-w-auto"></div>
				                 <select class="seletext js-example-basic-single" name="phuongxa" id="phuongxa8" style="width: 100%" required>
				                 	<option value="0" id="chonpx-ad2" >Chọn phường xã</option>
				                </select>
				                <div class="h10-w-auto"></div>
				                 <textarea class="form-control off-resize fontstyle" rows="2" name="duong" id="duong8" required></textarea>
				                 <div class="h10-w-auto"></div>
				                   <textarea class="form-control off-resize fontstyle" rows="2" name="toanha" id="toanha8"></textarea>
				             </div>
				         </div>

				         <div class="width100">
				             <label for="text" class="width20 col-xs-3 label-profile margin-t10" >Số điện thoại</label>
				             <div class="col-xs-3 width30 padding-lr0">
				             	<input type="text" name="" class="textbox2 margin-t10" >
				             </div>
				             <div class="col-xs-3 width40 padding-lr0 mar-tam" >
				             	<input type="text" name="" class="textbox2">
				             </div>
				         </div>
				         
				        
				         <div class="width100">
				             <label for="text" class="width20 col-xs-3 label-profile margin-t10" >Liên lạc khẩn cấp</label>
				             <div class="col-xs-3 width30 padding-lr0">
				             	<input type="text" name="" class="textbox2 margin-t10" > 
				             </div>
				         </div>
				         <button type="button" class="btn-luu-nav floatright margin-t35"> Lưu</button>
				  	  </div>
				    </div>
				    <!-- body ho so noi bo 3-->
				  </div>
				  <!-- ket thuc ho so noi bo 3-->
				</div>
       		 </div>
       		 <!-- ket thuc id tab lien he -->

       		 <div id="family" class="tab-pane">
        		<div class="panel-group bor-mar-b0">
				  <div class="panel panel-default border-rad0">
				    <div class="panel-heading cyan-profile rad-pad0">
				     	<div style="text-align: right;">
				        Hồ sơ cá nhân &nbsp;
				        <a data-toggle="collapse" href="#collapsetotal41" class="a-expand">
      						 <i class="fa fa-angle-right"></i></a>
				     	</div>
				    </div>
				    <!-- heading ho so ca nhan 4-->
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
				  <div class="panel panel-default border-rad0">
				    <div class="panel-heading cyan-profile rad-pad0">
				     	<div style="text-align: right;">
				        Hồ sơ nội bộ &nbsp;
				        <a data-toggle="collapse" href="#collapsetotal42" class="a-expand">
      						 <i class="fa fa-angle-right"></i></a>
				     	</div>
				    </div>
				    <!-- heading ho so noi bo 4-->
				    <div id="collapsetotal42" class="panel-collapse collapse in">
				      <div class="panel-body" style="border: 0px">				         
				         <table   class="table table-striped table-bordered"> 
				            <thead> 
				              <tr class="fontstyle"> 
				                <th id="th" width="30%">Họ và tên</th> 
				                <th id="th" width="20%">Năm sinh</th> 
				                <th id="th" width="20%">Quan hệ</th> 
				                <th id="th" width="20%">Nghề nghiệp</th>
				                <th id="th" width="10%"></th>
				              </tr> 
				            </thead> 
				            <tbody class="fontstyle text-center"> 
				            	<tr>
				            		<td style="height: 37px;"></td>
				            		<td></td>
				            		<td></td>
				            		<td></td>
				            		<td></td>
				            	</tr>
				            </tbody> 
				          </table>
				          <label class="floatright">Thêm quan hệ <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label>
				  	  </div>
				    </div>
				    <!-- body ho so noi bo 4-->
				  </div>
				  <!-- ket thuc ho so noi bo 4-->
				</div>
       		 </div>
       		 <!-- ket thuc id tab gia dinh -->
       		 
       		  <div id="experience" class="tab-pane">
        		<div class="panel-group bor-mar-b0">
				  <div class="panel panel-default border-rad0">
				    <div class="panel-heading cyan-profile rad-pad0">
				     	<div style="text-align: right;">
				        Hồ sơ cá nhân &nbsp;
				        <a data-toggle="collapse" href="#collapsetotal51" class="a-expand">
      						 <i class="fa fa-angle-right"></i></a>
				     	</div>
				    </div>
				    <!-- heading ho so ca nhan 5-->
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
				  <div class="panel panel-default border-rad0">
				    <div class="panel-heading cyan-profile rad-pad0">
				     	<div style="text-align: right;">
				        Hồ sơ nội bộ &nbsp;
				        <a data-toggle="collapse" href="#collapsetotal52" class="a-expand">
      						 <i class="fa fa-angle-right"></i></a>
				     	</div>
				    </div>
				    <!-- heading ho so noi bo 5-->
				    <div id="collapsetotal52" class="panel-collapse collapse in">
				      <div class="panel-body" style="border: 0px">				         
				          <table   class="table table-striped table-bordered" > 
					            <thead class="fontstyle"> 
					              <tr > 
					                <th id="th" class="middle2" width="20%">Từ - Đến</th> 
					                <th id="th" class="middle2" width="20%">Cty/ Địa chỉ/ ĐT</th> 
					                <th id="th" width="13%">CV khi nghỉ</th> 
					                <th id="th" width="17%">NV/ Trách nhiệm</th>
					                 <th id="th" class="middle2" width="20%">Lý do nghỉ</th>
					                 <th id="th" width="10%"></th>
					              </tr> 
					            </thead> 
					            <tbody class="fontstyle text-center"> 
					             <tr>
				            		<td style="height: 37px;"></td>
				            		<td></td>
				            		<td></td>
				            		<td></td>
				            		<td></td>
				            		<td></td>
				            	</tr>
					            </tbody> 
					          </table>
					         <label class="floatright">Thêm kinh nghiệm <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label>
					          <table   class="table table-striped table-bordered" > 
					            <thead> 
					              <tr class="fontstyle"> 
					                <th id="th" width="30%">Họ và tên</th> 
					                <th id="th" width="15%">Chức vụ</th> 
					                <th id="th" width="20%">Công ty</th> 
					                <th id="th" width="25%">Liên hệ</th>
					                <th id="th" width="10%"></th>				                  
					              </tr> 
					            </thead> 
					            <tbody class="fontstyle text-center"> 
								<tr>
				            		<td style="height: 37px;"></td>
				            		<td></td>
				            		<td></td>
				            		<td></td>
				            		<td></td>

				            	</tr>
					            </tbody> 
					          </table>
				          <label class="floatright">Thêm người tham chiếu <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label>
				  	  </div>
				    </div>
				    <!-- body ho so noi bo 5-->
				  </div>
				  <!-- ket thuc ho so noi bo 5-->
				</div>
       		 </div>
       		 <!-- ket thuc id tab kinh nghiệm -->

       		 <div id="knowledge" class="tab-pane">
        		<div class="panel-group bor-mar-b0">
				  <div class="panel panel-default border-rad0">
				    <div class="panel-heading cyan-profile rad-pad0">
				     	<div style="text-align: right;">
				        Hồ sơ cá nhân &nbsp;
				        <a data-toggle="collapse" href="#collapsetotal61" class="a-expand">
      						 <i class="fa fa-angle-right"></i></a>
				     	</div>
				    </div>
				    <!-- heading ho so ca nhan 6-->
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
				  <div class="panel panel-default border-rad0">
				    <div class="panel-heading cyan-profile rad-pad0">
				     	<div style="text-align: right;">
				        Hồ sơ nội bộ &nbsp;
				        <a data-toggle="collapse" href="#collapsetotal62" class="a-expand">
      						 <i class="fa fa-angle-right"></i></a>
				     	</div>
				    </div>
				    <!-- heading ho so noi bo 6-->
				    <div id="collapsetotal62" class="panel-collapse collapse in">
				      <div class="panel-body" style="border: 0px">				         
				          <table   class="table table-striped table-bordered" > 
					            <thead class="fontstyle"> 
					              <tr > 
					                <th id="th" width="20%">Từ - Đến</th> 
					                <th id="th" width="20%">Trường</th> 
					                <th id="th" width="15%">Nơi học</th> 
					                <th id="th" width="20%">Ngành học</th>
					                 <th id="th" width="15%">Bằng cấp</th>
					                 <th id="th" width="10%"></th>
					                 
					              </tr> 
					            </thead> 
					            <tbody class="fontstyle text-center"> 
					              <tr>
				            		<td style="height: 37px;"></td>
				            		<td></td>
				            		<td></td>
				            		<td></td>
				            		<td></td>
				            		<td></td>
				            	</tr>
					            </tbody> 
					          </table>
					         <label class="floatright">Thêm học vấn <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label>
					          <table   class="table table-striped table-bordered" > 
					            <thead class="fontstyle"> 
					              <tr> 
					                <th id="th" width="20%">Từ - Đến</th> 
					                <th id="th" width="25%">Cơ sở đạo tào</th> 
					                <th id="th" width="13%">TG học</th> 
					                <th id="th" width="17%">Ngành học</th>
					                 <th id="th" width="15%">Bằng cấp</th>
					                 <th id="th" width="10%"></th>
					              </tr> 
					            </thead> 
					          	 <tr>
				            		<td style="height: 37px;"></td>
				            		<td></td>
				            		<td></td>
				            		<td></td>
				            		<td></td>
				            		<td></td>
				            	</tr>
					            </tbody> 
					          </table>
				          <label class="floatright">Thêm khoá đào tạo <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label>
				  	  </div>
				    </div>
				    <!-- body ho so noi bo 6-->
				  </div>
				  <!-- ket thuc ho so noi bo 6-->
				</div>
       		 </div>
       		 <!-- ket thuc id tab hoc van-->
       		 
       		 <div id="language" class="tab-pane">
        		<div class="panel-group bor-mar-b0">
				  <div class="panel panel-default border-rad0">
				    <div class="panel-heading cyan-profile rad-pad0">
				     	<div style="text-align: right;">
				        Hồ sơ cá nhân &nbsp;
				        <a data-toggle="collapse" href="#collapsetotal71" class="a-expand">
      						 <i class="fa fa-angle-right"></i></a>
				     	</div>
				    </div>
				    <!-- heading ho so ca nhan 7-->
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
				  <div class="panel panel-default border-rad0">
				    <div class="panel-heading cyan-profile rad-pad0">
				     	<div style="text-align: right;">
				        Hồ sơ nội bộ &nbsp;
				        <a data-toggle="collapse" href="#collapsetotal72" class="a-expand">
      						 <i class="fa fa-angle-right"></i></a>
				     	</div>
				    </div>
				    <!-- heading ho so noi bo 7-->
				    <div id="collapsetotal72" class="panel-collapse collapse in">
				      <div class="panel-body" style="border: 0px">				         
				          <table   class="table table-striped table-bordered" > 
					            <thead class="fontstyle"> 
					              <tr> 
					                <th id="th" >Ngoại Ngữ</th> 
					                <th id="th" >Nghe</th> 
					                <th id="th" >Nói</th> 
					                <th id="th" >Đọc</th>
					                <th id="th" >Viết</th>
					                <th id="th" ></th>
					              </tr> 
					            </thead> 
					            <tbody class="fontstyle text-center"> 
					             <tr>
				            		<td style="height: 37px;"></td>
				            		<td></td>
				            		<td></td>
				            		<td></td>
				            		<td></td>
				            		<td></td>
				            	</tr>
					            </tbody> 
					          </table>
				          <label class="floatright">Thêm ngoại ngữ <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label>
				  	  </div>
				    </div>
				    <!-- body ho so noi bo 7-->
				  </div>
				  <!-- ket thuc ho so noi bo 7-->
				</div>
       		 </div>
       		 <!-- ket thuc id tab ngoai ngu-->

       		  <div id="software" class="tab-pane">
        		<div class="panel-group bor-mar-b0">
				  <div class="panel panel-default border-rad0">
				    <div class="panel-heading cyan-profile rad-pad0">
				     	<div style="text-align: right;">
				        Hồ sơ cá nhân &nbsp;
				        <a data-toggle="collapse" href="#collapsetotal81" class="a-expand">
      						 <i class="fa fa-angle-right"></i></a>
				     	</div>
				    </div>
				    <!-- heading ho so ca nhan 8-->
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
				  <div class="panel panel-default border-rad0">
				    <div class="panel-heading cyan-profile rad-pad0">
				     	<div style="text-align: right;">
				        Hồ sơ nội bộ &nbsp;
				        <a data-toggle="collapse" href="#collapsetotal82" class="a-expand">
      						 <i class="fa fa-angle-right"></i></a>
				     	</div>
				    </div>
				    <!-- heading ho so noi bo 8-->
				    <div id="collapsetotal82" class="panel-collapse collapse in">
				      <div class="panel-body" style="border: 0px">				         
				          <table   class="table table-striped table-bordered" > 
					            <thead class="fontstyle"> 
					              <tr> 
					                <th id="th" width="60%">Phần mềm</th> 
					                <th id="th" width="30%">Trình độ</th>
					                <th id="th" width="10%"></th>
					              </tr> 
					            </thead> 
					            <tbody class="fontstyle text-center"> 
					             <tr>
					             	<td style="height: 37px"></td>
					             	<td></td>
					             	<td></td>
					         	</tr>
					            </tbody> 
					          </table>
				          <label class="floatright">Thêm Tin học <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label>
				  	  </div>
				    </div>
				    <!-- body ho so noi bo 8-->
				  </div>
				  <!-- ket thuc ho so noi bo 8-->
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
      			$share = $rate = $comment = $icon = '';
      			if ($row['filename'] == '') {
      				$image = 'bbye.jpg';
      			}else{
      				$image = $row['filename'];
      			}
      			$check = 0;
      			if(isset($row['type'])){
      				if ($row['type'] == 'comment') {
	      				$fa = '<i class="fa fa-comment-o" ></i>';
	      				$type = 'Thêm nhận xét/ Đánh giá - '.date_format(date_create($row['createddate']),"d/m/Y - H:i");
	      				$check = 1;
	      			}else{
	      				$fa = '<i class="fa fa-phone" ></i>';
	      				$type = 'Thêm Nhật ký Điện thoại - '.date_format(date_create($row['createddate']),"d/m/Y - H:i");
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
	      				$type = ' - '.$row['actionnote'].' - '.date_format(date_create($row['createddate']),"d/m/Y - H:i");
	      				$check = 1;
	      			}else if ($row['actiontype'] == 'Block'){
	      				$fa = '<i class="fa fa-ban color-red size-icon"></i>';
	      				$type = ' - '.$row['actionnote'].' - '.date_format(date_create($row['createddate']),"d/m/Y - H:i");
	      				$check = 1;
	      			}else if ($row['actiontype'] == 'Talent') {
	      				$fa = '<i class="fa fa-star color-orange  star-icon1" ></i>';
	      				$type = ' - '.$row['actionnote'].' - '.date_format(date_create($row['createddate']),"d/m/Y - H:i");
	      				$check = 1;
	      			}else if ($row['actiontype'] == 'NotTalent'){
	      				$fa = '<i class="fa fa-star color-gray star-icon1"></i>';
	      				$type = ' - '.$row['actionnote'].' - '.date_format(date_create($row['createddate']),"d/m/Y - H:i");
	      				$check = 1;
	      			}
	      			else if ($row['actiontype'] == 'NotTalent'){
	      				$fa = '<i class="fa fa-star color-gray star-icon1"></i>';
	      				$type = ' - '.$row['actionnote'].' - '.date_format(date_create($row['createddate']),"d/m/Y - H:i");
	      				$check = 1;
	      			}
	      			else if ($row['actiontype'] == 'Transfer'){
	      				$fa = '<i class="fa fa-forward color-forward star-icon1"></i>';
	      				$type = ' - '.$row['actionnote'].' - Vị trí: '.$campaignname.' - '.date_format(date_create($row['createddate']),"d/m/Y - H:i");
	      				$check = 1;
	      			}
	      			else if ($row['actiontype'] == 'Discard'){
	      				$fa = '<i class="fa fa-flag color-flag-dis star-icon1"></i>';
	      				$type = ' - '.$row['actionnote'].' - Vị trí: '.$campaignname.' - '.date_format(date_create($row['createddate']),"d/m/Y - H:i");
	      				$check = 1;
	      			}
	      			else if ($row['actiontype'] == 'Apply'){
	      				$fa = '<i class="fa fa-sign-in color-sign-in star-icon1"></i>';
	      				$type = ' - Nộp hồ sơ vào vị trí: '.$campaignname.', ngày có thể làm việc: '.$row['actionnote'].' - '.date_format(date_create($row['createddate']),"d/m/Y - H:i");
	      				$check = 1;
	      			}
	      			else if ($row['actiontype'] == 'Recruite'){
	      				$fa = '<i class="fa fa-flag color-flag-recruite star-icon1"></i>';
	      				$type = ' - '.$row['actionnote'].' - '.date_format(date_create($row['createddate']),"d/m/Y - H:i");
	      				$check = 1;
	      			}
	      			if ($row['isshare'] == 'Y'){
	      				$share = '<label class="colorgray fontArial show-view" >Hiện thị với tất cả mọi người</label>';
	      			}
      			}else if (isset($row['asmtid'])) {
      				if ($row['status'] == "") {
      					$fa = '<a onclick="loadAssessment('.$row['candidateid'].','.$row['campaignid'].')"><i class="fa fa-file-text-o star-icon1"></i></a>';
	      				$type = ' Tạo phiếu trắc nghiệm - '.date_format(date_create($row['createddate']),"d/m/Y - H:i");
	      				$comment = '<div class="col-md-12">Trắc nghiệm kiến thức tổng quát </div><div class="color-sign-in">Trạng thái: Chưa thực hiện </div>';
	      				$check = 1;
      				}
      				else if ($row['status'] == 'W') {
      					$fa = '<a onclick="loadAssessment('.$row['candidateid'].','.$row['campaignid'].')"><i class="fa fa-file-text-o star-icon1"></i></a>';
	      				$type = ' Tạo phiếu trắc nghiệm - '.date_format(date_create($row['createddate']),"d/m/Y - H:i");
	      				$comment = '<div>Trắc nghiệm kiến thức tổng quát </div><div class="color-sign-in">Trạng thái: Đang thực hiện</div>';
	      				$check = 1;
      				}
      				else if ($row['status'] == 'C') {
      					$fa = '<a onclick="loadAssessment('.$row['candidateid'].','.$row['campaignid'].')"><i class="fa fa-file-text-o star-icon1"></i></a>';
	      				$type = ' Tạo phiếu trắc nghiệm - '.date_format(date_create($row['createddate']),"d/m/Y - H:i");
	      				$comment = '<div>Trắc nghiệm kiến thức tổng quát </div><div class="color-sign-in">Trạng thái: Hoàn thành </div>';
	      				$check = 1;
      				}
      				else if ($row['status'] == 'D') {
      					$fa = '<a onclick="loadAssessment('.$row['candidateid'].','.$row['campaignid'].')"><i class="fa fa-file-text-o star-icon1"></i></a>';
	      				$type = ' Tạo phiếu trắc nghiệm - '.date_format(date_create($row['createddate']),"d/m/Y - H:i");
	      				$icon = '<div class="pull-right"><i class="fa fa-trash-o fa-lg color-trash"></i></div>';
	      				$comment = '<div>Trắc nghiệm kiến thức tổng quát </div><div class="color-sign-in">Trạng thái: Hủy phiếu - bởi '.$row['nameupdate'].' - '.date_format(date_create($row['lastupdate']),"d/m/Y - H:i").'</div>';
	      				$check = 1;
      				}
      				if ($row['isshare'] == 'Y'){
	      				$share = '<label class="colorgray fontArial show-view" >Hiện thị với tất cả mọi người</label>';
	      			}
      			}else if (isset($row['interviewid'])) {
      				$thu = date_format(date_create($row['intdate']),"N");
					if ($thu != 7) {
						$temp = (int)$thu+1;
						$thu = 'Thứ '.(string)$temp;
					}else{
						$thu = 'Chủ Nhật';
					}
					$ngay =  date_format(date_create($row['intdate']),"d");
					$thang =  date_format(date_create($row['intdate']),"m");
					$nam =  date_format(date_create($row['intdate']),"Y");
					$from =  date_format(date_create($row['timefrom']),"H:i");
					$to =  date_format(date_create($row['timeto']),"H:i");
      				if ($row['status'] == "W") {
      					$fa = '<a onclick="loadAppointment('.$row['interviewid'].')"><i class="fa fa-calendar star-icon1"></i></a>';
	      				$type = ' Tạo lịch hẹn phỏng vấn - '.date_format(date_create($row['createddate']),"d/m/Y - H:i");
	      				$comment = $thu.', '.$ngay.' Tháng '.$thang.' Năm '.$nam.'<br>'.$row['location'].'<br><div class="color-sign-in">Trạng thái: Chờ phỏng vấn </div>';
	      				if (!empty($row['interviewer'])) {
	      					$interviewer = '<div class="row">';
	      					foreach ($row['interviewer'] as $key) {
	      						if ($key['status'] == 'W') {
	      							$status = '<div class="colorgray fontArial show-view" >Chờ xác nhận</div>';
	      						}else if($key['status'] == 'D'){
	      							$status = '<div class="colorred fontArial show-view" >Không tham dự</div>';
	      						}else{
	      							$status = '<div class="colorsuccess fontArial show-view" >Đã xác nhận</div>';
	      						}
		      					$interviewer .= '<div class="col-xs-3"><img src="'.base_url().'public/image/'.$key['filename'].'"  class="img_profile">'.$key['operatorname'].$status.'</div>';
		      				}
		      				$interviewer .= '</div>';
	      				}
	      				
	      				$check = 1;
      				}
      				else if ($row['status'] == "C") {
      					$fa = '<a onclick="loadAppointment('.$row['interviewid'].')"><i class="fa fa-calendar star-icon1"></i></a>';
	      				$type = ' Tạo lịch hẹn phỏng vấn - '.date_format(date_create($row['createddate']),"d/m/Y - H:i");
	      				$comment = $thu.', '.$ngay.' Tháng '.$thang.' Năm '.$nam.'<br>'.$location.'<br><div class="color-sign-in">Trạng thái: Đã phỏng vấn </div>';
	      				if (!empty($row['interviewer'])) {
	      					foreach ($row['interviewer'] as $key) {
	      						if ($key['status'] == 'W') {
	      							$status = '<div class="colorgray fontArial show-view" >Chờ xác nhận</div>';
	      						}else if($key['status'] == 'D'){
	      							$status = '<div class="colorred fontArial show-view" >Không tham dự</div>';
	      						}else{
	      							$status = '<div class="colorsuccess fontArial show-view" >Đã xác nhận</div>';
	      						}
		      					$interviewer = '<div class="col-md-3"><img src="'.base_url().'public/image/'.$key['filename'].'"  class="img_profile">'.$key['operatorname'].$status.'</div>';
		      				}
	      				}
	      				$check = 1;
      				}
      				else if ($row['status'] == "D") {
      					$fa = '<a onclick="loadAppointment('.$row['interviewid'].')"><i class="fa fa-calendar star-icon1"></i></a>';
	      				$type = ' Tạo lịch hẹn phỏng vấn - '.date_format(date_create($row['createddate']),"d/m/Y - H:i");
	      				$comment = $thu.', '.$ngay.' Tháng '.$thang.' Năm '.$nam.'<br>'.$location.'<br><div class="color-sign-in">Trạng thái: Hủy phỏng vấn </div>';
	      				if (!empty($row['interviewer'])) {
	      					foreach ($row['interviewer'] as $key) {
	      						if ($key['status'] == 'W') {
	      							$status = '<div class="colorgray fontArial show-view" >Chờ xác nhận</div>';
	      						}else if($key['status'] == 'D'){
	      							$status = '<div class="colorred fontArial show-view" >Không tham dự</div>';
	      						}else{
	      							$status = '<div class="colorsuccess fontArial show-view" >Đã xác nhận</div>';
	      						}
		      					$interviewer = '<div class="col-md-3"><img src="'.base_url().'public/image/'.$key['filename'].'" class="img_profile">'.$key['operatorname'].$status.'</div>';
		      				}
	      				}
	      				$check = 1;
      				}
      			}
      			if($check == 1){
      		?>
      			<tr >
	      			<td class="table-history" style="width: 4%;padding-top: 10px;"><?php echo $fa ?> </td>
	      			<td class="table-his-cont" style="width: 96%">
	      				<img src="<?php echo base_url().'public/image/'.$image?>"  class="img_profile" >
	      				<div class="col-xs-11 mr-pd">
	      					<label class="text-his fontArial" style="margin-bottom: 2px"><span style="font-weight: 600"><?php echo $row['operatorname'] ?> </span><span class="colorgray"><?php echo $type ?> </span></label><?php echo isset($icon) ? $icon : '' ?>
	      					<br>
	      					<?php echo isset($share) ? $share : '' ?>
	      					<?php echo isset($rate) ? '<label class="fontArial text-his" >'.$rate.'</label>' : '' ?>
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
  <div class="panel panel-default border-rad0">
  	<a data-toggle="collapse" data-parent="#accordion" href="#collapse3" onclick="rotate(3)">
	    <div class="panel-heading rad-pad0 b-blue" >
	       <i class="fa fa-angle-right a-tabcs rotate rotate_3"></i>
	        <div class="ul-nav">
	       <label class="tittle-tab">
	       		Nhân xét/  Đánh giá
	       	</label>
	       </div>
	    </div>
	</a>
    <div id="collapse3" class="panel-collapse collapse in">
    	<form action="<?php echo base_url()?>admin/handling/postcomment" method="POST">
      <div class="panel-body">
      		<input type="hidden" name="idcan" value="<?php echo $candidate['candidateid']?>" >
	      	<img src="<?php echo base_url()?>public/image/2.jpg" class="col-xs-1" style="padding-left: 9px;" width="32px" height="32px">
	      	<div class="col-xs-11 width80 padding-lr0">
		     	<select class="text-cmt width30" style="margin-bottom: 9px;" name="typecmt">
		     		<option value="comment">Nhận xét/ Đánh gía</option>
		     		<option value="call">Gọi điện</option>
		     	</select>
		     	<textarea class="textara1" rows="3" placeholder="Nhận xét" name="contentcmt" required></textarea>
		     	<input type="text" class="text-cmt width30" name="scorescmt" placeholder="Điểm số">
		     </div>
		     <div  class="padding-lr0 phu"></div>
		     <label class="font-weight"><input type="checkbox"  class="mar-t-l10" name="sharecmt" value="Y"> Chia sẻ nhận xét/ Đánh giá này</label>
		     <button type="submit" class="luu-cmt">Lưu</button>
      </div>
        </form>
    </div>
  </div>
</div>
	<!-- ket thuc 3 tab -->
</div>
<?php endif ?>




<style type="text/css">
	.color-forward {
		color: #A0BA82;
	}
	.color-flag-dis{
		color: #E15B6C;
	}
	.color-sign-in{
		color: #5FA2DD;
	}
	.color-flag-recruite{
		color: #A0BA82;
	}
	.color-trash{
		color: #E15B6C;
	}
	.colorred{
		color: red;
	}
	.colorsuccess{
		color: #A0BA82;
	}
	.img_profile{
		float:left; 
		margin-right: 4px;
		width: 32px;
		height: 32px;
	}
</style>


<script type="text/javascript">
	function rotate(id) {
		for (var i = 1; i <= 3; i++) {
			if(i != id){
				$(".rotate_"+i).removeClass("down"); 
			}
		}
		$(".rotate_"+id).toggleClass("down"); 
	}
	$(document).ready(function(){
	
		$('#ngaysinh123').datetimepicker({
		   timepicker:false,
		   format:'d-m-Y',
		   defaultDate:'+1960/01/01',
		   maxDate:'+1960/01/01'
		});

		$('#ngaycap1').datetimepicker({
		  timepicker:false,
		  maxDate:'+1970/01/01',
		  format:'d-m-Y'
		});
	
		$('.js-example-basic-single').select2();
	});
	function comb_admin(obj){
	    var $id = obj;

	    $('.gicungdc').remove();
	    $('.gicungdc2').remove();
	      $.ajax({
	        url: '<?php echo base_url()?>admin/handling/selectCity',
	        type: 'POST',
	        dataType: 'JSON',
	        data: {id_city : $id},
	      })
	      .done(function(data) {
             for(var i in data)
             {   
                $('#chonqh-ad1').after('<option class="gicungdc" value="'+data[i].id_district+'">'+data[i].name+'</option>');
              }
          })
	      .fail(function() {
	        alert('thatbai');
	        console.log("error");
	      })
	  }
	  function comb_admin_qhpx(obj){
	    var $id = obj;
	    alert($id);
	    $('.gicungdc2').remove();
	      $.ajax({
	        url: '<?php echo base_url()?>admin/handling/selectDistrict',
	        type: 'POST',
	        dataType: 'JSON',
	        data: {id_district : $id},
	      })
	      .done(function(data) {
             for(var i in data)
             {   
                $('#chonpx-ad1').after('<option class="gicungdc2" value="'+data[i].id_ward+'">'+data[i].name+'</option>');
              }
          })
	      .fail(function() {
	        alert('thatbai');
	        console.log("error");
	      })
	  }
	  function comb_admin2(obj){
	    var $id = obj;

	    $('.gicungdc3').remove();
	    $('.gicungdc4').remove();
	      $.ajax({
	        url: '<?php echo base_url()?>admin/handling/selectCity',
	        type: 'POST',
	        dataType: 'JSON',
	        data: {id_city : $id},
	      })
	      .done(function(data) {
             for(var i in data)
             {   
                $('#chonqh-ad2').after('<option class="gicungdc3" value="'+data[i].id_district+'">'+data[i].name+'</option>');
              }
          })
	      .fail(function() {
	        alert('thatbai');
	        console.log("error");
	      })
	  }
	  function comb_admin_qhpx2(obj){
	    var $id = obj;
	    alert($id);
	    $('.gicungdc4').remove();
	      $.ajax({
	        url: '<?php echo base_url()?>admin/handling/selectDistrict',
	        type: 'POST',
	        dataType: 'JSON',
	        data: {id_district : $id},
	      })
	      .done(function(data) {
             for(var i in data)
             {   
                $('#chonpx-ad2').after('<option class="gicungdc4" value="'+data[i].id_ward+'">'+data[i].name+'</option>');
              }
          })
	      .fail(function() {
	        alert('thatbai');
	        console.log("error");
	      })
	  }

	  function talent_detail(obj)
	{
		var id = obj; 
		$.ajax({
			url: '<?php echo base_url()?>admin/handling/talent/'+id,
			type: 'POST',
			dataType: 'JSON',
			data: $('#form_checkone').serialize() ,
		})
		.done(function(data) {
			$('#iconstar_profile').removeClass('color-gray');
			$('#iconstar_profile').removeClass('color-orange');
			var t = '';
			parent.$('#talent'+data[0]).empty();
			
			if(id == 0)
			{
				$('#iconstar_profile').addClass('color-gray');
				$('#textstar_profile').text('');	
				t = '<span class="fa-stack fa-1x"> <i class="fa fa-star color-gray fa-stack-2x nohover size18"></i><span class="fa fa-stack-1x color-white size9" ></span></span> ';
			} 
			else
			{
				$('#iconstar_profile').addClass('color-orange');
				$('#textstar_profile').text(id);	
				t =	'<span class="fa-stack fa-1x"> <i class="fa fa-star color-orange fa-stack-2x nohover size18" ></i><span class="fa fa-stack-1x color-white size9">'+id+'</span></span> ';
			}		
			parent.$('#talent'+data[0]).append(t);		
			
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}
	function changeblock(obj)
	{
		var id = obj.value;
		if(id == 'Y') id = 'N';
		else id = 'Y';
		$.ajax({
			url: '<?php echo base_url()?>admin/handling/block/'+id,
			type: 'POST',
			dataType: 'JSON',
			data: $('#form_checkone').serialize(),
		})
		.done(function(data) {
			$('#checkchange').empty();
			var t = ''; 
			parent.$('#block'+data[0]).empty();
			if(id == 'Y')
			{ 
				t ='<i class="fa fa-ban color-red size-icon" ></i>';
				parent.$('#block'+data[0]).append('<i class="fa fa-ban color-red " ></i>');
				parent.$('#ds'+data[0]).removeClass('col-md-4');
				parent.$('#ds'+data[0]).addClass('col-md-3');	
			}
			else 
			{
				t = '<i class="fa fa-check-circle-o color-green size-icon"></i> ';	
				parent.$('#ds'+data[0]).removeClass('col-md-3');
				parent.$('#ds'+data[0]).addClass('col-md-4');
			}
			$('#checkchange').append(t);
			$('#checkchange').val(id);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}
	function transfer(type)
	{
		parent.parent.$('#body_chuyen').empty();
		parent.parent.$('#body_loai').empty();
		var form = $('#form_checkone').serializeArray();
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
				if (data[i]['roundid'] == new_round) {
					option += '<option value="'+data[i]['roundid']+'" selected >'+data[i]['roundname']+'</option>';
				}else{
					option += '<option value="'+data[i]['roundid']+'">'+data[i]['roundname']+'</option>';
				}
			}
			var row ='';
			for (var i = 2; i < form.length; i++) {
				var name = $('#candidatename').val();
				var avatar = $('#candidateimage').val();
				row += '<div class="col-xs-4 candidate_chuyen"><div><img src="<?php echo base_url() ?>public/image/'+avatar+'" class="img_chuyen"></div><label>'+name+'</label></div><input type="hidden" name="id[]" value="'+form[i].value+'">';
			}
			if (type == 1) {
				parent.parent.$('#campaignid_tran').val(campaignid);
				parent.parent.$('#body_chuyen').append(row);
				parent.parent.$('.select_chuyen').append(option);
				parent.$('.select_chuyen').find('option [value="'+new_round+'"]').attr('selected', true);
				parent.parent.$('#transferHS').modal('show');
			}else{
				parent.parent.$('#campaignid_dis').val(campaignid);
				parent.parent.$('#body_loai').append(row);
				parent.parent.$('#roundid').val(roundid);
				parent.parent.$('.select_loai').append(option);
				parent.$('.select_loai').find('option [value="'+roundid+'"]').attr('selected', true);
				parent.parent.$('.select_loai').attr('disabled', 'true');
				parent.parent.$('#discardHS').modal('show');
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
			data: $('#form_checkone').serialize(),
		})
		.done(function(data) {
			$('#btn_recruite').empty().html('<i class="fa fa-flag color-flag-recruite star-icon1"></i>');
			alert('Tuyển dụng ứng viên thành công');
		})
		.fail(function() {
			console.log("error");
		});
		
	}

	function createMChoice() {
		parent.parent.$('.body_taophieu').remove();
		var form = $('#form_checkone').serializeArray();
		var campaignid = form[0].value;
		var roundid = form[1].value;
		var row ='';
		var email = '';
		var k = 1;
		for (var i = 2; i < form.length; i++) {
			var name = $('#candidatename').val();
			var avatar = $('#candidateimage').val();
			row += '<div class="body_cam col-xs-12 body_chuyen body_taophieu" ><div class="row"><div class="col-md-3 box_profile_tn"><div class="profile_tn">';
            row += '<img src="<?php echo base_url() ?>public/image/'+avatar+'"><p class="guide-black">'+name+'</p><input type="hidden" name="profile_'+k+'[]" value="'+form[i].value+'"><input type="hidden" name="profile_'+k+'[]" value="'+name+'"></div></div>';       
            row += '<div class="col-md-9 border_left_ddd"><div class="rowedit2"><div class="col-xs-3 body-blac4">Mẫu phiếu trắc nghiệm: </div><div class="col-xs-8"><select class="js-example-basic-2" name="profile_'+k+'[]" required="" id="select_status1" style="width: 100%"><option value="1">Trắc nghiệm kiến thức tổng quát</option><option value="2">Trắc nghiệm kiến thức chuyên môn</option></select></div></div><div class="rowedit2"><div class="col-xs-3 body-blac4">Thời hạn hoàn thành:</div><div class="col-xs-8"><input class="kttext datepicker" type="text"  name="profile_'+k+'[]" value="<?php echo date_format(date_create(),"d/m/Y h:i")  ?>"></div></div><div class="rowedit3"><div class="col-xs-3 body-blac4">Ghi chú:</div><div class="col-xs-8"><textarea name="profile_'+k+'[]" class="textarea_profile" rows="3" required=""></textarea></div></div></div></div></div>';
            if (email == '') {
            	email += $('#candidateemail').val();
            }else{
            	email += ', '+$('#candidateemail').val();
            }
            parent.parent.$('#count_candidate').val(k);
            k = Number(k)+1;
		}
		parent.parent.$('#profile_taophieu').prepend(row);
		parent.parent.$('#email_to_tn').val(email);
		parent.parent.$('#campaignid_tn').val(campaignid);
		parent.parent.$('#roundid_tn').val(roundid);
		parent.parent.$('#createMultiChoice').modal('show');
	}

	function loadAssessment(candidateid, campaignid) {
		parent.parent.location.href ='<?php echo base_url() ?>admin/Multiplechoice/pageAssessment/'+candidateid+'/'+campaignid;
	}
	function createAppointment() {
		parent.parent.$('.body_taopv').remove();
		var form = $('#form_checkone').serializeArray();
		var campaignid = form[0].value;
		var roundid = form[1].value;
		var row ='';
		var email = '';
		var k = 1;
		for (var i = 2; i < form.length; i++) {
			var name = $('#candidatename').val();
			var avatar = $('#candidateimage').val();
			row += '<div class="body_cam col-xs-12 body_chuyen body_taopv" style="margin-top: 5px"><div class="row"><div class="col-md-3 box_profile_tn"><div class="profile_tn">';
            row += '<img src="<?php echo base_url() ?>public/image/'+avatar+'"><p class="guide-black">'+name+'</p><input type="hidden" name="profile_'+k+'[]" value="'+form[i].value+'"><input type="hidden" name="profile_'+k+'[]" value="'+name+'"></div></div>';       
            row += '<div class="col-md-9 border_left_ddd"><div class="rowedit2"><div class="col-xs-3 body-blac4">Loại hình phỏng vấn:</div>';
            row += '<div class="col-xs-8"><select class="js-example-basic-2 " name="profile_'+k+'[]" required="" style="width: 100%"><option value="W">Phỏng vấn trực tiếp</option><option value="C">Phỏng vấn gián tiếp</option></select></div></div>';
            row += '<div class="rowedit2"><div class="col-xs-3 body-blac4">Thời gian:</div><div class="col-xs-3"><input class="kttext width_100 timepicker" type="text" name="profile_'+k+'[]" value="09:00"></div><div class="col-xs-3"><input class="kttext width_100 timepicker" type="text" name="profile_'+k+'[]" value="10:00"></div></div>';          
            row += '<div class="rowedit2"><div class="col-xs-3 body-blac4">Địa điểm:</div><div class="col-xs-8"><input class="kttext width_100" type="text" name="profile_'+k+'[]"></div></div>';             
            row += '<div class="rowedit3"><div class="col-xs-3 body-blac4">Nội dung:</div><div class="col-xs-8"><textarea name="profile_'+k+'[]" class="textarea_profile" rows="3" required=""></textarea></div></div>';              
            row += '<div class="rowedit3"><div class="col-xs-3 body-blac4">Người phỏng vấn:</div><div class="col-xs-8"><div class="col-xs-6 manage_pv" id="col_add_pt_'+k+'"><div ><img src="<?php echo base_url() ?>public/image/unknow.jpg"><a href="javascript:void(0)" class="add_pt" onclick="insertPV('+k+')"><span>Thêm người phỏng vấn</span></a></div></div></div><input type="hidden" id="managePV_'+k+'" name="profile_'+k+'[]"></div>';          
            row += '<div class="rowedit2"><div class="col-xs-3 body-blac4">Phiếu phỏng vấn:</div><div class="col-xs-8"><select class="js-example-basic-2" name="profile_'+k+'[]" required="" style="width: 100%"><option id="option_ass'+k+'" value="">Chọn phiếu phỏng vấn</option></select></div></div>';          
            row += '<div class="rowedit2"><div class="col-xs-3 body-blac4">Người phụ trách phiếu:</div><div class="col-xs-8"><select class="js-example-basic-2" name="profile_'+k+'[]" required="" style="width: 100%"><option id="option_'+k+'" value="">Chọn người phụ trách</option></select></div></div></div></div></div>';         
                    
          	if (email == '') {
            	email += name+'('+$('#candidateemail').val()+')';
            }else{
            	email += ', '+name+'('+$('#candidateemail').val()+')';
            }
            parent.parent.$('#count_candidate_pv').val(k);
            k = Number(k)+1;
		}
		parent.parent.$('#profile_taopv').append(row);
		parent.parent.$('#email_bcc_pv1').val(email);
		parent.parent.$('#campaignid_pv').val(campaignid);
		parent.parent.$('#roundid_pv').val(roundid);

		parent.parent.$('#createAppointment').modal('show');
	}
	function loadAppointment(interviewid) {
		parent.parent.location.href ='<?php echo base_url() ?>admin/interview/makingAppointment/'+interviewid;
	}


	function createInterviewer() {
		parent.parent.$('#createInterviewer').modal('show');
	}
	function createOffer() {
		parent.parent.$('.body_offer').remove();
		var form = $('#form_checkone').serializeArray();
		var campaignid = form[0].value;
		var roundid = form[1].value;
		var row ='';
		var email = '';
		var k = 1;
		for (var i = 2; i < form.length; i++) {
			var name = $('#candidatename').val();
			var avatar = $('#candidateimage').val();
			row += '<div class="body_cam col-xs-12 body_chuyen body_offer"><div class="row" style="margin-right: 0px">';
            row += '<div class="col-md-3 box_profile_tn"><div class="profile_tn"><img src="<?php echo base_url() ?>public/image/'+avatar+'"><p class="guide-black">'+name+'</p><input type="hidden" name="profile_'+k+'[]" value="'+form[i].value+'"><input type="hidden" name="profile_'+k+'[]" value="'+name+'"></div></div>';       
            row += '<div class="col-md-9 border_left_ddd"><div class="row"><div class="col-md-3 "><span>Ngày nhận việc</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90 datetimepicker" name="profile_'+k+'[]"></div></div>';
            row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Thời gian thử việc</span></div><div class="col-md-9 padding_0"><div class="col-md-6 padding_0"><input type="text"  name="profile_'+k+'[]"></div><div class="col-md-6"><input type="text"  name="" value="Tháng" readonly=""></div></div></div>';          
            row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Địa điểm</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90"  name="profile_'+k+'[]"></div></div>';             
            row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Chế độ làm việc</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90" name="profile_'+k+'[]"></div></div>';              
            row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Người hướng dẫn</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90" name="profile_'+k+'[]"></div></div>';          
            row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Báo cáo cho</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90" name="profile_'+k+'[]"></div></div>';          
            row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Mức lương thử việc</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90" name="profile_'+k+'[]"></div></div>';              
            row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Mức lương chính thức</span></div><div class="col-md-9 padding_0"><input type="text" class="width_90" name="profile_'+k+'[]"></div></div>';          
            row += '<div class="row margin_top_15"><div class="col-md-3 "><span>Phụ cấp</span></div><div class="col-md-9 padding_0"><textarea rows="3" class="width_90 textarea_profile" name="profile_'+k+'[]"></textarea></div></div></div></div></div>';           
                  
          	if (email == '') {
            	email += name+'('+$('#candidateemail').val()+')';
            }else{
            	email += ', '+name+'('+$('#candidateemail').val()+')';
            }
            parent.parent.$('#count_candidate_offer').val(k);
            k = Number(k)+1;
		}
		parent.parent.$('#profile_offer').prepend(row);
		parent.parent.$('#mail_to_offer').val(email);
		parent.parent.$('#campaignid_offer').val(campaignid);
		parent.parent.$('#roundid_offer').val(roundid);

		parent.parent.$('#createOffer').modal('show');
	}
</script>