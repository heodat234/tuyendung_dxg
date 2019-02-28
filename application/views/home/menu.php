
	
 <?php $d = 0;
         if($candidate['introduction'] != "" || count($tags) > 0) $d++;
         if($candidate['firstname'] !== "") $d++;
         if($address == true) $d++;
         if($family == true) $d++;
         if($experience == true || $reference == true) $d++; 
         if($knowledge == true) $d++;
         if($language == true || $software == true) $d++;
      ?>
<div class="Module Module-167">
	<div class="ModuleContent">
		<nav class="block-leftMenu menuPage mrb30">
			<ul class="nav navbar-nav long2">
				<li class="<?php echo isset($chinhsach)? $chinhsach:'' ?>"><a href="<?php echo base_url()?>index.html" target="_self"><i class="fa fa-angle-right"></i> Chính sách nhân sự</a></li>
				<li class="<?php echo isset($cohoi)? $cohoi:'' ?>"><a href="<?php echo base_url()?>cohoi_nghe_nghiep.html" target="_self"><i class="fa fa-angle-right"></i> Cơ hội nghề nghiệp</a></li>
				<li><a href="#" target="_self"><i class="fa fa-angle-right"></i> Qui định hồ sơ ứng tuyển</a></li>
				<li class="<?php echo isset($hoso)? $hoso:'' ?> hide" id="hoso1"><a href="<?php echo base_url()?>hoso_canhan.html" target="_self"><i class="fa fa-angle-right"></i> Hồ sơ cá nhân (<?php echo $d?>/7)</a></li>
				<li class="<?php echo isset($ls)? $ls:'' ?> hide" id="lichsu1"><a href="<?php echo base_url()?>lichsu_apply.html" target="_self"><i class="fa fa-angle-right"></i> Lịch sử ứng tuyển</a></li>
				
			</ul>
		</nav>
	</div>
</div>
	<div class="block-formLink" style="z-index: 999;"><div class="Module Module-171"><div class="ModuleContent"><p class="nemu"><strong>HƯỚNG DẪN NỘP HỒ SƠ</strong></p>
		<p>Ứng viên tải Biểu mẫu đăng kí <a href="/Data/Sites/1/media/tuyen-dung/p.ns-qt01-bm004-bang-du-lieu-ung-vien.doc">&gt;&gt; tại đây &lt;&lt;,</a>&nbsp;điền đầy đủ thông tin, gởi về địa chỉ email:&nbsp;<a href="mailto:tuyendung@datxanh.com.vn"><span>tuyendung@datxanh.com.vn</span></a></p>
		<p>Mọi thắc mắc Liên hệ trực tiếp Bộ phận Tuyển dụng: <br>
		ĐT: 028. 6252 5252 (Ext: 5015)</p>
	</div>
</div>
</div>
<div>
</div>
<?php if($this->session->has_userdata('user'))
{ ?>
 <script type="text/javascript">
 	 $('#hoso1').removeClass('hide');
      $('#lichsu1').removeClass('hide');
 </script>
<?php 
} ?>
	
