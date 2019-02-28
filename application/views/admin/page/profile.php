<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<section class="col-lg-5 col-md-5 col-xs-5 connectedSortable" >
				<?php echo isset($nav)? $nav : ""; ?>  	
			</section>
			<section class="col-lg-7 col-md-7 col-xs-7 connectedSortable" style=" padding-left: 0px; padding-right: 0px">
				<iframe src="<?php echo base_url()?>admin/handling/hosochitiet/<?php echo isset($id)? $id : ""; ?>/<?php echo $tabActive ?>#tab<?php echo $tabActive ?>" id="idf_profile" 
					style="height: 102vh;width: 100%;
				border: none"></iframe>
			</section>
		</div>
	</section>
</div>

<div class="modal fade" id="myModal11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-30" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url()?>admin/handling/ins_upd_relationship" method="post">
      <h3 class="title-modal margin-bot-15">Thêm người thân</h3>
           
          <input type="hidden" name="checkup" id="checkup" value="0">
          <input type="hidden" name="candidate_main" id="candidate_main_relationship" value="0">
          <input type="hidden" name="candidate_sub" id="candidate_sub_relationship" value="0">
            <div class="form-group row padding-left-right-20 margin-bot-15" >
            <label for="staticEmail"  class="col-sm-4 col-form-label fontstyle">Họ và tên</label>
            <div class="col-sm-8">
           
              <input class="form-control fontstyle width100" type="text"  placeholder="" name="hoten" id="hoten11">
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
           
              <input class="form-control width100 fontstyle" type="text"  placeholder="" name="nghenghiep" id="nn11">
              
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
      <form action="<?php echo base_url()?>admin/handling/ins_upd_experience" method="post">
      <h3 class="title-modal margin-bot-15">Thêm quá trình công tác</h3>
            <input type="hidden" name="checkup" id="checkup2" value="0">
            <input type="hidden" name="candidate_main" id="candidate_main_experience" value="0">
          	<input type="hidden" name="candidate_sub" id="candidate_sub_experience" value="0">
          <div class="form-group row padding-left-right-20 margin-bot-2" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Từ đến</label>
            <div class="col-sm-8">
              <div class="form-group row">
                <div class="col-sm-6">
                <input class="form-control fontstyle" type="text" id="tuden5" placeholder="" name="tu" ></div>
                <div class="col-sm-6">
                <input class="form-control fontstyle" type="text" id="tuden6" placeholder="" name="den" ></div>
              </div>
            </div>
          </div>
            <div class="form-group row padding-left-right-20 margin-bot-12" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Tên công ty</label>
            <div class="col-sm-8">
           
              <input class="form-control fontstyle" type="text"  placeholder="" name="tencty" id="cty2" >
            </div>
          </div>
           <div class="form-group row padding-left-right-20 margin-bot-15" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Địa chỉ</label>
            <div class="col-sm-8">
           
              <textarea class="form-control off-resize fontstyle" rows="2" name="diachi" id="dc2" ></textarea>
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-15" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Số điện thoại</label>
            <div class="col-sm-8">
           
              <input class="form-control fontstyle" type="text"  maxlength="12" name="sdt" id="sdt2" >
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-12" >
            <label for="staticEmail" class="col-sm-4 padding-right2 fontstyle">Chức vụ khi nghỉ</label>
            <div class="col-sm-8">
           
              <input class="form-control fontstyle" type="text"  placeholder="" name="chucvukhinghi" id="chucvu2">
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-12" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle"> Nhiệm vụ/ Trách nhiệm </label>
            <div class="col-sm-8">
              <textarea class="form-control off-resize fontstyle" rows="2" name="nhiemvu" id="nhiemvu2" ></textarea>
              <!-- <input class="form-control fontstyle" type="text"  placeholder="" name="nhiemvu" id="nhiemvu2"> -->
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-12" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Lý do nghỉ</label>
            <div class="col-sm-8">
              <textarea class="form-control off-resize fontstyle" rows="2" name="lydonghi" id="lydonghi2" ></textarea>
              <!-- <input class="form-control fontstyle" type="text"  placeholder="" name="lydonghi" id="lydonghi2"> -->
              
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
      <form action="<?php echo base_url()?>admin/handling/ins_upd_reference" method="post">
      <h3 class="title-modal margin-bot-15">Thêm người tham khảo</h3>
           <input type="hidden" name="candidate_main" id="candidate_main_reference" value="0">
          	<input type="hidden" name="candidate_sub" id="candidate_sub_reference" value="0">
          <input type="hidden" name="checkup" id="checkup3" value="0">
            <div class="form-group row padding-left-right-20" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Họ và tên</label>
            <div class="col-sm-8">
           
              <input class="form-control fontstyle" type="text"  placeholder="" name="hoten" id="hoten3" >
            </div>
          </div>
           <div class="form-group row padding-left-right-20" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Chức vụ</label>
            <div class="col-sm-8">
           
              <input class="form-control fontstyle" type="text"  placeholder="" name="chucvu" id="chucvu3" >
            </div>
          </div>
          <div class="form-group row padding-left-right-20" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Công ty</label>
            <div class="col-sm-8">
           
              <input class="form-control fontstyle" type="text"  placeholder="" name="congty" id="congty3" >
            </div>
          </div>
          <div class="form-group row padding-left-right-20" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Liên hệ</label>
            <div class="col-sm-8">
           
              <input class="form-control fontstyle" type="text"  placeholder="" name="lienhe" id="lienhe3" >
              
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
      <form action="<?php echo base_url()?>admin/handling/ins_upd_knowledge" method="post">
      <h3 class="title-modal margin-bot-15">Thêm trình độ học vấn</h3>
           <input type="hidden" name="checkup" id="checkup4" value="0">
           <input type="hidden" name="candidate_main" id="candidate_main_knowledge" value="0">
          	<input type="hidden" name="candidate_sub" id="candidate_sub_knowledge" value="0">
          <div class="form-group row padding-left-right-20 margin-bot-2" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Từ đến</label>
            <div class="col-sm-8">
              <div class="form-group row">
                <div class="col-sm-6">
                <input class="form-control fontstyle" type="text" id="tuden1" placeholder="" name="tu" ></div>
                <div class="col-sm-6">
                <input class="form-control fontstyle" type="text" id="tuden2" placeholder="" name="den" ></div>
              </div>
            </div>
          </div>
            <div class="form-group row padding-left-right-20" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Tên trường</label>
            <div class="col-sm-6">
           
              <input class="form-control fontstyle" type="text"  placeholder="" name="tentruong" id="truong4" >
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
      <form action="<?php echo base_url()?>admin/handling/ins_upd_knowledge_v2" method="post">
      <h3 class="title-modal margin-bot-15">Thêm khóa huấn luyện/ đào tạo</h3>
           <input type="hidden" name="checkup" id="checkup5" value="0">
          <div class="form-group row padding-left-right-20 margin-bot-2" >
          	<input type="hidden" name="candidate_main" id="candidate_main_knowledge2" value="0">
          	<input type="hidden" name="candidate_sub" id="candidate_sub_knowledge2" value="0">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Từ đến</label>
            <div class="col-sm-8">
              <div class="form-group row">
                <div class="col-sm-6">
                <input class="form-control fontstyle" type="text" id="tuden3" placeholder="" name="tu" ></div>
                <div class="col-sm-6">
                <input class="form-control fontstyle" type="text" id="tuden4" placeholder="" name="den" ></div>
              </div>
            </div>
          </div>
            <div class="form-group row padding-left-right-20 margin-bot-2">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Tên cơ sở đào tạo</label>
            <div class="col-sm-6">
           
              <input class="form-control fontstyle" type="text"  placeholder="" name="cs_daotao" id="truong5" >
            </div>
          </div>
          <div class="form-group row padding-left-right-20 margin-bot-2">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Thời gian học</label>
            <div class="col-sm-8">
              <div class="form-group row">
                <div class="col-sm-6">
                <input class="form-control fontstyle " type="text"  placeholder="" name="tghoc" id="tghoc5" value="0"></div>
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
      <form action="<?php echo base_url()?>admin/handling/ins_upd_language" method="post">
      <h3 class="title-modal margin-bot-15">Thêm ngoại ngữ</h3>
           <input type="hidden" name="checkup" id="checkup6" value="0">
          <input type="hidden" name="candidate_main" id="candidate_main_language" value="0">
          	<input type="hidden" name="candidate_sub" id="candidate_sub_language" value="0"> 
          <div class="form-group row padding-left-right-20 margin-bot-12">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Ngoại ngữ</label>
            <div class="col-sm-8">
           
              <input class="form-control fontstyle" type="text"  placeholder="" name="tentruong" id="truong6" >
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
      <form action="<?php echo base_url()?>admin/handling/ins_upd_software" method="post">
      <h3 class="title-modal margin-bot-15">Thêm trình độ tin học</h3>
           <input type="hidden" name="checkup" id="checkup7" value="0">
           <input type="hidden" name="candidate_main" id="candidate_main_software" value="0">
          	<input type="hidden" name="candidate_sub" id="candidate_sub_software" value="0">
          <div class="form-group row padding-left-right-20">
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Kiến thức/ Phần mềm</label>
            <div class="col-sm-8">
           
              <textarea class="form-control off-resize fontstyle" rows="2" name="phanmem" id="pm7" ></textarea>
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

