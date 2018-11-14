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
              <label class="label_chon"><input type="checkbox" name=""> Gửi email thông báo</label>
            </div>
            <input type="hidden" name="campaignid" id="campaignid_tran" value="">
          </div>
          <div class="modal-footer modal_footer_cam">
            <label class="share_chuyen"><input type="checkbox" name=""> Không chia sẻ nội dung này</label>
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
              <label class="label_chon"><input type="checkbox" name=""> Gửi email thông báo</label>
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
                        <input class="kttext width_100" type="text" id="email_to_tn" placeholder="" name="to" value="">
                      </div>
              </div>
              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc">
                        Cc:
                      </div>
                      <div class="col-xs-11">
                        <input class="kttext width_100" type="text" id="ngaycap" placeholder="" name="cc" value="">
                      </div>
              </div>
              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc">
                        Bcc:
                      </div>
                      <div class="col-xs-11">
                        <input class="kttext width_100" type="text" id="ngaycap" placeholder="" name="bcc" value="">
                      </div>
              </div>
            </div>
            <div class="col-xs-12 body_chuyen_2">
              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc" style="color: #5FA2DD;">
                        Mẫu thư:
                      </div>
                      <div class="col-xs-9">
                        <select class="js-example-basic-2" name="status3" required="" id="select_status3">
                          <option value="W">Trắc nghiệm kiến thức tổng quát</option>
                          <option value="C">Trắc nghiệm kiến thức chuyên môn</option>
                        </select>
                        <i class="fa fa-info-circle info-circle-font-awesome" aria-hidden="true"></i>
                      </div>
              </div>

              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc">
                        Tiêu đề:
                      </div>
                      <div class="col-xs-11">
                        <input class="kttext width_100" type="text" id="ngaycap" placeholder="" name="subject" value="">
                      </div>
              </div>
              <div class="rowedit3">
                      <div class="col-xs-1 guide-black cc">
                        Ghi chú:
                      </div>
                      <div class="col-xs-11">
                        <textarea name="body" class="textarea_profile" rows="3" required="">
                          Xin chào $name,<br>

                          Hồ sơ của bạn đã đạt vòng Sơ loại của chúng tôi, <br>

                          Chúng tôi xin gửi đến $name phiếu câu hỏi trắc nghiệm kiến thức tổng quát theo đường link dưới đây: <br>

                          → $link <br>

                          $name hãy thực hiện phiếu trắc nghiệm này theo hướng dẫn, kết quả của phiếu trắc nghiệm này là cơ sở để thực hiện các bước tiếp theo trong quy trình phỏng vấn/ <br>

                          $note <br>

                          Trân trọng,
                        </textarea>
                      </div>
              </div>
              <div class="rowedit2">
                <div class="col-xs-1 guide-black cc">
                </div>
                <div class="col-xs-11">
                  <div class="width80 col-xs-9 padding-lr0">Ó
                    <div class="col-md-3">
                      <label class="fontArial colorcyan labelcontent browsebutton1"><input id="my-file-selector1" name="attach" type="file" accept=".pdf,.doc,.docx,.xlsx" style="display:none;"><i class="fa fa-paperclip"></i> Tài liệu đính kèm</label>
                    </div>
                    <div>
                      <a   class="fontstyle label1"  href=""></a> 
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
                        <input class="kttext width_100 datetimepicker" type="text" name="intdate" value="">
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
                        <input class="kttext width_100" type="text" id="ngaycap" name="cc1" >
                      </div>
              </div>
              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc">
                        Bcc:
                      </div>
                      <div class="col-xs-11">
                        <input class="kttext width_100" type="text" id="email_bcc_pv1" name="bcc1" >
                      </div>
              </div>
            </div>

            <div class="col-xs-12 body_chuyen_2">
              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc" style="color: #5FA2DD;">
                        Mẫu thư:
                      </div>
                      <div class="col-xs-9">
                        <select class="js-example-basic-1" name="status26" required="" >
                          <option value="W">Thư mời phỏng vấn</option>
                        </select>
                        <i class="fa fa-info-circle info-circle-font-awesome" aria-hidden="true"></i>
                      </div>
              </div>

              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc">
                        Tiêu đề:
                      </div>
                      <div class="col-xs-11">
                        <input class="kttext width_100"  type="text" name="subject1" >
                      </div>
              </div>
              <div class="rowedit3">
                      <div class="col-xs-1 guide-black" style="padding: 0px">
                        Nội dung:
                      </div>
                      <div class="col-xs-11">
                        <textarea name="body1" class="textarea_profile"  rows="3" required="">
                          Xin chào $name, <br>

                          Hồ sơ của $name đã đạt đến vòng $round của chúng tôi, <br>

                          Chúng tôi rất hân hạnh được sắp xếp một buổi gặp gỡ với $name để có thể trao đổi thêm về nội dung công việc,
                          xin gửi đến $name phiếu thông tin phỏng vấn, $name hãy xác nhận khả năng có mặt theo ngày/ giờ/ địa điểm trong đường link dưới đây nhé: <br>

                          → $link <br>

                          Hẹn gặp lại, <br>

                          Trân trọng.
                        </textarea>
                      </div>
              </div>
              <div class="rowedit2">
                <div class="col-xs-1 guide-black cc">
                </div>
                <div class="col-xs-11">
                  <div class="width80 col-xs-9 padding-lr0">
                    <div class="col-md-3">
                      <label class="fontArial colorcyan labelcontent browsebutton1"><input id="my-file-selector1" name="attach1" type="file" accept=".pdf,.doc,.docx,.xlsx" style="display:none;"><i class="fa fa-paperclip"></i> Tài liệu đính kèm</label>
                    </div>
                    <div>
                      <a   class="fontstyle label1"  href=""></a> 
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
                        <input class="kttext width_100" type="text"  name="cc2" >
                      </div>
              </div>
              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc">
                        Bcc:
                      </div>
                      <div class="col-xs-11">
                        <input class="kttext width_100"  type="text" name="bcc2" >
                      </div>
              </div>
            </div>

            <div class="col-xs-12 body_chuyen_2">
              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc" style="color: #5FA2DD;">
                        Mẫu thư:
                      </div>
                      <div class="col-xs-9">
                        <select class="js-example-basic-2" name="status26" required="" >
                          <option value="W">Thư mời Tham dự phỏng vấn</option>
                        </select>
                        <i class="fa fa-info-circle info-circle-font-awesome" aria-hidden="true"></i>
                      </div>
              </div>

              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc">
                        Tiêu đề:
                      </div>
                      <div class="col-xs-11">
                        <input class="kttext width_100"  type="text" name="subject2">
                      </div>
              </div>
              <div class="rowedit3">
                      <div class="col-xs-1 guide-black" style="padding: 0px">
                        Nội dung:
                      </div>
                      <div class="col-xs-11">
                        <textarea name="body2" class="textarea_profile" rows="3" required="">
                          Xin chào $name <br>

                          Bộ phận Tuyển dụng Dat Xanh Group xin gửi đến $name lịch phỏng vấn ứng viên: $candidate, vị trí ứng tuyển: $position - $round <br>
                          → $link1 <br>

                          Vui lòng xác nhận ngày/ giờ/ địa điểm theo lịch trên và sử dụng phiếu đánh giá dưới đây để ghi nhận kết quả phỏng vấn<br>
                          → $link2 <br>


                          Trân trọng,
                        </textarea>
                      </div>
              </div>
              <div class="rowedit2">
                <div class="col-xs-1 guide-black cc">
                </div>
                <div class="col-xs-11">
                  <div class="width80 col-xs-9 padding-lr0" "="">
                    <div class="col-md-3">
                      <label class="fontArial colorcyan labelcontent browsebutton1"><input id="my-file-selector1" name="attach2" type="file" accept=".pdf,.doc,.docx,.xlsx" style="display:none;"><i class="fa fa-paperclip"></i> Tài liệu đính kèm</label>
                    </div>
                    <div>
                      <a   class="fontstyle label1"  href=""></a> 
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






