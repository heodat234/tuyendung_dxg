<?php 
if($this->session->has_userdata('user_admin')) {
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tuyển dụng Admin</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/bootstrap-multiselect.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/mycss.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/mycss2.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/profile.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/custom.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/hung_css.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/admin/css/campaign_css.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/bootstrap-multiselect.css">
  <script src="<?php echo base_url()?>public/admin/js/jquery.min.js"></script>
  <script src="<?php echo base_url()?>public/admin/js/bootstrap-multiselect.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/datetimepicker-master/jquery.datetimepicker.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php echo isset($header)? $header: ""; ?>
    <?php echo isset($menu)? $menu: "";?>
    <?php echo isset($temp)? $temp: "" ;?>
    <?php echo isset($footer)? $footer : "";?>
    <div class="control-sidebar-bg"></div>
  </div>
  <script src="<?php echo base_url()?>public/admin/js/jquery-ui.min.js"></script>
  <script src="<?php echo base_url()?>public/admin/js/bootstrap-multiselect.js"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <script src="<?php echo base_url()?>public/admin/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>public/ckeditor/ckeditor.js"></script>
  <script src="<?php echo base_url()?>public/admin/js/moment.min.js"></script>
  <script src="<?php echo base_url()?>public/admin/js/daterangepicker.js"></script>
  <script src="<?php echo base_url()?>public/admin/js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo base_url()?>public/admin/js/bootstrap3-wysihtml5.all.min.js"></script>
  <script src="<?php echo base_url()?>public/admin/js/jquery.slimscroll.min.js"></script>
  <script src="<?php echo base_url()?>public/admin/js/adminlte.min.js"></script>
  <!-- <script src="<?php echo base_url()?>public/admin/js/dashboard.js"></script> -->
  <script src="<?php echo base_url() ?>public/datetimepicker-master/build/jquery.datetimepicker.full.min.js"></script>
  <script src="<?php echo base_url()?>public/admin/js/demo.js"></script>

  <?php echo isset($script)? $script: ""; ?>
</body>
</html>
<?php 
}else{redirect(base_url('login.html'));}
?>