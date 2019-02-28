var url = "http://tuyendung.datxanh.com.vn/admin/user/";
var base_url = "http://tuyendung.datxanh.com.vn/";
var modal = $('\
	<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">\
    <div class="modal-dialog modal-60"  role="document" style="width:850px;">\
        <div class="modal-content">\
		    	<div class="row">\
		       		<div class="col-md-12">\
		       			<form id="user_acc" act="">\
		       				<input type="hidden" name="operatorid">\
				            <div class="panel-group" id="accordion">\
				            	<div class="panel panel-default border-rad0">\
							    	<div class="panel-heading rad-pad0 b-blue"> \
							       			<!-- <i class="fa fa-angle-right a-tabcs rotate rotate_1 down"></i> -->\
							       		<div class="ul-nav">\
									       	<label class="tittle-tab" style="font-size: 17px;margin-bottom: 15px">\
									       		Thông tin tài khoản đăng nhập\
									       	</label>\
							       		</div>\
							    	</div>\
								    <div id="collapse1" class="panel-collapse collapse in">\
								      	<div class="panel-body ">\
								      		<div class="row form_campaign">\
								      			<div class="col-xs-3">\
								      				<label class="label_cam"> Tên đăng nhập</label>\
								      			</div>\
								      			<div class="col-xs-4">\
								      				<input type="text" class="textbox" name="displayname" value="">\
								      			</div>\
								      			<div class="col-xs-3">\
								      				<button type="button" class="btn btn_tk">\
								      					<i class="fa fa-lock"></i> \
								      				Khôi phục tài khoản</button>\
								      			</div>\
								      		</div>\
								      		<div class="row form_campaign">\
								      			<div class="col-xs-3">\
								      				<label class="label_cam"> Nhóm</label>\
								      			</div>\
								      			<div class="col-xs-4">\
								      				<select class="textbox" name="groupid">\
								      					\
								      				</select>\
								      			</div>\
								      		</div>\
								      		<div class="row form_campaign">\
								      			<div class="col-xs-3">\
								      				<label class="label_cam"> Trạng thái</label>\
								      			</div>\
								      			<div class="col-xs-4">\
								      				<select class="textbox" name="status">\
								      					<option value="W">Đang hoạt động</option>\
								      					<option value="C">Ngưng hoạt động</option>\
								      				</select>\
								      			</div>\
								      		</div>\
								      	</div>\
								      	<div class="panel-body ">\
								      		<div class="row form_campaign">\
								      			<div class="col-xs-3">\
								      				<label class="label_cam"> Tên tài khoản</label>\
								      			</div>\
								      			<div class="col-xs-4">\
								      				<input type="text" required="" class="textbox" name="operatorname" value="">\
								      			</div>\
								      		</div>\
								      		<div class="row form_campaign">\
								      			<div class="col-xs-3">\
								      				<label class="label_cam"> Địa chỉ e-mail</label>\
								      			</div>\
								      			<div class="col-xs-4">\
								      				<input type="email" class="textbox" name="email" value="">\
								      			</div>\
								      		</div>\
								      		<div class="row form_campaign">\
								      			<div class="col-xs-3">\
								      				<label class="label_cam">\
								      					<input type="checkbox" name="check_for_email"> \
								      				Cấu hình email gửi nhận</label>\
								      			</div>\
								      		</div>\
								      	</div>\
								      	<div id="email_info" class="panel-body hide" style="background: #f6f6f6;">\
								      		<div class="row form_campaign">\
								      			<div class="col-xs-3">\
								      				<label class="label_cam"> SMTP Server</label>\
								      			</div>\
								      			<div class="col-xs-4">\
								      				<input type="text" class="textbox" name="mcsmtp" value="">\
								      			</div>\
								      		</div>\
								      		<div class="row form_campaign">\
								      			<div class="col-xs-3">\
								      				<label class="label_cam"> Tên đăng nhập</label>\
								      			</div>\
								      			<div class="col-xs-4">\
								      				<input type="text" class="textbox" name="mcuser" value="">\
								      			</div>\
								      		</div>\
								      		<div class="row form_campaign">\
								      			<div class="col-xs-3">\
								      				<label class="label_cam"> Mật khẩu</label>\
								      			</div>\
								      			<div class="col-xs-4">\
								      				<input type="password" class="textbox" name="mcpass" value="">\
								      			</div>\
								      		</div>\
								      		<div class="row form_campaign">\
								      			<div class="col-xs-3">\
								      				<label class="label_cam"> Domain</label>\
								      			</div>\
								      			<div class="col-xs-4">\
								      				<input type="text" class="textbox" name="mcdomain" value="">\
								      			</div>\
								      		</div>\
								      		<div class="row form_campaign">\
								      			<div class="col-xs-3">\
								      				<label class="label_cam"> Port</label>\
								      			</div>\
								      			<div class="col-xs-4">\
								      				<input type="text" class="textbox" name="mcport" value="">\
								      			</div>\
								      		</div>\
								      		<div class="row form_campaign">\
								      			<div class="col-xs-3">\
								      				<label class="label_cam"></label>\
								      			</div>\
								      			<div class="col-xs-6">\
								      				<label class="checkbox-inline">\
								      					<input type="checkbox" name="mcssl" value="" style="margin-top:5px !important;"> \
								      				Cho phép SSL</label>\
								      			</div>\
								      		</div>\
								      	</div>\
								      	<div class="panel-body ">\
								      		<div class="row form_campaign">\
								      			<div class="col-xs-3">\
								      				<label class="label_cam"> Điện thoại</label>\
								      			</div>\
								      			<div class="col-xs-4">\
								      				<input type="text" class="textbox" name="telephone" value="">\
								      			</div>\
								      		</div>\
								      		<div class="row form_campaign">\
								      			<div class="col-xs-3">\
								      				<label class="label_cam"> CMND/ CCCD</label>\
								      			</div>\
								      			<div class="col-xs-4">\
								      				<input type="text" class="textbox" name="idcard" value="">\
								      			</div>\
								      		</div>\
								      		<div class="row form_campaign">\
								      			<div class="col-xs-3">\
								      				<label class="label_cam">Ghi chú</label>\
								      			</div>\
								      			<div class="col-xs-4">\
								      				<textarea name="notes" rows="2" style="width:89%;border: 1px solid #ddd"></textarea>\
								      			</div>\
								      		</div>\
								      		<div class="row form_campaign">\
								      			<div class="col-xs-3">\
								      				<label class="label_cam"> ERP/ Authorize id</label>\
								      			</div>\
								      			<div class="col-xs-4">\
								      				<input type="text" class="textbox" name="authorizeid" value="">\
								      			</div>\
								      		</div>\
								      		<div class="row form_campaign" id="user_avatar">\
								      			<div class="col-xs-3">\
								      				<label class="label_cam"> Avatar</label>\
								      			</div>\
								      			<div class="col-xs-4">\
\								      				<div class="avatar">\
								      					<img src="" alt=" " width="100" height="100">\
								      				</div>\
								      				\
								      				<a href="#"></a>\
								      			</div>\
								      		</div>\
								      		<div class="row form_campaign" id="user_profile">\
								      			<div class="col-xs-3">\
								      				<label class="label_cam"> Hồ sơ ứng viên</label>\
								      			</div>\
								      			<div class="col-xs-4">\
\								      				<div class="profile">\
								      					<img src="" alt=" " width="100" height="100">\
								      				</div>\
								      				\
								      				<a href="#"></a>\
								      			</div>\
								      		</div>\
								      	</div>\
								    </div>\
							  	</div>\
							</div>\
							<div class="box_btn">\
								<div class=" pull-right">\
									<button class="btn btn-warning" id="btn_destroy"> Huỷ</button> \
									<button type="submit" class="btn btn_tt"><i></i> Lưu</button>\
								</div>\
							</div>\
						</form>\
			            <!-- /.box-body -->\
			        </div>\
		    	</div>\
		</div>\
	</div>\
</div>\
');

