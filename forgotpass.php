<?php
require 'conn.php';
require 'spclfun.php';

//Loading Variables
if (isset($_POST['email'])) {
  $email = $_POST['email'];
}

//Let's Have a Few Own Variables for this PHP
$user=true;
$keyvalue=keygenerator(50);

//Email Client bAsic Variables
$admin_email="raj.fungus@gmail.com";
$admin_email_pass="cosmos1&me1";
$subject="InfoSeed : Password Reset Link";
$verify_link="http://localhost:8000/passreset.php?key=".$keyvalue."&email=".$email;
$msg="Hey There We have recieved a Password Reset Request from you. To Reset your Password Click this Link : ".$verify_link." \n If it wasn't you Ignore this message this Link will be Disabled in 24 Hours";


//Let's Check Uniqueness of user
$sqlquery="SELECT * from reguser;";
$result=$conn->query($sqlquery);
if ($result->num_rows >0) {
  while ($row=$result->fetch_assoc()) {
    if (strtolower($email)==strtolower($row["email"])) {
      $user=true;
      break;
    }
    else {
      $user=false;
      continue;
    }
  }
}
if ($user) {
  $reg_query="INSERT INTO resetreq(email,verikey,requeststatus) VALUES('".$email."','".$keyvalue."','active');";
  if($conn->query($reg_query)==TRUE)
  {
  /* Code for what Happens if Query succeeds...*/
  /*Send Mail to the User*/
  mailer($admin_email , $admin_email_pass , $email , $msg , $subject);
  /*Send mail to the User*/
  header("Location: /forgot.php?sent_suc=TRUE");
  }
  else {
  header("Location: /forgot.php?sent_suc=FALSE");
  }
}
elseif (!$user) {
  echo "No Account Found with Email Address";
}


 ?>
