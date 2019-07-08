 <?php $controller = $this->controller;?>
 <?php

$userMail = session::get('username');

$val = $this->profile;
if (!empty($val)) {
$data = json_decode($val);
foreach ($data as $key => $value) {

$profile_names = $this->CutText(50,$data[$key]->name);
$job_title     = $data[$key]->job_title;
$profile_img   = $this->CutText(50,$data[$key]->logo);
if ($profile_img == 'none')
 {
  $profile_img = "no-profile.png";
 }

$profile_cover = $this->CutText(50,$data[$key]->cover_logo);
     }
 }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo ADMINURL; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo ADMINURL; ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo ADMINURL; ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo ADMINURL; ?>css/skins/_all-skins.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo ADMINURL; ?>bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo ADMINURL; ?>bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo ADMINURL; ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo ADMINURL; ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo ADMINURL; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?php echo ADMINURL; ?>css/AdminLTE.css">
  <link rel="stylesheet" href="<?php echo ADMINURL; ?>css/animate.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

<!-- uploading css -->
<link rel="stylesheet" href="<?php echo ADMINURL; ?>plugins/upload/css/blueimp-gallery.css">
<link rel="stylesheet" href="<?php echo ADMINURL; ?>plugins/upload/css/jquery.fileupload.css">
<link rel="stylesheet" href="<?php echo ADMINURL; ?>plugins/upload/css/jquery.fileupload-ui.css">
<noscript><link rel="stylesheet" href="<?php echo ADMINURL; ?>plugins/upload/css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="<?php echo ADMINURL; ?>plugins/upload/css/jquery.fileupload-ui-noscript.css"></noscript>



  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<?php
if (isset($this->css)) {
  foreach ($this->css as $css) {
?>
<link rel="stylesheet" href="<?php echo ADMINURL.$css; ?>">
<?php
}
}
?>

</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
  <input id="js-file-location" type="hidden" value="<?php echo URL;?>">
  <input id="js-ad-file-location" type="hidden" value="<?php echo ADMINURL;?>">
  <input id="js-site-location" type="hidden" value="<?php echo LINK;?>">
  <input id="caret-position" type="hidden" value="0">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">   </span>
      <!-- logo for regular state and mobile devices -->
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
<?php if ($this->run->getPermisssion($userMail, $per_name="Language", $per_ky = 'k_languag', $page = 'language', $type = 'submenu')) { ?>
          <li class="dropdown messages-menu" id="top-nav-sms-btn">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="languages">
              <i class="fa fa-language"></i>
              <span class="label label-success top-nav-label" id=""><?=LANG?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">List of Languages</li>
              <li>
                <!-- inner menu: contains the actual data -->
              <ul class="menu">

<?php
$val = $this->run->languages();
if (!empty($val)) {
$data = json_decode($val);
foreach ($data as $key => $value) {
?>
    <li>
      <a data-abrev="<?=$data[$key]->abrev?>" class="lang" href="javascript:void(0)">
        <span class="pull-left"><i class="fa fa-language text-aqua"></i> <?=$data[$key]->name;?></span>
  <?php if ($data[$key]->abrev == LANG) { ?>
        <i class="pull-right fa fa-thumbs-o-up"></i>
  <?php } ?>
      </a>
    </li>
<?php
}
}
?>

                </ul>
              </li>
              <li class="footer"><a href="<?php echo LINK; ?>language">Manage languages</a></li>
            </ul>
          </li>
<?php
}
?>


          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo URL;?>all-images/thumbnail/<?php echo $profile_img;?>" class="user-image" alt="User Image">
              <span class="hidden-xs text-uppercase"><?php echo $profile_names;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo URL;?>all-images/thumbnail/<?php echo $profile_img;?>" class="img-circle" alt="User Image">

                <p class="text-uppercase">
                  <?php echo $profile_names;?>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                 <?php if ($this->run->getPermisssion($userMail, $per_name="Your Profile", $per_ky = 'k_yprofile', $page = 'profile', $type = 'submenu')) { ?>
                <div class="pull-left">
                  <a href="<?php echo LINK; ?>profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <?php
                 }
                 ?>
                <div class="pull-right">
                  <a href="<?php echo LINK;?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="profile">

<!-- <div class="profile-cover" style="
background:#000 url('<?php echo URL;?>all-images/thumbnail/<?php echo $profile_cover;?>');
background-repeat: no-repeat;
background-position: center center;
background-size: cover;">
</div> -->

<img src="<?php echo URL;?>all-images/thumbnail/<?php echo $profile_img;?>" class="user-logo">
<div class="user-caption">
  <span class=""><?php echo $profile_names;?></span>
</div>

<div class="user-job-title">
  <span class=""><?php echo $job_title;?></span>
