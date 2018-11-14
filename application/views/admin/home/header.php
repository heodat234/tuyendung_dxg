 <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo" style="background-color: #5FA2DD">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="<?php echo base_url()?>public/image/logoheader.png" class="sizelogo-header margin-l12"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="<?php echo base_url()?>public/image/logoheader.png" class="sizelogo-header"> &nbsp;DXG Recruiter</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color: #fff">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle btn-sidebar" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu" >
        <ul class="nav navbar-nav">
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle h40" data-toggle="dropdown">
              <i class="fa fa-bell-o" style="color: gray"></i>
              <span class="label label-warning" id="label_qty"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header" id="header_qty"></li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu" id="menu_notifi">
                  
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle h40" data-toggle="dropdown">
              <i class="fa fa-envelope-o" style="color: gray"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url()?>public/image/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url()?>public/image/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url()?>public/image/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url()?>public/image/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url()?>public/image/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle h40" data-toggle="dropdown">
              <i class="fa fa-calendar" style="color: gray"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 8px; padding-bottom: 7px">
              <img src="<?php echo base_url()?>public/image/2.jpg" width="25" height="25" alt="User Image" style="">
             <!--  <span class="hidden-xs">Alexander Pierce</span> -->
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url()?>public/image/2.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('user_admin')['operatorname'] ?> - Admin
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
              </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url() ?>admin/login/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         <!--  <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  <style type="text/css">
    .notifi{
      white-space: normal !important;      
    }
    .span_noti{
      font-size: 15px;
      font-weight: 400;
    }
    .p_noti{
      opacity: .5;
    }
    .color-forward {
      color: #A0BA82;
    }
    .color-flag-dis{
      color: #E15B6C;
    }
    .color-sign-in{
      color: #5FA2DD;
    }
  </style>
  <script type="text/javascript">
    function loadNotifi(){
        $.ajax({
          url: '<?php echo base_url() ?>admin/campaign/loadNotifi',
          type: 'POST',
          dataType: 'json',
          data: {},
        })
        .done(function(data) {
          $('#menu_notifi').empty();
          var count = data['count'];
          $('#label_qty').text(count);
          $('#header_qty').text('Bạn có '+count+' thông báo');
          var data = data['history'];
          for(var i in data){
            var fa = type = '';
            var check = 0;
            var name = '<b>'+data[i]['name']+'</b>';
            var operatorname = '<b>'+data[i]['operatorname']+'</b>';
            if (data[i]['actiontype'] == 'Transfer'){
              fa = '<i class="fa fa-forward color-forward star-icon1"></i>';
              type = ' '+data[i]['actionnote']+' - Vị trí: '+data[i]['position'];
              check = 1;
            }
            else if (data[i]['actiontype'] == 'Discard'){
              fa = '<i class="fa fa-flag color-flag-dis star-icon1"></i>';
              type = ' '+data[i]['actionnote']+' - Vị trí: '+data[i]['position'];
              check = 1;
            }
            else if (data[i]['actiontype'] == 'Apply'){
              fa = '<i class="fa fa-sign-in color-sign-in star-icon1"></i>';
              type = ' Ứng tuyển - Vị trí: '+data[i]['position'];
              check = 1;
            }
            var row = '';
            if(check == 1){
              row += '<li>';
              row += '<a href="#" class="notifi">';
              row += '<span class="span_noti">'+fa+' Hồ sơ '+name+type+'</span>';    
              row +=  '<p class="p_noti">'+data[i]['date']+' bởi '+operatorname+'</p></a></li>';  
              $('#menu_notifi').append(row);
            }
          }
        })
        .fail(function() {
          console.log("error");
        });
        
    }
    loadNotifi();
    setInterval(function(){
        loadNotifi(); // this will run after every 5 seconds
    }, 5000);
  </script>