<?php 
if($this->session->has_userdata('user_admin')) {
?>
<link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/font-awesome.css">
<link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/ionicons.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/daterangepicker.css">
<link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/mycss.css">
<link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/profile.css">
<link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/bootstrap-multiselect.css">
<link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/app.css">
  <link rel="stylesheet" href="<?php echo base_url()?>public/admin/css/bootstrap-tagsinput.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo base_url()?>public/admin/js/bootstrap-multiselect.js"></script>
 
<script src="<?php echo base_url()?>public/admin/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url()?>public/admin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>public/admin/js/moment.min.js"></script>
<script src="<?php echo base_url()?>public/admin/js/daterangepicker.js"></script>
<script src="<?php echo base_url()?>public/admin/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/datetimepicker-master/jquery.datetimepicker.css"/ >
 <script src="<?php echo base_url()?>public/datetimepicker-master/build/jquery.datetimepicker.full.min.js"></script>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="<?php echo base_url()?>public/admin/js/bootstrap-tagsinput.js"></script>
  <script src="<?php echo base_url()?>public/admin/js/typeahead.js"></script>
  <script src="<?php echo base_url()?>public/admin/js/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="<?php echo base_url()?>public/admin/js/jquery-jvectormap-world-mill-en.js"></script>
  <script src="<?php echo base_url()?>public/admin/js/morris.js"></script>
      <?php echo isset($temp)? $temp: "" ;?>
<?php 
}else{redirect(base_url('login.html'));}
?>