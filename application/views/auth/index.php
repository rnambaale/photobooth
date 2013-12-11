<div class="col-lg-9">
	<div class="panel panel-default">
		<div class="panel-heading">User Management</div>
	  	<div class="panel-body">
	  	<a href="#" class="btn btn-success">Add User</a>
	  	<table class="table table-bordered">
	  		<tr>
	  			<th>First Name</th>
	  			<th>Last Name</th>
	  			<th>Email</th>
	  			<th>Phone</th>
	  			<th>Status</th>
	  			<th>Actions</th>
	  		</tr>
	  		<?php foreach ($users as $user):?>
			<tr>
				<td><?php echo $user->first_name;?></td>
				<td><?php echo $user->last_name;?></td>
				<td><?php echo $user->email;?></td>
				<td><?php echo $user->phone;?></td>
				<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
				<td><?php echo anchor("auth/edit_user/".$user->id, 'Edit') ;?></td>
			</tr>
			<?php endforeach;?>
		</table>
	  	</div>
	</div>
</div>