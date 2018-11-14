<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tuyển dụng Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/_all-skins.min.css">
  <!-- Morris chart -->
 <!--  <link rel="stylesheet" href="bower_components/morris.js/morris.css"> -->
  <!-- jvectormap -->
 <!--  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css"> -->
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/bootstrap-multiselect.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/custom.css">
  
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/bootstrap-multiselect.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/mycss.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/mycss2.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/profile.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/custom.css">
  
  <script src="<?php echo base_url()?>public/admin/js/jquery.min.js"></script>
  <script src="<?php echo base_url()?>public/admin/js/bootstrap-multiselect.js"></script>
<!-- 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php echo isset($header)? $header: ""; ?>
    <!-- Left side column. contains the logo and sidebar -->
    
  	<!-- sidebar: style can be found in sidebar.less -->

  	<?php echo isset($menu)? $menu: "";?>

  	<!-- Content Wrapper. Contains page content -->

 	<?php echo isset($main)? $main: "" ;?>     
  
  	<!-- /.content-wrapper -->
    
    <?php echo isset($footer)? $footer : "";?>
   
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->

  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url()?>public/admin/js/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url()?>public/admin/js/bootstrap.min.js"></script>

  <!-- <script src="bower_components/moment/min/moment.min.js"></script> -->
  <script src="<?php echo base_url()?>public/admin/js/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="<?php echo base_url()?>public/admin/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="<?php echo base_url()?>public/admin/js/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="<?php echo base_url()?>public/admin/js/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <!-- <script src="bower_components/fastclick/lib/fastclick.js"></script> -->
  <!-- AdminLTE App -->
  <script src="<?php echo base_url()?>public/admin/js/adminlte.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?php echo base_url()?>public/admin/js/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url()?>public/admin/js/demo.js"></script>

  </body>
</html>