window.showUserProfileModal = function(id) {
	$.ajax({
	    	url: url+'get_user/'+id,
	    	dataType: 'json'
	    }).done(function(r){
	        console.log(r);
	        var user = r.data[0];
	        if(!user)return;
	        modal.find('select[name=groupid]').append($('<option value="'+user['groupid']+'">'+user['groupname']+'</option>'));
	        modal.find('select[name=status]').find('option[value="'+user['status']+'"]').prop("selected",true);
	        modal.find('input[name=operatorname]').val(user['operatorname']);
	        modal.find('input[name=displayname]').val(user['displayname']);
	        modal.find('input[name=operatorid]').val(user['operatorid']);
	        modal.find('input[name=email]').val(user['email']);
	        modal.find('input[name=mcsmtp]').val(user['mcsmtp']);
	        modal.find('input[name=mcuser]').val(user['mcuser']);
	        modal.find('input[name=mcpass]').val('******');
	        modal.find('input[name=mcdomain]').val(user['mcdomain']);
	        modal.find('input[name=mcport]').val(user['mcport']);
	        if(user['mcssl']=='1')modal.find('input[name=mcssl]').prop("checked",true);
	        modal.find('input[name=telephone]').val(user['telephone']);
	        modal.find('input[name=idcard]').val(user['idcard']);
	        modal.find('textarea[name=notes]').html(user['notes']);
	        modal.find('input[name=authorizeid]').val(user['authorizeid']);

	        modal.find('#user_profile').removeClass('hide').addClass('hide');
			modal.find('#user_avatar').removeClass('hide');
	        modal.find('div#user_avatar img').attr('src','http://tuyendung.datxanh.com.vn/public/image/'+user['avatar']);
	        modal.find('input[name=avatar]').remove();
	        modal.modal("show");
	        modal.find('input[name=check_for_email]').prop('checked',true).trigger('change');
	        modal.find('form').attr('act','edit');
	    }).fail(function(r){
	    	console.log(r);
	    });
	modal.on("hidden", function(){
	          modal.remove();
	    });

	modal.find("input[name=check_for_email]").on('change',function() {
	    var ischecked= $(this).is(':checked');
	    // console.log(ischecked);
	    if(ischecked){
	    	modal.find('#email_info').removeClass('hide');
	    }else{
	    	modal.find('#email_info').addClass('hide');
	    }
	}); 

	modal.find('#btn_destroy').click(function(){
		modal.remove();
	    $('.modal-backdrop').remove();
	});

	var form = modal.find('form');
	form.on('submit',function(){
		var cur  = $(this);
		var form = new FormData(cur[0]);
		// console.log(form);
		// for (var [key, value] of form.entries()) { 
	 //      	console.log(key, value);
	 //    }

	    cur.find('button[type=submit] i').addClass('fa fa-spin fa-spinner');

	    $.ajax({
	    	url: url+'edit_user/1',
	    	dataType: 'json',
	    	type: 'post',
	    	data: form,
	    	contentType: false,
          	cache: false,
          	processData:false,
          	timeout: 3000
	    }).done(function(r){
	        // console.log(r);
	        if (r.data) {alert('Change have been successfuly saved!!');window.location.href = base_url+'login.html';}
	        cur.find('button[type=submit] i').removeClass();
	        cur.find('button[data-dismiss]').trigger('click');
	        modal.remove();
	        $('.modal-backdrop').remove();
	    }).fail(function(r){
	    	console.log(r);
	    	cur.find('button[type=submit] i').removeClass();
	    });

		return false;
	});

	modal.find('div.avatar').click(function(){
		$(this).before('<input class="hide" type="file" name="avatar" onchange="choosePic(this)">').prev().trigger('click');
	});
	
}
function choosePic(input){
		var img = $(input).next().find('img');
		if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                img.attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
		console.log(input);
	}


