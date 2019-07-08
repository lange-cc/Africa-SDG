  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
<div class="row">
<div class="col-lg-12">
<div class="setting-widget">

<a href="javascript:void(0)" class="link-account-btn-add-new">
  <div data-toggle="modal" data-target="#add-admin-account-panel" class="account-btn-add-new">+</div> 
</a>


<div class="row">
  <div class="col-lg-12">
    <p class="text-center">All admin accounts</p>
  </div>

  <?php
$val = $this->data;
if (!empty($val)) {
$data = json_decode($val);
foreach ($data as $key => $value) {
    $number = $key;
    $number = $number+1;
?>
<div class="col-lg-4" id="row_<?php echo $data[$key]->id;?>">
  <div class="setting-user-widget">
    <div class="row">
<div class="col-lg-4">
 <div class="blog-image" style="height: 80px;width: 80px;
background: #000 url('<?php echo URL;?>all-images/thumbnail/<?php echo $data[$key]->logo;?>');
    background-repeat: repeat;
    background-position-x: 0%;
    background-position-y: 0%;
    background-size: auto auto;
background-repeat: no-repeat;
background-position: center center;
background-size: cover;
border-radius: 50%;"></div>
</div>
<div class="col-lg-8">
<label><?php echo $data[$key]->name;?></label><br>
<label>Email: </label><?php echo $data[$key]->email;?><br><br>

<div class="account-options">
<a href="javascript:void(0)" data-toggle="modal" data-target="#update-add-admin-account-panel" data-id="<?php  echo $data[$key]->id;?>" class="update pull-left"><span class="account-admin-btn-update">Update</span></a>
<a href="javascript:void(0)" data-id="<?php  echo $data[$key]->id;?>" class="delete pull-right"><span class="account-admin-btn-delete">Delete</span></a>
</div>
</div>
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



<div class="col-lg-12">
<div class="setting-widget no-padding developer-options">

<div class="row">
<div class="col-lg-12">
<br>
 <p class="text-center">Developer options</p>
</div>
<div class="col-lg-12">
<div class="row">


<div class="col-lg-3">
<div class="option-widget">
<input type="checkbox" name="" id=""> Enable coding
</div>
<br>
</div>

<div class="col-lg-3">
<div class="option-widget">
<input type="checkbox" name="" id="checkbox-for-id" onclick="validate()" <?php if (IDSTATUS == 'true') {echo "checked";} ?> > Display content ID
</div>
<br>
</div>

</div>


</div>
  

</div>
</div>
</div>

<!-- ====================== -->

<div class="col-lg-12">
<div class="setting-widget no-padding developer-options">

<div class="row">
<div class="col-lg-12">
<br>
 <p class="text-center">Labeling option</p>
</div>
<div class="col-lg-12">
<div class="row">


 <?php
  if (!empty($this->label)) {
    $label = json_decode($this->label);
    foreach ($label as $key => $value) {
  ?>

<div class="col-lg-3">
<div class="option-widget">
   <div  class="label-wiget">
      <div class="row">
        <div class="col-lg-12" style="height: 58px;">
           <h5><?=$label[$key]->title?></h5>
        </div>
         <div class="col-lg-12">
           <a href="javascript:void(0)" data-index="<?=$label[$key]->index?>" data-toggle="modal" data-target="#rename-field-widget" class="rename-field-btn pull-left">
            <span class="account-admin-btn-update">Rename field</span>
           </a>
         </div>
      </div> 
   </div>
</div>
<br>
</div>
<?php
   } 
 }
?>


</div>


</div>
  

</div>
</div>
</div>





</div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div>





<div id="add-admin-account-panel" class="modal fade" role="dialog">
  <div class="fadeIn blog-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add new admin account</h4>
      </div>
      <div class="modal-body">
        

<form action="" method="post" id="account-form">
<div class="row">
<div class="col-lg-5">

<label >Name</label>
<input name="names" class="form-control" placeholder="Enter your names" value="" required> <br>
<input name="id" type="hidden"  value="">

<label >Username</label>
<input name="username" class="form-control" placeholder="Enter your username" value="" required> <br>

<label >E-mail</label>
<input name="email" class="form-control" placeholder="Enter E-mail" value="" required> <br>

<label>Password</label>
<input name="password" class="form-control" placeholder="Enter Password" value="" required> <br>


<label>Re-enter Password</label>
<input name="re-password" class="form-control" placeholder="Enter Password" value="" required> <br>

</div>
<div class="col-lg-7">

<div class="row">
    <div class="col-lg-6">
<a href="javascript:void(0)" class="btn btn-sl btn-success upload-btn" data-type="modal" >Add your Profile</a><br><br>
<img src="<?php echo ADMINURL; ?>images/no-image.png" width="250" id="logo-preview2">
<input name="image-name" type="hidden" id ="logo-input2" value="">
</div>
 <div class="col-lg-6">
  <a href="javascript:void(0)" class="btn btn-sl btn-success upload-btn" data-type="modal2" >Add your cover photo</a><br><br>
<img src="<?php echo ADMINURL; ?>images/no-image.png" width="250" id="logo-preview3">
<input name="cover-image-name" type="hidden" id ="logo-input3" value="">
</div>
</div>
<br><br>
<input type="submit" class="btn btn-sl btn-success" value="Create user account"><br>
<div class="notification"></div>

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

<!-- =============================================================================================== -->


<div id="update-add-admin-account-panel" class="modal fade" role="dialog">
  <div class="fadeIn blog-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add new admin account</h4>
      </div>
      <div class="modal-body">
        

<form action="" method="post" id="upadte-account-form">
<div class="row">
<div class="col-lg-5">

<label >Name</label>
<input name="names" id="names" class="form-control" placeholder="Enter your names" value="" required> <br>
<input name="id" id="profile-id" type="hidden"  value="">

<label >Username</label>
<input name="username" id="username" class="form-control" placeholder="Enter your username" value="" required> <br>

<label >E-mail</label>
<input name="email" id="email" class="form-control" placeholder="Enter E-mail" value="" required> <br>

<label>Password</label>
<input name="password" id="password" class="form-control" placeholder="Enter Password" value="" required> <br>


<label>Re-enter Password</label>
<input name="re-password" id="password" class="form-control" placeholder="Enter Password" value="" required> <br>

</div>
<div class="col-lg-7">

<div class="row">
    <div class="col-lg-6">
<a href="javascript:void(0)" class="btn btn-sl btn-success upload-btn" data-type="form" >Change your Profile</a><br><br>
<img src="<?php echo ADMINURL; ?>images/no-image.png" width="250" id="logo-preview">
<input name="image-name" type="hidden" id ="logo-input" value="">
</div>
 <div class="col-lg-6">
  <a href="javascript:void(0)" class="btn btn-sl btn-success upload-btn" data-type="form2" >Change your cover photo</a><br><br>
<img src="<?php echo ADMINURL; ?>images/no-image.png" width="250" id="logo-preview1">
<input name="cover-image-name" type="hidden" id ="logo-input1" value="">
</div>
</div>
<br><br>
<input type="submit" class="btn btn-sl btn-success" value="Update user account"><br>
<div class="notification2"></div>

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


<!-- =============================================================================================== -->


<div id="rename-field-widget" class="modal fade" role="dialog">
  <div class="fadeIn field-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Rename Fields</h4>
      </div>
      <div class="modal-body">
        

<form action="" method="post" id="label-widget-form">
<div class="row">
<div class="col-lg-12">

<label>Rename field 1</label>
<input name="field1" id="field1" class="form-control" placeholder="Field 1" value="" > <br>
<input name="index" id="section-index" type="hidden"  value="">

<label>Rename field 2</label>
<input name="field2" id="field2" class="form-control" placeholder="Field 2" value="" > <br>

<label>Rename field 3</label>
<input name="field3" id="field3" class="form-control" placeholder="Field 3" value="" > <br>

<label>Rename field 4</label>
<input name="field4" id="field4" class="form-control" placeholder="Field 4" value="" > <br>

<label>Add button state</label>
<select name="field5" class="form-control" >
  <option id="field5" value="" selected></option>
  <option value="hide">Hide</option>
  <option value="show">Show</option>
</select>
<br>

<label>Add Article button state</label>
<select name="field6" class="form-control" >
  <option id="field6" value="" selected></option>
  <option value="hide">Hide</option>
  <option value="show">Show</option>
</select>

<br>

<label>UI id(ex: Default)</label>
<input name="field7" id="field7" class="form-control" placeholder="Ex: dbchjs" value="" > <br>


</div>


<div class="col-lg-12">
<br>
<input type="submit" class="btn btn-sl btn-success" value="Save labels"><br>
<div class="status-notification"></div>
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


