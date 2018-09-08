<?php
//The Funtion below Creates a Verification key !! Saala ab kaun karega DNS attack
function keygenerator($length){
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
     $charactersLength = strlen($characters);
     $randomString = '';
     for ($i = 0; $i < $length; $i++) {
         $randomString .= $characters[rand(0, $charactersLength - 1)];
     }
     return $randomString;
}


//Yeh neeche hai Mailer Script
function mailer($email,$password,$to_id,$message,$subject){
  require 'phpmailer/PHPMailerAutoload.php';
  $mail = new PHPMailer;
  $mail->isSMTP();
  $mail->SMTPOptions = array(
                              'ssl' => array(
                              'verify_peer' => false,
                              'verify_peer_name' => false,
                              'allow_self_signed' => true
                                            )
                            );

  $mail->Host = 'smtp.gmail.com';

  $mail->Port = 587;

  $mail->SMTPSecure = 'tls';

  $mail->SMTPAuth = true;

  $mail->Username = $email;

  $mail->Password = $password;

  $mail->setFrom('emeraldevcops@gmail.com', 'DevCops Emerald');

  $mail->addReplyTo('emeraldevcops@gmail.com', 'DevCops Developers');

  $mail->addAddress($to_id);

  $mail->Subject = $subject;

  $mail->msgHTML($message);
//  $mail->send();


  if (!$mail->send()) {
        $error = "Mailer Error: " . $mail->ErrorInfo;
        return $error;
          }
  else {
        return "success";
      }

}
?>
