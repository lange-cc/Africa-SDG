

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
$('#add-accounts-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'campany/Addnew/';
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


//save product function
$('#add-year-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'campany/Addnewyear/';
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


//save product function
$('#add-activity-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'campany/AddActivity/';
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

//save product function
$('#add-billings-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'campany/AddBilling/';
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


//save product function
$('.comment-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'campany/AddComment/';
   $('.sms').html('wait...');  
   $.post(url, data, function(o){
      var myObj   = JSON.parse(o);
      var status  = myObj.status;
      var html     = myObj.html;
      var id      = myObj.id;

    if (status == 'success') 
         {
            $('.sms').html('');  
            $('#account-comment_'+id).prepend(html);
            $('#account-comment_'+id+' .no-comment').hide(200);
         }
         else
         {
               
         }
 });
 });
// End of function



//start of function
$('.org_add_account-btn').on('click', function (e) {
   e.preventDefault();
   var data = $(this).data('year');
   $('#year-input').val(data);
})
//end of function



//Delete post function
$('.delete').on('click', function(e){
e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'campany/Delete/';


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
$('.account-update').on('click', function(e){
  e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'campany/Findaccount/';
$.post(url, {id:id}, function(o){

  var data   = JSON.parse(o);
  for (var i = 0; i < data.length; i++) 
{
var id       = data[i].id;
var name     = data[i].name;
var content  = data[i].content;

$('#account_id').val(id);
$('#account-name').val(name);
$('#account-content').html(content);

}

});

});
// end of function

//save updated product function
$('#update-account-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'campany/accountUpdate/';
   $.post(url, data, function(o){
      var myObj   = JSON.parse(o);
      var status  = myObj.status;
      var sms     = myObj.message;

         if (status == 'success') 
         {
            $('.account-notification').html(sms);
            location.reload(); 
         }
         else
         {
             $('.account-notification').html(sms);
         }
});
});

//End of function



//Load product content fuction 
$('.activity-update').on('click', function(e){
  e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'campany/Findactivity/';
$.post(url, {id:id}, function(o){

  var data   = JSON.parse(o);
  for (var i = 0; i < data.length; i++) 
{
var id       = data[i].id;
var content  = data[i].content;

$('#activity_id').val(id);
$('#activity-content').html(content);
}

});

});
// end of function

//save updated product function
$('#update-activity-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'campany/activityUpdate/';
   $.post(url, data, function(o){
      var myObj   = JSON.parse(o);
      var status  = myObj.status;
      var sms     = myObj.message;

         if (status == 'success') 
         {
            $('.activity-notification').html(sms);
            location.reload(); 
         }
         else
         {
            $('.activity-notification').html(sms);
         }
});
});

//End of function




});






  


    