<!-- <div class="modal fade" id="changeAssessment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " style="width: 60%">
    <div class="modal-content " >
        <div class="modal-header modal_header_cam">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thay đổi phiếu đánh giá phỏng vấn</h4>
        </div>
        <form id="formDiscard">
          <div class=" modal_body_chuyen">
            <div class="body_cam col-xs-12 body_chuyen" id="body_loai">
              <div class="row" style="margin-right: 0px">
                <div class="col-md-3 box_profile_tn">
                  <div class="profile_tn">
                    <img src="http://recruit.tavicosoft.com/public/image/unknow.jpg" >
                    <p class="guide-black">Nguyễn Huy Hoàng</p>
                  </div>
                </div>
                <div class="col-md-9 border_left_ddd" >
                    <p class="titleAppoint1">Thời gian/Địa điểm</p>
                    <p class="timeappoint1">Thứ 3, 04 Tháng 09 Năm 2018<br>14:00 → 15:00<br>Toà nhà Đất Xanh Group<br>27 Đinh Bộ Lĩnh, Quận Bình Thạnh</p>
                    <p class="titleAppoint1">Nội dung/ hướng dẫn</p>
                    <p class="timeappoint1">Trao đổi về vị trí công việc mà bạn đang ứng tuyển và định hướng nghề nghiệp trong thời gian tới.</p>
                    <div >
                      <p class="titleAppoint1">Người phỏng vấn</p>
                      <div class="col-md-4 padding_0 manage_pv ql">
                        <div class="col-md-3 ">
                          <img  src="<?php echo base_url() ?>public/image/bbye.jpg">
                        </div>
                        <div class="col-md-9 padding_0">
                          <div class="body-blac5a">Nguyễn Huy Hoàng</div>
                        </div>
                      </div>
                      <div class="col-md-4 padding_0 manage_pv ql">
                        <div class="col-md-3 ">
                          <img  src="<?php echo base_url() ?>public/image/bbye.jpg">
                        </div>
                        <div class="col-md-9 padding_0">
                          <div class="body-blac5a">Nguyễn Huy Hoàng</div>
                        </div>
                      </div>
                    </div>
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
                      <select class="js-example-basic-2">
                        <option>Phiếu phỏng vấn BM004/05</option>
                      </select>
                    </div>
                  </div>
                  <div class="row margin_top_15" >
                    <div class="col-md-4 padding_0">
                      <span>Người phụ trách phiếu</span>
                    </div>
                    <div class="col-md-8 padding_0">
                      <select class="js-example-basic-2">
                        <option>Jimmy Nguyen</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xs-12 body_chuyen_2">
              <div class="rowedit2">
                      <p class="titleAppoint">Thư thông báo thay đổi phiếu phỏng vấn</p>
              </div>
              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc">
                        Gửi đến:
                      </div>
                      <div class="col-xs-11">
                        <input class="kttext" style="width: 100%" type="text" id="ngaycap" placeholder="" name="publishdate" value="">
                      </div>
              </div>
              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc">
                        Cc:
                      </div>
                      <div class="col-xs-11">
                        <input class="kttext" style="width: 100%" type="text" id="ngaycap" placeholder="" name="publishdate" value="">
                      </div>
              </div>
              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc">
                        Bcc:
                      </div>
                      <div class="col-xs-11">
                        <input class="kttext" style="width: 100%" type="text" id="ngaycap" placeholder="" name="publishdate" value="">
                      </div>
              </div>
            </div>

            <div class="col-xs-12 body_chuyen_2">
              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc" style="color: #5FA2DD;">
                        Mẫu thư:
                      </div>
                      <div class="col-xs-9">
                        <select class="js-example-basic-2" name="status26" required="">
                          <option value="W">Thư thông báo thay đổi người phụ trách phiếu</option>
                        </select>
                        <i class="fa fa-info-circle info-circle-font-awesome" aria-hidden="true"></i>
                      </div>
              </div>

              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc">
                        Tiêu đề:
                      </div>
                      <div class="col-xs-11">
                        <input class="kttext" style="width: 100%" type="text" id="ngaycap" placeholder="" name="publishdate" value="<?php echo isset($news[0]['publishdate'])? date_format(date_create($news[0]['publishdate']),"d/m/Y") :'' ?>">
                      </div>
              </div>
              <div class="rowedit3">
                      <div class="col-xs-1 guide-black" style="padding: 0px">
                        Nội dung:
                      </div>
                      <div class="col-xs-11">
                        <textarea name="body3" style="width: 100%;resize: none;border: 1px solid #E4E4E4;" rows="3" required=""><?php echo isset($news[0]['body'])? $news[0]['body']: ''; ?></textarea>
                      </div>
              </div>
              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc">
                      </div>
                      <div class="col-xs-11">
                        <div class="width80 col-xs-9 padding-lr0" "="">
                     <label class="fontArial colorcyan labelcontent"><i class="fa fa-upload"></i> Đính kèm</label>
                     
                    </div>
                      </div>
              </div>
            </div>
            <input type="hidden" name="campaignid" id="campaignid" value="">
            <input type="hidden" name="roundid" id="roundid" value="">
          </div>
          <div class="modal-footer modal_footer_cam">
            <label class="share_chuyen"><input type="checkbox" name=""> Không chia sẻ nội dung này</label>
            <button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Hủy</button>
            <button type="button" class="btn btn_tt btn_tt1" id="saveDiscard" data-dismiss="modal">Tiến hành</button>
          </div>
        </form>
    </div>
  </div>
