<?php
/**
*
*/
class email
{

  public static function checkout($user_email,$user_f_name,$user_l_name,$client_code){
    $to      = $user_email; // Send email to our user
    $subject = 'Nilefy.com check out'; // Give the email a subject
    $message="
    <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
    <html xmlns='http://www.w3.org/1999/xhtml'>
     <head>
      <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
      <title>NILEFY HTML EMAILS</title>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
      <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Work+Sans'>
    </head>
    <style type='text/css'>
      body {
        font-family: 'Work Sans', 'Lucida Grande', 'Lucida Sans Unicode', Tahoma, Sans-Serif;
      }
    </style>
    <body style='margin: 0; padding: 0;'>
     <table  cellpadding='0' cellspacing='0' width='100%'>
      <tr>
       <td>
         <table align='center'  cellpadding='0' cellspacing='0' width='600' style='border-collapse: collapse;'>
      <tr>
        <td align='center' bgcolor='#94c63f' style='padding: 10px 0 10px 0;'>
         <img src='".URL."images/nilefy-green.png' alt='Nilefy.com Logo'  height='50' style='display: block;' />
        </td>
      </tr>
      <tr>
        <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
         <table  cellpadding='0' cellspacing='0' width='100%'>
          <tr>
           <td style='padding: 5px 0 10px 0;'>
            <font size='5'><b>Hello, $user_f_name</big> You have successfully checked out at <big><font color='#99cc33'>Nilefy.com</font></big></b></font>
           </td>
          </tr>
          <tr>
           <td style='padding: 20px 0 30px 0;' >
            Thank you for using  Nilefy.com. We hope you are enjoying our shopping experience. Your information will be kept confidencial. This is the code you can use for reviewing your shopping history. 
           </td>
          </tr>
          <tr>
            <td style='padding: 20px 0 30px 0;' align='center'>
              <a href='http://nilefy.com/checkout/clientnumber/".$client_code."' style='padding:10px 15px;border-radius:2px;background:#99cc33;color:#fff;text-decoration:none;'>CODE: $client_code</a>
            </td>
          </tr>
         </table>
        </td>
      </tr>
      <tr>
       <td bgcolor='#99cc33' style='padding: 30px 30px 30px 30px;'>
      <table  cellpadding='0' cellspacing='0' width='100%'>
      <tr>
        <td width='65%' color='#fff'>
         &copy; Copyright 2017. Lange Tech<br/>
         All rights reserved. info@nilefy.com
        </td>
        <td>
      <td align='right'>
      <table border='0' cellpadding='0' cellspacing='0'>
       <tr>
         <td>
          <a href='https://www.facebook.com/nilefy'>
           <img src='".URL."images/facebook.png' alt='Facebook' width='38' height='38' style='display: block;' border='0' />
          </a>
         </td>
         <td>
          <a href='https://www.twitter.com/nilefy'>
           <img src='".URL."images/twitter.png' alt='Twitter' width='38' height='38' style='display: block;' border='0' />
          </a>
         </td>
        <td>
         <a href='https://www.instagram.com/nilefy'>
          <img src='".URL."images/youtube.png' alt='Youtube' width='38' height='38' style='display: block;' border='0' />
         </a>
        </td>
        <td>
         <a href='https://www.youtube.com/channel/UCuL906AnBbMzpiQXZQPPK3w'>
          <img src='".URL."images/instagram.png' alt='Instagram' width='38' height='38' style='display: block;' border='0' />
         </a>
        </td>
       </tr>
      </table>
     </td>
       </td>
      </tr>
     </table>
       </td>
      </tr>
     </table>
       </td>
      </tr>
     </table>
    </body>
    </html>
    ";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Nilefy.com <info@nilefy.com>" . "\r\n"."X-MSMail-Priority: High". "\r\n";
  if(  mail($to,$subject,$message,$headers)){
    return 1;
  } else {
    return 0;
  }
  }

