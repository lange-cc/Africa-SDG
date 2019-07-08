$(function(){

var site_location = $('#js-site-location').attr('value');
var file_location = $('#js-file-location').attr('value');

// this function for dialog
  function Confirmation(message, callback) 
  {
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
$('#account-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'setting/Addnew/';
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

//Delete post function
$('.delete').on('click', function(e){
e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'setting/Delete/';


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
$('.update').on('click', function(e){
  e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'setting/Find/';
$.post(url, {id:id}, function(o){

  var data   = JSON.parse(o);
  for (var i = 0; i < data.length; i++) 
{
var id         = data[i].id;
var name       = data[i].name;
var username   = data[i].username;
var password   = data[i].password;
var email      = data[i].email;
var logo       = data[i].logo;
var cover_logo = data[i].cover_logo;

$('#names').val(name);
$('#profile-id').val(id);
$('#username').val(username);
$('#email').val(email);
$('#password').val(password);

document.getElementById('logo-preview').src = file_location+'all-images/thumbnail/'+logo;
$('#logo-input').val(logo);

document.getElementById('logo-preview1').src = file_location+'all-images/thumbnail/'+cover_logo;
$('#logo-input1').val(cover_logo);

}
$('.progress-spin').hide();
});

});
// end of function

//save updated product function
$('#upadte-account-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'setting/update/';
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

//Start of function
$('.rename-field-btn').on('click', function(e){
e.preventDefault();
var index = $(this).data('index');

var url = site_location+'setting/GetField/';

$.post(url, {index:index}, function(o){

var data   = JSON.parse(o);
for (var i = 0; i < data.length; i++) 
{
var field_1 = data[i].label_1;
var field_2 = data[i].label_2;
var field_3 = data[i].label_3;
var field_4 = data[i].label_4;
var field_5 = data[i].label_5;
var field_6 = data[i].label_6;
var field_7 = data[i].label_7;


$('#field1').val(field_1);
$('#field2').val(field_2);
$('#field3').val(field_3);
$('#field4').val(field_4);
$('#field5').val(field_5);
$('#field6').val(field_6);
$('#field7').val(field_7);
$('#field5').html('selected: '+field_5);
$('#field6').html('selected: '+field_6);

$('#section-index').val(index);



}

});
});
//End of function


//Start function
$('#label-widget-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'setting/saveLabelData/';
   $.post(url, data, function(o){

      var myObj   = JSON.parse(o);
      var status  = myObj.status;
      var sms     = myObj.message;

         if (status == 'success') 
         {
            $('.status-notification').html(sms);
            location.reload(); 
         }
         else
         {
            $('.status-notification').html(sms);
         }
});
});

//End of function


});

//close upload window function
function validate(){
var site_location = $('#js-site-location').attr('value');
var file_location = $('#js-file-location').attr('value');
if (document.getElementById('checkbox-for-id').checked)
{
var url = site_location+'setting/idStatus/';
$.post(url, {data:'true'}, function(o)
{
var myObj   = JSON.parse(o);
      var status  = myObj.status;
      var sms     = myObj.message;
if (status == 'success') 
         {
        alert(sms);
         }
         else
         {
         alert(sms);
         }
});
}
else
{
var url = site_location+'setting/idStatus/';
$.post(url, {data:'false'}, function(o)
{
var myObj   = JSON.parse(o);
      var status  = myObj.status;
      var sms     = myObj.message;
if (status == 'success') 
         {
        alert(sms);
         }
         else
         {
         alert(sms);
         }
});
}
}
// end of function
