<aside class="main-sidebar">
 <section class="sidebar">
     
   
      <ul class="sidebar-menu" data-widget="tree">
      <!--   <li class="header">MAIN NAVIGATION</li> -->
        <li >
          <a href="#">
            <i class="fa fa-desktop"></i> <span>Dashboard</span>
            <!-- <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>
         <!--  <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul> -->
        </li>
        <li class="<?php echo isset($hoso)? $hoso : '' ?>">
          <a href="<?php echo base_url()?>admin/handling/index">
            <i class="fa fa-book"></i>
            <span>Hồ sơ ứng viên</span>
          </a>
         
        </li>
        <li class="treeview <?php echo isset($tuyendung)? $tuyendung : '' ?>">
          <a href="#">
            <i class="fa fa-file-text-o"></i> <span>Quản lý tuyển dụng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            <!-- <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span> -->
          </a>
          <ul class="treeview-menu" style="padding-left: 20px">
            <li class="<?php echo isset($tintuc)? $tintuc : '' ?>"><a href="<?php echo base_url()?>admin/news/index"><i class="fa fa-file-text"></i> Tin tức tuyển dụng</a></li>
            <li class="<?php echo isset($campaign)? $campaign : '' ?>"><a href="<?php echo base_url()?>admin/Campaign/main"><i class="fa fa-flag"></i> Chiến dịch tuyển dụng</a></li>
            <li class="<?php echo isset($recruitprocess)? $recruitprocess : '' ?>"><a href="<?php echo base_url()?>admin/recruitprocess/"><i class="fa fa-comments"></i> Quy trình phỏng vấn</a></li>
            <li class="<?php echo isset($multiplechoice)? $multiplechoice : '' ?>"><a href="<?php echo base_url()?>admin/multiplechoice"><i class="fa fa-pencil-square-o"></i> Trắc nghiệm/ Đánh giá</a></li>
          </ul> 
        </li>
        <li class="treeview <?php echo isset($system)? $system : '' ?>">
          <a href="#">
            <i class="fa fa-cog"></i>
            <span>Hệ thống</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo isset($user)? $user : '' ?>"><a href="<?php echo base_url()?>admin/user"><i class="fa fa-users"></i> Tài khoản người dùng</a></li>
            <li class="<?php echo isset($email)? $email : '' ?>"><a href="<?php echo base_url()?>admin/email"><i class="fa fa-file-text-o"></i> Mẫu e-mail</a></li>
            <li class="<?php echo isset($config)? $config : '' ?>"><a href="<?php echo base_url()?>admin/recruitprocess/"><i class="fa fa-cogs"></i> Cấu hình chung</a></li>
            <li class="<?php echo isset($import)? $import : '' ?>"><a href="<?php echo base_url()?>admin/import/"><i class="fa fa-cogs"></i> Import data</a></li>
          </ul>
        </li>
       
      </ul>
    </section>
      </aside>