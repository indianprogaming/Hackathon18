<?php
require 'conn.php';
$userid=$_POST['userid'];
$tenper=$_POST['10thper'];
$tenboard=$_POST['10thboard'];
$tenyear=$_POST['10thyear'];
$tweper=$_POST['12thper'];
$tweboard=$_POST['12thboard'];
$tweyear=$_POST['12thyear'];
$twestream=$_POST['12thstream'];
$gap=$_POST['gap'];
$gradper=$_POST['gradper'];
$gradcollege=$_POST['gradcollege'];
$gradyear=$_POST['gradyear'];
$furtherstudies=$_POST['furtherstudies'];
$emailid=$_POST['emailid'];


$reg_query="UPDATE details SET 10per='".$tenper."' WHERE userid=".$userid.";";
$reg_query1="UPDATE details SET 10board='".$tenboard."' WHERE userid=".$userid.";";
$reg_query2="UPDATE details SET 10year='".$tenyear."' WHERE userid=".$userid.";";
$reg_query3="UPDATE details SET 12per='".$tweper."' WHERE userid=".$userid.";";
$reg_query4="UPDATE details SET 12board='".$tweboard."' WHERE userid=".$userid.";";
$reg_query5="UPDATE details SET 12year='".$tweyear."' WHERE userid=".$userid.";";
$reg_query6="UPDATE details SET 12stream='".$twestream."' WHERE userid=".$userid.";";
$reg_query7="UPDATE details SET gradper='".$gradper."' WHERE userid=".$userid.";";
$reg_query8="UPDATE details SET gradcollege='".$gradcollege."' WHERE userid=".$userid.";";
$reg_query9="UPDATE details SET gradyear='".$gradyear."' WHERE userid=".$userid.";";
$reg_query10="UPDATE details SET gap='".$gap."' WHERE userid=".$userid.";";
$reg_query11="UPDATE details SET furtherstudies='".$furtherstudies."' WHERE userid=".$userid.";";

if(($conn->query($reg_query)==TRUE) && ($conn->query($reg_query1)==TRUE) && ($conn->query($reg_query2)==TRUE) && ($conn->query($reg_query3)==TRUE) && ($conn->query($reg_query4)==TRUE) && ($conn->query($reg_query5)==TRUE) && ($conn->query($reg_query6)==TRUE) && ($conn->query($reg_query7)==TRUE) && ($conn->query($reg_query8)==TRUE) && ($conn->query($reg_query9)==TRUE) && ($conn->query($reg_query10)==TRUE) && ($conn->query($reg_query11)==TRUE))
{

  $updatequery="UPDATE reguser SET stepcomplete=2 WHERE userid=".$userid;
  if($conn->query($updatequery)==TRUE)
  {
    header("Location: /academic.php?loginmail=".$emailid);
  }
  else {
    echo "Error in PHP";
  }
}
else {

    $updatequery="UPDATE reguser SET stepcomplete=2 WHERE userid=".$userid;
    if($conn->query($updatequery)==TRUE)
    {
      header("Location: /academic.php?loginmail=".$emailid);
    }
    else {
      echo "Error in PHP";
    }
}
 ?>
