(function($){
  $.fn.bgLoaded = function(custom) {

    var self = this;

  // Default plugin settings
  var defaults = {
    afterLoaded : function(){
      this.addClass('bg-loaded');
    }
  };

    // Merge default and user settings
    var settings = $.extend({}, defaults, custom);

    // Loop through element
    self.each(function(){
      var $this = $(this),
        bgImgs = $this.css('background-image').split(', ');
      $this.data('loaded-count',0);

      $.each( bgImgs, function(key, value){
        var img = value.replace(/^url\(["']?/, '').replace(/["']?\)$/, '');
        $('<img/>').attr('src', img).on('load', function() {
          $(this).remove(); // prevent memory leaks
          $this.data('loaded-count',$this.data('loaded-count')+1);
          if ($this.data('loaded-count') >= bgImgs.length) {
            settings.afterLoaded.call($this);
          }
        });
      });

    });
  };
})(jQuery);

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
$('#txtEditor').jqte();
$('.txtEditor').jqte();
  
  // settings of status
  var jqteStatus = true;
  $(".status").click(function()
  {
    jqteStatus = jqteStatus ? false : true;
    $('#txtEditor').jqte({"status" : jqteStatus})
  });
$('.jqte_toolbar').append('<div class="jqte_tool" ><a class="upload-btn btn btn-xs btn-success" data-type="editor">Add image</a></div>');
function pasteHtmlAtCaret(html, selectPastedContent) {
    var sel, range;
    if (window.getSelection) {
        // IE9 and non-IE
        sel = window.getSelection();
        if (sel.getRangeAt && sel.rangeCount) {
            range = sel.getRangeAt(0);
            range.deleteContents();

            // Range.createContextualFragment() would be useful here but is
            // only relatively recently standardized and is not supported in
            // some browsers (IE9, for one)
            var el = document.createElement("div");
            el.innerHTML = html;
            var frag = document.createDocumentFragment(), node, lastNode;
            while ( (node = el.firstChild) ) {
                lastNode = frag.appendChild(node);
            }
            var firstNode = frag.firstChild;
            range.insertNode(frag);
            
            // Preserve the selection
            if (lastNode) {
                range = range.cloneRange();
                range.setStartAfter(lastNode);
                if (selectPastedContent) {
                    range.setStartBefore(firstNode);
                } else {
                    range.collapse(true);
                }
                sel.removeAllRanges();
                sel.addRange(range);
            }
        }
    } else if ( (sel = document.selection) && sel.type != "Control") {
        // IE < 9
        var originalRange = sel.createRange();
        originalRange.collapse(true);
        sel.createRange().pasteHTML(html);
        if (selectPastedContent) {
            range = sel.createRange();
            range.setEndPoint("StartToStart", originalRange);
            range.select();
        }
    }
}


//end of function

//close upload window function
$('.close-upload').on('click', function(e){
  e.preventDefault();
$("#uploadbox").fadeTo("slow", 0);
$('#uploadbox').css({'display': 'none'},'slow');

});
// end of finction

//show upload window function
$('.upload-btn').on('click', function(e){
  e.preventDefault();
$("#uploadbox").fadeTo("slow", 1);
$('#uploadbox').css({'display': 'block'},'slow');
var type = $(this).attr('data-type');
$("#upload-type").val(type);

});
// end of finction

// View upload images finction
$(document).on("click", '.view-uploade',function(e)
{
  e.preventDefault();
var url = site_location+"section/getImage/";

$.post({
url, 
beforeSend:function()
{
$('.img-reflesh').hide();
$('.img-loading').show();
},
success:function(o){
  $('#menu2').html('');
      var data   = JSON.parse(o);
var html1 = '<div class="row"><br>';
$('#menu2').append(html1);

for (var i = 0; i < data.length; i++) {
var html2 = '<div class="col-lg-3" id="img_id_'+data[i].id+'"><div class="uploaded-img-widget">'+
'<div id="bg_id_'+data[i].id+'" class="bg-img" style="background: #0F1215 url('+file_location+'upload/all_images/thumbnail/'+data[i].img_name+') no-repeat center;background-size: cover;min-height: 150px;position: relative;">'+
'<i id="loader_id_'+data[i].id+'" class="loader fa fa-spinner fa-spin"></i>'+
'</div><a href="" class="btn btn-xs btn-success select-file" data-type="logo" data-url="'+data[i].img_name+'">Select</a>'+
'<a href="" class="btn btn-xs btn-danger delete-img" data-id="'+data[i].id+'" data-name="'+data[i].img_name+'">Delete</a></div></div>';
$('#menu2').append(html2);

$('#bg_id_'+data[i].id).bgLoaded({
  afterLoaded : function(){
   this.addClass('bg-loaded');
  $(this).find("i").hide();
  }
});

};

var html3 ='</div><button type="button" class="btn btn-danger btn-sl close-upload make-fixed-bottom"><i class="fa fa-power-off"></i><span>Close</span></button>';
$('#menu2').append(html3);

$('.img-loading').hide();
$('.img-reflesh').show();

select();
$('.close-upload').on('click', function(e){
  e.preventDefault();
$("#uploadbox").fadeTo("slow", 0);
$('#uploadbox').css({'display': 'none'},'slow');

});

$('.delete-img').on('click', function(e){
  e.preventDefault();
var url = site_location+"section/DeleteImage/";
var file_name = $(this).attr('data-name');
var file_id = $(this).attr('data-id');

Confirmation("Are You Sure ?",function(response){
   if(response)
   {
$.post(url,{data:file_name,id:file_id}, function(o){
  var myObj  = JSON.parse(o);
  var status = myObj.status;
  var sms    = myObj.message;
  if (status == "success") {
alert(sms);
$('#img_id_'+file_id).hide(100);
}
else
{
alert(sms); 
}

});
}
});
});
}
})

});
// end of finction

// Select image finction
function select()
{
$(document).on("click", '.select-file',function(e)
{
e.preventDefault();
var type      = $('#upload-type').attr('value');
var file_name = $(this).attr('data-url');
var file_url  = file_location+'upload/all_images/thumbnail/'+file_name;


if (type == 'modal') {
document.getElementById('logo-preview2').src = file_url;
$('#logo-input2').val(file_name);
$("#uploadbox").fadeTo("slow", 0);
$('#uploadbox').css({'display': 'none'},'slow');
}
else if (type == 'form') {
document.getElementById('logo-preview').src = file_url;
$('#logo-input').val(file_name);
$("#uploadbox").fadeTo("slow", 0);
$('#uploadbox').css({'display': 'none'},'slow');
}
else if (type == 'editor') {
var img = '<img src="'+file_url+'" width="300">';
    
 $('.jqte_editor').focus();
    var selectPastedContent = 'abe';
    pasteHtmlAtCaret(img, selectPastedContent);
    $("#uploadbox").fadeTo("slow", 0);
$('#uploadbox').css({'display': 'none'},'slow');
    return false;
}
else
{
  alert('No upload type defined')
}

});
}
// end of finction

//=========== end of main functions =================


//save product function
$('#folder-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'gallery/Addnew/';
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
$('.folder-delete').on('click', function(e){
e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'gallery/Delete/';


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
$('.btn-update-folder').on('click', function(e){
  e.preventDefault();
var id = $(this).attr('data-id');
var url = site_location+'gallery/FindFolder/';
$.post(url, {id:id}, function(o){

  var data   = JSON.parse(o);
  for (var i = 0; i < data.length; i++) 
{
var id      = data[i].id;
var name    = data[i].name;
var content = data[i].content;

$('#folder-id').val(id);
$('#folder-name').val(name);
$('#folder-content').html(content);
}

$('.progress-spin').hide();
});

});
// end of function

//save updated product function

$('#folder-form-update').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'gallery/update/';
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