<div class="content-wrapper">
    <section class="content">
	  <div class="row">
		<section class="col-lg-12 connectedSortable padding-lr0">
		    <div style="background-color: #ecf0f5; min-height: 932px">
					<div class="rowedit3">
						<?php foreach ($process as $key): ?>
							<div class="col-md-4">
								<div class="panel panel-default">
								  	<a href="<?php echo base_url() ?>admin/recruitprocess/detail/<?php echo $key['flowpresetid'] ?>" class="btn-icon-top a-center"><i class="fa fa-list color-gray"></i></a>
								  <div class="panel-body height-140">
								    <a href="<?php echo base_url() ?>admin/recruitprocess/detail/<?php echo $key['flowpresetid'] ?>"><p class="title-news"><?php echo $key['flowpresetname'] ?></p></a>
								    <p class="body-blac2">Ngày tạo: <?php echo date_format(date_create($key['createddate']),"d/m/Y").' - Bởi '.$key['name'] ?></p>
								    <p class="body-blac3">Cấu trúc: <?php echo $key['countRound'] ?> vòng
	Gồm các loại hình: <?php echo $key['round'] ?></p>
								  </div>
								</div>
							</div>
						<?php endforeach ?>
					</div>
					<!-- <div class="dash-horizontal"></div>

					<div class="row rowedit pad-t5" >
						
					</div>  -->
			</div>
			<a href="<?php echo base_url() ?>admin/RecruitProcess/detail/0" class="b-blue" id="myBtn" title="Go to top"><i class="fa fa-plus"></i></a>
		</section>	
	  </div>
    </section>
</div>