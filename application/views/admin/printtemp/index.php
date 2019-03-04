<div class="content-wrapper">
    <section class="content">
	  <div class="row">
		<section class="col-lg-12 connectedSortable padding-lr0">
		    <div style="background-color: #ecf0f5; min-height: 932px">
					<div class="rowedit3">
						<?php if(count($templates) >0)
						{
						 foreach ($templates as $row) {
						 	if($row['temptype'] == 0)
						    {
						    	$type = "Đề nghị";
						    }
						    else
						    {
						    	$type = "Hệ thống";
						    }
						?>
						<div class="col-md-4">
							<div class="panel panel-default" style="height: 170px">
							  	<button type="button" class="btn-icon-top"><i class="fa fa-list color-gray"></i></button>
							  <div class="panel-body height-170">
							    <a href="<?php echo base_url().'admin/printtemp/detail/'.$row['tempid'] ?>"><p class="title-news"><?php echo $row['tempname'] ?></p></a>
							    <p class="body-blac2">Loại: <?php echo $type ?></p>
							    <p class="body-blac3"><i class="fa fa-info-circle" aria-hidden="true" style="font-size: 15px"></i> <a href="#"><?php 
								    echo ($row['status'] == 'W') ? 'Đang hoạt động' : 'Hết thời hạn';
							     ?></a></p>
							    <p class="body-blac3" ><?php echo substr($row['subject'], 0,120) ?></p>
							    <p class="body-blac3">Ngày tạo: <?php echo convertDate($row['createddate']) ?> - Bởi: <?php echo $row['operatorname'] ?></p>
							  </div>
							</div>
						</div>
						<?php }} ?>
					</div>
			</div>
			<a href="<?php echo base_url() ?>admin/printtemp/detail/0" class="b-blue" id="myBtn" title="Tạo phiếu in mới"><i class="fa fa-plus"></i></a>
		</section>	
	  </div>
    </section>
</div>
<?php
	function convertDate($value)
	{
		$date=date_create($value);
		echo date_format($date,"d/m/Y");
	}
?>