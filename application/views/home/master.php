<!DOCTYPE html>
<html id="ctl00_Html1" lang="vi">
  <head id="ctl00_Head1">
      <title>
    	 Chính Sách Nhân Sự - Đất Xanh Group - Tập đoàn Bất Động Sản Đất Xanh 
      </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="
    1. Đào tạo và phát triển
    Đào tạo và phát triển là phương châm của Đất Xanh nhằm giúp đội ngũ nhân sự phát huy tối đa tiềm năng và định hướng nghề nghiệp," />
    <meta name="keywords" content="Đất Xanh, Tập đoàn Đất Xanh, Bất động sản, Căn hộ đất xanh, công ty Đất Xanh, căn hộ cao cấp, dự án cao cấp, opal garden, Opal Riverside, dự án Luxcity" /><meta name="robots" content="index,follow" />
    <meta name="author" content="DXG" />
    <meta name="distribution" content="global" />
    <meta name="revisit-after" content="1 days" />
    <meta http-equiv="REFRESH" content="1800" />
    <link rel="search" type="application/opensearchdescription+xml" title="Tìm kiếm Dat Xanh Group" href="http://www.datxanh.vn/SearchEngineInfo.ashx" /><meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
   
    <link rel='stylesheet' type='text/css' href='<?php echo base_url()?>public/css/mycss.css' />
    <link rel='stylesheet' type='text/css' href='<?php echo base_url()?>public/css/app.min.css' />
      
      <!-- <link rel='shortcut icon' href='/Data/Sites/1/skins/default/favicon.ico' /> -->
    <script src="<?php echo base_url()?>public/js/jquery.min.js" type="text/javascript" ></script>
     <!-- <script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/datetimepicker-master/jquery.datetimepicker.css"/ >
      
    <script src="<?php echo base_url()?>public/datetimepicker-master/build/jquery.datetimepicker.full.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <!--  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script> -->

    <script src="<?php echo base_url()?>public/js/dist/jquery.validate.js"></script>
    <script src="<?php echo base_url()?>public/js/dist/jquery.validate.min.js"></script>
    <script src="<?php echo base_url()?>public/js/dist/validation.js"></script>
  </head>
  <body id="ctl00_Body" class="canhcam vi-vn">
    <div id="loading" style="display:none">
        <img src="<?php echo base_url() ?>public/image/loading.gif" alt="Loading..."/>
    </div>
 
    <div id="wrapper" class="site-container">
      <div class="site-pusher">
        <?php echo isset($header)?$header:'' ?>
        <main class="main">
          <div class="container">
            <div id="ctl00_divAlt1" class="altcontent1 cmszone">

              <div class="breadcrumb_bg margin-break">
                <div class="container">
                  <div class='Module Module-153'>
                    <ol class='breadcrumb'>

                      <li itemscope itemtype='http://data-vocabulary.org/Breadcrumb'><a href='http://www.datxanh.vn' class='itemcrumb' itemprop='url'><span itemprop='title'>Trang chủ</span></a></li>

                      <li itemscope itemtype='http://data-vocabulary.org/Breadcrumb'><a href='<?php echo base_url() ?>' class='itemcrumb' itemprop='url'><span itemprop='title'>Phát triển con người</span></a></li>

                      <li itemscope itemtype='http://data-vocabulary.org/Breadcrumb'><a href='http://www.datxanh.vn/phat-trien-con-nguoi/chinh-sach-nhan-su' class='itemcrumb active' itemprop='url'><span itemprop='title'>
                      <?php if($this->uri->segment(1) != null)
                              {
                                if($this->uri->segment(1) == "handling")
                                {
                                  if($this->uri->segment(2) ==  "lichsu_apply")
                                    echo "Lịch sử ứng truyển";
                                  if($this->uri->segment(2) ==  "hoso_canhan")
                                    echo "Hồ sơ cá nhân";
                                  if($this->uri->segment(2) == "cohoi_nghe_nghiep")
                                    echo "Cơ hội nghề nghiệp";
                                  if($this->uri->segment(2) == "index")
                                    echo "Chính sách nhân sự";
                                }
                                else
                                {
                                  if($this->uri->segment(1) ==  "lichsu_apply.html")
                                    echo "Lịch sử ứng truyển";
                                  if($this->uri->segment(1) ==  "hoso_canhan.html")
                                    echo "Hồ sơ cá nhân";
                                  if($this->uri->segment(1) == "cohoi_nghe_nghiep.html")
                                    echo "Cơ hội nghề nghiệp";
                                  if($this->uri->segment(1) == "index.html")
                                    echo "Chính sách nhân sự";
                                }
                              }
                              else
                              {
                                echo "Chính sách nhân sự";
                              }


                       ; ?>
                      </span></a></li>

                
                    </ol>
                  </div>
                </div>
              </div>
              
              <div class="floatright long ">
                <?php if($this->session->has_userdata('user')) {?>
                <label class="dangnhap1"><i class="fa fa-user fa-lg orange" ></i> <?php echo $this->session->userdata('user')['operatorname']?> &nbsp|&nbsp <a data-toggle="modal" data-target="#myModalchangepass">Cài đặt</a>&nbsp |&nbsp <a href="<?php echo base_url()?>login/logout">Thoát</a></label>
                
           <?php   }else
           { ?>
            <button type="button" class="btn btn-white"  data-toggle="modal" data-target="#myModal"><i class="fa fa-user fa-lg orange" ></i>
                  <strong>Đăng Nhập</strong>
                </button>
            <?php }?>
              </div>
            
            </div>
            <div class="row">
              <div id="ctl00_divLeft" class="col-left col-lg-3 cmszone">
                <div >
                  <?php echo isset($menu)?$menu:'' ?>
                </div>
              </div>
              <div id="ctl00_divCenter" class="col-main col-lg-9">
                <div class='Module Module-168'>
                  <div class='ModuleContent'>
                    <div id="ctl00_mainContent_ctl00_ctl00_pnlInnerWrap">
                      <?php echo isset($temp)?$temp:'' ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
        <?php echo isset($footer)?$footer:'' ?>
        <div class="site-cache" id="site-cache"></div>
      </div>
    </div>
    
   
    <?php echo isset($modal)?$modal:'' ?>
  
   
   
     <div class="modal fade" id="myModalchangepass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog width-30"  role="document">
        <div class="modal-content">
          <div class="modal-body" style="text-align: center;">
            <div class="row">
              <div class="col-md-12 padding-form-login">
                <form id="changepass"> 
                  <h3 class="color-blue">Đổi mật khẩu</h3>
                <!--   <p>Khôi phục tài khoản tuyển dụng Đất Xanh</p> -->
                   <div class="alert alert-danger hide" id="err-change"></div>
                  <div class="form-group row kcform1" >
                    <label for="staticEmail" class="col-sm-5 col-form-label textright">Mật khẩu cũ</label>
                    <div class="col-sm-6">
                      <input class="kttext" type="password" placeholder="" name="passold" required>
                    </div>
                  </div>
                   <div class="form-group row kcform1" >
                    <label for="staticEmail" class="col-sm-5 col-form-label textright">Mật Khẩu mới</label>
                    <div class="col-sm-6">
                      <input class="kttext" type="password" placeholder="" minlength name="passnew" id="passnew" required>
                    </div>
                  </div>
                   <div class="form-group row kcform1" >
                    <label for="staticEmail" class="col-sm-5 col-form-label textright" >Nhập lại mật khẩu</label>
                    <div class="col-sm-6">
                      <input class="kttext" type="password" placeholder="" minlength name="repassnew" required>
                    </div>
                  </div>
                  <div class="form-group row kcform1" style="text-align: center;">
                      <button type="submit" class="btn btn-login" id="btn-changepass">OK
                    </button>
                  </div>
                </form>
              </div>
            </div>
            </div>
          </div>
      </div>
    </div>
    
    <div id="base" style="display: none"><?php echo base_url()?><div>
    <script type="text/javascript" src="<?php echo base_url()?>public/js/mylogin.js">
     
    </script>

  </body>
</html>