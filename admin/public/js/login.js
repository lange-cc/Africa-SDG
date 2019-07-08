  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });

var site_location = $('#js-site-location').attr('value');
var file_location = $('#js-file-location').attr('value');

//Start function
$('#login-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'login/run/';
   $('.loading-logo').show();
   $.post(url, data, function(o){
      var myObj   = JSON.parse(o);
      var status  = myObj.status;
      var sms     = myObj.message;

         if (status == 'success') 
         {
            $('.success-notification').show();
            $('.fail-notification').hide();
            $('.loading-logo').hide();
            $('.success-notification').html('<span class="fa fa-check"></span> '+sms);
            window.location.replace(site_location+'wellcome'); 
         }
         else
         {
         	$('.success-notification').hide();
            $('.fail-notification').show();
            $('.loading-logo').hide();
            $('.fail-notification').html('<span class="fa fa-exclamation-triangle "></span> '+sms);
         }


 });

 });
// End of function


//Start function
$('#create-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'login/createAccount/';
   $('.loading-logo').show();
   $.post(url, data, function(o){
      var myObj   = JSON.parse(o);
      var status  = myObj.status;
      var sms     = myObj.message;

         if (status == 'success') 
         {
            $('.success-notification').show();
            $('.fail-notification').hide();
            $('.loading-logo').hide();
            $('.success-notification').html('<span class="fa fa-check"></span> '+sms);
            window.location.replace(site_location+'login'); 
         }
         else
         {
          $('.success-notification').hide();
            $('.fail-notification').show();
            $('.loading-logo').hide();
            $('.fail-notification').html('<span class="fa fa-exclamation-triangle "></span> '+sms);
         }


 });

 });
// End of function


//Start function
$('#remember-form').submit(function(e){
e.preventDefault();
   var data = $(this).serialize();
   var url = site_location+'login/RememberAccount/';
   $('.loading-logo').show();
   $.post(url, data, function(o){
      var myObj   = JSON.parse(o);
      var status  = myObj.status;
      var sms     = myObj.message;

         if (status == 'success') 
         {
            $('.success-notification').show();
            $('.fail-notification').hide();
            $('.loading-logo').hide();
            $('.success-notification').html('<span class="fa fa-check"></span> '+sms);
             
         }
         else
         {
          $('.success-notification').hide();
            $('.fail-notification').show();
            $('.loading-logo').hide();
            $('.fail-notification').html('<span class="fa fa-exclamation-triangle "></span> '+sms);
         }


 });

 });
// End of function

  });