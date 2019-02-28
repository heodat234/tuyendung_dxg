<div class="content-wrapper">
    <section class="content">
	  <div class="row">
		<section class="col-lg-12 connectedSortable padding-lr0">
		    <div style="background-color: #ecf0f5; min-height: 932px">
					<div class="rowedit3">
						<?php if(count($dataEmail) >0)
						{
						 foreach ($dataEmail as $email) {
						 		?>
						<div class="col-md-4">
							<div class="panel panel-default" style="height: 170px">
							  	<button type="button" class="btn-icon-top"><i class="fa fa-list color-gray"></i></button>
							  <div class="panel-body height-170">
							    <a href="<?php echo base_url().'admin/email/detail/'.$email['mailprofileid'] ?>"><p class="title-news"><?php echo $email['profilename'] ?></p></a>
							    <p class="body-blac2">Trạng thái: Đang sử dụng</p>
							    <p class="body-blac3"><i class="fa fa-envelope-o" aria-hidden="true" style="font-size: 15px"></i> <a href="#"><?php 
								    if($email['profiletype'] == 0)
								    {
								    	echo "Nghiệp vụ";
								    }
								    else
								    {
								    	echo "Hệ thống";
								    }
							     ?></a></p>
							    <p class="body-blac3" ><?php echo substr($email['presubject'], 0,120) ?></p>
							    <p class="body-blac3">Ngày tạo: <?php echo convertDate($email['createddate']) ?> - Bởi: <?php echo $email['createdby'] ?></p>
							  </div>
							</div>
						</div>
						<?php }} ?>
					</div>
			</div>
			<a href="<?php echo base_url() ?>admin/email/detail/0" class="b-blue" id="myBtn" title="Go to top"><i class="fa fa-plus"></i></a>
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