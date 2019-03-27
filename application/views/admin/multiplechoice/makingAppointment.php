<div class="row">
	<section class="col-md-6 col-md-offset-3">
		<div class="page_header">
			<div class="logo_as" >
				<img src="<?php echo base_url() ?>public/image/logoheader.png">
				<label >DXG Recruiter</label>
				<div class="pull-right"><i class="fa fa-close"></i></div>
			</div>
			<div>
				<p class="header_title">Lịch hẹn phỏng vấn</p>
			</div>
		</div>
		<div class="body_as">
			<div class="row">
				<div class="btn_as">
					<button onclick="cancelAppointment()"><i class="fa fa-trash-o fa-lg"></i></button>
					<button><i class="fa fa-print fa-lg"></i></button>
				</div>
			</div>
			<div class="row">
				<div class="row desc_as">
					<label>Ứng viên/ Người phỏng vấn</label>
					<div class="col-md-12">
						<div class="col-md-3 padding_0 manage_pv ql" id="col_pt_0">
          					<div class="col-md-3 padding_0">
          						<img class="img-pv" src="<?php echo base_url().'public/image/'.$img_a = ($interview['imagelink']!='')? $interview['imagelink'] : 'unknow.jpg'; ?>">
          					</div>
          					<div class="col-md-9 padding_0">
          						<div class="body-blac5a"><?php echo $interview['name'] ?></div>
          						<?php if ($interview['status_asmt'] == 'C') {
	      							if ($interview['optionid'] == '1') {
	      								echo '<span class="colorsuccess fontArial show-view" >Đã xác nhận</span>';
	      							}
	      							else if($interview['optionid'] == '2'){
	      								$date 		=  date_format(date_create($interview['ansdatetime']),"d/m/Y");
	      								$from 		=  date_format(date_create($interview['ansdatetime']),"H:i");
										$to 		=  date_format(date_create($interview['ansdatetime2']),"H:i");
	      								echo '<span class="colorred fontArial show-view" >Tham dự vào ngày khác </span><span>'.$from.' - '.$to.' '.$date.'</span>';
		      						}
		      						else if($interview['optionid'] == '3'){
	      								echo '<span class="colorred fontArial show-view" >Không tham dự </span>';
		      						}
	      						}else{
		      							echo '<span class="colorgray fontArial show-view" >Chờ xác nhận </span>';
		      					} ?>
          						<!-- <span class="body-blac5b">Chờ xác nhận</span> -->
          					</div>
          				</div>
          				<?php foreach ($interviewer as $row):
          					if ($row['status_asmt'] == 'C') {
      							if ($row['optionid'] == '1') {
      								$status = '<span class="body-blac5b">Chờ xác nhận</div>';
      							}
      							else if($row['optionid'] == '2'){
      								$date 		=  date_format(date_create($row['ansdatetime']),"d/m/Y");
      								$from 		=  date_format(date_create($row['ansdatetime']),"H:i");
									$to 		=  date_format(date_create($row['ansdatetime2']),"H:i");
      								$status 	=  '<span class="colorred fontArial show-view" >Tham dự vào ngày khác </span><span style="font-size:12px">'.$from.' - '.$to.' '.$date.'</span>';
	      						}
	      						else if($row['optionid'] == '3'){
      								$status 	= '<span class="colorred fontArial show-view" >Không tham dự </span>';
	      						}
      						}else{
	      							$status 	= '<span class="colorgray fontArial show-view" >Chờ xác nhận </span>';
	      					}
          				?>
          					<div class="col-md-3 padding_0 manage_pv ql" id="col_pt_<?php echo $row['interviewerid'] ?>" onclick="removeInterviewer(<?php echo $row['interviewerid'] ?>)">
	          					<div class="col-md-3 padding_0">
	          						<img class="img-pv" src="<?php echo base_url().'public/image/'.$img_b =($row['filename'] != '')? $row['filename'] : 'unknow.jpg'; ?>">
	          						<div class="del_ql"><i class="fa fa-minus-circle fa-lg"></i></div>
	          					</div>
	          					<div class="col-md-9 padding_0">
	          						<div class="body-blac5a"><?php echo $row['operatorname'] ?></div>
	          						<?php echo $status ?>
	          					</div>
	          				</div>
          				<?php endforeach ?>

          				<div class="col-md-3 padding_0 manage_pv ql">
          					<div class="col-md-3 padding_0">
          						<img class="img-pv" src="<?php echo base_url() ?>public/image/bbye.jpg">
          					</div>
          					<div class="col-md-9 padding_0">
          						<a href="javascript:void(0)" class="add_pt" onclick="addInterviewer(<?php echo $interview['interviewid'] ?>)"><span>Thêm người phỏng vấn</span></a>
          					</div>
          				</div>
					</div>
				</div>
				<div class="margin_top_15">
					<div class="row desc_as location_time">
						<label>Thời gian/ Địa điểm</label>
						<div class="margin_left_15">
							<?php
								$thu = date_format(date_create($interview['intdate']),"N");
								if ($thu != 7) {
									$temp = (int)$thu+1;
									$thu = 'Thứ '.(string)$temp;
								}else{
									$thu = 'Chủ Nhật';
								}
								$ngay =  date_format(date_create($interview['intdate']),"d");
								$thang =  date_format(date_create($interview['intdate']),"m");
								$nam =  date_format(date_create($interview['intdate']),"Y");
								$from =  date_format(date_create($interview['timefrom']),"H:i");
								$to =  date_format(date_create($interview['timeto']),"H:i");
							?>
							<p><?php echo $thu.', '.$ngay.' Tháng '.$thang.' Năm '.$nam ?></p>
							<p><?php echo $from.' → '.$to ?></p>
							<p><?php echo $interview['location'] ?></p>
							<input type="hidden" name="datetime">
						</div>
					</div>
				</div>
				<div class="margin_top_15 border_bottom_f2">
					<div class="row desc_as notes_int">
						<label>Nội dung/ Hướng dẫn</label>
						<div class="margin_left_15">
							<p><?php echo isset($interview['notes'])? $interview['notes'] :''  ?></p>
						</div>
					</div>
				</div>
				<div class="row desc_as">
					<label>Phiếu phỏng vấn</label>
					<div class="col-md-12">

          				<div class="pull-right hide">
          					<div class="btn_as">
								<button onclick="changeAssessment()"><i class="fa fa-pencil fa-lg"></i></button>
							</div>
          				</div>
					</div>
					<ul class="nav nav-tabs">
						<?php if($interviewer_current&&!empty($interviewer_current)){
						foreach ($interviewer_current as $key => $value) {?>
                            <li>
                            	<a href="#tab<?php echo($key)?>" data-toggle="tab">
                            		<img class="img-pv" src="<?php echo base_url('public/image/'.$img_c =($value['current'][0]['filename']!='')?$value['current'][0]['filename'] : 'unknow.jpg' )?>"> <?php echo($value['current'][0]['operatorname'])?>

                            	</a>
                            </li>

                        <?php }}?>
                        </ul>
                    <div class="tab-content">
                    	<?php if($interviewer_current&&!empty($interviewer_current)){
						foreach ($interviewer_current as $key => $value) {?>
							<div class="tab-pane fade" id="tab<?php echo($key)?>">

					<?php if(isset($value['section'])&&!empty($value['section'])) foreach ($value['section'] as $sec) {?>
					<div>
						<div class="title_ques"><?php echo($sec['sectionname'])?></div>
						<?php if(isset($sec['question'])&&!empty($sec['question'])) foreach ($sec['question'] as $ques) {?>
						<div class="question_as">
							<label><?php echo($ques['questioncontent'])?></label>
							<?php if($ques['questiontype']=='scores'){?>
							<div class="answer_as">
								<div class="col-md-3">
									<input type="textbox" required="" name="question[<?php echo($ques['questionid'])?>][ansnumeric]"  value="<?php echo number_format($ques['ansnumeric'])?>">
								</div>
								<div class="col-md-9">
									<textarea name="question[<?php echo($ques['questionid'])?>][anstext]" class="width_100" rows="3" placeholder="dạng văn bản"><?php echo($ques['anstext'])?></textarea>
									<!-- <input type="textbox" class="width_100" name="question[<?php echo($ques['questionid'])?>][anstext]" placeholder="Nhận xét" value="<?php echo($ques['anstext'])?>"> -->
								</div>
							</div>
							<?php }elseif($ques['questiontype']=='text'){ ?>
							<div class="answer_as">
								<div class="col-md-12">
									<textarea name="question[<?php echo($ques['questionid'])?>][anstext]" class="width_100" rows="4" placeholder="dạng văn bản"><?php echo($ques['anstext'])?></textarea>
								</div>
							</div>
							<?php }?>
						</div>
						<?php }?>
					</div>
					<?php }?>
							</div>

                        <?php }}?>
                    </div>
				</div>
				<!-- <form id="form_ans">
					<input type="hidden" name="interviewerid" value="<?php echo $interviewerid ?>">
					<input type="hidden" name="interviewid" value="<?php echo $interviewid ?>">
					<input type="hidden" name="asmtid" value="<?php echo(isset($asmtid)?$asmtid:'')?>">
					<div class="row desc_as">
						<label>Phiếu phỏng vấn</label>

					</div>
					<?php if(isset($section)&&!empty($section)) foreach ($section as $sec) {?>
					<div>
						<div class="title_ques">A. <?php echo($sec['sectionname'])?></div>
						<?php if(isset($sec['question'])&&!empty($sec['question'])) foreach ($sec['question'] as $ques) {?>
						<div class="question_as">
							<label>1.	<?php echo($ques['question'])?></label>
							<?php if($ques['questiontype']=='scores'){?>
							<div class="answer_as">
								<div class="col-md-3">
									<input type="textbox" required="" name="question[<?php echo($ques['questionid'])?>][ansnumeric]" placeholder="Điểm số (<?php echo number_format($ques['scorefrom'])?>-><?php echo number_format($ques['scoreto'])?>)" value="<?php echo number_format($ques['ansnumeric'])?>">
								</div>
								<div class="col-md-9">
									<input type="textbox" class="width_100" name="question[<?php echo($ques['questionid'])?>][anstext]" placeholder="Nhận xét" value="<?php echo($ques['anstext'])?>">
								</div>
							</div>
							<?php }elseif($ques['questiontype']=='text'){ ?>
							<div class="answer_as">
								<div class="col-md-12">
									<textarea name="question[<?php echo($ques['questionid'])?>][anstext]" class="width_100" rows="4" placeholder="dạng văn bản"><?php echo($ques['anstext'])?></textarea>
								</div>
							</div>
							<?php }?>
						</div>
						<?php }?>
					</div>
					<?php }?> -->
			</div>
		</div>
		<div class="footer_as hide">
			<div>
				<button class="btn btn_start">Kết thúc</button>
			</div>
		</div>
	<!-- </form> -->
	</section>
