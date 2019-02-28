<h3 class="color-blue">Lịch sử ứng tuyển</h3>
<label><a href="<?php echo base_url() ?>handling/lichsu_apply">Quay lại</a></label>
<br>
<label><?php echo $campaigns['position'].' ('.$campaigns['expdate'].')' ?></label>
<table   class="table table-striped table-bordered fontstyle text-center" > 
  <thead> 
      <tr> 
        <th id="th" width="10%">STT</th> 
        <th id="th" width="40%">Nội dung</th> 
        <th id="th" width="18%">Thời hạn</th> 
        <th id="th" width="18%">Thực hiện</th>
        <th id="th" width="14%">Thao tác</th>
      </tr> 
    </thead> 
    <tbody> 
     <tr>
      <td>1</td>
      <td>Nộp hồ sơ ứng tuyển</td>
      <td>30/09/2018</td>
      <td>02/09/2018  </td>
      <td>-</td>
     </tr>
     <tr>
      <td>2</td>
      <td>Phỏng vấn - vòng 1: Trắc nghiệm kiến thức online</td>
      <td>04/10/2018</td>
      <td>02/10/2018</td>
      <td><a data-toggle="modal" data-target="#myModalls1">Hoàn thành</a></td>
     </tr>
      <tr>
      <td>3</td>
      <td><a data-toggle="modal" data-target="#myModalls2">Phỏng vấn - vòng 2: Gặp mặt trực tiếp tại DXG</a></td>
      <td>06/10/2018</td>
      <td>06/10/2018</td>
      <td><a data-toggle="modal" data-target="#myModalls3">Đã phỏng vấn</a></td>
     </tr>
     <tr>
      <td>4</td>
      <td><a data-toggle="modal" data-target="#myModalls4">Trúng tuyển - thư mới nhận việc</a></td>
      <td>10/10/2018</td>
      <td>-</td>
      <td><a data-toggle="modal" data-target="#myModalls5">Đã xác nhận</a></td>
     </tr>
  </tbody> 
</table>
<label class="fontstyle color-gray">Vui lòng theo dõi email để cập nhật các yêu cầu về tuyển dụng</label>



<div class="modal fade" id="myModalls1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-70" role="document">
    <form action="#" method="post">
    <div class="modal-content">
      <label class="title-modal margin-bot-15 fontbig"><strong>Trắc nghiệm kiến thức</strong></label>
      <label class="title-right title-modal margin-bot-15">Thời gian còn lại <strong class="color-blue fontbig">00:60:00</strong></label>
      <table   class="table table-striped table-bordered fontstyle" > 
        <tr>
          <td class="text-center"><button class="btn btnlong">Bắt đầu</button></td>
          <td class="middle">Vị trí ứng tuyển: Chuyên viên kế hoạch và phân tích đầu tư (30/09/2018)</td>
          <td class="middle">Kết quả: --/ 100</td>
        </tr>
        <tr><td colspan="3" class="padding-left-right-20">  Người thực hiện: Nam Do ----  Lưu ý: Sau khi bấm Bắt đầu, thời gian sẽ được tính ngay kể cả khi màn hình trắc nghiệm đóng lại </td>
        </tr>
        <tr>
          <td colspan="3" >
            <label class="color-green fontbig margin-left-50"><strong>1. What is the capital of Jordan? </strong></label>
            <br>
             <label class="radio-inline padding-left-right-20 fontstyle margin-bot-15 margin-left-50">
                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Amman
            </label>
            <br>
            <label class="radio-inline padding-left-right-20 fontstyle margin-bot-15 margin-left-50">
                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Bishkek
            </label>
            <br>
            <label class="radio-inline padding-left-right-20 fontstyle margin-bot-15 margin-left-50">
                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Madaba
            </label>
            <br>
            <label class="radio-inline padding-left-right-20 fontstyle margin-bot-15 margin-left-50">
                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> ______
            </label>
            <br>
            <div class="border-question">

              <label class="color-green fontbig margin-left-50"><strong>1. What is the capital of Jordan? </strong></label>
              <br>
               <label class="radio-inline padding-left-right-20 fontstyle margin-bot-15 margin-left-50">
                  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Amman
              </label>
              <br>
              <label class="radio-inline padding-left-right-20 fontstyle margin-bot-15 margin-left-50">
                  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Bishkek
              </label>
              <br>
              <label class="radio-inline padding-left-right-20 fontstyle margin-bot-15 margin-left-50">
                  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Madaba
              </label>
              <br>
              <label class="radio-inline padding-left-right-20 fontstyle margin-bot-15 margin-left-50">
                  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> ______
              </label>
            </div>


          </td>
        </tr>
      </table>
        <label class="radio-inline padding-left-right-20 fontstyle margin-bot-15 margin-left-20">
                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Xác nhận hoàn tất bài kiểm tra, sau khi hoàn thành, bài kiểm tra sẽ không thể chỉnh sửa, thay đổi kết quả
            </label>
           <button type="button" class="btn btnlong title-right margin-right-20" > Hoàn thành</button>
    </div>
  </form>
  </div>
</div>


