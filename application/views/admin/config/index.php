<div class="content-wrapper">
    <section class="content">
    	<div class="row">
       		<div class="col-md-12">
	        	<div class="box box-default">
		            <div class="box-header" id="box_header_1">
		              <!-- <h5 class="box-title"></h5> -->
		              	<?php $active2 = 'active in';?>
			              <p><label class="title_box_user"><?php echo $title ?></label><i class="fa fa-cog"></i><label class="title_chil"><?php echo $title_con ?></label><label class="title_time"></label></p>
		              <div class="box-tools pull-right">
		                <button type="button" class="btn btn-default"><i class="fa fa-list color-gray"></i></button>
		              </div>
		            </div>
			            <div class="panel-group" id="accordion">
						  	<div class="panel panel-default border-rad0">
						    	<div class="panel-heading rad-pad0 b-blue"> 
						       		<ul class="nav nav-tabs ul-nav">
								        <li class="<?php echo isset($active2)?$active2 : '' ?>"><a data-toggle="tab" href="#list_user" class="nemu-info-pf">Mail</a></li>

								        <li class="<?php echo isset($active1)?$active1 : '' ?>"><a data-toggle="tab" href="#config_group" class="nemu-info-pf" >Mẫu đề nghị</a></li>
								        <!-- <li class="<?php echo isset($active3)?$active3 : '' ?>"><a data-toggle="tab" href="#content_group" class="nemu-info-pf" >Nội dung</a></li> -->
								    </ul>
						    	</div>
							    <div id="collapse1" class="panel-collapse collapse in">
							      	<div class="panel-body">
							      		<div class="tab-content">
							      			<!-- Tab1 -->
								      		<div id="list_user" class="tab-pane <?php echo isset($active2)?$active2 : '' ?>">
								      			<form method="post" action="<?php echo base_url().'admin/config/updateMailSystem';?>" >
										            <div class="panel-group" id="accordion">
													  	<div class="panel panel-default border-rad0">
														    <div id="collapse1" class="panel-collapse collapse in">
														      	<div class="panel-body">
														      		<div class="width100 row rowedit h-auto padding_bot_15">
															            <label for="text" class="width20 col-xs-3 label-profile">Email hệ thống:</label>
															            <div class="col-xs-4 padding-lr0">
																			<input class="kttext" required="" type="text" id="" placeholder="" name="mcuser" value="<?php echo isset($mailSystem[0]['mcuser']) ?$mailSystem[0]['mcuser']:'' ?>" style="width: 100%">
															            </div>
															        </div>
															        <!-- <?php echo $mailSystem[0]['status'] ?> -->
															        <div class="width100 row rowedit h-auto padding_bot_15">
															            <label for="text" class="width20 col-xs-3 label-profile">Mật khẩu:</label>
															            <div class="col-xs-4 padding-lr0">
																			<input class="kttext" required="" type="password" id="" placeholder="" name="mcpass" value="*****" style="width: 100%">
															            </div>
															        </div>
															        <div class="width100 row rowedit h-auto padding_bot_15">
															            <label for="text" class="width20 col-xs-3 label-profile">Địa chỉ SMTP:</label>
															            <div class="col-xs-4 padding-lr0">
																			<input class="kttext" required="" type="text" id="" placeholder="" name="mcsmtp" value="<?php echo isset($mailSystem[0]['mcsmtp']) ?$mailSystem[0]['mcsmtp']:'' ?>" style="width: 100%">
															            </div>
															        </div>
															        <div class="width100 row rowedit h-auto padding_bot_15">
															            <label for="text" class="width20 col-xs-3 label-profile">Port:</label>
															            <div class="col-xs-4 padding-lr0">
																			<input class="kttext" required="" type="text" id="" placeholder="" name="mcport" value="<?php echo isset($mailSystem[0]['mcport']) ?$mailSystem[0]['mcport']:'' ?>" style="width: 100%">
															            </div>
															        </div>
															        <?php if(isset($mailSystem[0]['mcssl']) && $mailSystem[0]['mcssl'] == 1){
															        	$checked ='checked';
															        }else{ $checked = ''; } ?> 
															        <div class="width100 row rowedit h-auto padding_bot_15">
															            <label for="text" class="width20 col-xs-3 label-profile">Cho phép SSL:</label>
															            <div class="col-xs-4 padding-lr0">
																			<input class="kttext" type="checkbox" name="mcssl" value="1" style="width: 100%" <?php echo $checked ?> >
															            </div>
															        </div>
														    	</div>
														   	</div>
													  	</div>
													</div>
													<div class="box_btn">
														<div class="pull-right">
															<button type="submit" id="saveRound" class="btn btn_tt">Lưu</button>
														</div>
													</div>
												</form>
								       		</div>
								       		<!-- Tab2 -->
								       		<div id="config_group" class="tab-pane <?php echo isset($active1)?$active1 : '' ?>">
								       			<div class="row">
													<div style="background-color: #ecf0f5; min-height: 932px">
														<div class="rowedit3">
															<!-- <?php foreach ($process as $key): ?>
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
															<?php endforeach ?> -->
														</div>
														
												</div>
												<a href="<?php echo base_url() ?>admin/RecruitProcess/detail/0" class="b-blue" id="myBtn" title="Go to top"><i class="fa fa-plus"></i></a>
								      		</div>
								       		<!-- Tab 3 -->

								       	</div>
							    	</div>
							   	</div>
						  	</div>
						</div>
	            <!-- /.box-body -->
	          	</div>
	        </div>
    	</div>
    </section>
</div>

<style type="text/css">
	.btn_tk{
		background: #f6f6f6;
		border: 1px solid #ddd;
	}
	.fa-lock{
		color: #F8A762;
	}
	.input_hs_cam{
		width: 60px;
		margin-bottom: 10px;
	}
	.input_hs_cam_70{
		margin-bottom: 7px;
	}
	.btn_thoat{
	  background: #FAC18F;
	  width: 130px;
	  color: #fff;
	}
	.btn_tt{
	  background: #5FA2DD;
	  margin-right: 20px;
	  color: #fff;
	}
</style>
<script type="text/javascript">
	$(document).ready(function() {

	});
</script>
        </div>
    </div>
</div>


<style type="text/css">
#myBtn {
		width:75px;
		height:75px;
	    position: fixed; /* Fixed/sticky position */
	    bottom: 20px; /* Place the button at the bottom of the page */
	    right: 30px; /* Place the button 30px from the right */
	    z-index: 99; /* Make sure it does not overlap */
	    border: none; /* Remove borders */
	    outline: none; /* Remove outline */
	    color: white; /* Text color */
	    cursor: pointer; /* Add a mouse pointer on hover */
	    padding: 19px; /* Some padding */
	    border-radius: 50%; /* Rounded corners */
	    font-size: 30px; /* Increase font size */
	    padding-left: 25px;
	}
	.title_box_user{
		font-size: 20px;
		margin-right: 10px;
	}
	.fa_users{
		opacity: .5;
		margin-right: 10px;
	}
	.title_chil{
		color: #3c8dbc;
		font-weight: 300;
		margin-right: 10px;
	}
	.title_time{
		font-weight: 400;
	}
	.height_600{
		height: 600px;
	}
	.padding_bot_15{
		padding-bottom: 15px;
	}
	.check_quyen{
		font-weight: 400;
	}
	.div-title{
		height: 40px;
		line-height: 40px;
	}
	.suggest-field{
		color: #5fade0;
		background: #f8f9fc;
		padding: 3px;
		margin: 5px;
		display: inline-block;
		cursor: pointer;
	}
</style>