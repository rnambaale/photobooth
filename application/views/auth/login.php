<div class="row">
  <div class="col-lg-4"></div>
  <div class="col-lg-4 form-box">
    <div id="infoMessage"><?php echo $message;?></div>
    <form method="POST" action="login">
      <div class="form-group">
        <label>Email</label>
        <?php echo form_input($identity);?>
      </div>
      <div class="form-group">
        <label>Password</label>
        <?php echo form_input($password);?>
      </div>
      <label class="checkbox">
        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> Remember me
      </label>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
  </div>
  <div class="col-lg-4"></div>
</div>

<script type="text/javascript">
  function validateEmail(email) { 
    var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return reg.test(email);
  }

  $(document).ready(function() {
    $("#signup").submit(function() { return false; });

    $("#submitreg").on("click", function(){

      var emailval  = $("#email").val();

      var namesval  = $("#names").val();
      var nameslen  = namesval.length;
      var names   = namesval.split(' ');
      var namescnt  = names.length;

      var phoneval    = $("#phone").val();
      var phonelen    = phoneval.length;

      var passwordval    = $("#password").val();
      var passwordlen    = passwordval.length;

      var mailvalid = validateEmail(emailval);
      
      if(mailvalid === false) {
        $("#email").addClass("error");
      }
      else if(mailvalid === true){
        $("#email").removeClass("error");
      }
      if(nameslen == 0) {
        $("#names").addClass("error");
      }
      else if(namescnt <= 1){
        $("#names").addClass("error");
      }
      else if(nameslen >= 0 && namescnt == 2){
        $("#names").removeClass("error");
      }

      if(phonelen != 12) {
        $("#phone").addClass("error");
      }
      else if(phonelen == 12){
        $("#phone").removeClass("error");
      }

      if(passwordlen <= 5) {
        $("#password").addClass("error");
      }
      else if(passwordlen >= 6){
        $("#password").removeClass("error");
      }
      
      if(mailvalid===true && nameslen>=3) {
        $("#submitreg").val("Submitting");
        $.ajax({
          type: 'POST',
          url: '',
          data: $("#signup").serialize(),
          success: function(data) {
            if(data == "true") {
              $("#signup").fadeOut("fast", function(){
                $(this).before("You have successfuly registered. Check your email for details.");
              });
            }
            else{
              $("#signup").fadeOut("fast", function(){
              $(this).before("<b>:)</b> Sorry there was an error during registration. Please try again.");
              });
            }
          }
        });
      }
    });
  });
</script>