</div>
<!-- thêm người phỏng vấn -->
<div class="modal fade" id="createInterviewer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " style="width: 60%">
    <div class="modal-content " >
        <div class="modal-header modal_header_cam">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thêm người phỏng vấn</h4>
        </div>
        <form method="post" action="<?php echo base_url() ?>admin/interview/saveAddInterviewer" enctype="multipart/form-data">
          <div class=" modal_body_chuyen">
            <div class="body_cam col-xs-12 body_chuyen" id="body_loai">
              <div class="row" style="margin-right: 0px">
                <div class="col-md-3 box_profile_tn" >
                  <div class="profile_tn">
                  </div>
                </div>
                <div class="col-md-9 border_left_ddd loca_1">
                </div>
              </div>
            </div>
            <div class="col-xs-12 body_chuyen_2">
              	<div class="rowedit3">
                    <p class="titleAppoint">Người phỏng vấn</p>
                      <div class="col-xs-12 padding_0">

                        <div class="col-md-3 padding_0 manage_pv ql" id="col_add_pt">
                            <div class="col-md-3 padding_0">
                              <img class="img-pv" src="<?php echo base_url() ?>public/image/bbye.jpg">
                            </div>
                            <div class="col-md-9 padding_0">
                              <a href="javascript:void(0)" class="add_pt" onclick="insertPV1(1)"><span>Thêm người phỏng vấn</span></a>
                            </div>
                        </div>
                        <input type="hidden" id="managePV" name="profile">
                    </div>
              	</div>
            </div>
            <div class="col-xs-12 body_chuyen_2">
            	<label class="share_chuyen"><input type="checkbox" onclick="checkbox(this)" id="inputcheckmail_1" name="checkmail" value="1">  Gửi email thông báo</label>
            </div>
            <div class="hide" id="check_mail1">
	            <div class="col-xs-12 body_chuyen_2">
	              <div class="rowedit2">
	                      <p class="titleAppoint">Thư mời tham dự phỏng vấn (dành cho người phỏng vấn) </p>
	              </div>
	              <div class="rowedit2">
	                      <div class="col-xs-1 guide-black cc">
	                        Gửi đến:
	                      </div>
	                      <div class="col-xs-11">
	                        <input class="kttext width_100" type="text" id="email_to_pv" name="to" >
	                      </div>
	              </div>
	              <div class="rowedit2">
	                      <div class="col-xs-1 guide-black cc">
	                        Cc:
	                      </div>
	                      <div class="col-xs-11">
	                        <input class="kttext width_100" type="text" name="cc">
	                      </div>
	              </div>
	              <div class="rowedit2">
	                      <div class="col-xs-1 guide-black cc">
	                        Bcc:
	                      </div>
	                      <div class="col-xs-11">
	                        <input class="kttext width_100" type="text" name="bcc">
	                      </div>
	              </div>
	            </div>
	            <div class="col-xs-12 body_chuyen_2">
	              <div class="rowedit2">
	                      <div class="col-xs-1 guide-black cc" style="color: #5FA2DD;">
	                        Mẫu thư:
	                      </div>
	                      <div class="col-xs-7">
	                        <select class="js-example-basic-2" name="status3"  onchange="changeTemplate(this.value,10)">
	                            <option value="">Chọn mẫu thư</option>
	                          <?php foreach ($mailtemplate as $row): ?>
	                            <option value="<?php echo $row['mailprofileid'] ?>"><?php echo $row['profilename'] ?></option>
	                          <?php endforeach ?>
	                        </select>
	                        <i class="fa fa-info-circle info-circle-font-awesome" aria-hidden="true"></i>
	                      </div>
	                      <div class="col-xs-4">
	                          <p onclick="insertField(10)" class="plus-button" style="margin-left: 15px" id="clickPlus"><i class="fa fa-plus" aria-hidden="true"></i> Thêm trường dữ liệu</p>
	                      </div>
	              </div>

	              <div class="rowedit2">
	                      <div class="col-xs-1 guide-black cc">
	                        Tiêu đề:
	                      </div>
	                      <div class="col-xs-11">
	                        <textarea class="textarea_profile" id="subjectmail10" rows="1" name="subject" required="">
                        	</textarea>
	                      </div>
	              </div>
	              <div class="rowedit3">
	                      <div class="col-xs-1 guide-black" style="padding: 0px">
	                        Nội dung:
	                      </div>
	                      <div class="col-xs-11">
	                        <textarea name="body10" class="textarea_profile editor" rows="3" required="">
	                        </textarea>
	                      </div>
	              </div>
	              <div class="rowedit2">
	                  	<div class="col-xs-1 guide-black cc">
	                  	</div>
	                    <div class="col-xs-11">
	                        <div class="width80 col-xs-9 padding-lr0 filename_label" id="filename_label10">
	                        	<input type="hidden" id="preattach_10" name="preattach">
			                    <div class="col-md-3">
			                      <label class="fontArial colorcyan labelcontent browsebutton1"><input id="my-file-selector1" name="attach[]" multiple="" type="file" accept=".pdf,.doc,.docx,.xlsx" style="display:none;"><i class="fa fa-paperclip"></i> Tài liệu đính kèm</label>
			                    </div>
			                </div>
	                    </div>
	              </div>
	            </div>
	        </div>
	        <input  type="hidden" name="presender" id="presender10" value="usersession">
            <input type="hidden" name="interviewid"value="<?php echo $interview['interviewid'] ?>">
            <input type="hidden" name="campaignid"value="<?php echo $interview['campaignid'] ?>">
            <input type="hidden" name="roundid"value="<?php echo $interview['roundid'] ?>">
            <input type="hidden" name="name"value="<?php echo $interview['name'] ?>">
            <input type="hidden" name="candidateid"value="<?php echo $interview['candidateid'] ?>">
          </div>
          <div class="modal-footer modal_footer_cam">
            <label class="share_chuyen"><input type="checkbox" name=""> Không chia sẻ nội dung này</label>
            <button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Hủy</button>
            <button type="submit" class="btn btn_tt">Lưu</button>
          </div>
        </form>
    </div>
  </div>
