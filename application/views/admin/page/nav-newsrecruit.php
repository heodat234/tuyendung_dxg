<div class="blue" style="height: 40px;">
    <ul class="nav nav-tabs pad-tl10">
        <li class="active"><a data-toggle="tab" href="#home" class="menu1-nav">Tin tức (8)</a></li>
        <li><a data-toggle="tab" href="#menu1" class="menu1-nav">Tin chưa đăng (13)</a></li>
    </ul>
</div>
<div style="background-color: white;">   

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active" style="height: 892px">
            <div class="search-div">
              <input type="text" class="search-input" name="" placeholder="Nhập nội dung tìm kiếm">
                <i class="fa fa-search search-icon"></i>
              </input>
            </div>
            <div class="clear-border dash-horizontal"></div>
            <div class="side-menu" >
                <nav class="navbar navbar-default white border0" role="navigation">  
                    <div class="side-menu-container">
                        <ul class="nav navbar-nav nav-check-save" style="width: 100%">
                          <?php for ($i=0; $i < 5; $i++) {  ?>
                            <li id="dropdown" class="width100">
                              <p class="title-news">Chuỗi hoạt động NS tài năng DXG 2018</p>
                              <div class="row row-detail">
                                <div class="col-md-4 padding-4">
                                  <img src="<?php echo base_url() ?>public/image/xahoi2.png" style="width: 100%">
                                </div>
                                <div class="col-md-8 padding-4">
                                  <div class="row marginleft-0">
                                      <div class="col-md-4 padding-0">Đăng bởi:</div>
                                      <div class="col-md-8 title-ccc">Trần Lan Hương</div>
                                  </div>

                                  <div class="row marginleft-0">
                                      <div class="col-md-4 padding-0">Ngày đăng:</div>
                                      <div class="col-md-8 title-ccc">10/01/2018</div>
                                  </div>

                                  <div class="row marginleft-0">
                                      <div class="col-md-4 padding-0">Loại hình:</div>
                                      <div class="col-md-8 title-ccc">Tin tức - chế độ</div>
                                  </div>
                                </div>
                              </div>
                              <div class="clear-border" style="border: 0.5px solid #ececec;"></div>
                            </li>
                          <?php } ?>
                        </ul>
                    </div>  
                </nav>
            </div>    
        </div>
        <div id="menu1" class="tab-pane fade" style="height: 892px">
            <div class="search-div">
              <input type="text" class="search-input" name="" placeholder="Nhập nội dung tìm kiếm">
                <i class="fa fa-search search-icon"></i>
              </input>
            </div>
            <div style="border: 0.5px solid #ececec;"></div>
            <div class="side-menu">
                <nav class="navbar navbar-default" role="navigation" style="background-color: white; border: 0px">
                    <div class="side-menu-container">
                        <ul class="nav navbar-nav">
                            <li id="dropdown" class="width100">
                                <p class="title-news">Chuỗi hoạt động NS tài năng DXG 2018</p>
                              <div class="row row-detail">
                                <div class="col-md-4 padding-4">
                                  <img src="<?php echo base_url() ?>public/image/xahoi2.png" style="width: 100%">
                                </div>
                                <div class="col-md-8 padding-4">
                                  <div class="row marginleft-0">
                                      <div class="col-md-4 padding-0">Đăng bởi:</div>
                                      <div class="col-md-8 title-ccc">Trần Lan Hương</div>
                                  </div>

                                  <div class="row marginleft-0">
                                      <div class="col-md-4 padding-0">Ngày đăng:</div>
                                      <div class="col-md-8 title-ccc">10/01/2018</div>
                                  </div>

                                  <div class="row marginleft-0">
                                      <div class="col-md-4 padding-0">Loại hình:</div>
                                      <div class="col-md-8 title-ccc">Tin tức - chế độ</div>
                                  </div>
                                </div>
                              </div>
                              <div class="clear-border" style="border: 0.5px solid #ececec;"></div>
                            </li>
                 </ul>

            </div>
        </nav>
      <!-- <button type="button" style="border: 0px;height: 30px; width: 70px; color: white;background-color: #5fade0;margin-left: 10px; margin-top: 20px; float: bottom" onclick="clicksave()"> Lưu</button> -->
        </div>
        </div>
    </div>

    <div class="clear-border" style="border: 0.5px solid #ececec;"></div>
    <button type="button" class="btn btn-primary" style="margin: 8px">Tin mới</button>
</div>

<div class="modal fade" id="save-preset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="#" method="POST" enctype="multipart/form-data">

      <div class="modal-header" style="height: 50%; background-color: #5FA2DD;padding-bottom: 10px;padding-top: 10px;">
        <button type="button" class="close" data-dismiss="modal" style="color: white" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color: white;font-weight: 400;">Lưu tiêu chí lọc tổng hợp</h4>

      </div>
      <div class="modal-body">
           <div class="row" style="margin-bottom: 10px">
            <div class="col-md-5"><label style="font-weight: 350">Tên gọi của tiêu chí</label>
            </div>
            <div class="col-md-7">
                <select style="background-color: #FFFFFF;border: 1px solid #E4E4E4;width: 312px;height: 32px; padding-left: 5px">
                    <option style="padding: 5px">Ứng viên vị trí hành chính nhân sự</option>
                </select>
            </div>
           </div>
           <label style="font-weight: 350">Dành cho Admin:</label>
            <div class="row">
            <div class="col-md-5">
                <label style="font-weight: 350">Áp dụng E-mail</label>
            </div>
            <div class="col-md-7"> 
               <label style="font-weight: 350; width: 100%"><i class="fa fa-minus-circle" style="color: #F5821F"></i> &nbsp; Tin tức DXG</label>
               <label style="font-weight: 350; width: 100%"><i class="fa fa-minus-circle" style="color: #F5821F"></i> &nbsp; Tin tức Tuyển dụng (Nhân sự)</label>
               <label style="font-weight: 350;"><i class="fa fa-plus-circle" style="color: #5FA2DD"></i></label> &nbsp;
                <select id="example-multiple-selected" multiple="multiple">
                    <option value="1">Chọn tất cả</option>
                    <option value="2" selected="selected">Tin tức chế độ nhân sự</option>
                    <option value="3">Tin tức đãi ngộ đặc biệt</option>
                </select>
            </div>
           </div>
      </div>

      <div class="modal-footer" style=" padding-top: 10px; padding-bottom: 10px">
        <label style="float :left; font-weight: 350;padding-top: 5px;"><input type="checkbox" > &nbsp; Chia sẻ tiêu chí lọc</label>
        <button type="button" class="btn btn-admin orange"  data-dismiss="modal">Hủy</button>
        
        <input type="submit" class="btn btn-admin blue" value="Lưu">  
      </div>
    </form>
    </div>
  </div>
</div>
<script type="text/javascript">

//         $('.navbar-toggle').click(function () {
//             $('.navbar-nav').toggleClass('slide-in');
//             $('.side-body').toggleClass('body-slide-in');
//             $('#search').removeClass('in').addClass('collapse').slideUp(200);    
//         });

//    // Remove menu for searching
//    $('#search-trigger').click(function () {
//     $('.navbar-nav').removeClass('slide-in');
//     $('.side-body').removeClass('body-slide-in');
// });


    function clicksave()
    {
        $('#save-preset').modal('show');
    }
     $('#example-multiple-selected').multiselect();
</script>