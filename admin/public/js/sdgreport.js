$(document).ready(function(){
   var site_location = $('#js-site-location').attr('value');
   var file_location = $('#js-file-location').attr('value');
   var admin_file_location = $('#js-ad-file-location').attr('value');

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

//save  function
$('#report-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();

   var url = site_location+'sdgreport/Addnew/';
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

// Start of function
  $('.add-file-btn').on('click', function (e) {
     e.preventDefault();
     $('.empty').val('');
     $('.empty').html('');

     var id = $(this).data('id');
     $('#report-id').val(id);
     $('.selected-file').html('');
      
      getFilesData(id);
  })
// End of function

function getFilesData(id) {
   $('.selected-file').html('');
   var url = site_location+'sdgreport/Getfiles/';
   $.post(url, {id:id}, function(o){
      var data   = JSON.parse(o);
    for (var i = 0; i < data.length; i++)
      {
        var html = '<li id="file_'+data[i].id+'">'+(i+1)+'. '+data[i].file_name+' <a href="javascript:void(0)"  data-id="'+data[i].id+'" class="anouncement-trash-btn file-delete"><span class="fa fa-trash"></span></a></li>';
        $('.selected-file').append(html);
      }
 });
}

// Stat of function
  $(document).on('click','.file-delete', function (e) {
     e.preventDefault();

var id = $(this).attr('data-id');
var url = site_location+'sdgreport/FileDelete/';


Confirmation("Are You Sure ?",function(response){
   if(response)
   {
$.post(url, {id:id}, function(o){
var myObj   = JSON.parse(o);
var status  = myObj.status;
var sms     = myObj.message;

if (status == "success") {
alert(sms);
$('#file_'+id).hide(1000);
}
else
{
alert(sms);
}


});
  }

  });

})
// End of function

// Start of function
$('#other-file-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'sdgreport/SaveFile/';

   var id   = $('#report-id').attr('value');

   $.ajax({
       url: url,
       type: 'POST',
       data: data,
    beforeSend:function()
    {
       $('.notification').html("Please wait...");
    },
       success: function (o) {
      var myObj   = JSON.parse(o);
      var status  = myObj.status;
      var sms     = myObj.message;

         if (status == 'success')
         {
            $('.notification').html(sms);
            //location.reload();
            getFilesData(id);
         }
         else
         {
             $('.notification').html(sms);

         }
       }
   });

 });
// End of function

// Start of function
$('#other-file-input').on('change', function (e) {
    var url = site_location+'sdgreport/AddFiles/';

Confirmation("Are You Sure?",function(response){
   if(response)
   { 
var formData = new FormData();
formData.append('files', $('#other-file-input')[0].files[0]);
$.ajax({
       url : url,
       type : 'POST',
       data : formData,
       processData: false,  // tell jQuery not to process the data
       contentType: false,  // tell jQuery not to set contentType
       beforeSend:function()
       {
         $('.notification').html("Please wait...");
       },
       success : function(data) {
           var file   = JSON.parse(data);
           var file_name = file.files[0].name;
           if (file_name != '') {
            $('.notification').html('Uploaded');
            $('#report_file_name').val(file_name);
           } 
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
var url = site_location+'sdgreport/getreport/';
$.post(url, {id:id}, function(o){


function getFileExtension(filename) {
    return filename.split('.').pop();
}


var data   = JSON.parse(o);
for (var i = 0; i < data.length; i++)
{
var id         = data[i].id;
var title      = data[i].title;
var logo       = data[i].file;
var content    = data[i].content;
var section    = data[i].section;
var year       = data[i].year;

 var ext = getFileExtension(logo);
       if (ext == 'pdf') {
          var preview = admin_file_location + 'images/pdf-icon.png';
       }
       else if (ext == 'xlsx') {
          var preview = admin_file_location + 'images/excel-icon.png';
       }
       else if (ext == 'png' || ext == 'jpg' || ext == 'jpeg') {
          var preview = file_location+'all-images/thumbnail/'+logo;
       }
       else
       {
         var preview = admin_file_location + 'images/no-preview.jpg';
       }

$('#id').val(id);
$('#title').val(title);
$('#year').val(year);
$('#year').html(year);
$('#rep-section').html('Selected: '+section);
$('#rep-section').val(section);
$('.file-name-label').html(logo);
$('#update-report-modal .jqte_editor').html(content);
document.getElementById('logo-preview3').src = preview;
$('#logo-input3').val(logo);
}

});

});
// end of function


//save  function
$('#upload-report-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'sdgreport/update/';
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
var url = site_location+'sdgreport/Delete/';


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
$('#card_'+id).hide(100);
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


//start of function
$('#content-copy').on('click', function (e) {
    e.preventDefault();
    var url  = site_location+'sdgreport/copy/';
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
