 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-60"  role="document">
        <div class="modal-content">

          <div class="modal-body">
            <form  id="form-login">
            <div class="row">
              <div class="col-md-6 text-modal" >
               <h3 class="color-blue">Tham gia cùng chúng tôi
               </h3>
               <p>Gia nhập Talent Network của chúng tôi sẽ giúp bạn nâng cao khả năng tìm kiếm việc làm. Cho dù bạn ứng truyển một công việc nào đó hoặc đơn giản là cập nhật thông tin của mình, chúng tôi cũng luôn mong muốn được kết nối cùng bạn.
               </p>
               <ul>
                <li>Nhận thông báo việc làm mới phù hợp với mối quan tâm của bạn</li>
                <li>Cập nhật các thông tin mới nhất vào công ty</li>
                <li>Chia sẻ cơ hội việc làm với gia đình, bạn bè thông qua mạng xã hội hoặc email</li>
              </ul>
              <strong class="title-right">Hãy đăng ký ngay hôm nay!</strong>
              </div>
              <div class="col-md-6 padding-form-login">
               <h3 class="color-blue">Đăng Nhập</h3>
               <br>
               <div class="alert alert-danger hide" id="err-login"></div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">

                  <input class="kttext" type="text" name="email" value="<?php echo $this->input->cookie('email',true); ?>" >

                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-8">
                  <input type="password" class="kttext" id="inputPassword" name="password" value="<?php echo $this->input->cookie('password',true); ?>" >
                   <label class="checkbox-inline" style="width: 100%; margin: 10px 0;"><input type="checkbox" name="luumatkhau" value="1" <?php echo isset($_COOKIE['email'])? "checked" : "";?>>  Lưu mật khẩu </label>
                  <button type="button" class="btn btn-login"  id="btn_login" style="margin-top: 0px !important;">Đăng Nhập
                </button>
                <p class="margin-top17"><a data-toggle="modal" data-target="#myModal1c">
                <i class="fa fa-caret-right fa-lg"></i> Quên mật khẩu</a>
                </p>
                <p class="margin-top-13"><a data-toggle="modal" data-target="#myModal1a">
                <i class="fa fa-caret-right fa-lg"></i> Đăng ký tài khoản</a>
              </p>
                </div>
              </div>


              </div>
            </div>
          </form>
          </div>

        </div>
      </div>
    </div>



      <div class="modal fade" id="myModal1a" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-70"  role="document">
        <div class="modal-content">

          <div class="modal-body">

            <div class="row">
              <div class="col-md-5 text-modal" >
               <h3 class="color-blue">Tham gia cùng chúng tôi
               </h3>
               <p>Gia nhập Talent Network của chúng tôi sẽ giúp bạn nâng cao khả năng tìm kiếm việc làm. Cho dù bạn ứng truyển một công việc nào đó hoặc đơn giản là cập nhật thông tin của mình, chúng tôi cũng luôn mong muốn được kết nối cùng bạn.
               </p>
               <ul>
                <li>Nhận thông báo việc làm mới phù hợp với mối quan tâm của bạn</li>
                <li>Cập nhật các thông tin mới nhất vào công ty</li>
                <li>Chia sẻ cơ hội việc làm với gia đình, bạn bè thông qua mạng xã hội hoặc email</li>
              </ul>
              <strong class="title-right" ">Hãy đăng ký ngay hôm nay!</strong>
              </div>
              <div class="col-md-7 padding-form-login">
                <form id="sign-in">
               <h3 class="color-blue">Đăng ký tài khoản</h3>
               <div class="alert alert-danger hide" id="err-sign-in"></div>
              <div class="form-group row kcform1">
                <label for="staticEmail" class="col-sm-4 col-form-label">Email <span class="color_red">*</span></label>
                <div class="col-sm-8">

                  <input class="kttext" type="email" placeholder="" name="email" required>
                </div>
              </div>
              <div class="form-group row kcform1">
                <label for="inputPassword" class="col-sm-4 col-form-label">Số CMND/CCCD <span class="color_red">*</span></label>
                <div class="col-sm-8">
                  <input class="kttext" type="text" placeholder="" name="cmnd" id="cmnd" required>

                </div>
              </div>
              <div class="form-group row kcform1">
                <label for="inputPassword" class="col-sm-4 col-form-label">Mật khẩu <span class="color_red">*</span></label>
                <div class="col-sm-8">
                  <input type="password" class="kttextl" minlength  placeholder="" name="pass" id="pass" required>
                </div>
              </div>
              <div class="form-group row kcform1">
                <label for="inputPassword" class="col-sm-4 col-form-label">Xác nhận mật khẩu <span class="color_red">*</span></label>
                <div class="col-sm-8">
                   <input type="password" class="kttext" minlength placeholder="" name="repass" required>
                </div>
              </div>
              <div class="form-group row kcform1">
                <label for="inputPassword" class="col-sm-4 col-form-label">Tên <span class="color_red">*</span></label>
                <div class="col-sm-8">
                  <input class="kttext" type="text" placeholder="" name="lastname" required>

                </div>
              </div>
              <div class="form-group row kcform1">
                <label for="inputPassword" class="col-sm-4 col-form-label">Họ và tên đệm <span class="color_red">*</span></label>
                <div class="col-sm-8">
                  <input class="kttext" type="text" placeholder="" name="firstname" required>
                </div>
              </div>
              <div class="form-group row kcform1">
                <label for="inputPassword" class="col-sm-4 col-form-label">Giới tính</label>
                <div class="col-sm-8">
                  <label class="radio-inline">
                    <input type="radio" name="gender" checked="true" value="M"> Nam
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="gender" value="F"> Nữ
                  </label>

                </div>
              </div>
              <div class="form-group row kcform1">
                <label for="inputPassword" class="col-sm-4 col-form-label">Ngày Sinh</label>
                <div class="col-sm-8">
                  <input class="kttext" type="text" id="ngaysinh" placeholder="" name="birthday">

                </div>
              </div>
              <div class="form-group row kcform1">
                <label for="inputPassword" class="col-sm-4 col-form-label">Vị trí mong muốn</label>
                <div class="col-sm-8">
                   <div id="the-basics">
                    <input id="typeahead" type="text" data-role="tagsinput" >
                  </div>
                  <input type="hidden" name="tags" id="tags">
                  <button type="submit" class="btn btn-login" id="btn_sign_in" ><i></i>Đăng Ký
                </button>
                </div>
              </div>
                </form>
              </div>
            </div>
            </div>
          </div>
      </div>
    </div>



     <div class="modal fade" id="myModal1c" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog width-30"  role="document">
        <div class="modal-content">
          <div class="modal-body" style="text-align: center;">
            <div class="row">
              <div class="col-md-12 padding-form-login">
                <form id="forgot_pass">
                  <h3 class="color-blue">Khôi phục tài khoản</h3>
                  <p>Khôi phục tài khoản tuyển dụng Đất Xanh</p>
                   <div class="alert alert-danger hide" id="err-forgot"></div>
                  <div class="form-group row kcform1" style="margin-top: 15px">
                    <label for="staticEmail" class="col-sm-4 col-form-label">Email xác nhận</label>
                    <div class="col-sm-6">
                      <input class="kttext" type="email" placeholder="" name="email" required>
                    </div>
                  </div>

                  <div class="form-group row kcform1" style="text-align: center;">
                      <button type="submit" class="btn btn-login" id="btn_forgot" >Gửi
                    </button>
                  </div>
                </form>
              </div>
            </div>
            </div>
          </div>
      </div>
    </div>


    <div class="modal fade" id="myModal20" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-70"  role="document">
        <div class="modal-content">
          <h3 class="title-center-complete"><strong>Đất Xanh Group chào mừng bạn đã tham gia Talent Network</strong></h3>
          <p class="padding-left-right-20">
            Xin chào <strong id="name_tb">Nam</strong>, chúc mừng bạn đã đăng ký thành công tài khoản tại hệ thống Đất Xanh Talent Network
          </p>
          <p class="justify padding-left-right-20">
            Đê tiếp tục, mới bạn <a href="<?php echo base_url()?>hoso_canhan.html" class="underline-orange">hoàn thiện hồ sơ </a>của mình, điều này giúp chúng tôi có thể đánh giá hồ sơ của bạn được thuẩn lợi hơn và sau đó bạn có thể Ứng tuyển vào các vị trí mà chúng tôi đang tìm kiếm nhân tài.
          </p>
          <img src="<?php echo base_url()?>public/image/banner-772x250.jpg" class="image-banner">

        </div>
      </div>
    </div>
<style type="text/css">
  .color_red{
    color: red;
  }
</style>