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

<div class="col-lg-4" id="row_<?php echo $data[$key]->id;?>">
<div class="blog-post">
<div class="blog-image" style="height: 220px;
background:#000 url('<?php echo URL;?>all-images/thumbnail/<?php echo $data[$key]->logo;?>');
background-repeat: no-repeat;
background-position: center center;
background-size: cover;">

</div>

<div class="blog-content">
<h4 style="margin-top: 0px;"><?php echo $data[$key]->names;?></h4>
<p class="presentation"><?php echo $this->CutText(50,$data[$key]->job_title);?></p>

<p><?php echo $this->CutText(170,$data[$key]->content);?></p>
</div>
<div class="social-media">
<ul>
<li><a href="<?php echo $this->CutText(100,$data[$key]->facebook);?>"><span class="fa fa-facebook"></span></a></li>
<li><a href="<?php echo $this->CutText(100,$data[$key]->twitter);?>"><span class="fa fa-twitter"></span></a></li>
<li><a href="<?php echo $this->CutText(100,$data[$key]->instagram);?>"><span class="fa fa-instagram"></span></a></li>
<li><a href="mailto:<?php echo $this->CutText(100,$data[$key]->email);?>"><span class="fa fa-envelope"></span></a></li>
</ul>
</div>
<div class="blog-option">
<a href="javascript:void(0)" data-toggle="modal" data-target="#member-update" data-id="<?php  echo $data[$key]->id;?>" class="btn-update-member pull-left"><span class="blog-btn-update">Update</span></a>
<a href="javascript:void(0)" data-id="<?php  echo $data[$key]->id;?>" class="delete pull-right"><span class="blog-btn-delete">Delete</span></a>
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
        <h4 class="modal-title">Add Member</h4>
      </div>
      <div class="modal-body">
        

<form action="" method="post" id="team-form">
<div class="row">
<div class="col-lg-5">

<label >Full Names</label>
<input name="name"  class="form-control" placeholder="Enter names" required> <br>
<input name="id" type="hidden"  value="">

<label >Enter Email</label>
<input name="email"  class="form-control" placeholder="Enter Email" required> <br>

<label >Enter Facebook Link</label>
<input name="facebook"  class="form-control" placeholder="Enter Facebook" required> <br>

<label >Enter Instagram Link</label>
<input name="instagram"  class="form-control" placeholder="Enter Instagram" required> <br>

<label >Enter Twitter Link</label>
<input name="twitter"  class="form-control" placeholder="Enter Twitter" required> <br>

<a href="javascript:void(0)" class="btn btn-sl btn-success upload-btn" data-type="form" >Select profile</a><br><br>
<img src="<?php echo ADMINURL; ?>images/no-image.png" width="250" id="logo-preview">
<input name="image-name" type="hidden"  value="" id="logo-input">


</div>
<div class="col-lg-7">
<label >Enter Job Title</label>
<input name="job"  class="form-control" placeholder="Enter Job Title" required> <br>
<textarea class="txtEditor" name="content"  placeholder="Enter your content" style="height:400px;"></textarea>
<br>
<input type="submit" class="btn btn-sl btn-success" value="save content"><br>
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

<!-- ================================================================ -->

<div id="member-update" class="modal fade" role="dialog">
  <div class="fadeIn blog-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update This Blog Post Content</h4>
      </div>
      <div class="modal-body">
        

<form action="" method="post" id="team-form-update">
<div class="row">
<div class="col-lg-5">

<label >Full Names</label>
<input name="name" id="name" class="form-control" placeholder="Enter names" required> <br>
<input name="id" id="user-id" type="hidden"  value="">

<label >Enter Email</label>
<input name="email" id="email" class="form-control" placeholder="Enter Email" required> <br>

<label >Enter Facebook Link</label>
<input name="facebook" id="facebook" class="form-control" placeholder="Enter Facebook" required> <br>

<label >Enter Instagram Link</label>
<input name="instagram" id="instagram" class="form-control" placeholder="Enter Instagram" required> <br>

<label >Enter Twitter Link</label>
<input name="twitter" id="twitter" class="form-control" placeholder="Enter Twitter" required> <br>

<a href="javascript:void(0)" class="btn btn-sl btn-success upload-btn" data-type="modal" >Change Post Logo</a><br><br>
<img src="<?php echo ADMINURL; ?>images/no-image.png" width="250" id="logo-preview2">
<input name="image-name" type="hidden" id ="logo-input2" value="">
<br>

</div>
<div class="col-lg-7">
<label >Enter Job Title</label>
<input name="job" id="job" class="form-control" placeholder="Enter Job Title" required> <br>
<textarea id="post-content" class="txtEditor" id="content" name="content"  placeholder="Enter your content" style="height:400px;"></textarea>
<br>
<input type="submit" class="btn btn-sl btn-success" value="Update content"><br>
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
