<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tuyển dụng Admin | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="shortcut icon"  href="<?php echo base_url()?>public/image/favicon.ico"/>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php base_url() ?>public/admin/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php base_url() ?>public/admin/css/font-awesome.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php base_url() ?>public/admin/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php base_url() ?>public/admin/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php base_url() ?>public/admin/css/blue.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Admin</b>DXG
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form  method="post" id="form-login">
      <div class="alert alert-danger hide" id="err-login"></div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $this->input->cookie('email_admin',true); ?>" >
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $this->input->cookie('password_admin',true); ?>" >
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox ">
            <label>
              <input type="checkbox" name="luumatkhau" value="1"  <?php echo isset($_COOKIE['email_admin'])? "checked" : "";?>> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="button" class="btn btn-primary btn-block btn-flat" id="btn_login">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    
    <!-- /.social-auth-links -->

    <!-- <a href="#">I forgot my password</a><br> -->
    <!-- <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php base_url() ?>public/admin/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php base_url() ?>public/admin/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php base_url() ?>public/admin/js/icheck.min.js"></script>
<script>
  $(document).keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        $("#btn_login").trigger('click'); 
    }

  });
  // $(function () {
  //   $('input').iCheck({
  //     checkboxClass: 'icheckbox_square-blue',
  //     radioClass: 'iradio_square-blue',
  //     increaseArea: '20%' /* optional */
  //   });
  // });
  $('#btn_login').click(function(event) {
    $.ajax({
      url:'<?php echo base_url() ?>admin/login/loginUser',
      type: 'POST',
      dataType: 'json',
      data: $('form#form-login').serialize(),
    })
    .done(function(data) {
      if (data != '1') {
        $('#err-login').addClass('hide');  
        window.location.href = '<?php echo base_url() ?>hosoadmin';      
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
</script>
</body>
</html>
