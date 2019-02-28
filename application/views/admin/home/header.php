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
              <span class="label label-success" id="label_envelope">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header" id="count_envelope">You have 0 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu" id="menu_envelope">
                  
                </ul>
              </li>
              <!-- <li class="footer"><a href="#">See All Messages</a></li> -->
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a data-toggle="modal" href="#modalCalendar" class="dropdown-toggle h40">
              <i class="fa fa-calendar" style="color: gray"></i>
              <span class="label label-danger" id="count_calendar">0</span>
            </a>
            
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
              <li class="user-footer col-md-12">
                <div class="pull-left col-md-4 no-padding">
                  <a href="#" onclick="showUserProfileModal('<?php echo($this->session->userdata('user_admin')['operatorid'])?>')" class="btn btn-default btn-flat">T.Khoản</a> 
                  
                </div>
                <div class="pull-left col-md-4 no-padding">
                  <a href="#" onclick="showUserPasswordModal('<?php echo($this->session->userdata('user_admin')['operatorid'])?>')" class="btn btn-default btn-flat">Đổi MK</a> 
                </div>
                <div class="pull-right col-md-4 no-padding">
                  <a href="<?php echo base_url() ?>admin/login/logout" class="btn btn-default btn-flat">Logout</a>
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
  <div class="modal fade" id="modalCalendar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " style="width: 80%;">
      <div class="modal-content ">
          <div class="modal-header modal_header_cam">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Calendar</h4>
          </div>
            <div class=" modal_body_chuyen">
              <div id="calendar_full">
              </div>
            </div>
            <div class="modal-footer modal_footer_cam">
              <button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Đóng</button>
            </div>
      </div>
    </div>
  </div>

  <!-- mail composer -->
