<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<section class="col-lg-3 lg-3-edt connectedSortable" >
				<?php echo isset($nav)? $nav : ''; ?>
				<!-- <iframe src="<?php echo base_url()?>admin/news/menu_news" id="menu_news" name="menu_news" style="min-height: 790px;width: 100%;border: none"></iframe> -->
			</section>
			<section class="col-lg-9 lg-9-edt connectedSortable padding-lr0">
				<iframe src="<?php echo base_url()?>admin/news/form_news/<?php echo isset($id)? $id : ""; ?>" id="idf_news"  name="idf_news"
					style="min-height: 750px;width: 100%;border: none"></iframe>
			</section>	
		</div>
	</section>
</div>
<style type="text/css">
	
</style>