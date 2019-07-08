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
$('#product-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'product/Addnew/';
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
$('.product-delete').on('click', function(e){
e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'product/Delete/';


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
$('.btn-update-product').on('click', function(e){
  e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'product/Findproduct/';
$.post(url, {id:id}, function(o){

  var data   = JSON.parse(o);
  for (var i = 0; i < data.length; i++) 
{
var id          = data[i].id;
var name        = data[i].product_name;
var logo        = data[i].img;
var price       = data[i].price;
var category_id = data[i].category_id;
var category_name = data[i].category_name;

$('#product-id').val(id);
$('#product-name').val(name);
$('#product-price').val(price);
$('#category-id2').val(category_id);

if (category_name == "none") {
  $('.category-lebel2').html('Select a new category');
}
else
{
  $('.category-lebel2').html(category_name);
}


document.getElementById('logo-preview2').src = file_location+'all-images/thumbnail/'+logo;
$('#logo-input2').val(logo);
}

});

});
// end of function

//save updated product function

$('#product-form-update').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'product/update/';
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

//select category function
$('#select-cat-btn').on('click', function(e){
e.preventDefault();
$('.category-frame').show(100);
});
// End of function


//close category window function
$('.btn-close-cat').on('click', function(e){
e.preventDefault();
$('.category-frame').hide(300);
});
// End of function

//select category function
$('.btn-select-cat').on('click', function(e){
e.preventDefault();

var index = $(this).attr('data-index');
var name  = $(this).attr('data-name');

$('.category-lebel').html(name+' Selected');
$('.checked-input').addClass('shake');
$('#category-id').val(index);

});
// End of function






//select category function
$('#select-cat-btn2').on('click', function(e){
e.preventDefault();
$('.category-frame2').show(100);
});
// End of function


//close category window function
$('.btn-close-cat').on('click', function(e){
e.preventDefault();
$('.category-frame2').hide(300);
});
// End of function

//select category function
$('.btn-select-cat2').on('click', function(e){
e.preventDefault();

var index = $(this).attr('data-index');
var name  = $(this).attr('data-name');

$('.category-lebel2').html(name+' Selected');
$('.checked-input').addClass('shake');
$('#category-id2').val(index);

});
// End of function

//start of function
$('#product-copy').on('click', function (e) {
e.preventDefault();
var url  = site_location+'product/copy/';
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