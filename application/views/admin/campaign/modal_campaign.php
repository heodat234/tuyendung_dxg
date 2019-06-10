<div class="modal fade" id="transferHS" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " style="width: 50%">
    <div class="modal-content " >
        <div class="modal-header modal_header_cam">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Xác nhận Chuyển hồ sơ</h4>
        </div>
        <form id="formTransfer1">
          <div class=" modal_body_chuyen">
            <div class="body_cam col-xs-12 body_chuyen" id="body_chuyen">

            </div>
            <div class="col-xs-12 body_chuyen_1">
              <div class="col-xs-4">
                <label class="label_chon">Chọn vòng cần chuyển</label>
              </div>
              <div class="col-xs-8">
                <select class="selecttext select2 select_chuyen" name="roundid" style="width: 60%">
                </select>
              </div>
            </div>
            <div class="col-xs-12 body_chuyen_2">
              <label class="share_chuyen"><input type="checkbox" onclick="checkbox(this)" name="checkmail" id="inputcheckmail_0" value="0">  Gửi email thông báo</label>
            </div>
            <div class="hide" id="check_mail0">
              <div class="col-xs-12 body_chuyen_1">
                <div class="rowedit2">
                        <div class="col-xs-1 guide-black cc">
                          Gửi đến:
                        </div>
                        <div class="col-xs-11">
                          <input class="kttext width_100" type="text" id="email_to_tran" name="to" value="">
                        </div>
                </div>
                <div class="rowedit2">
                        <div class="col-xs-1 guide-black cc">
                          Cc:
                        </div>
                        <div class="col-xs-11">
                          <input class="kttext width_100" type="text" name="cc" id="email_cc_tran">
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
                        <div class="col-xs-7">
                          <select class="select2" name="mailid" id="mailid1" required="" onchange="changeTemplate(this.value,5)" style="width: 50%">
                              <option value="">Chọn mẫu thư</option>
                            <?php foreach ($mailtemplate as $row): ?>
                              <option value="<?php echo $row['mailprofileid'] ?>"><?php echo $row['profilename'] ?></option>
                            <?php endforeach ?>
                          </select>
                          <i class="fa fa-info-circle info-circle-font-awesome" aria-hidden="true"></i>
                        </div>
                        <div class="col-xs-4">
                          <p onclick="insertField(5)" class="plus-button" style="margin-left: 15px" id="clickPlus"><i class="fa fa-plus" aria-hidden="true"></i> Thêm trường dữ liệu</p>
                        </div>
                </div>

                <div class="rowedit2">
                        <div class="col-xs-1 guide-black cc">
                          Tiêu đề:
                        </div>
                        <div class="col-xs-11">
                          <!-- <input class="kttext width_100 subjectmail" type="text" name="subject" value=""> -->
                          <textarea class="textarea_profile" id="subjectmail5" rows="1" name="subject" required="">
                          </textarea>
                        </div>
                </div>
                <div class="rowedit3">
                        <div class="col-xs-1 guide-black cc">
                          Ghi chú:
                        </div>
                        <div class="col-xs-11">
                          <textarea name="body5" class="textarea_profile editor" rows="3" required="">
                          </textarea>
                        </div>
                </div>
                <div class="rowedit2">
                  <div class="col-xs-1 guide-black cc">
                  </div>
                  <div class="col-xs-11">
                    <div class="width80 padding-lr0 filename_label" id="filename_label5">
                      <input type="hidden" id="preattach_5" name="preattach">
                      <div class="col-md-4">
                        <label class="fontArial colorcyan labelcontent browsebutton1"><input id="my-file-selector1" name="attach[]" multiple="" type="file" accept=".pdf,.doc,.docx,.xlsx" style="display:none;"><i class="fa fa-paperclip"></i> Tài liệu đính kèm</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <input  type="hidden" name="presender" id="presender5" value="usersession">
            <input type="hidden" name="campaignid" id="campaignid_tran" value="">
            <input type="hidden" name="roundid_old" id="roundid_old" value="">
          </div>
          <div class="modal-footer modal_footer_cam">
            <label class="share_chuyen"><input type="checkbox" name="isshare" value="Y"> Không chia sẻ nội dung này</label>
            <button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Hủy</button>
            <button type="button" class="btn btn_tt btn_tt1" id="saveTransfer"><i></i> Lưu</button>
          </div>
        </form>
    </div>
  </div>
