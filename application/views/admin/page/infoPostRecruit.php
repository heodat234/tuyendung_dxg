<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<section class="col-lg-3 lg-3-edt connectedSortable" >
				<?php 
				echo isset($nav)? $nav : "";
				?>
			</section>
			<section class="col-lg-9 lg-9-edt connectedSortable padding-lr0">
				<div style="background-color: white; min-height: 932px">
					<div class="rowedit2">
						<div class="col-md-6">	
							<label class="header-content">
								<span class="color-title">Thông tin tuyển dụng </span>

							</label>
						</div>

						<div class="clear-border" style="border: 0.5px solid #ececec;"></div>
						<div class="col-md-6 hovbtn">
							<button type="button" class="btn-icon-header" ><i class="fa fa-print color-ccc" ></i></button>
							<button type="button" class="btn-icon-header margin-r7" ><i class="fa fa-envelope-o color-ccc" ></i></button>
						</div>
					</div>
					<div class="dash-horizontal"></div>
					<form method="post" action="<?php echo base_url() ?>admin/news/insert">
						<div class="row rowedit pad-t5" >
							<div class="rowedit2">
								<div class="col-md-2 body-blac">
									Loại hình:
								</div>
								<div class="col-md-4">
									<select class="seletext js-example-basic-single" name="type" required="">
										<option value="0">Tin tức - chế độ</option>
									</select>
								</div>
								<div class="col-md-1"></div>
								<div class="col-md-2 body-blac">
									Ngày đăng bài:
								</div>
								<div class="col-md-3">
									<input class="kttext" type="text" id="ngaycap" placeholder="" name="publishdate" value="">
								</div>
							</div>
							<div class="rowedit2">
								<div class="col-md-2 body-blac">
									Trạng thái:
								</div>
								<div class="col-md-4">
									<select class="seletext js-example-basic-single" name="status" required="">
										<option value="W">Đăng bài</option>
										<option value="C">Đóng</option>
									</select>
								</div>
							</div>

							<div class="rowedit2">
								<div class="col-md-2 body-blac">
									Tên bài viết:
								</div>
								<div class="col-md-10">
									<input class="kttext" required="" type="text" id="" placeholder="" name="subject" value="" style="width: 100%">
								</div>
							</div>
							<div class="rowedit2">
								<div class="col-md-2 body-blac">
									Nội dung:
								</div>
							</div>
							<div class="" style="margin: 8px">
								<textarea name="body" style="width: 100%;" rows="10" required=""></textarea>
							</div>

						</div>
						<div class="compo-bottom">
							<div class="clear-border" style="border: 0.5px solid #ececec;"></div>
							<button type="submit" class="btn btn-primary" style="margin: 8px;float: right;">Lưu</button>
						</div>
					</form>
				</div> 
			</section>	
		</div>
	</section>
</div>
<style type="text/css">
	
</style>