<div class="content-wrapper">
    <section class="content">
	  <div class="row">
	  	<div class="col-md-12 search_box">
        	<div class="box box-default">
	            <div class="box-header">
	            	<form >
	            		<div class="input-group">
	            			<input type="text" name="" class="form-control input_search" placeholder="Search..." onkeyup="searchName(this.value)">
	            			<span class="input-group-btn">
	            				<button type="button" id="search-btn" class="btn btn-flat btn_search"><i class="fa fa-search"></i></button>
	            			</span>
	            		</div>
	            	</form>
	            </div>
	        </div>
	    </div>
		<section class="col-lg-12 connectedSortable padding-lr0">
		    <div style="background-color: #ecf0f5; min-height: 932px">
				<div class="rowedit3" id="dom_ass">
					<?php if (empty($records))echo('Dữ liệu trống.');else foreach($records as $key => $value){?>
					<div class="col-md-4">
						<div class="panel panel-default">
						  	<button type="button" class="btn-icon-top"><i class="fa fa-list color-gray"></i></button>
						  <div class="panel-body height-170">
						    <a href="<?php echo base_url('admin/multiplechoice/detail/').$value['asmttemp']?>">
						    	<p class="title-news"><?php echo($value['asmtname'])?></p>
						    </a>
						    <p class="body-blac2">Ngày tạo: <?php echo(date('d-m-Y',strtotime($value['createddate'])))?> - Bởi <?php echo($value['createdby_name'])?></p>
						    <p class="body-blac3">
						    	<i class="fa fa-file" aria-hidden="true" style="font-size: 15px"></i> 
						    	<a href="#"><?php echo($value['asmttype']=='1'?"Phỏng vấn/Đánh giá":"Trắc nghiệm")?></a>
						    </p>
						    <p class="body-blac3">Trộn tự động: <?php echo($value['shuffle']=='1'?"Có":"Không")?>, 
								Số câu: <?php echo $value['shuffleqty'] ?> câu, Điểm đạt: <?php echo $value['targetscore'] ?>, Thời gian: <?php echo $value['timelimit'] ?> phút</p>
						  </div>
						</div>
					</div>
					<?php }?>
				</div>
			</div>
			<a href="<?php echo base_url()?>admin/multiplechoice/create" class="b-blue" id="myBtn" title="Go to top">
				<i class="fa fa-plus"></i>
			</a>
		</section>	
	  </div>
    </section>
</div>
<script type="text/javascript">
	function searchName(obj) {
 		$.ajax({
 			url: '<?php echo base_url('admin/multiplechoice/searchNameAssessment') ?>',
 			type: 'POST',
 			dataType: 'json',
 			data: {name: obj},
 		})
 		.done(function(data) {
 			// console.log(data);	
 			var dom ='';
 			for(var i in data){
 				var row = data[i];	
		    	if (row['asmttype']) {
		    		var type = 'Phỏng vấn/Đánh giá';
		    	}else{
		    		var type = 'Trắc nghiệm';
		    	}
		    	if (row['shuffle']) {
		    		var tron = 'Có';
		    	}else{
		    		var tron = 'Không';
		    	}
	        	dom += '<div class="col-md-4">\
						<div class="panel panel-default">\
						  	<button type="button" class="btn-icon-top"><i class="fa fa-list color-gray"></i></button>\
						  <div class="panel-body height-170">\
						    <a href="<?php echo base_url('admin/multiplechoice/detail/')?>'+row['asmttemp']+'">\
						    	<p class="title-news">'+row['asmtname']+'</p>\
						    </a>\
						    <p class="body-blac2">Ngày tạo: '+row['createddate']+' - Bởi '+row['createdby_name']+'</p>\
						    <p class="body-blac3">\
						    	<i class="fa fa-file" aria-hidden="true" style="font-size: 15px"></i> \
						    	<a href="#">'+type+'</a>\
						    </p>\
						     <p class="body-blac3">Trộn tự động: '+tron+', \
								Số câu: '+row['shuffleqty']+' câu, Điểm đạt: '+row['targetscore']+', Thời gian: '+row['timelimit']+' phút</p>\
						  </div>\
						</div>\
					</div>';
 			}
 			$('#dom_ass').empty().prepend(dom);
 		})
 		.fail(function() {
 			console.log("error");
 		});
 		
 	}
</script>