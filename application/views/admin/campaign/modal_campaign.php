<div class="modal fade" id="transferHS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog ">
    <div class="modal-content " >
        <div class="modal-header modal_header_cam">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Xác nhận Chuyển hồ sơ</h4>
        </div>
        <form id="formTransfer">
          <div class=" modal_body_chuyen">
            <div class="body_cam col-xs-12 body_chuyen" id="body_chuyen">
              
            </div>
            <div class="col-xs-12 body_chuyen_1">
              <div class="col-xs-4">
                <label class="label_chon">Chọn vòng cần chuyển</label>
              </div>
              <div class="col-xs-8">
                <select class="selecttext js-example-basic-2 select_chuyen" name="roundid">
                </select>
              </div>
            </div>
            <div class="col-xs-12 body_chuyen_2">
              <label class="share_chuyen"><input type="checkbox" onclick="checkbox(this)" name="checkmail" value="1">  Gửi email thông báo</label>
            </div>
            <div class="hide" id="check_mail1">
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
                          <select class="js-example-basic-2" name="status3" required="" onchange="changeTemplate(this.value,5)" style="width: 50%">
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
                    <div class="width80 col-xs-9 padding-lr0 filename_label">
                      <div class="col-md-6">
                        <label class="fontArial colorcyan labelcontent browsebutton1"><input id="my-file-selector1" name="attach[]" multiple="" type="file" accept=".pdf,.doc,.docx,.xlsx" style="display:none;"><i class="fa fa-paperclip"></i> Tài liệu đính kèm</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <input type="hidden" name="campaignid" id="campaignid_tran" value="">
          </div>
          <div class="modal-footer modal_footer_cam">
            <label class="share_chuyen"><input type="checkbox" name="isshare" value="Y"> Không chia sẻ nội dung này</label>
            <button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Hủy</button>
            <button type="button" class="btn btn_tt btn_tt1" id="saveTransfer" data-dismiss="modal">Lưu</button>
          </div>
        </form>
    </div>
  </div>
</div>
<div class="modal fade" id="discardHS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog ">
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
                <select class="selecttext js-example-basic-2 select_chuyen select_loai" >
                </select>
              </div>
            </div>
            <div class="col-xs-12 body_chuyen_2">
              <label class="share_chuyen"><input type="checkbox" onclick="checkbox(this)" name="checkmail" value="2">  Gửi email thông báo</label>
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
                          <select class="js-example-basic-2" name="status3" required="" onchange="changeTemplate(this.value,6)">
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
                    <div class="width80 col-xs-9 padding-lr0 filename_label">
                      <div class="col-md-6">
                        <label class="fontArial colorcyan labelcontent browsebutton1"><input id="my-file-selector1" name="attach[]" multiple="" type="file" accept=".pdf,.doc,.docx,.xlsx" style="display:none;"><i class="fa fa-paperclip"></i> Tài liệu đính kèm</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <input type="hidden" name="campaignid" id="campaignid_dis" value="">
            <input type="hidden" name="roundid" id="roundid" value="">
          </div>
          <div class="modal-footer modal_footer_cam">
            <label class="share_chuyen"><input type="checkbox" name=""> Không chia sẻ nội dung này</label>
            <button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Hủy</button>
            <button type="button" class="btn btn_tt btn_tt1" id="saveDiscard" data-dismiss="modal">Lưu</button>
          </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="createMultiChoice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " style="width: 60%">
    <div class="modal-content " >
        <div class="modal-header modal_header_cam">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tạo phiếu trắc nghiệm</h4>
        </div>
        <input type="hidden" id="count_candidate" value="0">
        <form id="formCreateMChoice">
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
                        <select class="js-example-basic-2" name="status3" required="" onchange="changeTemplate(this.value,1)" style="width: 50%">
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
                  <div class="width80 col-xs-9 padding-lr0 filename_label">
                    <div class="col-md-3">
                      <label class="fontArial colorcyan labelcontent browsebutton1"><input id="my-file-selector1" name="attach[]" multiple="" type="file" accept=".pdf,.doc,.docx,.xlsx" style="display:none;"><i class="fa fa-paperclip"></i> Tài liệu đính kèm</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer modal_footer_cam">
            <label class="share_chuyen"><input type="checkbox" name="isshare" value="N"> Không chia sẻ nội dung này</label>
            <button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Hủy</button>
            <button type="button" class="btn btn_tt btn_tt1" id="saveMChoice" data-dismiss="modal">Lưu</button>
          </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="createAppointment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                        <input class="kttext width_100 datetimepicker" type="text" name="intdate" value="<?php echo date_format(date_create(),"d/m/Y") ?>">
                      </div>
              </div>
              <div class="rowedit3">
                      <div class="col-xs-2 guide-black cc">
                        Các PV trong ngày:
                      </div>
                      <div class="col-xs-10 timeappoint">
                        <p><span style="font-weight: 700">08:00 → 09:00</span> - Trần Thanh Hùng - (Jimmy Nguyen/ Phương Mai)</p>
                        <p><span style="font-weight: 700">09:00 → 10:00</span> - Lê Nguyễn Hương Lan - (Jimmy Nguyen/ Phương Mai)</p>
                        <p><span style="font-weight: 700">10:00 → 11:00</span> - Trương Minh Quang - (Jimmy Nguyen/ Phương Mai)</p>
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
                        <select class="js-example-basic-2" name="status3" required="" onchange="changeTemplate(this.value,2)" style="width: 50%">
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
                  <div class="width80 col-xs-9 padding-lr0 filename_label">
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
                        <input class="kttext width_100"  type="text" name="bcc_12" >
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
                  <div class="width80 col-xs-9 padding-lr0 filename_label_1">
                    <div class="col-md-3">
                      <label class="fontArial colorcyan labelcontent browsebutton2"><input id="my-file-selector2" name="attach2[]" multiple="" type="file" accept=".pdf,.doc,.docx,.xlsx" style="display:none;"><i class="fa fa-paperclip"></i> Tài liệu đính kèm</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <input type="hidden" name="count" id="count_candidate_pv" >
            <input type="hidden" name="campaignid" id="campaignid_pv" value="">
            <input type="hidden" name="roundid" id="roundid_pv" value="">
          </div>
          <div class="modal-footer modal_footer_cam">
            <label class="share_chuyen"><input type="checkbox" name="isshare" value="N"> Không chia sẻ nội dung này</label>
            <button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Hủy</button>
            <button type="button" class="btn btn_tt btn_tt1" id="saveAppointment" data-dismiss="modal">Lưu</button>
          </div>
        </form>
    </div>
  </div>
