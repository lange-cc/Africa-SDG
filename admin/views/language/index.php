  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
  

<div class="row">
<div class="col-lg-8">

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
 <span class="fa fa-language"></span> <?=$data[$key]->name;?>
 <?php
if ($data[$key]->type == 'default') {
 ?>
 <span class="default-lang">Default</span>
 <?php
}
?>
</div>
<div class="language-details">
 <span class="fa fa-info-circle"></span> Keywords: <?=$data[$key]->keywordNumber?>
</div>
<div class="language-option">
 <ul>
<li><a href="<?=LINK?>language/addkeywords/<?=$data[$key]->id;?>/" data-id="<?=$data[$key]->id;?>" class="add-keywords" title="add keywords"><span class="fa fa-plus-square"></span></a></li>
<li><a href="javascript:void(0)" data-id="<?=$data[$key]->id;?>" class="update" title="Update language" data-toggle="modal" data-target="#language-update" ><span class="fa fa-pencil-square"></span></a></li>
<li><a href="javascript:void(0)" data-id="<?=$data[$key]->id;?>" class="delete" title="Delete language"><span class="fa fa-eraser"></span></a></li>
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
<div class="col-lg-4">
<div class="aside-content">

<h3>
Add New Language
    </h3>
<form action="" method="post" id="language-form">
<label>Language name</label>
<input name="name" class="form-control" placeholder="Enter language name" required> <br>

<label>Abreviation</label>
<input name="abrev" class="form-control" placeholder="Enter Abreviation Language" required> <br>

<label>Priority</label>
<select name="type" class="form-control" >
  <option value="default">Default</option>
  <option value="other" selected>other</option>
</select>
 <br>

<div class="row">
  <div class="col-lg-6">
    <input type="submit" class="btn btn-sl btn-success" value="Add new language"><br>
    <div class="notification"></div>
  </div>
  <div class="col-lg-6">

  </div>
</div>
</form>


</div>

</div>


</div>
  

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div>


<!-- ================================================================ -->


<div id="language-update" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Language details</h4>
      </div>
      <div class="modal-body">
        

<form action="" method="post" id="language-form-update">
<label>Language name</label>
<input id="name" name="name" class="form-control" placeholder="Enter language name" required> <br>
<input id="id" name="id" type="hidden" value="" required> <br>

<label>Abbreviation</label>
<input id="abrev" name="abrev" class="form-control" placeholder="Enter Abreviation Language" required> <br>

<label>Priority</label>
<select name="type" class="form-control" >
  <option id="type" value="default" selected>Currently()</option>
  <option value="default">Default</option>
  <option value="other">other</option>
</select>
 <br>

<div class="row">
  <div class="col-lg-6">
    <input type="submit" class="btn btn-sl btn-success" value="Update"><br>
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
