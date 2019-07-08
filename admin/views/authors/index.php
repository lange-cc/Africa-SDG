  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
<div class="row">

<?php
$val = $this->data;
if (!empty($val)) {
$data = json_decode($val);
foreach ($data as $key => $value) {
    $number = $key;
    $number = $number+1;
?>
<div class="col-lg-3 author-col-padding" id="row_<?php echo $data[$key]->id;?>">
 <div class="author-widget-win">
<div class="author-cover">

</div>
<img src="<?php echo URL;?>all-images/thumbnail/<?php echo $data[$key]->logo;?>" class="author-logo">
<br>
<div class="author-widget">
<div class="author-name">
<h4 class="text-right"><?php echo $data[$key]->name;?></h4>
<p><?php echo $this->CutText(100,$data[$key]->description);?></p>
</div>
<div class="author-potforio">
<!--<span class="label label-xs label-success">4 articles</span> -->
</div>
 </div>

<div class="author-option">

<a href="javascript:void(0)" data-toggle="modal" data-target="#update-modal" data-id="<?php  echo $data[$key]->id;?>" class="btn-author-update pull-left">Update</a>
<a href="javascript:void(0)" data-id="<?php  echo $data[$key]->id;?>" class="btn-author-delete pull-right">Delete</a>

</div>
  </div>
</div>

<?php
 } 
 }  
?>



</div>

<div class="floating-options">
<div href="" data-toggle="modal" data-target="#new-member-modal" class="btn-add-new">+</div>
</div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div>



<div id="new-member-modal" class="modal fade" role="dialog">
  <div class="fadeIn blog-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">  Add new author</h4>
      </div>
      <div class="modal-body">
        

<form action="javascript:void(0)" method="post" id="author-form">


  <div class="row">
<div class="col-lg-5">

<label >Author name</label>
<input name="name"  class="form-control" placeholder="Enter author name" required> <br>
<input name="id" type="hidden"  value="">

<a href="javascript:void(0)" class="btn btn-sl btn-success upload-btn" data-type="form" >Add author Logo</a><br><br>
<img src="<?php echo ADMINURL; ?>images/no-image.png" width="250" id="logo-preview">
<input name="image-name" type="hidden"  value="" id="logo-input">

<br><br>


<div class="row">
  <div class="col-lg-6">
    <input type="submit" class="btn btn-sl btn-success" value="Add author"><br>
    <div class="notification"></div>
  </div>
  <div class="col-lg-6">
    
  </div>
</div>


</div>
<div class="col-lg-7">
<label>author description</label>
<br>
<textarea class="txtEditor" name="content"  placeholder="Enter your content" style="height:400px;"></textarea>


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

<!-- ================================================================ -->

<div id="update-modal" class="modal fade" role="dialog">
  <div class="fadeIn blog-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">  Update this author</h4>
      </div>
      <div class="modal-body">
        

<form action="javascript:void(0)" method="post" id="update-author-form">


  <div class="row">
<div class="col-lg-5">

<label >Author name</label>
<input name="name"  class="form-control" placeholder="Enter Post Title" required id="author-name"> <br>
<input name="id" type="hidden"  value="" id="author-id">

<a href="javascript:void(0)" class="btn btn-sl btn-success upload-btn" data-type="modal" >Change author Logo</a><br><br>
<img src="<?php echo ADMINURL; ?>images/no-image.png" width="250" id="logo-preview2">
<input name="image-name" type="hidden"  value="" id="logo-input2">

<br><br>


<div class="row">
  <div class="col-lg-6">
    <input type="submit" class="btn btn-sl btn-success" value="Update author"><br>
    <div class="notification2"></div>
  </div>
  <div class="col-lg-6">
    
  </div>
</div>


</div>
<div class="col-lg-7">
<label>author description</label>
<br>
<textarea class="txtEditor" name="content"  placeholder="Enter your content" style="height:400px;"></textarea>


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