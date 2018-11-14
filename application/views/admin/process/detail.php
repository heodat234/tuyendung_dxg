<div class="content-wrapper" style="min-height: 892px;">

    <!-- Main content -->
    <section class="content">
   
      <div class="row">
        <div class="col-md-12">
        	<div class="box box-default">
	            <div class="box-header">
	              <!-- <i class="fa fa-warning"></i> -->
	              <h3 class="head-black"><?php echo $title ?></h3>
	              <h5 class="guide-black"> Tạo bởi: <?php echo $createdby ?> - <?php echo $createdday ?></h5>
	              <div class="box-tools pull-right">
	                <button type="button" class="btn btn-default"><i class="fa fa-align-left"></i></button>
	                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Công khai
	                    <span class="caret"></span>
	                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
	                    <li><a href="#">Action</a></li>
	                    <li><a href="#">Another action</a></li>
	                    <li><a href="#">Something else here</a></li>
	                    <li class="divider"></li>
	                    <li><a href="#">Separated link</a></li>
	                  </ul>
	              </div>
	            </div>
	            <!-- /.box-header -->
	            <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Previous"><i class="fa fa-chevron-left"></i><a href="<?php echo base_url() ?>admin/recruitprocess/"> Quay lại</a></a>
	            <div class="box-body no-padding dash-box">

	            	<div class="nav-tabs-custom">
			             <p class="body-blac3 paddingleft-20 marginbot-0">Xem trước quy trình:</p>
			            <div class="tab-content">
			              	<div class="tab-pane active webkit-box text-center" id="tab_1">
			                	<div class=" col-pc-12" >
						                <span class="info-box-number count_hs">V1</span>
						                <span class="info-box-text">HỒ SƠ</span>
						            </div>
						            <div class=" col-pc-12" id="box_round_2">
						                <span class="info-box-number count_hs">V2</span>
						                <span class="info-box-text">SƠ LOẠI</span>
						            </div>
						            <div class=" col-pc-12" id="box_round_3">
						                <span class="info-box-number count_pv">V3</span>
						                <span class="info-box-text">TIẾP CẬN</span>
						            </div>
						            <div class=" col-pc-12" id="box_round_4">
						              	<span class="info-box-number count_pv">V4</span>
						                <span class="info-box-text">BÀI TEST</span>
						              </div>
						            <div class=" col-pc-12" id="box_round_5">
						                <span class="info-box-number count_pv">V5</span>
						                <span class="info-box-text">PHỎNG VẤN V1</span>
						            </div>
						            <div class=" col-pc-12" id="box_round_6">
						                <span class="info-box-number count_pv">V6</span>
						                <span class="info-box-text">PHỎNG VẤN 2</span>
						            </div>
						            <div class=" col-pc-12" id="box_round_7">
						              	<span class="info-box-number count_dn">V7</span>
						                <span class="info-box-text">ĐỀ NGHỊ</span>
						            </div>
						            <div class=" col-pc-12" id="box_round_8">
						              	<span class="info-box-number count_td">V8</span>
						                <span class="info-box-text">TUYỂN DỤNG</span>
						            </div>
					            </div>
			              	</div>
			              	<p class="body-blac2 paddingleft-10">Điều chỉnh Quy trình:</p>
			              	<input type="hidden" id="count_round" name="count_round_form" value="8">
          	<ul id="sortable" class="sortable-dragging sortable-placeholder">
		        	<form id="form_round">
		        		<input type="hidden" name="campaignid" id="campaignid_v3" value="<?php echo $group ?>">
		        		<li class="ui-state-disabled" data-index="1" data-position="1">
			        		<div class="v_1" >
				        		<div class="header_vong_cd ">
				        			<input type="hidden" name="round1[]" value="1" class="sorting">
				        			<div class=" col-xs-4 pull-left">
				        				<i class="fa fa-ellipsis-v dis_fa"></i>
				        				Hồ sơ
				        			</div>
				        			<input type="hidden" name="round1[]" value="Hồ sơ" class="roundname hide ">
				        			<div class="pull-right box_btn_cd disabled" >
				        				<button class="btn btn_cd" disabled><i class="fa fa-plus" ></i></button>
				        				<button class="btn 	btn_cd" disabled><i class="fa fa-pencil" ></i></button>
				        			</div>
				        		</div>
				        		<div class="body_vong_cd">
				        			<div class="row marginbot-10 paddingleft-10">
								  		<div class="col-md-3 body-blac2">Loại vòng</div>
								  		<div class="col-md-4">
								  			<select class="seletext js-example-basic-single" name="noisinh">
							                 	<option value="0">Vòng sơ loại</option>
							                </select>
								  		</div>
								  	</div>
								  	<div class="row marginbot-10 paddingleft-10">
								  		<div class="col-md-3 body-blac2">
								  			<label class="checkbox-inline">
											  <input type="checkbox" id="inlineCheckbox1" value="option1"> Email chuyển vòng: 
											</label>
								  		</div>
								  		<div class="col-md-4">
								  			<select class="seletext js-example-basic-single" name="noisinh">
							                 	<option value="0"></option>
							                </select>
								  		</div>
								  	</div>
								  	<div class="row marginbot-10 paddingleft-10">
								  		<div class="col-md-3 body-blac2">
								  		<label class="checkbox-inline">
										  <input type="checkbox" id="inlineCheckbox1" value="option1"> Email loại
										</label>
								  		</div>
								  		<div class="col-md-4">
								  			<select class="seletext js-example-basic-single" name="noisinh">
							                 	<option value="0"></option>
							                </select>
								  		</div>
								  	</div>
				        		</div>
				        	</div>
			        	</li>
			        	<li id="round_2" data-index="2" data-position="2">
			        		<div class="v_2" >
				        		<div class="header_vong_cd">
				        			<input type="hidden" name="round2[]" value="2" class="sorting">
				        			<div class=" col-xs-4 pull-left">
				        				<i class="fa fa-ellipsis-v handle"></i>
				        				<span id="title_2">Sơ loại</span>
				        				<input type="text" name="round2[]" value="Sơ loại" class="roundname hide input_title_2">
				        			</div>
				        			<div class="pull-right box_btn_cd">
				        				<button type="button" class="btn btn_cd btn_copy_2" onclick="copyRound(2)"><i class="fa fa-plus"></i></button>
				        				<button type="button" class="btn btn_cd btn_delete_2" onclick="deleteRound(2)"><i class="fa fa-trash-o"></i></button>
				        				<button type="button" class="btn btn_cd btn_edit_2" onclick="editTitle(2)"><i class="fa fa-pencil"></i></button>
				        			</div>
				        		</div>
				        		<div class="body_vong_cd">
				        			<div class="row marginbot-10 paddingleft-10">
								  		<div class="col-md-3 body-blac2">Loại vòng</div>
								  		<div class="col-md-4">
								  			<select class="seletext js-example-basic-single" name="noisinh">
							                 	<option value="0">Vòng sơ loại</option>
							                </select>
								  		</div>
								  	</div>
								  	<div class="row marginbot-10 paddingleft-10">
								  		<div class="col-md-3 body-blac2">
								  			<label class="checkbox-inline">
											  <input type="checkbox" id="inlineCheckbox1" value="option1"> Email chuyển vòng: 
											</label>
								  		</div>
								  		<div class="col-md-4">
								  			<select class="seletext js-example-basic-single" name="noisinh">
							                 	<option value="0"></option>
							                </select>
								  		</div>
								  	</div>
								  	<div class="row marginbot-10 paddingleft-10">
								  		<div class="col-md-3 body-blac2">
								  		<label class="checkbox-inline">
										  <input type="checkbox" id="inlineCheckbox1" value="option1"> Email loại
										</label>
								  		</div>
								  		<div class="col-md-4">
								  			<select class="seletext js-example-basic-single" name="noisinh">
							                 	<option value="0"></option>
							                </select>
								  		</div>
								  	</div>
				        		</div>
				        	</div>
			        	</li>
			        	<li id="round_3" data-index="3" data-position="3">
			        		<div class="v_3" >
				        		<div class="header_vong_cd">
				        			<input type="hidden" name="round3[]" value="3" class="sorting">
				        			<div class=" col-xs-4 pull-left">
				        				<i class="fa fa-ellipsis-v handle"></i>
				        				
				        				<span id="title_3">Tiếp cận</span>
				        				<input type="text" name="round3[]" value="Tiếp cận" class="roundname hide input_title_3">
				        			</div>
				        			<div class="pull-right box_btn_cd">
				        				<button type="button" class="btn btn_cd btn_copy_3" onclick="copyRound(3)"><i class="fa fa-plus"></i></button>
				        				<button type="button" class="btn btn_cd btn_delete_3" onclick="deleteRound(3)"><i class="fa fa-trash-o"></i></button>
				        				<button type="button" class="btn btn_cd btn_edit_3" onclick="editTitle(3)"><i class="fa fa-pencil"></i></button>
				        			</div>
				        		</div>
				        		<div class="body_vong_cd">
				        			<div class="row marginbot-10 paddingleft-10">
								  		<div class="col-md-3 body-blac2">Loại vòng</div>
								  		<div class="col-md-4">
								  			<select class="seletext js-example-basic-single" name="noisinh">
							                 	<option value="0">Vòng tiếp cận</option>
							                </select>
								  		</div>
								  	</div>
								  	<div class="row marginbot-10 paddingleft-10">
								  		<div class="col-md-3 body-blac2">
								  			<label class="checkbox-inline">
											  <input type="checkbox" id="inlineCheckbox1" value="option1"> Email chuyển vòng: 
											</label>
								  		</div>
								  		<div class="col-md-4">
								  			<select class="seletext js-example-basic-single" name="noisinh">
							                 	<option value="0"></option>
							                </select>
								  		</div>
								  	</div>
								  	<div class="row marginbot-10 paddingleft-10">
								  		<div class="col-md-3 body-blac2">
								  		<label class="checkbox-inline">
										  <input type="checkbox" id="inlineCheckbox1" value="option1"> Email loại
										</label>
								  		</div>
								  		<div class="col-md-4">
								  			<select class="seletext js-example-basic-single" name="noisinh">
							                 	<option value="0"></option>
							                </select>
								  		</div>
								  	</div>
				        		</div>
				        	</div>
			        	</li>
			        	<li id="round_4" data-index="4" data-position="4">
			        		<div class="v_4" >
				        		<div class="header_vong_cd">
				        			<input type="hidden" name="round4[]" value="4" class="sorting">
				        			<div class=" col-xs-4 pull-left">
				        				<i class="fa fa-ellipsis-v handle"></i>
				        				<span id="title_4">Bài Test</span>
				        				<input type="text" name="round4[]" value="Bài Test" class="roundname hide input_title_4">
				        			</div>
				        			<div class="pull-right box_btn_cd">
				        				<button type="button" class="btn btn_cd btn_copy_4" onclick="copyRound(4)"><i class="fa fa-plus"></i></button>
				        				<button type="button" class="btn btn_cd btn_delete_4" onclick="deleteRound(4)"><i class="fa fa-trash-o"></i></button>
				        				<button type="button" class="btn btn_cd btn_edit_4" onclick="editTitle(4)"><i class="fa fa-pencil"></i></button>
				        			</div>
				        		</div>
				        		<div class="body_vong_cd">
				        			<div class="row marginbot-10 paddingleft-10">
								  		<div class="col-md-3 body-blac2">Loại vòng</div>
								  		<div class="col-md-4">
								  			<select class="seletext js-example-basic-single" name="noisinh">
							                 	<option value="0">Trắc nghiệm</option>
							                </select>
								  		</div>
								  	</div>
								  	<div class="row marginbot-10 paddingleft-10">
								  		<div class="col-md-3 body-blac2">
								  			<label class="checkbox-inline">
											  <input type="checkbox" id="inlineCheckbox1" value="option1"> Email chuyển vòng: 
											</label>
								  		</div>
								  		<div class="col-md-4">
								  			<select class="seletext js-example-basic-single" name="noisinh">
							                 	<option value="0">Thông báo đạt trắc nghiệm</option>
							                </select>
								  		</div>
								  	</div>
								  	<div class="row marginbot-10 paddingleft-10">
								  		<div class="col-md-3 body-blac2">
								  		<label class="checkbox-inline">
										  <input type="checkbox" id="inlineCheckbox1" value="option1"> Email loại
										</label>
								  		</div>
								  		<div class="col-md-4">
								  			<select class="seletext js-example-basic-single" name="noisinh">
							                 	<option value="0">Thông báo không đạt - Thư cảm ơn</option>
							                </select>
								  		</div>
								  	</div>

								  	<div class="ext-info">
									  	<div class="row marginbot-10 paddingleft-10 ">
									  		<div class="col-md-3 body-blac2">
									  			Giới hạn mẫu phiếu trắc nghiệm
									  		</div>
									  		<div class="col-md-4">
									  			<select class="seletext js-example-basic-single" name="noisinh">
								                 	<option value="0"></option>
								                </select>
									  		</div>
									  	</div>

									  	<div class="row marginbot-10 paddingleft-10 ">
									  		<div class="col-md-3 body-blac2">
									  			Email thông báo
									  		</div>
									  		<div class="col-md-4">
									  			<select class="seletext js-example-basic-single" name="noisinh">
								                 	<option value="0">Trắc nghiệm tổng quát</option>
								                </select>
									  		</div>
									  	</div>
								  	</div>
				        		</div>
				        	</div>
			        	</li>
			        	<li id="round_5" data-index="5" data-position="5">
			        		<div class="v_5" >
				        		<div class="header_vong_cd">
				        			<input type="hidden" name="round5[]" value="5" class="sorting">
				        			<div class=" col-xs-4 pull-left">
				        				<i class="fa fa-ellipsis-v handle"></i>
				        				<span id="title_5">Phỏng vấn V1</span>
				        				<input type="text" name="round5[]" value="Phỏng vấn V1" class="roundname hide input_title_5">
				        			</div>
				        			<div class="pull-right box_btn_cd">
				        				<button type="button" class="btn btn_cd btn_copy_5" onclick="copyRound(5)"><i class="fa fa-plus"></i></button>
				        				<button type="button" class="btn btn_cd btn_delete_5" onclick="deleteRound(5)"><i class="fa fa-trash-o"></i></button>
				        				<button type="button" class="btn btn_cd btn_edit_5" onclick="editTitle(5)"><i class="fa fa-pencil"></i></button>
				        			</div>
				        		</div>
				        		<div class="body_vong_cd">
				        			<div class="row marginbot-10 paddingleft-10">
								  		<div class="col-md-3 body-blac2">Loại vòng</div>
								  		<div class="col-md-4">
								  			<select class="seletext js-example-basic-single" name="noisinh">
							                 	<option value="0">Phỏng vấn</option>
							                </select>
								  		</div>
								  	</div>
								  	<div class="row marginbot-10 paddingleft-10">
								  		<div class="col-md-3 body-blac2">
								  			<label class="checkbox-inline">
											  <input type="checkbox" id="inlineCheckbox1" value="option1"> Email chuyển vòng: 
											</label>
								  		</div>
								  		<div class="col-md-4">
								  			<select class="seletext js-example-basic-single" name="noisinh">
							                 	<option value="0">Thông báo đạt</option>
							                </select>
								  		</div>
								  	</div>
								  	<div class="row marginbot-10 paddingleft-10">
								  		<div class="col-md-3 body-blac2">
								  		<label class="checkbox-inline">
										  <input type="checkbox" id="inlineCheckbox1" value="option1"> Email loại
										</label>
								  		</div>
								  		<div class="col-md-4">
								  			<select class="seletext js-example-basic-single" name="noisinh">
							                 	<option value="0"></option>
							                </select>
								  		</div>
								  	</div>

								  	<div class="ext-info">
									  	<div class="row marginbot-10 paddingleft-10 ">
									  		<div class="col-md-3 body-blac2">
									  			Giới hạn mẫu phiếu trắc nghiệm
									  		</div>
									  		<div class="col-md-4">
									  			<select class="seletext js-example-basic-single" name="noisinh">
								                 	<option value="0">Phiếu phỏng vấn BM004/005</option>
								                </select>
									  		</div>
									  	</div>

									  	<div class="row marginbot-10 paddingleft-10 ">
									  		<div class="col-md-3 body-blac2">
									  			Email thông báo
									  		</div>
									  		<div class="col-md-4">
									  			<select class="seletext js-example-basic-single" name="noisinh">
								                 	<option value="0">Thư mời phỏng vấn</option>
								                </select>
									  		</div>
									  	</div>
								  	</div>
				        		</div>
				        	</div>
			        	</li>
			        	<li id="round_6" data-index="6" data-position="6">
			        		<div class="v_6" >
				        		<div class="header_vong_cd">
				        			<input type="hidden" name="round6[]" value="6" class="sorting">
				        			<div class=" col-xs-4 pull-left">
				        				<i class="fa fa-ellipsis-v handle"></i>
				        				<span id="title_6">Phỏng vấn V2</span>
				        				<input type="text" name="round6[]" value="Phỏng vấn V2" class="roundname hide input_title_6">
				        			</div>
				        			<div class="pull-right box_btn_cd">
				        				<button type="button" class="btn btn_cd btn_copy_6" onclick="copyRound(6)"><i class="fa fa-plus"></i></button>
				        				<button type="button" class="btn btn_cd btn_delete_6" onclick="deleteRound(6)"><i class="fa fa-trash-o"></i></button>
				        				<button type="button" class="btn btn_cd btn_edit_6" onclick="editTitle(6)"><i class="fa fa-pencil"></i></button>
				        			</div>
				        		</div>
				        		<div class="body_vong_cd">
				        			<div class="row marginbot-10 paddingleft-10">
								  		<div class="col-md-3 body-blac2">Loại vòng</div>
								  		<div class="col-md-4">
								  			<select class="seletext js-example-basic-single" name="noisinh">
							                 	<option value="0">Phỏng vấn</option>
							                </select>
								  		</div>
								  	</div>
								  	<div class="row marginbot-10 paddingleft-10">
								  		<div class="col-md-3 body-blac2">
								  			<label class="checkbox-inline">
											  <input type="checkbox" id="inlineCheckbox1" value="option1"> Email chuyển vòng: 
											</label>
								  		</div>
								  		<div class="col-md-4">
								  			<select class="seletext js-example-basic-single" name="noisinh">
							                 	<option value="0">Thông báo đạt phỏng vấn</option>
							                </select>
								  		</div>
								  	</div>
								  	<div class="row marginbot-10 paddingleft-10">
								  		<div class="col-md-3 body-blac2">
								  		<label class="checkbox-inline">
										  <input type="checkbox" id="inlineCheckbox1" value="option1"> Email loại
										</label>
								  		</div>
								  		<div class="col-md-4">
								  			<select class="seletext js-example-basic-single" name="noisinh">
							                 	<option value="0"></option>
							                </select>
								  		</div>
								  	</div>

								  	<div class="ext-info">
									  	<div class="row marginbot-10 paddingleft-10 ">
									  		<div class="col-md-3 body-blac2">
									  			Giới hạn mẫu phiếu trắc nghiệm
									  		</div>
									  		<div class="col-md-4">
									  			<select class="seletext js-example-basic-single" name="noisinh">
								                 	<option value="0">Kiến thức tổng quát</option>
								                </select>
									  		</div>
									  	</div>

									  	<div class="row marginbot-10 paddingleft-10 ">
									  		<div class="col-md-3 body-blac2">
									  			Email thông báo
									  		</div>
									  		<div class="col-md-4">
									  			<select class="seletext js-example-basic-single" name="noisinh">
								                 	<option value="0"></option>
								                </select>
									  		</div>
									  	</div>
								  	</div>
				        		</div>
				        	</div>
			        	</li>
			        	<li id="round_7" data-index="7" data-position="7">
			        		<div class="v_7" >
				        		<div class="header_vong_cd">
				        			<input type="hidden" name="round7[]" value="7" class="sorting">
				        			<div class=" col-xs-4 pull-left">
				        				<i class="fa fa-ellipsis-v handle"></i>
				        				<span id="title_7">Đề nghị</span>
				        				<input type="text" name="round7[]" value="Đề nghị" class="roundname hide input_title_7">
				        			</div>
				        			<div class="pull-right box_btn_cd">
				        				<button type="button" class="btn btn_cd btn_copy_7" onclick="copyRound(7)"><i class="fa fa-plus"></i></button>
				        				<button type="button" class="btn btn_cd btn_delete_7" onclick="deleteRound(7)"><i class="fa fa-trash-o"></i></button>
				        				<button type="button" class="btn btn_cd btn_edit_7" onclick="editTitle(7)"><i class="fa fa-pencil"></i></button>
				        			</div>
				        		</div>
				        		<div class="body_vong_cd">
				        			<div class="row marginbot-10 paddingleft-10">
								  		<div class="col-md-3 body-blac2">Loại vòng</div>
								  		<div class="col-md-4">
								  			<select class="seletext js-example-basic-single" name="noisinh">
							                 	<option value="0">Đề nghị</option>
							                </select>
								  		</div>
								  	</div>
								  	<div class="row marginbot-10 paddingleft-10">
								  		<div class="col-md-3 body-blac2">
								  			<label class="checkbox-inline">
											  <input type="checkbox" id="inlineCheckbox1" value="option1"> Email chuyển vòng: 
											</label>
								  		</div>
								  		<div class="col-md-4">
								  			<select class="seletext js-example-basic-single" name="noisinh">
							                 	<option value="0">Thông báo tuyển dụng</option>
							                </select>
								  		</div>
								  	</div>
								  	<div class="row marginbot-10 paddingleft-10">
								  		<div class="col-md-3 body-blac2">
								  		<label class="checkbox-inline">
										  <input type="checkbox" id="inlineCheckbox1" value="option1"> Email loại
										</label>
								  		</div>
								  		<div class="col-md-4">
								  			<select class="seletext js-example-basic-single" name="noisinh">
							                 	<option value="0">Không đạt</option>
							                </select>
								  		</div>
								  	</div>

								  	<div class="ext-info">
									  	<div class="row marginbot-10 paddingleft-10 ">
									  		<div class="col-md-3 body-blac2">
									  			Giới hạn mẫu phiếu trắc nghiệm
									  		</div>
									  		<div class="col-md-4">
									  			<select class="seletext js-example-basic-single" name="noisinh">
								                 	<option value="0"></option>
								                </select>
									  		</div>
									  	</div>

									  	<div class="row marginbot-10 paddingleft-10 ">
									  		<div class="col-md-3 body-blac2">
									  			Email thông báo
									  		</div>
									  		<div class="col-md-4">
									  			<select class="seletext js-example-basic-single" name="noisinh">
								                 	<option value="0">Thư mời nhận việc</option>
								                </select>
									  		</div>
									  	</div>
								  	</div>
				        		</div>
				        	</div>
			        	</li>
			        	<li id="round_8" class="ui-state-disabled" data-index="8" data-position="8">
			        		<div class="v_8 ">
				        		<div class="header_vong_cd">
				        			<input type="hidden" name="round8[]" value="8" class="sorting">
				        			<div class=" col-xs-4 pull-left">
				        				<i class="fa fa-ellipsis-v dis_fa"></i>
				        				Tuyển dụng
				        			</div>
				        			<input type="hidden" name="round8[]" value="Tuyển dụng" class="roundname  ">
				        			<div class="pull-right box_btn_cd">
				        				<button class="btn btn_cd" disabled><i class="fa fa-plus"></i></button>
				        				<button class="btn 	btn_cd" disabled><i class="fa fa-pencil"></i></button>
				        			</div>
				        		</div>
				        		<div class="body_vong_cd">
				        			<div class="row marginbot-10 paddingleft-10">
								  		<div class="col-md-3 body-blac2">Loại vòng</div>
								  		<div class="col-md-4">
								  			<select class="seletext js-example-basic-single" name="noisinh">
							                 	<option value="0">Vòng tuyển dụng</option>
							                </select>
								  		</div>
								  	</div>
				        		</div>
				        	</div>
			        	</li>
		        	</form>
		        </ul>
			            </div>
		            </div>
