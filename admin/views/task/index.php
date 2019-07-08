  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content">
<div class="row">

<div class="task-widget">
  <div class="row">
    <div class="col-lg-6">
     <h4 class="text-center task-title">Add your finished task</h4>
     <form id="add-activity-form">
      <label>Select project</label>
      <input name="user" type="hidden" value="<?=$this->user?>">
      <select name="account" class="form-control">
 <?php
$val = $this->project;
if (!empty($val)) {
$data = json_decode($val);
foreach ($data as $key => $value) {
?>
        <option value="<?=$data[$key]->id?>"><?=$data[$key]->name?></option>
<?php
}}
?>
      </select><br>
      <textarea name="content" class="form-control" type="text" placeholder="Enter your today task" required></textarea><br>
 <label>Select status</label>
   <select name="status" class="form-control">
      <option value="Canceled">Canceled</option>
      <option value="Progress">Progress</option>
      <option value="Pending">Pending</option>
      <option value="Finished">Finished</option>
   </select><br>

      <button type="submit" class="btn task-btn">Add task</button>
      <p class="notification text-blue">

      </p>
     </form>
    </div>
      <div class="col-lg-6">
     <h4 class="text-center task-title">Today s' tasks history</h4>
       

 <?php
$val = $this->todaytask;
if (!empty($val)) {
$data = json_decode($val);
foreach ($data as $key => $value) {
?>

       <div class="card" id="row_<?=$data[$key]->id?>">
        <p>
          <?=$data[$key]->content?>
        </p>

        <p class="task-time-label">
         <?=$data[$key]->project?> :: <span class="text text-success"><?=$data[$key]->status?></span> <span class="time"> <span class="fa fa-clock-o"></span> <?=date('M j Y g:i A', strtotime($data[$key]->date))?></span>
          <span class="pull-right">
      <a href="" data-id="<?=$data[$key]->id?>" class="delete">delete</a>
      <a href="" class="activity-update" data-id="<?=$data[$key]->id?>" data-toggle="modal" data-target="#update-activity">update</a>
          </span>
           </p>

       </div>

<?php
}
}
else
{
?>
   <div class="card" id="row_<?=$data[$key]->id?>">
        <p class="text-center">
         No task available today
        </p>
       </div>
<?php
}

?>



    </div>
  </div>


</div>

</div>
</section>
</div>
</div>


<div id="update-activity" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update this activity</h4>
      </div>
      <div class="modal-body">
  
<form action="#" method="post" id="update-activity-form">
<label>Update your activity</label>
<textarea name="content" class="form-control" placeholder="Activity" value="" id="activity-content" class="form-control" required></textarea> <br>
<input name="id" type="hidden" value="" id="activity_id">

<div class="row">
  <div class="col-lg-6">
    <input type="submit"  class="btn btn-sl btn-success" value="Update">
  </div>
  <div class="col-lg-6">
    <div class="activity-notification"></div>
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

