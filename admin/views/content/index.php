  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  

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
<div class="col-lg-4 content-win" id="row_<?php echo $data[$key]->cont_index;?>">
<div class="content-widget">


<!-- <div class="content-cover" style="
background:url('<?php echo URL;?>all-images/thumbnail/<?php echo $profile_cover;?>');
background-repeat: no-repeat;
background-position: center center;
background-size: cover;"><span class="white text-right"><?php if (IDSTATUS == 'true') { echo " ".'[id='.$data[$key]->id.']'; } ?></span></div> -->

<div class="content-information-text">
 <div class="content-title"><?php  echo $data[$key]->type;?> </div>
 <div class="content-data"><?php  echo $data[$key]->content;?></div>
</div>


<div class="content-option">
<div class="row">
<!-- 
<?php if ($this->run->getPermisssion($userMail, $per_name="Site content Update Button", $per_key = 'k_sitescontentupdatebtn', $page = 'content', $type = 'button')) { ?>
<div class="col-lg-4">
<a href="#" data-toggle="modal" data-target="#content-update"  data-id="<?php  echo $data[$key]->id;?>" class="content-update btn-update">Update</a>
</div>
<?php
}
?>

<?php if ($this->run->getPermisssion($userMail, $per_name="Site content Delete Button", $per_key = 'k_sitescontentdeltebtn', $page = 'content', $type = 'button')) { ?>
<div class="col-lg-4">
<a href="" data-link="<?php  echo $data[$key]->cont_index;?>" class="content-delete btn-delete">Delete</a>
</div>
<?php
}
?> -->

<div class="col-lg-12 flex-center">
  <a href="section/search/<?php  echo $data[$key]->cont_index;?>/" class="btn-view"><span>Edit content</span></a>
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
  

<?php if ($this->run->getPermisssion($userMail, $per_name="Site content Add Button", $per_key = 'k_sitescontentaddebtn', $page = 'content', $type = 'button')) { ?>
<div class="floating-options">
<div href="" id="show"  class="btn-add-new" title="Add new content">+</div>
<!-- <a href="" data-lang="<?=LANG?>" id="content-copy"><div href="" class="btn-copy-new" title="Copy content to this language from default language"><i class="fa fa-copy"></i></div></a> -->
</div> 
<?php
}
?> 

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <div class="right-sidebar">
    <h3 class="white">
create new content
    </h3>
<form action="" method="post" id="content-form">
<label>Content type</label>
<input name="type" class="form-control" placeholder="Enter type" required> <br>
<label>Content type</label>
<textarea name="content" class="form-control" placeholder="Enter type" required></textarea>
<br>
<div class="row">
  <div class="col-lg-6">
    <input type="submit" class="btn btn-sl btn-success" value="Add new content">
    <div class="notification white"></div>
  </div>
  <div class="col-lg-6">
    <a href="#" class="hidenow btn btn-sl btn-danger">Cancel</a>
  </div>
</div>
</form>

  </div>


  <div id="content-update" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update content</h4>
      </div>
      <div class="modal-body">
        
<form action="" method="post" id="update-content-form">
<label>Content type</label>
<input name="type" class="form-control" placeholder="Enter type" id="content-type" required> <br>
<input name="id" type="hidden" value="" id="content-id">
<label>Content type</label>
<textarea name="content" class="form-control" placeholder="Enter type" id="content-text" required></textarea>
<br>
<div class="row">
  <div class="col-lg-6">
    <input type="submit" class="btn btn-sl btn-success" value="Update content">
    <div id="msg"></div>
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