<div class="modal fade" id="myModaldel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-30" role="document">
    <div class="modal-content">
      <form action="<?php echo base_url()?>admin/handling/del_relationship2" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="checkup" id="checkup1d" value="0">
       <input type="hidden" name="candidate_main" id="candidate_main_del_relationship" value="0">
        <input type="hidden" name="candidate_sub" id="candidate_sub_del_relationship" value="0">    
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
      <form action="<?php echo base_url()?>admin/handling/del_experience2" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="checkup" id="checkup2d" value="0"> 
      <input type="hidden" name="candidate_main" id="candidate_main_del_experience" value="0">
        <input type="hidden" name="candidate_sub" id="candidate_sub_del_experience" value="0">      
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
      <form action="<?php echo base_url()?>admin/handling/del_reference2" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="checkup" id="checkup3d" value="0">
      <input type="hidden" name="candidate_main" id="candidate_main_del_reference" value="0">
      <input type="hidden" name="candidate_sub" id="candidate_sub_del_reference" value="0">     
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
      <form action="<?php echo base_url()?>admin/handling/del_knowledge2" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="checkup" id="checkup4d" value="0">
       <input type="hidden" name="candidate_main" id="candidate_main_del_knowledge" value="0">
      <input type="hidden" name="candidate_sub" id="candidate_sub_del_knowledge" value="0">       
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
      <form action="<?php echo base_url()?>admin/handling/del_language2" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="checkup" id="checkup6d" value="0">
       <input type="hidden" name="candidate_main" id="candidate_main_del_language" value="0">
      <input type="hidden" name="candidate_sub" id="candidate_sub_del_language" value="0">      
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
      <form action="<?php echo base_url()?>admin/handling/del_software2" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="checkup" id="checkup7d" value="0">
      <input type="hidden" name="candidate_main" id="candidate_main_del_software" value="0">
      <input type="hidden" name="candidate_sub" id="candidate_sub_del_software" value="0">      
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

