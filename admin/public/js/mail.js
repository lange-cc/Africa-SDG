$(function(){

var site_location = $('#js-site-location').attr('value');
var file_location = $('#js-file-location').attr('value');

// this function for dialog
  function Confirmation(message, callback) {
        if ($('#modalConfirmation_MyTools') != undefined) $('#modalConfirmation_MyTools').remove();
        $('body').append('<div class="modal dialog-modal" id="modalConfirmation_MyTools">\
            <div class="fadeInDown confirmation-win modal-dialog modal-sm">\
            <div class="modal-content">\
                <div class="modal-header">\
                    <h5><span style="color:#f49e42;" class="fa fa-exclamation-circle"></span> <span id="spanMessage_MyTools">&nbsp;&nbsp;</span></h5>\
                </div>\
                <div class="modal-footer">\
                    <button type="button" data-dismiss="modal" class="btn btn-success" id="btnConfirm_MyTools">Confirm</button>\
                    <button type="button" data-dismiss="modal" class="btn btn-warning">Cancel</button>\
                </div>\
            </div>\
    </div>\
</div>');

        document.getElementById('spanMessage_MyTools').append(message);
        $('#modalConfirmation_MyTools').modal('toggle');
        var confirmBtn = document.getElementById('btnConfirm_MyTools'); 
        confirmBtn.onclick = function () {callback(true);}
 }
// end of function dialog


//save product function
$('#mail-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'mail/Addnew/';
   $.post(url, data, function(o){
      var myObj   = JSON.parse(o);
      var status  = myObj.status;
      var sms     = myObj.message;

         if (status == 'success') 
         {
            $('.notification').html(sms);
            location.reload(); 
         }
         else
         {  
           $('.notification').html(sms);
         }


 });

 });
// End of function


//Delete product function
$('.delete').on('click', function(e){
e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'mail/Delete/';


Confirmation("Are You Sure ?",function(response){
   if(response)
   {
$.post(url, {id:id}, function(o){
var data    = JSON.parse(o);
var myObj   = JSON.parse(o);
var status  = myObj.status;
var sms     = myObj.message;
alert(sms);
$('#row_'+id).hide('slow');

});
  }
  
  });

});
// End of function

//Delete product function
$('.content-delete').on('click', function(e){
e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'mail/contentDelete/';


Confirmation("Are You Sure ?",function(response){
   if(response)
   {
$.post(url, {id:id}, function(o){
var data    = JSON.parse(o);
var myObj   = JSON.parse(o);
var status  = myObj.status;
var sms     = myObj.message;
alert(sms);
$('#row_'+id).hide('slow');

});
  }
  
  });

});
// End of function

//Load content fuction 
$('.update').on('click', function(e){
  e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'mail/FindMail/';
$.post(url, {id:id}, function(o){


  var data   = JSON.parse(o);
  for (var i = 0; i < data.length; i++) 
{
var id      = data[i].id;
var title   = data[i].title;
var subject = data[i].subject;
var content = data[i].content;

$('#id').val(id);
$('#title').val(title);
$('#subject').val(subject);
$('#product-update .jqte_editor').html(content);

}

});

});
// end of function

//save updated product function

$('#update-mail-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'mail/update/';
   $.post(url, data, function(o){

      var myObj   = JSON.parse(o);
      var status  = myObj.status;
      var sms     = myObj.message;

         if (status == 'success') 
         {
            $('.notification2').html(sms);
            location.reload(); 
         }
         else
         {
            $('.notification2').html(sms);
         }


 });

 });

//End of function

$('#add-new-btn').on('click',function (e) {
  e.preventDefault();
  $('.add-content-panel').show();
  $('.add-content-panel').css({'height':'710px','opacity':'1','bottom':'0'});
  $('.content').css('opacity','0.2');
});

$('.btn-ribbone-close').on('click',function (e) {
  e.preventDefault();
  $('.add-content-panel').css({'opacity':'0','height':'0px'});
  $('.content').css('opacity','1');
})

$('.forward-mail-btn').on('click',function (e) {
  e.preventDefault();
  $('.add-content-panel').show();
  $('.add-content-panel').css({'height':'710px','opacity':'1','bottom':'0'});
  $('.content').css('opacity','0.2');
});



//start of function
$('#mail-copy').on('click', function (e) {
e.preventDefault();
var url  = site_location+'mail/copy/';
var data = $(this).attr('data-lang');
Confirmation("Are You Sure to Copy content to this language from default language?",function(response){
   if(response)
   {
$.ajax({
  type: 'post',
  url: url,
  data : {data:data},
beforeSend:function()
{
// $('.img-reflesh').hide();
// $('.img-loading').show();
},
success:function(o)
{

  var myObj  = JSON.parse(o);
  var status = myObj.status;
  var sms    = myObj.message;
if (status == "success") {
alert(sms);
window.location.reload();
}
else
{
alert(sms);
}
}
});
}
});
});
//end of function

//start of function
$('.templete').on('change', function (e) {
e.preventDefault();
$('.add-content-panel .jqte_editor').html('');
$('#single-mail-sending .jqte_editor').html('');
var url  = site_location+'mail/FindMail/';
var id   = $(this).val();
$.ajax({
  type: 'post',
  url: url,
  data : {id:id},
beforeSend:function()
{
// $('.img-reflesh').hide();
// $('.img-loading').show();
},
success:function(o)
{
var data   = JSON.parse(o);
for (var i = 0; i < data.length; i++) 
{
var content = data[i].content;
var subject = data[i].subject;
$('.subject').val(subject);
$('.add-content-panel .jqte_editor').html(content);
$('#single-mail-sending .jqte_editor').html(content);
}
}
});

});
//end of function

//save product function
$('#Send-mail-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'mail/SendMiltEmail/';
   $.post(url, data, function(o){
      var myObj   = JSON.parse(o);
      var status  = myObj.status;
      var sms     = myObj.message;

         if (status == 'success') 
         {
            $('.notification').html(sms);
            location.reload(); 
         }
         else
         {  
           $('.notification').html(sms);
         }


 });

 });
// End of function

//start of function
$('.single-forward-mail-btn').on('click', function () {
  var email = $(this).attr('data-email');
  $('.email').html(email);
  $('.InputEmail').val(email);
})
//end of function


//Start of function
$('#send-single-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'mail/SendSingleEmail/';
   $.post(url, data, function(o){
      var myObj   = JSON.parse(o);
      var status  = myObj.status;
      var sms     = myObj.message;

         if (status == 'success') 
         {
            $('.notification2').html(sms);
            location.reload(); 
         }
         else
         {  
           $('.notification2').html(sms);
         }


 });

 });
// End of function


});