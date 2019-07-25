
<div style="background-color: white">
	<div class="row rowedit">
		<div class="col-md-6 col-xs-6">
			<label class="margin-t5 margin-b0" >
				<?php if (!isset($candidate['unsubcribe'])){ ?>
					<i class="fa fa-bell icon-detail"></i>
				<?php }else{ ?>
					<i class="fa fa-bell<?php echo ($candidate['unsubcribe'] == 'Y')? "-slash" : "";?> icon-detail"></i>
				<?php } ?>
				<i class="fa fa-user icon-detail2"></i>
				<i class="fa fa-clock-o icon-detail3"></i>
			</label>
		</div>
		<div class="col-md-6 col-xs-6 hov-btn-ad">

		</div>
	</div>
	<div class="margin-t4 dash-horizontal"  ></div>
	<?php if(!isset($candidate['imagelink']) || $candidate['imagelink'] == null) {?>
   		<img src="<?php echo base_url()?>public/image/avatar.jpg" alt="" id="anh1" class="image-avatar-ad" width="130px" height="130px">
   	<?php }
   	else { ?>
   		<img src="<?php echo base_url()?>public/image/<?php echo $candidate['imagelink'] ?>" alt="" id="anh1" class="image-avatar-ad" width="130px" height="130px">
   	<?php } ?>
   	<div class="image-edit margin-bot-21" id="anh2" onclick="edit_anh()"><i class="fa fa-camera icon-camera" ></i></div>
	<div class="row rowcontent">
		<div class="col-md-6 col-xs-6">
			<label class="can-name"><?php echo isset($candidate['name'])? $candidate['name'] : 'New Profile'; ?></label>
			<label class="cv-old"><?php echo isset($candidate['position'])? $candidate['position'] : ''; ?></label>
			<label class="tag-lb">
			<?php
			if(isset($tags))
			{
				$aa = array();
					foreach ($tags as $key) {
						array_push($aa, $key['title']);
					}

					echo implode(", ", $aa);
			}
				?></label>
			<span class="highR">
			<?php
				if(isset($tagstrandom))
				{
					$aaa = array();
					// var_dump($tagstrandom);exit;
						foreach ($tagstrandom as $key) {
							array_push($aaa, "#".$key['title']);
						}

						echo implode(", ", $aaa);
				}
			?>
			</span>
		</div>
		<div class="col-md-6 col-xs-6" style="text-align: right; padding-right: 30px">
			<label class="diem">0 điểm</label>
			<label class="mau3">0 chiến dịch</label>
			<br><br>
			<span class="webportal"><?php echo isset($candidate['profilesrc'])? $candidate['profilesrc'] : 'Web Admin'; ?></span>
		</div>
	</div>
	<div style="height: 20px"></div>
	<!-- ket thuc phan thong tin chung -->
	<div class="panel-group" id="accordion">
		<div class="panel panel-default border-rad0" >
			<div class="panel-heading b-blue rad-pad0">
				<ul class="nav nav-tabs ul-nav">
					<li class="<?php echo ($tabActive == '1')?'active' : '' ?>"><a data-toggle="tab" href="#total" class="nemu-info-pf">Tổng quát</a></li>
					<li class="<?php echo ($tabActive == '2')?'active' : '' ?>"><a data-toggle="tab" href="#personal" class="nemu-info-pf" >Cá nhân</a></li>
					<li class="<?php echo ($tabActive == '3')?'active' : '' ?>"><a data-toggle="tab" href="#contact" class="nemu-info-pf" >Liên hệ</a></li>
					<li class="<?php echo ($tabActive == '4')?'active' : '' ?>"><a data-toggle="tab" href="#family" class="nemu-info-pf" >Gia đình</a></li>
					<li class="<?php echo ($tabActive == '5')?'active' : '' ?>"><a data-toggle="tab" href="#experience" class="nemu-info-pf" >Kinh nghiệm</a></li>
					<li class="<?php echo ($tabActive == '6')?'active' : '' ?>"><a data-toggle="tab" href="#knowledge" class="nemu-info-pf" >Học vấn</a></li>
					<li class="<?php echo ($tabActive == '7')?'active' : '' ?>"><a data-toggle="tab" href="#language" class="nemu-info-pf" >Ngoại ngữ</a></li>
					<li class="<?php echo ($tabActive == '8')?'active' : '' ?>"><a data-toggle="tab" href="#software" class="nemu-info-pf" >Tin học</a></li>
				</ul>
			</div>
			<!-- ket thuc phan heading cua tab 1 thong tin ung vien -->
			<div id="collapse1" class="panel-collapse collapse in">
				<div class="panel-body tab-collapse">
					<div class="tab-content">
						<div id="total" class="tab-pane <?php echo ($tabActive == '1')?'in active' : '' ?> ">
							<div class="panel-group bor-mar-b0">
								<div class="panel panel-default border-rad0">
									<!-- heading ho so noi bo -->
									<div id="collapsetotal2" class="panel-collapse collapse in">
										<form id="form_newProfile" method="post" action="<?php echo base_url() ?>admin/handling/insertCandidate" enctype="multipart/form-data">
                                            <div class="alert alert-danger hide" id="err-newUser" style="text-align: center;"></div>
											<input type="hidden" name="candidateid" value="<?php echo isset($candidate['candidateid'])? $candidate['candidateid'] : 0; ?>">
											<div class="panel-body" style="border: 0px">
												<div class="width100">
													<label for="text" class="width20 col-xs-3 label-profile">Họ tên</label>
													<div class="col-xs-3 width30 padding-lr0">
														<input type="text" id="firstname" name="firstname" class="textbox" required placeholder="Họ" value="<?php echo isset($can_detail['firstname'])? $can_detail['firstname'] : ''; ?>">
													</div>
													<label for="text" class="col-xs-3 width20 col-xs-3 label-profile">Email</label>
													<div class="col-xs-3 width30 padding-lr0">
														<input type="email" id="email" name="email" class="textbox" value="<?php echo isset($can_detail['email'])? $can_detail['email'] : ''; ?>">
													</div>
												</div>
												<br><br>
												<div class="width100">
													<label for="text" class="width20 col-xs-3 label-profile"></label>
													<div class="col-xs-3 width30 padding-lr0">
														<input type="text" id="lastname" name="lastname" class="textbox" required placeholder="Tên" value="<?php echo isset($can_detail['lastname'])? $can_detail['lastname'] : ''; ?>">
													</div>
													<label for="text" class="col-xs-3 width20 col-xs-3 label-profile">CMND/ ID</label>
													<div class="col-xs-3 width30 padding-lr0">
														<input type="text" class="so textbox" id="idcard" name="idcard" class="textbox" maxlength="" value="<?php echo isset($can_detail['idcard'])? $can_detail['idcard'] : ''; ?>">
													</div>
												</div>
												<br><br>
												<div class="width100">
													<label for="text" class="width20 col-xs-3 label-profile">Số điện thoại</label>
													<?php
													if (isset($can_detail['telephone'])) {
														$pizza  = $can_detail['telephone'];
									                    $pieces = explode(",", trim($pizza,','));
									                    $p1 = isset($pieces[0])? $pieces[0] : "" ;
									                    $p2 = isset($pieces[1])? $pieces[1] : "" ;
													}else{ $p1 = $p2 = '';}
									              	?>
													<div class="col-xs-3 width30 padding-lr0">
														<input type="text" name="phone1" class="textbox so" maxlength="10" id="phone1" placeholder="Số thứ 1" value="<?php echo $p1 ?>">
													</div>
													<label for="text" class="col-xs-3 width20 col-xs-3 label-profile"></label>
													<div class="col-xs-3 width30 padding-lr0">
														<input type="text" name="phone2" class="textbox so" maxlength="10" id="phone2" placeholder="Số thứ 2" value="<?php echo $p2 ?>">
													</div>
												</div>

												<br><br>
												<div class="width100">
													<label for="text" class="width20 col-xs-3 label-profile">Nguồn hồ sơ</label>
													<div class="col-xs-3 width30 padding-lr0">
														<select class="textbox" name="profilesrc" required="" id="profilesrc_id">
															<!-- <option value="">Chọn nguồn hồ sơ...</option> -->
															<option value="Nội bộ" selected="">Nội bộ</option>
														</select>
													</div>
												</div>
												<?php if (isset($can_detail['profilesrc'])): ?>
													<script type="text/javascript">
														$('#profilesrc_id option[value="<?php echo $can_detail['profilesrc'] ?>"]').prop('selected', true);
													</script>
												<?php endif ?>

												<br><br>
												<div class="width100">
													<label for="text" class="width20 col-xs-3 label-profile">Vị trí phù hợp</label>
													<div class="col-xs-9 width80 padding-lr0">
														<div id="the-basics" style="font-size: 15px">
									                    <input id="typeahead" type="text" data-role="tagsinput" value="
									                    <?php
									                    if(isset($tags)){
									                    for($i=0; $i < count($tags) ; $i++)
									                          {
									                            echo $tags[$i]['title'];
									                            if($i < count($tags)-1)
									                            {
									                              echo ',';
									                            }
									                          }
									                    }
									                    ?>
									                    ">
									                  </div>
									                  <input type="hidden" name="tags" id="tags" value="<?php
									                  if(isset($tags)){
									                    for($i=0; $i < count($tags) ; $i++)
									                          {
									                            echo $tags[$i]['title'];
									                            if($i < count($tags)-1)
									                            {
									                              echo ',';
									                            }
									                          }
									                    }
									                    ?>
									                  ">
													</div>
												</div>
												<br><br>
												<div class="width100">
													<label for="text" class="width20 col-xs-3 label-profile">Tag</label>
													<div class="col-xs-9 width80 padding-lr0">
														<input name="tagsrandom" type="text" data-role="tagsinput" value="
															<?php
															if(isset($tagstrandom)){
																for($i=0; $i < count($tagstrandom) ; $i++)
											                          {
											                            echo $tagstrandom[$i]['title'];
											                            if($i < count($tagstrandom)-1)
											                            {
											                              echo ',';
											                            }
											                          }
										                      }
										                    ?>">
													</div>
												</div>
												<br><br>
												<div class="width100">
													<label for="text" class="width20 col-xs-3 label-profile ">Địa chỉ MXH</label>
										            <div class="col-xs-9 width80 padding-lr0">
														<input name="snid" type="text" class="textbox width100" value="<?php echo isset($can_detail['snid'])? $can_detail['snid'] : "";?>">
										            </div>
										        </div>
									            <br><br>
												<div class="width100">
													<label for="text" class="width20 col-xs-3 label-profile">Hồ sơ tải lên</label>
													<div class="width80 col-xs-9 padding-lr0">
									                    <div class="col-sm-2">
									                    	<label id="browsebutton1" class="btn btn-default input-group-addon btn-tailen" for="my-file-selector1" style="background-color:white">
										                        <input id="my-file-selector1" name="fileCV" type="file" accept=".pdf,.doc,.docx,.xlsx" style="display:none;">
										                        <i class="fa fa-download"></i> Tải lên
										                    </label>
									                    </div>
									                    <div class="col-sm-10">
									                      <?php if (isset($document) && !empty($document)){
									                        $url = $document['url'];
									                        $name = $document['filename'];
									                      }else{$url =''; $name = '';}?>
									                        <a id="label1"  class="fontstyle"  href="<?php echo $url; ?>"><?php echo $name; ?></a>
									                    </div>
													</div>
												</div>
												<button type="button" id="btn_newProfile" class="btn-luu-nav floatright"><i></i> Lưu</button>
											</div>
										</form>
									</div>
									<!-- body ho so noi bo -->
								</div>
									<!-- ket thuc ho so noi bo -->
							</div>
						</div>
							<!-- ket thuc id tab tong quat -->
						<div id="personal" class="tab-pane <?php echo ($tabActive == '2')?'in active' : '' ?> ">
							<div class="panel-group bor-mar-b0">
								<!--   ket thuc ho so ca nhan 2-->
								<div class="panel panel-default border-rad0">
										<!-- heading ho so noi bo 2-->
									<div id="collapsetotal22" class="panel-collapse collapse in">
										<form method="post" action="<?php echo base_url() ?>admin/handling/insertCandidate_detail" enctype="multipart/form-data" id="form_can_1">
											<div class="panel-body" style="border: 0px">
												<div class="width100">
													<label for="text" class="width20 col-xs-3 label-profile">Ngày sinh/ Giới tính</label>
													<div class="col-xs-3 width30 padding-lr0">
														<input type="text" name="dateofbirth" id="ngaysinh123" class="textbox2" value="<?php echo isset($can_detail['dateofbirth'])? date_format(date_create($can_detail['dateofbirth']),"d/m/Y") : '' ?>">
													</div>
													<div class="col-xs-1 width5 padding-lr0"></div>
													<?php if (isset($can_detail['gender'])){
														if($can_detail['gender'] == 'M'){ $gender_M = 'checked'; $gender_F ='';}
														else { $gender_F = 'checked'; $gender_M ='';};
													}else{ $gender_M  = $gender_F = '';}
													?>
													<label class="radio-inline">
														<input type="radio" name="gender" checked="true" value="M" <?php echo $gender_M ?>> Nam
													</label>
													<label class="radio-inline">
														<input type="radio" name="gender" value="F" <?php echo $gender_F ?>> Nữ
													</label>
												</div>
												<br>
												<div class="width100">
													<label for="text" class="width20 col-xs-3 label-profile">Nơi sinh</label>
													<div class="col-xs-3 width30 padding-lr0">
														<select class="textbox2 js-example-basic-single" name="placeofbirth" style="width: 195px">
															<option value="0" style="width: 195px" >Chọn tỉnh thành</option>
															<?php foreach ($city as $key ) {	?>
																<option value="<?php echo $key['name'] ?>" <?php if(isset($can_detail['placeofbirth']) && $key['name'] == $can_detail['placeofbirth']) echo "selected";?> ><?php echo $key['name'] ?></option>
															<?php } ?>
														</select>
													</div>
												</div>
												<br><br>
												<div class="width100">
													<label for="text" class="width20 col-xs-3 label-profile">Dân tộc</label>
													<div class="col-xs-3 width30 padding-lr0">
														<input type="text" name="ethnic" class="textbox2" value="<?php echo isset($can_detail['ethnic'])? $can_detail['ethnic'] : '' ?>">
													</div>
												</div>
												<br><br>
												<div class="width100">
													<label for="text" class="width20 col-xs-3 label-profile">Quốc tịch</label>
													<div class="col-xs-3 width30 padding-lr0">
														<select class="textbox2" name="nationality">
															<option value="Việt Nam" selected="">Việt Nam</option>
															<option value="Khác">Khác</option>
														</select>
													</div>
												</div>
												<br><br>
                                                <div class="width100">
                                                    <label for="text" class="width20 col-xs-3 label-profile">Tình trạng hôn nhân</label>
                                                    <div class="col-xs-3 width30 padding-lr0">
                                                        <select class="textbox2 js-example-basic-single" name="maritalstatus">
                                                            <option value="S" <?php echo (isset($can_detail['maritalstatus']) && $can_detail['maritalstatus'] == 'S')? 'selected' : '' ?> >Độc thân</option>
                                                            <option value="M" <?php echo (isset($can_detail['maritalstatus']) && $can_detail['maritalstatus'] == 'M')? 'selected' : '' ?>>Đã kết hôn</option>
                                                            <option value="W" <?php echo (isset($can_detail['maritalstatus']) && $can_detail['maritalstatus'] == 'W')? 'selected' : '' ?>>Góa</option>
                                                            <option value="D" <?php echo (isset($can_detail['maritalstatus']) && $can_detail['maritalstatus'] == 'D')? 'selected' : '' ?>>Ly dị</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br><br>
												<div class="width100">
													<label for="text" class="width20 col-xs-3 label-profile">Chiều cao (Cm)</label>
													<div class="col-xs-3 width30 padding-lr0">
														<input type="text" name="height" class="textbox2 so" maxlength="3" value="<?php echo isset($can_detail['height'])? $can_detail['height'] : '' ?>">
													</div>
												</div>
												<br><br>
												<div class="width100">
													<label for="text" class="width20 col-xs-3 label-profile">Cân nặng (Kg)</label>
													<div class="col-xs-3 width30 padding-lr0">
														<input type="text" name="weight" maxlength="3" class="textbox2 so" value="<?php echo isset($can_detail['weight'])? $can_detail['weight'] : '' ?>">
													</div>
												</div>
												<br><br>
												<div class="width100">
													<label for="text" class="width20 col-xs-3 label-profile">Ngày cấp/ Nơi cấp</label>
													<div class="col-xs-3 width30 padding-lr0">
														<input type="text" name="dateofissue" id="ngaycap1" class="textbox2" value="<?php echo isset($can_detail['dateofissue'])? date_format(date_create($can_detail['dateofissue']),"d/m/Y") : '' ?>">
													</div>
													<div class="col-xs-1 width5 padding-lr0"></div>
													<div class="col-xs-3 width30 padding-lr0">
														<select class="textbox2 js-example-basic-single" name="placeofissue" style="width: 195px">
															<option value="0" style="width: 195px" >Chọn tỉnh thành</option>
															<?php foreach ($city as $key ) {
																?>
																<option value="<?php echo $key['name'] ?>" <?php if(isset($can_detail['placeofissue']) && $key['name'] == $can_detail['placeofissue']) echo "selected";?> ><?php echo $key['name'] ?></option>
															<?php } ?>
														</select>
													</div>
												</div>
												<input type="hidden" name="candidateid" value="<?php echo isset($candidate['candidateid'])? $candidate['candidateid'] : '' ?>" id="candidateid_1">
												<button type="button" class="btn-luu-nav floatright margin-t35" id="save_can_1"> Lưu</button>
											</div>
										</form>
									</div>
										<!-- body ho so noi bo 2-->
								</div>
									<!-- ket thuc ho so noi bo 2-->
							</div>
						</div>
							<!-- ket thuc id tab ca nhan -->
						<div id="contact" class="tab-pane <?php echo ($tabActive == '3')?'in active' : '' ?> ">
							<div class="panel-group bor-mar-b0">
								<!--   ket thuc ho so ca nhan 3-->
								<div class="panel panel-default border-rad0">
								<!-- heading ho so noi bo 3-->
									<div id="collapsetotal32" class="panel-collapse collapse in">
										<input type="hidden" id="countryPREMANENT" value="<?php echo isset($address[1]['country'])? $address[1]['country'] : 'Việt Nam' ?>">
										<input type="hidden" id="countryCONTACT" value="<?php echo isset($address[0]['country'])? $address[0]['country'] : 'Việt Nam' ?>">
										<form method="post" action="<?php echo base_url() ?>admin/handling/insetAddress" enctype="multipart/form-data" id="form_can_2">
											<div class="panel-body" style="border: 0px">
												<div class="width100">
													<label for="text" class="width20 col-xs-3 label-profile">Địa chỉ thường trú</label>
													<div class="col-xs-3 width30 padding-lr0">
														<select class="textbox2"  name="country[]" id="new_country1">
															<option value="Việt Nam">Việt Nam</option>
															<option value="Khác">Khác</option>
														</select>
														<div class="h10-w-auto"></div>
														<select class="textbox2 js-example-basic-single" onchange="comb_admin(this.value,<?php echo isset($address[1]['district'])? $address[1]['district'] : '0' ?>)" name="city[]" style="width: 195px;">
															<option value="0" style="width: 195px" >Chọn tỉnh thành</option>
															<?php foreach ($city as $key ) {?>
																<option value="<?php echo $key['id_city'] ?>" <?php if(isset($address[1]['city']) && $key['id_city'] == $address[1]['city']) echo "selected";?> ><?php echo $key['name'] ?></option>
															<?php } ?>
														</select>
														<div class="h10-w-auto"></div>

														<select class="seletext js-example-basic-single" name="district[]" id="quanhuyen8-ad" style="width: 100%" onchange="comb_admin_qhpx(this.value,<?php echo isset($address[1]['ward'])? $address[1]['ward'] : '0' ?>)">
															<option value="0" id="chonqh-ad1" >Chọn quận huyện</option>
														</select>

														<div class="h10-w-auto"></div>

														<select class="textbox2 js-example-basic-single" name="ward[]" id="phuongxa8-ad" style="width: 100%" >
															<option value="0" id="chonpx-ad1" >Chọn phường xã</option>
														</select>
														<div class="h10-w-auto"></div>

														<textarea class="form-control off-resize fontstyle" rows="2" name="street[]" id="duong8" placeholder="Tên đường" ><?php echo isset($address[1]['street'])? $address[1]['street'] : '' ?></textarea>
														<div class="h10-w-auto"></div>
														<textarea class="form-control off-resize fontstyle" rows="2" name="addressno[]" id="toanha8" placeholder="Số nhà/ Toà nhà"><?php echo isset($address[1]['addressno'])? $address[1]['addressno'] : '' ?></textarea>
													</div>

													<label for="text" class="width20 col-xs-3 label-profile" style="padding-left: 15px">Địa chỉ liên hệ</label>
													<div class="col-xs-3 width30 padding-lr0">
														<select class="textbox2" name="country[]" id="new_country1">
															<option value="Việt Nam">Việt Nam</option>
															<option value="Khác">Khác</option>
														</select>
														<div class="h10-w-auto"></div>
														<select class="textbox2 js-example-basic-single" name="city[]" style="width: 195px" onchange="comb_admin2(this.value,<?php echo isset($address[0]['district'])? $address[0]['district'] :'0' ?>)">
															<option value="0" style="width: 195px" >Chọn tỉnh thành</option>
															<?php foreach ($city as $key ) {
																?>
																<option value="<?php echo $key['id_city'] ?>" <?php if(isset($address[0]['city']) && $key['id_city'] == $address[0]['city']) echo "selected";?> ><?php echo $key['name'] ?></option>
															<?php } ?>
														</select>
														<div class="h10-w-auto"></div>
														<select class="seletext js-example-basic-single" name="district[]" id="quanhuyen-ad2" style="width: 100%"  onchange="comb_admin_qhpx2(this.value,<?php echo isset($address[0]['ward'])? $address[0]['ward'] : '0' ?>)">
															<option value="0" id="chonqh-ad2" >Chọn quận huyện</option>
														</select>
														<div class="h10-w-auto"></div>
														<select class="seletext js-example-basic-single" name="ward[]" id="phuongxa8" style="width: 100%" >
															<option value="0" id="chonpx-ad2" >Chọn phường xã</option>
														</select>
														<div class="h10-w-auto"></div>
														<textarea class="form-control off-resize fontstyle" rows="2" name="street[]" id="duong8"  placeholder="Tên đường"><?php echo isset($address[0]['street'])? $address[0]['street'] : '' ?></textarea>
														<div class="h10-w-auto"></div>
														<textarea class="form-control off-resize fontstyle" rows="2" name="addressno[]" id="toanha8" placeholder="Số nhà/ Toà nhà"><?php echo isset($address[0]['addressno'])? $address[0]['addressno'] : '' ?></textarea>
													</div>
												</div>




												<div class="width100" style="float: left;">
													<label for="text" class="width20 col-xs-3 label-profile margin-t10" >Liên lạc khẩn cấp</label>
													<div class="col-xs-3 width30 padding-lr0">
														<input type="text" name="emergencycontact" class="textbox2 margin-t10 so" maxlength="10" value="<?php echo isset($can_detail['emergencycontact'])? $can_detail['emergencycontact'] : '' ?>" >
													</div>
												</div>
												<input type="hidden" name="candidateid" value="<?php echo isset($candidate['candidateid'])? $candidate['candidateid'] : '' ?>" id="candidateid_2">
												<input type="hidden" name="add[]" value="<?php echo isset($address[1]['addtype'])? $address[1]['addtype'] : '' ?>">
												<input type="hidden" name="add[]" value="<?php echo isset($address[0]['addtype'])? $address[0]['addtype'] : '' ?>">
												<button type="button" class="btn-luu-nav floatright margin-t35"id="save_can_2"> Lưu</button>
											</div>
										</form>
									</div>
										<!-- body ho so noi bo 3-->
								</div>
									<!-- ket thuc ho so noi bo 3-->
							</div>
						</div>
							<!-- ket thuc id tab lien he -->
						<div id="family" class="tab-pane <?php echo ($tabActive == '4')?'in active' : '' ?> ">
							<div class="panel-group bor-mar-b0">
								<div class="panel panel-default border-rad0">
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
													<?php if(isset($family) && $family != null) {
										                $i = 0;
										              foreach ($family as $key) { ?>

										             <tr>
										              <form id="<?php echo 'click'.$i ?>">
										                <input type="hidden" name="hoten" value="<?php echo $key['name']?>">
										                <input type="hidden" name="namsinh" value="<?php echo $key['yob']?>">
										                <input type="hidden" name="quanhe" value="<?php echo $key['type']?>">
										                <input type="hidden" name="nghenghiep" value="<?php echo $key['career']?>">
										                <input type="hidden" name="recordid" value="<?php echo $key['recordid']?>">
										              </form>
										              <td><?php echo $key['name']?></td>
										              <td><?php echo ($key['yob'] !== 0) ? $key['yob'] : ""; ?></td>
										              <td><?php echo ($key['type'] !== '0') ? $key['type'] : ""; ?></td>
										              <td><?php echo $key['career']?></td>
										              <td><i class="fa fa-edit" onclick="editmodal('<?php echo 'click'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal('<?php echo 'click'.$i ?>')"></i></td>
										             </tr>
										             <?php $i++;} } ?>
												</tbody>
											</table>
											<a href="javascript:void(0)" onclick="showmodel11()"><label class="floatright">Thêm quan hệ <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a>
										</div>
									</div>
											<!-- body ho so noi bo 4-->
								</div>
										<!-- ket thuc ho so noi bo 4-->
							</div>
						</div>
											<!-- ket thuc id tab gia dinh -->
						<div id="experience" class="tab-pane <?php echo ($tabActive == '5')?'in active' : '' ?> ">
							<div class="panel-group bor-mar-b0">
								<div class="panel panel-default border-rad0">
									<div id="collapsetotal52" class="panel-collapse collapse in">
										<div class="panel-body" style="border: 0px">
											<label>Quá trình công tác</label>
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
													<?php if( isset($experience) && $experience != null) {
										              $i = 0;
										              foreach ($experience as $key) { ?>
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
										              </form>
										              <td><?php echo date("d-m-Y", strtotime($key['datefrom'])).' - '.date("d-m-Y", strtotime($key['dateto']))?></td>
										              <td><?php echo $key['company']." / ".$key['address']." / ".$key['phone']?></td>
										              <td><?php echo $key['position']?></td>
										              <td><?php echo $key['responsibility']?></td>
										              <td><?php echo $key['quitreason']?></td>
										              <td><i class="fa fa-edit" onclick="editmodal2('<?php echo 'click2'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal2('<?php echo 'click2'.$i ?>')"></i></td>
										             </tr>
										             </tr>
										             <?php $i++; } } ?>
												</tbody>
											</table>
											<a href="javascript:void(0)" onclick="showmodel2()"><label class="floatright">Thêm kinh nghiệm <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a>
											<br>
											<label>Người phụ trách tham khảo</label>
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
													<?php if(isset($reference) && $reference != null) {
										              $i = 0;
										              foreach ($reference as $key) { ?>
										             <tr>
										               <form id="<?php echo 'click3'.$i ?>">
										                <input type="hidden" name="hoten" value="<?php echo $key['name']?>">
										                <input type="hidden" name="vitri" value="<?php echo $key['position']?>">
										                <input type="hidden" name="cty" value="<?php echo $key['company']?>">
										                <input type="hidden" name="lienhe" value="<?php echo $key['contactno']?>">
										                <input type="hidden" name="recordid" value="<?php echo $key['recordid']?>">
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
											<a href="javascript:void(0)" onclick="showmodel3()"><label class="floatright">Thêm người tham chiếu <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a>
										</div>
									</div>
									<!-- body ho so noi bo 5-->
								</div>
									<!-- ket thuc ho so noi bo 5-->
							</div>
						</div>
						<!-- ket thuc id tab kinh nghiệm -->
						<div id="knowledge" class="tab-pane <?php echo ($tabActive == '6')?'in active' : '' ?> ">
							<div class="panel-group bor-mar-b0">
								<!--   ket thuc ho so ca nhan 6-->
								<div class="panel panel-default border-rad0">
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
													<?php if(isset($knowledge) && $knowledge != null) {
									                $i = 0;
									              foreach ($knowledge as $key) {
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
									              </form>
									              <td><?php echo date("d-m-Y", strtotime($key['datefrom'])).' - '.date("d-m-Y", strtotime($key['dateto']))?></td>
									              <td><?php echo $key['trainingcenter']?></td>
									              <td><?php echo $key['trainingplace']?></td>
									              <td><?php echo $key['trainingcourse']?></td>
									              <td><?php echo $key['certificate']; if($key['highestcer'] == "Y") echo "(*)"; ?></td>
									              <td><i class="fa fa-edit" onclick="editmodal4('<?php echo 'click4'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal4('<?php echo 'click4'.$i ?>')"></i></td>
									             </tr>
									             <?php $i++; } } }?>
												</tbody>
											</table>
											<a href="javascript:void(0)" onclick="showmodel4()"><label class="floatright">Thêm học vấn <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a>
											<!-- <label class="floatright">Thêm học vấn <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label> -->
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
													<?php if(isset($knowledge) && $knowledge != null) {
										               $i = 0;
										              foreach ($knowledge as $key) {
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
										              </form>
										              <td><?php echo date("d-m-Y", strtotime($key['datefrom'])).' - '.date("d-m-Y", strtotime($key['dateto']))?></td>
										              <td><?php echo $key['trainingcenter']?></td>
										              <td><?php echo $key['traintime'].' '.$key['traintimetype']?></td>
										              <td><?php echo $key['trainingcourse']?></td>
										              <td><?php echo $key['certificate']?></td>
										               <td><i class="fa fa-edit" onclick="editmodal5('<?php echo 'click5'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal4('<?php echo 'click5'.$i ?>')"></i></td>
										             </tr>
										             <?php $i++; } } } ?>
												</tbody>
											</table>
											<a href="javascript:void(0)" onclick="showmodel5()"><label class="floatright">Thêm khoá đào tạo <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a>

										</div>
									</div>
									<!-- body ho so noi bo 6-->
								</div>
								<!-- ket thuc ho so noi bo 6-->
							</div>
						</div>
						<!-- ket thuc id tab hoc van-->
						<div id="language" class="tab-pane <?php echo ($tabActive == '7')?'in active' : '' ?> ">
							<div class="panel-group bor-mar-b0">
								<div class="panel panel-default border-rad0">
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
													<?php if(isset($language) && $language != null) {
										              $i = 0;
										              foreach ($language as $key) {
										                ?>
										             <tr>
										              <form id="<?php echo 'click6'.$i ?>">
										                <input type="hidden" name="ngonngu" value="<?php echo $key['language']?>">
										                <input type="hidden" name="rate1" value="<?php echo $key['rate1']?>">
										                <input type="hidden" name="rate2" value="<?php echo $key['rate2']?>">
										                <input type="hidden" name="rate3" value="<?php echo $key['rate3']?>">
										                <input type="hidden" name="rate4" value="<?php echo $key['rate4']?>">

										                <input type="hidden" name="recordid" value="<?php echo $key['recordid']?>">
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
											<a href="javascript:void(0)" onclick="showmodel6()"><label class="floatright">Thêm ngoại ngữ <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a>

										</div>
									</div>
									<!-- body ho so noi bo 7-->
								</div>
								<!-- ket thuc ho so noi bo 7-->
							</div>
						</div>
							<!-- ket thuc id tab ngoai ngu-->
						<div id="software" class="tab-pane <?php echo ($tabActive == '8')?'in active' : '' ?> ">
							<div class="panel-group bor-mar-b0">
								<div class="panel panel-default border-rad0">
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
													<?php if(isset($software) && $software != null) {
										              $i = 0;
										              foreach ($software as $key) {
										                ?>
										             <tr>
										              <form id="<?php echo 'click7'.$i ?>">
										                <input type="hidden" name="pm" value="<?php echo $key['software']?>">
										                <input type="hidden" name="rate1" value="<?php echo $key['rate1']?>">

										                <input type="hidden" name="recordid" value="<?php echo $key['recordid']?>">
										              </form>
										              <td><?php echo $key['software']?></td>
										              <td><?php echo ($key['rate1'] !== "0")? $key['rate1'] : ""; ?></td>
										              <td><i class="fa fa-edit" onclick="editmodal7('<?php echo 'click7'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal7('<?php echo 'click7'.$i ?>')"></i></td>
										             </tr>
										             <?php $i++; } } ?>
												</tbody>
											</table>
											<a href="javascript:void(0)" onclick="showmodel7()"><label class="floatright">Thêm tin học <i class="fa fa-plus-circle color-blue" aria-hidden="true"></i></label></a>

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
	</div>
</div>
								<!-- ket thuc tat ca tab 1 thong tin ung vien -->
<div class="modal fade" id="edit_anh_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  	<div class="modal-dialog width-50" role="document">
    	<div class="modal-content">
      		<form action="<?php echo base_url()?>admin/handling/upload_image" method="POST" enctype="multipart/form-data" id="form_image">
      			<div class="modal-header">
        			<h4 class="modal-title" id="myModalLabel">Cập nhật ảnh đại diện</h4>
      			</div>
      			<div class="modal-body">
         			<strong class="title-anhdaidien">Đổi ảnh đại diện</strong>
      				<br>
       				<div class="input-group btn-load1">
				        <label id="browsebutton" class="btn btn-default input-group-addon btn-load2" for="my-file-selector" style="background-color:white">
				            <input id="my-file-selector" name="image" type="file" style="display:none;">
				            Browse...
				        </label>
				        <input id="label" type="text" class="form-control btn-load3" readonly="">
				    </div>
				    <input type="hidden" name="candidateid" value="<?php echo isset($candidate['candidateid'])? $candidate['candidateid'] : '' ?>" id="canid">
      			</div>
      			<div class="modal-footer">
        			<button type="button" class="btn btnlong btn88"  data-dismiss="modal">Close</button>
        			<input type="button" class="btn btnlong btn99 b-blue" id="luu_1" value="Lưu">
      			</div>
    		</form>
   		</div>
  	</div>
</div>

<div class="modal fade" id="myModal11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-50" role="document">
    <div class="modal-content" style="padding: 20px;">
      <form action="<?php echo base_url()?>admin/handling/insert_relationship" method="post" id="form_can_3">
      <h3 class="title-modal margin-bot-15">Thêm người thân</h3>

          <input type="hidden" name="checkup" id="checkup" value="0">
            <div class="form-group row padding-left-right-20 margin-bot-15" >
            <label for="staticEmail"  class="col-sm-4 col-form-label fontstyle">Họ và tên</label>
            <div class="col-sm-8">

              <input class="fontstyle width100" type="text"  placeholder="" name="hoten" id="hoten11">
            </div>
          </div>
           <div class="form-group row padding-left-right-20 margin-bot-15" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Năm sinh</label>
            <div class="col-sm-8">

              <select class="form-control height31" style="font-size: 14px" name="namsinh" id="namsinh11">
                 <option value="0">Chọn năm sinh</option>
                <?php
                   $date = getdate();
                 for($i = $date['year']; $i > 1940; $i--) { ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
                </select>
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-15" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Quan hệ</label>
            <div class="col-sm-8">

             <select class="form-control height31" style="font-size: 14px" name="quanhe" id="quanhe11">
                  <option value="0">Chọn quan hệ</option>
                  <option value="Cha">Cha</option>
                  <option value="Mẹ">Mẹ</option>
                  <option value="Anh">Anh</option>
                  <option value="Chị">Chị</option>
                  <option value="Em">Em</option>
                  <option value="Cháu">Cháu</option>
                  <option value="Vợ">Vợ</option>
                  <option value="Chồng">Chồng</option>
                  <option value="Con">Con</option>
                  <option value="Ông">Ông</option>
                  <option value="Bà">Bà</option>
                  <option value="Khác">Khác</option>
                </select>
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-15" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Nghề nghiệp</label>
            <div class="col-sm-8">

              <input class="width100 fontstyle" type="text"  placeholder="" name="nghenghiep" id="nn11">

            </div>
          </div>
          	<input type="hidden" name="candidateid" value="<?php echo isset($candidate['candidateid'])? $candidate['candidateid'] : '' ?>" id="candidateid_3">
           	<button type="button" class="btn them-modal b-blue" id="them11"> Thêm</button>
         </form>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-50" role="document">
    <div class="modal-content" style="padding: 20px;">
      <form action="<?php echo base_url()?>admin/handling/insert_experience" method="post" id="form_can_4">
      <h3 class="title-modal margin-bot-15">Thêm quá trình công tác</h3>
            <input type="hidden" name="checkup" id="checkup2" value="0">
          <div class="form-group row padding-left-right-20 margin-bot-2" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Từ đến</label>
            <div class="col-sm-8">
              <div class="form-group row">
                <div class="col-sm-6">
                <input class="form-control fontstyle datepicker" type="text" id="tuden5" placeholder="" name="tu"></div>
                <div class="col-sm-6">
                <input class="form-control fontstyle datepicker" type="text" id="tuden6" placeholder="" name="den"></div>
              </div>
            </div>
          </div>
            <div class="form-group row padding-left-right-20 margin-bot-12" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Tên công ty</label>
            <div class="col-sm-8">

              <input class="form-control fontstyle" type="text"  placeholder="" name="tencty" id="cty2">
            </div>
          </div>
           <div class="form-group row padding-left-right-20 margin-bot-15" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Địa chỉ</label>
            <div class="col-sm-8">

              <textarea class="form-control off-resize fontstyle" rows="2" name="diachi" id="dc2"></textarea>
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-15" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Số điện thoại</label>
            <div class="col-sm-8">

              <input class="form-control fontstyle" type="text"  maxlength="12" name="sdt" id="sdt2" >
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-12" >
            <label for="staticEmail" class="col-sm-4 padding-right2 fontstyle">Chức vụ khi nghỉ</label>
            <div class="col-sm-8">

              <input class="form-control fontstyle" type="text"  placeholder="" name="chucvukhinghi" id="chucvu2">
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-12" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle"> Nhiệm vụ/ Trách nhiệm </label>
            <div class="col-sm-8">
                <textarea class="form-control off-resize fontstyle" rows="3" name="nhiemvu" id="nhiemvu2" ></textarea>
              <!-- <input class="form-control fontstyle" type="text"  placeholder="" name="nhiemvu" id="nhiemvu2"> -->

            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-12" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Lý do nghỉ</label>
            <div class="col-sm-8">

              <input class="form-control fontstyle" type="text"  placeholder="" name="lydonghi" id="lydonghi2">

            </div>
          </div>
          <input type="hidden" name="candidateid" value="<?php echo isset($candidate['candidateid'])? $candidate['candidateid'] : '' ?>" id="candidateid_4">
           <button type="button" class="btn them-modal b-blue" id="them12"> Thêm</button>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-50" role="document">
    <div class="modal-content" style="padding: 20px;">
      <form action="<?php echo base_url()?>admin/handling/insert_reference" method="post" id="form_can_5">
      <h3 class="title-modal margin-bot-15">Thêm người tham khảo</h3>

          <input type="hidden" name="checkup" id="checkup3" value="0">
            <div class="form-group row padding-left-right-20" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Họ và tên</label>
            <div class="col-sm-8">
              <input class="form-control fontstyle" type="text"  placeholder="" name="hoten" id="hoten3">
            </div>
          </div>
           <div class="form-group row padding-left-right-20" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Chức vụ</label>
            <div class="col-sm-8">

              <input class="form-control fontstyle" type="text"  placeholder="" name="chucvu" id="chucvu3">
            </div>
          </div>
          <div class="form-group row padding-left-right-20" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Công ty</label>
            <div class="col-sm-8">

              <input class="form-control fontstyle" type="text"  placeholder="" name="congty" id="congty3">
            </div>
          </div>
          <div class="form-group row padding-left-right-20" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Liên hệ</label>
            <div class="col-sm-8">
              <input class="form-control fontstyle" type="text"  placeholder="" name="lienhe" id="lienhe3">
            </div>
          </div>
          <input type="hidden" name="candidateid" value="<?php echo isset($candidate['candidateid'])? $candidate['candidateid'] : '' ?>" id="candidateid_5">
           <button type="button" class="btn them-modal b-blue" id="them3"> Thêm</button>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-50" role="document">
    <div class="modal-content" style="padding: 20px;">
      <form action="<?php echo base_url()?>admin/handling/insert_knowledge" method="post" id="form_can_6">
      <h3 class="title-modal margin-bot-15">Thêm trình độ học vấn</h3>
           <input type="hidden" name="checkup" id="checkup4" value="0">
          <div class="form-group row padding-left-right-20 margin-bot-2" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Từ đến</label>
            <div class="col-sm-8">
              <div class="form-group row">
                <div class="col-sm-6">
                <input class="form-control fontstyle datepicker" type="text" id="tuden1" placeholder="" name="tu" ></div>
                <div class="col-sm-6">
                <input class="form-control fontstyle datepicker" type="text" id="tuden2" placeholder="" name="den"></div>
              </div>
            </div>
          </div>
            <div class="form-group row padding-left-right-20" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Tên trường</label>
            <div class="col-sm-6">

              <input class="form-control fontstyle" type="text"  placeholder="" name="tentruong" id="truong4">
            </div>
          </div>
           <div class="form-group row padding-left-right-20" >
            <label for="staticEmail fontstyle" class="col-sm-4 col-form-label">Nơi học</label>
            <div class="col-sm-6">

              <input class="form-control fontstyle" type="text"  placeholder="" name="noihoc" id="noihoc4">
            </div>
          </div>
          <div class="form-group row padding-left-right-20" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Ngành học</label>
            <div class="col-sm-6">

              <input class="form-control fontstyle" type="text"  placeholder="" name="nganhhoc" id="nganhhoc4">
            </div>
          </div>
          <div class="form-group row padding-left-right-20" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Bằng cấp/ trình độ</label>
            <div class="col-sm-6">

              <input class="form-control fontstyle" type="text"  placeholder="" name="trinhdo" id="trinhdo4">
              <label class="radio-inline fontstyle">
                <input type="radio"  name="caonhat" id="caonhat4" value="Y"> Bằng cao nhất của bạn (*)
              </label>
            </div>
          </div>
          <input type="hidden" name="candidateid" value="<?php echo isset($candidate['candidateid'])? $candidate['candidateid'] : '' ?>" id="candidateid_6">
           <button type="button" class="btn them-modal" id="them4"> Thêm</button>
         </form>

    </div>
  </div>
</div>

<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-50" role="document">
    <div class="modal-content" style="padding: 20px;">
      <form action="<?php echo base_url()?>admin/handling/insert_knowledge_v2" method="post" id="form_can_7">
      <h3 class="title-modal margin-bot-15">Thêm khóa huấn luyện/ đào tạo</h3>
           <input type="hidden" name="checkup" id="checkup5" value="0">
          <div class="form-group row padding-left-right-20 margin-bot-2" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Từ đến</label>
            <div class="col-sm-8">
              <div class="form-group row">
                <div class="col-sm-6">
                <input class="form-control fontstyle datepicker" type="text" id="tuden3" placeholder="" name="tu" ></div>
                <div class="col-sm-6">
                <input class="form-control fontstyle datepicker" type="text" id="tuden4" placeholder="" name="den" ></div>
              </div>
            </div>
          </div>
            <div class="form-group row padding-left-right-20 margin-bot-2">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Tên cơ sở đào tạo</label>
            <div class="col-sm-6">

              <input class="form-control fontstyle" type="text"  placeholder="" name="cs_daotao" id="truong5" >
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-2">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Thời gian học</label>
            <div class="col-sm-8">
              <div class="form-group row">
                <div class="col-sm-6">
                <input class="form-control fontstyle so" type="text"  placeholder="" name="tghoc" id="tghoc5" value="0"></div>
                <div class="col-sm-6">
                <select class="form-control height3 fontstyle" name="donvi" id="donvi5">
                  <!-- <option value="0" disabled>Chọn...</option> -->
                  <option value="Năm" selected>Năm</option>
                  <option value="Tháng">Tháng</option>
                  <option value="Ngày">Ngày</option>

                </select></div>
              </div>
            </div>
          </div>
          <div class="form-group row padding-left-right-20">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Ngành học</label>
            <div class="col-sm-6">

              <input class="form-control fontstyle" type="text"  placeholder="" name="nganhhoc" id="nganhhoc5">
            </div>
          </div>
          <div class="form-group row padding-left-right-20">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Bằng cấp/ chứng chỉ</label>
            <div class="col-sm-6">

              <input class="form-control fontstyle  " type="text"  placeholder="" name="bangcap" id="bangcap5">
            </div>
          </div>
          <input type="hidden" name="candidateid" value="<?php echo isset($candidate['candidateid'])? $candidate['candidateid'] : '' ?>" id="candidateid_7">
           <button type="button" class="btn them-modal" id="them5"> Thêm</button>

      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-50" role="document">
    <div class="modal-content" style="padding: 20px;">
      <form action="<?php echo base_url()?>admin/handling/insert_language" method="post" id="form_can_8">
      <h3 class="title-modal margin-bot-15">Thêm ngoại ngữ</h3>
           <input type="hidden" name="checkup" id="checkup6" value="0">
          <div class="form-group row padding-left-right-20 margin-bot-12">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Ngoại ngữ</label>
            <div class="col-sm-8">

              <input class="form-control fontstyle" type="text"  placeholder="" name="tentruong" id="truong6">
            </div>
          </div>
            <div class="form-group row padding-left-right-20 margin-bot-12">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Nghe</label>
            <div class="col-sm-6">

              <select class="form-control height31 fontstyle" name="nghe" id="nghe6">
                  <option value="0">Chọn...</option>
                  <option value="Giỏi">Giỏi</option>
                  <option value="Khá">Khá</option>
                  <option value="Trung Bình">Trung Bình</option>
                  <option value="Yếu">Yếu</option>
                </select>
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-12">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Nói</label>
            <div class="col-sm-6">

              <select class="form-control height31 fontstyle" name="noi" id="noi6">
                  <option value="0">Chọn...</option>
                  <option value="Giỏi">Giỏi</option>
                  <option value="Khá">Khá</option>
                  <option value="Trung Bình">Trung Bình</option>
                  <option value="Yếu">Yếu</option>
                </select>
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-12">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Đọc</label>
            <div class="col-sm-6">

              <select class="form-control height31 fontstyle" name="doc" id="doc6">
                 <option value="0">Chọn...</option>
                  <option value="Giỏi">Giỏi</option>
                  <option value="Khá">Khá</option>
                  <option value="Trung Bình">Trung Bình</option>
                  <option value="Yếu">Yếu</option>
                </select>
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-12">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Viết</label>
            <div class="col-sm-6">

              <select class="form-control height31 fontstyle" name="viet" id="viet6">
                  <option value="0">Chọn...</option>
                  <option value="Giỏi">Giỏi</option>
                  <option value="Khá">Khá</option>
                  <option value="Trung Bình">Trung Bình</option>
                  <option value="Yếu">Yếu</option>
                </select>
            </div>
          </div>
          	<input type="hidden" name="candidateid" value="<?php echo isset($candidate['candidateid'])? $candidate['candidateid'] : '' ?>" id="candidateid_8">
           <button type="button" class="btn them-modal" id="them6" > Thêm</button>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-50"  role="document">
    <div class="modal-content" style="padding: 20px;">
      <form action="<?php echo base_url()?>admin/handling/insert_software" method="post" id="form_can_9">
      <h3 class="title-modal margin-bot-15">Thêm trình độ tin học</h3>
           <input type="hidden" name="checkup" id="checkup7" value="0">
          <div class="form-group row padding-left-right-20">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Kiến thức/ Phần mềm</label>
            <div class="col-sm-8">

              <textarea class="form-control off-resize fontstyle" rows="2" name="phanmem" id="pm7"></textarea>
            </div>
          </div>
            <div class="form-group row padding-left-right-20">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Trình độ</label>
            <div class="col-sm-6">

              <select class="form-control height31 fontstyle" name="trinhdo" id="trinhdo7">
               <option value="0">Chọn...</option>
                  <option value="Giỏi">Giỏi</option>
                  <option value="Khá">Khá</option>
                  <option value="Trung Bình">Trung Bình</option>
                  <option value="Yếu">Yếu</option>
                </select>
            </div>
          </div>
          	<input type="hidden" name="candidateid" value="<?php echo isset($candidate['candidateid'])? $candidate['candidateid'] : '' ?>" id="candidateid_9">
           <button type="button" class="btn them-modal" id="them7"> Thêm</button>
      </form>
    </div>
  </div>
</div>

<!-- modal delete -->
<div class="modal fade" id="myModaldel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-50" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url()?>admin/handling/del_relationship" method="POST" enctype="multipart/form-data" id="form_can_8">
      <input type="hidden" name="checkup" id="checkup1d" value="0">
      <input type="hidden" name="candidateid" value="<?php echo isset($candidate['candidateid'])? $candidate['candidateid'] : '' ?>" >
      <strong class="title-anhdaidien fontbig" style="margin-left: 25%;">Thông báo</strong>
      <br>
          <label for="staticEmail"  style="margin-left: 40px">Bạn có muốn xóa thông tin này không?</label>
       <br>
       <div class="form-group row"><div class="col-sm-6">
           <button type="submit" class="btn them-modal" > Xóa</button></div><div class="col-sm-6">
            <button type="button" class="btn them-modal" data-dismiss="modal" style="margin-left: 5px"> Hủy</button></div>
          </div>
    </form>
    </div>
  </div>
</div>
<div class="modal fade" id="myModaldel2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-50" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url()?>admin/handling/del_experience" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="checkup" id="checkup2d" value="0">
      <input type="hidden" name="candidateid" value="<?php echo isset($candidate['candidateid'])? $candidate['candidateid'] : '' ?>" >
         <strong class="title-anhdaidien fontbig" style="margin-left: 25%;">Thông báo</strong>
      <br>
          <label for="staticEmail"  style="margin-left: 40px">Bạn có muốn xóa thông tin này không?</label>
       <br>
       <div class="form-group row"><div class="col-sm-6">
           <button type="submit" class="btn them-modal" > Xóa</button></div><div class="col-sm-6">
            <button type="button" class="btn them-modal" data-dismiss="modal" style="margin-left: 5px"> Hủy</button></div>
          </div>
    </form>
    </div>
  </div>
</div>
<div class="modal fade" id="myModaldel3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-50" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url()?>admin/handling/del_reference" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="checkup" id="checkup3d" value="0">
      <input type="hidden" name="candidateid" value="<?php echo isset($candidate['candidateid'])? $candidate['candidateid'] : '' ?>" >
         <strong class="title-anhdaidien fontbig" style="margin-left: 25%;">Thông báo</strong>
      <br>
          <label for="staticEmail"  style="margin-left: 40px">Bạn có muốn xóa thông tin này không?</label>
       <br>
       <div class="form-group row"><div class="col-sm-6">
           <button type="submit" class="btn them-modal" > Xóa</button></div><div class="col-sm-6">
            <button type="button" class="btn them-modal" data-dismiss="modal" style="margin-left: 5px"> Hủy</button></div>
          </div>
    </form>
    </div>
  </div>
</div>
<div class="modal fade" id="myModaldel4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-50" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url()?>admin/handling/del_knowledge" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="checkup" id="checkup4d" value="0">
      <input type="hidden" name="candidateid" value="<?php echo isset($candidate['candidateid'])? $candidate['candidateid'] : '' ?>" >
         <strong class="title-anhdaidien fontbig" style="margin-left: 25%;">Thông báo</strong>
      <br>
          <label for="staticEmail"  style="margin-left: 40px">Bạn có muốn xóa thông tin này không?</label>
       <br>
       <div class="form-group row"><div class="col-sm-6">
           <button type="submit" class="btn them-modal" > Xóa</button></div><div class="col-sm-6">
            <button type="button" class="btn them-modal" data-dismiss="modal" style="margin-left: 5px"> Hủy</button></div>
          </div>
    </form>
    </div>
  </div>
</div>
<div class="modal fade" id="myModaldel6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-50" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url()?>admin/handling/del_language" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="checkup" id="checkup6d" value="0">
      <input type="hidden" name="candidateid" value="<?php echo isset($candidate['candidateid'])? $candidate['candidateid'] : '' ?>" >
         <strong class="title-anhdaidien fontbig" style="margin-left: 25%;">Thông báo</strong>
      <br>
          <label for="staticEmail"  style="margin-left: 40px">Bạn có muốn xóa thông tin này không?</label>
       <br>
       <div class="form-group row"><div class="col-sm-6">
           <button type="submit" class="btn them-modal" > Xóa</button></div><div class="col-sm-6">
            <button type="button" class="btn them-modal" data-dismiss="modal" style="margin-left: 5px"> Hủy</button></div>
          </div>
    </form>
    </div>
  </div>
</div>
<div class="modal fade" id="myModaldel7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-50" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url()?>admin/handling/del_software" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="checkup" id="checkup7d" value="0">
      <input type="hidden" name="candidateid" value="<?php echo isset($candidate['candidateid'])? $candidate['candidateid'] : '' ?>" >
         <strong class="title-anhdaidien fontbig" style="margin-left: 25%;">Thông báo</strong>
      <br>
          <label for="staticEmail"  style="margin-left: 40px">Bạn có muốn xóa thông tin này không?</label>
       <br>
       <div class="form-group row"><div class="col-sm-6">
           <button type="submit" class="btn them-modal" > Xóa</button></div><div class="col-sm-6">
            <button type="button" class="btn them-modal" data-dismiss="modal" style="margin-left: 5px"> Hủy</button></div>
          </div>
    </form>
    </div>
  </div>
</div>
<div class="hide" id="sstag">
	<?php echo json_encode($ss_tags) ?>
</div>

<style type="text/css">
	.margin-bot-21 {
		margin-bottom: 0px !important;
	}
	.icon-camera {
		padding:10px;
	}
	.image-edit {
		height: 40px;
		width: 130px;
		background-color: black;
		z-index: 10;
		position: relative;
		opacity: 0.4;
		margin-left: 18px;
		margin-top: -41px !important;
	}
	.btn-tailen {
		color: white !important;
		border-radius: 0px !important;
		width: 30px !important;
		background-color: #5fade0 !important;
		font-size: 13px !important;
		border: 0px !important;
		margin-left: 30px;
		height: 28px !important;
	}
	.b-blue{
		color: fff;
	}
	.select2-container {
		width: 237px !important;
	}
</style>
<script type="text/javascript">
	$('#luu_1').click(function(event) {
		var id = $('#canid').val();
		if(id == ''){
			alert('Bạn phải tạo profile bên thẻ Tổng quát trước');
		}
		else{
			$('#form_image').submit();
		}
	});
	$('#save_can_1').click(function(event) {
		var id = $('#candidateid_1').val();
		if(id == ''){
			alert('Bạn phải tạo profile bên thẻ Tổng quát trước');
		}
		else{
			$('#form_can_1').submit();
		}
	});
	$('#save_can_2').click(function(event) {
		var id = $('#candidateid_2').val();
		if(id == ''){
			alert('Bạn phải tạo profile bên thẻ Tổng quát trước');
		}
		else{
			$('#form_can_2').submit();
		}
	});
	$('#them11').click(function(event) {
		var id = $('#candidateid_3').val();
		if(id == ''){
			alert('Bạn phải tạo profile bên thẻ Tổng quát trước');
		}
		else{
			$('#form_can_3').submit();
		}
	});
	$('#them12').click(function(event) {
		var id = $('#candidateid_4').val();
		if(id == ''){
			alert('Bạn phải tạo profile bên thẻ Tổng quát trước');
		}
		else{
			$('#form_can_4').submit();
		}
	});
	$('#them3').click(function(event) {
		var id = $('#candidateid_5').val();
		if(id == ''){
			alert('Bạn phải tạo profile bên thẻ Tổng quát trước');
		}
		else{
			$('#form_can_5').submit();
		}
	});
	$('#them4').click(function(event) {
		var id = $('#candidateid_6').val();
		if(id == ''){
			alert('Bạn phải tạo profile bên thẻ Tổng quát trước');
		}
		else{
			$('#form_can_6').submit();
		}
	});
	$('#them5').click(function(event) {
		var id = $('#candidateid_7').val();
		if(id == ''){
			alert('Bạn phải tạo profile bên thẻ Tổng quát trước');
		}
		else{
			$('#form_can_7').submit();
		}
	});
	$('#them6').click(function(event) {
		var id = $('#candidateid_8').val();
		if(id == ''){
			alert('Bạn phải tạo profile bên thẻ Tổng quát trước');
		}
		else{
			$('#form_can_8').submit();
		}
	});
	$('#them7').click(function(event) {
		var id = $('#candidateid_9').val();
		if(id == ''){
			alert('Bạn phải tạo profile bên thẻ Tổng quát trước');
		}
		else{
			$('#form_can_9').submit();
		}
	});
	function edit_anh()
 	{
    	$('#edit_anh_modal').modal('show');
 	}
 	$('#anh2').hide();
 	$('#anh1').mouseenter(function()
	{
		$('#anh2').show();
		$('#anh2').mouseenter(function()
		{
		  $('#anh2').show();
		});
	});
	$('#anh1').mouseleave(function()
	{
		$('#anh2').hide();
		$('#anh2 ').mouseleave(function()
		{
		 	$('#anh2').hide();
		});
	});

 	$(document).ready(function(){
        $('#browsebutton :file').change(function(e){
            var fileName = e.target.files[0].name;
            $("#label").attr('placeholder',fileName)
        });

    });
	$(document).ready(function(){
        $('#browsebutton1 :file').change(function(e){
            var fileName = e.target.files[0].name;
            $("#label1").text(fileName);
            $("#label1").attr('href','#');
        });
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

    function editmodal(idform){
      var data = "";
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);

      $('#them11').text("Lưu");
      $('#myModal11').modal('show');
      $('#hoten11').val(data2.hoten);
      $('#nn11').val(data2.nghenghiep);
      $('#checkup').val(data2.recordid);
      $('#namsinh11').val(data2.namsinh);
      $('#quanhe11').val(data2.quanhe);
	}
	function showmodel11(){
	    $('#them11').text("Thêm");

	    $('#myModal11').modal('show');
	    $('#hoten11').val("");
	    $('#nn11').val("");
	    $('#checkup').val("0");
	    $('#namsinh11').val("0");
	    $('#quanhe11').val("0");
  	}
  	function delmodal(idform){
	    var data = "";
	    data = $("#"+idform+"").serialize();
	    var data2 = parseQuery(data);
	    $('#myModaldel').modal('show');
	    $('#checkup1d').val(data2.recordid);
	}

	// them xoa sua kinh nghiem lam việc
	  function editmodal2(idform){
	      var data = "";
	      data = $("#"+idform+"").serialize();
	      var data2 = parseQuery(data);

	      $('#them12').text("Lưu");
	      $('#myModal2').modal('show');
	      $('#tuden5').val(data2.tungay);
	      $('#tuden6').val(data2.denngay);
	      $('#checkup2').val(data2.recordid);
	      $('#cty2').val(data2.cty);
	       $('#chucvu2').val(data2.vitri);
	        $('#nhiemvu2').val(data2.nhiemvu);
	       $('#lydonghi2').val(data2.lydo);
	       $('#dc2').val(data2.diachi);
	       $('#sdt2').val(data2.sdt);
	  }
	  function showmodel2(){

	      $('#them12').text("Thêm");

	      $('#myModal2').modal('show');
	       $('#tuden5').val("");
	      $('#tuden6').val("");
	      $('#checkup2').val("0");
	      $('#cty2').val("");
	       $('#chucvu2').val("");
	        $('#nhiemvu2').val("");
	       $('#lydonghi2').val("");
	       $('#dc2').val("");
	       $('#sdt2').val("");
	  }
	  function delmodal2(idform){
	      var data = "";
	      data = $("#"+idform+"").serialize();
	      var data2 = parseQuery(data);
	      $('#myModaldel2').modal('show');
	      $('#checkup2d').val(data2.recordid);

	  }

	// them xoa sua nguoi tham chieu
	  function editmodal3(idform){
	      var data = "";
	      data = $("#"+idform+"").serialize();
	      var data2 = parseQuery(data);

	      $('#them3').text("Lưu");
	      $('#myModal3').modal('show');
	     $('#hoten3').val(data2.hoten);
	      $('#chucvu3').val(data2.vitri);
	      $('#checkup3').val(data2.recordid);
	      $('#congty3').val(data2.cty);
	       $('#lienhe3').val(data2.lienhe);
	  }
	  function showmodel3(){

	      $('#them3').text("Thêm");

	      $('#myModal3').modal('show');
	       $('#hoten3').val("");
	      $('#chucvu3').val("");
	      $('#checkup3').val("0");
	      $('#congty3').val("");
	       $('#lienhe3').val("");
	  }

	  function delmodal3(idform){
	      var data = "";
	      data = $("#"+idform+"").serialize();
	      var data2 = parseQuery(data);
	      $('#myModaldel3').modal('show');
	      $('#checkup3d').val(data2.recordid);

	  }

	  // them xoa sua trinh do hoc van
   function editmodal4(idform){
      var data = "";
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);

      $('#them4').text("Lưu");
      $('#myModal4').modal('show');
       $('#tuden1').val(data2.tu);
      $('#tuden2').val(data2.den);
      $('#checkup4').val(data2.recordid);
      $('#truong4').val(data2.truong);
       $('#noihoc4').val(data2.noihoc);
       $('#nganhhoc4').val(data2.nganhhoc);
       $('#trinhdo4').val(data2.chungchi);
       if(data2.caonhat == "Y"){
         $('#caonhat4').prop('checked',true);
        } else {
           $('#caonhat4').prop('checked',false);
        }
  }
  function showmodel4(){

      $('#them4').text("Thêm");

      $('#myModal4').modal('show');
       $('#tuden1').val("");
      $('#tuden2').val("");
      $('#checkup4').val("0");
      $('#truong4').val("");
       $('#noihoc4').val("");
       $('#nganhhoc4').val("");
       $('#trinhdo4').val("");
       $('#caonhat4').prop('checked',false);
  }

  function delmodal4(idform){
      var data = "";
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      $('#myModaldel4').modal('show');
      $('#checkup4d').val(data2.recordid);

  }
   function editmodal5(idform){
      var data = "";
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);

      $('#them5').text("Lưu");
      $('#myModal5').modal('show');
       $('#tuden3').val(data2.tu);
      $('#tuden4').val(data2.den);
      $('#checkup5').val(data2.recordid);
      $('#truong5').val(data2.truong);
       $('#tghoc5').val(data2.tghoc);
       $('#donvi5').val(data2.donvi);
       $('#nganhhoc5').val(data2.nganhhoc);
       $('#bangcap5').val(data2.chungchi);

  }
  function showmodel5(){

      $('#them5').text("Thêm");

      $('#myModal5').modal('show');
       $('#tuden3').val("");
      $('#tuden4').val("");
      $('#checkup5').val("0");
      $('#truong5').val("");
       $('#tghoc5').val("");
       $('#donvi5').val("Năm");
       $('#nganhhoc5').val("");
       $('#bangcap5').val("");

  }
  // them xoa sua ngoai ngu
  function editmodal6(idform){
      var data = "";
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);

      $('#them6').text("Lưu");

      $('#myModal6').modal('show');
      $('#truong6').val(data2.ngonngu);
      $('#checkup6').val(data2.recordid);
      $('#nghe6').val(data2.rate1);
      $('#noi6').val(data2.rate2);
      $('#doc6').val(data2.rate3);
      $('#viet6').val(data2.rate4);
  }
  function showmodel6(){

      $('#them6').text("Thêm");

      $('#myModal6').modal('show');
      $('#truong6').val("");
      $('#checkup6').val("0");
      $('#nghe6').val("0");
      $('#noi6').val("0");
      $('#doc6').val("0");
      $('#viet6').val("0");

  }
  function delmodal6(idform){
      var data = "";
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      $('#myModaldel6').modal('show');

      $('#checkup6d').val(data2.recordid);

  }
  //them xoa sua pm
   function editmodal7(idform){
      var data = "";
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);

      $('#them7').text("Lưu");

      $('#myModal7').modal('show');
      $('#pm7').val(data2.pm);
      $('#checkup7').val(data2.recordid);

      $('#trinhdo7').val(data2.rate1);

  }
  function showmodel7(){

      $('#them7').text("Thêm");

      $('#myModal7').modal('show');
      $('#pm7').val("");
      $('#trinhdo7').val("0");
      $('#checkup7').val("0");
  }
  function delmodal7(idform){
      var data = "";
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      $('#myModaldel7').modal('show');
      $('#checkup7d').val(data2.recordid);
  }

  	$('#new_country1 option[value="'+$("#countryPREMANENT").val()+'"]').prop('selected','selected');
  	$('#new_country2 option[value="'+$("#countryCONTACT").val()+'"]').prop('selected','selected');
  	$(document).ready(function() {
  		comb_admin(<?php echo isset($address[1]['city'])? $address[1]['city'] : '1' ?>,<?php echo isset($address[1]['district'])? $address[1]['district'] : '0' ?>);
  		comb_admin_qhpx(<?php echo isset($address[1]['district'])? $address[1]['district'] : '1' ?>,<?php echo isset($address[1]['ward'])? $address[1]['ward'] : '0' ?>);
  		comb_admin2(<?php echo isset($address[0]['city'])? $address[0]['city'] : '1' ?>,<?php echo isset($address[0]['district'])? $address[0]['district'] : '0' ?>);
  		comb_admin_qhpx2(<?php echo isset($address[0]['district'])? $address[0]['district'] : '1' ?>,<?php echo isset($address[0]['ward'])? $address[0]['ward'] : '0' ?>);
  	});
