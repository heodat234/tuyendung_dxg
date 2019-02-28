<script type="text/javascript">
	
	$(document).ready(function() {
	    $('.js-example-basic-single').select2({ width: '100%' });
	    $('#ngaycap').datetimepicker({
	    	timepicker:false,
	    	format:'d/m/Y'
	    });
	    CKEDITOR.replace('body',{
	    	
	    	allowedContent: true,
	        disableAutoInline: true,
	        toolbarStartupExpanded : false,
	        toolbarCanCollapse: true});

	});
</script>