</div> -->
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
                      <div class="col-xs-9">
                        <select class="js-example-basic-2" name="status26" required="">
                          <option value="W">Thư thông báo thay đổi người phụ trách phiếu</option>
                        </select>
                        <i class="fa fa-info-circle info-circle-font-awesome" aria-hidden="true"></i>
                      </div>
              </div>

              <div class="rowedit2">
                      <div class="col-xs-1 guide-black cc">
                        Tiêu đề:
                      </div>
                      <div class="col-xs-11">
                        <input class="kttext width_100" type="text" name="subject" value="">
                      </div>
              </div>
              <div class="rowedit3">
                      <div class="col-xs-1 guide-black" style="padding: 0px">
                        Nội dung:
                      </div>
                      <div class="col-xs-11">
                        <textarea name="body3" class="textarea_profile" rows="3" required=""></textarea>
                      </div>
              </div>
              <div class="rowedit2">
                <div class="col-xs-1 guide-black cc">
                </div>
                <div class="col-xs-11">
                  <div class="width80 col-xs-9 padding-lr0" >
                    <div class="col-md-4">
                      <label class="fontArial colorcyan labelcontent browsebutton1"><input id="my-file-selector1" name="attach2" type="file" accept=".pdf,.doc,.docx,.xlsx" style="display:none;"><i class="fa fa-paperclip"></i> Tài liệu đính kèm</label>
                    </div>
                    <div>
                      <a   class="fontstyle label1"  href=""></a> 
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

