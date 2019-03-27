<script type="text/javascript">
	
	$(document).ready(function() {
	    $('.js-example-basic-single').select2({ width: '100%' });
	    $('#ngaycap').datetimepicker({
	    	timepicker:false,
	    	format:'d/m/Y'
	    });
	    CKEDITOR.replace('body',{
	    	
	    	allowedContent: true,
	    	pasteFilter: 'plain-text',
	        // disableAutoInline: true,
	        // toolbarStartupExpanded : false,
	        // toolbarCanCollapse: true,
	        filebrowserBrowseUrl: '<?php echo base_url('public/ckfinder/ckfinder.html') ?>',
			filebrowserUploadUrl: '<?php echo base_url('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') ?>',
	    	filebrowserImageBrowseUrl : '<?php echo base_url('public/ckfinder/ckfinder.html?type=Images') ?>',
	    	filebrowserFlashBrowseUrl : '<?php echo base_url('public/ckfinder/ckfinder.html?type=Flash') ?>',
	    	filebrowserImageUploadUrl : '<?php echo base_url('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') ?>',
	    	filebrowserFlashUploadUrl : '<?php echo base_url('public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') ?>'
	    });

	});
</script>