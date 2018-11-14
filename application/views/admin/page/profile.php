<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<section class="col-lg-5 col-md-5 col-xs-5 connectedSortable" >
				<?php echo isset($nav)? $nav : ""; ?>  	
			</section>
			<section class="col-lg-7 col-md-7 col-xs-7 connectedSortable" style=" padding-left: 0px; padding-right: 0px">
				<iframe src="<?php echo base_url()?>admin/handling/hosochitiet/<?php echo isset($id)? $id : ""; ?>" id="idf_profile" 
					style="height: 102vh;width: 100%;
				border: none"></iframe>
			</section>
		</div>
	</section>
</div>