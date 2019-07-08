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

//Start of function
$('.select-btn').on('click', function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    var url = site_location+'purchases/Viewpuchases/';
    
    $.ajax({
        type: 'post',
        url: url,
        data : {id:id},
      beforeSend:function()
      {
      $('#loading').show();
      $('#purchase-widget').hide();
      },
      success:function(o)
      {
        
        $('#purchase-widget').show();
        $('#loading').hide('slow');
        var data   = JSON.parse(o);
        console.log(data);
        for (var i = 0; i < data.length; i++) 
      {
        //client information
        $('.client-names').html(data[i].username);
        $('.client-location').html(data[i].userLocation);
        $('.client-zip').html(data[i].userZip);
        $('.client-City').html(data[i].userCity);
        $('.client-phone').html(data[i].userPhone);
        $('.client-email').html(data[i].userEmail);

        //derivery information
        $('.names').html(data[i].names);
        $('.location').html(data[i].location);
        $('.city').html(data[i].city);
        $('.phone').html(data[i].phone);
        $('.road').html(data[i].road);
        $('.infor').html(data[i].info);

        $('.date').html(data[i].date);
        $('.total').html('$'+data[i].total);
        $('.code').html(data[i].code);
        $('.status').html(data[i].status);
        $('.accept-btn').attr('data-id',data[i].id);

        $(".accept-btn").html(data[i].btn);
        $(".der-notification").html(data[i].message);


        if (data[i].btn == 'ok') {
            $(".accept-btn").hide();
        }
        else
        {
            $(".accept-btn").show();
        }

var productdata = data[i].product;
$('#product-preview').html('');
for (var j = 0; j< productdata.length; j++) 
{
  var html = '<div class="col-lg-4 der-product-widget"><div style="background: #fff url('+file_location+'all-images/thumbnail/'+productdata[j].productdata[0].img+');background-repeat: no-repeat;'+
         'background-position: center center;background-origin: content-box;width:100%;'+
         'height: 150px;background-size: contain;"></div>'+
         '<div class="quantity">'+productdata[j].quantity+'</div><div class="product-name">'+productdata[j].productdata[0].name+'</div>'+
         '<div class="total-price">Total: $'+productdata[j].price+'</div>'+
         '<div class="row no-margin"><label>'+productdata[j].size[0].size_type[0].size_type+'</label><br>'+productdata[j].size[0].size_name+'</div>'+
         '<div class="row no-margin"><label>Color:</label><br> '+checkcolor(productdata[j].color[0].color_name)+' </div>'+
         '</div>';
         $('#product-preview').append(html);
}
  
      }

      }
      });    

});
// End of function

function checkcolor(name)
{
    if (name == 'none') {
        return 'none'; 
    }
    else
    {
        return '<a title="'+name+'" href="#"><span style="color:'+name+'" class="fa fa-circle"></span></a>';
    }
}
    
// Start of functions
$("body").on( "click", ".accept-btn", function (e){

    e.preventDefault();
    var id = $(this).attr('data-id');
    var url = site_location+'purchases/Accept/';
    
    $.ajax({
        type: 'post',
        url: url,
        data : {id:id},
      beforeSend:function()
      {

      },
      success:function(o)
      {
      
        var myObj   = JSON.parse(o);
        var status  = myObj.status;
        var sms     = myObj.message;
        var btn     = myObj.btn;
        
        if (status == "success") {
            if (btn == 'ok') {
                $(".accept-btn").hide();
            }
            else
            {
                $(".accept-btn").html(btn);
            }
          
          $(".der-notification").html(sms);
        }
        else
        {
       
        }

      }
      }); 


});
//end of functions


//Delete post function
$('.btn-delete').on('click', function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    var url = site_location+'purchases/Delete/';
    
    
    Confirmation("Are You Sure ?, all data of this purchase will be removed.",function(response){
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


    });