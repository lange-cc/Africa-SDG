  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
<div class="row">

<div clas="col-lg-12">
<?php
$val = $this->data;
if (!empty($val)) {
$data = json_decode($val);
foreach ($data as $key => $value) {
    $number = $key;
    $number = $number+1;
?>

<div class="profile-widget">

<?php
if ($data[$key]->logo == 'none')
 {
  $profile_img = "no-profile.png";
 }
 else
 {
  $profile_img = $data[$key]->logo;
 }
?>
<img src="<?php echo URL;?>all-images/thumbnail/<?php echo $profile_img;?>" class="profile-img">



<h3 class="profile-name "><?php echo $this->CutText(50,$data[$key]->name);?></h3>
<p class="presentation "><?php echo $this->CutText(50,$data[$key]->email);?></p>

<div class="row" style="margin-top: 33px;">
<a href="javascript:void(0)" data-toggle="modal" data-target="#profile-update" data-id="<?php  echo $data[$key]->id;?>" class="profile-btn-update pull-right"><span class="blog-btn-delete">Update</span></a>
<!-- <a href="javascript:void(0)" data-id="<?php  echo $data[$key]->id;?>" class="delete pull-right" style="margin-right: 10px;"><span class="blog-btn-delete">Delete</span></a> -->
</div>

</div>


<?php
 } 
 }  
?>

</div>









</div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div>



<!-- ================================================================ -->
<?php
$val = $this->data;
if (!empty($val)) {
$data = json_decode($val);
foreach ($data as $key => $value) {
    $number = $key;
    $number = $number+1;
?>
<div id="profile-update" class="modal fade" role="dialog">
  <div class="fadeIn blog-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update profile</h4>
      </div>
      <div class="modal-body">
        

<form action="" method="post" id="profile-form-update">
<div class="row">
<div class="col-lg-5">

<label >Name</label>
<input name="names" id="names" class="form-control" placeholder="Enter your names" value="<?php echo $this->CutText(50,$data[$key]->name);?>" required> <br>
<input name="id" id="profile-id" type="hidden"  value="<?php echo $this->CutText(50,$data[$key]->id);?>">

<label >Job Title</label>
<input name="job-title"  id="job-title" class="form-control" placeholder="Enter your job title"value="<?php echo $this->CutText(50,$data[$key]->job_title);?>" required> <br>

<label >Username</label>
<input name="username" id="username" class="form-control" placeholder="Enter your username" value="<?php echo $this->CutText(50,$data[$key]->username);?>" required> <br>

<label >E-mail</label>
<input name="email" id="email" class="form-control" placeholder="Enter E-mail" value="<?php echo $this->CutText(50,$data[$key]->email);?>" required> <br>

<label>Password</label>
<input name="password" id="password" class="form-control" placeholder="Enter Password" value="<?php echo $this->CutText(50,$data[$key]->password);?>" required> <br>


<label>Re-enter Password</label>
<input name="re-password" id="password" class="form-control" placeholder="Enter Password" value="<?php echo $this->CutText(50,$data[$key]->password);?>" required> <br>

</div>
<div class="col-lg-7">

<div class="row">
    <div class="col-lg-12">


<a href="javascript:void(0)" class="profile-update-logo-btn upload-btn" data-type="modal" ><span class="fa fa-pencil"></span></a>
<img src="<?php echo URL;?>all-images/thumbnail/<?php echo $data[$key]->logo;?>" width="250" id="logo-preview2">
<input name="image-name" type="hidden" id ="logo-input2" value="<?php echo $data[$key]->logo;?>">


</div>




</div>
<br><br>
<div class="notification2"></div>

</div>
  </div>





      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-sl btn-update" value="Update your profile">
      </div>
      </form>
    </div>

  </div>
</div>
<?php
 } 
 }  
?>