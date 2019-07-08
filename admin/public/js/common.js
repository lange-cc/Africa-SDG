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



function embend () {
  var data = $('.video-embend').val();
  $('.video-priview').html(data);
}




$(document).ready(function(){
var site_location = $('#js-site-location').attr('value');
var file_location = $('#js-file-location').attr('value');
var admin_file_location = $('#js-ad-file-location').attr('value');




// setInterval(function() {
// var url = site_location+'inbox/numberofunread/';
// $.ajax({
// type: 'post',
// url: url,
// beforeSend: function (){

// },
// success: function (o){
// var myObj   = JSON.parse(o);
// var number  = myObj.number;
// $('#N_new_sms').html('New '+number);
// $('#N_new_sms1').html(number);
// $('.new-sms-number').html(number);
// }
// });
// }, 5000);

// setInterval(function() {
// var url = site_location+'inbox/numberofinbox/';
// $.ajax({
// type: 'post',
// url: url,
// beforeSend: function (){

// },
// success: function (o){
// var myObj   = JSON.parse(o);
// var number  = myObj.number;
// $('#N_inbox_sms').html('All '+number);
// }
// });
// }, 5000);

// setInterval(function() {
// var url = site_location+'inbox/numberofsent/';
// $.ajax({
// type: 'post',
// url: url,
// beforeSend: function (){

// },
// success: function (o){
// var myObj   = JSON.parse(o);
// var number  = myObj.number;
// $('#N_sent_sms').html('All '+number);
// }
// });
// }, 5000);

//save product function
$('#top-nav-sms-btn').on('click',function(e)
{
var url = site_location+'inbox/loadnewsms/';
$.ajax({
type: 'post',
url: url,
beforeSend: function (){
$('#top_nav_sms_panel').html("");
$('#nav-tab-loading').show();
},
success: function (o){
$('#nav-tab-loading').hide();
var data   = JSON.parse(o);

if (data.status == 'nothing') {
$('#top_nav_sms_panel').html('<li>no new sms available</li>');
}
else
{
for (var i = 0; i < data.length; i++)
{
var html = '<li><a href="'+site_location+'inbox/search/'+data[i].id+'/"><div class="pull-left">'+
           '<img src="'+admin_file_location+'images/mail.png" class="img-circle" alt="User Image">'+
           '</div><h4>'+data[i].names+'<small><i class="fa fa-clock-o"></i> '+data[i].date+'</small>'+
           '</h4><p>Subject: '+data[i].subject+'</p></a></li>';
           $('#top_nav_sms_panel').append(html);
}

}

}
});

});
//end of funcion

//start of function
$('#fileupload').fileupload({
    url: site_location + 'section/upload/'
});
//end of function



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


$('.jqte_toolbar').append('<div class="jqte_tool" ><a class="upload-btn" data-type="editor"><span class="fa fa-image"></span></a></div><div class="jqte_tool" ><a class="" data-toggle="modal" data-target="#add-video-panel" data-type="editor"><span class="fa fa-video-camera"></span></a></div>');


var currentRange;

var methodss = {
    saveSelection: function() {
      //Function to save the text selection range from the editor
      $('.jqte_editor').focus();
        if (window.getSelection) {
            sel = window.getSelection();
            if (sel.getRangeAt && sel.rangeCount) {
               currentRange = sel.getRangeAt(0);
            }
        } else if (document.selection && document.selection.createRange) {
            currentRange = document.selection.createRange();
        }
        else
          currentRange =  null;
    },
    restoreSelection: function(text,mode) {
      //Function to restore the text selection range from the editor
      var node;
      typeof text !== 'undefined' ? text : false;
      typeof mode !== 'undefined' ? mode : "";
      var range = currentRange;
        if (range) {
            if (window.getSelection) {
              if(text){
                  range.deleteContents();
                  if(mode=="html")
                  {
                    var el = document.createElement("div");
                    el.innerHTML = text;
                    var frag = document.createDocumentFragment(), node, lastNode;
                    while ( (node = el.firstChild) )
                       {
                    lastNode = frag.appendChild(node);
                       }
                    range.insertNode(frag);
                  }
                  else
                    range.insertNode( document.createTextNode(text) );

                }
                sel = window.getSelection();
                sel.removeAllRanges();
                sel.addRange(range);
            }
            else if (document.selection && range.select) {
                range.select();
                if(text)
                {
                  if(mode=="html")
                    range.pasteHTML(text);
                  else
                    range.text = text;
                }
            }
        }
    },

    restoreIESelection:function() {
      //Function to restore the text selection range from the editor in IE
      var range = currentRange;;
        if (range) {
            if (window.getSelection) {
                sel = window.getSelection();
                sel.removeAllRanges();
                sel.addRange(range);
            } else if (document.selection && range.select) {
                range.select();
            }
        }
    },

    insertTextAtSelection:function(text,mode) {
        var sel, range, node ;
        typeof mode !== 'undefined' ? mode : "";
        if (window.getSelection) {
            sel = window.getSelection();
            if (sel.getRangeAt && sel.rangeCount) {
                range = sel.getRangeAt(0);
                range.deleteContents();
                var textNode = document.createTextNode(text);

                if(mode=="html")
                {
                    var el = document.createElement("div");
                    el.innerHTML = text;
                    var frag = document.createDocumentFragment(), node, lastNode;
                    while ( (node = el.firstChild) ) {
                        lastNode = frag.appendChild(node);
                    }
                    range.insertNode(frag);
                }
                else
                {
                  range.insertNode(textNode);
                  range.selectNode(textNode);
                }
                sel.removeAllRanges();
                range = range.cloneRange();
                range.collapse(false);
                sel.addRange(range);
            }
        } else if (document.selection && document.selection.createRange) {
            range = document.selection.createRange();
            range.pasteHTML(text);
            range.select();
        }
    }
  };




$('.jqte_editor').on('keyup click keydown', function(){
    methodss.saveSelection();
});




$('.embend').on('click', function (e) {
e.preventDefault();
methodss.restoreSelection();
methodss.restoreIESelection();
var data = $('.video-embend').val();
$('.jqte_editor').focus();
var selectPastedContent = 'abe';
pasteHtmlAtCaret(data, selectPastedContent);
});


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
$("#uploadbox,#uploadbox1,#uploadbox2").fadeTo("slow", 0);
$('#uploadbox,#uploadbox1,#uploadbox2').css({'display': 'none'},'slow');


});
// end of finction

