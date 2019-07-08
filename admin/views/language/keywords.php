  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
 <section class="content" style="padding-left: 31px !important;">

  <div class="row copy-widget">
    <div class="col-lg-12 flex-center">
      <div class="copy-panel">
      <?php
$Defaultlang = $this->ondefaultLang;
$DefaultlangData = json_decode($Defaultlang);
    
$Editlang = $this->onEditLang;
$EditlangData = json_decode($Editlang);
?>

       <div class="clone-widget">
         <span class="fa fa-file-o"></span><br>
          <span><?=$DefaultlangData[0]->name?></span>
       </div>

       <div class="copy-title">
         Click here to copy content from <b><?=$DefaultlangData[0]->name?></b> to <b><?=$EditlangData[0]->name?></b>
            <div class="row">
               <div class="col-lg-12 flex-center">
                  <a href="" class="btn btn btn-copy" data-lang="<?=$this->abrev;?>">Copy</a>
               </div>
            </div> 
            <div class="row">
               <div class="col-lg-12">
                  <div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="70"
  aria-valuemin="0" aria-valuemax="100" style="width:0%">
  </div>
                  </div> 
               </div>
               <div class="col-lg-12 flex-center">
                  <span class="copy-status"></span>
               </div>
            </div>  
       </div>


       <div class="paste-widget">
          <span class="fa fa-file-o"></span><br>
          <span><?=$EditlangData[0]->name?></span>
       </div>
   </div>
   </div>
   <div class="col-lg-12 flex-center">
       <div>
          <a href=""></a>
       </div>
   </div>
  </div>

  <div class="row" style="display:flex;">

<?php
$Defaultlang = $this->ondefaultLang;
$DefaultlangData = json_decode($Defaultlang);
if ($DefaultlangData[0]->keywords != 'none')
{
?>
<div class="col-lg-6 widget widget-one">
   <div class="language-name">
 <span class="fa fa-language"></span> <?=$DefaultlangData[0]->name?> (Default)

 <a href="javascript:void(0)" data-abrev="<?=$this->abrev;?>" data-id="<?=$DefaultlangData[0]->id?>" data-edit="<?=$this->langId?>" class="copy-btn pull-right"><span class="fa fa-copy"></span> Copy Keywords to</a>
  </div>
<br>

<?php
$data = $DefaultlangData[0]->keywords;
foreach ($data as $key => $value) {
  $numbe = $key;
  $numbe = $numbe + 1; 
?>

<div class="keyword-list">
  <div class="row">
  <div class="col-lg-1">
   <?=$numbe?>
    </div>
    <div class="col-lg-11">
      <div class="keyword-content">
      <?=$data[$key]->keyword?>
      </div>
    </div>
  </div>
   <!-- <ul>
    <li class="list-number"></li>
    <li class="key-name"><span></span></li>
    <li class="key"><?=$data[$key]->key?></li>
   </ul> -->
</div>

<?php
}
?>

</div>
<?php
}
?>


<?php
$Editlang = $this->onEditLang;
$EditlangData = json_decode($Editlang);
?>

<div class="col-lg-6 widget" id="div1">
   <div class="language-name">
 <span class="fa fa-language"></span> <?=$EditlangData[0]->name?> (In editing <span class="fa fa-pencil"></span>)
  </div>
<br>
<div class="onedit-key-list">
<?php
if ($EditlangData[0]->keywords != 'none') 
{
$data = $EditlangData[0]->keywords;
foreach ($data as $key => $value) {
  $numbe = $key;
  $numbe = $numbe + 1; 
?>
<div class="keyword-list keyword-list2 count-list" id="row_<?=$data[$key]->id?>">
   
<div class="row">
  <div class="col-lg-1">
   <?=$numbe?>
    </div>
    <div class="col-lg-11">
      <div class="keyword-content">
      <form class="keywords-list-form" action="" method="post">
  
     <div class="in-editing-textarea" data-id ="#keyword-input_<?=$data[$key]->id?>" placeholder="Keyword" contenteditable="true" ><?=$data[$key]->keyword?></div>
     <input class="" type="hidden"     name="keyword" value="<?=$data[$key]->keyword?>" id="keyword-input_<?=$data[$key]->id?>">
     <input class="" placeholder="Key" type="hidden"  name="key" value="<?=$data[$key]->key?>">
     <input type="hidden" name="id"     value="<?=$data[$key]->id?>">

     <div class="row">
       <div class="col-lg-6">
       <input type="submit" class="btn key-btn" value="update"> <span class="key-not"></span>
       </div>
       <div class="col-lg-6">
       <a href="javascript:void(0)" data-id="<?=$data[$key]->id;?>" class="delete-key-btn" title="Delete"><span class="fa fa-eraser"></span></a>
       </div>
     </div>
  
  </form>
  
      </div>
    </div>
  </div>

  <!-- <form class="keywords-list-form" action="" method="post">
    
   <ul>
    <li class="list-number"><?=$numbe?></li>
    <li class="key-name key-margin-input"><span><input class="lang-input2" placeholder="Keyword" type="text" value="<?=$data[$key]->keyword?>" name="keyword"></span></li>
    <li class="key key-margin-input"><input class="lang-input2" placeholder="Key" type="text" name="key" value="<?=$data[$key]->key?>"><input  type="hidden" name="id" value="<?=$data[$key]->id?>"></li>
     <li class="key-margin-input"> <input type="submit" class="btn key-btn" value="update"></li>
   </ul>
  </form> -->

 
</div>

<?php
}
}
else
{
?>
<div class="alert alert-success">No keywords available</div>
<?php
}
?>

</div>

<!-- <div class="keyword-list keyword-list2" style="background: linear-gradient(to right, #c3c3c3 , #c4d5f8);">
  <form id="add-keyword-form" action="" method="post">
   <ul>
    <li class="list-number">new</li>
    <li class="key-name key-margin-input"><input class="lang-input" placeholder="Keyword" type="text" name="keyword"></li>
    <li class="key key-margin-input"><input class="lang-input" placeholder="Key" type="text" name="key"> <input type="hidden" name="abrev" value="<?=$this->abrev;?>"><input type="hidden" name="langId" value="<?=$this->langId?>"></li>
    <li class="key-margin-input"> <input type="submit" class="btn key-btn" value="Add"></li>
   </ul>
       </form>
       <div class="notification"></div>
</div> -->


</div>




</div>

  

</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



