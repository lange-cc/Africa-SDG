  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
<section class="content">
<!-- <div class="nav">
<ul class="path-list">
  <li class="active"><a href="">Automated</a></li>
  <li><a href="">Client</a></li>
</ul>
</div>   -->

<div class="row">
<div class="col-lg-12">

<div class="row">


<?php
$val = $this->data;
if (!empty($val)) {
$data = json_decode($val);
foreach ($data as $key => $value) {
    $number = $key;
    $number = $number+1;
?>

<div id="row_<?php echo $data[$key]->id;?>" class="col-lg-4 product-win">
<div class="mail-col">


<div class="product-content">
<p><span class="fa fa-envelope"></span> <?php  echo $data[$key]->title;?> <?php if (IDSTATUS == 'true') { echo '[id='.$data[$key]->id.']'; } ?></p>
</div>
<div class="">
<p><label>Subject:</label> <?php  echo $data[$key]->subject;?></p>
</div>

<div class="blog-option">
<a href="javascript:void(0)" data-toggle="modal" data-target="#product-update" data-id="<?php  echo $data[$key]->id;?>"  class="update btn-update-product pull-left">
  <span class="product-btn-update">Update</span>
</a>
<!-- <a href="javascript:void(0)" data-id="<?php  echo $data[$key]->id;?>" class="mail-preview"><span class="product-btn-more"><span class="fa fa-eye"></span> Preview</span></a> -->
<a href="javascript:void(0)" data-id="<?php  echo $data[$key]->id;?>" class="product-delete delete pull-right"><span class="product-btn-delete">Delete</span></a>
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
  

<div class="floating-options">
<a href="" data-lang="<?=LANG?>" id="mail-copy"><div href="" class="btn-copy-new" title="Copy content to this language from default language"><i class="fa fa-copy"></i></div></a> 
<a href="" id="add-new-btn"><div href="" class="btn-add-new" >+</div></a> 
</div>

    </section>
    <!-- /.content -->


<div class="add-content-panel">
<div class="ribbon2"> 
 <span class="ribbon-title">Add new content</span>
 <a class="btn-ribbone-close" href=""><span>&times;</span></a>
</div>

<form action="" id="mail-form" method="post">
  <div class="row">
<div class="col-lg-6">
<label >Mail Title</label>
<input name="title" class="form-control" type="text" placeholder="Enter Mail Title" required>
</div>
<div class="col-lg-6">
<label>Mail subject</label>
<input name="subject" class="form-control" type="text" placeholder="Enter Mail Subject" required>
<br>
</div>
  </div>

<label>Enter Email Content</label>
<textarea name="content"  class="txtEditor" placeholder="Enter your content" style="height:300px;"></textarea>
<div class="row">
  <div class="col-lg-5">
<button type="submit" class="btn btn-submit">Add content</button>
</div>
<div class="col-lg-7 notification">

</div>
</div>
</form>


</div>


  </div>
  <!-- /.content-wrapper -->
  </div>






<!-- ================================================================ -->


<div id="product-update" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 800px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update this Mail content</h4>
      </div>
      <div class="modal-body">
        
<form action="" method="post" id="update-mail-form">
<label >Mail Title</label>
<input name="title" class="form-control" id="title" placeholder="Enter Mail Title" required> <br>
<input name="id" id="id" value="" type="hidden"  required>
<label>Mail subject</label>
<input name="subject" class="form-control" id="subject" placeholder="Enter Mail Subject" required> <br>
<label>Upadate Email Content</label>
<textarea name="content"  class="txtEditor" placeholder="Enter your content" style="height:300px;"></textarea>
<br>
<div class="row">
  <div class="col-lg-6">
    <input type="submit" class="btn btn-sl btn-success" value="Update Templete"><br>
    <div class="notification2"></div>
  </div>
  <div class="col-lg-6">

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