//show upload window function
$('.upload-btn').on('click', function(e){
e.preventDefault();
$(".upload-overlay").show("slow");
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

$.ajax({
type: 'post',
url: url,
beforeSend: function ()
{
$('.img-reflesh').hide();
$('.img-loading').show();
},

success: function (o){

$('#menu2').html('');
var dataa   = JSON.parse(o);

var list =  dataa;




function asyncFunction (data, cb) {
    setTimeout(() => {

    var ext = getFileExtension(data.img_name);
       if (ext == 'pdf') {
          var preview = admin_file_location + 'images/pdf-icon.png';
       }
       else if (ext == 'xlsx') {
          var preview = admin_file_location + 'images/excel-icon.png';
       }
       else if (ext == 'png' || ext == 'jpg' || ext == 'jpeg') {
          var preview = file_location+'all-images/thumbnail/'+data.img_name;
       }
       else
       {
         var preview = admin_file_location + 'images/no-preview.jpg';
       }


var html2 = '<div class="col-lg-3" id="img_id_'+data.id+'" ><div class="sdg-widget">'+
 '<div class="sdg-card" id="bg_id_'+data.id+'" style="background: transparent url('+preview+');background-repeat: no-repeat;background-position: center center;background-size: cover;width:100%;"></div>'+
 '<div class="gallery-option">'+
 '<a href="javascript:void(0)"  data-id="'+data.id+'" data-name="'+data.img_name+'" class="delete-img anouncement-trash-btn"><span class="fa fa-trash"></span></a>'+
 '<a href="javascript:void(0)"  data-type="logo" data-url="'+data.img_name+'" class="select-file announcement-update-btn"><span class="fa fa-check"></span></a>'+
 '</div></div>'+
 '<div class="sdg-widget-info">'+
 '<p>'+data.img_name+'</p>'+
 '</div></div>';

        $('#menu2').append(html2);

        $('#bg_id_'+data.id).bgLoaded({
        afterLoaded : function(){
        this.addClass('bg-loaded');
        $(this).find("i").hide();
        }
        });


      cb();
    }, 50);
  }





  let requests = list.reduce((promiseChain, data) => {
      return promiseChain.then(() => new Promise((resolve) => {
        asyncFunction(data, resolve);
      }));
  }, Promise.resolve());

  requests.then(() => $('.img-loading').hide());
  requests.then(() => $('.img-reflesh').show());



}

});


});
// end of finction



