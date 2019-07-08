

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

//load editor function
// $('#txtEditor').jqte();
// $('.txtEditor').jqte();


//=========== end of main functions =================



//save product function
$('#add-billings-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'billing/AddBilling/';
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




//Delete post function
$('.delete').on('click', function(e){
e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'billing/Delete/';


Confirmation("Are You Sure? This will delete all account data.",function(response){
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
var url = site_location+'billing/Findbilling/';
$.post(url, {id:id}, function(o){

  var data   = JSON.parse(o);
  for (var i = 0; i < data.length; i++) 
{
var id        = data[i].id;
var activity  = data[i].name;
var spend     = data[i].spent;
var income    = data[i].income;
var client_id      = data[i].client;
var client_name    = data[i].client_name;

$('#id').val(id);
$('#activity').val(activity);
$('#client-input').val(client_id);
$('.Currently').html(client_name);
$('#spend').val(spend);
$('#income').val(income);

}

});

});
// end of function

//save updated product function
$('#update-billings-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'billing/Update/';
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
//End of function


});






  


    