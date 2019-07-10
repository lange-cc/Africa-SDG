  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  


    <!-- Main content -->
    <section class="content">
   <div class="row">
      <div class="col-lg-12 flex-center">
         <select class="year-widget">
          <?php
      $current = date('Y');

      for ($year=2018; $year <= $current; $year++) { 
          ?>
            <option value="<?=$year?>" <?php if ($year == $this->year) { echo "selected"; }?>>Country profile for <?=$year?></option>
          <?php
              }
          ?>
            
         </select>
      </div>
   </div>

     <div class="row">

<?php
  if (!empty($this->data)) {
    $data = json_decode($this->data);
    foreach ($data as $key => $value) 
    {
      if ($data[$key]->status == 'exist' ) {
?>
          <div class="col-lg-3 " style="padding-bottom: 10px;">
         <div class="sdgcard" style="min-height: 334px;">
           <div class="sdgcard-logo" style="
              background:#fff url('<?php echo ADMINURL;?>images/profilethumb.png');
              background-repeat: no-repeat;
              background-position: center center;
              background-size: cover;">
           </div>
           <div class="sdgcard-title">
              <b><?=$data[$key]->title?></b>
           </div>
           <div class="sdgcard-option">
              <p>Status: 
                
                <?php
                 if ($data[$key]->status == 'exist' ) {
                    echo "Uploaded";
                 }
                 else
                 {
                   echo "Not uploaded";
                 }

                ?>
              

            </p>
           </div>

<div class="profile-option-btns">
  <a href="#" data-pdf="<?=URL?>Report/<?=$this->year?>/<?=$data[$key]->code?>.pdf" target="_blank" class="profile-preview-btn" > Preview</a>
</div>

         </div>
       </div>
<?php
      }
   }
 }
?>

  



      </div>
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->



<a class="btn btn-upload-report" href=""> <span class="fa fa-cloud-upload" style="margin-right: 18px"></span> Upload Profiles </a>







<div class="preview-overlay">

<a href="#" class="pdf-priview-close-btn">&times;</a>

  <div id="pdf-main-container">
  <div id="pdf-contents">
    <canvas id="pdf-canvas" width="600"></canvas>
    <div id="page-loader">Loading page ...</div>
  </div>
</div>

  <div id="pdf-buttons">
        <button id="pdf-prev"><span class="fa fa-angle-left"></span></button>
        <button id="pdf-next"><span class="fa fa-angle-right"></span></button>
      </div>


</div>







