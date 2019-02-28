<?php if ($id != ''): 
	// var_dump($candidate_noibo);exit;
	$candidateid = ($candidate['candidateid'] != '')? $candidate['candidateid'] : $candidate_noibo['candidateid'];
?>
	<form id="form_checkone">	
	<input type="hidden" name="campaignid" value="<?php echo $campaignid ?>">
 	<input type="hidden" name="roundid" value="<?php echo $roundid ?>">
	<input type="hidden" name="check[]" id="checkoneid" value="<?php echo ($candidate['candidateid'] != '') ? $candidate['candidateid'] : $candidate_noibo['candidateid'] ?>" >
</form>
<input type="hidden" id="candidatename" value="<?php echo ($candidate['name'] != '') ? $candidate['name'] : $candidate_noibo['name']?>">
<input type="hidden" id="candidateimage" value="<?php echo ($candidate['imagelink'] != '') ? $candidate['imagelink'] : $candidate_noibo['imagelink']?>">
<input type="hidden" id="candidateemail" value="<?php echo ($candidate['email'] != '') ? $candidate['email'] : $candidate_noibo['email']?>">
<input type="hidden" id="manageround" value="<?php echo $manageround?>">
<input type="hidden" id="candidate_noibo" value="<?php echo $candidate_noibo['candidateid'] ?>">
<div style="background-color: white">
	<div class="row rowedit">
		<div class="col-md-6 col-xs-6">
			<?php $unsubcribe = ($candidate['unsubcribe'] != '')? $candidate['unsubcribe'] : $candidate_noibo['unsubcribe'];
		  			$istalent = ($candidate['istalent'] != '')? $candidate['istalent'] : $candidate_noibo['istalent']; ?>
			<label class="margin-t5 margin-b0" >
				<i class="fa fa-bell<?php echo ($unsubcribe == 'Y')? "-slash" : "";?> icon-detail"></i>
				<i class="fa fa-user icon-detail2"></i>
				<i class="fa fa-clock-o icon-detail3"></i>
			</label>
		</div>
		<div class="col-md-6 col-xs-6 hov-btn-ad">
			<button type="button" class="np-icon btn_chuyen dropdown-toggle" data-toggle="dropdown">Chuyển</button>
    		<ul class="dropdown-menu" role="menu">
                <li><a  onclick="transfer(1,'<?php echo $recflow['transferemail'] ?>', <?php echo $recflow['transfmailtemp'] ?>)">Chuyển vòng</a></li>
                <?php if ($recflow['roundtype'] != 'Profile'){ ?>
	                <li><a  onclick="transfer(0,'<?php echo $recflow['discardemail'] ?>', <?php echo $recflow['discmailtemp'] ?>)">Loại hồ sơ</a></li>
	            <?php } ?>
      		</ul>
				<button type="button" class="btn-icon-header margin-r7" ><i class="fa fa-print color-ccc" ></i></button>
				<button type="button" class="btn-icon-header margin-r7" onclick="sendMail()" ><i class="fa fa-envelope-o color-ccc" ></i></button>
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
				<?php if ($recflow['roundtype'] == 'Assessment'){ ?>
					<button type="button" class="btn-icon-header margin-r7" onclick="createMChoice(<?php echo $recflow['assessment'] ?>, <?php echo $recflow['asmtmailtemp'] ?>)" ><i class="fa fa-file-text-o color-ccc" ></i></button>
				<?php }else if ($recflow['roundtype'] == 'Interview') { ?>
					<button type="button" class="btn-icon-header margin-r7" onclick="createAppointment(<?php echo $recflow['scorecard'] ?>, <?php echo $recflow['interviewmailtemp'] ?>, <?php echo $recflow['invitemailtemp'] ?>)" ><i class="fa fa-calendar color-ccc" ></i></button>
				<?php }else if ($recflow['roundtype'] == 'Offer') { ?>
					<button type="button" class="btn-icon-header margin-r7" onclick="createOffer(<?php echo $recflow['letteroffermailtemp'] ?>)" ><i class="fa fa-handshake-o color-ccc" ></i></button>
				<?php }else if ($recflow['roundtype'] == 'Recruite'){ 
					if ($recruite == 0) { ?>
					<button type="button" class="btn-icon-header margin-r7" id="btn_recruite" onclick="recruite()" ><i class="fa fa-flag color-ccc" ></i></button>
				<?php }else{ ?>
					<button type="button" class="btn-icon-header margin-r7" disabled="" id="btn_recruite" onclick="recruite()" ><i class="fa fa-flag color-flag-recruite" ></i></button>
				<?php }} ?>
				
		</div>
	</div>
	<div class="margin-t4 dash-horizontal"  ></div>
	<?php if ($candidate['imagelink'] != ''){ 
		$image = $candidate['imagelink'];
	}else if ($candidate_noibo['imagelink']) {
		$image = $candidate_noibo['imagelink'];
	}else{ $image = 'unknow.jpg'; } ?>
	<img src="<?php echo base_url()?>public/image/<?php echo $image ?>" class="image-avatar-ad" width="130px" height="130px">
	<div class="row rowcontent">
		<div class="col-md-6 col-xs-6">

			<label class="can-name"><?php echo ($candidate['name'] != '') ? $candidate['name'] : $candidate_noibo['name'];?> <?php echo ($recruite >0)? '<i class="fa fa-flag color-flag-recruite" ></i>' : '' ?></label>
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
				?></span>
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

    <div id="collapse1" class="panel-collapse collapse in">
      	<div class="panel-body tab-collapse">
      	 	<div class="tab-content">
        		<div id="total" class="tab-pane <?php echo ($tabActive == '1')?'in active' : '' ?>">
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
						             <label class="fontArial colorcyan labelcontent" ><?php $canhan = array();
										foreach ($tags as $key) {
											array_push($canhan, $key['title']);
										}
										echo implode(", ", $canhan);
										?></label>
						             
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
						             	<a href="<?php echo $candidate['snid']?>"><?php echo $candidate['snid']?></a>
						             </label>
						             
						            </div>
						         </div>
						          <div class="width100 row rowedit h-auto">
						          	<form id="form_CV" >
						          		<label for="text" class="width20 col-xs-3 label-profile">Hồ sơ tải lên</label>
							            <!-- <div class="col-sm-2">
					                    	<label id="browsebutton1" class=" btn-default btn-tailen" for="my-file-selector1" style="background-color:white">
						                        <input id="my-file-selector1" name="fileCV" type="file" accept=".pdf,.doc,.docx,.xlsx" style="display:none;">
						                        <i class="fa fa-download"></i> Chọn CV
						                    </label>
					                    </div> -->
					                    <div class="col-sm-5"> 
					                      <?php if (isset($document) && !empty($document)){
					                        $url = $document['url'];
					                        $name = $document['filename'];
					                      }else{$url =''; $name = '';}?>
					                        <label class="fontArial colorcyan labelcontent" ><a id="label1"  class="fontstyle" target="_blank" href="<?php echo $url; ?>"><?php echo $name; ?> </a></label>
					                    </div>
					                    <input type="hidden" name="candidateid" value="<?php echo $candidateid ?> ">
					                    <!-- <div class="col-sm-2">
					                    	<button type="button" id="uploadCV" class="btn btn-info">Tải lên</button></div> -->
						          	</form>
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
							                          echo trim($key['address']); break;
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
							                          echo trim($key['address']); break;
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
	        		<div class="panel-group bor-mar-b0">
						<div class="panel panel-default border-rad0">
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
							             	<input type="text" class="textbox" name="idcard" maxlength="9" value="<?php echo isset($candidate_noibo['idcard'])? $candidate_noibo['idcard'] : "";?>">
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
							             <div class="col-xs-9 width80 padding-lr0">
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
					  	<div class="panel panel-default border-rad0">
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
						             	<select class="textbox2 js-example-basic-single" name="placeofbirth" style="width: 195px">
							                 <option value="0" style="width: 195px" >Chọn tỉnh thành</option>
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
						             	<select class="textbox2 js-example-basic-single" name="placeofissue" style="width: 195px">
							                 <option value="0" style="width: 195px" >Chọn tỉnh thành</option>
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
					  	<div class="panel panel-default border-rad0">
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
								             	<select class="textbox2 js-example-basic-single" onchange="comb_tp_qh_1(this.value,0,<?php echo $candidate_noibo['candidateid'] ?>)" 
								             		name="city1" id="city1_<?php echo $candidate_noibo['candidateid'] ?>" style="width: 195px;">
									                 <option value="0" style="width: 195px" >Chọn tỉnh thành</option>
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

								                <select class="seletext js-example-basic-single" name="district1" id="district1_<?php echo $candidate_noibo['candidateid'] ?>" style="width: 100%" required onchange="comb_qh_px_1(this.value,0,<?php echo $candidate_noibo['candidateid'] ?>)">
								                 	<option value="0" id="chonqh-ad1_<?php echo $candidate_noibo['candidateid'] ?>" >Chọn quận huyện</option>
								                </select>
								                <div class="h10-w-auto"></div>
								                 <select class="textbox2 js-example-basic-single" name="ward1" id="phuongxa8-ad_<?php echo $candidate_noibo['candidateid'] ?>" style="width: 100%" required>
								                 	<option value="0" id="chonpx-ad1_<?php echo $candidate_noibo['candidateid'] ?>" >Chọn phường xã</option>				                
								                </select>
								                <div class="h10-w-auto"></div>

								                 <textarea class="form-control off-resize fontstyle" rows="2" name="street1" id="duong8_<?php echo $candidate_noibo['candidateid'] ?>"><?php
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
								             	<select class="textbox2 js-example-basic-single" id="city2_<?php echo $candidate_noibo['candidateid'] ?>" name="city2" style="width: 195px" onchange="comb_tp_qh_2(this.value,0,<?php echo $candidate_noibo['candidateid'] ?>)">
									                 <option value="0" style="width: 195px" >Chọn tỉnh thành</option>
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
								                <select class="seletext js-example-basic-single" name="district2" id="district2_<?php echo $candidate_noibo['candidateid'] ?>" style="width: 100%" required onchange="comb_qh_px_2(this.value,0,<?php echo $candidate_noibo['candidateid'] ?>)">
								                 <option value="0" id="chonqh-ad2_<?php echo $candidate_noibo['candidateid'] ?>" >Chọn quận huyện</option>
								                </select>
								                <div class="h10-w-auto"></div>
								                 <select class="seletext js-example-basic-single" name="ward2" id="phuongxa8_<?php echo $candidate_noibo['candidateid'] ?>" style="width: 100%" required>
								                 	<option value="0" id="chonpx-ad2_<?php echo $candidate_noibo['candidateid'] ?>" >Chọn phường xã</option>
								                </select>
								                <div class="h10-w-auto"></div>
								                 <textarea class="form-control off-resize fontstyle" rows="2" name="street2" id="duong8_<?php echo $candidate_noibo['candidateid'] ?>" 
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
					  	<div class="panel panel-default border-rad0">
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
						                <!-- <th id="th" width="10%"></th> -->
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
							              <!-- <td><i class="fa fa-edit" onclick="editmodal('<?php echo 'click'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal('<?php echo 'click'.$i ?>')"></i></td> -->
							             </tr>
							             <?php $i++;} } 
						               ?>
						            </tbody> 
						          </table>
						          <!-- <a href="#" onclick="showmodel11(<?php echo $candidateid?>,<?php echo $candidate_noibo['candidateid']?>)" <?php echo isset($candidate_noibo)? "" : "disabled";?>><label class="floatright">Thêm quan hệ <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a> -->
						  	  </div>
						    </div>
						    <!-- body ho so noi bo 4-->
					  	</div>
					  	<!-- ket thuc ho so noi bo gia đình-->
					  	<div class="panel panel-default border-rad0">
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
							                 <!-- <th id="th" width="10%"></th> -->
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
							              <!-- <td><i class="fa fa-edit" onclick="editmodal2('<?php echo 'click2'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal2('<?php echo 'click2'.$i ?>')"></i></td> -->
							             </tr>
							             
							             <?php $i++; } } ?>
							            </tbody> 
							          </table>
							          <!-- <a href="#" onclick="showmodel2(<?php echo $candidateid ?>,<?php echo $candidate_noibo['candidateid']?>)" <?php echo isset($candidate_noibo)? "" : "disabled";?>><label class="floatright">Thêm kinh nghiệm <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a> -->
							          <table   class="table table-striped table-bordered" > 
							            <thead> 
							              <tr class="fontstyle"> 
							                <th id="th" width="30%">Họ và tên</th> 
							                <th id="th" width="15%">Chức vụ</th> 
							                <th id="th" width="20%">Công ty</th> 
							                <th id="th" width="25%">Liên hệ</th>
							                <!-- <th id="th" width="10%"></th>				                   -->
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
								               <!-- <td><i class="fa fa-edit" onclick="editmodal3('<?php echo 'click3'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal3('<?php echo 'click3'.$i ?>')"></i></td> -->
								             </tr>
								             <?php $i++; } } ?>
								              
						            	
							            </tbody> 
							          </table>
						           <!-- <a href="#" onclick="showmodel3(<?php echo $candidateid ?>,<?php echo $candidate_noibo['candidateid']?>)" <?php echo isset($candidate_noibo)? "" : "disabled";?>><label class="floatright">Thêm người tham chiếu <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a> -->
						  	  </div>
						    </div>
						    <!-- body ho so noi bo 5-->
					  	</div>
					  	<!-- ket thuc ho so noi bo kinh nghiệm-->
					  	<div class="panel panel-default border-rad0">
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
							                 <!-- <th id="th" width="10%"></th> -->
							                 
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
								              <!-- <td><i class="fa fa-edit" onclick="editmodal4('<?php echo 'click4'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal4('<?php echo 'click4'.$i ?>')"></i></td> -->
								             </tr>
							             <?php $i++; } } }?>
							            </tbody> 
						          </table>
							          <!-- <a href="#" onclick="showmodel4(<?php echo $candidateid ?>,<?php echo $candidate_noibo['candidateid']?>)" <?php echo isset($candidate_noibo)? "" : "disabled";?>><label class="floatright">Thêm học vấn <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a> -->
							          <table   class="table table-striped table-bordered" > 
							            <thead class="fontstyle"> 
							              <tr> 
							                <th id="th" width="20%">Từ - Đến</th> 
							                <th id="th" width="25%">Cơ sở đạo tào</th> 
							                <th id="th" width="13%">TG học</th> 
							                <th id="th" width="17%">Ngành học</th>
							                 <th id="th" width="15%">Bằng cấp</th>
							                 <!-- <th id="th" width="10%"></th> -->
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
							               <!-- <td><i class="fa fa-edit" onclick="editmodal5('<?php echo 'click5'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal4('<?php echo 'click5'.$i ?>')"></i></td> -->
							             </tr>
							             <?php $i++; } } } ?>
							            </tbody> 
							          </table>
						           <!-- <a href="#" onclick="showmodel5(<?php echo $candidateid ?>,<?php echo $candidate_noibo['candidateid']?>)" <?php echo isset($candidate_noibo)? "" : "disabled";?>><label class="floatright">Thêm khoá đào tạo <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a> -->
						  	  </div>
						    </div>
						    <!-- body ho so noi bo 6-->
					  	</div>
					  	<!-- ket thuc ho so noi bo học vấn-->
					  	<div class="panel panel-default border-rad0">
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
							                <!-- <th id="th" ></th> -->
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
								              <!-- <td><i class="fa fa-edit" onclick="editmodal6('<?php echo 'click6'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal6('<?php echo 'click6'.$i ?>')"></i></td> -->
								             </tr>
							             <?php $i++; } } ?>
								            
							            </tbody> 
							          </table>
						           <!-- <a href="#" onclick="showmodel6(<?php echo $candidateid ?>,<?php echo $candidate_noibo['candidateid']?>)" <?php echo isset($candidate_noibo)? "" : "disabled";?>><label class="floatright">Thêm ngoại ngữ <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a> -->
						  	  </div>
						    </div>
						    <!-- body ho so noi bo 7-->
					  	</div>
					  	<!-- ket thuc ho so noi bo ngoại ngữ-->
					  	<div class="panel panel-default border-rad0">
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
							                <!-- <th id="th" width="10%"></th> -->
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
								              <!-- <td><i class="fa fa-edit" onclick="editmodal7('<?php echo 'click7'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal7('<?php echo 'click7'.$i ?>')"></i></td> -->
								             </tr>
							             <?php $i++; } } ?>
							            </tbody> 
							          </table>
						           <!-- <a href="#" onclick="showmodel7(<?php echo $candidateid ?>,<?php echo $candidate_noibo['candidateid']?>)" <?php echo isset($candidate_noibo)? "" : "disabled";?>><label class="floatright">Thêm Tin học <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a> -->
						  	  </div>
						    </div>
						    <!-- body ho so noi bo 8-->
					  	</div>
					  	<!-- ket thuc ho so noi bo tin học-->
					</div>
	       		</div>
	       		 <!-- ket thuc id tab nội bộ -->

	       		 <!-- Hồ sơ con -->
       			<?php $hs = 1; foreach ($candidate_con as $key_con =>$value_con) { ?>
       				<div id="hs_<?php echo $hs ?>" class="tab-pane">
		        		<div class="panel-group bor-mar-b0">
							<div class="panel panel-default border-rad0">
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
							    	<form method="POST" action="<?php echo base_url()?>admin/handling/insertCandidate_internal/<?php echo isset($value_con['candidateid'])? $value_con['candidateid'] : 0 ?>" enctype="multipart/form-data" >
							    		<input type="hidden" name="candidateid" value="<?php echo $candidateid ?>">
								      	<div class="panel-body" style="border: 0px">
								          <div class="width100">
								             <label for="text" class="width20 col-xs-3 label-profile">Họ tên</label>
								             <div class="col-xs-3 width30 padding-lr0">
								             	<input type="text" class="textbox" name="firstname" value="<?php echo isset($value_con['firstname'])? $value_con['firstname'] : "";?>" placeholder="Họ">
								             </div>
								             <label for="text" class="col-xs-3 width20 col-xs-3 label-profile">Email</label>
								             <div class="col-xs-3 width30 padding-lr0">
								             	<input type="text" class="textbox" name="email" value="<?php echo isset($value_con['email'])? $value_con['email'] : "";?>" >
								             </div>   
								         </div>
								         <br><br>
								         <div class="width100">
								             <label for="text" class="width20 col-xs-3 label-profile"></label>
								             <div class="col-xs-3 width30 padding-lr0">
								             	<input type="text" class="textbox" name="lastname" value="<?php echo isset($value_con['lastname'])? $value_con['lastname'] : "";?>" placeholder="Tên">
								             </div>
								             <label for="text" class="col-xs-3 width20 col-xs-3 label-profile">CMND/ ID</label>
								             <div class="col-xs-3 width30 padding-lr0">
								             	<input type="text" class="textbox" name="idcard" maxlength="9" value="<?php echo isset($value_con['idcard'])? $value_con['idcard'] : "";?>">
								             </div>   
								         </div>
								         <br><br>
								         <div class="width100">
								             <label for="text" class="width20 col-xs-3 label-profile">Nguồn hồ sơ</label>
								             <div class="col-xs-3 width30 padding-lr0">
								             	<select class="textbox" name="profilesrc">
								             		<option value="Nội bộ" <?php echo (isset($value_con['profilesrc']) && $value_con['profilesrc'] == "Nội bộ")? "selected" : "";?> >Nội bộ</option>
								             	</select>
								             </div>
								         </div>
								         <br><br>
								         <div class="width100">
								             <label for="text" class="width20 col-xs-3 label-profile">Vị trí phù hợp</label>
								             <div class="col-xs-9 width80 padding-lr0">
								             	<div id="the-basics" style="font-size: 15px">
							                    <input id="typeahead_<?php echo $value_con['candidateid'] ?>" type="text" data-role="" name="tags" value="
							                    <?php for($i=0; $i < count($tags_con[$key_con]) ; $i++)
							                          {
							                            echo $tags_con[$key_con][0]['title'];
							                            if($i < count($tags_con[$key_con])-1)
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
												<?php for($i=0; $i < count($tagstrandom_con[$key_con]) ; $i++)
									                          {
									                            echo $tagstrandom_con[$key_con][$i]['title'];
									                            if($i < count($tagstrandom_con[$key_con])-1)
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
												<input name="snid" type="text" class="textbox width100" value="<?php echo isset($value_con['snid'])? $value_con['snid'] : "";?>">
								             </div>
								         </div>
								         <br><br>
								         <div class="width100">
								            <label for="text" class="width20 col-xs-3 label-profile">Hồ sơ tải lên</label>
								            <!-- <div class="col-sm-2">
						                    	<label id="browsebutton2" class=" btn-default btn-tailen" for="my-file-selector2" style="background-color:white">
							                        <input id="my-file-selector2" name="fileCV1" type="file" accept=".pdf,.doc,.docx,.xlsx" style="display:none;">
							                        <i class="fa fa-download"></i> Chọn CV
							                    </label>
						                    </div> -->
						                    <div class="col-sm-5"> 
						                      <?php if (isset($document_con[$key_con]) && !empty($document_con[$key_con])){
						                        $url = $document_con[$key_con]['url'];
						                        $name = $document_con[$key_con]['filename'];
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
						  	<div class="panel panel-default border-rad0">
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
					    		<form id="form_canhan_<?php echo $value_con['candidateid'] ?>">
							      	<div class="panel-body" style="border: 0px">
							          <div class="width100">
							             <label for="text" class="width20 col-xs-3 label-profile">Ngày sinh/ Giới tính</label>
							             <div class="col-xs-3 width30 padding-lr0">
							             	<input type="text" name="dateofbirth" id="dateofbirth" class="textbox2" value="<?php echo isset($value_con['dateofbirth'])? date("d-m-Y", strtotime($value_con['dateofbirth'])) : "";?>">
							             </div>
							             <div class="col-xs-1 width5 padding-lr0"></div>
							             <label class="radio-inline">
						                    <input type="radio" name="gender" <?php echo (isset($value_con['gender']) && $value_con['gender'] == "M")? "checked" : ""; ?> value="M"> Nam
						                  </label>
						                  <label class="radio-inline">
						                    <input type="radio" name="gender" <?php echo (isset($value_con['gender']) && $value_con['gender'] == "F")? "checked" : ""; ?> value="F"> Nữ
						                  </label>
							         </div>
							         <br>
							         <div class="width100">
							             <label for="text" class="width20 col-xs-3 label-profile">Nơi sinh</label>
							             <div class="col-xs-3 width30 padding-lr0">
							             	<select class="textbox2 js-example-basic-single" name="placeofbirth" style="width: 195px">
								                 <option value="0" style="width: 195px" >Chọn tỉnh thành</option>
								                <?php foreach ($city as $key ) {
								                	if( isset($value_con['placeofbirth']) && $key['name'] == $value_con['placeofbirth'])
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
							             	<input type="text" name="ethnic" class="textbox2" value="<?php echo isset($value_con['ethnic'])? $value_con['ethnic'] : "";  ?>">
							             </div>
							         </div>
							         <br><br>
							         <div class="width100">
							             <label for="text" class="width20 col-xs-3 label-profile">Quốc tịch</label>
							             <div class="col-xs-3 width30 padding-lr0">
							             	<select class="textbox2" name="nationality">
							             		<option value="Việt Nam">Việt Nam</option>
							             		<option value="Khác" <?php echo (isset($value_con['nationality']) && $value_con['nationality'] == "Khác")? "selected" : "";  ?> > Khác</option>
							             	</select>
							             </div>
							         </div>
							         <br><br>
							         <div class="width100">
							             <label for="text" class="width20 col-xs-3 label-profile">Nguyên Quán</label>
							             <div class="col-xs-3 width30 padding-lr0">
							             	<input type="text" name="nativeland" class="textbox2" value="<?php echo isset($value_con['nativeland'])? $value_con['nativeland'] : "";  ?>">
							             </div>
							         </div>
							         <br><br>
							         <div class="width100">
							             <label for="text" class="width20 col-xs-3 label-profile">Tôn Giáo</label>
							             <div class="col-xs-3 width30 padding-lr0">
							             	<input type="text" name="religion" class="textbox2" value="<?php echo isset($value_con['religion'])? $value_con['religion'] : "";  ?>">
							             </div>
							         </div>
							         <br><br>
							         <div class="width100">
							             <label for="text" class="width20 col-xs-3 label-profile">Chiều cao (Cm)</label>
							             <div class="col-xs-3 width30 padding-lr0">
							             	<input type="text" id="height" name="height" class="textbox2" value="<?php echo isset($value_con['height'])? $value_con['height'] : "";  ?>" maxlength="3" >
							             </div>
							         </div>
							         <br><br>
							         <div class="width100">
							             <label for="text" class="width20 col-xs-3 label-profile">Cân nặng (Kg)</label>
							             <div class="col-xs-3 width30 padding-lr0">
							             	<input type="text" id="weight" name="weight" class="textbox2" value="<?php echo isset($value_con['weight'])? $value_con['weight'] : "";  ?>" maxlength="3">
							             </div>
							         </div>
							         <br><br>
							         <div class="width100">
							             <label for="text" class="width20 col-xs-3 label-profile">Ngày cấp/ Nơi cấp</label>
							             <div class="col-xs-3 width30 padding-lr0"> 
							             	<input type="text"  name="dateofissue"  id="dateofissue" class="textbox2" value="<?php echo isset($value_con['dateofissue'])? date("d-m-Y", strtotime($value_con['dateofissue'])) : "";  ?>">
							             </div>
							             <div class="col-xs-1 width5 padding-lr0"></div>
							             <div class="col-xs-3 width30 padding-lr0">
							             	<select class="textbox2 js-example-basic-single" name="placeofissue" style="width: 195px">
								                 <option value="0" style="width: 195px" >Chọn tỉnh thành</option>
								                <?php foreach ($city as $key ) {
								                	if( isset($value_con['placeofissue']) && $key['name'] == $value_con['placeofissue'] )
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
							         <button type="button" class="btn-luu-nav floatright margin-t35" <?php echo isset($value_con)? "" : "disabled";?> onclick="luu_canhan(<?php echo $value_con['candidateid'] ?>)"> Lưu</button>
							  	  	</div>
						  		</form>
						    	</div>
						    	<!-- body ho so noi bo 2-->
						  	</div>
						  	<!-- ket thuc ho so noi bo ca nhan-->
						  	<div class="panel panel-default border-rad0">
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
						    		<form id="form_diachi_<?php echo $value_con['candidateid'] ?>">
									      <div class="panel-body" style="border: 0px">
									          <div class="width100">
									             <label for="text" class="width20 col-xs-3 label-profile">Địa chỉ thường trú</label>
									             <div class="col-xs-3 width30 padding-lr0">
									             	<select class="textbox2" name="country1" >
									             		<option value="Việt Nam">Việt Nam</option>
									             		<option value="Khác" <?php 
									             		$n1 = isset($canaddress_con[$key_con])? count($canaddress_con[$key_con]) : 0;
									             		for ($i = 0; $i < $n1; $i++) {
										             		if( ($canaddress_con[$key_con][$i]['addtype'] == 'PREMANENT') && ($canaddress_con[$key_con][$i]['country'] == 'Khác'))
										             		{
										             			echo "selected";
										             			break;
										             		}
									             		}
									             		?>
									             		>Khác</option>
									             	</select>
									             	<div class="h10-w-auto"></div>
									             	<select class="textbox2 js-example-basic-single" onchange="comb_tp_qh_1(this.value,0,<?php echo $value_con['candidateid'] ?>)" 
									             		name="city1" id="city1_<?php echo $value_con['candidateid'] ?>" style="width: 195px;">
										                 <option value="0" style="width: 195px" >Chọn tỉnh thành</option>
										                <?php foreach ($city as $key ) 
										                {
										                	$fdc = 0;
										                	if(isset($canaddress_con[$key_con]))
										                	{
										                		foreach ($canaddress_con[$key_con] as $value) {
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

									                <select class="seletext js-example-basic-single" name="district1" id="district1_<?php echo $value_con['candidateid'] ?>" style="width: 100%" required onchange="comb_qh_px_1(this.value,0,<?php echo $value_con['candidateid'] ?>)">
									                 	<option value="0" id="chonqh-ad1_<?php echo $value_con['candidateid'] ?>" >Chọn quận huyện</option>
									                </select>
									                <div class="h10-w-auto"></div>
									                 <select class="textbox2 js-example-basic-single" name="ward1" id="phuongxa8-ad_<?php echo $value_con['candidateid'] ?>" style="width: 100%" required>
									                 	<option value="0" id="chonpx-ad1_<?php echo $value_con['candidateid'] ?>" >Chọn phường xã</option>				                
									                </select>
									                <div class="h10-w-auto"></div>

									                 <textarea class="form-control off-resize fontstyle" rows="2" name="street1" id="duong8_<?php echo $value_con['candidateid'] ?>"><?php
									                 	if(isset($canaddress_con[$key_con]))
										                	{
										                		foreach ($canaddress_con[$key_con] as $value) {
										                			if($value['addtype'] == 'PREMANENT')
										                			{
										                				echo trim($value['street']);
										                				break;
										                			}
										                		}
										                	}
									                 ?></textarea>
									                 <div class="h10-w-auto"></div>
									                   <textarea class="form-control off-resize fontstyle" rows="2" name="addressno1" id="toanha88_<?php echo $value_con['candidateid'] ?>"
									                   ><?php 
									                 	if(isset($canaddress_con[$key_con]))
										                	{
										                		foreach ($canaddress_con[$key_con] as $value) {
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
									             		$n1 = isset($canaddress_con[$key_con])? count($canaddress_con[$key_con]) : 0;
									             		for ($i = 0; $i < $n1; $i++) {
										             		if( ($canaddress_con[$key_con][$i]['addtype'] == 'CONTACT') && ($canaddress_con[$key_con][$i]['country'] == 'Khác'))
										             		{
										             			echo "selected";
										             			break;
										             		}
									             		}
									             		?>
									             		>Khác</option>
									             	</select>
									             	<div class="h10-w-auto"></div>
									             	<select class="textbox2 js-example-basic-single" id="city2_<?php echo $value_con['candidateid'] ?>" name="city2" style="width: 195px" onchange="comb_tp_qh_2(this.value,0,<?php echo $value_con['candidateid'] ?>)">
										                 <option value="0" style="width: 195px" >Chọn tỉnh thành</option>
										                <?php foreach ($city as $key ) 
										                {
										                	$fdc = 0;
										                	if(isset($canaddress_con[$key_con]))
										                	{
										                		foreach ($canaddress_con[$key_con] as $value) {
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
									                <select class="seletext js-example-basic-single" name="district2" id="district2_<?php echo $value_con['candidateid'] ?>" style="width: 100%" required onchange="comb_qh_px_2(this.value,0,<?php echo $value_con['candidateid'] ?>)">
									                 <option value="0" id="chonqh-ad2_<?php echo $value_con['candidateid'] ?>" >Chọn quận huyện</option>
									                </select>
									                <div class="h10-w-auto"></div>
									                 <select class="seletext js-example-basic-single" name="ward2" id="phuongxa8_<?php echo $value_con['candidateid'] ?>" style="width: 100%" required>
									                 	<option value="0" id="chonpx-ad2_<?php echo $value_con['candidateid'] ?>" >Chọn phường xã</option>
									                </select>
									                <div class="h10-w-auto"></div>
									                 <textarea class="form-control off-resize fontstyle" rows="2" name="street2" id="duong8_<?php echo $value_con['candidateid'] ?>" 
									                 ><?php 
									                 	if(isset($canaddress_con[$key_con]))
										                	{
										                		foreach ($canaddress_con[$key_con] as $value) {
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
									                   <textarea class="form-control off-resize fontstyle" rows="2" name="addressno2" id="toanha8_<?php echo $value_con['candidateid'] ?>"
									                   ><?php 
									                 	if(isset($canaddress_con[$key_con]))
										                	{
										                		foreach ($canaddress_con[$key_con] as $value) {
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
									                    $pizza  = $value_con['telephone'];
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
									             	<input type="text" name="emergencycontact" class="textbox2 margin-t10" value="<?php echo isset($value_con['emergencycontact'])? $value_con['emergencycontact'] : "";?>" > 
									             </div>
									         </div>
									         <button type="button" class="btn-luu-nav floatright margin-t35" <?php echo isset($value_con)? "" : "disabled";?> onclick="luu_diachi(<?php echo $value_con['candidateid'] ?>)"> Lưu</button>
									  	  </div>
							  		</form>
						    	</div>
						    	<!-- body ho so noi bo 3-->
						  	</div>
						  	<!-- ket thuc ho so noi bo lien he-->
						  	<div class="panel panel-default border-rad0">
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
							                <!-- <th id="th" width="10%"></th> -->
							              </tr> 
							            </thead> 
							            <tbody class="fontstyle text-center"> 
						            	  <?php if($family_con[$key_con] != null) {
								                $i = 0;
								              foreach ($family_con[$key_con] as $key) { ?>
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
								              <!-- <td><i class="fa fa-edit" onclick="editmodal('<?php echo 'click'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal('<?php echo 'click'.$i ?>')"></i></td> -->
								             </tr>
								             <?php $i++;} } 
							               ?>
							            </tbody> 
							          </table>
							          <!-- <a href="#" onclick="showmodel11(<?php echo $candidateid?>,<?php echo $candidate_noibo['candidateid']?>)" <?php echo isset($candidate_noibo)? "" : "disabled";?>><label class="floatright">Thêm quan hệ <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a> -->
							  	  </div>
							    </div>
							    <!-- body ho so noi bo 4-->
						  	</div>
						  	<!-- ket thuc ho so noi bo gia đình-->
						  	<div class="panel panel-default border-rad0">
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
								                 <!-- <th id="th" width="10%"></th> -->
								              </tr> 
								            </thead> 
								            <tbody class="fontstyle text-center"> 
								             <?php if($experience_con[$key_con] != null) { 
								              $i = 0;
								              foreach ($experience_con[$key_con] as $key) { ?>
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
								              <!-- <td><i class="fa fa-edit" onclick="editmodal2('<?php echo 'click2'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal2('<?php echo 'click2'.$i ?>')"></i></td> -->
								             </tr>
								             
								             <?php $i++; } } ?>
								            </tbody> 
								          </table>
								          <!-- <a href="#" onclick="showmodel2(<?php echo $candidateid ?>,<?php echo $candidate_noibo['candidateid']?>)" <?php echo isset($candidate_noibo)? "" : "disabled";?>><label class="floatright">Thêm kinh nghiệm <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a> -->
								          <table   class="table table-striped table-bordered" > 
								            <thead> 
								              <tr class="fontstyle"> 
								                <th id="th" width="30%">Họ và tên</th> 
								                <th id="th" width="15%">Chức vụ</th> 
								                <th id="th" width="20%">Công ty</th> 
								                <th id="th" width="25%">Liên hệ</th>
								                <!-- <th id="th" width="10%"></th>				                   -->
								              </tr> 
								            </thead> 
								            <tbody class="fontstyle text-center"> 
											
							            		 <?php if($reference_con[$key_con] != null) {
									              $i = 0;
									              foreach ($reference_con[$key_con] as $key) { ?>
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
									               <!-- <td><i class="fa fa-edit" onclick="editmodal3('<?php echo 'click3'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal3('<?php echo 'click3'.$i ?>')"></i></td> -->
									             </tr>
									             <?php $i++; } } ?>
									              
							            	
								            </tbody> 
								          </table>
							           <!-- <a href="#" onclick="showmodel3(<?php echo $candidateid ?>,<?php echo $candidate_noibo['candidateid']?>)" <?php echo isset($candidate_noibo)? "" : "disabled";?>><label class="floatright">Thêm người tham chiếu <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a> -->
							  	  </div>
							    </div>
							    <!-- body ho so noi bo 5-->
						  	</div>
						  	<!-- ket thuc ho so noi bo kinh nghiệm-->
						  	<div class="panel panel-default border-rad0">
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
								                 <!-- <th id="th" width="10%"></th> -->
								                 
								              </tr> 
								            </thead> 
								            <tbody class="fontstyle text-center"> 
								              <?php if($knowledge_con[$key_con] != null) {
									                $i = 0;
									              foreach ($knowledge_con[$key_con] as $key) { 
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
									              <!-- <td><i class="fa fa-edit" onclick="editmodal4('<?php echo 'click4'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal4('<?php echo 'click4'.$i ?>')"></i></td> -->
									             </tr>
								             <?php $i++; } } }?>
								            </tbody> 
							          </table>
								          <!-- <a href="#" onclick="showmodel4(<?php echo $candidateid ?>,<?php echo $candidate_noibo['candidateid']?>)" <?php echo isset($candidate_noibo)? "" : "disabled";?>><label class="floatright">Thêm học vấn <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a> -->
								          <table   class="table table-striped table-bordered" > 
								            <thead class="fontstyle"> 
								              <tr> 
								                <th id="th" width="20%">Từ - Đến</th> 
								                <th id="th" width="25%">Cơ sở đạo tào</th> 
								                <th id="th" width="13%">TG học</th> 
								                <th id="th" width="17%">Ngành học</th>
								                 <th id="th" width="15%">Bằng cấp</th>
								                 <!-- <th id="th" width="10%"></th> -->
								              </tr> 
								            </thead>
								            <tbody> 
								          	 <?php if($knowledge_con[$key_con] != null) {
								               $i = 0;
								              foreach ($knowledge_con[$key_con] as $key) { 
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
								               <!-- <td><i class="fa fa-edit" onclick="editmodal5('<?php echo 'click5'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal4('<?php echo 'click5'.$i ?>')"></i></td> -->
								             </tr>
								             <?php $i++; } } } ?>
								            </tbody> 
								          </table>
							           <!-- <a href="#" onclick="showmodel5(<?php echo $candidateid ?>,<?php echo $candidate_noibo['candidateid']?>)" <?php echo isset($candidate_noibo)? "" : "disabled";?>><label class="floatright">Thêm khoá đào tạo <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a> -->
							  	  </div>
							    </div>
							    <!-- body ho so noi bo 6-->
						  	</div>
						  	<!-- ket thuc ho so noi bo học vấn-->
						  	<div class="panel panel-default border-rad0">
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
								                <!-- <th id="th" ></th> -->
								              </tr> 
								            </thead> 
								            <tbody class="fontstyle text-center"> 
								             <?php if($language_con[$key_con] != null) {
									              $i = 0;
									              foreach ($language_con[$key_con] as $key) { 
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
									              <!-- <td><i class="fa fa-edit" onclick="editmodal6('<?php echo 'click6'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal6('<?php echo 'click6'.$i ?>')"></i></td> -->
									             </tr>
								             <?php $i++; } } ?>
									            
								            </tbody> 
								          </table>
							           <!-- <a href="#" onclick="showmodel6(<?php echo $candidateid ?>,<?php echo $candidate_noibo['candidateid']?>)" <?php echo isset($candidate_noibo)? "" : "disabled";?>><label class="floatright">Thêm ngoại ngữ <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a> -->
							  	  </div>
							    </div>
							    <!-- body ho so noi bo 7-->
						  	</div>
						  	<!-- ket thuc ho so noi bo ngoại ngữ-->
						  	<div class="panel panel-default border-rad0">
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
								                <!-- <th id="th" width="10%"></th> -->
								              </tr> 
								            </thead> 
								            <tbody class="fontstyle text-center"> 
								              <?php if($software_con[$key_con] != null) {
									              $i = 0;
									              foreach ($software_[$key_con] as $key) { 
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
									              <!-- <td><i class="fa fa-edit" onclick="editmodal7('<?php echo 'click7'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal7('<?php echo 'click7'.$i ?>')"></i></td> -->
									             </tr>
								             <?php $i++; } } ?>
								            </tbody> 
								          </table>
							           <!-- <a href="#" onclick="showmodel7(<?php echo $candidateid ?>,<?php echo $candidate_noibo['candidateid']?>)" <?php echo isset($candidate_noibo)? "" : "disabled";?>><label class="floatright">Thêm Tin học <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a> -->
							  	  </div>
							    </div>
							    <!-- body ho so noi bo 8-->
						  	</div>
						  	<!-- ket thuc ho so noi bo tin học-->
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
      			}
      			if(isset($row['actiontype'])){
      				if ($row['actiontype'] == 'Trust') {
	      				$fa 		= '<i class="fa fa-check-circle-o color-green size-icon"></i>';
	      				$type 		= ' - '.$row['actionnote'].' - '.$createddate;
	      				$check 		= 1;
	      			}else if ($row['actiontype'] == 'Block'){
	      				$fa 		= '<i class="fa fa-ban color-red size-icon"></i>';
	      				$type 		= ' - '.$row['actionnote'].' - '.$createddate;
	      				$check 		= 1;
	      			}else if ($row['actiontype'] == 'Talent') {
	      				$fa 		= '<i class="fa fa-star color-orange  star-icon1" ></i>';
	      				$type 		= ' - '.$row['actionnote'].' - '.$createddate;
	      				$check 		= 1;
	      			}else if ($row['actiontype'] == 'NotTalent'){
	      				$fa 		= '<i class="fa fa-star color-gray star-icon1"></i>';
	      				$type 		= ' - '.$row['actionnote'].' - '.$createddate;
	      				$check 		= 1;
	      			}
	      			else if ($row['actiontype'] == 'NotTalent'){
	      				$fa 		= '<i class="fa fa-star color-gray star-icon1"></i>';
	      				$type 		= ' - '.$row['actionnote'].' - '.$createddate;
	      				$check 		= 1;
	      			}
	      			else if ($row['actiontype'] == 'Transfer'){
	      				$fa 		= '<i class="fa fa-forward color-forward star-icon1"></i>';
	      				$type 		= ' - '.$row['actionnote'].' - Vị trí: '.$campaignname.' - '.$createddate;
	      				$check 		= 1;
	      			}
	      			else if ($row['actiontype'] == 'Discard'){
	      				$fa 		= '<i class="fa fa-flag color-flag-dis star-icon1"></i>';
	      				$type 		= ' - '.$row['actionnote'].' - Vị trí: '.$campaignname.' - '.$createddate;
	      				$check 		= 1;
	      			}
	      			else if ($row['actiontype'] == 'Apply'){
	      				$fa 		= '<i class="fa fa-sign-in color-sign-in star-icon1"></i>';
	      				$type 		= ' - Nộp hồ sơ vào vị trí: '.$campaignname.', ngày có thể làm việc: '.$row['actionnote'].' - '.$createddate;
	      				$check 		= 1;
	      			}
	      			else if ($row['actiontype'] == 'Recruite'){
	      				$fa 		= '<i class="fa fa-flag color-flag-recruite star-icon1"></i>';
	      				$type 		= ' - '.$row['actionnote'].' - '.$createddate;
	      				$check 		= 1;
	      			}
      			}
      			if (isset($row['asmtid'])) {
      				$fa 			= '<a onclick="loadAssessment('.$row['asmtid'].')"><i class="fa fa-file-text-o star-icon1"></i></a>';
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
					$fa 			= '<a onclick="loadAppointment('.$row['interviewid'].')"><i class="fa fa-calendar star-icon1"></i></a>';
					$type 			= ' Tạo lịch hẹn phỏng vấn - '.$createddate;
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
	      					$interviewer 	.= '<div class="col-xs-3"><img src="'.base_url().'public/image/'.$key['filename'].'"  class="img_profile">'.$key['operatorname'].$icon_h.$status.'</div>';
	      				}
	      				$interviewer 		.= '</div>';
      				}

      				if ($row['status'] == "W") {
	      				$comment 	.= '<br><div class="color-sign-in">Trạng thái: Chưa thực hiện phỏng vấn </div>';
	      				$check 		= 1;
      				}
      				else if ($row['status'] == "C") {
	      				$comment 	.= '<br><div class="color-sign-in">Trạng thái: Đã phỏng vấn </div>';
	      				$check 		= 1;
      				}
      				else if ($row['status'] == "D") {
      					$icon 		= '<div class="pull-right"><i class="fa fa-trash-o fa-lg color-trash"></i></div>';
	      				$comment 	.= '<br><div class="color-sign-in">Trạng thái: Hủy phỏng vấn - bởi '.$row['nameupdate'].' - '.date_format(date_create($row['lastupdate']),"d/m/Y - H:i").'</div>';
	      				$check 		= 1;
      				}
      			}
      			else if (isset($row['offerid'])) {
      				$fa 			= '<a onclick="loadOffer('.$row['offerid'].')"><i class="fa fa-file-text-o star-icon1"></i></a>';
      				$type 			= ' Tạo đề nghị - '.$createddate;
      				if ($row['status'] == 'C' && $row['optionid'] == '1') {
	      				$comment 	= '<div class="color-sign-in">Trạng thái: Phản hồi - Đồng ý</div>';
	      				$check 		= 1;
      				}
      				else if ($row['status'] == 'C' && $row['optionid'] == '2') {
	      				$comment 	= '<div class="color-trash">Trạng thái: Phản hồi - Không đồng ý - Lý do: '.$row['anstext'].'</div>';
	      				$check 		= 1;
      				}
      				else if ($row['status'] == 'D') {
	      				$icon 		= '<div class="pull-right"><i class="fa fa-trash-o fa-lg color-trash"></i></div>';
	      				$comment 	= '<div class="color-sign-in">Trạng thái: Hủy đề nghị - bởi '.$row['nameupdate'].' - '.date_format(date_create($row['lastupdate']),"d/m/Y - H:i").'</div>';
	      				$check 		= 1;
      				}
      				else if ($row['status'] == 'P') {
      					$comment 	= '<div class="color-sign-in">Lưu tạm</div>';
	      				$check 		= 1;
      				}
      				else {
	      				$comment 	= '<div class="color-sign-in">Trạng thái: Chờ phản hồi</div>';
	      				$check 		= 1;
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
	      				<img src="<?php echo base_url().'public/image/'.$image?>"  class="img_profile" >
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
      		<input type="hidden" name="idcan" value="<?php echo $candidateid ?>" >
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
		     <label class="font-weight"><input type="checkbox"  class="mar-t-l10" name="sharecmt" value="Y"> Không chia sẻ nội dung này</label>
		     <button type="submit" class="luu-cmt">Lưu</button>
      </div>
        </form>
    </div>
  </div>
</div>
	<!-- ket thuc 3 tab -->
</div>
<?php endif ?>
<div class="hide" id="sstag">
	<?php echo json_encode($ss_tags) ?>
</div>
<?php if ($id != ''): ?>
	
<?php endif ?>
<input type="hidden" id="getqh1" value="<?php if ($id != ''){
	    		 for($i = 0; $i < count($canaddress_noibo); $i++)
	    		 {
	    		 	if($canaddress_noibo[$i]['addtype'] == "PREMANENT")
	    		 	{
	    		 		echo $canaddress_noibo[$i]['district'];
	    		 	}
	    		 }}else{ echo '';}
?>">
<input type="hidden" id="getpx1" value="<?php if ($id != ''){
	    		 for($i = 0; $i < count($canaddress_noibo); $i++)
	    		 {
	    		 	if($canaddress_noibo[$i]['addtype'] == "PREMANENT")
	    		 	{
	    		 		echo $canaddress_noibo[$i]['ward'];
	    		 	}
	    		 }}else{ echo '';}
?>">
<input type="hidden" id="addressno1" value="<?php if ($id != ''){
	    		 for($i = 0; $i < count($canaddress_noibo); $i++)
	    		 {
	    		 	if($canaddress_noibo[$i]['addtype'] == "PREMANENT")
	    		 	{
	    		 		echo $canaddress_noibo[$i]['addressno'];
	    		 	}
	    		 }}else{ echo '';}
?>">
<input type="hidden" id="getqh2" value="<?php if ($id != ''){
	    		 for($i = 0; $i < count($canaddress_noibo); $i++)
	    		 {
	    		 	if($canaddress_noibo[$i]['addtype'] == "CONTACT")
	    		 	{
	    		 		echo $canaddress_noibo[$i]['district'];
	    		 	}
	    		 }}else{ echo '';}
?>">
<input type="hidden" id="getpx2" value="<?php if ($id != ''){
	    		 for($i = 0; $i < count($canaddress_noibo); $i++)
	    		 {
	    		 	if($canaddress_noibo[$i]['addtype'] == "CONTACT")
	    		 	{
	    		 		echo $canaddress_noibo[$i]['ward'];
	    		 	}
	    		 }}else{ echo '';}
?>">
<input type="hidden" id="addressno2" value="<?php if ($id != ''){
	    		 for($i = 0; $i < count($canaddress_noibo); $i++)
	    		 {
	    		 	if($canaddress_noibo[$i]['addtype'] == "PREMANENT")
	    		 	{
	    		 		echo $canaddress_noibo[$i]['addressno'];
	    		 	}
	    		 }}else{ echo '';}
?>">

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

	    	var states = JSON.parse($('#sstag').text());

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
	  
	function luu_canhan($candidateid)
	{	
		// var candidate_id = $('#candidate_noibo').val();
		$.ajax({
			url: '<?php echo base_url()?>admin/handling/update_canhan/'+candidateid,
			type: 'POST',
			dataType: 'JSON',
			data: $('#form_canhan').serialize(),
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
	function luu_diachi($candidateid)
	{	
		// var candidate_id = $('#candidate_noibo').val();
		$.ajax({
			url: '<?php echo base_url()?>admin/handling/update_diachi/'+candidateid,
			type: 'POST',
			dataType: 'JSON',
			data: $('#form_diachi').serialize(),
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
	function transfer(type, checkmail, mailtemp)
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
				var name = $('#candidatename').val();
				var avatar = $('#candidateimage').val();
				var email = $('#candidateemail').val();
				row += '<div class="col-xs-4 candidate_chuyen"><div><img src="<?php echo base_url() ?>public/image/'+avatar+'" class="img_chuyen"></div><label>'+name+'</label></div><input type="hidden" name="id[]" value="'+form[i].value+'">';
				to_mail += email ;
			}
			if (type == 1) {
				if (checkmail == 'Y') {
					parent.parent.$('#check_mail1').removeClass('hide');
					parent.parent.$('#inputcheckmail_1').prop('checked',true);
				}
				parent.parent.$('#mailid1').val(mailtemp).change();
				parent.parent.$('#email_to_tran').val(to_mail);
				parent.parent.$('#email_cc_tran').val($('#manageround').val());
				parent.parent.$('#campaignid_tran').val(campaignid);
				parent.parent.$('#roundid_old').val(roundid);
				parent.parent.$('#body_chuyen').append(row);
				parent.parent.$('.select_chuyen').append(option);
				parent.$('.select_chuyen').find('option [value="'+new_round+'"]').attr('selected', true);
				parent.parent.$('#transferHS').modal('show');
			}else{
				if (checkmail == 'Y') {
					parent.parent.$('#check_mail2').removeClass('hide');
					parent.parent.$('#inputcheckmail_2').prop('checked',true);
				}
				parent.parent.$('#mailid2').val(mailtemp).change();
				parent.parent.$('#email_to_dis').val(to_mail);
				parent.parent.$('#email_cc_dis').val($('#manageround').val());
				parent.parent.$('#campaignid_dis').val(campaignid);
				parent.parent.$('#body_loai').append(row);
				parent.parent.$('#roundid_dis').val(roundid);
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

	function createMChoice(assessment, mailtemp) {
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
            	email += $('#candidateemail').val();
            }else{
            	email += ', '+$('#candidateemail').val();
            }
            parent.parent.$('#count_candidate').val(k);
            k = Number(k)+1;
		}
		parent.parent.$('#mailid3').val(mailtemp).change();
		parent.parent.$('#profile_taophieu').prepend(row);
		parent.parent.$('#email_to_tn_1').val(email);
		parent.parent.$('#campaignid_tn').val(campaignid);
		parent.parent.$('#roundid_tn').val(roundid);
		parent.parent.initializeSelect2(parent.parent.$(".select2"));
		parent.parent.$('#createMultiChoice').modal('show');
	}

	function loadAssessment(asmtid) {
		parent.parent.location.href ='<?php echo base_url() ?>admin/multiplechoice/pageAssessment/'+asmtid+'/0';
	}
	function createAppointment(scorecard, mailtemp1, mailtemp2) {
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
            row += '<div class="col-xs-8"><select class="js-example-basic-2 select2" name="profile_'+k+'[]" required="" style="width: 100%"><option value="W">Phỏng vấn trực tiếp</option><option value="C">Phỏng vấn gián tiếp</option></select></div></div>';
            row += '<div class="rowedit2"><div class="col-xs-3 body-blac4">Thời gian:</div><div class="col-xs-3"><input class="kttext width_100 timepicker" type="text" name="profile_'+k+'[]" value="09:00"></div><div class="col-xs-3"><input class="kttext width_100 timepicker" type="text" name="profile_'+k+'[]" value="10:00"></div></div>';          
            row += '<div class="rowedit2"><div class="col-xs-3 body-blac4">Địa điểm:</div><div class="col-xs-8"><input class="kttext width_100" type="text" name="profile_'+k+'[]" value="2W Ung Văn Khiêm, P.25, Quận Bình Thạnh, Tp. HCM"></div></div>';             
            row += '<div class="rowedit3"><div class="col-xs-3 body-blac4">Nội dung:</div><div class="col-xs-8"><textarea name="profile_'+k+'[]" class="textarea_profile" rows="3" required=""></textarea></div></div>';              
            row += '<div class="rowedit3"><div class="col-xs-3 body-blac4">Người phỏng vấn:</div><div class="col-xs-8"><div class="col-xs-6 manage_pv" id="col_add_pt_'+k+'"><div ><img src="<?php echo base_url() ?>public/image/unknow.jpg"><a href="javascript:void(0)" class="add_pt" onclick="insertPV('+k+')"><span> Thêm người phỏng vấn</span></a></div></div></div><input type="hidden" id="managePV_'+k+'" name="profile_'+k+'[]"></div>';          
                  
                    
          	if (email == '') {
            	email += $('#candidateemail').val();
            }else{
            	email += ', '+$('#candidateemail').val();
            }
            parent.parent.$('#count_candidate_pv').val(k);
            k = Number(k)+1;
		}
		parent.parent.$('#mailid4').val(mailtemp1).change();
		parent.parent.$('#mailid5').val(mailtemp2).change();
		parent.parent.$('#profile_taopv').append(row);
		parent.parent.$('#email_bcc_pv1').val(email);
		parent.parent.$('#campaignid_pv').val(campaignid);
		parent.parent.$('#roundid_pv').val(roundid);
		parent.parent.initializeSelect2(parent.parent.$(".select2"));

		parent.parent.$('#createAppointment').modal('show');
	}
	function loadAppointment(interviewid) {
		parent.parent.location.href ='<?php echo base_url() ?>admin/multiplechoice/makingAppointment/'+interviewid;
	}


	function createInterviewer() {
		parent.parent.$('#createInterviewer').modal('show');
	}
	function createOffer(mailtemp) {
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
            	email += $('#candidateemail').val();
            }else{
            	email += ', '+$('#candidateemail').val();
            }
            parent.parent.$('#count_candidate_offer').val(k);
            k = Number(k)+1;
		}
		parent.parent.loadCategoryOffer();
		parent.parent.$('#mailid6').val(mailtemp).change();
		parent.parent.$('#profile_offer').prepend(row);
		parent.parent.$('#mail_to_offer').val(email);
		parent.parent.$('#campaignid_offer').val(campaignid);
		parent.parent.$('#roundid_offer').val(roundid);
		parent.parent.$(".select2").select2();
		parent.parent.$('#createOffer').modal('show');
	}
	function loadOffer(offerid) {
		parent.parent.location.href ='<?php echo base_url() ?>admin/offer/offer/'+offerid+'/10';
	}

	function sendMail() {
		var form 			= $('#form_checkone').serializeArray();
		var campaignid 		= form[0].value;
		var roundid 		= form[1].value;
		var candidateid_mail 	= form[2].value;
		var mail 			= $('#candidateemail').val();
		parent.parent.$('#email_to').val(mail);
		parent.parent.$('#campaignid_mail').val(campaignid);
		parent.parent.$('#roundid_mail').val(roundid);
		parent.parent.$('#candidateid_mail').val(candidateid_mail);
		parent.parent.$('#modalMail').modal('show');
	}
	function showMailView(mailid) {
      $.ajax({
        url: '<?php echo base_url() ?>admin/email/get_mail_byId',
        type: 'POST',
        dataType: 'json',
        data: {mailid: mailid},
      })
      .done(function(data) {
        parent.parent.$('#idMailFrom_1').text(data[0]['operatorname']);
        parent.parent.$('#idMailTo_1').text(data[0]['toemail']);
        parent.parent.$('#idMailCc_1').text(data[0]['cc']);
        parent.parent.$('#idMailDate_1').text(data[0]['date']);
        parent.parent.$('#idMailSubject_1').text(data[0]['emailsubject']);
        parent.parent.$('#idMailBody_1').empty().append(data[0]['emailbody']);
        parent.parent.$('#modalMailView1').modal('show');
      })
      .fail(function() {
        console.log("error");
      });
      
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

		
</script>
<style type="text/css">
	.tt-input
	{
		vertical-align: unset !important;
	}
</style>