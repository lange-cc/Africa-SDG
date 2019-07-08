<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Main content -->
<section class="content">


<!-- new row of action -->

  <div class="row">
<div class="col-lg-12">
 <div class="pane-title">Peoples does not pay</div>
</div>
  </div>
<div class="row">
<div class="col-lg-12">
<div class="row">

<?php
if (!empty($this->UserNotPayed)) {
$all_mails = $this->UserNotPayed;
$email     = json_decode($all_mails);
foreach ($email as $key => $value) {
?>
<div class="col-lg-6">
    <div class="user-widget">
     <div class="user-title">
     <?=$email[$key]->names?>
     </div>
     <div class="user-content">
     <?=$email[$key]->email?>
     </div>
     <div class="user-option">
      <a data-email="<?=$email[$key]->email?>" data-toggle="modal" data-target="#single-mail-sending" class="single-forward-mail-btn" href="">Make recieve message</a>
     </div>
    </div>
</div>
<?php
}}
else
{
  echo "<div class='col-lg-12 not-found'>No user found for this section</div>";
}

?>

</div>

</div>
<div class="col-lg-8">


</div>

</div>

<!-- end row of action -->

<!-- new row of action -->

  <div class="row">
<div class="col-lg-12">
 <div class="pane-title" style="background: #4a690c;">Peoples payed</div>
</div>
  </div>
<div class="row">
<div class="col-lg-10">
<div class="row">

<?php
if (!empty($this->UserPayed)) {
$all_mails = $this->UserPayed;
$email     = json_decode($all_mails);
foreach ($email as $key => $value) {
?>
<div class="col-lg-12">
    <div class="user-widget">
     <div class="user-title">
     <?=$email[$key]->names?>
     </div>
     <div class="user-content">
     <?=$email[$key]->email?>
     </div>
     <div class="user-option" style="background: #4a690c;">
      <a data-email="<?=$email[$key]->email?>"  data-toggle="modal" data-target="#single-mail-sending" class="single-forward-mail-btn" href="">Make recieve message</a>
     </div>
    </div>
</div>
<?php
}}
else
{
  echo "<div class='col-lg-12 not-found'>No user found for this section</div>";
}
?>

</div>

</div>
<div class="col-lg-8">


</div>

</div>

<!-- end row of action -->

<!-- new row of action -->

  <div class="row">
<div class="col-lg-12">
 <div class="pane-title" style="background: #861e96;">Peaple have acount</div>
</div>
  </div>
<div class="row">
<div class="col-lg-12">
<div class="row">



<?php
if (!empty($this->UserWithAccounts)) {
$all_mails = $this->UserWithAccounts;
$email     = json_decode($all_mails);
foreach ($email as $key => $value) {
?>
<div class="col-lg-6">
    <div class="user-widget">
     <div class="user-title">
     <?=$email[$key]->names?>
     </div>
     <div class="user-content">
     <?=$email[$key]->email?>
     </div>
     <div class="user-option" style="background: #861e96;">
      <a data-email="<?=$email[$key]->email?>"  data-toggle="modal" data-target="#single-mail-sending" class="single-forward-mail-btn" href="">Make recieve message</a>
     </div>
    </div>
</div>
<?php
}}
else
{
  echo "<div class='col-lg-12 not-found'>No user found for this section</div>";
}

?>



</div>

</div>
<div class="col-lg-8">


</div>

</div>

<!-- end row of action -->

<div class="floating-button"><a href="" class="btn btn-success forward-mail-btn"><span class="fa fa-volume-up"></span> Broadicast to all</a></div>

</section>


<div class="add-content-panel">
<div class="ribbon2"> 
 <span class="ribbon-title">To: Broadicast to all</span>
 <a class="btn-ribbone-close" href=""><span>&times;</span></a>
</div>

<form action="" id="Send-mail-form" method="post">
<label>Select Section</label>
<select name="section" class="form-control" name="" id="">
<option value="1">User payed</option>
<option value="2">User Not Payed</option>
<option value="3">User have Account</option>
</select><br>
<label>Select From templete</label>
<select class="form-control templete" name="templete" >
<option value="none">None</option>
<?php
$data = $this->data;
$templete = json_decode($data);
foreach ($templete as $key => $value) 
{
?>
<option value="<?=$templete[$key]->id?>"><?=$templete[$key]->title?></option>
<?php
}
?>
</select>
<label>Enter Subject</label>
<input type="text" class="form-control subject" name="subject" >
<label>Enter Content</label>
<textarea name="content"  class="txtEditor" placeholder="Enter your content" style="height:300px;"></textarea>
<div class="row">
  <div class="col-lg-5">
<button type="submit" class="btn btn-submit">Send Message</button>
<br><br>
</div>
<div class="col-lg-7 notification">

</div>
</div>
</form>


</div>

</div>
<!-- ================================================================ -->

<div id="single-mail-sending" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 800px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">To: <span class="email"></span></h4>
      </div>
      <div class="modal-body">
        
<form action="" method="post" id="send-single-form">
<input name="email" class="InputEmail" value="" type="hidden"  required>

<label>Select From templete</label>
<select class="form-control templete" name="templete" >
<option value="none">None</option>
<?php
$data = $this->data;
$templete = json_decode($data);
foreach ($templete as $key => $value) 
{
?>
<option value="<?=$templete[$key]->id?>"><?=$templete[$key]->title?></option>
<?php
}
?>
</select>
<label>Enter Subject</label>
<input type="text" class="form-control subject" name="subject">
<label>Enter Content</label>
<textarea name="content"  class="txtEditor" placeholder="Enter your content" style="height:300px;"></textarea>


<div class="row">
  <div class="col-lg-5">
<button type="submit" class="btn btn-submit">Send Message</button>
</div>
<div class="col-lg-7 notification2">

</div>
</div>

</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
