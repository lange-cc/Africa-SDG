  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
  

<div class="row">
<div class="col-lg-12">
<?php
$value =  $this->data;
$data = json_decode($value);
$account     = $data->account;
$permission  = $data->navbarpermission;
$permission2 = $data->submenupermission;
$permission3 = $data->buttonpermission;

$name  = $account[0]->name;
$email  = $account[0]->email;
?>

<div class="user-widget">
  <h2 class="text-center"><?=$name?></h2>
  <p class="text-center"><?=$email?></p>

<p class="permission-label">
Permissions managment
</p>

<div class="permission-title">
<span class="fa fa-th-large"></span> Navigation bar menu
</div>

<div class="row">
<?php
if ($permission != null) {
 foreach ($permission as $key => $value) {
?>
<div class="col-lg-4">
  <div class="permission-list">
       <div class="checkbox">
       <label> <input type="checkbox" class="ckeckbox" data-id="<?=$permission[$key]->id?>" data-status="<?=$permission[$key]->status?>" <?php if ($permission[$key]->status == 1) { echo "checked"; } ?> > <?=$permission[$key]->name?>  </label>
        </div>
  </div>
</div>
<?php
 }
}
else
{
  echo '<div class="col-lg-12"<p class="text-center">No any permission</p></div>';
}
?>
</div>

<div class="permission-title">
<span class="fa fa-th-large"></span> Sub Navigation bar menu
</div>

<div class="row">
<?php
if ($permission2 != null) {
 foreach ($permission2 as $key => $value) {
?>
<div class="col-lg-4">
  <div class="permission-list">
       <div class="checkbox">
       <label> <input type="checkbox" class="ckeckbox" data-id="<?=$permission2[$key]->id?>" data-status="<?=$permission2[$key]->status?>" <?php if ($permission2[$key]->status == 1) { echo "checked"; } ?> > <?=$permission2[$key]->name?>  </label>
        </div>
  </div>
</div>
<?php
 }
}
else
{
  echo '<div class="col-lg-12"<p class="text-center">No any permission</p></div>';
}
?>
</div>


<div class="permission-title">
<span class="fa fa-th-large"></span> Buttons
</div>

<div class="row">
<?php
if ($permission3 != null) {
 foreach ($permission3 as $key => $value) {
?>
<div class="col-lg-4">
  <div class="permission-list">
       <div class="checkbox">
       <label> <input type="checkbox" class="ckeckbox" data-id="<?=$permission3[$key]->id?>" data-status="<?=$permission3[$key]->status?>" <?php if ($permission3[$key]->status == 1) { echo "checked"; } ?> > <?=$permission3[$key]->name?>  </label>
        </div>
  </div>
</div>
<?php
 }
}
else
{
  echo '<div class="col-lg-12"<p class="text-center">No any permission</p></div>';
}
?>
</div>






</div>

</div>
</div>
  

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div>



