<div class="content-wrapper">
    <section class="content">
	  	<div class="row">
			<div class="container">
				<div class="col-md-7">
				    <div class="panel panel-default">
				        <div class="panel-heading"><strong>Upload Files</strong> <small></small></div>
				        <div class="panel-body">
				          <!-- Standar Form -->
				          <h4>Select files from your computer</h4>
				          <form action="<?php echo base_url() ?>admin/import/importCandidate" method="post" enctype="multipart/form-data" id="js-upload-form">
				            <div class="form-inline">
				              <div class="form-group">
				                <input type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="files" id="js-upload-files">
				              </div>
				              <button type="button" class="btn btn-sm btn-primary" id="js-upload-submit">Upload files</button>
				            </div>
				          </form>

				          <!-- Drop Zone -->
				          <!-- <h4>Or drag and drop files below</h4>
				          <div class="upload-drop-zone" id="drop-zone">
				            Just drag and drop files here
				          </div> -->

				        </div>
				    </div>
				</div>
				<div class="col-md-5">
		    		<div class="panel panel-default">
		         		<div class="panel-heading"><strong>Download files</strong> <small> </small></div>
		   			<div class="panel-body">
						<a href="<?php echo base_url() ?>public/document/file_mau.xlsx" class="btn btn-labeled btn-primary"> <span class="btn-label"><i class="glyphicon glyphicon-download"></i> </span>Download file mẫu</a>
						<br />
		    		</div>
		    		</div>	
				</div>  
    		</div>
		</div>
	</section>
</div>

<!-- /container --> 
<style type="text/css">
	/* layout.css Style */
.upload-drop-zone {
  height: 200px;
  border-width: 2px;
  margin-bottom: 20px;
}

/* skin.css Style*/
.upload-drop-zone {
  color: #ccc;
  border-style: dashed;
  border-color: #ccc;
  line-height: 200px;
  text-align: center
}
.upload-drop-zone.drop {
  color: #222;
  border-color: #222;
}



.image-preview-input {
    position: relative;
    overflow: hidden;
    margin: 0px;    
    color: #333;
    background-color: #fff;
    border-color: #ccc;    
}
.image-preview-input input[type=file] {
	position: absolute;
	top: 0;
	right: 0;
	margin: 0;
	padding: 0;
	font-size: 20px;
	cursor: pointer;
	opacity: 0;
	filter: alpha(opacity=0);
}
.image-preview-input-title {
    margin-left:2px;
}

</style>
<script type="text/javascript">
	$('#js-upload-submit').click(function(event) {
		// console.log($('#js-upload-files').get(0).files.length);
		if ($('#js-upload-files').get(0).files.length == 0) {
			alert('Bạn chưa chọn file');
		}else{
			$('#js-upload-form').submit();
		}
	});
	

</script>