<div class="box_btn">
						<div class="pull-right">
							<a href="<?php echo base_url() ?>admin/campaign/main" class="btn btn_thoat">Thoát</a>
							<button type="submit" id="saveRound" class="btn btn_tt">Lưu/ Tiếp theo</button>
						</div>
					</div>
	            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
      </section></div>
      <script type="text/javascript">
      	$(document).ready(function(){
      		$('.js-example-basic-single').select2({
      			width: '100%' 
      		});
      		$('#sortable').sortable({
			handle: '.handle',
			items: 'li:not(.ui-state-disabled)',
			update: function (event, ui) {
				$('#sortable').find('li').each(function(index) {
					if($(this).attr('data-position') != (index+1)){
						$(this).attr('data-position',(index+1)).addClass('updated');
						$(this).find('.sorting').val(index+1);
						$(this).attr('id','round_'+(index+1))
					}
				});
				updateNewPositions();
			}
		});
      	});
      	function updateNewPositions() {
		var positions =[];
		$('.updated').each(function() {
			positions.push([$(this).attr('data-index'),$(this).attr('data-position')]);
			
			$(this).removeClass('updated');
		});
		console.log(positions);
		for (var i = 0; i < positions.length; i++) {
			var old_round =positions[i][0];
			var new_round =positions[i][1];
			var box = $('#box_round_'+old_round).clone().attr('id', 'box_round_temp_'+new_round).after('#box_round_'+old_round);
			$('#box_round_'+new_round).after(box);
			$('#box_round_temp_'+new_round).find('.info-box-number').text('V'+new_round);
			$('#box_round_'+old_round).empty();
			// $('#box_round_temp_'+new_round).attr('id', 'box_round_'+new_round);
		}
		for (var i = 0; i < positions.length; i++) {
			var old_round =positions[i][0];
			$('#box_round_'+old_round).remove();
			$('#box_round_temp_'+old_round).attr('id', 'box_round_'+old_round);
			$('#round_'+old_round).removeAttr('data-position').removeAttr('data-index').attr({
				'data-position': old_round,
				'data-index': old_round
			});;
		}

	}
	
	function copyRound(round) {
		var count_round = Number($('#count_round').val());
		var new_round = Number(round)+1;

		for (var i = count_round; i > round; i--) {
			var j = i+1;
			$('#round_'+i).find('.sorting').val(j);
			$('#round_'+i).removeAttr('data-position').attr('data-position', j).attr('data-index', j);
			$('#round_'+i).find('.btn_copy_'+i).attr('onclick', 'copyRound('+j+')').addClass('btn btn_cd btn_copy_'+j).removeClass('btn_copy_'+i);
			$('#round_'+i).find('.btn_delete_'+i).attr('onclick', 'deleteRound('+j+')').addClass('btn btn_cd btn_delete_'+j).removeClass('btn_delete_'+i);
			$('#round_'+i).find('.btn_edit_'+i).attr('onclick', 'editRound('+j+')').addClass('btn btn_cd btn_edit_'+j).removeClass('btn_edit_'+i);
			$('#round_'+i).find('.roundname').addClass('roundname input_title_'+j).removeClass('input_title_'+i);
			$('#round_'+i).find('#col_add_pt_'+i).attr('id', 'col_add_pt_'+j);
			$('#round_'+i).find('.add_pt').attr('onclick', 'insertPT('+j+')');
			$('#round_'+i).find('#manageround_'+i).attr('id', 'manageround_'+j);
			$('#round_'+i).find('[name*="round"]').each(function(){
			    $(this).attr('name','round'+j+'[]');
			}); 
			$('#round_'+i).attr('id', 'round_'+j);

			$('#box_round_'+i).find('.info-box-number').text('V'+j);
			$('#box_round_'+i).attr('id', 'box_round_'+j);
		}

		var row = $('#round_'+round).clone().attr('id', 'round_'+new_round).after('#round_'+round);
		$('#round_'+round).after(row);
		$('#round_'+new_round).attr('data-index', new_round);
		$('#round_'+new_round).attr('data-position', new_round);
		$('#round_'+new_round).find('.sorting').val(new_round);
		$('#round_'+new_round).children('.v_'+round).attr('class', 'v_' + new_round);
		$('#round_'+new_round).contents().find('#title_'+round).attr('id', 'title_' + new_round);
		var title = $('#title_'+new_round).text();
		$('#title_'+new_round).text(title+' copy');
		$('#round_'+new_round).contents().find('.input_title_'+round).attr('class', 'input_title_' + new_round+ ' roundname hide');
		$('#round_'+new_round).contents().find('.btn_copy_'+round).attr('onclick', 'copyRound('+new_round+')');
		$('#round_'+new_round).contents().find('.btn_delete_'+round).attr('onclick', 'deleteRound('+new_round+')');
		$('#round_'+new_round).contents().find('.btn_edit_'+round).attr('onclick', 'editTitle('+new_round+')');
		$('#round_'+new_round).find('#col_add_pt_'+round).attr('id', 'col_add_pt_'+new_round);
		$('#round_'+new_round).find('.add_pt').attr('onclick', 'insertPT('+new_round+')');
		$('#round_'+new_round).find('#manageround_'+round).attr('id', 'manageround_'+new_round);
		$('#round_'+new_round).find('[name*="round"]').each(function(){
		    $(this).attr('name','round'+new_round+'[]');
		}); 

		var new_count = count_round+1;		
		$('#count_round').val(new_count);

		var box = $('#box_round_'+round).clone().attr('id', 'box_round_'+new_round).after('#box_round_'+round);
		$('#box_round_'+round).after(box);
		$('#box_round_'+new_round).find('.info-box-number').text('V'+new_round);
		$('#box_round_'+new_round).find('.info-box-text').text(title+' Copy');
		var width = 100/new_count;
		$('.col-pc-12').css('width', width+'%');
	}
	function deleteRound(round) {
		var count_round = $('#count_round').val();
		$('#round_'+round).remove();
		$('#box_round_'+round).remove();
		var width = 100/(count_round -1);
		$('.col-pc-12').css('width', width+'%');
		$('#count_round').val(count_round -1);

		for(var i = (round+1); i<=count_round; i++){
			var j = i-1;
			$('#round_'+i).find('.sorting').val(j);
			$('#round_'+i).attr('data-position', j).attr('data-index', j);
			$('#round_'+i).find('.btn_copy_'+i).attr('onclick', 'copyRound('+j+')').addClass('btn btn_cd btn_copy_'+j).removeClass('btn_copy_'+i);
			$('#round_'+i).find('.btn_delete_'+i).attr('onclick', 'deleteRound('+j+')').addClass('btn btn_cd btn_delete_'+j).removeClass('btn_delete_'+i);
			$('#round_'+i).find('.btn_edit_'+i).attr('onclick', 'editRound('+j+')').addClass('btn btn_cd btn_edit_'+j).removeClass('btn_edit_'+i);
			$('#round_'+i).find('.roundname').addClass('roundname input_title_'+j).removeClass('input_title_'+i);
			$('#round_'+i).find('#col_add_pt_'+i).attr('id', 'col_add_pt_'+j);
			$('#round_'+i).find('.add_pt').attr('onclick', 'insertPT('+j+')');
			$('#round_'+i).find('#manageround_'+i).attr('id', 'manageround_'+j);
			$('#round_'+i).find('[name*="round"]').each(function(){
			    $(this).attr('name','round'+j+'[]');
			}); 
			$('#round_'+i).attr('id', 'round_'+j);

			$('#box_round_'+i).find('.info-box-number').text('V'+j);
			$('#box_round_'+i).attr('id', 'box_round_'+j);
		}
		$('#count_round').val(count_round-1);
	}
	function editTitle(round) {
		$('#title_'+round).addClass('hide');
		$('.input_title_'+round).removeClass('hide');
	}
	


	$('.js-example-basic_ql').select2({ width: '100%' });
	function addQL(i) {
		var j = i+1;
		var value = $('#select_type_'+i).val();
		var name = $('#select_type_'+i).find(":selected").text();
		if (value != '') {
			var row = $('#body_cam_'+i).clone().attr('id', 'body_cam_'+j).after('#body_cam_'+i);
			$('.modal_body_cam').append(row);
			$('#body_cam_'+j).contents().find('.fa-plus-circle').attr('onclick', 'addQL('+j+')');
			$('#body_cam_'+j).contents().find('.seletext').attr('id', 'select_type_'+j);
			$('#body_cam_'+j).contents().find('#show_name_'+i).attr('id', 'show_name_'+j);
			$('#body_cam_'+j).children().attr('id', 'btn_event_'+j);
			$('.js-example-basic_ql').select2({ width: '100%' });
			$('.js-example-basic_ql').last().next().next().remove();

			$('#show_name_'+i).text(name).removeClass('hide');
			$('#select_type_'+i).hide();
			$('#btn_event_'+i).empty().html('<i class="fa fa-minus-circle fa-lg" onclick="subQL('+i+')"></i>');
		}else{
			alert('Bạn chưa chọn người quản lý');
		}
	}
	function subQL(i) {
		$('#body_cam_'+i).remove();
	}
	function subColQL(id) {
		var campaignid = $('#campaignid_ql').val();
		$('#col_ql_'+id).remove();
		$.ajax({
			url: '<?php echo base_url() ?>admin/campaign/removeManager',
			type: 'POST',
			dataType: 'json',
			data: {id:id, campaignid:campaignid},
		})
		.done(function() {
		})
		.fail(function() {
			console.log("error");
		});
	}
	$('#saveManager').click(function(event) {
		var operator = $('#operator_js').text();
		operator = (JSON.parse(operator));
		$.ajax({
			url: '<?php echo base_url() ?>admin/campaign/saveManager',
			type: 'POST',
			dataType: 'json',
			data: $('#formManager').serialize(),
		})
		.done(function(data) {
			var row ='';
			for(var i in data){
				for(var j in operator ){
					if (data[i] == operator[j]['operatorid']) { 
						row ='<div class="col-xs-2 padding_le_ri_0 ql" id="col_ql_'+data[i]+'" onclick="subColQL('+data[i]+')"><div class="col-xs-3 padding_le_ri_0">';
						row += '<img class="img_ql" src="<?php echo base_url() ?>public/image/bbye.jpg"><div class="del_ql"><i class="fa fa-minus-circle fa-lg"></i></div></div>';
						row += '<div class="col-xs-9 padding_le_ri_0"><p class="name_ql">'+operator[j]['operatorname']+'</p></div></div>';
						$('#col_add_ql').before(row);
					} 
				}				      				
			}
			
			$('#insertQL').modal('hide');
		})
		.fail(function() {
			console.log("error");
		});
		
	});

	function insertPT(roundid) {
		$('#roundid_pt').val(roundid);
		$('#insertPT').modal('show');
	}

	function addPT(i) {
		var j = i+1;
		var value = $('#select_type_pt_'+i).val();
		var name = $('#select_type_pt_'+i).find(":selected").text();
		if (value != '') {
			var row = $('#body_cam_pt_'+i).clone().attr('id', 'body_cam_pt_'+j).after('#body_cam_pt_'+i);
			$('.modal_body_cam_pt').append(row);
			$('#body_cam_pt_'+j).contents().find('.fa_pt').attr('onclick', 'addPT('+j+')');
			$('#body_cam_pt_'+j).contents().find('.seletext').attr('id', 'select_type_pt_'+j);
			$('#body_cam_pt_'+j).contents().find('#show_name_pt_'+i).attr('id', 'show_name_pt_'+j);
			$('#body_cam_pt_'+j).children().attr('id', 'btn_event_pt_'+j);
			$('.js-example-basic').select2({ width: '100%' });
			$('.js-example-basic').last().next().next().remove();

			$('#show_name_pt_'+i).text(name).removeClass('hide');
			$('#select_type_pt_'+i).hide();
			$('#btn_event_pt_'+i).empty().html('<i class="fa fa-minus-circle fa-lg" onclick="subPT('+i+')"></i>');
		}else{
			alert('Bạn chưa chọn người phụ trách vòng');
		}
	}
	function subPT(i) {
		$('#body_cam_pt_'+i).remove();
	}
	function subColPT(id,roundid) {
		$('#col_pt_'+id).remove();
		var manageround = $('#manageround_'+roundid).val();
		manageround1 = manageround.replace(id+',', '');
		$('#manageround_'+roundid).val(manageround1);
	}

	$('#savePT').click(function(event) {
		var roundid = $('#roundid_pt').val();
		var operator = $('#operator_js').text();
		operator = (JSON.parse(operator));
		var data = $('#formPT').serializeArray();
		var row = '';
		var str = '';
		for(var i in data){
			if (data[i].value == '')
			{ 
				continue;
			}
			for(var j in operator ){
				if (data[i].value == operator[j]['operatorid']) { 
					row ='<div class="col-xs-2 padding_le_ri_0 ql" id="col_pt_'+data[i].value+'" onclick="subColPT('+data[i].value+','+roundid+')"><div class="col-xs-3 padding_le_ri_0">';
					row += '<img class="img_ql" src="<?php echo base_url() ?>public/image/bbye.jpg"><div class="del_ql"><i class="fa fa-minus-circle fa-lg"></i></div></div>';
					row += '<div class="col-xs-9 padding_le_ri_0"><p class="name_ql">'+operator[j]['operatorname']+'</p></div></div>';
					$('#col_add_pt_'+roundid).before(row);
				} 
			}
			str += data[i].value + ',';				      				
		}
		var manageround = $('#manageround_'+roundid).val();
		if(manageround != ''){
			manageround += str;
		}else{
			manageround = str;
		}
		$('#manageround_'+roundid).val(manageround);
		$('#insertPT').modal('hide');
		
		
		
	});

	$('#saveRound').click(function(event) {
		var campaignid = $('#campaignid_v3').val();
		var count_round = $('#count_round').val();
		for (var i = 1; i <= count_round ; i++) {
			if ($('#manageround_'+i).val() == '') {
				alert('Bạn chưa chọn người quản lý vòng '+i);
				return;
			}
		}
		
		$.ajax({
			url: '<?php echo base_url() ?>admin/campaign/saveRound',
			type: 'POST',
			dataType: 'json',
			data: $('#form_round').serialize(),
		})
		.done(function() {
			location.href='<?php echo base_url() ?>admin/campaign/new_campaign_4/'+campaignid;
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
      </script>
      <style type="text/css">
	.select2-container{
		width: 100% !important;
	}
	.col-pc-12{
		width: 12.5%;
	}
	li{
		list-style: none;
	}
</style>