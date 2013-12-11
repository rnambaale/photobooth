<div class="col-lg-9">
    <div class="panel panel-default">
        <div class="panel-heading">Add Album</div>
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
                        <label>Name</label>
                        <?php echo form_input($name);?>
                    </div>
            	</div>
            	<div class="col-lg-4">
            		<div class="form-group">
                        <label>Description</label>
                        <?php echo form_input($description);?>
                    </div>
            	</div>
            	<div class="col-lg-4">
                    <div class="form-group">
                        <label></label>
                        <input type="submit" class="form-control btn btn-success">
                    </div>
            	</div>
            <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>