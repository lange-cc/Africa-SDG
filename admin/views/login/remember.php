<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo ADMINURL; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo ADMINURL; ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo ADMINURL; ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo ADMINURL; ?>css/AdminLTE.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo ADMINURL; ?>plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page ">

  <input id="js-file-location" type="hidden" value="<?php echo URL;?>">
  <input id="js-ad-file-location" type="hidden" value="<?php echo ADMINURL;?>">
  <input id="js-site-location" type="hidden" value="<?php echo LINK;?>">
  <input id="caret-position" type="hidden" value="0">

<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body">
    <div class="login-logo">
    <a href="../index/"><img src="<?php echo ADMINURL; ?>images/logo.png" width="200"></a>
  </div>
 <h5 class="text-center"> Enter your Email account</h5>
    <form action="#" method="post" id="remember-form">
    
    <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
  
      <div class="row">
        <div class="col-lg-12">
        <p class="loading-logo" style="display:none;"><img src="<?=ADMINURL.'img/loader.gif'?>" class="loading-icon"></p>
        <p class="success-notification success" style="display:none;"></p>
        <p class="fail-notification fail" style="display:none;"></p>
      </div>
      </div>
     
           <button type="submit" class="btn btn-block btn-flat btn-create-account">Remember</button>
     

      <div class="row">
        <div class="col-lg-12">
        <br>
        <span>Already have an account? click </span><a href="<?=LINK?>login"> Here </a> to sign in
        </div>
      </div>
    </form>

    
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo ADMINURL; ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo ADMINURL; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo ADMINURL; ?>plugins/iCheck/icheck.min.js"></script>
<?php
if (isset($this->js)) {
foreach ($this->js as $js) {
?>
<script type="text/javascript" src="<?php echo ADMINURL.$js; ?>"></script>
<?php  
}
}
?>
</body>
</html>
