  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
  

<div class="row">
<div class="col-lg-12">

<div class="row">

<?php
$val = $this->data;
if (!empty($val)) {
$data = json_decode($val);
foreach ($data as $key => $value) {
?>

<div class="col-lg-4" id="row_<?=$data[$key]->id;?>">
  <div class="language-widget">
<div class="language-name">
 <span class="fa fa-user"></span> <?=$data[$key]->name;?>

 <span class="default-lang">Account</span>

</div>
<div class="language-details">
 <span class="fa fa-info-circle"></span> <?=$data[$key]->email?>
</div>
<div class="language-option">
 <ul>
<li><a href="<?=LINK?>permission/user/<?=$data[$key]->email;?>/"  class="add-keywords"><span class="fa fa-lock"></span> Set permission</a></li>

 </ul>
</div>
</div>
</div>
<?php 
}
}
?>




</div>




</div>



</div>
  

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div>