</div>
<div class="modal fade" id="discardHS" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" style="width: 50%">
    <div class="modal-content " >
        <div class="modal-header modal_header_cam">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Xác nhận Loại hồ sơ</h4>
        </div>
        <form id="formDiscard">
          <div class=" modal_body_chuyen">
            <div class="body_cam col-xs-12 body_chuyen" id="body_loai">

            </div>
            <div class="col-xs-12 body_chuyen_1">
              <div class="col-xs-4">
                <label class="label_chon">Xác nhận loại hồ sơ</label>
              </div>
              <div class="col-xs-8">
                <select class="selecttext select2 select_chuyen select_loai" style="width: 60%">
                </select>
              </div>
            </div>
            <div class="col-xs-12 body_chuyen_2">
              <label class="share_chuyen"><input type="checkbox" onclick="checkbox(this)" name="checkmail" id="inputcheckmail_2" value="2">  Gửi email thông báo</label>
            </div>
            <div class="hide" id="check_mail2">
              <div class="col-xs-12 body_chuyen_1">
                <div class="rowedit2">
                        <div class="col-xs-1 guide-black cc">
                          Gửi đến:
                        </div>
                        <div class="col-xs-11">
                          <input class="kttext width_100" type="text" id="email_to_dis" name="to" value="">
                        </div>
                </div>
                <div class="rowedit2">
                        <div class="col-xs-1 guide-black cc">
                          Cc:
                        </div>
                        <div class="col-xs-11">
                          <input class="kttext width_100" type="text" name="cc" id="email_cc_dis">
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
                        <div class="col-xs-7">
                          <select class="select2" name="mailid" id="mailid2" required="" onchange="changeTemplate(this.value,6)">
                              <option value="">Chọn mẫu thư</option>
                            <?php foreach ($mailtemplate as $row): ?>
                              <option value="<?php echo $row['mailprofileid'] ?>"><?php echo $row['profilename'] ?></option>
                            <?php endforeach ?>
                          </select>
                          <i class="fa fa-info-circle info-circle-font-awesome" aria-hidden="true"></i>
                        </div>
                        <div class="col-xs-4">
                          <p onclick="insertField(6)" class="plus-button" style="margin-left: 15px" id="clickPlus"><i class="fa fa-plus" aria-hidden="true"></i> Thêm trường dữ liệu</p>
                        </div>
                </div>

                <div class="rowedit2">
                        <div class="col-xs-1 guide-black cc">
                          Tiêu đề:
                        </div>
                        <div class="col-xs-11">
                          <!-- <input class="kttext width_100 subjectmail" type="text" name="subject" value=""> -->
                          <textarea class="textarea_profile" id="subjectmail6" rows="1" name="subject" required="">
                          </textarea>
                        </div>
                </div>
                <div class="rowedit3">
                        <div class="col-xs-1 guide-black cc">
                          Ghi chú:
                        </div>
                        <div class="col-xs-11">
                          <textarea name="body6" class="textarea_profile editor" rows="3" required="">
                          </textarea>
                        </div>
                </div>
                <div class="rowedit2">
                  <div class="col-xs-1 guide-black cc">
                  </div>
                  <div class="col-xs-11">
                    <div class="width80 padding-lr0 filename_label" id="filename_label6">
                      <input type="hidden" id="preattach_6" name="preattach">
                      <div class="col-md-4">
                        <label class="fontArial colorcyan labelcontent browsebutton1"><input id="my-file-selector1" name="attach[]" multiple="" type="file" accept=".pdf,.doc,.docx,.xlsx" style="display:none;"><i class="fa fa-paperclip"></i> Tài liệu đính kèm</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <input  type="hidden" name="presender" id="presender6" value="usersession">
            <input type="hidden" name="campaignid" id="campaignid_dis" value="">
            <input type="hidden" name="roundid" id="roundid_dis" value="">
          </div>
          <div class="modal-footer modal_footer_cam">
            <label class="share_chuyen"><input type="checkbox" name=""> Không chia sẻ nội dung này</label>
            <button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Hủy</button>
            <button type="button" class="btn btn_tt btn_tt1" id="saveDiscard"><i></i> Lưu</button>
          </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="createMultiChoice" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " style="width: 60%">
    <div class="modal-content " >
        <div class="modal-header modal_header_cam">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tạo phiếu trắc nghiệm</h4>
        </div>
        <input type="hidden" id="count_candidate" value="0">
        <form id="formCreateMChoice">
          <input  type="hidden" name="presender" id="presender1" value="usersession">
          <input type="hidden" name="campaignid" id="campaignid_tn" >
          <input type="hidden" name="roundid" id="roundid_tn">
          <div class=" modal_body_chuyen " id="profile_taophieu">
            <div class="col-xs-12 body_chuyen_1">
              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc">
                        Gửi đến:
                      </div>
                      <div class="col-xs-11">
                        <input class="kttext width_100" type="text" id="email_to_tn_1" name="to" value="">
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
                      <div class="col-xs-7">
                        <select class="select2" name="mailid" required="" id="mailid3" onchange="changeTemplate(this.value,1)" style="width: 50%">
                            <option value="">Chọn mẫu thư</option>
                          <?php foreach ($mailtemplate as $row): ?>
                            <option value="<?php echo $row['mailprofileid'] ?>"><?php echo $row['profilename'] ?></option>
                          <?php endforeach ?>
                        </select>
                        <i class="fa fa-info-circle info-circle-font-awesome" aria-hidden="true"></i>
                      </div>
                      <div class="col-xs-3">
                        <p onclick="insertField(1)" class="plus-button" style="margin-left: 15px" id="clickPlus"><i class="fa fa-plus" aria-hidden="true"></i> Thêm trường dữ liệu</p>
                      </div>
              </div>

              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc">
                        Tiêu đề:
                      </div>
                      <div class="col-xs-11">
                        <!-- <input class="kttext width_100 subjectmail" type="text" name="subject" value=""> -->
                        <textarea class="textarea_profile" id="subjectmail1" rows="1" name="subject" required="">
                        </textarea>
                      </div>
              </div>
              <div class="rowedit3">
                      <div class="col-xs-1 guide-black cc">
                        Ghi chú:
                      </div>
                      <div class="col-xs-11">
                        <textarea name="body1" class="textarea_profile editor" rows="3" required="">
                        </textarea>
                      </div>
              </div>
              <div class="rowedit2">
                <div class="col-xs-1 guide-black cc">
                </div>
                <div class="col-xs-11">
                  <div class="width80 padding-lr0 filename_label" id="filename_label1">
                    <input type="hidden" id="preattach_1" name="preattach">
                    <div class="col-md-3">
                      <label class="fontArial colorcyan labelcontent browsebutton1"><input id="my-file-selector1" name="attach[]" multiple="" type="file" accept=".pdf,.doc,.docx,.xlsx" style="display:none;"><i class="fa fa-paperclip"></i> Tài liệu đính kèm</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer modal_footer_cam">
            <label class="share_chuyen"><input type="checkbox" name="isshare" value="Y"> Không chia sẻ nội dung này</label>
            <button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Hủy</button>
            <button type="button" class="btn btn_tt btn_tt1" id="saveMChoice" ><i></i> Lưu</button>
          </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="createAppointment" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " style="width: 60%">
    <div class="modal-content " >
        <div class="modal-header modal_header_cam">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tạo lịch hẹn phỏng vấn</h4>
        </div>
        <form id="formAppointment">
          <div class=" modal_body_chuyen">
            <div class="col-xs-12 body_chuyen_1">
              <div class="rowedit2">
                      <div class="col-xs-2 guide-black cc">
                        Ngày phỏng vấn:
                      </div>
                      <div class="col-xs-10">
                        <input class="kttext width_100 datetimepicker" type="text" name="intdate" onchange="changeDate(this.value)" value="<?php echo date_format(date_create(),"d/m/Y") ?>">
                      </div>
              </div>
              <div class="rowedit3">
                      <div class="col-xs-2 guide-black cc">
                        Các PV trong ngày:
                      </div>
                      <div class="col-xs-10 timeappoint" id="events_pv">
                      </div>
              </div>
            </div>
            <div id="profile_taopv">

            </div>

            <div class="col-xs-12 body_chuyen_1">
              <div class="rowedit2">
                      <p class="titleAppoint">Thư mời phỏng vấn (dành cho ứng viên)</p>
              </div>
              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc">
                        Gửi đến:
                      </div>
                      <div class="col-xs-11">
                        <input class="kttext width_100" type="text" id="email_to_pv1" name="to1" >
                      </div>
              </div>
              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc">
                        Cc:
                      </div>
                      <div class="col-xs-11">
                        <input class="kttext width_100" type="text"  name="cc_1" >
                      </div>
              </div>
              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc">
                        Bcc:
                      </div>
                      <div class="col-xs-11">
                        <input class="kttext width_100" type="text" id="email_bcc_pv1" name="bcc_1" >
                      </div>
              </div>
            </div>

            <div class="col-xs-12 body_chuyen_2">
              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc" style="color: #5FA2DD;">
                        Mẫu thư:
                      </div>
                      <div class="col-xs-7">
                        <select class="select2" name="mailid" required="" id="mailid4" onchange="changeTemplate(this.value,2)" style="width: 50%">
                            <option value="">Chọn mẫu thư</option>
                          <?php foreach ($mailtemplate as $row): ?>
                            <option value="<?php echo $row['mailprofileid'] ?>"><?php echo $row['profilename'] ?></option>
                          <?php endforeach ?>
                        </select>
                        <i class="fa fa-info-circle info-circle-font-awesome" aria-hidden="true"></i>
                      </div>
                      <div class="col-xs-3">
                        <p onclick="insertField(2)" class="plus-button" style="margin-left: 15px" id="clickPlus"><i class="fa fa-plus" aria-hidden="true"></i> Thêm trường dữ liệu</p>
                      </div>
              </div>

              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc">
                        Tiêu đề:
                      </div>
                      <div class="col-xs-11">
                        <!-- <input class="kttext width_100 subjectmail"  type="text" name="subject1" > -->
                        <textarea class="textarea_profile" id="subjectmail2" rows="1" name="subject1" required="">
                        </textarea>
                      </div>
              </div>
              <div class="rowedit3">
                      <div class="col-xs-1 guide-black" style="padding: 0px">
                        Nội dung:
                      </div>
                      <div class="col-xs-11">
                        <textarea name="body2" class="textarea_profile editor"  rows="3" required="">
                        </textarea>
                      </div>
              </div>
              <div class="rowedit2">
                <div class="col-xs-1 guide-black cc">
                </div>
                <div class="col-xs-11">
                  <div class="width80 col-xs-9 padding-lr0 filename_label" id="filename_label2">
                    <input type="hidden" id="preattach_2" name="preattach1">
                    <div class="col-md-3">
                      <label class="fontArial colorcyan labelcontent browsebutton1"><input id="my-file-selector1" name="attach1[]" multiple="" type="file" accept=".pdf,.doc,.docx,.xlsx" style="display:none;"><i class="fa fa-paperclip"></i> Tài liệu đính kèm</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xs-12 body_chuyen_1">
              <div class="rowedit2">
                      <p class="titleAppoint">Thư mời phỏng vấn (dành cho nguời phỏng vấn)</p>
              </div>
              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc">
                        Gửi đến:
                      </div>
                      <div class="col-xs-11">
                        <input class="kttext width_100" type="text" id="email_to_pv2" name="to2" >
                      </div>
              </div>
              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc">
                        Cc:
                      </div>
                      <div class="col-xs-11">
                        <input class="kttext width_100" type="text"  name="cc_2" >
                      </div>
              </div>
              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc">
                        Bcc:
                      </div>
                      <div class="col-xs-11">
                        <input class="kttext width_100"  type="text" name="bcc_2" >
                      </div>
              </div>
            </div>

            <div class="col-xs-12 body_chuyen_2">
              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc" style="color: #5FA2DD;">
                        Mẫu thư:
                      </div>
                      <div class="col-xs-7">
                        <select class="select2" name="mailid" required="" id="mailid5" onchange="changeTemplate(this.value,3)" style="width: 50%">
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
                        <!-- <input class="kttext width_100 subjectmail"  type="text" name="subject2"> -->
                        <textarea class="textarea_profile" id="subjectmail3" rows="1" name="subject2" required="">
                        </textarea>
                      </div>
              </div>
              <div class="rowedit3">
                      <div class="col-xs-1 guide-black" style="padding: 0px">
                        Nội dung:
                      </div>
                      <div class="col-xs-11">
                        <textarea name="body3" class="textarea_profile editor" rows="3" required="">
                        </textarea>
                      </div>
              </div>
              <div class="rowedit2">
                <div class="col-xs-1 guide-black cc">
                </div>
                <div class="col-xs-11">
                  <div class="width80 col-xs-9 padding-lr0 filename_label_1" id="filename_label3">
                    <input type="hidden" id="preattach_3" name="preattach2">
                    <div class="col-md-3">
                      <label class="fontArial colorcyan labelcontent browsebutton2"><input id="my-file-selector2" name="attach2[]" multiple="" type="file" accept=".pdf,.doc,.docx,.xlsx" style="display:none;"><i class="fa fa-paperclip"></i> Tài liệu đính kèm</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <input  type="hidden" name="presender2" id="presender2" value="usersession">
            <input  type="hidden" name="presender3" id="presender3" value="usersession">
            <input type="hidden" name="count" id="count_candidate_pv" >
            <input type="hidden" name="campaignid" id="campaignid_pv" value="">
            <input type="hidden" name="roundid" id="roundid_pv" value="">
          </div>
          <div class="modal-footer modal_footer_cam">
            <label class="share_chuyen"><input type="checkbox" name="isshare" value="Y"> Không chia sẻ nội dung này</label>
            <button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Hủy</button>
            <button type="button" class="btn btn_tt btn_tt1" id="saveAppointment"><i></i> Lưu</button>
          </div>
        </form>
    </div>
  </div>
