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
$('#language-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'language/Addnew/';
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
var url = site_location+'language/Delete/';


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


//Load product content fuction 
$('.update').on('click', function(e){
  e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'language/findlanguage/';
$.post(url, {id:id}, function(o){

  var data   = JSON.parse(o);
  for (var i = 0; i < data.length; i++) 
{
var id     = data[i].id;
var name   = data[i].name;
var abrev  = data[i].abrev;
var type   = data[i].type;

$('#id').val(id);
$('#name').val(name);
$('#abrev').val(abrev);
$('#type').val(type);
$('#type').html('Currently('+type+')');

}

});

});
// end of function

//save updated product function

$('#language-form-update').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'language/update/';
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


//start of function
$('#add-keyword-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'language/Addnewkeyword/';
   $.post(url, data, function(o){
      var myObj   = JSON.parse(o);
      var status  = myObj.status;
      var sms     = myObj.message;


         if (status == 'success') 
         {

      var keyword = myObj.keyword;
      var key     = myObj.key;
      var id      = myObj.id;

  var number = $('.count-list').length + 1;
  var html = '<div id="row_'+id+'"style="background: #f9f9f9;" class="keyword-list keyword-list2 count-list"><form class="keywords-list-form" action="" method="post"><span class="key-not">New</span><ul>'+
    '<li class="list-number">'+number+'</li>'+
    '<li class="key-name key-margin-input"><span><input class="lang-input2" placeholder="Keyword" type="text" value="'+keyword+'" name="keyword"></span></li>'+
    '<li class="key key-margin-input"><input class="lang-input2" placeholder="Key" type="text" name="key" value="'+key+'"><input  type="hidden" name="id" value="'+id+'"></li>'+
    '<li class="key-margin-input"> <input type="submit" class="btn key-btn" value="update"></li>'+
    '</ul></form><a href="javascript:void(0)" data-id="'+id+'" class="delete-key-btn" title="Delete"><span class="fa fa-eraser"></span></a></div>';
  $('.onedit-key-list').append(html);

$('.lang-input').val('');

            
         }
         else
         {  
           alert(sms);
         }


 });

 });
//end of function


//start of function
$("body").on( "submit", ".keywords-list-form", function (e){
e.preventDefault();
   var data = $(this).serialize();
   var url  = site_location+'language/updatekeyword/';
   var form = $(this);
   $.post(url, data, function(o){

      var myObj   = JSON.parse(o);
      var status  = myObj.status;
      var sms     = myObj.message;

         if (status == 'success') 
         {
            $(form).find('.key-not').html(sms);
         }
         else
         {
            $(form).find('.key-not').html(sms);
         }


 });

 });
//end of function


//Delete product function
$("body").on( "click", ".delete-key-btn", function (e){
e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'language/DeleteKeyword/';


Confirmation("Are You Sure ?",function(response){
   if(response)
   {
$.post(url, {id:id}, function(o){
var data    = JSON.parse(o);
var myObj   = JSON.parse(o);
var status  = myObj.status;
var sms     = myObj.message;
alert(sms);
$('#row_'+id).hide('slow').remove();


});
  }
  
  });

});
// End of function


//Start of function
$("body").on( "click", ".copy-btn", function (e){
e.preventDefault();
var defid = $(this).attr('data-id');
var edtid = $(this).attr('data-edit');
var abrev = $(this).attr('data-abrev');

var url = site_location+'language/copy/';


Confirmation("Are You Sure ? All data of Default language will be copied to Edit language, You will change keywords to that language.",function(response){
   if(response)
   {
$.post(url, {defid:defid,edtid:edtid,abrev:abrev}, function(){
location.reload(); 

});
  }
  
  });

});
// End of function

//start of function
  $('.in-editing-textarea').on('keyup',function(){
     var id = $(this).data('id');
    $(id).val($(this)[0].innerHTML);
  });
//End of function


//START function
$("body").on( "click", ".btn-copy", function (e){
e.preventDefault();
var lang = $(this).attr('data-lang');
var url = site_location+'language/Copylang/';

$('.progress-bar').css('width','0%');

Confirmation("Are You Sure ?",function(response){
   if(response)
   {
$.post(url, {lang:lang}, function(o){

var data   = JSON.parse(o);
var status  = data.status;
var sms     = data.message;

var i = 1;
doSomething(i);


function doSomething(i) {
   $('.progress-bar').css('width',i+'%');
   if (i <=100) {
    setTimeout(doSomething(i+1),1000); 
      if (i == 100) 
        {
           $('.copy-status').html('All language data copied');
        }
  }
}



});
  }
  
  });

});
// End of function


});