</div>
<!-- xóa người phỏng vấn -->
<div class="modal fade" id="removeInterviewer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " style="width: 60%">
    <div class="modal-content " >
        <div class="modal-header modal_header_cam">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Xác nhận xoá người phụ trách phỏng vấn</h4>
        </div>
        <form method="post" action="<?php echo base_url() ?>admin/interview/removeInterviewer" enctype="multipart/form-data">
          <div class=" modal_body_chuyen">
            <div class="body_cam col-xs-12 body_chuyen" id="body_loai">
              <div class="row" style="margin-right: 0px">
                <div class="col-md-3 box_profile_tn" >
                  <div class="profile_tn">
                  </div>
                </div>
                <div class="col-md-9 border_left_ddd loca_2">
                </div>
              </div>
            </div>
            <div class="col-xs-12 body_chuyen_2">
              <div class="rowedit3m row">
                <div class="col-md-3">
                  <label>Xoá người phụ trách</label>
                </div>
                <div class="col-md-9 padding_0">
                  <div class="col-md-4 padding_0 manage_pv ql">
                    <div class="col-md-3 padding_0" id="img_remove">
                    </div>
                    <div class="col-md-9 padding_0">
                      <div class="body-blac5a" id="name_remove">Nguyễn Huy Hoàng</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="rowedit3 row margin_top_15">
                <div class="col-md-3">
                  <span>Lý do/ Ghi chú</span>
                </div>
                <div class="col-md-9 padding_0">
                  <textarea rows="4" class="textarea_profile" name="note"></textarea>
                </div>
              </div>
            </div>
            <div class="col-xs-12 body_chuyen_2">
            	<label class="share_chuyen"><input type="checkbox" onclick="checkbox(this)" name="checkmail" value="2">  Gửi email thông báo</label>
            </div>
            <div class="hide" id="check_mail2">
            	<div class="col-xs-12 body_chuyen_2">
		              <div class="rowedit2">
		                      <p class="titleAppoint">Thư thông báo hủy phỏng vấn</p>
		              </div>
		              <div class="rowedit2">
		                      <div class="col-xs-1 guide-black cc">
		                        Gửi đến:
		                      </div>
		                      <div class="col-xs-11">
		                        <input class="kttext width_100" type="text" name="to" id="to_pv_2">
		                      </div>
		              </div>
		              <div class="rowedit2">
		                      <div class="col-xs-1 guide-black cc">
		                        Cc:
		                      </div>
		                      <div class="col-xs-11">
		                        <input class="kttext width_100" type="text" name="cc" id="cc_pv_2">
		                      </div>
		              </div>
		              <div class="rowedit2">
		                      <div class="col-xs-1 guide-black cc">
		                        Bcc:
		                      </div>
		                      <div class="col-xs-11">
		                        <input class="kttext width_100" type="text" name="bcc" >
		                      </div>
		              </div>
		        </div>
	            <div class="col-xs-12 body_chuyen_2">
	              	<div class="rowedit2">
	                      <div class="col-xs-1 guide-black cc" style="color: #5FA2DD;">
	                        Mẫu thư:
	                      </div>
	                      <div class="col-xs-7">
	                        <select class="js-example-basic-2" name="status3" required="" onchange="changeTemplate(this.value,11)" style="width: 50%">
	                            <option value="">Chọn mẫu thư</option>
	                          <?php foreach ($mailtemplate as $row): ?>
	                            <option value="<?php echo $row['mailprofileid'] ?>"><?php echo $row['profilename'] ?></option>
	                          <?php endforeach ?>
	                        </select>
	                        <i class="fa fa-info-circle info-circle-font-awesome" aria-hidden="true"></i>
	                      </div>
	                      <div class="col-xs-3">
	                        <p onclick="insertField(11)" class="plus-button" style="margin-left: 15px" id="clickPlus"><i class="fa fa-plus" aria-hidden="true"></i> Thêm trường dữ liệu</p>
	                      </div>
	              	</div>

		            <div class="rowedit2">
		                      <div class="col-xs-1 guide-black cc">
		                        Tiêu đề:
		                      </div>
		                      <div class="col-xs-11">
		                        <textarea class="textarea_profile" id="subjectmail11" rows="1" name="subject" required="">
		                        </textarea>
		                      </div>
		            </div>
	                <div class="rowedit3">
	                      <div class="col-xs-1 guide-black" style="padding: 0px">
	                        Nội dung:
	                      </div>
	                      <div class="col-xs-11">
	                        <textarea name="body17" class="textarea_profile editor" rows="3" required="">
	                        </textarea>
	                      </div>
	                </div>
	              	<div class="rowedit2">
	                    <div class="col-xs-1 guide-black cc">
	                    </div>
	                    <div class="col-xs-11">
	                        <div class="width80 col-xs-9 padding-lr0 filename_label" id="filename_label11">
	                        	<input type="hidden" id="preattach_11" name="preattach">
			                    <div class="col-md-3">
			                      <label class="fontArial colorcyan labelcontent browsebutton1"><input id="my-file-selector1" name="attach[]" multiple="" type="file" accept=".pdf,.doc,.docx,.xlsx" style="display:none;"><i class="fa fa-paperclip"></i> Tài liệu đính kèm</label>
			                    </div>
			                </div>
	                    </div>
	              	</div>
	            </div>
            </div>
            <input  type="hidden" name="presender" id="presender11" value="usersession">
            <input type="hidden" name="interviewid" value="<?php echo $interview['interviewid'] ?>">
            <input type="hidden" name="campaignid" value="<?php echo $interview['campaignid'] ?>">
            <input type="hidden" name="roundid" value="<?php echo $interview['roundid'] ?>">
            <input type="hidden" name="candidateid" value="<?php echo $interview['candidateid'] ?>">
            <input type="hidden" name="interviewer" id="interviewerid_remove">
          </div>
          <div class="modal-footer modal_footer_cam">
            <label class="share_chuyen"><input type="checkbox" name="isshare" value="N"> Không chia sẻ nội dung này</label>
            <button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Hủy</button>
            <button type="submit" class="btn btn_tt btn_tt1">Tiến hành</button>
          </div>
        </form>
    </div>
  </div>
