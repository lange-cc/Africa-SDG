

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
$('#search').submit(function(e){
e.preventDefault();
$('#tabledata').html('');

$('.notification').html('please wait...');

   var data = $(this).serialize();
   var url = site_location+'report/viewreport/';
   $.post(url, data, function(o){
 var data   = JSON.parse(o);
$('.notification').html('done');
for (var i = 0; i < data.length; i++) 
{
var html  = '<tr><td>'+data[i].date+'</td><td>'+data[i].project+'</td>'+
 '<td>'+data[i].content+'</td><td>'+data[i].status+'</td></tr>';
$('#tabledata').append(html);
} 


 });
 });
// End of function



//save product function
$('#search-billing').submit(function(e){
e.preventDefault();
$('#tabledata').html('');

$('.notification').html('please wait...');

   var data = $(this).serialize();
   var url = site_location+'report/viewbillingreport/';
   $.post(url, data, function(o){
    $('.notification').html('done');
var data   = JSON.parse(o);

var tot_spend = 0;
var tot_income = 0;


for (var i = 0; i < data.length; i++) 
{
    var spend  = parseInt(data[i].spent);
    var income = parseInt(data[i].income);
  tot_spend  = (tot_spend + spend);
  tot_income = (tot_income + income);
var html  = '<tr><td>'+data[i].client+'</td><td>'+data[i].date+'</td><td>'+data[i].name+'</td>'+
 '<td>'+data[i].spent+'</td><td>'+data[i].income+'</td></tr>';
$('#tabledata').append(html);
} 

var html2  = '<tr><th>TOTAL</th><th></th><th></th>'+
 '<th>'+tot_spend+'</th><th>'+tot_income+'</th></tr>';
$('#tabledata').append(html2);

 });
 });
// End of function





});






  


    