</script>
<script type="text/javascript">
	$(".so").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});

	$(document).on('click', '.datepicker', function() {
	    $( this ).datetimepicker({
	        timepicker:false,
	        format:'d-m-Y',
	    });
	});

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
	function comb_admin(obj,get){
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
                    $('#chonqh-ad1').after('<option class="gicungdc" value="'+data[i].id_district+'" selected>'+data[i].name+'</option>');
                  }
                  else
                  {
                    $('#chonqh-ad1').after('<option class="gicungdc" value="'+data[i].id_district+'">'+data[i].name+'</option>');
                  }
                  }
		})
		.fail(function() {
			alert('thatbai');
			console.log("error");
		})
	}
	function comb_admin_qhpx(obj,get){
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
                $('#chonpx-ad1').after('<option class="gicungdc2" value="'+data[i].id_ward+'" selected>'+data[i].name+'</option>');
              }
              else
              {
                 $('#chonpx-ad1').after('<option class="gicungdc2" value="'+data[i].id_ward+'">'+data[i].name+'</option>');
              }
              }
		})
		.fail(function() {
			alert('thatbai');
			console.log("error");
		})
	}
	function comb_admin2(obj,get){
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
                    $('#chonqh-ad2').after('<option class="gicungdc3" value="'+data[i].id_district+'" selected>'+data[i].name+'</option>');
                  }
                  else
                  {
                    $('#chonqh-ad2').after('<option class="gicungdc3" value="'+data[i].id_district+'">'+data[i].name+'</option>');
                  }
                  }
		})
		.fail(function() {
			alert('thatbai');
			console.log("error");
		})
	}
	function comb_admin_qhpx2(obj,get){
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
                $('#chonpx-ad2').after('<option class="gicungdc4" value="'+data[i].id_ward+'" selected>'+data[i].name+'</option>');
              }
              else
              {
                 $('#chonpx-ad2').after('<option class="gicungdc4" value="'+data[i].id_ward+'">'+data[i].name+'</option>');
              }
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
		});
	}

	$('#btn_newProfile').on( "click", function() {

		if ($('#lastname').val() == "") { alert('Vui lòng nhập Họ tên đầy đủ!'); }
		else if ($('#firstname').val() == "") { alert('Vui lòng nhập Họ tên đầy đủ!'); }
		else if ($('#phone1').val() == 0 && $('#phone2').val() == 0) { alert('Vui lòng nhập số điện thoại!'); }
        else
            {
                var email = $('#email').val();
                var cmnd = $('#idcard').val();
                var phone1 = $('#phone1').val();
                var phone2 = $('#phone2').val();
                $.ajax({
                    url: '<?php echo base_url() ?>admin/handling/checkCandidate',
                    type: 'POST',
                    dataType: 'json',
                    data: {email: email, cmnd:cmnd, phone1:phone1,phone2:phone2},
                })
                .done(function(data) {
                    if (data != 0) {
                        $('#err-newUser').text(data).removeClass('hide');
                    }else{
                        $('#btn_newProfile').find('i').addClass('fa fa-spin fa-spinner');
                        $('#btn_newProfile').prop('disabled', true);
                        $('#form_newProfile').submit();
                    }

                })
                .fail(function() {
                    console.log("error");
                });

            }
		// else {
		// 	$('#btn_newProfile').find('i').addClass('fa fa-spin fa-spinner');
		// 	$('#btn_newProfile').prop('disabled', true);
	 //  		$('#form_newProfile').submit();
		// }

	});

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
	var states = ["<?php echo implode('","',$ss_tags); ?>"];

	$('#typeahead').tagsinput({
	    typeaheadjs: {
	    name: 'states',
	    source: substringMatcher(states)
	    },
	    freeInput: true,
	});

	$('#typeahead').on('itemAdded', function(event) {
	 $('#typeahead').tagsinput('focus');
	  $('#tags').val($('#typeahead').val());

	});


	$('#typeahead').on('itemRemoved', function(event) {
	  $('#tags').val($('#typeahead').val());
	});

	$(document).on('click', '.so', function(e) {
    if ($(this).val() == '') {
              $(this).val(0);
        }
    $(this).number( true );
    }).on('keypress', '.so',function(e){

        if(!$.isNumeric(String.fromCharCode(e.which))) e.preventDefault();
    }).on('paste', '.so', function(e){
        var cb = e.originalEvent.clipboardData || window.clipboardData;
        if(!$.isNumeric(cb.getData('text'))) e.preventDefault();
    });
    $("input[id='tghoc5']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
</script>
<style type="text/css">
	.tt-input
	{
		vertical-align: unset !important;
	}
</style>