</div>
<!-- hủy lịch phỏng vấn -->
<div class="modal fade" id="cancelAppointment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " style="width: 60%">
    <div class="modal-content " >
        <div class="modal-header modal_header_cam">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Xác nhận Huỷ lịch phỏng vấn</h4>
        </div>
        <form method="post" action="<?php echo base_url() ?>admin/interview/cancelAppointment" enctype="multipart/form-data">
          <div class=" modal_body_chuyen">
            <div class="body_cam col-xs-12 body_chuyen" id="body_loai">
              <div class="row" style="margin-right: 0px">
                <div class="col-md-3 box_profile_tn" >
                  <div class="profile_tn">
                  </div>
                </div>
                <div class="col-md-9 border_left_ddd loca_2">

                </div>
              </div>
            </div>
            <div class="col-xs-12 body_chuyen_2">
              <div class="rowedit3">
                <div class="col-md-3">
                  <span>Lý do/ Ghi chú</span>
                </div>
                <div class="col-md-9 padding_0">
                  <textarea rows="4" class="textarea_profile" name="note"></textarea>
                </div>
              </div>
            </div>
            <div class="col-xs-12 body_chuyen_2">
            	<label><input type="checkbox" onclick="checkbox(this)" name="checkmail" value="3">  Gửi email thông báo</label>
            </div>
            <div class="hide" id="check_mail3">
	            <div class="col-xs-12 body_chuyen_2">
	              <div class="rowedit2">
	                      <p class="titleAppoint">Thư thông báo hủy phỏng vấn</p>
	              </div>
	              <div class="rowedit2">
	                      <div class="col-xs-1 guide-black cc">
	                        Gửi đến:
	                      </div>
	                      <div class="col-xs-11">
	                        <input class="kttext width_100" type="text" name="to" value="<?php echo $interview['email'] ?>">
	                      </div>
	              </div>
	              <div class="rowedit2">
	                      <div class="col-xs-1 guide-black cc">
	                        Cc:
	                      </div>
	                      <div class="col-xs-11">
	                        <input class="kttext width_100" type="text" name="cc" id="cc_cancle_pv" >
	                      </div>
	              </div>
	              <div class="rowedit2">
	                      <div class="col-xs-1 guide-black cc">
	                        Bcc:
	                      </div>
	                      <div class="col-xs-11">
	                        <input class="kttext width_100"type="text" name="bcc" >
	                      </div>
	              </div>
	            </div>
	            <div class="col-xs-12 body_chuyen_2">
	              <div class="rowedit2">
	                      <div class="col-xs-1 guide-black cc" style="color: #5FA2DD;">
	                        Mẫu thư:
	                      </div>
	                      <div class="col-xs-7">
	                        <select class="js-example-basic-2" name="status3" required="" onchange="changeTemplate(this.value,3)" style="width: 50%">
	                            <option value="">Chọn mẫu thư</option>
	                          <?php foreach ($mailtemplate as $row): ?>
	                            <option value="<?php echo $row['mailprofileid'] ?>"><?php echo $row['profilename'] ?></option>
	                          <?php endforeach ?>
	                        </select>
	                        <i class="fa fa-info-circle info-circle-font-awesome" aria-hidden="true"></i>
	                      </div>
	                      <div class="col-xs-3">
	                        <p onclick="insertField(3)" class="plus-button" style="margin-left: 15px" id="clickPlus"><i class="fa fa-plus" aria-hidden="true"></i> Thêm trường dữ liệu</p>
	                      </div>
	              </div>

	              <div class="rowedit2">
	                      <div class="col-xs-1 guide-black cc">
	                        Tiêu đề:
	                      </div>
	                      <div class="col-xs-11">
	                        <textarea class="textarea_profile" id="subjectmail3" rows="1" name="subject" required="">
	                        </textarea>
	                      </div>
	              </div>
	              <div class="rowedit3">
	                      <div class="col-xs-1 guide-black" style="padding: 0px">
	                        Nội dung:
	                      </div>
	                      <div class="col-xs-11">
	                        <textarea name="body15" class="textarea_profile editor" rows="3" required="">
	                        </textarea>
	                      </div>
	              </div>
	              <div class="rowedit2">
	                    <div class="col-xs-1 guide-black cc">
	                    </div>
	                    <div class="col-xs-11">
	                        <div class="width80 col-xs-9 padding-lr0 filename_label">
			                    <div class="col-md-3">
			                      <label class="fontArial colorcyan labelcontent browsebutton1"><input id="my-file-selector1" name="attach[]" multiple="" type="file" accept=".pdf,.doc,.docx,.xlsx" style="display:none;"><i class="fa fa-paperclip"></i> Tài liệu đính kèm</label>
			                    </div>
			                </div>
	                   	</div>
	              </div>
	            </div>
	        </div>
	        <input  type="hidden" name="presender" id="presender3">
            <input type="hidden" name="interviewid" value="<?php echo $interview['interviewid'] ?>">
            <input type="hidden" name="campaignid" value="<?php echo $interview['campaignid'] ?>">
            <input type="hidden" name="roundid" value="<?php echo $interview['roundid'] ?>">
            <input type="hidden" name="candidateid" value="<?php echo $interview['candidateid'] ?>">
          </div>
          <div class="modal-footer modal_footer_cam">
            <label class="share_chuyen"><input type="checkbox" name="isshare" value="N"> Không chia sẻ nội dung này</label>
            <button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Hủy</button>
            <button type="submit" class="btn btn_tt btn_tt1" >Tiến hành</button>
          </div>
        </form>
    </div>
  </div>
