
  

      var base = $('#base').text();
        $('#myModal1a').on('show.bs.modal', function (event) {
            $('#myModal').modal('toggle');
        });
        $('#myModal1c').on('show.bs.modal', function (event) {
            $('#myModal').modal('toggle');
        });
        $('#ngaysinh').datetimepicker({
           timepicker:false,
           format:'d-m-Y',
           defaultDate:'+1960/01/01',
           maxDate:'+1960/01/01'
        });
        
        $('#btn_login').click(function(event) {
          $.ajax({
            url: base+'login/loginUser',
            type: 'POST',
            dataType: 'json',
            data: $('form#form-login').serialize(),
          })
          .done(function(data) {
            if (data != '1') {
              $('#err-login').addClass('hide');
              // console.log(data[0]['email']);
              $('#myModal').modal('hide');
              $('#name_tb').text(data[0]['operatorname']);
              $('#myModal20').modal('show');
              $('.long').html('<label class="dangnhap1"><i class="fa fa-user fa-lg orange" ></i> '+data[0]['operatorname']+'&nbsp|&nbsp <a data-toggle="modal" data-target="#myModalchangepass">Cài đặt</a>&nbsp |&nbsp <a href="'+base+'login/logout">Thoát</a></label>');
              $('#hoso1').removeClass('hide');
              $('#lichsu1').removeClass('hide');
            }else{
              $('#err-login').text('Sai email hoặc mật khẩu. Vui lòng nhập lại!').removeClass('hide');
            }
            
            // console.log(data);
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });
          
        });
        $("#sign-in").validate({
            rules: {
              email: {
                required: true,
                email: true
              },
              cmnd: 'required',
              pass: {
                required: true,
                minlength: 5
              },
              repass:{
                required: true,
                minlength: 5,
                equalTo: "#pass"
              },
              firstname: 'required',
              lastname: 'required',
              
            },
            messages: {
              email: {
                required: 'Vui lòng nhập vào địa chỉ email!',
                email: 'Vui lòng nhập vào địa chỉ email!'
              },
              cmnd: 'Vui lòng nhập vào CMND!', 
              pass: {
                required: 'Vui lòng nhập mật khẩu!',
                minlength: 'Nhập ít nhất 5 kí tự!'
              },
              repass: {
                required: 'Vui lòng nhập mật khẩu!',
                minlength: 'Nhập ít nhất 5 kí tự!',
                equalTo: 'Nhập lại mật khẩu không chính xác!'
              },
              firstname: 'Vui lòng nhập tên!',
              lastname: 'Vui lòng nhập Họ và tên đệm',

            },
            submitHandler: function(f) {
				// $(document).ajaxStart(function() {
				//           $('.fade.in').css('opacity','0');
				//           $("#loading").show();
				//       });
            $.ajax({
              url: base+'login/insertUser',
              type: 'POST',
              dataType: 'json',
              data: $('form#sign-in').serialize(),
            })
            .done(function(data) {
              // console.log(data);
             if (data != '-1' && data != '-2') {
              $('#err-sign-in').addClass('hide');
              // console.log(data[0]['email']);
              $('#myModal1a').modal('hide');
              $('#myModal').modal('hide');
              $('#name_tb').text(data['operatorname']);
              $('#myModal20').modal('show');
              $('.long').html('<label class="dangnhap1"><i class="fa fa-user fa-lg orange" ></i> '+data['operatorname']+'&nbsp|&nbsp <a href="#">Cài đặt</a>&nbsp |&nbsp <a href="<?php echo base_url()?>login/logout">Thoát</a></label>');
              $('#hoso1').removeClass('hide');
              $('#lichsu1').removeClass('hide');
             }
             else
             {
                if(data == '-1'){
                  $('#err-sign-in').text('Email đã tồn tại. Vui lòng nhập lại!').removeClass('hide');
                }
                else {
                  $('#err-sign-in').text('Chứng minh nhân dân đã tồn tại. Vui lòng nhập lại!').removeClass('hide');
                }
              }
           
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });
      //         $(document).ajaxStop(function() {
      //    // $('.fade.in').css('opacity','1');
      //     $("#loading").hide();
      // });
          }
        });


      $("#forgot_pass").validate({
            rules: {
              email: {
                required: true,
                email: true
              },
            },
            messages: {
              email: {
                required: 'Vui lòng nhập vào địa chỉ email!',
                email: 'Vui lòng nhập vào địa chỉ email!'
              },
            },
            submitHandler: function(f) {
            $.ajax({
              url: base+'login/forgotPassword',
              type: 'POST',
              dataType: 'json',
              data: $('form#forgot_pass').serialize(),
            })
            .done(function(data) {
             if (data == '1' ) {
              $('#err-forgot').removeClass('hide');
              $('#err-forgot').text('Vui lòng kiểm tra mail để nhận lại mật khẩu mới.');
             }
              else if(data == '-1' )
             {
              $('#err-forgot').removeClass('hide');
              $('#err-forgot').text('Email này chưa được đăng ký!.');
             }
           
          })
          .fail(function() {
            console.log("error");
          });
          }
        });

      $("#changepass").validate({
            rules: {
              passold: 'required',
              passnew:
              {
                required : true,
                minlength : 5,
              },
              repassnew:
              {
                required : true,
                minlength : 5,
                equalTo: "#passnew",
              }
            },
            messages: {
              passold : 'Vui lòng nhập mật khẩu cũ!',
              passnew :
              {
                required : 'Vui lòng nhập mật khẩu mới!',
                minlength : 'Mật khẩu nhập ít nhất 5 kí tự!',
              },
              repassnew :
              {
                required : 'Vui lòng nhập mật khẩu mới!',
                minlength : 'Mật khẩu nhập ít nhất 5 kí tự!',
                equalTo : 'Nhập lại mật khẩu không đúng!',
              }
            },
            submitHandler: function(f) {
            $.ajax({
              url: base+'login/change_pass',
              type: 'POST',
              dataType: 'json',
              data: $('form#changepass').serialize(),
            })
            .done(function(data) {
          
             if (data == '1' ) {
              $('#err-change').removeClass('hide');
              $('#err-change').text('Mật khẩu cũ không chính xác!.');
             }   
             else
             {
             
               
              $('#err-change').addClass('hide');
              $('#myModalchangepass').modal('hide');
              alert("Đổi mật khẩu thành công!");
             }  
          })
          .fail(function() {
            console.log("error");
          });
          }
        });
      $(document).ready(function() {
          $("input[name='cmnd']").on('input', function (e) {
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
          });
      });
      $('#form-login').keypress(function (e) {
          if(e.keyCode=='13') 
          $('#btn_login').click();
      });
      $('#sign-in').keypress(function (e) {
          if(e.keyCode=='13') 
          $('#btn_sign_in').click();
      });