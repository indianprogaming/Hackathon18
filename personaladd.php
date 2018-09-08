<?php
require 'conn.php';
$userid=$_POST['userid'];
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$gender=$_POST['gender'];
$aadharno=$_POST['aadhar'];
$emailid=$_POST['emailid'];
$mobile=$_POST['mobile'];
$fathername=$_POST['fathername'];
$fatheroccupation=$_POST['fatheroccupation'];
$mothername=$_POST['mothername'];
$motheroccupation=$_POST['motheroccupation'];
$address=$_POST['address'];


$reg_query="INSERT INTO details(userid,fname,lname,gender,aadhar,email,mobile,fathername,fatheroccupation,mothername,motheroccupation,address) VALUES('".$userid."','".$fname."','".$lname."' , '".$gender."','".$aadharno."','".$emailid."','".$mobile."','".$fathername."','".$fatheroccupation."','".$mothername."','".$motheroccupation."','".$address."');";
if($conn->query($reg_query)==TRUE)
{

  $updatequery="UPDATE reguser SET stepcomplete=1 WHERE userid=".$userid;
  if($conn->query($updatequery)==TRUE)
  {
    header("Location: /academic.php?loginmail=".$emailid);
  }
  else {
    echo "Error in PHP";
  }
}
else {
  echo "EMAIL ID NOT RIGHT";
}
 ?>
