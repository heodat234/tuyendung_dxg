<div class="blue height_40">
    <ul class="nav nav-tabs pad-tl10">
        <li class="active"><a data-toggle="tab" href="#home" class="menu1-nav">Tin tức (<?php echo count($news) ?>)</a></li>
        <li><a data-toggle="tab" href="#menu1" class="menu1-nav">Tin chưa đăng (<?php echo count($news_c) ?>)</a></li>
    </ul>
</div>
<div class="background_white">   

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active height_660">
            <div class="search-div">
              <input type="text" class="search-input" name="" placeholder="Nhập nội dung tìm kiếm">
                <i class="fa fa-search search-icon"></i>
              </input>
            </div>
            <div class="clear-border dash-horizontal"></div>
            <div class="side-menu" >
                <nav class="navbar navbar-default white border0 scrollbars" role="navigation" style="height: 670px">  
                    <div class="side-menu-container">
                        <ul class="nav navbar-nav nav-check-save append_row width_full">
                          <?php foreach ($news as $row) { ?>
                            <a href="<?php echo base_url().'admin/news/form_news/'.$row['newsid'] ?>" target="idf_news" onclick="setActive(<?php echo $row['newsid'] ?>)" >
                              <li id="dropdown" class="width100 news_<?php echo $row['newsid'] ?>">
                                <p class="title-news" id="title_news_<?php echo $row['newsid'] ?>"><?php echo $row['subject'] ?> </p>
                                <div class="row row-detail">
                                  <div class="col-xs-4 padding-4">
                                    <img src="<?php echo base_url() ?>public/image/xahoi2.png" class="width_full">
                                  </div>
                                  <div class="col-xs-8 padding-4">
                                    <div class="row marginleft-0">
                                        <div class="col-xs-4 padding-0">Đăng bởi:</div>
                                        <div class="col-xs-8 title-ccc" id="createdby_<?php echo $row['newsid'] ?>"><?php echo $row['name'] ?> </div>
                                    </div>

                                    <div class="row marginleft-0">
                                        <div class="col-xs-4 padding-0">Ngày đăng:</div>
                                        <div class="col-xs-8 title-ccc" id="publishdate_<?php echo $row['newsid'] ?>"><?php echo date_format(date_create($row['publishdate']),"d/m/Y"); ?> </div>
                                    </div>

                                    <div class="row marginleft-0">
                                        <div class="col-xs-4 padding-0">Loại hình:</div>
                                        <div class="col-xs-8 title-ccc" id="type_<?php echo $row['newsid'] ?>"><?php echo $row['type'] ?></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="clear-border border_ece"></div>
                              </li>
                            </a>
                          <?php } ?>
                        </ul>
                    </div>  
                </nav>
            </div>    
        </div>
        <div id="menu1" class="tab-pane fade height_700" >
            <div class="search-div">
              <input type="text" class="search-input" name="" placeholder="Nhập nội dung tìm kiếm">
                <i class="fa fa-search search-icon"></i>
              </input>
            </div>
            <div class="border_ece"></div>
            <div class="side-menu">
                <nav class="navbar navbar-default background_white border_0" role="navigation" >
                    <div class="side-menu-container">
                        <ul class="nav navbar-nav">
                          <?php foreach ($news_c as $row) { ?>
                            <a onclick="loadiframe('<?php echo $row['newsid']?>')" href="#" >
                              <li id="dropdown" class="width100">
                                <p class="title-news"><?php echo $row['subject'] ?> </p>
                                <div class="row row-detail">
                                  <div class="col-xs-4 padding-4">
                                    <img src="<?php echo base_url() ?>public/image/xahoi2.png" class="width_full">
                                  </div>
                                  <div class="col-xs-8 padding-4">
                                    <div class="row marginleft-0">
                                        <div class="col-xs-4 padding-0">Đăng bởi:</div>
                                        <div class="col-xs-8 title-ccc"><?php echo $row['name'] ?> </div>
                                    </div>

                                    <div class="row marginleft-0">
                                        <div class="col-xs-4 padding-0">Ngày đăng:</div>
                                        <div class="col-xs-8 title-ccc"><?php echo date_format(date_create($row['publishdate']),"d/m/Y"); ?> </div>
                                    </div>

                                    <div class="row marginleft-0">
                                        <div class="col-xs-4 padding-0">Loại hình:</div>
                                        <div class="col-xs-8 title-ccc"><?php echo $row['type'] ?></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="clear-border border_ece"></div>
                              </li>
                            </a>
                          <?php } ?>
                        </ul>
                      </div>
                </nav>
      <!-- <button type="button" style="border: 0px;height: 30px; width: 70px; color: white;background-color: #5fade0;margin-left: 10px; margin-top: 20px; float: bottom" onclick="clicksave()"> Lưu</button> -->
        </div>
        </div>
    </div>

    <div class="clear-border border_ece"></div>
    <a href="<?php echo base_url().'admin/news/form_news/' ?>" target="idf_news" class="btn btn-primary" style="margin: 8px">Tin mới</a>
    <!-- <button type="button" class="btn btn-primary" style="margin: 8px" onclick="loadiframe('')">Tin mới</button> -->
</div>
<style type="text/css">

  
</style>
<script type="text/javascript">
  function setActive(id) {
    $('.active_news').removeClass('active_news');
    $('.news_'+id).addClass('active_news');
  }
    function clicksave()
    {
        $('#save-preset').modal('show');
    }
     $('#example-multiple-selected').multiselect();
</script>