</div>
<!-- thay đổi phiếu đánh giá phỏng vấn -->
<div class="modal fade" id="changeAssessment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " style="width: 60%">
    <div class="modal-content " >
        <div class="modal-header modal_header_cam">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thay đổi phiếu đánh giá phỏng vấn</h4>
        </div>
        <form method="post" action="<?php echo base_url() ?>admin/interview/changeAppointment">
          <div class=" modal_body_chuyen">
            <div class="body_cam col-xs-12 body_chuyen" id="body_loai">
              <div class="row" style="margin-right: 0px">
                <div class="col-md-3 box_profile_tn">
                  <div class="profile_tn">
                  </div>
                </div>
                <div class="col-md-9 border_left_ddd loca_2" >

                </div>
              </div>
            </div>
            <div class="col-xs-12 body_chuyen_2">
              <div class="rowedit3">
                <div class="col-md-3 padding_0">
                  <label></label>
                </div>
                <div class="col-md-9 padding_0">
                  <div class="row margin_top_15">
                    <div class="col-md-4 padding_0">
                      <span>Phiếu phỏng vấn</span>
                    </div>
                    <div class="col-md-8 padding_0">
                      <select class="js-example-basic-2" name="scr_asmtid">
                        <option value="1">Phiếu phỏng vấn BM004/05</option>
                      </select>
                    </div>
                  </div>
                  <div class="row margin_top_15" >
                    <div class="col-md-4 padding_0">
                      <span>Người phụ trách phiếu</span>
                    </div>
                    <div class="col-md-8 padding_0">
                      <select class="js-example-basic-2" name="interviewerid">
                      	<?php foreach ($interviewer as $key ): ?>
                      		<option value="<?php echo $key['interviewerid'] ?>"><?php echo $key['operatorname'] ?></option>
                      	<?php endforeach ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xs-12 body_chuyen_2">
            	<label><input type="checkbox" onclick="checkbox(this)" name="checkmail" value="4">  Gửi email thông báo</label>
            </div>
            <div class="hide" id="check_mail4">
	            <div class="col-xs-12 body_chuyen_2">
	              <div class="rowedit2">
	                      <p class="titleAppoint">Thư thông báo thay đổi phiếu phỏng vấn</p>
	              </div>
	              <div class="rowedit2">
	                      <div class="col-xs-1 guide-black cc">
	                        Gửi đến:
	                      </div>
	                      <div class="col-xs-11">
	                        <input class="kttext width_100" type="text" name="to" >
	                      </div>
	              </div>
	              <div class="rowedit2">
	                      <div class="col-xs-1 guide-black cc">
	                        Cc:
	                      </div>
	                      <div class="col-xs-11">
	                        <input class="kttext width_100" type="text" name="cc" value="">
	                      </div>
	              </div>
	              <div class="rowedit2">
	                      <div class="col-xs-1 guide-black cc">
	                        Bcc:
	                      </div>
	                      <div class="col-xs-11">
	                        <input class="kttext width_100" type="text" name="bcc" value="">
	                      </div>
	              </div>
	            </div>
	            <div class="col-xs-12 body_chuyen_2">
	              <div class="rowedit2">
	                      <div class="col-xs-1 guide-black cc" style="color: #5FA2DD;">
	                        Mẫu thư:
	                      </div>
	                      <div class="col-xs-9">
	                        <select class="js-example-basic-2" name="status3" required="" onchange="changeTemplate(this.value,4)">
	                            <option value="">Chọn mẫu thư</option>
	                          <?php foreach ($mailtemplate as $row): ?>
	                            <option value="<?php echo $row['mailprofileid'] ?>"><?php echo $row['profilename'] ?></option>
	                          <?php endforeach ?>
	                        </select>
	                        <i class="fa fa-info-circle info-circle-font-awesome" aria-hidden="true"></i>
	                      </div>
	              </div>

	              <div class="rowedit2">
	                      <div class="col-xs-1 guide-black cc">
	                        Tiêu đề:
	                      </div>
	                      <div class="col-xs-11">
	                        <textarea class="textarea_profile" id="subjectmail4" rows="1" name="subject" required="">
	                        </textarea>
	                      </div>
	              </div>
	              <div class="rowedit3">
	                      <div class="col-xs-1 guide-black" style="padding: 0px">
	                        Nội dung:
	                      </div>
	                      <div class="col-xs-11">
	                        <textarea name="body16" class="textarea_profile editor" rows="3" required=""></textarea>
	                      </div>
	              </div>
	              <div class="rowedit2">
	                    <div class="col-xs-1 guide-black cc">
	                    </div>
	                    <div class="col-xs-11">
	                        <div class="width80 col-xs-9 padding-lr0 filename_label">
			                    <div class="col-md-3">
			                      <label class="fontArial colorcyan labelcontent browsebutton1"><input id="my-file-selector1" name="attach[]" multiple="" type="file" accept=".pdf,.doc,.docx,.xlsx" style="display:none;"><i class="fa fa-paperclip"></i> Tài liệu đính kèm</label>
			                    </div>
			                </div>
	                    </div>
	              </div>
	            </div>
	        </div>
	        <input  type="hidden" name="presender" id="presender4">
            <input type="hidden" name="interviewid" value="<?php echo $interview['interviewid'] ?>">
            <input type="hidden" name="campaignid" value="<?php echo $interview['campaignid'] ?>">
            <input type="hidden" name="roundid" value="<?php echo $interview['roundid'] ?>">
            <input type="hidden" name="name" value="<?php echo $interview['name'] ?>">
            <input type="hidden" name="candidateid" value="<?php echo $interview['candidateid'] ?>">
          </div>
          <div class="modal-footer modal_footer_cam">
            <label class="share_chuyen"><input type="checkbox" name="isshare" value="N"> Không chia sẻ nội dung này</label>
            <button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Hủy</button>
            <button type="submit" class="btn btn_tt btn_tt1">Tiến hành</button>
          </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="insertPV1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width_450">
    <div class="modal-content " >
        <div class="modal-header modal_header_cam">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thêm phụ trách vòng </h4>
        </div>
        <input type="hidden" id="roundid_pt">
        <form id="formPV1">
          <div class="modal-body modal_body_cam_pt">
            <div class="body_cam" id="body_cam_pt_1">
              <div class="col-xs-1" id="btn_event_pt_1">
                <i class="fa fa-plus-circle fa-lg fa_pt" onclick="addPV(1)"></i>
              </div>
              <div class="col-xs-11">
                <select class="seletext js-example-basic-2" name="managecampaign[]" required="" id="select_type_pt_1" style="width: 100%">
                  <option value="">Tìm kiếm từ danh sách người dùng</option>
                  <?php foreach ($operator as $row): ?>
                    <option value="<?php echo $row['operatorid'] ?>" ><?php echo $row['operatorname'] ?></option>
                  <?php endforeach ?>
                </select>
                <span class="hide" id="show_name_pt_1"></span>
              </div>
            </div>
          </div>
          <div class="modal-footer modal_footer_cam">
            <button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Hủy</button>
            <button type="button" class="btn btn_tt btn_tt1" id="savePT1" data-dismiss="modal">Lưu</button>
          </div>
        </form>
    </div>
  </div>
