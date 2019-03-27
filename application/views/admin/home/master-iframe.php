<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tuyển dụng Admin</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon"  href="<?php echo base_url()?>public/image/favicon.ico"/>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/font-awesome.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/_all-skins.min.css">
  <!-- jvectormap -->
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/bootstrap-multiselect.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/mycss.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/mycss2.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/profile.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/custom.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/bootstrap-tagsinput.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/admin/css/campaign_css.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/admin/css/hung_css.css">

  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/bootstrap-multiselect.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="<?php echo base_url()?>public/admin/js/bootstrap-multiselect.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/datetimepicker-master/jquery.datetimepicker.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="<?php echo base_url() ?>public/datetimepicker-master/build/jquery.datetimepicker.full.min.js"></script>
    <script src="<?php echo base_url()?>public/admin/js/bootstrap-tagsinput.js"></script>
    <script src="<?php echo base_url()?>public/admin/js/typeahead.js"></script>
    
    <script src="<?php echo base_url()?>public/admin/js/jquery.number.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>public/admin/js/print.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>public/admin/js/printPreview.js"></script>
</head>
<body>

      <?php echo isset($temp)? $temp: "" ;?>

<script src="<?php echo base_url()?>public/admin/js/jquery-ui.min.js"></script>
  <script src="<?php echo base_url()?>public/admin/js/bootstrap-multiselect.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="<?php echo base_url()?>public/admin/js/moment.min.js"></script>
<script src="<?php echo base_url()?>public/admin/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>public/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url()?>public/admin/js/daterangepicker.js"></script>
<script src="<?php echo base_url()?>public/admin/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url()?>public/admin/js/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?php echo base_url()?>public/admin/js/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url()?>public/admin/js/adminlte.min.js"></script>
<script src="<?php echo base_url()?>public/admin/js/demo.js"></script>
<script src="<?php echo base_url()?>public/admin/js/countdown.js"></script>
<script src="<?php echo base_url()?>public/admin/js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url()?>public/admin/js/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo base_url()?>public/admin/js/jquery.sparkline.js"></script>
<!-- <script src="<?php echo base_url()?>public/admin/js/morris.js"></script> -->

<?php echo isset($script)? $script: ""; ?>
<?php echo isset($modal_campaign)? $modal_campaign: ""; ?>
</body>
</html>