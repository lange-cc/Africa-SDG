  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->



    <!-- Main content -->
    <section class="content">
     <div class="row">

<?php

  $data = json_decode($this->data);
  foreach ($data as $key => $value)
    {

      $ext = pathinfo($data[$key]->file, PATHINFO_EXTENSION);

       if ($ext == 'pdf') {
          $file_url = ADMINURL.'images/pdf-icon.png';
       }
       else if ($ext == 'xlsx') {
          $file_url = ADMINURL.'images/excel-icon.png';
       }
       else if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
          $file_url = URL."all-images/thumbnail/".$data[$key]->file;
       }
       else
       {
          $file_url = ADMINURL.'images/no-preview.jpg';
       }

?>
          <div class="col-lg-3" style="padding-bottom: 10px;" id="card_<?=$data[$key]->id?>">
         <div class="sdgcard" style="min-height: 240px;padding: 15px;">
           <div class="sdgcard-logo" style="
              background:#fff url('<?=$file_url?>');
              background-repeat: no-repeat;
              background-position: center center;
              background-size: contain;">
           </div>
           <div class="sdgcard-title" style="font-size: 14px;">
              <b><?=$data[$key]->title?></b>

           </div>
           <div class="file-name">
             <label>File name</label><br>
             <?=$data[$key]->file?>
           </div>
           <div class="sdgcard-option">


<?php if ($this->run->getPermisssion($userMail, $per_name="SDG Report Delete Button", $per_key = 'k_sdgreportdeletebtn', $page = 'sdgdata', $type = 'button')) { ?>
<a href="javascript:void(0)"  data-id="<?=$data[$key]->id?>" class="anouncement-trash-btn delete"><span class="fa fa-trash"></span></a>
<?php }?>


<a href="javascript:void(0)"  data-id="<?=$data[$key]->id?>" data-toggle="modal" data-target="#add-file-modal" class="add-file-btn"><span class="fa fa-file-text-o"></span></a>




  <?php if ($this->run->getPermisssion($userMail, $per_name="SDG Report Update Button", $per_key = 'k_sdgreportupdatebtn', $page = 'sdgdata', $type = 'button')) { ?>
<a href="javascript:void(0)"  data-toggle="modal" data-target="#update-report-modal" data-id="<?=$data[$key]->id?>" class="announcement-update-btn update"><span class="fa fa-pencil"></span></a>

  <?php
             }
          ?>

           </div>
         </div>
       </div>
<?php
   }
?>





      </div>
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->


<?php if ($this->run->getPermisssion($userMail, $per_name="SDG Report Add Button", $per_key = 'k_sdgreportaddbtn', $page = 'sdgdata', $type = 'button')) { ?>
<div class="floating-options">
<div href="" id="show"  data-toggle="modal" data-target="#report-modal" class="btn-add-new" title="Add new content">+</div>
<!-- <a href="" data-lang="<?=LANG?>" id="content-copy"><div href="" class="btn-copy-new" title="Copy content to this language from default language"><i class="fa fa-copy"></i></div></a> -->
</div>
<?php
   }
?>




<div id="report-modal" class="modal fade" role="dialog">
  <div class="fadeIn">

    <!-- Modal content-->
    <div class="modal-content report-modal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add new Report</h4>
      </div>
      <div class="modal-body">


<form action="" method="post" id="report-form">
<div class="row">
<div class="col-lg-12">

<label>Name of Report</label>
<input name="title"  class="form-control" placeholder="Enter name" required> <br>

<label>Select years</label>
<select name="year"  class="form-control">
<?php
  for ($year=2018; $year <= date('Y'); $year++) {
   ?>
<option value="<?=$year?>">Raport <?=$year?> </option>
   <?php
  }
?>

</select>
 <br>

<label>Select report section</label>
<select name="rep-section"  class="form-control">
<option value="Reports">Reports</option>
<option value="Data">Data</option>
<option value="Metadata">Metadata</option>
</select>
 <br>

<a href="javascript:void(0)" class="btn btn-sl btn-success upload-btn" data-type="form" >Select file</a>
<img src="" width="50" alt="No file selected" id="logo-preview">
<input name="file" type="hidden"  value="" id="logo-input">
<br><br><br>

<label>Report description</label>
<textarea id="txtEditor" name="content"  placeholder="Enter your content" style="height:500px;"></textarea>
<br>


<input type="submit" class="btn btn-sl btn-success" value="Save Report"><br>
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


<!-- ======================================================================= -->


<div id="add-file-modal" class="modal fade" role="dialog">
  <div class="fadeIn">

    <!-- Modal content-->
    <div class="modal-content add-file-modal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add other report files</h4>
      </div>
      <div class="modal-body">

<fieldset class="Download-other-widget">
  <div class="row">

    <div class="col-lg-12">
      <form action="<?=LINK?>sdgreport/AddFiles/" id="other-file-form" method="POST" enctype="multipart/form-data">
        <label>Title</label><br>
        <input type="text" placeholder="ex: Download our next report" name="title" class="empty form-control"><br>
        <input type="file" id="other-file-input" class="empty">
        <input type="hidden" name="file" value="" id="report_file_name">
        <input type="hidden" name="report-id" value="" id="report-id"><br>
        <div class="notification empty"></div> <br>
<input type="submit" class="btn btn-sl btn-success" value="Add file"><br>
      </form>
    </div>
  
    <div class="col-lg-12">
      <hr> 
       <ul class="selected-file">
    
       </ul>
    </div>
  </div>
</fieldset>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- ========================================================================== -->


<div id="update-report-modal" class="modal fade" role="dialog">
  <div class="fadeIn">

    <!-- Modal content-->
 <div class="modal-content report-modal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Report</h4>
      </div>
      <div class="modal-body">


<form action="" method="post" id="upload-report-form">
<div class="row">
<div class="col-lg-12">

<label>Name of Report</label>
<input name="title" id="title" class="form-control" placeholder="Enter name" required> <br>

<label>Select years</label>
<select name="year"  class="form-control">
<option id="year" selected></option>
<?php
    for ($year=2018; $year <= date('Y'); $year++) {
?>

<option value="<?=$year?>">Raport <?=$year?> </option>
   <?php
  }
?>

</select>
 <br>

 <label>Update report section</label>
<select name="rep-section"  class="form-control">
<option id="rep-section" value="" selected></option>
<option value="Reports">Reports</option>
<option value="Data">Data</option>
<option value="Metadata">Metadata</option>
</select>
 <br>

<hr>
<input type="hidden" id="id" name="id" value="">
<a href="javascript:void(0)" style="margin-right:10px;" class="btn btn-sl btn-success upload-btn" data-type="modal2" >Change file</a>
<img src="<?php echo ADMINURL; ?>images/no-image.png" width="30" id="logo-preview3">
<span class="file-name-label"></span>
<hr>

<input name="file" type="hidden"  value="" id="logo-input3">
<br><br><br>
<label>Report description</label>
<textarea class="txtEditor" name="content"  placeholder="Enter your content" style="height:500px;"></textarea>
<br>


<input type="submit" class="btn btn-sl btn-success" value="Save Report"><br>
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