var modalPass = $('\
	<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">\
    <div class="modal-dialog modal-60"  role="document" style="width:600px;">\
        <div class="modal-content">\
		    	<div class="row">\
		       		<div class="col-md-12">\
		       			<form id="user_acc" act="">\
		       				<input type="hidden" name="operatorid">\
				            <div class="panel-group" id="accordion">\
				            	<div class="panel panel-default border-rad0">\
							    	<div class="panel-heading rad-pad0 b-blue"> \
							       			<!-- <i class="fa fa-angle-right a-tabcs rotate rotate_1 down"></i> -->\
							       		<div class="ul-nav">\
									       	<label class="tittle-tab" style="font-size: 17px;margin-bottom: 15px">\
									       		Thông tin tài khoản đăng nhập\
									       	</label>\
							       		</div>\
							    	</div>\
								    <div id="collapse1" class="panel-collapse collapse in">\
								      	<div class="panel-body ">\
								      		<div class="row form_campaign">\
								      			<div class="col-xs-4">\
								      				<label class="label_cam"> Nhập mật khẩu cũ</label>\
								      			</div>\
								      			<div class="col-xs-8">\
								      				<input required type="password" class="textbox" name="oldpass" value="">\
								      			</div>\
								      			\
								      		</div>\
								      		<div class="row form_campaign">\
								      			<div class="col-xs-4">\
								      				<label class="label_cam"> Mật khẩu mới</label>\
								      			</div>\
								      			<div class="col-xs-8">\
								      				<input required type="password" class="textbox" name="newpass" value="">\
								      			</div>\
								      		</div>\
								      		<div class="row form_campaign">\
								      			<div class="col-xs-4">\
								      				<label class="label_cam"> Nhập lại mật khẩu</label>\
								      			</div>\
								      			<div class="col-xs-8">\
								      				<input required type="password" class="textbox" name="renewpass" value="">\
								      			</div>\
								      		</div>\
								      	</div>\
								      	\
								    </div>\
							  	</div>\
							</div>\
							<div class="box_btn">\
								<div class=" pull-right">\
									<button class="btn btn-warning" id="btn_destroy"> Huỷ</button> \
									<button type="submit" class="btn btn_tt"><i></i> Lưu</button>\
								</div>\
							</div>\
						</form>\
			            <!-- /.box-body -->\
			        </div>\
		    	</div>\
		</div>\
	</div>\
</div>\
');

