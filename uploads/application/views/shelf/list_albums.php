<?php
	$user = $this->ion_auth->user()->row();
?>
<div class="col-lg-9">
    <div class="panel panel-default">
        <div class="panel-heading">Albums</div>
        <div class="panel-body">
         <a href="/shelf/add-album/" class="btn btn-success">Add Album</a>
        <div class="table-responsive">
        <table class="table table-bordered">
          <tr>
            <th>Name</th>
            <th>Description</th>
            <th colspan="3">Action</th>
          </tr>
          <?php foreach ($albums as $album):?>
          <tr>
            <td><?php echo $album['name'];?></td>
            <td><?php echo $album['description'];?></td>
            <td><a class="btn btn-lg" href="/album/<?php echo $album['id'];?>">View</a></td>
            <td><a class="btn btn-lg" href="/shelf/edit_album/<?php echo $album['id'];?>">Edit</a></td>
            <td><a class="btn btn-lg" href="/shelf/delete_album/<?php echo $album['id'];?>">Delete</a></td>
          </tr>
          <?php endforeach;?>
          </table>
          </div>
        </div>
    </div>
</div>