</div>

      </div>





      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

    <?php if ($this->run->getPermisssion($userMail, $per_name="Traffic", $per_key = 'k_traffic', $page = 'none', $type = 'navbar')) { ?>
        <li class="<?php if ($menu == 1) {echo "active";}?> treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Traffic</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <?php if ($this->run->getPermisssion($userMail, $per_name="Web Traffic", $per_key = 'k_sitetraffic', $page = 'index', $type = 'submenu')) { ?>
            <li class="<?php if ($menu == 1 && $semenu == 1) {echo "active";}?>"><a href="<?php echo LINK; ?>index"><i class="fa fa-circle-o"></i> Web Traffic</a></li>
             <?php } ?>
          </ul>
        </li>
    <?php } ?>



 <?php if ($this->run->getPermisssion($userMail, $per_name="Web Contents", $per_key = 'k_stcont', $page = 'none', $type = 'navbar')) { ?>
         <li class="<?php if ($menu == 3) {echo "active";}?> treeview">
          <a href="#">
            <i class="fa fa-globe"></i> <span>Web Contents</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <?php if ($this->run->getPermisssion($userMail, $per_name="Main contents", $per_ky = 'k_mancont', $page = 'content', $type = 'submenu')) { ?>
               <li class="<?php if ($menu == 3 && $semenu == 1) {echo "active";}?>"><a href="<?php echo LINK; ?>content"><i class="fa fa-list-alt"></i>Main contents</a>
                </li>
             <?php } ?>

             <?php if ($this->run->getPermisssion($userMail, $per_name="SDG data", $per_ky = 'k_sdgdata', $page = 'sdgdata', $type = 'submenu')) { ?>
               <li class="<?php if ($menu == 3 && $semenu == 2) {echo "active";}?>"><a href="<?php echo LINK; ?>sdgdata"><i class="fa fa-globe"></i>SDG data</a>
                </li>
             <?php } ?>

              <?php if ($this->run->getPermisssion($userMail, $per_name="Country Profile", $per_ky = 'k_countryprofile', $page = 'countryprofile', $type = 'submenu')) { ?>
               <li class="<?php if ($menu == 3 && $semenu == 3) {echo "active";}?>"><a href="<?php echo LINK; ?>countryprofile"><i class="fa fa-map-o"></i>Country Profiles</a>
                </li>
             <?php } ?>

             <?php if ($this->run->getPermisssion($userMail, $per_name="Downloads", $per_ky = 'k_downloads', $page = 'sdgreport', $type = 'submenu')) { ?>
               <li class="<?php if ($menu == 3 && $semenu == 4) {echo "active";}?>"><a href="<?php echo LINK; ?>sdgreport"><i class="fa fa-building-o"></i>Downloads</a>
                </li>
             <?php } ?>


           </ul>
        </li>
<?php } ?>





 <?php if ($this->run->getPermisssion($userMail, $per_name="Setting", $per_key = 'k_seting', $page = 'none', $type = 'navbar')) { ?>

         <li class="<?php if ($menu == 7) {echo "active";}?> treeview">
          <a href="#">
            <i class="fa fa-wrench"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <?php if ($this->run->getPermisssion($userMail, $per_name="Language", $per_ky = 'k_languag', $page = 'language', $type = 'submenu')) { ?>
            <li class="<?php if ($menu == 7 && $semenu == 2) {echo "active";}?>"><a href="<?php echo LINK;?>language"><i class="fa fa-language"></i>Language</a></li>
            <?php } ?>

            <?php if ($this->run->getPermisssion($userMail, $per_name="Permissions", $per_ky = 'k_permition', $page = 'permission', $type = 'submenu')) { ?>
            <li class="<?php if ($menu == 7 && $semenu == 3) {echo "active";}?>"><a href="<?php echo LINK;?>permission"><i class="fa fa-lock"></i>Permissions</a></li>
             <?php } ?>

            <?php if ($this->run->getPermisssion($userMail, $per_name="Administrator accounts", $per_ky = 'k_clientaccount', $page = 'client', $type = 'submenu')) { ?>
            <li class="<?php if ($menu == 7 && $semenu == 4) {echo "active";}?>"><a href="<?php echo LINK;?>client"><i class="fa fa-suitcase"></i>Administrators</a></li>
            <?php } ?>

            <?php if ($this->run->getPermisssion($userMail, $per_name="Your Profile", $per_ky = 'k_yprofile', $page = 'profile', $type = 'submenu')) { ?>
            <li class="<?php if ($menu == 7 && $semenu == 5) {echo "active";}?>"><a href="<?php echo LINK; ?>profile"><i class="fa fa-user"></i>Your Profile</a></li>
            <?php } ?>



          </ul>
        </li>
   <?php } ?>






      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
