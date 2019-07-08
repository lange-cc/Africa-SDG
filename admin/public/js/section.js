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


//Delete section fuction 

  $('.content-delete').on('click', function(e){
 e.preventDefault();
var data = $(this).attr('data-link');
var url = site_location+'section/delete/';

Confirmation("Are You Sure ?",function(response){
   if(response)
   {

$.post(url, {data:data}, function(o){
  var myObj   = JSON.parse(o);
    var status  = myObj.status;
    var sms  = myObj.message;

    if (status == 'success') 
    {
   alert(sms);
   $('#row_'+data).hide('slow');
    }
    else
    {
   alert(sms);
    }
});

}
});
}); 

//end of fuction

//save form content function
$('#content-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'section/save/';
   $.post(url, data, function(o){
           var myObj   = JSON.parse(o);
           var status  = myObj.status;
           

if (status == 'success') {
$(".right-sidebar2").css("box-shadow",'0px 0px 0px 0px #000');
$(".right-sidebar2").fadeTo("slow", 0);

location.reload(); 
	  
};
   });
});
//end of function


//Load section fuction
$('.btn-update-section').on('click', function(e){
e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'section/sectionUpdate/';
$.post(url, {id:id}, function(o){

  var data   = JSON.parse(o);
  for (var i = 0; i < data.length; i++) 
{
var html = '<h3>Update Section</h3><form action="" method="post" class="fadeInDown" id="form-update-section">'+
'<input name="id" value="'+id+'" type="hidden"><label>Title</label>'+
'<input class="form-control" name="title" value="'+data[i].title+'" type="text">'+
'<label>Discription</label>'+
'<textarea class="form-control" name="content" type="text" style="height:300px;">'+data[i].discription+'</textarea><br>'+
'<input type="submit" value="Update" class="btn btn-sl btn-success">'+
'</form><div class="notification"></div>';
$('.aside-content').html(html);
updateSection();
}

});
});
// end of function

//update section function
function updateSection(){
$('#form-update-section').on('submit', function(e){
  e.preventDefault();
  var data = $(this).serialize();
  var url = site_location+'section/Update/';

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
          
var counter = 0;
var interval = setInterval(function() {
    counter++;
   
$('.notification').html("Network problem,Trying to save again: "+ counter + "sec");

    if (counter == 5) {
      
updateSection();

        clearInterval(interval);
    }
}, 2000);

         }

});
});
}
// end of function

//load section content function
$('.view-section').on('click', function(e){
e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'section/sectionView/';
$.post(url, {id:id}, function(o){

  var data   = JSON.parse(o);
  for (var i = 0; i < data.length; i++) 
{
var html = '<h3>Details About Your Section</h3><div class="fadeInDown">'+
'<label>Title</label>'+
'<h5>'+data[i].title+'</h5>'+
'<label>Disription</label>'+
'<p>'+data[i].discription+'</p> </div>';
$('.aside-content').html(html);

}

});
});
//end of function

//delete function
$('.btn-article-delete').on('click', function(e){
e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'section/DeleteArticle/';


Confirmation("Are You Sure ?",function(response){
   if(response)
   {
$.post(url, {id:id}, function(o){
var data    = JSON.parse(o);
var myObj   = JSON.parse(o);
var status  = myObj.status;
var sms     = myObj.message;
alert(sms);
$('#row_art_'+id).hide('slow');

});
  }
  
  });
});
//end of function



$('.content-delete').on('click', function(e){
 e.preventDefault();
var data = $(this).attr('data-link');
var url = site_location+'section/delete/';

Confirmation("Are You Sure ?",function(response){
   if(response)
   {
$.post(url, {data:data}, function(o){
	var myObj     = JSON.parse(o);
  var status    = myObj.status;
  var sms     = myObj.message;
  alert(sms);
   $('#row_'+data).hide('slow');
   location.reload();
    });
 }
 });

});


$('.hidenow').on('click', function(e){

 $(".right-sidebar2").fadeTo("slow", 0);
$('.right-sidebar2').css({'display': 'none'},'slow');

});

