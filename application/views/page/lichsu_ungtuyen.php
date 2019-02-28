<h3 class="color-blue">Lịch sử ứng tuyển</h3>
<table   class="table table-striped table-bordered" > 
  <thead> 
      <tr class="fontstyle"> 
        <th id="th" width="10%">STT</th> 
        <th id="th" width="40%">Vị trí tuyển dụng</th> 
        <th id="th" width="18%">Ngày hết hạn</th> 
        <th id="th" width="18%">Ngày nộp HS</th>
        <th id="th" width="14%">Trạng thái</th>
      </tr> 
    </thead> 
    <tbody> 
      <?php $i =1; foreach ($history as $key){ ?>
        <tr class="text-cemter fontstyle">
          <td><?php echo $i ?></td>
          <td><a href="<?php echo base_url()?>handling/lichsu_detail/<?php echo $key['campaignid'] ?>"><?php echo $key['position'] ?></td>
          <td><?php echo date_format(date_create($key['expdate']),"d/m/Y") ?></td>
          <td><?php echo date_format(date_create($key['createddate']),"d/m/Y") ?></td>
          <td>Đã nộp HS</td>
        </tr>
      <?php $i++; } ?>
  </tbody> 
</table>