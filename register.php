<?php
//loading all the require file of this PHP script;
require 'conn.php';
require 'spclfun.php';

//Declaring Input Variables taken from user
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['cnfpassword'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $pass=$_POST['password'];
  $cnfpass=$_POST['cnfpassword'];
}
else {
  header("Location: /signup.php?nullval=TRUE");
}

//Confirm password Verification system
if ($cnfpass==$pass) {
  // do nothing Let the Code do its job
}
else {
  header("Location: /signup.php?cnfpass=FALSE");
}

if ($name!=null && $email!=null && $pass!=null) {
  //do nothing Let the PHP do it job
}
else {
  header("Location: /signup.php?nullval=TRUE");
}

$space_name=str_replace(" ","+",$name);

//creating random Verification
$keyvalue=keygenerator(50);
$cryptpass=crypt($pass, '$6$rounds=5000$infoseed$'); //THIS IS THE Encrypted PAssword


//Let's Have a Few Own Variables for this PHP
$newuser=true;

//Email Client bAsic Variables
$admin_email="raj.fungus@gmail.com";
$admin_email_pass="cosmos1&me1";
$subject="InfoSeed : Please Verify Your Email Address";
$verify_link="http://localhost:8000/verify.php?key=".$keyvalue."&name=".$space_name."&email=".$email;
$msg="Hello Welcome to InfoSeed we have created your Account. Please Verify Your account using this Link : ".$verify_link;


//Let's Check Uniqueness of user
$sqlquery="SELECT * from reguser;";
$result=$conn->query($sqlquery);
if ($result->num_rows >0) {
  while ($row=$result->fetch_assoc()) {
    if (strtolower($email)==strtolower($row["email"])) {
      $newuser=false;
      break;
    }
    else {
      $newuser=true;
      continue;
    }
  }
}




if ($newuser) {
  $reg_query="INSERT INTO reguser(fullname,email,password,verification_key) VALUES('".$name."','".$email."','".$cryptpass."' , '".$keyvalue."');";
  if($conn->query($reg_query)==TRUE)
  {
  /* Code for what Happens if Query succeeds...*/
  /*Send Mail to the User*/
  mailer($admin_email , $admin_email_pass , $email , $msg , $subject);
  /*Send mail to the User*/
  header("Location: /loginpage.php?reg_suc=TRUE");
  }
  else {
  header("Location: /loginpage.php?reg_suc=FALSE");
  }
}
elseif (!$newuser) {
  echo "THE USER ALREADY EXIST";
}
 ?>
