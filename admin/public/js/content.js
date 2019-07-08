
$(function(){

var site_location = $('#js-site-location').attr('value');
var file_location = $('#js-file-location').attr('value');
  
// this function for dialog
  function Confirmation(message, callback) {
        if ($('#modalConfirmation_MyTools') != undefined) $('#modalConfirmation_MyTools').remove();
        $('body').append('<div class=" modal" id="modalConfirmation_MyTools">\
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


// load java fuction
function load()
{
  $('.content-delete').on('click', function(e){
 e.preventDefault();
var data = $(this).attr('data-link');
var url = site_location+'content/delete/';

$.post(url, {data:data}, function(o){
  var myObj   = JSON.parse(o);
    var status  = myObj.status;
   alert(status);
   $('#row_'+data).hide('slow');
});
}); 
}
// end of function

// saving data function
$('#content-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'content/save/';

   $.post(url, data, function(o){
           var myObj   = JSON.parse(o);
           var status  = myObj.status;
           var sms  = myObj.message;
           


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
//end of function

// delete data fuction
$('.content-delete').on('click', function(e){
 e.preventDefault();
var id = $(this).attr('data-link');
var url = site_location+'content/delete/';

Confirmation("Are You Sure ?",function(response){
   if(response)
   {
$.post(url, {id:id}, function(o){
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
// end of function

//hide aside window fuction
$('.hidenow').on('click', function(e){
$(".right-sidebar").fadeTo("slow", 0);
 $(".right-sidebar").css("display",'none');
});
//end of fuction

//show aside window function
$('#show').on('click', function(e){
 e.preventDefault();
 $(".right-sidebar").fadeTo("slow", 1);
 $(".right-sidebar").css("display",'block');
});
//end of function


//load content data function
$('.content-update').on('click', function(e){
  e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'content/Findcontent/';
$.post(url, {id:id}, function(o){

  var data   = JSON.parse(o);

var type    = data[0].type;
var content = data[0].content;
var id      = data[0].id;

$('#content-type').val(type);
$('#content-text').html(content);
$('#content-id').val(id);

});

});
//end of function



// content update form function
$('#update-content-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'content/update/';

   $.post(url, data, function(o){
      var myObj   = JSON.parse(o);
      var status  = myObj.status;
       var sms  = myObj.message;
           
if (status == 'success') 
         {
            $('#msg').html(sms);
            location.reload(); 
         }
         else
         {
          
var counter = 5;
var interval = setInterval(function() {
    counter--;
   
$('#msg').html("Network problem,Trying to save again: "+ counter + "sec");

    if (counter == 0) {
    counter = 8;


        clearInterval(interval);
    }
}, 2000);

         }

   });
  });
// end of function



//start of function
$('#content-copy').on('click', function (e) {
e.preventDefault();
var url  = site_location+'content/copy/';
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

});

 