</div>

<!-- thư mời nhận việc -->
<div class="modal fade" id="createOffer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                        <select class="js-example-basic-2" name="status3" required="" onchange="changeTemplate(this.value,4)" style="width: 50%">
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
                  <div class="width80 col-xs-9 padding-lr0 filename_label_1">
                    <div class="col-md-4">
                      <label class="fontArial colorcyan labelcontent browsebutton2"><input id="my-file-selector2" name="attach[]" multiple="" type="file" accept=".pdf,.doc,.docx,.xlsx" style="display:none;"><i class="fa fa-paperclip"></i> Tài liệu đính kèm</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <input type="hidden" name="count" id="count_candidate_offer" >
            <input type="hidden" name="campaignid" id="campaignid_offer" value="">
            <input type="hidden" name="roundid" id="roundid_offer" value="">
          </div>
          <div class="modal-footer modal_footer_cam">
            <label class="share_chuyen"><input type="checkbox" name="isshare" value="N"> Không chia sẻ nội dung này</label>
            <button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Hủy</button>
            <button type="button" class="btn btn_tt btn_tt1" id="saveOffer" data-dismiss="modal">Tiến hành</button>
          </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="insertPV" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width_450">
    <div class="modal-content " >
        <div class="modal-header modal_header_cam">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thêm phụ trách vòng </h4>
        </div>
        <input type="hidden" id="roundid_pt">
        <form id="formPV">
          <div class="modal-body modal_body_cam_pt">
            <div class="body_cam" id="body_cam_pt_1">
              <div class="col-xs-1" id="btn_event_pt_1">
                <i class="fa fa-plus-circle fa-lg fa_pt" onclick="addPV(1)"></i>
              </div>
              <div class="col-xs-11">
                <select class="seletext js-example-basic" name="managecampaign[]" required="" id="select_type_pt_1" style="width: 100%">
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
        <a class="suggest-field" onclick="getField(this)">Tên Ứng viên</a><a class="suggest-field" onclick="getField(this)">Tuyển dụng viên</a><a class="suggest-field" onclick="getField(this)">Tên</a><a class="suggest-field" onclick="getField(this)">Vị trí</a><a class="suggest-field" onclick="getField(this)">Vòng phỏng vấn</a><a class="suggest-field" onclick="getField(this)">Link phiếu trắc nghiệm</a><a class="suggest-field" onclick="getField(this)">Link phiếu mời tham dự phỏng vấn</a><a class="suggest-field" onclick="getField(this)">Link phiếu đánh giá</a><a class="suggest-field" onclick="getField(this)">Ghi chú</a>
      </div>
      </div>
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
            row += '<div class="col-md-3 dom_file"><a class="fontstyle label1" href="#">'+fileName+'</a></div>';
          }
          $(".filename_label").append(row);
      });
      $('.browsebutton2 :file').change(function(e){
          $('#my-file-selector2').val();
          $(".dom_file_1").remove();
          var row = '';
          for(var i = 0; i< e.target.files.length; i++){
            var fileName = e.target.files[i].name;
            row += '<div class="col-md-3 dom_file_1"><a class="fontstyle label1" href="#">'+fileName+'</a></div>';
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
          allowedContent: false,
          disableAutoInline: true,
          toolbarStartupExpanded : false,
          toolbarCanCollapse: true
        });
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
      
  });
  $(document).on('click', '.datetimepicker', function() {
    $( this ).datetimepicker({
        timepicker:false,
        format:'d/m/Y',
      });
  });
  $(document).on('click', '.datepicker', function() {
    $( this ).datetimepicker();
  });
  $(document).on('click', '.timepicker', function() {
    $( this ).datetimepicker({datepicker:false,format:'H:i',});
  });

  $('#saveTransfer').click(function(event) {
    $.ajax({
      url: '<?php echo base_url()?>admin/campaign/transfer/1',
      type: 'POST',
      dataType: 'json',
      data: new FormData($('#formTransfer')[0]),
      contentType: false,
      processData: false
    })
    .done(function(data) {
      if (data == 1) {
        parent.parent.location.reload();
      }
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
  });
  $('#saveDiscard').click(function(event) {
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
        parent.parent.location.reload();
      }
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
  });

  function changeTemplate(id,check) {
    var mail = $('#mail_js').text();
    mail = (JSON.parse(mail));
    for(var i in mail){
      if (id == mail[i]['mailprofileid']) {
        $('#subjectmail'+check).html(mail[i]['presubject']);
        CKEDITOR.instances['body'+check].setData(mail[i]['prebody']);
      }
    }
  }
  $('#saveMChoice').click(function(event) {
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
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
        alert('tạo thành công');
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

    var operator = $('#operator_js').text();
    operator = (JSON.parse(operator));
    for(var j in operator ){
      if (id == operator[j]['operatorid']) { 
        var temp = operator[j]['email'];
        var listmail = $('#email_to_pv2').val();
        listmail1 = listmail.replace(temp+',', '');
        $('#email_to_pv2').val(listmail1);
      } 
    }
    
  }

  $('#savePT').click(function(event) {
    var roundid = $('#roundid_pt').val();
    var operator = $('#operator_js').text();
    operator = (JSON.parse(operator));
    var data = $('#formPV').serializeArray();
    var row = '';
    var str = '';
    var email = $('#email_to_pv2').val();
    for(var i in data){
      if (data[i].value == '')
      { 
        continue;
      }
      for(var j in operator ){
        if (data[i].value == operator[j]['operatorid']) { 
          row ='<div class="col-md-6 manage_pv ql" id="col_pt_'+data[i].value+'" onclick="subColPV('+data[i].value+','+roundid+')">';
          row += '<div class="col-md-3"><img src="<?php echo base_url() ?>public/image/bbye.jpg"><div class="del_ql"><i class="fa fa-minus-circle fa-lg"></i></div></div>';
          row += '<span class="body-blac4">'+operator[j]['operatorname']+'</span></div>';
          $('#col_add_pt_'+roundid).before(row);

          var temp = operator[j]['email'];
            email += temp+', ';
        } 
      }
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
      for(var j in operator ){
        if (arr[k] == operator[j]['operatorid']) { 
          option += '<option class="option_add_'+roundid+'" value="'+arr[k]+'">'+operator[j]['operatorname']+'</option>';
          break;
        }
      }
    }
    $('#option_'+roundid).after(option);
    $('#insertPV').modal('hide');    
  });

  $('#saveAppointment').click(function(event) {
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
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
        alert('tạo thành công');
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
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
    $.ajax({
      url: '<?php echo base_url()?>admin/interview/saveOffer',
      type: 'POST',
      dataType: 'json',
      data: new FormData($('#formOffer')[0]),
      contentType: false,
      processData: false
    })
    .done(function(data) {
      if (data == 1) {
        // location.reload();
        alert('tạo thành công');
      }
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
  });

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
</script>