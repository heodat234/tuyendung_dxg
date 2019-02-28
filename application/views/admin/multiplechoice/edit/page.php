<div class="content-wrapper">
    <section class="content">
    	<div class="row">
       		<div class="col-md-12">
	        	<div class="box box-default">
		            <div class="box-header" id="box_header_1">
		                
		              	<p>
		              		<label class="title_box_user"><?php echo($asmt[0]['asmtname'])?></label>
		              		<i class="fa fa-users fa_users"></i>
		              		<label class="title_chil"><?php echo($asmt[0]['asmttype']=='1'?"Phỏng vấn/Đánh giá":"Trắc nghiệm")?></label>
		              		<label class="title_time">Ngày cập nhật cuối cùng <?php echo(date('d-m-Y',strtotime($asmt[0]['lastupdate'])))?></label>
		              	</p>

		              	<div class="box-tools pull-right">
		                	<button type="button" class="btn btn-default"><i class="fa fa-list color-gray"></i></button>
		              	</div>
		            </div>
		            <div id="box_header_2">
		            	<a href="<?php echo base_url()?>admin/multiplechoice" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Previous"><i class="fa fa-chevron-left"></i> Quay lại</a>
		            </div>
		            
			            <div class="panel-group" id="accordion">
						  	<div class="panel panel-default border-rad0">
						    	<div class="panel-heading rad-pad0 b-blue"> 
						       		<ul class="nav nav-tabs ul-nav">
								        <li class="">
								        	<a data-toggle="tab" href="#list_user" class="nemu-info-pf">Hoạt động</a>
								        </li>
								        <li class="<?php echo isset($active2)?$active2 : '' ?>">
								        	<a data-toggle="tab" href="#config_group" class="nemu-info-pf" >Thông tin</a>
								        </li>
								        <li class="<?php echo isset($active3)?$active3 : '' ?>">
								        	<a data-toggle="tab" href="#content_group" class="nemu-info-pf" >Nội dung</a>
								        </li>
								    </ul>
						    	</div>
							    <div id="collapse1" class="panel-collapse collapse in">
							      	<div class="panel-body">
							      		<div class="tab-content">
							      			<!-- Tab1 -->
								      		<div id="list_user" class="tab-pane">
								        		<div class="panel-group bor-mar-b0">
											      	<div class="panel-body" style="border: 0px">
											      		<p class="titleAppoint1">Đang thực hiện</p>
											     	 	<table class="table table-striped table-bordered table-hover table-responsive" id="table-dangth">
											     	 		<thead>
											     	 			<th>Ứng viên</th>
											     	 			<th>Chiến dịch tuyển dụng</th>
											     	 			<th>Ngày tạo - thực hiện</th>
											     	 			<th>Người phụ trách</th>
											     	 			<th>Trạng thái</th>
											     	 			<th>Kết quả</th>
											     	 		</thead>
											     	 		<tbody>
											     	 			<?php if(!empty($asmt_w)) foreach ($asmt_w as $key => $value) { ?>											     	 			
											     	 			<tr>
											     	 				<td><p class="td-row"><?php echo($value['candidate_name']);?></p></td>
											     	 				<td><p class="td-row">Nhân viên Kinh Doanh Q2 - 2018</p></td>
											     	 				<td><p class="td-row"><?php echo date('d-m-Y',strtotime($value['createddate']));?> - <?php echo date('d-m-Y',strtotime($value['duedate']));?></p></td>
											     	 				<td><p class="td-row"><?php echo($value['createdby_name']);?></p></td>
											     	 				<td><p class="td-row">Đang thực hiện</p></td>
											     	 				<td><p class="td-row">-</p></td>
											     	 			</tr>
											     	 			<?php } ?>
											     	 		</tbody>
											     	 	</table>
											     	 	<p class="titleAppoint1">Đã hoàn tất</p>
											     	 	<table class="table table-bordered table-hover table-responsive" id="table-daht">
											     	 		<thead>
											     	 			<th>Ứng viên</th>
											     	 			<th>Chiến dịch tuyển dụng</th>
											     	 			<th>Ngày tạo - thực hiện</th>
											     	 			<th>Người phụ trách</th>
											     	 			<th>Trạng thái</th>
											     	 			<th>Kết quả</th>
											     	 		</thead>
											     	 		<tbody>
											     	 			<?php if(!empty($asmt_c)) foreach ($asmt_c as $key => $value) { ?>
											     	 			<tr>
											     	 				<td><p class="td-row"><?php echo($value['candidate_name']);?></p></td>
											     	 				<td><p class="td-row">Nhân viên kế toán</p></td>
											     	 				<td><p class="td-row"><?php echo date('d-m-Y',strtotime($value['createddate']));?> - <?php echo date('d-m-Y',strtotime($value['duedate']));?></p></td>
											     	 				<td><p class="td-row"><?php echo($value['createdby_name']);?></p></td>
											     	 				<td><p class="td-row">Hoàn thành (0/15)</p></td>
											     	 				<td><p class="td-row">Đạt (70/65/75)</p></td>
											     	 			</tr>
											     	 			<?php } ?>
											     	 		</tbody>
											     	 	</table>
											  	  	</div>
												</div>
								       		</div>
								       		<!-- Tab2 -->
								       		<div id="config_group" class="tab-pane <?php echo isset($active2)?$active2 : '' ?>">
								        		<div class="panel-group bor-mar-b0">
								        			<form id="edit_asmt">
								        				<input type="hidden" name="asmttemp" value="<?php echo($asmt[0]['asmttemp'])?>">
												      	<div class="panel-body" style="border: 0px; border-bottom: 1px solid #dedede;">
												     	 	<div class="width100 row rowedit h-auto padding_bot_15">
													            <label for="text" class="width20 col-xs-3 label-profile">Trạng thái áp dụng</label>
													            <div class="col-xs-4 padding-lr0">
																	<select class="textbox" name="asmtstatus">
																		<option value="W" <?php echo($asmt[0]['asmtstatus']=="W"?"selected":'')?>>Đang áp dụng</option>
																		<option value="C" <?php echo($asmt[0]['asmtstatus']=="C"?"selected":'')?>>Không áp dụng</option>
																	</select>
													            </div>
													        </div>
													        <div class="width100 row rowedit h-auto padding_bot_15">
													            <label for="text" class="width20 col-xs-3 label-profile">Tên gọi</label>
													            <div class="col-xs-4 padding-lr0">
																	<input type="text" name="asmtname" required="" value="<?php echo($asmt[0]['asmtname'])?>">
													            </div>
													        </div>
													        <div class="width100 row rowedit h-auto padding_bot_15">
													            <label for="text" class="width20 col-xs-3 label-profile">Phân loại</label>
													            <div class="col-xs-4 padding-lr0">
																	<select class="textbox" name="asmttype" style="font-family: 'FontAwesome'">
																		<option value="1" <?php echo($asmt[0]['asmttype']=="1"?"selected":'')?>>&#xf086; Phỏng vấn/Đánh giá</option>
																		<option value="2" <?php echo($asmt[0]['asmttype']=="2"?"selected":'')?>>&#xf15c; Trắc nghiệm</option>
																	</select>
													            </div>
													        </div>
												  	  	</div>
												  	  	<div class="panel-body" style="border: 0px;">
												     	 	<div class="width100 row rowedit h-auto padding_bot_15">
													            <label for="text" class="width20 col-xs-3 label-profile">Trộn tự động</label>
													            <div class="col-xs-4 padding-lr0">
																	<select class="textbox" name="shuffle">
																		<option value="0" <?php echo($asmt[0]['shuffle']=="0"?"selected":'')?>>Không</option>
																		<option value="1" <?php echo($asmt[0]['shuffle']=="1"?"selected":'')?>>Có</option>
																	</select>
													            </div>
													        </div>
													        <div class="width100 row rowedit h-auto padding_bot_15">
													            <label for="text" class="width20 col-xs-3 label-profile">Số câu hỏi tối đa:</label>
													            <div class="col-xs-4 padding-lr0">
																	<input type="text" name="shuffleqty" value="<?php echo($asmt[0]['shuffleqty'])?>"> 
																	<span class="body-blac5">Tự cân đối theo câu/phần</span>
													            </div>
													        </div>
													        <div class="width100 row rowedit h-auto padding_bot_15">
													            <label for="text" class="width20 col-xs-3 label-profile">Mức điểm đạt:</label>
													            <div class="col-xs-4 padding-lr0">
																	<input type="number" name="targetscore" value="<?php echo number_format($asmt[0]['targetscore'])?>"> 
																	<span class="body-blac5">Điểm tối đa của nội dung là: 75</span>
													            </div>
													        </div>
													        <div class="width100 row rowedit h-auto padding_bot_15">
													            <label for="text" class="width20 col-xs-3 label-profile">Giới hạn thời gian</label>
													            <div class="col-xs-4 padding-lr0">
																	<input type="number" name="timelimit_h" value="<?php echo number_format((int)$asmt[0]['timelimit']/60-0.5)?>" style="width: 15%"> Giờ :
																	<input type="number" name="timelimit_m" value="<?php echo((int)$asmt[0]['timelimit']%60)?>" style="width: 15%"> Phút 
																	<span class="body-blac5"> 00:00 = không giới hạn thời gian</span>
													            </div>
													        </div>
													        <div class="width100 row rowedit h-auto padding_bot_15">
													            <label for="text" class="width20 col-xs-3 label-profile">Nội dung/ Chỉ dẫn</label>
													            <div class="col-xs-4 padding-lr0">
																	<textarea class="textara1" rows="4" placeholder="" name="note"><?php echo($asmt[0]['note'])?></textarea>
													            </div>
													        </div>
													        <div class="box_btn">
															<div class="pull-right">
																<a href="http://recruit.tavicosoft.com/admin/campaign/main" class="btn btn_thoat">Thoát</a>
																<button type="submit" class="btn btn_thoat btn_tt">
																	<i></i>
																	Lưu
																</button>
															</div>
														</div>
												  	  	</div>
											  	  	</form>
												</div>
								       		</div>
								       		<!-- Tab 3 -->

								       		<div id="content_group" class="tab-pane <?php echo isset($active3)?$active3 : '' ?>"><p class="body-blac2"></p>
								       			<?php if ($this->uri->segment(5) == 'hung') {?>
								       				<form  method="post" action="<?php echo base_url() ?>admin/Test/importQuestion" enctype="multipart/form-data">
								       					<input type="hidden" name="asmttemp" value="<?php echo($asmt[0]['asmttemp'])?>">
											            <div class="form-inline">
											              <div class="form-group">
											                <input type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="files" id="js-upload-files">
											              </div>
											              <button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit">Upload file</button>
											            </div>
											        </form>
								       			<?php } ?>
								       			<!-- <div class="col-md-12 search_box_1"> -->
										        	<div class="box box-default">
											            <div class="box-header">
											            	<form >
											            		<div class="input-group">
											            			<input type="text" name="" class="form-control input_search" placeholder="Nhập câu hỏi..." onkeyup="searchName(this.value,<?php echo($asmt[0]['asmttemp'])?>)">
											            			<span class="input-group-btn">
											            				<button type="button" id="search-btn" class="btn btn-flat btn_search"><i class="fa fa-search"></i></button>
											            			</span>
											            		</div>
											            	</form>
											            </div>
											        </div>
											    <!-- </div> -->
								       			<form id="f_question">
								       			<input type="hidden" name="asmttemp" value="<?php echo($asmt[0]['asmttemp'])?>">
								        		<div class="panel-group bor-mar-b0">
											      	<div class="panel-body" style="border: 0px">
												        <ul id="sortable" class="sortable-dragging sortable-placeholder">
						        	
											        		<li class="ui-state-disabled" data-index="1" data-position="1" id="dom_content">
												        		<!-- begin section -->
												        		<?php if (!empty($section)) { foreach ($section as $sec) {?>
												        		<div class="v_1 e_section" id="afterInsert">
												        			<div class="header_vong_cd">
													        			<div class=" col-xs-10 pull-left">
													        				<i class="fa fa-ellipsis-v dis_fa"></i>
													        				<input type="text" data-name="sectionname" placeholder="Nhập phần nội dung" style="border: none; outline: 0; background: transparent; width: 95%;" value="<?php echo($sec['sectionname'])?>">
													        			</div>
													        			<div class="pull-right box_btn_cd disabled" >
													        				<button type="button" class="btn btn_cd btn_copy_2 more-section">
													        					<i class="fa fa-plus"></i>
													        				</button>
													        				<button class="btn 	btn_cd del_section">
													        					<i class="fa fa-trash-o" ></i>
													        				</button>
													        				<button type="button" class="btn btn_cd btn_collapse">
													        					<i class="fa fa-angle-down"></i>
													        				</button>
													        			</div>
													        		</div>
													        		<div class="body_vong_cd">
													        			<?php if (isset($sec['question'])&&!empty($sec['question'])) {
													        			foreach ($sec['question'] as $ques) { ?>
													        				
															        	<div class="v_1 e_question">
															        		<input type="hidden" data-name="questionid" value="<?php echo($ques['questionid'])?>">
															        		<div class="header_vong_con" style="height: 80px">
															        			<div class=" col-xs-10 pull-left">
															        				<!-- <i class="fa fa-ellipsis-v dis_fa"></i> -->
															        				<!-- <input type="text" required="" placeholder="Nhập Câu hỏi" data-name="question" value="<?php echo($ques['question'])?>" style="border: 0;outline: 0;background: transparent; width: 95%"> -->
															        				<textarea required="" placeholder="Nhập Câu hỏi" data-name="question" rows="3" style="border: 0;outline: 0;background: transparent; width: 95%;max-height: 80px"><?php echo($ques['questioncontent'])?></textarea>
															        			</div>
															        			<div class="pull-right box_btn_cd">
															        				<div class="image-upload">
																					    <label for="file-input-id">
																					        <button type="button" class="btn btn_cd btn_copy_2 btn_img_ques">
																					        	<i class="fa fa-picture-o" aria-hidden="true"></i>
																					        </button>
																					    </label>
																        				<button type="button" class="btn btn_cd btn_delete_2 del_question" data-id="<?php echo($ques['questionid'])?>">
																        					<i class="fa fa-trash-o"></i>
																        				</button>
																					</div>
															        			</div>
															        		</div>
															        		<div class="body_vong_con" >
															        			<div class="<?php echo($ques['imageid']==''?'hide':'')?>" style="width: fit-content; position: relative; margin-bottom: 10px;">
														            				<img src="<?php echo($ques['image'])?>" height="100px" id="img-answer-1">
														            				<span class="del_img" data-id="<?php echo($ques['imageid'])?>">
														            					<i class="fa fa-times"></i>
														            				</span>
														            			</div>
															        			<div class="row form_campaign">
																		            <label for="text" class=" col-xs-2 label-profile">Loại trả lời</label>
																		            <div class="col-xs-4  padding-lr0">
																		             	<select class="textbox" data-name="questiontype">
																		             		<option value="<?php echo($ques['questiontype'])?>" selected>
																		             			<?php
																		             			if($ques['questiontype']=='sights')echo('Trắc nghiệm');
																		             			if($ques['questiontype']=='scores')echo('Đánh giá/ Điểm số');
																		             			if($ques['questiontype']=='text')echo('Nhận xét');
																		             			?>
																		             				
																		             		</option>
																		             	</select>
																		            </div>
																		            <div class="col-xs-4  padding-lr0 checkbox">
																					    <label>
																					      <input type="checkbox" data-name="requirement" <?php echo($ques['requirement']=='1'?'checked':'')?>> Câu hỏi bắt buộc
																					    </label>
																		            </div>
																		        </div>
																		        <?php if($ques['questiontype']=='sights') { ?>
																		        <div class="row form_campaign">
																		            <label for="text" class=" col-xs-5 label-profile">Câu trả lời</label>
																		            <label for="text" class=" col-xs-3 label-profile">Điểm số</label>
																		            <label for="text" class=" col-xs-3 label-profile">Câu trả lời đúng</label>
																		            <?php if (isset($ques['answer'])&&!empty($ques['answer'])) {
													        						foreach ($ques['answer'] as $ans) { ?>
													        						

																		            <div class="row answer e_answer">
																		            	<input type="hidden" data-name="optionid" value="<?php echo($ans['optionid'])?>">
																		            	<div class="col-xs-5 image-upload">
																		            		<div class="col-xs-10 padding-lr0 text-center">
																		            			<input type="text" <?php echo($ans['image']!=''?' class="textbox-answer hide"':'required="" class="textbox-answer"')?> data-name="answercontent" id="textbox-answer-1" value="<?php echo($ans['answercontent'])?>">
																	            				<div class="<?php echo($ans['imageid']==''?'hide':'')?>" style="width: fit-content; position: relative;">
																		            				<img src="<?php echo($ans['image'])?>" height="80px" id="img-answer-1">
																		            				<span class="del_img" data-id="<?php echo($ans['imageid'])?>">
																		            					<i class="fa fa-times"></i>
																		            				</span>
																		            			</div>
																	            			</div>
																		            		<div class="col-xs-2 padding-lr0">
																		            			<label for="file-input-answer-1" id="">
																					        		<button type="button" class="btn btn-answer btn_copy_2 btn_img_ans">
																					        			<i class="fa fa-picture-o" aria-hidden="true"></i>
																					        		</button>
																					   			</label>
																										
																		            		</div>
																		            	</div>
																		            	<div class="col-xs-3 " style="padding-left: 0px">
																		            		<input type="text" required="" class="textbox" data-name="score" value="<?php echo number_format($ans['score'])?>">
																		            	</div>
																		            	<input type="checkbox" class="col-xs-1" data-name="isright" <?php echo($ans['isright']=='1'?'checked':'')?>>
																		            	<button type="button" class="btn btn_cd btn_delete_2 col-xs-1 del_answer" data-id="<?php echo($ans['optionid'])?>" style="padding: 0;">
																        					<i class="fa fa-trash-o"></i>
																        				</button>
																		            </div>
																		            <?php }?> 

																		            <p class="plus-button more-answer">
																		            	<i class="fa fa-plus" aria-hidden="true"></i> 
																		            	Thêm câu trả lời
																		            </p>
																		            <div class="col-xs-4 padding-lr0 checkbox">
																					    <label>
																					      <input type="checkbox" data-name="addanswerallow" <?php echo($ques['addanswerallow']=='1'?'checked':'')?>> Thêm phần nhận xét tự do cho câu hỏi này
																					    </label>
																		            </div>
																		        	<?php } ?>
																		        </div>
																		        <?php }elseif($ques['questiontype']=='scores'){ ?>

																	            <div class="row form_campaign" data-type="scores">
																			        <label for="text" class=" col-xs-5 label-profile">Điểm số (Thấp nhất - Cao nhất)</label>
																			        <label for="text" class=" col-xs-4 label-profile">Tính điểm</label>
																					<div class="col-xs-5 image-upload">
																			    		<div class="col-xs-12 padding-lr0">
																							<input type="number" required="" data-name="scorefrom" value="<?php echo number_format($ques['scorefrom'])?>" style="width: 45%">-&gt; 
																							<input type="number" required="" data-name="scoreto" value="<?php echo number_format($ques['scoreto'])?>" style="width: 45%">												
																			            </div>	
																			        </div>
																			        <div class="col-xs-1 pull-left">
																			        	<input type="checkbox" data-name="othersallow" <?php echo($ques['othersallow']=='1'?'checked':'')?>>           
																			        </div>
																			        <div class="col-xs-12 padding-lr0 checkbox">
																					    <label>
																					      <input type="checkbox" data-name="addanswerallow" <?php echo($ques['addanswerallow']=='1'?'checked':'')?>> Thêm phần nhận xét tự do cho câu hỏi này
																					    </label>
																			        </div>
																			    </div>
																				<?php }elseif($ques['questiontype']=='text'){ ?>

																	            

																	        	<?php } ?>
															        		</div>
															        	</div>
															        	<?php }} ?>
															        	<div class="v_1">
															        		<div class="body_vong_con" style="min-height: 0;height: 50px; border: none;">
																		        <div class="row form_campaign">
																					<p class="plus-button pull-right col-xs-2 add-question">
																		            	<i class="fa fa-plus" aria-hidden="true"></i> 
																		            	Thêm câu hỏi
																		            </p>
																		        </div>
															        		</div>
															        	</div>
													        		</div>
													        	</div>
													        	<?php }}else{ ?>
													        	<div class="v_1 e_section" id="afterInsert">
												        			<input type="hidden" name="questionid" value="">
												        			<div class="header_vong_cd">
													        			<div class=" col-xs-4 pull-left">
													        				<i class="fa fa-ellipsis-v dis_fa"></i>
													        				<input type="text" data-name="sectionname" placeholder="Nhập phần nội dung" style="border: none; outline: 0; background: transparent;">
													        			</div>
													        			<div class="pull-right box_btn_cd disabled" >
													        				<button type="button" class="btn btn_cd btn_copy_2 more-section">
													        					<i class="fa fa-plus"></i>
													        				</button>
													        				<button class="btn 	btn_cd del_section">
													        					<i class="fa fa-trash-o" ></i>
													        				</button>
													        				<button type="button" class="btn btn_cd btn_collapse">
													        					<i class="fa fa-angle-down"></i>
													        				</button>
													        			</div>
													        		</div>
													        		<div class="body_vong_cd">
															        	<div class="v_1 e_question">
															        		<div class="header_vong_con" style="height: 80px">
															        			<div class=" col-xs-6 pull-left">
															        				
															        				<textarea required="" placeholder="Nhập Câu hỏi" data-name="question" rows="3" style="border: 0;
															        				padding-left: 9px;outline: 0;background: transparent; width: 97%;max-height: 80px"></textarea>
															        			</div>
															        			<div class="pull-right box_btn_cd">
															        				<div class="image-upload">
																					    <label for="file-input-id">
																					        <button type="button" class="btn btn_cd btn_copy_2 btn_img_ques">
																					        	<i class="fa fa-picture-o" aria-hidden="true"></i>
																					        </button>
																					    </label>
																        				<button type="button" class="btn btn_cd btn_delete_2 del_question">
																        					<i class="fa fa-trash-o"></i>
																        				</button>
																					</div>
															        			</div>
															        		</div>
															        		<div class="body_vong_con" >
															        			<div class="hide" style="width: fit-content; position: relative; margin-bottom: 10px;">
														            				<img src="" height="100px" id="img-answer-1">
														            				<span class="del_img">
														            					<i class="fa fa-times"></i>
														            				</span>
														            			</div>
															        			<div class="row form_campaign">
																		            <label for="text" class=" col-xs-2 label-profile">Loại trả lời</label>
																		            <div class="col-xs-4  padding-lr0">
																		             	<select class="textbox" data-name="questiontype">
																		             		<option value="sights" >Trắc nghiệm</option>
																		             		<option value="scores" >Đánh giá/ Điểm số</option>
																		             		<option value="text" >Nhận xét</option>
																		             	</select>
																		            </div>
																		            <div class="col-xs-4  padding-lr0 checkbox">
																					    <label>
																					      <input type="checkbox" data-name="requirement"> Câu hỏi bắt buộc
																					    </label>
																		            </div>
																		        </div>
																		        <div class="row form_campaign">
																		            <label for="text" class=" col-xs-5 label-profile">Câu trả lời</label>
																		            <label for="text" class=" col-xs-3 label-profile">Điểm số</label>
																		            <label for="text" class=" col-xs-3 label-profile">Câu trả lời đúng</label>
																		            <?php for ($i=1; $i <=4 ; $i++){ ?>
																		            <div class="row answer e_answer">
																		            	<div class="col-xs-5 image-upload">
																		            		<div class="col-xs-10 padding-lr0 text-center">
																		            			<input type="text" required="" class="textbox-answer" data-name="answercontent"id="textbox-answer-1">
																		            			<div class="hide" style="width: fit-content; position: relative;">
																		            				<img src="" height="80px" id="img-answer-1">
																		            				<span class="del_img">
																		            					<i class="fa fa-times"></i>
																		            				</span>
																		            			</div>
																	            			</div>
																		            		<div class="col-xs-2 padding-lr0">
																		            			<label for="file-input-answer-1" id="">
																					        		<button type="button" class="btn btn-answer btn_copy_2 btn_img_ans">
																					        			<i class="fa fa-picture-o" aria-hidden="true"></i>
																					        		</button>
																					   			</label>
																								
																		            		</div>
																		            	</div>
																		            	<div class="col-xs-3 " style="padding-left: 0px">
																		            		<input type="text" required="" class="textbox" data-name="score">
																		            	</div>
																		            	<input type="checkbox" class="col-xs-1" data-name="isright">
																		            	<button type="button" class="btn btn_cd btn_delete_2 col-xs-1 del_answer" style="padding: 0;">
																        					<i class="fa fa-trash-o"></i>
																        				</button>
																		            </div>
																		        	<?php }?>
																		            <p class="plus-button more-answer">
																		            	<i class="fa fa-plus" aria-hidden="true"></i> 
																		            	Thêm câu trả lời
																		            </p>
																		            <div class="col-xs-4 padding-lr0 checkbox">
																					    <label>
																					      <input type="checkbox" data-name="addanswerallow"> Thêm phần nhận xét tự do cho câu hỏi này
																					    </label>
																		            </div>
																		        </div>
															        		</div>
															        	</div>
															        	<div class="v_1">
															        		<div class="body_vong_con" style="min-height: 0;height: 50px; border: none;">
																		        <div class="row form_campaign">
																					<p class="plus-button pull-right col-xs-2 add-question">
																		            	<i class="fa fa-plus" aria-hidden="true"></i> 
																		            	Thêm câu hỏi
																		            </p>
																		        </div>
															        		</div>
															        	</div>
													        		</div>
													        	</div>
													        	<?php }?>
													        	<!-- end of section -->
													        </li>	
											        	</ul>
											  	  	</div>
												</div>
												<div class="box_btn">
													<div class="pull-right">
														<a href="http://recruit.tavicosoft.com/admin/campaign/main" class="btn btn_thoat">Thoát</a>
														<button type="submit" id="btn_submit" class="btn btn_thoat btn_tt"><i></i> Lưu</button>
													</div>
												</div>
												</form>
											</div>
								       	</div>
							    	</div>
							   	</div>
						  	</div>
						</div>
					</form>
	            <!-- /.box-body -->
	          	</div>
	        </div>
    	</div>
    </section>
    <section class="hide data_source">
    	<div class="v_1 e_section" id="afterInsert">
			<div class="header_vong_cd">
    			<div class=" col-xs-4 pull-left">
    				<i class="fa fa-ellipsis-v dis_fa"></i>
    				<input type="text" data-name="sectionname" placeholder="Nhập phần nội dung" style="border: none; outline: 0; background: transparent;">
    			</div>
    			<div class="pull-right box_btn_cd disabled" >
    				<button type="button" class="btn btn_cd btn_copy_2 more-section">
    					<i class="fa fa-plus"></i>
    				</button>
    				<button class="btn 	btn_cd del_section">
    					<i class="fa fa-trash-o" ></i>
    				</button>
    				<button type="button" class="btn btn_cd btn_collapse">
    					<i class="fa fa-angle-down"></i>
    				</button>
    			</div>
    		</div>
    		<div class="body_vong_cd">
	        	<div class="v_1 e_question">
	        		<div class="header_vong_con" style="height: 80px">
	        			<div class=" col-xs-6 pull-left">
	        				<!-- <i class="fa fa-ellipsis-v dis_fa"></i> -->
	        				<!-- <input type="text" required="" placeholder="Nhập Câu hỏi" data-name="question" style="border: 0; -->
	        				<textarea required="" placeholder="Nhập Câu hỏi" data-name="question" rows="3" style="border: 0;padding-left: 9px;outline: 0;background: transparent; width: 97%;max-height: 80px"></textarea>
	        			</div>
	        			<div class="pull-right box_btn_cd">
	        				<div class="image-upload">
							    <label for="file-input-id">
							        <button type="button" class="btn btn_cd btn_copy_2 btn_img_ques">
							        	<i class="fa fa-picture-o" aria-hidden="true"></i>
							        </button>
							    </label>
		        				<button type="button" class="btn btn_cd btn_delete_2 del_question">
		        					<i class="fa fa-trash-o"></i>
		        				</button>
							</div>
	        			</div>
	        		</div>
	        		<div class="body_vong_con" >
	        			<div class="hide" style="width: fit-content; position: relative; margin-bottom: 10px;">
            				<img src="" height="100px" id="img-answer-1">
            				<span class="del_img">
            					<i class="fa fa-times"></i>
            				</span>
            			</div>
	        			<div class="row form_campaign">
				            <label for="text" class=" col-xs-2 label-profile">Loại trả lời</label>
				            <div class="col-xs-4  padding-lr0">
				             	<select class="textbox" data-name="questiontype">
				             		<option value="sights" >Trắc nghiệm</option>
				             		<option value="scores" >Đánh giá/ Điểm số</option>
				             		<option value="text" >Nhận xét</option>
				             	</select>
				            </div>
				            <div class="col-xs-4  padding-lr0 checkbox">
							    <label>
							      <input type="checkbox" data-name="requirement"> Câu hỏi bắt buộc
							    </label>
				            </div>
				        </div>
				        <div class="row form_campaign" data-type="sights">
				            <label for="text" class=" col-xs-5 label-profile">Câu trả lời</label>
				            <label for="text" class=" col-xs-3 label-profile">Điểm số</label>
				            <label for="text" class=" col-xs-3 label-profile">Câu trả lời đúng</label>
				            <?php for ($i=1; $i <=4 ; $i++){ ?>
				            <div class="row answer e_answer">
				            	<div class="col-xs-5 image-upload">
				            		<div class="col-xs-10 padding-lr0 text-center">
				            			<input type="text" required="" class="textbox-answer" data-name="answercontent" id="textbox-answer-1">
			            				<div class="hide" style="width: fit-content; position: relative;">
				            				<img src="" height="80px" id="img-answer-1">
				            				<span class="del_img">
				            					<i class="fa fa-times"></i>
				            				</span>
				            			</div>
			            			</div>
				            		<div class="col-xs-2 padding-lr0">
				            			<label for="file-input-answer-1" id="">
							        		<button type="button" class="btn btn-answer btn_copy_2 btn_img_ans">
							        			<i class="fa fa-picture-o" aria-hidden="true"></i>
							        		</button>
							   			</label>
										
				            		</div>
				            	</div>
				            	<div class="col-xs-3 " style="padding-left: 0px">
				            		<input type="text" required="" class="textbox" data-name="score">
				            	</div>
				            	<input type="checkbox" class="col-xs-1" data-name="isright">
				            	<button type="button" class="btn btn_cd btn_delete_2 col-xs-1 del_answer" style="padding: 0;">
		        					<i class="fa fa-trash-o"></i>
		        				</button>
				            </div>
				        	<?php }?>
				            <p class="plus-button more-answer">
				            	<i class="fa fa-plus" aria-hidden="true"></i> 
				            	Thêm câu trả lời
				            </p>
				            <div class="col-xs-4 padding-lr0 checkbox">
							    <label>
							      <input type="checkbox" data-name="addanswerallow"> Thêm phần nhận xét tự do cho câu hỏi này
							    </label>
				            </div>
				        </div>
				        <div class="row form_campaign" data-type="scores">
					        <label for="text" class=" col-xs-5 label-profile">Điểm số (Thấp nhất - Cao nhất)</label>
					        <label for="text" class=" col-xs-4 label-profile">Tính điểm</label>
							<div class="col-xs-5 image-upload">
					    		<div class="col-xs-12 padding-lr0">
									<input type="number" required="" data-name="scorefrom" style="width: 45%">-&gt; 
									<input type="number" required="" data-name="scoreto" style="width: 45%">												
					            </div>	
					        </div>
					        <div class="col-xs-1 pull-left">
					        	<input type="checkbox" data-name="othersallow">           
					        </div>
					        <div class="col-xs-12 padding-lr0 checkbox">
							    <label>
							      <input type="checkbox" data-name="addanswerallow"> Thêm phần nhận xét tự do cho câu hỏi này
							    </label>
					        </div>
					    </div>
					    <div class="row form_campaign" data-type="text">
					        
					    </div>
	        		</div>
	        	</div>
	        	<div class="v_1">
	        		<div class="body_vong_con" style="min-height: 0;height: 50px; border: none;">
				        <div class="row form_campaign">
							<p class="plus-button pull-right col-xs-2 add-question">
				            	<i class="fa fa-plus" aria-hidden="true"></i> 
				            	Thêm câu hỏi
				            </p>
				        </div>
	        		</div>
	        	</div>
    		</div>
    	</div>
    </section>
