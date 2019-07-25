
<div class="col-xs-12">
  <div class="block-articleDetail">
    <h1 class="title-pg">Hồ sơ của tôi</h1>
    <div class="fullContent">
      <?php $d = 0;
         if($candidate['introduction'] != "" ) $d++;
         if($candidate['firstname'] !== "") $d++;
         if(empty($address) !== true) $d++;
         if(empty($family) !== true) $d++;
         if(empty($experience) !== true){ $d++; }else if(empty($reference) !== true){ $d++; }
         if(empty($knowledge) !== true) $d++;
         if(empty($language) !== true){ $d++; }else if(empty($software) !== true){ $d++; }
      ?>
      <div class="color-gray title-right">Mức độ hoàn thiện hồ sơ: <?php echo $d ?>/7</div>
      <table class="table" >
        <tr class="none-table">

          <td  width="22%">

          </td>
          <td><strong class="size20"><?php echo $candidate['firstname']?>, <?php echo $candidate['lastname']?></strong></td>

        </tr>
        <tr class="none-table2">
        <td>


        </td>
        <td>
          <div class="form-control textarea-info" ><?php echo $candidate['introduction']?></div>

      </td>
    </tr>
    <tr class="none-table2">
      <td class="table-profile">
        <i class="fa fa-info-circle orange"></i>
         <?php if($candidate['gender'] == "M") echo "Nam";
              else if($candidate['gender'] == "F") echo "Nữ";
              ?>/ <?php echo getAge($candidate['dateofbirth']);
               ?> tuổi
       </td>
      <td class="table-profile">
        <div class="row">
            <div class="col-md-4">
            <i class="fa fa-dollar orange"></i>
            <span> <?php echo number_format($candidate['currentbenefit']).' - '.number_format($candidate['desirebenefit'])?> VND</span>
            </div>
            <div class="col-md-4">
               <?php
              if($knowledge != null){
              foreach($knowledge as $key) {
                if($key['highestcer'] == "Y")
                {
                  echo '<i class="fa fa-star orange" ></i> ';
                  echo $key['certificate'];
                  break;
                }
              } }
              ?>
              </div>
              <div class="col-md-4">

                <?php
                    if($language != null)
                    {
                      echo '<i class="fa fa-language orange"></i> ';
                      if(count($language) == 1)
                        echo $language[0]['language'];
                      else if(count($language) == 2)
                        echo $language[0]['language'].', '.$language[1]['language'];
                      else
                      {
                        echo $language[0]['language'].', '.$language[1]['language'].', +'.(count($language)-2);
                      }
                    }
                ?>
            </div>
      </div>
      </td>


    </tr>
    <tr class="none-table2">
          <td class="table-profile"><i class="fa fa-user orange"></i> <?php echo $candidate['height'].'cm/ '.$candidate['weight'].'kg'?></td>

        <td class="table-profile">
          <div class="row">
            <div class="col-md-4">
              <i class="fa fa-briefcase orange"></i><span> Designer, Consullant, +1...</span>
            </div>
            <div class="col-md-4">

             <?php if($experience != null){
                echo '<i class="fa fa-road orange" ></i> ';
                  $secs = strtotime($experience[count($experience)-1]['dateto']) - strtotime($experience[count($experience)-1]['datefrom']);
                  $days = $secs / 86400;
                  $month = $days/30;
                  echo ($month < 1)? "1 tháng kinh nghiệm" : round($month)." tháng kinh nghiệm";
              }
              ?>
           </div>
           <div class="col-md-4">

             <?php
                    if($software != null)
                    {
                      echo '<i class="fa fa-laptop orange"></i> ';
                      if(count($software) == 1)
                        echo $software[0]['software'];
                      else if(count($software) == 2)
                        echo $software[0]['software'].', '.$software[1]['software'];
                      else
                      {
                        echo $software[0]['software'].', '.$software[1]['software'].', +'.(count($software)-2);
                      }
                    }
                ?>
           </div>
         </div>
        </td>

        </tr>

      </table>
 <div >
          <?php if($candidate['imagelink'] == null) {?>
           <img src="<?php echo base_url()?>public/image/avatar.jpg" alt="" id="anh1" class="img image-avatar">
           <?php }
           else { ?>
           <img src="<?php echo base_url()?>public/image/<?php echo $candidate['imagelink'] ?>" alt="" id="anh1" class="img image-avatar">
           <?php } ?>
           <div class="image-edit margin-bot-21" id="anh2" onclick="edit_anh()"><i class="fa fa-camera icon-camera" ></i></div>


         </div>

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="row">
        <div class="col-md-3">
          <nav class="block-leftMenu menuPage mrb30">

            <ul class="nav nav-tabs width100" >
              <li class="<?php echo isset($one)? $one : "";?>">
                <a  data-toggle="tab" href="#collapseOne" ><i class="fa fa-circle size10 <?php  if($candidate['introduction'] !== "" || count($tags) > 0){echo 'green'; } else{ echo 'orange'; }?>"  ></i> Giới thiệu bản thân</a>
              </li>
              <li class="<?php echo isset($two)? $two : "";?>"><a  data-toggle="tab"  href="#collapseTwo" ><i class="fa fa-circle size10 <?php if($candidate['firstname'] !== ""){ echo 'green'; } else { echo 'orange';}?>" ></i> Thông tin cá nhân</a></li>
              <li class="<?php echo isset($three)? $three : "";?>"><a  data-toggle="tab"  href="#collapseThree" ><i class="fa fa-circle size10 <?php  if(empty($address) !== true) {echo 'green';} else {echo 'orange';}?>" ></i> Thông tin liên hệ</a>
              </li>
              <li class="<?php echo isset($four)? $four : "";?>"><a  data-toggle="tab"  href="#collapseFour" ><i class="fa fa-circle size10 <?php  if(empty($family) !== true){ echo 'green'; } else { echo 'orange';}?>" ></i> Thông tin gia đình</a></li>
              <li class="<?php echo isset($five)? $five : "";?>"><a  data-toggle="tab"  href="#collapseFive" ><i class="fa fa-circle size10 <?php  if(empty($experience) !== true || empty($reference) !== true){ echo 'green';} else { echo 'orange';}?>" ></i> Kinh nghiệm làm việc</a></li>
              <li class="<?php echo isset($six)? $six : "";?>"><a  data-toggle="tab"  href="#collapseSix" ><i class="fa fa-circle size10 <?php  if(empty($knowledge) !== true){echo 'green';} else{echo 'orange';}?>"></i> Trình độ học vấn</a></li>
              <li class="<?php echo isset($seven)? $seven : "";?>"><a  data-toggle="tab"  href="#collapseSeven" ><i class="fa fa-circle size10 <?php
                if(empty($language) !== true || empty($software) !== true){echo 'green';} else {echo 'orange';}?>"></i> Ngoại ngữ tin học</a></li>
            </ul>
          </nav>
       </div>

        <div class="col-md-9 ">
          <div class="tab-content">
        <div id="collapseOne" class="tab-pane  <?php echo isset($one)? $one : ""; ?>">
          <form id="form_updateIntro" action="<?php echo base_url()?>handling/update_introduce" method="post" enctype="multipart/form-data">
            <!-- <label for="staticEmail" style ="float: right;" class="col-form-label">Tóm tắt bản thân</label> -->

          <div class="form-group row kcform">
            <label for="staticEmail" class="col-sm-4"  >GIỚI THIỆU (INTRODUCE)</label>
            <div class="col-sm-8">

              <textarea class="areatext kttext off-resize" rows="4" name="introduction"><?php echo $candidate['introduction'] ?></textarea>
            </div>
          </div>
          <div class="form-group row kcform">
            <label for="inputPassword" class="col-sm-4 col-form-label" >VỊ TRÍ MONG MUỐN (EXPECTED POSITION)</label>
            <div class="col-sm-8">
              <!-- <textarea class="areatext kttext off-resize" rows="2" name="position"></textarea> -->
              <div id="the-basics" style="font-size: 15px">
                    <input id="typeahead" type="text" data-role="tagsinput" value="
                    <?php for($i=0; $i < count($tags) ; $i++)
                          {
                            echo $tags[$i]['title'];
                            if($i < count($tags)-1)
                            {
                              echo ',';
                            }
                          }
                    ?>
                    ">
                  </div>
                  <input type="hidden" name="tags" id="tags">
            </div>
          </div>
          <div class="form-group row kcform">
            <label for="inputPassword" class="col-sm-4 col-form-label" >THU NHẬP HIỆN TẠI (CURRENT INCOME)</label>
            <div class="col-sm-8">
             <input type="text" class="kttext so" name="cur_benefit" id="cur_benefit" value="<?php echo number_format($candidate['currentbenefit']) ?>">

            </div>
          </div>
          <div class="form-group row kcform">
            <label for="inputPassword" class="col-sm-4 col-form-label"  >THU NHẬP MONG MUỐN (EXPECTATION INCOME) (IN VND)</label>
            <div class="col-sm-8">
               <input class="kttext so" type="text"  name="desirebenefit" id="desirebenefit" value="<?php echo number_format($candidate['desirebenefit']) ?>">
            </div>
          </div>
          <div class="form-group row kcform">
            <label for="inputPassword" class="col-sm-4 col-form-label"  >ĐỊA CHỈ LIÊN HỆ MẠNG XÃ HỘI</label>
            <div class="col-sm-8">
               <input type="text" style="width: 100%" name="snid" id="snid" value="<?php echo $candidate['snid'] ?>" placeholder="facebook.com/abc, instagram.com/abc...">
            </div>
          </div>
          <div class="form-group row kcform">

            <label for="inputPassword" class="col-sm-4 col-form-label" >TẢI LÊN CV</label>

            <div class="col-sm-8">


                    <div class="form-group row kcform width100" >
                    <div class="col-sm-6">
                      <?php if (!empty($document)){
                        $url = $document['url'];
                        $name = $document['filename'];
                      }else{$url =''; $name = '';}?>
                        <a id="label1"  class="fontstyle"  href="<?php echo $url; ?>"><?php echo $name; ?></a>
                    </div>
                    <div class="col-sm-6">
                    <label id="browsebutton1" class="btn btn-default input-group-addon btn-tailen" for="my-file-selector1" style="background-color:white">
                        <input id="my-file-selector1" name="profilesrc" type="file" style="display:none;" >
                        Tải lên
                    </label>
                    </div>

                  </div>
                <button type="button" class="btn btnlong margin-top12" id="btn_updateIntro" > Lưu</button>
            </div>
          </div>
        </form>
        </div>

        <div id="collapseTwo" class="tab-pane <?php echo isset($two)? $two : ""; ?>">
          <form id="form_profile" action="<?php echo base_url()?>handling/update_profile" method="post">
            <!-- <label for="staticEmail" style ="float: right;" class="col-form-label">Tóm tắt bản thân</label> -->

          <div class="form-group row kcform">
            <label for="staticEmail" class="col-sm-4">HỌ VÀ TÊN (FULL NAME)</label>
            <div class="col-sm-8">
              <div class="form-group row">
                <div class="col-sm-6">
                <input class="kttext" type="text" required placeholder="Họ" name="ho" value="<?php echo $candidate['firstname'] ?>"> </div>
                <div class="col-sm-6">
                <input class="kttext" type="text" required placeholder="Tên" name="ten" value="<?php echo $candidate['lastname'] ?>"></div>
              </div>
            </div>
          </div>
          <div class="form-group row kcform-more">
            <label for="inputPassword" class="col-sm-4 col-form-label">NGÀY SINH (DOB)</label>
            <div class="col-sm-6">
              <input class="kttext" type="text" id="ngaysinh1" name="ngaysinh1" value="<?php
              echo date("d-m-Y", strtotime($candidate['dateofbirth'] ));
              ?>"></div>

            </div>

          <div class="form-group row kcform-more">
            <label for="inputPassword" class="col-sm-4 col-form-label">GIỚI TÍNH (GENDER)</label>
            <div class="col-sm-8">
             <label class="radio-inline">
                <input type="radio" name="gender" id="inlineRadio1" value="M" <?php if($candidate['gender'] == 'M') echo 'checked';?>> Nam
              </label>
              <label class="radio-inline">
                <input type="radio" name="gender" id="inlineRadio2" value="F" <?php if($candidate['gender'] == 'F') echo 'checked'; ?>> Nữ
              </label>
            </div>
          </div>
          <div class="form-group row kcform-more">
            <label for="inputPassword" class="col-sm-4 col-form-label">NƠI SINH (POB)</label>
            <div class="col-sm-6">
               <select class="seletext js-example-basic-single" name="noisinh">
                 <option value="0" >Chọn tỉnh thành</option>
                <?php foreach ($city as $key ) {

                ?>
                  <option value="<?php echo $key['name'] ?>" <?php if($key['name'] == $candidate['placeofbirth']) echo "selected";?> ><?php echo $key['name'] ?></option>
                  <?php } ?>
                </select>
            </div>
          </div>
          <div class="form-group row kcform-more">
            <label for="inputPassword" class="col-sm-4 col-form-label">DÂN TỘC (ETHNIC)</label>
            <div class="col-sm-6">
               <input class="kttext" type="text" placeholder="" name="ethnic" value="<?php echo $candidate['ethnic'] ?>">
            </div>
          </div>
          <div class="form-group row kcform-more">
            <label for="inputPassword" class="col-sm-4 col-form-label">QUỐC TỊCH (NATIONALITY)</label>
            <div class="col-sm-6">
                <select class="seletext" name="quoctich">
                  <option value="Việt Nam">Việt Nam</option>
                  <option value="Khác" <?php if($candidate['nationality'] != "Việt Nam") echo "selected"?>>Khác</option>
                </select>
            </div>
          </div>
          <div class="form-group row kcform-more">
            <label for="inputPassword" class="col-sm-4 col-form-label">NGUYÊN QUÁN (NATIVELAND)</label>
            <div class="col-sm-6">
               <input class="kttext" type="text" placeholder="" name="nativeland" value="<?php echo $candidate['nativeland'] ?>">
                <!-- <select class="seletext js-example-basic-single" name="nativeland">
                    <option value="0" >Chọn tỉnh thành</option>
                <?php foreach ($city as $key ) { ?>
                    <option value="<?php echo $key['name'] ?>" <?php if($key['name'] == $candidate['nativeland']) echo "selected";?> ><?php echo $key['name'] ?></option>
                  <?php } ?>
                </select> -->
            </div>
          </div>
          <div class="form-group row kcform-more">
            <label for="inputPassword" class="col-sm-4 col-form-label">TÔN GIÁO (RELIGION)</label>
            <div class="col-sm-6">
               <input class="kttext" type="text" placeholder="" name="religion" value="<?php echo $candidate['religion'] ?>">
            </div>
          </div>
           <div class="form-group row kcform-more">
            <label for="inputPassword" class="col-sm-4 col-form-label">TÌNH TRẠNG HÔN NHÂN (MARITAL STATUS)</label>
            <div class="col-sm-6">
                <select class="seletext js-example-basic-single" name="maritalstatus">
                    <option value="S" <?php echo ($candidate['maritalstatus'] == 'S')? 'selected' : '' ?> >Độc thân</option>
                    <option value="M" <?php echo ($candidate['maritalstatus'] == 'M')? 'selected' : '' ?> >Đã kết hôn</option>
                    <option value="W" <?php echo ($candidate['maritalstatus'] == 'W')? 'selected' : '' ?> >Góa</option>
                    <option value="D" <?php echo ($candidate['maritalstatus'] == 'D')? 'selected' : '' ?> >Ly dị</option>
                </select>
            </div>
          </div>
          <div class="form-group row kcform-more">
            <label for="inputPassword" class="col-sm-4 col-form-label">CHIỀU CAO (HEIGHT) (CM)</label>
            <div class="col-sm-6">
               <input class="kttext" type="text" placeholder="" maxlength="3" name="chieucao" id="chieucao" value="<?php echo $candidate['height'] ?>">
            </div>
          </div>
          <div class="form-group row kcform-more">
            <label for="inputPassword" class="col-sm-4 col-form-label">CÂN NẶNG (WEIGHT) (KG)</label>
            <div class="col-sm-6">
               <input class="kttext" type="text" placeholder="" maxlength="3" name="cannang" id="cannang" value="<?php echo $candidate['weight'] ?>">
            </div>
          </div>
          <div class="form-group row kcform-more">
            <label for="inputPassword" class="col-sm-4 col-form-label">CMND (ID)</label>
            <div class="col-sm-6">
               <input class="kttext" type="text" placeholder="" required maxlength="" name="cmnd" id="idid" value="<?php echo $candidate['idcard'] ?>">
            </div>
          </div>
          <div class="form-group row kcform-more">
            <label for="inputPassword" class="col-sm-4 col-form-label">NGÀY CẤP (ISSUED DATE)</label>
            <div class="col-sm-6">
               <input class="kttext" type="text" id="ngaycap" placeholder="" name="dateofissue" value="<?php
               echo date("d-m-Y", strtotime($candidate['dateofissue'] ));
                 ?>">
            </div>
          </div>
          <div class="form-group row kcform-more">
            <label for="inputPassword" class="col-sm-4 col-form-label">NƠI CẤP (ISSUED PLACE)</label>
            <div class="col-sm-6">
               <select class="seletext js-example-basic-single" name="placeofissue">
                 <option value="0" >Chọn tỉnh thành</option>
                <?php foreach ($city as $key ) {

                ?>
                  <option value="<?php echo $key['name'] ?>" <?php if($candidate['placeofissue'] == $key['name']) echo 'selected'; ?> ><?php echo $key['name'] ?></option>
                  <?php } ?>

                </select>
                <br>
                <button type="submit" class="btn btnlong margin-top12" > Lưu</button>
            </div>
          </div>

         </form>
        </div>

        <div id="collapseThree" class="tab-pane <?php echo isset($three)? $three : ""; ?>">
          <form action="<?php echo base_url()?>handling/ins_upd_e_phone" method="post">
          <div class="form-group row kcform-more">
            <label for="staticEmail" class="col-sm-4 col-form-label">EMAIL ĐĂNG KÝ</label>
            <div class="col-sm-8">
              <input class="kttext modal-70"  type="email" placeholder="" required name="email" value="<?php echo $candidate['email'] ?>">
            </div>
          </div>
          <div class="form-group row kcform">
            <label for="inputPassword" class="col-sm-4 col-form-label">ĐỊA CHỈ THƯỜNG TRÚ (PERNAMENT ADDRESS)</label>
            <div class="col-sm-8">
              <textarea class="kttext areatext off-resize" rows="2" name="dctt" readonly onclick="showmodel8(1)"><?php
                  if($address != null)
                  {
                      foreach ($address as $key ) {
                        if($key['addtype'] == "PREMANENT")
                        {
                          echo $key['address']; break;
                        }
                      }
                  }
              ?></textarea>
                <input type="hidden" name="checkPREMANENT" id="checkPREMANENT" value="<?php if($address != null){
                  foreach ($address as $key ) {
                   if($key['addtype'] == "PREMANENT"){
                      echo "PREMANENT"; break;
                    } } } ?>">
                <?php if($address != null){
                  foreach ($address as $key ) {
                   if($key['addtype'] == "PREMANENT"){
                    ?>
                    <input type="hidden" name="countryPREMANENT" id="countryPREMANENT" value="<?php echo $key['country']?>" >
                    <input type="hidden" name="cityPREMANENT" id="cityPREMANENT" value="<?php echo $key['city']?>">
                    <input type="hidden" name="districtPREMANENT" id="districtPREMANENT" value="<?php echo$key['district']?>">
                    <input type="hidden" name="wardPREMANENT" id="wardPREMANENT" value="<?php echo $key['ward']?>">
                    <input type="hidden" name="streetPREMANENT" id="streetPREMANENT" value="<?php echo $key['street']?>">
                    <input type="hidden" name="addressnoPREMANENT" id="addressnoPREMANENT" value="<?php echo $key['addressno']?>">
                    <?php
                     break;
                    } } }
                     ?>

            </div>
          </div>
          <div class="form-group row kcform">
            <label for="inputPassword" class="col-sm-4 col-form-label">ĐỊA CHỈ LIÊN LẠC (CONTACT ADDRESS)</label>
            <div class="col-sm-8">
              <textarea class="kttext areatext off-resize"  rows="2" name="dcll" readonly onclick="showmodel8(2)"><?php
                  if($address != null)
                  {
                      foreach ($address as $key ) {
                        if($key['addtype'] == "CONTACT")
                        {
                          echo $key['address']; break;
                        }
                      }
                  }
              ?></textarea>
               <input type="hidden" name="checkCONTACT" id="checkCONTACT" value="<?php if($address != null){
                  foreach ($address as $key ) {
                    if($key['addtype'] == "CONTACT"){
                     echo "CONTACT"; break;
                    } } } ?>">
                      <?php if($address != null){
                  foreach ($address as $key ) {
                   if($key['addtype'] == "CONTACT"){
                    ?>


                     <input type="hidden" name="countryCONTACT" id="countryCONTACT" value="<?php echo $key['country']?>" >
                    <input type="hidden" name="cityCONTACT" id="cityCONTACT" value="<?php echo $key['city']?>">
                    <input type="hidden" name="districtCONTACT" id="districtCONTACT" value="<?php echo$key['district']?>">
                    <input type="hidden" name="wardCONTACT" id="wardCONTACT" value="<?php echo $key['ward']?>">
                    <input type="hidden" name="streetCONTACT" id="streetCONTACT" value="<?php echo $key['street']?>">
                    <input type="hidden" name="addressnoCONTACT" id="addressnoCONTACT" value="<?php echo $key['addressno']?>">
                    <?php
                     break;
                    } } }
                     ?>
            </div>
          </div>
          <div class="form-group row kcform-more">
            <label for="inputPassword" class="col-sm-4 col-form-label">ĐIỆN THOẠI CÁ NHÂN (PESONAL CONTACT)</label>
            <div class="col-sm-8">
               <?php
                    $pizza  = trim($candidate['telephone'],",");
                    $pieces = explode(",", $pizza);
                    $p1 = isset($pieces[0])? $pieces[0] : "" ;
                    $p2 = isset($pieces[1])? $pieces[1] : "" ;
              ?>
              <input class="kttext"  type="text" placeholder="" maxlength="11" name="dt1" id="dt1" value="<?php echo $p1; ?>">
              <br>
              <input class="kttext margin-top-8"  type="text" maxlength="11" placeholder="" name="dt2" id="dt2" value="<?php echo $p2; ?>">


            </div>
          </div>
          <div class="form-group row kcform">
            <label for="inputPassword" class="col-sm-4 col-form-label">ĐỊA CHỈ LIÊN LẠC KHẨN CẤP (EMERGENCY CONTACT)</label>
            <div class="col-sm-4">

              <input class="kttext" type="text" placeholder="" name="dtkhancap" id="dtkhancap" value="<?php echo $candidate['emergencycontact'] ?>">
              <!-- <input class="kttext margin-left-25"  type="text" placeholder="" name="tenkhancap"> -->
               <button type="submit" class="btn btnlong margin-top12" > Lưu</button>
            </div>
          </div>
        </form>
        </div>

        <div id="collapseFour" class="tab-pane <?php echo isset($four)? $four : ""; ?>">

          <button type="button" class="btn btnlong btn-them" onclick="showmodel11()"> Thêm</button>

          <table   class="table table-striped table-bordered">
            <thead>
              <tr class="fontstyle">
                <th id="th" width="30%">Họ và tên</th>
                <th id="th" width="20%">Năm sinh</th>
                <th id="th" width="20%">Quan hệ</th>
                <th id="th" width="20%">Nghề nghiệp</th>
                <th id="th" width="10%"></th>
              </tr>
            </thead>
            <tbody class="fontstyle text-center">
              <?php if($family != null) {
                $i = 0;
              foreach ($family as $key) { ?>

             <tr>
              <form id="<?php echo 'click'.$i ?>">
                <input type="hidden" name="hoten" value="<?php echo $key['name']?>">
                <input type="hidden" name="namsinh" value="<?php echo $key['yob']?>">
                <input type="hidden" name="quanhe" value="<?php echo $key['type']?>">
                <input type="hidden" name="nghenghiep" value="<?php echo $key['career']?>">
                <input type="hidden" name="recordid" value="<?php echo $key['recordid']?>">
              </form>
              <td><?php echo $key['name']?></td>
              <td><?php echo ($key['yob'] !== 0) ? $key['yob'] : ""; ?></td>
              <td><?php echo ($key['type'] !== '0') ? $key['type'] : ""; ?></td>
              <td><?php echo $key['career']?></td>
              <td><i class="fa fa-edit" onclick="editmodal('<?php echo 'click'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal('<?php echo 'click'.$i ?>')"></i></td>
             </tr>
             <?php $i++;} } ?>
            </tbody>
          </table>

         <!--  <button type="button" class="btn btnlong"> Lưu</button>
         -->
        </div>

        <div id="collapseFive" class="tab-pane <?php echo isset($five)? $five : ""; ?>">

          <label>Quá trình công tác</label>
          <button type="button" class="btn btnlong btn-them" onclick="showmodel2()"> Thêm</button>
          <table   class="table table-striped table-bordered" >
            <thead class="fontstyle">
              <tr >
                <th id="th" class="middle2" width="20%">Từ - Đến</th>
                <th id="th" class="middle2" width="20%">Cty/ Địa chỉ/ ĐT</th>
                <th id="th" width="13%">CV khi nghỉ</th>
                <th id="th" width="17%">NV/ Trách nhiệm</th>
                 <th id="th" class="middle2" width="20%">Lý do nghỉ</th>
                 <th id="th" width="10%"></th>
              </tr>
            </thead>
            <tbody class="fontstyle text-center">
             <?php if($experience != null) {
              $i = 0;
              foreach ($experience as $key) { ?>
             <tr>
              <form id="<?php echo 'click2'.$i ?>">
                <input type="hidden" name="tungay" value="<?php echo date("d-m-Y", strtotime($key['datefrom']))?>">
                <input type="hidden" name="denngay" value="<?php echo date("d-m-Y", strtotime($key['dateto']))?>">
                <input type="hidden" name="cty" value="<?php echo $key['company']?>">
                <input type="hidden" name="vitri" value="<?php echo $key['position']?>">
                <input type="hidden" name="nhiemvu" value="<?php echo $key['responsibility']?>">
                <input type="hidden" name="lydo" value="<?php echo $key['quitreason']?>">
                <input type="hidden" name="recordid" value="<?php echo $key['recordid']?>">
                <input type="hidden" name="diachi" value="<?php echo $key['address']?>">
                <input type="hidden" name="sdt" value="<?php echo $key['phone']?>">
              </form>
              <td><?php echo date("d-m-Y", strtotime($key['datefrom'])).' - '.date("d-m-Y", strtotime($key['dateto']))?></td>
              <td><?php echo $key['company']." / ".$key['address']." / ".$key['phone']?></td>
              <td><?php echo $key['position']?></td>
              <td><?php echo $key['responsibility']?></td>
              <td><?php echo $key['quitreason']?></td>
              <td><i class="fa fa-edit" onclick="editmodal2('<?php echo 'click2'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal2('<?php echo 'click2'.$i ?>')"></i></td>
             </tr>
             </tr>
             <?php $i++; } } ?>
            </tbody>
          </table>
           <label>Người phụ trách tham khảo</label>
          <button type="button" class="btn btnlong btn-them" onclick="showmodel3()"> Thêm</button>
          <table   class="table table-striped table-bordered" >
            <thead>
              <tr class="fontstyle">
                <th id="th" width="30%">Họ và tên</th>
                <th id="th" width="15%">Chức vụ</th>
                <th id="th" width="20%">Công ty</th>
                <th id="th" width="25%">Liên hệ</th>
                <th id="th" width="10%"></th>

              </tr>
            </thead>
            <tbody class="fontstyle text-center">
             <?php if($reference != null) {
              $i = 0;
              foreach ($reference as $key) { ?>
             <tr>
               <form id="<?php echo 'click3'.$i ?>">
                <input type="hidden" name="hoten" value="<?php echo $key['name']?>">
                <input type="hidden" name="vitri" value="<?php echo $key['position']?>">
                <input type="hidden" name="cty" value="<?php echo $key['company']?>">
                <input type="hidden" name="lienhe" value="<?php echo $key['contactno']?>">
                <input type="hidden" name="recordid" value="<?php echo $key['recordid']?>">
              </form>
              <td><?php echo $key['name']?></td>
              <td><?php echo $key['position']?></td>
              <td><?php echo $key['company']?></td>
              <td><?php echo $key['contactno']?></td>
               <td><i class="fa fa-edit" onclick="editmodal3('<?php echo 'click3'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal3('<?php echo 'click3'.$i ?>')"></i></td>
             </tr>
             <?php $i++; } } ?>

             </tr>
            </tbody>
          </table>
         <!--  <button type="button" class="btn btnlong" > Lưu</button>
          -->
        </div>

        <div id="collapseSix" class="tab-pane <?php echo isset($six)? $six : ""; ?>">

          <label>Trình độ học vấn</label>
          <button type="button" class="btn btnlong btn-them" onclick="showmodel4()"> Thêm</button>
          <table   class="table table-striped table-bordered" >
            <thead class="fontstyle">
              <tr >
                <th id="th" width="20%">Từ - Đến</th>
                <th id="th" width="20%">Trường</th>
                <th id="th" width="15%">Nơi học</th>
                <th id="th" width="20%">Ngành học</th>
                 <th id="th" width="15%">Bằng cấp</th>
                 <th id="th" width="10%"></th>
              </tr>
            </thead>
            <tbody class="fontstyle text-center">
              <?php if($knowledge != null) {
                $i = 0;
              foreach ($knowledge as $key) {
                if($key['traintimetype'] != null)
                  { continue; } else {?>
             <tr>
              <form id="<?php echo 'click4'.$i ?>">
                <input type="hidden" name="tu" value="<?php echo date("d-m-Y", strtotime($key['datefrom'])) ?>">
                <input type="hidden" name="den" value="<?php echo date("d-m-Y", strtotime($key['dateto'])) ?>">
                <input type="hidden" name="truong" value="<?php echo $key['trainingcenter']?>">
                <input type="hidden" name="noihoc" value="<?php echo $key['trainingplace']?>">
                <input type="hidden" name="nganhhoc" value="<?php echo $key['trainingcourse']?>">
                <input type="hidden" name="chungchi" value="<?php echo $key['certificate']?>">
                <input type="hidden" name="caonhat" value="<?php echo $key['highestcer']?>">
                <input type="hidden" name="recordid" value="<?php echo $key['recordid']?>">
              </form>
              <td><?php echo date("d-m-Y", strtotime($key['datefrom'])).' - '.date("d-m-Y", strtotime($key['dateto']))?></td>
              <td><?php echo $key['trainingcenter']?></td>
              <td><?php echo $key['trainingplace']?></td>
              <td><?php echo $key['trainingcourse']?></td>
              <td><?php echo $key['certificate']; if($key['highestcer'] == "Y") echo "(*)"; ?></td>
              <td><i class="fa fa-edit" onclick="editmodal4('<?php echo 'click4'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal4('<?php echo 'click4'.$i ?>')"></i></td>
             </tr>
             <?php $i++; } } }?>
            </tbody>
          </table>
           <label>Các khóa đào tạo</label>
          <button type="button" class="btn btnlong btn-them" onclick="showmodel5()" > Thêm</button>
          <table   class="table table-striped table-bordered" >
            <thead class="fontstyle">
              <tr>
                <th id="th" width="20%">Từ - Đến</th>
                <th id="th" width="25%">Cơ sở đạo tào</th>
                <th id="th" width="13%">TG học</th>
                <th id="th" width="17%">Ngành học</th>
                 <th id="th" width="15%">Bằng cấp</th>
                 <th id="th" width="10%"></th>
              </tr>
            </thead>
            <tbody class="fontstyle text-center">
             <?php if($knowledge != null) {
               $i = 0;
              foreach ($knowledge as $key) {
                if($key['traintimetype'] == null)
                  { continue; } else {?>
             <tr>
              <form id="<?php echo 'click5'.$i ?>">
                <input type="hidden" name="tu" value="<?php echo date("d-m-Y", strtotime($key['datefrom'])) ?>">
                <input type="hidden" name="den" value="<?php echo date("d-m-Y", strtotime($key['dateto'])) ?>">
                <input type="hidden" name="truong" value="<?php echo $key['trainingcenter']?>">
                <input type="hidden" name="tghoc" value="<?php echo $key['traintime']?>">
                <input type="hidden" name="donvi" value="<?php echo $key['traintimetype']?>">
                <input type="hidden" name="nganhhoc" value="<?php echo $key['trainingcourse']?>">
                <input type="hidden" name="chungchi" value="<?php echo $key['certificate']?>">
                <input type="hidden" name="recordid" value="<?php echo $key['recordid']?>">
              </form>
              <td><?php echo date("d-m-Y", strtotime($key['datefrom'])).' - '.date("d-m-Y", strtotime($key['dateto']))?></td>
              <td><?php echo $key['trainingcenter']?></td>
              <td><?php echo $key['traintime'].' '.$key['traintimetype']?></td>
              <td><?php echo $key['trainingcourse']?></td>
              <td><?php echo $key['certificate']?></td>
               <td><i class="fa fa-edit" onclick="editmodal5('<?php echo 'click5'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal4('<?php echo 'click5'.$i ?>')"></i></td>
             </tr>
             <?php $i++; } } } ?>
            </tbody>
          </table>
          <!-- <button type="button" class="btn btnlong" > Lưu</button>   -->
        </div>

        <div id="collapseSeven" class="tab-pane <?php echo isset($seven)? $seven : ""; ?>">
          <label>Trình độ Ngoại ngữ</label>
          <button type="button" class="btn btnlong btn-them" onclick="showmodel6()"> Thêm</button>
          <table   class="table table-striped table-bordered" >
            <thead class="fontstyle">
              <tr>
                <th id="th" >Ngoại Ngữ</th>
                <th id="th" >Nghe</th>
                <th id="th" >Nói</th>
                <th id="th" >Đọc</th>
                <th id="th" >Viết</th>
                <th id="th" ></th>
              </tr>
            </thead>
            <tbody class="fontstyle text-center">
            <?php if($language != null) {
              $i = 0;
              foreach ($language as $key) {
                echo $key['recordid'];
                ?>
             <tr>
              <form id="<?php echo 'click6'.$i ?>">
                <input type="hidden" name="ngonngu" value="<?php echo $key['language']?>">
                <input type="hidden" name="rate1" value="<?php echo $key['rate1']?>">
                <input type="hidden" name="rate2" value="<?php echo $key['rate2']?>">
                <input type="hidden" name="rate3" value="<?php echo $key['rate3']?>">
                <input type="hidden" name="rate4" value="<?php echo $key['rate4']?>">

                <input type="hidden" name="recordid" value="<?php echo $key['recordid']?>">
              </form>
              <td><?php echo $key['language']?></td>
              <td><?php echo ($key['rate1'] !== "0") ? $key['rate1'] : ""; ?></td>
              <td><?php echo ($key['rate2'] !== "0")? $key['rate2'] : ""; ?></td>
              <td><?php echo ($key['rate3'] !== "0")? $key['rate3']: ""; ?></td>
              <td><?php echo ($key['rate4'] !== "0")? $key['rate4']: ""; ?></td>
              <td><i class="fa fa-edit" onclick="editmodal6('<?php echo 'click6'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal6('<?php echo 'click6'.$i ?>')"></i></td>
             </tr>
             <?php $i++; } } ?>
            </tbody>
          </table>
          <label>Trình độ tin học</label>
           <button type="button" class="btn btnlong btn-them" onclick="showmodel7()" > Thêm</button>
          <table   class="table table-striped table-bordered" >
            <thead class="fontstyle">
              <tr>

                <th id="th" width="60%">Phần mềm</th>
                <th id="th" width="30%">Trình độ</th>
                <th id="th" width="10%"></th>
              </tr>
            </thead>
            <tbody class="fontstyle text-center">
             <?php if($software != null) {
              $i = 0;
              foreach ($software as $key) {
                ?>
             <tr>
              <form id="<?php echo 'click7'.$i ?>">
                <input type="hidden" name="pm" value="<?php echo $key['software']?>">
                <input type="hidden" name="rate1" value="<?php echo $key['rate1']?>">

                <input type="hidden" name="recordid" value="<?php echo $key['recordid']?>">
              </form>
              <td><?php echo $key['software']?></td>
              <td><?php echo ($key['rate1'] !== "0")? $key['rate1'] : ""; ?></td>
              <td><i class="fa fa-edit" onclick="editmodal7('<?php echo 'click7'.$i ?>')"></i> <i class="fa fa-eraser" onclick="delmodal7('<?php echo 'click7'.$i ?>')"></i></td>
             </tr>
             <?php $i++; } } ?>
            </tbody>
          </table>

        </div>

        </div>
      </div>

      </div>
    </div>



    </nav>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-30" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url()?>handling/ins_upd_relationship" method="post">
      <h3 class="title-modal margin-bot-15">Thêm người thân</h3>

          <input type="hidden" name="checkup" id="checkup" value="0">
            <div class="form-group row padding-left-right-20 margin-bot-15" >
            <label for="staticEmail"  class="col-sm-4 col-form-label fontstyle">Họ và tên</label>
            <div class="col-sm-8">

              <input class="fontstyle width100" type="text" required  placeholder="" name="hoten" id="hoten11">
            </div>
          </div>
           <div class="form-group row padding-left-right-20 margin-bot-15" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Năm sinh</label>
            <div class="col-sm-8">

              <select class="form-control height31" style="font-size: 14px" name="namsinh" id="namsinh11">
                 <option value="0">Chọn năm sinh</option>
                <?php
                   $date = getdate();

                 for($i = $date['year']; $i > 1940; $i--) { ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
                </select>
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-15" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Quan hệ</label>
            <div class="col-sm-8">

             <select class="form-control height31" style="font-size: 14px" name="quanhe" id="quanhe11">
                  <option value="0">Chọn quan hệ</option>
                  <option value="Cha">Cha</option>
                  <option value="Mẹ">Mẹ</option>
                  <option value="Anh">Anh</option>
                  <option value="Chị">Chị</option>
                  <option value="Em">Em</option>
                  <option value="Cháu">Cháu</option>
                  <option value="Vợ">Vợ</option>
                  <option value="Chồng">Chồng</option>
                  <option value="Con">Con</option>
                  <option value="Ông">Ông</option>
                  <option value="Bà">Bà</option>
                  <option value="Khác">Khác</option>
                </select>
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-15" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Nghề nghiệp</label>
            <div class="col-sm-8">

              <input class="width100 fontstyle" type="text"  placeholder="" name="nghenghiep" id="nn11">

            </div>
          </div>

           <button type="submit" class="btn them-modal" id="them11"> Thêm</button>
         </form>

    </div>
  </div>
</div>


<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-30" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url()?>handling/ins_upd_experience" method="post">
      <h3 class="title-modal margin-bot-15">Thêm quá trình công tác</h3>
            <input type="hidden" name="checkup" id="checkup2" value="0">
          <div class="form-group row padding-left-right-20 margin-bot-2" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Từ đến</label>
            <div class="col-sm-8">
              <div class="form-group row">
                <div class="col-sm-6">
                <input class="form-control fontstyle" type="text" id="tuden5" placeholder="" name="tu" required></div>
                <div class="col-sm-6">
                <input class="form-control fontstyle" type="text" id="tuden6" placeholder="" name="den" required></div>
              </div>
            </div>
          </div>
            <div class="form-group row padding-left-right-20 margin-bot-12" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Tên công ty</label>
            <div class="col-sm-6">

              <input class="form-control fontstyle" type="text"  placeholder="" name="tencty" id="cty2" required>
            </div>
          </div>
           <div class="form-group row padding-left-right-20 margin-bot-15" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Địa chỉ</label>
            <div class="col-sm-8">

              <textarea class="form-control off-resize fontstyle" rows="2" name="diachi" id="dc2" required></textarea>
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-15" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Số điện thoại</label>
            <div class="col-sm-8">

              <input class="form-control fontstyle" type="text"  maxlength="12" name="sdt" id="sdt2" required>
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-12" >
            <label for="staticEmail" class="col-sm-4 padding-right2 fontstyle">Chức vụ khi nghỉ</label>
            <div class="col-sm-6">

              <input class="form-control fontstyle" type="text"  placeholder="" name="chucvukhinghi" id="chucvu2">
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-12" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle"> Nhiệm vụ/ Trách nhiệm </label>
            <div class="col-sm-6">

              <input class="form-control fontstyle" type="text"  placeholder="" name="nhiemvu" id="nhiemvu2">

            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-12" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Lý do nghỉ</label>
            <div class="col-sm-6">

              <input class="form-control fontstyle" type="text"  placeholder="" name="lydonghi" id="lydonghi2">

            </div>
          </div>
           <button type="submit" class="btn them-modal" id="them12"> Thêm</button>

      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-30" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url()?>handling/ins_upd_reference" method="post">
      <h3 class="title-modal margin-bot-15">Thêm người tham khảo</h3>

          <input type="hidden" name="checkup" id="checkup3" value="0">
            <div class="form-group row padding-left-right-20" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Họ và tên</label>
            <div class="col-sm-8">

              <input class="form-control fontstyle" type="text"  placeholder="" name="hoten" id="hoten3" required>
            </div>
          </div>
           <div class="form-group row padding-left-right-20" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Chức vụ</label>
            <div class="col-sm-8">

              <input class="form-control fontstyle" type="text"  placeholder="" name="chucvu" id="chucvu3" required>
            </div>
          </div>
          <div class="form-group row padding-left-right-20" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Công ty</label>
            <div class="col-sm-8">

              <input class="form-control fontstyle" type="text"  placeholder="" name="congty" id="congty3" required>
            </div>
          </div>
          <div class="form-group row padding-left-right-20" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Liên hệ</label>
            <div class="col-sm-8">

              <input class="form-control fontstyle" type="text"  placeholder="" name="lienhe" id="lienhe3" required>

            </div>
          </div>
           <button type="submit" class="btn them-modal" id="them3"> Thêm</button>

      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-30" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url()?>handling/ins_upd_knowledge" method="post">
      <h3 class="title-modal margin-bot-15">Thêm trình độ học vấn</h3>
           <input type="hidden" name="checkup" id="checkup4" value="0">
          <div class="form-group row padding-left-right-20 margin-bot-2" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Từ đến</label>
            <div class="col-sm-8">
              <div class="form-group row">
                <div class="col-sm-6">
                <input class="form-control fontstyle" type="text" id="tuden1" placeholder="" name="tu" required></div>
                <div class="col-sm-6">
                <input class="form-control fontstyle" type="text" id="tuden2" placeholder="" name="den" required></div>
              </div>
            </div>
          </div>
            <div class="form-group row padding-left-right-20" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Tên trường</label>
            <div class="col-sm-6">

              <input class="form-control fontstyle" type="text"  placeholder="" name="tentruong" id="truong4" required>
            </div>
          </div>
           <div class="form-group row padding-left-right-20" >
            <label for="staticEmail fontstyle" class="col-sm-4 col-form-label">Nơi học</label>
            <div class="col-sm-6">

              <input class="form-control fontstyle" type="text"  placeholder="" name="noihoc" id="noihoc4">
            </div>
          </div>
          <div class="form-group row padding-left-right-20" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Ngành học</label>
            <div class="col-sm-6">

              <input class="form-control fontstyle" type="text"  placeholder="" name="nganhhoc" id="nganhhoc4">
            </div>
          </div>
          <div class="form-group row padding-left-right-20" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Bằng cấp/ trình độ</label>
            <div class="col-sm-6">

              <input class="form-control fontstyle" type="text"  placeholder="" name="trinhdo" id="trinhdo4">
              <label class="radio-inline fontstyle">
                <input type="radio"  name="caonhat" id="caonhat4" value="Y"> Bằng cao nhất của bạn (*)
              </label>
            </div>
          </div>
           <button type="submit" class="btn them-modal" id="them4"> Thêm</button>
         </form>

    </div>
  </div>
</div>

<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-30" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url()?>handling/ins_upd_knowledge_v2" method="post">
      <h3 class="title-modal margin-bot-15">Thêm khóa huấn luyện/ đào tạo</h3>
           <input type="hidden" name="checkup" id="checkup5" value="0">
          <div class="form-group row padding-left-right-20 margin-bot-2" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Từ đến</label>
            <div class="col-sm-8">
              <div class="form-group row">
                <div class="col-sm-6">
                <input class="form-control fontstyle" type="text" id="tuden3" placeholder="" name="tu" required></div>
                <div class="col-sm-6">
                <input class="form-control fontstyle" type="text" id="tuden4" placeholder="" name="den" required></div>
              </div>
            </div>
          </div>
            <div class="form-group row padding-left-right-20 margin-bot-2">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Tên cơ sở đào tạo</label>
            <div class="col-sm-6">

              <input class="form-control fontstyle" type="text"  placeholder="" name="cs_daotao" id="truong5" required>
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-2">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Thời gian học</label>
            <div class="col-sm-8">
              <div class="form-group row">
                <div class="col-sm-6">
                <input class="form-control fontstyle" type="text"  placeholder="" name="tghoc" id="tghoc5"></div>
                <div class="col-sm-6">
                <select class="form-control height3 fontstyle" name="donvi" id="donvi5">
                  <!-- <option value="0" disabled>Chọn...</option> -->
                  <option value="Năm" selected>Năm</option>
                  <option value="Tháng">Tháng</option>
                  <option value="Ngày">Ngày</option>

                </select></div>
              </div>
            </div>
          </div>
          <div class="form-group row padding-left-right-20">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Ngành học</label>
            <div class="col-sm-6">

              <input class="form-control fontstyle" type="text"  placeholder="" name="nganhhoc" id="nganhhoc5">
            </div>
          </div>
          <div class="form-group row padding-left-right-20">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Bằng cấp/ chứng chỉ</label>
            <div class="col-sm-6">

              <input class="form-control fontstyle  " type="text"  placeholder="" name="bangcap" id="bangcap5">
            </div>
          </div>
           <button type="submit" class="btn them-modal" id="them5"> Thêm</button>

      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-30" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url()?>handling/ins_upd_language" method="post">
      <h3 class="title-modal margin-bot-15">Thêm ngoại ngữ</h3>
           <input type="hidden" name="checkup" id="checkup6" value="0">
          <div class="form-group row padding-left-right-20 margin-bot-12">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Ngoại ngữ</label>
            <div class="col-sm-8">

              <input class="form-control fontstyle" type="text"  placeholder="" name="tentruong" id="truong6" required>
            </div>
          </div>
            <div class="form-group row padding-left-right-20 margin-bot-12">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Nghe</label>
            <div class="col-sm-6">

              <select class="form-control height31 fontstyle" name="nghe" id="nghe6">
                  <option value="0">Chọn...</option>
                  <option value="Giỏi">Giỏi</option>
                  <option value="Khá">Khá</option>
                  <option value="Trung Bình">Trung Bình</option>
                  <option value="Yếu">Yếu</option>
                </select>
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-12">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Nói</label>
            <div class="col-sm-6">

              <select class="form-control height31 fontstyle" name="noi" id="noi6">
                  <option value="0">Chọn...</option>
                  <option value="Giỏi">Giỏi</option>
                  <option value="Khá">Khá</option>
                  <option value="Trung Bình">Trung Bình</option>
                  <option value="Yếu">Yếu</option>
                </select>
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-12">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Đọc</label>
            <div class="col-sm-6">

              <select class="form-control height31 fontstyle" name="doc" id="doc6">
                 <option value="0">Chọn...</option>
                  <option value="Giỏi">Giỏi</option>
                  <option value="Khá">Khá</option>
                  <option value="Trung Bình">Trung Bình</option>
                  <option value="Yếu">Yếu</option>
                </select>
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-12">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Viết</label>
            <div class="col-sm-6">

              <select class="form-control height31 fontstyle" name="viet" id="viet6">
                  <option value="0">Chọn...</option>
                  <option value="Giỏi">Giỏi</option>
                  <option value="Khá">Khá</option>
                  <option value="Trung Bình">Trung Bình</option>
                  <option value="Yếu">Yếu</option>
                </select>
            </div>
          </div>

           <button type="submit" class="btn them-modal" id="them6" > Thêm</button>

      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-30"  role="document">
    <div class="modal-content">
      <form action="<?php echo base_url()?>handling/ins_upd_software" method="post">
      <h3 class="title-modal margin-bot-15">Thêm trình độ tin học</h3>
           <input type="hidden" name="checkup" id="checkup7" value="0">
          <div class="form-group row padding-left-right-20">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Kiến thức/ Phần mềm</label>
            <div class="col-sm-8">

              <textarea class="form-control off-resize fontstyle" rows="2" name="phanmem" id="pm7" required></textarea>
            </div>
          </div>
            <div class="form-group row padding-left-right-20">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Trình độ</label>
            <div class="col-sm-6">

              <select class="form-control height31 fontstyle" name="trinhdo" id="trinhdo7">
               <option value="0">Chọn...</option>
                  <option value="Giỏi">Giỏi</option>
                  <option value="Khá">Khá</option>
                  <option value="Trung Bình">Trung Bình</option>
                  <option value="Yếu">Yếu</option>
                </select>
            </div>
          </div>

           <button type="submit" class="btn them-modal" id="them7"> Thêm</button>

      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="edit_anh_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url()?>handling/upload_image" method="POST" enctype="multipart/form-data">

      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h4 class="modal-title" id="myModalLabel">Cập nhật ảnh đại diện</h4>
      </div>
      <div class="modal-body">
         <strong class="title-anhdaidien">Đổi ảnh đại diện</strong>
      <br>
           <!-- <button type="file"  class="btn btnlong padding-anhdaidien"  >Chọn file</button>
           <label>Không có ảnh...</label> -->

       <!-- <input type="file" class="btn btnlong padding-anhdaidien" name="image" id="image">   -->
       <div class="input-group btn-load1">
        <label id="browsebutton" class="btn btn-default input-group-addon btn-load2" for="my-file-selector" style="background-color:white">
            <input id="my-file-selector" name="image" type="file" style="display:none;">
            Browse...
        </label>
        <input id="label" type="text" class="form-control btn-load3" readonly="">
    </div>

      </div>



      <div class="modal-footer">
        <button type="button" class="btn btnlong btn88"  data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btnlong btn99"> Lưu</button> -->
        <input type="submit" class="btn btnlong btn99" value="Lưu">
      </div>
    </form>
    </div>
  </div>
</div>

<div class="modal fade" id="myModaldel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-30" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url()?>handling/del_relationship" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="checkup" id="checkup1d" value="0">
         <strong class="title-anhdaidien fontbig" style="margin-left: 25%;">Thông báo</strong>
      <br>
          <label for="staticEmail"  style="margin-left: 40px">Bạn có muốn xóa thông tin này không?</label>
       <br>
       <div class="form-group row"><div class="col-sm-6">
           <button type="submit" class="btn them-modal" > Xóa</button></div><div class="col-sm-6">
            <button type="button" class="btn them-modal" data-dismiss="modal" style="margin-left: 5px"> Hủy</button></div>
          </div>
    </form>
    </div>
  </div>
</div>
<div class="modal fade" id="myModaldel2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-30" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url()?>handling/del_experience" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="checkup" id="checkup2d" value="0">
         <strong class="title-anhdaidien fontbig" style="margin-left: 25%;">Thông báo</strong>
      <br>
          <label for="staticEmail"  style="margin-left: 40px">Bạn có muốn xóa thông tin này không?</label>
       <br>
       <div class="form-group row"><div class="col-sm-6">
           <button type="submit" class="btn them-modal" > Xóa</button></div><div class="col-sm-6">
            <button type="button" class="btn them-modal" data-dismiss="modal" style="margin-left: 5px"> Hủy</button></div>
          </div>
    </form>
    </div>
  </div>
</div>
<div class="modal fade" id="myModaldel3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-30" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url()?>handling/del_reference" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="checkup" id="checkup3d" value="0">
         <strong class="title-anhdaidien fontbig" style="margin-left: 25%;">Thông báo</strong>
      <br>
          <label for="staticEmail"  style="margin-left: 40px">Bạn có muốn xóa thông tin này không?</label>
       <br>
       <div class="form-group row"><div class="col-sm-6">
           <button type="submit" class="btn them-modal" > Xóa</button></div><div class="col-sm-6">
            <button type="button" class="btn them-modal" data-dismiss="modal" style="margin-left: 5px"> Hủy</button></div>
          </div>
    </form>
    </div>
  </div>
</div>
<div class="modal fade" id="myModaldel4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-30" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url()?>handling/del_knowledge" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="checkup" id="checkup4d" value="0">
         <strong class="title-anhdaidien fontbig" style="margin-left: 25%;">Thông báo</strong>
      <br>
          <label for="staticEmail"  style="margin-left: 40px">Bạn có muốn xóa thông tin này không?</label>
       <br>
       <div class="form-group row"><div class="col-sm-6">
           <button type="submit" class="btn them-modal" > Xóa</button></div><div class="col-sm-6">
            <button type="button" class="btn them-modal" data-dismiss="modal" style="margin-left: 5px"> Hủy</button></div>
          </div>
    </form>
    </div>
  </div>
</div>
<div class="modal fade" id="myModaldel6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-30" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url()?>handling/del_language" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="checkup" id="checkup6d" value="0">
         <strong class="title-anhdaidien fontbig" style="margin-left: 25%;">Thông báo</strong>
      <br>
          <label for="staticEmail"  style="margin-left: 40px">Bạn có muốn xóa thông tin này không?</label>
       <br>
       <div class="form-group row"><div class="col-sm-6">
           <button type="submit" class="btn them-modal" > Xóa</button></div><div class="col-sm-6">
            <button type="button" class="btn them-modal" data-dismiss="modal" style="margin-left: 5px"> Hủy</button></div>
          </div>
    </form>
    </div>
  </div>
</div>
<div class="modal fade" id="myModaldel7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-30" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url()?>handling/del_software" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="checkup" id="checkup7d" value="0">
         <strong class="title-anhdaidien fontbig" style="margin-left: 25%;">Thông báo</strong>
      <br>
          <label for="staticEmail"  style="margin-left: 40px">Bạn có muốn xóa thông tin này không?</label>
       <br>
       <div class="form-group row"><div class="col-sm-6">
           <button type="submit" class="btn them-modal" > Xóa</button></div><div class="col-sm-6">
            <button type="button" class="btn them-modal" data-dismiss="modal" style="margin-left: 5px"> Hủy</button></div>
          </div>
    </form>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-30" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url()?>handling/ins_upd_address" method="post">
      <h3 class="title-modal margin-bot-15" id="titleaddress">Địa chỉ</h3>
           <input type="hidden" name="checkup" id="checkup8" value="0">
          <div class="form-group row padding-left-right-20" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Quốc gia</label>
            <div class="col-sm-8">
               <select class="form-control height3 fontstyle" name="quocgia" id="quocgia8">
                  <option value="0">Chọn...</option>
                  <option value="Việt Nam">Việt Nam</option>
                  <option value="Khác">Khác</option>

                </select>
            </div>
          </div>
            <div class="form-group row padding-left-right-20">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Thành Phố</label>
            <div class="col-sm-8">

              <select class="seletext js-example-basic-single" name="thanhpho" id="thanhpho8" style="width: 100%" required
              onchange="testcombo(this.value,0)">
                 <option value="0" >Chọn tỉnh thành</option>
                <?php foreach ($city as $key ) {

                ?>
                  <option value="<?php echo $key['id_city'] ?>" data-name="<?php echo $key['name'] ?>"><?php echo $key['name'] ?></option>
                  <?php } ?>
                </select>
            </div>
          </div>
          <div class="form-group row padding-left-right-20">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Quận/Huyện</label>
            <div class="col-sm-8">
               <select class="seletext js-example-basic-single" name="quanhuyen" id="quanhuyen8" style="width: 100%" required onchange="testcombo2(this.value,0)">
                 <option value="0" id="chonqh" >Chọn quận huyện</option>
                </select>
            </div>
          </div>
          <div class="form-group row padding-left-right-20">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Phường/ Xã</label>
            <div class="col-sm-8">

               <select class="seletext js-example-basic-single" name="phuongxa" id="phuongxa8" style="width: 100%" required>
                 <option value="0" id="chonpx" >Chọn phường xã</option>

                </select>
            </div>
          </div>
          <div class="form-group row padding-left-right-20">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Số nhà/ Tên đường</label>
            <div class="col-sm-8">

               <textarea class="form-control off-resize fontstyle" rows="2" name="duong" id="duong8" required></textarea>
            </div>
          </div>
          <div class="form-group row padding-left-right-20">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Số nhà/ Tòa nhà</label>
            <div class="col-sm-8">

               <textarea class="form-control off-resize fontstyle" rows="2" name="toanha" id="toanha8"></textarea>
            </div>
          </div>
           <button type="submit" class="btn them-modal" > OK</button>
            <button type="button" class="btn them-modal title-right" id="del8" style="margin-top: -40px; margin-right: 30px;" onclick="showdel8()" > Xóa</button>

      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="myModaldel8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-30" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url()?>handling/del_address" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="checkup" id="checkup8d" value="0">
         <strong class="title-anhdaidien fontbig" style="margin-left: 25%;">Thông báo</strong>
      <br>
          <label for="staticEmail"  style="margin-left: 40px">Bạn có muốn xóa thông tin này không?</label>
       <br>
       <div class="form-group row"><div class="col-sm-6">
           <button type="submit" class="btn them-modal" > Xóa</button></div><div class="col-sm-6">
            <button type="button" class="btn them-modal" data-dismiss="modal" style="margin-left: 5px"> Hủy</button></div>
          </div>
    </form>
    </div>
  </div>
</div>
<div id="candidatejs" style="display: none;"><?php echo base_url()?></div>
<script type="text/javascript" src="<?php echo base_url()?>public/js/candidate.js"></script>
<script type="text/javascript">
  $('#btn_updateIntro').click(function(event) {
    <?php if (empty($document)){ ?>
      if ($('#my-file-selector1').get(0).files.length == 0) {
        alert('Bạn phải chọn file CV trước khi cập nhật thông tin');
      }else{
        $('#form_updateIntro').submit();
      }
    <?php }else{ ?>
      $('#form_updateIntro').submit();
    <?php } ?>
  });
</script>
