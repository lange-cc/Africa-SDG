
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


//start of function
$('.btn-new-message').on('click', function(e){
e.preventDefault();
$(".mail-wrapper").fadeTo("slow", 1);
$('.mail-wrapper').css('display','block');
$('.mail-to-input').val('');
 $('#reply_id').val('');
$('.mail-subject-input').val('');
$('.compose-window .jqte_editor').html('');
$('.composer-title').html('New message');

});
//end of function

//start of function
$('.close-sms-tab').on('click', function(e){
e.preventDefault();
$(".mail-wrapper").fadeTo("slow", 0);
$('.mail-wrapper').css('display','none');
});
// end of function



//start of function
$('.btn-sms-reply').on('click', function(e){
e.preventDefault();
$(".mail-wrapper").fadeTo("slow", 1);
$('.mail-wrapper').css('display','block');

var email = $(this).attr('data-email');
var names = $(this).attr('data-names');
$('.mail-to-input').val(email);
$('.composer-title').html(names);

});
//end of function


//save product function
$('#message-form').submit(function(e){
e.preventDefault();
var data = $(this).serialize();
var url = site_location+'inbox/sendmessage';

$.ajax({
  type: 'post',
  url: url,
  data : data,
  beforeSend: function () 
{
$(".sms-notification").show(100);
},

success: function (o){

var myObj   = JSON.parse(o);
      var status  = myObj.status;
      var sms     = myObj.message;

 if (status == 'success') 
  {
  $('.sms-notification').html(sms);
  location.reload();
  }
  else
  {
  $('.sms-notification').html(sms);    

  }

}
});

});
// End of function

//Delete post function
$('.btn-sms-delete').on('click', function(e){
e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'inbox/Delete/';


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
$('#sms-id-'+id).hide(100);
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

//Load message content fuction 
$('.sms-item').on('click', function(e){
 e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'inbox/Find/';
   $.ajax({
            type: 'post',
            url: url,
            data : {id: id, name: id} ,
            beforeSend: function () {
$('#subject').html("");
$('#date-time').html("");
$('#sms-names').html("");
$('#sms-mail').html("");
$('#sms-content').html("");

$(".read-message").hide(100);

$('.loading-panel').css('display','block');

},

success: function (o){
var data   = JSON.parse(o);
for (var i = 0; i < data.length; i++) 
{
$('.loading-panel').css('display','none');
 var id        = data[i].id;
 var names     = data[i].names;
 var mail_from = data[i].mail_from;
 var subject   = data[i].subject;
 var content   = data[i].content;
 var date      = data[i].date;
 
 $('#subject').html(subject);
 $('#date-time').html(date);
 $('#sms-names').html(names);
 $('#sms-mail').html(mail_from);
 $('#sms-content').html(content);
 $('#reply_id').val(id);

$(".read-message").show("slow");
$('.sms-item').removeClass("new");
$('.btn-sms-reply').attr('data-id',id);
$('.btn-sms-reply').attr('data-email',mail_from);
$('.btn-sms-reply').attr('data-names',names);
$('.btn-sms-delete').attr('data-id',id);

}

}
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


