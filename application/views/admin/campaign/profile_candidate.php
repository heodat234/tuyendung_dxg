
<div >
	<section class="">
		<div class="row">
			<section class="col-lg-5 col-md-5 connectedSortable" style="width: 37% !important">
				<?php echo isset($nav)? $nav : ""; ?>  	
			</section>
			<section class="col-lg-7 col-md-7 connectedSortable" style="width: 63% !important; padding-left: 0px; padding-right: 0px">
				<iframe src="<?php echo base_url()?>admin/campaign/hosochitiet/<?php echo isset($id)? $id : ""; ?>/<?php echo isset($campaignid)? $campaignid : ""; ?>/<?php echo isset($roundid)? $roundid : ""; ?>" id="idf_profile"></iframe>
			</section>
		</div>
	</section>
</div>

<style type="text/css">
	.modal_body_chuyen {
		overflow: auto;
	}
	.candidate_chuyen{
		text-align: center;
	}
	.img_chuyen{
		width: 50px;
	}
	.body_chuyen{
		background: #f6f6f6;
		overflow: auto;
		border-bottom: 1px solid #ddd;
	}
	.select_chuyen{
		width: 80%;
		height: 28px;
	}
	.body_chuyen_1{
		padding: 20px;
	}
 	.label_chon{
		font-weight: 300;
	}
	.body_chuyen_2{
		padding: 10px 15px;
		border-top: 1px solid #ddd;
	}
	.share_chuyen{
		float: left;
		font-weight: 300;
	}
</style>