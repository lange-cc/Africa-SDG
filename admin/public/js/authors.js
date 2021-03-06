

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
$('#author-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'authors/Addnew/';
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
          
var counter = 5;
var interval = setInterval(function() {
    counter--;
   
$('.notification').html("Network problem,Trying to save again: "+ counter + "sec");

    if (counter == 0) {
      counter = 8;


        clearInterval(interval);
    }
}, 2000);

         }


 });

 });
// End of function


//Delete post function
$('.btn-author-delete').on('click', function(e){
e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'authors/Delete/';


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

//Load author content fuction 
$('.btn-author-update').on('click', function(e){
  e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'authors/Findauthor/';
$.post(url, {id:id}, function(o){

  var data   = JSON.parse(o);
  for (var i = 0; i < data.length; i++) 
{
var id          = data[i].id;
var name        = data[i].name;
var description = data[i].description;
var logo        = data[i].logo;


$('#author-id').val(id);
$('#author-name').val(name);
$('#update-author-form .jqte_editor').html(description);
document.getElementById('logo-preview2').src = file_location+'all-images/thumbnail/'+logo;
$('#logo-input2').val(logo);
}
});

});
// end of function

//save updated product function
$('#update-author-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'authors/update/';
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






  


    