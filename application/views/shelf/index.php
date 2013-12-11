<?php
	$user = $this->ion_auth->user()->row();
?>
<?php if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()){?>
<div class="col-lg-12">
<?php }else{?>
<div class="col-lg-9">
<?php }?>
    <div class="panel panel-default">
        <div class="panel-heading">Browse Albums</div>
        <div class="panel-body">
        <div class="row">
        	<?php foreach ($albums as $album):?>
        		<div class="col-lg-3">
        		<a href="album/<?php echo $album['id'];?>" style="display:block;background:#EEE;">
        			<img class="img-thumbnail" width="100%" src="<?php if(isset($album['icon'])&&!empty($album['icon'])){echo 'uploads/'.$album['icon'].'.jpg';}else{echo 'resources/img/default.png';}?>">
        		</a>	
            		<b><?php echo $album['name'];?></b>
            	</div>
          <?php endforeach;?>
        </div>
        </div>
    </div>
</div>