</div>

<!-- thư mời nhận việc -->
<div class="modal fade" id="createOffer" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " style="width: 50%">
    <div class="modal-content " >
        <div class="modal-header modal_header_cam">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thư mời nhận việc</h4>
        </div>
        <form id="formOffer">
          <div class=" modal_body_chuyen" id="profile_offer">
            <div class="col-xs-12 body_chuyen_2">
              <div class="rowedit2">
                <div class="col-xs-1 guide-black cc" style="color: #5FA2DD;">
                  Mẫu in:
                </div>
                <div class="col-xs-6">
                  <select class="select2" name="tempid" required="" id="tempid11" onchange="changeTemplateOffer(this.value,11)" style="width: 50%">
                      <option value="0">Chọn mẫu in</option>
                    <?php if (isset($templateOffer)) {
                    foreach ($templateOffer as $row1){ ?>
                      <option value="<?php echo $row1['tempid'] ?>"><?php echo $row1['tempname'] ?></option>
                    <?php } }?>
                  </select>
                  <i class="fa fa-info-circle info-circle-font-awesome" aria-hidden="true"></i>
                </div>
                <div class="col-xs-4">
                  <p onclick="insertFieldOffer(11)" class="plus-button" style="margin-left: 15px" id="clickPlus"><i class="fa fa-plus" aria-hidden="true"></i> Thêm trường dữ liệu mẫu in</p>
                </div>
              </div>
            </div>
            <div class="col-xs-12 body_chuyen_2">
              <div class="rowedit3">
                <!-- <div class="col-xs-1 guide-black" style="padding: 0px">
                  Nội dung:
                </div> -->
                <textarea name="subject" class="hide" id="subject11"></textarea>
                <div class="col-xs-12">
                  <textarea name="body11" class="textarea_profile" rows="10" required=""></textarea>
                </div>
              </div>
            </div>
            <div class="col-xs-12 body_chuyen_2">
              <label class="share_chuyen"><input type="checkbox" onclick="checkbox(this)" name="checkmail" id="inputcheckmail_5" value="5">  Gửi email thông báo</label>
            </div>
            <div class="hide" id="check_mail5">
              <div class="col-xs-12 body_chuyen_2">
                <div class="rowedit2">
                  <p class="titleAppoint">Thư mời nhận việc</p>
                </div>
                <div class="rowedit2">
                        <div class="col-xs-1 guide-black cc">
                          Gửi đến:
                        </div>
                        <div class="col-xs-11">
                          <input class="kttext width_100" type="text" id="mail_to_offer" name="to">
                        </div>
                </div>
                <div class="rowedit2">
                        <div class="col-xs-1 guide-black cc">
                          Cc:
                        </div>
                        <div class="col-xs-11">
                          <input class="kttext width_100" type="text" name="cc" >
                        </div>
                </div>
                <div class="rowedit2">
                        <div class="col-xs-1 guide-black cc">
                          Bcc:
                        </div>
                        <div class="col-xs-11">
                          <input class="kttext width_100" type="text"  name="bcc" value="">
                        </div>
                </div>
              </div>

              <div class="col-xs-12 body_chuyen_2">
                <div class="rowedit2">
                  <div class="col-xs-1 guide-black cc" style="color: #5FA2DD;">
                    Mẫu thư:
                  </div>
                  <div class="col-xs-7">
                    <select class="select2" name="mailid" required="" id="mailid6" onchange="changeTemplate(this.value,4)" style="width: 50%">
                        <option value="">Chọn mẫu thư</option>
                      <?php foreach ($mailtemplate as $row): ?>
                        <option value="<?php echo $row['mailprofileid'] ?>"><?php echo $row['profilename'] ?></option>
                      <?php endforeach ?>
                    </select>
                    <i class="fa fa-info-circle info-circle-font-awesome" aria-hidden="true"></i>
                  </div>
                  <div class="col-xs-3">
                    <p onclick="insertField(4)" class="plus-button" style="margin-left: 15px" id="clickPlus"><i class="fa fa-plus" aria-hidden="true"></i> Thêm trường dữ liệu</p>
                  </div>
                </div>

                <div class="rowedit2">
                        <div class="col-xs-1 guide-black cc">
                          Tiêu đề:
                        </div>
                        <div class="col-xs-11">
                          <!-- <input class="kttext width_100 subjectmail" type="text" name="subject" value=""> -->
                          <textarea class="textarea_profile" id="subjectmail4" rows="1" name="subject" required="">
                          </textarea>
                        </div>
                </div>
                <div class="rowedit3">
                        <div class="col-xs-1 guide-black" style="padding: 0px">
                          Nội dung:
                        </div>
                        <div class="col-xs-11">
                          <textarea name="body4" class="textarea_profile editor" rows="3" required=""></textarea>
                        </div>
                </div>
                <div class="rowedit2">
                  <div class="col-xs-1 guide-black cc">
                  </div>
                  <div class="col-xs-11">
                    <div class="width80 col-xs-9 padding-lr0 filename_label_1" id="filename_label4">
                      <input type="hidden" id="preattach_4" name="preattach">
                      <div class="col-md-4">
                        <label class="fontArial colorcyan labelcontent browsebutton2"><input id="my-file-selector2" name="attach[]" multiple="" type="file" accept=".pdf,.doc,.docx,.xlsx" style="display:none;"><i class="fa fa-paperclip"></i> Tài liệu đính kèm</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <input type="hidden" name="offerid" id="offerid" value="0">
            <input type="hidden" name="off_asmtid" id="off_asmtid" value="0">
            <input type="hidden" name="presender" id="presender4" value="usersession">
            <input type="hidden" name="count" id="count_candidate_offer" >
            <input type="hidden" name="campaignid" id="campaignid_offer" value="">
            <input type="hidden" name="roundid" id="roundid_offer" value="">
          </div>
          <div class="modal-footer modal_footer_cam">
            <label class="share_chuyen"><input type="checkbox" name="isshare" value="Y"> Không chia sẻ nội dung này</label>
            <button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Hủy</button>
            <!-- <button type="button" class="btn btn_thoat btn_thoat1">Lưu tạm</button> -->
            <button type="button" class="btn btn_tt btn_tt1" id="saveOffer"><i></i> Lưu</button>
          </div>
        </form>
        <input type="hidden" id="check_offer" value="0">
    </div>
  </div>
