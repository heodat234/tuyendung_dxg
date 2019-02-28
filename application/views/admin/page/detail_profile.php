<?php $candidateid = ($candidate['candidateid'] != '')? $candidate['candidateid'] : $candidate_noibo['candidateid']; ?>
<form id="form_checkone">	
<input type="hidden" name="check[]" id="checkoneid" value="<?php echo $candidateid ?>" >
</form>
<input type="hidden" id="candidateemail" value="<?php echo ($candidate['email'] != '')? $candidate['email'] : $candidate_noibo['email']?>">
<div style="background-color: white">
	<div class="row rowedit">
		<?php $unsubcribe = ($candidate['unsubcribe'] != '')? $candidate['unsubcribe'] : $candidate_noibo['unsubcribe'];
		  $istalent = ($candidate['istalent'] != '')? $candidate['istalent'] : $candidate_noibo['istalent']; ?>
		<div class="col-md-6 col-xs-6">
			<label class="margin-t5 margin-b0" >
				<i class="fa fa-bell<?php echo ($unsubcribe == 'Y')? "-slash" : "";?> icon-detail"></i>
				<i class="fa fa-user icon-detail2"></i>
				<i class="fa fa-clock-o icon-detail3"></i>
			</label>
		</div>
		<div class="col-md-6 col-xs-6 hov-btn-ad">
				<button type="button" class="btn-icon-header" ><i class="fa fa-print color-ccc" ></i></button>
				<button type="button" class="btn-icon-header margin-r7" id="btn_sendMail" onclick="sendMail()" ><i class="fa fa-envelope-o color-ccc" ></i></button>
				<div class=""> 
					<button type="button" class="btn-icon-header margin-r7" id="starbtn" data-toggle="dropdown" >
						<span class="fa-stack fa-1x fixicon">
						  <i class="fa fa-star <?php echo ($istalent == '0')? "color-gray" : "color-orange";?> fa-stack-2x star-icon" id="iconstar_profile"></i>
						  <span class="fa fa-stack-1x color-white star-texta" id="textstar_profile"><?php echo ($istalent == 0)? "": $istalent;?></span>
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
					<?php if($candidate['blocked'] == 'Y' || $candidate_noibo['blocked'] == 'Y') { ?> 
						<i class="fa fa-ban color-red size-icon" ></i>
						<?php } else { ?>
						<i class="fa fa-check-circle-o color-green size-icon"></i> 
						<?php } ?>
				</button>
		</div>
	</div>
	<div class="margin-t4 dash-horizontal"  ></div>
	<?php if ($candidate['imagelink'] != ''){ 
		$image = $candidate['imagelink'];
	}else if ($candidate_noibo['imagelink']) {
		$image = $candidate_noibo['imagelink'];
	}else{ $image = 'unknow.jpg'; } ?>
	<img src="<?php echo base_url()?>public/image/<?php echo $image; ?>" class="image-avatar-ad" width="130px" height="130px">
	<div class="row rowcontent">
		<div class="col-md-6 col-xs-6">
			<label class="can-name"><?php echo ($candidate['name'] != '') ? $candidate['name'] : $candidate_noibo['name'];  ?> <?php echo ($recruite >0)? '<i class="fa fa-flag color-flag-recruite" ></i>' : '' ?></label>
			<label class="cv-old"><?php echo ($vt != ' - ') ? $vt : $vt_noibo; ?></label>
			<label class="tag-lb">
				<?php $aa = array();
				$tag = (count($tags) != 0)? $tags : $tags_noibo;
				foreach ($tag as $key) {
					array_push($aa, $key['title']);
				}
			
				echo implode(", ", $aa);
				?></label>
			<span class="highR"><?php $aaa = array();
				foreach ($tagstrandom_noibo as $key) {
					array_push($aaa, "#".$key['title']);
				}
				echo implode(", ", $aaa);
				?>
			</span>
		</div>
		<div class="col-md-6 col-xs-6" style="text-align: right; padding-right: 30px">
			<label class="diem"><?php echo round($comment['scores'])?> điểm</label>
			<label class="mau3"><?php echo $count_campaign ?> chiến dịch</label>
			<br><br>
			<span class="webportal"><?php echo ($candidate['profilesrc'] != '') ? $candidate['profilesrc'] : $candidate_noibo['profilesrc']; ?></span>							
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
	        <li class="<?php echo ($tabActive == '1')?'active' : '' ?>"><a data-toggle="tab" href="#total" class="nemu-info-pf">Cá nhân</a></li>
	        <li class="<?php echo ($tabActive != '1')?'active' : '' ?>"><a data-toggle="tab" href="#personal" class="nemu-info-pf" >Nội bộ</a></li>
	        <?php for ($i= 1; $i<= count($candidate_con);$i++) {
	        	echo '<li><a data-toggle="tab" href="#hs_'.$i.'" class="nemu-info-pf" >Hồ sơ '.$i.'</a></li>';
	        } ?>
	    </ul>
    </div>
    <!-- ket thuc phan heading cua tab 1 thong tin ung vien -->
    <!-- <div class="pull-right"><button class="btn btn-info" id="btn_tab_canhan">Đóng/Mở</button></div> -->
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body tab-collapse" style="margin-top: 20px">
      	 <div class="tab-content">
      	 	
        	<div id="total" class="tab-pane <?php echo ($tabActive == '1')?'in active' : '' ?>">
        		<div style="margin-bottom: 15px;margin-left: 15px">Ngày cập nhật mới nhất: <?php echo ($lastupdate[0][0] != '')? date_format(date_create($lastupdate[0][0]),"d/m/Y H:i:s") : '' ?></div>
        		<div class="panel-group bor-mar-b0">
					<div class="panel panel-default border-rad0">
					    <div class="panel-heading cyan-profile rad-pad0">
					     	<div class="col-xs-11" style="text-align: left; margin-left: 15px;">
					        	Tổng quát &nbsp;
					    	</div>
					        <div class="col-md-1" style="text-align: right;">
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
					             <label class="fontArial colorcyan labelcontent" >
					             	<?php $canhan = array();
										foreach ($tags as $key) {
											array_push($canhan, $key['title']);
										}
										echo implode(", ", $canhan);
										?>
					             </label>
					             
					            </div>
					         </div>
					          <div class="width100 row rowedit h-auto">
					             <label for="text" class="width20 col-xs-3 label-profile">Thu nhập hiện tại</label>
					             <label class="width20 col-xs-3 fontArial colorgray labelcontent" ><?php echo number_format($candidate['currentbenefit'])?> </label>
					             <label for="text" class="width30 col-xs-3 label-profile" >Thu nhập mong muốn</label>
					             <label class="width30 col-xs-3 fontArial colorgray labelcontent"><?php echo number_format($candidate['desirebenefit'])?> </label>
					         </div>
					         <div class="width100 row rowedit h-auto">
					            <label for="text" class="width20 col-xs-3 label-profile ">Địa chỉ MXH</label>
					            <div class="width80 col-xs-9 padding-lr0">
					             <label class="fontArial colorcyan labelcontent" >
					             	<a href="<?php echo $candidate['snid']?>" target="_blank" ><?php echo $candidate['snid']?></a>
					             </label>
					             
					            </div>
					         </div>
					          <div class="width100 row rowedit h-auto">
					          	<!-- <form id="form_CV" > -->
					          		<label for="text" class="width20 col-xs-3 label-profile">Hồ sơ tải lên</label>
						            <!-- <div class="col-sm-2"> -->
				                    	<!-- <label id="browsebutton1" class=" btn-default btn-tailen" for="my-file-selector1" style="background-color:white">
					                        <input id="my-file-selector1" name="fileCV" type="file" accept=".pdf,.doc,.docx,.xlsx" style="display:none;">
					                        <i class="fa fa-download"></i> Chọn CV
					                    </label> -->
				                    <!-- </div> -->
				                    <div class="col-sm-5"> 
				                      <?php if (isset($document) && !empty($document)){
				                        $url = $document['url'];
				                        $name = $document['filename'];
				                      }else{$url =''; $name = '';}?>
				                        <label class="fontArial colorcyan labelcontent" ><a id="label1"  class="fontstyle" target="_blank" href="<?php echo $url; ?>"><?php echo $name; ?> </a></label>
				                    </div>
				                    <input type="hidden" name="candidateid" value="<?php echo $candidateid ?> ">
				                    <div class="col-sm-2"><button type="button" id="uploadCV" class="btn btn-info">Tải lên</button></div>
					          <!-- 	</form> -->
					         </div>
					  	  </div>
					    </div>
					    <!-- body ho so ca nhan -->
					</div>
					<!--   ket thuc ho so ca nhan -->
					<div class="panel panel-default border-rad0">
					    <div class="panel-heading cyan-profile rad-pad0">
					     	<div class="col-xs-11" style="text-align: left; margin-left: 15px;">
					        	Cá nhân &nbsp;
					    	</div>
					        <div class="col-md-1" style="text-align: right;">
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
					            <label for="text" class="width20 col-xs-3 label-profile">Nguyên Quán</label>
					            <div class="width20 col-xs-3 padding-lr0">
					             <label class="fontArial colorgray labelcontent" ><?php echo $candidate['nativeland']?></label>
					            </div>
					            <label for="text" class="width20 col-xs-3 label-profile">Tôn Giáo</label>
					            <div class="width30 col-xs-3 padding-lr0">
					             <label class="fontArial colorgray labelcontent" ><?php echo $candidate['religion']?></label>
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
				    	<div class="panel-heading cyan-profile rad-pad0">
					     	<div class="col-xs-11" style="text-align: left; margin-left: 15px;">
					        	Liên hệ &nbsp;
					    	</div>
					        <div class="col-md-1" style="text-align: right;">
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
					    <div class="panel-heading cyan-profile rad-pad0">
					     	<div class="col-xs-11" style="text-align: left; margin-left: 15px;">
					        	Gia đình &nbsp;
					    	</div>
					        <div class="col-md-1" style="text-align: right;">
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
					    <div class="panel-heading cyan-profile rad-pad0">
					     	<div class="col-xs-11" style="text-align: left; margin-left: 15px;">
					        	Kinh nghiệm &nbsp;
					    	</div>
					        <div class="col-md-1" style="text-align: right;">
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
						                <th id="th" width="23%">NV/ Trách nhiệm</th>
						                 <th id="th" class="middle2" width="17%">Lý do nghỉ</th>
						              </tr> 
						            </thead> 
						            <tbody class="fontstyle text-center"> 
						             <?php if($experience != null) { 
						              $i = 0;
						              foreach ($experience as $key) { ?>
						             <tr>
						              
						              <td><?php echo date("d/m/Y", strtotime($key['datefrom'])).' - '.date("d/m/Y", strtotime($key['dateto']))?></td>
						              <td><?php echo $key['company']." / ".$key['address']." / ".$key['phone']?></td>
						              <td><?php echo $key['position']?></td>
						              <td style="text-align: left;"><?php echo nl2br($key['responsibility']) ?></td>
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
					     	<div class="col-xs-11" style="text-align: left; margin-left: 15px;">
					        	Học vấn &nbsp;
					    	</div>
					        <div class="col-md-1" style="text-align: right;">
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
						              <td><?php echo date("d/m/Y", strtotime($key['datefrom'])).' - '.date("d/m/Y", strtotime($key['dateto']))?></td>
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
						              <td><?php echo date("d/m/Y", strtotime($key['datefrom'])).' - '.date("d/m/Y", strtotime($key['dateto']))?></td>
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
					     	<div class="col-xs-11" style="text-align: left; margin-left: 15px;">
					        	Ngoại ngữ &nbsp;
					    	</div>
					        <div class="col-md-1" style="text-align: right;">
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
					    <div class="panel-heading cyan-profile rad-pad0">
					     	<div class="col-xs-11" style="text-align: left; margin-left: 15px;">
					        	Tin học &nbsp;
					    	</div>
					        <div class="col-md-1" style="text-align: right;">
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

       		<div id="personal" class="tab-pane <?php echo ($tabActive != '1')?'in active' : '' ?>">
       			<div style="margin-bottom: 15px;margin-left: 15px">Ngày cập nhật mới nhất: <?php echo ($lastupdate_noibo[0][0] != '')? date_format(date_create($lastupdate_noibo[0][0]),"d/m/Y H:i:s") : '' ?></div>
        		<div class="panel-group bor-mar-b0">
					<div class="panel panel-default border-rad0" id="tab1">
					    <div class="panel-heading cyan-profile rad-pad0">
					     	<div class="col-xs-11" style="text-align: left; margin-left: 15px;">
					        	Tổng quát &nbsp;
					    	</div>
					        <div class="col-md-1" style="text-align: right;">
					        	<a data-toggle="collapse" href="#collapsetotal2" class="a-expand">
	      						 <i class="fa fa-angle-right"></i></a>
					     	</div>
					    </div>
					    <!-- heading ho so noi bo -->
					    <div id="collapsetotal2" class="panel-collapse collapse tab_con_noibo in">
					    	<form method="POST" action="<?php echo base_url()?>admin/handling/insertCandidate_internal/<?php echo isset($candidate_noibo['candidateid'])? $candidate_noibo['candidateid'] : 0 ?>" enctype="multipart/form-data" >
					    		<input type="hidden" name="candidateid" value="<?php echo $candidateid ?>">
						      	<div class="panel-body" style="border: 0px">
						          <div class="width100">
						             <label for="text" class="width20 col-xs-3 label-profile">Họ tên</label>
						             <div class="col-xs-3 width30 padding-lr0">
						             	<input type="text" class="textbox" name="firstname" value="<?php echo isset($candidate_noibo['firstname'])? $candidate_noibo['firstname'] : "";?>" placeholder="Họ">
						             </div>
						             <label for="text" class="col-xs-3 width20 col-xs-3 label-profile">Email</label>
						             <div class="col-xs-3 width30 padding-lr0">
						             	<input type="text" class="textbox" name="email" value="<?php echo isset($candidate_noibo['email'])? $candidate_noibo['email'] : "";?>" >
						             </div>   
						         </div>
						         <br><br>
						         <div class="width100">
						             <label for="text" class="width20 col-xs-3 label-profile"></label>
						             <div class="col-xs-3 width30 padding-lr0">
						             	<input type="text" class="textbox" name="lastname" value="<?php echo isset($candidate_noibo['lastname'])? $candidate_noibo['lastname'] : "";?>" placeholder="Tên">
						             </div>
						             <label for="text" class="col-xs-3 width20 col-xs-3 label-profile">CMND/ ID</label>
						             <div class="col-xs-3 width30 padding-lr0">
						             	<input type="text" class="textbox" name="idcard" maxlength="" value="<?php echo isset($candidate_noibo['idcard'])? $candidate_noibo['idcard'] : "";?>">
						             </div>   
						         </div>
						         <br><br>
						         <div class="width100">
						             <label for="text" class="width20 col-xs-3 label-profile">Nguồn hồ sơ</label>
						             <div class="col-xs-3 width30 padding-lr0">
						             	<select class="textbox" name="profilesrc">
						             		<option value="Nội bộ" <?php echo (isset($candidate_noibo['profilesrc']) && $candidate_noibo['profilesrc'] == "Nội bộ")? "selected" : "";?> >Nội bộ</option>
						             	</select>
						             </div>
						         </div>
						         <br><br>
						         <div class="width100">
						             <label for="text" class="width20 col-xs-3 label-profile">Vị trí phù hợp</label>
						             <div class="col-xs-9 width80 padding-lr0" style="padding-bottom: 5px">
						             	 <div id="the-basics" style="font-size: 15px">
						                    <input id="typeahead" type="text" data-role="" name="tags" value="
						                    <?php for($i=0; $i < count($tags_noibo) ; $i++)
						                          {
						                            echo $tags_noibo[$i]['title'];
						                            if($i < count($tags_noibo)-1)
						                            {
						                              echo ',';
						                            }
						                          }
						                    ?>
						                    ">
						                  </div>
						                  
						             </div>
						         </div>
						         <br><br>
						         <div class="width100">
						             <label for="text" class="width20 col-xs-3 label-profile">Tag</label>
						             <div class="col-xs-9 width80 padding-lr0">
									<input name="tagsrandom" type="text" data-role="tagsinput" value="
										<?php for($i=0; $i < count($tagstrandom_noibo) ; $i++)
							                          {
							                            echo $tagstrandom_noibo[$i]['title'];
							                            if($i < count($tagstrandom_noibo)-1)
							                            {
							                              echo ',';
							                            }
							                          }
							                    ?>">
						             </div>
						         </div>
						         <br><br>
						         <div class="width100">
						             <label for="text" class="width20 col-xs-3 label-profile">Địa chỉ MXH</label>
						             <div class="col-xs-9 width80 padding-lr0">
										<input name="snid" type="text" class="textbox width100" value="<?php echo isset($candidate_noibo['snid'])? $candidate_noibo['snid'] : "";?>">
						             </div>
						         </div>
						         <br><br>
						         <div class="width100">
						            <label for="text" class="width20 col-xs-3 label-profile">Hồ sơ tải lên</label>
						            <div class="col-sm-2">
				                    	<label id="browsebutton2" class=" btn-default btn-tailen" for="my-file-selector2" style="background-color:white">
					                        <input id="my-file-selector2" name="fileCV1" type="file" accept=".pdf,.doc,.docx,.xlsx" style="display:none;">
					                        <i class="fa fa-download"></i> Chọn CV
					                    </label>
				                    </div>
				                    <div class="col-sm-5"> 
				                      <?php if (isset($document_noibo) && !empty($document_noibo)){
				                        $url = $document_noibo['url'];
				                        $name = $document_noibo['filename'];
				                      }else{$url =''; $name = '';}?>
				                        <label class="fontArial colorcyan labelcontent" ><a id="label2"  class="fontstyle" target="_blank"  href="<?php echo $url; ?>"><?php echo $name; ?> </a></label>
				                    </div>
						         </div>
						         <button type="submit" class="btn-luu-nav floatright"> Lưu</button>
						  	  	</div>
					  	  	</form>
					    </div>
					    <!-- body ho so noi bo -->
					</div>
					<!-- ket thuc ho so noi bo tong quat-->
				  	<div class="panel panel-default border-rad0" id="tab2">
				    	<div class="panel-heading cyan-profile rad-pad0">
				     		<div class="col-xs-11" style="text-align: left; margin-left: 15px;">
					        	Cá nhân &nbsp;
					    	</div>
					        <div class="col-md-1" style="text-align: right;">
					        	<a data-toggle="collapse" href="#collapsetotal22" class="a-expand">
	      						 <i class="fa fa-angle-right"></i></a>
					     	</div>
				    	</div>
				    	<!-- heading ho so noi bo 2-->
				    	<div id="collapsetotal22" class="panel-collapse collapse tab_con_noibo in">
			    		<form id="form_canhan_<?php echo $candidate_noibo['candidateid'] ?>">
					      	<div class="panel-body" style="border: 0px">
					          <div class="width100">
					             <label for="text" class="width20 col-xs-3 label-profile">Ngày sinh/ Giới tính</label>
					             <div class="col-xs-3 width30 padding-lr0">
					             	<input type="text" name="dateofbirth" id="dateofbirth" class="textbox2" value="<?php echo isset($candidate_noibo['dateofbirth'])? date("d-m-Y", strtotime($candidate_noibo['dateofbirth'])) : "";?>">
					             </div>
					             <div class="col-xs-1 width5 padding-lr0"></div>
					             <label class="radio-inline">
				                    <input type="radio" name="gender" <?php echo (isset($candidate_noibo['gender']) && $candidate_noibo['gender'] == "M")? "checked" : ""; ?> value="M"> Nam
				                  </label>
				                  <label class="radio-inline">
				                    <input type="radio" name="gender" <?php echo (isset($candidate_noibo['gender']) && $candidate_noibo['gender'] == "F")? "checked" : ""; ?> value="F"> Nữ
				                  </label>
					         </div>
					         <br>
					         <div class="width100">
					             <label for="text" class="width20 col-xs-3 label-profile">Nơi sinh</label>
					             <div class="col-xs-3 width30 padding-lr0">
					             	<select class="textbox2 js-example-basic-single" name="placeofbirth" style="width: 100%">
						                 <option value="0" >Chọn tỉnh thành</option>
						                <?php foreach ($city as $key ) {
						                	if( isset($candidate_noibo['placeofbirth']) && $key['name'] == $candidate_noibo['placeofbirth'])
						                	{
						                ?>
						                 <option value="<?php echo $key['name'] ?>" selected><?php echo $key['name'] ?></option>
						                 <?php } else { ?>
						                  <option value="<?php echo $key['name'] ?>"><?php echo $key['name'] ?></option>
						                  <?php } } ?>
					                </select>
					             </div> 
					         </div>
					         <br><br>
					         <div class="width100">
					             <label for="text" class="width20 col-xs-3 label-profile">Dân tộc</label>
					             <div class="col-xs-3 width30 padding-lr0">
					             	<input type="text" name="ethnic" class="textbox2" value="<?php echo isset($candidate_noibo['ethnic'])? $candidate_noibo['ethnic'] : "";  ?>">
					             </div>
					         </div>
					         <br><br>
					         <div class="width100">
					             <label for="text" class="width20 col-xs-3 label-profile">Quốc tịch</label>
					             <div class="col-xs-3 width30 padding-lr0">
					             	<select class="textbox2" name="nationality">
					             		<option value="Việt Nam">Việt Nam</option>
					             		<option value="Khác" <?php echo (isset($candidate_noibo['nationality']) && $candidate_noibo['nationality'] == "Khác")? "selected" : "";  ?> > Khác</option>
					             	</select>
					             </div>
					         </div>
					         <br><br>
					         <div class="width100">
					             <label for="text" class="width20 col-xs-3 label-profile">Nguyên Quán</label>
					             <div class="col-xs-3 width30 padding-lr0">
					             	<input type="text" name="nativeland" class="textbox2" value="<?php echo isset($candidate_noibo['nativeland'])? $candidate_noibo['nativeland'] : "";  ?>">
					             </div>
					         </div>
					         <br><br>
					         <div class="width100">
					             <label for="text" class="width20 col-xs-3 label-profile">Tôn Giáo</label>
					             <div class="col-xs-3 width30 padding-lr0">
					             	<input type="text" name="religion" class="textbox2" value="<?php echo isset($candidate_noibo['religion'])? $candidate_noibo['religion'] : "";  ?>">
					             </div>
					         </div>
					         <br><br>
					         <div class="width100">
					             <label for="text" class="width20 col-xs-3 label-profile">Chiều cao (Cm)</label>
					             <div class="col-xs-3 width30 padding-lr0">
					             	<input type="text" id="height" name="height" class="textbox2" value="<?php echo isset($candidate_noibo['height'])? $candidate_noibo['height'] : "";  ?>" maxlength="3" >
					             </div>
					         </div>
					         <br><br>
					         <div class="width100">
					             <label for="text" class="width20 col-xs-3 label-profile">Cân nặng (Kg)</label>
					             <div class="col-xs-3 width30 padding-lr0">
					             	<input type="text" id="weight" name="weight" class="textbox2" value="<?php echo isset($candidate_noibo['weight'])? $candidate_noibo['weight'] : "";  ?>" maxlength="3">
					             </div>
					         </div>
					         <br><br>
					         <div class="width100">
					             <label for="text" class="width20 col-xs-3 label-profile">Ngày cấp/ Nơi cấp</label>
					             <div class="col-xs-3 width30 padding-lr0"> 
					             	<input type="text"  name="dateofissue"  id="dateofissue" class="textbox2" value="<?php echo isset($candidate_noibo['dateofissue'])? date("d-m-Y", strtotime($candidate_noibo['dateofissue'])) : "";  ?>">
					             </div>
					             <div class="col-xs-1 width5 padding-lr0"></div>
					             <div class="col-xs-3 width30 padding-lr0">
					             	<select class="textbox2 js-example-basic-single" name="placeofissue" style="width: 100%">
						                 <option value="0" >Chọn tỉnh thành</option>
						                <?php foreach ($city as $key ) {
						                	if( isset($candidate_noibo['placeofissue']) && $key['name'] == $candidate_noibo['placeofissue'] )
						                	{
						                ?>
						                <option value="<?php echo $key['name'] ?>" selected><?php echo $key['name'] ?></option>	
						                <?php 
						                	} else {
						                ?>
						                  <option value="<?php echo $key['name'] ?>"><?php echo $key['name'] ?></option>
						                  <?php } } ?>
					                </select>
					             </div> 
					         </div>
					         <button type="button" class="btn-luu-nav floatright margin-t35" <?php echo isset($candidate_noibo)? "" : "disabled";?> onclick="luu_canhan(<?php echo $candidate_noibo['candidateid'] ?>)"> Lưu</button>
					  	  	</div>
				  		</form>
				    	</div>
				    	<!-- body ho so noi bo 2-->
				  	</div>
				  	<!-- ket thuc ho so noi bo ca nhan-->
				  	<div class="panel panel-default border-rad0" id="tab3">
				    	<div class="panel-heading cyan-profile rad-pad0">
					     	<div class="col-xs-11" style="text-align: left; margin-left: 15px;">
					        	Liên hệ &nbsp;
					    	</div>
					        <div class="col-md-1" style="text-align: right;">
					        	<a data-toggle="collapse" href="#collapsetotal32" class="a-expand">
	      						 <i class="fa fa-angle-right"></i></a>
					     	</div>
				    	</div>
				    	<!-- heading ho so noi bo 3-->
				    	<div id="collapsetotal32" class="panel-collapse collapse tab_con_noibo in">
				    		<form id="form_diachi_<?php echo $candidate_noibo['candidateid'] ?>">
							      <div class="panel-body" style="border: 0px">
							          <div class="width100">
							             <label for="text" class="width20 col-xs-3 label-profile">Địa chỉ thường trú</label>
							             <div class="col-xs-3 width30 padding-lr0">
							             	<select class="textbox2" name="country1" >
							             		<option value="Việt Nam">Việt Nam</option>
							             		<option value="Khác" <?php 
							             		$n1 = isset($canaddress_noibo)? count($canaddress_noibo) : 0;
							             		for ($i = 0; $i < $n1; $i++) {
								             		if( ($canaddress_noibo[$i]['addtype'] == 'PREMANENT') && ($canaddress_noibo[$i]['country'] == 'Khác'))
								             		{
								             			echo "selected";
								             			break;
								             		}
							             		}
							             		?>
							             		>Khác</option>
							             	</select>
							             	<div class="h10-w-auto"></div>
							             	<select class="textbox2 js-example-basic" onchange="comb_tp_qh_1(this.value,0,<?php echo $candidate_noibo['candidateid'] ?>)" 
							             		name="city1" id="city1" style="width: 100%;">
								                 <option value="0" >Chọn tỉnh thành</option>
								                <?php foreach ($city as $key ) 
								                {
								                	$fdc = 0;
								                	if(isset($canaddress_noibo))
								                	{
								                		foreach ($canaddress_noibo as $value) {
								                			if($value['addtype'] == 'PREMANENT' && $value['city'] == $key['id_city'])
								                			{
								                				?>
								                				<option value="<?php echo $key['id_city'] ?>" selected><?php echo $key['name'] ?></option>
								                				<?php
								                				$fdc = 1;
								                				break;
								                			}
								                		}
								                	}

												 	if($fdc == 0) {?>		
								                  <option value="<?php echo $key['id_city'] ?>"><?php echo $key['name'] ?></option>
								                  <?php }
								                } ?>
							                </select>
							                <div class="h10-w-auto"></div>

							                <select class="seletext js-example-basic" name="district1" id="district1" style="width: 100%" onchange="comb_qh_px_1(this.value,0,<?php echo $candidate_noibo['candidateid'] ?>)">
							                 	<option value="0" id="chonqh-ad1_<?php echo $candidate_noibo['candidateid'] ?>" >Chọn quận huyện</option>
							                </select>
							                <div class="h10-w-auto"></div>
							                 <select class="textbox2 js-example-basic" name="ward1" id="phuongxa8-ad" style="width: 100%" >
							                 	<option value="0" id="chonpx-ad1_<?php echo $candidate_noibo['candidateid'] ?>" >Chọn phường xã</option>				                
							                </select>
							                <div class="h10-w-auto"></div>

							                 <textarea class="form-control off-resize fontstyle" rows="2" name="street1" id="duong8"><?php
							                 	if(isset($canaddress_noibo))
								                	{
								                		foreach ($canaddress_noibo as $value) {
								                			if($value['addtype'] == 'PREMANENT')
								                			{
								                				echo trim($value['street']);
								                				break;
								                			}
								                		}
								                	}
							                 ?></textarea>
							                 <div class="h10-w-auto"></div>
							                   <textarea class="form-control off-resize fontstyle" rows="2" name="addressno1" id="toanha88_<?php echo $candidate_noibo['candidateid'] ?>"
							                   ><?php 
							                 	if(isset($canaddress_noibo))
								                	{
								                		foreach ($canaddress_noibo as $value) {
								                			if($value['addtype'] == 'PREMANENT')
								                			{
								                				if ($value['addressno'] != '' || $value['city'] != '') {
								                					echo trim($value['addressno']);
								                				}else{
								                					echo trim($value['address']);
								                				}
								                				break;
								                			}
								                		}
								                	}
							                 ?>
							                   </textarea>
							             </div>
							            
							             <label for="text" class="width20 col-xs-3 label-profile" style="padding-left: 15px">Địa chỉ liên hệ</label>
							             <div class="col-xs-3 width30 padding-lr0">
							             	<select class="textbox2" name="country2">
							             		<option value="Việt Nam">Việt Nam</option>
							             		<option value="Khác" <?php 
							             		$n1 = isset($canaddress_noibo)? count($canaddress_noibo) : 0;
							             		for ($i = 0; $i < $n1; $i++) {
								             		if( ($canaddress_noibo[$i]['addtype'] == 'CONTACT') && ($canaddress_noibo[$i]['country'] == 'Khác'))
								             		{
								             			echo "selected";
								             			break;
								             		}
							             		}
							             		?>
							             		>Khác</option>
							             	</select>
							             	<div class="h10-w-auto"></div>
							             	<select class="textbox2 js-example-basic" id="city2" name="city2" style="width: 100%" onchange="comb_tp_qh_2(this.value,0,<?php echo $candidate_noibo['candidateid'] ?>)">
								                 <option value="0" >Chọn tỉnh thành</option>
								                <?php foreach ($city as $key ) 
								                {
								                	$fdc = 0;
								                	if(isset($canaddress_noibo))
								                	{
								                		foreach ($canaddress_noibo as $value) {
								                			if($value['addtype'] == 'CONTACT' && $value['city'] == $key['id_city'])
								                			{
								                				?>
								                				<option value="<?php echo $key['id_city'] ?>" selected><?php echo $key['name'] ?></option>
								                				<?php
								                				$fdc = 1;
								                				break;
								                			}
								                		}
								                	}

												 	if($fdc == 0) {?>		
								                  <option value="<?php echo $key['id_city'] ?>"><?php echo $key['name'] ?></option>
								                  <?php }
								                } ?>
							                </select>
							                <div class="h10-w-auto"></div>
							                <select class="seletext js-example-basic" name="district2" id="district2" style="width: 100%" onchange="comb_qh_px_2(this.value,0,<?php echo $candidate_noibo['candidateid'] ?>)">
							                 <option value="0" id="chonqh-ad2_<?php echo $candidate_noibo['candidateid'] ?>" >Chọn quận huyện</option>
							                </select>
							                <div class="h10-w-auto"></div>
							                 <select class="seletext js-example-basic" name="ward2" id="phuongxa8" style="width: 100%">
							                 	<option value="0" id="chonpx-ad2_<?php echo $candidate_noibo['candidateid'] ?>" >Chọn phường xã</option>
							                </select>
							                <div class="h10-w-auto"></div>
							                 <textarea class="form-control off-resize fontstyle" rows="2" name="street2" id="duong8" 
							                 ><?php 
							                 	if(isset($canaddress_noibo))
								                	{
								                		foreach ($canaddress_noibo as $value) {
								                			if($value['addtype'] == 'CONTACT')
								                			{
								                				echo trim($value['street']);
								                				break;
								                			}
								                		}
								                	}
							                 ?>
							                 </textarea>
							                 <div class="h10-w-auto"></div>
							                   <textarea class="form-control off-resize fontstyle" rows="2" name="addressno2" id="toanha8_<?php echo $candidate_noibo['candidateid'] ?>"
							                   ><?php 
							                 	if(isset($canaddress_noibo))
								                	{
								                		foreach ($canaddress_noibo as $value) {
								                			if($value['addtype'] == 'CONTACT')
								                			{
								                				if ($value['addressno'] != '' || $value['city'] != '') {
								                					echo trim($value['addressno']);
								                				}else{
								                					echo trim($value['address']);
								                				}
								                				break;
								                			}
								                		}
								                	}
							                 ?></textarea>
							             </div>
							         </div>

							         <div class="width100">
							             <label for="text" class="width20 col-xs-3 label-profile margin-t10" >Số điện thoại</label>
							             <?php 
							                    $pizza  = $candidate_noibo['telephone'];
							                    $pieces = explode(",", $pizza);
							                    $p1 = isset($pieces[0])? $pieces[0] : "" ;
							                    $p2 = isset($pieces[1])? $pieces[1] : "" ;
							              ?>
							             <div class="col-xs-3 width30 padding-lr0">
							             	<input type="text" name="phone1" class="textbox2 margin-t10" value="<?php echo $p1;?>">
							             </div>
							             <div class="col-xs-3 width40 padding-lr0 mar-tam" >
							             	<input type="text" name="phone2" class="textbox2" value="<?php echo $p2;?>">
							             </div>
							         </div>
							         
							        
							         <div class="width100 pull-left">
							             <label for="text" class="width20 col-xs-3 label-profile margin-t10" >Liên lạc khẩn cấp</label>
							             <div class="col-xs-3 width30 padding-lr0">
							             	<input type="text" name="emergencycontact" class="textbox2 margin-t10" value="<?php echo isset($candidate_noibo['emergencycontact'])? $candidate_noibo['emergencycontact'] : "";?>" > 
							             </div>
							         </div>
							         <button type="button" class="btn-luu-nav floatright margin-t35" <?php echo isset($candidate_noibo)? "" : "disabled";?> onclick="luu_diachi(<?php echo $candidate_noibo['candidateid'] ?>)"> Lưu</button>
							  	  </div>
					  		</form>
				    	</div>
				    	<!-- body ho so noi bo 3-->
				  	</div>
				  	<!-- ket thuc ho so noi bo lien he-->
				  	<div class="panel panel-default border-rad0" id="tab4">
					    <div class="panel-heading cyan-profile rad-pad0">
					     	<div class="col-xs-11" style="text-align: left; margin-left: 15px;">
					        	Gia đình &nbsp;
					    	</div>
					        <div class="col-md-1" style="text-align: right;">
					        	<a data-toggle="collapse" href="#collapsetotal42" class="a-expand">
	      						 <i class="fa fa-angle-right"></i></a>
					     	</div>
					    </div>
					    <!-- heading ho so noi bo 4-->
					    <div id="collapsetotal42" class="panel-collapse collapse tab_con_noibo in">
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
				            	  <?php if($family_noibo != null) {
						                $i = 0;
						              foreach ($family_noibo as $key) { ?>
						             <tr>
						              <form id="<?php echo 'click'.$i ?>">
						                <input type="hidden" name="hoten" value="<?php echo $key['name']?>">
						                <input type="hidden" name="namsinh" value="<?php echo $key['yob']?>">
						                <input type="hidden" name="quanhe" value="<?php echo $key['type']?>">
						                <input type="hidden" name="nghenghiep" value="<?php echo $key['career']?>">
						                <input type="hidden" name="recordid" value="<?php echo $key['recordid']?>">
						                <input type="hidden" name="candidateid_main" value="<?php echo $candidateid ?>">
						                <input type="hidden" name="candidateid_sub" value="<?php echo $candidate_noibo['candidateid']?>">
						              </form>
						              <td><?php echo $key['name']?></td>
						              <td><?php echo ($key['yob'] !== 0) ? $key['yob'] : ""; ?></td>
						              <td><?php echo ($key['type'] !== '0') ? $key['type'] : ""; ?></td>
						              <td><?php echo $key['career']?></td>
						              <td><i class="fa fa-edit" onclick="editmodal('<?php echo 'click'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal('<?php echo 'click'.$i ?>')"></i></td>
						             </tr>
						             <?php $i++;} } 
					               ?>
					            </tbody> 
					          </table>
					          <a href="#" onclick="showmodel11(<?php echo $candidateid?>,<?php echo $candidate_noibo['candidateid']?>)" <?php echo isset($candidate_noibo)? "" : "disabled";?>><label class="floatright">Thêm quan hệ <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a>
					  	  </div>
					    </div>
					    <!-- body ho so noi bo 4-->
				  	</div>
				  	<!-- ket thuc ho so noi bo gia đình-->
				  	<div class="panel panel-default border-rad0" id="tab5">
					    <div class="panel-heading cyan-profile rad-pad0">
					     	<div class="col-xs-11" style="text-align: left; margin-left: 15px;">
					        	Kinh nghiệm &nbsp;
					    	</div>
					        <div class="col-md-1" style="text-align: right;">
					        	<a data-toggle="collapse" href="#collapsetotal52" class="a-expand">
	      						 <i class="fa fa-angle-right"></i></a>
					     	</div>
					    </div>
					    <!-- heading ho so noi bo 5-->
					    <div id="collapsetotal52" class="panel-collapse collapse tab_con_noibo in">
					      <div class="panel-body" style="border: 0px">				         
					          <table   class="table table-striped table-bordered" > 
						            <thead class="fontstyle"> 
						              <tr > 
						                <th id="th" class="middle2" width="20%">Từ - Đến</th> 
						                <th id="th" class="middle2" width="20%">Cty/ Địa chỉ/ ĐT</th> 
						                <th id="th" width="13%">CV khi nghỉ</th> 
						                <th id="th" width="23%">NV/ Trách nhiệm</th>
						                 <th id="th" class="middle2" width="17%">Lý do nghỉ</th>
						                 <th id="th" width="10%"></th>
						              </tr> 
						            </thead> 
						            <tbody class="fontstyle text-center"> 
						             <?php if($experience_noibo != null) { 
						              $i = 0;
						              foreach ($experience_noibo as $key) { ?>
						             <tr>
						              <form id="<?php echo 'click2'.$i ?>">
						                <input type="hidden" name="tungay" value="<?php echo date("d-m-Y", strtotime($key['datefrom']))?>">
						                <input type="hidden" name="denngay" value="<?php echo date("d-m-Y", strtotime($key['dateto']))?>">
						                <input type="hidden" name="cty" value="<?php echo $key['company']?>">
						                <input type="hidden" name="vitri" value="<?php echo $key['position']?>">
						                <input type="hidden" name="nhiemvu" value="<?php echo $key['responsibility']?>">
						                <input type="hidden" name="lydo" value="<?php echo $key['quitreason']?>">
						                <input type="hidden" name="recordid" value="<?php echo $key['recordid']?>">
						                <input type="hidden" name="diachi" value="<?php echo $key['address']?>">
						                <input type="hidden" name="sdt" value="<?php echo $key['phone']?>">
						                <input type="hidden" name="candidateid_main" value="<?php echo $candidateid ?>">
						                <input type="hidden" name="candidateid_sub" value="<?php echo $candidate_noibo['candidateid']?>">
						              </form>
						              <td><?php echo date("d/m/Y", strtotime($key['datefrom'])).' - '.date("d/m/Y", strtotime($key['dateto']))?></td>
						              <td><?php echo $key['company']." / ".$key['address']." / ".$key['phone']?></td>
						              <td><?php echo $key['position']?></td>
						              <td style="text-align: left;"><?php echo nl2br($key['responsibility']) ?></td>
						              <td><?php echo $key['quitreason']?></td>
						              <td><i class="fa fa-edit" onclick="editmodal2('<?php echo 'click2'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal2('<?php echo 'click2'.$i ?>')"></i></td>
						             </tr>
						             
						             <?php $i++; } } ?>
						            </tbody> 
						          </table>
						          <a href="#" onclick="showmodel2(<?php echo $candidateid ?>,<?php echo $candidate_noibo['candidateid']?>)" <?php echo isset($candidate_noibo)? "" : "disabled";?>><label class="floatright">Thêm kinh nghiệm <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a>
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
									
					            		 <?php if($reference_noibo != null) {
							              $i = 0;
							              foreach ($reference_noibo as $key) { ?>
							             <tr>
							               <form id="<?php echo 'click3'.$i ?>">
							                <input type="hidden" name="hoten" value="<?php echo $key['name']?>">
							                <input type="hidden" name="vitri" value="<?php echo $key['position']?>">
							                <input type="hidden" name="cty" value="<?php echo $key['company']?>">
							                <input type="hidden" name="lienhe" value="<?php echo $key['contactno']?>">
							                <input type="hidden" name="recordid" value="<?php echo $key['recordid']?>">
							                <input type="hidden" name="candidateid_main" value="<?php echo $candidateid ?>">
						                	<input type="hidden" name="candidateid_sub" value="<?php echo $candidate_noibo['candidateid']?>">
							              </form>
							              <td><?php echo $key['name']?></td>
							              <td><?php echo $key['position']?></td>
							              <td><?php echo $key['company']?></td>
							              <td><?php echo $key['contactno']?></td>
							               <td><i class="fa fa-edit" onclick="editmodal3('<?php echo 'click3'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal3('<?php echo 'click3'.$i ?>')"></i></td>
							             </tr>
							             <?php $i++; } } ?>
							              
					            	
						            </tbody> 
						          </table>
					           <a href="#" onclick="showmodel3(<?php echo $candidateid ?>,<?php echo $candidate_noibo['candidateid']?>)" <?php echo isset($candidate_noibo)? "" : "disabled";?>><label class="floatright">Thêm người tham chiếu <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a>
					  	  </div>
					    </div>
					    <!-- body ho so noi bo 5-->
				  	</div>
				  	<!-- ket thuc ho so noi bo kinh nghiệm-->
				  	<div class="panel panel-default border-rad0" id="tab6">
					    <div class="panel-heading cyan-profile rad-pad0">
					     	<div class="col-xs-11" style="text-align: left; margin-left: 15px;">
					        	Học vấn &nbsp;
					    	</div>
					        <div class="col-md-1" style="text-align: right;">
					        	<a data-toggle="collapse" href="#collapsetotal62" class="a-expand">
	      						 <i class="fa fa-angle-right"></i></a>
					     	</div>
					    </div>
					    <!-- heading ho so noi bo 6-->
					    <div id="collapsetotal62" class="panel-collapse collapse tab_con_noibo in">
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
						              <?php if($knowledge_noibo != null) {
							                $i = 0;
							              foreach ($knowledge_noibo as $key) { 
							                if($key['traintimetype'] != null)
							                  { continue; } else {?>
							             <tr>
							              <form id="<?php echo 'click4'.$i ?>">
							                <input type="hidden" name="tu" value="<?php echo date("d-m-Y", strtotime($key['datefrom'])) ?>">
							                <input type="hidden" name="den" value="<?php echo date("d-m-Y", strtotime($key['dateto'])) ?>">
							                <input type="hidden" name="truong" value="<?php echo $key['trainingcenter']?>">
							                <input type="hidden" name="noihoc" value="<?php echo $key['trainingplace']?>">
							                <input type="hidden" name="nganhhoc" value="<?php echo $key['trainingcourse']?>">
							                <input type="hidden" name="chungchi" value="<?php echo $key['certificate']?>">
							                <input type="hidden" name="caonhat" value="<?php echo $key['highestcer']?>">
							                <input type="hidden" name="recordid" value="<?php echo $key['recordid']?>">
							                <input type="hidden" name="candidateid_main" value="<?php echo $candidateid ?>">
						               	 	<input type="hidden" name="candidateid_sub" value="<?php echo $candidate_noibo['candidateid']?>">
							              </form>
							              <td><?php echo date("d/m/Y", strtotime($key['datefrom'])).' - '.date("d/m/Y", strtotime($key['dateto']))?></td>
							              <td><?php echo $key['trainingcenter']?></td>
							              <td><?php echo $key['trainingplace']?></td>
							              <td><?php echo $key['trainingcourse']?></td>
							              <td><?php echo $key['certificate']; if($key['highestcer'] == "Y") echo "(*)"; ?></td>
							              <td><i class="fa fa-edit" onclick="editmodal4('<?php echo 'click4'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal4('<?php echo 'click4'.$i ?>')"></i></td>
							             </tr>
						             <?php $i++; } } }?>
						            </tbody> 
					          </table>
						          <a href="#" onclick="showmodel4(<?php echo $candidateid ?>,<?php echo $candidate_noibo['candidateid']?>)" <?php echo isset($candidate_noibo)? "" : "disabled";?>><label class="floatright">Thêm học vấn <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a>
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
						            <tbody> 
						          	 <?php if($knowledge_noibo != null) {
						               $i = 0;
						              foreach ($knowledge_noibo as $key) { 
						                if($key['traintimetype'] == null)
						                  { continue; } else {?>
						             <tr>
						              <form id="<?php echo 'click5'.$i ?>">
						                <input type="hidden" name="tu" value="<?php echo date("d-m-Y", strtotime($key['datefrom'])) ?>">
						                <input type="hidden" name="den" value="<?php echo date("d-m-Y", strtotime($key['dateto'])) ?>">
						                <input type="hidden" name="truong" value="<?php echo $key['trainingcenter']?>">
						                <input type="hidden" name="tghoc" value="<?php echo $key['traintime']?>">
						                <input type="hidden" name="donvi" value="<?php echo $key['traintimetype']?>">
						                <input type="hidden" name="nganhhoc" value="<?php echo $key['trainingcourse']?>">
						                <input type="hidden" name="chungchi" value="<?php echo $key['certificate']?>">
						                <input type="hidden" name="recordid" value="<?php echo $key['recordid']?>">
						                <input type="hidden" name="candidateid_main" value="<?php echo $candidateid ?>">
						                <input type="hidden" name="candidateid_sub" value="<?php echo $candidate_noibo['candidateid']?>">
						              </form>
						              <td><?php echo date("d/m/Y", strtotime($key['datefrom'])).' - '.date("d/m/Y", strtotime($key['dateto']))?></td>
						              <td><?php echo $key['trainingcenter']?></td>
						              <td><?php echo $key['traintime'].' '.$key['traintimetype']?></td>
						              <td><?php echo $key['trainingcourse']?></td>
						              <td><?php echo $key['certificate']?></td>
						               <td><i class="fa fa-edit" onclick="editmodal5('<?php echo 'click5'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal4('<?php echo 'click5'.$i ?>')"></i></td>
						             </tr>
						             <?php $i++; } } } ?>
						            </tbody> 
						          </table>
					           <a href="#" onclick="showmodel5(<?php echo $candidateid ?>,<?php echo $candidate_noibo['candidateid']?>)" <?php echo isset($candidate_noibo)? "" : "disabled";?>><label class="floatright">Thêm khoá đào tạo <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a>
					  	  </div>
					    </div>
					    <!-- body ho so noi bo 6-->
				  	</div>
				  	<!-- ket thuc ho so noi bo học vấn-->
				  	<div class="panel panel-default border-rad0" id="tab7">
					    <div class="panel-heading cyan-profile rad-pad0">
					     	<div class="col-xs-11" style="text-align: left; margin-left: 15px;">
					        	Ngoại ngữ &nbsp;
					    	</div>
					        <div class="col-md-1" style="text-align: right;">
					        	<a data-toggle="collapse" href="#collapsetotal72" class="a-expand">
	      						 <i class="fa fa-angle-right"></i></a>
					     	</div>
					    </div>
					    <!-- heading ho so noi bo 7-->
					    <div id="collapsetotal72" class="panel-collapse collapse tab_con_noibo in">
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
						             <?php if($language_noibo != null) {
							              $i = 0;
							              foreach ($language_noibo as $key) { 
							                ?>
							             <tr>
							              <form id="<?php echo 'click6'.$i ?>">
							                <input type="hidden" name="ngonngu" value="<?php echo $key['language']?>">
							                <input type="hidden" name="rate1" value="<?php echo $key['rate1']?>">
							                <input type="hidden" name="rate2" value="<?php echo $key['rate2']?>">
							                <input type="hidden" name="rate3" value="<?php echo $key['rate3']?>">
							                <input type="hidden" name="rate4" value="<?php echo $key['rate4']?>">
							                
							                <input type="hidden" name="recordid" value="<?php echo $key['recordid']?>">
							                <input type="hidden" name="candidateid_main" value="<?php echo $candidateid ?>">
						                	<input type="hidden" name="candidateid_sub" value="<?php echo $candidate_noibo['candidateid']?>">
							              </form>
							              <td><?php echo $key['language']?></td>
							              <td><?php echo ($key['rate1'] !== "0") ? $key['rate1'] : ""; ?></td>
							              <td><?php echo ($key['rate2'] !== "0")? $key['rate2'] : ""; ?></td>
							              <td><?php echo ($key['rate3'] !== "0")? $key['rate3']: ""; ?></td>
							              <td><?php echo ($key['rate4'] !== "0")? $key['rate4']: ""; ?></td>
							              <td><i class="fa fa-edit" onclick="editmodal6('<?php echo 'click6'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal6('<?php echo 'click6'.$i ?>')"></i></td>
							             </tr>
						             <?php $i++; } } ?>
							            
						            </tbody> 
						          </table>
					           <a href="#" onclick="showmodel6(<?php echo $candidateid ?>,<?php echo $candidate_noibo['candidateid']?>)" <?php echo isset($candidate_noibo)? "" : "disabled";?>><label class="floatright">Thêm ngoại ngữ <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a>
					  	  </div>
					    </div>
					    <!-- body ho so noi bo 7-->
				  	</div>
				  	<!-- ket thuc ho so noi bo ngoại ngữ-->
				  	<div class="panel panel-default border-rad0" id="tab8">
					    <div class="panel-heading cyan-profile rad-pad0">
					     	<div class="col-xs-11" style="text-align: left; margin-left: 15px;">
					        	Tin học &nbsp;
					    	</div>
					        <div class="col-md-1" style="text-align: right;">
					        	<a data-toggle="collapse" href="#collapsetotal82" class="a-expand">
	      						 <i class="fa fa-angle-right"></i></a>
					     	</div>
					    </div>
					    <!-- heading ho so noi bo 8-->
					    <div id="collapsetotal82" class="panel-collapse collapse tab_con_noibo in">
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
						              <?php if($software_noibo != null) {
							              $i = 0;
							              foreach ($software_noibo as $key) { 
							                ?>
							             <tr>
							              <form id="<?php echo 'click7'.$i ?>">
							                <input type="hidden" name="pm" value="<?php echo $key['software']?>">
							                <input type="hidden" name="rate1" value="<?php echo $key['rate1']?>">

							                <input type="hidden" name="recordid" value="<?php echo $key['recordid']?>">
							                <input type="hidden" name="candidateid_main" value="<?php echo $candidateid ?>">
						                	<input type="hidden" name="candidateid_sub" value="<?php echo $candidate_noibo['candidateid']?>">
							              </form>
							              <td><?php echo $key['software']?></td>
							              <td><?php echo ($key['rate1'] !== "0")? $key['rate1'] : ""; ?></td>
							              <td><i class="fa fa-edit" onclick="editmodal7('<?php echo 'click7'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal7('<?php echo 'click7'.$i ?>')"></i></td>
							             </tr>
						             <?php $i++; } } ?>
						            </tbody> 
						          </table>
					           <a href="#" onclick="showmodel7(<?php echo $candidateid ?>,<?php echo $candidate_noibo['candidateid']?>)" <?php echo isset($candidate_noibo)? "" : "disabled";?>><label class="floatright">Thêm Tin học <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a>
					  	  </div>
					    </div>
					    <!-- body ho so noi bo 8-->
				  	</div>
				  	<!-- ket thuc ho so noi bo tin học-->
				</div>
       		</div>
       		 <!-- ket thuc id tab nội bộ -->

       		<!-- Hồ sơ con -->
       		<?php $hs = 1; foreach ($candidate_con as $key =>$value) { ?>
       			<div id="hs_<?php echo $hs ?>" class="tab-pane ">
	       			<div style="margin-bottom: 15px;margin-left: 15px">Ngày cập nhật mới nhất: <?php echo ($lastupdate_con[$key][0][0] != '')? date_format(date_create($lastupdate_con[$key][0][0]),"d/m/Y H:i:s") : '' ?></div>
	        		<div class="panel-group bor-mar-b0">
						<div class="panel panel-default border-rad0" id="tab1">
						    <div class="panel-heading cyan-profile rad-pad0">
						     	<div class="col-xs-11" style="text-align: left; margin-left: 15px;">
						        	Tổng quát &nbsp;
						    	</div>
						        <div class="col-md-1" style="text-align: right;">
						        	<a data-toggle="collapse" href="#collapsetotal2" class="a-expand">
		      						 <i class="fa fa-angle-right"></i></a>
						     	</div>
						    </div>
						    <!-- heading ho so noi bo -->
						    <div id="collapsetotal2" class="panel-collapse collapse tab_con_noibo in">
						    	<form method="POST" action="<?php echo base_url()?>admin/handling/insertCandidate_internal/<?php echo isset($value['candidateid'])? $value['candidateid'] : 0 ?>" enctype="multipart/form-data" >
						    		<input type="hidden" name="candidateid" value="<?php echo $candidateid ?>">
							      	<div class="panel-body" style="border: 0px">
							          <div class="width100">
							             <label for="text" class="width20 col-xs-3 label-profile">Họ tên</label>
							             <div class="col-xs-3 width30 padding-lr0">
							             	<input type="text" class="textbox" name="firstname" value="<?php echo isset($value['firstname'])? $value['firstname'] : "";?>" placeholder="Họ">
							             </div>
							             <label for="text" class="col-xs-3 width20 col-xs-3 label-profile">Email</label>
							             <div class="col-xs-3 width30 padding-lr0">
							             	<input type="text" class="textbox" name="email" value="<?php echo isset($value['email'])? $value['email'] : "";?>" >
							             </div>   
							         </div>
							         <br><br>
							         <div class="width100">
							             <label for="text" class="width20 col-xs-3 label-profile"></label>
							             <div class="col-xs-3 width30 padding-lr0">
							             	<input type="text" class="textbox" name="lastname" value="<?php echo isset($value['lastname'])? $value['lastname'] : "";?>" placeholder="Tên">
							             </div>
							             <label for="text" class="col-xs-3 width20 col-xs-3 label-profile">CMND/ ID</label>
							             <div class="col-xs-3 width30 padding-lr0">
							             	<input type="text" class="textbox" name="idcard" maxlength="" value="<?php echo isset($value['idcard'])? $value['idcard'] : "";?>">
							             </div>   
							         </div>
							         <br><br>
							         <div class="width100">
							             <label for="text" class="width20 col-xs-3 label-profile">Nguồn hồ sơ</label>
							             <div class="col-xs-3 width30 padding-lr0">
							             	<select class="textbox" name="profilesrc">
							             		<option value="Nội bộ" <?php echo (isset($value['profilesrc']) && $value['profilesrc'] == "Nội bộ")? "selected" : "";?> >Nội bộ</option>
							             	</select>
							             </div>
							         </div>
							         <br><br>
							         <div class="width100">
							             <label for="text" class="width20 col-xs-3 label-profile">Vị trí phù hợp</label>
							             <div class="col-xs-9 width80 padding-lr0" style="padding-bottom: 5px">
							             	 <div id="the-basics" style="font-size: 15px">
							                    <input id="typeahead_<?php echo $value['candidateid'] ?>" name="tags" type="text" data-role="" value="
							                    <?php for($i=0; $i < count($tags_con[$key]) ; $i++)
							                          {
							                            echo $tags_con[$key][$i]['title'];
							                            if($i < count($tags_con[$key])-1)
							                            {
							                              echo ',';
							                            }
							                          }
							                    ?>
							                    ">
							                  </div>
							                  
							             </div>
							         </div>
							         <br><br>
							         <div class="width100">
							             <label for="text" class="width20 col-xs-3 label-profile">Tag</label>
							             <div class="col-xs-9 width80 padding-lr0">
										<input name="tagsrandom" type="text" data-role="tagsinput" value="
											<?php for($i=0; $i < count($tagstrandom_con[$key]) ; $i++)
								                          {
								                            echo $tagstrandom_con[$key][$i]['title'];
								                            if($i < count($tagstrandom_con[$key])-1)
								                            {
								                              echo ',';
								                            }
								                          }
								                    ?>">
							             </div>
							         </div>
							         <br><br>
							         <div class="width100">
							             <label for="text" class="width20 col-xs-3 label-profile">Địa chỉ MXH</label>
							             <div class="col-xs-9 width80 padding-lr0">
											<input name="snid" type="text" class="textbox width100" value="<?php echo isset($value['snid'])? $value['snid'] : "";?>">
							             </div>
							         </div>
							         <br><br>
							         <div class="width100">
							            <label for="text" class="width20 col-xs-3 label-profile">Hồ sơ tải lên</label>
							            <!-- <div class="col-sm-2">
					                    	<label id="browsebutton<?php echo $hs+2 ?>" class=" btn-default btn-tailen" for="my-file-selector2" style="background-color:white">
						                        <input id="my-file-selector2" name="fileCV1" type="file" accept=".pdf,.doc,.docx,.xlsx" style="display:none;">
						                        <i class="fa fa-download"></i> Chọn CV
						                    </label>
					                    </div> -->
					                    <div class="col-sm-5"> 
					                      <?php if (isset($document_con[$key]) && !empty($document_con[$key])){
					                        $url = $document_con[$key]['url'];
					                        $name = $document_con[$key]['filename'];
					                      }else{$url =''; $name = '';}?>
					                        <label class="fontArial colorcyan labelcontent" ><a id="label<?php echo $hs+2 ?>"  class="fontstyle" target="_blank"  href="<?php echo $url; ?>"><?php echo $name; ?> </a></label>
					                    </div>
							         </div>
							         <button type="submit" class="btn-luu-nav floatright"> Lưu</button>
							  	  	</div>
						  	  	</form>
						    </div>
						    <!-- body ho so noi bo -->
						</div>
						<!-- ket thuc ho so noi bo tong quat-->
					  	<div class="panel panel-default border-rad0" id="tab2">
					    	<div class="panel-heading cyan-profile rad-pad0">
					     		<div class="col-xs-11" style="text-align: left; margin-left: 15px;">
						        	Cá nhân &nbsp;
						    	</div>
						        <div class="col-md-1" style="text-align: right;">
						        	<a data-toggle="collapse" href="#collapsetotal22" class="a-expand">
		      						 <i class="fa fa-angle-right"></i></a>
						     	</div>
					    	</div>
					    	<!-- heading ho so noi bo 2-->
					    	<div id="collapsetotal22" class="panel-collapse collapse tab_con_noibo in">
				    		<form id="form_canhan_<?php echo $value['candidateid'] ?>">
						      	<div class="panel-body" style="border: 0px">
						          <div class="width100">
						             <label for="text" class="width20 col-xs-3 label-profile">Ngày sinh/ Giới tính</label>
						             <div class="col-xs-3 width30 padding-lr0">
						             	<input type="text" name="dateofbirth" class="dateofbirth" id="dateofbirth" class="textbox2" value="<?php echo isset($value['dateofbirth'])? date("d-m-Y", strtotime($value['dateofbirth'])) : "";?>">
						             </div>
						             <div class="col-xs-1 width5 padding-lr0"></div>
						             <label class="radio-inline">
					                    <input type="radio" name="gender" <?php echo (isset($value['gender']) && $value['gender'] == "M")? "checked" : ""; ?> value="M"> Nam
					                  </label>
					                  <label class="radio-inline">
					                    <input type="radio" name="gender" <?php echo (isset($value['gender']) && $value['gender'] == "F")? "checked" : ""; ?> value="F"> Nữ
					                  </label>
						         </div>
						         <br>
						         <div class="width100">
						             <label for="text" class="width20 col-xs-3 label-profile">Nơi sinh</label>
						             <div class="col-xs-3 width30 padding-lr0">
						             	<select class="textbox2 js-example-basic-single" name="placeofbirth" style="width: 100%">
							                 <option value="0" >Chọn tỉnh thành</option>
							                <?php foreach ($city as $key_c ) {
							                	if( isset($value['placeofbirth']) && $key_c['name'] == $value['placeofbirth'])
							                	{
							                ?>
							                 <option value="<?php echo $key_c['name'] ?>" selected><?php echo $key_c['name'] ?></option>
							                 <?php } else { ?>
							                  <option value="<?php echo $key_c['name'] ?>"><?php echo $key_c['name'] ?></option>
							                  <?php } } ?>
						                </select>
						             </div> 
						         </div>
						         <br><br>
						         <div class="width100">
						             <label for="text" class="width20 col-xs-3 label-profile">Dân tộc</label>
						             <div class="col-xs-3 width30 padding-lr0">
						             	<input type="text" name="ethnic" class="textbox2" value="<?php echo isset($value['ethnic'])? $value['ethnic'] : "";  ?>">
						             </div>
						         </div>
						         <br><br>
						         <div class="width100">
						             <label for="text" class="width20 col-xs-3 label-profile">Quốc tịch</label>
						             <div class="col-xs-3 width30 padding-lr0">
						             	<select class="textbox2" name="nationality">
						             		<option value="Việt Nam">Việt Nam</option>
						             		<option value="Khác" <?php echo (isset($value['nationality']) && $value['nationality'] == "Khác")? "selected" : "";  ?> > Khác</option>
						             	</select>
						             </div>
						         </div>
						         <br><br>
						         <div class="width100">
						             <label for="text" class="width20 col-xs-3 label-profile">Nguyên Quán</label>
						             <div class="col-xs-3 width30 padding-lr0">
						             	<input type="text" name="nativeland" class="textbox2" value="<?php echo isset($value['nativeland'])? $value['nativeland'] : "";  ?>">
						             </div>
						         </div>
						         <br><br>
						         <div class="width100">
						             <label for="text" class="width20 col-xs-3 label-profile">Tôn Giáo</label>
						             <div class="col-xs-3 width30 padding-lr0">
						             	<input type="text" name="religion" class="textbox2" value="<?php echo isset($value['religion'])? $value['religion'] : "";  ?>">
						             </div>
						         </div>
						         <br><br>
						         <div class="width100">
						             <label for="text" class="width20 col-xs-3 label-profile">Chiều cao (Cm)</label>
						             <div class="col-xs-3 width30 padding-lr0">
						             	<input type="text" id="height" name="height" class="textbox2" value="<?php echo isset($value['height'])? $value['height'] : "";  ?>" maxlength="3" >
						             </div>
						         </div>
						         <br><br>
						         <div class="width100">
						             <label for="text" class="width20 col-xs-3 label-profile">Cân nặng (Kg)</label>
						             <div class="col-xs-3 width30 padding-lr0">
						             	<input type="text" id="weight" name="weight" class="textbox2" value="<?php echo isset($value['weight'])? $value['weight'] : "";  ?>" maxlength="3">
						             </div>
						         </div>
						         <br><br>
						         <div class="width100">
						             <label for="text" class="width20 col-xs-3 label-profile">Ngày cấp/ Nơi cấp</label>
						             <div class="col-xs-3 width30 padding-lr0"> 
						             	<input type="text"  name="dateofissue" class="dateofbirth"  id="dateofissue" class="textbox2" value="<?php echo isset($value['dateofissue'])? date("d-m-Y", strtotime($value['dateofissue'])) : "";  ?>">
						             </div>
						             <div class="col-xs-1 width5 padding-lr0"></div>
						             <div class="col-xs-3 width30 padding-lr0">
						             	<select class="textbox2 js-example-basic-single" name="placeofissue" style="width: 100%">
							                 <option value="0" >Chọn tỉnh thành</option>
							                <?php foreach ($city as $key_c ) {
							                	if( isset($value['placeofissue']) && $key_c['name'] == $value['placeofissue'] )
							                	{
							                ?>
							                <option value="<?php echo $key_c['name'] ?>" selected><?php echo $key_c['name'] ?></option>	
							                <?php 
							                	} else {
							                ?>
							                  <option value="<?php echo $key_c['name'] ?>"><?php echo $key_c['name'] ?></option>
							                  <?php } } ?>
						                </select>
						             </div> 
						         </div>
						         <button type="button" class="btn-luu-nav floatright margin-t35" <?php echo isset($value)? "" : "disabled";?> onclick="luu_canhan(<?php echo $value['candidateid'] ?>)"> Lưu</button>
						  	  	</div>
					  		</form>
					    	</div>
					    	<!-- body ho so noi bo 2-->
					  	</div>
					  	<!-- ket thuc ho so noi bo ca nhan-->
					  	<div class="panel panel-default border-rad0" id="tab3">
					    	<div class="panel-heading cyan-profile rad-pad0">
						     	<div class="col-xs-11" style="text-align: left; margin-left: 15px;">
						        	Liên hệ &nbsp;
						    	</div>
						        <div class="col-md-1" style="text-align: right;">
						        	<a data-toggle="collapse" href="#collapsetotal32" class="a-expand">
		      						 <i class="fa fa-angle-right"></i></a>
						     	</div>
					    	</div>
					    	<!-- heading ho so noi bo 3-->
					    	<div id="collapsetotal32" class="panel-collapse collapse tab_con_noibo in">
					    		<form id="form_diachi_<?php echo $value['candidateid'] ?>">
								      <div class="panel-body" style="border: 0px">
								          <div class="width100">
								             <label for="text" class="width20 col-xs-3 label-profile">Địa chỉ thường trú</label>
								             <div class="col-xs-3 width30 padding-lr0">
								             	<select class="textbox2" name="country1" >
								             		<option value="Việt Nam">Việt Nam</option>
								             		<option value="Khác" <?php 
								             		$n1 = isset($canaddress_con[$key])? count($canaddress_con[$key]) : 0;
								             		for ($i = 0; $i < $n1; $i++) {
									             		if( ($canaddress_con[$key][$i]['addtype'] == 'PREMANENT') && ($canaddress_con[$key][$i]['country'] == 'Khác'))
									             		{
									             			echo "selected";
									             			break;
									             		}
								             		}
								             		?>
								             		>Khác</option>
								             	</select>
								             	<div class="h10-w-auto"></div>
								             	<select class="textbox2 js-example-basic-single" onchange="comb_tp_qh_1(this.value,0,<?php echo $value['candidateid'] ?>)" 
								             		name="city1" id="city1_<?php echo $value['candidateid'] ?>" style="width: 100%;">
									                 <option value="0" >Chọn tỉnh thành</option>
									                <?php foreach ($city as $key_c ) 
									                {
									                	$fdc = 0;
									                	if(isset($canaddress_con[$key]))
									                	{
									                		foreach ($canaddress_con[$key] as $value1) {
									                			if($value1['addtype'] == 'PREMANENT' && $value1['city'] == $key_c['id_city'])
									                			{
									                				?>
									                				<option value="<?php echo $key_c['id_city'] ?>" selected><?php echo $key_c['name'] ?></option>
									                				<?php
									                				$fdc = 1;
									                				break;
									                			}
									                		}
									                	}

													 	if($fdc == 0) {?>		
									                  <option value="<?php echo $key_c['id_city'] ?>"><?php echo $key_c['name'] ?></option>
									                  <?php }
									                } ?>
								                </select>
								                <div class="h10-w-auto"></div>

								                <select class="seletext js-example-basic-single" name="district1" id="district1_<?php echo $value['candidateid'] ?>" style="width: 100%" onchange="comb_qh_px_1(this.value,0,<?php echo $value['candidateid'] ?>)">
								                 	<option value="0" id="chonqh-ad1_<?php echo $value['candidateid'] ?>" >Chọn quận huyện</option>
								                </select>
								                <div class="h10-w-auto"></div>
								                 <select class="textbox2 js-example-basic-single" name="ward1" id="phuongxa8-ad_<?php echo $value['candidateid'] ?>" style="width: 100%" >
								                 	<option value="0" id="chonpx-ad1_<?php echo $value['candidateid'] ?>" >Chọn phường xã</option>				                
								                </select>
								                <div class="h10-w-auto"></div>

								                 <textarea class="form-control off-resize fontstyle" rows="2" name="street1" id="duong8_<?php echo $value['candidateid'] ?>"><?php
								                 	if(isset($canaddress_con[$key]))
									                	{
									                		foreach ($canaddress_con[$key] as $value2) {
									                			if($value2['addtype'] == 'PREMANENT')
									                			{
									                				echo trim($value2['street']);
									                				break;
									                			}
									                		}
									                	}
								                 ?></textarea>
								                 <div class="h10-w-auto"></div>
								                   <textarea class="form-control off-resize fontstyle" rows="2" name="addressno1" id="toanha88_<?php echo $value['candidateid'] ?>"
								                   ><?php 
								                 	if(isset($canaddress_con[$key]))
									                	{
									                		foreach ($canaddress_con[$key] as $value3) {
									                			if($value3['addtype'] == 'PREMANENT')
									                			{
									                				if ($value3['addressno'] != '' || $value3['city'] != '') {
									                					echo trim($value3['addressno']);
									                				}else{
									                					echo trim($value3['address']);
									                				}
									                				break;
									                			}
									                		}
									                	}
								                 ?>
								                   </textarea>
								             </div>
								            
								             <label for="text" class="width20 col-xs-3 label-profile" style="padding-left: 15px">Địa chỉ liên hệ</label>
								             <div class="col-xs-3 width30 padding-lr0">
								             	<select class="textbox2" name="country2">
								             		<option value="Việt Nam">Việt Nam</option>
								             		<option value="Khác" <?php 
								             		$n1 = isset($canaddress_con[$key])? count($canaddress_con[$key]) : 0;
								             		for ($i = 0; $i < $n1; $i++) {
									             		if( ($canaddress_con[$key][$i]['addtype'] == 'CONTACT') && ($canaddress_con[$key][$i]['country'] == 'Khác'))
									             		{
									             			echo "selected";
									             			break;
									             		}
								             		}
								             		?>
								             		>Khác</option>
								             	</select>
								             	<div class="h10-w-auto"></div>
								             	<select class="textbox2 js-example-basic-single" id="city2_<?php echo $value['candidateid'] ?>" name="city2" style="width: 100%" onchange="comb_tp_qh_2(this.value,0,<?php echo $value['candidateid'] ?>)">
									                 <option value="0" >Chọn tỉnh thành</option>
									                <?php foreach ($city as $key_c ) 
									                {
									                	$fdc = 0;
									                	if(isset($canaddress_con[$key]))
									                	{
									                		foreach ($canaddress_con[$key] as $value4) {
									                			if($value4['addtype'] == 'CONTACT' && $value4['city'] == $key_c['id_city'])
									                			{
									                				?>
									                				<option value="<?php echo $key_c['id_city'] ?>" selected><?php echo $key_c['name'] ?></option>
									                				<?php
									                				$fdc = 1;
									                				break;
									                			}
									                		}
									                	}

													 	if($fdc == 0) {?>		
									                  <option value="<?php echo $key_c['id_city'] ?>"><?php echo $key_c['name'] ?></option>
									                  <?php }
									                } ?>
								                </select>
								                <div class="h10-w-auto"></div>
								                <select class="seletext js-example-basic-single" name="district2" id="district2_<?php echo $value['candidateid'] ?>" style="width: 100%" onchange="comb_qh_px_2(this.value,0,<?php echo $value['candidateid'] ?>)">
								                 <option value="0" id="chonqh-ad2_<?php echo $value['candidateid'] ?>" >Chọn quận huyện</option>
								                </select>
								                <div class="h10-w-auto"></div>
								                 <select class="seletext js-example-basic-single" name="ward2" id="phuongxa8_<?php echo $value['candidateid'] ?>" style="width: 100%">
								                 	<option value="0" id="chonpx-ad2_<?php echo $value['candidateid'] ?>" >Chọn phường xã</option>
								                </select>
								                <div class="h10-w-auto"></div>
								                 <textarea class="form-control off-resize fontstyle" rows="2" name="street2" id="duong8_<?php echo $value['candidateid'] ?>" 
								                 ><?php 
								                 	if(isset($canaddress_con[$key]))
									                	{
									                		foreach ($canaddress_con[$key] as $value5) {
									                			if($value5['addtype'] == 'CONTACT')
									                			{
									                				echo trim($value5['street']);
									                				break;
									                			}
									                		}
									                	}
								                 ?>
								                 </textarea>
								                 <div class="h10-w-auto"></div>
								                   <textarea class="form-control off-resize fontstyle" rows="2" name="addressno2" id="toanha8_<?php echo $value['candidateid'] ?>"
								                   ><?php 
								                 	if(isset($canaddress_con[$key]))
									                	{
									                		foreach ($canaddress_con[$key] as $value5) {
									                			if($value5['addtype'] == 'CONTACT')
									                			{
									                				if ($value5['addressno'] != '' || $value5['city'] != '') {
									                					echo trim($value5['addressno']);
									                				}else{
									                					echo trim($value5['address']);
									                				}
									                				break;
									                			}
									                		}
									                	}
								                 ?></textarea>
								             </div>
								         </div>

								         <div class="width100">
								             <label for="text" class="width20 col-xs-3 label-profile margin-t10" >Số điện thoại</label>
								             <?php 
								                    $pizza  = $value['telephone'];
								                    $pieces = explode(",", $pizza);
								                    $p1 = isset($pieces[0])? $pieces[0] : "" ;
								                    $p2 = isset($pieces[1])? $pieces[1] : "" ;
								              ?>
								             <div class="col-xs-3 width30 padding-lr0">
								             	<input type="text" name="phone1" class="textbox2 margin-t10" value="<?php echo $p1;?>">
								             </div>
								             <div class="col-xs-3 width40 padding-lr0 mar-tam" >
								             	<input type="text" name="phone2" class="textbox2" value="<?php echo $p2;?>">
								             </div>
								         </div>
								         
								        
								         <div class="width100 pull-left">
								             <label for="text" class="width20 col-xs-3 label-profile margin-t10" >Liên lạc khẩn cấp</label>
								             <div class="col-xs-3 width30 padding-lr0">
								             	<input type="text" name="emergencycontact" class="textbox2 margin-t10" value="<?php echo isset($value['emergencycontact'])? $value['emergencycontact'] : "";?>" > 
								             </div>
								         </div>
								         <button type="button" class="btn-luu-nav floatright margin-t35" <?php echo isset($value)? "" : "disabled";?> onclick="luu_diachi(<?php echo $value['candidateid'] ?>)"> Lưu</button>
								  	  </div>
						  		</form>
					    	</div>
					    	<!-- body ho so noi bo 3-->
					  	</div>
					  	<!-- ket thuc ho so noi bo lien he-->
					  	<div class="panel panel-default border-rad0" id="tab4">
						    <div class="panel-heading cyan-profile rad-pad0">
						     	<div class="col-xs-11" style="text-align: left; margin-left: 15px;">
						        	Gia đình &nbsp;
						    	</div>
						        <div class="col-md-1" style="text-align: right;">
						        	<a data-toggle="collapse" href="#collapsetotal42" class="a-expand">
		      						 <i class="fa fa-angle-right"></i></a>
						     	</div>
						    </div>
						    <!-- heading ho so noi bo 4-->
						    <div id="collapsetotal42" class="panel-collapse collapse tab_con_noibo in">
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
					            	  <?php if($family_con[$key] != null) {
							                $f = 0;
							              foreach ($family_con[$key] as $key_f) { ?>
							             <tr>
							              <form id="<?php echo 'click'.$f ?>">
							                <input type="hidden" name="hoten" value="<?php echo $key_f['name']?>">
							                <input type="hidden" name="namsinh" value="<?php echo $key_f['yob']?>">
							                <input type="hidden" name="quanhe" value="<?php echo $key_f['type']?>">
							                <input type="hidden" name="nghenghiep" value="<?php echo $key_f['career']?>">
							                <input type="hidden" name="recordid" value="<?php echo $key_f['recordid']?>">
							                <input type="hidden" name="candidateid_main" value="<?php echo $candidateid ?>">
							                <input type="hidden" name="candidateid_sub" value="<?php echo $value['candidateid']?>">
							              </form>
							              <td><?php echo $key_f['name']?></td>
							              <td><?php echo ($key_f['yob'] !== 0) ? $key_f['yob'] : ""; ?></td>
							              <td><?php echo ($key_f['type'] !== '0') ? $key_f['type'] : ""; ?></td>
							              <td><?php echo $key_f['career']?></td>
							              <td><i class="fa fa-edit" onclick="editmodal('<?php echo 'click'.$f ?>')"></i> <i class="fa fa-eraser" onclick="delmodal('<?php echo 'click'.$f ?>')"></i></td>
							             </tr>
							             <?php $f++;} } 
						               ?>
						            </tbody> 
						          </table>
						          <a href="#" onclick="showmodel11(<?php echo $candidateid?>,<?php echo $value['candidateid']?>)" <?php echo isset($value)? "" : "disabled";?>><label class="floatright">Thêm quan hệ <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a>
						  	  </div>
						    </div>
						    <!-- body ho so noi bo 4-->
					  	</div>
					  	<!-- ket thuc ho so noi bo gia đình-->
					  	<div class="panel panel-default border-rad0" id="tab5">
						    <div class="panel-heading cyan-profile rad-pad0">
						     	<div class="col-xs-11" style="text-align: left; margin-left: 15px;">
						        	Kinh nghiệm &nbsp;
						    	</div>
						        <div class="col-md-1" style="text-align: right;">
						        	<a data-toggle="collapse" href="#collapsetotal52" class="a-expand">
		      						 <i class="fa fa-angle-right"></i></a>
						     	</div>
						    </div>
						    <!-- heading ho so noi bo 5-->
						    <div id="collapsetotal52" class="panel-collapse collapse tab_con_noibo in">
						      <div class="panel-body" style="border: 0px">				         
						          <table   class="table table-striped table-bordered" > 
							            <thead class="fontstyle"> 
							              <tr > 
							                <th id="th" class="middle2" width="20%">Từ - Đến</th> 
							                <th id="th" class="middle2" width="20%">Cty/ Địa chỉ/ ĐT</th> 
							                <th id="th" width="13%">CV khi nghỉ</th> 
							                <th id="th" width="23%">NV/ Trách nhiệm</th>
							                 <th id="th" class="middle2" width="17%">Lý do nghỉ</th>
							                 <th id="th" width="10%"></th>
							              </tr> 
							            </thead> 
							            <tbody class="fontstyle text-center"> 
							             <?php if($experience_con[$key] != null) { 
							              $e = 0;
							              foreach ($experience_con[$key] as $key_e) { ?>
							             <tr>
							              <form id="<?php echo 'click2'.$e ?>">
							                <input type="hidden" name="tungay" value="<?php echo date("d-m-Y", strtotime($key_e['datefrom']))?>">
							                <input type="hidden" name="denngay" value="<?php echo date("d-m-Y", strtotime($key_e['dateto']))?>">
							                <input type="hidden" name="cty" value="<?php echo $key_e['company']?>">
							                <input type="hidden" name="vitri" value="<?php echo $key_e['position']?>">
							                <input type="hidden" name="nhiemvu" value="<?php echo $key_e['responsibility']?>">
							                <input type="hidden" name="lydo" value="<?php echo $key_e['quitreason']?>">
							                <input type="hidden" name="recordid" value="<?php echo $key_e['recordid']?>">
							                <input type="hidden" name="diachi" value="<?php echo $key_e['address']?>">
							                <input type="hidden" name="sdt" value="<?php echo $key_e['phone']?>">
							                <input type="hidden" name="candidateid_main" value="<?php echo $candidateid ?>">
							                <input type="hidden" name="candidateid_sub" value="<?php echo $value['candidateid']?>">
							              </form>
							              <td><?php echo date("d/m/Y", strtotime($key_e['datefrom'])).' - '.date("d/m/Y", strtotime($key_e['dateto']))?></td>
							              <td><?php echo $key_e['company']." / ".$key_e['address']." / ".$key_e['phone']?></td>
							              <td><?php echo $key_e['position']?></td>
							              <td style="text-align: left;"><?php echo nl2br($key_e['responsibility']) ?></td>
							              <td><?php echo $key_e['quitreason']?></td>
							              <td><i class="fa fa-edit" onclick="editmodal2('<?php echo 'click2'.$e ?>')"></i> <i class="fa fa-eraser" onclick="delmodal2('<?php echo 'click2'.$e ?>')"></i></td>
							             </tr>
							             
							             <?php $e++; } } ?>
							            </tbody> 
							          </table>
							          <a href="#" onclick="showmodel2(<?php echo $candidateid ?>,<?php echo $value['candidateid']?>)" <?php echo isset($value)? "" : "disabled";?>><label class="floatright">Thêm kinh nghiệm <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a>
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
										
						            		 <?php if($reference_con[$key] != null) {
								              $r = 0;
								              foreach ($reference_con[$key] as $key_r) { ?>
								             <tr>
								               <form id="<?php echo 'click3'.$r ?>">
								                <input type="hidden" name="hoten" value="<?php echo $key_r['name']?>">
								                <input type="hidden" name="vitri" value="<?php echo $key_r['position']?>">
								                <input type="hidden" name="cty" value="<?php echo $key_r['company']?>">
								                <input type="hidden" name="lienhe" value="<?php echo $key_r['contactno']?>">
								                <input type="hidden" name="recordid" value="<?php echo $key_r['recordid']?>">
								                <input type="hidden" name="candidateid_main" value="<?php echo $candidateid ?>">
							                	<input type="hidden" name="candidateid_sub" value="<?php echo $value['candidateid']?>">
								              </form>
								              <td><?php echo $key_r['name']?></td>
								              <td><?php echo $key_r['position']?></td>
								              <td><?php echo $key_r['company']?></td>
								              <td><?php echo $key_r['contactno']?></td>
								               <td><i class="fa fa-edit" onclick="editmodal3('<?php echo 'click3'.$r ?>')"></i> <i class="fa fa-eraser" onclick="delmodal3('<?php echo 'click3'.$r ?>')"></i></td>
								             </tr>
								             <?php $r++; } } ?>
								              
						            	
							            </tbody> 
							          </table>
						           <a href="#" onclick="showmodel3(<?php echo $candidateid ?>,<?php echo $value['candidateid']?>)" <?php echo isset($value)? "" : "disabled";?>><label class="floatright">Thêm người tham chiếu <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a>
						  	  </div>
						    </div>
						    <!-- body ho so noi bo 5-->
					  	</div>
					  	<!-- ket thuc ho so noi bo kinh nghiệm-->
					  	<div class="panel panel-default border-rad0" id="tab6">
						    <div class="panel-heading cyan-profile rad-pad0">
						     	<div class="col-xs-11" style="text-align: left; margin-left: 15px;">
						        	Học vấn &nbsp;
						    	</div>
						        <div class="col-md-1" style="text-align: right;">
						        	<a data-toggle="collapse" href="#collapsetotal62" class="a-expand">
		      						 <i class="fa fa-angle-right"></i></a>
						     	</div>
						    </div>
						    <!-- heading ho so noi bo 6-->
						    <div id="collapsetotal62" class="panel-collapse collapse tab_con_noibo in">
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
							              <?php if($knowledge_con[$key] != null) {
								                $k = 0;
								              foreach ($knowledge_con[$key] as $key_k) { 
								                if($key_k['traintimetype'] != null)
								                  { continue; } else {?>
								             <tr>
								              <form id="<?php echo 'click4'.$k ?>">
								                <input type="hidden" name="tu" value="<?php echo date("d-m-Y", strtotime($key_k['datefrom'])) ?>">
								                <input type="hidden" name="den" value="<?php echo date("d-m-Y", strtotime($key_k['dateto'])) ?>">
								                <input type="hidden" name="truong" value="<?php echo $key_k['trainingcenter']?>">
								                <input type="hidden" name="noihoc" value="<?php echo $key_k['trainingplace']?>">
								                <input type="hidden" name="nganhhoc" value="<?php echo $key_k['trainingcourse']?>">
								                <input type="hidden" name="chungchi" value="<?php echo $key_k['certificate']?>">
								                <input type="hidden" name="caonhat" value="<?php echo $key_k['highestcer']?>">
								                <input type="hidden" name="recordid" value="<?php echo $key_k['recordid']?>">
								                <input type="hidden" name="candidateid_main" value="<?php echo $candidateid ?>">
							               	 	<input type="hidden" name="candidateid_sub" value="<?php echo $value['candidateid']?>">
								              </form>
								              <td><?php echo date("d/m/Y", strtotime($key_k['datefrom'])).' - '.date("d/m/Y", strtotime($key_k['dateto']))?></td>
								              <td><?php echo $key_k['trainingcenter']?></td>
								              <td><?php echo $key_k['trainingplace']?></td>
								              <td><?php echo $key_k['trainingcourse']?></td>
								              <td><?php echo $key_k['certificate']; if($key_k['highestcer'] == "Y") echo "(*)"; ?></td>
								              <td><i class="fa fa-edit" onclick="editmodal4('<?php echo 'click4'.$k ?>')"></i> <i class="fa fa-eraser" onclick="delmodal4('<?php echo 'click4'.$k ?>')"></i></td>
								             </tr>
							             <?php $k++; } } }?>
							            </tbody> 
						          </table>
							          <a href="#" onclick="showmodel4(<?php echo $candidateid ?>,<?php echo $value['candidateid']?>)" <?php echo isset($value)? "" : "disabled";?>><label class="floatright">Thêm học vấn <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a>
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
							            <tbody> 
							          	 <?php if($knowledge_con[$key] != null) {
							               $k = 0;
							              foreach ($knowledge_con[$key] as $key_k1) { 
							                if($key_k1['traintimetype'] == null)
							                  { continue; } else {?>
							             <tr>
							              <form id="<?php echo 'click5'.$k ?>">
							                <input type="hidden" name="tu" value="<?php echo date("d-m-Y", strtotime($key_k1['datefrom'])) ?>">
							                <input type="hidden" name="den" value="<?php echo date("d-m-Y", strtotime($key_k1['dateto'])) ?>">
							                <input type="hidden" name="truong" value="<?php echo $key_k1['trainingcenter']?>">
							                <input type="hidden" name="tghoc" value="<?php echo $key_k1['traintime']?>">
							                <input type="hidden" name="donvi" value="<?php echo $key_k1['traintimetype']?>">
							                <input type="hidden" name="nganhhoc" value="<?php echo $key_k1['trainingcourse']?>">
							                <input type="hidden" name="chungchi" value="<?php echo $key_k1['certificate']?>">
							                <input type="hidden" name="recordid" value="<?php echo $key_k1['recordid']?>">
							                <input type="hidden" name="candidateid_main" value="<?php echo $candidateid ?>">
							                <input type="hidden" name="candidateid_sub" value="<?php echo $value['candidateid']?>">
							              </form>
							              <td><?php echo date("d/m/Y", strtotime($key_k1['datefrom'])).' - '.date("d/m/Y", strtotime($key_k1['dateto']))?></td>
							              <td><?php echo $key_k1['trainingcenter']?></td>
							              <td><?php echo $key_k1['traintime'].' '.$key_k1['traintimetype']?></td>
							              <td><?php echo $key_k1['trainingcourse']?></td>
							              <td><?php echo $key_k1['certificate']?></td>
							               <td><i class="fa fa-edit" onclick="editmodal5('<?php echo 'click5'.$k ?>')"></i> <i class="fa fa-eraser" onclick="delmodal4('<?php echo 'click5'.$k ?>')"></i></td>
							             </tr>
							             <?php $k++; } } } ?>
							            </tbody> 
							          </table>
						           <a href="#" onclick="showmodel5(<?php echo $candidateid ?>,<?php echo $value['candidateid']?>)" <?php echo isset($value)? "" : "disabled";?>><label class="floatright">Thêm khoá đào tạo <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a>
						  	  </div>
						    </div>
						    <!-- body ho so noi bo 6-->
					  	</div>
					  	<!-- ket thuc ho so noi bo học vấn-->
					  	<div class="panel panel-default border-rad0" id="tab7">
						    <div class="panel-heading cyan-profile rad-pad0">
						     	<div class="col-xs-11" style="text-align: left; margin-left: 15px;">
						        	Ngoại ngữ &nbsp;
						    	</div>
						        <div class="col-md-1" style="text-align: right;">
						        	<a data-toggle="collapse" href="#collapsetotal72" class="a-expand">
		      						 <i class="fa fa-angle-right"></i></a>
						     	</div>
						    </div>
						    <!-- heading ho so noi bo 7-->
						    <div id="collapsetotal72" class="panel-collapse collapse tab_con_noibo in">
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
							             <?php if($language_con[$key] != null) {
								              $l = 0;
								              foreach ($language_con[$key] as $key_l) { 
								                ?>
								             <tr>
								              <form id="<?php echo 'click6'.$l ?>">
								                <input type="hidden" name="ngonngu" value="<?php echo $key_l['language']?>">
								                <input type="hidden" name="rate1" value="<?php echo $key_l['rate1']?>">
								                <input type="hidden" name="rate2" value="<?php echo $key_l['rate2']?>">
								                <input type="hidden" name="rate3" value="<?php echo $key_l['rate3']?>">
								                <input type="hidden" name="rate4" value="<?php echo $key_l['rate4']?>">
								                
								                <input type="hidden" name="recordid" value="<?php echo $key_l['recordid']?>">
								                <input type="hidden" name="candidateid_main" value="<?php echo $candidateid ?>">
							                	<input type="hidden" name="candidateid_sub" value="<?php echo $value['candidateid']?>">
								              </form>
								              <td><?php echo $key_l['language']?></td>
								              <td><?php echo ($key_l['rate1'] !== "0") ? $key_l['rate1'] : ""; ?></td>
								              <td><?php echo ($key_l['rate2'] !== "0")? $key_l['rate2'] : ""; ?></td>
								              <td><?php echo ($key_l['rate3'] !== "0")? $key_l['rate3']: ""; ?></td>
								              <td><?php echo ($key_l['rate4'] !== "0")? $key_l['rate4']: ""; ?></td>
								              <td><i class="fa fa-edit" onclick="editmodal6('<?php echo 'click6'.$l ?>')"></i> <i class="fa fa-eraser" onclick="delmodal6('<?php echo 'click6'.$l ?>')"></i></td>
								             </tr>
							             <?php $l++; } } ?>
								            
							            </tbody> 
							          </table>
						           <a href="#" onclick="showmodel6(<?php echo $candidateid ?>,<?php echo $value['candidateid']?>)" <?php echo isset($value)? "" : "disabled";?>><label class="floatright">Thêm ngoại ngữ <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a>
						  	  </div>
						    </div>
						    <!-- body ho so noi bo 7-->
					  	</div>
					  	<!-- ket thuc ho so noi bo ngoại ngữ-->
					  	<div class="panel panel-default border-rad0" id="tab8">
						    <div class="panel-heading cyan-profile rad-pad0">
						     	<div class="col-xs-11" style="text-align: left; margin-left: 15px;">
						        	Tin học &nbsp;
						    	</div>
						        <div class="col-md-1" style="text-align: right;">
						        	<a data-toggle="collapse" href="#collapsetotal82" class="a-expand">
		      						 <i class="fa fa-angle-right"></i></a>
						     	</div>
						    </div>
						    <!-- heading ho so noi bo 8-->
						    <div id="collapsetotal82" class="panel-collapse collapse tab_con_noibo in">
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
							              <?php if($software_con[$key] != null) {
								              $s = 0;
								              foreach ($software_con[$key] as $key_s) { 
								                ?>
								             <tr>
								              <form id="<?php echo 'click7'.$s ?>">
								                <input type="hidden" name="pm" value="<?php echo $key_s['software']?>">
								                <input type="hidden" name="rate1" value="<?php echo $key_s['rate1']?>">

								                <input type="hidden" name="recordid" value="<?php echo $key_s['recordid']?>">
								                <input type="hidden" name="candidateid_main" value="<?php echo $candidateid ?>">
							                	<input type="hidden" name="candidateid_sub" value="<?php echo $value['candidateid']?>">
								              </form>
								              <td><?php echo $key_s['software']?></td>
								              <td><?php echo ($key_s['rate1'] !== "0")? $key_s['rate1'] : ""; ?></td>
								              <td><i class="fa fa-edit" onclick="editmodal7('<?php echo 'click7'.$s ?>')"></i> <i class="fa fa-eraser" onclick="delmodal7('<?php echo 'click7'.$s ?>')"></i></td>
								             </tr>
							             <?php $s++; } } ?>
							            </tbody> 
							          </table>
						           <a href="#" onclick="showmodel7(<?php echo $candidateid ?>,<?php echo $value['candidateid']?>)" <?php echo isset($value)? "" : "disabled";?>><label class="floatright">Thêm Tin học <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a>
						  	  </div>
						    </div>
						    <!-- body ho so noi bo 8-->
					  	</div>
					  	<!-- ket thuc ho so noi bo tin học-->
					</div>
	       		</div>
	       		 <!-- ket thuc id tab nội bộ -->
       		<?php $hs++; } ?>
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
	      			if(isset($row['type'])){
	      				if ($row['type'] == 'comment') {
		      				$fa 		= '<i class="fa fa-comment-o" ></i>';
		      				$type 		= 'Thêm nhận xét/ Đánh giá - '.$createddate;
		      				$check 		= 1;
		      			}else{
		      				$fa 		= '<i class="fa fa-phone" ></i>';
		      				$type 		= 'Thêm Nhật ký Điện thoại - '.$createddate;
		      				$check 		= 1;
		      			}
		      			$comment 		= '<div class="col-xs-11"><p style="font-size: 14px">'.$row['comments'].' - '.(int)$row['rate'].' điểm</p></div>';
	      			}else if(isset($row['actiontype'])){
	      				if ($row['actiontype'] == 'Trust') {
		      				$fa = '<i class="fa fa-check-circle-o color-green size-icon"></i>';
		      				$type = ' - '.$row['actionnote'].' - '.$createddate;
		      				$check = 1;
		      			}else if ($row['actiontype'] == 'Block'){
		      				$fa = '<i class="fa fa-ban color-red size-icon"></i>';
		      				$type = ' - '.$row['actionnote'].' - '.$createddate;
		      				$check = 1;
		      			}else if ($row['actiontype'] == 'Talent') {
		      				$fa = '<i class="fa fa-star color-orange  star-icon1" ></i>';
		      				$type = ' - '.$row['actionnote'].' - '.$createddate;
		      				$check = 1;
		      			}else if ($row['actiontype'] == 'NotTalent'){
		      				$fa = '<i class="fa fa-star color-gray star-icon1"></i>';
		      				$type = ' - '.$row['actionnote'].' - '.$createddate;
		      				$check = 1;
		      			}
		      			else if ($row['actiontype'] == 'NotTalent'){
		      				$fa = '<i class="fa fa-star color-gray star-icon1"></i>';
		      				$type = ' - '.$row['actionnote'].' - '.$createddate;
		      				$check = 1;
		      			}
	      			}
	      			else if (isset($row['mailid'])) {
	      				$fa 			= '<a onclick="showMailView('.$row['mailid'].')"><i class="fa fa-envelope-o star-icon1"></i></a>';
	      				$type 			= ' Gửi email: '.$row['emailsubject'].' - '.$createddate;
	      				$check 			= 1;
	      			}
	      			if($check == 1){
	      		?>
	      			<tr class="<?php echo $display ?> ">
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
  <!-- ket thuc lich su ho so -->
  <div class="panel panel-default border-rad0">
	  	<a data-toggle="collapse" data-parent="#accordion" href="#collapse3" onclick="rotate(3)">
	  		<div class="panel-heading rad-pad0 b-blue" >
	  			<i class="fa fa-angle-right a-tabcs rotate rotate_3"></i>
	  			<div class="ul-nav">
	  				<label class="tittle-tab">
	  					Nhận xét/  Đánh giá
	  				</label>
	  			</div>
	  		</div>
	  	</a>
	  	<div id="collapse3" class="panel-collapse collapse in">
	  		<form action="<?php echo base_url()?>admin/handling/postcomment" method="POST">
	  			<div class="panel-body">
	  				<input type="hidden" name="idcan" value="<?php echo $candidateid ?>" >
	  				<img src="<?php echo base_url()?>public/image/2.jpg" class="col-xs-1" style="padding-left: 9px;" width="32px" height="32px">
	  				<div class="col-xs-11 width80 padding-lr0">
	  					<select class="text-cmt width30" style="margin-bottom: 9px;" name="typecmt">
	  						<option value="comment">Nhận xét/ Đánh giá</option>
	  						<option value="call">Gọi điện</option>
	  					</select>
	  					<textarea class="textara1" rows="3" placeholder="Nhận xét" name="contentcmt" required></textarea>
	  					<input type="text" class="text-cmt width30" name="scorescmt" id="scorescmt" placeholder="Điểm số" maxlength="3">
	  				</div>
	  				<div  class="padding-lr0 phu"></div>
	  				<label class="font-weight"><input type="checkbox"  class="mar-t-l10" name="sharecmt" value="Y"> Không chia sẻ nội dung này</label>
	  				<button type="submit" class="luu-cmt">Lưu</button>
	  			</div>
	  		</form>
	  	</div>
  </div>
  <!-- ket thuc nhan xet danh gia -->
</div>
	<!-- ket thuc 3 tab -->
</div>
<?php foreach ($candidate_con as $key => $value){ ?>
	<input type="hidden" id="getqh1_<?php echo $value['candidateid'] ?>" value="<?php
	    		 for($i = 0; $i < count($canaddress_con[$key]); $i++)
	    		 {
	    		 	if($canaddress_con[$key][$i]['addtype'] == "PREMANENT")
	    		 	{
	    		 		echo $canaddress_con[$key][$i]['district'];
	    		 	}
	    		 }
	?>">
	<input type="hidden" id="getpx1_<?php echo $value['candidateid'] ?>" value="<?php
		    		 for($i = 0; $i < count($canaddress_con[$key]); $i++)
		    		 {
		    		 	if($canaddress_con[$key][$i]['addtype'] == "PREMANENT")
		    		 	{
		    		 		echo $canaddress_con[$key][$i]['ward'];
		    		 	}
		    		 }
	?>">
	<input type="hidden" id="addressno1_<?php echo $value['candidateid'] ?>" value="<?php
		    		 for($i = 0; $i < count($canaddress_con[$key]); $i++)
		    		 {
		    		 	if($canaddress_con[$key][$i]['addtype'] == "PREMANENT")
		    		 	{
		    		 		echo $canaddress_con[$key][$i]['addressno'];
		    		 	}
		    		 }
	?>">
	<input type="hidden" id="getqh2_<?php echo $value['candidateid'] ?>" value="<?php
		    		 for($i = 0; $i < count($canaddress_con[$key]); $i++)
		    		 {
		    		 	if($canaddress_con[$key][$i]['addtype'] == "CONTACT")
		    		 	{
		    		 		echo $canaddress_con[$key][$i]['district'];
		    		 	}
		    		 }
	?>">
	<input type="hidden" id="getpx2_<?php echo $value['candidateid'] ?>" value="<?php
		    		 for($i = 0; $i < count($canaddress_con[$key]); $i++)
		    		 {
		    		 	if($canaddress_con[$key][$i]['addtype'] == "CONTACT")
		    		 	{
		    		 		echo $canaddress_con[$key][$i]['ward'];
		    		 	}
		    		 }
	?>">
	<input type="hidden" id="addressno2_<?php echo $value['candidateid'] ?>" value="<?php
		    		 for($i = 0; $i < count($canaddress_con[$key]); $i++)
		    		 {
		    		 	if($canaddress_con[$key][$i]['addtype'] == "PREMANENT")
		    		 	{
		    		 		echo $canaddress_con[$key][$i]['addressno'];
		    		 	}
		    		 }
	?>">
<?php } ?>


<input type="hidden" id="getqh1" value="<?php
	    		 for($i = 0; $i < count($canaddress_noibo); $i++)
	    		 {
	    		 	if($canaddress_noibo[$i]['addtype'] == "PREMANENT")
	    		 	{
	    		 		echo $canaddress_noibo[$i]['district'];
	    		 	}
	    		 }
?>">
<input type="hidden" id="getpx1" value="<?php
	    		 for($i = 0; $i < count($canaddress_noibo); $i++)
	    		 {
	    		 	if($canaddress_noibo[$i]['addtype'] == "PREMANENT")
	    		 	{
	    		 		echo $canaddress_noibo[$i]['ward'];
	    		 	}
	    		 }
?>">
<input type="hidden" id="addressno1_<?php echo $candidate_noibo['candidateid'] ?>" value="<?php
	    		 for($i = 0; $i < count($canaddress_noibo); $i++)
	    		 {
	    		 	if($canaddress_noibo[$i]['addtype'] == "PREMANENT")
	    		 	{
	    		 		echo $canaddress_noibo[$i]['addressno'];
	    		 	}
	    		 }
?>">
<input type="hidden" id="getqh2" value="<?php
	    		 for($i = 0; $i < count($canaddress_noibo); $i++)
	    		 {
	    		 	if($canaddress_noibo[$i]['addtype'] == "CONTACT")
	    		 	{
	    		 		echo $canaddress_noibo[$i]['district'];
	    		 	}
	    		 }
?>">
<input type="hidden" id="getpx2" value="<?php
	    		 for($i = 0; $i < count($canaddress_noibo); $i++)
	    		 {
	    		 	if($canaddress_noibo[$i]['addtype'] == "CONTACT")
	    		 	{
	    		 		echo $canaddress_noibo[$i]['ward'];
	    		 	}
	    		 }
?>">
<input type="hidden" id="addressno2__<?php echo $candidate_noibo['candidateid'] ?>" value="<?php
	    		 for($i = 0; $i < count($canaddress_noibo); $i++)
	    		 {
	    		 	if($canaddress_noibo[$i]['addtype'] == "PREMANENT")
	    		 	{
	    		 		echo $canaddress_noibo[$i]['addressno'];
	    		 	}
	    		 }
?>">
<div class="hide" id="sstag">
	<?php echo json_encode($ss_tags) ?>
</div>
<style type="text/css">
	.color-flag-recruite{
		color: #A0BA82;
	}
</style>
<script type="text/javascript">
	$('#btn_tab_canhan').click(function(event) {
		$('.tab_con_canhan').toggleClass('in');
		$('.tab_con_noibo').toggleClass('in');
	});
	$(document).ready(function(){
		
	    	if($('#city1').val() != '0')
	    	{
	    		 var city1 = $('#city1').val();
	    		 var get1 = $('#getqh1').val();
	    		 comb_tp_qh_1(city1,get1,<?php echo $candidate_noibo['candidateid'] ?>);
	    		 var get2 = $('#getpx1').val();
	    		 comb_qh_px_1(get1,get2,<?php echo $candidate_noibo['candidateid'] ?>);
	    	}
	    	if($('#city2').val() != '0')
	    	{
	    		 var city2 = $('#city2').val();
	    		 var get3 = $('#getqh2').val();
	    		 comb_tp_qh_2(city2,get3,<?php echo $candidate_noibo['candidateid'] ?>);
	    		  var get4 = $('#getpx2').val();
	    		 comb_qh_px_2(get3,get4,<?php echo $candidate_noibo['candidateid'] ?>);
	    	}

	    	var states = jQuery.parseJSON($('#sstag').text());
	    	console.log(states);
			$('#typeahead').tagsinput({
			    typeaheadjs: {
			    name: 'states',
			    source: substringMatcher(states)
			    },
			    freeInput: true,
			});

	    	<?php foreach ($candidate_con as $key => $value){ ?>
	    		var candidateid = <?php echo $value['candidateid'] ?>;
	    		if($('#city1_'+candidateid).val() != '0')
		    	{
		    		 var city1 = $('#city1_'+candidateid).val();
		    		 var get1 = $('#getqh1_'+candidateid).val();
		    		 comb_tp_qh_1(city1,get1,candidateid);
		    		 var get2 = $('#getpx1_'+candidateid).val();
		    		 comb_qh_px_1(get1,get2,candidateid);
		    	}
		    	if($('#city2_'+candidateid).val() != '0')
		    	{
		    		 var city2 = $('#city2_'+candidateid).val();
		    		 var get3 = $('#getqh2_'+candidateid).val();
		    		 comb_tp_qh_2(city2,get3,candidateid);
		    		  var get4 = $('#getpx2_'+candidateid).val();
		    		 comb_qh_px_2(get3,get4,candidateid);
		    	}
		    	$('#typeahead_'+candidateid).tagsinput({
				    typeaheadjs: {
				    name: 'states',
				    source: substringMatcher(states)
				    },
				    freeInput: true,
				});
	
	    	<?php } ?>
	   	
	});
	$("input[id='height']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
    $("input[id='weight']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
    $("input[id='idcard']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
    $("input[id='scorescmt']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
   		 if( $(this).val() > 100)
   		 	$(this).val(100);
   		 if( $(this).val() == 0)
   		 	$(this).val("");
	});
    function parseQuery(queryString) {
	    var query = {};
	    var pairs = (queryString[0] === '?' ? queryString.substr(1) : queryString).split('&');
	    for (var i = 0; i < pairs.length; i++) {
	        var pair = pairs[i].split('=');
	        
	        query[decodeURIComponent(pair[0].replace(/\+/g, '%20'))] = decodeURIComponent(pair[1].replace(/\+/g, '%20') || '');
	    }
	    return query;
	}
	function rotate(id) {
		for (var i = 1; i <= 3; i++) {
			if(i != id){
				$(".rotate_"+i).removeClass("down"); 
			}
		}
		$(".rotate_"+id).toggleClass("down"); 
	}
	$(document).ready(function(){
		$("#uploadCV").hide();
        $('#browsebutton1 :file').change(function(e){
            var fileName = e.target.files[0].name;
            $("#label1").text(fileName);
            $("#label1").attr('href','#');
            $("#uploadCV").show();
        });
        $('#browsebutton2 :file').change(function(e){
            var fileName = e.target.files[0].name;
            $("#label2").text(fileName);
            $("#label2").attr('href','#');
        });

        
        
        
    });  
	$(document).ready(function()
	{
	
		$('#dateofbirth').datetimepicker({
		   timepicker:false,
		   format:'d-m-Y',
		   defaultDate:'+1960/01/01',
		   maxDate:'+1960/01/01'
		});
		$('.dateofbirth').datetimepicker({
		   timepicker:false,
		   format:'d-m-Y',
		   defaultDate:'+1960/01/01',
		   maxDate:'+1960/01/01'
		});

		$('#dateofissue').datetimepicker({
		  timepicker:false,
		  maxDate:'+1970/01/01',
		  format:'d-m-Y'
		});
		$('.js-example-basic').select2();
		$('.js-example-basic-single').select2();
	});
	function comb_tp_qh_1(obj,get,candidateid)
	{
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
	                  if(get != 0 && get == data[i].id_district)
	                  {
	                    $('#chonqh-ad1_'+candidateid).after('<option class="gicungdc" value="'+data[i].id_district+'" selected>'+data[i].name+'</option>');
	                  }
	                  else
	                  {
	                    $('#chonqh-ad1_'+candidateid).after('<option class="gicungdc" value="'+data[i].id_district+'">'+data[i].name+'</option>');
	                  } 
	                  }
	                if ($('#addressno1_'+candidateid).val() == '') {
	                	$('#toanha88_'+candidateid).val('');
	                }
	              })
	      .fail(function() {
	        alert('thatbai');
	        console.log("error");
	      })
	}
	function comb_qh_px_1(obj,get,candidateid)
	{
	    var $id = obj;
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
	              if(get != 0 && get == data[i].id_ward)
	              {
	                $('#chonpx-ad1_'+candidateid).after('<option class="gicungdc2" value="'+data[i].id_ward+'" selected>'+data[i].name+'</option>');
	              }
	              else
	              {
	                 $('#chonpx-ad1_'+candidateid).after('<option class="gicungdc2" value="'+data[i].id_ward+'">'+data[i].name+'</option>');
	              }
	              }
	            if ($('#addressno1_'+candidateid).val() == '') {
                	$('#toanha88_'+candidateid).val('');
                }
	          })
	      .fail(function() {
	        alert('thatbai');
	        console.log("error");
	      })
	}
	function comb_tp_qh_2(obj,get,candidateid)
	{
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
	              if(get != 0 && get == data[i].id_district)
	              {
	                $('#chonqh-ad2_'+candidateid).after('<option class="gicungdc3" value="'+data[i].id_district+'" selected>'+data[i].name+'</option>');
	              }
	              else
	              {
	                $('#chonqh-ad2_'+candidateid).after('<option class="gicungdc3" value="'+data[i].id_district+'">'+data[i].name+'</option>');
	              } 
              }
           	if ($('#addressno2_'+candidateid).val() == '') {
            	$('#toanha8_'+candidateid).val('');
            }
          })
	      .fail(function() {
	        alert('thatbai');
	        console.log("error");
	      })
	}
	function comb_qh_px_2(obj,get,candidateid)
	{
	    var $id = obj;
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
	              if(get != 0 && get == data[i].id_ward)
	              {
	                $('#chonpx-ad2_'+candidateid).after('<option class="gicungdc4" value="'+data[i].id_ward+'" selected>'+data[i].name+'</option>');
	              }
	              else
	              {
	                 $('#chonpx-ad2_'+candidateid).after('<option class="gicungdc4" value="'+data[i].id_ward+'">'+data[i].name+'</option>');
	              }
	              }
	            if ($('#addressno2_'+candidateid).val() == '') {
	            	$('#toanha8_'+candidateid).val('');
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
	function luu_canhan(candidateid)
	{
		$.ajax({
			url: '<?php echo base_url()?>admin/handling/update_canhan/'+candidateid,
			type: 'POST',
			dataType: 'JSON',
			data: $('#form_canhan_'+candidateid).serialize(),
		})
		.done(function() {
			alert("Lưu thành công!");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});	
	}
	function luu_diachi(candidateid)
	{
		$.ajax({
			url: '<?php echo base_url()?>admin/handling/update_diachi/'+candidateid,
			type: 'POST',
			dataType: 'JSON',
			data: $('#form_diachi_'+candidateid).serialize(),
		})
		.done(function() {
			alert("Lưu thành công!");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}
	$('#uploadCV').click(function(event) {
		$.ajax({
      url: '<?php echo base_url()?>admin/handling/updateCV',
      type: 'POST',
      dataType: 'json',
      data: new FormData($('#form_CV')[0]),
      contentType: false,
      processData: false

    })
    .done(function(data) {
      if (data == 1) {
      	alert('Tải lên CV thành công');
        parent.location.reload();
      }
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
  });
	//them xoa sua quan he gia dinh
  function editmodal(idform){
      var data = ""; 
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      
       parent.$('#them11').text("Lưu");
       parent.$('#myModal11').modal('show');
       parent.$('#hoten11').val(data2.hoten);
       parent.$('#nn11').val(data2.nghenghiep);
       parent.$('#checkup').val(data2.recordid);
       parent.$('#namsinh11').val(data2.namsinh);
       parent.$('#quanhe11').val(data2.quanhe);
      parent.$('#candidate_main_relationship').val(data2.candidateid_main);
      parent.$('#candidate_sub_relationship').val(data2.candidateid_sub);
  }

  function showmodel11(id_main,id_sub)
  {
	parent.$('#them11').text("Thêm");
	parent.$('#myModal11').modal('show');
	parent.$('#hoten11').val("");
	parent.$('#nn11').val("");
	parent.$('#checkup').val("0");
	parent.$('#namsinh11').val("0");
	parent.$('#quanhe11').val("0");
	parent.$('#candidate_main_relationship').val(id_main);
	parent.$('#candidate_sub_relationship').val(id_sub);
  }
  function delmodal(idform){
    var data = ""; 
    data = $("#"+idform+"").serialize();
    var data2 = parseQuery(data);
    parent.$('#myModaldel').modal('show');
    parent.$('#checkup1d').val(data2.recordid);
    parent.$('#candidate_main_del_relationship').val(data2.candidateid_main);
    parent.$('#candidate_sub_del_relationship').val(data2.candidateid_sub);
  }

 // them xoa sua kinh nghiem lam việc 
  function editmodal2(idform){
      var data = ""; 
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      
      parent.$('#them12').text("Lưu");
      parent.$('#myModal2').modal('show');
      parent.$('#tuden5').val(data2.tungay);
      parent.$('#tuden6').val(data2.denngay);
      parent.$('#checkup2').val(data2.recordid);
      parent.$('#cty2').val(data2.cty);
       parent.$('#chucvu2').val(data2.vitri);
        parent.$('#nhiemvu2').val(data2.nhiemvu);
       parent.$('#lydonghi2').val(data2.lydo);
       parent.$('#dc2').val(data2.diachi);
       parent.$('#sdt2').val(data2.sdt);
       parent.$('#candidate_main_experience').val(data2.candidateid_main);
    	parent.$('#candidate_sub_experience').val(data2.candidateid_sub);
  }
  function showmodel2(id_main,id_sub){
  
      parent.$('#them12').text("Thêm");
     
      parent.$('#myModal2').modal('show');
       parent.$('#tuden5').val("");
      parent.$('#tuden6').val("");
      parent.$('#checkup2').val("0");
      parent.$('#cty2').val("");
       parent.$('#chucvu2').val("");
        parent.$('#nhiemvu2').val("");
       parent.$('#lydonghi2').val("");
       parent.$('#dc2').val("");
       parent.$('#sdt2').val("");
        parent.$('#candidate_main_experience').val(id_main);
    	parent.$('#candidate_sub_experience').val(id_sub);
  }
  function delmodal2(idform){
      var data = ""; 
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      parent.$('#myModaldel2').modal('show');
      parent.$('#checkup2d').val(data2.recordid);
       parent.$('#candidate_main_del_experience').val(data2.candidateid_main);
    	parent.$('#candidate_sub_del_experience').val(data2.candidateid_sub);
      
  }
 // them xoa sua nguoi tham chieu
  function editmodal3(idform){
      var data = ""; 
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      
      parent.$('#them3').text("Lưu");
      parent.$('#myModal3').modal('show');
     parent.$('#hoten3').val(data2.hoten);
      parent.$('#chucvu3').val(data2.vitri);
      parent.$('#checkup3').val(data2.recordid);
      parent.$('#congty3').val(data2.cty);
       parent.$('#lienhe3').val(data2.lienhe);
        parent.$('#candidate_main_reference').val(data2.candidateid_main);
    	parent.$('#candidate_sub_reference').val(data2.candidateid_sub);
  }
  function showmodel3(id_main,id_sub){
  
      parent.$('#them3').text("Thêm");
     
      parent.$('#myModal3').modal('show');
       parent.$('#hoten3').val("");
      parent.$('#chucvu3').val("");
      parent.$('#checkup3').val("0");
      parent.$('#congty3').val("");
       parent.$('#lienhe3').val("");
       parent.$('#candidate_main_reference').val(id_main);
    	parent.$('#candidate_sub_reference').val(id_sub);
  }
      
  function delmodal3(idform){
      var data = ""; 
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      parent.$('#myModaldel3').modal('show');
      parent.$('#checkup3d').val(data2.recordid);
      parent.$('#candidate_main_del_reference').val(data2.candidateid_main);
    	parent.$('#candidate_sub_del_reference').val(data2.candidateid_sub);
  }
 // them xoa sua trinh do hoc van
   function editmodal4(idform){
      var data = ""; 
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      
      parent.$('#them4').text("Lưu");
      parent.$('#myModal4').modal('show');
       parent.$('#tuden1').val(data2.tu);
      parent.$('#tuden2').val(data2.den);
      parent.$('#checkup4').val(data2.recordid);
      parent.$('#truong4').val(data2.truong);
       parent.$('#noihoc4').val(data2.noihoc);
       parent.$('#nganhhoc4').val(data2.nganhhoc);
       parent.$('#trinhdo4').val(data2.chungchi);
       if(data2.caonhat == "Y"){
         parent.$('#caonhat4').prop('checked',true);
        } else {
           parent.$('#caonhat4').prop('checked',false);
        }
        parent.$('#candidate_main_knowledge').val(data2.candidateid_main);
    	parent.$('#candidate_sub_knowledge').val(data2.candidateid_sub);
  }
  function showmodel4(id_main,id_sub){
  
      parent.$('#them4').text("Thêm");
     
      parent.$('#myModal4').modal('show');
       parent.$('#tuden1').val("");
      parent.$('#tuden2').val("");
      parent.$('#checkup4').val("0");
      parent.$('#truong4').val("");
       parent.$('#noihoc4').val("");
       parent.$('#nganhhoc4').val("");
       parent.$('#trinhdo4').val("");
       parent.$('#caonhat4').prop('checked',false);
       parent.$('#candidate_main_knowledge').val(id_main);
    	parent.$('#candidate_sub_knowledge').val(id_sub);
  }
      
  function delmodal4(idform){
      var data = ""; 
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      parent.$('#myModaldel4').modal('show');
      parent.$('#checkup4d').val(data2.recordid);
      parent.$('#candidate_main_del_knowledge').val(data2.candidateid_main);
    	parent.$('#candidate_sub_del_knowledge').val(data2.candidateid_sub);
      
  }
   function editmodal5(idform){
      var data = ""; 
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      
      parent.$('#them5').text("Lưu");
      parent.$('#myModal5').modal('show');
       parent.$('#tuden3').val(data2.tu);
      parent.$('#tuden4').val(data2.den);
      parent.$('#checkup5').val(data2.recordid);
      parent.$('#truong5').val(data2.truong);
       parent.$('#tghoc5').val(data2.tghoc);
       parent.$('#donvi5').val(data2.donvi);
       parent.$('#nganhhoc5').val(data2.nganhhoc);
       parent.$('#bangcap5').val(data2.chungchi);
        parent.$('#candidate_main_knowledge2').val(data2.candidateid_main);
    	parent.$('#candidate_sub_knowledge2').val(data2.candidateid_sub);
       
  }
  function showmodel5(id_main,id_sub){
  
      parent.$('#them5').text("Thêm");
     
      parent.$('#myModal5').modal('show');
       parent.$('#tuden3').val("");
      parent.$('#tuden4').val("");
      parent.$('#checkup5').val("0");
      parent.$('#truong5').val("");
       parent.$('#tghoc5').val("");
       parent.$('#donvi5').val("Năm");
       parent.$('#nganhhoc5').val("");
       parent.$('#bangcap5').val("");
       parent.$('#candidate_main_knowledge2').val(id_main);
    	parent.$('#candidate_sub_knowledge2').val(id_sub);
  }
  // them xoa sua ngoai ngu
  function editmodal6(idform){
      var data = ""; 
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      
      parent.$('#them6').text("Lưu");
     
      parent.$('#myModal6').modal('show');
      parent.$('#truong6').val(data2.ngonngu);
      parent.$('#checkup6').val(data2.recordid);
      parent.$('#nghe6').val(data2.rate1);
      parent.$('#noi6').val(data2.rate2);
      parent.$('#doc6').val(data2.rate3);
      parent.$('#viet6').val(data2.rate4);
      parent.$('#candidate_main_language').val(data2.candidateid_main);
      parent.$('#candidate_sub_language').val(data2.candidateid_sub);
  }
  function showmodel6(id_main,id_sub){
  
      parent.$('#them6').text("Thêm");
     
      parent.$('#myModal6').modal('show');
      parent.$('#truong6').val("");
      parent.$('#checkup6').val("0");
      parent.$('#nghe6').val("0");
      parent.$('#noi6').val("0");
      parent.$('#doc6').val("0");
      parent.$('#viet6').val("0");
      parent.$('#candidate_main_language').val(id_main);
      parent.$('#candidate_sub_language').val(id_sub);
  }
  function delmodal6(idform){
      var data = ""; 
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      parent.$('#myModaldel6').modal('show');
     
      parent.$('#checkup6d').val(data2.recordid);
      parent.$('#candidate_main_del_language').val(data2.candidateid_main);
      parent.$('#candidate_sub_del_language').val(data2.candidateid_sub);
      
  }
  //them xoa sua pm
   function editmodal7(idform){
      var data = ""; 
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      
      parent.$('#them7').text("Lưu");
     
      parent.$('#myModal7').modal('show');
      parent.$('#pm7').val(data2.pm);
      parent.$('#checkup7').val(data2.recordid);
      
      parent.$('#trinhdo7').val(data2.rate1);
      parent.$('#candidate_main_software').val(data2.candidateid_main);
      parent.$('#candidate_sub_software').val(data2.candidateid_sub);
      
  }
  function showmodel7(id_main,id_sub){
  
      parent.$('#them7').text("Thêm");
     
      parent.$('#myModal7').modal('show');
      parent.$('#pm7').val("");
      parent.$('#trinhdo7').val("0");
      parent.$('#checkup7').val("0");
     parent.$('#candidate_main_software').val(id_main);
      parent.$('#candidate_sub_software').val(id_sub);
      
  }
  function delmodal7(idform){
      var data = ""; 
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      parent.$('#myModaldel7').modal('show');
      parent.$('#checkup7d').val(data2.recordid);
      parent.$('#candidate_main_del_software').val(data2.candidateid_main);
      parent.$('#candidate_sub_del_software').val(data2.candidateid_sub);   
  }

  	function sendMail() {
  		var form 			= $('#form_checkone').serializeArray();
		var candidateid 	= form[0].value;
		var mail 			= $('#candidateemail').val();
		parent.$('#candidateid_mail').val(candidateid);
		parent.$('#email_to').val(mail);
		parent.$('#modalMail').modal('show');
	}

	var substringMatcher = function(strs) {
	  return function findMatches(q, cb) {
	    var matches, substringRegex;

	    // an array that will be populated with substring matches
	    matches = [];

	    // regex used to determine if a string contains the substring `q`
	    substrRegex = new RegExp(q, 'i');

	    // iterate through the pool of strings and for any string that
	    // contains the substring `q`, add it to the `matches` array
	    $.each(strs, function(i, str) {
	      if (substrRegex.test(str)) {
	        matches.push(str);
	      }
	    });

	    cb(matches);
	  };
	};

	

	function showMailView(mailid) {
      $.ajax({
        url: '<?php echo base_url() ?>admin/email/get_mail_byId',
        type: 'POST',
        dataType: 'json',
        data: {mailid: mailid},
      })
      .done(function(data) {
        parent.$('#idMailFrom_1').text(data[0]['operatorname']);
        parent.$('#idMailTo_1').text(data[0]['toemail']);
        parent.$('#idMailCc_1').text(data[0]['cc']);
        parent.$('#idMailDate_1').text(data[0]['date']);
        parent.$('#idMailSubject_1').text(data[0]['emailsubject']);
        parent.$('#idMailBody_1').empty().append(data[0]['emailbody']);
        parent.$('#modalMailView1').modal('show');
      })
      .fail(function() {
        console.log("error");
      });
      
    }
</script>
<style type="text/css">
	.tt-input
	{
		vertical-align: unset !important;
	}
</style>
