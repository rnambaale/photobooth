<!DOCTYPE html>
<html lang="en">
<head>
    <title>iLabs@MAK Photo Repository</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="iLabs@MAK Photo Repository">
    <meta name="author" content="Frank Odongkara">

    <script type="text/javascript" src="/resources/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/resources/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/uploadify/jquery.uploadify-3.1.min.js"></script>
    <script type="text/javascript" src="/fancybox/jquery.fancybox.pack.js"></script>

    <link type="text/css" href="/resources/css/bootstrap.css" rel="stylesheet"/>
    <link type="text/css" href="/resources/css/style.css" rel="stylesheet"/>
    <link type="text/css" href="/uploadify/uploadify.css" rel="stylesheet"/>
    <link type="text/css" href="/fancybox/jquery.fancybox.css" rel="stylesheet"/>

    <link rel="stylesheet" href="/fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
    <link rel="stylesheet" href="/fancybox/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
    <script type="text/javascript" src="/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="/fancybox/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
    <script type="text/javascript" src="/fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

    <script type="text/javascript">
    $(document).ready(function(){
      var url = location.protocol + "//" + document.domain + "/" + location.pathname.split('/')[1] + "/" + location.pathname.split('/')[2];
      var url2 = location.protocol + "//" + document.domain + "/" + location.pathname.split('/')[1];
      
      $('.nav a').each(function(index) {
        if(this.href.trim() == url || this.href.trim() == url + "/" || this.href.trim() == url2 || this.href.trim() == url2 + "/" )
        $(this).parent('li').addClass('active');
      });

      $(".fancybox").fancybox();
    });
    </script>
</head>
<body>
  <div class="navbar navbar-static-top navbar-inverse">
      <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Photostore</a>
        <div class="nav-collapse collapse">
        <?php if (!$this->ion_auth->logged_in()){ ?>
            <ul class="nav navbar-nav pull-right">
              <li ><a href="/login">LOGIN</a></li>
            </ul>
        <?php }else{
          $user = $this->ion_auth->user()->row(); ?>
            <ul class="nav navbar-nav pull-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user->first_name." ".$user->last_name; ?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="/profile/edit">Edit Profile</a></li>
                  <li><a href="/logout">Logout</a></li>
                </ul>
              </li>
        <?php }?>
        </div>
      </div>
  </div>
  <div class="container">