<?php $user = $this->ion_auth->user()->row(); ?>
<div class="row">
<?php if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()){?>
	<div class="col-lg-3">
<!--		<img src="/uploads/images/default.jpg" width="100%" alt="<?php// echo $user->first_name.'-'.$user->last_name; ?>" class="img-thumbnail">-->
		<ul class="nav nav-pills nav-stacked">
		  <li><a href="/">Browse Photos</a></li>
		  <li><a href="/users">User Management</a></li>
		  <li><a href="/shelf">Album Management</a></li>
		  <li><a href="/upload_photos">Upload Photos</a></li>
		</ul>
	</div>
<?php } ?>