  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content">
<div class="row">

<div class="task-widget-hist">
  <div class="row">

      <div class="col-lg-12">
     <h4 class="text-center task-title">Task s' history</h4>
       

 <?php
$val = $this->alltask;
if (!empty($val)) {
$data = json_decode($val);
foreach ($data as $key => $value) {
?>

       <div class="card" id="row_<?=$data[$key]->id?>">

        <div class="activity-data">
        <span class="text text-success task-status-label"><?=$data[$key]->status?></span>
        <p>
          <?=$data[$key]->content?>
        </p>

        <p class="task-time-label">
         <?=$data[$key]->project?>  <span class="time"> <span class="fa fa-clock-o"></span> <?=date('M j Y g:i A', strtotime($data[$key]->date))?></span>
          <span class="pull-right">
      <a href="" data-id="<?=$data[$key]->id?>" class="delete">delete</a>
      <a href="" class="activity-update" data-id="<?=$data[$key]->id?>" data-toggle="modal" data-target="#update-activity">update</a>
          </span>
           </p>

     </div>     
<br>
                     <div class="timeline-footer">
                  <ul class="comment-list" id="account-comment_<?=$data[$key]->id?>">



                   <?php
 $comment = $data[$key]->comment; 
 if ($comment != null) {
 foreach ($comment as $key1 => $value) 
{
?>
<li>
    <div class="comment-widget">
      <div class="img">
                     <?php
 $comment_profile = $comment[$key1]->profile; 
 if ($comment_profile != null) {
 foreach ($comment_profile as $key2 => $value) 
{
?>
      <img src="<?php echo URL;?>all-images/thumbnail/<?=$comment_profile[$key2]->logo?>" class="comment-user-profile">
      </div>
      <div class="comment-content">
        <div class="data">
        <strong><?=$comment_profile[$key2]->name?></strong> 

<?php
}
}
?>
         <?=$comment[$key1]->content?>
        <div>
        <span class="time task-time-label"><i class="fa fa-clock-o"></i> <?=date('M j Y g:i A', strtotime($comment[$key1]->date))?></span>
        </div>
         </div>
      </div>
    </div>
</li>

<?php
}
}
else
{
  echo "<li class='no-comment'><div><p>No comment found</p></div></li>";
}
?> 


                  </ul>
                </div>

<br>
    <div class="timeline-footer">
                  <form action="" method=""  class="comment-form">
                    <img src="<?php echo URL;?>all-images/thumbnail/<?php echo $profile_img;?>" class="">
                    <input name="user" type="hidden" value="<?=$this->user;?>">
                    <input name="activity" type="hidden" value="<?=$data[$key]->id?>">
                    <textarea class="form-control comment-textarea" name="comment" placeholder="Leave comment here"></textarea><br>
                    <span>
                      <div class="pull-right">
                    <button type="submit" class="btn btn-omment"><span class="fa fa-send"></span></button>
                      </div>
                    <p class="sms"></p>
                    </span>
                  </form>
              </div>
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

