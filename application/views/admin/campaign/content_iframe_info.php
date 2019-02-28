<div class="tab-pane text-center" id="cam_info">
    <div class="box-body no-padding dash-box">
    	<a href="<?php echo base_url().'admin/campaign/campaign_info_1/'.$campaignid ?>" target="iframe_info" onclick="activeBox(1)" >
		    <div class="col-md-3 box_body" id="box_con_1">
		        <div class="info-box-title"><i class="fa fa-suitcase"></i> Thông tin công việc</div>
		        <span class="info-box-text_1">Mô tả về các yêu cầu công việc, trách nhiệm, mục tiêu, quyền hạn, môi trường làm việc</span>
		    </div>
		</a>
		<a href="<?php echo base_url().'admin/campaign/campaign_info_2/'.$campaignid ?>" target="iframe_info" onclick="activeBox(2)">
      		<div class="col-md-3 box_body box_2" id="box_con_2">
        		<div class="info-box-title"><i class="fa fa-suitcase"></i> Phạm vi tìm kiếm</div>
        		<span class="info-box-text_1">Thiết lập sẵn các phạm vi tìm kiếm giúp giới hạn số lượng hồ sơ phù hợp</span>
      		</div>
      	</a>
      	<a href="<?php echo base_url().'admin/campaign/campaign_info_3/'.$campaignid ?>" target="iframe_info" onclick="activeBox(3)">
      		<div class="col-md-3 box_body box_2" id="box_con_3">
        		<div class="info-box-title"><i class="fa fa-list-ol"></i> Quy trình tuyển dụng</div>
        		<span class="info-box-text_1">Thiết lập quy trình cho các vòng Sơ loại, Tiếp cận, Phỏng vấn, Đề nghị và Tuyển dụng</span>
      		</div>
      	</a>
      	<a href="<?php echo base_url().'admin/campaign/campaign_info_4/'.$campaignid ?>" target="iframe_info" onclick="activeBox(4)">
  			<div class="col-md-3 box_body box_2" id="box_con_4">
        		<div class="info-box-title"><i class="fa fa-credit-card"></i> Cơ hội nghề nghiệp</div>
        		<span class="info-box-text_1">Đưa chiến dịch tuyển dụng lên trang chủ (Web portal) của tập đoàn</span>
      		</div>
      	</a>
    </div>
    <div style="margin-top: 15px; min-height: 800px">
      	<div class="tab-pane text-center" id="cam_info_1">
      		<iframe class="iframe_abc" src="<?php echo base_url().'admin/campaign/campaign_info_1/'.$campaignid ?>" name="iframe_info" width="100%"></iframe>
      	</div>
    </div>
</div>
<script type="text/javascript">
	function activeBox(id) {
		$('#box_con_'+id).removeClass('box_2');
		for(var i =1; i <= 4; i++){
			if (i != id) {
				$('#box_con_'+i).addClass('col-md-3 box_body box_2');
			}
		}
	}
</script>