	public static function reg($lname,$email)
	{
    $to      = $email; // Send email to our user
    $subject = 'Welcome to Nilefy.com | Account Created'; // Give the email a subject
    $message="
    <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
    <html xmlns='http://www.w3.org/1999/xhtml'>
     <head>
      <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
      <title>NILEFY HTML EMAILS</title>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
      <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Work+Sans'>
    </head>
    <style type='text/css'>
      body {
        font-family: 'Work Sans', 'Lucida Grande', 'Lucida Sans Unicode', Tahoma, Sans-Serif;
      }
    </style>
    <body style='margin: 0; padding: 0;'>
     <table  cellpadding='0' cellspacing='0' width='100%'>
      <tr>
       <td>
         <table align='center'  cellpadding='0' cellspacing='0' width='600' style='border-collapse: collapse;'>
      <tr>
        <td align='center' bgcolor='#94c63f' style='padding: 10px 0 10px 0;'>
         <img src='".URL."images/nilefy-green.png' alt='Nilefy.com Logo'  height='50' style='display: block;' />
        </td>
      </tr>
      <tr>
        <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
         <table  cellpadding='0' cellspacing='0' width='100%'>
          <tr>
           <td style='padding: 5px 0 10px 0;'>
            <font size='5'><b>Hello, </big> Welcome to <big><font color='#99cc33'>Nilefy.com</font></big></b></font>
           </td>
          </tr>
          <tr>
           <td style='padding: 20px 0 30px 0;' >
            Thank you for signing up at Nilefy.com, the home of the most quick, efficient and satisying, online shopping ecommerce. By signing up, you will be the first to get updates and special offers. Since you have signed up you will know about new products and services as we make them available to you.
           </td>
          </tr>
          <tr>
            <td style='padding: 20px 0 30px 0;' align='center'>
              <a href='http://nilefy.com' style='padding:10px 15px;border-radius:2px;background:#99cc33;color:#fff;text-decoration:none;'>SHOP NOW</a>
            </td>
          </tr>
          <tr>
           <td>
             <table  cellpadding='0' cellspacing='0' width='100%'>
              <tr>
               <td width='260' valign='top'>
                <table  cellpadding='0' cellspacing='0' width='100%'>
                 <tr>
                  <td bgcolor='#282E3A' align='center'>
                   <img src='".URL."all-images/8f6f4ff7e80245aef190e46565d03379.jpg' alt='image 1'  height='140' style='display: block;' />
                  </td>
                 </tr>
                 <tr>
                  <td style='padding: 25px 0 0 0;'>
                   Shop for different giftboxes specified for mother, father, brother or sister. You can customize by your preference what is in those giftboxes and you always get giftboxes on them.
                  </td>
                 </tr>
                </table>
               </td>
               <td style='font-size: 0; line-height: 0;' width='20'>
                &nbsp;
               </td>
               <td width='260' valign='top'>
                <table  cellpadding='0' cellspacing='0' width='100%'>
                 <tr>
                  <td bgcolor='#282E3A' align='center'>
                   <img src='".URL."all-images/77f7a72e9ef2a934e601252d16fdd530.jpg' alt='image 2'  height='140' style='display: block;' />
                  </td>
                 </tr>
                 <tr>
                  <td style='padding: 25px 0 0 0;'>
                   You can also buy what you need by piece, and you will be amazed. At Nilefy.com, you will be surprised by good prices that you will most likely find yourself comfortable in. Hey we forgot to tell you that the delivery is 'FREE!'. Enjoy @ Nilefy.com
                  </td>
                 </tr>
                </table>
               </td>
              </tr>
             </table>
           </td>
          </tr>
         </table>
        </td>
      </tr>
      <tr>
       <td bgcolor='#99cc33' style='padding: 30px 30px 30px 30px;'>
      <table  cellpadding='0' cellspacing='0' width='100%'>
      <tr>
        <td width='65%' color='#fff'>
         &copy; Copyright 2017. Lange Tech<br/>
         All rights reserved. info@nilefy.com
        </td>
        <td>
      <td align='right'>
      <table border='0' cellpadding='0' cellspacing='0'>
       <tr>
         <td>
          <a href='https://www.facebook.com/nilefy'>
           <img src='".URL."images/facebook.png' alt='Facebook' width='38' height='38' style='display: block;' border='0' />
          </a>
         </td>
         <td>
          <a href='https://www.twitter.com/nilefy'>
           <img src='".URL."images/twitter.png' alt='Twitter' width='38' height='38' style='display: block;' border='0' />
          </a>
         </td>
        <td>
         <a href='https://www.instagram.com/nilefy'>
          <img src='".URL."images/youtube.png' alt='Youtube' width='38' height='38' style='display: block;' border='0' />
         </a>
        </td>
        <td>
         <a href='https://www.youtube.com/channel/UCuL906AnBbMzpiQXZQPPK3w'>
          <img src='".URL."images/instagram.png' alt='Instagram' width='38' height='38' style='display: block;' border='0' />
         </a>
        </td>
       </tr>
      </table>
     </td>
       </td>
      </tr>
     </table>
       </td>
      </tr>
     </table>
       </td>
      </tr>
     </table>
    </body>
    </html>
    ";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Nilefy.com <info@nilefy.com>" . "\r\n"."X-MSMail-Priority: High". "\r\n";
  if(  mail($to,$subject,$message,$headers)){
    return 1;
  } else {
    return 0;
  }
	}
}

?>
