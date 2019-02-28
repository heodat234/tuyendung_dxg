<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      	<li class="active"><a href="#cam_active" data-toggle="tab" id="tab_cam_1" aria-expanded="true">Hoạt động</a></li>
        <?php   $class = 'hide';
         if ($ql_tong != '') {
          foreach ($ql_tong as $key) { 
            if($this->session->userdata('user_admin')['operatorid'] == $key['operatorid']){
              $class = '';
            }
          }
        }
        ?>
      	<li class="<?php echo $class ?>" ><a href="#cam_info" data-toggle="tab" id="tab_cam_2" aria-expanded="false">Thông tin</a></li>
    </ul>
    <div class="tab-content">
      	<div class="tab-pane active webkit-box text-center" id="cam_active">
          <?php
            $width = 100/count($round_main);
            $width .='%';
            $k = 1;
             foreach ($round_main as $row1): 
              if ($row1['roundtype'] == 'Profile' || $row1['roundtype'] == 'Filter') {
                $color = 'count_hs';
              }elseif ($row1['roundtype'] == 'Offer') {
                $color = 'count_dn';
              }elseif ($row1['roundtype'] == 'Recruite') {
                $color = 'count_td';
              }else{
                $color = 'count_pv';
              }
              $class='adisabled';
              foreach ($roundlist as $key => $value) {
                 if($value['roundid']==$row1['roundid'])$class='';
              }
              if ($k == 1) {
          ?>
            <div class="col-pc-12 <?php echo $row1['roundid'] ?>" style="width: <?php echo $width ?>">
              <a class="<?php echo($class)?>" href="<?php echo base_url() ?>admin/campaign/round_1_1/<?php echo $row1['roundid'] ?>/<?php echo $campaignid ?>">
                <span class="info-box-number <?php echo $color ?>"><?php echo $row1['count_round'] ?></span>
                <span class="info-box-text"><?php echo $row1['roundname'] ?></span>
              </a>
            </div>
          <?php }else{ ?>
            <div class="col-pc-12 <?php echo $row1['roundid'] ?>" style="width: <?php echo $width ?>">
              <a class="<?php echo($class)?>" href="<?php echo base_url() ?>admin/campaign/round_1_2/<?php echo $row1['roundid'] ?>/<?php echo $campaignid ?>">
                <span class="info-box-number <?php echo $color ?>"><?php echo $row1['count_round'] ?></span>
                <span class="info-box-text"><?php echo $row1['roundname'] ?></span>
              </a>
            </div>
          <?php } $k++; endforeach ?>
        </div>  
        <ul class="users-list clearfix dash-box" id="list_manage">
            <li>
                 <h5>Phụ trách vòng</h5>
              </li>
              <?php if ($ql_tong != '') {
               foreach ($ql_tong as $key) { ?>
                <li>
                  <img src="<?php echo base_url() ?>public/image/bbye.jpg" alt="User Image" title="<?php echo $key['operatorname'] ?>">
                </li>
              <?php }} ?>
              <li style="margin-top: 5px;"> - </li>
              <?php if ($manager != '') {
               foreach ($manager as $key) { ?>
                <li>
                  <img src="<?php echo base_url() ?>public/image/bbye.jpg" alt="User Image" title="<?php echo $key['operatorname'] ?>">
                </li>
              <?php }} ?>
              <li>
                <h5>Thời hạn vòng &nbsp; <?php echo date_format(date_create($duedate),"d/m/Y") ?></h5>
              </li>
          </ul>
          <?php echo isset($campaign_info)? $campaign_info : '' ?>
          
    </div>
</div></div>
<style type="text/css">
  .adisabled{
    color: pink;
    cursor: no-drop;
  }
</style>
<script type="text/javascript">
  var bien = '<?php echo $bien ?>';
  $('.'+bien).addClass('round_active');
  $('a.adisabled').click(function(e){
    e.preventDefault();
  });
  
</script>
