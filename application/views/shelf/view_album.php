<?php
	$user = $this->ion_auth->user()->row();
?>
<?php if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()){?>
<div class="col-lg-12">
<?php }else{?>
<div class="col-lg-9">
<?php }?>
    <div class="panel panel-default">
        <div class="panel-heading">
	        <div class="row">
	        	<div class="col-lg-6">
	        		<div class="pull-left">Browse Photos</div>
	        	</div>
	        	<div class="col-lg-6">
	        		<?php echo $links; ?>
	        	</div>
	        </div>
	    </div>
        <div class="panel-body">
        <div class="row">
        	<?php foreach ($photos as $photo):?>
        		<div class="col-lg-3">
        			<a class="fancybox" rel="group" href="/uploads/<?php echo $photo['name'];?>">
        				<img class="img-thumbnail" width="100%" src="/uploads/<?php echo $photo['name'];?>">
        			</a>
            	</div>
          	<?php endforeach;?>
        </div>
        </div>
    </div>
</div>