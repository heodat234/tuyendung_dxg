<script type="text/javascript">


	var table1 = $('table#user_w').DataTable({
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
	    "bAutoWidth": false,
	    "columnDefs": [
	        { targets: [0], visible: false},
	    ]
	});

	var table2 = $('table#user_c').DataTable({
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
	    "bAutoWidth": false,
	    "columnDefs": [
	        { targets: [0], visible: false},
	    ]
	});
	<?php if($this->uri->segment(4)!='3'){?>
	$('table#user_w tbody').on( 'click', 'tr', function () {
	    var row = table1.row( this ).data();
	    var modal = $('#editUser');
	    if(row[0]&&row[0]!=null)
	    $.ajax({
	    	url: '<?php echo base_url('admin/user/get_user/')?>'+row[0],
	    	dataType: 'json'
	    }).done(function(r){
	        var user = r.data[0];
	        // console.log(user);
	        if(!user)return;
	        modal.find('select[name=status]').find('option[value="'+user['status']+'"]').prop("selected",true);
	        modal.find('input[name=operatorname]').val(user['operatorname']);
	        modal.find('input[name=displayname]').val(user['displayname']);
	        modal.find('input[name=operatorid]').val(user['operatorid']);
	        modal.find('input[name=email]').val(user['email']);
	        modal.find('input[name=mcsmtp]').val(user['mcsmtp']);
	        modal.find('input[name=mcuser]').val(user['mcuser']);
	        modal.find('input[name=mcdomain]').val(user['mcdomain']);
	        modal.find('input[name=mcport]').val(user['mcport']);
	        if(user['mcssl']=='1')modal.find('input[name=mcssl]').prop("checked",true);
	        modal.find('input[name=telephone]').val(user['telephone']);
	        modal.find('input[name=idcard]').val(user['idcard']);
	        modal.find('textarea[name=notes]').html(user['notes']);
	        modal.find('input[name=authorizeid]').val(user['authorizeid']);

	        modal.find('#user_avatar').removeClass('hide').addClass('hide');
			modal.find('#user_profile').removeClass('hide');
	        modal.find('div#user_profile img').attr('src',user['can_image']);
	        modal.find('div#user_profile a').html(user['can_name']);
	        modal.find('input[name=avatar]').remove();
	        modal.modal("show");
	        modal.find('input[name=check_for_email]').prop('checked',true).trigger('change');
	        modal.find('form').attr('act','edit');
	    }).fail(function(r){
	    	console.log(r);
	    });
	} );

	$('table#user_c tbody').on( 'click', 'tr', function () {
	    var row = table2.row( this ).data();
	    var modal = $('#editUser');
	    if(row[0]&&row[0]!=null)
	    $.ajax({
	    	url: '<?php echo base_url('admin/user/get_user/')?>'+row[0],
	    	dataType: 'json'
	    }).done(function(r){
	        var user = r.data[0];
	        if(!user)return;
	        modal.find('select[name=status]').find('option[value="'+user['status']+'"]').prop("selected",true);
	        modal.find('input[name=operatorname]').val(user['operatorname']);
	        modal.find('input[name=displayname]').val(user['displayname']);
	        modal.find('input[name=operatorid]').val(user['operatorid']);
	        modal.find('input[name=email]').val(user['email']);
	        modal.find('input[name=mcsmtp]').val(user['mcsmtp']);
	        modal.find('input[name=mcuser]').val(user['mcuser']);
	        modal.find('input[name=mcdomain]').val(user['mcdomain']);
	        modal.find('input[name=mcport]').val(user['mcport']);
	        if(user['mcssl']=='1')modal.find('input[name=mcssl]').prop("checked",true);
	        modal.find('input[name=telephone]').val(user['telephone']);
	        modal.find('input[name=idcard]').val(user['idcard']);
	        modal.find('textarea[name=notes]').html(user['notes']);
	        modal.find('input[name=authorizeid]').val(user['authorizeid']);

	        modal.find('#user_avatar').removeClass('hide').addClass('hide');
			modal.find('#user_profile').removeClass('hide');
	        modal.find('div#user_profile img').attr('src',user['can_image']);
	        modal.find('div#user_profile a').html(user['can_name']);
	        modal.find('input[name=avatar]').remove();
	        modal.modal("show");
	        modal.find('input[name=check_for_email]').prop('checked',true).trigger('change');
	        modal.find('form').attr('act','edit');
	    }).fail(function(r){
	    	console.log(r);
	    });
	} );
	<?php }?>

	$('form#edit').on('submit',function(){
		var cur  = $(this);
		var form = new FormData(cur[0]);
		// console.log(form);
		for (var [key, value] of form.entries()) {
	      	console.log(key, value);
	    }

	    cur.find('button[type=submit] i').addClass('fa fa-spin fa-spinner');

	    $.ajax({
	    	url: '<?php echo base_url('admin/user/edit')?>',
	    	dataType: 'json',
	    	type: 'post',
	    	data: form,
	    	contentType: false,
          	cache: false,
          	processData:false,
          	timeout: 3000
	    }).done(function(r){
	        console.log(r);
	        if (r.data&&r.data.result) {alert('Cập nhật thành công.');}
	        cur.find('button[type=submit] i').removeClass();
	    }).fail(function(r){
	    	console.log(r);
	    	cur.find('button[type=submit] i').removeClass();
	    });

		return false;
	});

	$("input[name=check_for_email]").change(function() {
	    var ischecked= $(this).is(':checked');
	    if(ischecked){
	    	$('#email_info').removeClass('hide');
	    }else{
	    	$('#email_info').addClass('hide');
	    }
	});

	$('div.avatar').click(function(){
		$(this).before('<input class="hide" type="file" name="avatar" onchange="choosePic(this)">').prev().trigger('click');
	});

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

	$('.modal form').on('submit',function(){
		var act = $(this).attr('act');
		var url = "<?php echo(base_url('admin/user/add_user'))?>";
		if(act=='edit'){
			url = "<?php echo(base_url('admin/user/edit_user'))?>";
		}

		var cur  = $(this);
		var form = new FormData(cur[0]);
		// console.log(form);
		// for (var [key, value] of form.entries()) {
	 //      	console.log(key, value);
	 //    }

	    cur.find('button[type=submit] i').addClass('fa fa-spin fa-spinner');

	    $.ajax({
	    	url: url,
	    	dataType: 'json',
	    	type: 'post',
	    	data: form,
	    	contentType: false,
          	cache: false,
          	processData:false,
          	timeout: 3000
	    }).done(function(r){
	        // console.log(r);
	        if (r.data != -1) {
                window.location.reload();
                cur.find('button[type=submit] i').removeClass();
                cur.find('button[data-dismiss]').trigger('click');
            }else{
                $('#err-user').text(r.message).removeClass('hide');
            }

	    }).fail(function(r){
	    	console.log(r);
	    	cur.find('button[type=submit] i').removeClass();
	    });

		return false;
	});

	function showModal(){
		var modal = $('#editUser');
		modal.find('input').val('').trigger('change');
		modal.find('input[type=checkbox]').prop('checked',false).trigger('change');
		modal.find('select option:first').prop('selected',true).trigger('change');
		modal.find('input[name=avatar]').remove();
		modal.find('img').attr('src','');

		modal.find('input[name=mcsmtp]').val('mail.datxanh.com.vn').trigger('change');

		modal.find('input[name=mcport]').val('587').trigger('change');

		modal.find('#user_avatar').removeClass('hide');
        modal.find('#err-user').addClass('hide');
        modal.find('button[type=submit] i').removeClass('fa fa-spin fa-spinner');
		modal.find('#user_profile').removeClass('hide').addClass('hide');
		modal.modal("show");
	}

</script>