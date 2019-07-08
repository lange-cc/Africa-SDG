

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
$('#gift-add-content-form').submit(function(e){
e.preventDefault();
var data = $(this).serialize();
var url = site_location+'giftinfo/Addnew/';
$.post(url, data, function(o){
var myObj   = JSON.parse(o);
var status  = myObj.status;
var sms     = myObj.message;

if (status == 'success') 
{
  $('.notification').html(sms);
}
else
{
  $('.notification').html(sms);    
}
});
});
// End of function


//Delete post function
$('.btn-add-images').on('click', function(e){
e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'productinfo/putsessionid/';
$.post(url, {id:id}, function(o){ });
});
// End of function

//join product to giftbox function
$('.join-btn').on('click', function(e){
e.preventDefault();
var product_id = $(this).attr('data-id');
var gift_id    = $('#gift_index').attr('value');

var url = site_location+'giftinfo/join/';

$.post(url, {pro_id:product_id,gif_id:gift_id}, function(o){
var data    = JSON.parse(o);
var myObj   = JSON.parse(o);
var status  = myObj.status;
var sms     = myObj.message;

if (status == "success") {
$('#join-status_'+product_id).html(sms);
}
else
{
$('#join-status_'+product_id).html(sms);
}
});
  
});
// End of function


 //Delete post function
$('.remove-btn').on('click', function(e){
e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'giftinfo/Delete/';

Confirmation("Are you sure to remove this product to giftbox?",function(response){
   if(response)
   {
$.post(url, {id:id}, function(o){
var data    = JSON.parse(o);
var myObj   = JSON.parse(o);
var status  = myObj.status;
var sms     = myObj.message;

if (status == "success") {
alert(sms);
$('#row_'+id).hide(100);
}
else
{
alert(sms); 
}
});
  }
});
});
// End of function



//save product function
$('#add-color-form').submit(function(e){
e.preventDefault();
var data = $(this).serialize();
var url = site_location+'productinfo/Addcolor/';
$.post(url, data, function(o){
var myObj   = JSON.parse(o);
var status  = myObj.status;
var sms     = myObj.message;

if (status == 'success') 
{
  $('#color-notification').html(sms);
  location.reload();
}
else
{
  $('#color-notification').html(sms);    
}
});
});
// End of function


//Delete post function
$('.img-btn-delete').on('click', function(e){
e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'productinfo/imgDelete/';


Confirmation("Are you sure to delete this images?",function(response){
   if(response)
   {
$.post(url, {id:id}, function(o){
var data    = JSON.parse(o);
var myObj   = JSON.parse(o);
var status  = myObj.status;
var sms     = myObj.message;

if (status == "success") {
alert(sms);
$('#img_id_'+id).hide(100);
}
else
{
alert(sms); 
}


});
  }
  
  });

});
// End of function

//Delete post function
$('.btn-color-delete').on('click', function(e){
e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'productinfo/colorDelete/';


Confirmation("Are you sure to delete this color?",function(response){
   if(response)
   {
$.post(url, {id:id}, function(o){
var data    = JSON.parse(o);
var myObj   = JSON.parse(o);
var status  = myObj.status;
var sms     = myObj.message;

if (status == "success") {
alert(sms);
$('#color_id_'+id).hide(100);
}
else
{
alert(sms); 
}


});
  }
  
  });

});
// End of function




//Delete post function
$('.post-delete').on('click', function(e){
e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'blog/Delete/';


Confirmation("Are You Sure ?",function(response){
   if(response)
   {
$.post(url, {id:id}, function(o){
var data    = JSON.parse(o);
var myObj   = JSON.parse(o);
var status  = myObj.status;
var sms     = myObj.message;

if (status == "success") {
alert(sms);
$('#row_'+id).hide(100);
}
else
{
alert(sms);	
}


});
  }
  
  });

});
// End of function

//Load product content fuction 
$('.btn-update-post').on('click', function(e){
  e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'blog/Findproduct/';
$.post(url, {id:id}, function(o){

  var data   = JSON.parse(o);
  for (var i = 0; i < data.length; i++) 
{
var id         = data[i].id;
var title      = data[i].Title;
var content    = data[i].content;
var logo       = data[i].logo;
var author     = data[i].author;

$('#post-id').val(id);
$('#post-title').val(title);
$('#post-update .jqte_editor').html(content);
$('#author').html(author);
document.getElementById('logo-preview2').src = file_location+'upload/all_images/thumbnail/'+logo;
$('#logo-input2').val(logo);
}
$('.progress-spin').hide();
});

});
// end of function

//save updated product function
$('#post-form-update').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'blog/update/';
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
          
var counter = 5;
var interval = setInterval(function() {
    counter--;
   
$('.notification').html("Network problem,Trying to save again: "+ counter + "sec");

    if (counter == 0) {
      counter = 8;
update();

        clearInterval(interval);
    }
}, 2000);

         }
});
});

//End of function


});
    