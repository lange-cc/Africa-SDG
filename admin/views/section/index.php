  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">


<div class="row">
<div class="col-lg-12">

<table class="table table-striped table-content">
<thead>
<tr>
  <th width="55%"></th>
  <th width="70%"></th>
</tr>
</thead>
<tbody id="data">
  <?php
$val = $this->data;
if (!empty($val)) {
$data = json_decode($val);
foreach ($data as $key => $value) {
    $number = $key;
    $number = $number+1;
?>
<tr id="row_<?php echo $data[$key]->section_index;?>">

<!-- <td class="numbering"><?php  echo $number; ?> <?php if (IDSTATUS == 'true') { echo '[id='.$data[$key]->id.']'; } ?></td> -->


<td><span class="section-title"><?php  echo $data[$key]->title;?></span></td>

<td>
    <?php // echo $data[$key]->discription ;?>
</td>

<!-- <td><a href="javascript:void(0)" data-id="<?php  echo $data[$key]->id;?>" class="view-section btn-view">View</a></td>
<td>

<?php if ($this->run->getPermisssion($userMail, $per_name="Site content Update Button", $per_key = 'k_sitescontentupdatebtn', $page = 'content', $type = 'button')) { ?>
  <a href="javascript:void(0)" data-id="<?php  echo $data[$key]->id;?>" class="btn-update-section btn-update">Update</a>
<?php
}
?>
</td>
<td>
  <?php if ($this->run->getPermisssion($userMail, $per_name="Site content Delete Button", $per_key = 'k_sitescontentdeltebtn', $page = 'content', $type = 'button')) { ?>
  <a href="javascript:void(0)" data-link="<?php  echo $data[$key]->section_index;?>" class="content-delete btn-delete">Delete</a>
  <?php
   }
   ?>

</td> -->
</tr>

<tr>
<td colspan="6">


<?php
if($this->label[0]->label_6 == 'show')
{
?>
<br>
    <a href="" data-title="<?php  echo $data[$key]->title;?>" data-index="<?php  echo $data[$key]->section_index;?>" class="add-article">Add new Article</a>
    <br><br>
<?php
}
?>

<div class="row">

<?php
$article = $data[$key]->article;
foreach ($article as $key => $value) {
?>

<?php
if($this->label[0]->label_7 == 'sdg_ui')
{

if (LANG == 'en') { $forder = 'sdg-icon/'; }
else { $forder = 'sdg-fr-icon/'; }

?>
<div class="col-lg-3" id="row_art_<?php echo $article[$key]->id;?>">
  <div class="sdg-widget">
       <div class="sdg-card" style="background: transparent url('<?=ADMINURL.$forder.$article[$key]->subtitle?>.png');
               background-repeat: no-repeat;
               background-position: center center;
               background-size: cover;">

       </div>

<a href="javascript:void(0)" data-id="<?php echo $article[$key]->id;?>" class="btn-article-upadete sdg-update-btn"><span class="fa fa-pencil"></span></a>

  </div>
</div>
<?php
}
elseif($this->label[0]->label_7 == 'faq_ui')
{
?>
  <div class="col-lg-3" id="row_art_<?php echo $article[$key]->id;?>" style="margin-bottom: 15px;">
  <div class="anouncement-widget">
     <div class="anouncement-card">
       <label><?php  echo $this->CutText(200,$article[$key]->title);?></label><br>
         <div class="announcement-text">
             <?php  echo $this->CutText(200,$article[$key]->content);?>
         </div>
         <div class="announcement-option">

<?php if ($this->run->getPermisssion($userMail, $per_name="Site content Delete Button", $per_key = 'k_sitescontentdeltebtn', $page = 'content', $type = 'button')) { ?>
<a href="javascript:void(0)" data-id="<?php echo $article[$key]->id;?>" class="btn-article-delete anouncement-trash-btn"><span class="fa fa-trash"></span></a>
<?php
}
?>

<?php if ($this->run->getPermisssion($userMail, $per_name="Site content Update Button", $per_key = 'k_sitescontentupdatebtn', $page = 'content', $type = 'button')) { ?>
<a href="javascript:void(0)" data-id="<?php echo $article[$key]->id;?>" class="btn-article-upadete announcement-update-btn"><span class="fa fa-pencil"></span></a>
<?php
}
?>
         </div>
     </div>
  </div>
</div>
<?php
}
elseif($this->label[0]->label_7 == 'anouncement_ui')
{
?>

  <div class="col-lg-3" id="row_art_<?php echo $article[$key]->id;?>">
  <div class="anouncement-widget">
     <div class="anouncement-card">
         <div class="announcement-text">
             <?php  echo $this->CutText(200,$article[$key]->content);?>
         </div>
         <div class="announcement-option">

<?php if ($this->run->getPermisssion($userMail, $per_name="Site content Delete Button", $per_key = 'k_sitescontentdeltebtn', $page = 'content', $type = 'button')) { ?>
<a href="javascript:void(0)" data-id="<?php echo $article[$key]->id;?>" class="btn-article-delete anouncement-trash-btn"><span class="fa fa-trash"></span></a>
<?php
}
?>

<?php if ($this->run->getPermisssion($userMail, $per_name="Site content Update Button", $per_key = 'k_sitescontentupdatebtn', $page = 'content', $type = 'button')) { ?>
<a href="javascript:void(0)" data-id="<?php echo $article[$key]->id;?>" class="btn-article-upadete announcement-update-btn"><span class="fa fa-pencil"></span></a>
<?php
}
?>
         </div>
     </div>
  </div>
</div>

<?php
}
elseif ($this->label[0]->label_7 == 'Default' || $this->label[0]->label_7 == '') {
?>
<div class="fadeIn col-lg-6" id="row_art_<?php echo $article[$key]->id;?>">
<div class="row article-li">
<div class="col-lg-3 padding-left-on-row">
<div style="background: transparent url('<?php $controller->checkimg(URL."all-images/thumbnail/".$article[$key]->logo,$article[$key]->logo);?>');
               background-repeat: no-repeat;
               background-position: center center;
               width:100%;
               height: 130px;
               background-size: cover;">

</div>

</div>
<div class="col-lg-9">
<!-- <h4><span class="fa fa-file-word-o"></span> <?php echo $this->CutText(19,$article[$key]->title);?></h4> -->
<p><?php  echo $this->CutText(85,$article[$key]->content);?></p>

<!-- <a href="javascript:void(0)" data-id="<?php echo $article[$key]->id;?>" class="btn-article-read btn btn-xs btn-success">View</a> -->

<?php if ($this->run->getPermisssion($userMail, $per_name="Site content Update Button", $per_key = 'k_sitescontentupdatebtn', $page = 'content', $type = 'button')) { ?>
<a href="javascript:void(0)" data-id="<?php echo $article[$key]->id;?>" class="btn-article-upadete btn btn-xs btn-primary">Update</a>
<?php
}
?>

<?php if ($this->run->getPermisssion($userMail, $per_name="Site content Delete Button", $per_key = 'k_sitescontentdeltebtn', $page = 'content', $type = 'button')) { ?>
<a href="javascript:void(0)" data-id="<?php echo $article[$key]->id;?>" class="btn btn-xs btn-danger btn-article-delete">Delete</a>
<?php
}
?>

</div>
</div>
</div>

<?php
}
}
?>

</div>


</td>
</tr>

<?php
 }
 }
