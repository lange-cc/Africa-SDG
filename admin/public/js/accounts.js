

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
$('#account-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'accounts/Addnew/';
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
var url = site_location+'accounts/Delete/';


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
$('.account-btn-update').on('click', function(e){
  e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'accounts/Find/';
$.post(url, {id:id}, function(o){

  var data   = JSON.parse(o);
  for (var i = 0; i < data.length; i++) 
{
var id       = data[i].id;
var fname    = data[i].f_name;
var lname    = data[i].l_name;
var dd       = data[i].dd;
var mm       = data[i].mm;
var yyy      = data[i].yyy;
var sex      = data[i].sex;
var location = data[i].location;
var email    = data[i].email;
var password = data[i].password;
var status   = data[i].status;
var logo     = data[i].logo;
$('#account-id').val(id);
$('#f_name').val(fname);
$('#l_name').val(lname);
$('#dd').html(dd);
$('#mm').html(mm);
$('#yyy').html(yyy);

$('#ddo').val(dd);
$('#mmo').val(mm);
$('#yyyo').val(yyy);

$('#sex').html(sex);
$('#sexo').val(sex);

$('#location').html(location);
$('#locationo').val(location);

$('#email').val(email);
$('#password').val(password);
$('#re-password').val(password);


$('#member-update .jqte_editor').html(content);
document.getElementById('logo-preview2').src = file_location+'all-images/thumbnail/'+logo;
$('#logo-input2').val(logo);
}
$('.progress-spin').hide();
});

});
// end of function

//save updated product function
$('#account-form-update').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'accounts/update/';
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


});