</div>

<!-- mail -->
<div class="modal fade" id="modalMail" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " style="width: 50%">
    <div class="modal-content " >
        <div class="modal-header modal_header_cam">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Gửi mail</h4>
        </div>
        <form id="formMail">
          <div class=" modal_body_chuyen">
            <div id="check_mail1">
              <div class="col-xs-12 body_chuyen_1">
                <div class="rowedit2">
                        <div class="col-xs-1 guide-black cc">
                          Gửi đến:
                        </div>
                        <div class="col-xs-11">
                          <input class="kttext width_100" type="text" id="email_to" name="to" value="">
                        </div>
                </div>
                <div class="rowedit2">
                        <div class="col-xs-1 guide-black cc">
                          Cc:
                        </div>
                        <div class="col-xs-11">
                          <input class="kttext width_100" type="text" name="cc" id="email_cc">
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
                        <div class="col-xs-7">
                          <select class="select2" name="mailid" required="" onchange="changeTemplate(this.value,7)" style="width: 50%">
                              <option value="">Chọn mẫu thư</option>
                            <?php foreach ($mailtemplate as $row): ?>
                              <option value="<?php echo $row['mailprofileid'] ?>"><?php echo $row['profilename'] ?></option>
                            <?php endforeach ?>
                          </select>
                          <i class="fa fa-info-circle info-circle-font-awesome" aria-hidden="true"></i>
                        </div>
                        <div class="col-xs-4">
                          <p onclick="insertField(7)" class="plus-button" style="margin-left: 15px" id="clickPlus"><i class="fa fa-plus" aria-hidden="true"></i> Thêm trường dữ liệu</p>
                        </div>
                </div>

                <div class="rowedit2">
                        <div class="col-xs-1 guide-black cc">
                          Tiêu đề:
                        </div>
                        <div class="col-xs-11">
                          <textarea class="textarea_profile" id="subjectmail7" rows="1" name="subject" required="">
                          </textarea>
                        </div>
                </div>
                <div class="rowedit3">
                        <div class="col-xs-1 guide-black cc">
                          Ghi chú:
                        </div>
                        <div class="col-xs-11">
                          <textarea name="body7" class="textarea_profile editor" rows="3" required="">
                          </textarea>
                        </div>
                </div>
                <div class="rowedit2">
                  <div class="col-xs-1 guide-black cc">
                  </div>
                  <div class="col-xs-11">
                    <div class="width80 col-xs-9 padding-lr0 filename_label" id="filename_label7">
                      <input type="hidden" id="preattach_7" name="preattach">
                      <div class="col-md-6">
                        <label class="fontArial colorcyan labelcontent browsebutton1"><input id="my-file-selector1" name="attach[]" multiple="" type="file" accept=".pdf,.doc,.docx,.xlsx" style="display:none;"><i class="fa fa-paperclip"></i> Tài liệu đính kèm</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <input type="hidden" id="candidateid_mail" name="candidateid">
            <input  type="hidden" name="presender" id="presender7" value="usersession">
            <input type="hidden" name="campaignid" id="campaignid_mail" value="">
            <input type="hidden" name="roundid" id="roundid_mail" value="">
          </div>
          <div class="modal-footer modal_footer_cam">
            <label class="share_chuyen"><input type="checkbox" name="isshare" value="Y"> Không chia sẻ nội dung này</label>
            <button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Hủy</button>
            <button type="button" class="btn btn_tt btn_tt1" id="saveMail"><i></i> Gửi</button>
          </div>
        </form>
    </div>
  </div>