?>




</tbody>

</table>

</div>



</div>


    </section>



<?php
if($this->label[0]->label_5 == 'show')
{
?>
<div class="floating-options">
<div href="" id="show"  class="btn-add-new" title="Add new content">+</div>
</div>
<?php
}
?>







    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div>

<div class="right-sidebar2">
<h3 class="white">
Create new Section
    </h3>
<form action="" method="post" id="content-form">
<label class="white">Section title</label>
<input name="title" class="form-control" placeholder="Enter type" required> <br>
<input name="id" value="<?php echo $this->id; ?>" type="hidden" required id="id">
<label class="white">Section Description</label>
<textarea name="content" class="form-control" placeholder="Enter type" required></textarea>
<br>
<div class="row">
  <div class="col-lg-6">
    <input type="submit" class="btn btn-sl btn-success" value="Add new content">
  </div>
  <div class="col-lg-6">
    <a href="#" class="hidenow btn btn-sl btn-danger">Cancel</a>
  </div>
</div>
</form>

</div>


<div class="article-aside">

  <h3 class="white">
Create new Article on(<b class="article-section"></b>)
 <a href="#" class="pull-right hidearticle-aside btn btn-sl btn-danger">Cancel</a>
    </h3>

<form action="<?php echo LINK;?>admin/section/addArticle/" method="post" id="article-form" enctype="multipart/form-data">
<label class="white">
<?php
if ($this->label[0]->label_1 != 'none') {
if ($this->label[0]->label_1 == '') {
  echo "Title";
}
else
{
 echo $this->label[0]->label_1;
}
?>

</label>
<input name="title" class="form-control" placeholder="Enter title" required> <br>
<?php
}
?>



