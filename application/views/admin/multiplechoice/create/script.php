<script type="text/javascript">
	$('form#create').on('submit',function(){
		var cur  = $(this);
		var form = new FormData(cur[0]);
		console.log(form);
		for (var [key, value] of form.entries()) { 
	      	console.log(key, value);
	    }

	    cur.find('button[type=submit] i').addClass('fa fa-spin fa-spinner');

	    $.ajax({
	    	url: '<?php echo base_url('admin/multiplechoice/add')?>',
	    	dataType: 'json',
	    	type: 'post',
	    	data: form,
	    	contentType: false,
          	cache: false,
          	processData:false,
          	timeout: 3000
	    }).done(function(r){
	        console.log(r);
	        if (r.data&&r.data.id) {window.location.href="<?php echo base_url('admin/multiplechoice/detail/')?>"+r.data.id;}
	        cur.find('button[type=submit] i').removeClass();
	    }).fail(function(r){
	    	console.log(r);
	    	cur.find('button[type=submit] i').removeClass();
	    });

		return false;
	});
</script>