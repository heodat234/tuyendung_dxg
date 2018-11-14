<div style="background-color: white; min-height: 748px">
	<div class="rowedit2">
		<div class="col-xs-6">	
			<label class="header-content">
				<span class="color-title">Thông tin tuyển dụng </span>

			</label>
		</div>
		<div class="clear-border" style="border: 0.5px solid #ececec;"></div>
		<div class="col-xs-6 hovbtn">
			<button type="button" class="btn-icon-header" ><i class="fa fa-print color-ccc" ></i></button>
			<button type="button" class="btn-icon-header margin-r7" ><i class="fa fa-envelope-o color-ccc" ></i></button>
		</div>
	</div>
	<div class="dash-horizontal"></div>
	<form id="form_news">
		<input type="hidden" name="newsid" value="<?php echo isset($news[0]['newsid'])? $news[0]['newsid'] :'' ?>">
		<div class="row rowedit pad-t5" >
			<div class="rowedit2">
				<div class="col-xs-2 body-blac">
					Loại hình:
				</div>
				<div class="col-xs-4">
					<input type="hidden" id="type" value="<?php echo isset($news[0]['type'])? $news[0]['type'] :'Tin tức - chế độ' ?>">
					<select class="seletext js-example-basic-single" name="type" required="" id="select_type" >
						<option value="Tin tuyển dụng">Tin tuyển dụng</option>
						<option value="Tin tức - chế độ">Tin tức - chế độ</option>

					</select>
				</div>
				<div class="col-xs-1"></div>
				<div class="col-xs-6-2 body-blac">
					Ngày đăng bài:
				</div>
				<div class="col-xs-3">
					<input class="kttext" type="text" id="ngaycap" placeholder="" name="publishdate" value="<?php echo isset($news[0]['publishdate'])? date_format(date_create($news[0]['publishdate']),"d/m/Y") :'' ?>">
				</div>
			</div>
			<div class="rowedit2">
				<div class="col-xs-2 body-blac">
					Trạng thái:
				</div>
				<div class="col-xs-4">
					<input type="hidden" id="status" value="<?php echo isset($news[0]['status'])? $news[0]['status'] :'W' ?>">
					<select class="seletext js-example-basic-single" name="status" required="" id="select_status">
						<option value="W">Đăng bài</option>
						<option value="C">Đóng</option>
					</select>
				</div>
			</div>

			<div class="rowedit2">
				<div class="col-xs-2 body-blac">
					Tên bài viết:
				</div>
				<div class="col-xs-10">
					<input class="kttext" required="" type="text" id="" placeholder="" name="subject" value="<?php echo isset($news[0]['subject'])? $news[0]['subject'] : '' ?>" style="width: 100%">
				</div>
			</div>
			<div class="rowedit2">
				<div class="col-xs-2 body-blac">
					Nội dung:
				</div>
			</div>
			<div class="" style="margin: 8px">
				<textarea name="body" style="width: 100%;" rows="10" required=""><?php echo isset($news[0]['body'])? $news[0]['body']: ''; ?></textarea>
			</div>

		</div>
		<div class="compo-bottom">
			<div class="clear-border" style="border: 0.5px solid #ececec;"></div>
			<button type="button" class="btn btn-primary" style="margin: 8px;float: right;" onclick="save()">Lưu</button>
		</div>
	</form>
</div>

<script type="text/javascript">

	function save() {
		var form = $('#form_news').serializeArray();
		var id 		= form[0].value;	
		var type    = form[1].value;	
		var date 	= form[2].value;	
		var subject = form[4].value;	
		// var body = CKEDITOR.instances.body.getData();
		CKEDITOR.instances.body.updateElement();

		var frm = $('#form_news').serialize();
		// frm += body;
		$.ajax({
			url: '<?php echo base_url() ?>admin/news/modify',
			type: 'POST',
			dataType: 'json',
			data: frm,
		})
		.done(function(data) {
			if(data['check'] == 1){
				alert('Thêm tin mới thành công');
				var row = '<a href="<?php echo base_url().'admin/news/form_news/' ?>'+data['id']+'" target="idf_news" onclick="setActive('+data['id']+')" ><li id="dropdown" class="width100 news_'+data['id']+'">';
                row +='<p class="title-news" id="title_news_'+data['id']+'">'+subject+'</p>';
                row +='<div class="row row-detail"><div class="col-xs-4 padding-4"><img src="<?php echo base_url() ?>public/image/xahoi2.png" style="width: 100%"></div>';   
                row+='<div class="col-xs-8 padding-4"><div class="row marginleft-0"><div class="col-xs-4 padding-0">Đăng bởi:</div><div class="col-xs-8 title-ccc" id="createdby_'+data['id']+'">'+data['createdby']+'</div></div>';        
                row+='<div class="row marginleft-0"><div class="col-xs-4 padding-0">Ngày đăng:</div><div class="col-xs-8 title-ccc" id="publishdate_'+data['id']+'">'+date+'</div></div>';              
                row+='<div class="row marginleft-0"><div class="col-xs-4 padding-0">Loại hình:</div><div class="col-xs-8 title-ccc" id="type_'+data['id']+'">'+type+'</div></div></div></div><div class="clear-border" style="border: 0.5px solid #ececec;"></div></li></a>';                   
				parent.$('.append_row').prepend(row);          
                                    
			}else{
				alert('Cập nhật tin tức thành công');
				parent.$('#title_news_'+id).empty();
				parent.$('#title_news_'+id).text(subject);
				parent.$('#createdby_'+id).empty();
				parent.$('#createdby_'+id).text(data['createdby']);
				parent.$('#publishdate_'+id).empty();
				parent.$('#publishdate_'+id).text(date);
				parent.$('#type_'+id).empty();
				parent.$('#type_'+id).text(type);
			}
		})
		.fail(function() {
			alert('Thất bại');
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}
	var type = $('#type').val();
	$("#select_type").val(type);
	var status = $('#status').val();
	$("#select_status").val(status);
</script>