<div class="modal fade" id="myModalls2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-30" role="document">
    <form action="#" method="post">
    <div class="modal-content">
      <h3 class="title-modal margin-bot-15 ">Xác nhận lịch phỏng vấn</h3>
           
          <div class="form-group row padding-left-right-20 margin-bot-10" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Vị trí ứng truyển</label>
            <div class="col-sm-8">
              <textarea class="form-control off-resize" rows="2" name="vitri"></textarea>
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-10" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Nội dung</label>
            <div class="col-sm-8">
              <textarea class="form-control off-resize" rows="2" name="noidung" ></textarea>
            </div>
          </div>
            <div class="form-group row padding-left-right-20 margin-bot-10" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Ngày giờ PV</label>
            <div class="col-sm-6">
           
              <input class="form-control width-100" type="text"  id="ngaygio" placeholder="" name="ngaygio">
            </div>
          </div>
           <div class="form-group row padding-left-right-20 margin-bot-10" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Địa điểm</label>
            <div class="col-sm-8">
              <textarea class="form-control off-resize" rows="2" name="diadiem"></textarea>
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-10" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Người liên hệ</label>
            <div class="col-sm-8">
              <textarea class="form-control off-resize" rows="2" name="lienhe"></textarea>
            </div>
          </div>

           <div class="form-group row padding-left-right-20 margin-bot-2">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Hẹn thời gian khác</label>
            <div class="col-sm-8">
              <div class="form-group row">
                <div class="col-sm-7">
                <select class="form-control height31" name="ngay" >
                  
                  <option>Ngày</option>
                  
                </select></div>
                <div class="col-sm-5">
                <select class="form-control height31" name="gio">
                  
                  <option>Giờ</option>
                  
                </select></div>
              </div>
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-10" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Lý do thay đổi lịch</label>
            <div class="col-sm-8">
              <textarea class="form-control off-resize" rows="2" name="lydo"></textarea>
            </div>
          </div>
          <label class="radio-inline padding-left-right-20 fontstyle margin-bot-15 margin-left-20">
                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Tôi xác nhận DXG thời gian như trên
            </label>
            <button type="button" class="btn them-modal" > Thêm</button>
    </div>
  </form>
  </div>
</div>
<div class="modal fade" id="myModalls3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-30" role="document">
    <form action="#" method="post">
    <div class="modal-content">
      <h3 class="title-modal margin-bot-15 ">Xác nhận lịch phỏng vấn</h3>
           
          <div class="form-group row padding-left-right-20 margin-bot-10" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Vị trí ứng truyển</label>
            <div class="col-sm-8">
              <textarea class="form-control off-resize" rows="2" name="vitri"></textarea>
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-10" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Nội dung</label>
            <div class="col-sm-8">
              <textarea class="form-control off-resize" rows="2" name="noidung"></textarea>
            </div>
          </div>
            <div class="form-group row padding-left-right-20 margin-bot-10" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Ngày giờ PV</label>
            <div class="col-sm-6">
           
              <input class="form-control width-100" type="text"  id="ngaygio" placeholder="" name="ngaygio">
            </div>
          </div>
           <div class="form-group row padding-left-right-20 margin-bot-10" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Địa điểm</label>
            <div class="col-sm-8">
              <textarea class="form-control off-resize" rows="2" name="diadiem" ></textarea>
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-10" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Người liên hệ</label>
            <div class="col-sm-8">
              <textarea class="form-control off-resize" rows="2" name="lienhe"></textarea>
            </div>
          </div>

           
    </div>
  </form>
  </div>
</div>
<div class="modal fade" id="myModalls4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-30" role="document">
    <form action="#" method="post">
    <div class="modal-content">
      <h3 class="title-modal margin-bot-15 ">Xác nhận thư mời nhận việc</h3>
           
          <div class="form-group row padding-left-right-20 margin-bot-10" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Vị trí ứng truyển</label>
            <div class="col-sm-8">
              <textarea class="form-control off-resize" rows="2" name="vitri" ></textarea>
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-10" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Kết quả</label>
            <div class="col-sm-8">
              <textarea class="form-control off-resize" rows="6" name="kq"></textarea>
            </div>
          </div>

           <div class="form-group row padding-left-right-20 margin-bot-2">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Hẹn thời gian khác</label>
            <div class="col-sm-8">
              <div class="form-group row">
                <div class="col-sm-7">
                <select class="form-control height31" name="ngay">
                  
                  <option>Ngày</option>
                  
                </select></div>
                <div class="col-sm-5">
                <select class="form-control height31" name="gio">
                  
                  <option>Giờ</option>
                  
                </select></div>
              </div>
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-10" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Lý do thay đổi lịch</label>
            <div class="col-sm-8">
              <textarea class="form-control off-resize" rows="2" name="lydo" ></textarea>
            </div>
          </div>
          <label class="radio-inline padding-left-right-20 fontstyle margin-bot-15 margin-left-20">
                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Tôi xác nhận DXG thời gian như trên
            </label>
            <button type="button" class="btn them-modal" > OK</button>
    </div>
  </form>
  </div>
</div>

<div class="modal fade" id="myModalls5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-30" role="document">
    <form action="#" method="post">
    <div class="modal-content">
      <h3 class="title-modal margin-bot-15 ">Cài đặt</h3>
       <label class="radio-inline padding-left-right-20 fontstyle margin-bot-15 margin-left-20">
                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Nhận e-mail tin tức tuyển dụng, cơ hội nghề nghiệp
            </label>

            <label class="radio-inline padding-left-right-20 fontstyle margin-bot-15 margin-left-20"">
                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Nhận e-mail đãi ngộ đặc biệt từ Tập đoàn DXG
            </label>
      <button type="button" class="btn them-modal" > OK</button>
    </div>
  </form>
</div>
</div>
<script type="text/javascript">
$('#ngaygio').datetimepicker();
</script>