window.showUserPasswordModal = function(id) {
	
	modalPass.modal('show').on("hidden", function(){
	          modalPass.remove();
	    });
	modalPass.find('#btn_destroy').click(function(){
		modalPass.remove();
	    $('.modal-backdrop').remove();
	});

	var form = modalPass.find('form');
	form.on('submit',function(){
		var cur  = $(this);
		var form = new FormData(cur[0]);
		// console.log(form);
		for (var [key, value] of form.entries()) { 
	      	console.log(key, value);
	    }

	    if(form.get('newpass')!=form.get('renewpass')){
	    	alert('Repassword is not correct.');
	    	return false;
	    }

	    cur.find('button[type=submit] i').addClass('fa fa-spin fa-spinner');
	    form.set('operatorid',id);
	    $.ajax({
	    	url: url+'change_password/',
	    	dataType: 'json',
	    	type: 'post',
	    	data: form,
	    	contentType: false,
          	cache: false,
          	processData:false,
          	timeout: 3000
	    }).done(function(r){
	        console.log(r);
	        if (r.data) {alert('Change have been successfuly saved!!');}
	        cur.find('button[type=submit] i').removeClass();
	        cur.find('button[data-dismiss]').trigger('click');
	        modalPass.remove();
	        $('.modal-backdrop').remove();
	    }).fail(function(r){
	    	console.log(r);
	    	cur.find('button[type=submit] i').removeClass();
	    });

		return false;
	});
	
}