</div>

<div class="hide" id="operator_js"><?php echo json_encode($operator); ?></div>
<div class="hide" id="interviewer_js"><?php echo json_encode($interviewer); ?></div>
<style type="text/css">
	.manage_pv{
		height: 65px;
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
	.nav-tabs> li> a {
    	color: #333;
    	font-weight: 600;
	}
</style>
<script type="text/javascript">

	$(document).ready(function(){
		$('.nav-tabs li:first').addClass('active');
		$('.tab-content .tab-pane:first').addClass('in active');
	});

	function addInterviewer(interviewid) {
		$('.profile_tn').html('<img src="http://recruit.tavicosoft.com/public/image/<?php echo $interview['imagelink'] ?>" ><p class="guide-black"><?php echo $interview['name'] ?></p>');
		var loca = $('.location_time').contents().clone();
		$('.loca_1').empty().append(loca);
		var notes = $('.notes_int').contents().clone();
		$('.loca_1').append(notes);

		$('#my-file-selector1').val();
        $(".dom_file").remove();
		$('#createInterviewer').modal('show');
	}

	function insertPV1(roundid) {
		$('#my-file-selector1').val();
        $(".dom_file").remove();
	    $('#roundid_pt').val(roundid);
	    $('#insertPV1').modal('show');
	}
	function addPV1(i) {
	    var j = i+1;
	    var value = $('#select_type_pt_'+i).val();
	    var name = $('#select_type_pt_'+i).find(":selected").text();
	    if (value != '') {
	      var row = $('#body_cam_pt_'+i).clone().attr('id', 'body_cam_pt_'+j).after('#body_cam_pt_'+i);
	      $('.modal_body_cam_pt').append(row);
	      $('#body_cam_pt_'+j).contents().find('.fa_pt').attr('onclick', 'addPV1('+j+')');
	      $('#body_cam_pt_'+j).contents().find('.seletext').attr('id', 'select_type_pt_'+j);
	      $('#body_cam_pt_'+j).contents().find('#show_name_pt_'+i).attr('id', 'show_name_pt_'+j);
	      $('#body_cam_pt_'+j).children().attr('id', 'btn_event_pt_'+j);
	      $('.select_2').select2({ width: '100%' });
	      $('.select_2').last().next().next().remove();

	      $('#show_name_pt_'+i).text(name).removeClass('hide');
	      $('#select_type_pt_'+i).hide();
	      $('#btn_event_pt_'+i).empty().html('<i class="fa fa-minus-circle fa-lg" onclick="subPV1('+i+')"></i>');
	    }else{
	      alert('Bạn chưa chọn người phỏng vấn');
	    }
	  }
	function subPV1(i) {
	    $('#body_cam_pt_'+i).remove();
	}
	function subColPV1(id) {
	    $('#col_pt1_'+id).remove();
	    var manageround = $('#managePV').val();
	    manageround1 = manageround.replace(id+',', '');
	    $('#managePV').val(manageround1);

	    var operator = $('#operator_js').text();
	    operator = (JSON.parse(operator));
	    for(var j in operator ){
	      if (id == operator[j]['operatorid']) {
	        var temp = operator[j]['email'];
	        var listmail = $('#email_to_pv').val();
	        listmail1 = listmail.replace(temp+',', '');
	        $('#email_to_pv').val(listmail1);
	      }
	    }
	}
	$('#savePT1').click(function(event) {
	    var operator = $('#operator_js').text();
	    operator = (JSON.parse(operator));
	    var data = $('#formPV1').serializeArray();
	    var row = '';
	    var str = '';
	    var email = $('#email_to_pv').val();
	    for(var i in data){
	      if (data[i].value == '')
	      {
	        continue;
	      }
	      for(var j in operator ){
	        if (data[i].value == operator[j]['operatorid']) {
	          row ='<div class="col-md-12" id="col_pt1_'+data[i].value+'" style="margin-bottom:5px"><div class="col-md-6 padding_0 manage_pv ql">';
	          row += '<div class="col-md-3 padding_0" onclick="subColPV1('+data[i].value+')""><img class="img-pv" src="<?php echo base_url().'public/image/' ?>'+operator[j]['filename']+'"><div class="del_ql"><i class="fa fa-minus-circle fa-lg"></i></div></div>';
	          row += '<span class="body-blac5a" padding_0 style="font-size:16px;">'+operator[j]['operatorname']+'</span></div>';
	          row += '<div class="col-md-6" style="margin-top: 10px;float: right;"><select class="js-example-basic-2" name="pv[]" required="" style="width: 100%">';
	            <?php foreach ($asmt_pv as $key): ?>
	               row += '<option value="<?php echo $key['asmttemp'] ?>"><?php echo $key['asmtname'] ?></option>';
	            <?php endforeach ?>
	            row += '</select></div></div>';
	          $('#col_add_pt').before(row);

	          var temp = operator[j]['email'];
	            email += temp+', ';

	        }
	      }
	      str += data[i].value + ',';
	    }
	    $('#email_to_pv').val(email);
	    var manageround = $('#managePV').val();
	    if(manageround != ''){
	      manageround += str;
	    }else{
	      manageround = str;
	    }
	    $('#managePV').val(manageround);
	    $('#insertPV1').modal('hide');
	});

	function cancelAppointment(argument) {
		$('.profile_tn').html('<img src="http://recruit.tavicosoft.com/public/image/<?php echo $interview['imagelink'] ?>" ><p class="guide-black"><?php echo $interview['name'] ?></p>');
		var loca = $('.location_time').contents().clone();
		$('.loca_2').empty().append(loca);
		var notes = $('.notes_int').contents().clone();
		$('.loca_2').append(notes);

		var email_to = email_cc = '';
		var inter = $('#interviewer_js').text();
	    inter = (JSON.parse(inter));
		var interviewer = '<div><p class="titleAppoint1">Người phỏng vấn</p>';
		for (var i = 0; i < inter.length; i++) {
			var temp = inter[i]['email'];
			email_cc += temp+', ';

			interviewer += '<div class="col-md-4 padding_0 manage_pv ql"><div class="col-md-3 ">';
			interviewer += '<img  src="<?php echo base_url() ?>public/image/'+inter[i]['filename']+'"></div>';
			interviewer += '<div class="col-md-9 padding_0"><div class="body-blac5a">'+inter[i]['operatorname']+'</div></div></div>';

		}
        interviewer += '</div>';
        $('#cc_cancle_pv').val(email_cc);
        $('.loca_2').append(interviewer);

        $('#my-file-selector1').val();
        $(".dom_file").remove();
		$('#cancelAppointment').modal('show');
	}
	function removeInterviewer(interviewerid) {
		$('.profile_tn').html('<img src="http://recruit.tavicosoft.com/public/image/<?php echo $interview['imagelink'] ?>" ><p class="guide-black"><?php echo $interview['name'] ?></p>');
		var loca = $('.location_time').contents().clone();
		$('.loca_2').empty().append(loca);
		var notes = $('.notes_int').contents().clone();
		$('.loca_2').append(notes);

		var email_to = email_cc = '';
		var inter = $('#interviewer_js').text();
	    inter = (JSON.parse(inter));
		var interviewer = '<div><p class="titleAppoint1">Người phỏng vấn</p>';
		for (var i = 0; i < inter.length; i++) {
			var temp = inter[i]['email'];
			if (inter[i]['interviewerid'] == interviewerid) {
				$('#img_remove').html('<img src="<?php echo base_url() ?>public/image/'+inter[i]['filename']+'">');
				$('#name_remove').text(inter[i]['operatorname']);
	            email_to += temp+', ';
			}else{
				email_cc += temp+', ';
			}
			interviewer += '<div class="col-md-4 padding_0 manage_pv ql"><div class="col-md-3 ">';
			interviewer += '<img  src="<?php echo base_url() ?>public/image/'+inter[i]['filename']+'"></div>';
			interviewer += '<div class="col-md-9 padding_0"><div class="body-blac5a">'+inter[i]['operatorname']+'</div></div></div>';

		}
        interviewer += '</div>';
        $('#to_pv_2').val(email_to);
        $('#cc_pv_2').val(email_cc);
        $('.loca_2').append(interviewer);
   		$('#interviewerid_remove').val(interviewerid);

   		$('#my-file-selector1').val();
        $(".dom_file").remove();
		$('#removeInterviewer').modal('show');
	}
	function changeAssessment(argument) {
		$('.profile_tn').html('<img src="http://recruit.tavicosoft.com/public/image/<?php echo $interview['imagelink'] ?>" ><p class="guide-black"><?php echo $interview['name'] ?></p>');
		var loca = $('.location_time').contents().clone();
		$('.loca_2').empty().append(loca);
		var notes = $('.notes_int').contents().clone();
		$('.loca_2').append(notes);

		var email_to = email_cc = '';
		var inter = $('#interviewer_js').text();
	    inter = (JSON.parse(inter));
		var interviewer = '<div><p class="titleAppoint1">Người phỏng vấn</p>';
		for (var i = 0; i < inter.length; i++) {
			var temp = inter[i]['operatorname']+'('+inter[i]['email']+')';
			email_cc += temp+', ';
			interviewer += '<div class="col-md-4 padding_0 manage_pv ql"><div class="col-md-3 ">';
			interviewer += '<img  src="<?php echo base_url() ?>public/image/'+inter[i]['filename']+'"></div>';
			interviewer += '<div class="col-md-9 padding_0"><div class="body-blac5a">'+inter[i]['operatorname']+'</div></div></div>';

		}
        interviewer += '</div>';
        // $('#to_pv_2').val(email_to);
        // $('#cc_pv_2').val(email_cc);
        $('.loca_2').append(interviewer);

        $('#my-file-selector1').val();
        $(".dom_file").remove();
		parent.$('#changeAssessment').modal('show');
	}

</script>