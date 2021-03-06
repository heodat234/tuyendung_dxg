<div class="block-jobDetail">
    <h1 class="title-pg"><?php echo isset($recruite[0]['position'])? $recruite[0]['position']: '' ?></h1>
    <div class="full">
        <div class="justify">
            <div class="row">
                <div class="col-lg-12">
                    <?php echo isset($recruite[0]['body'])? $recruite[0]['body']: '' ?>
                </div>
            </div>
            <div class="Wrap-job-position">
                <div class="apply_bg">
                    <?php if($this->session->has_userdata('user')) { ?>
                        <a onclick="applyCampaign('<?php echo isset($recruite[0]['position'])? $recruite[0]['position']: '' ?>',<?php echo isset($recruite[0]['campaignid'])? $recruite[0]['campaignid']: '' ?>,<?php echo $this->session->userdata('user')['candidateid'] ?>)">Nộp hồ sơ</a>
                    <?php }else{ ?>
                        <a onclick="notApplyCampaign()">Nộp hồ sơ</a>
                    <?php  } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModalch1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog width-30" role="document">
    <div class="modal-content">
      <form id="form_apply">
        <input type="hidden" name="campaignid" id="campaignid">
        <input type="hidden" name="candidateid" id="candidateid">
        <h3 class="title-modal margin-bot-15">Nộp hồ sơ</h3>
            <div class="form-group row padding-left-right-20 " >
            <label for="staticEmail" class="col-sm-4 col-form-label">Vi trí nộp</label>
            <div class="col-sm-8">
                <label id="position_cam"></label>
            </div>
          </div>
          <div class="form-group row padding-left-right-20  margin-bot-2" >
            <label for="staticEmail" class="col-sm-4 col-form-label fontstyle">Thời điểm có thể bắt đầu làm việc</label>
            <div class="col-sm-8">

              <input class="form-control" type="text"  id="ngaybd" name="availabledate">
            </div>
          </div>
          <label class="radio-inline padding-left-right-20 fontstyle margin-bot-15 margin-left-20">
                <input type="radio" name="check_btn" id="inlineRadio1" value="option1" > Tôi đồng ý các cam kết DXG đề ra
            </label>
            <label class="padding-left-right-20 justify fontstyle format-text" >
               1.   &nbsp;  &nbsp;   Trả lời của tôi cho những câu hỏi phỏng vấn của công ty và các thông tin do tôi cung cấp là hoàn toàn chính xác. </label>
              <label class="padding-left-right-20 justify fontstyle format-text" >
               2.   &nbsp;  &nbsp;   Công ty có thể kiểm tra trình độ kiến thức của tôi, tôi cho phép tất cả các cá nhân tổ chức, bao gồm: Trường học và các công ty tôi đã làm qua cung cấp các thông tin liên quan đến tôi nếu cái thông tin này cần thiết để công ty xem xét tuyển dụng tôi.</label>
               <label class="padding-left-right-20 justify fontstyle format-text">
               3.   &nbsp;  &nbsp;   Trong bảng khai thông tin, nếu tôi cung cấp thông tin sai lệch, Công ty có thể từ chối tuyển dụng hoặc sa thải tôi nếu tôi đã được nhận vào công ty làm việc.
               </label>

           <button id="btn_apply" type="button" class="btn them-modal" disabled> OK</button>
         </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('#ngaybd').datetimepicker({
        timepicker:false,
        format:'d/m/Y',
      });

  $(document).ready(function(){
    $('#inlineRadio1').click(function(){

    if( $('#inlineRadio1').is(":checked") == true)
      $('#btn_apply').prop('disabled',false);
    else
      $('#btn_apply').prop('disabled',true);
  });

  });
  function applyCampaign(position,campaignid,candidateid) {
    $('#position_cam').text(position);
    $('#campaignid').val(campaignid);
    $('#candidateid').val(candidateid);
    $('#myModalch1').modal('show');

  }
  function notApplyCampaign() {
      alert('Bạn chưa đăng nhập tài khoản. Vui lòng đăng nhập để nộp hồ sơ ứng tuyển.');
  }
  $('#btn_apply').click(function(event) {
    $.ajax({
      url: '<?php echo base_url() ?>handling/applyCampaign',
      type: 'POST',
      dataType: 'json',
      data: $('#form_apply').serialize(),
    })
    .done(function(data) {
      $('#myModalch1').modal('hide');
      alert('Bạn đã nộp hồ sơ vào vị trí này thành công.');
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  });
</script>