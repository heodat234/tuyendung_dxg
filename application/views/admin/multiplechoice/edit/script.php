<script type="text/javascript">

	$('#table-dangth').DataTable({
	    "bPaginate": true,
	    "bLengthChange": false,
	    "pageLength": 10,
	    "bFilter": false,
	    "bInfo": false,
	    "language": {
		    "paginate": {
		      	"previous": "<i class='fa fa-angle-double-left' aria-hidden='true'></i>",
		      	"next": "<i class='fa fa-angle-double-right' aria-hidden='true'></i>"
			}
		},
	    "bAutoWidth": false 
	});
	$('#table-daht').DataTable({
	    "bPaginate": true,
	    "bLengthChange": false,
	    "language": {
		    "paginate": {
		      	"previous": "<i class='fa fa-angle-double-left' aria-hidden='true'></i>",
		      	"next": "<i class='fa fa-angle-double-right' aria-hidden='true'></i>"
			}
		},
	    "pageLength": 10,
	    "bFilter": false,
	    "bInfo": false,
	    "bAutoWidth": false
	});
		// "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]

	$(document).on('click','p.add-question',function(){
		var order = $(this).closest('div.v_1');
		var n_que = $('<div class="v_1 e_question"></div>').html($("section.data_source div.e_question").html());
		n_que.find('div[data-type="scores"]').remove();
		order.before(n_que);
	});

	$(document).on('change','select[data-name="questiontype"]',function(){
		var val = $(this).val();
		var order = $(this).closest("div.form_campaign");
		order.next().remove();
		var dom = '';

		if (val=="sights") {
			dom = $("section.data_source div[data-type=sights]").html();
		}else if(val=='scores'){
			dom = $("section.data_source div[data-type=scores]").html();
		}else{
			dom = $("section.data_source div[data-type=text]").html();
		}

		var n_que = $('<div class="row form_campaign"></div>').html(dom);
		
		order.after(n_que);
	});

	$(document).on('click','p.more-answer',function(){
		var copy = $(this).prev();
		var newa = $("<div class='row answer e_answer'></div>").html($("section.data_source div.e_answer:first").html());
		copy.after(newa);
	});

	$(document).on('click','button.more-section',function(){
		var section = $(this).closest('div.e_section');
		var new_sec = $('<div class="v_1 e_section"></div>').html($("section.data_source div.e_section").html());
		new_sec.find('div[data-type="scores"]').remove();
		section.after(new_sec);
	});

	$(document).on('click','button.btn_collapse',function(){
		// console.log($(this)[0]);
		$(this).closest('div.header_vong_cd').next().toggleClass('hide');
		$(this).find('i').hasClass('fa-angle-down')?$(this).find('i').removeClass('fa-angle-down').addClass('fa-angle-right'):$(this).find('i').removeClass('fa-angle-right').addClass('fa-angle-down');
	})

	$(document).on('click',"button.del_section",function(){
		var num = $(this).closest('div.e_section').parent().find('div.e_section').length;
		// console.log(num);
		if (num>1) {
			if (window.confirm("Bạn có chắc chấn muốn xóa?")) {
				$(this).closest('div.e_section').find("button.del_question").each(function(){
					var id = $(this).data("id");
					if(id)del_ques(id);
				});
				$(this).closest('div.e_section').find("button.del_answer").each(function(){
					var id = $(this).data("id");
					if(id)del_ans(id);
				});
				$(this).closest('div.e_section').remove();
			}
		}else{
			alert("Không được xóa phần tử cuối cùng.")
		}
		
		return false;
	});

	$(document).on('click',"button.del_question",function(){
		var num = $(this).closest('div.e_section').find('div.e_question').length;
		// console.log(num);
		if (num>1) {
			if (window.confirm("Bạn có chắc chấn muốn xóa?")) {
				$(this).closest('div.e_question').remove();
				var id = $(this).data("id");
				if(id)del_ques(id);
			}
		}else{
			alert("Không được xóa phần tử cuối cùng.")
		}
		return false;
	});

	$(document).on('click',"button.del_answer",function(){
		var num = $(this).closest('div.e_answer').parent().find('div.e_answer').length;
		// console.log(num);
		if (num>1) {
			if (window.confirm("Bạn có chắc chấn muốn xóa?")) {
				$(this).closest('div.e_answer').remove();
				var id = $(this).data("id");
				if(id)del_ans(id);
				
			}
		}else{
			alert("Không được xóa phần tử cuối cùng.")
		}
		
		return false;
	});

	$('form#edit_asmt').on('submit',function(){
		var cur  = $(this);
		var form = new FormData(cur[0]);
		// console.log(form);
		for (var [key, value] of form.entries()) { 
	      	console.log(key, value);
	    }

	    cur.find('button[type=submit] i').addClass('fa fa-spin fa-spinner');

	    $.ajax({
	    	url: '<?php echo base_url('admin/multiplechoice/edit')?>',
	    	dataType: 'json',
	    	type: 'post',
	    	data: form,
	    	contentType: false,
          	cache: false,
          	processData:false,
	    }).done(function(r){
	        // console.log(r);
	        if (r.data&&r.data.result) {alert('Cập nhật thành công.');}
	        cur.find('button[type=submit] i').removeClass();
	    }).fail(function(r){
	    	console.log(r);
	    	cur.find('button[type=submit] i').removeClass();
	    });

		return false;
	});

	$('form#f_question').on('submit',function(){
		var cur = $(this);
		var form  = cur;
		// console.log(form[0]);

		//rename all input and select 
		var section = 0;
		form.find("div.e_section").each(function(){
			var question = 0;
			$(this).find("textarea,input,select").each(function(){
				if($(this).data("name"))$(this).attr("name","section["+section+"]["+$(this).data("name")+"]");
			});
			$(this).find("div.e_question").each(function(){
				var answer = 0;
				$(this).find("textarea,input,select").each(function(){
					if($(this).data("name"))$(this).attr("name","section["+section+"][question]["+question+"]["+$(this).data("name")+"]");
					if($(this).attr("type")=="file")$(this).attr("name","s"+section+"q"+question); 
				});
				$(this).find("div.e_answer").each(function(){
					console.log(section+' '+question+' '+answer);
					$(this).find("textarea,input,select").each(function(){
						if($(this).data("name"))$(this).attr("name","section["+section+"][question]["+question+"][answer]["+answer+"]["+$(this).data("name")+"]");
						if($(this).attr("type")=="file")$(this).attr("name","s"+section+"q"+question+"a"+answer);
					});
					answer++;
				});
				question++;
			});
			section++;
		});
		///end of edit

		var form = new FormData(form[0]);
		// console.log(form);
		// for (var [key, value] of form.entries()) { 
	 //      	console.log(key, value);
	 //    }

	    cur.find('button[type=submit] i').addClass('fa fa-spin fa-spinner');

	    $.ajax({
	    	url: '<?php echo base_url('admin/multiplechoice/edit_question')?>',
	    	dataType: 'json',
	    	type: 'post',
	    	data: form,
	    	contentType: false,
          	cache: false,
          	processData:false,
	    }).done(function(r){
	        if (r.data&&r.success==true) {
	        	alert('Bạn đã cập nhật thành công');

	        	var asmttemp = form.get('asmttemp');
	        	window.location.href = $('#baseUrl').val()+'admin/multiplechoice/detail/'+asmttemp+'/3';
	        }
	        cur.find('button[type=submit] i').removeClass();
	    }).fail(function(r){
	    	console.log(r);
	    	cur.find('button[type=submit] i').removeClass();
	    });

		return false;
	});

	$(document).on('click','button.btn_img_ans',function(){
		$(this).parent().after('<input class="hide" type="file" onchange="answerPic(this)"/>');
		$(this).parent().next().trigger('click');
	});

	$(document).on('click','button.btn_img_ques',function(){
		$(this).parent().after('<input class="hide" type="file" onchange="questionPic(this)"/>');
		$(this).parent().next().trigger('click');
	});

	$(document).on('click','span.del_img[data-id]',function(){
		var id = $(this).data("id");
		if (window.confirm("Hình ảnh này đã được lưu trong cơ sở dữ liệu, bạn có muốn xóa")) {
	    	if (id)del_img(id);
	    	$(this).parent().prev().removeClass("hide").prop("required",true);
    		$(this).parent().addClass("hide");
    		$(this).prev().attr('src',"").prop("hidden",true);
	    }
    	
	});

	function answerPic(input){
		var img = $(input).parent().prev().find('img');
		if (input.files && input.files[0]) {
            var reader = new FileReader();
            var span = img.next();
            reader.onload = function (e) {
            	img.parent().removeClass("hide");
            	img.parent().prev().addClass("hide").prop("required",false);
                img.attr('src', e.target.result).prop("hidden",false);
            }

            span.on('click',function(){
            	$(this).parent().addClass("hide");
            	img.parent().prev().removeClass("hide").prop("required",true);
            	img.attr('src', "").prop("hidden",true);
            	$(input).remove();
            });
            
            reader.readAsDataURL(input.files[0]);
        }
		// console.log(input);
	}

	function questionPic(input){
		var img = $(input).closest('.header_vong_con').next().find('img:first');
		if (input.files && input.files[0]) {
            var reader = new FileReader();
            var span = img.next();
            reader.onload = function (e) {
            	img.parent().removeClass("hide");
                img.attr('src', e.target.result).prop("hidden",false);
            }

            span.on('click',function(){
            	$(this).parent().addClass("hide");
            	img.attr('src', "").prop("hidden",true);
            	$(input).remove();
            });
            
            reader.readAsDataURL(input.files[0]);
        }
		// console.log(input);
	}

	function del_img(id){
		
		$.ajax({
	    	url: '<?php echo base_url('admin/multiplechoice/del_image')?>',
	    	dataType: 'json',
	    	type: 'post',
	    	data: {id:id},
          	timeout: 3000
	    }).done(function(r){
	        console.log(r);
	        if (r.data&&r.data.success==true) {}
	    });
	}

	function del_ques(id){
		
		$.ajax({
	    	url: '<?php echo base_url('admin/multiplechoice/del_question')?>',
	    	dataType: 'json',
	    	type: 'post',
	    	data: {id:id},
          	timeout: 3000
	    }).done(function(r){
	        console.log(r);
	        if (r.data&&r.data.success==true) {}
	    });
	}

	function del_ans(id){
		
		$.ajax({
	    	url: '<?php echo base_url('admin/multiplechoice/del_answer')?>',
	    	dataType: 'json',
	    	type: 'post',
	    	data: {id:id},
          	timeout: 3000
	    }).done(function(r){
	        console.log(r);
	        if (r.data&&r.data.success==true) {}
	    });
	}
</script>