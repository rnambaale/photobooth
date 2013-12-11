<?php
	$user = $this->ion_auth->user()->row();
?>
<div class="col-lg-9">
    <div class="panel panel-default">
        <div class="panel-heading">Upload Photos</div>
        <div class="panel-body">
        	<div class="row">
                <div class="col-lg-12">
                <?php if(!empty($error_message)){ ?>
                    <div class="alert alert-danger"><?php echo $error_message;?></div>
                <?php }elseif (isset($success_message)&&!empty($success_message)) {?>
                    <div class="alert alert-success"><?php echo $success_message;?></div>
                <?php } ?>
                </div>
            </div>
            <div class="row">
            <?php echo form_open(current_url());?>
            	<div class="col-lg-4">
            		<div class="form-group">
                        <label>Select Album</label>
                        <?php echo form_dropdown('album',$albums,'',$album);?>
                    </div>
            	</div>
            	<div class="col-lg-4">
            		<div class="form-group">
                        <label>Select Photos</label>
                        <div id="upload-div" style="display:none;">
                        	<input type="file" name="photofile" id="upload_photos" />
                        </div>
                    </div>
            	</div>
            	<div class="col-lg-4">
                    <div class="form-group">
                        <label>Stream</label>
                        <div class="uploadify-queue" id="photos-queue"></div>
                    </div>
            	</div>
            <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript' >
    $(function(){
    	var albumid = 0;
    	$('.album').change(function(){
			var albumid = $(this).val();
			if (albumid!=0) {
				$('#upload-div').show();
			}else{
				$('#upload-div').hide();
			};
		});

    	$('#upload_photos').uploadify({
    		'debug'   : false,
	      	'swf'   : '<?php echo site_url() ?>uploadify/uploadify.swf',
	      	'uploader'  : '<?php echo site_url('upload/upload_photos')?>',
	      	'cancelImage' : '<?php echo site_url() ?>uploadify/uploadify-cancel.png',
	      	'queueID'  : 'photos-queue',
	      	'buttonClass'  : 'button',
	      	'buttonText' : "Upload Photos",
	      	'multi'   : true,
	      	'auto'   : true,
	      	'fileTypeExts' : '*.jpg; *.png; *.gif; *.PNG; *.JPG; *.GIF;',
	      	'fileTypeDesc' : 'Image Files',
	      	'formData'  : {'sessdata' : '<?php echo $this->ion_auth->user()->row()->id?>','album' : albumid},
	      	'method'  : 'post',
	      	'fileObjName' : 'photofile',
	      	'queueSizeLimit': 300,
	      	'simUploadLimit': 1,
	      	'sizeLimit'  : '20MB',
	    	'onUploadStart' : function(file) {
	    		$("#upload_photos").uploadify('settings', 'formData', {'album' : $('.album').val()});
	    	}
        });
     });
</script>