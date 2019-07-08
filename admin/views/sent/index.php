  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
<div class="row">
<div class="col-lg-4 message-list">
<div class="row ">
<div class="col-lg-12 message-option sms-fixed-top">
<div class="row">
<div class="col-lg-6">
<label><span class="fa fa-envelope"></span> Messages</label>
</div>
<div class="col-lg-6">
<a href="" class="btn-new-message pull-right">+ New message</a>
</div>
</div>
</div>
</div>

<div class="message-widget" style="border: 8px solid #fff;">

<!-- message list -->
<?php
$val = $this->sent;
if (!empty($val)) {
$data = json_decode($val);
foreach ($data as $key => $value) {
    $number   = $key;
    $number   = $number+1;
    $status   = $controller->CheckStatus($data[$key]->status);
    $vibility = $controller->vibility($data[$key]->status);
?>

<div class="row sms-item <?php echo $status; ?>" data-id="<?php echo $data[$key]->id ?>" id="sms-id-<?php echo $data[$key]->id ?>">
<div class="col-lg-12 message-item">
<ul>
<li class="message-info"><img src="<?php echo ADMINURL;?>images/mail.png" class="message-img"></li>
<li class="message-item-content">
    <span class="pull-right message-time"><?php echo $this->get_timeago($data[$key]->date); ?></span>
    <span class="sms-status <?php echo $vibility;?>">new message</span>
<label><i class="fa fa-user"></i> <?php  echo $data[$key]->names;?></label><br>
<span><?php  echo $this->CutText(40,$data[$key]->content);?></span>
</li>
</ul>
</div>
</div>
<?php
 } 
 } 
  else
 {
    echo "No sent message available";
 }  
?>
<!-- end of message list -->

<br><br><br><br><br>

</div>
</div>
<div class="col-lg-5"></div>

<div class="col-lg-7 loading-panel">
    <div class="loading-win">
<img src="<?php echo ADMINURL; ?>images/loading.gif" width="200" class="loading">
    </div>
</div>

<div class="col-lg-7">
<div class="row">
<div class="col-lg-12 replied-win">
    <div class="message-widget" style="border-bottom:50px solid #380b39;">
<div class="row">
<div class="col-lg-12 message-nav1" style="padding-right:0;">
 <div class="row">
<div class="col-lg-6">
<label ><span class="fa fa-hand-grab-o"></span> <span id="subject1"></span></label>
</div>
<div class="col-lg-6">
<label class="pull-right" id="date-time1"></label>
</div>
</div>  
</div>
</div>

<div class="row">
<div class="col-lg-12 message-nav1" style="padding-right:0;">
 <div class="row">
<div class="col-lg-6">
<label><b>Names:</b> </label> <span id="sms-names1"></span><br>
<label>Email:</label> <span id="sms-mail1"></span>
</div>
<div class="col-lg-6">
<ul class="pull-right read-message-option">
<li>
<a href="" class="btn-sms-reply" data-id="" data-email="" data-names=""><span class="fa fa-reply"></span> Reply</a>
</li>
<li>
<a href="" class="btn-sms-delete btn-sms-delete1" data-id="" ><span class="fa fa-trash"></span> Delete</a>
</li>
</ul>
</div>
</div>  
</div>
</div>


<div class="row">
<div class="col-lg-12 message-nav1" style="padding-right:0;">
<p id="sms-content1">

</p>  
</div>
</div>

</div>
</div>


<div class="col-lg-12 read-message">
    <div class="message-widget" style="border-bottom:50px solid #380b39;">
<div class="col-lg-12 feed-back">
<h5>Message you replied</h5>
</div>

<div class="row">
<div class="col-lg-12 message-nav1" style="padding-right:0;">
 <div class="row">
<div class="col-lg-6">
<label ><span class="fa fa-hand-grab-o"></span> <span id="subject"></span></label>
</div>
<div class="col-lg-6">
<label class="pull-right" id="date-time"></label>
</div>
</div>  
</div>
</div>

<div class="row">
<div class="col-lg-12 message-nav1" style="padding-right:0;">
 <div class="row">
<div class="col-lg-6">
<label><b>Names:</b> </label> <span id="sms-names"></span><br>
<label>Email:</label> <span id="sms-mail"></span>
</div>
<div class="col-lg-6">
<ul class="pull-right read-message-option">
<li>
<a href="" class="btn-sms-delete btn-sms-delete2" data-id="" ><span class="fa fa-trash"></span> Delete</a>
</li>
</ul>
</div>
</div>  
</div>
</div>


<div class="row">
<div class="col-lg-12 message-nav1" style="padding-right:0;">
<p id="sms-content">

</p>  
</div>
</div>

</div>
</div>


</div>
</div>





</div>
</section>
</div>

<div class="mail-wrapper">

<div class="compose-window">

<div class="ribbon text-white">
<span class="fa fa-envelope text-white text-left"></span> <span class="composer-title">New message</span>
<span class="fa fa-close text-white pull-right close-sms-tab"></span>
<div class="sms-notification">
<img src="<?php echo ADMINURL; ?>images/loading1.gif" width="60"> 
<span>Sending...</span>
</div>

</div>
<style type="text/css">
.jqte
{
    border: 0 !important;
}
.jqte_toolbar {
overflow: auto !important;
padding: 10px 23px !important;
background: #FFF !important;
border-bottom: 1px solid #e7e4e4 !important;
}
.jqte_tool, .jqte_tool_icon, .jqte_tool_label {
    border: 0 !important;
    border-radius: 3px !important;
    -webkit-border-radius: 3px !important;
    -moz-border-radius: 3px !important;
}
.jqte {
    margin: 0px 0 !important;
    border-radius: 0 !important;
    -webkit-border-radius: 0 !important;
    -moz-border-radius: 0 !important;
    overflow: hidden !important;
    transition: box-shadow 0.4s, border 0.4s !important;
    -webkit-transition: -webkit-box-shadow 0.4s, border 0.4s !important;
    -moz-transition: -moz-box-shadow 0.4s, border 0.4s !important;
    -o-transition: -o-box-shadow 0.4s, border 0.4s !important;
}
.jqte_editor, .jqte_source {
    padding: 10px !important;
    background: #FFF !important;
    height: 300px; !important;
    overflow: auto !important;
    outline: none !important;
    word-wrap: break-word !important;
    -ms-word-wrap: break-word !important;
    resize: vertical !important;
}
</style>
<form action="<?php echo URL; ?>inbox/sendmessage" method="post" id="message-form">
<input type="hidden" name="reply_id" value="" id="reply_id">
<input    name="email-from" class="email-input" type="email" placeholder="From:" value="<?php echo COMPANY_EMAIL; ?>">
<input    name="email-to"class="email-input mail-to-input" type="email" placeholder="To:">
<input    name="subject" class="email-input mail-subject-input" type="text" placeholder="Subject:">
<textarea name="content" id="post-content" class="txtEditor" placeholder="Enter your content" style="height:400px;"></textarea>
<button class="fa fa-send text-white mail-send-btn"></button>
</form>
</div>

</div>