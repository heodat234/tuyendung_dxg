<script type="text/javascript">
	$(document).ready(function() {
	    $('.js-example-basic').select2({ width: '100%' });
	    var dateNow = new Date();
	    $('.thoihan').datetimepicker({
	    	timepicker:false,
	    	format:'d/m/Y',
	    });
	    CKEDITOR.replace('content',{
	    	allowedContent: true,
	        disableAutoInline: true,
	        toolbarStartupExpanded : false,
	        toolbarCanCollapse: true});
	});
	function rotate(id) {
		for (var i = 1; i <= 9; i++) {
			if(i != id){
				$(".rotate_"+i).removeClass("down"); 
			}
		}
		$(".rotate_"+id).toggleClass("down"); 
	}
</script>