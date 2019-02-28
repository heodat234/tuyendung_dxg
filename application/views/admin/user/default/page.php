<div class="content-wrapper">
    <section class="content">
	  <div class="row">
		<section class="col-lg-12 connectedSortable padding-lr0">
		    <div class="main_user" >
				<div class="rowedit3">
					<?php if(isset($records)&&!empty($records))foreach ($records as $key => $value) {?>
					<div class="col-md-4">
						<div class="panel panel-default">
						  	<button type="button" class="btn-icon-top"><i class="fa fa-list color-gray"></i></button>
							<div class="panel_box_user height-145">
								<a href="<?php echo base_url('admin/user/detail/'.$value['groupid'])?>">
								    <p class="title_user"><?php echo($value['groupname'])?></p>
								    <p class="body_user">Số lượng: <?php echo($value['counter'])?> - Đang trực tuyến: 0</p>
								</a>
							    <p class="body_user_1">
							    	<i class="fa fa-info-circle font_size_15" aria-hidden="true"></i> 
							    	<a href="#">
							    		<?php 
							    			if ($value['status']=='W') {
							    				echo "Đang hoạt động";
							    			}elseif ($value=='C') {
							    				echo "Đóng";
							    			}else{
							    				echo "Không xác định";
							    			}
							    		?>   		
							    	</a>
							    </p>
							    <p class="body_user_1">Tài khoản, Mẫu E-mail, Cấu hình chung,... +1</p>
							    <p class="body_user_1">Yêu cầu khôi phục mật khẩu : 0</p>
							</div>
						</div>
					</div>
					<?php }?>
				</div>
			</div>
			<a href="<?php echo base_url() ?>admin/user/create" class="b-blue" id="myBtn" title="Go to top"><i class="fa fa-plus"></i></a>
		</section>	
	  </div>
    </section>
</div>
<style type="text/css">
	
</style>