<div class="hide" id="operator_js"><?php echo json_encode($operator); ?></div>
<style type="text/css">
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
  $(document).ready(function(){
      $('.browsebutton1 :file').change(function(e){
          $(".label1").empty();
          var fileName = e.target.files[0].name;
          $(".label1").text(fileName);
          $(".label1").attr('href','#');
      });
  });   
  $(document).ready(function() {
      $('.js-example-basic-1').select2();
      $('.js-example-basic-2').select2();
      $('.js-example-basic').select2();
      CKEDITOR.replace('body',{
        allowedContent: true,
          disableAutoInline: true,
          toolbarStartupExpanded : false,
          toolbarCanCollapse: true
      });
      CKEDITOR.replace('body1',{
        allowedContent: true,
          disableAutoInline: true,
          toolbarStartupExpanded : false,
          toolbarCanCollapse: true
      });
      $('#timecomplete').datetimepicker({
            format:'d/m/Y h:i',
      });
      CKEDITOR.replace('body2',{
        allowedContent: true,
          disableAutoInline: true,
          toolbarStartupExpanded : false,
          toolbarCanCollapse: true
      });

      CKEDITOR.replace('body3',{
              allowedContent: true,
                disableAutoInline: true,
                toolbarStartupExpanded : false,
                toolbarCanCollapse: true
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
      data: $('#formTransfer').serialize(),
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
      data: $('#formDiscard').serialize(),
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

  $('#saveMChoice').click(function(event) {
    $.ajax({
      url: '<?php echo base_url()?>admin/campaign/saveAssessment',
      type: 'POST',
      dataType: 'json',
      data: $('#formCreateMChoice').serialize(),
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
  function subColPV(id,roundid,name) {
    $('#col_pt_'+id).remove();
    var manageround = $('#managePV_'+roundid).val();
    manageround1 = manageround.replace(id+',', '');
    $('#managePV_'+roundid).val(manageround1);

    var operator = $('#operator_js').text();
    operator = (JSON.parse(operator));
    for(var j in operator ){
      if (id == operator[j]['operatorid']) { 
        var temp = operator[j]['operatorname']+'('+operator[j]['email']+')';
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

          var temp = operator[j]['operatorname']+'('+operator[j]['email']+')';
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
    $.ajax({
      url: '<?php echo base_url()?>admin/interview/saveAppointment',
      type: 'POST',
      dataType: 'json',
      data: $('#formAppointment').serialize(),
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

  $('#saveOffer').click(function(event) {
    $.ajax({
      url: '<?php echo base_url()?>admin/interview/saveOffer',
      type: 'POST',
      dataType: 'json',
      data: $('#formOffer').serialize(),
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
</script>