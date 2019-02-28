<div class="ajax-loader">
  <img src="<?php echo base_url() ?>public/image/loading.gif" id="gif" class="img-responsive" >
</div>

<div class="content-wrapper">
    <section class="content">
	  	<div class="row">
			<div class="col-md-4">
			    <div class="panel panel-default">
			        <div class="panel-heading"><strong>Upload File</strong> <small></small></div>
			        <div class="panel-body">
			          <!-- Standar Form -->
			          <h4>Select file from your computer</h4>
			          <form  id="js-upload-form">
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
			
			<div class="col-md-4">
			    <div class="panel panel-default">
			        <div class="panel-heading"><strong>Upload Files CV</strong> <small></small></div>
			        <div class="panel-body">
			          <!-- Standar Form -->
			          <h4>Select multiple files CV from your computer</h4>
			          <form  id="upload-form-cv">
			            <div class="form-inline">
			              <div class="form-group">
			                <input type="file" multiple="" type="file" accept=".pdf,.doc,.docx,.xlsx" name="fileCV[]" id="upload-files-cv">
			              </div>
			              <button type="button" class="btn btn-sm btn-primary" id="btn_uploadCV">Upload files</button>
			            </div>
			          </form>
			        </div>
			    </div>
			</div>

			<div class="col-md-4">
	    		<div class="panel panel-default">
	         		<div class="panel-heading"><strong>Download file</strong> <small> </small></div>
	   			<div class="panel-body">
	   				<h4>Download file to your computer</h4>
					<a href="<?php echo base_url() ?>public/document/file_mau.xlsx" class="btn btn-labeled btn-primary"> <span class="btn-label"><i class="glyphicon glyphicon-download"></i> </span>Download file mẫu</a>
					<br />
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

.ajax-loader {
  visibility: hidden;
  background-color: rgba(255,255,255,0.7);
  position: absolute;
  z-index: +100 !important;
  width: 100%;
  height:100%;
}

.ajax-loader img {
  position: relative;
  top:50%;
  left:50%;
}
</style>
<script type="text/javascript">
	$('#js-upload-submit').click(function(event) {
		// console.log($('#js-upload-files').get(0).files.length);
		if ($('#js-upload-files').get(0).files.length == 0) {
			alert('Bạn chưa chọn file');
		}else{
			$('.ajax-loader').css("visibility", "visible");
			$.ajax({
				url: '<?php echo base_url() ?>admin/import/importCandidate',
				type: 'POST',
				dataType: 'json',
				data: new FormData($('#js-upload-form')[0]),
			      contentType: false,
			      processData: false,
			})
			.done(function() {
				$('.ajax-loader').css("visibility", "hidden");
				$('#js-upload-files').val('');
				alert('Tải nhập ứng viên thành công');
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		}
	});

	$('#btn_uploadCV').click(function(event) {
		// console.log($('#js-upload-files').get(0).files.length);
		if ($('#upload-files-cv').get(0).files.length == 0) {
			alert('Bạn chưa chọn file');
		}else{
			$('.ajax-loader').css("visibility", "visible");
			$.ajax({
				url: '<?php echo base_url() ?>admin/import/importCV',
				type: 'POST',
				dataType: 'json',
				data: new FormData($('#upload-form-cv')[0]),
			    contentType: false,
			    processData: false,
			})
			.done(function(data) {
				if(data == 1){
					$('.ajax-loader').css("visibility", "hidden");
					$('#upload-files-cv').val('');
					alert('Tải file CV thành công');
				}else{
					alert('Tải file CV thất bại');
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		}
	});
	

</script>