<label class="white">
<?php
if ($this->label[0]->label_2 != 'none') {
if ($this->label[0]->label_2 == '') {
  echo "Sub Title";
}
else
{
 echo $this->label[0]->label_2;
}
?>
</label>
<input name="sub-title" class="form-control" placeholder="Enter Sub title" required> <br>
<?php
}
?>
<input name="section_index" type="hidden" value="" id="section_index_input" required>

 <?php
if ($this->label[0]->label_3 != 'none') {
  ?>
<a href="javascript:void(0)" class="btn btn-sl btn-success upload-btn" data-type="form">
  <?php
if ($this->label[0]->label_3 == '') {
  echo "Upload logo";
}
else
{
 echo $this->label[0]->label_3;
}
?>
</a>

<br><br>
<img src="<?php echo ADMINURL; ?>images/no-image.png" width="250" id="logo-preview">
<input name="image-name" type="hidden" id="logo-input" value="">
<br><br>
<?php
}
?>

<label class="white">


  <?php
if ($this->label[0]->label_4 != 'none') {
if ($this->label[0]->label_4 == '') {
  echo "Article content";
}
else
{
 echo $this->label[0]->label_4;
}
?>


</label>

<textarea id="txtEditor" name="content"  placeholder="Enter your content" style="height:500px;"></textarea>
<br>
<?php
}
?>

<div class="row">
  <div class="col-lg-6">
    <input type="submit" class="btn btn-sl btn-success" id="form-btn-save" value="Add new content">
  </div>
  <div class="col-lg-6">

  </div>
  <div class="col-lg-12">
    <div class="white" id="msg-notification"></div>
  </div>
</div>
<br><br><br><br>
</form>

</div>

<!-- ==================================================================== -->

<div class="article-update-sidebar">

<form action="<?php echo LINK;?>admin/section/UpdateArticle/" method="post" id="article-update-form" enctype="multipart/form-data">
<div class="row">
    <div class="col-lg-5">
<label class="white">

  <?php
if ($this->label[0]->label_1 != 'none') {
if ($this->label[0]->label_1 == '') {
  echo "Title";
}
else
{
 echo $this->label[0]->label_1;
}
?>
</label>
<input name="title" class="title form-control" placeholder="Enter title" required> <br>
<?php
}
?>

<label class="white">
<?php
if ($this->label[0]->label_2 != 'none') {
if ($this->label[0]->label_2 == '') {
  echo "Sub Title";
}
else
{
 echo $this->label[0]->label_2;
}
?>
</label>
<input name="sub-title" class="sub-title form-control" placeholder="Enter Sub title" required> <br>
<?php
}
?>

<input name="id" type="hidden" value="" id="article_id" required>


 <?php
if ($this->label[0]->label_3 != 'none') {
  ?>
<a href="javascript:void(0)" class="btn btn-sl btn-success upload-btn" data-type="modal">
  <?php
if ($this->label[0]->label_3 == '') {
  echo "Change logo";
}
else
{
 echo $this->label[0]->label_3;
}
?>
</a><br><br>
<img src="<?php echo ADMINURL; ?>images/no-image.png" width="250" id="logo-preview2">
<input name="image-name" type="hidden" id="logo-input2" value="">
<br>
<?php
}
?>

<br>
</div>

<div class="col-lg-7">
  <label class="white">
  <?php
if ($this->label[0]->label_4 != 'none') {
if ($this->label[0]->label_4 == '') {
  echo "Article content";
}
else
{
 echo $this->label[0]->label_4;
}
?>
</label>
<textarea name="content"  class="txtEditor" placeholder="Enter your content" style="height:300px;"></textarea>
<?php
}
?>
<hr>
<div class="row">
  <div class="col-lg-6">
    <input type="submit" class="btn btn-sl btn-success" id="form-btn-save" value="Save">
  </div>
  <div class="col-lg-6">
     <a href="#" class="btn btn-danger btn-sl close-article-update"><i class="fa fa-power-off"></i> Close</a>
  </div>
  <div class="col-lg-12">
    <div class="white" id="article-msg"></div>
  </div>
</div>
<hr>
</div>
</div>
</form>
<br><br><br><br>

</div>