</div>
<input type="hidden" id="baseUrl" value="<?php echo base_url() ?>">
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
	p.plus-button{
		width: fit-content;
	}
	span.del_img{
		right: -10px;
		top: -10px;
		opacity: 0.75;
	    position: absolute;
	    width: 20px;
	    height: 20px;
	    border-radius: 50%;
	    text-align: center;
	    background: #cfcfe2;
	    cursor: pointer;
	    display: none !important;
	}
	.input_search{
 		box-shadow: none;
 		background-color: #fff;
 		border: 1px solid transparent;
 	}
 	.btn_search{
 		background-color: #fff;
 		border: 1px solid transparent;
 		height: 35px;
 	}
</style>
<script type="text/javascript">
	$(document).ready(function (){	
   
	        $('html, body').animate({
	            scrollTop: $('#content_group').height()
	        },500);
	    
	});
 	function searchName(obj,asmttemp) {
 		var base_url = $('#base_url');
 		$.ajax({
 			url: '<?php echo base_url('admin/multiplechoice/searchQuestion') ?>',
 			type: 'POST',
 			dataType: 'json',
 			data: {name: obj, asmttemp: asmttemp},
 		})
 		.done(function(data) {
	
 			var dom ='';
 			for(var i in data){
 				var sec = data[i];
	        	dom += '<div class="v_1 e_section" id="afterInsert">\
		        			<div class="header_vong_cd">\
			        			<div class=" col-xs-10 pull-left">\
			        				<i class="fa fa-ellipsis-v dis_fa"></i>\
			        				<input type="text" data-name="sectionname" placeholder="Nhập phần nội dung" style="border: none; outline: 0; background: transparent; width: 95%;" value="'+sec['sectionname']+'">\
			        			</div>\
			        			<div class="pull-right box_btn_cd disabled" >\
			        				<button type="button" class="btn btn_cd btn_copy_2 more-section">\
			        					<i class="fa fa-plus"></i>\
			        				</button>\
			        				<button class="btn 	btn_cd del_section">\
			        					<i class="fa fa-trash-o" ></i>\
			        				</button>\
			        				<button type="button" class="btn btn_cd btn_collapse">\
			        					<i class="fa fa-angle-down"></i>\
			        				</button>\
			        			</div>\
			        		</div>\
			        		<div class="body_vong_cd">';
			        			if (!sec['question'].length == 0) {
			        			for(var j in sec['question']) {
			        				var ques = sec['question'][j];
			        				if (ques['imageid'] == null) {
			        					var class_img = 'hide';
			        				}else{
			        					var class_img = '';
			        				}
			        				console.log(ques);
			        				if(ques['questiontype']=='sights') var option_type = 'Trắc nghiệm';
			             			if(ques['questiontype']=='scores') var option_type = 'Đánh giá/ Điểm số';
			             			if(ques['questiontype']=='text') var option_type = 'Nhận xét';
			             			if (ques['requirement'] == '1') {
			        					var checked = 'checked';
			        				}else{
			        					var checked = '';
			        				}
			        				
					    dom += '<div class="v_1 e_question">\
					        		<input type="hidden" data-name="questionid" value="'+ques['questionid']+'">\
					        		<div class="header_vong_con" style="height: 80px">\
					        			<div class=" col-xs-10 pull-left">\
					        				<textarea required="" placeholder="Nhập Câu hỏi" data-name="question" rows="3" style="border: 0;outline: 0;background: transparent; width: 95%;max-height:80px">'+ques['questioncontent']+'</textarea>\
					        			</div>\
					        			<div class="pull-right box_btn_cd">\
					        				<div class="image-upload">\
											    <label for="file-input-id">\
											        <button type="button" class="btn btn_cd btn_copy_2 btn_img_ques">\
											        	<i class="fa fa-picture-o" aria-hidden="true"></i>\
											        </button>\
											    </label>\
						        				<button type="button" class="btn btn_cd btn_delete_2 del_question" data-id="'+ques['questionid']+'">\
						        					<i class="fa fa-trash-o"></i>\
						        				</button>\
											</div>\
					        			</div>\
					        		</div>\
					        		<div class="body_vong_con" >\
					        			<div class="'+class_img+'" style="width: fit-content; position: relative; margin-bottom: 10px;">\
				            				<img src="'+ques['image']+'" height="100px" id="img-answer-1">\
				            				<span class="del_img" data-id="'+ques['imageid']+'">\
				            					<i class="fa fa-times"></i>\
				            				</span>\
				            			</div>\
					        			<div class="row form_campaign">\
								            <label for="text" class=" col-xs-2 label-profile">Loại trả lời</label>\
								            <div class="col-xs-4  padding-lr0">\
								             	<select class="textbox" data-name="questiontype">\
								             		<option value="'+ques['questiontype']+'" selected>\
								             			'+option_type+'\
								             		</option>\
								             	</select>\
								            </div>\
								            <div class="col-xs-4  padding-lr0 checkbox">\
											    <label>\
											      <input type="checkbox" data-name="requirement" '+checked+'> Câu hỏi bắt buộc\
											    </label>\
								            </div>\
								        </div>';
								    if(ques['questiontype']=='sights') { 
								    dom += '<div class="row form_campaign">\
								            <label for="text" class=" col-xs-5 label-profile">Câu trả lời</label>\
								            <label for="text" class=" col-xs-3 label-profile">Điểm số</label>\
								            <label for="text" class=" col-xs-3 label-profile">Câu trả lời đúng</label>';
								        if (!ques['answer'].length == 0) {
			        						for(var k in ques['answer']) { 
			        							var ans = ques['answer'][k];
			        							if (ans['image'] != null) {
			        								var class_ans = 'class="textbox-answer hide"';
			        							}else{
			        								var class_ans = 'required="" class="textbox-answer"';
			        							}
			        							if (ans['imageid'] == null) {
						        					var class_img_ans = 'hide';
						        				}else{
						        					var class_img_ans = '';
						        				}
						        				if (ans['isright'] == '1') {
						        					var checked_ans = 'checked';
						        				}else{
						        					var checked_ans = '';
						        				}
						        				// console.log(ans);
								        dom += '<div class="row answer e_answer">\
								            	<input type="hidden" data-name="optionid" value="'+ans['optionid']+'">\
								            	<div class="col-xs-5 image-upload">\
								            		<div class="col-xs-10 padding-lr0 text-center">\
								            			<input type="text" '+class_ans+' data-name="answercontent" id="textbox-answer-1" value="'+ans['answercontent']+'">\
							            				<div class="'+class_img_ans+'" style="width: fit-content; position: relative;">\
								            				<img src="'+ans['image']+'" height="80px" id="img-answer-1">\
								            				<span class="del_img" data-id="'+ans['imageid']+'">\
								            					<i class="fa fa-times"></i>\
								            				</span>\
								            			</div>\
							            			</div>\
								            		<div class="col-xs-2 padding-lr0">\
								            			<label for="file-input-answer-1" id="">\
											        		<button type="button" class="btn btn-answer btn_copy_2 btn_img_ans">\
											        			<i class="fa fa-picture-o" aria-hidden="true"></i>\
											        		</button>\
											   			</label>\
								            		</div>\
								            	</div>\
								            	<div class="col-xs-3 " style="padding-left: 0px">\
								            		<input type="text" required="" class="textbox" data-name="score" value="'+ans['score']+'">\
								            	</div>\
								            	<input type="checkbox" class="col-xs-1" data-name="isright" '+checked_ans+'>\
								            	<button type="button" class="btn btn_cd btn_delete_2 col-xs-1 del_answer" data-id="'+ans['optionid']+'" style="padding: 0;">\
						        					<i class="fa fa-trash-o"></i>\
						        				</button>\
								            </div>';
								            }
								        if (ques['addanswerallow'] == '1') {
				        					var addanswerallow = 'checked';
				        				}else{
				        					var addanswerallow = '';
				        				}
								        dom += '<p class="plus-button more-answer">\
								            	<i class="fa fa-plus" aria-hidden="true"></i> \
								            	Thêm câu trả lời\
								            </p>\
								            <div class="col-xs-4 padding-lr0 checkbox">\
											    <label>\
											      <input type="checkbox" data-name="addanswerallow" '+addanswerallow+'> Thêm phần nhận xét tự do cho câu hỏi này\
											    </label>\
								            </div>';
								        }
								    dom += '</div>';
								    }else if(ques['questiontype']=='scores'){ 
							        dom += '<div class="row form_campaign" data-type="scores">\
									        <label for="text" class=" col-xs-5 label-profile">Điểm số (Thấp nhất - Cao nhất)</label>\
									        <label for="text" class=" col-xs-4 label-profile">Tính điểm</label>\
											<div class="col-xs-5 image-upload">\
									    		<div class="col-xs-12 padding-lr0">\
													<input type="number" required="" data-name="scorefrom" value="'+ques['scorefrom']+'" style="width: 45%">-&gt; \
													<input type="number" required="" data-name="scoreto" value="'+ques['scoreto']+'" style="width: 45%">												\
									            </div>	\
									        </div>\
									        <div class="col-xs-1 pull-left">\
									        	<input type="checkbox" data-name="othersallow" '+ques['othersallow']=='1'?'checked':''+'>           \
									        </div>\
									        <div class="col-xs-12 padding-lr0 checkbox">\
											    <label>\
											      <input type="checkbox" data-name="addanswerallow" '+ques['addanswerallow']=='1'?'checked':''+'> Thêm phần nhận xét tự do cho câu hỏi này\
											    </label>\
									        </div>\
									    </div>';
									}
					        	dom += '</div>\
					        	</div>';
					        	}} 
					       	dom += '<div class="v_1">\
					        		<div class="body_vong_con" style="min-height: 0;height: 50px; border: none;">\
								        <div class="row form_campaign">\
											<p class="plus-button pull-right col-xs-2 add-question">\
								            	<i class="fa fa-plus" aria-hidden="true"></i> \
								            	Thêm câu hỏi\
								            </p>\
								        </div>\
					        		</div>\
					        	</div>\
			        		</div>\
			        	</div>';
 			}
 			
 			$('#dom_content').empty();
 			$('#dom_content').prepend(dom);
 		})
 		.fail(function() {
 			console.log("error");
 		});
 		
 	}
 </script>