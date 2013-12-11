<div class="col-lg-9">
      <div class="panel panel-default">
      <div class="panel-heading">Create User</div>
      <div class="panel-body">
      <div id="infoMessage"><?php echo $message;?></div>
      <?php echo form_open("user/create");?>
            <div class="col-lg-6">
                  <div class="form-group">
                        <label>First Name:</label>
                        <?php echo form_input($first_name);?>
                  </div>
                  <div class="form-group">
                        <label>Last Name:</label>
                        <?php echo form_input($last_name);?>
                  </div>
                  <div class="form-group">
                        <label>Email:</label>
                        <?php echo form_input($email);?>
                  </div>
                  <div class="form-group">
                        <label>Company:</label>
                        <?php echo form_input($company);?>
                  </div>
            </div>
            <div class="col-lg-6">
                  <div class="form-group">
                        <label>Phone:</label>
                        <?php echo form_input($phone);?>
                  </div>
                  <div class="form-group">
                        <label>Password:</label>
                        <?php echo form_input($password);?>
                  </div>
                  <div class="form-group">
                        <label>Confirm Password:</label>
                        <?php echo form_input($password_confirm);?>
                  </div>
                  <button class="btn btn-lg btn-primary" type="submit">Register</button>
            </div>
      <?php echo form_close();?>
      </div>
      </div>
</div>