<div class="modal fade" id="modalMailView1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " style="width: 50%">
    <div class="modal-content " >
        <div class="modal-header modal_header_cam">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Email</h4>
        </div>
        <div class=" modal_body_chuyen">
          <div id="check_mail1">
            <div class="col-xs-12 body_chuyen_1">
              <div class="col-md-1">
                <img src="<?php echo base_url() ?>/public/image/bbye.jpg" style=" width: 200%;margin-left: -10px;}">
              </div>
              <div class="col-md-8">
                <div class="address_from" id="idMailFrom_1">
                  Nguuyen Huy hoang
                </div>
                <div class="" style="margin-top: 5px">
                  <div class="col-xs-1 guide-black cc" style="margin-top: 3px">
                    To:
                  </div>
                  <div class="col-xs-11" style="color: #5FA2DD;" id="idMailTo_1"></div>
                </div>
                <div class="" style="margin-top: 5px">
                  <div class="col-xs-1 guide-black cc" style="margin-top: 3px">
                    Cc:
                  </div>
                  <div class="col-xs-11" style="color: #5FA2DD;" id="idMailCc_1"></div>
                </div> 
              </div>
              <div class="col-md-3 ">
                <div class="mail_date" id="idMailDate_1">
                  
                </div>
                <div class="pull-right">
                  <button class="rectangle-3"><i class="fa fa-reply-all color_btn_mail"></i></button><button class="rectangle-3"><i class="fa fa-reply color_btn_mail"></i></button><button class="rectangle-3"><i class="fa fa-arrow-right color_btn_mail"></i></button>
                </div>
              </div>
              <div class="col-md-12 body-bl-b" id="idMailSubject_1"></div>
            </div>
            <div class="col-xs-12 body_chuyen_2">
              <div class="" id="idMailBody_1">
                  
              </div>
              <div class="rowedit2">
              </div>
            </div>
          </div>
        </div>
        <!-- <div class=" modal_body_chuyen" style="border-top: 3px solid #F2F2F2">
          <div id="check_mail1">
            <div class="col-xs-12 body_chuyen_1">
              <div class="col-md-1">
                <img src="<?php echo base_url() ?>/public/image/bbye.jpg" style=" width: 150%">
              </div>
              <div class="col-md-9">
                <div class="address_from">
                  Nguuyen Huy hoang
                </div>
                <div class="" style="margin-top: 5px">
                  <div class="col-xs-1 guide-black cc" style="margin-top: 3px">
                    To:
                  </div>
                  <div class="col-xs-11" style="color: #5FA2DD;">sadfsdf</div>
                </div>
                <div class="" style="margin-top: 5px">
                  <div class="col-xs-1 guide-black cc" style="margin-top: 3px">
                    Cc:
                  </div>
                  <div class="col-xs-11" style="color: #5FA2DD;">gdghdfh</div>
                </div> 
              </div>
              <div class="col-md-2 ">
                <div class="mail_date">
                  fsdfsdf
                </div>
                <div class="pull-right">
                  <button class="rectangle-3"><i class="fa fa-reply-all color_btn_mail"></i></button><button class="rectangle-3"><i class="fa fa-reply color_btn_mail"></i></button><button class="rectangle-3"><i class="fa fa-arrow-right color_btn_mail"></i></button>
                </div>
              </div>
              <div class="col-md-12 body-bl-b">Re-Thư Thông báo chi tiết công việc - Vị trí: Chuyên viên tuyển dụng đào tạo - Dat Xanh Group</div>
            </div>
            <div class="col-xs-12 body_chuyen_2">
              <div class="rowedit2">
                  sdfdsgsdg
              </div>
              <div class="rowedit2">
              </div>
            </div>
          </div>
        </div> -->
        <div class="modal-footer modal_footer_cam">
          <button type="button" class="btn btn_thoat btn_thoat1" data-dismiss="modal">Đóng</button>
        </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#calendar_full').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      
        eventSources: [
            {
                borderColor    : '#5FA2DD',
                color: '#5FA2DD',   
                textColor: '#fff',
                 events: function(start, end, timezone, callback) {
                     $.ajax({
                       url: '<?php echo base_url() ?>admin/calendar/get_calendar',
                       dataType: 'json',
                       data: {
                       // our hypothetical feed requires UNIX timestamps
                       start: start.unix(),
                       end: end.unix()
                       },
                       success: function(doc) {
                          $('#count_calendar').text(doc.length);
                           var events = [];
                           for (var i = 0; i < doc.length; i++) {
                              // console.log(doc[i]);
                              events.push({
                                title: doc[i]['title'],
                                description: doc[i]['description'],
                                start: doc[i]['start'] // will be parsed
                              });
                            }
                           callback(events);
                       }
                     });
                },
            }
        ],
        editable  : true,
        eventRender: function(event, element) { 
            element.find('.fc-title').append("<br/>" + event.description); 
        } 
    });
});
</script>
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
    .address_from{
    font-weight: 700;
    color: #5FA2DD;
    font-size: 16px;
    line-height: 18px;
  }
  .mail_date{
    text-align: right;
    color: #ADB3B8;
  }
  .rectangle-3 {
    background-color: #F6F6F6;
    border: 1px solid #E4E4E4;
    width: 32px;
    height: 32px;
  }
  .color_btn_mail{
    color: #ADB3B8;
  }
  .body-bl-b {
    color: #000000;
    font-size: 15px;
    font-weight: 700;
    line-height: 17px;
    text-align: left;
    margin-top: 15px;
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
    }, 20000);


    function loadEnvelope(){
        $.ajax({
          url: '<?php echo base_url() ?>admin/email/get_mail',
          type: 'POST',
          dataType: 'json',
          data: {},
        })
        .done(function(data) {
          $('#menu_envelope').empty();
          var count = data['count'];
          $('#label_envelope').text(count);
          $('#count_envelope').text('Bạn có '+count+' email');
          var data = data['email'];
          for(var i in data){
            var fa = type = '';
            var check = 0;
            var name = '<b>'+data[i]['operatorname']+'</b>';
              fa = '<i class="fa fa-envelope-o color-forward star-icon1"></i>';
              type = ' gửi E-mail: '+data[i]['emailsubject'];
            
            var row = '';
              row += '<li>';
              row += '<a href="#" onclick="showMailView('+data[i]['mailid']+')" class="notifi" style="color: #000;">';
              row += '<span class="span_noti">'+fa+' '+name+type+'</span>';    
              row +=  '<p class="p_noti">'+data[i]['date']+'</p></a></li>';  
              $('#menu_envelope').append(row);
          }
        })
        .fail(function() {
          console.log("error");
        });
        
    }
    // loadEnvelope();
    setInterval(function(){
        loadEnvelope(); // this will run after every 5 seconds
    }, 3600000);

    function showMailView(mailid) {
      $('#idMailBody_1').empty();
      $.ajax({
        url: '<?php echo base_url() ?>admin/email/get_mail_byId',
        type: 'POST',
        dataType: 'json',
        data: {mailid: mailid},
      })
      .done(function(data) {
        $('#idMailFrom_1').text(data[0]['operatorname']);
        $('#idMailTo_1').text(data[0]['toemail']);
        $('#idMailCc_1').text(data[0]['cc']);
        $('#idMailDate_1').text(data[0]['date']);
        $('#idMailSubject_1').text(data[0]['emailsubject']);
        $('#idMailBody_1').append(data[0]['emailbody']);
        $('#modalMailView1').modal('show');
      })
      .fail(function() {
        console.log("error");
      });
      
    }
  </script>