<script type="text/javascript">
	$(document).ready(function()
	{
		$('#tuden1').datetimepicker({
			timepicker:false,
			format:'d-m-Y'
		});
		$('#tuden2').datetimepicker({
		  timepicker:false,
		   format:'d-m-Y'
		});
		$('#tuden3').datetimepicker({
		  timepicker:false,
		   format:'d-m-Y'
		});
		$('#tuden4').datetimepicker({
		  timepicker:false,
		   format:'d-m-Y'
		});
		$('#tuden5').datetimepicker({
		  timepicker:false,
		   format:'d-m-Y'
		});
		$('#tuden6').datetimepicker({
		  timepicker:false,
		   format:'d-m-Y'
		});
	});

  
  $(document).on('click', '.so', function(e) {
    if ($(this).val() == '') {
              $(this).val(0);
        }
    // $(this).number( true );
    }).on('keypress', '.so',function(e){
        // if ($(this).val() == '')
        //   $(this).val(0);
        // $(this).number( true );
        if(!$.isNumeric(String.fromCharCode(e.which))) e.preventDefault();
    }).on('paste', '.so', function(e){    
        var cb = e.originalEvent.clipboardData || window.clipboardData;      
        if(!$.isNumeric(cb.getData('text'))) e.preventDefault();
    });
    
    $("input[id='tghoc5']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
</script>