</div>




<div class="modal fade" id="insertPV" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width_450">
    <div class="modal-content " >
        <div class="modal-header modal_header_cam">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thêm người phỏng vấn </h4>
        </div>
        <input type="hidden" id="roundid_pt">
        <form id="formPV">
          <div class="modal-body modal_body_cam_pt">
            <div class="body_cam" id="body_cam_pt_1">
              <div class="col-xs-1" id="btn_event_pt_1">
                <i class="fa fa-plus-circle fa-lg fa_pt" onclick="addPV(1)"></i>
              </div>
              <div class="col-xs-11">
                <select class="seletext select2" name="managecampaign[]" required="" id="select_type_pt_1" style="width: 100%">
                  <option value="">Tìm kiếm từ danh sách người dùng</option>
                    <?php foreach ($category as $row){
                        if ($row['category'] == 'ERP') {
                    ?>
                        <option value="<?php echo $row['code'] ?>" ><?php echo $row['code'].' - '.$row['ref1'] ?></option>
                    <?php }} ?>
                </select>
                <span class="hide" id="show_name_pt_1"></span>
              </div>
            </div>
          </div>
          <div class="modal-footer modal_footer_cam">
            <button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Hủy</button>
            <button type="button" class="btn btn_tt btn_tt1" id="savePT" data-dismiss="modal">Lưu</button>
          </div>
        </form>
    </div>
  </div>
</div>

<!-- Thêm trường dl-->
<div class="modal fade" id="insertSubject" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal_header_add" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" style="color: #FFF">Thêm trường dữ liệu tiêu đề</h4>
      </div>
      <div class="modal-body">
        <p id="titleDatasource">Nguồn dữ liệu: Nghiệp vụ chiến dịch</p>
        <div class="contentDatasourceSubject">
          <input type="hidden" id="check">
        <a class="suggest-field" onclick="getField(this)">Tên Ứng viên</a><a class="suggest-field" onclick="getField(this)">Tuyển dụng viên</a><a class="suggest-field" onclick="getField(this)">Tên</a><a class="suggest-field" onclick="getField(this)">Vị trí</a><a class="suggest-field" onclick="getField(this)">Vòng tuyển dụng</a><a class="suggest-field" onclick="getField(this)">Link phiếu trắc nghiệm</a><a class="suggest-field" onclick="getField(this)">Link phiếu mời tham dự phỏng vấn</a><a class="suggest-field" onclick="getField(this)">Link phiếu đánh giá</a><a class="suggest-field" onclick="getField(this)">Ngày giờ phỏng vấn</a><a class="suggest-field" onclick="getField(this)">Link thư mời nhận việc</a><a class="suggest-field" onclick="getField(this)">Ngày nhận việc</a><a class="suggest-field" onclick="getField(this)">Ghi chú</a>
      </div>
      </div>
    </div>
  </div>
</div>

<!-- Thêm trường dl đề nghị-->
<div class="modal fade" id="insertOffer" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modal_header_add" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" style="color: #FFF">Thêm trường dữ liệu tiêu đề</h4>
      </div>
      <div class="modal-body">
        <p id="titleDatasource">Nguồn dữ liệu: Nghiệp vụ đề nghị</p>
        <div class="contentDatasourceSubject">
          <input type="hidden" id="checkOffer">
        <a class="suggest-field" onclick="getFieldOffer(this)">Chức danh vị trí</a><a class="suggest-field" onclick="getFieldOffer(this)">Địa điểm làm việc</a><a class="suggest-field" onclick="getFieldOffer(this)">Chế độ làm việc</a><a class="suggest-field" onclick="getFieldOffer(this)">Ngày nhận việc</a><a class="suggest-field" onclick="getFieldOffer(this)">Thời gian thử việc</a><a class="suggest-field" onclick="getFieldOffer(this)">Người hướng dẫn</a><a class="suggest-field" onclick="getFieldOffer(this)">Báo cáo cho</a><a class="suggest-field" onclick="getFieldOffer(this)">Lương thử việc</a><a class="suggest-field" onclick="getFieldOffer(this)">Lương chính thức</a><a class="suggest-field" onclick="getFieldOffer(this)">Cấp</a><a class="suggest-field" onclick="getFieldOffer(this)">Bậc</a><a class="suggest-field" onclick="getFieldOffer(this)">Chức vụ</a><a class="suggest-field" onclick="getFieldOffer(this)">Phòng ban</a><a class="suggest-field" onclick="getFieldOffer(this)">Phụ cấp ăn trưa</a><a class="suggest-field" onclick="getFieldOffer(this)">Phụ cấp điện thoại</a><a class="suggest-field" onclick="getFieldOffer(this)">Hỗ trợ xăng xe</a>
        <a class="suggest-field" onclick="getFieldOffer(this)">Phụ cấp tài xế</a><a class="suggest-field" onclick="getFieldOffer(this)">Phụ cấp khác</a>
      </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal merge -->
<div class="modal fade" id="modalMerge" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " style="width: 50%">
    <div class="modal-content " >
        <div class="modal-header modal_header_cam">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Xác nhận Ghép hồ sơ</h4>
        </div>
        <form id="formMerge">
          <div class=" modal_body_chuyen">
            <div class="body_cam col-xs-12 body_chuyen" id="body_chuyen_ghep">

            </div>
          </div>
          <div class="modal-footer modal_footer_cam">
            <button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Hủy</button>
            <button type="button" class="btn btn_tt btn_tt1" id="saveMerge"><i></i> Tiến hành</button>
          </div>
        </form>
    </div>
  </div>
