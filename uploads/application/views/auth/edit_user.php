<div class="col-lg-9">
      <div class="panel panel-default">
      <div class="panel-heading">Edit Profile</div>
      <div class="panel-body">
            <div id="infoMessage"><?php echo $message;?></div>
            <?php echo form_open(current_url());?>
                  <div class="form-group">
                        <label>First Name</label>
                        <?php echo form_input($first_name);?>
                  </div>
                  <div class="form-group">
                        <label>Last Name</label>
                        <?php echo form_input($last_name);?>
                  </div>
                  <div class="form-group">
                        <label>Email</label>
                        <?php echo form_input($email);?>
                  </div>
                  <div class="form-group">
                        <label>Company</label>
                        <?php echo form_input($company);?>
                  </div>
                  <div class="form-group">
                        <label>Phone</label>
                        <?php echo form_input($phone);?>
                  </div>
                  <div class="form-group">
                        <label>Password: If changing</label>
                        <?php echo form_input($password);?>
                  </div>
                  <div class="form-group">
                        <label>Confirm Password</label>
                        <?php echo form_input($password_confirm);?>
                  </div>
                  <?php echo form_hidden('id', $user->id);?>
                  <?php echo form_hidden($csrf); ?>

                  <p><?php echo form_submit('submit', 'Save User');?></p>

            <?php echo form_close();?>
      </div>
      </div>
</div>