$('#show').on('click', function(e){
 e.preventDefault();

 $(".right-sidebar2").fadeTo("slow", 1);
$('.right-sidebar2').css({'display': 'block'},'slow');

});

$('.add-article').on('click', function(e){
 e.preventDefault();

var dataTitle = $(this).attr('data-title');
var dataIndex = $(this).attr('data-index');
$('.jqte_editor').html('');
$('.article-section').html(dataTitle);
$('#section_index_input').val(dataIndex);

$(".article-aside").fadeTo("slow", 1);
$('.article-aside').css({'display': 'block'},'slow');
});

$('.hidearticle-aside').on('click', function(e){
 e.preventDefault();

$('.article-section').html('');
$('#section_index_input').val('');

$(".article-aside").fadeTo("slow", 1);
$('.article-aside').css({'display': 'none'},'slow');
});


$('.close-article-update').on('click', function(e){
  e.preventDefault();
$(".article-update-sidebar").fadeTo("slow", 0);
$('.article-update-sidebar').css({'display': 'none'},'slow');
});



$('.btn-article-upadete').on('click', function(e){
  e.preventDefault();
$(".article-update-sidebar").fadeTo("slow", 1);
$('.article-update-sidebar').css({'display': 'block'},'slow');

var id = $(this).attr('data-id');
var url = site_location+'section/FindArticle/';
$.post(url, {id:id}, function(o){

  var data   = JSON.parse(o);
  for (var i = 0; i < data.length; i++) 
{
var title    = data[i].title;
var subTitle = data[i].subtitle;
var logo     = data[i].logo;
var content  = data[i].content;
var id       = data[i].id;

$('.title').val(title);
$('.sub-title').val(subTitle);
$('#article_id').val(id);
$('.jqte_editor').html(content);
document.getElementById('logo-preview2').src = file_location+'all-images/thumbnail/'+logo;
$('#logo-input2').val(logo);
}
});



});






$('#article-update-form').on('submit', function(e){
  e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'section/UpdateArticle/';

$.post(url, data, function(o){

var myObj   = JSON.parse(o);
         var status  = myObj.status;
         var sms     = myObj.message;

         if (status == 'success') 
         {
            $('#article-msg').html(sms);
            location.reload(); 
         }
         else
         {
          
var counter = 5;
var interval = setInterval(function() {
    counter--;
   
$('#article-msg').html("Network problem,Trying to save again: "+ counter + "sec");

    if (counter == 0) {
    counter = 8;
updateSection();

        clearInterval(interval);
    }
}, 2000);

         }

}); 

});  


$('.btn-article-read').on('click', function(e)
{
  e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'section/FindArticle/';
$.post(url, {id:id}, function(o){

  var data   = JSON.parse(o);
  for (var i = 0; i < data.length; i++) 
{
var title    = data[i].title;
var subTitle = data[i].subtitle;
var logo     = data[i].logo;
var content  = data[i].content;

var html ='<label>Title</label><p>'+title+'</p>'+
'<label>SubTitle</label><p>'+subTitle+'</p>'+
'<label>Article logo</label><br><img src="'+file_location+'all-images/thumbnail/'+logo+'" class="img-responsive"><br>'+
'<label>Content</label><p>'+content+'</p>';

$('.aside-content').html(html);
}
});

});



 function saveArticle()
  {
       var data = $('#article-form').serialize();
   var url = site_location+'section/addArticle/';
   $.post(url, data, function(o){

         var myObj   = JSON.parse(o);
         var status  = myObj.status;
         var sms     = myObj.message;

         if (status == 'success') 
         {
            $('#msg-notification').html(sms);
            location.reload(); 
         }
         else
         {
          
var counter = 0;
var interval = setInterval(function() {
    counter++;
    // Display 'counter' wherever you want to display it.

$('#msg-notification').html("Network problem,Trying to save again: "+ counter + "sec");

    if (counter == 5) {
      
saveArticle();

        clearInterval(interval);
    }
}, 2000);

         }

         });

  }

 $('#article-form').on('submit', function(e){
  e.preventDefault();
  saveArticle();
  
 }); 




});





    