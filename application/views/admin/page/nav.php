<link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/nav.css">
<div class="blue" style="height: 40px;">
    <ul class="nav nav-tabs pad-tl10" >
        <li ><a data-toggle="tab" href="#home" class="menu1-nav">Đã Lưu (<?php echo count($filter) ?>)</a></li>
        <li class="active"><a data-toggle="tab" href="#menu1" class="menu1-nav" >Tiêu chí lọc hồ sơ</a></li>
    </ul>
</div>
<div style="background-color: white;">
    <div class="tab-content">
        <div id="home" class="tab-pane fade ">
            <div class="search-div">
              <input type="text" class="search-input" id="text_filter_1" name="" placeholder="Nhập nội dung tìm kiếm" onkeyup="searchFilter()">
                <a type="button" onclick="searchFilter()" class="btn-none btn_search_filter"><i class="fa fa-search search-icon" ></i></a>
              </input>
            </div>
            <div class="clear-border dash-horizontal" ></div>
            <!-- <label class="label-edit">Chỉnh sửa</label> -->
            <div class="side-menu scroll-auto2" >
                <nav class="navbar navbar-default white border0" role="navigation" >
                    <div class="side-menu-container">
                        <ul class="nav navbar-nav nav-check-save filter-load">
                          <?php foreach ($filter as $key) { ?>
                            <li id="dropdown" class="width100"><a class="nav-menu-hs li_filter" onclick="loadfilter('<?php echo $key['filterid']?>')"><?php echo $key['filtername'] ?>
                              <span class="pull-right-container an" onclick="editFilter('<?php echo $key['filterid']?>')">
                                <i class="fa fa-pencil pull-right-container"></i>
                              </span>
                            </a>
                            </li>
                          <?php } ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div id="menu1" class="tab-pane fade in active">
            <div class="search-div">
              <input type="text" class="search-input" id="text_search" required placeholder="Nhập nội dung tìm kiếm" >
              <a type="button" onclick="searchname()" class="btn-none btn_search"><i class="fa fa-search search-icon" ></i></a>
            </div>
            <div class="dash-horizontal"></div>

            <div class="checkbox label-check">
                <label><input type="checkbox" id="check_filter" onchange="filter(this.value)" checked="true">Chọn tất cả hồ sơ (<?php echo $total_candidate; ?>)</label>
            </div>
            <div class="checkbox label-check">
                <label><input type="checkbox" id="check_filter_2" onchange="filterRecruit(this.value)" >Hồ sơ đã tuyển dụng</label>
            </div>
            <div class="checkbox label-check">
                <label><input type="checkbox" id="check_filter_3" onchange="filterNotRecruit(this.value)" >Hồ sơ chưa tuyển dụng</label>
            </div>
            <div class="side-menu scroll-auto">
                <nav class="navbar navbar-default white border0" role="navigation">
                    <div class="side-menu-container">
                        <ul class="nav navbar-nav">
                          <li id="dropdown" class="li-nemu white">
                              <a data-toggle="collapse" href="#dropdown-lvl1" class="nav-list-hs weight600 gray-nav">Tiêu chí quản lý
                                  <span class="fa fa-angle-right floatright"></span>
                              </a>
                              <?php
                                    if ($checknemu == NULL) {
                                        $checknemu = ['gender' => '','placeofbirth' => '' , 'agefrom'=> '' , 'ageto' => '', 'heightto' => '', 'heightfrom'=> '',  'weightto' => '', 'weightfrom'=> '' , 'ethnic' => '', 'nationality' => '' , 'cityori' => '' , 'citycurr' => '' , 'district' => '' , 'currbenefitto' => '' , 'currbenefitfrom' => '' , 'desbenefitto' => '' , 'desbenefitfrom' => '' , 'experfrom' => '' , 'experto' => '', 'knowledge' => '' , 'language' => '' , 'software' => '' , 'profilesrc' => '', 'maritalstatus' => '' , 'talentfrom' => '' , 'talentto' => '' , 'updatefrom' => '' , 'updateto' => '' ,  'blocked' => '' , 'rateto' => '' , 'ratefrom' => '' , 'tag' => '' , 'tagrandom' => '' , 'sort' => ''];
                                    }
                              // var_dump($checknemu);
                               ?>
                              <div id="dropdown-lvl1" class="panel-collapse collapse white <?php echo ($checknemu != NULL && $checknemu['rateto'] != '' || $checknemu['ratefrom'] != '' || $checknemu['talentto'] != '' || $checknemu['talentfrom'] != '' || $checknemu['blocked'] != '' || $checkTrung == '1' )? "in" : ""; ?>">
                                  <!-- <div class="checkbox div-label-check" >
                                     <label><input type="checkbox" value="">Tất cả tiêu chí quản lý</label>
                                 </div> -->
                                 <div class="checkbox div-label-check width100" >
                                     <label style="width: 50%"><input type="checkbox" <?php echo ($checknemu['rateto'] != '' || $checknemu['ratefrom'] != '')? "checked" : "";?> id="chk_diem" onchange="filter()" >Điểm hồ sơ</label>
                                     <input type="text" name="" class="div-input" placeholder="Từ" maxlength="3" style="margin-right: 10px"  id="diem_tu" value="<?php echo ($checknemu['rateto'] != '')? $checknemu['rateto'] : "";?>" >
                                     <input type="text" name="" class="div-input" placeholder="Đến" maxlength="3" id="diem_den" value="<?php echo ($checknemu['ratefrom'] != '')? $checknemu['ratefrom'] : "";?>" >
                                 </div>
                                 <div class="checkbox div-label-check" >
                                     <label style="width: 50%"><input type="checkbox" value="" id="chk_tiemnang" onchange="filter()" <?php echo ($checknemu['talentto'] != '' || $checknemu['talentfrom'] != '')? "checked" : "";?> >Hồ sơ tiềm năng </label>
                                     <input type="text" name="" class="div-input tiemnang" style="margin-right: 10px" maxlength="1" placeholder="Từ" id="tiemnang_tu" value="<?php echo ($checknemu['talentfrom'] != '')? $checknemu['talentfrom'] : "";?>" >
                                     <input type="text" name="" class="div-input tiemnang" placeholder="Đến" id="tiemnang_den" maxlength="1" value="<?php echo ($checknemu['talentto'] != '')? $checknemu['talentto'] : "";?>" >
                                 </div>
                                 <div class="checkbox div-label-check" >
                                     <label><input type="checkbox" value="" id="chk_chan" onchange="filter()" <?php echo ($checknemu['blocked'] != '')? "checked" : "";?>>Hồ sơ bị chặn </label>
                                 </div>
                                 <div class="checkbox div-label-check" >
                                     <label><input type="checkbox" value="on" id="chk_trung" onchange="filterTrung()"  <?php echo ($checkTrung == '1')? "checked" : "";?> >Hồ sơ bị trùng </label>
                                 </div>
                                 <div class="checkbox div-label-check" >
                                     <label style="width: 50%"><input type="checkbox" value="" id="chk_lastupdate" onchange="filter()" <?php echo ($checknemu['updateto'] != '' || $checknemu['updatefrom'] != '')? "checked" : "";?> >Ngày cập nhật </label>
                                     <input type="text" name="" class="div-input tiemnang thoigian" style="margin-right: 10px" placeholder="Từ" id="update_tu" value="<?php echo ($checknemu['updatefrom'] != '')? date_format(date_create($checknemu['updatefrom']),"d-m-Y") : "";?>" >
                                     <input type="text" name="" class="div-input tiemnang thoigian" placeholder="Đến" id="update_den" value="<?php echo ($checknemu['updateto'] != '')? date_format(date_create($checknemu['updateto']),"d-m-Y") : "";?>" >
                                 </div>
                                 <!-- <div class="checkbox div-label-check" >
                                     <label><input type="checkbox" value="">Hồ sơ có lịch sử tương tác (6)</label>
                                 </div> -->
                              </div>
                          </li>

                          <li id="dropdown" class="li-nemu white">
                              <a data-toggle="collapse" href="#dropdown-lvl2" class="nav-list-hs weight600 gray-nav">Nguồn hồ sơ
                                  <span class="fa fa-angle-right floatright"></span>
                              </a>
                              <div id="dropdown-lvl2" class="panel-collapse collapse white <?php echo ($checknemu['profilesrc'] != '')? "in" : ""; ?>">
                                  <!-- <div class="checkbox div-label-check" >
                                     <label><input type="checkbox" value="">Chọn tất cả hồ sơ (10)</label>
                                 </div> -->
                                 <?php  $arr = explode('/', $checknemu['profilesrc']);
                                      for($i = 0; $i < count($profilesrc); $i++) {
                                   ?>
                                 <div class="checkbox div-label-check" >
                                     <label><input type="checkbox" id="<?php echo 'src'.$i?>" onchange="filter()" value="<?php echo $profilesrc[$i]['profilesrc']?>"
                                      <?php
                                      if($checknemu['profilesrc'] != '')
                                        for($h = 0; $h < count($arr)-1; $h++)
                                        {
                                          if($profilesrc[$i]['profilesrc'] == $arr[$h])
                                          {

                                            echo "checked";
                                            break;
                                          }
                                        }
                                      ?>
                                      ><?php echo $profilesrc[$i]['profilesrc'].' ('.$profilesrc[$i]['sl'].')' ?></label>
                                 </div>
                                 <?php } ?>
                                 <input type="hidden" id="countprofile" value="<?php echo count($profilesrc) ?>">
                                 <!-- <label class="hienthithem" >Hiện thị thêm</label>
                                 <input type="text" name="" class="inputthem" placeholder="Nhập tên nguồn gốc cần lọc"> -->
                             </div>
                          </li>

                          <li  id="dropdown" class="li-nemu white">
                              <a data-toggle="collapse" href="#dropdown-lvl3" class="nav-list-hs weight600 gray-nav">
                                  Vị trí <span class="fa fa-angle-right floatright"></span>
                              </a>
                              <div id="dropdown-lvl3" class="panel-collapse collapse white <?php echo ($checknemu['tag'] != '')? "in" : ""; ?>">
                                   <?php
                                   for ($x=0; $x < count($tag); $x++) {
                                    ?>
                                    <div class="checkbox div-label-check" >
                                             <label><input type="checkbox" id="<?php echo 'tag'.$x?>" onchange="filter()" value="<?php echo $tag[$x]['tagid']?>"
                                                <?php

                                              if($checknemu['tag'] != '')
                                              {
                                                $arrtag = explode('/', $checknemu['tag']);
                                                for($h = 0; $h < count($arrtag)-1; $h++)
                                                {
                                                  if($tag[$x]['tagid'] == $arrtag[$h])
                                                  {
                                                    echo "checked";
                                                    break;
                                                  }
                                                }
                                              }
                                              ?>
                                              ><?php echo $tag[$x]['title']; ?></label>
                                         </div>
                                   <?php
                                   } ?>
                                   <input type="hidden" id="counttag" value="<?php echo count($tag) ?>">
                              </div>
                          </li>

                          <li  id="dropdown" class="li-nemu white" >
                              <a data-toggle="collapse" href="#dropdown-lvl4" class="nav-list-hs weight600 gray-nav">
                                  Thu nhập <span class="fa fa-angle-right floatright"></span>
                              </a>
                              <div id="dropdown-lvl4" class="panel-collapse collapse white <?php echo (($checknemu['currbenefitto'] != '') || ($checknemu['currbenefitfrom'] != '') || ($checknemu['desbenefitto'] != '') || ($checknemu['desbenefitfrom'] != ''))? "in" : ""; ?>">
                                  <div class="checkbox div-label-check width100 middle" >
                                         <label style="width: 50%"><input type="checkbox" id="chk_thunhapht" <?php echo (($checknemu['currbenefitfrom'] != '') || ($checknemu['currbenefitto'] != ''))? "checked": ""; ?> onchange="filter()">Thu nhập hiện tại</label>
                                         <input type="text" name="" class="div-input so" style="margin-right: 10px; margin-left: 7px" placeholder="Từ" id="tn_httu" value="<?php echo ($checknemu['currbenefitfrom'] != '')? $checknemu['currbenefitfrom'] : ""; ?>" >
                                         <input type="text" name="" class="div-input so" placeholder="Đến" id="tn_htden" value="<?php echo ($checknemu['currbenefitto'] != '')? $checknemu['currbenefitto'] : ""; ?>" >
                                     </div>
                                     <div class="checkbox div-label-check width100 middle" >
                                         <label style="width: 50%"><input type="checkbox" id="chk_thunhapmm" onchange="filter()"
                                          <?php echo (($checknemu['desbenefitto'] != '') || ($checknemu['desbenefitfrom'] != ''))? "checked": ""; ?> >Thu nhập mong muốn</label>
                                         <input type="text" id="tn_mmtu" class="div-input so" style="margin-right: 10px; margin-left: 7px" placeholder="Từ" value="<?php echo ($checknemu['desbenefitfrom'] != '')? $checknemu['desbenefitfrom'] : ""; ?>" >
                                         <input type="text" id="tn_mmden" class="div-input so" placeholder="Đến" value="<?php echo ($checknemu['desbenefitto'] != '')? $checknemu['desbenefitto'] : ""; ?>" >
                                     </div>
                              </div>
                          </li>

                          <li  id="dropdown" class="li-nemu white">
                            <a data-toggle="collapse" href="#dropdown-lvl5" class="nav-list-hs weight600 gray-nav">
                               Kinh nghiệm <span class="fa fa-angle-right floatright"></span>
                            </a>
                            <div id="dropdown-lvl5" class="panel-collapse collapse white <?php echo (($checknemu['experfrom'] != '') || ($checknemu['experto'] != ''))? "in" : "";?>">
                              <div class="checkbox div-label-check" >
                                 <label><input type="checkbox" id="chk_chuacokm" onchange="kinhnghiem(this)" value="C" <?php echo ($checknemu['experfrom'] == 'C')? "checked" : "";?>>Chưa có kinh nghiệm</label>
                              </div>
                              <div class="checkbox div-label-check width100 middle" >
                                 <label><input type="checkbox" id="chk_cokm" onchange="kinhnghiem(this)" value="D" <?php echo (($checknemu['experfrom'] != 'C' && $checknemu['experfrom'] != '') ||($checknemu['experto'] != ''))? "checked" : "";?>>Đã có kinh nghiệm</label>
                                 <input type="text" name="" class="div-input" style="margin-right: 10px; margin-left: 7px" placeholder="Từ" id="kinhnghiem_tu" maxlength="2" value="<?php echo ($checknemu['experfrom'] != '')? $checknemu['experfrom'] : ""; ?>" >
                                  <input type="text" name="" class="div-input" placeholder="Đến" maxlength="2" id="kinhnghiem_den" value="<?php echo ($checknemu['experto'] != '')? $checknemu['experto'] : ""; ?>" >
                              </div>
                            </div>
                          </li>
                          <li  id="dropdown" class="li-nemu white">
                              <a data-toggle="collapse" href="#dropdown-lvl6" class="nav-list-hs weight600 gray-nav">
                                  Học vấn <span class="fa fa-angle-right floatright"></span>
                              </a>
                              <div id="dropdown-lvl6" class="panel-collapse collapse white <?php echo ($checknemu['knowledge'] != '')? "in" : ""; ?>">
                                  <div class="checkbox div-label-check" >
                                       <label><input type="checkbox" id="chk_hs_co_tthv" onchange="hocvan(this)" value="1" <?php echo ($checknemu['knowledge'] == '1')? "checked" : ""; ?>>Hồ sơ có thông tin học vấn</label>
                                   </div>
                                   <?php
                                   for ($x=0; $x < count($hocvan); $x++) {
                                    ?>
                                    <div class="checkbox div-label-check" >
                                             <label><input type="checkbox" id="<?php echo 'hv'.$x?>" onchange="hocvan(this)" value="<?php echo $hocvan[$x]['certificate']?>"
                                                <?php
                                              if($checknemu['knowledge'] != '1' && $checknemu['knowledge'] != '')
                                              {
                                                $arrhocvan = explode('/', $checknemu['knowledge']);
                                                for($h = 0; $h < count($arrhocvan)-1; $h++)
                                                {
                                                  if($hocvan[$x]['certificate'] == $arrhocvan[$h])
                                                  {
                                                    echo "checked";
                                                    break;
                                                  }
                                                }
                                              }
                                              ?>
                                              ><?php echo $hocvan[$x]['certificate']; ?></label>
                                         </div>
                                   <?php
                                   } ?>
                                   <input type="hidden" id="counthocvan" value="<?php echo count($hocvan) ?>">
                              </div>
                          </li>
                          <li  id="dropdown" class="li-nemu white">
                              <a data-toggle="collapse" href="#dropdown-lvl7" class="nav-list-hs weight600 gray-nav">
                                  Ngoại ngữ <span class="fa fa-angle-right floatright"></span>
                              </a>
                              <div id="dropdown-lvl7" class="panel-collapse collapse white <?php echo ($checknemu['language'] != '')? "in" : ""; ?>">
                                  <div class="checkbox div-label-check" style="padding-right: 10px;">
                                       <label><input type="checkbox" id="chk_hs_co_ttnn" onchange="ngoaingu(this)" value="1" <?php echo ($checknemu['language'] == '1')? "checked" : ""; ?>>Hồ sơ có thông tin trình độ ngoại ngữ</label>
                                   </div>
                                   <?php for ($x=0; $x < count($ngoaingu); $x++) {
                                    ?>
                                    <div class="checkbox div-label-check" >
                                             <label><input type="checkbox" id="<?php echo 'nn'.$x?>" onchange="ngoaingu(this)" value="<?php echo $ngoaingu[$x]['language']?>"
                                               <?php
                                              if($checknemu['language'] != '1' && $checknemu['language'] != '')
                                              {
                                                $arrngoaingu = explode('/', $checknemu['language']);
                                                for($h = 0; $h < count($arrngoaingu)-1; $h++)
                                                {
                                                  if($ngoaingu[$x]['language'] == $arrngoaingu[$h])
                                                  {
                                                    echo "checked";
                                                    break;
                                                  }
                                                }
                                              }
                                              ?>
                                              ><?php echo $ngoaingu[$x]['language']; ?></label>
                                         </div>
                                   <?php
                                   } ?>
                                    <input type="hidden" id="countngoaingu" value="<?php echo count($ngoaingu) ?>">
                              </div>
                          </li>
                          <li  id="dropdown" class="li-nemu white">
                              <a data-toggle="collapse" href="#dropdown-lvl8" class="nav-list-hs weight600 gray-nav">
                                  Tin học <span class="fa fa-angle-right floatright"></span>
                              </a>
                              <div id="dropdown-lvl8" class="panel-collapse collapse white <?php echo ($checknemu['software'] != '')? "in" : ""; ?>">
                                  <div class="checkbox div-label-check" >
                                       <label><input type="checkbox" id="chk_hs_co_ttth" onchange="tinhoc(this)" value="1" <?php echo ($checknemu['software'] == '1')? "checked" : ""; ?>>Hồ sơ có thông tin trình độ tin học</label>
                                   </div>
                                   <?php for ($x=0; $x < count($tinhoc); $x++) {
                                    ?>
                                    <div class="checkbox div-label-check" >
                                             <label><input type="checkbox" id="<?php echo 'th'.$x?>" onchange="tinhoc(this)" value="<?php echo $tinhoc[$x]['software']?>"
                                              <?php
                                              if($checknemu['software'] != '1' && $checknemu['software'] != '')
                                              {
                                                $arrtinhoc = explode('/', $checknemu['software']);
                                                for($h = 0; $h < count($arrtinhoc)-1; $h++)
                                                {
                                                  if($tinhoc[$x]['software'] == $arrtinhoc[$h])
                                                  {
                                                    echo "checked";
                                                    break;
                                                  }
                                                }
                                              }
                                              ?>
                                              ><?php echo $tinhoc[$x]['software']; ?></label>
                                         </div>
                                   <?php
                                   } ?>
                                   <input type="hidden" id="counttinhoc" value="<?php echo count($tinhoc) ?>">
                              </div>
                          </li>
                          <li  id="dropdown" class="li-nemu white">
                            <a data-toggle="collapse" href="#dropdown-lvl9" class="nav-list-hs weight600 gray-nav">
                               Cá nhân <span class="fa fa-angle-right floatright"></span>
                                </a>
                               <div id="dropdown-lvl9" class="panel-collapse collapse white
                               <?php echo (($checknemu['gender'] != '')||($checknemu['placeofbirth'] != '')||($checknemu['agefrom'] != '')||($checknemu['ageto'] != '')||($checknemu['heightto'] != '')||($checknemu['heightfrom'] != '')||($checknemu['weightto'] != '')||($checknemu['weightfrom'] != '')||($checknemu['ethnic'] != '')||($checknemu['nationality'] != '')||($checknemu['cityori'] != '')||($checknemu['citycurr'] != '')||($checknemu['district'] != ''))? "in" : ""; ?>
                               ">
                                  <div class="checkbox div-label-check width100" >
                                       <label style="width: 50%"><input type="checkbox" id="chk_tuoi" onchange="filter()" <?php echo(($checknemu['agefrom'] != '')||($checknemu['ageto'] != ''))? "checked" : "";?>>Tuổi</label>
                                       <input type="text" name="" class="div-input" id="tuoi-tu" maxlength="2" style="margin-right: 10px" placeholder="Từ" value="<?php echo ($checknemu['agefrom'] != '')? $checknemu['agefrom'] : "";?>" >
                                       <input type="text" name="" class="div-input" id="tuoi-den" maxlength="2" placeholder="Đến" value="<?php echo ($checknemu['ageto'] != '')? $checknemu['ageto'] : "";?>" >
                                   </div>
                                   <div class="checkbox div-label-check" >
                                     <label><input type="checkbox" value="M" id="chk_nam" onchange="gioitinh(this)" <?php echo ($checknemu['gender'] == 'M')? "checked": ""; ?>>Nam</label>
                                 </div>
                                 <div class="checkbox div-label-check" >
                                     <label><input type="checkbox" value="F" id="chk_nu" onchange="gioitinh(this)" <?php echo ($checknemu['gender'] == 'F')? "checked": ""; ?>>Nữ</label>
                                 </div>
                                    <div class="checkbox div-label-check width100" >
                                       <label style="width: 50%"><input type="checkbox" id="chk_chieucao" onchange="filter()" <?php echo(($checknemu['heightfrom'] != '')||($checknemu['heightto'] != ''))? "checked" : "";?>>Chiều cao (Cm)</label>
                                       <input type="text" name="" class="div-input" style="margin-right: 10px" maxlength="3" id="caotu" placeholder="Từ" value="<?php echo ($checknemu['heightfrom'] != '')? $checknemu['heightfrom'] : "";?>" >
                                       <input type="text" name="" class="div-input" placeholder="Đến" maxlength="3" id="caoden" value="<?php echo ($checknemu['heightto'] != '')? $checknemu['heightto'] : "";?>" >
                                   </div>
                                   <div class="checkbox div-label-check width100" >
                                       <label style="width: 50%"><input type="checkbox" id="chk_cannang" onchange="filter()" <?php echo(($checknemu['weightfrom'] != '')||($checknemu['weightto'] != ''))? "checked" : "";?>>Cân nặng (Kg)</label>
                                       <input type="text" name="" class="div-input" maxlength="3" style="margin-right: 10px" placeholder="Từ" id="nangtu" value="<?php echo ($checknemu['weightfrom'] != '')? $checknemu['weightfrom'] : "";?>" >
                                       <input type="text" name="" class="div-input" maxlength="3" placeholder="Đến" id="nangden" value="<?php echo ($checknemu['weightto'] != '')? $checknemu['weightto'] : "";?>" >
                                   </div>
                                   <div class="checkbox div-label-check width100" >
                                       <label style="width: 50%"><input type="checkbox" id="chk_noisinh" onchange="filter()" <?php echo ($checknemu['placeofbirth'] != '')? "checked" : "";?>>Nơi Sinh</label>
                                       <select class="js-example-basic-single floatright select2" id="noisinh-ad" onchange="filter()">
                                           <option value="0"  >Chọn tỉnh thành</option>
                                          <?php foreach ($city as $key ) {

                                          ?>
                                            <option value="<?php echo $key['name'] ?>" <?php echo ($key['name'] == $checknemu['placeofbirth']) ? "selected" : ""; ?>><?php echo $key['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                   </div>
                                   <div class="checkbox div-label-check width100" style="margin-top: 5px;">
                                       <label style="width: 50%"><input type="checkbox" id="chk_dantoc" onchange="filter()" <?php echo ($checknemu['ethnic'] != '')? "checked" : "";?>>Dân tộc</label>
                                       <input type="text" name="" class="div-input2"  placeholder="" id="dantoc-ad" value="<?php echo ($checknemu['ethnic'] != '')? $checknemu['ethnic'] : "";?>" >
                                   </div>
                                   <div class="checkbox div-label-check width100" >
                                       <label style="width: 50%"><input type="checkbox" id="chk_quoctich" onchange="filter()" <?php echo ($checknemu['nationality'] != '')? "checked" : "";?>>Quốc tịch</label>
                                       <select class="div-input2" id="quoctich-ad" onchange="filter()">
                                          <option value="Việt Nam">Việt Nam</option>
                                          <option value="Khác" <?php echo ($checknemu['nationality'] == 'Khác')? "selected":"";?>>Khác</option>
                                       </select>
                                   </div>
                                   <div class="checkbox div-label-check width100" >
                                       <label style="width: 50%"><input type="checkbox" id="chk_tp_thgtru" onchange="filter()" <?php echo ($checknemu['cityori'] != '')? "checked" : "";?>>Thành phố thường trú</label>
                                       <select class="js-example-basic-single floatright select2" id="tp_thgtru" onchange="filter()">
                                           <option value="0"  >Chọn tỉnh thành</option>
                                          <?php foreach ($city as $key ) {

                                          ?>
                                            <option value="<?php echo $key['id_city'] ?>" <?php echo ($key['id_city'] == $checknemu['cityori']) ? "selected" : ""; ?>><?php echo $key['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                   </div>
                                   <div class="checkbox div-label-check width100" >
                                       <label style="width: 50%"><input type="checkbox" id="chk_tp_dgsg" onchange="filter()" <?php echo ($checknemu['citycurr'] != '')? "checked" : "";?>>Thành phố đang sống</label>
                                       <select class="js-example-basic-single floatright select2" name="noisinh" onchange="selectcity(this.value,'')" id="tp_dgsg">
                                           <option value="0"  >Chọn tỉnh thành</option>
                                          <?php foreach ($city as $key ) {

                                          ?>
                                            <option value="<?php echo $key['id_city'] ?>" <?php echo ($key['id_city'] == $checknemu['citycurr']) ? "selected" : ""; ?>><?php echo $key['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                   </div>
                                    <div class="checkbox div-label-check width100 disabled" id="quanhuyen-nav11" >
                                       <label style="width: 50%"><input type="checkbox" onchange="filter()" id="quanhuyen-nav12" disabled
                                        <?php echo ($checknemu['district'] != '')? "checked" : "";?>>Quận huyện đang sống</label>
                                       <select class="js-example-basic-single select2" name="quanhuyen" style="width: 100%" id="quanhuyen-nav" required onchange="filter()">
                                        <option value="0" id="chonqh-nav1" >Chọn quận huyện</option>
                                      </select>
                                  </div>
                              </div>
                          </li>
                          <li  id="dropdown" class="li-nemu white">
                              <a data-toggle="collapse" href="#dropdown-lvl10" class="nav-list-hs weight600 gray-nav">
                                  Gia đình <span class="fa fa-angle-right floatright"></span>
                              </a>
                              <div id="dropdown-lvl10" class="panel-collapse collapse white <?php echo ($checknemu['maritalstatus'] != '')? "in" : ""; ?>">
                                  <div class="checkbox div-label-check" >
                                     <label><input type="checkbox" value="S" id="chk_chuacogd" onchange="giadinh(this)" <?php echo ($checknemu['maritalstatus'] == 'S')? "checked" : ""; ?> >Chưa có gia đình</label>
                                 </div>
                                 <div class="checkbox div-label-check" >
                                     <label><input type="checkbox" value="M" id="chk_cogd" onchange="giadinh(this)" <?php echo ($checknemu['maritalstatus'] == 'M')? "checked" : ""; ?> >Đã có gia đình</label>
                                 </div>
                              </div>
                          </li>
                          <li  id="dropdown" class="li-nemu white">
                              <a data-toggle="collapse" href="#dropdown-lvl11" class="nav-list-hs weight600 gray-nav">
                                   Tags <span class="fa fa-angle-right floatright"></span>
                              </a>
                              <div id="dropdown-lvl11" class="panel-collapse collapse white <?php echo ($checknemu['tagrandom'] != '')? "in" : ""; ?>">
                                   <?php
                                   for ($x=0; $x < count($tagrandom); $x++) {
                                    ?>
                                    <div class="checkbox div-label-check" >
                                             <label><input type="checkbox" id="<?php echo 'tagr'.$x?>" onchange="filter()" value="<?php echo $tagrandom[$x]['tagid']?>"
                                                <?php

                                              if($checknemu['tagrandom'] != '')
                                              {
                                                $arrtag = explode('/', $checknemu['tagrandom']);
                                                for($h = 0; $h < count($arrtag)-1; $h++)
                                                {
                                                  if($tagrandom[$x]['tagid'] == $arrtag[$h])
                                                  {
                                                    echo "checked";
                                                    break;
                                                  }
                                                }
                                              }
                                              ?>
                                              ><?php echo $tagrandom[$x]['title']; ?></label>
                                         </div>
                                   <?php
                                   } ?>
                                   <input type="hidden" id="counttagrandom" value="<?php echo count($tagrandom) ?>">
                              </div>
                          </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <button type="button" class="btn-luu-nav" onclick="clicksave()"> Lưu</button>
        </div>
    </div>
</div>
<div class="modal fade" id="save-preset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="form_filter">

      <div class="modal-header model-tittle" >
        <button type="button" class="close" data-dismiss="modal" style="color: white" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title model-filter" id="myModalLabel" >Lưu tiêu chí lọc tổng hợp</h4>

      </div>
      <div class="modal-body">
           <div class="row margin-b10" >
            <div class="col-md-5"><label class="weight350">Tên gọi của tiêu chí</label>
            </div>
            <div class="col-md-7">
                <!-- <select class="model-select">
                    <option class="pad5">Ứng viên vị trí hành chính nhân sự</option>
                </select> -->
                <input type="text" id="name_filter" class="model-select" required>
            </div>
           </div>
           <label class="weight350">Dành cho Admin:</label>
            <div class="row">
            <div class="col-md-5">
                <label class="weight350">Áp dụng E-mail</label>
            </div>
            <div class="col-md-7">
               <label class="weight350 width100"><i class="fa fa-minus-circle" style="color: #F5821F"></i> &nbsp; Tin tức DXG</label>
               <label class="weight350 width100"><i class="fa fa-minus-circle" style="color: #F5821F"></i> &nbsp; Tin tức Tuyển dụng (Nhân sự)</label>
               <label class="weight350"><i class="fa fa-plus-circle" style="color: #5FA2DD"></i></label> &nbsp;
                <select id="example-multiple-selected" multiple="multiple">
                    <option value="1">Chọn tất cả</option>
                    <option value="2" selected="selected">Tin tức chế độ nhân sự</option>
                    <option value="3">Tin tức đãi ngộ đặc biệt</option>
                </select>
            </div>
           </div>
      </div>

      <div class="modal-footer pad-tb10" >
        <label class="model-share"><input type="checkbox" id="chk_share_tieuchi" > &nbsp; Chia sẻ tiêu chí lọc</label>
        <button type="button" class="btn btn-admin orange"  data-dismiss="modal">Hủy</button>

        <input type="button" onclick="save_filter()" class="btn btn-admin blue" value="Lưu">
      </div>
    </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editFilter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-60"  role="document" style="width:1200px;">
        <div class="modal-content">
              <iframe id="iframe_filter" src="" style="min-height: 700px;width: 100%;border: none"></iframe>
        </div>
    </div>
</div>


<input type="hidden" id="quanhuyen_filter">
<input type="hidden" id="checkqh" value="<?php echo isset($checknemu['district'])? $checknemu['district'] : '';  ?>">
<input type="hidden" id="checkcity" value="<?php echo isset($checknemu['citycurr'])? $checknemu['citycurr'] : '';  ?>">

<style type="text/css">
  a.li_filter .an{
    float: right;
    display: none;
    cursor: pointer;
  }
  a.li_filter:hover  .an{
    display: block;
  }
</style>
<script type="text/javascript">

  function editFilter(id){
      $('#iframe_filter').attr('src','<?php echo base_url() ?>admin/handling/editFilter/'+id);

      $('#editFilter').modal('show');
  }
  $(document).keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        $(".btn_search").trigger('click');
    }
  });
  $('.thoigian').datetimepicker({
    timepicker:false,
    format:'d-m-Y',
  });
    function sort_can(obj)
    {
      switch(obj)
      {
          case 1: {
              $('#chonsx').html('Tiềm năng <span class="glyphicon glyphicon-chevron-down"></span>');
              break; }
          case 2: {
              $('#chonsx').html('Kinh nghiệm <span class="glyphicon glyphicon-chevron-down"></span>');
              break; }
          case 3: {
              $('#chonsx').html('Điểm <span class="glyphicon glyphicon-chevron-down"></span>');
              break; }
          case 4: {
              $('#chonsx').html('Tuổi <span class="glyphicon glyphicon-chevron-up"></span>');
              break; }
          case 5: {
              $('#chonsx').html('Bằng cấp <span class="glyphicon glyphicon-chevron-down"></span>');
              break; }
          case 6: {
              $('#chonsx').html('Ngày cập nhật <span class="glyphicon glyphicon-chevron-down"></span>');
              break; }
      }
        filter();
    }
    function gioitinh(obj)
    {
        var value = obj.value;

        if(value == 'M')
        {
          $("#chk_nu").prop("checked",false);
        }
        if(value == 'F')
        {
          $("#chk_nam").prop('checked', false);
        }
        filter();
    }
    function giadinh(obj)
    {

        var value = obj.value;

        if(value == 'S')
        {
          $("#chk_cogd").prop("checked",false);
        }
        if(value == 'M')
        {
          $( "#chk_chuacogd").prop('checked', false);
        }
        filter();
    }
    function kinhnghiem(obj)
    {

        var value = obj.value;

        if(value == 'C')
        {
          $("#chk_cokm").prop("checked",false);
        }
        if(value == 'D')
        {
          $( "#chk_chuacokm").prop('checked', false);
        }
        filter();
    }
    function hocvan(obj)
    {

        var value = obj.value;

        if(value == '1')
        {
          for(var i = 0; i < $('#counthocvan').val() ; i++ )
           {
                $('#hv'+i).prop("checked",false);
           }
        }
        else
        {
          $( "#chk_hs_co_tthv").prop('checked', false);
        }
        filter();
    }
    function ngoaingu(obj)
    {

        var value = obj.value;
        if(value == '1')
        {
          for(var i = 0; i < $('#countngoaingu').val() ; i++ )
           {
                $('#nn'+i).prop("checked",false);
           }
        }
        else
        {
          $( "#chk_hs_co_ttnn").prop('checked', false);
        }
        filter();
    }
    function tinhoc(obj)
    {

        var value = obj.value;

        if(value == '1')
        {
          for(var i = 0; i < $('#counttinhoc').val() ; i++ )
           {
                $('#th'+i).prop("checked",false);
           }
        }
        else
        {
          $( "#chk_hs_co_ttth").prop('checked', false);
        }
        filter();
    }

    function filter(check = '')
    {
      if ($('#check_filter').is(':checked')){
        check = 'on';
      }
      if(check == 'on'){
        if ($(':checkbox').is(':checked')){
          $('#check_filter_2').prop('checked', false);
          $('#check_filter_3').prop('checked', false);
          $('#check_filter').prop('checked', true);
        }
      }
      var value = {'gender' : '','placeofbirth' : '' , 'agefrom': '' , 'ageto' : '', 'heightto' : '', 'heightfrom': '',  'weightto' : '', 'weightfrom': '' , 'ethnic' : '', 'nationality' : '' , 'cityori' : '' , 'citycurr' : '' , 'district' : '' , 'currbenefitto' : '' , 'currbenefitfrom' : '' , 'desbenefitto' : '' , 'desbenefitfrom' : '' , 'experfrom' : '' , 'experto' : '', 'knowledge' : '' , 'language' : '' , 'software' : '' , 'profilesrc' : '', 'maritalstatus' : '' , 'talentfrom' : '' , 'talentto' : '' , 'updatefrom' : '' , 'updateto' : '' ,  'blocked' : '' , 'rateto' : '' , 'ratefrom' : '' , 'tag' : '' , 'tagrandom' : '' , 'sort' : ''};
       if($('#chk_chuacogd').is(':checked'))
       {
          value['maritalstatus'] = 'S';
       }
       if($('#chk_cogd').is(':checked'))
       {
          value['maritalstatus'] = 'M';
       }
       if($('#chk_nam').is(':checked'))
       {
          value['gender'] = 'M';
       }
       if($('#chk_nu').is(':checked'))
       {
          value['gender'] = 'F';
       }
       if($('#chk_noisinh').is(':checked'))
       {
         if(($('#noisinh-ad').val() != '') && ($('#noisinh-ad').val() != 0))
         {
            value['placeofbirth'] = $('#noisinh-ad').val();
         }
         else {
          $( "#chk_noisinh").prop('checked', false);
         }
       }
       if($('#chk_tuoi').is(':checked'))
       {
          if(($('#tuoi-tu').val() == '') && ($('#tuoi-den').val() == ''))
          {
            $( "#chk_tuoi").prop('checked', false);
          }
          else
          {
            value['agefrom'] = $('#tuoi-tu').val();
            value['ageto'] = $('#tuoi-den').val();
          }
       }
       if($('#chk_chieucao').is(':checked'))
       {
          if(($('#caotu').val() == '') && ($('#caoden').val() == ''))
          {
            $( "#chk_chieucao").prop('checked', false);
          }
          else
          {
            value['heightfrom'] = $('#caotu').val();
            value['heightto'] = $('#caoden').val();
          }
       }
       if($('#chk_cannang').is(':checked'))
       {
          if(($('#nangtu').val() == '') && ($('#nangden').val() == ''))
          {
            $( "#chk_cannang").prop('checked', false);
          }
          else
          {
            value['weightfrom'] = $('#nangtu').val();
            value['weightto'] = $('#nangden').val();
          }
       }
       if($('#chk_dantoc').is(':checked'))
       {
          if($('#dantoc-ad').val() == ''){
            $( "#chk_dantoc").prop('checked', false);
          } else {
            value['ethnic'] = $('#dantoc-ad').val();
          }
       }
       if($('#chk_quoctich').is(':checked'))
       {
          if($('#quoctich-ad').val() == ''){
            $( "#chk_quoctich").prop('checked', false);
          } else {
            value['nationality'] = $('#quoctich-ad').val();
          }
       }
       if($('#chk_tp_thgtru').is(':checked'))
       {
          if(($('#tp_thgtru').val() == '') || ($('#tp_thgtru').val() == 0) ){
            $( "#chk_tp_thgtru").prop('checked', false);
          } else {
            value['cityori'] = $('#tp_thgtru').val();
          }
       }
       if($('#chk_tp_dgsg').is(':checked'))
       {
          if(($('#tp_dgsg').val() == '') || ($('#tp_dgsg').val() == 0) ){
            $( "#chk_tp_dgsg").prop('checked', false);
          } else {
            value['citycurr'] = $('#tp_dgsg').val();
          }
       }
       if($('#quanhuyen-nav12').is(':checked'))
       {

          if(($('#quanhuyen-nav').val() == '') || ($('#quanhuyen-nav').val() == 0) ){
            $( "#quanhuyen-nav12").prop('checked', false);
          } else {
            if($('#quanhuyen-nav').val() == null){
              value['district'] = $('#quanhuyen_filter').val();
            }else{
              value['district'] = $('#quanhuyen-nav').val();
            }
          }
       }
       if($('#chk_thunhapht').is(':checked'))
       {
          if(($('#tn_httu').val() == '' ) && ($('#tn_htden').val() == ''))
          {
            $( "#chk_thunhapht").prop('checked', false);
          }
          else
          {
            value['currbenefitfrom'] = $('#tn_httu').val();

            value['currbenefitto'] = $('#tn_htden').val();

          }
       }
       if($('#chk_thunhapmm').is(':checked'))
       {
          if(($('#tn_mmtu').val() == '') && ($('#tn_mmden').val() == ''))
          {
            $( "#chk_thunhapmm").prop('checked', false);
          }
          else
          {
            value['desbenefitfrom'] = $('#tn_mmtu').val();
            value['desbenefitto'] = $('#tn_mmden').val();
          }
       }
       if($('#chk_chuacokm').is(':checked'))
       {
          value['experfrom'] = 'C';
       }
       if($('#chk_cokm').is(':checked'))
       {
          if(($('#kinhnghiem_tu').val() == '') && ($('#kinhnghiem_den').val() == ''))
          {
            $( "#chk_cokm").prop('checked', false);
          }
          else
          {
            value['experfrom'] = $('#kinhnghiem_tu').val();
            value['experto'] = $('#kinhnghiem_den').val();
          }
       }
       if($('#chk_hs_co_tthv').is(':checked'))
       {
          value['knowledge'] = '1';
       } else{
          for(var i = 0; i < $('#counthocvan').val() ; i++ )
          {
            if($('#hv'+i).is(':checked'))
           {
              value['knowledge'] += $('#hv'+i).val()+'/';
           }
          }
       }
       if($('#chk_hs_co_ttnn').is(':checked'))
       {
          value['language'] = '1';
       } else{
          for(var i = 0; i < $('#countngoaingu').val() ; i++ )
          {
            if($('#nn'+i).is(':checked'))
           {
              value['language'] += $('#nn'+i).val()+'/';
           }
          }
       }
       if($('#chk_hs_co_ttth').is(':checked'))
       {
          value['software'] = '1';
       }else{
          for(var i = 0; i < $('#counttinhoc').val() ; i++ )
          {
            if($('#th'+i).is(':checked'))
           {
              value['software'] += $('#th'+i).val()+'/';
           }
          }
       }
       for(var i = 0; i < $('#countprofile').val() ; i++ )
       {
          if($('#src'+i).is(':checked'))
         {
            value['profilesrc'] += $('#src'+i).val()+'/';
         }
       }
       for(var i = 0; i < $('#counttag').val() ; i++ )
       {
          if($('#tag'+i).is(':checked'))
         {
            value['tag'] += $('#tag'+i).val()+'/';
         }
       }
       for(var i = 0; i < $('#counttagrandom').val() ; i++ )
       {
          if($('#tagr'+i).is(':checked'))
         {
            value['tagrandom'] += $('#tagr'+i).val()+'/';
         }
       }
       if($('#chk_tiemnang').is(':checked'))
       {
          if(($('#tiemnang_tu').val() == '') && ($('#tiemnang_den').val() == ''))
          {
            $( "#chk_tiemnang").prop('checked', false);
          }
          else
          {
            value['talentfrom']   = $('#tiemnang_tu').val();
            value['talentto']     = $('#tiemnang_den').val();
          }
       }
       if($('#chk_lastupdate').is(':checked'))
       {
          if(($('#update_tu').val() == '') && ($('#update_den').val() == ''))
          {
            $( "#chk_lastupdate").prop('checked', false);
          }
          else
          {
            value['updatefrom']   = $('#update_tu').val();
            value['updateto']     = $('#update_den').val();
          }
       }
       if($('#chk_chan').is(':checked'))
       {
          value['blocked'] = 'Y';
       }
        if($('#chk_diem').is(':checked'))
       {
          if(($('#diem_tu').val() == '') && ($('#diem_den').val() == ''))
          {
            $( "#chk_diem").prop('checked', false);
          }
          else
          {
            value['ratefrom'] = $('#diem_tu').val();
            value['rateto'] = $('#diem_den').val();
          }
       }
       if($('#chonsx').text() != "Chọn sắp xếp..")
       {
          value['sort'] = $('#chonsx').text();
       }
        $('.candidate-load').empty();
        $.ajax({
          url: '<?php echo base_url()?>admin/handling/filter_candidate',
          type: 'POST',
          dataType: 'JSON',
          data: {value: value, check_all:check},
        })
        .done(function(data) {
            $('.demhs').text(data['total_rows'] +' Hồ sơ');
            $('.pagination-page').empty().html(data['phantrang']);
            for(var i in data)
            {
              if (typeof data[i] === 'object') {
                 var gt = "";
                if(data[i]['gender'] == "M") gt = "Nam"; else gt = "Nữ";

                var chieucao = "";
                if(data[i]['height'] == 0) chieucao = ""; else chieucao = data[i]['height']+"cm, ";

                var cannang = "";
                if(data[i]['weight'] == 0) cannang = ""; else cannang = data[i]['weight']+"kg, ";
                var kinhnghiem = "";

                var bangcap = "";
                if(data[i]['certificate'] == "") bangcap = ""; else bangcap = data[i]['certificate']+", ";
                var ngonngu = "";
                if(data[i]['countlanguage'] == 0)
                { ngonngu = ""; }
                else if(data[i]['countlanguage'] == 1)
                { ngonngu = data[i]['language']+", "; }
                else ngonngu = data[i]['language']+"+"+(data[i]['countlanguage']-1)+", ";
                var phanmem = "";
                if(data[i]['countsoftware'] == 0) phanmem = "";
                else if(data[i]['countsoftware'] == 1) phanmem = data[i]['software']+", ";
                else phanmem = data[i]['software']+"+"+(data[i]['countsoftware']-1)+", ";
                var star = '';
                if(data[i]['istalent'] == 0) {
                star = '<span class="fa-stack fa-1x"><i class="fa fa-star color-gray fa-stack-2x nohover size18"></i><span class="fa fa-stack-1x color-white size9"></span></span>';
                 } else {
                star = '<span class="fa-stack fa-1x"><i class="fa fa-star color-orange fa-stack-2x nohover size18"></i><span class="fa fa-stack-1x color-white size9">'+data[i]['istalent'] +'</span></span>';
                }
                var dss = '';
                if(data[i]['blocked'] == 'Y') { dss ='<div class="col-md-3 padding-lr0 " id="ds'+data[i]['candidateid']+'">'; }
                else {
                  dss = '<div class="col-md-4 padding-lr0 " id="ds'+data[i]['candidateid']+'">';
                }
                var bb = '';
                 if(data[i]['blocked'] == 'Y') { bb = '<i class="fa fa-ban color-red " ></i>'; }
                 var bell = '';
                if(data[i]['unsubcribe'] == 'Y') bell = "-slash";
                var vt = '';
                if(data[i]['position'] != '') {
                    vt = '<label class="tuyendung-label1 color-black">'+data[i]['position']+'</label>';
                }
                var tag = '';
                if(data[i]['tags'] != '')
                {
                  tag = '<label class="tuyendung-label2">'+data[i]['tags']+'</label>';
                }
                var recruite = '';
                if (data[i]['recruite'] > 0) {
                  recruite = '<i class="fa fa-flag color-flag-recruite" ></i>';
                }
                var hm = '<a href="<?php echo base_url()?>admin/handling/profile/'+data[i]['candidateid']+'" class="hover-profile load-remove">';
                hm+= '<div class="col-md-6 profile dash-horizontal pad-l0 pad-r5 min-h152"><table class="margin-t5 margin-b5"><tr><td class="td-cot1"><input class="checkcandidate" type="checkbox" value="'+data[i]['candidateid']+'" name="check[]" onclick="checkbox()"></td><td class="td-cot2">';
                hm+= '<img src="<?php echo base_url()?>public/image/'+data[i]['imagelink']+'" class="frameimage" width="70px" height="70px">';

                hm+= '<label class="label-td pad-t3" >'+Math.round(data[i]['rate'])+' điểm</label><label class="label-td pad-t1" >'+data[i]['count_campaign']+' chiến dịch</label><label class="margin-t-3"><i class="fa fa-bell'+bell+' icon-label pad-l2"></i><i class="fa fa-user icon-label"></i><i class="fa fa-clock-o icon-de" ></i></label></td><td class="td-cot3"><div class="row width100 margin-l0" ><div class="col-md-7 padding-lr0">';
                hm+= '<label class="label-name color-black">'+data[i]['name']+' '+recruite+'</label>';
                hm+= '</div>'+dss+'<span class="webportal">'+data[i]['profilesrc']+'</span></div><div id="talent'+data[i]['candidateid']+'" class="col-md-1 padding-lr0 ">'+star+'</div><div class="col-md-1 padding-lr0 icon-block" id="block'+data[i]['candidateid']+'">'+bb+'</div></div>'+vt+tag+'<label class="tuyendung-label3">';

                hm+= ''+gt+', '+data[i]['dateofbirth2']+' tuổi, '+chieucao+''+cannang+''+data[i]['kinhnghiem']+''+data[i]['thunhap']+''+bangcap+''+ngonngu+''+phanmem+'...';
                hm+= '</label> <span class="highr">'+data[i]['tagsrandom']+'</span></td></tr> </table></div></a>';

                $('.candidate-load').append(hm);
              }
              // console.log(data.length);
              // $('.demhs').text(data.length +' Hồ sơ');
             }

          })
        .fail(function() {
          alert('thatbai');
          console.log("error");
        });

    }
    function selectcity(obj,get=''){
      var $id = obj;
      $('.gicungdc').remove();
      $('#quanhuyen-nav11').addClass("disabled");
      $('#quanhuyen-nav12').attr('disabled','disabled');
      $( "#quanhuyen-nav12").prop('checked', false);
      if($id != '0')
      {
        $('#quanhuyen-nav11').removeClass("disabled");
        $('#quanhuyen-nav12').removeAttr('disabled','disabled');
      }

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
                  $('#chonqh-nav1').after('<option class="gicungdc" value="'+data[i].id_district+'" selected>'+data[i].name+'</option>');
                }
                else
                {
                  $('#chonqh-nav1').after('<option class="gicungdc" value="'+data[i].id_district+'">'+data[i].name+'</option>');
                }
              }
          })
        .fail(function() {
          alert('thatbai');
          console.log("error");
        });
    }

    function clicksave()
    {
        $('#save-preset').modal('show');
    }
     $('#example-multiple-selected').multiselect();
     $('.js-example-basic-single').select2();

    $("input[id='tuoi-tu']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
    $("input[id='tuoi-den']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});

    $("input[id='caotu']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
    $("input[id='caoden']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});

    $("input[id='nangtu']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
    $("input[id='nangden']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});

    $("input[id='tn_httu']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9,]/g, ''));});
    $("input[id='tn_htden']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9,]/g, ''));});
    $("input[id='tn_mmtu']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9,]/g, ''));});
    $("input[id='tn_mmden']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9,]/g, ''));});

    $("input[id='kinhnghiem_tu']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
    $("input[id='kinhnghiem_den']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});

    $("input[id='diem_tu']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
      if($(this).val() > 100) { $(this).val(100); }
    });
    $("input[id='diem_den']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
      if($(this).val() > 100) { $(this).val(100); }
    });
    $("input[id='tiemnang_tu']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
    $("input[id='tiemnang_den']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});

     $('.so').on('input', function(e){
      if ($(this).val() == '') {
              $(this).val();
        }
    $(this).val(formatCurrency(this.value.replace(/[,VNĐ]/g,'')));
    }).on('keypress',function(e){
        if ($(this).val() == 0)
          $(this).val('');
        if(!$.isNumeric(String.fromCharCode(e.which))) e.preventDefault();
    }).on('paste', function(e){
        var cb = e.originalEvent.clipboardData || window.clipboardData;
        if(!$.isNumeric(cb.getData('text'))) e.preventDefault();
    });
    function formatCurrency(number){
        var n = number.split('').reverse().join("");
        var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");
        return  n2.split('').reverse().join('');
    }
    function save_filter()
    {
      var value = {'gender' : '','placeofbirth' : '' , 'age': '' , 'height' : '',  'weight' : '', 'ethnic' : '', 'nationality' : '' , 'cityori' : '' , 'citycurr' : '' , 'district' : '' , 'currentbenefit' : '' , 'desirebenefit' : '' , 'experience' : '' , 'knowledge' : '' , 'language' : '' , 'software' : '' , 'maritalstatus' : '' , 'istalent' : '' , 'lastupdate' : '' , 'blocked' : '' , 'rate' : '' , 'tag' : '' , 'tagrandom' : ''};

       if($('#chk_nam').is(':checked'))
       {
          value['gender'] = 'candidate/gender/S/=/M/';
       }
       if($('#chk_nu').is(':checked'))
       {
          value['gender'] = 'candidate/gender/S/=/F/';
       }
        if($('#chk_chuacogd').is(':checked'))
       {
          value['maritalstatus'] = 'candidate/maritalstatus/S/=/S/';
       }
       if($('#chk_cogd').is(':checked'))
       {
          value['maritalstatus'] = 'candidate/maritalstatus/S/=/M/';
       }
       if($('#chk_noisinh').is(':checked'))
       {
         if(($('#noisinh-ad').val() != '') && ($('#noisinh-ad').val() != 0))
         {
            value['placeofbirth'] = 'candidate/placeofbirth/S/=/'+$('#noisinh-ad').val()+'/';
         }
         else {
          $( "#chk_noisinh").prop('checked', false);
         }
       }
       if($('#chk_tuoi').is(':checked'))
       {
          if(($('#tuoi-tu').val() == '') && ($('#tuoi-den').val() == ''))
          {
            $( "#chk_tuoi").prop('checked', false);
          }
          else
          {
            if(($('#tuoi-tu').val() != '' ) && ($('#tuoi-den').val() != '') ) $ope = "BETWEEN";
            else if($('#tuoi-tu').val() != '') $ope = "BEGIN WITH";
            else $ope = "END WITH";
            value['age'] = 'candidate/dateofbirth/D/'+$ope+'/'+$('#tuoi-tu').val()+'/'+$('#tuoi-den').val();
          }
       }
       if($('#chk_chieucao').is(':checked'))
       {
          if(($('#caotu').val() == '') && ($('#caoden').val() == ''))
          {
            $( "#chk_chieucao").prop('checked', false);
          }
          else
          {
            if(($('#caotu').val() != '' ) && ($('#caoden').val() != '') ) $ope = "BETWEEN";
            else if($('#caotu').val() != '') $ope = "BEGIN WITH";
            else $ope = "END WITH";
            value['height'] = 'candidate/height/N/'+$ope+'/'+$('#caotu').val()+'/'+$('#caoden').val();
          }
       }
       if($('#chk_cannang').is(':checked'))
       {
          if(($('#nangtu').val() == '') && ($('#nangden').val() == ''))
          {
            $( "#chk_cannang").prop('checked', false);
          }
          else
          {
            if(($('#nangtu').val() != '' ) && ($('#nangden').val() != '') ) $ope = "BETWEEN";
            else if($('#nangtu').val() != '') $ope = "BEGIN WITH";
            else $ope = "END WITH";
            value['weight'] = 'candidate/weight/N/'+$ope+'/'+$('#nangtu').val()+'/'+$('#nangden').val();
          }
       }
       if($('#chk_dantoc').is(':checked'))
       {
          if($('#dantoc-ad').val() == ''){
            $( "#chk_dantoc").prop('checked', false);
          } else {

            value['ethnic'] = 'candidate/ethnic/S/=/'+$('#dantoc-ad').val()+'/';
          }
       }
       if($('#chk_quoctich').is(':checked'))
       {
          if($('#quoctich-ad').val() == ''){
            $( "#chk_quoctich").prop('checked', false);
          } else {
            value['nationality'] = 'candidate/nationality/S/=/'+$('#quoctich-ad').val()+'/';
          }
       }
       if($('#chk_tp_thgtru').is(':checked'))
       {
          if(($('#tp_thgtru').val() == '') || ($('#tp_thgtru').val() == 0) ){
            $( "#chk_tp_thgtru").prop('checked', false);
          } else {
            value['cityori'] = 'canaddress/cityori/S/=/'+$('#tp_thgtru').val()+'/';
          }
       }
       if($('#chk_tp_dgsg').is(':checked'))
       {
          if(($('#tp_dgsg').val() == '') || ($('#tp_dgsg').val() == 0) ){
            $( "#chk_tp_dgsg").prop('checked', false);
          } else {
            value['citycurr'] = 'canaddress/citycurr/S/=/'+$('#tp_dgsg').val()+'/';
          }
       }
       if($('#quanhuyen-nav12').is(':checked'))
       {
          if(($('#quanhuyen-nav').val() == '') || ($('#quanhuyen-nav').val() == 0) ){
            $( "#quanhuyen-nav12").prop('checked', false);
          } else {

            value['district'] = 'canaddress/district/S/=/'+$('#quanhuyen-nav').val()+'/';
          }
       }
       if($('#chk_thunhapht').is(':checked'))
       {
          if(($('#tn_httu').val() == '') && ($('#tn_htden').val() == ''))
          {
            $( "#chk_thunhapht").prop('checked', false);
          }
          else
          {
            if(($('#tn_httu').val() != '' ) && ($('#tn_htden').val() != '') ) $ope = "BETWEEN";
            else if($('#tn_httu').val() != '') $ope = "BEGIN WITH";
            else $ope = "END WITH";
            value['currentbenefit'] = 'candidate/currentbenefit/N/'+$ope+'/'+$('#tn_httu').val()+'/'+$('#tn_htden').val();
          }
       }
       if($('#chk_thunhapmm').is(':checked'))
       {
          if(($('#tn_mmtu').val() == '') && ($('#tn_mmden').val() == ''))
          {
            $( "#chk_thunhapmm").prop('checked', false);
          }
          else
          {
            if(($('#tn_mmtu').val() != '' ) && ($('#tn_mmden').val() != '') ) $ope = "BETWEEN";
            else if($('#tn_mmtu').val() != '') $ope = "BEGIN WITH";
            else $ope = "END WITH";
            value['disirebenefit'] = 'candidate/disirebenefit/N/'+$ope+'/'+$('#tn_mmtu').val()+'/'+$('#tn_mmden').val();
          }
       }
       if($('#chk_chuacokm').is(':checked'))
       {
          value['experience'] = 'canexperience/experience/S/NOT IN/C/';
       }
       if($('#chk_cokm').is(':checked'))
       {
          if(($('#kinhnghiem_tu').val() != '' ) && ($('#kinhnghiem_den').val() != '') ) $ope = "BETWEEN";
          else if($('#kinhnghiem_tu').val() != '') $ope = "BEGIN WITH";
          else $ope = "END WITH";
          value['experience'] = 'canexperience/experience/N/'+$ope+'/'+$('#kinhnghiem_tu').val()+'/'+$('#kinhnghiem_den').val();
       }
       if($('#chk_hs_co_tthv').is(':checked'))
       {
           value['knowledge'] = 'canknowledge/knowledge/S/IN/1/';
       }
       else
       {
           for(var i = 0; i < $('#counthocvan').val() ; i++ )
           {
              if($('#hv'+i).is(':checked'))
             {
                value['knowledge'+i] = 'canknowledge/knowledge/S/=/'+$('#hv'+i).val()+'/';
             }
           }
       }
       if($('#chk_hs_co_ttnn').is(':checked'))
       {
          value['language'] = 'canlanguage/language/S/IN/1/';
       }
       else
       {
           for(var i = 0; i < $('#countngoaingu').val() ; i++ )
           {
              if($('#nn'+i).is(':checked'))
             {
                value['language'+i] = 'canlanguage/language/S/=/'+$('#nn'+i).val()+'/';
             }
           }
       }
       if($('#chk_hs_co_ttth').is(':checked'))
       {

          value['software'] = 'cansoftware/software/S/IN/1/';
       }
       else
       {
           for(var i = 0; i < $('#counttinhoc').val() ; i++ )
           {
              if($('#th'+i).is(':checked'))
             {
                value['software'+i] = 'cansoftware/software/S/=/'+$('#th'+i).val()+'/';
             }
           }
       }
       for(var i = 0; i < $('#countprofile').val() ; i++ )
       {
          if($('#src'+i).is(':checked'))
         {
            value['profilesrc'+i] = 'candidate/profilesrc/S/=/'+$('#src'+i).val()+'/';
         }
       }
       for(var i = 0; i < $('#counttag').val() ; i++ )
       {
          if($('#tag'+i).is(':checked'))
         {
            value['tag'+i] = 'tagtransaction/tag/S/=/'+$('#tag'+i).val()+'/';
         }
       }
       for(var i = 0; i < $('#counttagrandom').val() ; i++ )
       {
          if($('#tagr'+i).is(':checked'))
         {
            value['tagrandom'+i] = 'tagtransaction/tagrandom/S/=/'+$('#tagr'+i).val()+'/';
         }
       }
       // if($('#chk_tiemnang').is(':checked'))
       // {
       //    value['istalent'] = 'candidate/istalent/N/<>/0/';
       // }

       if($('#chk_tiemnang').is(':checked'))
       {
          if(($('#tiemnang_tu').val() != '' ) && ($('#tiemnang_den').val() != '') ) $ope = "BETWEEN";
          else if($('#tiemnang_tu').val() != '') $ope = "BEGIN WITH";
          else $ope = "END WITH";
          value['istalent'] = 'candidate/istalent/N/'+$ope+'/'+$('#tiemnang_tu').val()+'/'+$('#tiemnang_den').val();
       }
       if($('#chk_lastupdate').is(':checked'))
       {
          if(($('#update_tu').val() != '' ) && ($('#update_den').val() != '') ) $ope = "BETWEEN";
          else if($('#update_tu').val() != '') $ope = "BEGIN WITH";
          else $ope = "END WITH";
          value['lastupdate'] = 'candidate/lastupdate/N/'+$ope+'/'+$('#update_tu').val()+'/'+$('#update_den').val();
       }

       if($('#chk_chan').is(':checked'))
       {
          value['blocked'] = 'candidate/blocked/S/=/Y/';
       }
       if($('#chk_diem').is(':checked'))
       {
          if(($('#diem_tu').val() != '' ) && ($('#diem_den').val() != '') ) $ope = "BETWEEN";
          else if($('#diem_tu').val() != '') $ope = "BEGIN WITH";
          else $ope = "END WITH";
          value['rate'] = 'cancomment/rate/N/'+$ope+'/'+$('#diem_tu').val()+'/'+$('#diem_den').val();
       }
       value['filter'] = $('#name_filter').val();
       if($('#chk_share_tieuchi').is(':checked'))
       {
          value['share'] = '1';
       }
       else
       {
          value['share'] = '0';
       }
        $.ajax({
          url: '<?php echo base_url()?>admin/handling/savefilter',
          type: 'POST',
          dataType: 'json',
          data: value,
        })
        .done(function(data) {
          // console.log(data);
            $('.nav-check-save').append('<li id="dropdown" class="width100"><a class="nav-menu-hs" onclick="loadfilter('+data[0]['filterid']+')">'+data[0]['filtername']+'</a></li>');
            $('#save-preset').modal('hide');
          alert("Thêm thành công!");
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
    }

    function loadfilter(obj)
    {
      var id = obj;

        $.ajax({
          url: '<?php echo base_url()?>admin/handling/loadfilter',
          type: 'POST',
          dataType: 'json',
          data: { filterid : id },
        })
        .done(function(data) {

           $("#chk_thunhapht").prop("checked",false);
           $("#chk_thunhapmm").prop("checked",false);
           $('#tn_httu').val("");
           $('#tn_htden').val("");
           $('#tn_mmtu').val("");
           $('#tn_mmden').val("");
           $("#chk_chuacokm").prop("checked",false);
           $("#chk_cokm").prop("checked",false);
           $('#kinhnghiem_tu').val("");
           $('#kinhnghiem_den').val("");
           $("#chk_hs_co_tthv").prop("checked",false);
           $("#chk_hs_co_ttnn").prop("checked",false);
           $("#chk_hs_co_ttth").prop("checked",false);
           $("#chk_tuoi").prop("checked",false);
           $("#chk_nam").prop("checked",false);
           $("#chk_nu").prop("checked",false);
           $('#tuoi-tu').val("");
           $('#tuoi-den').val("");
           $("#chk_chieucao").prop("checked",false);
           $('#caotu').val("");
           $('#caoden').val("");
           $("#chk_cannang").prop("checked",false);
           $('#nangtu').val("");
           $('#nangden').val("");
           $("#chk_noisinh").prop("checked",false);
           $('#noisinh-ad').val("0");
           $("#chk_dantoc").prop("checked",false);
           $('#dantoc-ad').val("");
           $("#chk_quoctich").prop("checked",false);
           $('#quoctich-ad').val("Việt Nam");
           $("#chk_tp_thgtru").prop("checked",false);
           $('#tp_thgtru').val("0");
           $("#chk_tp_dgsg").prop("checked",false);
           $('#tp_dgsg').val("0");
           $("#quanhuyen-nav12").prop("checked",false);
           $('#quanhuyen-nav').val("null");
           $("#chk_chuacogd").prop("checked",false);
           $("#chk_cogd").prop("checked",false);
           $("#chk_tiemnang").prop("checked",false);
           $("#chk_lastupdate").prop("checked",false);
           $("#chk_chan").prop("checked",false);
           $("#chk_diem").prop("checked",false);
           $('#diem_tu').val("");
           $('#diem_den').val("");
           for(var i = 0; i < $('#countprofile').val() ; i++ )
           {
                $('#src'+i).prop("checked",false);
           }
           for(var i = 0; i < $('#counttag').val() ; i++ )
           {
                $('#tag'+i).prop("checked",false);
           }
           for(var i = 0; i < $('#counttagrandom').val() ; i++ )
           {
                $('#tagr'+i).prop("checked",false);
           }
           for(var i = 0; i < $('#counthocvan').val() ; i++ )
           {
                $('#hv'+i).prop("checked",false);
           }
           for(var i = 0; i < $('#countngoaingu').val() ; i++ )
           {
                $('#nn'+i).prop("checked",false);
           }
           for(var i = 0; i < $('#counttinhoc').val() ; i++ )
           {
                $('#th'+i).prop("checked",false);
           }
           $('#dropdown-lvl1').removeClass('in');
           $('#dropdown-lvl2').removeClass('in');
           $('#dropdown-lvl3').removeClass('in');
           $('#dropdown-lvl4').removeClass('in');
           $('#dropdown-lvl5').removeClass('in');
           $('#dropdown-lvl6').removeClass('in');
           $('#dropdown-lvl7').removeClass('in');
           $('#dropdown-lvl8').removeClass('in');
           $('#dropdown-lvl9').removeClass('in');
           $('#dropdown-lvl10').removeClass('in');
           $('#dropdown-lvl11').removeClass('in');
           for(var i in data)
           {
              if(data[i]['fieldname'] == 'desirebenefit')
              {
                $("#chk_thunhapmm").prop("checked",true);
                $('#tn_mmtu').val(data[i]['filterfrom']);
                $('#tn_mmden').val(data[i]['filterto']);
                $('#dropdown-lvl4').addClass('in');
                continue;
              }

              if(data[i]['fieldname'] == 'currentbenefit')
              {
                $("#chk_thunhapht").prop("checked",true);
                $('#tn_httu').val(data[i]['filterfrom']);
                $('#tn_htden').val(data[i]['filterto']);
                $('#dropdown-lvl4').addClass('in');
                continue;
              }

               if(data[i]['fieldname'] == 'experience')
              {
                if(data[i]['filterfrom'] == 'C')
                {
                  $("#chk_chuacokm").prop("checked",true);
                }
                else{
                  $("#chk_cokm").prop("checked",true);
                  $('#kinhnghiem_tu').val(data[i]['filterfrom']);
                  $('#kinhnghiem_den').val(data[i]['filterto']);
                }
                 $('#dropdown-lvl5').addClass('in');
                continue;
              }
              if(data[i]['fieldname'] == 'gender')
              {
                  if(data[i]['filterfrom'] == 'F') {
                     $("#chk_nu").prop("checked",true);
                  }else {
                     $("#chk_nam").prop("checked",true);
                  }
                  $('#dropdown-lvl9').addClass('in');
                continue;
              }
              if(data[i]['fieldname'] == 'knowledge')
              {

                    if(data[i]['filterfrom'] == '1')
                    {
                      $("#chk_hs_co_tthv").prop("checked",true);
                    }
                    else {
                        for(var ii = 0; ii < $('#counthocvan').val() ; ii++ )
                        {
                          if(data[i]['filterfrom'] == $('#hv'+ii).val())
                          {
                            $('#hv'+ii).prop("checked",true);
                          }
                        }
                    }
                    $('#dropdown-lvl6').addClass('in');
                   continue;
              }
              if(data[i]['fieldname'] == 'language')
              {
                  if(data[i]['filterfrom'] == '1')
                  {
                     $("#chk_hs_co_ttnn").prop("checked",true);
                  }
                    else {
                        for(var ii = 0; ii < $('#countngoaingu').val() ; ii++ )
                        {
                          if(data[i]['filterfrom'] == $('#nn'+ii).val())
                          {
                            $('#nn'+ii).prop("checked",true);
                          }
                        }
                    }
                    $('#dropdown-lvl7').addClass('in');
                   continue;
              }
              if(data[i]['fieldname'] == 'software')
              {
                if(data[i]['filterfrom'] == '1')
                  {
                   $("#chk_hs_co_ttth").prop("checked",true);
                 }
                 else {
                        for(var ii = 0; ii < $('#counttinhoc').val() ; ii++ )
                        {
                          if(data[i]['filterfrom'] == $('#th'+ii).val())
                          {
                            $('#th'+ii).prop("checked",true);
                          }
                        }
                    }
                    $('#dropdown-lvl8').addClass('in');
                   continue;
              }
              if(data[i]['fieldname'] == 'age')
              {
                $("#chk_tuoi").prop("checked",true);
                $('#tuoi-tu').val(data[i]['filterfrom']);
                $('#tuoi-den').val(data[i]['filterto']);
                $('#dropdown-lvl9').addClass('in');
                continue;
              }
              if(data[i]['fieldname'] == 'height')
              {
                $("#chk_chieucao").prop("checked",true);
                $('#caotu').val(data[i]['filterfrom']);
                 $('#caoden').val(data[i]['filterto']);
                $('#dropdown-lvl9').addClass('in');
                continue;
              }

              if(data[i]['fieldname'] == 'weight')
              {
                $("#chk_cannang").prop("checked",true);
                $('#nangtu').val(data[i]['fliterfrom']);
                $('#nangden').val(data[i]['filterto']);
                $('#dropdown-lvl9').addClass('in');
                continue;
              }

              if(data[i]['fieldname'] == 'placeofbirth')
              {
                $("#chk_noisinh").prop("checked",true);
                $('#noisinh-ad').val(data[i]['filterfrom']);
                $('#dropdown-lvl9').addClass('in');
                continue;
              }
               if(data[i]['fieldname'] == 'nationality')
              {
                $("#chk_quoctich").prop("checked",true);
                $('#quoctich-ad').val(data[i]['filterfrom']);
                $('#dropdown-lvl9').addClass('in');
                continue;
              }
               if(data[i]['fieldname'] == 'ethnic')
              {
                $("#chk_dantoc").prop("checked",true);
                $('#dantoc-ad').val(data[i]['filterfrom']);
                $('#dropdown-lvl9').addClass('in');
                continue;
              }
               if(data[i]['fieldname'] == 'cityori')
              {
                $("#chk_tp_thgtru").prop("checked",true);
                $('#tp_thgtru').val(data[i]['filterfrom']);
                $('#dropdown-lvl9').addClass('in');
                $('#select2-tp_thgtru-container').text($( "#tp_thgtru option:selected" ).text());
                continue;
              }
               if(data[i]['fieldname'] == 'citycurr')
              {
                $("#chk_tp_dgsg").prop("checked",true);
                $('#tp_dgsg').val(data[i]['filterfrom']);
                $('#dropdown-lvl9').addClass('in');
                $('#select2-tp_dgsg-container').text($( "#tp_dgsg option:selected" ).text());
                $("#quanhuyen-nav12").prop("checked",true);
                continue;
              }
               if(data[i]['fieldname'] == 'district')
              {
                var id_city = $('#tp_dgsg').val();
                $('#quanhuyen-nav11').removeClass("disabled");
                $('#quanhuyen-nav12').removeAttr('disabled','disabled');
                selectcity(id_city, data[i]['filterfrom']);
                $("#quanhuyen-nav12").prop("checked",true);
                $('#quanhuyen_filter').val(data[i]['filterfrom']);
                $('#select2-quanhuyen-nav-container').text($( "#quanhuyen-nav option:selected" ).text());
                continue;
              }
              if(data[i]['fieldname'] == 'profilesrc')
              {
                for(var ii = 0; ii < $('#countprofile').val() ; ii++ )
                {
                  if(data[i]['filterfrom'] == $('#src'+ii).val())
                  {
                    $('#src'+ii).prop("checked",true);
                  }
                }
                $('#dropdown-lvl2').addClass('in');
                continue;
              }
              if(data[i]['fieldname'] == 'tag')
              {
                for(var ii = 0; ii < $('#counttag').val() ; ii++ )
                {
                  if(data[i]['filterfrom'] == $('#tag'+ii).val())
                  {
                    $('#tag'+ii).prop("checked",true);
                  }
                }
                $('#dropdown-lvl3').addClass('in');
                continue;
              }
              if(data[i]['fieldname'] == 'tagrandom')
              {
                for(var ii = 0; ii < $('#counttagrandom').val() ; ii++ )
                {
                  if(data[i]['filterfrom'] == $('#tagr'+ii).val())
                  {
                    $('#tagr'+ii).prop("checked",true);
                  }
                }
                $('#dropdown-lvl11').addClass('in');
                continue;
              }
              if(data[i]['fieldname'] == 'maritalstatus')
              {
                  if(data[i]['filterfrom'] == 'S') {
                     $("#chk_chuacogd").prop("checked",true);
                  }else {
                     $("#chk_cogd").prop("checked",true);
                  }
                 $('#dropdown-lvl10').addClass('in');
                 continue;
              }
              if(data[i]['fieldname'] == 'istalent')
              {
                $("#chk_tiemnang").prop("checked",true);
                $('#dropdown-lvl1').addClass('in');
                continue;
              }
              if(data[i]['fieldname'] == 'blocked')
              {
                $("#chk_chan").prop("checked",true);
                $('#dropdown-lvl1').addClass('in');
                continue;
              }
              if(data[i]['fieldname'] == 'rate')
              {
                $("#chk_diem").prop("checked",true);
                $('#diemtu').val(data[i]['filterfrom']);
                $('#diemden').val(data[i]['filterto']);
                $('#dropdown-lvl1').addClass('in');
                continue;
              }
              if(data[i]['fieldname'] == 'lastupdate')
              {
                $("#chk_lastupdate").prop("checked",true);
                $('#update_tu').val(data[i]['filterfrom']);
                $('#update_den').val(data[i]['filterto']);
                $('#dropdown-lvl1').addClass('in');
                continue;
              }
           }
           filter();
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
    }
  $(document).ready(function(){
     // console.log($('#checkqh').val());
    if($('#checkqh').val() != "")
    {
      var get = $('#checkqh').val();
      var $id = $('#checkcity').val();
      $('.gicungdc').remove();
      $('#quanhuyen-nav11').addClass("disabled");
      $('#quanhuyen-nav12').attr('disabled','disabled');
      $( "#quanhuyen-nav12").prop('checked', false);
      if($id != '0')
      {
        $('#quanhuyen-nav11').removeClass("disabled");
        $('#quanhuyen-nav12').removeAttr('disabled','disabled');
        $( "#quanhuyen-nav12").prop('checked', true);
      }

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
                  $('#chonqh-nav1').after('<option class="gicungdc" value="'+data[i].id_district+'" selected>'+data[i].name+'</option>');
                }
                else
                {
                  $('#chonqh-nav1').after('<option class="gicungdc" value="'+data[i].id_district+'">'+data[i].name+'</option>');
                }
              }
          })
        .fail(function() {
          alert('thatbai');
          console.log("error");
        });
    }
  });

  function searchFilter() {
    var name = $('#text_filter_1').val();
    $('.filter-load').empty();
    $.ajax({
      url: '<?php echo base_url() ?>admin/handling/searchFilter',
      type: 'POST',
      dataType: 'json',
      data: {name: name},
    })
    .done(function(data) {
      // console.log(data);
      var row ='';
      for(var i in data){
        row += '<li id="dropdown" class="width100"><a class="nav-menu-hs" onclick="loadfilter('+data[i]['filterid']+')">'+data[i]['filtername']+'</a></li>';
      }
      $('.filter-load').append(row);
    })
    .fail(function() {
      console.log("error");
    });

  }
  function searchname()
  {
    // if ($(':checkbox').is(':checked')){
    //   $(':checkbox').prop('checked', false);
    // }
    var name1 = $('#text_search').val();
    $('.candidate-load').empty();
    $.ajax({
      url: '<?php echo base_url() ?>admin/handling/searchname',
      type: 'POST',
      dataType: 'json',
      data: {name: name1},
    })
    .done(function(data) {
      $('.demhs').text(data['total_rows'] +' Hồ sơ');
      $('.pagination-page').empty().html(data['phantrang']);
      for(var i in data)
          {
            if (typeof data[i] === 'object') {
              var gt = "";
              if(data[i]['gender'] == "M") gt = "Nam"; else gt = "Nữ";

              var chieucao = "";
              if(data[i]['height'] == 0) chieucao = ""; else chieucao = data[i]['height']+"cm, ";

              var cannang = "";
              if(data[i]['weight'] == 0) cannang = ""; else cannang = data[i]['weight']+"kg, ";
              var kinhnghiem = "";

              var bangcap = "";
              if(data[i]['certificate'] == "") bangcap = ""; else bangcap = data[i]['certificate']+", ";
              var ngonngu = "";
              if(data[i]['countlanguage'] == 0)
              { ngonngu = ""; }
              else if(data[i]['countlanguage'] == 1)
              { ngonngu = data[i]['language']+", "; }
              else ngonngu = data[i]['language']+"+"+(data[i]['countlanguage']-1)+", ";
              var phanmem = "";
              if(data[i]['countsoftware'] == 0) phanmem = "";
              else if(data[i]['countsoftware'] == 1) phanmem = data[i]['software']+", ";
              else phanmem = data[i]['software']+"+"+(data[i]['countsoftware']-1)+", ";
              var star = '';
              if(data[i]['istalent'] == 0) {
              star = '<span class="fa-stack fa-1x"><i class="fa fa-star color-gray fa-stack-2x nohover size18"></i><span class="fa fa-stack-1x color-white size9"></span></span>';
               } else {
              star = '<span class="fa-stack fa-1x"><i class="fa fa-star color-orange fa-stack-2x nohover size18"></i><span class="fa fa-stack-1x color-white size9">'+data[i]['istalent'] +'</span></span>';
              }
              var dss = '';
              if(data[i]['blocked'] == 'Y') { dss ='<div class="col-md-3 padding-lr0 " id="ds'+data[i]['candidateid']+'">'; }
              else {
                dss = '<div class="col-md-4 padding-lr0 " id="ds'+data[i]['candidateid']+'">';
              }
              var bb = '';
               if(data[i]['blocked'] == 'Y') { bb = '<i class="fa fa-ban color-red " ></i>'; }
               var bell = '';
              if(data[i]['unsubcribe'] == 'Y') bell = "-slash";
              var vt = '';
              if(data[i]['position'] != '') {
                  vt = '<label class="tuyendung-label1 color-black">'+data[i]['position']+'</label>';
              }
              var tag = '';
                if(data[i]['tags'] != '')
                {
                  tag = '<label class="tuyendung-label2">'+data[i]['tags']+'</label>';
                }
              var recruite = '';
              if (data[i]['recruite'] > 0) {
                recruite = '<i class="fa fa-flag color-flag-recruite" ></i>';
              }
              var hm = '<a href="<?php echo base_url()?>admin/handling/profile/'+data[i]['candidateid']+'" class="hover-profile load-remove">';
                hm+= '<div class="col-md-6 profile dash-horizontal pad-l0 pad-r5 min-h152"><table class="margin-t5 margin-b5"><tr><td class="td-cot1"><input class="checkcandidate" type="checkbox" value="'+data[i]['candidateid']+'" name="check[]" onclick="checkbox_1()"></td><td class="td-cot2">';
                hm+= '<img src="<?php echo base_url()?>public/image/'+data[i]['imagelink']+'" class="frameimage" width="70px" height="70px">';

                hm+= '<label class="label-td pad-t3" >'+Math.round(data[i]['rate'])+' điểm</label><label class="label-td pad-t1" >'+data[i]['count_campaign']+' chiến dịch</label><label class="margin-t-3"><i class="fa fa-bell'+bell+' icon-label pad-l2"></i><i class="fa fa-user icon-label"></i><i class="fa fa-clock-o icon-de" ></i></label></td><td class="td-cot3"><div class="row width100 margin-l0" ><div class="col-md-7 padding-lr0">';
                hm+= '<label class="label-name color-black">'+data[i]['name']+' '+recruite+'</label>';
                hm+= '</div>'+dss+'<span class="webportal">'+data[i]['profilesrc']+'</span></div><div id="talent'+data[i]['candidateid']+'" class="col-md-1 padding-lr0 ">'+star+'</div><div class="col-md-1 padding-lr0 icon-block" id="block'+data[i]['candidateid']+'">'+bb+'</div></div>'+vt+tag+'<label class="tuyendung-label3">';

                hm+= ''+gt+', '+data[i]['dateofbirth2']+' tuổi, '+chieucao+''+cannang+''+data[i]['kinhnghiem']+''+data[i]['thunhap']+''+bangcap+''+ngonngu+''+phanmem+'...';
                hm+= '</label> <span class="highr">'+data[i]['tagsrandom']+'</span></td></tr> </table></div></a>';

                $('.candidate-load').append(hm);
            }
          }
    })
    .fail(function() {
      console.log("error");
    });

  }

  $(document).ready(function() {
    var checkRecruit = '<?php echo isset($checkRecruit)?$checkRecruit : '-1' ?>';
    if(checkRecruit == '0'){
      if ($(':checkbox').is(':checked')){
        $(':checkbox').prop('checked', false);
        $('#check_filter_2').prop('checked', true);
      }
    }else if(checkRecruit == '1'){
      if ($(':checkbox').is(':checked')){
        $(':checkbox').prop('checked', false);
        $('#check_filter_3').prop('checked', true);
      }
    }
  });


  function filterRecruit(check) {
    if(check == 'on'){
      if ($(':checkbox').is(':checked')){
        $(':checkbox').prop('checked', false);
        $('#check_filter_2').prop('checked', true);
      }
    }else{
      $('#check_filter_2').prop('checked', false);
    }
    $('.candidate-load').empty();
    $.ajax({
      url: '<?php echo base_url()?>admin/handling/filterRecruit/0',
      type: 'POST',
      dataType: 'json',
      data: {},
    })
    .done(function(data) {
      $('.demhs').text(data['total_rows'] +' Hồ sơ');
      $('.pagination-page').empty().html(data['phantrang']);
      for(var i in data)
      {
        if (typeof data[i] === 'object') {
          var gt = "";
          if(data[i]['gender'] == "M") gt = "Nam"; else gt = "Nữ";

          var chieucao = "";
          if(data[i]['height'] == 0) chieucao = ""; else chieucao = data[i]['height']+"cm, ";

          var cannang = "";
          if(data[i]['weight'] == 0) cannang = ""; else cannang = data[i]['weight']+"kg, ";
          var kinhnghiem = "";

          var bangcap = "";
          if(data[i]['certificate'] == "") bangcap = ""; else bangcap = data[i]['certificate']+", ";
          var ngonngu = "";
          if(data[i]['countlanguage'] == 0)
          { ngonngu = ""; }
          else if(data[i]['countlanguage'] == 1)
          { ngonngu = data[i]['language']+", "; }
          else ngonngu = data[i]['language']+"+"+(data[i]['countlanguage']-1)+", ";
          var phanmem = "";
          if(data[i]['countsoftware'] == 0) phanmem = "";
          else if(data[i]['countsoftware'] == 1) phanmem = data[i]['software']+", ";
          else phanmem = data[i]['software']+"+"+(data[i]['countsoftware']-1)+", ";
          var star = '';
          if(data[i]['istalent'] == 0) {
          star = '<span class="fa-stack fa-1x"><i class="fa fa-star color-gray fa-stack-2x nohover size18"></i><span class="fa fa-stack-1x color-white size9"></span></span>';
           } else {
          star = '<span class="fa-stack fa-1x"><i class="fa fa-star color-orange fa-stack-2x nohover size18"></i><span class="fa fa-stack-1x color-white size9">'+data[i]['istalent'] +'</span></span>';
          }
          var dss = '';
          if(data[i]['blocked'] == 'Y') { dss ='<div class="col-md-3 padding-lr0 " id="ds'+data[i]['candidateid']+'">'; }
          else {
            dss = '<div class="col-md-4 padding-lr0 " id="ds'+data[i]['candidateid']+'">';
          }
          var bb = '';
           if(data[i]['blocked'] == 'Y') { bb = '<i class="fa fa-ban color-red " ></i>'; }
           var bell = '';
          if(data[i]['unsubcribe'] == 'Y') bell = "-slash";
          var vt = '';
          if(data[i]['position'] != '') {
              vt = '<label class="tuyendung-label1 color-black">'+data[i]['position']+'</label>';
          }
          var tag = '';
            if(data[i]['tags'] != '')
            {
              tag = '<label class="tuyendung-label2">'+data[i]['tags']+'</label>';
            }
          var recruite = '';
          if (data[i]['recruite'] > 0) {
            recruite = '<i class="fa fa-flag color-flag-recruite" ></i>';
          }
          var hm = '<a href="<?php echo base_url()?>admin/handling/profile/'+data[i]['candidateid']+'" class="hover-profile load-remove">';
            hm+= '<div class="col-md-6 profile dash-horizontal pad-l0 pad-r5 min-h152"><table class="margin-t5 margin-b5"><tr><td class="td-cot1"><input class="checkcandidate" type="checkbox" value="'+data[i]['candidateid']+'" name="check[]" onclick="checkbox_1()"></td><td class="td-cot2">';
            hm+= '<img src="<?php echo base_url()?>public/image/'+data[i]['imagelink']+'" class="frameimage" width="70px" height="70px">';

            hm+= '<label class="label-td pad-t3" >'+Math.round(data[i]['rate'])+' điểm</label><label class="label-td pad-t1" >'+data[i]['count_campaign']+' chiến dịch</label><label class="margin-t-3"><i class="fa fa-bell'+bell+' icon-label pad-l2"></i><i class="fa fa-user icon-label"></i><i class="fa fa-clock-o icon-de" ></i></label></td><td class="td-cot3"><div class="row width100 margin-l0" ><div class="col-md-7 padding-lr0">';
            hm+= '<label class="label-name color-black">'+data[i]['name']+' '+recruite+'</label>';
            hm+= '</div>'+dss+'<span class="webportal">'+data[i]['profilesrc']+'</span></div><div id="talent'+data[i]['candidateid']+'" class="col-md-1 padding-lr0 ">'+star+'</div><div class="col-md-1 padding-lr0 icon-block" id="block'+data[i]['candidateid']+'">'+bb+'</div></div>'+vt+tag+'<label class="tuyendung-label3">';

            hm+= ''+gt+', '+data[i]['dateofbirth2']+' tuổi, '+chieucao+''+cannang+''+data[i]['kinhnghiem']+''+data[i]['thunhap']+''+bangcap+''+ngonngu+''+phanmem+'...';
            hm+= '</label> <span class="highr">'+data[i]['tagsrandom']+'</span></td></tr> </table></div></a>';

            $('.candidate-load').append(hm);
        }
      }
    })
    .fail(function() {
      console.log("error");
    });

  }
  function filterNotRecruit(check) {
    if(check == 'on'){
      if ($(':checkbox').is(':checked')){
        $(':checkbox').prop('checked', false);
        $('#check_filter_3').prop('checked', true);
      }
    }else{
      $('#check_filter_3').prop('checked', false);
    }
    $('.candidate-load').empty();
    $.ajax({
      url: '<?php echo base_url()?>admin/handling/filterRecruit/1',
      type: 'POST',
      dataType: 'json',
      data: {},
    })
    .done(function(data) {
      $('.demhs').text(data['total_rows'] +' Hồ sơ');
      $('.pagination-page').empty().html(data['phantrang']);
      for(var i in data)
      {
        if (typeof data[i] === 'object') {
          var gt = "";
          if(data[i]['gender'] == "M") gt = "Nam"; else gt = "Nữ";

          var chieucao = "";
          if(data[i]['height'] == 0) chieucao = ""; else chieucao = data[i]['height']+"cm, ";

          var cannang = "";
          if(data[i]['weight'] == 0) cannang = ""; else cannang = data[i]['weight']+"kg, ";
          var kinhnghiem = "";

          var bangcap = "";
          if(data[i]['certificate'] == "") bangcap = ""; else bangcap = data[i]['certificate']+", ";
          var ngonngu = "";
          if(data[i]['countlanguage'] == 0)
          { ngonngu = ""; }
          else if(data[i]['countlanguage'] == 1)
          { ngonngu = data[i]['language']+", "; }
          else ngonngu = data[i]['language']+"+"+(data[i]['countlanguage']-1)+", ";
          var phanmem = "";
          if(data[i]['countsoftware'] == 0) phanmem = "";
          else if(data[i]['countsoftware'] == 1) phanmem = data[i]['software']+", ";
          else phanmem = data[i]['software']+"+"+(data[i]['countsoftware']-1)+", ";
          var star = '';
          if(data[i]['istalent'] == 0) {
          star = '<span class="fa-stack fa-1x"><i class="fa fa-star color-gray fa-stack-2x nohover size18"></i><span class="fa fa-stack-1x color-white size9"></span></span>';
           } else {
          star = '<span class="fa-stack fa-1x"><i class="fa fa-star color-orange fa-stack-2x nohover size18"></i><span class="fa fa-stack-1x color-white size9">'+data[i]['istalent'] +'</span></span>';
          }
          var dss = '';
          if(data[i]['blocked'] == 'Y') { dss ='<div class="col-md-3 padding-lr0 " id="ds'+data[i]['candidateid']+'">'; }
          else {
            dss = '<div class="col-md-4 padding-lr0 " id="ds'+data[i]['candidateid']+'">';
          }
          var bb = '';
           if(data[i]['blocked'] == 'Y') { bb = '<i class="fa fa-ban color-red " ></i>'; }
           var bell = '';
          if(data[i]['unsubcribe'] == 'Y') bell = "-slash";
          var vt = '';
          if(data[i]['position'] != '') {
              vt = '<label class="tuyendung-label1 color-black">'+data[i]['position']+'</label>';
          }
          var tag = '';
            if(data[i]['tags'] != '')
            {
              tag = '<label class="tuyendung-label2">'+data[i]['tags']+'</label>';
            }
          var recruite = '';
          if (data[i]['recruite'] > 0) {
            recruite = '<i class="fa fa-flag color-flag-recruite" ></i>';
          }
          var hm = '<a href="<?php echo base_url()?>admin/handling/profile/'+data[i]['candidateid']+'" class="hover-profile load-remove">';
            hm+= '<div class="col-md-6 profile dash-horizontal pad-l0 pad-r5 min-h152"><table class="margin-t5 margin-b5"><tr><td class="td-cot1"><input class="checkcandidate" type="checkbox" value="'+data[i]['candidateid']+'" name="check[]" onclick="checkbox_1()"></td><td class="td-cot2">';
            hm+= '<img src="<?php echo base_url()?>public/image/'+data[i]['imagelink']+'" class="frameimage" width="70px" height="70px">';

            hm+= '<label class="label-td pad-t3" >'+Math.round(data[i]['rate'])+' điểm</label><label class="label-td pad-t1" >'+data[i]['count_campaign']+' chiến dịch</label><label class="margin-t-3"><i class="fa fa-bell'+bell+' icon-label pad-l2"></i><i class="fa fa-user icon-label"></i><i class="fa fa-clock-o icon-de" ></i></label></td><td class="td-cot3"><div class="row width100 margin-l0" ><div class="col-md-7 padding-lr0">';
            hm+= '<label class="label-name color-black">'+data[i]['name']+' '+recruite+'</label>';
            hm+= '</div>'+dss+'<span class="webportal">'+data[i]['profilesrc']+'</span></div><div id="talent'+data[i]['candidateid']+'" class="col-md-1 padding-lr0 ">'+star+'</div><div class="col-md-1 padding-lr0 icon-block" id="block'+data[i]['candidateid']+'">'+bb+'</div></div>'+vt+tag+'<label class="tuyendung-label3">';

            hm+= ''+gt+', '+data[i]['dateofbirth2']+' tuổi, '+chieucao+''+cannang+''+data[i]['kinhnghiem']+''+data[i]['thunhap']+''+bangcap+''+ngonngu+''+phanmem+'...';
            hm+= '</label> <span class="highr">'+data[i]['tagsrandom']+'</span></td></tr> </table></div></a>';

            $('.candidate-load').append(hm);
        }
      }
    })
    .fail(function() {
      console.log("error");
    });

  }

  function filterTrung()
  {
    if ($('#chk_trung').is(':checked')){
      var checkOn = 'on';
    }else{
      var checkOn = 'off';
    }
    $('.candidate-load').empty();
    $.ajax({
      url: '<?php echo base_url() ?>admin/handling/loc_hs_trung',
      type: 'POST',
      dataType: 'json',
      data: {check:checkOn},
    })
    .done(function(data) {
      $('.demhs').text(data['total_rows'] +' Hồ sơ');
      $('.pagination-page').empty().html(data['phantrang']);
      for(var i in data)
          {
            if (typeof data[i] === 'object') {
              var gt = "";
              if(data[i]['gender'] == "M") gt = "Nam"; else gt = "Nữ";

              var chieucao = "";
              if(data[i]['height'] == 0) chieucao = ""; else chieucao = data[i]['height']+"cm, ";

              var cannang = "";
              if(data[i]['weight'] == 0) cannang = ""; else cannang = data[i]['weight']+"kg, ";
              var kinhnghiem = "";

              var bangcap = "";
              if(data[i]['certificate'] == "") bangcap = ""; else bangcap = data[i]['certificate']+", ";
              var ngonngu = "";
              if(data[i]['countlanguage'] == 0)
              { ngonngu = ""; }
              else if(data[i]['countlanguage'] == 1)
              { ngonngu = data[i]['language']+", "; }
              else ngonngu = data[i]['language']+"+"+(data[i]['countlanguage']-1)+", ";
              var phanmem = "";
              if(data[i]['countsoftware'] == 0) phanmem = "";
              else if(data[i]['countsoftware'] == 1) phanmem = data[i]['software']+", ";
              else phanmem = data[i]['software']+"+"+(data[i]['countsoftware']-1)+", ";
              var star = '';
              if(data[i]['istalent'] == 0) {
              star = '<span class="fa-stack fa-1x"><i class="fa fa-star color-gray fa-stack-2x nohover size18"></i><span class="fa fa-stack-1x color-white size9"></span></span>';
               } else {
              star = '<span class="fa-stack fa-1x"><i class="fa fa-star color-orange fa-stack-2x nohover size18"></i><span class="fa fa-stack-1x color-white size9">'+data[i]['istalent'] +'</span></span>';
              }
              var dss = '';
              if(data[i]['blocked'] == 'Y') { dss ='<div class="col-md-3 padding-lr0 " id="ds'+data[i]['candidateid']+'">'; }
              else {
                dss = '<div class="col-md-4 padding-lr0 " id="ds'+data[i]['candidateid']+'">';
              }
              var bb = '';
               if(data[i]['blocked'] == 'Y') { bb = '<i class="fa fa-ban color-red " ></i>'; }
               var bell = '';
              if(data[i]['unsubcribe'] == 'Y') bell = "-slash";
              var vt = '';
              if(data[i]['position'] != '') {
                  vt = '<label class="tuyendung-label1 color-black">'+data[i]['position']+'</label>';
              }
              var tag = '';
                if(data[i]['tags'] != '')
                {
                  tag = '<label class="tuyendung-label2">'+data[i]['tags']+'</label>';
                }
              var recruite = '';
              if (data[i]['recruite'] > 0) {
                recruite = '<i class="fa fa-flag color-flag-recruite" ></i>';
              }
              var hm = '<a href="<?php echo base_url()?>admin/handling/profile/'+data[i]['candidateid']+'" class="hover-profile load-remove">';
                hm+= '<div class="col-md-6 profile dash-horizontal pad-l0 pad-r5 min-h152"><table class="margin-t5 margin-b5"><tr><td class="td-cot1"><input class="checkcandidate" type="checkbox" value="'+data[i]['candidateid']+'" name="check[]" onclick="checkbox_1()"></td><td class="td-cot2">';
                hm+= '<img src="<?php echo base_url()?>public/image/'+data[i]['imagelink']+'" class="frameimage" width="70px" height="70px">';

                hm+= '<label class="label-td pad-t3" >'+Math.round(data[i]['rate'])+' điểm</label><label class="label-td pad-t1" >'+data[i]['count_campaign']+' chiến dịch</label><label class="margin-t-3"><i class="fa fa-bell'+bell+' icon-label pad-l2"></i><i class="fa fa-user icon-label"></i><i class="fa fa-clock-o icon-de" ></i></label></td><td class="td-cot3"><div class="row width100 margin-l0" ><div class="col-md-7 padding-lr0">';
                hm+= '<label class="label-name color-black">'+data[i]['name']+' '+recruite+'</label>';
                hm+= '</div>'+dss+'<span class="webportal">'+data[i]['profilesrc']+'</span></div><div id="talent'+data[i]['candidateid']+'" class="col-md-1 padding-lr0 ">'+star+'</div><div class="col-md-1 padding-lr0 icon-block" id="block'+data[i]['candidateid']+'">'+bb+'</div></div>'+vt+tag+'<label class="tuyendung-label3">';

                hm+= ''+gt+', '+data[i]['dateofbirth2']+' tuổi, '+chieucao+''+cannang+''+data[i]['kinhnghiem']+''+data[i]['thunhap']+''+bangcap+''+ngonngu+''+phanmem+'...';
                hm+= '</label> <span class="highr">'+data[i]['tagsrandom']+'</span></td></tr> </table></div></a>';

                $('.candidate-load').append(hm);
            }
          }
    })
    .fail(function() {
      console.log("error");
    });

  }
</script>