function getFileExtension(filename) {
    return filename.split('.').pop();
}

//start of fuction
$(document).on("click", '.close-upload',function(e){
e.preventDefault();
$("#uploadbox").fadeTo("slow", 0);
$('#uploadbox').css({'display': 'none'},'slow');
$(".upload-overlay").hide("slow");
});
//end of function

//start of function
$(document).on("click", '.delete-img',function(e){
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
//end of function




// Select image finction
$(document).on("click", '.select-file',function(e)
{
e.preventDefault();
$(".upload-overlay").hide("slow");
var type      = $('#upload-type').attr('value');
var file_name = $(this).attr('data-url');
var file_url  = file_location+'all-images/thumbnail/'+file_name;


 var ext = getFileExtension(file_name);
       if (ext == 'pdf') {
          var file_url = admin_file_location + 'images/pdf-icon.png';
       }
       else if (ext == 'xlsx') {
          var file_url = admin_file_location + 'images/excel-icon.png';
       }
       else if (ext == 'png' || ext == 'jpg' || ext == 'jpeg') {
          var file_url = file_url;
       }
       else
       {
          var file_url = admin_file_location + 'images/no-preview.jpg';
       }



if (type == 'modal')
{
document.getElementById('logo-preview2').src = file_url;
$('#logo-input2').val(file_name);
$("#uploadbox").fadeTo("slow", 0);
$('#uploadbox').css({'display': 'none'},'slow');
}
else if (type == 'modal2')
{
document.getElementById('logo-preview3').src = file_url;
$('#logo-input3').val(file_name);
$("#uploadbox").fadeTo("slow", 0);
$('#uploadbox').css({'display': 'none'},'slow');
$('.file-name-label').html(file_name);
}
else if (type == 'form') {

document.getElementById('logo-preview').src = file_url;
$('#logo-input').val(file_name);
$("#uploadbox").fadeTo("slow", 0);
$('#uploadbox').css({'display': 'none'},'slow');
}
else if (type == 'form2')
{
    document.getElementById('logo-preview1').src = file_url;
    $('#logo-input1').val(file_name);
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
   //alert('No upload type defined');
   $('#uploadbox,.upload-overlay,#uploadbox1,#uploadbox2').hide(100);
}

});

// end of finction


//start of function
$(document).on("click", '.lang',function(e){
e.preventDefault();
var abrev = $(this).attr('data-abrev');
var url   = site_location+"language/select";

Confirmation("Are You Sure you want to change content language?",function(response){
if(response)
{

$.ajax({
type: 'post',
url: url,
data:{abrev:abrev},
beforeSend: function (){

},
success: function (o)
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

//start of function
// $('.tooltip').tooltipster({
//    animation: 'fade',
//    delay: 200,
//    theme: 'tooltipster-punk'
// });
//end of function

//=========== end of main functions =================

});