</div>
<div class="hide" id="operator_js"><?php echo json_encode($operator); ?></div>
<div class="hide" id="mail_js"><?php echo json_encode($mailtemplate); ?></div>
<style type="text/css">
  .modal_header_add{
    background-color: #5fade0 !important;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
  }
  .modal_header_add > button{
    opacity: 1;
    color: white;
  }
  .suggest-field{
    color: #5fade0;
    background: #f8f9fc;
    padding: 3px;
    margin: 5px;
    display: inline-block;
    cursor: pointer;
  }
  .width_100{
    width: 100% !important;
  }
  .width_90{
    width: 90%;
  }
  .textarea_profile{
    width: 100%;
    resize: none;
    border: 1px solid #E4E4E4;
  }
  .modal{
    overflow: auto;
  }
</style>
<script type="text/javascript">
  function checkbox(id) {
    var i = id.value;
    // $('#check_mail1').toggleClass('hide');
    if ($(id).prop('checked')) {
      $('#check_mail'+i).removeClass('hide');
    }else{
      $('#check_mail'+i).addClass('hide');
    }
  }
  $(document).ready(function(){
      $('.browsebutton1 :file').change(function(e){
          $('#my-file-selector1').val();
          $(".dom_file").remove();
          var row = '';
          for(var i = 0; i< e.target.files.length; i++){
            var fileName = e.target.files[i].name;
            row += '<div class="col-md-5 dom_file"><a class="fontstyle label1" href="#">'+fileName+'</a></div>';
          }
          $(".filename_label").append(row);
      });
      $('.browsebutton2 :file').change(function(e){
          $('#my-file-selector2').val();
          $(".dom_file_1").remove();
          var row = '';
          for(var i = 0; i< e.target.files.length; i++){
            var fileName = e.target.files[i].name;
            row += '<div class="col-md-5 dom_file_1"><a class="fontstyle label1" href="#">'+fileName+'</a></div>';
          }
          $(".filename_label_1").append(row);
      });

  });

  $(document).ready(function() {
      $('.js-example-basic-1').select2();
      $('.js-example-basic-2').select2();
      $('.js-example-basic').select2();
      $('.editor').each(function(e){
        CKEDITOR.replace(this.name,{
          disableAutoInline: true,
          toolbarStartupExpanded : false,
          toolbarCanCollapse: true,
          filebrowserBrowseUrl: '<?php echo base_url('public/ckfinder/ckfinder.html') ?>',
          filebrowserUploadUrl: '<?php echo base_url('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') ?>',
          filebrowserImageBrowseUrl : '<?php echo base_url('public/ckfinder/ckfinder.html?type=Images') ?>',
          filebrowserFlashBrowseUrl : '<?php echo base_url('public/ckfinder/ckfinder.html?type=Flash') ?>',
          filebrowserImageUploadUrl : '<?php echo base_url('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') ?>',
          filebrowserFlashUploadUrl : '<?php echo base_url('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') ?>'
        });
      });
      CKEDITOR.replace('body11',{
          disableAutoInline: true,
          toolbarStartupExpanded : false,
          toolbarCanCollapse: true,
          height: 500,
          filebrowserBrowseUrl: '<?php echo base_url('public/ckfinder/ckfinder.html') ?>',
          filebrowserUploadUrl: '<?php echo base_url('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') ?>',
          filebrowserImageBrowseUrl : '<?php echo base_url('public/ckfinder/ckfinder.html?type=Images') ?>',
          filebrowserFlashBrowseUrl : '<?php echo base_url('public/ckfinder/ckfinder.html?type=Flash') ?>',
          filebrowserImageUploadUrl : '<?php echo base_url('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') ?>',
          filebrowserFlashUploadUrl : '<?php echo base_url('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') ?>'
        });

      $('#timecomplete').datetimepicker({
            format:'d/m/Y h:i',
      });

      $('#timecomplete1').datetimepicker({
        timepicker:false,
        format:'d/m/Y',
      });
      $('#timecomplete2').datetimepicker({
        timepicker:false,
        format:'d/m/Y',
      });
      initializeSelect2($(".select2"));


  });
  function initializeSelect2(selectElementObj) {
    selectElementObj.select2();
  }

  $(document).on('click', '.so', function(e) {
    if ($(this).val() == '') {
              $(this).val(0);
        }
    $(this).number( true );
    }).on('keypress', '.so',function(e){
        // if ($(this).val() == 0)
        //   $(this).val('');
        // $(this).number( true );
        if(!$.isNumeric(String.fromCharCode(e.which))) e.preventDefault();
    }).on('paste', '.so', function(e){
        var cb = e.originalEvent.clipboardData || window.clipboardData;
        if(!$.isNumeric(cb.getData('text'))) e.preventDefault();
    });


  $(document).on('click', '.datetimepicker', function() {
    $( this ).datetimepicker({
        timepicker:false,
        format:'d/m/Y',
      });
  });

  $(document).on('click', '.datepicker', function() {
    $( this ).datetimepicker({
        format:'d/m/Y H:i',
      });
  });
  $(document).on('click', '.timepicker', function() {
    $( this ).datetimepicker({datepicker:false,format:'H:i',});
  });

  $('#saveTransfer').click(function(event) {
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
    $(this).find('i').addClass('fa fa-spin fa-spinner');
    $.ajax({
      url: '<?php echo base_url()?>admin/campaign/transfer/1',
      type: 'POST',
      dataType: 'json',
      data: new FormData($('#formTransfer1')[0]),
      contentType: false,
      processData: false
    })
    .done(function(data) {
      if (data == 1) {
        alert('Chuyển vòng và gửi mail ứng viên thành công');
      }else{
        alert('Chuyển vòng thành công');
      }
      parent.parent.location.reload();
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  });
  $('#saveDiscard').click(function(event) {
    $(this).find('i').addClass('fa fa-spin fa-spinner');
    $.ajax({
      url: '<?php echo base_url()?>admin/campaign/transfer/0',
      type: 'POST',
      dataType: 'json',
      data: new FormData($('#formDiscard')[0]),
      contentType: false,
      processData: false

    })
    .done(function(data) {
      if (data == 1) {
        alert('Loại và gửi mail ứng viên thành công');
      }else{
        alert('Loại ứng viên thành công');
      }
      parent.parent.location.reload();
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  });

  function changeTemplate(id,check) {
    $(".dom_file").remove();
    // var mail = $('#mail_js').text();
    // mail = (JSON.parse(mail));
    $.ajax({
      url: '<?php echo base_url() ?>admin/email/mailById',
      type: 'POST',
      dataType: 'json',
      data: {mailid: id},
    })
    .done(function(mail) {
        if (mail != 1) {
          $('#presender'+check).val(mail[0]['presender']);
          $('#subjectmail'+check).html(mail[0]['presubject']);
          // console.log(mail[0]['prebody']);
          CKEDITOR.instances['body'+check].setData(mail[0]['prebody']);

          $('#preattach_'+check).val(mail[0]['preattach']);
          if (mail[0]['preattach'] != '') {
            preattach = JSON.parse(mail[0]['preattach']);
            var row = '';
            for(var j = 0; j< preattach.length; j++){
                row += '<div class="col-md-5 dom_file"><a class="fontstyle label1" href="#">'+preattach[j]+'</a></div>';
              }
              $("#filename_label"+check).append(row);
          }
        }
    })
    .fail(function() {
      console.log("error");
    });
  }

  $('#saveMChoice').click(function(event) {
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
    $(this).find('i').addClass('fa fa-spin fa-spinner');
    $.ajax({
      url: '<?php echo base_url()?>admin/campaign/saveAssessment',
      type: 'POST',
      dataType: 'json',
      data: new FormData($('#formCreateMChoice')[0]),
      contentType: false,
      processData: false
    })
    .done(function(data) {
      if (data == 1) {
        alert('tạo phiếu trắc nghiệm thành công');
        location.reload();
      }
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  });

  function insertPV(roundid) {
    $('#roundid_pt').val(roundid);
    $('#insertPV').modal('show');
  }
  function addPV(i) {
    var j = i+1;
    var value = $('#select_type_pt_'+i).val();
    var name = $('#select_type_pt_'+i).find(":selected").text();
    if (value != '') {
      var row = $('#body_cam_pt_'+i).clone().attr('id', 'body_cam_pt_'+j).after('#body_cam_pt_'+i);
      $('.modal_body_cam_pt').append(row);
      $('#body_cam_pt_'+j).contents().find('.fa_pt').attr('onclick', 'addPV('+j+')');
      $('#body_cam_pt_'+j).contents().find('.seletext').attr('id', 'select_type_pt_'+j);
      $('#body_cam_pt_'+j).contents().find('#show_name_pt_'+i).attr('id', 'show_name_pt_'+j);
      $('#body_cam_pt_'+j).children().attr('id', 'btn_event_pt_'+j);
      $('.js-example-basic').select2({ width: '100%' });
      $('.js-example-basic').last().next().next().remove();

      $('#show_name_pt_'+i).text(name).removeClass('hide');
      $('#select_type_pt_'+i).hide();
      $('#btn_event_pt_'+i).empty().html('<i class="fa fa-minus-circle fa-lg" onclick="subPV('+i+')"></i>');
    }else{
      alert('Bạn chưa chọn người phỏng vấn');
    }
  }
  function subPV(i) {
    $('#body_cam_pt_'+i).remove();
  }
  function subColPV(id,roundid) {
    $('#col_pt_'+id).remove();
    var manageround = $('#managePV_'+roundid).val();
    manageround1 = manageround.replace(id+',', '');
    $('#managePV_'+roundid).val(manageround1);

    // var operator = $('#operator_js').text();
    // operator = (JSON.parse(operator));
    // for(var j in operator ){
    <?php foreach ($category as $cate){ ?>
      if (id == '<?php echo $cate['code'] ?>') {
        var temp = '<?php echo $cate['ref2'] ?>';
        var listmail = $('#email_to_pv2').val();
        listmail1 = listmail.replace(temp+',', '');
        $('#email_to_pv2').val(listmail1);
      }
    <?php } ?>

  }

    $('#savePT').click(function(event) {
        var roundid = $('#roundid_pt').val();
        var data = $('#formPV').serializeArray();
        var row = '';
        var str = '';
        var email = $('#email_to_pv2').val();
        for(var i in data){
            if (data[i].value == '')
            {
                continue;
            }
            <?php foreach ($category as $cate):
                if ($cate['category'] != 'ERP') {continue;}?>
                if (data[i].value == '<?php echo $cate['code'] ?>') {
                    var name = '<?php echo $cate['ref1'] ?>';
                    var email1 = '<?php echo $cate['ref2'] ?>';
                    row ='<div class="col-md-12" id="col_pt_'+data[i].value+'" ><div class="col-md-6 manage_pv ql" style="margin-left: -30px;">';
                    row += '<div class="col-md-3" ';
                    row += 'onclick="subColPV(\'' +data[i].value+ '\','+roundid+')">';
                    row += '<img src="<?php echo base_url().'public/image/bbye.jpg' ?>"><div class="del_ql"><i class="fa fa-minus-circle fa-lg"></i></div></div>';
                    row += '<span class="body-blac4" style="font-size:16px;">'+name+'</span></div>';
                    row += '<div class="col-md-6" style="margin-top: 10px;float: right;"><select class="js-example-basic-2 select2" name="pv[]" required="" style="width: 100%">';
                    <?php foreach ($asmt_pv as $key): ?>
                       row += '<option value="<?php echo $key['asmttemp'] ?>"><?php echo $key['asmtname'] ?></option>';
                    <?php endforeach ?>
                    row += '</select></div></div>';

                    $('#col_add_pt_'+roundid).before(row);
                    initializeSelect2($(".select2"));

                    var temp = email1;
                    email += temp+', ';
                }
            <?php endforeach ?>
      // for(var j in operator ){

      // }
            str += data[i].value + ',';
        }
        $('#email_to_pv2').val(email);
        var manageround = $('#managePV_'+roundid).val();
        if(manageround != ''){
          manageround += str;
        }else{
          manageround = str;
        }
        $('#managePV_'+roundid).val(manageround);

        $('.option_add_'+roundid).remove();
        var option = '';
        var arr = manageround.split(',');
        for(var k in arr){
            <?php foreach ($category as $cate){ ?>
                var name = '<?php echo $cate['ref1'] ?>';
          // for(var j in operator ){
                if (arr[k] == '<?php echo $cate['code'] ?>') {
                  option += '<option class="option_add_'+roundid+'" value="'+arr[k]+'">'+name+'</option>';
                  break;
                }
            <?php } ?>
        }
        $('#option_'+roundid).after(option);
        $('#insertPV').modal('hide');
    });



  $('#saveAppointment').click(function(event) {
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
    $(this).find('i').addClass('fa fa-spin fa-spinner');
    $.ajax({
      url: '<?php echo base_url()?>admin/interview/saveAppointment',
      type: 'POST',
      dataType: 'json',
      data: new FormData($('#formAppointment')[0]),
      contentType: false,
      processData: false
    })
    .done(function(data) {
      if (data == 1) {
        alert('tạo lịch phỏng vấn thành công');
        location.reload();
      }
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  });

  $('#saveOffer').click(function(event) {
    var check = $('#check_offer').val();
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
    if ($('#tempid11').val() == 0) {
      alert('Bạn chưa chọn mẫu in');
    }else{
      $(this).find('i').addClass('fa fa-spin fa-spinner');
      $.ajax({
        url: '<?php echo base_url()?>admin/offer/saveOffer',
        type: 'POST',
        dataType: 'json',
        data: new FormData($('#formOffer')[0]),
        contentType: false,
        processData: false
      })
      .done(function(data) {
        if (data == 1) {
          location.reload();
          if (check == 0) {
            if ($('#inputcheckmail_5').prop('checked')) {
              alert('Tạo đề nghị và gửi email thành công');
            }else{
              alert('Tạo đề nghị thành công');
            }
          }else{
            if ($('#inputcheckmail_5').prop('checked')) {
              alert('Cập nhật đề nghị và gửi email thành công');
            }else{
              alert('Cập nhật đề nghị thành công');
            }
          }

        }
      })
      .fail(function() {
        console.log("error");
      });
    }
  });

  $('#saveMail').click(function(event) {
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
    $(this).find('i').addClass('fa fa-spin fa-spinner');
    $.ajax({
      url: '<?php echo base_url()?>admin/campaign/sendMail',
      type: 'POST',
      dataType: 'json',
      data: new FormData($('#formMail')[0]),
      contentType: false,
      processData: false
    })
    .done(function(data) {
      if (data == 1) {
        // location.reload();
        $('#saveMail').find('i').removeClass('fa fa-spin fa-spinner');
        $('#modalMail').modal('hide');
        alert('gửi mail thành công');

      }
    })
    .fail(function() {
      alert('gửi mail thất bại');
    });

  });

  function changeDate(intdate) {
    $('#events_pv').empty();
    var campaignid = $('#campaignid_pv').val();
    $.ajax({
      url: '<?php echo base_url() ?>admin/interview/interviewByDate',
      type: 'POST',
      dataType: 'json',
      data: {intdate: intdate, campaignid: campaignid},
    })
    .done(function(data) {
      var row = '';
      for(var i in data){
        row += '<p><span style="font-weight: 700">'+data[i]['timefrom']+' → '+data[i]['timeto']+'</span> - '+data[i]['name']+' - ('+data[i]['interviewer']+')</p>';
      }
      if (row == '') {
        row ='Chưa có lịch phỏng vấn';
      }
      $('#events_pv').prepend(row);
    })
    .fail(function() {
      console.log("error");
    });

  }
  function insertField(check) {
    $('#check').val(check);
    $('#insertSubject').modal('show');
  }
  function getField(id) {
    var value = ' <span style="color:#3498db;">['+id.text+']&nbsp;</span> ';
    var check = $('#check').val();
    CKEDITOR.instances['body'+check].insertHtml(value);
    $('#insertSubject').modal('hide');
  }

  function changeTemplateOffer(id,check) {
    $.ajax({
      url: '<?php echo base_url() ?>admin/printtemp/getTemplate',
      type: 'POST',
      dataType: 'json',
      data: {tempid: id},
    })
    .done(function(data) {
        $('#subject'+check).text(data['subject']);
        CKEDITOR.instances['body'+check].setData(data['body']);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  }
  function insertFieldOffer(check) {
    $('#checkOffer').val(check);
    $('#insertOffer').modal('show');
  }
  function getFieldOffer(id) {
    var value = ' <span style="color:#3498db;">['+id.text+']&nbsp;</span> ';
    var check = $('#checkOffer').val();
    CKEDITOR.instances['body'+check].insertHtml(value);
    $('#insertOffer').modal('hide');
  }
  function loadCategory(id_trainer,id_reportto,id_level,id_position,id_department) {

    // var count_trainer     =  $('#select_trainer option').length;
    // var count_reportto    =  $('#select_reportto option').length;
    var count_level       =  $('#select_level option').length;
    var count_position    =  $('#select_position option').length;
    var count_department  =  $('#select_department option').length;
    $.ajax({
      url: '<?php echo base_url('admin/offer/loadCategory') ?>',
      type: 'POST',
      dataType: 'json',
      data: {},
    })
    .done(function(data) {
      // console.log(data);
      var row1 = row2 = row3 = row4 = row5 = '<option value="0">Vui lòng chọn</option>';
      if (data['position'].length != count_position) {
        for(var i in data['position']){
          var key = data['position'][i];
          row1 += '<option value="'+key['code']+'">'+key['code']+' - '+key['description']+'</option>';
          row4 += '<option value="'+key['code']+'">'+key['description']+'</option>';
        }

        $('#select_trainer').empty().prepend(row1);
        $('#select_reportto').empty().prepend(row1);
        $('#select_position').empty().prepend(row4);

        $('#select_trainer').val(id_trainer).change();
        $('#select_reportto').val(id_reportto).change();
        $('#select_position').val(id_position).change();
      }
      if (data['capbac'].length != count_level) {
        for(var i in data['capbac']){
          var key = data['capbac'][i];
          row2 += '<option value="'+key['code']+'">'+key['description']+'</option>';
        }

        $('#select_level').empty().prepend(row2);

        $('#select_level').val(id_level).change();
      }
      if (data['dept'].length != count_department) {
        for(var i in data['dept']){
          var key = data['dept'][i];
          row3 += '<option value="'+key['code']+'">'+key['description']+'</option>';
        }

        $('#select_department').empty().prepend(row3);

        $('#select_department').val(id_department).change();
      }

    })
    .fail(function() {
      console.log("error");
    });
  }
  var interval;

  function loadCategoryOffer() {

    interval = setInterval(function(){


        var id_trainer    = $('#select_trainer').val();
        var id_reportto   = $('#select_reportto').val();
        var id_level      = $('#select_level').val();
        var id_position   = $('#select_position').val();
        var id_department = $('#select_department').val();
        // console.log(id_trainer);
        loadCategory(id_trainer,id_reportto,id_level,id_position,id_department); // this will run after every 5 seconds
    }, 5000);
  }
  $('#createOffer').on('hidden.bs.modal', function () {
    clearInterval(interval);
  });

  $('#saveMerge').click(function(event) {
    $(this).find('i').addClass('fa fa-spin fa-spinner');
    $.ajax({
      url: '<?php echo base_url()?>admin/handling/mergeCandidate',
      type: 'POST',
      dataType: 'json',
      data: new FormData($('#formMerge')[0]),
      contentType: false,
      processData: false
    })
    .done(function(data) {
      if (data == 1) {
        // location.reload();
        $('#saveMerge').find('i').removeClass('fa fa-spin fa-spinner');
        $('#modalMerge').modal('hide');
        alert('Ghép ứng viên thành công');

      }
    })
    .fail(function() {
      alert('Ghép ứng viên thất bại');
    });
  });
</script>